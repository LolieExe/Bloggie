<?php
// Set the path to the Google service account JSON file
putenv('GOOGLE_APPLICATION_CREDENTIALS=' . __DIR__ . '/bloggie-1742374809443-ef814aaf4352.json');

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
        'credentials' => __DIR__ . '/bloggie-1742374809443-ef814aaf4352.json'
    ]);

    // Define the report request
    $request = (new RunReportRequest())
        ->setProperty('properties/' . $property_id)
        ->setDateRanges([new DateRange([
            'start_date' => '7daysAgo',
            'end_date' => 'today',
        ])])
        ->setDimensions([new Dimension(['name' => 'city'])])
        ->setMetrics([new Metric(['name' => 'activeUsers'])]);

    // Fetch the report
    $response = $client->runReport($request);

} catch (Exception $e) {
    die("Error fetching Google Analytics data: " . $e->getMessage());
}

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
        </tr>
        <?php
        // Display data in table format
        if ($response->getRows()) {
            foreach ($response->getRows() as $row) {
                echo "<tr>
                        <td>" . htmlspecialchars($row->getDimensionValues()[0]->getValue()) . "</td>
                        <td>" . htmlspecialchars($row->getMetricValues()[0]->getValue()) . "</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='2'>No data available</td></tr>";
        }
        ?>
    </table>

</body>
</html>
