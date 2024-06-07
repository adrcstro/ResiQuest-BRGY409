<?php
if (!empty($_SESSION["AdminID"])) {
    $ID = $_SESSION["AdminID"];
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Example query to get data for the line graph
    $sql = "SELECT DATE(DateofReport) as date, COUNT(*) AS count FROM complaintbl GROUP BY DATE(date_column)";
    $result = $conn->query($sql);

    $data = [];
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    } else {
        echo "Error retrieving data from the database.";
    }

    $conn->close();

    echo json_encode($data);
}
?>
