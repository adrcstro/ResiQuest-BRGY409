<?php
if (!empty($_SESSION["AdminID"])) {
    $ID = $_SESSION["AdminID"];
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT COUNT(*) AS total, DATE_FORMAT(DateofReport, '%Y-%m') AS month FROM complaintbl GROUP BY DATE_FORMAT(DateofReport, '%Y-%m')";
    $result = $conn->query($sql);
    $dates = [];
    $counts = [];
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            // Format the month as a month name and year
            $monthName = date("F Y", strtotime($row["month"] . "-01"));
            $dates[] = $monthName;
            $counts[] = $row["total"];
        }
    } else {
        echo "Error retrieving data from the database.";
    }
    $conn->close();
}
?>