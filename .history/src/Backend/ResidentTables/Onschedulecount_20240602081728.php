<?php
include __DIR__ . '/../Connection.php'; 
if (!empty($_SESSION["ID"])) {
    $ID = $_SESSION["ID"];
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT COUNT(*) AS total FROM requestdocument WHERE UserID = $ID AND Status = 'Completed'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // Fetch the result
        $row = $result->fetch_assoc();
        $totalCount = $row["total"];
        echo '<span class="h3 font-bold mb-0">' . $totalCount . '</span>';
    } else {
        echo "Error retrieving data from the database.";
    }
    $conn->close();
}
?>