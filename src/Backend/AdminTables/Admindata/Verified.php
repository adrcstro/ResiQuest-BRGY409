<?php
include __DIR__ . '/../../Connection.php';
if (!empty($_SESSION["AdminID"])) {
    $ID = $_SESSION["AdminID"];
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT 
                SUM(CASE WHEN Status = 'Verified' THEN 1 ELSE 0 END) AS VerifiedCount,
                SUM(CASE WHEN Status = 'NotVerified' THEN 1 ELSE 0 END) AS NotVerifiedCount
            FROM users";
    $result = $conn->query($sql);
    $counts = [];
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $counts[] = $row["VerifiedCount"];
        $counts[] = $row["NotVerifiedCount"];
    } else {
        echo "Error retrieving data from the database.";
    }
    $conn->close();
}
?>
