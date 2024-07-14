
<?php
include 'Sessiondetails.php';

if (isset($_POST['year']) && isset($_POST['month'])) {
    $year = $_POST['year'];
    $month = $_POST['month'];

    $sql = "SELECT COUNT(*) as requestCount FROM requestdocument WHERE YEAR(DateRequested) = ? AND MONTH(DateRequested) = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $year, $month);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_assoc();

    echo json_encode($data);
} else {
    echo json_encode(['requestCount' => 0]);
}
?>