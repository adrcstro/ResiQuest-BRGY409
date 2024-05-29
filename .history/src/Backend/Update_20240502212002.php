

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



$requestId = isset($_POST['requestId']) ? $_POST['requestId'] : null;
$serviceType = isset($_POST['serviceType']) ? $_POST['serviceType'] : null;


// Update request details based on service type
switch ($serviceType) {
    case "Certificate of Residency":
    case "Certificate of Indigency":
        $firstname = $_POST['EditFirstName'];
        $middlename = $_POST['EditMiddleName'];
        $lastname = $_POST['EditLastName'];
        $address = $_POST['EditAddress'];
        $purpose = $_POST['EditPurpose'];
        
        // Update query for Certificate of Residency/Indigency
        $updateQuery = "UPDATE requestdocument SET FirstName='$firstname', Middlename='$middlename', Lastname='$lastname', Address='$address', Purpose='$purpose' WHERE RequestID='$requestId'";
        break;
    case "Business Clearance":
        $firstname = $_POST['EditFirstName'];
        $middlename = $_POST['EditMiddleName'];
        $lastname = $_POST['EditLastName'];
        $address = $_POST['EditAddress'];
        $businessAct = $_POST['EditBusinessAct'];
        $businessLoc = $_POST['EditBusinessLoc'];
        
        // Update query for Business Clearance
        $updateQuery = "UPDATE requestdocument SET FirstName='$firstname', Middlename='$middlename', Lastname='$lastname', Address='$address', BusinessAct='$businessAct', BusinessLoc='$businessLoc' WHERE RequestID='$requestId'";
        break;
    case "Barangay Identification":
        $firstname = $_POST['EditFirstName'];
        $middlename = $_POST['EditMiddleName'];
        $lastname = $_POST['EditLastName'];
        $address = $_POST['EditAddress'];
        $dateOfBirth = $_POST['EditDateOfBirth'];
        $placeOfBirth = $_POST['EditPlaceOfBirth'];
        $sssgsis = $_POST['EditSSSGSIS'];
        $contactPersonName = $_POST['EditContactName'];
        $contactPersonNumber = $_POST['EditContactNum'];
        $contactPersonAddress = $_POST['EditContactAddress'];
        
        // Update query for Barangay Identification
        $updateQuery = "UPDATE requestdocument SET FirstName='$firstname', Middlename='$middlename', Lastname='$lastname', Address='$address', DateofBirth='$dateOfBirth', PlaceofBirth='$placeOfBirth', SSSGSIS='$sssgsis', Contactname='$contactPersonName', Contactnum='$contactPersonNumber', Contactaddress='$contactPersonAddress' WHERE RequestID='$requestId'";
        break;
    default:
        // Invalid service type
        echo "";
        exit;
}

// Execute the update query
if ($conn->query($updateQuery) === TRUE) {
    echo "Request details updated successfully.";
} else {
    echo "Error updating request details: " . $conn->error;
}

// Close database connection
if (isset($_POST['AdminsID'])) {
    $ResidentID = $_POST['AdminsID'];

    $existingAdminProfile = $row['AdminPRofile'];

    $AdminEditFirstName = $_POST['AdminEditFirstName'];
    $AdminEditMiddleName = $_POST['AdminEditMiddleName'];
    $AdminEditLastName = $_POST['AdminEditLastName'];
    $AdminGender = $_POST['AdminGender'];
    $AdminEmail = $_POST['AdminEmail'];
    $AdminPRofile = !empty($_FILES['AdminPRofile']['name']) ? $_FILES['AdminPRofile']['name'] : $existingAdminProfile;



    if (!empty($ResidentID)) {
        $stmt = $conn->prepare("UPDATE admintbl SET Fname=?, MName=?, Lname=?, BrgyPosition=?, Gender=?, Email=?, AdminProfile=? WHERE ID=?");
        $stmt->bind_param("ssssss", $firstname, $Middlename, $lastname, $ContactNumber, $Gender, $email, $Nickname, $PlaceofBirth, $Birthdate, $Age, $civilstatus, $purok, $voterstatus, $Occupation, $Address, $ZipCode, $Citizenship, $PRofile, $GovernmentID, $GovernmentIDBack, $ResidentID);
    
        if ($stmt->execute()) {
            if (!empty($_FILES['AdminPRofile']['tmp_name'])) {
                move_uploaded_file($_FILES['AdminPRofile']['tmp_name'], "uploads/" . $AdminPRofile );
            }
            echo 'Information Submitted Successfully';
            
        } else {
            echo "<script>Swal.fire('Error', 'Error Residents Record: {$stmt->error}', 'error');</script>";
        }
    
        $stmt->close();
    } 
    
}








?>
