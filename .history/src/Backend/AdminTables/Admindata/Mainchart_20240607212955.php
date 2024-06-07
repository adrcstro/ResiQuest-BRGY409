<?php
include __DIR__ . '/../../Connection.php';
if (!empty($_SESSION["AdminID"])) {
    $ID = $_SESSION["AdminID"];
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Subqueries to ensure accurate counts from both tables
    $sql = "
        SELECT 
            IFNULL(req.month, comp.month) AS month,
            req.request_count,
            comp.complaint_count
        FROM 
        (
            SELECT 
                DATE_FORMAT(DateRequested, '%Y-%m') AS month,
                COUNT(*) AS request_count
            FROM 
                requestdocument
            GROUP BY 
                DATE_FORMAT(DateRequested, '%Y-%m')
        ) AS req
        LEFT JOIN 
        (
            SELECT 
                DATE_FORMAT(DateofReport, '%Y-%m') AS month,
                COUNT(*) AS complaint_count
            FROM 
                complaintbl
            GROUP BY 
                DATE_FORMAT(DateofReport, '%Y-%m')
        ) AS comp
        ON req.month = comp.month
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
            $request_counts[] = $row["request_count"] ? (int)$row["request_count"] : 0;
            $complaint_counts[] = $row["complaint_count"] ? (int)$row["complaint_count"] : 0;
        }
    } else {
        echo "Error retrieving data from the database.";
    }
    $conn->close();
}
?>
