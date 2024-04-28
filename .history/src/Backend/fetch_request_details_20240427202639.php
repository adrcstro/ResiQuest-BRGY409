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
  // Fetch the request details
  $row = mysqli_fetch_assoc($result);

  // Check the ServiceType and fetch the appropriate columns
  switch ($row["ServiceType"]) {
    case "Certificate of Residency":
    case "Certificate of Indigency":
      $columns = "RequestID, ServiceType, DateRequested, Status, DateRequested, FirstName, Middlename, Lastname, Address, Purpose, PickUpDate";
      break;
    case "Business Clearance":
      $columns = "RequestID, ServiceType, DateRequested, Status, DateRequested, FirstName, Middlename, Lastname, Address, BusinessAct, BusinessLoc";
      break;
    case "Barangay Identification":
      $columns = "Contactname, Contactaddress, Contactnum";
      break;
    default:
      // Default columns if ServiceType does not match any of the above
      $columns = "*";
      break;
  }

  // Prepare and execute the SQL query to fetch specific columns
  $query = "SELECT $columns FROM requestdocument WHERE RequestID = $requestId";
  $result = mysqli_query($conn, $query);

// Fetch and display each row
// Fetch and display each row
while($row = mysqli_fetch_assoc($result)) {
  // Display the information based on the fetched columns
  // (You can modify this part to display the information as needed)
  echo '<div class="grid grid-cols-1 md:grid-cols-2 gap-4">';
  foreach ($row as $key => $value) {
      echo '<div class="flex justify-start items-start ">';
      echo '<label for="' . $key . '" class="block text-sm font-semibold leading-6 text-gray-900">' . $key . '</label>';
      echo '<input type="text" id="' . $key . '" name="' . $key . '" value="' . $value . '" readonly class="block w-full mt-1 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm text-left">';
      echo '</div>';
  }
  echo '</div>';
}



}
// Close the database connection
mysqli_close($conn);
