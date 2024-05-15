

<?php
require 'Connection.php';

$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if (!$conn) {
    echo "Database connection error" . mysqli_connect_error();
}



// Close database connection
if (isset($_POST['AdminsID'])) {
    $adminID = $_POST['AdminsID'];
    $sql = "SELECT AdminProfile	FROM admintbl WHERE AdminID=?";
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
    $AdminPRofiles = !empty($_FILES['AdminPRofile']['name']) ? $_FILES['AdminPRofile']['name'] : $existingAdminProfile;

    if (!empty($adminID)) {
        $stmt = $conn->prepare("UPDATE admintbl SET Fname=?, MName=?, Lname=?, BrgyPosition=?, Gender=?, Email=?, AdminProfile=? WHERE AdminID=?");
        $stmt->bind_param("ssssssss", $AdminEditFirstName,  $AdminEditMiddleName,  $AdminEditLastName, $BrgyPositions, $AdminGender, $AdminEmail, $AdminPRofiles, $adminID);
    
        if ($stmt->execute()) {
            if (!empty($_FILES['AdminPRofile']['tmp_name'])) {
                move_uploaded_file($_FILES['AdminPRofile']['tmp_name'], "uploads/" . $AdminPRofiles);
            }
            echo 'Admin Information Updated Successfully';
            
        } else {
            echo "<script>Swal.fire('Error', 'Error Residents Record: {$stmt->error}', 'error');</script>";
        }
    
        $stmt->close();
    } 
    
}








?>
