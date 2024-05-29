<?php
require 'Connection.php';

// Include the database connection file
$conn = mysqli_connect($servername, $username, $password, $dbname);
if(!$conn){
  echo "Database connection error".mysqli_connect_error();
}

// Get the request ID from the query string and sanitize it
$requestId = mysqli_real_escape_string($conn, $_GET['blootter_id']);

// Prepare and execute the SQL query to fetch request details
$query = "SELECT * FROM complaintbl WHERE ComplainID = $requestId";
$result = mysqli_query($conn, $query);

// Fetch and display each row
if ($row = mysqli_fetch_assoc($result)) {
    echo '<div class="flex flex-col items-center">';
    echo '<div class="relative">';
        echo '<img id="profilePicture" src="/Images/blotter.svg" class="w-40 h-40  rounded-none mb-2 border-4" alt="Profile Picture">';
   
   
    
    echo '</div>';
 
    
  // Display other user details
  echo '<h1 class="text-xl font-bold">' . $row["ComplainantLName"] . ', ' . $row["ComplainantMName"] . ' ' . $row["ComplainantFName"] . '</h1>';
  echo '<h1 class="mt-2 text-sm font-bold">Case-ID:' . $row["ComplainID"].'</h1>';
  
 
 
  
  
  echo'<div class="mx-auto max-w-3xl mt-6">
  <div class="grid grid-cols-1 gap-y-6 gap-x-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 2xl:grid-cols-3">
      <div class="flex flex-col">
          <label for="AdminEditFirstName" class="block text-sm font-medium text-gray-700">First Name</label>
          <input value="'. $row["fname"] .'"  required="" type="text" name="AdminEditFirstName" id="AdminEditFirstName" autocomplete="given-name" placeholder="First Name"
              class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 ">
      </div>
      <div class="flex flex-col">
          <label for="AdminEditMiddleName" class="block text-sm font-medium text-gray-700">Middle Name</label>
          <input value="'. $row["Mname"] .'" required="" type="text" name="AdminEditMiddleName" id="AdminEditMiddleName" autocomplete="additional-name" placeholder="Middle Name"
              class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 ">
      </div>
      <div class="flex flex-col">
          <label for="AdminEditLastName" class="block text-sm font-medium text-gray-700">Last Name</label>
          <input  value="'. $row["lname"] .'" required="" type="text" name="AdminEditLastName" id="AdminEditLastName" autocomplete="family-name" placeholder="Last Name"
              class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 ">
      </div>


      <div class="flex flex-col">
          <label for="AdminEditFirstName" class="block text-sm font-medium text-gray-700">Nick Name</label>
          <input value="'. $row["Nickname"] .'"  required="" type="text" name="AdminEditFirstName" id="AdminEditFirstName" autocomplete="given-name" 
              class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 ">
      </div>
      <div class="flex flex-col">
          <label for="AdminEditMiddleName" class="block text-sm font-medium text-gray-700">Place of Birth</label>
          <input value="'. $row["PlaceofBirth"] .'"  required="" type="text" name="AdminEditMiddleName" id="AdminEditMiddleName" autocomplete="additional-name" 
              class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 ">
      </div>
      <div class="flex flex-col">
          <label for="AdminEditLastName" class="block text-sm font-medium text-gray-700">Birthdate</label>
          <input value="'. $row["Dateofbirth"] .'" required="" type="text" name="AdminEditLastName" id="AdminEditLastName" autocomplete="family-name" 
              class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 ">
      </div>


      <div class="flex flex-col">
      <label for="AdminEditFirstName" class="block text-sm font-medium text-gray-700">Age</label>
      <input  value="'. $row["Age"] .'"  required="" type="number" name="AdminEditFirstName" id="AdminEditFirstName" autocomplete="given-name" 
          class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 ">
  </div>
  <div class="flex flex-col">
      <label for="AdminEditMiddleName" class="block text-sm font-medium text-gray-700">Civil Status</label>
      <input  value="'. $row["CivilStatus"] .'" required="" type="text" name="AdminEditMiddleName" id="AdminEditMiddleName" autocomplete="additional-name" 
          class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 ">
  </div>
  <div class="flex flex-col">
      <label for="AdminEditLastName" class="block text-sm font-medium text-gray-700">Gender</label>
      <input value="'. $row["Gender"] .'" required="" type="text" name="AdminEditLastName" id="AdminEditLastName" autocomplete="family-name" 
          class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 ">
  </div>
  </div>';
  
  
echo'<div class=" mt-3 flex flex-col sm:flex-row gap-x-6">
<div class="sm:flex-1">
    <label for="AdminsID" class="block text-sm font-medium text-gray-700">Purok</label>
    <input value="'. $row["Purok"] .'" readonly required="" type="text" name="AdminsID" id="AdminsID" autocomplete="street-address" 
        class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 mb-4">
</div>
<div class="sm:flex-1">
    <label for="AdminsID" class="block text-sm font-medium text-gray-700">Voter Status</label>
    <input value="'. $row["VoterStatus"] .'" readonly required="" type="text" name="AdminsID" id="AdminsID" autocomplete="street-address" 
        class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 mb-4">
</div>
</div>';

echo'<div class=" mt-3 flex flex-col sm:flex-row gap-x-6">
<div class="sm:flex-1">
    <label for="AdminsID" class="block text-sm font-medium text-gray-700">Email</label>
    <input value="'. $row["email"] .'" readonly required="" type="text" name="AdminsID" id="AdminsID" autocomplete="street-address" 
        class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 mb-4">
</div>
<div class="sm:flex-1">
    <label for="AdminsID" class="block text-sm font-medium text-gray-700">Occupation</label>
    <input value="'. $row["Occupation"] .'" readonly required="" type="text" name="AdminsID" id="AdminsID" autocomplete="street-address" 
        class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 mb-4">
</div>
</div>';


echo'<div class=" mt-3 flex flex-col sm:flex-row gap-x-6">
<div class="sm:flex-1">
    <label for="AdminsID" class="block text-sm font-medium text-gray-700">Contact Number</label>
    <input value="'. $row["ContactNumber"] .'" readonly required="" type="text" name="AdminsID" id="AdminsID" autocomplete="street-address" 
        class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 mb-4">
</div>
<div class="sm:flex-1">
    <label for="AdminsID" class="block text-sm font-medium text-gray-700">Address</label>
    <input value="'. $row["Address"] .'" readonly required="" type="text" name="AdminsID" id="AdminsID" autocomplete="street-address" 
        class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 mb-4">
</div>
</div>';


echo'<div class=" mt-3 flex flex-col sm:flex-row gap-x-6">
<div class="sm:flex-1">
    <label for="AdminsID" class="block text-sm font-medium text-gray-700">Zip Code</label>
    <input value="'. $row["Zipcode"] .'" readonly required="" type="text" name="AdminsID" id="AdminsID" autocomplete="street-address" 
        class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 mb-4">
</div>
<div class="sm:flex-1">
    <label for="AdminsID" class="block text-sm font-medium text-gray-700">Citizenship</label>
    <input value="'. $row["Citezenship"] .'" readonly required="" type="text" name="AdminsID" id="AdminsID" autocomplete="street-address" 
        class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 mb-4">
</div>
</div>';




  
  
  
  echo'</div>';
echo'</div>';


    

}

// Close the database connection
mysqli_close($conn);
?>
