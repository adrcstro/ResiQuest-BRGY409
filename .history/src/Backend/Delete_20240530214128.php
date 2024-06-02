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

if (isset($_POST['ADminIDlogs'], $_POST['Adminusername'], $_POST['AdminPosition'], $_POST['Adminactiondone'], $_POST['categorization'], $_POST['DateCreated'])) {
    // Collect form data for insertion
    $ADminIDlogs = $_POST['ADminIDlogs'];
    $Adminusername = $_POST['Adminusername'];
    $AdminPosition  = $_POST['AdminPosition'];
    $Adminactiondone = $_POST['Adminactiondone'];
    $categorization = $_POST['categorization'];
    $DateCreated = $_POST['DateCreated'];
    
    $stmt = $conn->prepare("INSERT INTO  adminactivitylog (AdminID ,Username, OfficialPosition, Action, Createdate, Categorization) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("isssss",  $ADminIDlogs ,  $Adminusername ,$AdminPosition, $Adminactiondone , $DateCreated,$categorization);
    if ($stmt->execute() === TRUE) {
        echo "";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}







// Close the database connection
mysqli_close($conn);
?>
