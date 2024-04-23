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

  // Query the database to get the user's password
  $sql = "SELECT password FROM users WHERE id = $user_id";
  $result = mysqli_query($conn, $sql);

  if ($result) {
    // Fetch the result as an associative array
    $row = mysqli_fetch_assoc($result);
    $stored_password = $row["password"];

    // Check if the entered password matches the stored password
    if ($password == $stored_password) {
      // Passwords match, open another dialog
      echo "<script>alert('Password matched!');</script>";
    } else {
      // Passwords do not match, display a Sweet Alert
      echo "<script>alert('Password is wrong!');</script>";
    }
  } else {
    // Error querying the database
    echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
  }

  // Close the database connection
  mysqli_close($conn);
}
?>
