<?php
include __DIR__ . '/../Connection.php';
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    echo "Database connection error" . mysqli_connect_error();
}
// Pagination setup
$limit = 5; // Number of entries per page
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;

// Total records query
$total_query = "SELECT COUNT(*) as total FROM users INNER JOIN admintbl ON admintbl.AdminID WHERE admintbl.AdminID = $ID";
$total_result = mysqli_query($conn, $total_query);
$total_row = mysqli_fetch_assoc($total_result);
$total_records = $total_row['total'];
$total_pages = ceil($total_records / $limit);

// Data query with pagination
$query = "SELECT users.*, admintbl.* 
FROM users 
INNER JOIN admintbl ON admintbl.AdminID 
WHERE admintbl.AdminID = $ID 
LIMIT $limit OFFSET $offset";
$result = mysqli_query($conn, $query);




// Count the number of male residents
$Countquery = "SELECT
    SUM(users.Gender = 'Male') AS male_count,
    SUM(users.Gender = 'Female') AS female_count,
    COUNT(*) AS total_count
FROM
    users
    INNER JOIN admintbl ON  admintbl.AdminID
WHERE
    admintbl.AdminID = $ID";

$Totalresult = mysqli_query($conn, $Countquery);
$row = mysqli_fetch_assoc($Totalresult);
$male_count = $row['male_count'];
$female_count = $row['female_count'];
$total_count = $row['total_count'];


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
                $statusBgColor = 'bg-green-400';
                break;
            case 'NotVerified':
                $statusBgColor = 'bg-red-400';
                break;
            default:
                $statusBgColor = ''; // No background color if status is not recognized
        }
        echo '<tr>';
        echo '<td class="p-3 border border-inherit text-center  whitespace-nowrap text-sm font-semibold text-gray-900">' . $row["ID"] . '</td>';
        echo '<td class="p-3 border border-inherit text-center  whitespace-nowrap text-sm font-semibold text-gray-900">' . $row["fname"] . ' ' . $row["Mname"] . ' ' . $row["lname"] . '</td>';
        echo '<td class="p-3 border border-inherit text-center  whitespace-nowrap text-sm font-semibold text-gray-900">' . $row["Age"] . '</td>';
        echo '<td class="p-3 border border-inherit text-center  whitespace-nowrap text-sm font-semibold text-gray-900">' . $row["Gender"] . '</td>';
        echo '<td class="p-3 border-2 border-inherit text-center text-sm font-semibold text-gray-900">' . 
        '<div class="flex justify-center items-center  text-white px-2 py-2 ' . $statusBgColor . ' h-full rounded">' . $row["Status"] . '</div>' . 
        '</td>';
       
        echo '</tr>';
    }
    // Close table body and table tags
    echo '</tbody></table>';
   
    echo '<nav aria-label="Page navigation example" class="flex justify-first mt-4">';
    echo '<ul class="inline-flex -space-x-px text-sm">';
    
    // Previous button
    if ($page > 1) {
        echo '<li><a href="?page=' . ($page - 1) . '" class="pagination-btn flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Previous</a></li>';
    }
    
    // Page numbers
    for ($i = 1; $i <= $total_pages; $i++) {
        $activeClass = $i == $page ? 'text-blue-600 bg-blue-50 hover:bg-blue-100 hover:text-blue-700' : 'text-gray-500 bg-white hover:bg-gray-100 hover:text-gray-700';
        echo '<li><a href="?page=' . $i . '" class="pagination-btn flex items-center justify-center px-3 h-8 leading-tight border border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white ' . $activeClass . '">' . $i . '</a></li>';
    }
    
    // Next button
    if ($page < $total_pages) {
        echo '<li><a href="?page=' . ($page + 1) . '" class="pagination-btn flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Next</a></li>';
    }

    echo '</ul></nav>';

    echo '<div class="bg-blue-100 p-3 rounded-md mt-6">
    <div class="flex items-center justify-center flex-wrap">
      <h2 class="text-xl font-semibold mr-1">Resident Table Summary</h2>
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
        <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
      </svg>
    </div>
    <ol class="items-center justify-center gap-2 sm:flex flex-wrap">
      <li class="relative mb-2 p-4 sm:mb-0 flex-1">
        <div class="flex items-center justify-center ">
          <div class="z-10 flex items-center justify-center w-14 h-14 bg-blue-100 rounded-full ring-0 ring-white dark:bg-blue-900 sm:ring-8 dark:ring-gray-900 shrink-0">
         <h1 class="text-xl font-semibold ">' . $male_count . '</h1>
          </div>
        </div>
        <div class="mt-3 text-center">
          <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-1">Male Resident</h3>
          <time class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">Total Number of Male Resident</time>
        </div>
      </li>
      <li class="relative mb-2 p-4 sm:mb-0 flex-1">
        <div class="flex items-center justify-center ">
          <div class="z-10 flex items-center justify-center w-14 h-14 bg-blue-100 rounded-full ring-0 ring-white dark:bg-blue-900 sm:ring-8 dark:ring-gray-900 shrink-0">
            <h1 class="text-xl font-semibold ">' . $female_count . '</h1>
          </div>
        </div>
        <div class="mt-3 text-center">
          <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-1">Female Resident</h3>
          <time class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">Total Number of Female Resident</time>
        </div>
      </li>
      <li class="relative mb-2 p-4 sm:mb-0 flex-1">
        <div class="flex items-center justify-center ">
          <div class="z-10 flex items-center justify-center w-14 h-14 bg-blue-100 rounded-full ring-0 ring-white dark:bg-blue-900 sm:ring-8 dark:ring-gray-900 shrink-0">
             <h1 class="text-xl font-semibold ">' . $total_count . '</h1>
          </div>
        </div>
        <div class="mt-3 text-center">
          <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-1">Total Population</h3>
          <time class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">Total Population of the Community</time>
        </div>
      </li>




      
    </ol>
    </div>';
    echo '</div>';

//modal for view residents info


} else {
    echo '<div class="mx-auto text-center mt-8" style="width: 200px;">';
    echo '<img src="/Images/norequest.svg" alt="Illustration" class="w-30 h-auto">';
    echo "<p class='text-lg font-semibold text-center '>No Residents Found</p>";
    echo '</div>';
}
?>