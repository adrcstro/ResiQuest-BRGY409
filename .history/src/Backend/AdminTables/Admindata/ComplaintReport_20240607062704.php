<?php
include __DIR__ . '/../Connection.php';
$data = [];

if (!empty($_SESSION["AdminID"])) {
    $ID = $_SESSION["AdminID"];
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT DATE(DateRequested) as date, COUNT(*) AS total FROM requestdocument GROUP BY DATE(DateRequested)";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }

    $conn->close();
} else {
    echo "Unauthorized access";
    exit;
}

?>