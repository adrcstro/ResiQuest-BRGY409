<?php
require 'Connection.php';

// Database connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Database connection error: " . $conn->connect_error);
}

$date_filter = $_GET['filter'] ?? 'all';

switch ($date_filter) {
    case 'today':
        $query = "SELECT * FROM requestdocument WHERE Status='Completed' AND PickUpDate = CURDATE()";
        break;
    case 'overdue':
        $query = "SELECT * FROM requestdocument WHERE Status='Completed' AND PickUpDate < CURDATE()";
        break;
    case 'empty':
        $query = "SELECT * FROM requestdocument WHERE Status='Completed' AND (PickUpDate IS NULL OR PickUpDate = '')";
        break;
    default:
        $query = "SELECT * FROM requestdocument WHERE Status='Completed'";
}

$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    echo '<div class="overflow-x-auto h-screen"><table class="table-auto min-w-full divide-y divide-gray-200 mt-3">
    <thead class="bg-gray-50">
        <tr>
            <th scope="col" class="p-4 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Request ID</th>
            <th scope="col" class="p-4 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Residents Name</th>
            <th scope="col" class="p-4 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Service Type</th>
            <th scope="col" class="p-4 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Pickup Date</th>
            <th scope="col" class="p-4 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Pickup Time</th>
            <th scope="col" class="p-4 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
        </tr>
    </thead>
    <tbody class="bg-white">';
    
    while ($row = mysqli_fetch_assoc($result)) {
        $emptyDateClass = ($date_filter === 'overdue' && (empty($row['PickUpDate']) || is_null($row['PickUpDate']))) ? 'empty-date-row' : '';
        echo '<tr class="' . $emptyDateClass . '">';
        echo '<td class="p-3 border border-inherit text-center whitespace-nowrap text-sm font-semibold text-gray-900">' . $row["RequestID"] . '</td>';
        echo '<td class="p-3 border border-inherit text-center whitespace-nowrap text-sm font-semibold text-gray-900">' . $row["FirstName"] . ' ' . $row["Middlename"] . ' ' . $row["Lastname"] . '</td>';
        echo '<td class="p-3 border border-inherit text-center whitespace-nowrap text-sm font-semibold text-gray-900">' . $row["ServiceType"] . '</td>';
        echo '<td class="p-3 border border-inherit text-center whitespace-nowrap text-sm font-semibold text-gray-900">' . $row["PickUpDate"] . '</td>';
        echo '<td class="p-3 border border-inherit text-center whitespace-nowrap text-sm font-semibold text-gray-900">' . $row["Pickuptime"] . '</td>';
        echo '<td class="p-1 border flex items-center justify-center border-inherit text-center whitespace-nowrap text-sm font-semibold text-gray-900">
            <div class="dropdown dropdown-end">
                <div tabindex="0" role="button" class="flex items-center justify-between text-white font-semibold btn w-40 bg-blue-400 hover:bg-blue-500">
                    Action Details
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                    </svg>
                </div>
                <ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow-2xl bg-base-100 rounded-box w-52">
                    <li class="Schedule-resident-pickup" data-request-id="' . $row["RequestID"] . '" data-request-servietype="' . $row["ServiceType"] . '" data-request-Fname="' . $row["FirstName"] . '" data-request-Mname="' . $row["Middlename"] . '" data-request-Lname="' . $row["Lastname"] . '">
                        <a>Schedule Released</a>
                    </li>
                    <li class="ReSchedule-resident-request" data-request-id="' . $row["RequestID"] . '" data-request-servietype="' . $row["ServiceType"] . '" data-request-Fname="' . $row["FirstName"] . '" data-request-Mname="' . $row["Middlename"] . '" data-request-Lname="' . $row["Lastname"] . '" data-reschedule-date="' . $row["PickUpDate"] . '" data-reschedule-time="' . $row["Pickuptime"] . '">
                        <a>Reschedule</a>
                    </li>
                    <li class="mark-as-released" data-request-id="' . $row["RequestID"] . '" data-request-servietype="' . $row["ServiceType"] . '" data-request-Fname="' . $row["FirstName"] . '" data-request-Mname="' . $row["Middlename"] . '" data-request-Lname="' . $row["Lastname"] . '">
                        <a>Mark Released</a>
                    </li>
                </ul>
            </div>
        </td>';
        echo '</tr>';
    }
    echo '</tbody></table></div>';
} else {
    echo '<div class="mx-auto text-center mt-8" style="width: 200px;">';
    echo '<img src="/Images/norequest.svg" alt="Illustration" class="w-30 h-auto">';
    echo "<p class='text-lg font-semibold text-center'>No Request Found</p>";
    echo '</div>';
}

mysqli_close($conn);
?>
