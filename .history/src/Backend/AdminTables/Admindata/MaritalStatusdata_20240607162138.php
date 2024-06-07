<?php
include __DIR__ . '/../../Connection.php';
if (!empty($_SESSION["AdminID"])) {
    $ID = $_SESSION["AdminID"];
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT 
                SUM(CASE WHEN CivilStatus = 'Married' THEN 1 ELSE 0 END) AS Marriedcount,
                SUM(CASE WHEN CivilStatus = 'Single' THEN 1 ELSE 0 END) AS Singlecount,
                SUM(CASE WHEN CivilStatus = 'Divorced' THEN 1 ELSE 0 END) AS Divorcedcount,
                SUM(CASE WHEN CivilStatus = 'Widowed' THEN 1 ELSE 0 END) AS Widowedcount,
                SUM(CASE WHEN CivilStatus = 'Separated' THEN 1 ELSE 0 END) AS Separatedcount
            FROM users";
    $result = $conn->query($sql);
    $counts = [];
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $counts[] = $row["Marriedcount"];
        $counts[] = $row["Singlecount"];
        $counts[] = $row["Divorcedcount"];
        $counts[] = $row["Widowedcount"];
        $counts[] = $row["Separatedcount"];
    } else {
        echo "Error retrieving data from the database.";
    }
    $conn->close();
}
?>
