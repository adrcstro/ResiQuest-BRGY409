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
    <div class="flex flex-col items-center justify-center w-full h-full p-2 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-gray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500">
    <img src="../Backend/uploads/' . $row["AdminProfile"] . '" alt="News Image" class="w-full h-full object-cover border-2 border-gray-400 rounded-md p-2">
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
