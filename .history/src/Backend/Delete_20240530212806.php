<?php
// Include the database connection file
require 'Connection.php';

$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if request ID is provided
if (isset($_GET['request_id'])) {
    $requestId = $_GET['request_id'];

    // Prepare and execute the SQL query to delete the request
    $query = "DELETE FROM requestdocument WHERE RequestID = $requestId";
    $result = mysqli_query($conn, $query);

    // Check if the query was successful
    if ($result) {
        echo "Request deleted successfully.";
    } else {
        echo "Error deleting request: " . mysqli_error($conn);
    }
} else {
    echo "Request ID not provided.";
}


if (isset($_GET['resident_id'])) {
    $residenttId = $_GET['resident_id'];

    // Prepare and execute the SQL query to delete the request
    $query = "DELETE FROM users WHERE ID = $residenttId";
    $result = mysqli_query($conn, $query);

    // Check if the query was successful
    if ($result) {
        echo "Residents deleted successfully.";
    } else {
        echo "Error deleting request: " . mysqli_error($conn);
    }
} else {
    echo "Request ID not provided.";
}


if (isset($_GET['news_id'])) {
    $newsid = $_GET['news_id'];

    // Prepare and execute the SQL query to delete the request
    $query = "DELETE FROM  newsandevents WHERE NewsID = $newsid ";
    $result = mysqli_query($conn, $query);

    // Check if the query was successful
    if ($result) {
        echo "News deleted successfully.";

    } else {
        echo "Error deleting request: " . mysqli_error($conn);
    }
} else {
    echo "Bews ID not provided.";
}

if (isset($_GET['admin_id'])) {
    $admin_id = $_GET['admin_id'];

    // Prepare and execute the SQL query to delete the request
    $query = "DELETE FROM  admintbl WHERE AdminID = $admin_id ";
    $result = mysqli_query($conn, $query);

    // Check if the query was successful
    if ($result) {
        echo "Admin deleted successfully.";

    } else {
        echo "Error deleting Admin: " . mysqli_error($conn);
    }
} else {
    echo "Admin ID not provided.";
}




//activityloginsert 








// Close the database connection
mysqli_close($conn);
?>
