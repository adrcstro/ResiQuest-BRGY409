<?php
require '../Backend/Connection.php';
if (!empty($_SESSION["ID"])) {
    $ID = $_SESSION["ID"];
    $result = mysqli_query($conn, "SELECT * FROM users WHERE ID = $ID");
    $row = mysqli_fetch_assoc($result);

    // Assuming 'Status' is the column that holds the user's status
    $status = $row['Status'];

    // Check if status is 'NotVerified'
    if ($status == 'NotVerified') {
        // Hide the navigation item
        echo '<style>#view-services-li { display: none; }</style>';
        echo '<style>#userdashcontent { display: none; }</style>';
        echo '<style>#NotVerifiedContent { display: block; }</style>';
    }
} else {
    header("Location: Login.php");
}
?>