<?php
// Assuming you have a database connection established already
// Replace "your_db_host", "your_db_user", "your_db_password", and "your_db_name" with your actual database credentials
require '../Backend/Connection.php';


$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
if(!$conn){
  echo "Database connection error".mysqli_connect_error();
}


// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the user ID and password from the form submission
    $user_id = $_POST["user_id"];
    $password = $_POST["password"];

    // Query the database to get the user's hashed password
    $sql = "SELECT password FROM users WHERE ID= $user_id";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        // Fetch the result as an associative array
        $row = mysqli_fetch_assoc($result);
        $hashed_password = $row["password"];

        // Verify the entered password against the hashed password
        if (password_verify($password, $hashed_password)) {
            // Passwords match, open another dialog
            echo "<script>
            Swal.fire({
              icon: 'success',
              title: 'Password Matched!',
              showConfirmButton: false,
              timer: 1500
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'dashboard.php'; // Redirect to dashboard
                }
            });
            </script>";
        } else {
            // Passwords do not match, display a Sweet Alert
            echo "<script>
            Swal.fire({
              icon: 'error',
              title: 'Password is Wrong!',
              showConfirmButton: false,
              timer: 1500
            });
            </script>";
        }
    } else {
        // Error querying the database
        echo "<script>
        Swal.fire({
          icon: 'error',
          title: 'Database Error',
          text: '" . addslashes(mysqli_error($conn)) . "',
          showConfirmButton: true
        });
        </script>";
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
