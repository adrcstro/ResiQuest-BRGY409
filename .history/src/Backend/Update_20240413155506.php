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
    $driverAge = $_POST['DriverAge'];
    $driversPlanteNumber = $_POST['DriverPlanteNumber'];
    $driversDriversLicense = $_FILES['DriversDriversLicense']['name'];
    $driversVehicleRegistration = $_FILES['DriverVehicleRegistration']['name'];
    $driversPermittoOperate = $_FILES['DriversPermittoOperate']['name'];
    $driversPhoneNumber = $_POST['DriversPhoneNumber'];
    $driversHomeAddress = $_POST['DriversHomeAddress'];

    if (!empty($ResidentID)) {
        $stmt = $conn->prepare("UPDATE driverstbl SET Age=?, Password=?, DriversLicense=?, VehicleRegistration=?, PermittoOperate=?, PhoneNumber=?, HomeAddress=?  WHERE Username=?");
        $stmt->bind_param("ssssssss", $driverAge, $driversPlanteNumber, $driversDriversLicense, $driversVehicleRegistration, $driversPermittoOperate, $driversPhoneNumber, $driversHomeAddress,$ResidentID);

        if ($stmt->execute()) {
            // Move uploaded files to the specified directory
            move_uploaded_file($_FILES['DriversDriversLicense']['tmp_name'], "uploads/" . $driversDriversLicense);
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
