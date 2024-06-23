<?php
include __DIR__ .'/../Connection.php';
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    echo "Database connection error" . mysqli_connect_error();
}

$ID = $_SESSION["AdminID"];
$records_per_page = 5;
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? intval($_GET['page']) : 1;
$offset = ($page - 1) * $records_per_page;

$query = "SELECT users.*, admintbl.* 
FROM users INNER JOIN admintbl ON users.AdminID = admintbl.AdminID
WHERE admintbl.AdminID = $ID
LIMIT $records_per_page OFFSET $offset";

$result = mysqli_query($conn, $query);

$total_query = "SELECT COUNT(*) as total 
FROM users INNER JOIN admintbl ON users.AdminID = admintbl.AdminID
WHERE admintbl.AdminID = $ID";
$total_result = mysqli_query($conn, $total_query);
$total_row = mysqli_fetch_assoc($total_result);
$total_records = $total_row['total'];
$total_pages = ceil($total_records / $records_per_page);

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
           <li class="open-resident-details-modal-btn" data-Residents-id="' . $row["ID"] . '"><a><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
           <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
           <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
         </svg>
          View Details</a></li>

           <li class="edit-residents-btn"  data-Residents-id="' . $row["ID"] . '"  data-Residents-profile="' . $row["Profile"] . '" data-Residents-fname="' . $row["fname"] . '"  data-Residents-mname="' . $row["Mname"] . '"  data-Residents-Lname="' . $row["lname"] . '" data-Residents-nname="' . $row["Nickname"] . '" data-Residents-placeofbirth="' . $row["PlaceofBirth"] . '"  data-Residents-dateofbirth="' . $row["Dateofbirth"] . '"
           data-Residents-age="' . $row["Age"] . '"   data-Residents-civilstat="' . $row["CivilStatus"] . '" data-Residents-gender="' . $row["Gender"] . '"  data-Residents-purok="' . $row["Purok"] . '"
           data-Residents-voterstat="' . $row["VoterStatus"] . '"   data-Residents-email="' . $row["email"] . '"   data-Residents-occupation="' . $row["Occupation"] . '"   data-Residents-contactnum="' . $row["ContactNumber"] . '"
           data-Residents-address="' . $row["Address"] . '"  data-Residents-zipcode="' . $row["Zipcode"] . '"  data-Residents-citizenship="' . $row["Citezenship"] . '" data-adminid-logs="' . $row["AdminID"] . '" data-adminusername-logs="' . $row["Lname"] . ',' . $row["Fname"] . ' ' . $row["MName"] . ' " data-adminposition-logs="' . $row["BrgyPosition"] . '">
           <a><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
           <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
         </svg>
          Edit Residents</a></li>
          <li class="delete-residents-btn" data-Residents-id="' . $row["ID"] . '" data-adminid-logs="' . $row["AdminID"] . '" data-adminusername-logs="' . $row["Lname"] . ',' . $row["Fname"] . ' ' . $row["MName"] . ' " data-adminposition-logs="' . $row["BrgyPosition"] . '" ><a><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
          <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m-1.022-.166a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
      </svg> Delete Residents</a></li>

      <li class="delete-verify-btn" data-Residents-id="' . $row["ID"] . '"  data-verifyResidents-profile="' . $row["Profile"] . '" data-Residents-fname="' . $row["fname"] . '"  data-Residents-mname="' . $row["Mname"] . '"  data-Residents-Lname="' . $row["lname"] . '"  data-adminid-logs="' . $row["AdminID"] . '" data-adminusername-logs="' . $row["Lname"] . ',' . $row["fname"] . ' ' . $row["MName"] . ' " data-adminposition-logs="' . $row["BrgyPosition"] . '"><a><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
      <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 0 1-1.043 3.296 3.745 3.745 0 0 1-3.296 1.043A3.745 3.745 0 0 1 12 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 0 1-3.296-1.043 3.745 3.745 0 0 1-1.043-3.296A3.745 3.745 0 0 1 3 12c0-1.268.63-2.39 1.593-3.068a3.746 3.746 0 0 1 1.043-3.296 3.746 3.746 0 0 1 3.296-1.043A3.746 3.746 0 0 1 12 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 0 1 3.296 1.043 3.746 3.746 0 0 1 1.043 3.296A3.745 3.745 0 0 1 21 12Z" />
    </svg>Verify Residents</a></li>
      </ul>
  </div>
</td>';
        echo '</tr>';
    }
    // Close table body and table tags
    echo '</tbody></table></div>';
    
    // Pagination
    echo '<div class="mt-4">';
    echo '<nav class="block">';
    echo '<ul class="flex pl-0 rounded list-none flex-wrap">';
    if ($page > 1) {
        echo '<li><a href="?page=' . ($page - 1) . '" class="first:ml-0 text-xs font-semibold flex w-8 h-8 mx-1 p-0 rounded-full justify-center items-center leading-tight bg-gray-200 text-gray-700">«</a></li>';
    }
    for ($i = 1; $i <= $total_pages; $i++) {
        $active = ($i == $page) ? 'bg-blue-500 text-white' : 'bg-gray-200 text-gray-700';
        echo '<li><a href="?page=' . $i . '" class="first:ml-0 text-xs font-semibold flex w-8 h-8 mx-1 p-0 rounded-full justify-center items-center leading-tight ' . $active . '">' . $i . '</a></li>';
    }
    if ($page < $total_pages) {
        echo '<li><a href="?page=' . ($page + 1) . '" class="first:ml-0 text-xs font-semibold flex w-8 h-8 mx-1 p-0 rounded-full justify-center items-center leading-tight bg-gray-200 text-gray-700">»</a></li>';
    }
    echo '</ul>';
    echo '</nav>';
    echo '</div>';
} else {
    echo '<div class="mx-auto text-center mt-8" style="width: 200px;">';
    echo '<img src="/Images/norequest.svg" alt="Illustration" class="w-30 h-auto">';
    echo "<p class='text-lg font-semibold text-center '>No Residents Found</p>";
    echo '</div>';
}
?>
