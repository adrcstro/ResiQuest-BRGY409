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
        $stmt = $conn->prepare("UPDATE users SET fname=?, Mname=?, lname=?, ContactNumber=?, Gender=?, email=?, Nickname=?, PlaceofBirth=?, Dateofbirth=? , Age=? , CivilStatus=? , Purok=? , VoterStatus=? , Occupation=? , Address=? , Zipcode=? , Citezenship=? , Profile=? , GovernmentID=?   WHERE ID=?");
        $stmt->bind_param("ssssssssssssssssssss",  $firstname, $Middlename, $lastname, $Nickname,  $PlaceofBirth, $Birthdate, $Age, $civilstatus, $Gender,  $purok,  $voterstatus,  $email, $Occupation, $ContactNumber, $Address, $ZipCode, $Citizenship,  $PRofile, $GovernmentID , $ResidentID);

        if ($stmt->execute()) {
            // Move uploaded files to the specified directory
          
            move_uploaded_file($_FILES['PRofile']['tmp_name'], "uploads/" . $PRofile);
            move_uploaded_file($_FILES['Government-ID']['tmp_name'], "uploads/" .  $GovernmentID);

            echo "Application SUbmmited succesfully";
        } else {
            echo "Error updating driver record: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Please select a driver to update";
    }
}
