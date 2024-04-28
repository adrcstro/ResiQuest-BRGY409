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
$query = "SELECT ";
// Check the ServiceType and modify the query accordingly
switch ($_GET['service-type']) {
    case 'Certificate of Residency':
        $query .= "RequestID, ServiceType, DateRequested, Status, FirstName, Middlename, Lastname, Address, Purpose, PickUpDate ";
        break;
    case 'Business Clearance':
        $query .= "RequestID, ServiceType, DateRequested, Status, BusinessAct, BusinessLoc ";
        break;
    case 'Barangay Identification':
        $query .= "RequestID, ServiceType, DateRequested, Status, Contactname, Contactaddress, Contactnum ";
        break;
    default:
        $query .= "* ";
        break;
}
$query .= "FROM requestdocument WHERE RequestID = $requestId";

$result = mysqli_query($conn, $query);

// Check if there is a row returned
if(mysqli_num_rows($result) > 0) {
  // Fetch and display each row
  while($row = mysqli_fetch_assoc($result)) {
    echo '<div class="mt-3 grid grid-cols-1 sm:grid-cols-3 gap-y-4 gap-x-6">';
    // Display all the columns retrieved
    foreach ($row as $key => $value) {
        echo '<div>';
        echo '<label for="' . $key . '" class="block text-sm font-semibold leading-6 text-gray-900">' . $key . '</label>';
        echo '<input type="text" id="' . $key . '" name="' . $key . '" value="' . $value . '" readonly class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 mt-1">';
        echo '</div>';
    }
    echo '</div>';
  }
}

// Close the database connection
mysqli_close($conn);
?>
