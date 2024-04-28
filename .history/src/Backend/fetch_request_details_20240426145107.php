



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
 

  echo '<table class="min-w-full divide-y divide-gray-200">
  <thead class="bg-gray-50">
      <tr>
          <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Request ID</th>
          <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Service Type</th>
          <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date Requested</th>
          <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
          <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pick up Date</th>
          <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
      </tr>
  </thead>
  <tbody class="bg-white">';

// Fetch and display each row
while($row = mysqli_fetch_assoc($result)) {

// Display the row only if the status is not "Completed"
echo '<tr>';
echo '<td class="p-4 whitespace-nowrap text-sm font-normal text-gray-900">' . $row["RequestID"] . '</td>';
echo '<td class="p-4 whitespace-nowrap text-sm font-normal text-gray-900">' . $row["ServiceType"] . '</td>';
echo '<td class="p-4 whitespace-nowrap text-sm font-semibold text-gray-900">' . $row["DateRequested"] . '</td>';
echo '<td class="p-4 whitespace-nowrap text-sm font-semibold text-gray-900 ">' . $row["Status"] . '</td>';
echo '<td class="p-4 whitespace-nowrap text-sm font-semibold text-gray-900">' . $row["PickUpDate"] . '</td>';






}

// Close the database connection
mysqli_close($conn);
?>
