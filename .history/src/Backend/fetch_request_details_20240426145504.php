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
  echo '<table class="min-w-full divide-y divide-gray-200 mt-3">';
  echo '<tbody class="bg-white">';

  $row = mysqli_fetch_assoc($result);
  echo '<tr>';
  echo '<td class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Request ID</td>';
  echo '<td class="p-4 text-left text-xs font-normal text-gray-900">' . $row["RequestID"] . '</td>';
  echo '</tr>';
  
  echo '<tr>';
  echo '<td class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Service Type</td>';
  echo '<td class="p-4 text-left text-xs font-normal text-gray-900">' . $row["ServiceType"] . '</td>';
  echo '</tr>';

  echo '<tr>';
  echo '<td class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date Requested</td>';
  echo '<td class="p-4 text-left text-xs font-normal text-gray-900">' . $row["DateRequested"] . '</td>';
  echo '</tr>';

  echo '<tr>';
  echo '<td class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</td>';
  echo '<td class="p-4 text-left text-xs font-normal text-gray-900">' . $row["Status"] . '</td>';
  echo '</tr>';

  echo '<tr>';
  echo '<td class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pick Up Date</td>';
  echo '<td class="p-4 text-left text-xs font-normal text-gray-900">' . $row["PickUpDate"] . '</td>';
  echo '</tr>';

  echo '</tbody>';
  echo '</table>';
}

// Close the database connection
mysqli_close($conn);
?>
