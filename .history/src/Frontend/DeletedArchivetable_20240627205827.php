<?php
require '../Backend/Connection.php';
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    echo "Database connection error" . mysqli_connect_error();
}

// Pagination setup
$limit = 5; // Number of entries per page
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;

// Total records query
$total_query = "SELECT COUNT(*) as total FROM archive_my_table";
$total_result = mysqli_query($conn, $total_query);
$total_row = mysqli_fetch_assoc($total_result);
$total_records = $total_row['total'];
$total_pages = ceil($total_records / $limit);

// Data query with pagination
$query = "SELECT * FROM archive_my_table LIMIT $limit OFFSET $offset";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    // Output table header
    echo '<div class="overflow-x-auto h-screen mt-3">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th scope="col"
                    class="bg-gray-50 border-2 border-inherit text-center px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Residents ID
                </th>
                <th scope="col"
                    class="bg-gray-50 px-6 py-3 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Residents Name
                </th>
                <th scope="col"
                    class="bg-gray-50 px-6 py-3 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Gender
                </th>
                <th scope="col"
                    class="bg-gray-50 px-6 py-3 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Account Status
                </th>
                <th scope="col"
                    class="bg-gray-100 px-6 py-3 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
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
        echo '<td class="p-3 border border-inherit text-center whitespace-nowrap text-sm font-semibold text-gray-900">' . $row["ID"] . '</td>';
        echo '<td class="p-3 border border-inherit text-center whitespace-nowrap text-sm font-semibold text-gray-900">' . $row["fname"] . ' ' . $row["Mname"] . ' ' . $row["lname"] . '</td>';
        echo '<td class="p-3 border border-inherit text-center whitespace-nowrap text-sm font-semibold text-gray-900">' . $row["Gender"] . '</td>';
        echo '<td class="p-3 border-2 border-inherit text-center text-sm font-semibold text-gray-900">
                <div class="flex justify-center items-center text-white px-2 py-2 ' . $statusBgColor . ' h-full rounded">' . $row["Status"] . '</div>
              </td>';
        echo '<td class="p-3 border border-inherit text-center whitespace-nowrap text-sm font-semibold text-gray-900">
                <button id="revertbtn" onclick="revertRecord(' . $row["ID"] . ')" class="px-3 py-2 bg-blue-500 text-white rounded">Revert</button>
              </td>';
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


echo'<div class="bg-blue-100 p-3 rounded-md mt-4 h-full">
<div class="flex items-center">
  <h2 class="text-lg font-semibold mr-1">Note</h2>
  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
  </svg>
</div>
              <p>All of the Information that you Provide here will appear to the Document Content please take note the following</p>
              <ul class="list-disc ml-6 mb-4">
                <li>Double check your Information</li>
                <li>Check the Typography</li>
                <li>Fill up all Fields</li>
              </ul>
</div>';









    
} else {
    echo '<div class="mx-auto text-center mt-8" style="width: 200px;">';
    echo '<img src="/Images/norequest.svg" alt="Illustration" class="w-30 h-auto">';
    echo "<p class='text-lg font-semibold text-center'>No Residents Found</p>";
    echo '</div>';
}
?>

<script>
function revertRecord(id) {
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, revert it!'
    }).then((result) => {
        if (result.isConfirmed) {
            fetch('revert.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: 'revert=true&id=' + id
            })
            .then(response => response.text())
            .then(data => {
                Swal.fire(
                    'Reverted!',
                    'Your record has been reverted.',
                    'success'
                ).then(() => {
                    location.reload();
                });
            })
            .catch(error => {
                Swal.fire(
                    'Error!',
                    'There was an error reverting the record.',
                    'error'
                );
            });
        }
    });
}


document.getElementById('revertbtn').addEventListener('click', function() {
    var dialog = document.getElementById('Admin_addresidentarchive');
    dialog.close();
});
</script>





