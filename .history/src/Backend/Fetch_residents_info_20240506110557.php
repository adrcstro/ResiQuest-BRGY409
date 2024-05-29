<?php
require 'Connection.php';

// Include the database connection file


$your_db_connection = mysqli_connect($servername, $username, $password,$dbname);

// Check the connection
if (!$your_db_connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch data from the "newsandevents" table
$query = "SELECT ID,fname,Mname, lname, Profile FROM users";
$result = mysqli_query($your_db_connection, $query);

// Check if the query was successful
if ($result) {
    // Fetch data row by row
    while ($row = mysqli_fetch_assoc($result)) {
        $drivername = $row['fname'];
        $ViehicleNumber = $row['Mname'];
        $PlateNumber = $row['lname'];
        $image = $row['Profile'];
     

        echo '<div class="col-md-4 mb-5">';
        echo '<div class="carddriver">';
        echo '<div style="position: relative;">'; // Add a relative position for proper stacking context
        echo '<img src="uploads' . $image . '" class="card-img-top-driver" alt="Card Image">';




        echo '</div>'; // Close the relative position div
        echo '<div class="card-body" id="card-bodydriver"; >';
        
        // Displaying the driver information
        echo '<h6 class="card-title-driver">Drivers Name: <span style="font-weight:normal;" id="driverName' . $row['ID'] . '">' . $drivername . '</span></h6>';
        echo '<h6 class="card-title-driver">Vehicle Number: <span style="font-weight:normal;">' . $ViehicleNumber . '</span></h6>';
        echo '<h6 class="card-title-driver">Plate Number: <span style="font-weight:normal;">' . $PlateNumber . '</span></h6>';
 

        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
}