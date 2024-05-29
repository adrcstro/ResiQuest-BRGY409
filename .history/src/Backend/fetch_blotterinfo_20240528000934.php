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
  
 
 
  echo '<div class="mx-auto max-w-3xl mt-6">
  <div class="grid grid-cols-1 gap-y-6 gap-x-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 2xl:grid-cols-3">
      <div class="flex flex-col">
          <label for="AdminEditFirstName" class="block text-sm font-medium text-gray-700">First Name</label>
          <input value="" required="" type="text" name="AdminEditFirstName" id="AdminEditFirstName" autocomplete="given-name" placeholder="First Name"
              class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 ">
      </div>
      <div class="flex flex-col">
          <label for="AdminEditMiddleName" class="block text-sm font-medium text-gray-700">Middle Name</label>
          <input value="" required="" type="text" name="AdminEditMiddleName" id="AdminEditMiddleName" autocomplete="additional-name" placeholder="Middle Name"
              class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 ">
      </div>
      <div class="flex flex-col">
          <label for="AdminEditLastName" class="block text-sm font-medium text-gray-700">Last Name</label>
          <input value="" required="" type="text" name="AdminEditLastName" id="AdminEditLastName" autocomplete="family-name" placeholder="Last Name"
              class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 ">
      </div>

      <div class="flex flex-col">
          <label for="AdminEditNickName" class="block text-sm font-medium text-gray-700">Nick Name</label>
          <input value="" required="" type="text" name="AdminEditNickName" id="AdminEditNickName" autocomplete="given-name" 
              class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 ">
      </div>
      <div class="flex flex-col">
          <label for="AdminEditPlaceOfBirth" class="block text-sm font-medium text-gray-700">Place of Birth</label>
          <input value="" required="" type="text" name="AdminEditPlaceOfBirth" id="AdminEditPlaceOfBirth" autocomplete="additional-name" 
              class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 ">
      </div>
      <div class="flex flex-col">
          <label for="AdminEditBirthdate" class="block text-sm font-medium text-gray-700">Birthdate</label>
          <input value="" required="" type="text" name="AdminEditBirthdate" id="AdminEditBirthdate" autocomplete="family-name" 
              class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 ">
      </div>

      <div class="flex flex-col">
          <label for="AdminEditAge" class="block text-sm font-medium text-gray-700">Age</label>
          <input value="" required="" type="number" name="AdminEditAge" id="AdminEditAge" autocomplete="given-name" 
              class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 ">
      </div>
      <div class="flex flex-col">
          <label for="AdminEditCivilStatus" class="block text-sm font-medium text-gray-700">Civil Status</label>
          <input value="" required="" type="text" name="AdminEditCivilStatus" id="AdminEditCivilStatus" autocomplete="additional-name" 
              class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 ">
      </div>
      <div class="flex flex-col">
          <label for="AdminEditGender" class="block text-sm font-medium text-gray-700">Gender</label>
          <input value="" required="" type="text" name="AdminEditGender" id="AdminEditGender" autocomplete="family-name" 
              class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 ">
      </div>
  </div>';

echo '<div class="mt-3 flex flex-col sm:flex-row gap-x-6">
  <div class="sm:flex-1">
      <label for="AdminEditPurok" class="block text-sm font-medium text-gray-700">Purok</label>
      <input value="" readonly required="" type="text" name="AdminEditPurok" id="AdminEditPurok" autocomplete="street-address" 
          class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 mb-4">
  </div>
  <div class="sm:flex-1">
      <label for="AdminEditVoterStatus" class="block text-sm font-medium text-gray-700">Voter Status</label>
      <input value="" readonly required="" type="text" name="AdminEditVoterStatus" id="AdminEditVoterStatus" autocomplete="street-address" 
          class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 mb-4">
  </div>
</div>';

echo '<div class="mt-3 flex flex-col sm:flex-row gap-x-6">
  <div class="sm:flex-1">
      <label for="AdminEditEmail" class="block text-sm font-medium text-gray-700">Email</label>
      <input value="" readonly required="" type="text" name="AdminEditEmail" id="AdminEditEmail" autocomplete="street-address" 
          class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 mb-4">
  </div>
  <div class="sm:flex-1">
      <label for="AdminEditOccupation" class="block text-sm font-medium text-gray-700">Occupation</label>
      <input value="" readonly required="" type="text" name="AdminEditOccupation" id="AdminEditOccupation" autocomplete="street-address" 
          class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 mb-4">
  </div>
</div>';

echo '<div class="mt-3 flex flex-col sm:flex-row gap-x-6">
  <div class="sm:flex-1">
      <label for="AdminEditContactNumber" class="block text-sm font-medium text-gray-700">Contact Number</label>
      <input value="" readonly required="" type="text" name="AdminEditContactNumber" id="AdminEditContactNumber" autocomplete="street-address" 
          class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 mb-4">
  </div>
  <div class="sm:flex-1">
      <label for="AdminEditAddress" class="block text-sm font-medium text-gray-700">Address</label>
      <input value="" readonly required="" type="text" name="AdminEditAddress" id="AdminEditAddress" autocomplete="street-address" 
          class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 mb-4">
  </div>
</div>';

echo '<div class="mt-3 flex flex-col sm:flex-row gap-x-6">
  <div class="sm:flex-1">
      <label for="AdminEditZipCode" class="block text-sm font-medium text-gray-700">Zip Code</label>
      <input value="" readonly required="" type="text" name="AdminEditZipCode" id="AdminEditZipCode" autocomplete="street-address" 
          class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 mb-4">
  </div>
  <div class="sm:flex-1">
      <label for="AdminEditCitizenship" class="block text-sm font-medium text-gray-700">Citizenship</label>
      <input value="" readonly required="" type="text" name="AdminEditCitizenship" id="AdminEditCitizenship" autocomplete="street-address" 
          class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 mb-4">
  </div>
</div>';



  
  
  
  echo'</div>';
echo'</div>';


    

}

// Close the database connection
mysqli_close($conn);
?>
