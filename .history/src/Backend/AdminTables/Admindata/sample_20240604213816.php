<?php
// Include your database connection
include('Connection.php');

// Query to fetch the number of requests per date
$query = "SELECT DateRequested, COUNT(*) as request_count FROM requestdocument GROUP BY DateRequested ORDER BY DateRequested";

$result = mysqli_query($conn, $query);

// Initialize arrays to hold the dates and counts
$dates = [];
$counts = [];

// Fetch the data and populate the arrays
while ($row = mysqli_fetch_assoc($result)) {
    $dates[] = $row['DateRequested'];
    $counts[] = $row['request_count'];
}

// Encode the data to JSON format for use in JavaScript
$dates_json = json_encode($dates);
$counts_json = json_encode($counts);
?>
