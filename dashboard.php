<?php
// Get the service account key JSON content from the environment variable
$serviceAccountJson = getenv('GOOGLE_CREDENTIALS');

// Check if the environment variable is set
if (!$serviceAccountJson) {
    die("Google service account credentials not found in environment variables.");
}

// Decode the JSON content into an associative array
$credentials = json_decode($serviceAccountJson, true);

// Check if decoding was successful
if ($credentials === null) {
    die("Failed to decode the service account JSON.");
}

// Create a temporary file with the service account credentials
$tempFile = tempnam(sys_get_temp_dir(), 'google-credentials-');
file_put_contents($tempFile, json_encode($credentials));  // Ensure credentials are written back as a JSON string

// Set the path to the temporary file
putenv('GOOGLE_APPLICATION_CREDENTIALS=' . $tempFile);

require 'vendor/autoload.php';

use Google\Analytics\Data\V1beta\Client\BetaAnalyticsDataClient;
use Google\Analytics\Data\V1beta\DateRange;
use Google\Analytics\Data\V1beta\Dimension;
use Google\Analytics\Data\V1beta\Metric;
use Google\Analytics\Data\V1beta\RunReportRequest;

// Replace with your actual GA4 Property ID
$property_id = '482643870'; // Example ID, replace with yours

try {
    // Create the Google Analytics client with credentials
    $client = new BetaAnalyticsDataClient([
        'credentials' => $tempFile
    ]);

    // Define the report request
    $request = (new RunReportRequest())
        ->setProperty('properties/' . $property_id)
        ->setDateRanges([new DateRange([
            'start_date' => '7daysAgo',
            'end_date' => 'today',
        ])])
        ->setDimensions([new Dimension(['name' => 'city'])]) // Dimensions: add more if needed
        ->setMetrics([
            new Metric(['name' => 'activeUsers']),
            new Metric(['name' => 'newUsers']), // Corrected metric: newUsers
            new Metric(['name' => 'sessions']),
        ]); // Metrics: add more if needed

    // Fetch the report
    $response = $client->runReport($request);

} catch (Exception $e) {
    die("Error fetching Google Analytics data: " . $e->getMessage());
}

// Clean up the temporary file after the request
unlink($tempFile);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Google Analytics Report</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        h2 { color: #333; }
        table { width: 50%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>

    <h2>Google Analytics Report (Last 7 Days)</h2>
    
    <table>
        <tr>
            <th>City</th>
            <th>Active Users</th>
            <th>New Users</th>
            <th>Sessions</th>
        </tr>
        <?php
        // Display data in table format
        if ($response->getRows()) {
            foreach ($response->getRows() as $row) {
                echo "<tr>
                        <td>" . htmlspecialchars($row->getDimensionValues()[0]->getValue()) . "</td>
                        <td>" . htmlspecialchars($row->getMetricValues()[0]->getValue()) . "</td>
                        <td>" . htmlspecialchars($row->getMetricValues()[1]->getValue()) . "</td>
                        <td>" . htmlspecialchars($row->getMetricValues()[2]->getValue()) . "</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No data available</td></tr>";
        }
        ?>
    </table>

</body>
</html>
