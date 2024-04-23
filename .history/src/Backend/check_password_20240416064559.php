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



// Check if the POST request contains user_id and password fields
if (isset($_POST['user_id']) && isset($_POST['password'])) {
    // Get the user_id and password from the POST request
    $user_id = $_POST['user_id'];
    $password = $_POST['password'];

    // Connect to your database (replace dbname, username, password with your database credentials)
    $pdo = new PDO('mysql:host=localhost;dbname=brgy409drms', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Prepare SQL statement to fetch the hashed password for the provided user_id
    $stmt = $pdo->prepare('SELECT password FROM users WHERE ID = :user_id');
    $stmt->bindParam(':user_id', $user_id);
    $stmt->execute();

    // Fetch the hashed password from the database
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        // Verify the provided password against the hashed password retrieved from the database
        if (password_verify($password, $row['password'])) {
            // Password is correct, return HTML for the modal dialog
            echo '<dialog id="my_modal_3" class="modal">
                    <div class="modal-box">
                      <form method="dialog">
                        <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                      </form>
                      <h3 class="font-bold text-lg">Hello!</h3>
                      <p class="py-4">Press ESC key or click on ✕ button to close</p>
                    </div>
                  </dialog>';
        } else {
            // Password is incorrect
            echo 'error';
        }
    } else {
        // User not found in the database
        echo 'error';
    }
} else {
    // If user_id or password is not provided in the POST request, return an error message
    echo 'error';
}

