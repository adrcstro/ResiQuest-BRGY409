<?php

require 'Connection.php';

$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if (!$conn) {
    echo "Database connection error" . mysqli_connect_error();
}
// Get the status from the query string
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Database connection error: " . mysqli_connect_error());
}

// Get the status from the query string
$status = isset($_GET['status']) ? $_GET['status'] : '';

// Only proceed if the user is logged in and status is set
if (!empty($_SESSION["ID"]) && !empty($status)) {
    $ID = $_SESSION["ID"];
    $query = "SELECT * FROM complaintbl WHERE ComUserID = ? AND ComplainStatus = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("is", $ID, $status);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        echo '<table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                    <th scope="col" class="p-4 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Complaint ID</th>
                    <th scope="col" class="p-4 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Date Report Filed</th>
                    <th scope="col" class="p-4 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Type of Complain</th>
                    <th scope="col" class="p-4 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Complainee</th>
                    <th scope="col" class="p-4 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    </tr>
                </thead>
                <tbody class="bg-white">';
        while ($row = $result->fetch_assoc()) {
            $statusBgColor = '';
            switch ($row["ComplainStatus"]) {
                case 'Pending':
                    $statusBgColor = 'bg-red-400 text-white';
                    break;
                case 'On-Process':
                    $statusBgColor = 'bg-yellow-300 text-white';
                    break;
                case 'On-Schedule':
                    $statusBgColor = 'bg-green-400 text-white';
                    break;
                case 'Settled':
                    $statusBgColor = 'bg-orange-400 text-white';
                    break;
                default:
                    $statusBgColor = ''; // No background color if status is not recognized
            }
            echo '<tr>';
            echo '<td class="p-1 border border-inherit text-center whitespace-nowrap text-sm font-semibold text-gray-900">' . $row["ComplainID"] . '</td>';
            echo '<td class="p-1 border border-inherit text-center whitespace-nowrap text-sm font-semibold text-gray-900">' . $row["DateofReport"] . '</td>';
            echo '<td class="p-1 border border-inherit text-center whitespace-nowrap text-sm font-semibold text-gray-900">' . $row["TypeofComplaint"] . '</td>';
            echo '<td class="text-center border-2 border-inherit rounded-md text-sm font-semibold text-gray-900 ">' . $row["NameofComplainee"] . '</td>';
            echo '<td class="text-center border-2 border-inherit rounded-md text-sm font-semibold text-gray-900 ' . $statusBgColor . '">' . $row["ComplainStatus"] . '</td>';
            echo '</tr>';
        }
        echo '</tbody></table>';
    } else {
        echo '<div class="mx-auto text-center mt-8" style="width: 200px;">';
        echo '<img src="/Images/norequest.svg" alt="Illustration" class="w-30 h-auto">';
        echo "<p class='text-lg font-semibold text-center'>No Filed Complain</p>";
        echo '</div>';
    }
} else {
    echo "No status provided or user not logged in.";
}

// Close the database connection
mysqli_close($conn);
?>