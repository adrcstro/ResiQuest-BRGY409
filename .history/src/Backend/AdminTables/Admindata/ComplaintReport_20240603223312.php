<?php
if (!empty($_SESSION["AdminID"])) {
    $ID = $_SESSION["AdminID"];
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    // Modify the query to fetch data for the line graph
    $sql = "SELECT DateRequested, COUNT(*) AS total FROM complaintbl GROUP BY DateRequested ORDER BY DateRequested";
    $result = $conn->query($sql);

    $data = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = array(
                'date' => $row['DateRequested'],
                'total' => $row['total']
            );
        }
        // Send data as JSON
        echo json_encode($data);
    } else {
        echo json_encode(array('error' => 'Error retrieving data from the database.'));
    }
    
    $conn->close();
}
?>
