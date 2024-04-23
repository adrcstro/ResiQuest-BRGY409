<?php
require 'Connection.php';

$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['firstnamebrgyResidency'], $_POST['MnamebrgyResidency'], $_POST['lastnamebrgyResidency'], $_POST['ServicetypebrgyResidency'], $_POST['DaterequestedbrgyResidency'], $_POST['AddressdbrgyResidency'], $_POST['PurposebrgyResidency'])) {
    // Collect form data for insertion
    $firstnamebrgyResidency = $_POST['firstnamebrgyResidency'];
    $MnamebrgyResidency = $_POST['MnamebrgyResidency'];
    $lastnamebrgyResidency = $_POST['lastnamebrgyResidency'];
    $ServicetypebrgyResidency = $_POST['ServicetypebrgyResidency'];
    $DaterequestedbrgyResidency= $_POST['DaterequestedbrgyResidency'];
    $AddressdbrgyResidency = $_POST['AddressdbrgyResidency'];
    $PurposebrgyResidency = $_POST['PurposebrgyResidency'];

    // Generate a unique random alphanumeric ID for RequestID
    $RequestID = generateUniqueRandomNumber($conn, 'requestdocument', 'RequestID');

    // Prepare and bind for insertion
    $stmt = $conn->prepare("INSERT INTO requestdocument (RequestID, ResidentsName, Middlename, Lastname, ServiceType, DateRequested, Address, Purpose) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssss", $RequestID, $firstnamebrgyResidency, $MnamebrgyResidency, $lastnamebrgyResidency, $ServicetypebrgyResidency, $DaterequestedbrgyResidency, $AddressdbrgyResidency, $PurposebrgyResidency);

    // Execute the insertion statement
    if ($stmt->execute() === TRUE) {
        echo "Document Request Submitted Successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the insertion statement
    $stmt->close();
}

// Close the connection
$conn->close();

// Function to generate unique random alphanumeric ID
// Function to generate unique random alphanumeric ID
function generateUniqueRandomNumber($conn, $table, $column)
{
    $isUnique = false;
    $randomID = '';
    $letters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ'; // Letters to choose from
    $numbers = '0123456789'; // Numbers to choose from
    $characters = $letters . $numbers; // Combine letters and numbers
    while (!$isUnique) {
        $randomID = '';
        // Choose at least one letter
        $randomID .= $letters[rand(0, strlen($letters) - 1)];
        // Choose remaining characters randomly
        for ($i = 0; $i < 5; $i++) {
            $randomID .= $characters[rand(0, strlen($characters) - 1)]; // Choose a random character
        }
        $result = $conn->query("SELECT * FROM $table WHERE $column = '$randomID'");
        if ($result->num_rows == 0) {
            $isUnique = true;
        }
    }
    return $randomID;
}
