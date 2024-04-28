<?php
 include 'fetch_requests.php';
 include 'ResidentsDashboard.php';
require 'Connection.php';


if (!empty($_SESSION["ID"])) {
    $ID = $_SESSION["ID"];
    $query = "SELECT RequestID, ServiceType, DateRequested, Status, PickUpDate 
              FROM requestdocument 
              WHERE UserID = $ID";
    $result = mysqli_query($conn, $query);

    // Check if there are any rows returned
    if (mysqli_num_rows($result) > 0) {
        // Store the rows in an array
        $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
}
?>
