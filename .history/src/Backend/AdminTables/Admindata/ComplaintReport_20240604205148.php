<?php
header('Content-Type: application/json');

$servername = "your_servername";
$username = "your_username";
$password = "your_password";
$dbname = "your_dbname";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT DateRequested, COUNT(*) AS total FROM requestdocument GROUP BY DateRequested";
$result = $conn->query($sql);

$data = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
} else {
    $data[] = ["DateRequested" => "No data", "total" => 0];
}

echo json_encode($data);

$conn->close();
?>
