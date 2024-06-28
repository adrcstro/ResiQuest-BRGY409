<?php
require '../Backend/Connection.php';

if (isset($_POST['revert'])) {
    $id = $_POST['id'];

    // Move the record back to the original table
    $moveBackQuery = "INSERT INTO users SELECT * FROM archive_my_table WHERE ID = ?";
    $stmt = $conn->prepare($moveBackQuery);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    // Delete the record from the archive table
    $deleteFromArchiveQuery = "DELETE FROM archive_my_table WHERE ID = ?";
    $stmt = $conn->prepare($deleteFromArchiveQuery);
    $stmt->bind_param("i", $id);
    $stmt->execute();

  

 


}
?>
