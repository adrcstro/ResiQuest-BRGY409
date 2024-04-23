<?php
require '../Backend/Connection.php';


$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
if(!$conn){
  echo "Database connection error".mysqli_connect_error();
}


if (isset($_POST['ResidentID'])) {
    $ResidentID = $_POST['ResidentID'];

    $firstname = $_POST['first-name'];
    $Middlename = $_POST['Middle-name'];
    $lastname = $_POST['last-name'];
    $Nickname = $_POST['Nick-name'];
    $PlaceofBirth = $_POST['PlaceofBirth'];
    $Birthdate = $_POST['Birthdate'];
    $Age = $_POST['Age'];
    $civilstatus = $_POST['civil-status'];
    $Gender = $_POST['Gender'];
    $purok= $_POST['purok'];
    $voterstatus = $_POST['voter-status'];
    $email = $_POST['email'];
    $Occupation = $_POST['Occupation'];
    $ContactNumber = $_POST['Contact-Number'];
    $Address = $_POST['Address'];
    $ZipCode = $_POST['Zip-Code'];
    $Citizenship = $_POST['Citizenship'];
    $PRofile = $_FILES['PRofile']['name'];
    $GovernmentID = $_FILES['Government-ID']['name'];
   
    if (!empty($ResidentID)) {
        $stmt = $conn->prepare("UPDATE driverstbl SET Age=?, Password=?, DriversLicense=?, VehicleRegistration=?, PermittoOperate=?, PhoneNumber=?, HomeAddress=?  WHERE ID=?");
        $stmt->bind_param("ssssssss", $driverAge, $driversPlanteNumber, $driversDriversLicense, $driversVehicleRegistration, $driversPermittoOperate, $driversPhoneNumber, $driversHomeAddress,$ResidentID);

        if ($stmt->execute()) {
            // Move uploaded files to the specified directory
          
            move_uploaded_file($_FILES['DriverVehicleRegistration']['tmp_name'], "uploads/" . $driversVehicleRegistration);
            move_uploaded_file($_FILES['DriversPermittoOperate']['tmp_name'], "uploads/" . $driversPermittoOperate);

            echo "Driver record updated successfully";
        } else {
            echo "Error updating driver record: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Please select a driver to update";
    }
}
