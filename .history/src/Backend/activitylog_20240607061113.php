<?php
require 'Connection.php';
$conn = mysqli_connect($servername, $username, $password, $dbname);
if(!$conn){
  echo "Database connection error".mysqli_connect_error();
}

// Check if status is set in GET request
if(isset($_GET['status'])) {
    $status = $_GET['status'];
    // Validate status to prevent SQL injection
    // Fetch records based on status
    $query = "SELECT * FROM adminactivitylog WHERE Categorization = '$status'";
    $result = mysqli_query($conn, $query);

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
