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
    $DaterequestedbrgyResidenc = $_POST['DaterequestedbrgyResidency'];

    // Prepare and bind for insertion
    $stmt = $conn->prepare("INSERT INTO requestdocument (Admin, Username, DateCreated, Password) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $input1, $input2, $datePicker, $input3);

    // Execute the insertion statement
    if ($stmt->execute() === TRUE) {
        echo "Document Request Submmited Succesfully";
    } else {
        echo "Error: " . $stmt . "<br>" . $conn->error;
    }

    // Close the insertion statement
}









