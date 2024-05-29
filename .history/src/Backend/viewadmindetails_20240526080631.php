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
    <h1 class="text-xl font-bold">"' . $row["Lname"] . '","' . $row["Fname"] . '" "' . $row["MName"] . '"</h1>
    <h3 class="text-lg font-semibold">"' . $row["BrgyPosition"] . '"</h1>
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
