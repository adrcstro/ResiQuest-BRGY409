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
if (!empty($_SESSION["ID"]) && !empty($status)) {
    $ID = $_SESSION["ID"];

    // Get the count of complaints for each status
    $statusCounts = [];
    $statusCounts['Pending'] = getCountByStatus($conn, $ID, 'Pending');
    $statusCounts['On-Process'] = getCountByStatus($conn, $ID, 'On-Process');
    $statusCounts['On-Schedule'] = getCountByStatus($conn, $ID, 'On-Schedule');
    $statusCounts['Settled'] = getCountByStatus($conn, $ID, 'Settled');

    // Display the count of complaints for each status
    echo '<div class="flex space-x-4">'; // Start flex container
    foreach ($statusCounts as $statusKey => $count) {
        echo '<span class="text-sm font-medium text-gray-700">' . $statusKey . ' Complaints: ' . $count . '</span>';
    }
    echo '</div>'; // End flex container

    // Display the complaints table
    echo '<div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Complaint ID</th>
                        <th scope="col" class="px-6 py-3 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Date Report Filed</th>
                        <th scope="col" class="px-6 py-3 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Type of Complaint</th>
                        <th scope="col" class="px-6 py-3 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Complainee</th>';
                        
    // Additional headers based on status
    if ($status == 'On-Schedule') {
        echo '<th scope="col" class="px-6 py-3 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Date and Time</th>';
        echo '<th scope="col" class="px-6 py-3 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Time</th>';
    } elseif ($status == 'Settled') {
        echo '<th scope="col" class="px-6 py-3 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Date Settled</th>';
    }

    echo '<th scope="col" class="px-6 py-3 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                </tr>
            </thead>
            <tbody class="bg-white">';

    // Fetch and display complaints
    $query = "SELECT * FROM complaintbl WHERE ComUserID = ? AND ComplainStatus = ?";
    $stmt = $conn->prepare($query);
    if ($stmt) {
        $stmt->bind_param("is", $ID, $status);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
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
                echo '<td class="px-6 py-4 border border-inherit text-center whitespace-nowrap text-sm font-semibold text-gray-900">' . $row["ComplainID"] . '</td>';
                echo '<td class="px-6 py-4 border border-inherit text-center whitespace-nowrap text-sm font-semibold text-gray-900">' . $row["DateofReport"] . '</td>';
                echo '<td class="px-6 py-4 border border-inherit text-center whitespace-nowrap text-sm font-semibold text-gray-900">' . $row["TypeofComplaint"] . '</td>';
                echo '<td class="px-6 py-4 text-center border-2 border-inherit rounded-md text-sm font-semibold text-gray-900 ">' . $row["NameofComplainee"] . '</td>';

                // Additional data based on status
                if ($status == 'On-Schedule') {
                    echo '<td class="px-6 py-4 border border-inherit text-center whitespace-nowrap text-sm font-semibold text-gray-900">' . $row["Settlement-Date"] . '</td>';
                    echo '<td class="px-6 py-4 border border-inherit text-center whitespace-nowrap text-sm font-semibold text-gray-900">' . $row["Settlement-Time"] . '</td>';
                } elseif ($status == 'Settled') {
                    echo '<td class="px-6 py-4 border border-inherit text-center whitespace-nowrap text-sm font-semibold text-gray-900">' . $row["Date-Settled"] . '</td>';
                }

                echo '<td class="px-6 py-4 text-center border-2 border-inherit rounded-md text-sm font-semibold text-gray-900 ' . $statusBgColor . '">' . $row["ComplainStatus"] . '</td>';
                echo '</tr>';
            }
        } else {
            echo '<tr><td colspan="6" class="px-6 py-4 border border-inherit text-center whitespace-nowrap text-sm font-semibold text-gray-900">No complaints found.</td></tr>';
        }
        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }

    echo '</tbody></table></div>'; // Close table
} else {
    echo "No status provided or user not logged in.";
}

// Function to get the count of complaints for a specific status
function getCountByStatus($conn, $userID, $status)
{
    $query = "SELECT COUNT(*) as count FROM complaintbl WHERE ComUserID = ? AND ComplainStatus = ?";
    $stmt = $conn->prepare($query);
    if ($stmt) {
        $stmt->bind_param("is", $userID, $status);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        return $row['count'];
    } else {
        echo "Error preparing statement: " . $conn->error;
        return 0;
    }
}

$conn->close();
?>