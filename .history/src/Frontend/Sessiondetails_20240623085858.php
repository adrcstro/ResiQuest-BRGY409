<?php
require '../Backend/Connection.php';
    if(!empty($_SESSION["AdminID"])){
$ID = $_SESSION["AdminID"];
$result = mysqli_query($conn, "SELECT * FROM admintbl WHERE AdminID = $ID");
$row = mysqli_fetch_assoc($result);


$ID = $row['AdminID'];

// Check if id is for superadmin
if ($ID != '13898294') {
    // Hide the navigation item
    echo '<style>#superadminonlyaccess { display: none; }</style>';
}
    }else{
      header("Location: AdminLogin.php");

    }
?>