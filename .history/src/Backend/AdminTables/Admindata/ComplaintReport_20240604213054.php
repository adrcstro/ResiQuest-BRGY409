<?php
include __DIR__ . '/../Connection.php'; 

if (!empty($_SESSION["AdminID"])) {
    $ID = $_SESSION["AdminID"];
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT DateRequested, COUNT(*) AS total FROM requestdocument GROUP BY DateRequested ORDER BY DateRequested";
    $result = $conn->query($sql);

    $data = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    } else {
        echo "Error retrieving data from the database.";
    }
    
    $conn->close();
    
    echo json_encode($data);
}
?>
