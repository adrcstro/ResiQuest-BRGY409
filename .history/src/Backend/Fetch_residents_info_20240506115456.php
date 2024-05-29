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
  echo '<h1 class="text-lg font-semibold">Resident ID: ' . $row["ID"] . '</h1>';









    
    echo'</div>';
    
    

}

// Close the database connection
mysqli_close($conn);
?>
