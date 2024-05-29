

<?php
require 'Connection.php';

$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if (!$conn) {
    echo "Database connection error" . mysqli_connect_error();
}

if (isset($_POST['ResidentID'])) {
    $ResidentID = $_POST['ResidentID'];
    $sql = "SELECT Profile, GovernmentIDFront, GovernmentIDBack FROM users WHERE ID = ?";
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

if (isset($_POST['AdminsID'])) {
    $adminID = $_POST['AdminsID'];
    $sql = "SELECT AdminProfile	FROM admintbl WHERE AdminID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $adminID);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $existingAdminProfile = $row['AdminProfile'];
    $stmt->close();

    $AdminEditFirstName = $_POST['AdminEditFirstName'];
    $AdminEditMiddleName = $_POST['AdminEditMiddleName'];
    $AdminEditLastName = $_POST['AdminEditLastName'];
    $BrgyPositions = $_POST['AdminPosition'];
    $AdminGender = $_POST['AdminGender'];
    $AdminEmail = $_POST['AdminEmail'];
    $AdminRenderedServicestart = $_POST['RenderedServicestart'];
    $AdminRenderedServiceend = $_POST['RenderedServiceend'];


    $AdminPRofiles = !empty($_FILES['AdminPRofile']['name']) ? $_FILES['AdminPRofile']['name'] : $existingAdminProfile;

    if (!empty($adminID)) {
        $stmt = $conn->prepare("UPDATE admintbl SET Fname=?, MName=?, Lname=?, BrgyPosition=?, AdGender=?, Email=?, AdminProfile=?, RenderedServiceStart=? ,RenderedServiceend=?  WHERE AdminID=?");
        $stmt->bind_param("ssssssssss", $AdminEditFirstName, $AdminEditMiddleName, $AdminEditLastName, $BrgyPositions, $AdminGender, $AdminEmail, $AdminPRofiles,$AdminRenderedServicestart,$AdminRenderedServiceend, $adminID);
    
        if ($stmt->execute()) {
            if (!empty($_FILES['AdminPRofile']['tmp_name'])) {
                move_uploaded_file($_FILES['AdminPRofile']['tmp_name'], "uploads/" .  $AdminPRofiles);
            }
            echo 'Admin Information Updated Successfully';
            
        } else {
            echo "<script>Swal.fire('Error', 'Error Residents Record: {$stmt->error}', 'error');</script>";
        }
    
        $stmt->close();
    } 
    
}



if (isset($_POST['adminedituserid'])) {
    $adminedituserid = $_POST['adminedituserid'];

    // Retrieve existing profile and government ID
    $sql = "SELECT Profile FROM users WHERE ID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $adminedituserid);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $existingadminedituserProfile = $row['Profile'];
    $stmt->close();

    $AdminEditresidentFirstName = $_POST['AdminEditresidentFirstName'];
    $AdminEditresidentMiddleName = $_POST['AdminEditresidentMiddleName'];
    $AdminEditresidentLastName = $_POST['AdminEditresidentLastName'];
    $Admineditresicontact = $_POST['Admineditresicontact'];
    $AdminEditGender = $_POST['AdminEditGender'];
    $Admineditresiemail = $_POST['Admineditresiemail'];
    $AdminEditresidentnickname = $_POST['AdminEditresidentnickname'];
    $AdminEditresidentplaceofbirth = $_POST['AdminEditresidentplaceofbirth'];
    $AdminEditresibirthdate = $_POST['AdminEditresibirthdate'];
    $AdminEditresiage = $_POST['AdminEditresiage'];
    $AdminEditresicivilstat = $_POST['AdminEditresicivilstat'];
    $admineditresipurok = $_POST['admineditresipurok'];
    $Admineditresivotestat = $_POST['Admineditresivotestat'];
    $Admineditresioccupation = $_POST['Admineditresioccupation'];
    $Admineditresiaddress = $_POST['Admineditresiaddress'];
    $Admineditresizipcode = $_POST['Admineditresizipcode'];
    $Admineditresicitizenship = $_POST['Admineditresicitizenship'];
    $admineditresiPRofile = !empty($_FILES['admineditresiPRofile']['name']) ? $_FILES['admineditresiPRofile']['name'] :  $existingadminedituserProfile;
    if (!empty($adminedituserid)) {
        $stmt = $conn->prepare("UPDATE users SET fname=?, Mname=?, lname=?, ContactNumber=?, Gender=?, email=?, Nickname=?, PlaceofBirth=?, Dateofbirth=?, Age=?, CivilStatus=?, Purok=?, VoterStatus=?, Occupation=?, Address=?, Zipcode=?, Citezenship=?, Profile=?  WHERE ID=?");
        $stmt->bind_param("sssssssssssssssssss", $AdminEditresidentFirstName, $AdminEditresidentMiddleName, $AdminEditresidentLastName, $Admineditresicontact,  $AdminEditGender,  $Admineditresiemail, $AdminEditresidentnickname,  $AdminEditresidentplaceofbirth ,   $AdminEditresibirthdate,  $AdminEditresiage,  $AdminEditresicivilstat, 
         $admineditresipurok ,  $Admineditresivotestat,  $Admineditresioccupation,  $Admineditresiaddress,  $Admineditresizipcode, $Admineditresicitizenship ,  $admineditresiPRofile,  $adminedituserid);
    
        if ($stmt->execute()) {
            // Move uploaded files to the specified directory
            if (!empty($_FILES['admineditresiPRofile']['tmp_name'])) {
                move_uploaded_file($_FILES['admineditresiPRofile']['tmp_name'], "uploads/" .  $admineditresiPRofile);
            }
           
            echo 'Residents Information Editted Successfully';
            
        } else {
            echo "<script>Swal.fire('Error', 'Error Residents Record: {$stmt->error}', 'error');</script>";
        }
    
        $stmt->close();
    } 
    
}

if (isset($_POST['resiID'])) {
    $resiID= $_POST['resiID'];
    $verificationstat = $_POST['verificationstat'];
    if (!empty($resiID)) {
        $stmt = $conn->prepare("UPDATE users SET Status=?  WHERE ID=?");
        $stmt->bind_param("ss", $verificationstat,  $resiID);
        if ($stmt->execute()) {
            echo 'Residents Verification Successfully';
            
        } else {
            echo "<script>Swal.fire('Error', 'Error Residents Record: {$stmt->error}', 'error');</script>";
        }
    
        $stmt->close();
    } 
    
}


if (isset($_POST['processID'])) {
    $processID= $_POST['processID'];
    $resiprocessstat = $_POST['processstat'];
    if (!empty($processID)) {
        $stmt = $conn->prepare("UPDATE requestdocument SET Status=? WHERE RequestID=?");
        $stmt->bind_param("ss", $resiprocessstat, $processID);
        if ($stmt->execute()) {
            echo 'Request Process Successfully';
            
        } else {
            echo "<script>Swal.fire('Error', 'Error Processing Record: {$stmt->error}', 'error');</script>";
        }
    
        $stmt->close();
    } 
    
}


if (isset($_POST['completeID'])) {
    $completeID= $_POST['completeID'];
    $resicompletedstat = $_POST['completestat'];
    if (!empty($completeID)) {
        $stmt = $conn->prepare("UPDATE requestdocument SET Status=? WHERE RequestID=?");
        $stmt->bind_param("ss", $resicompletedstat, $completeID);
        if ($stmt->execute()) {
            echo 'Request Completed Successfully';
            
        } else {
            echo "<script>Swal.fire('Error', 'Error Processing Record: {$stmt->error}', 'error');</script>";
        }
    
        $stmt->close();
    } 
    
}

if (isset($_POST['scheduleID'])) {
    $scheduleID= $_POST['scheduleID'];

    $Setdate = $_POST['setdate'];
    $Settime  = $_POST['settime'];


    if (!empty($scheduleID)) {
        $stmt = $conn->prepare("UPDATE requestdocument SET PickUpDate=?, Pickuptime=? WHERE RequestID=?");
        $stmt->bind_param("sss",$Setdate,$Settime, $scheduleID);
        if ($stmt->execute()) {
            echo 'Request Schedule Set Successfully';
            
        } else {
            echo "<script>Swal.fire('Error', 'Error Setting Schedule dor Request: {$stmt->error}', 'error');</script>";
        }
    
        $stmt->close();
    } 
    
}


if (isset($_POST['markreleasedID'])) {
    $markreleasedID= $_POST['markreleasedID'];
    $releasedstat = $_POST['releasedstat'];
    if (!empty($markreleasedID)) {
        $stmt = $conn->prepare("UPDATE requestdocument SET Status=? WHERE RequestID=?");
        $stmt->bind_param("ss", $releasedstat, $markreleasedID);
        if ($stmt->execute()) {
            echo 'Document Released Successfully';
            
        } else {
            echo "<script>Swal.fire('Error', 'Error Processing Record: {$stmt->error}', 'error');</script>";
        }
    
        $stmt->close();
    } 
    
}


if (isset($_POST['rejectID'])) {
    $rejectID= $_POST['rejectID'];
    $rejectstat = $_POST['rejectstat'];
    $comment = $_POST['comment'];
    if (!empty($rejectID)) {
        $stmt = $conn->prepare("UPDATE requestdocument SET Status=?, RejReason=? WHERE RequestID=?");
        $stmt->bind_param("sss", $rejectstat,  $comment ,$rejectID);
        if ($stmt->execute()) {
            echo 'Document Rejected Successfully';
            
        } else {
            echo "<script>Swal.fire('Error', 'Error Rejected Record: {$stmt->error}', 'error');</script>";
        }
    
        $stmt->close();
    } 
    
}


if (isset($_POST['blotterprocessID'])) {
    $markreleasedID= $_POST['blotterprocessID'];
    $releasedstat = $_POST['blotterprocessstat'];
    if (!empty($markreleasedID)) {
        $stmt = $conn->prepare("UPDATE complaintbl SET Status=? WHERE ComplainID =?");
        $stmt->bind_param("ss", $releasedstat, $markreleasedID);
        if ($stmt->execute()) {
            echo 'Mark On-Process Successfully';
            
        } else {
            echo "<script>Swal.fire('Error', 'Error Processing Record: {$stmt->error}', 'error');</script>";
        }
    
        $stmt->close();
    } 
    
}













if (isset($_POST['NewsEditId'])) {
    $newsId = $_POST['NewsEditId'];
    $sql = "SELECT NewsImages FROM newsandevents WHERE NewsID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $newsId);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $existingAdminProfile = $row['NewsImages'];
    $stmt->close();

    $title = $_POST['NewsEditTitle'];
    $content = $_POST['NewsEditContent'];
    $time = $_POST['NewsEditTime'];
    $date = $_POST['NewsEditDate'];
    $AdminPRofiles = !empty($_FILES['NewsEditImage']['name']) ? $_FILES['NewsEditImage']['name'] : $existingAdminProfile;

    if (!empty($newsId)) {
        $stmt = $conn->prepare("UPDATE newsandevents SET NewsTittle=?, NewsContent=?, Newstime=?, NewsDate=?, NewsImages=? WHERE NewsID=?");
        $stmt->bind_param("ssssss", $title, $content, $time, $date, $AdminPRofiles, $newsId);
    
        if ($stmt->execute()) {
            if (!empty($_FILES['NewsEditImage']['tmp_name'])) {
                move_uploaded_file($_FILES['NewsEditImage']['tmp_name'], "uploads/" .  $AdminPRofiles);
            }
            echo 'News Information Updated Successfully';
            
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







?>
