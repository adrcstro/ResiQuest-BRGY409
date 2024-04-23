

<?php
require 'Connection.php';

$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if (!$conn) {
    echo "Database connection error" . mysqli_connect_error();
}

if (isset($_POST['ResidentID'])) {
    $ResidentID = $_POST['ResidentID'];

    // Retrieve existing profile and government ID
    $sql = "SELECT Profile, GovernmentIDFront, GovernmentIDBack  FROM users WHERE ID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $ResidentID);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $existingProfile = $row['Profile'];
    $existingGovernmentID = $row['GovernmentIDFront'];
    $existingGovernmentIDBack = $row['GovernmentIDBack'];
    $stmt->close();

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
    $PRofile = !empty($_FILES['PRofile']['name']) ? $_FILES['PRofile']['name'] : $existingProfile;
    $GovernmentID = !empty($_FILES['Government-ID']['name']) ? $_FILES['Government-ID']['name'] : $existingGovernmentID;
    $GovernmentIDBack = !empty($_FILES['Government-ID-back']['name']) ? $_FILES['Government-ID-back']['name'] : $existingGovernmentIDBack;


    if (!empty($ResidentID)) {
        $stmt = $conn->prepare("UPDATE users SET fname=?, Mname=?, lname=?, ContactNumber=?, Gender=?, email=?, Nickname=?, PlaceofBirth=?, Dateofbirth=?, Age=?, CivilStatus=?, Purok=?, VoterStatus=?, Occupation=?, Address=?, Zipcode=?, Citezenship=?, Profile=?, GovernmentIDFront=? , GovernmentIDBack=?  WHERE ID=?");
        $stmt->bind_param("sssssssssssssssssssss", $firstname, $Middlename, $lastname, $ContactNumber, $Gender, $email, $Nickname, $PlaceofBirth, $Birthdate, $Age, $civilstatus, $purok, $voterstatus, $Occupation, $Address, $ZipCode, $Citizenship, $PRofile, $GovernmentID, $GovernmentIDBack, $ResidentID);
    
        if ($stmt->execute()) {
            // Move uploaded files to the specified directory
            if (!empty($_FILES['PRofile']['tmp_name'])) {
                move_uploaded_file($_FILES['PRofile']['tmp_name'], "uploads/" . $PRofile);
            }
            if (!empty($_FILES['Government-ID']['tmp_name'])) {
                move_uploaded_file($_FILES['Government-ID']['tmp_name'], "uploads/" . $GovernmentID);
            }
            if (!empty($_FILES['Government-ID-back']['tmp_name'])) {
                move_uploaded_file($_FILES['Government-ID-back']['tmp_name'], "uploads/" . $GovernmentIDBack);
            }
            echo 'Information Submitted Successfully';
        } else {
            echo "<script>Swal.fire('Error', 'Error Residents Record: {$stmt->error}', 'error');</script>";
        }
    
        $stmt->close();
    } 
    
}
?>
