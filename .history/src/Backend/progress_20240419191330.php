<?php
require '../Backend/Connection.php';
$query = "SELECT * FROM users WHERE ID = 1"; // Replace 'id = 1' with your actual condition
$result = mysqli_query($connection, $query);
$userData = mysqli_fetch_assoc($result);

$progress = 100; // Default progress value
$columns = ['fname', 'Mname', 'lname', 'ContactNumber', 'Gender', 'email', 'password', 'Nickname', 'PlaceofBirth', 'Dateofbirth', 'Age', 'CivilStatus', 'Purok', 'VoterStatus', 'Occupation', 'Address', 'Zipcode', 'Citezenship', 'Profile', 'GovernmentIDFront', 'GovernmentIDBack'];

foreach ($columns as $column) {
    if (empty($userData[$column])) {
        $progress--; // Decrease progress by 1 for each empty column
    }
}

// Ensure progress is not less than 0
$progress = max(0, $progress);

// Output the progress value
echo $progress;
?>
