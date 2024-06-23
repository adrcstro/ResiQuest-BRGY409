<?php
include __DIR__ .'/../Connection.php';
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

session_start();
if (!isset($_SESSION["AdminID"])) {
    die("Admin ID not set in session.");
}

$ID = $_SESSION["AdminID"];

$conn = new mysqli($servername, $username, $password, $dbname);

$query = $conn->prepare("SELECT users.*, admintbl.* 
FROM users 
INNER JOIN admintbl ON users.AdminID = admintbl.AdminID 
WHERE admintbl.AdminID = ?");
$query->bind_param('i', $ID);
$query->execute();
$result = $query->get_result();

$totalRows = $result->num_rows;
$rowsPerPage = 5;
$totalPages = ceil($totalRows / $rowsPerPage);

if ($totalRows > 0) {
    echo '<div class="overflow-x-auto h-screen">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="text-center px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">Residents ID</th>
                <th scope="col" class="text-center px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">Residents Name</th>
                <th scope="col" class="text-center px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">Age</th>
                <th scope="col" class="text-center px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">Gender</th>
                <th scope="col" class="text-center px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">Account Status</th>
                <th scope="col" class="text-center px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">';

    $statusColors = [
        'Verified' => 'text-green-400',
        'NotVerified' => 'text-red-400',
    ];

    $currentPage = 1;
    $rowNumber = 0;

    while ($row = $result->fetch_assoc()) {
        $statusBgColor = $statusColors[$row["Status"]] ?? '';

        $page = ceil(($rowNumber + 1) / $rowsPerPage);
        echo '<tr data-page="' . $page . '">';
        echo '<td class="p-3 border text-center text-sm font-semibold text-gray-900">' . htmlspecialchars($row["ID"]) . '</td>';
        echo '<td class="p-3 border text-center text-sm font-semibold text-gray-900">' . htmlspecialchars($row["fname"] . ' ' . $row["Mname"] . ' ' . $row["lname"]) . '</td>';
        echo '<td class="p-3 border text-center text-sm font-semibold text-gray-900">' . htmlspecialchars($row["Age"]) . '</td>';
        echo '<td class="p-3 border text-center text-sm font-semibold text-gray-900">' . htmlspecialchars($row["Gender"]) . '</td>';
        echo '<td class="p-3 border text-center text-sm font-semibold text-gray-900 ' . $statusBgColor . '">' . htmlspecialchars($row["Status"]) . '</td>';
        echo '<td class="p-1 border text-center text-sm font-semibold text-gray-900">
            <div class="dropdown dropdown-end">
                <div tabindex="0" role="button" class="flex items-center justify-between text-white font-semibold btn w-40 bg-blue-400 hover:bg-blue-500">
                    Action Details
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                    </svg>
                </div>
                <ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow-2xl bg-base-100 rounded-box w-52">
                    <li class="open-resident-details-modal-btn" data-Residents-id="' . htmlspecialchars($row["ID"]) . '">
                        <a>View Details</a>
                    </li>
                    <li class="edit-residents-btn" data-Residents-id="' . htmlspecialchars($row["ID"]) . '">
                        <a>Edit Residents</a>
                    </li>
                    <li class="delete-residents-btn" data-Residents-id="' . htmlspecialchars($row["ID"]) . '">
                        <a>Delete Residents</a>
                    </li>
                    <li class="delete-verify-btn" data-Residents-id="' . htmlspecialchars($row["ID"]) . '">
                        <a>Verify Residents</a>
                    </li>
                </ul>
            </div>
        </td>';
        echo '</tr>';
        $rowNumber++;
    }

    echo '</tbody></table></div>';

    echo '<div class="mt-4 flex justify-center">';
    for ($i = 1; $i <= $totalPages; $i++) {
        echo '<button class="pagination-btn mx-1 px-3 py-1 bg-blue-400 text-white rounded-md" data-page="' . $i . '">' . $i . '</button>';
    }
    echo '</div>';
} else {
    echo '<div class="mx-auto text-center mt-8" style="width: 200px;">
            <img src="/Images/norequest.svg" alt="Illustration" class="w-30 h-auto">
            <p class="text-lg font-semibold text-center">No Residents Found</p>
          </div>';
}
?>
