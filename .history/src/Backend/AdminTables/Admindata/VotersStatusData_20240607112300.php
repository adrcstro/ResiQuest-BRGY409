<?php
include __DIR__ . '/../../Connection.php';
if (!empty($_SESSION["AdminID"])) {
    $ID = $_SESSION["AdminID"];
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT 
                SUM(CASE WHEN VoterStatus = 'Not Registered' THEN 1 ELSE 0 END) AS RegisteredCount,
                SUM(CASE WHEN VoterStatus = 'Registered' THEN 1 ELSE 0 END) AS NotRegisteredCount
            FROM users";
    $result = $conn->query($sql);
    $counts = [];
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $counts[] = $row["RegisteredCount"];
        $counts[] = $row["NotRegisteredCount"];
    } else {
        echo "Error retrieving data from the database.";
    }
    $conn->close();
}
?>
