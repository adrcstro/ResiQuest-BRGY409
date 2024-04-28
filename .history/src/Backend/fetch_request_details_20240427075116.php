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
$query = "SELECT * FROM requestdocument WHERE RequestID = $requestId";
$result = mysqli_query($conn, $query);

// Check if there is a row returned
// Check if there is a row returned
// Check if there is a row returned
if(mysqli_num_rows($result) > 0) {
  // Fetch and display each row
  while($row = mysqli_fetch_assoc($result)) {


    echo '
    <div class="bg-white shadow-2xl rounded-md p-6 mb-3  mt-4">
            <div class="mb-2 lg:mb-0">
                <h3 class="text-2xl font-bold text-black text-center">Residents Verification Process</h3>
                <span class="flex text-base font-medium text-black justify-center text-center">Verification Process</span>
            </div>
    
    
         
    

    
    
    
        </div>';
    
  }
}

// Close the database connection
mysqli_close($conn);
?>
