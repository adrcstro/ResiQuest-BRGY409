<?php
require '../Backend/Connection.php';

$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Database connection error: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['ResidentID'])) {
        $ResidentID = $_POST['ResidentID'];

        // Retrieve existing profile and government ID
        $stmt = $conn->prepare("SELECT Profile, GovernmentID FROM users WHERE ID = ?");
        $stmt->bind_param("s", $ResidentID);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $existingProfile = $row['Profile'];
        $existingGovernmentID = $row['GovernmentID'];
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

        if (!empty($ResidentID)) {
            $stmt = $conn->prepare("UPDATE users SET fname=?, Mname=?, lname=?, ContactNumber=?, Gender=?, email=?, Nickname=?, PlaceofBirth=?, Dateofbirth=?, Age=?, CivilStatus=?, Purok=?, VoterStatus=?, Occupation=?, Address=?, Zipcode=?, Citezenship=?, Profile=?, GovernmentID=?   WHERE ID=?");
            $stmt->bind_param("ssssssssssssssssssss", $firstname, $Middlename, $lastname, $ContactNumber, $Gender, $email, $Nickname, $PlaceofBirth, $Birthdate, $Age, $civilstatus, $purok, $voterstatus, $Occupation, $Address, $ZipCode, $Citizenship, $PRofile, $GovernmentID, $ResidentID);

            if ($stmt->execute()) {
                // Move uploaded files to the specified directory
                if (!empty($_FILES['PRofile']['tmp_name'])) {
                    move_uploaded_file($_FILES['PRofile']['tmp_name'], "uploads/" . $PRofile);
                }
                if (!empty($_FILES['Government-ID']['tmp_name'])) {
                    move_uploaded_file($_FILES['Government-ID']['tmp_name'], "uploads/" . $GovernmentID);
                }

                echo "Application Submitted successfully";
            } else {
                echo "Error updating driver record: " . $stmt->error;
            }

            $stmt->close();
        } else {
            echo "Please select a driver to update";
        }
    } else {
        echo "ResidentID is not set";
    }
} else {
    echo "Invalid request method";
}
?>
