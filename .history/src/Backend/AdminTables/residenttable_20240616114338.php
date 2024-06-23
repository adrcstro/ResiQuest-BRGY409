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

$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
    // Output table header
    echo '<div class="overflow-x-auto h-screen">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th scope="col"
                    class=" bg-gray-50 border-2 border-inherit text-center px-6 py-3  text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Residents ID
                </th>
                <th scope="col"
                    class=" bg-gray-50 px-6 py-3 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Residents Name
                </th>
                <th scope="col"
                    class=" bg-gray-50 px-6 py-3 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Age
                </th>
                <th scope="col"
                    class=" bg-gray-50 px-6 py-3 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Gender
                </th>
                <th scope="col"
                class=" bg-gray-50 px-6 py-3 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                Account Status
            </th>
            <th scope="col"
            class=" bg-gray-100 px-6 py-3  border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
            Action
        </th>
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
        echo '<td class="p-3 border border-inherit text-center  whitespace-nowrap text-sm font-semibold text-gray-900">' . $row["ID"] . '</td>';
        echo '<td class="p-3 border border-inherit text-center  whitespace-nowrap text-sm font-semibold text-gray-900">' . $row["fname"] . ' ' . $row["Mname"] . ' ' . $row["lname"] . '</td>';
        echo '<td class="p-3 border border-inherit text-center  whitespace-nowrap text-sm font-semibold text-gray-900">' . $row["Age"] . '</td>';
        echo '<td class="p-3 border border-inherit text-center  whitespace-nowrap text-sm font-semibold text-gray-900">' . $row["Gender"] . '</td>';
        echo '<td class="p-3 text-center border-2 border-inherit rounded-md text-sm font-semibold text-gray-900 ' . $statusBgColor . '">' . $row["Status"] . '</td>';
        echo '<td class="p-1   border border-inherit text-center whitespace-nowrap text-sm font-semibold text-gray-900">
       <div class="dropdown  dropdown-end">
       <div tabindex="0" role="button" class="flex items-center justify-between text-white font-semibold btn w-40 bg-blue-400 hover:bg-blue-500">
       Action Details
       <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
         <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
       </svg>
     </div>
       <ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow-2xl bg-base-100 rounded-box w-52 ">
           <li class="open-resident-details-modal-btn" data-residents-id="' . $row["ID"] . '"><a><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
           <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
           <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
         </svg>
          View Details</a></li>

           <li class="edit-residents-btn"  data-residents-id="' . $row["ID"] . '"  data-residents-profile="' . $row["Profile"] . '" data-residents-fname="' . $row["fname"] . '"  data-residents-mname="' . $row["Mname"] . '"  data-residents-lname="' . $row["lname"] . '" data-residents-nname="' . $row["Nickname"] . '" data-residents-placeofbirth="' . $row["PlaceofBirth"] . '"  data-residents-dateofbirth="' . $row["Dateofbirth"] . '"
           data-residents-age="' . $row["Age"] . '"   data-residents-civilstat="' . $row["CivilStatus"] . '" data-residents-gender="' . $row["Gender"] . '" data-residents-purok="' . $row["Purok"] . '" data-residents-voters="' . $row["VotersStatus"] . '"  data-residents-id="' . $row["ID"] . '"
           data-residents-contact="' . $row["Contact"] . '" data-residents-house="' . $row["HouseNumber"] . '" data-residents-street="' . $row["StreetName"] . '" data-residents-barangay="' . $row["Barangay"] . '" data-residents-municipal="' . $row["Municipal"] . '"
           data-residents-prov="' . $row["Province"] . '"  data-residents-nat="' . $row["Nationality"] . '"
           data-residents-email="' . $row["Email"] . '"><a><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
           <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 3.487a1.875 1.875 0 1 1 2.651 2.65L10.748 14.902a4.5 4.5 0 0 1-1.697 1.11l-2.927.98.979-2.928a4.5 4.5 0 0 1 1.11-1.697l8.649-8.649Z" />
           <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 6.75 17.25 4.5M12 20.25h7.5" />
         </svg>
           Edit Details</a></li>

           <li class="delete-verify-btn"  data-residents-id="' . $row["ID"] . '" data-residents-name="' . $row["fname"] . '"><a><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
           <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 8.25V6A4.5 4.5 0 0 0 12 1.5 4.5 4.5 0 0 0 7.5 6v2.25m-3 0H21m-3 0v9a5.25 5.25 0 0 1-5.25 5.25h-3A5.25 5.25 0 0 1 4.5 17.25v-9h13.5Z" />
         </svg>
          Verify Account</a></li>
       </ul>
   </div>
</td>';

        echo '</tr>';
    }

    echo '</tbody></table></div>';
} else {
    echo 'No results found';
}

// Pagination links
if ($total_pages > 1) {
    echo '<div class="pagination">';
    for ($i = 1; $i <= $total_pages; $i++) {
        echo '<button class="pagination-btn" data-page="' . $i . '">' . $i . '</button>';
    }
    echo '</div>';
}
?>
