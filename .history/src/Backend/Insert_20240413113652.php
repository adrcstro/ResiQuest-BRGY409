<?php
require '../Backend/Connection.php';


$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
if(!$conn){
  echo "Database connection error".mysqli_connect_error();
}








if (isset($_POST['first-name'], $_POST['Middle-name'], $_POST['last-name'], $_POST['Nick-name'], $_POST['PlaceofBirth'], $_POST['Birthdate'], $_POST['Age'] , $_POST['civil-status'] , $_POST['Gender'], $_POST['purok'], $_POST['voter-status'] , $_POST['email'] , $_POST['Occupation'] , $_POST['Contact-Number'], $_POST['Address'] , $_POST['Zip-Code'] , $_POST['Citizenship'])) {
    $firstname = $_POST['first-name'];
    $Middlename = $_POST['Middle-name'];
    $lastname = $_POST['last-name'];
    $Nickname = $_POST['Nick-name'];
    $PlaceofBirth = $_POST['PlaceofBirth'];
    $Birthdate = $_POST['Birthdate'];
    $Age = $_POST['Age'];
    $civilstatus = $_POST['civil-status'];
    $Gender = $_POST['Gender'];
    $purok = $_POST['purok'];
    $voterstatus = $_POST['voter-status'];
    $email = $_POST['email'];
    $Occupation = $_POST['Occupation'];
    $ContactNumber = $_POST['Contact-Number'];
    $Address = $_POST['Address'];
    $ZipCode = $_POST['Zip-Code'];
    $Citizenship = $_POST['Citizenship'];




    
    $PRofileFile = $_FILES['PRofile']['name'];
    $PRofileTmp = $_FILES['PRofile']['tmp_name'];
    $GovernmentIDFile = $_FILES['Government-ID']['name'];
    $GovernmentIDTmp = $_FILES['Government-ID']['tmp_name'];
    
    

    // File upload functionality
    $GovernmentID = isset($_FILES['Government-ID']['name']) ? $_FILES['Government-ID']['name'] : '';
    $PRofile = isset($_FILES['PRofile']['name']) ? $_FILES['PRofile']['name'] : '';

    // SQL query to insert data into the database
    $sql = "INSERT INTO users (fname, Mname, lname, ContactNumber, Gender, email, Nickname, PlaceofBirth, Dateofbirth, Age, CivilStatus, Purok, VoterStatus, Occupation, Address,Zipcode , Citezenship, Profile, GovernmentID ) VALUES (?, ?, ?, ?, ?, ?, ?,?,?,?, ?, ?, ?, ?, ?, ?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sssssssssssssssssss', $firstname, $Middlename, $lastname, $Nickname, $PlaceofBirth, $Birthdate, $Age, $civilstatus,$Gender ,$purok,$voterstatus,$email,$Occupation, $ContactNumber,$Address,$ZipCode,$Citizenship );

    if ($stmt->execute()) {


        move_uploaded_file($PRofileTmp , "uploads/" . $PRofileFile);

        // Process Driver's License file
        move_uploaded_file($GovernmentIDTmp, "uploads/" . $GovernmentIDFile);
        
        // Process Vehicle Registration file
       


     
        echo "Information Submitted Successfully. \n Wait 2-3 working days to verify you Information.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
  
}














