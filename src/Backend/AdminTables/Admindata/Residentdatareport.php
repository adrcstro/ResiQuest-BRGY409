<?php
include __DIR__ . '/../../Connection.php';
if (!empty($_SESSION["AdminID"])) {
    $ID = $_SESSION["AdminID"];
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT 
                SUM(CASE WHEN Gender = 'Male' THEN 1 ELSE 0 END) AS MaleCount,
                SUM(CASE WHEN Gender = 'Female' THEN 1 ELSE 0 END) AS FemaleCount
            FROM users";
    $result = $conn->query($sql);
    $counts = [];
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $counts[] = $row["MaleCount"];
        $counts[] = $row["FemaleCount"];
    } else {
        echo "Error retrieving data from the database.";
    }
    $conn->close();
}
?>
