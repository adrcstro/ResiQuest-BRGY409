

<?php
include __DIR__ . '/../Connection.php'; 
$conn = mysqli_connect($servername, $username, $password, $dbname);
if(!$conn){
  echo "Database connection error".mysqli_connect_error();
}

// Check if the user is logged in
if(!empty($_SESSION["ID"])) {
    // Retrieve the user's ID from the session
    $ID = $_SESSION["ID"];

    // Prepare and execute the SQL query to fetch requests for the user
    $query = "SELECT RequestID, ServiceType, DateRequested, Status, PickUpDate ,Pickuptime, RejReason
              FROM requestdocument 
              WHERE UserID = $ID";
    $result = mysqli_query($conn, $query);

    // Check if there are any rows returned
    if(mysqli_num_rows($result) > 0) {
        // Output table header
        echo '<table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                    <th scope="col" class="p-4 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Request ID</th>
                    <th scope="col" class="p-4 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Service Type</th>
                    <th scope="col" class="p-4 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Date Requested</th>
                    <th scope="col" class="p-4 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    <th scope="col" class="p-4 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Reason for Request Rejection</th>
                    
                    </tr>
                </thead>
                <tbody class="bg-white">';

        // Fetch and display each row
        while($row = mysqli_fetch_assoc($result)) {
          if ($row["Status"] == "Rejected") {
            $statusBgColor = '';
            switch ($row["Status"]) {
                case 'Pending':
                    $statusBgColor = 'bg-red-400 text-white';
                    break;
                case 'On-Process':
                    $statusBgColor = 'bg-yellow-300 text-white ';
                    break;
                case 'Completed':
                    $statusBgColor = 'bg-green-400 text-white';
                    break;
                    case 'Rejected':
                        $statusBgColor = 'bg-red-400 text-white';
                        break;
                default:
                    $statusBgColor = ''; // No background color if status is not recognized
            }
            echo '<tr>';
            echo '<td class="p-1 border border-inherit text-center  whitespace-nowrap text-sm font-semibold text-gray-900">' . $row["RequestID"] . '</td>';
            echo '<td class="p-1 border border-inherit text-center  whitespace-nowrap text-sm font-semibold text-gray-900">' . $row["ServiceType"] . '</td>';
            echo '<td class="p-1 border border-inherit text-center  whitespace-nowrap text-sm font-semibold text-gray-900">' . $row["DateRequested"] . '</td>';
            echo '<td class="text-center border-2 border-inherit rounded-md text-sm font-semibold text-gray-900 ' . $statusBgColor . '">' . $row["Status"] . '</td>';
            echo '<td class="p-1 border border-inherit text-center  whitespace-nowrap text-sm font-semibold text-gray-900">' . $row["RejReason"] . '</td>';
         
            echo '</tr>';
        }
        }

        // Close table body and table tags
        echo '</tbody></table>';
    } else {
      echo '<div class="mx-auto text-center mt-8" style="width: 200px;">';
      echo '<img src="/Images/norequest.svg" alt="Illustration" class="w-30 h-auto">';
      echo "<p class='text-lg font-semibold text-center '>No complete request found</p>";
      echo '</div>';
      
    }
}
// Close the database connection
?>