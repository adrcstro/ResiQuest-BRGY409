<?php
 // Ensure session is started
 include __DIR__ . '/../Connection.php';
header('Content-Type: application/json'); // Set the content type to JSON
if (!empty($_SESSION["AdminID"])) {
    $ID = $_SESSION["AdminID"];
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die(json_encode(["error" => "Connection failed: " . $conn->connect_error]));
    }

    $sql = "SELECT DATE(DateRequested) as date, COUNT(*) AS total FROM requestdocument GROUP BY DATE(DateRequested)";
    $result = $conn->query($sql);

    $data = [];
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        echo json_encode($data);
    } else {
        echo json_encode(["error" => "No data found"]);
    }

    $conn->close();
} else {
    echo json_encode(["error" => "Unauthorized access"]);
}
?>
