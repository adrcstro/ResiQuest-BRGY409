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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the resident_id is provided via POST request
    if (isset($_POST['resident_id'])) {
        $residentId = $_POST['resident_id'];

        // Prepare and execute the SQL query to delete the request
        $query = "DELETE FROM users WHERE ID = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $residentId);

        // Execute the statement and check for success
        if ($stmt->execute()) {
            echo "Resident deleted successfully.";
        } else {
            echo "Error deleting resident: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Resident ID not provided.";
    }

    // Check if all admin activity log data is provided
    if (isset($_POST['ADminIDlogs'], $_POST['Adminusername'], $_POST['AdminPosition'], $_POST['Adminactiondone'], $_POST['categorization'], $_POST['DateCreated'])) {
        // Collect form data for insertion
        $ADminIDlogs = $_POST['ADminIDlogs'];
        $Adminusername = $_POST['Adminusername'];
        $AdminPosition = $_POST['AdminPosition'];
        $Adminactiondone = $_POST['Adminactiondone'];
        $categorization = $_POST['categorization'];
        $DateCreated = $_POST['DateCreated'];

        // Prepare and execute the SQL query to insert the admin activity log
        $stmt = $conn->prepare("INSERT INTO adminactivitylog (AdminID, Username, OfficialPosition, Action, Createdate, Categorization) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("isssss", $ADminIDlogs, $Adminusername, $AdminPosition, $Adminactiondone, $DateCreated, $categorization);

        // Execute the statement and check for success
        if ($stmt->execute()) {
            echo "Admin activity logged successfully.";
        } else {
            echo "Error logging admin activity: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Incomplete admin activity log data.";
    }
} else {
    echo "Invalid request method.";
}



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];

    // Database connection (update with your database details)


    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // SQL query to delete the account
    $sql = "DELETE FROM users WHERE ID = ?";

    // Prepare and execute the statement
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);
    if ($stmt->execute()) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error', 'message' => $stmt->error]);
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request']);
}



// Close the database connection
mysqli_close($conn);
?>
