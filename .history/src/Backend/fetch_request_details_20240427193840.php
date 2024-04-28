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

// Determine the columns to fetch based on the ServiceType
$serviceTypeQuery = "";
$serviceType = "";
if (isset($_GET['service_type'])) {
    $serviceType = $_GET['service_type'];
}

if ($serviceType === "Certificate of Residency" || $serviceType === "Certificate of Indigency") {
    $serviceTypeQuery = "RequestID, ServiceType, DateRequested, Status, DateRequested, FirstName, Middlename, Lastname, Address, Purpose, PickUpDate";
} else if ($serviceType === "Business Clearance") {
    $serviceTypeQuery = "RequestID, ServiceType, DateRequested, Status, DateRequested, BusinessAct, BusinessLoc";
} else if ($serviceType === "Barangay Identification") {
    $serviceTypeQuery = "RequestID, ServiceType, DateRequested, Status, DateRequested, Contactname, Contactaddress, Contactnum";
}

// Add the columns to the query
$query .= $serviceTypeQuery . " FROM requestdocument WHERE RequestID = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "i", $requestId);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

// Check if there is a row returned
if(mysqli_num_rows($result) > 0) {
    // Fetch and display each row
    while($row = mysqli_fetch_assoc($result)) {
        // Output the fetched data
        foreach ($row as $key => $value) {
            echo '<div>';
            echo '<label for="' . $key . '" class="block text-sm font-semibold leading-6 text-gray-900">' . $key . '</label>';
            echo '<input type="text" id="' . $key . '" name="' . $key . '" value="' . $value . '" readonly class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 mt-1">';
            echo '</div>';
        }
    }
}

// Close the database connection
mysqli_close($conn);

// Close the database connection

