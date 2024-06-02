 <?php
include __DIR__ . '/../Connection.php';
$conn = mysqli_connect($servername, $username, $password, $dbname);
if(!$conn){
  echo "Database connection error".mysqli_connect_error();
}

$query = "SELECT * FROM complaintbl WHERE ComplainStatus='Settled'";
$result = mysqli_query($conn, $query);


if(mysqli_num_rows($result) > 0) {
   // Output table header
   echo '<table class="min-w-full divide-y divide-gray-200 mt-3">
           <thead class="bg-gray-50">
               <tr>
               <th scope="col" class="p-4 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Case ID</th>
               <th scope="col" class="p-4 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Complainant</th>
               <th scope="col" class="p-4 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Date Filed</th>
               <th scope="col" class="p-4 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Respondent</th>
               <th scope="col" class="p-4 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Narrative Report</th>
               <th scope="col" class="p-4 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Case Status</th>
               </tr>
           </thead>
           <tbody class="bg-white">';

   // Fetch and display each row
   while($row = mysqli_fetch_assoc($result)) {
       echo '<tr>';
       echo '<td class="p-3 border border-inherit text-center  whitespace-nowrap text-sm font-semibold text-gray-900">' . $row["ComplainID"] . '</td>';
       echo '<td class="p-3 border border-inherit text-center  whitespace-nowrap text-sm font-semibold text-gray-900">' . $row["ComplainantFName"] . ' ' . $row["ComplainantMName"] . ' ' . $row["ComplainantLName"] . '</td>';
       echo '<td class="p-3 border border-inherit text-center  whitespace-nowrap text-sm font-semibold text-gray-900">' . $row["DateofReport"] . '</td>';
       echo '<td class="p-3 border border-inherit text-center  whitespace-nowrap text-sm font-semibold text-gray-900">' . $row["NameofComplainee"] . '</td>';
       $ComplainDescription = htmlspecialchars($row["ComplainDescription"]);
       if (strlen($ComplainDescription) > 10) {
         $ComplainDescription = substr($ComplainDescription, 0, 10) . '...';
       }
       echo '<td class="p-3 border border-inherit text-center whitespace-nowrap text-sm font-semibold text-gray-900">' . $ComplainDescription . "</td>";
       echo '<td class="p-3 border border-inherit text-center  whitespace-nowrap text-sm font-semibold bg-orange-400 text-white">' . $row["ComplainStatus"] . '</td>';
       echo '</tr>';
   
   }
   // Close table body and table tags
   echo '</tbody></table>';
} else {
 echo '<div class="mx-auto text-center mt-8" style="width: 200px;">';
 echo '<img src="/Images/norequest.svg" alt="Illustration" class="w-30 h-auto">';
 echo "<p class='text-lg font-semibold text-center '>No Complete Transaction found</p>";
 echo '</div>';
 
}
?>