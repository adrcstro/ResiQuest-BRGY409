<?php
require 'Connection.php';

// Include the database connection file
$conn = mysqli_connect($servername, $username, $password, $dbname);
if(!$conn){
  echo "Database connection error".mysqli_connect_error();
}

// Check if the request_id is set in the query string
if(isset($_GET['request_id'])) {
    // Get the request ID from the query string
    $requestId = $_GET['request_id'];

    // Prepare and execute the SQL query to fetch request details
    $query = "SELECT * FROM requestdocument WHERE RequestID = $requestId";
    $result = mysqli_query($conn, $query);

    // Check if there is a row returned
    if(mysqli_num_rows($result) > 0) {
        // Fetch and display each row
        while($row = mysqli_fetch_assoc($result)) {
            echo '<div class="col-span-4 sm:col-span-9">';
            echo '<div class="bg-white shadow-2xl rounded-lg p-6 h-full">';
            echo '<div class="grid grid-cols-1 gap-y-6 gap-x-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 2xl:grid-cols-4">';
            
            // Output your input fields here with the corresponding row data
            
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
    } else {
        echo "No request found for ID: $requestId";
    }
} else {
    echo "No request ID provided";
}

// Close the database connection
mysqli_close($conn);
?>
