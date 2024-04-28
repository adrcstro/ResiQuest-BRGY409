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

  // Check if there is a row returned
// Check if there is a row returned
// Check if there is a row returned
if(mysqli_num_rows($result) > 0) {
  // Fetch and display each row
  while($row = mysqli_fetch_assoc($result)) {
    // Display the information based on the fetched columns
    // (You can modify this part to display the information as needed)
    echo '<div class="grid grid-cols-4 gap-4">';
    foreach ($row as $key => $value) {
      echo '<div>';
      echo '<label for="' . $key . '" class="block text-sm font-semibold leading-6 text-gray-900">' . $key . '</label>';
      echo '<input type="text" id="' . $key . '" name="' . $key . '" value="' . $value . '" readonly class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 mt-1">';
      echo '</div>';
    }
    echo '</div>';
  }
} else {
  echo 'No rows found';
}
}
// Close the database connection
mysqli_close($conn);
?>
