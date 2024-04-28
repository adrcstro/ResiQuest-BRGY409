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

    // Generate a unique random number for RequestID
    $RequestID = generateUniqueRandomNumber($conn, 'requestdocument', 'RequestID');

    // Prepare and bind for insertion
    $stmt = $conn->prepare("INSERT INTO requestdocument (RequestID, FirstName, Middlename, Lastname, ServiceType, DateRequested, Address, Purpose) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("isssssss", $RequestID, $firstnamebrgyResidency, $MnamebrgyResidency, $lastnamebrgyResidency, $ServicetypebrgyResidency, $DaterequestedbrgyResidency, $AddressdbrgyResidency, $PurposebrgyResidency);

    // Execute the insertion statement
    if ($stmt->execute() === TRUE) {
        echo "Document Request for Certificate of Residency Submitted Successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the insertion statement
    $stmt->close();
}

// Close the connection



if (isset($_POST['firstnamebrgyIndigency'], $_POST['MnamebrgyIndigency'], $_POST['lastnamebrgyIndigency'], $_POST['ServicetypebrgyIndigency'], $_POST['DaterequestedbrgyIndigency'], $_POST['AddressbrgyIndigency'], $_POST['PurposebrgyIndigency'])) {
    // Collect form data for insertion
    $firstnamebrgyIndigency = $_POST['firstnamebrgyIndigency'];
    $MnamebrgyIndigency = $_POST['MnamebrgyIndigency'];
    $lastnamebrgyIndigency = $_POST['lastnamebrgyIndigency'];
    $ServicetypebrgyIndigency = $_POST['ServicetypebrgyIndigency'];
    $DaterequestedbrgyIndigency = $_POST['DaterequestedbrgyIndigency'];
    $AddressbrgyIndigency = $_POST['AddressbrgyIndigency'];
    $PurposebrgyIndigency = $_POST['PurposebrgyIndigency'];

    // Generate a unique random number for RequestID
    $RequestIDIndigency = generateUniqueRandomNumber($conn, 'requestdocument', 'RequestID');

    // Prepare and bind for insertion
    $stmt = $conn->prepare("INSERT INTO requestdocument (RequestID, FirstName, Middlename, Lastname, ServiceType, DateRequested, Address, Purpose) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("isssssss", $RequestIDIndigency , $firstnamebrgyIndigency, $MnamebrgyIndigency,  $lastnamebrgyIndigency,  $ServicetypebrgyIndigency, $DaterequestedbrgyIndigency,$AddressbrgyIndigency,  $PurposebrgyIndigency);

    // Execute the insertion statement
    if ($stmt->execute() === TRUE) {
        echo "Document Request for Certificate of Indigency Submitted Successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the insertion statement
    $stmt->close();
}

// Close the connection


if (isset($_POST['firstnamebrgyIndigency'], $_POST['MnamebrgyIndigency'], $_POST['lastnamebrgyIndigency'], $_POST['ServicetypebrgyIndigency'], $_POST['DaterequestedbrgyIndigency'], $_POST['AddressbrgyIndigency'], $_POST['PurposebrgyIndigency'])) {
    // Collect form data for insertion
    $firstnamebrgyIndigency = $_POST['firstnamebrgyIndigency'];
    $MnamebrgyIndigency = $_POST['MnamebrgyIndigency'];
    $lastnamebrgyIndigency = $_POST['lastnamebrgyIndigency'];
    $ServicetypebrgyIndigency = $_POST['ServicetypebrgyIndigency'];
    $DaterequestedbrgyIndigency = $_POST['DaterequestedbrgyIndigency'];
    $AddressbrgyIndigency = $_POST['AddressbrgyIndigency'];
    $PurposebrgyIndigency = $_POST['PurposebrgyIndigency'];

    // Generate a unique random number for RequestID
    $RequestIDIndigency = generateUniqueRandomNumber($conn, 'requestdocument', 'RequestID');

    // Prepare and bind for insertion
    $stmt = $conn->prepare("INSERT INTO requestdocument (RequestID, FirstName, Middlename, Lastname, ServiceType, DateRequested, Address, Purpose) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("isssssss", $RequestIDIndigency , $firstnamebrgyIndigency, $MnamebrgyIndigency,  $lastnamebrgyIndigency,  $ServicetypebrgyIndigency, $DaterequestedbrgyIndigency,$AddressbrgyIndigency,  $PurposebrgyIndigency);

    // Execute the insertion statement
    if ($stmt->execute() === TRUE) {
        echo "Document Request for Certificate of Indigency Submitted Successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the insertion statement
    $stmt->close();
}

// Close the connection




// Function to generate unique random number
function generateUniqueRandomNumber($conn, $table, $column)
{
    $isUnique = false;
    $randomNumber = 0;
    while (!$isUnique) {
        $randomNumber = rand(100000, 999999); // Generate a random 6-digit number
        $result = $conn->query("SELECT * FROM $table WHERE $column = $randomNumber");
        if ($result->num_rows == 0) {
            $isUnique = true;
        }
    }
    return $randomNumber;
}






