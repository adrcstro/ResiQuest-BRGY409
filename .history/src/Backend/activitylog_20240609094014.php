<?php
require 'Connection.php';
$conn = mysqli_connect($servername, $username, $password, $dbname);
if(!$conn){
  echo "Database connection error".mysqli_connect_error();
}


$limit = 5; // Number of entries to show per page
$page = isset($_POST['page']) ? $_POST['page'] : 1; // Current page number
$start = ($page - 1) * $limit; // Starting point for the current page



// Check if status is set in GET request
if(isset($_GET['status'])) {
    $status = $_GET['status'];
    // Validate status to prevent SQL injection
    // Fetch records based on status
    $query = "SELECT * FROM adminactivitylog WHERE Categorization = '$status' LIMIT $start, $limit;";
    $result = mysqli_query($conn, $query);


    $total_results = mysqli_query($conn, "SELECT COUNT(*) as total FROM adminactivitylog Categorization = '$status'");
    $total_rows = mysqli_fetch_assoc($total_results)['total'];
    $total_pages = ceil($total_rows / $limit);



    if(mysqli_num_rows($result) > 0) {
        // Output table header
        echo '<table class="min-w-full  divide-y divide-gray-200 mt-3">
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

        // Fetch and display each row
        while($row = mysqli_fetch_assoc($result)) {
            echo '<tr>';
            echo '<td class="p-3 border border-inherit text-center  whitespace-nowrap text-sm font-semibold text-gray-900">' . $row["AdminID"] . '</td>';
            echo '<td class="p-3 border border-inherit text-center  whitespace-nowrap text-sm font-semibold text-gray-900">' . $row["Username"] . '</td>';
            echo '<td class="p-3 border border-inherit text-center  whitespace-nowrap text-sm font-semibold text-gray-900">' . $row["OfficialPosition"] . '</td>';
            echo '<td class="p-3 border border-inherit text-center  whitespace-nowrap text-sm font-semibold text-gray-900">' . $row["Action"] . '</td>';
            echo '<td class="p-3 border border-inherit text-center  whitespace-nowrap text-sm font-semibold text-gray-900">' . $row["Createdate"] . '</td>';
            echo '</tr>';
        }
        // Close table body and table tags
        echo '</tbody></table>';
   
        echo '<nav aria-label="Page navigation example" class="flex justify-first mt-4">';
        echo '<ul class="inline-flex -space-x-px text-sm">';
        
        // Previous button
        if ($page > 1) {
            echo '<li><a href="#" class="pagination-btn flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white" data-page="' . ($page - 1) . '">Previous</a></li>';
        }
    
        // Page numbers
        for ($i = 1; $i <= $total_pages; $i++) {
            $activeClass = $i == $page ? 'text-blue-600 bg-blue-50 hover:bg-blue-100 hover:text-blue-700' : 'text-gray-500 bg-white hover:bg-gray-100 hover:text-gray-700';
            echo '<li><a href="#" class="pagination-btn flex items-center justify-center px-3 h-8 leading-tight border border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white ' . $activeClass . '" data-page="' . $i . '">' . $i . '</a></li>';
        }
    
        // Next button
        if ($page < $total_pages) {
            echo '<li><a href="#" class="pagination-btn flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white" data-page="' . ($page + 1) . '">Next</a></li>';
        }
    
        echo '</ul></nav>';
        echo '</div>';
      
    } else {
        echo '<div class="mx-auto text-center mt-8" style="width: 200px;">';
        echo '<img src="/Images/norequest.svg" alt="Illustration" class="w-30 h-auto">';
        echo "<p class='text-lg font-semibold text-center'>No Admin Activities Found</p>";
        echo '</div>';
    }
} else {
    echo "Status parameter is missing.";
}
?>
