<?php
// Get the service account key JSON content from the environment variable
$serviceAccountJson = getenv('GOOGLE_CREDS');

// Debugging line to print the contents
var_dump($serviceAccountJson);

// Check if the environment variable is set
if (!$serviceAccountJson) {
    die("Google service account credentials not found in environment variables.");
}

?>