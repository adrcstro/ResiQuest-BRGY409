<?php
require 'Connection.php';

// Include the database connection file
$conn = mysqli_connect($servername, $username, $password, $dbname);
if(!$conn){
  echo "Database connection error".mysqli_connect_error();
}

// Get the request ID from the query string and sanitize it
$requestId = mysqli_real_escape_string($conn, $_GET['residents_id']);

// Prepare and execute the SQL query to fetch request details
$query = "SELECT * FROM users WHERE ID = $requestId";
$result = mysqli_query($conn, $query);

// Fetch and display each row
if ($row = mysqli_fetch_assoc($result)) {

    echo'<div class="flex flex-col items-center">';
    echo'<div class="relative">
    <img id="profilePicture" src="uploads/' . $row['Profile'] . '" class="w-32 h-32 bg-gray-300 rounded-full mb-2" alt="Profile Picture">
  </div>';
  echo '<h1 class="text-xl font-bold">' . $row["fname"] . ', ' . $row["Mname"] . ' ' . $row["lname"] . '</h1>';
  
  echo '<label for="resident-id" class="font-semibold">Residents ID:</label>';
  echo '<h1 id="resident-id" class="text-lg font-semibold">' . $row["ID"] . '</h1>';
  
  echo '<label for="status" class="font-semibold">Status:</label>';
  echo '<h1 id="status" class="text-lg font-semibold">' . $row["Status"] . '</h1>';
  
  
  echo'<div class="mx-auto max-w-3xl mt-6">
  <div class="grid grid-cols-1 gap-y-6 gap-x-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 2xl:grid-cols-3">
      <div class="flex flex-col">
          <label for="AdminEditFirstName" class="block text-sm font-medium text-gray-700">First Name</label>
          <input value="'. $row["fname"] .'"  required="" type="text" name="AdminEditFirstName" id="AdminEditFirstName" autocomplete="given-name" placeholder="First Name"
              class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 ">
      </div>
      <div class="flex flex-col">
          <label for="AdminEditMiddleName" class="block text-sm font-medium text-gray-700">Middle Name</label>
          <input  required="" type="text" name="AdminEditMiddleName" id="AdminEditMiddleName" autocomplete="additional-name" placeholder="Middle Name"
              class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 ">
      </div>
      <div class="flex flex-col">
          <label for="AdminEditLastName" class="block text-sm font-medium text-gray-700">Last Name</label>
          <input  required="" type="text" name="AdminEditLastName" id="AdminEditLastName" autocomplete="family-name" placeholder="Last Name"
              class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 ">
      </div>


      <div class="flex flex-col">
          <label for="AdminEditFirstName" class="block text-sm font-medium text-gray-700">Nick Name</label>
          <input   required="" type="text" name="AdminEditFirstName" id="AdminEditFirstName" autocomplete="given-name" 
              class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 ">
      </div>
      <div class="flex flex-col">
          <label for="AdminEditMiddleName" class="block text-sm font-medium text-gray-700">Place of Birth</label>
          <input  required="" type="text" name="AdminEditMiddleName" id="AdminEditMiddleName" autocomplete="additional-name" 
              class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 ">
      </div>
      <div class="flex flex-col">
          <label for="AdminEditLastName" class="block text-sm font-medium text-gray-700">Birthdate</label>
          <input  required="" type="text" name="AdminEditLastName" id="AdminEditLastName" autocomplete="family-name" 
              class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 ">
      </div>


      <div class="flex flex-col">
      <label for="AdminEditFirstName" class="block text-sm font-medium text-gray-700">Age</label>
      <input   required="" type="number" name="AdminEditFirstName" id="AdminEditFirstName" autocomplete="given-name" 
          class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 ">
  </div>
  <div class="flex flex-col">
      <label for="AdminEditMiddleName" class="block text-sm font-medium text-gray-700">Civil Status</label>
      <input  required="" type="text" name="AdminEditMiddleName" id="AdminEditMiddleName" autocomplete="additional-name" 
          class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 ">
  </div>
  <div class="flex flex-col">
      <label for="AdminEditLastName" class="block text-sm font-medium text-gray-700">Gender</label>
      <input  required="" type="text" name="AdminEditLastName" id="AdminEditLastName" autocomplete="family-name" 
          class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 ">
  </div>
  </div>';
  
  
echo'<div class=" mt-6 flex flex-col sm:flex-row gap-x-6">
<div class="sm:flex-1">
    <label for="AdminsID" class="block text-sm font-medium text-gray-700">Purok</label>
    <input  readonly required="" type="text" name="AdminsID" id="AdminsID" autocomplete="street-address" 
        class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 mb-4">
</div>

<div class="sm:flex-1">
    <label for="AdminsID" class="block text-sm font-medium text-gray-700">Voter Status</label>
    <input  readonly required="" type="text" name="AdminsID" id="AdminsID" autocomplete="street-address" 
        class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 mb-4">
</div>


</div>';





  
  
  
  echo'</div>';
echo'</div>';


    

}

// Close the database connection
mysqli_close($conn);
?>
