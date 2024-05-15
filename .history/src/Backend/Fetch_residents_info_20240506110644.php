<?php
require 'Connection.php';

// Include the database connection file
$conn = mysqli_connect($servername, $username, $password, $dbname);
if(!$conn){
  echo "Database connection error".mysqli_connect_error();
}

// Get the request ID from the query string
$requestId = $_GET['residents_id'];

// Prepare and execute the SQL query to fetch request details


  // Prepare and execute the SQL query to fetch specific columns
  $query = "SELECT * FROM users WHERE ID = $requestId";
  $result = mysqli_query($conn, $query);

  // Fetch and display each row
// Fetch and display each row
if ($row = mysqli_fetch_assoc($result)) {
    // Display the information based on the fetched columns

    
    echo '<img id="profilePicture" src="uploads/' . $row['Profile'] . '" class="w-32 h-32 bg-gray-300 rounded-full mb-4" alt="Profile Picture">';

    
 

    
    
    
    echo "ID: " . $row['ID'] . "\n";
    echo "First Name: " . $row['fname'] . "\n";
    echo "Middle Name: " . $row['Mname'] . "\n";
    echo "Last Name: " . $row['lname'] . "\n";
}


// Close the database connection
mysqli_close($conn);
