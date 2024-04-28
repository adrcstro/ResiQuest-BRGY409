<?php
require 'Connection.php';

$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//BRGY RESIDENCY PHP
if (isset($_POST['UserIDbrgyResidency'], $_POST['firstnamebrgyResidency'], $_POST['MnamebrgyResidency'], $_POST['lastnamebrgyResidency'], $_POST['ServicetypebrgyResidency'], $_POST['DaterequestedbrgyResidency'], $_POST['AddressdbrgyResidency'], $_POST['PurposebrgyResidency'], $_POST['DocumentStatbrgyResidency'])) {
    // Collect form data for insertion
    $UserIDbrgyResidency = $_POST['UserIDbrgyResidency'];
    $firstnamebrgyResidency = $_POST['firstnamebrgyResidency'];
    $MnamebrgyResidency = $_POST['MnamebrgyResidency'];
    $lastnamebrgyResidency = $_POST['lastnamebrgyResidency'];
    $ServicetypebrgyResidency = $_POST['ServicetypebrgyResidency'];
    $DaterequestedbrgyResidency= $_POST['DaterequestedbrgyResidency'];
    $AddressdbrgyResidency = $_POST['AddressdbrgyResidency'];
    $PurposebrgyResidency = $_POST['PurposebrgyResidency'];
    $DocumentStatbrgyResidency = $_POST['DocumentStatbrgyResidency'];
    // Generate a unique random number for RequestID
    $RequestID = generateUniqueRandomNumber($conn, 'requestdocument', 'RequestID');

    // Prepare and bind for insertion
    $stmt = $conn->prepare("INSERT INTO requestdocument (RequestID, UserID, FirstName, Middlename, Lastname, ServiceType, DateRequested, Address, Purpose, Status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("isssssssss", $RequestID, $UserIDbrgyResidency, $firstnamebrgyResidency, $MnamebrgyResidency, $lastnamebrgyResidency, $ServicetypebrgyResidency, $DaterequestedbrgyResidency, $AddressdbrgyResidency, $PurposebrgyResidency, $DocumentStatbrgyResidency);

    // Execute the insertion statement
    if ($stmt->execute() === TRUE) {
        echo "Document Request for Certificate of Residency Submitted Successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the insertion statement
    $stmt->close();
}

// BRGY INDIGENCY PHP



if (isset($_POST['UserIDbrgyIndigency'], $_POST['firstnamebrgyIndigency'], $_POST['MnamebrgyIndigency'], $_POST['lastnamebrgyIndigency'], $_POST['ServicetypebrgyIndigency'], $_POST['DaterequestedbrgyIndigency'], $_POST['AddressbrgyIndigency'], $_POST['PurposebrgyIndigency'], $_POST['DocStatusbrgyIndigency'])) {
    $UserIDbrgyIndigency  = $_POST['UserIDbrgyIndigency'];
    $firstnamebrgyIndigency = $_POST['firstnamebrgyIndigency'];
    $MnamebrgyIndigency = $_POST['MnamebrgyIndigency'];
    $lastnamebrgyIndigency = $_POST['lastnamebrgyIndigency'];
    $ServicetypebrgyIndigency = $_POST['ServicetypebrgyIndigency'];
    $DaterequestedbrgyIndigency = $_POST['DaterequestedbrgyIndigency'];
    $AddressbrgyIndigency = $_POST['AddressbrgyIndigency'];
    $PurposebrgyIndigency = $_POST['PurposebrgyIndigency'];
    $DocStatusbrgyIndigency = $_POST['DocStatusbrgyIndigency'];
    // Generate a unique random number for RequestID
    $RequestIDIndigency = generateUniqueRandomNumber($conn, 'requestdocument', 'RequestID');

    // Prepare and bind for insertion
    $stmt = $conn->prepare("INSERT INTO requestdocument (RequestID, UserID, FirstName, Middlename, Lastname, ServiceType, DateRequested, Address, Purpose , Status) VALUES (?, ?, ?, ?, ?, ?, ?, ?,?,?)");
    $stmt->bind_param("isssssssss", $RequestIDIndigency , $UserIDbrgyIndigency, $firstnamebrgyIndigency, $MnamebrgyIndigency,  $lastnamebrgyIndigency,  $ServicetypebrgyIndigency, $DaterequestedbrgyIndigency,$AddressbrgyIndigency,  $PurposebrgyIndigency,$DocStatusbrgyIndigency);

    // Execute the insertion statement
    if ($stmt->execute() === TRUE) {
        echo "Document Request for Certificate of Indigency Submitted Successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the insertion statement
    $stmt->close();
}

// BRGY ID PHP


if (isset($_POST['firstnamebrgyID'], $_POST['MnamebrgyID'], $_POST['lastnamebrgyID'], $_POST['DateofbirthbrgyID'], $_POST['PlaceofBirthbrgyID'], $_POST['CivilStatisbrgyID'], $_POST['SSSGSISbrgyID'], $_POST['DaterequestedbrgyID'], $_POST['AddressbrgyID'], $_POST['ContactpersonNamebrgyID'], $_POST['ContactpersonAddressbrgyID'], $_POST['ContactpersonnumberbrgyID'], $_POST['ServicetypebrgyID'], $_POST['DocStatbrgyID'])) {
    // Collect form data for insertion
    $firstnamebrgyID = $_POST['firstnamebrgyID'];
    $MnamebrgyID = $_POST['MnamebrgyID'];
    $lastnamebrgyID  = $_POST['lastnamebrgyID'];
    $ServicetypebrgyID = $_POST['ServicetypebrgyID'];
    $DaterequestedbrgyID = $_POST['DaterequestedbrgyID'];
    $AddressbrgyID = $_POST['AddressbrgyID'];
    $DateofbirthbrgyID = $_POST['DateofbirthbrgyID'];
    $PlaceofBirthbrgyID = $_POST['PlaceofBirthbrgyID'];
    $CivilStatisbrgyID = $_POST['CivilStatisbrgyID'];
    $SSSGSISbrgyID = $_POST['SSSGSISbrgyID'];
    $ContactpersonNamebrgyID  = $_POST['ContactpersonNamebrgyID'];
    $ContactpersonAddressbrgyID = $_POST['ContactpersonAddressbrgyID'];
    $ContactpersonnumberbrgyID = $_POST['ContactpersonnumberbrgyID'];
    $DocStatbrgyID = $_POST['DocStatbrgyID'];

  
    // Generate a unique random number for RequestID
    $RequestBRGYID = generateUniqueRandomNumber($conn, 'requestdocument', 'RequestID');

    // Prepare and bind for insertion
    $stmt = $conn->prepare("INSERT INTO requestdocument (RequestID, FirstName, Middlename, Lastname, ServiceType, DateRequested, Address, DateofBirth, PlaceofBirth, Civilstat, SSSGSIS, Contactname, Contactaddress ,Contactnum, Status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?,?)");
    $stmt->bind_param("issssssssssssss", $RequestBRGYID ,$firstnamebrgyID , $MnamebrgyID,  $lastnamebrgyID , $ServicetypebrgyID ,  $DaterequestedbrgyID ,  $AddressbrgyID ,$DateofbirthbrgyID,   $PlaceofBirthbrgyID, $CivilStatisbrgyID,  $SSSGSISbrgyID ,   $ContactpersonNamebrgyID,   $ContactpersonAddressbrgyID, $ContactpersonnumberbrgyID, $DocStatbrgyID);

    // Execute the insertion statement
    if ($stmt->execute() === TRUE) {
        echo "Document Request for Barangay Identification Submitted Successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the insertion statement
    $stmt->close();
}

// Close the connection



//BRGY CLEARANCE PHP

if (isset($_POST['UserIDBGClerance'],$_POST['firstnamebrgyBClearance'], $_POST['MnameBClearance'], $_POST['lastnameBClearance'], $_POST['BusinessNameBClearance'], $_POST['BusinessLocBClearance'], $_POST['DateReqBClearance'], $_POST['HomeAddBClearance'], $_POST['ServicetyBClearance'], $_POST['DocStatusBClearance'])) {
    // Collect form data for insertion


    $UserIDBGClerance = $_POST['UserIDBGClerance'];
    $firstnamebrgyBClearance = $_POST['firstnamebrgyBClearance'];
    $MnameBClearance = $_POST['MnameBClearance'];
    $lastnameBClearance = $_POST['lastnameBClearance'];
    $ServicetyBClearance = $_POST['ServicetyBClearance'];
    $DateReqBClearance = $_POST['DateReqBClearance'];
    $HomeAddBClearance = $_POST['HomeAddBClearance'];
    $BusinessNameBClearance = $_POST['BusinessNameBClearance'];
    $BusinessLocBClearance = $_POST['BusinessLocBClearance'];
    $DocStatusBClearance = $_POST['DocStatusBClearance'];
   
   
    // Generate a unique random number for RequestID
    $RequestBClearance = generateUniqueRandomNumber($conn, 'requestdocument', 'RequestID');

    // Prepare and bind for insertion
    $stmt = $conn->prepare("INSERT INTO requestdocument (RequestID, UserID, FirstName, Middlename, Lastname, ServiceType, DateRequested, Address, BusinessAct, BusinessLoc ,Status ) VALUES (?, ?, ?, ?, ?, ?, ?, ?,?, ?,?)");
    $stmt->bind_param("issssssssss",  $RequestBClearance , $UserIDBGClerance , $firstnamebrgyBClearance,$MnameBClearance, $lastnameBClearance,  $ServicetyBClearance, $DateReqBClearance ,  $HomeAddBClearance,  $BusinessNameBClearance, $BusinessLocBClearance,  $DocStatusBClearance);

    // Execute the insertion statement
    if ($stmt->execute() === TRUE) {
        echo "Document Request for Barangay Identification Submitted Successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the insertion statement
    $stmt->close();
}
































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






