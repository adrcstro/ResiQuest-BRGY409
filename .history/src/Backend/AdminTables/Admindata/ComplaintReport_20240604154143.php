<?php
session_start();

if (!empty($_SESSION["AdminID"])) {
    $ID = $_SESSION["AdminID"];
    
    // Including the connection file
    include_once 'Connection.php'; 

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        // Log the error and display a user-friendly message
        error_log("Connection failed: " . $conn->connect_error);
        echo "There was an issue connecting to the database.";
    } else {
        $sql = "SELECT DateRequested, COUNT(*) AS total FROM requestdocument GROUP BY DateRequested ORDER BY DateRequested";
        $result = $conn->query($sql);

        $dataPoints = [];
        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $dataPoints[] = $row;
            }
            $result->free();
        } else {
            echo "Error retrieving data from the database.";
        }
        $conn->close();
    }
}
?>