<?php
include __DIR__ . '/../../Connection.php';
if (!empty($_SESSION["AdminID"])) {
    $ID = $_SESSION["AdminID"];
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Combine data from both requestdocument and complaintbl tables
    $sql = "
        SELECT 
            COUNT(rd.ID) AS request_count,
            COUNT(c.ID) AS complaint_count,
            DATE_FORMAT(rd.DateRequested, '%Y-%m') AS month
        FROM 
            requestdocument rd
        LEFT JOIN 
            complaintbl c ON DATE_FORMAT(rd.DateRequested, '%Y-%m') = DATE_FORMAT(c.DateRequested, '%Y-%m')
        GROUP BY 
            DATE_FORMAT(rd.DateRequested, '%Y-%m')
    ";

    $result = $conn->query($sql);
    $dates = [];
    $request_counts = [];
    $complaint_counts = [];

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            // Format the month as a month name and year
            $monthName = date("F Y", strtotime($row["month"] . "-01"));
            $dates[] = $monthName;
            $request_counts[] = $row["request_count"];
            $complaint_counts[] = $row["complaint_count"];
        }
    } else {
        echo "Error retrieving data from the database.";
    }
    $conn->close();
}
?>
