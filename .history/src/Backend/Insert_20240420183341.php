<?php
require '../Backend/Connection.php';


$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
if(!$conn){
  echo "Database connection error".mysqli_connect_error();
}





if (isset($_POST['firstnamebrgyResidency'], $_POST['MnamebrgyResidency'], $_POST['lastnamebrgyResidency'], $_POST['DaterequestedbrgyResidency'], $_POST['AddressdbrgyResidency'], $_POST['PurposebrgyResidency'], $_POST['ServicetypebrgyResidency'])) {
    // Collect form data for insertion
    $firstnamebrgyResidency = $_POST['firstnamebrgyResidency'];
    $MnamebrgyResidency = $_POST['MnamebrgyResidency'];
    $lastnamebrgyResidency = $_POST['lastnamebrgyResidency'];
    $DaterequestedbrgyResidency= $_POST['DaterequestedbrgyResidency'];
    $AddressdbrgyResidency = $_POST['AddressdbrgyResidency'];
    $PurposebrgyResidency = $_POST['PurposebrgyResidency'];
    $ServicetypebrgyResidency = $_POST['ServicetypebrgyResidency'];




    // Prepare and bind for insertion
    $stmt = $conn->prepare("INSERT INTO requestdocument (ResidentsName, Middlename, Lastname, ServiceType, DateRequested, Address, Purpose ) VALUES (?, ?, ?, ?, ?, ?, ?");
    $stmt->bind_param("sssssss",  $firstnamebrgyResidency,  $MnamebrgyResidency, $lastnamebrgyResidency, $ServicetypebrgyResidency, $DaterequestedbrgyResidency, $AddressdbrgyResidency, $PurposebrgyResidency);

    // Execute the insertion statement
    if ($stmt->execute() === TRUE) {
        echo "Document Request Submmited Succesfully";
    } else {
        echo "Error: " . $stmt . "<br>" . $conn->error;
    }

    // Close the insertion statement
}









