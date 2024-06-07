<?php
session_start();
if (!empty($_SESSION["AdminID"])) {
    $ID = $_SESSION["AdminID"];
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT COUNT(*) AS total FROM complaintbl";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $totalCount = $row["total"];
        echo json_encode(array("totalCount" => $totalCount));
    } else {
        echo json_encode(array("error" => "Error retrieving data from the database."));
    }

    $conn->close();
}
?>
