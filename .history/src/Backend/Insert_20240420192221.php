<?php
require 'Connection.php';

$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Database connection error: " . $conn->connect_error);
}

if (isset($_POST['firstnamebrgyResidency'], $_POST['MnamebrgyResidency'], $_POST['lastnamebrgyResidency'], $_POST['ServicetypebrgyResidency'], $_POST['DaterequestedbrgyResidency'], $_POST['AddressdbrgyResidency'], $_POST['PurposebrgyResidency'])) {
    // Function to generate a unique RequestID
    function generateUniqueRequestID($conn, $length = 8) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $isUnique = false;
        $RequestID = '';
        while (!$isUnique) {
            $RequestID = '';
            for ($i = 0; $i < $length; $i++) {
                $RequestID .= $characters[rand(0, strlen($characters) - 1)];
            }
            // Check if RequestID already exists in the database
            $stmt_check = $conn->prepare("SELECT * FROM requestdocument WHERE RequestID = ?");
            $stmt_check->bind_param("s", $RequestID);
            $stmt_check->execute();
            $result = $stmt_check->get_result();
            if ($result->num_rows == 0) {
                $isUnique = true;
            }
            $stmt_check->close();
        }
        return $RequestID;
    }

    // Generate a unique RequestID
    $RequestID = generateUniqueRequestID($conn);

    // Collect form data for insertion
    $firstnamebrgyResidency = $_POST['firstnamebrgyResidency'];
    $MnamebrgyResidency = $_POST['MnamebrgyResidency'];
    $lastnamebrgyResidency = $_POST['lastnamebrgyResidency'];
    $ServicetypebrgyResidency = $_POST['ServicetypebrgyResidency'];
    $DaterequestedbrgyResidency = $_POST['DaterequestedbrgyResidency'];
    $AddressdbrgyResidency = $_POST['AddressdbrgyResidency'];
    $PurposebrgyResidency = $_POST['PurposebrgyResidency'];

    // Prepare and bind for insertion
    $stmt = $conn->prepare("INSERT INTO requestdocument (RequestID, ResidentsName, Middlename, Lastname, ServiceType, DateRequested, Address, Purpose) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssss", $RequestID, $firstnamebrgyResidency, $MnamebrgyResidency, $lastnamebrgyResidency, $ServicetypebrgyResidency, $DaterequestedbrgyResidency, $AddressdbrgyResidency, $PurposebrgyResidency);

    // Execute the insertion statement
    if ($stmt->execute() === TRUE) {
        echo "Document Request Submitted Successfully with RequestID: " . $RequestID;
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the insertion statement
    $stmt->close();
}

// Close the database connection
$conn->close();
?>
