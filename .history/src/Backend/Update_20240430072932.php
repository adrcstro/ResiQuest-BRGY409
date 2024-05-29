

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




// Update request details in the database
// Note: This is a basic example. You should use prepared statements to prevent SQL injection
$requestId = $_POST['requestId'];
$serviceType = $_POST['serviceType'];

// Update request details based on service type
switch ($serviceType) {
    case "Certificate of Residency":
    case "Certificate of Indigency":
        $firstname = $_POST['EditFirstName'];
        $middlename = $_POST['EditMiddleName'];
        $lastname = $_POST['EditLastName'];
        $address = $_POST['EditAddress'];
        $purpose = $_POST['EditPurpose'];

        $sql = "UPDATE requestdocument SET FirstName='$firstname', MiddleName='$middlename', LastName='$lastname', Address='$address', Purpose='$purpose' WHERE RequestID='$requestId'";
        break;
    
    case "Business Clearance":
        $firstname = $_POST['EditFirstName'];
        $middlename = $_POST['EditMiddleName'];
        $lastname = $_POST['EditLastName'];
        $address = $_POST['EditAddress'];
        $businessAct = $_POST['EditBusinessAct'];
        $businessLoc = $_POST['EditBusinessLoc'];

        $sql = "UPDATE requestdocument SET FirstName='$firstname', MiddleName='$middlename', LastName='$lastname', Address='$address', BusinessAct='$businessAct', BusinessLoc='$businessLoc' WHERE RequestID='$requestId'";
        break;
    
    case "Barangay Identification":
        $firstname = $_POST['EditFirstName'];
        $middlename = $_POST['EditMiddleName'];
        $lastname = $_POST['EditLastName'];
        $address = $_POST['EditAddress'];
        $dateofbirth = $_POST['EditDateOfBirth'];
        $placeofbirth = $_POST['EditPlaceOfBirth'];
        $contactname = $_POST['EditContactName'];
        $contactaddress = $_POST['EditContactAddress'];
        $contactnum = $_POST['EditContactNum'];

        $sql = "UPDATE requestdocument SET FirstName='$firstname', MiddleName='$middlename', LastName='$lastname', Address='$address', DateOfBirth='$dateofbirth', PlaceOfBirth='$placeofbirth', ContactName='$contactname', ContactAddress='$contactaddress', ContactNum='$contactnum' WHERE RequestID='$requestId'";
        break;
    
    default:
        echo json_encode(["message" => "Invalid service type"]);
        exit;
}

if ($conn->query($sql) === TRUE) {
    echo json_encode(["message" => "Record updated successfully"]);
} else {
    echo json_encode(["message" => "Error updating record: " . $conn->error]);
}

$conn->close();







?>
