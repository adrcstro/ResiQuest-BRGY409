
<?php

function getCount($table) {
    include __DIR__ . '/../../Connection.php';

    if (!empty($_SESSION["AdminID"])) {
        $ID = $_SESSION["AdminID"];
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT COUNT(*) AS total FROM $table";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Fetch the result
            $row = $result->fetch_assoc();
            $totalCount = $row["total"];
            echo '<span class="text-2xl sm:text-3xl leading-none font-bold text-white">' . $totalCount . '</span>';
        } else {
            echo "Error retrieving data from the database.";
        }

        $conn->close();
    }
}

function countComplaints() {
    getCount("complaintbl");
}

function countRequestDocuments() {
    getCount("requestdocument");
}

function countUsers() {
    getCount("users");
}

function countRegisteredUsers() {
    $table = "users";
    $condition = "VoterStatus = 'Registered'";
    getCountWithCondition($table, $condition);
}


function countVerifiedUsers() {
    $table = "users";
    $condition = "Status = 'Verified'";
    getCountWithCondition($table, $condition);
}

function getCountWithCondition($table, $condition) {
    include __DIR__ . '/../../Connection.php';

    if (!empty($_SESSION["AdminID"])) {
        $ID = $_SESSION["AdminID"];
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT COUNT(*) AS total FROM $table WHERE $condition";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Fetch the result
            $row = $result->fetch_assoc();
            $totalCount = $row["total"];
            echo '<span class="text-2xl sm:text-3xl leading-none font-bold text-white">' . $totalCount . '</span>';
        } else {
            echo "Error retrieving data from the database.";
        }

        $conn->close();
    }
}

?>
