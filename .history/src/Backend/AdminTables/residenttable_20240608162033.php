<?php
include __DIR__ . '/../Connection.php';
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    echo "Database connection error" . mysqli_connect_error();
}

$ID = $_SESSION["AdminID"];
$limit = 5; // Number of entries to show per page
$page = isset($_POST['page']) ? $_POST['page'] : 1; // Current page number
$start = ($page - 1) * $limit; // Starting point for the current page

$query = "SELECT users.*, admintbl.* 
FROM users INNER JOIN admintbl ON admintbl.AdminID
WHERE admintbl.AdminID = $ID 
LIMIT $start, $limit;";

$result = mysqli_query($conn, $query);

$total_results = mysqli_query($conn, "SELECT COUNT(*) as total FROM users INNER JOIN admintbl ON admintbl.AdminID WHERE admintbl.AdminID = $ID");
$total_rows = mysqli_fetch_assoc($total_results)['total'];
$total_pages = ceil($total_rows / $limit);

if (!isset($_POST['ajax'])) {
    echo '<div class="overflow-x-auto h-screen">';
}

if (mysqli_num_rows($result) > 0) {
    // Output table header
    echo '<table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="bg-gray-50 border-2 border-inherit text-center px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">Residents ID</th>
                <th scope="col" class="bg-gray-50 px-6 py-3 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Residents Name</th>
                <th scope="col" class="bg-gray-50 px-6 py-3 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Age</th>
                <th scope="col" class="bg-gray-50 px-6 py-3 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Gender</th>
                <th scope="col" class="bg-gray-50 px-6 py-3 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Account Status</th>
                <th scope="col" class="bg-gray-100 px-6 py-3 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">';

    // Fetch and display each row
    while ($row = mysqli_fetch_assoc($result)) {
        $statusBgColor = '';
        switch ($row["Status"]) {
            case 'Verified':
                $statusBgColor = 'text-green-400';
                break;
            case 'NotVerified':
                $statusBgColor = 'text-red-400 ';
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
           <ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow-2xl bg-base-100 rounded-box w-52 ">
               <li class="open-resident-details-modal-btn" data-Residents-id="' . $row["ID"] . '"><a><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
               <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
               <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
             </svg> View Details</a></li>
               <li class="edit-residents-btn"  data-Residents-id="' . $row["ID"] . '"  data-Residents-profile="' . $row["Profile"] . '" data-Residents-fname="' . $row["fname"] . '"  data-Residents-mname="' . $row["Mname"] . '"  data-Residents-Lname="' . $row["lname"] . '" data-Residents-nname="' . $row["Nickname"] . '" data-Residents-placeofbirth="' . $row["PlaceofBirth"] . '"  data-Residents-dateofbirth="' . $row["Dateofbirth"] . '"
               data-Residents-age="' . $row["Age"] . '"   data-Residents-civilstat="' . $row["CivilStatus"] . '" data-Residents-gender="' . $row["Gender"] . '"  data-Residents-purok="' . $row["Purok"] . '"
               data-Residents-voterstat="' . $row["VoterStatus"] . '"   data-Residents-email="' . $row["email"] . '"   data-Residents-occupation="' . $row["Occupation"] . '"   data-Residents-contactnum="' . $row["ContactNumber"] . '"
               data-Residents-address="' . $row["Address"] . '"  data-Residents-zipcode="' . $row["Zipcode"] . '"  data-Residents-citizenship="' . $row["Citezenship"] . '" data-adminid-logs="' . $row["AdminID"] . '" data-adminusername-logs="' . $row["Lname"] . ',' . $row["Fname"] . ' ' . $row["MName"] . ' " data-adminposition-logs="' . $row["BrgyPosition"] . '">
               <a> <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
               <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487c.507.507.968 1.06 1.374 1.653M2.726 19.123c-.434 1.151-.649 1.726-.618 2.027.022.217.05.263.263.286.302.031.877-.184 2.027-.618 1.15-.433 2.576-1.176 4.24-2.14m-5.912.445 5.912-.445m0 0c.635-.048 1.142-.443 1.355-1.038a11.1 11.1 0 0 1 .597-1.378m-1.952 2.416 1.952-2.416m0 0c1.365-.274 2.822-.93 4.244-1.924 1.423-.995 2.7-2.203 3.726-3.495m-7.97 5.419 7.97-5.419m0 0c.527-.696 1.027-1.424 1.497-2.179.249-.405.373-.608.523-.756.198-.19.515-.308.927-.433.418-.127.905-.236 1.473-.3.55-.062 1.15-.062 1.864-.062m-4.414 3.73c.478-.381.922-.79 1.329-1.221.673-.734 1.241-1.502 1.705-2.273m0 0c.257-.429.59-.821.995-1.162.41-.347.891-.635 1.431-.847.553-.22 1.177-.371 1.865-.422.69-.051 1.39.032 2.088.112" />
             </svg> Edit</a></li>
               <li class="delete-residents-btn"  data-Residents-id="' . $row["ID"] . '"><a>
                 <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
               <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6h3m4.5 3V6a3 3 0 0 0-3-3h-3a3 3 0 0 0-3 3v3M3 9h18m-1 0a1 1 0 0 1 1 1v11a3 3 0 0 1-3 3H6a3 3 0 0 1-3-3V10a1 1 0 0 1 1-1m14 0H5" />
             </svg>
                Delete</a></li>
           </ul>
         </div></td>';
        echo '</tr>';
    }
    echo '</tbody></table>';
} else {
    echo '<p class="text-gray-600">No records found.</p>';
}

if (!isset($_POST['ajax'])) {
    echo '</div>';
    // Output pagination
    echo '<div class="flex items-center justify-between mt-4">
        <button class="pagination-btn" data-page="' . max(1, $page - 1) . '">Previous</button>';
    for ($i = 1; $i <= $total_pages; $i++) {
        echo '<button class="pagination-btn" data-page="' . $i . '">' . $i . '</button>';
    }
    echo '<button class="pagination-btn" data-page="' . min($total_pages, $page + 1) . '">Next</button>
    </div>';
}
?>
