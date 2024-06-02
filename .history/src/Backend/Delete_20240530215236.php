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


// Check if all expected POST parameters are set
if (isset($_POST['ADminIDlogs'], $_POST['Adminusername'], $_POST['AdminPosition'], $_POST['Adminactiondone'], $_POST['categorization'], $_POST['DateCreated'], $_POST['resident_id'])) {
    // Collect form data for insertion
    $ADminIDlogs = $_POST['ADminIDlogs'];
    $Adminusername = $_POST['Adminusername'];
    $AdminPosition  = $_POST['AdminPosition'];
    $Adminactiondone = $_POST['Adminactiondone'];
    $categorization = $_POST['categorization'];
    $DateCreated = $_POST['DateCreated'];
    $ResidentId = $_POST['resident_id'];

    // Delete resident query
    $delete_sql = "DELETE FROM residents WHERE id = ?";
    $stmt = $conn->prepare($delete_sql);
    $stmt->bind_param("i", $ResidentId);

    if ($stmt->execute()) {
        // Insert log into adminactivitylog
        $stmt->close();
        
        $stmt = $conn->prepare("INSERT INTO adminactivitylog (AdminID, Username, OfficialPosition, Action, Createdate, Categorization) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("isssss", $ADminIDlogs, $Adminusername, $AdminPosition, $Adminactiondone, $DateCreated, $categorization);
        
        if ($stmt->execute()) {
            echo "Record deleted and log entry created successfully.";
        } else {
            echo "Error logging the activity: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error deleting record: " . $stmt->error;
    }
} else {
    echo "Required data not provided.";
}





// Close the database connection
mysqli_close($conn);
?>
