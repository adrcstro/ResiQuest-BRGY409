<?php
require '../Backend/Connection.php';
    if(!empty($_SESSION["AdminID"])){
$ID = $_SESSION["AdminID"];
$result = mysqli_query($conn, "SELECT * FROM admintbl WHERE AdminID = $ID");
$row = mysqli_fetch_assoc($result);

    }else{
      header("Location: AdminLogin.php");

    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="x-icon" href="/Images/brgylogo.png">
    <title>BRGY-409</title>
    <link href="output.css" rel="stylesheet" >
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.3/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>
<body>



<div id="showRequestedDocuments"  class="absolute bg-gray-50 inset-0 overflow-y-auto lg:ml-64 mt-16">
        <div class="pt-3 px-4 mb-4">
            <div class="flex flex-col">
                <div class="overflow-y-auto rounded-lg ">
                <div class="bg-white h-full shadow rounded-lg p-4  sm:p-6 xl:p-8 xl:gap-4 my-4">
                        <div class="mb-4 flex flex-col lg:flex-row items-center justify-between">
                        <div class="mb-4 lg:mb-0 flex justify-center lg:justify-start">
    <div class="text-center lg:text-left">
        <h3 class="text-xl font-bold text-gray-900 mb-2">List of Requested Documents</h3>
        <span class="text-base font-normal text-gray-500">This is a list of Residents Requested Documents</span>
    </div>
</div>
                            <div class="flex-shrink-0">
                                <form action="#" method="GET" class="lg:flex lg:items-center lg:pl-32">
                                    <label for="topbar-search" class="sr-only">Search</label>
                                    <div class="mt-1 relative lg:w-64 flex">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <svg class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                                            </svg>
                                        </div>
                                        <input type="text" name="email" id="topbar-search" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full pl-10 p-2.5" placeholder="Search Record">
                                    </div>
                                </form>
                                <div class="lg:flex lg:items-center lg:pl-32">
                     <button onclick="Request_Archive.showModal()" class="mt-3 w-full relative text-white border-2 border-gray-200  bg-green-400 dark:bg-gray-800 dark:border-gray-700 hover:bg-green-500  font-semibold py-2 px-4">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="white"class="w-5 h-5 inline-block align-middle text-white">
                 <path stroke-linecap="round" stroke-linejoin="round" d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
                </svg>
                 Document Request Archive
                  </button>
                 </div>
                 <dialog id="Request_Archive" class="modal p-3">
                 <div class="modal-box w-full max-w-6xl rounded-none">
        <div class="flex flex-col">
            <div class="overflow-x-auto rounded-lg">
                <div class="mb-2 lg:mb-0">
                    <h3 class="text-2xl font-bold text-blue-400 text-center">BRGY-409 Document Request Management System</h3>
                    <span class="flex text-base font-medium text-blue-400 justify-center text-center">List of  Document Request Archive</span>
                </div>
                <form method="dialog">
          <button  class="btn btn-sm btn-circle btn-ghost absolute top-2 right-2">
          ✕
        </button>
         </form>
         <?php
// Include the database connection file
$conn = mysqli_connect($servername, $username, $password, $dbname);
if(!$conn){
  echo "Database connection error".mysqli_connect_error();
}

$query = "SELECT * FROM requestdocument WHERE Status='Released'";
$result = mysqli_query($conn, $query);


if(mysqli_num_rows($result) > 0) {
   // Output table header
   echo '<table class="min-w-full divide-y divide-gray-200 mt-3">
           <thead class="bg-gray-50">
               <tr>
               <th scope="col" class="p-4 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Request ID</th>
               <th scope="col" class="p-4 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Residents Name</th>
               <th scope="col" class="p-4 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Service Type</th>
               <th scope="col" class="p-4 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Date Requested</th>
               <th scope="col" class="p-4 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Date for Release</th>
               <th scope="col" class="p-4 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
               </tr>
           </thead>
           <tbody class="bg-white">';

   // Fetch and display each row
   while($row = mysqli_fetch_assoc($result)) {
       echo '<tr>';
       echo '<td class="p-3 border border-inherit text-center  whitespace-nowrap text-sm font-semibold text-gray-900">' . $row["RequestID"] . '</td>';
       echo '<td class="p-3 border border-inherit text-center  whitespace-nowrap text-sm font-semibold text-gray-900">' . $row["FirstName"] . ' ' . $row["Middlename"] . ' ' . $row["Lastname"] . '</td>';
       echo '<td class="p-3 border border-inherit text-center  whitespace-nowrap text-sm font-semibold text-gray-900">' . $row["ServiceType"] . '</td>';
       echo '<td class="p-3 border border-inherit text-center  whitespace-nowrap text-sm font-semibold text-gray-900">' . $row["DateRequested"] . '</td>';
       echo '<td class="p-3 border border-inherit text-center  whitespace-nowrap text-sm font-semibold text-gray-900">' . $row["PickUpDate"] . '</td>';
       echo '<td class="p-3 border border-inherit text-center  whitespace-nowrap text-sm font-semibold bg-orange-400 text-white">' . $row["Status"] . '</td>';
      
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
            </div>
                </div>
                     </div>
                    </dialog>
                            </div>
                        </div>

                        <div class="flex justify-center mb-4">
                            <div class="flex mt-4 lg:mt-3 space-x-2">

                            <?php
if (!empty($_SESSION["AdminID"])) {
    $ID = $_SESSION["AdminID"];
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT COUNT(*) AS pending_count FROM requestdocument WHERE status = 'Pending'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $totalCount = $row["pending_count"];
    } else {
        echo "Error retrieving data from the database.";
    }
    $conn->close();
}
?>

                  <button  onclick="showPendingrequest()"   class="relative text-gray-600 border-2 border-gray-200 focus:outline-none focus:bg-gray-100 rounded-lg bg-gray-50 dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-100  font-semibold py-2 px-4">
                  <span class="absolute bg-red-400 text-white text-xs rounded-full -top-1 -left-1 px-2 py-1"><?=  $totalCount ?></span>
<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="gray" class="w-5 h-5 inline-block align-middle text-white">
 <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
</svg>
Pending Request
</button>


<?php
if (!empty($_SESSION["AdminID"])) {
    $ID = $_SESSION["AdminID"];
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT COUNT(*) AS pending_count FROM requestdocument WHERE status = 'On-Process'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $totalCountonprocess = $row["pending_count"];
    } else {
        echo "Error retrieving data from the database.";
    }
    $conn->close();
}
?>
<button  onclick="showOnprocessrequest()"  class="relative text-gray-600 border-2 border-gray-200 focus:outline-none focus:bg-gray-100 rounded-lg bg-gray-50 dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-100  font-semibold py-2 px-4">
<span class="absolute bg-red-400 text-white text-xs rounded-full -top-1 -left-1 px-2 py-1"><?=  $totalCountonprocess ?></span>
<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="gray" class="w-5 h-5 inline-block align-middle text-white">
 <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
</svg>
On-Process Request
</button>
<?php
if (!empty($_SESSION["AdminID"])) {
    $ID = $_SESSION["AdminID"];
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT COUNT(*) AS pending_count FROM requestdocument WHERE status = 'Completed'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $totalCouncompleted = $row["pending_count"];
    } else {
        echo "Error retrieving data from the database.";
    }
    $conn->close();
}
?>
<button onclick="showCompleterequest()" class="relative text-gray-600 border-2 border-gray-200 rounded-lg bg-gray-50 focus:outline-none focus:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-100  font-semibold py-2 px-4">
  <span class="absolute bg-red-400 text-white text-xs rounded-full -top-1 -left-1 px-2 py-1"><?= $totalCouncompleted ?></span>
  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="gray" class="w-5 h-5 inline-block align-middle text-gray-700">
    <path stroke-linecap="round" stroke-linejoin="round" d="M11.35 3.836c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m8.9-4.414c.376.023.75.05 1.124.08 1.131.094 1.976 1.057 1.976 2.192V16.5A2.25 2.25 0 0 1 18 18.75h-2.25m-7.5-10.5H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V18.75m-7.5-10.5h6.375c.621 0 1.125.504 1.125 1.125v9.375m-8.25-3 1.5 1.5 3-3.75" />
  </svg>
  Complete Request
</button>

</div>
</div>
                        <div id="Pendingrequesttable"> 
                        <?php
                        // Include the database connection file
                        $conn = mysqli_connect($servername, $username, $password, $dbname);
                        if (!$conn) {
                            echo "Database connection error" . mysqli_connect_error();
                        }
                        $query = "SELECT * FROM requestdocument WHERE Status='Pending'";
                        $result = mysqli_query($conn, $query);
                        if (mysqli_num_rows($result) > 0) {
                            // Output table header
                            echo '<div class="overflow-x-auto h-screen"><table class="table-auto min-w-full divide-y divide-gray-200 mt-3 mb-6">
           <thead class="bg-gray-50 ">
               <tr>
               <th scope="col" class="p-4 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Request ID</th>
               <th scope="col" class="p-4 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Residents Name</th>
               <th scope="col" class="p-4 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Service Type</th>
               <th scope="col" class="p-4 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Date Requested</th>
               <th scope="col" class="p-4 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
               </tr>
           </thead>
           <tbody class="bg-white ">';
                            // Fetch and display each row
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<tr">';
                                echo '<td class="p-3 border border-inherit text-center  whitespace-nowrap text-sm font-semibold text-gray-900">' . $row["RequestID"] . '</td>';
                                echo '<td class="p-3 border border-inherit text-center  whitespace-nowrap text-sm font-semibold text-gray-900">' . $row["FirstName"] . ' ' . $row["Middlename"] . ' ' . $row["Lastname"] . '</td>';
                                echo '<td class="p-3 border border-inherit text-center  whitespace-nowrap text-sm font-semibold text-gray-900">' . $row["ServiceType"] . '</td>';
                                echo '<td class="p-3 border border-inherit text-center  whitespace-nowrap text-sm font-semibold text-gray-900">' . $row["DateRequested"] . '</td>';
                                echo '<td class="p-1 border flex items-center justify-center border-inherit text-center whitespace-nowrap text-sm font-semibold text-gray-900">
       <div class="dropdown  dropdown-end">
       <div tabindex="0" role="button" class="flex items-center justify-between text-white font-semibold btn w-40 bg-blue-400 hover:bg-blue-500">
       Action Details
       <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
         <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
       </svg>
     </div>
       <ul tabindex="0"  class="dropdown-content z-[1] menu p-2 shadow-2xl bg-base-100 rounded-box w-52 ">
           <li class="view-request-btn" data-request-id="' . $row["RequestID"] . '"><a><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
           <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
           <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
         </svg>
          View Request</a></li>
 
           <li class="admin-edit-request-btn"  data-request-id="' . $row["RequestID"] . '" data-request-Fname="' . $row["FirstName"] . '" data-request-Mname="' . $row["Middlename"] . '" data-request-Lname="' . $row["Lastname"] . '" data-request-Sertype="' . $row["ServiceType"] . '" data-request-DateRequested="' . $row["DateRequested"] . '" data-request-Address="' . $row["Address"] . '" data-request-DateofBirth="' . $row["DateofBirth"] . '"
           data-request-PlaceofBirth="' . $row["PlaceofBirth"] . '" data-request-Civilstat="' . $row["Civilstat"] . '"  data-request-SSSGSIS="' . $row["SSSGSIS"] . '" data-request-Contactname="' . $row["Contactname"] . '" data-request-Contactname="' . $row["Contactname"] . '" data-request-Contactaddress="' . $row["Contactaddress"] . '"  data-request-Contactnum="' . $row["Contactnum"] . '"  data-request-businessloc="' . $row["BusinessLoc"] . '"
           data-request-BusinessAct="' . $row["BusinessAct"] . '" data-request-Purpose="' . $row["Purpose"] . '" >
           <a><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
           <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
         </svg>
          Edit Request</a></li>
 
          <li class="reject-btn" data-request-id="' . $row["RequestID"] . '"  data-request-Fname="' . $row["FirstName"] . '"  data-request-Mname="' . $row["Middlename"] . '" data-request-Lname="' . $row["Lastname"] . '"  ><a><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
          <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
      </svg>Reject Request</a></li>

      <li class="process-request-btn" data-request-id="' . $row["RequestID"] . '"  data-request-Fname="' . $row["FirstName"] . '"  data-request-Mname="' . $row["Middlename"] . '" data-request-Lname="' . $row["Lastname"] . '"  ><a><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
      <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
    </svg>
    Process Request</a></li>
       </ul>
   </div>
 </td>';
                          echo '</tr>';
                            }
                            // Close table body and table tags
                            echo '</tbody></table></div>';

                            echo '<dialog id="adminViewrequestdetails" class="modal p-3">
                            <div class="modal-box w-100 max-w-4xl rounded-none">
                             
                                <div class="mb-2 lg:mb-0">
                                  <h3 class="text-2xl font-bold text-blue-500 text-center">BRGY-409 Document Request Management System</h3>
                                  <span class="flex text-base font-medium text-blue-500 justify-center text-center">Document Request Details</span>
                                </div>
                              
                              <div id="modal-content-resident-request" class="mt-8 px-4 py-3 sm:px-6 flex align-items justify-center p-4 gap-4 flex-row"></div>
                    
                    
                    
                              <div class="mt-4 px-4 py-3 sm:px-6 flex align-items justify-center p-4 gap-4 flex-row">
                              <button id="adminrequestclose-modal-btn" class="btn btn-sm btn-circle btn-ghost absolute top-2 right-2">
                              ✕
                            </button>
                            
                              </div>
                            </div>
                          </dialog>';
                    // JavaScript to handle modal functionality
                    echo '<script>
                            document.addEventListener("DOMContentLoaded", function () {
                              const modal = document.getElementById("adminViewrequestdetails");
                              const modalContent = document.getElementById("modal-content-resident-request");
                              const openModalButtons = document.querySelectorAll(".view-request-btn");
                              const closeModalButton = document.getElementById("adminrequestclose-modal-btn");
                    
                              openModalButtons.forEach(function (button) {
                                button.addEventListener("click", function () {
                                  const requestId = button.getAttribute("data-request-id");
                    
                                  // Fetch request details using AJAX
                                  fetch("../Backend/fetch_adminresident_request.php?adminrequest_id=" + requestId)
                                    .then(response => response.text())
                                    .then(data => {
                                      // Display fetched details in modal
                                      modalContent.innerHTML = data;
                                      modal.showModal();
                                    });
                                });
                              });
                    
                              // Close modal when clicking on the close button
                              closeModalButton.addEventListener("click", function () {
                                modal.close();
                              });
                            });
                          </script>';



                          echo '<dialog id="adminEditRequestDetails" class="modal p-3 ">
                          <div class="modal-box w-100 max-w-4xl rounded-lg">
                           
                              <div class="mb-2 lg:mb-0">
                                <h3 class="text-2xl font-bold text-blue-500 text-center">BRGY-409 Document Request Management System</h3>
                                <span class="flex text-base font-medium text-blue-500 justify-center text-center">Edit Request Details</span>
                              </div>
                              <form id="admineditrequest" action="../Backend/Update.php" method="post" enctype="multipart/form-data">
                            <div id="Edit-modal-content"></div>
                              </form>
                            <div class="mt-4 px-4 py-3 sm:px-6 flex align-items justify-center p-4 gap-4 flex-row">
                            <button id="adminedit-close-modal-btn" class="btn btn-sm btn-circle btn-ghost absolute top-2 right-2">
                            ✕
                          </button>
                          <div class="px-4 py-3 sm:px-6 flex align-items justify-center p-4 gap-4 flex-row">
                          <button" id="admineditrequestbutton" class="inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-500 hover:bg-green-600 text-base font-medium text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 sm:w-auto sm:text-sm"> 
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-1">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                            Save Request Details
                          </button>
                           </div>
                            </div>
                          </div>
                        </dialog>';


                        echo '<script>
                        document.getElementById("admineditrequestbutton").addEventListener("click", function() {
                            var dialog = document.getElementById("adminEditRequestDetails");
                            dialog.close();
                          });
                        document.addEventListener("DOMContentLoaded", function () {
                            const modal = document.getElementById("adminEditRequestDetails");
                            const modalContent = document.getElementById("Edit-modal-content");
                            const openModalButtons = document.querySelectorAll(".admin-edit-request-btn");
                            const closeModalButton = document.getElementById("adminedit-close-modal-btn");
                            
                            
                            console.log("Modal:", modal);
                            console.log("Modal Content:", modalContent);
                            console.log("Open Modal Buttons:", openModalButtons);
                            console.log("Close Modal Button:", closeModalButton);
                           
                        
                            openModalButtons.forEach(function (button) {
                                button.addEventListener("click", function () {
                                    const status = button.getAttribute("data-Status");
                                    if (status === "On-Process" || status === "Completed") {
                                        Swal.fire({
                                            icon: "error",
                                            title: "Cannot edit this request",
                                            text: "This request is already processed by the Barangay",
                                        });
                                        return; // Stop further execution
                                    }
                                  
                                    const requestId = button.getAttribute("data-request-id");
                                    const serviceType = button.getAttribute("data-request-Sertype");
                                    const firstname = button.getAttribute("data-request-Fname");
                                    const middlename = button.getAttribute("data-request-Mname");
                                    const lastname = button.getAttribute("data-request-Lname");
                                    const address = button.getAttribute("data-request-Address");
                                    const purpose = button.getAttribute("data-request-Purpose");
                                    const businesact = button.getAttribute("data-request-BusinessAct");
                                    const businesloc = button.getAttribute("data-request-businessloc");
                                    const dateofbirth = button.getAttribute("data-request-DateofBirth");
                                    const placeofbirth = button.getAttribute("data-request-PlaceofBirth");
                                    const sssgsis = button.getAttribute("data-request-SSSGSIS");
                                    const contactpersonname = button.getAttribute("data-request-Contactname");
                                    const contactpersonnumber = button.getAttribute("data-request-Contactnum");
                                    const contactpersonaddress = button.getAttribute("data-request-Contactaddress");
                                    console.log("Request ID:", requestId);
                                    console.log("Service Type:", serviceType);
                        
                                    // Display static content in modal
                                    modalContent.innerHTML = `
                                        <div class="font-semibold mb-4 text-center mt-4" >
                                            <p>Request ID: ${requestId}</p>
                                            <p>Service Type: ${serviceType}</p>
                                        </div>
                                    `;
                                    // Add static input fields based on ServiceType
                                    let inputFields = "";
                                    if (serviceType === "Certificate of Residency" || serviceType === "Certificate of Indigency") {
                                        inputFields = `
                        
                                        <div class="mx-auto max-w-3xl mt-6">
                                        <div class="grid grid-cols-1 gap-y-6 gap-x-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 2xl:grid-cols-3">
                        
                                        <div class="hidden">
                                        <label for="requestId" class="block text-sm font-medium text-gray-700">RequestID</label>
                                        <input value="${requestId}" required="" type="text" name="requestId" id="requestId" autocomplete="given-name" placeholder="First Name"
                                            class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 mb-2">
                                    </div>
                                    <div class="hidden">
                                        <label for="serviceType" class="block text-sm font-medium text-gray-700">Service Type</label>
                                        <input value="${serviceType}" required="" type="text" name="serviceType" id="serviceType" autocomplete="additional-name" placeholder="Middle Name"
                                            class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 mb-2">
                                    </div>
                                            <div class="flex flex-col">
                                                <label for="EditFirstName" class="block text-sm font-medium text-gray-700">First Name</label>
                                                <input value="${firstname}" required="" type="text" name="EditFirstName" id="EditFirstName" autocomplete="given-name" placeholder="First Name"
                                                    class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 mb-2">
                                            </div>
                                            <div class="flex flex-col">
                                                <label for="EditMiddleName" class="block text-sm font-medium text-gray-700">Middle Name</label>
                                                <input value="${middlename}" required="" type="text" name="EditMiddleName" id="EditMiddleName" autocomplete="additional-name" placeholder="Middle Name"
                                                    class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 mb-2">
                                            </div>
                                            <div class="flex flex-col">
                                                <label for="EditLastName" class="block text-sm font-medium text-gray-700">Last Name</label>
                                                <input value="${lastname}" required="" type="text" name="EditLastName" id="EditLastName" autocomplete="family-name" placeholder="Last Name"
                                                    class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 mb-2">
                                            </div>
                                        </div>
                                        <div class="flex flex-col">
                                            <label for="EditAddress" class="block text-sm font-medium text-gray-700">Complete Address</label>
                                            <input value="${address}" required="" type="text" name="EditAddress" id="EditAddress" autocomplete="street-address" placeholder="Address"
                                                class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 mb-2">
                                        </div>
                                
                                        <div class="flex flex-col">
                                            <label for="EditPurpose" class="block text-sm font-medium text-gray-700">Document Purpose</label>
                                            <select  required="" type="text" name="EditPurpose" id="EditPurpose" autocomplete="off" placeholder="Purpose" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 mb-2">
                                            <option value="${purpose}">${purpose}</option>
                                            <option value="Employment">Employment</option>
                                            <option value="School Enrollment">School Enrollment</option>
                                            <option value="Government Requirements">Government Requirements</option>
                                            <option value="Legal Matters">Legal Matters</option>
                                            <option value="Health Insurance">Health Insurance</option>
                                            <option value="Bank Account">Bank Account</option>
                                            <option value="Voter Registration">Voter Registration</option>
                                            <option value="Travel Document">Travel Document</option>
                                            <option value="Residency Renewal">Residency Renewal</option>
                                            <option value="Other">Other</option>
                                      
                                      </select
                                      
                                      
                                            </div>
                                    </div>
                                    
                                        `;
                                    } else if (serviceType === "Business Clearance") {
                                        inputFields = `
                                   
                                        <div class="mx-auto max-w-3xl mt-6">
                                        <div class="grid grid-cols-1 gap-y-6 gap-x-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 2xl:grid-cols-3">
                        
                                        <div class="hidden">
                                        <label for="requestId" class="block text-sm font-medium text-gray-700">RequestID</label>
                                        <input value="${requestId}" required="" type="text" name="requestId" id="requestId" autocomplete="given-name" placeholder="First Name"
                                            class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 mb-2">
                                    </div>
                                    <div class="hidden">
                                        <label for="serviceType" class="block text-sm font-medium text-gray-700">Service Type</label>
                                        <input value="${serviceType}" required="" type="text" name="serviceType" id="serviceType" autocomplete="additional-name" placeholder="Middle Name"
                                            class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 mb-2">
                                    </div>
                        
                        
                        
                                            <div>
                                                <label for="EditFirstName" class="block text-sm font-medium text-gray-700">First Name</label>
                                                <input  value="${firstname}" required="" type="text" name="EditFirstName" id="EditFirstName" autocomplete="given-name" placeholder="First Name"
                                                    class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 mr-2">
                                            </div>
                                            <div>
                                                <label for="EditMiddleName" class="block text-sm font-medium text-gray-700">Middle Name</label>
                                                <input value="${middlename}" required="" type="text" name="EditMiddleName" id="EditMiddleName" autocomplete="additional-name" placeholder="Middle Name"
                                                    class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 mr-2">
                                            </div>
                                            <div>
                                                <label for="EditLastName" class="block text-sm font-medium text-gray-700">Last Name</label>
                                                <input value="${lastname}" required="" type="text" name="EditLastName" id="EditLastName" autocomplete="family-name" placeholder="Last Name"
                                                    class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 mr-2">
                                            </div>
                                        </div>
                                        <div class="flex flex-col sm:flex-row gap-x-6">
                                        <div class="mt-4 sm:flex-1">
                                            <label  for="EditBusinessAct" class="block text-sm font-medium text-gray-700">Business Activity</label>
                                            <input  value="${businesact}" required="" type="text" name="EditBusinessAct" id="EditBusinessAct" autocomplete="off" placeholder="Business Activity"
                                                class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 mr-2">
                                        </div>
                        
                                        <div class="mt-4 sm:flex-1 ">
                                            <label for="EditBusinessLoc" class="block text-sm font-medium text-gray-700">Business Location</label>
                                            <input value="${businesloc}" required="" type="text" name="EditBusinessLoc" id="EditBusinessLoc" autocomplete="off" placeholder="Business Location"
                                                class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
                                        </div>
                                        </div>
                        
                                        <div class="mt-4" >
                                        <label for="EditAddress" class="block text-sm font-medium text-gray-700">Complete Address</label>
                                        <input value="${address}" required="" type="text" name="EditAddress" id="EditAddress" autocomplete="street-address" placeholder="Address"
                                            class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 mr-2">
                                    </div>
                        
                        
                                    </div>
                                        `;
                                    } else if (serviceType === "Barangay Identification") {
                                        inputFields = `
                                        <div class="mx-auto max-w-3xl mt-6">
                                        <div class="grid grid-cols-1 gap-y-6 gap-x-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 2xl:grid-cols-3">
                        
                        
                                        <div class="hidden">
                                        <label for="requestId" class="block text-sm font-medium text-gray-700">RequestID</label>
                                        <input value="${requestId}" required="" type="text" name="requestId" id="requestId" autocomplete="given-name" placeholder="First Name"
                                            class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 mb-2">
                                    </div>
                                    <div class="hidden">
                                        <label for="serviceType" class="block text-sm font-medium text-gray-700">Service Type</label>
                                        <input value="${serviceType}" required="" type="text" name="serviceType" id="serviceType" autocomplete="additional-name" placeholder="Middle Name"
                                            class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 mb-2">
                                    </div>
                        
                        
                                            <div>
                                                <label for="EditFirstName" class="block text-sm font-medium text-gray-700">First Name</label>
                                                <input value="${firstname}" required="" type="text" name="EditFirstName" id="EditFirstName" autocomplete="given-name" placeholder="First Name"
                                                    class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 mr-2">
                                            </div>
                                            <div>
                                                <label for="EditMiddleName" class="block text-sm font-medium text-gray-700">Middle Name</label>
                                                <input value="${middlename}" required="" type="text" name="EditMiddleName" id="EditMiddleName" autocomplete="additional-name" placeholder="Middle Name"
                                                    class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 mr-2">
                                            </div>
                                            <div>
                                                <label for="EditLastName" class="block text-sm font-medium text-gray-700">Last Name</label>
                                                <input value="${lastname}" required="" type="text" name="EditLastName" id="EditLastName" autocomplete="family-name" placeholder="Last Name"
                                                    class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 mr-2">
                                            </div>
                                            
                                            <div>
                                                <label for="EditDateOfBirth" class="block text-sm font-medium text-gray-700">Date of Birth</label>
                                                <input value="${dateofbirth}"  required="" type="text" name="EditDateOfBirth" id="EditDateOfBirth" autocomplete="off" placeholder="Date of Birth"
                                                    class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 mr-2">
                                            </div>
                                            <div>
                                                <label for="EditPlaceOfBirth" class="block text-sm font-medium text-gray-700">Place of Birth</label>
                                                <input value="${placeofbirth}" required="" type="text" name="EditPlaceOfBirth" id="EditPlaceOfBirth" autocomplete="off" placeholder="Place of Birth"
                                                    class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 mr-2">
                                            </div>
                        
                                            <div>
                                            <label for="EditSSSGSIS" class="block text-sm font-medium text-gray-700">SSS/GSIS</label>
                                            <input value="${sssgsis}" required="" type="text" name="EditSSSGSIS" id="EditSSSGSIS" autocomplete="off" placeholder="SSS/GSIS"
                                                class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 mr-2">
                                        </div>
                                        </div>
                        
                                        <div class="mt-4">
                                        <label for="EditAddress" class="block text-sm font-medium text-gray-700">Complete Address</label>
                                        <input value="${address}" required="" type="text" name="EditAddress" id="EditAddress" autocomplete="street-address" placeholder="Address"
                                            class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 mr-2">
                                    </div>
                        
                                        <div class="mb-2 mt-8 lg:mb-0">
                                        <h3 class="text-2xl font-bold text-blue-500 text-center">Edit Contact Person  in Case of Emergency</h3>
                                        <span class="flex text-base font-medium text-blue-500 justify-center text-center">Edit a Emergency Contact Person</span>
                                      </div>
                        
                                      <div class="mt-5 flex flex-col sm:flex-row gap-x-6">
                                      <div class="sm:flex-1">
                                            <label for="EditContactName" class="block text-sm font-medium text-gray-700">Contact Person Name</label>
                                            <input value="${contactpersonname}" required="" type="text" name="EditContactName" id="EditContactName" autocomplete="off" placeholder="Contact Name"
                                                class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 mr-2">
                                        </div>
                                        <div class="sm:flex-1">
                                            <label for="EditContactNum" class="block text-sm font-medium text-gray-700">Contact Person Number</label>
                                            <input value="${contactpersonnumber}" required="" type="text" name="EditContactNum" id="EditContactNum" autocomplete="off" placeholder="Contact Number"
                                                class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
                                        </div>
                                        </div>
                                        <div class="mt-2" >
                                            <label for="EditContactAddress" class="block text-sm font-medium text-gray-700">Contact Person Complete Address</label>
                                            <input value="${contactpersonaddress}" required="" type="text" name="EditContactAddress" id="EditContactAddress" autocomplete="off" placeholder="Contact Address"
                                                class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 mr-2">
                                        </div>
                                        
                                    </div>
                                    
                                        `;
                                    }
                                    
                                    modalContent.innerHTML += inputFields;
                                    modal.showModal();
                                });
                            });
                        
                            // Close modal when clicking on the close button
                            closeModalButton.addEventListener("click", function () {
                                modal.close();
                            });
                        });
                        
                        </script>';

                        echo '<script>
                        $(function() {
                            $("#admineditrequestbutton").click(function(e) {
                                e.preventDefault();
                        
                                var valid = $("#admineditrequest")[0].checkValidity();
                        
                                if (valid) {
                                    var formData = new FormData($("#admineditrequest")[0]);
                        
                                    $.ajax({
                                        type: "POST",
                                        url: "../Backend/Update.php",
                                        data: formData,
                                        processData: false,
                                        contentType: false,
                                        success: function(data) {
                                            Swal.fire({
                                                icon: "success",
                                                title: "Success",
                                                text: data,
                                            }).then(function() {
                                                // Show personal profile
                                                window.location.reload(); // Reload the page
                                            });
                                        },
                                        error: function(data) {
                                            Swal.fire({
                                                icon: "error",
                                                title: "Error",
                                                text: "There were errors while saving the data.",
                                            });
                                        },
                                    });
                                } else {
                                    // Handle invalid form data here
                                }
                            });
                        });
                        </script>';



                        echo '<dialog id="processresidentrequest" class="modal p-3 ">
                        <div class="modal-box w-70 max-w-3xl rounded-lg">
                         
                            <div class="mb-2 lg:mb-0">
                              <h3 class="text-2xl font-bold text-blue-500 text-center">BRGY-409 Document Request Management System</h3>
                              <span class="flex text-base font-medium text-blue-500 justify-center text-center">Process Residents Request</span>
                            </div>
                          
                            <form id="processresidentreq" action="../Backend/Update.php" method="post" enctype="multipart/form-data">
                
                          <div id="processresi-request-info"></div>
                          </form>
                
                          <div class="mt-4 px-4 py-3 sm:px-6 flex align-items justify-center p-4 gap-4 flex-row">
                          <button id="processresident-edit-close-modal-btn" class="btn btn-sm btn-circle btn-ghost absolute top-2 right-2">
                          ✕
                        </button>
                        <div class="px-4 py-3 sm:px-6 flex align-items justify-center p-4 gap-4 flex-row">
                        
                        <button" id="processresidentbutton" class="inline-flex justify-center  rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-500 hover:bg-green-600 text-base font-medium text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 sm:w-auto sm:text-sm"> 
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2">
  <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
</svg>
                          Mark as Process
                        </button>
                         </div>
                          </div>
                        </div>
                      </dialog>';
                
                
                      echo '<script>
                      document.addEventListener("DOMContentLoaded", function () {
                        const modal = document.getElementById("processresidentrequest");
                        const modalContent = document.getElementById("processresi-request-info");
                        const openModalButtons = document.querySelectorAll(".process-request-btn");
                        const closeModalButton = document.getElementById("processresident-edit-close-modal-btn");
                      
                        openModalButtons.forEach(function (button) {
                          button.addEventListener("click", function () {
                            const ID = button.getAttribute("data-request-id");
                            const profile = button.getAttribute("data-verifyResidents-profile");
                            const fname = button.getAttribute("data-request-Fname");
                            const mname = button.getAttribute("data-request-Mname");
                            const lname = button.getAttribute("data-request-Lname");
                            
                            // Display default text in modal content
                            modalContent.innerHTML = `
                          
                
                            <div class="flex flex-col items-center mt-3">
                           
                            <div class="mx-auto text-center mt-8" style="width: 200px;">
                            <img src="/Images/processreq.svg" alt="Illustration" class="w-30 h-auto">
                            <p class="text-lg font-semibold text-center ">Process Request of </p>
                            </div>
                            
                        <h1 class="text-xl font-bold">${fname}, ${mname} ${lname}</h1>
                        <h1 class="text-sm font-bold">Request-ID: ${ID}</h1>
                            
                            <div class="hidden items-center justify-center mt-3">
                                <input Value="On-Process" type="text" name="processstat" id="processstat" autocomplete="given-name" placeholder=""
                                    class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 ">
                            </div>
                            
                            <div class="hidden  items-center justify-center mt-3">
                            <input  value="${ID}"   type="text" name="processID" id="processID" autocomplete="given-name" placeholder=""
                                class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 ">
                        </div>
                        </div>
                
                            `;
                      
                            // Display modal
                            modal.showModal();
                          });
                        });
                      
                        // Close modal when clicking on the close button
                        closeModalButton.addEventListener("click", function () {
                          modal.close();
                        });
                      });
                      </script>';
                
             
                      echo '<script>
                      $(function() {
                          $("#processresidentbutton").click(function(e) {
                              e.preventDefault();
                  
                              var valid = $("#processresidentreq")[0].checkValidity();
                  
                              if (valid) {
                                  var formData = new FormData($("#processresidentreq")[0]);
                  
                                  $.ajax({
                                      type: "POST",
                                      url: "../Backend/Update.php",
                                      data: formData,
                                      processData: false,
                                      contentType: false,
                                      success: function(data) {
                                          Swal.fire({
                                              icon: "success",
                                              title: "Success",
                                              text: data,
                                          }).then(function() {
                                              // Show personal profile
                                              window.location.reload(); // Reload the page
                                          });
                                      },
                                      error: function(data) {
                                          Swal.fire({
                                              icon: "error",
                                              title: "Error",
                                              text: "There were errors while saving the data.",
                                          });
                                      },
                                  });
                              } else {
                                  // Handle invalid form data here
                              }
                          });
                      });
                      document.getElementById("processresidentbutton").addEventListener("click", function() {
                          var dialog = document.getElementById("processresidentrequest");
                          dialog.close();
                      });
                  </script>';


//reject request

echo '<dialog id="rejectrequest" class="modal p-3 ">
<div class="modal-box w-70 max-w-3xl rounded-lg">
 
    <div class="mb-2 lg:mb-0">
      <h3 class="text-2xl font-bold text-blue-500 text-center">BRGY-409 Document Request Management System</h3>
      <span class="flex text-base font-medium text-blue-500 justify-center text-center">Reject Residents Request</span>
    </div>
  
    <form id="rejectresidentreqform" action="../Backend/Update.php" method="post" enctype="multipart/form-data">
    <div id="rejectresi-request-info"></div>
    </form>

  <div class="mt-4 px-4 py-3 sm:px-6 flex align-items justify-center p-4 gap-4 flex-row">
  <button id="rejectresident-edit-close-modal-btn" class="btn btn-sm btn-circle btn-ghost absolute top-2 right-2">
✕
</button>
<div class="px-4 py-3 sm:px-6 flex align-items justify-center p-4 gap-4 flex-row">

<button" id="rejectresidentbutton" class="inline-flex justify-center  rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-500 hover:bg-red-600 text-base font-medium text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 sm:w-auto sm:text-sm"> 
<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2">
  <path stroke-linecap="round" stroke-linejoin="round" d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
</svg>
  Reject Residents Request
</button>
 </div>
  </div>
</div>
</dialog>';


echo '<script>
document.addEventListener("DOMContentLoaded", function () {
const modal = document.getElementById("rejectrequest");
const modalContent = document.getElementById("rejectresi-request-info");
const openModalButtons = document.querySelectorAll(".reject-btn");
const closeModalButton = document.getElementById("rejectresident-edit-close-modal-btn");

openModalButtons.forEach(function (button) {
  button.addEventListener("click", function () {
    const ID = button.getAttribute("data-request-id");
    const profile = button.getAttribute("data-verifyResidents-profile");
    const fname = button.getAttribute("data-request-Fname");
    const mname = button.getAttribute("data-request-Mname");
    const lname = button.getAttribute("data-request-Lname");
    
    // Display default text in modal content
    modalContent.innerHTML = `
  

    <div class="flex flex-col items-center mt-3">
   
    <div class="mx-auto text-center" style="width: 200px;">
    <img src="/Images/rejected.svg" alt="Illustration" class="w-30 h-auto">
    <p class="text-lg font-semibold text-center ">Reject Request of </p>
    </div>
    
<h1 class="text-xl font-bold">${fname}, ${mname} ${lname}</h1>
<h1 class="text-sm font-bold">Request-ID: ${ID}</h1>
    
    <div class="hidden items-center justify-center mt-3">
        <input Value="Rejected" type="text" name="rejectstat" id="rejectstat" autocomplete="given-name" placeholder=""
            class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 ">
    </div>
    
    <div class="hidden  items-center justify-center mt-3">
    <input  value="${ID}"   type="text" name="rejectID" id="rejectID" autocomplete="given-name" placeholder=""
        class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 ">
</div>

<div class="items-center justify-center mt-3 w-full">
<label for="comment" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">State Reason for Rejection</label>
<textarea id="comment" name="comment" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your Reason here..."></textarea>

</div>

</div>

    `;

    // Display modal
    modal.showModal();
  });
});

// Close modal when clicking on the close button
closeModalButton.addEventListener("click", function () {
  modal.close();
});
});
</script>';


echo '<script>
$(function() {
    $("#rejectresidentbutton").click(function(e) {
        e.preventDefault();

        var valid = $("#rejectresidentreqform")[0].checkValidity();

        if (valid) {
            var formData = new FormData($("#rejectresidentreqform")[0]);

            $.ajax({
                type: "POST",
                url: "../Backend/Update.php",
                data: formData,
                processData: false,
                contentType: false,
                success: function(data) {
                    Swal.fire({
                        icon: "success",
                        title: "Success",
                        text: data,
                    }).then(function() {
                        // Show personal profile
                        window.location.reload(); // Reload the page
                    });
                },
                error: function(data) {
                    Swal.fire({
                        icon: "error",
                        title: "Error",
                        text: "There were errors while saving the data.",
                    });
                },
            });
        } else {
            // Handle invalid form data here
        }
    });
});
document.getElementById("rejectresidentbutton").addEventListener("click", function() {
    var dialog = document.getElementById("rejectrequest");
    dialog.close();
});
</script>';
                        } else {
                            echo '<div class="mx-auto text-center mt-8" style="width: 200px;">';
                            echo '<img src="/Images/norequest.svg" alt="Illustration" class="w-30 h-auto">';
                            echo "<p class='text-lg font-semibold text-center '>No Pending Found</p>";
                            echo '</div>';
                        }
                        ?>
                           </div>

                           <div id="Onprocessrequesttable" class="hidden"> 
                        <?php
                        // Include the database connection file
                        $conn = mysqli_connect($servername, $username, $password, $dbname);
                        if (!$conn) {
                            echo "Database connection error" . mysqli_connect_error();
                        }
                        $query = "SELECT * FROM requestdocument WHERE Status='On-Process'";
                        $result = mysqli_query($conn, $query);
                        if (mysqli_num_rows($result) > 0) {
                            // Output table header
                            echo '<div class="overflow-x-auto h-screen"><table class="table-auto  min-w-full divide-y divide-gray-200 mt-3">
           <thead class="bg-gray-50 ">
               <tr>
               <th scope="col" class="p-4 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Request ID</th>
               <th scope="col" class="p-4 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Residents Name</th>
               <th scope="col" class="p-4 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Service Type</th>
               <th scope="col" class="p-4 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Date Requested</th>
               <th scope="col" class="p-4 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
               </tr>
           </thead>
           <tbody class="bg-white">';

                            // Fetch and display each row
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<tr>';
                                echo '<td class="p-3 border border-inherit text-center  whitespace-nowrap text-sm font-semibold text-gray-900">' . $row["RequestID"] . '</td>';
                                echo '<td class="p-3 border border-inherit text-center  whitespace-nowrap text-sm font-semibold text-gray-900">' . $row["FirstName"] . ' ' . $row["Middlename"] . ' ' . $row["Lastname"] . '</td>';
                                echo '<td class="p-3 border border-inherit text-center  whitespace-nowrap text-sm font-semibold text-gray-900">' . $row["ServiceType"] . '</td>';
                                echo '<td class="p-3 border border-inherit text-center  whitespace-nowrap text-sm font-semibold text-gray-900">' . $row["DateRequested"] . '</td>';
                                echo '<td class="p-1 border flex items-center justify-center border-inherit text-center whitespace-nowrap text-sm font-semibold text-gray-900">
       <div class="dropdown  dropdown-end">
       <div tabindex="0" role="button" class="flex items-center justify-between text-white font-semibold btn w-40 bg-blue-400 hover:bg-blue-500">
       Action Details
       <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
         <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
       </svg>
     </div>
       <ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow-2xl bg-base-100 rounded-box w-52 ">
       <li class="Adminprocess-view-request-btn" data-request-id="' . $row["RequestID"] . '"><a><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
       <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
       <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
     </svg>
      View Request</a></li>

      <li class="Print-Document-btn" data-request-id="' . $row["RequestID"] . '" data-request-servietype="' . $row["ServiceType"] . '"><a><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
      <path stroke-linecap="round" stroke-linejoin="round" d="M6.72 13.829c-.24.03-.48.062-.72.096m.72-.096a42.415 42.415 0 0 1 10.56 0m-10.56 0L6.34 18m10.94-4.171c.24.03.48.062.72.096m-.72-.096L17.66 18m0 0 .229 2.523a1.125 1.125 0 0 1-1.12 1.227H7.231c-.662 0-1.18-.568-1.12-1.227L6.34 18m11.318 0h1.091A2.25 2.25 0 0 0 21 15.75V9.456c0-1.081-.768-2.015-1.837-2.175a48.055 48.055 0 0 0-1.913-.247M6.34 18H5.25A2.25 2.25 0 0 1 3 15.75V9.456c0-1.081.768-2.015 1.837-2.175a48.041 48.041 0 0 1 1.913-.247m10.5 0a48.536 48.536 0 0 0-10.5 0m10.5 0V3.375c0-.621-.504-1.125-1.125-1.125h-8.25c-.621 0-1.125.504-1.125 1.125v3.659M18 10.5h.008v.008H18V10.5Zm-3 0h.008v.008H15V10.5Z" />
    </svg>
    Print Document</a></li>

      <li class="mark-as-completed" data-request-id="' . $row["RequestID"] . '" data-request-servietype="' . $row["ServiceType"] . '"  data-request-Fname="' . $row["FirstName"] . '"  data-request-Mname="' . $row["Middlename"] . '" data-request-Lname="' . $row["Lastname"] . '"   ><a><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
      <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 0 1-1.043 3.296 3.745 3.745 0 0 1-3.296 1.043A3.745 3.745 0 0 1 12 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 0 1-3.296-1.043 3.745 3.745 0 0 1-1.043-3.296A3.745 3.745 0 0 1 3 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 0 1 1.043-3.296 3.746 3.746 0 0 1 3.296-1.043A3.746 3.746 0 0 1 12 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 0 1 3.296 1.043 3.746 3.746 0 0 1 1.043 3.296A3.745 3.745 0 0 1 21 12Z" />
    </svg>
    Mark Complete</a></li>
       </ul>
   </div>
 </td>';
                  echo '</tr>';
                            }
                            echo '</tbody></table></div>';

                            echo '<dialog id="adminprovressViewrequestdetails" class="modal p-3">
                            <div class="modal-box w-100 max-w-4xl rounded-none">
                                <div class="mb-2 lg:mb-0">
                                  <h3 class="text-2xl font-bold text-blue-500 text-center">BRGY-409 Document Request Management System</h3>
                                  <span class="flex text-base font-medium text-blue-500 justify-center text-center">Document Request Details</span>
                                </div>
                              <div id="admin-process-view-request" class="mt-8 px-4 py-3 sm:px-6 flex align-items justify-center p-4 gap-4 flex-row"></div>
                              <div class="mt-4 px-4 py-3 sm:px-6 flex align-items justify-center p-4 gap-4 flex-row">
                              <button id="adminrequestprocessclose-modal-btn" class="btn btn-sm btn-circle btn-ghost absolute top-2 right-2">
                              ✕
                            </button>
                              </div>
                            </div>
                          </dialog>';
                    // JavaScript to handle modal functionality
                    echo '<script>
                            document.addEventListener("DOMContentLoaded", function () {
                              const modal = document.getElementById("adminprovressViewrequestdetails");
                              const modalContent = document.getElementById("admin-process-view-request");
                              const openModalButtons = document.querySelectorAll(".Adminprocess-view-request-btn");
                              const closeModalButton = document.getElementById("adminrequestprocessclose-modal-btn");
                    
                              openModalButtons.forEach(function (button) {
                                button.addEventListener("click", function () {
                                  const requestId = button.getAttribute("data-request-id");
                    
                                  // Fetch request details using AJAX
                                  fetch("../Backend/fetch_adminresident_request.php?adminrequest_id=" + requestId)
                                    .then(response => response.text())
                                    .then(data => {
                                      // Display fetched details in modal
                                      modalContent.innerHTML = data;
                                      modal.showModal();
                                    });
                                });
                              });
                    
                              // Close modal when clicking on the close button
                              closeModalButton.addEventListener("click", function () {
                                modal.close();
                              });
                            });
                          </script>';



                          echo '<dialog id="markkascompleteresidentrequest" class="modal p-3 ">
                          <div class="modal-box w-70 max-w-3xl rounded-lg">
                           
                              <div class="mb-2 lg:mb-0">
                                <h3 class="text-2xl font-bold text-blue-500 text-center">BRGY-409 Document Request Management System</h3>
                                <span class="flex text-base font-medium text-blue-500 justify-center text-center">Completed Residents Request</span>
                              </div>
                              <form id="completedresidentreq" action="../Backend/Update.php" method="post" enctype="multipart/form-data">
                            <div id="completed-request-info"></div>
                            </form>
                            <div class="mt-4 px-4 py-3 sm:px-6 flex align-items justify-center p-4 gap-4 flex-row">
                            <button id="completedresident-edit-close-modal-btn" class="btn btn-sm btn-circle btn-ghost absolute top-2 right-2">
                            ✕
                          </button>
                          <div class="px-4 py-3 sm:px-6 flex align-items justify-center p-4 gap-4 flex-row">
                          <button" id="completedsidentbutton" class="inline-flex justify-center  rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-500 hover:bg-green-600 text-base font-medium text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 sm:w-auto sm:text-sm"> 
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-1">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M10.125 2.25h-4.5c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125v-9M10.125 2.25h.375a9 9 0 0 1 9 9v.375M10.125 2.25A3.375 3.375 0 0 1 13.5 5.625v1.5c0 .621.504 1.125 1.125 1.125h1.5a3.375 3.375 0 0 1 3.375 3.375M9 15l2.25 2.25L15 12" />
                        </svg>
                            Mark as Completed
                          </button>
                           </div>
                            </div>
                          </div>
                        </dialog>';
                  
                  
                        echo '<script>
                        document.addEventListener("DOMContentLoaded", function () {
                          const modal = document.getElementById("markkascompleteresidentrequest");
                          const modalContent = document.getElementById("completed-request-info");
                          const openModalButtons = document.querySelectorAll(".mark-as-completed");
                          const closeModalButton = document.getElementById("completedresident-edit-close-modal-btn");
                          openModalButtons.forEach(function (button) {
                            button.addEventListener("click", function () {
                              const ID = button.getAttribute("data-request-id");
                              const servietype = button.getAttribute("data-request-servietype");
                              const profile = button.getAttribute("data-verifyResidents-profile");
                              const fname = button.getAttribute("data-request-Fname");
                              const mname = button.getAttribute("data-request-Mname");
                              const lname = button.getAttribute("data-request-Lname");
                              // Display default text in modal content
                              modalContent.innerHTML = `
                            
                  
                              <div class="flex flex-col items-center mt-3 mb-5">
                             
                              <div class="mx-auto text-center" style="width: 200px;">
                              <img src="/Images/Completed.svg" alt="Illustration" class="w-30 h-auto">
                              <p class="text-lg font-semibold text-center ">Complete Request for </p>
                              </div>
                              
                          <h1 class="text-xl font-bold">${fname}, ${mname} ${lname}</h1>
                          <h1 class="text-sm mt-3  font-bold"><span class="font-semibold">Request-ID:</span> ${ID}</h1>
                          <h1 class="text-sm font-bold"><span class="font-semibold">Service-Type:</span> ${servietype}</h1>
                              <div class="hidden items-center justify-center mt-3">
                                  <input Value="Completed" type="text" name="completestat" id="completestat" autocomplete="given-name" placeholder=""
                                      class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 ">
                              </div>
                              
                              <div class="hidden  items-center justify-center mt-3">
                              <input  value="${ID}"   type="text" name="completeID" id="completeID" autocomplete="given-name" placeholder=""
                                  class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 ">
                          </div>
                          </div>
                  
                              `;
                        
                              // Display modal
                              modal.showModal();
                            });
                          });
                        
                          // Close modal when clicking on the close button
                          closeModalButton.addEventListener("click", function () {
                            modal.close();
                          });
                        });
                        </script>';
                  
               
                        echo '<script>
                        $(function() {
                            $("#completedsidentbutton").click(function(e) {
                                e.preventDefault();
                    
                                var valid = $("#completedresidentreq")[0].checkValidity();
                    
                                if (valid) {
                                    var formData = new FormData($("#completedresidentreq")[0]);
                    
                                    $.ajax({
                                        type: "POST",
                                        url: "../Backend/Update.php",
                                        data: formData,
                                        processData: false,
                                        contentType: false,
                                        success: function(data) {
                                            Swal.fire({
                                                icon: "success",
                                                title: "Success",
                                                text: data,
                                            }).then(function() {
                                                // Show personal profile
                                                window.location.reload(); // Reload the page
                                            });
                                        },
                                        error: function(data) {
                                            Swal.fire({
                                                icon: "error",
                                                title: "Error",
                                                text: "There were errors while saving the data.",
                                            });
                                        },
                                    });
                                } else {
                                    // Handle invalid form data here
                                }
                            });
                        });
                        document.getElementById("completedsidentbutton").addEventListener("click", function() {
                            var dialog = document.getElementById("markkascompleteresidentrequest");
                            dialog.close();
                        });
                    </script>';

//print request 
echo '<dialog id="printrequest" class="modal p-3 ">
<div class="modal-box w-70 max-w-3xl rounded-lg">
 
    <div class="mb-2 lg:mb-0">
      <h3 class="text-2xl font-bold text-blue-500 text-center">BRGY-409 Document Request Management System</h3>
      <span class="flex text-base font-medium text-blue-500 justify-center text-center">Print Request</span>
    </div>
    <form id="printdocsform" action="" method="post" enctype="multipart/form-data">
      <div id="printdocument"></div>
    </form>
    <div class="mt-4 px-4 py-3 sm:px-6 flex align-items justify-center p-4 gap-4 flex-row">
      <button id="printclose" class="btn btn-sm btn-circle btn-ghost absolute top-2 right-2">✕</button>
      <div class="px-4 py-3 sm:px-6 flex align-items justify-center p-4 gap-4 flex-row">
        <button id="printdocument-btn" class="inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-500 hover:bg-green-600 text-base font-medium text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 sm:w-auto sm:text-sm"> 
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-1">
        <path stroke-linecap="round" stroke-linejoin="round" d="M6.72 13.829c-.24.03-.48.062-.72.096m.72-.096a42.415 42.415 0 0 1 10.56 0m-10.56 0L6.34 18m10.94-4.171c.24.03.48.062.72.096m-.72-.096L17.66 18m0 0 .229 2.523a1.125 1.125 0 0 1-1.12 1.227H7.231c-.662 0-1.18-.568-1.12-1.227L6.34 18m11.318 0h1.091A2.25 2.25 0 0 0 21 15.75V9.456c0-1.081-.768-2.015-1.837-2.175a48.055 48.055 0 0 0-1.913-.247M6.34 18H5.25A2.25 2.25 0 0 1 3 15.75V9.456c0-1.081.768-2.015 1.837-2.175a48.041 48.041 0 0 1 1.913-.247m10.5 0a48.536 48.536 0 0 0-10.5 0m10.5 0V3.375c0-.621-.504-1.125-1.125-1.125h-8.25c-.621 0-1.125.504-1.125 1.125v3.659M18 10.5h.008v.008H18V10.5Zm-3 0h.008v.008H15V10.5Z" />
      </svg>
          Print Document
        </button>
      </div>
    </div>
  </div>
</dialog>';

echo '<script>
document.addEventListener("DOMContentLoaded", function () {
  const modal = document.getElementById("printrequest");
  const modalContent = document.getElementById("printdocument");
  const openModalButtons = document.querySelectorAll(".Print-Document-btn");
  const closeModalButton = document.getElementById("printclose");
  const printdocsform = document.getElementById("printdocsform");

  openModalButtons.forEach(function (button) {
    button.addEventListener("click", function () {
      const ID = button.getAttribute("data-request-id");
      const servietype = button.getAttribute("data-request-servietype");
      
      // Update form action based on service type
      switch (servietype) {
        case "Certificate of Residency":
          printdocsform.action = "../Backend/GenerateResidency.php";
          break;
        case "Business Clearance":
          printdocsform.action = "../Backend/GenerateBusinessClerancen.php";
          break;
        case "Barangay Identification":
          printdocsform.action = "../Backend/GenerateBrgyForm.php";
          break;
        case "Certificate of Indigency":
          printdocsform.action = "../Backend/GenerateIndigency.php";
          break;

        default:
          console.log("Invalid ServiceType");
      }
      
      // Display default text in modal content
      modalContent.innerHTML = `
        <div class="flex flex-col items-center mt-3 mb-5">
          <div class="mx-auto text-center" style="width: 200px;">
            <img src="/Images/print.svg" alt="Illustration" class="w-30 h-auto">
            <p class="text-lg font-semibold text-center ">Print Document</p>
          </div>
          <h1 class="text-sm mt-3  font-bold"><span class="font-semibold">Request-ID:</span> ${ID}</h1>
          <h1 class="text-sm font-bold"><span class="font-semibold">Service-Type:</span> ${servietype}</h1>
          <div class="hidden  items-center justify-center mt-3">
            <input  value="${ID}"   type="text" name="RequestIDprint" id="RequestIDprint" autocomplete="given-name" placeholder=""
                class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 ">
          </div>
          <div class="hidden  items-center justify-center mt-3">
            <input  value="${servietype}"   type="text" name="ServiceType" id="ServiceType" autocomplete="given-name" placeholder=""
                class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 ">
          </div>
        </div>
      `;
      
      // Open the modal
      modal.showModal();
    });
  });

  // Close modal button
  closeModalButton.addEventListener("click", function () {
    modal.close();
  });
});
</script>';

                        } else {
                            echo '<div class="mx-auto text-center mt-8" style="width: 200px;">';
                            echo '<img src="/Images/norequest.svg" alt="Illustration" class="w-30 h-auto">';
                            echo "<p class='text-lg font-semibold text-center '>No Processing Request</p>";
                            echo '</div>';
                        }
                        ?>
                           </div>
                           <script>
    document.getElementById('printdocument-btn').addEventListener('click', function() {
        var newTab = window.open('', '_blank');
        if (newTab) {
            var clonedForm = document.getElementById('printdocsform').cloneNode(true);
            newTab.document.body.appendChild(clonedForm);
            clonedForm.submit();
        } else {
            alert('Unable to open a new tab. Please enable pop-ups for this site.');
        }
    });
</script>

<div id="Completedrequesttable" class="hidden"> 
                           <nav class="flex space-x-8 justify-center px-5 py-3 text-gray-700 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-800 dark:border-gray-700" aria-label="Breadcrumb">
    <ol class="inline-flex items-end space-x-4 md:space-x-6 rtl:space-x-reverse">
        <li class="inline-flex items-center">
            <a href="#" onclick="showsetschedule()" class="inline-flex items-center text-sm font-medium text-gray-700 focus:outline-none focus:text-blue-600 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white" >
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="rtl:rotate-180 block w-6 h-6 mx-1 text-gray-400">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6h9.75M10.5 6a1.5 1.5 0 1 1-3 0m3 0a1.5 1.5 0 1 0-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-3.75 0H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-9.75 0h9.75" />
                </svg>
                Set Schedule
            </a>
        </li>
        <li>
            <div class="flex items-center">
                <svg class="rtl:rotate-180 block w-3 h-3 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="rtl:rotate-180 block w-6 h-6 ml-10 text-gray-400">
  <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
</svg>
                <a href="#" onclick="showfutureschedule()" class="text-sm font-medium text-gray-700 focus:outline-none focus:text-blue-600 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white" >View Future's Schedule</a>
            </div>
        </li>
        <li>
            <div class="flex items-center">
                <svg class="rtl:rotate-180 block w-3 h-3 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="rtl:rotate-180 block w-6 h-6 ml-10 text-gray-400">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
                </svg>
                <a href="#" onclick="showtodayschedule()" class="text-sm font-medium text-gray-700 focus:outline-none focus:text-blue-600 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white" >View Today's Schedule</a>
            </div>
        </li>
        <li>
            <div class="flex items-center">
                <svg class="rtl:rotate-180 block w-3 h-3 mx-1 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="rtl:rotate-180 block w-6 h-6 text-gray-400 ml-7">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
                </svg>
                <a href="#" onclick="showoverduechedule()"  class="ms-1 text-sm font-medium text-gray-700 focus:outline-none focus:text-blue-600 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white" >View Over Due</a>
            </div>
        </li>
    </ol>
</nav>
<div id="showSetschedule">  
<?php
// Database connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    error_log("Database connection error: " . mysqli_connect_error());
    echo "An error occurred. Please try again later.";
    exit;
}
$query = "SELECT * FROM requestdocument WHERE Status='Completed' AND (PickUpDate IS NULL OR PickUpDate = '')";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    echo '<div class="overflow-x-auto h-screen"><table class="table-auto min-w-full divide-y divide-gray-200 mt-3">
    <thead class="bg-gray-50">
        <tr>
            <th scope="col" class="p-4 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Request ID</th>
            <th scope="col" class="p-4 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Residents Name</th>
            <th scope="col" class="p-4 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Service Type</th>
            <th scope="col" class="p-4 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Pickup Date</th>
            <th scope="col" class="p-4 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Pickup Time</th>
            <th scope="col" class="p-4 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
        </tr>
    </thead>
    <tbody class="bg-white">';
    
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td class="p-3 border border-inherit text-center whitespace-nowrap text-sm font-semibold text-gray-900">' . htmlspecialchars($row["RequestID"]) . '</td>';
        echo '<td class="p-3 border border-inherit text-center whitespace-nowrap text-sm font-semibold text-gray-900">' . htmlspecialchars($row["FirstName"] . ' ' . $row["Middlename"] . ' ' . $row["Lastname"]) . '</td>';
        echo '<td class="p-3 border border-inherit text-center whitespace-nowrap text-sm font-semibold text-gray-900">' . htmlspecialchars($row["ServiceType"]) . '</td>';
        echo '<td class="p-3 border border-inherit text-center whitespace-nowrap text-sm font-semibold text-gray-900">' . htmlspecialchars($row["PickUpDate"]) . '</td>';
        echo '<td class="p-3 border border-inherit text-center whitespace-nowrap text-sm font-semibold text-gray-900">' . htmlspecialchars($row["Pickuptime"]) . '</td>';
        echo '<td class="p-1 border flex items-center justify-center border-inherit text-center whitespace-nowrap text-sm font-semibold text-gray-900">
            <div class="dropdown dropdown-end">
                <div tabindex="0" role="button" class="flex items-center justify-between text-white font-semibold btn w-40 bg-blue-400 hover:bg-blue-500">
                    Action Details
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                    </svg>
                </div>
                <ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow-2xl bg-base-100 rounded-box w-52">
                    <li class="Schedule-resident-pickup" data-request-id="' . htmlspecialchars($row["RequestID"]) . '" data-request-servietype="' . htmlspecialchars($row["ServiceType"]) . '" data-request-Fname="' . htmlspecialchars($row["FirstName"]) . '" data-request-Mname="' . htmlspecialchars($row["Middlename"]) . '" data-request-Lname="' . htmlspecialchars($row["Lastname"]) . '">
                        <a><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
                      </svg>
                      Schedule Released</a>
                    </li>
                 
                </ul>
            </div>
        </td>';
        echo '</tr>';
    }
    echo '</tbody></table></div>';
        echo '<dialog id="Schedulerequest" class="modal p-3 ">
        <div class="modal-box w-70 max-w-3xl rounded-lg">
            <div class="mb-2 lg:mb-0">
              <h3 class="text-2xl font-bold text-blue-500 text-center">BRGY-409 Document Request Management System</h3>
              <span class="flex text-base font-medium text-blue-500 justify-center text-center">Schedule Residents Request</span>
            </div>
            <form id="scheduleform" action="../Backend/Update.php" method="post" enctype="multipart/form-data">
          <div id="schedulemodalcontent"></div>
          </form>
          <div class="mt-4 px-4 py-3 sm:px-6 flex align-items justify-center p-4 gap-4 flex-row">
          <button id="scheduleclose" class="btn btn-sm btn-circle btn-ghost absolute top-2 right-2">
          ✕
        </button>
        <div class="px-4 py-3 sm:px-6 flex align-items justify-center p-4 gap-4 flex-row">
        <button" id="schedulrbutton" class="inline-flex justify-center  rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-500 hover:bg-green-600 text-base font-medium text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 sm:w-auto sm:text-sm"> 
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-1">
        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
      </svg>
          Set Schedule
        </button>
         </div>
          </div>
        </div>
      </dialog>';
      echo '<script>
      document.addEventListener("DOMContentLoaded", function () {
        const modal = document.getElementById("Schedulerequest");
        const modalContent = document.getElementById("schedulemodalcontent");
        const openModalButtons = document.querySelectorAll(".Schedule-resident-pickup");
        const closeModalButton = document.getElementById("scheduleclose");
        openModalButtons.forEach(function (button) {
          button.addEventListener("click", function () {
            const ID = button.getAttribute("data-request-id");
            const servietype = button.getAttribute("data-request-servietype");
            const fname = button.getAttribute("data-request-Fname");
            const mname = button.getAttribute("data-request-Mname");
            const lname = button.getAttribute("data-request-Lname");
            // Display default text in modal content
            modalContent.innerHTML = `
            <div class="flex flex-col items-center mt-3 mb-5">
            <div class="mx-auto text-center" style="width: 200px;">
            <img src="/Images/schedule.svg" alt="Illustration" class="w-30 h-auto">
            <p class="text-lg font-semibold text-center ">Schedule Release for</p>
            </div>
        <h1 class="text-xl font-bold">${fname}, ${mname} ${lname}</h1>
        <h1 class="text-sm mt-3  font-bold"><span class="font-semibold">Request-ID:</span> ${ID}</h1>
        <h1 class="text-sm font-bold"><span class="font-semibold">Service-Type:</span> ${servietype}</h1>
            <div class="hidden  items-center justify-center mt-3">
            <input  value="${ID}"   type="text" name="scheduleID" id="scheduleID" autocomplete="given-name" placeholder=""
                class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 ">
        </div>
        </div>

        <div class=" mt-3 flex flex-col sm:flex-row gap-x-6">
        <div class="sm:flex-1">
            <label for="setdate" class="block text-sm font-semibold leading-6 text-gray-900 text-center">Set Date</label>
            <div class="mt-2">
                <input  required="" type="date" name="setdate" id="setdate" autocomplete="organization"
                    placeholder="Your Occupation"
                    class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 flex-1">
            </div>
        </div>
        <div class="sm:flex-1">
            <label for="settime" class="block text-sm font-semibold leading-6 text-gray-900 text-center">Set Time</label>
            <div class="mt-2">
                <input   required="" type="time" name="settime" id="settime" autocomplete="email"
                    placeholder="Your Contact Number"
                    class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 flex-1">
            </div>
        </div>
        
    </div>
            `;
            // Display modal
            modal.showModal();
          });
        });
        // Close modal when clicking on the close button
        closeModalButton.addEventListener("click", function () {
          modal.close();
        });
      });
      </script>';
      echo '<script>
      $(function() {
          $("#schedulrbutton").click(function(e) {
              e.preventDefault();
              var valid = $("#scheduleform")[0].checkValidity();
              if (valid) {
                  var formData = new FormData($("#scheduleform")[0]);
                  $.ajax({
                      type: "POST",
                      url: "../Backend/Update.php",
                      data: formData,
                      processData: false,
                      contentType: false,
                      success: function(data) {
                          Swal.fire({
                              icon: "success",
                              title: "Success",
                              text: data,
                          }).then(function() {
                              // Show personal profile
                              window.location.reload(); // Reload the page
                          });
                      },
                      error: function(data) {
                          Swal.fire({
                              icon: "error",
                              title: "Error",
                              text: "There were errors while saving the data.",
                          });
                      },
                  });
              } else {
                  // Handle invalid form data here
              }
          });
      });
      document.getElementById("schedulrbutton").addEventListener("click", function() {
          var dialog = document.getElementById("Schedulerequest");
          dialog.close();
      });
  </script>';
} else {
    echo '<div class="mx-auto text-center mt-8" style="width: 200px;">';
    echo '<img src="/Images/norequest.svg" alt="Illustration" class="w-30 h-auto">';
    echo "<p class='text-lg font-semibold text-center'>No Request Found</p>";
    echo '</div>';
}
?>
</div>

<div id="showfuturechedule" class="hidden">  
<?php
// Database connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    error_log("Database connection error: " . mysqli_connect_error());
    echo "An error occurred. Please try again later.";
}
$query = "SELECT * FROM requestdocument WHERE Status='Completed' AND PickUpDate > CURDATE()";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    echo '<div class="overflow-x-auto h-screen"><table class="table-auto min-w-full divide-y divide-gray-200 mt-3">
    <thead class="bg-gray-50">
        <tr>
            <th scope="col" class="p-4 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Request ID</th>
            <th scope="col" class="p-4 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Residents Name</th>
            <th scope="col" class="p-4 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Service Type</th>
            <th scope="col" class="p-4 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Pickup Date</th>
            <th scope="col" class="p-4 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Pickup Time</th>
            <th scope="col" class="p-4 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
        </tr>
    </thead>
    <tbody class="bg-white">';
    
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td class="p-3 border border-inherit text-center whitespace-nowrap text-sm font-semibold text-gray-900">' . htmlspecialchars($row["RequestID"]) . '</td>';
        echo '<td class="p-3 border border-inherit text-center whitespace-nowrap text-sm font-semibold text-gray-900">' . htmlspecialchars($row["FirstName"] . ' ' . $row["Middlename"] . ' ' . $row["Lastname"]) . '</td>';
        echo '<td class="p-3 border border-inherit text-center whitespace-nowrap text-sm font-semibold text-gray-900">' . htmlspecialchars($row["ServiceType"]) . '</td>';
        echo '<td class="p-3 border border-inherit text-center whitespace-nowrap text-sm font-semibold text-gray-900">' . htmlspecialchars($row["PickUpDate"]) . '</td>';
        echo '<td class="p-3 border border-inherit text-center whitespace-nowrap text-sm font-semibold text-gray-900">' . htmlspecialchars($row["Pickuptime"]) . '</td>';
        echo '<td class="p-1 border flex items-center justify-center border-inherit text-center whitespace-nowrap text-sm font-semibold text-gray-900">
            <div class="dropdown dropdown-end">
                <div tabindex="0" role="button" class="flex items-center justify-between text-white font-semibold btn w-40 bg-blue-400 hover:bg-blue-500">
                    Action Details
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                    </svg>
                </div>
                <ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow-2xl bg-base-100 rounded-box w-52">
                <li class="ReSchedule-resident-request" data-request-id="' . $row["RequestID"] . '" data-request-servietype="' . $row["ServiceType"] . '" data-request-Fname="' . $row["FirstName"] . '" data-request-Mname="' . $row["Middlename"] . '" data-request-Lname="' . $row["Lastname"] . '" data-reschedule-date="' . $row["PickUpDate"] . '" data-reschedule-time="' . $row["Pickuptime"] . '">
                <a><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
              </svg>
              Reschedule</a>
            </li>
                </ul>
            </div>
        </td>';
        echo '</tr>';
    }
    echo '</tbody></table></div>';
    //reschdule request

 echo '<dialog id="Re-Schedulerequest" class="modal p-3 ">
 <div class="modal-box w-70 max-w-3xl rounded-lg">
  
     <div class="mb-2 lg:mb-0">
       <h3 class="text-2xl font-bold text-blue-500 text-center">BRGY-409 Document Request Management System</h3>
       <span class="flex text-base font-medium text-blue-500 justify-center text-center">Re-Schedule Residents Request</span>
     </div>
     <form id="Re-scheduleform" action="Update.php" method="post" enctype="multipart/form-data">
   <div id="reschedulemodalcontent"></div>
   </form>
   <div class="mt-4 px-4 py-3 sm:px-6 flex align-items justify-center p-4 gap-4 flex-row">
   <button id="Re-scheduleclose" class="btn btn-sm btn-circle btn-ghost absolute top-2 right-2">
   ✕
 </button>
 <div class="px-4 py-3 sm:px-6 flex align-items justify-center p-4 gap-4 flex-row">
 <button" id="Re-schedulrbutton" class="inline-flex justify-center  rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-500 hover:bg-green-600 text-base font-medium text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 sm:w-auto sm:text-sm"> 
 <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-1">
 <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
</svg>
  Re-Schedule Date of Request
 </button>
  </div>
   </div>
 </div>
</dialog>';
echo '<script>
document.addEventListener("DOMContentLoaded", function () {
 const modal = document.getElementById("Re-Schedulerequest");
 const modalContent = document.getElementById("reschedulemodalcontent");
 const openModalButtons = document.querySelectorAll(".ReSchedule-resident-request");
 const closeModalButton = document.getElementById("Re-scheduleclose");
 openModalButtons.forEach(function (button) {
   button.addEventListener("click", function () {
     const ID = button.getAttribute("data-request-id");
     const servietype = button.getAttribute("data-request-servietype");
     const fname = button.getAttribute("data-request-Fname");
     const mname = button.getAttribute("data-request-Mname");
     const lname = button.getAttribute("data-request-Lname");

     const setdate = button.getAttribute("data-reschedule-date");
     const settime = button.getAttribute("data-reschedule-time");



     // Display default text in modal content
     modalContent.innerHTML = `
   

     <div class="flex flex-col items-center mt-3 mb-5">
    
     <div class="mx-auto text-center" style="width: 200px;">
     <img src="/Images/reschedule.svg" alt="Illustration" class="w-30 h-auto">
     <p class="text-lg font-semibold text-center ">Re Schedule Release for</p>
     </div>
     
 <h1 class="text-xl font-bold">${fname}, ${mname} ${lname}</h1>
 <h1 class="text-sm mt-3  font-bold"><span class="font-semibold">Request-ID:</span> ${ID}</h1>
 <h1 class="text-sm font-bold"><span class="font-semibold">Service-Type:</span> ${servietype}</h1>
     <div class="hidden  items-center justify-center mt-3">
     <input  value="${ID}"   type="text" name="scheduleID" id="scheduleID" autocomplete="given-name" placeholder=""
         class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 ">
 </div>
 </div>

 <div class=" mt-3 flex flex-col sm:flex-row gap-x-6">
 <div class="sm:flex-1">
     <label for="setdate" class="block text-sm font-semibold leading-6 text-gray-900 text-center">Set Date</label>
     <div class="mt-2">
         <input value="${setdate}"  required="" type="date" name="setdate" id="setdate" autocomplete="organization"
             placeholder="Your Occupation"
             class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 flex-1">
     </div>
 </div>
 <div class="sm:flex-1">
     <label for="settime" class="block text-sm font-semibold leading-6 text-gray-900 text-center">Set Time</label>
     <div class="mt-2">
         <input  value="${settime}" required="" type="time" name="settime" id="settime" autocomplete="email"
             placeholder="Your Contact Number"
             class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 flex-1">
     </div>
 </div>
 
</div>
     `;

     // Display modal
     modal.showModal();
   });
 });

 // Close modal when clicking on the close button
 closeModalButton.addEventListener("click", function () {
   modal.close();
 });
});
</script>';
echo '<script>
$(function() {
   $("#Re-schedulrbutton").click(function(e) {
       e.preventDefault();

       var valid = $("#Re-scheduleform")[0].checkValidity();

       if (valid) {
           var formData = new FormData($("#Re-scheduleform")[0]);

           $.ajax({
               type: "POST",
               url: "../Backend/Update.php",
               data: formData,
               processData: false,
               contentType: false,
               success: function(data) {
                   Swal.fire({
                       icon: "success",
                       title: "Success",
                       text: data,
                   }).then(function() {
                       // Show personal profile
                       window.location.reload(); // Reload the page
                   });
               },
               error: function(data) {
                   Swal.fire({
                       icon: "error",
                       title: "Error",
                       text: "There were errors while saving the data.",
                   });
               },
           });
       } else {
           // Handle invalid form data here
       }
   });
});
document.getElementById("Re-schedulrbutton").addEventListener("click", function() {
   var dialog = document.getElementById("Re-Schedulerequest");
   dialog.close();
});
</script>';
} else {
    echo '<div class="mx-auto text-center mt-8" style="width: 200px;">';
    echo '<img src="/Images/norequest.svg" alt="Illustration" class="w-30 h-auto">';
    echo "<p class='text-lg font-semibold text-center'>No Future Schedule</p>";
    echo '</div>';
}
?>
</div>

<div id="showtodayschedule" class="hidden">  
<?php
// Database connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    error_log("Database connection error: " . mysqli_connect_error());
    echo "An error occurred. Please try again later.";
}
$query = "SELECT * FROM requestdocument WHERE Status='Completed' AND PickUpDate = CURDATE()";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    echo '<div class="overflow-x-auto h-screen"><table class="table-auto min-w-full divide-y divide-gray-200 mt-3">
    <thead class="bg-gray-50">
        <tr>
            <th scope="col" class="p-4 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Request ID</th>
            <th scope="col" class="p-4 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Residents Name</th>
            <th scope="col" class="p-4 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Service Type</th>
            <th scope="col" class="p-4 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Pickup Date</th>
            <th scope="col" class="p-4 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Pickup Time</th>
            <th scope="col" class="p-4 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
        </tr>
    </thead>
    <tbody class="bg-white">';
    
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td class="p-3 border border-inherit text-center whitespace-nowrap text-sm font-semibold text-gray-900">' . htmlspecialchars($row["RequestID"]) . '</td>';
        echo '<td class="p-3 border border-inherit text-center whitespace-nowrap text-sm font-semibold text-gray-900">' . htmlspecialchars($row["FirstName"] . ' ' . $row["Middlename"] . ' ' . $row["Lastname"]) . '</td>';
        echo '<td class="p-3 border border-inherit text-center whitespace-nowrap text-sm font-semibold text-gray-900">' . htmlspecialchars($row["ServiceType"]) . '</td>';
        echo '<td class="p-3 border border-inherit text-center whitespace-nowrap text-sm font-semibold text-gray-900">' . htmlspecialchars($row["PickUpDate"]) . '</td>';
        echo '<td class="p-3 border border-inherit text-center whitespace-nowrap text-sm font-semibold text-gray-900">' . htmlspecialchars($row["Pickuptime"]) . '</td>';
        echo '<td class="p-1 border flex items-center justify-center border-inherit text-center whitespace-nowrap text-sm font-semibold text-gray-900">
            <div class="dropdown dropdown-end">
                <div tabindex="0" role="button" class="flex items-center justify-between text-white font-semibold btn w-40 bg-blue-400 hover:bg-blue-500">
                    Action Details
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                    </svg>
                </div>
                <ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow-2xl bg-base-100 rounded-box w-52">
                <li class="today-ReSchedule-resident-request" data-request-id="' . $row["RequestID"] . '" data-request-servietype="' . $row["ServiceType"] . '" data-request-Fname="' . $row["FirstName"] . '" data-request-Mname="' . $row["Middlename"] . '" data-request-Lname="' . $row["Lastname"] . '" data-reschedule-date="' . $row["PickUpDate"] . '" data-reschedule-time="' . $row["Pickuptime"] . '">
                <a><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
              </svg>
              Reschedule</a>
            </li>

            <li class="today-mark-as-released" data-request-id="' . $row["RequestID"] . '" data-request-servietype="' . $row["ServiceType"] . '" data-request-Fname="' . $row["FirstName"] . '" data-request-Mname="' . $row["Middlename"] . '" data-request-Lname="' . $row["Lastname"] . '">
            <a><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
          </svg>
          Mark Released</a>
        </li>
                </ul>
            </div>
        </td>';
        echo '</tr>';
    }
    echo '</tbody></table></div>';
    //reschdule request


 //reschdule request

 echo '<dialog id="today-Re-Schedulerequest" class="modal p-3 ">
 <div class="modal-box w-70 max-w-3xl rounded-lg">
  
     <div class="mb-2 lg:mb-0">
       <h3 class="text-2xl font-bold text-blue-500 text-center">BRGY-409 Document Request Management System</h3>
       <span class="flex text-base font-medium text-blue-500 justify-center text-center">Re-Schedule Residents Request</span>
     </div>
     <form id="today-Re-scheduleform" action="../Backend/Update.php" method="post" enctype="multipart/form-data">
   <div id="today-reschedulemodalcontent"></div>
   </form>
   <div class="mt-4 px-4 py-3 sm:px-6 flex align-items justify-center p-4 gap-4 flex-row">
   <button id="today-Re-scheduleclose" class="btn btn-sm btn-circle btn-ghost absolute top-2 right-2">
   ✕
 </button>
 <div class="px-4 py-3 sm:px-6 flex align-items justify-center p-4 gap-4 flex-row">
 <button" id="today-Re-schedulrbutton" class="inline-flex justify-center  rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-500 hover:bg-green-600 text-base font-medium text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 sm:w-auto sm:text-sm"> 
 <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-1">
 <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
</svg>
  Re-Schedule Date of Request
 </button>
  </div>
   </div>
 </div>
</dialog>';
echo '<script>
document.addEventListener("DOMContentLoaded", function () {
 const modal = document.getElementById("today-Re-Schedulerequest");
 const modalContent = document.getElementById("today-reschedulemodalcontent");
 const openModalButtons = document.querySelectorAll(".today-ReSchedule-resident-request");
 const closeModalButton = document.getElementById("today-Re-scheduleclose");
 openModalButtons.forEach(function (button) {
   button.addEventListener("click", function () {
     const ID = button.getAttribute("data-request-id");
     const servietype = button.getAttribute("data-request-servietype");
     const fname = button.getAttribute("data-request-Fname");
     const mname = button.getAttribute("data-request-Mname");
     const lname = button.getAttribute("data-request-Lname");

     const setdate = button.getAttribute("data-reschedule-date");
     const settime = button.getAttribute("data-reschedule-time");



     // Display default text in modal content
     modalContent.innerHTML = `
   

     <div class="flex flex-col items-center mt-3 mb-5">
    
     <div class="mx-auto text-center" style="width: 200px;">
     <img src="/Images/reschedule.svg" alt="Illustration" class="w-30 h-auto">
     <p class="text-lg font-semibold text-center ">Re Schedule Release for</p>
     </div>
     
 <h1 class="text-xl font-bold">${fname}, ${mname} ${lname}</h1>
 <h1 class="text-sm mt-3  font-bold"><span class="font-semibold">Request-ID:</span> ${ID}</h1>
 <h1 class="text-sm font-bold"><span class="font-semibold">Service-Type:</span> ${servietype}</h1>
     <div class="hidden  items-center justify-center mt-3">
     <input  value="${ID}"   type="text" name="scheduleID" id="scheduleID" autocomplete="given-name" placeholder=""
         class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 ">
 </div>
 </div>

 <div class=" mt-3 flex flex-col sm:flex-row gap-x-6">
 <div class="sm:flex-1">
     <label for="setdate" class="block text-sm font-semibold leading-6 text-gray-900 text-center">Set Date</label>
     <div class="mt-2">
         <input value="${setdate}"  required="" type="date" name="setdate" id="setdate" autocomplete="organization"
             placeholder="Your Occupation"
             class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 flex-1">
     </div>
 </div>
 <div class="sm:flex-1">
     <label for="settime" class="block text-sm font-semibold leading-6 text-gray-900 text-center">Set Time</label>
     <div class="mt-2">
         <input  value="${settime}" required="" type="time" name="settime" id="settime" autocomplete="email"
             placeholder="Your Contact Number"
             class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 flex-1">
     </div>
 </div>
 
</div>
     `;

     // Display modal
     modal.showModal();
   });
 });

 // Close modal when clicking on the close button
 closeModalButton.addEventListener("click", function () {
   modal.close();
 });
});
</script>';
echo '<script>
$(function() {
   $("#today-Re-schedulrbutton").click(function(e) {
       e.preventDefault();

       var valid = $("#today-Re-scheduleform")[0].checkValidity();

       if (valid) {
           var formData = new FormData($("#today-Re-scheduleform")[0]);

           $.ajax({
               type: "POST",
               url: "../Backend/Update.php",
               data: formData,
               processData: false,
               contentType: false,
               success: function(data) {
                   Swal.fire({
                       icon: "success",
                       title: "Success",
                       text: data,
                   }).then(function() {
                       // Show personal profile
                       window.location.reload(); // Reload the page
                   });
               },
               error: function(data) {
                   Swal.fire({
                       icon: "error",
                       title: "Error",
                       text: "There were errors while saving the data.",
                   });
               },
           });
       } else {
           // Handle invalid form data here
       }
   });
});
document.getElementById("today-Re-schedulrbutton").addEventListener("click", function() {
   var dialog = document.getElementById("today-Re-Schedulerequest");
   dialog.close();
});
</script>';


//mark as release

echo '<dialog id="markkasreleased" class="modal p-3 ">
<div class="modal-box w-70 max-w-3xl rounded-lg">

<div class="mb-2 lg:mb-0">
 <h3 class="text-2xl font-bold text-blue-500 text-center">BRGY-409 Document Request Management System</h3>
 <span class="flex text-base font-medium text-blue-500 justify-center text-center">Released Residents Request</span>
</div>
<form id="releasedresidentreq" action="Update.php" method="post" enctype="multipart/form-data">
<div id="released-request-info"></div>
</form>
<div class="mt-4 px-4 py-3 sm:px-6 flex align-items justify-center p-4 gap-4 flex-row">
<button id="releasedresident-edit-close-modal-btn" class="btn btn-sm btn-circle btn-ghost absolute top-2 right-2">
✕
</button>
<div class="px-4 py-3 sm:px-6 flex align-items justify-center p-4 gap-4 flex-row">
<button" id="releasedsidentbutton" class="inline-flex justify-center  rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-500 hover:bg-green-600 text-base font-medium text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 sm:w-auto sm:text-sm"> 
<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-1">
<path stroke-linecap="round" stroke-linejoin="round" d="M10.125 2.25h-4.5c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125v-9M10.125 2.25h.375a9 9 0 0 1 9 9v.375M10.125 2.25A3.375 3.375 0 0 1 13.5 5.625v1.5c0 .621.504 1.125 1.125 1.125h1.5a3.375 3.375 0 0 1 3.375 3.375M9 15l2.25 2.25L15 12" />
</svg>
Mark as Completed
</button>
</div>
</div>
</div>
</dialog>';


echo '<script>
document.addEventListener("DOMContentLoaded", function () {
const modal = document.getElementById("markkasreleased");
const modalContent = document.getElementById("released-request-info");
const openModalButtons = document.querySelectorAll(".today-mark-as-released");
const closeModalButton = document.getElementById("releasedresident-edit-close-modal-btn");
openModalButtons.forEach(function (button) {
button.addEventListener("click", function () {
const ID = button.getAttribute("data-request-id");
const servietype = button.getAttribute("data-request-servietype");
const profile = button.getAttribute("data-verifyResidents-profile");
const fname = button.getAttribute("data-request-Fname");
const mname = button.getAttribute("data-request-Mname");
const lname = button.getAttribute("data-request-Lname");
// Display default text in modal content
modalContent.innerHTML = `


<div class="flex flex-col items-center mt-3 mb-5">

<div class="mx-auto text-center" style="width: 200px;">
<img src="/Images/release.svg" alt="Illustration" class="w-30 h-auto">
<p class="text-lg font-semibold text-center ">Mark Released</p>
</div>

<h1 class="text-xl font-bold">${fname}, ${mname} ${lname}</h1>
<h1 class="text-sm mt-3  font-bold"><span class="font-semibold">Request-ID:</span> ${ID}</h1>
<h1 class="text-sm font-bold"><span class="font-semibold">Service-Type:</span> ${servietype}</h1>
<div class="hidden items-center justify-center mt-3">
   <input Value="Released" type="text" name="releasedstat" id="releasedstat" autocomplete="given-name" placeholder=""
       class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 ">
</div>

<div class="hidden  items-center justify-center mt-3">
<input  value="${ID}"   type="text" name="markreleasedID" id="markreleasedID" autocomplete="given-name" placeholder=""
   class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 ">
</div>
</div>

`;

// Display modal
modal.showModal();
});
});

// Close modal when clicking on the close button
closeModalButton.addEventListener("click", function () {
modal.close();
});
});
</script>';
echo '<script>
$(function() {
$("#releasedsidentbutton").click(function(e) {
 e.preventDefault();
 var valid = $("#releasedresidentreq")[0].checkValidity();
 if (valid) {
     var formData = new FormData($("#releasedresidentreq")[0]);
     $.ajax({
         type: "POST",
         url: "../Backend/Update.php",
         data: formData,
         processData: false,
         contentType: false,
         success: function(data) {
             Swal.fire({
                 icon: "success",
                 title: "Success",
                 text: data,
             }).then(function() {
                 // Show personal profile
                 window.location.reload(); // Reload the page
             });
         },
         error: function(data) {
             Swal.fire({
                 icon: "error",
                 title: "Error",
                 text: "There were errors while saving the data.",
             });
         },
     });
 } else {
     // Handle invalid form data here
 }
});
});
document.getElementById("releasedsidentbutton").addEventListener("click", function() {
var dialog = document.getElementById("markkasreleased");
dialog.close();
});
</script>';
} else {
    echo '<div class="mx-auto text-center mt-8" style="width: 200px;">';
    echo '<img src="/Images/norequest.svg" alt="Illustration" class="w-30 h-auto">';
    echo "<p class='text-lg font-semibold text-center'>No Future Schedule</p>";
    echo '</div>';
}
?>
</div>

<div id="showoverduechedule" class="hidden">  
<?php
// Database connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    error_log("Database connection error: " . mysqli_connect_error());
    echo "An error occurred. Please try again later.";
}
$query = "SELECT * FROM requestdocument WHERE Status='Completed' AND PickUpDate < CURDATE() AND PickUpDate IS NOT NULL AND PickUpDate != ''";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    echo '<div class="overflow-x-auto h-screen"><table class="table-auto min-w-full divide-y divide-gray-200 mt-3">
    <thead class="bg-gray-50">
        <tr>
            <th scope="col" class="p-4 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Request ID</th>
            <th scope="col" class="p-4 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Residents Name</th>
            <th scope="col" class="p-4 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Service Type</th>
            <th scope="col" class="p-4 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Pickup Date</th>
            <th scope="col" class="p-4 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Pickup Time</th>
            <th scope="col" class="p-4 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
        </tr>
    </thead>
    <tbody class="bg-white">';
    
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td class="p-3 border border-inherit text-center whitespace-nowrap text-sm font-semibold text-gray-900">' . htmlspecialchars($row["RequestID"]) . '</td>';
        echo '<td class="p-3 border border-inherit text-center whitespace-nowrap text-sm font-semibold text-gray-900">' . htmlspecialchars($row["FirstName"] . ' ' . $row["Middlename"] . ' ' . $row["Lastname"]) . '</td>';
        echo '<td class="p-3 border border-inherit text-center whitespace-nowrap text-sm font-semibold text-gray-900">' . htmlspecialchars($row["ServiceType"]) . '</td>';
        echo '<td class="p-3 border border-inherit text-center whitespace-nowrap text-sm font-semibold text-gray-900">' . htmlspecialchars($row["PickUpDate"]) . '</td>';
        echo '<td class="p-3 border border-inherit text-center whitespace-nowrap text-sm font-semibold text-gray-900">' . htmlspecialchars($row["Pickuptime"]) . '</td>';
        echo '<td class="p-1 border flex items-center justify-center border-inherit text-center whitespace-nowrap text-sm font-semibold text-gray-900">
            <div class="dropdown dropdown-end">
                <div tabindex="0" role="button" class="flex items-center justify-between text-white font-semibold btn w-40 bg-blue-400 hover:bg-blue-500">
                    Action Details
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                    </svg>
                </div>
                <ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow-2xl bg-base-100 rounded-box w-52">
                <li class="overdue-today-ReSchedule-resident-request" data-request-id="' . $row["RequestID"] . '" data-request-servietype="' . $row["ServiceType"] . '" data-request-Fname="' . $row["FirstName"] . '" data-request-Mname="' . $row["Middlename"] . '" data-request-Lname="' . $row["Lastname"] . '" data-reschedule-date="' . $row["PickUpDate"] . '" data-reschedule-time="' . $row["Pickuptime"] . '">
                <a><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
              </svg>
              Reschedule</a>
            </li>
                </ul>
            </div>
        </td>';
        echo '</tr>';
    }
    echo '</tbody></table></div>';
 //reschdule request

 echo '<dialog id="overdue-today-Re-Schedulerequest" class="modal p-3 ">
 <div class="modal-box w-70 max-w-3xl rounded-lg">
  
     <div class="mb-2 lg:mb-0">
       <h3 class="text-2xl font-bold text-blue-500 text-center">BRGY-409 Document Request Management System</h3>
       <span class="flex text-base font-medium text-blue-500 justify-center text-center">Re-Schedule Residents Request</span>
     </div>
     <form id="overdue-today-Re-scheduleform" action="Update.php" method="post" enctype="multipart/form-data">
   <div id="overdue-today-reschedulemodalcontent"></div>
   </form>
   <div class="mt-4 px-4 py-3 sm:px-6 flex align-items justify-center p-4 gap-4 flex-row">
   <button id="overdue-today-Re-scheduleclose" class="btn btn-sm btn-circle btn-ghost absolute top-2 right-2">
   ✕
 </button>
 <div class="px-4 py-3 sm:px-6 flex align-items justify-center p-4 gap-4 flex-row">
 <button" id="overdue-today-Re-schedulrbutton" class="inline-flex justify-center  rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-500 hover:bg-green-600 text-base font-medium text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 sm:w-auto sm:text-sm"> 
 <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-1">
 <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
</svg>
  Re-Schedule Date of Request
 </button>
  </div>
   </div>
 </div>
</dialog>';
echo '<script>
document.addEventListener("DOMContentLoaded", function () {
 const modal = document.getElementById("overdue-today-Re-Schedulerequest");
 const modalContent = document.getElementById("overdue-today-reschedulemodalcontent");
 const openModalButtons = document.querySelectorAll(".overdue-today-ReSchedule-resident-request");
 const closeModalButton = document.getElementById("overdue-today-Re-scheduleclose");
 openModalButtons.forEach(function (button) {
   button.addEventListener("click", function () {
     const ID = button.getAttribute("data-request-id");
     const servietype = button.getAttribute("data-request-servietype");
     const fname = button.getAttribute("data-request-Fname");
     const mname = button.getAttribute("data-request-Mname");
     const lname = button.getAttribute("data-request-Lname");
     const setdate = button.getAttribute("data-reschedule-date");
     const settime = button.getAttribute("data-reschedule-time");
     // Display default text in modal content
     modalContent.innerHTML = `
   

     <div class="flex flex-col items-center mt-3 mb-5">
    
     <div class="mx-auto text-center" style="width: 200px;">
     <img src="/Images/reschedule.svg" alt="Illustration" class="w-30 h-auto">
     <p class="text-lg font-semibold text-center ">Re Schedule Release for</p>
     </div>
     
 <h1 class="text-xl font-bold">${fname}, ${mname} ${lname}</h1>
 <h1 class="text-sm mt-3  font-bold"><span class="font-semibold">Request-ID:</span> ${ID}</h1>
 <h1 class="text-sm font-bold"><span class="font-semibold">Service-Type:</span> ${servietype}</h1>
     <div class="hidden  items-center justify-center mt-3">
     <input  value="${ID}"   type="text" name="scheduleID" id="scheduleID" autocomplete="given-name" placeholder=""
         class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 ">
 </div>
 </div>

 <div class=" mt-3 flex flex-col sm:flex-row gap-x-6">
 <div class="sm:flex-1">
     <label for="setdate" class="block text-sm font-semibold leading-6 text-gray-900 text-center">Set Date</label>
     <div class="mt-2">
         <input value="${setdate}"  required="" type="date" name="setdate" id="setdate" autocomplete="organization"
             placeholder="Your Occupation"
             class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 flex-1">
     </div>
 </div>
 <div class="sm:flex-1">
     <label for="settime" class="block text-sm font-semibold leading-6 text-gray-900 text-center">Set Time</label>
     <div class="mt-2">
         <input  value="${settime}" required="" type="time" name="settime" id="settime" autocomplete="email"
             placeholder="Your Contact Number"
             class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 flex-1">
     </div>
 </div>
 
</div>
     `;

     // Display modal
     modal.showModal();
   });
 });

 // Close modal when clicking on the close button
 closeModalButton.addEventListener("click", function () {
   modal.close();
 });
});
</script>';
echo '<script>
$(function() {
   $("#overdue-today-Re-schedulrbutton").click(function(e) {
       e.preventDefault();

       var valid = $("#overdue-today-Re-scheduleform")[0].checkValidity();

       if (valid) {
           var formData = new FormData($("#overdue-today-Re-scheduleform")[0]);

           $.ajax({
               type: "POST",
               url: "../Backend/Update.php",
               data: formData,
               processData: false,
               contentType: false,
               success: function(data) {
                   Swal.fire({
                       icon: "success",
                       title: "Success",
                       text: data,
                   }).then(function() {
                       // Show personal profile
                       window.location.reload(); // Reload the page
                   });
               },
               error: function(data) {
                   Swal.fire({
                       icon: "error",
                       title: "Error",
                       text: "There were errors while saving the data.",
                   });
               },
           });
       } else {
           // Handle invalid form data here
       }
   });
});
document.getElementById("overdue-today-Re-schedulrbutton").addEventListener("click", function() {
   var dialog = document.getElementById("overdue-today-Re-Schedulerequest");
   dialog.close();
});
</script>';

} else {
    echo '<div class="mx-auto text-center mt-8" style="width: 200px;">';
    echo '<img src="/Images/norequest.svg" alt="Illustration" class="w-30 h-auto">';
    echo "<p class='text-lg font-semibold text-center'>No Future Schedule</p>";
    echo '</div>';
}
?>
</div>
</div>
                           </div>
                    </div>
                </div>
            </div>
</div>














    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.3/dist/sweetalert2.all.min.js"></script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="https://demo.themesberg.com/windster/app.bundle.js"></script>     
 <script src="../javascript/dashboard.js"></script>
</body>
</html>