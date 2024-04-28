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
  // Output the request details in a table
  echo '<table class="min-w-full divide-y divide-gray-200 mt-3">';
  echo '<tbody class="bg-white">';
  
  $row = mysqli_fetch_assoc($result);
  echo '<tr><td>Request ID:</td><td>' . $row["RequestID"] . '</td></tr>';
  echo '<tr><td>Service Type:</td><td>' . $row["ServiceType"] . '</td></tr>';
  echo '<tr><td>Date Requested:</td><td>' . $row["DateRequested"] . '</td></tr>';
  echo '<tr><td>Status:</td><td>' . $row["Status"] . '</td></tr>';
  echo '<tr><td>Pick Up Date:</td><td>' . $row["PickUpDate"] . '</td></tr>';
  
  echo '</tbody></table>';
}

// Close the database connection
mysqli_close($conn);
?>
