<?php
require 'Connection.php';
 
// Get the news ID from the request
$AdminIDId = $_GET['admin_id'];

// Prepare and execute the SQL query to fetch news details
$query = "SELECT * FROM admintbl WHERE AdminID = '$AdminIDId'";
$result = mysqli_query($conn, $query);

// Check if there is a row returned
if (mysqli_num_rows($result) > 0) {
    // Fetch the news details
    $row = mysqli_fetch_assoc($result);

    // Display the picture centered
  

    echo '        
    <div class="relative mt-4">
    <div class="relative flex items-center justify-center">
    <img  src="../Backend/uploads/' . $row["AdminProfile"] . '" alt="News Image" class="w-32 h-32 bg-gray-300 rounded-full border-4  border-gray-400 mb-4" alt="Default Profile Picture">
    </div>
    <h1 class="text-xl text-center font-bold">' . $row["Lname"] . ',' . $row["Fname"] . ' ' . $row["MName"] . '</h1>
    <h3 class="text-lg text-center font-semibold">' . $row["BrgyPosition"] . '</h1>
  
    <div class="mx-auto max-w-3xl mt-6">
    <div class="grid grid-cols-1 gap-y-6 gap-x-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 2xl:grid-cols-3">
        <div class="flex flex-col">
            <label for="AdminEditFirstName" class="block text-sm font-medium text-gray-700">First Name</label>
            <input value=""  required="" type="text" name="AdminEditFirstName" id="AdminEditFirstName" autocomplete="given-name" placeholder="First Name"
                class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 mb-2">
        </div>
        <div class="flex flex-col">
            <label for="AdminEditMiddleName" class="block text-sm font-medium text-gray-700">Middle Name</label>
            <input value="" required="" type="text" name="AdminEditMiddleName" id="AdminEditMiddleName" autocomplete="additional-name" placeholder="Middle Name"
                class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 mb-2">
        </div>
        <div class="flex flex-col">
            <label for="AdminEditLastName" class="block text-sm font-medium text-gray-700">Last Name</label>
            <input value="" required="" type="text" name="AdminEditLastName" id="AdminEditLastName" autocomplete="family-name" placeholder="Last Name"
                class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 mb-2">
        </div>
    </div>
    <div class=" mt-3 flex flex-col sm:flex-row gap-x-6">
    <div class="sm:flex-1">
        <label for="AdminsID" class="block text-sm font-medium text-gray-700">Administrator ID</label>
        <input value="" readonly required="" type="text" name="AdminsID" id="AdminsID" autocomplete="street-address" placeholder="Registered ID"
            class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 mb-2">
    </div>
    <div class="sm:flex-1">
  <label for="AdminGender" class="block text-sm font-semibold leading-6 text-gray-900">Gender</label>
  <input value="" readonly required="" type="text" name="AdminsID" id="AdminsID" autocomplete="street-address" placeholder="Registered ID"
            class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 mb-2">
  </div>
    </div>
  
    <div class=" mt-3 flex flex-col sm:flex-row gap-x-6">
    <div class="sm:flex-1">
        <label for="AdminEmail" class="block text-sm font-medium text-gray-700">Email</label>
        <input value="" required="" type="text" name="AdminEmail" id="AdminEmail" autocomplete="street-address" placeholder="Email Address"
            class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 mb-2">
    </div>
  <div class="sm:flex-1">
  <label for="AdminGender" class="block text-sm font-semibold leading-6 text-gray-900">Position</label>
  <input value="" readonly required="" type="text" name="AdminsID" id="AdminsID" autocomplete="street-address" placeholder="Registered ID"
            class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 mb-2">
  </div>
    </div>
  
    <div class=" mt-3 flex flex-col sm:flex-row gap-x-6">
    <div class="sm:flex-1 mt-2">
        <label for="RenderedServicestart" class="block text-sm font-medium text-gray-700">Rendered Service Start</label>
        <input value="" required="" type="date" name="RenderedServicestart" id="RenderedServicestart" autocomplete="street-address" placeholder="Rendered Service"
            class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 mb-2">
        </div>
        <div class="sm:flex-1 mt-2">
        <label for="RenderedServiceend" class="block text-sm font-medium text-gray-700">Rendered Service End</label>
        <input value="" required="" type="date" name="RenderedServiceend" id="RenderedServiceend" autocomplete="street-address" placeholder="Rendered Service"
            class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 mb-2">
        </div>
        </div>
  </div>
  
  
    </div>
 ';
    
} else {
    // Return an error message if no news found
    echo json_encode(["error" => "No Admin found"]);
}

// Close the database connection
mysqli_close($conn);
?>
