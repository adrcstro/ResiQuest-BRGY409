<?php
require '../Backend/Connection.php';

$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

if (isset($_POST['first-name'], $_POST['Middle-name'], $_POST['last-name'], $_POST['Nick-name'], $_POST['PlaceofBirth'], $_POST['Birthdate'], $_POST['Age'], $_POST['civil-status'], $_POST['Gender'], $_POST['purok'], $_POST['voter-status'], $_POST['email'], $_POST['Occupation'], $_POST['Contact-Number'], $_POST['Address'], $_POST['Zip-Code'], $_POST['Citizenship'])) {
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

    // SQL query to insert data into the database
    $sql = "INSERT INTO users (fname, Mname, lname, ContactNumber, Gender, email, Nickname, PlaceofBirth, Dateofbirth, Age, CivilStatus, Purok, VoterStatus, Occupation, Address, Zipcode, Citezenship, Profile, GovernmentID) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sssssssssssssssssss', $firstname, $Middlename, $lastname, $Nickname, $PlaceofBirth, $Birthdate, $Age, $civilstatus, $Gender, $purok, $voterstatus, $email, $Occupation, $ContactNumber, $Address, $ZipCode, $Citizenship, $PRofileFile, $GovernmentIDFile);

    if ($stmt->execute()) {
        // Move uploaded files to the uploads directory
        move_uploaded_file($PRofileTmp, "uploads/" . $PRofileFile);
        move_uploaded_file($GovernmentIDTmp, "uploads/" . $GovernmentIDFile);

        echo "Information Submitted Successfully. \n Wait 2-3 working days to verify your information.";
    } else {
        echo "Error: " . $stmt->error;
    }
} else {
    echo "Error: Required fields are missing.";
}

$stmt->close();
$conn->close();
?>
