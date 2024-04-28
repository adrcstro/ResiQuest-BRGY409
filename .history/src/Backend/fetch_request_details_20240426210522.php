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
if(mysqli_num_rows($result) > 0) {
  // Output the request details

        // Display the row only if the status is not "Completed"
        echo '<tr>';
        echo '<td class="p-4 whitespace-nowrap text-sm font-normal text-gray-900">' . $row["RequestID"] . '</td>';
        echo '<td class="p-4 whitespace-nowrap text-sm font-normal text-gray-900">' . $row["ServiceType"] . '</td>';
        echo '<td class="p-4 whitespace-nowrap text-sm font-semibold text-gray-900">' . $row["DateRequested"] . '</td>';
        echo '<td class="p-4 whitespace-nowrap text-sm font-semibold text-gray-900 ">' . $row["Status"] . '</td>';
        echo '<td class="p-4 whitespace-nowrap text-sm font-semibold text-gray-900">' . $row["PickUpDate"] . '</td>';
      
        echo '</tr>';
    

echo '</tbody></table>';

}

// Close the database connection
mysqli_close($conn);
?>
