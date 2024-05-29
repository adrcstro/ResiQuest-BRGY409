<?php
require 'Connection.php';

// Database connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Database connection error: " . $conn->connect_error);
}

// Get the status from the query string
$status = isset($_GET['status']) ? $conn->real_escape_string($_GET['status']) : '';

// Only proceed if the user is logged in and status is set
if (!empty($_SESSION["ID"]) && !empty($status)) {
    $ID = $_SESSION["ID"];
    $query = "SELECT * FROM complaintbl WHERE ComUserID = ? AND ComplainStatus = ?";
    $stmt = $conn->prepare($query);
    if ($stmt) {
        $stmt->bind_param("is", $ID, $status);
        $stmt->execute();
        $result = $stmt->get_result();

        // Count the number of complaints for each status
        $statusCounts = [];
        $statusCounts['Pending'] = getCountByStatus($conn, $ID, 'Pending');
        $statusCounts['On-Process'] = getCountByStatus($conn, $ID, 'On-Process');
        $statusCounts['On-Schedule'] = getCountByStatus($conn, $ID, 'On-Schedule');
        $statusCounts['Settled'] = getCountByStatus($conn, $ID, 'Settled');

        // Display the counts in the top left of each li tag
        foreach ($statusCounts as $status => $count) {
            echo '<li class="inline-flex items-center">';
            echo '<span class="text-sm font-medium text-gray-700">' . $status . ' Complaints: ' . $count . '</span>';
            // Add the rest of your li tag content here
            // ...
            echo '</li>';
        }

        // Rest of your existing code to display the table
        // ...
    } else {
        echo "Error preparing statement: " . $conn->error;
    }
} else {
    echo "No status provided or user not logged in.";
}

// Function to get the count of complaints for a specific status
function getCountByStatus($conn, $userID, $status)
{
    $query = "SELECT COUNT(*) as count FROM complaintbl WHERE ComUserID = ? AND ComplainStatus = ?";
    $stmt = $conn->prepare($query);
    if ($stmt) {
        $stmt->bind_param("is", $userID, $status);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        return $row['count'];
    } else {
        echo "Error preparing statement: " . $conn->error;
        return 0;
    }
}

// Close the database connection
$conn->close();
?>
