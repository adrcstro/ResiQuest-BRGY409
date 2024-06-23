<?php
include __DIR__ . '/../Connection.php';

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    echo "Database connection error" . mysqli_connect_error();
    exit;
}

$ID = $_SESSION["AdminID"];
$limit = 5; // Number of entries to show per page
$page = isset($_POST['page']) ? $_POST['page'] : 1; // Current page number
$start = ($page - 1) * $limit; // Starting point for the current page

$query = "SELECT users.*, admintbl.* 
FROM users INNER JOIN admintbl ON admintbl.AdminID = users.AdminID
WHERE admintbl.AdminID = $ID 
LIMIT $start, $limit";

$result = mysqli_query($conn, $query);

$total_results = mysqli_query($conn, "SELECT COUNT(*) as total FROM users INNER JOIN admintbl ON admintbl.AdminID = users.AdminID WHERE admintbl.AdminID = $ID");
$total_rows = mysqli_fetch_assoc($total_results)['total'];
$total_pages = ceil($total_rows / $limit);

if (mysqli_num_rows($result) > 0) {
    echo '<div class="overflow-x-auto h-screen">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th class="bg-gray-50 border-2 border-inherit text-center px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">Residents ID</th>
                <th class="bg-gray-50 px-6 py-3 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Residents Name</th>
                <th class="bg-gray-50 px-6 py-3 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Age</th>
                <th class="bg-gray-50 px-6 py-3 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Gender</th>
                <th class="bg-gray-50 px-6 py-3 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Account Status</th>
                <th class="bg-gray-100 px-6 py-3 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">';
    
    while ($row = mysqli_fetch_assoc($result)) {
        $statusBgColor = '';
        switch ($row["Status"]) {
            case 'Verified':
                $statusBgColor = 'text-green-400';
                break;
            case 'NotVerified':
                $statusBgColor = 'text-red-400';
                break;
            default:
                $statusBgColor = ''; // No background color if status is not recognized
        }
        
        echo '<tr>';
        echo '<td class="p-3 border border-inherit text-center whitespace-nowrap text-sm font-semibold text-gray-900">' . $row["ID"] . '</td>';
        echo '<td class="p-3 border border-inherit text-center whitespace-nowrap text-sm font-semibold text-gray-900">' . $row["fname"] . ' ' . $row["Mname"] . ' ' . $row["lname"] . '</td>';
        echo '<td class="p-3 border border-inherit text-center whitespace-nowrap text-sm font-semibold text-gray-900">' . $row["Age"] . '</td>';
        echo '<td class="p-3 border border-inherit text-center whitespace-nowrap text-sm font-semibold text-gray-900">' . $row["Gender"] . '</td>';
        echo '<td class="p-3 text-center border-2 border-inherit rounded-md text-sm font-semibold text-gray-900 ' . $statusBgColor . '">' . $row["Status"] . '</td>';
        echo '<td class="p-1 border border-inherit text-center whitespace-nowrap text-sm font-semibold text-gray-900">
        <div class="dropdown dropdown-end">
            <div tabindex="0" role="button" class="flex items-center justify-between text-white font-semibold btn w-40 bg-blue-400 hover:bg-blue-500">
            Action Details
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
            </svg>
            </div>
            <ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow-2xl bg-base-100 rounded-box w-52">
                <li class="open-resident-details-modal-btn" data-Residents-id="' . $row["ID"] . '">
                    <a><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    </svg> View Details</a>
                </li>
                <li class="edit-residents-btn" data-Residents-id="' . $row["ID"] . '" data-Residents-profile="' . $row["Profile"] . '" data-Residents-fname="' . $row["fname"] . '" data-Residents-mname="' . $row["Mname"] . '" data-Residents-Lname="' . $row["lname"] . '" data-Residents-nname="' . $row["Nickname"] . '" data-Residents-placeofbirth="' . $row["PlaceofBirth"] . '" data-Residents-dateofbirth="' . $row["Dateofbirth"] . '" data-Residents-age="' . $row["Age"] . '" data-Residents-civilstat="' . $row["CivilStatus"] . '" data-Residents-gender="' . $row["Gender"] . '" data-Residents-purok="' . $row["Purok"] . '" data-Residents-voterstat="' . $row["VoterStatus"] . '" data-Residents-email="' . $row["email"] . '" data-Residents-occupation="' . $row["Occupation"] . '" data-Residents-contactnum="' . $row["ContactNumber"] . '" data-Residents-address="' . $row["Address"] . '" data-Residents-zipcode="' . $row["Zipcode"] . '" data-Residents-citizenship="' . $row["Citezenship"] . '" data-adminid-Residents="' . $row["AdminID"] . '">
                    <a><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232 18.768 8.768M16.5 3.5a2.121 2.121 0 0 1 3 3L7.5 18.5l-4 1 1-4L16.5 3.5Z" />
                    </svg> Edit</a>
                </li>
                <li class="delete-Residents-btn" data-Residents-id="' . $row["ID"] . '">
                    <a><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 6.75 6.75 17.25m10.5 0L6.75 6.75" />
                    </svg> Delete</a>
                </li>
            </ul>
        </div>
    </td>';
        echo '</tr>';
    }
    
    echo '</tbody>
    </table>
    </div>';
    
    echo '<div class="btn-group mt-5">';
    for ($i = 1; $i <= $total_pages; $i++) {
        echo '<button class="btn pagination-btn" data-page="' . $i . '">' . $i . '</button>';
    }
    echo '</div>';
} else {
    echo "No results found.";
}

mysqli_close($conn);
?>
