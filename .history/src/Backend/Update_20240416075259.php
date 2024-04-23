<?php
require '../Backend/Connection.php';

$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['ResidentID'])) {
    $ResidentID = $_POST['ResidentID'];

    // Your other variables remain unchanged
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
    // These variables are arrays to store multiple filenames
    $PRofile = $_FILES['PRofile']['name'];
    $GovernmentID = $_FILES['Government-ID']['name'];

    if (!empty($ResidentID)) {
        // Update query
        $stmt = $conn->prepare("UPDATE users SET fname=?, Mname=?, lname=?, ContactNumber=?, Gender=?, email=?, Nickname=?, PlaceofBirth=?, Dateofbirth=? , Age=? , CivilStatus=? , Purok=? , VoterStatus=? , Occupation=? , Address=? , Zipcode=? , Citezenship=? , Profile=? , GovernmentID=?   WHERE ID=?");
        // Bind parameters
        $stmt->bind_param("ssssssssssssssssssss", $firstname, $Middlename, $lastname, $ContactNumber, $Gender, $email, $Nickname, $PlaceofBirth, $Birthdate, $Age, $civilstatus, $purok, $voterstatus, $Occupation, $Address, $ZipCode, $Citizenship, $PRofile, $GovernmentID, $ResidentID);
        if ($stmt->execute()) {
            // Move uploaded files to the uploads folder
            foreach ($_FILES['PRofile']['tmp_name'] as $key => $tmp_name) {
                $target_file = "uploads/" . basename($_FILES['PRofile']['name'][$key]);
                move_uploaded_file($tmp_name, $target_file);
            }
            foreach ($_FILES['Government-ID']['tmp_name'] as $key => $tmp_name) {
                $target_file = "uploads/" . basename($_FILES['Government-ID']['name'][$key]);
                move_uploaded_file($tmp_name, $target_file);
            }
            echo "Application submitted successfully";
        } else {
            echo "Error updating record: " . $conn->error;
        }
        $stmt->close();
    } else {
        echo "Please select a resident to update";
    }
}
?>
