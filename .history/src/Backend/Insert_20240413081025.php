<?php
require '../Backend/Connection.php';


$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
if(!$conn){
  echo "Database connection error".mysqli_connect_error();
}








if (isset($_POST['Username'], $_POST['Age'], $_POST['Password'], $_POST['PhoneNumber'], $_POST['HomeAddress'])) {
    $Username = $_POST['Username'];
    $Age = $_POST['Age'];
    $Password = $_POST['Password'];
    $PhoneNumber = $_POST['PhoneNumber'];
    $HomeAddress = $_POST['HomeAddress'];

    $permitToOperateFile = $_FILES['PRofile']['name'];
    $permitToOperateTmp = $_FILES['PRofile']['tmp_name'];
    
    $driversLicenseFile = $_FILES['Government-ID']['name'];
    $driversLicenseTmp = $_FILES['Government-ID']['tmp_name'];
    
    

    // File upload functionality
    $DriversLicense = isset($_FILES['Government-ID']['name']) ? $_FILES['Government-ID']['name'] : '';
    $PermittoOperate = isset($_FILES['PRofile']['name']) ? $_FILES['PRofile']['name'] : '';

    // SQL query to insert data into the database
    $sql = "INSERT INTO driverstbl (Username, Age, Password, DriversLicense, VehicleRegistration, PermittoOperate, PhoneNumber, HomeAddress) VALUES (?, ?, ?, ?, ?, ?, ?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssssssss', $Username, $Age, $Password, $DriversLicense, $VehicleRegistration, $PermittoOperate, $PhoneNumber, $HomeAddress);

    if ($stmt->execute()) {


        move_uploaded_file($permitToOperateTmp, "uploads/" . $permitToOperateFile);

        // Process Driver's License file
        move_uploaded_file($driversLicenseTmp, "uploads/" . $driversLicenseFile);
        
        // Process Vehicle Registration file
        move_uploaded_file($vehicleRegistrationTmp, "uploads/" . $vehicleRegistrationFile);




     
        echo "Your record created successfully. \nYour name serves as your Username and PlateNumber serves as your Password.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
  
}
















?>