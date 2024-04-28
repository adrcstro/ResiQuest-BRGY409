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
// Check if there is a row returned
if(mysqli_num_rows($result) > 0) {
  // Fetch and display each row
  while($row = mysqli_fetch_assoc($result)) {
    echo '<div class="flex items-center justify-between mt-3">';
    echo '<label for="request_id" class="text-sm font-medium text-gray-700">Request ID:</label>';
    echo '<input type="text" id="request_id" name="request_id" value="' . $row["RequestID"] . '" readonly class="border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">';
    echo '</div>';

    echo '<div class="flex items-center justify-between mt-3">';
    echo '<label for="service_type" class="text-sm font-medium text-gray-700">Service Type:</label>';
    echo '<input type="text" id="service_type" name="service_type" value="' . $row["ServiceType"] . '" readonly class="border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">';
    echo '</div>';

    echo '<div class="flex items-center justify-between mt-3">';
    echo '<label for="date_requested" class="text-sm font-medium text-gray-700">Date Requested:</label>';
    echo '<input type="text" id="date_requested" name="date_requested" value="' . $row["DateRequested"] . '" readonly class="border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">';
    echo '</div>';

    echo '<div class="flex items-center justify-between mt-3">';
    echo '<label for="status" class="text-sm font-medium text-gray-700">Status:</label>';
    echo '<input type="text" id="status" name="status" value="' . $row["Status"] . '" readonly class="border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">';
    echo '</div>';

    echo '<div class="flex items-center justify-between mt-3">';
    echo '<label for="pickup_date" class="text-sm font-medium text-gray-700">Pick up Date:</label>';
    echo '<input type="text" id="pickup_date" name="pickup_date" value="' . $row["PickUpDate"] . '" readonly class="border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">';
    echo '</div>';

  }
}

// Close the database connection
mysqli_close($conn);
?>
