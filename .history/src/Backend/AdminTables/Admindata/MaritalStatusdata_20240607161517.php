<?php
include __DIR__ . '/../../Connection.php';
if (!empty($_SESSION["AdminID"])) {
    $ID = $_SESSION["AdminID"];
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT 
                SUM(CASE WHEN Status = 'CivilStatus' THEN 1 ELSE 0 END) AS Married,
                SUM(CASE WHEN Status = 'CivilStatus' THEN 1 ELSE 0 END) AS Single,
                SUM(CASE WHEN Status = 'CivilStatus' THEN 1 ELSE 0 END) AS Divorced,
                SUM(CASE WHEN Status = 'CivilStatus' THEN 1 ELSE 0 END) AS Widowed,
                SUM(CASE WHEN Status = 'CivilStatus' THEN 1 ELSE 0 END) AS Separated
            FROM users";
    $result = $conn->query($sql);
    $counts = [];
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $counts[] = $row["Married"];
        $counts[] = $row["Single"];
        $counts[] = $row["Divorced"];
        $counts[] = $row["Widowed"];
        $counts[] = $row["Separated"];
    } else {
        echo "Error retrieving data from the database.";
    }
    $conn->close();
}
?>
