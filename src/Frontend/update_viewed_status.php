<?php
include 'Sessiondetails.php'; 
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the senderID from the POST request
$data = json_decode(file_get_contents('php://input'), true);
$senderID = $data['senderID'];

// Update the viewed status for the messages from the specified sender
$sql = "UPDATE messages SET viewed = TRUE WHERE SenderID = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $senderID);
$stmt->execute();

// Check for errors
if ($stmt->error) {
    echo json_encode(['error' => $stmt->error]);
} else {
    echo json_encode(['success' => true]);
}

// Close connection
$stmt->close();
$conn->close();
?>
