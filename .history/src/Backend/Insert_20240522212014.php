

<?php
require 'Connection.php';

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//BRGY RESIDENCY PHP
if (isset($_POST['UserIDbrgyResidency'], $_POST['firstnamebrgyResidency'], $_POST['MnamebrgyResidency'], $_POST['lastnamebrgyResidency'], $_POST['ServicetypebrgyResidency'], $_POST['DaterequestedbrgyResidency'], $_POST['AddressdbrgyResidency'], $_POST['PurposebrgyResidency'], $_POST['DocumentStatbrgyResidency'])) {
    // Collect form data for insertion
    $UserIDbrgyResidency = $_POST['UserIDbrgyResidency'];
    $firstnamebrgyResidency = $_POST['firstnamebrgyResidency'];
    $MnamebrgyResidency = $_POST['MnamebrgyResidency'];
    $lastnamebrgyResidency = $_POST['lastnamebrgyResidency'];
    $ServicetypebrgyResidency = $_POST['ServicetypebrgyResidency'];
    $DaterequestedbrgyResidency= $_POST['DaterequestedbrgyResidency'];
    $AddressdbrgyResidency = $_POST['AddressdbrgyResidency'];
    $PurposebrgyResidency = $_POST['PurposebrgyResidency'];
    $DocumentStatbrgyResidency = $_POST['DocumentStatbrgyResidency'];
    // Generate a unique random number for RequestID
    $RequestID = generateUniqueRandomNumber($conn, 'requestdocument', 'RequestID');

    // Prepare and bind for insertion
    $stmt = $conn->prepare("INSERT INTO requestdocument (RequestID, UserID, FirstName, Middlename, Lastname, ServiceType, DateRequested, Address, Purpose, Status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("isssssssss", $RequestID, $UserIDbrgyResidency, $firstnamebrgyResidency, $MnamebrgyResidency, $lastnamebrgyResidency, $ServicetypebrgyResidency, $DaterequestedbrgyResidency, $AddressdbrgyResidency, $PurposebrgyResidency, $DocumentStatbrgyResidency);

    // Execute the insertion statement
    if ($stmt->execute() === TRUE) {
        echo "Document Request for Certificate of Residency Submitted Successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the insertion statement
    $stmt->close();
}

// BRGY INDIGENCY PHP



if (isset($_POST['UserIDbrgyIndigency'], $_POST['firstnamebrgyIndigency'], $_POST['MnamebrgyIndigency'], $_POST['lastnamebrgyIndigency'], $_POST['ServicetypebrgyIndigency'], $_POST['DaterequestedbrgyIndigency'], $_POST['AddressbrgyIndigency'], $_POST['PurposebrgyIndigency'], $_POST['DocStatusbrgyIndigency'])) {
    $UserIDbrgyIndigency  = $_POST['UserIDbrgyIndigency'];
    $firstnamebrgyIndigency = $_POST['firstnamebrgyIndigency'];
    $MnamebrgyIndigency = $_POST['MnamebrgyIndigency'];
    $lastnamebrgyIndigency = $_POST['lastnamebrgyIndigency'];
    $ServicetypebrgyIndigency = $_POST['ServicetypebrgyIndigency'];
    $DaterequestedbrgyIndigency = $_POST['DaterequestedbrgyIndigency'];
    $AddressbrgyIndigency = $_POST['AddressbrgyIndigency'];
    $PurposebrgyIndigency = $_POST['PurposebrgyIndigency'];
    $DocStatusbrgyIndigency = $_POST['DocStatusbrgyIndigency'];
    // Generate a unique random number for RequestID
    $RequestIDIndigency = generateUniqueRandomNumber($conn, 'requestdocument', 'RequestID');

    // Prepare and bind for insertion
    $stmt = $conn->prepare("INSERT INTO requestdocument (RequestID, UserID, FirstName, Middlename, Lastname, ServiceType, DateRequested, Address, Purpose , Status) VALUES (?, ?, ?, ?, ?, ?, ?, ?,?,?)");
    $stmt->bind_param("isssssssss", $RequestIDIndigency , $UserIDbrgyIndigency, $firstnamebrgyIndigency, $MnamebrgyIndigency,  $lastnamebrgyIndigency,  $ServicetypebrgyIndigency, $DaterequestedbrgyIndigency,$AddressbrgyIndigency,  $PurposebrgyIndigency,$DocStatusbrgyIndigency);

    // Execute the insertion statement
    if ($stmt->execute() === TRUE) {
        echo "Document Request for Certificate of Indigency Submitted Successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the insertion statement
    $stmt->close();
}

// BRGY ID PHP


if (isset($_POST['UserIDbrgyID'], $_POST['RequestorContactNum'], $_POST['firstnamebrgyID'], $_POST['MnamebrgyID'], $_POST['lastnamebrgyID'], $_POST['DateofbirthbrgyID'], $_POST['PlaceofBirthbrgyID'], $_POST['CivilStatisbrgyID'], $_POST['SSSGSISbrgyID'], $_POST['DaterequestedbrgyID'], $_POST['AddressbrgyID'], $_POST['ContactpersonNamebrgyID'], $_POST['ContactpersonAddressbrgyID'], $_POST['ContactpersonnumberbrgyID'], $_POST['ServicetypebrgyID'], $_POST['DocStatbrgyID'])) {
    // Collect form data for insertion
    $UserIDbrgyID = $_POST['UserIDbrgyID'];
    $RequestorContactNum = $_POST['RequestorContactNum'];
    $firstnamebrgyID = $_POST['firstnamebrgyID'];
    $MnamebrgyID = $_POST['MnamebrgyID'];
    $lastnamebrgyID  = $_POST['lastnamebrgyID'];
    $ServicetypebrgyID = $_POST['ServicetypebrgyID'];
    $DaterequestedbrgyID = $_POST['DaterequestedbrgyID'];
    $AddressbrgyID = $_POST['AddressbrgyID'];
    $DateofbirthbrgyID = $_POST['DateofbirthbrgyID'];
    $PlaceofBirthbrgyID = $_POST['PlaceofBirthbrgyID'];
    $CivilStatisbrgyID = $_POST['CivilStatisbrgyID'];
    $SSSGSISbrgyID = $_POST['SSSGSISbrgyID'];
    $ContactpersonNamebrgyID  = $_POST['ContactpersonNamebrgyID'];
    $ContactpersonAddressbrgyID = $_POST['ContactpersonAddressbrgyID'];
    $ContactpersonnumberbrgyID = $_POST['ContactpersonnumberbrgyID'];
    $DocStatbrgyID = $_POST['DocStatbrgyID'];

  
    // Generate a unique random number for RequestID
    $RequestBRGYID = generateUniqueRandomNumber($conn, 'requestdocument', 'RequestID');

    // Prepare and bind for insertion
    $stmt = $conn->prepare("INSERT INTO requestdocument (RequestID, UserID, FirstName, Middlename, Lastname, ServiceType, DateRequested, Address, DateofBirth, PlaceofBirth, Civilstat, SSSGSIS,RequestorContactNum, Contactname, Contactaddress ,Contactnum, Status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?,?,?)");
    $stmt->bind_param("issssssssssssssss", $RequestBRGYID , $UserIDbrgyID ,$firstnamebrgyID , $MnamebrgyID,  $lastnamebrgyID , $ServicetypebrgyID ,  $DaterequestedbrgyID ,  $AddressbrgyID ,$DateofbirthbrgyID,   $PlaceofBirthbrgyID, $CivilStatisbrgyID,  $SSSGSISbrgyID ,  $RequestorContactNum,  $ContactpersonNamebrgyID,   $ContactpersonAddressbrgyID, $ContactpersonnumberbrgyID, $DocStatbrgyID);

    // Execute the insertion statement
    if ($stmt->execute() === TRUE) {
        echo "Document Request for Barangay Identification Submitted Successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the insertion statement
    $stmt->close();
}

// Close the connection



if (isset($_POST['UserIDBGClerance'],$_POST['firstnamebrgyBClearance'], $_POST['MnameBClearance'], $_POST['lastnameBClearance'], $_POST['BusinessNameBClearance'], $_POST['BusinessLocBClearance'], $_POST['DateReqBClearance'], $_POST['HomeAddBClearance'], $_POST['ServicetyBClearance'], $_POST['DocStatusBClearance'])) {
    // Collect form data for insertion


    $UserIDBGClerance = $_POST['UserIDBGClerance'];
    $firstnamebrgyBClearance = $_POST['firstnamebrgyBClearance'];
    $MnameBClearance = $_POST['MnameBClearance'];
    $lastnameBClearance = $_POST['lastnameBClearance'];
    $ServicetyBClearance = $_POST['ServicetyBClearance'];
    $DateReqBClearance = $_POST['DateReqBClearance'];
    $HomeAddBClearance = $_POST['HomeAddBClearance'];
    $BusinessNameBClearance = $_POST['BusinessNameBClearance'];
    $BusinessLocBClearance = $_POST['BusinessLocBClearance'];
    $DocStatusBClearance = $_POST['DocStatusBClearance'];
   
   
    // Generate a unique random number for RequestID
    $RequestBClearance = generateUniqueRandomNumber($conn, 'requestdocument', 'RequestID');

    // Prepare and bind for insertion
    $stmt = $conn->prepare("INSERT INTO requestdocument (RequestID, UserID, FirstName, Middlename, Lastname, ServiceType, DateRequested, Address, BusinessAct, BusinessLoc ,Status ) VALUES (?, ?, ?, ?, ?, ?, ?, ?,?, ?,?)");
    $stmt->bind_param("issssssssss",  $RequestBClearance , $UserIDBGClerance , $firstnamebrgyBClearance,$MnameBClearance, $lastnameBClearance,  $ServicetyBClearance, $DateReqBClearance ,  $HomeAddBClearance,  $BusinessNameBClearance, $BusinessLocBClearance,  $DocStatusBClearance);

    // Execute the insertion statement
    if ($stmt->execute() === TRUE) {
        echo "Document Request for Barangay Identification Submitted Successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the insertion statement
    $stmt->close();
}




// submmittingcomplain 
if (isset($_POST['complainuserid'], $_POST['ComplainfirstnamebrgyID'], $_POST['ComplainMnamebrgyID'], $_POST['ComplainlastnamebrgyID'], $_POST['Complaincontactnum'], $_POST['Complaindatefiled'], $_POST['Complainaddress'],
 $_POST['complainstatus'], $_POST['complaineename'], $_POST['Complaineeaddress'], $_POST['typeofcomplain'], $_POST['complainreportdetails'])) {
    // Collect form data for insertion
    $complainuserid = $_POST['complainuserid'];
    $ComplainfirstnamebrgyID = $_POST['ComplainfirstnamebrgyID'];
    $ComplainMnamebrgyID = $_POST['ComplainMnamebrgyID'];
    $ComplainlastnamebrgyID = $_POST['ComplainlastnamebrgyID'];
    $ComplaincontactnumD  = $_POST['Complaincontactnum'];
    $Complaindatefiled = $_POST['Complaindatefiled'];
    $Complainaddress = $_POST['Complainaddress'];
    $complainstatus = $_POST['complainstatus'];
    $complaineename = $_POST['complaineename'];
    $Complaineeaddress = $_POST['Complaineeaddress'];
    $typeofcomplain = $_POST['typeofcomplain'];
    $complainreportdetails = $_POST['complainreportdetails'];
   
    // Generate a unique random number for RequestID
    $Complaiid = generateUniqueRandomNumber($conn, 'complaintbl', 'ComplainID');

    // Prepare and bind for insertion
    $stmt = $conn->prepare("INSERT INTO complaintbl (ComplainID, ComUserID, DateofReport, ComplainantFName, ComplainantMName, ComplainantLName, ContactNumber, Address, ComplainDescription	, TypeofComplaint ,	NameofComplainee, Complaineeaddress, ComplainStatus) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("issssssssssss", $Complaiid , $complainuserid ,$Complaindatefiled, $ComplainfirstnamebrgyID , $ComplainMnamebrgyID,  $ComplainlastnamebrgyID , $ComplaincontactnumD  , 
    $Complainaddress , $complainreportdetails ,$typeofcomplain,    $complaineename,  $Complaineeaddress, $complainstatus);
    if ($stmt->execute() === TRUE) {
        echo "Complaint Report Submitted Successfully";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}





if(isset($_POST['btnSubmit'])){
    $a = mysqli_real_escape_string($conn, $_POST['NewsTitle']);
    $b = mysqli_real_escape_string($conn, $_POST['NewsContent']);
    $c = mysqli_real_escape_string($conn, $_POST['NewsDate']);
    $d = mysqli_real_escape_string($conn, $_POST['NewsTime']);

    // Check if "NewsImage" key is set in $_FILES array and if there are no errors
    if(isset($_FILES['NewsImage']) && $_FILES['NewsImage']['error'] === UPLOAD_ERR_OK) {
        $fileName = $_FILES["NewsImage"]["name"];
        $fileSize = $_FILES["NewsImage"]["size"];
        $tempName = $_FILES["NewsImage"]["tmp_name"];

        $validImageExtension = ['jpg','jpeg','png']; // fixed typo in jpeg
        $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION); // Use pathinfo function to get file extension
        $fileExtension = strtolower($fileExtension);
        if(!in_array($fileExtension, $validImageExtension)){
            echo "<script>alert('Invalid Image Extension');</script>";
        } else if($fileSize > 1000000){
            echo "<script>alert('Image is Too Large');</script>";
        } else {
            $newFileName = uniqid('', true). ".". $fileExtension;
            $fileDestination = 'uploads/'. $newFileName;
            if(move_uploaded_file($tempName, $fileDestination)) {
                $e = $newFileName;

                $sql = "INSERT INTO newsandevents (NewsTittle, NewsContent, Newstime, NewsDate, NewsImages) VALUES ('$a','$b','$c','$d','$e')";
                if (mysqli_query($conn, $sql)) {
                    echo '<script>alert("Successfully Added!");</script>';
                    header("LOCATION: ../Frontend/AdminDashboard.php");
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
                mysqli_close($conn);
            } else {
                echo "<script>alert('Error uploading image');</script>";
            }
        }
    } else {
        echo "<script>alert('No file uploaded or upload error');</script>";
    }
}



if (isset($_POST['NewsTitle'], $_POST['NewsDate'], $_POST['NewsTime'], $_POST['NewsContent'], $_POST['addAdminGender'])) {
    $NewsTitle = $_POST['NewsTitle'];
    $NewsDate = $_POST['NewsDate'];
    $NewsTime = $_POST['NewsTime'];
    $NewsContent = $_POST['NewsContent'];
    $addAdminGender = $_POST['addAdminGender'];
    // Check if email is valid

    $NewsImageFile = $_FILES['addAdminPRofile']['name'];
    $NewsImageTmp = $_FILES['addAdminPRofile']['tmp_name'];

    $Newsid = generateUniqueRandomNumber($conn, 'complaintbl', 'ComplainID');


    $sql = "INSERT INTO admintbl (NewsID, Fname, MName, Lname, BrgyPosition, AdGender, Email, Password, AdminProfile) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssssss', $Newsid, $NewsTitle,$NewsDate,  $NewsTime, $NewsContent, $addAdminGender, $addAdminGender);

    if ($stmt->execute()) {
        move_uploaded_file($NewsImageTmp, "uploads/" . $NewsImageFile);
        echo 'News Published Successfully';
    } else {
        echo 'Error';
    }
}

















function generateUniqueRandomNumber($conn, $table, $column)
{
    $isUnique = false;
    $randomNumber = 0;
    while (!$isUnique) {
        $randomNumber = rand(100000, 999999); // Generate a random 6-digit number
        $result = $conn->query("SELECT * FROM $table WHERE $column = $randomNumber");
        if ($result->num_rows == 0) {
            $isUnique = true;
        }
    }
    return $randomNumber;
}








function generateRandomID($length = 8) {
    $characters = '0123456789';
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $randomString;
}


if (isset($_POST['AdminaddFirstName'], $_POST['AdminaddMiddleName'], $_POST['AdminaddLastName'], $_POST['addAdminPosition'], $_POST['addAdminGender'], $_POST['AdminaddEmail'], $_POST['AdminPassword'], $_POST['ConfirmPAssword'])) {
    $AdminaddFirstName = $_POST['AdminaddFirstName'];
    $AdminaddMiddleName = $_POST['AdminaddMiddleName'];
    $AdminaddLastName = $_POST['AdminaddLastName'];
    $addAdminPosition = $_POST['addAdminPosition'];
    $addAdminGender = $_POST['addAdminGender'];
    $AdminaddEmail = $_POST['AdminaddEmail'];
    $AdminPassword = $_POST['AdminPassword'];
    $ConfirmPassword = $_POST['ConfirmPAssword'];

    // Check if email is valid
    if (!filter_var($AdminaddEmail, FILTER_VALIDATE_EMAIL)) {
        http_response_code(400); // Set HTTP response status code to 400
        echo 'Invalid email address';
        exit; // Stop further execution
    }

    // Check if passwords match
    if ($AdminPassword !== $ConfirmPassword) {
        http_response_code(400); // Set HTTP response status code to 400
        echo 'Passwords do not match';
        exit; // Stop further execution
    }

    $hashedPassword = password_hash($AdminPassword, PASSWORD_DEFAULT); // Hash the password

    $ItemImageFile = $_FILES['addAdminPRofile']['name'];
    $ItemImageTmp = $_FILES['addAdminPRofile']['tmp_name'];

    $sql = "INSERT INTO admintbl (Fname, MName, Lname, BrgyPosition, AdGender, Email, Password, AdminProfile) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssssssss', $AdminaddFirstName, $AdminaddMiddleName, $AdminaddLastName, $addAdminPosition, $addAdminGender, $AdminaddEmail, $hashedPassword, $ItemImageFile);

    if ($stmt->execute()) {
        move_uploaded_file($ItemImageTmp, "uploads/" . $ItemImageFile);
        echo 'Admin Added Successfully';
    } else {
        echo 'Error';
    }
}























?>





















