



<?php
require 'Connection.php';


// Include the database connection file
$conn = mysqli_connect($servername, $username, $password, $dbname);
if(!$conn){
  echo "Database connection error".mysqli_connect_error();
}

// Get the request ID from the query string
$requestId = $_GET['request_id'];

// Prepare and execute the SQL query to fetch request details
$query = "SELECT * FROM requestdocument WHERE RequestID = $requestId";
$result = mysqli_query($conn, $query);

// Check if there is a row returned
if(mysqli_num_rows($result) > 0) {
  // Output the request details
  $row = mysqli_fetch_assoc($result);
  echo '<div class="modal-content">';
  echo '<span class="close">&times;</span>';
  echo '<p>Request ID: ' . $row["RequestID"] . '</p>';
  echo '<p>Service Type: ' . $row["ServiceType"] . '</p>';
  echo '<p>Date Requested: ' . $row["DateRequested"] . '</p>';
  echo '<p>Status: ' . $row["Status"] . '</p>';
  echo '<p>Pick Up Date: ' . $row["PickUpDate"] . '</p>';
  echo '</div>';
}

// Close the database connection
mysqli_close($conn);
?>
