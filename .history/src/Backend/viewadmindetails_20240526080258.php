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
    <div class="relative">
    <img  id="AdminPRofile" src="../Backend/uploads/' . $row["AdminProfile"] . '" alt="News Image" class="w-32 h-32 bg-gray-300 rounded-full mb-4" alt="Default Profile Picture">
  
    <label for="AdminPRofile" class="absolute bottom-0 right-0 p-2 bg-gray-100 text-black rounded-full hover:bg-gray-400 focus:outline-none focus:bg-gray-400 cursor-pointer border-4 " title="Edit Profile">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
      <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
    </svg>
  </label>
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
