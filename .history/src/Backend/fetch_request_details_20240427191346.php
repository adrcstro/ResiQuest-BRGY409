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
$query = "SELECT RequestID, ServiceType, DateRequested, Status";

// Fetch additional columns based on ServiceType
$serviceTypeQuery = "";
switch ($row["ServiceType"]) {
    case "Certificate of Residency":
    case "Certificate of Indigency":
        $serviceTypeQuery = ", FirstName, Middlename, Lastname, Address, Purpose, PickUpDate";
        break;
    case "Business Clearance":
        $serviceTypeQuery = ", BusinessAct, BusinessLoc";
        break;
    case "Barangay Identification":
        $serviceTypeQuery = ", Contactname, Contactaddress, Contactnum";
        break;
}

$query .= $serviceTypeQuery . " FROM requestdocument WHERE RequestID = $requestId";

$result = mysqli_query($conn, $query);

// Check if there is a row returned
if(mysqli_num_rows($result) > 0) {
  // Fetch and display each row
  while($row = mysqli_fetch_assoc($result)) {
    echo '<div class="mt-3 grid grid-cols-1 sm:grid-cols-3 gap-y-4 gap-x-6">';

    echo '<div>';
    echo '<label for="request_id" class="block text-sm font-semibold leading-6 text-gray-900">Request ID</label>';
    echo '<input type="text" id="request_id" name="request_id" value="' . $row["RequestID"] . '" readonly class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 mt-1">';
    echo '</div>';
    
    echo '<div>';
    echo '<label for="service_type" class="block text-sm font-semibold leading-6 text-gray-900">Service Type</label>';
    echo '<input type="text" id="service_type" name="service_type" value="' . $row["ServiceType"] . '" readonly class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 mt-1">';
    echo '</div>';
    
    echo '<div>';
    echo '<label for="date_requested" class="block text-sm font-semibold leading-6 text-gray-900">Date Requested</label>';
    echo '<input type="text" id="date_requested" name="date_requested" value="' . $row["DateRequested"] . '" readonly class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 mt-1">';
    echo '</div>';
    
    echo '<div>';
    echo '<label for="status" class="block text-sm font-semibold leading-6 text-gray-900">Status</label>';
    echo '<input type="text" id="status" name="status" value="' . $row["Status"] . '" readonly class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 mt-1">';
    echo '</div>';
    
    // Output additional fields based on ServiceType
    switch ($row["ServiceType"]) {
        case "Certificate of Residency":
        case "Certificate of Indigency":
            echo '<div>';
            echo '<label for="first_name" class="block text-sm font-semibold leading-6 text-gray-900">First Name</label>';
            echo '<input type="text" id="first_name" name="first_name" value="' . $row["FirstName"] . '" readonly class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 mt-1">';
            echo '</div>';
            
            // Add other fields for Certificate of Residency or Certificate of Indigency
            break;
        case "Business Clearance":
            echo '<div>';
            echo '<label for="business_act" class="block text-sm font-semibold leading-6 text-gray-900">Business Activity</label>';
            echo '<input type="text" id="business_act" name="business_act" value="' . $row["BusinessAct"] . '" readonly class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 mt-1">';
            echo '</div>';
            
            // Add other fields for Business Clearance
            break;
        case "Barangay Identification":
            echo '<div>';
            echo '<label for="contact_name" class="block text-sm font-semibold leading-6 text-gray-900">Contact Name</label>';
            echo '<input type="text" id="contact_name" name="contact_name" value="' . $row["Contactname"] . '" readonly class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 mt-1">';
            echo '</div>';
            
            // Add other fields for Barangay Identification
            break;
    }
    
    echo '</div>';
  }
}

// Close the database connection
mysqli_close($conn);
?>
