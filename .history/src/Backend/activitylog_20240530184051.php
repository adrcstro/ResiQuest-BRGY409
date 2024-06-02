<?php
require 'Connection.php';

// Database connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Database connection error: " . $conn->connect_error);
}

// Get the status from the query string
$status = isset($_GET['status']) ? $conn->real_escape_string($_GET['status']) : '';

// Only proceed if the user is logged in and status is set
if (!empty($_SESSION["AdminID"]) && !empty($status)) {
    $ID = $_SESSION["AdminID"];

    // Get the count of complaints for each status


    // Display the count of complaints for each status
 
    // Display the complaints table
    echo '<div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                    <th scope="col" class="p-4 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Admin-ID</th>
                    <th scope="col" class="p-4 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">User-Name</th>
                    <th scope="col" class="p-4 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Officials-Position</th>
                    <th scope="col" class="p-4 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Action-Done</th>
                    <th scope="col" class="p-4 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Created Date</th>
                </tr>
            </thead>
            <tbody class="bg-white">';
    


    // Fetch and display complaints
    $query = "SELECT * FROM adminactivitylog AND ComplainStatus = ?";
    $stmt = $conn->prepare($query);
    if ($stmt) {
        $stmt->bind_param("is", $ID, $status);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
             

                echo '<tr>';
                echo '<td class="p-3 border border-inherit text-center  whitespace-nowrap text-sm font-semibold text-gray-900">' . $row["AdminID"] . '</td>';
                echo '<td class="p-3 border border-inherit text-center  whitespace-nowrap text-sm font-semibold text-gray-900">' . $row["Username"] . '</td>';
                echo '<td class="p-3 border border-inherit text-center  whitespace-nowrap text-sm font-semibold text-gray-900">' . $row["OfficialPosition"] . '</td>';
                echo '<td class="p-3 border border-inherit text-center  whitespace-nowrap text-sm font-semibold text-gray-900">' . $row["Action"] . '</td>';
                echo '<td class="p-3 border border-inherit text-center  whitespace-nowrap text-sm font-semibold text-gray-900">' . $row["Createdate"] . '</td>';
                echo '</tr>';
            }
        } else {
            echo '<tr><td colspan="6" class="px-6 py-4 border border-inherit text-center whitespace-nowrap text-sm font-semibold text-gray-900">
            <div class="mx-auto text-center mt-8" style="width: 200px;">
            <img src="/Images/norequest.svg" alt="Illustration" class="w-30 h-auto
            <p class="text-lg font-semibold text-center">No Complaints Found</p>
            </div>
            </td></tr>';
        }
        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }

    echo '</tbody></table></div>'; // Close table
} else {
    echo "No status provided or user not logged in.";
}


$conn->close();
?>