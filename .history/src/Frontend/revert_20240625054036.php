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

   

    echo "<script>
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
            title: 'Success!',
            text: 'Record reverted to the original table successfully.',
            icon: 'success',
            confirmButtonText: 'OK'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = 'Residentrecord.php'; // Redirect back to the display page
            }
        });
    });
    </script>";



}
?>
