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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
 <!-- component -->
<!-- This is an example component -->
<div>
    <nav class="bg-white border-b border-gray-200 fixed z-30 w-full">
       <div class="px-3 py-3 lg:px-5 lg:pl-3">
          <div class="flex items-center justify-between">
             <div class="flex items-center justify-start">
                <button id="toggleSidebarMobile" aria-expanded="true" aria-controls="sidebar" class="lg:hidden mr-2 text-gray-600 hover:text-gray-900 cursor-pointer p-2 hover:bg-gray-100 focus:bg-gray-100 focus:ring-2 focus:ring-gray-100 rounded">
                   <svg id="toggleSidebarMobileHamburger" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                   </svg>
                   <svg id="toggleSidebarMobileClose" class="w-6 h-6 hidden" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                   </svg>
                </button>
                <a href="#" class="text-xl font-bold flex items-center lg:ml-2.5">
                <img src="/Images/brgylogo.png" class="h-6 mr-2" alt="Windster Logo">
                <span class="self-center whitespace-nowrap">BRGY-409 (DRMS)</span>
                </a>
             </div>
      <div class="absolute inset-y-0 right-0 flex items-center pr-5 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
         <form action="#" method="GET" class="hidden lg:block lg:pl-32 mr-3">
            <label for="topbar-search" class="sr-only">Search</label>
            <div class="mt-1 relative lg:w-64">
               <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                  <svg class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                     <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                  </svg>
               </div>
               <input type="text" name="email" id="topbar-search" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full pl-10 p-2.5" placeholder="Search">
            </div>
         </form>
         <div class="flex items-center ">
            <button id="toggleSidebarMobileSearch" type="button" class="lg:hidden text-gray-500 hover:text-gray-900 hover:bg-gray-100 p-2 rounded-lg">
               <span class="sr-only">Search</span>
               <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
               </svg>
            </button>
         </div>
         <div class="relative group">
        <button  onclick="viewactivitylog.showModal()" type="button" class="relative rounded-full p-1 text-gray-500 focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2">
            <span class="sr-only">View notifications</span>
            <svg class="w-6 h-6 text-gray-500 transition duration-75" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
        </button>
        <div class="absolute left-1/2 transform -translate-x-1/2 mt-2 w-48 bg-white border border-gray-200 rounded-lg shadow-lg p-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
            <p class="text-sm text-gray-700">View Admins Activity Log</p>
        </div>

        <dialog id="viewactivitylog" class="modal">
<div class="modal-box w-100 h-full max-w-6xl rounded-lg">
  <form method="dialog">
    <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
  </form>
  <div class="flex flex-col items-center">
         
 <div class="mb-2 lg:mb-0">
            <h3 class="text-2xl font-bold text-blue-500 text-center">BRGY-409 Document Request Management System</h3>
            <span class="flex text-base font-medium text-blue-500 justify-center text-center mt-2">Administrator Session Activity Logs</span>
          </div>
          <nav class=" mt-3 flex space-x-8 justify-center px-5 py-3 text-gray-700 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-800 dark:border-gray-700" aria-label="Breadcrumb">
    <ol class="inline-flex items-end space-x-4 md:space-x-6 rtl:space-x-reverse">
        <li class="inline-flex items-center">
            <a href="#" data-status="process" class="status-link inline-flex items-center text-sm font-medium text-gray-700 focus:outline-none focus:text-blue-600 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white" >
             <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="rtl:rotate-180 block w-6 h-6 mx-1 text-gray-400">
             <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
             </svg>
                Process Activity Logs
            </a>
        </li>
        <li>
            <div class="flex items-center">
                <svg class="rtl:rotate-180 block w-3 h-3 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                </svg>
               <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="rtl:rotate-180 block w-6 h-6 ml-10 text-gray-400">
                   <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                   </svg>
                <a href="#" data-status="Deleted" class="status-link text-sm font-medium text-gray-700 focus:outline-none focus:text-blue-600 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white" >Deleted Activity logs</a>
            </div>
        </li>
        <li>
            <div class="flex items-center">
                <svg class="rtl:rotate-180 block w-3 h-3 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                </svg>
                
               <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="rtl:rotate-180 block w-6 h-6 ml-10 text-gray-400">
              <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
              </svg>
                <a href="#" data-status="Edit"  class="status-link text-sm font-medium text-gray-700 focus:outline-none focus:text-blue-600 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white" >Edit Activity Logs</a>
            </div>
        </li>
        <li>
            <div class="flex items-center">
                <svg class="rtl:rotate-180 block w-3 h-3 mx-1 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="rtl:rotate-180 block w-6 h-6 ml-10 text-gray-400">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
                </svg>
                <a href="#" data-status="set" class="status-link ms-1 text-sm font-medium text-gray-700 focus:outline-none focus:text-blue-600 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white" >Set Schedule Activity Logs</a>
            </div>
        </li>
    </ol>
</nav>
<div id="Activity-log-table">
<script>
$(document).ready(function() {
    // Function to fetch activity logs based on status
    function fetchActivityLogs(status) {
        $.ajax({
            url: '../Backend/activitylog.php',
            type: 'GET',
            data: { status: status },
            success: function(response) {
                $('#Activity-log-table').html(response);
            },
            error: function() {
                alert('An error occurred while fetching the activity logs.');
            }
        });
    }

    // Load process activity logs by default when the page loads
    fetchActivityLogs('process');

    // Handle click event for status links
    $('.status-link').on('click', function(e) {
        e.preventDefault();
        var status = $(this).data('status');
        fetchActivityLogs(status);
    });
});

    </script>
</div>
</dialog>
    </div>

    <?php
 // Start the session
if(isset($_SESSION["AdminID"])) {
    $ID = $_SESSION["AdminID"];
    $result = mysqli_query($conn, "SELECT * FROM admintbl WHERE AdminID = $ID");
    if($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result); // Fetch the user data
?>
        <!-- Profile dropdown -->
        <div class="dropdown dropdown-end relative ml-3">
         <div>
             <button type="button"  tabindex="0" role="button"
                     class=" relative flex rounded-full"
                     id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                 <span class="absolute -inset-1.5"></span>
                 <span class="sr-only">Open user menu</span>
                 <?php if(isset($row["AdminProfile"]) && !empty($row["AdminProfile"])): ?>
        <img src="../Backend/uploads/<?php echo $row["AdminProfile"]; ?>" class="h-8 w-8 rounded-full border-2" alt="Profile Picture">
    <?php else: ?>
        <img src="/Images/brgylogo.png" class="h-8 w-8 rounded-full border-2" alt="Default Profile Picture">
    <?php endif; ?>
             </button>
         </div>

         <ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-box w-52">
    <li onclick="adminedit.showModal()"><a><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.325.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 0 1 1.37.49l1.296 2.247a1.125 1.125 0 0 1-.26 1.431l-1.003.827c-.293.241-.438.613-.43.992a7.723 7.723 0 0 1 0 .255c-.008.378.137.75.43.991l1.004.827c.424.35.534.955.26 1.43l-1.298 2.247a1.125 1.125 0 0 1-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.47 6.47 0 0 1-.22.128c-.331.183-.581.495-.644.869l-.213 1.281c-.09.543-.56.94-1.11.94h-2.594c-.55 0-1.019-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 0 1-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 0 1-1.369-.49l-1.297-2.247a1.125 1.125 0 0 1 .26-1.431l1.004-.827c.292-.24.437-.613.43-.991a6.932 6.932 0 0 1 0-.255c.007-.38-.138-.751-.43-.992l-1.004-.827a1.125 1.125 0 0 1-.26-1.43l1.297-2.247a1.125 1.125 0 0 1 1.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.086.22-.128.332-.183.582-.495.644-.869l.214-1.28Z" />
  <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
</svg>
Your Profile</a></li>
    <li ><a href="AdminLogout.php"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15M12 9l-3 3m0 0 3 3m-3-3h12.75" />
</svg>
Sign out</a></li>
  </ul>
     </div>
     <dialog id="adminedit" class="modal">
  <div class="modal-box w-100 max-w-4xl rounded-lg">
    <form method="dialog">
      <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
    </form>
    
    <form id="updateinformationadmin" action="../Backend/Update.php" method="post" enctype="multipart/form-data">
    <div class="flex flex-col items-center">
           
   <div class="mb-2 lg:mb-0">
              <h3 class="text-2xl font-bold text-blue-500 text-center">BRGY-409 Document Request Management System</h3>
              <span class="flex text-base font-medium text-blue-500 justify-center text-center mt-2">Administrator Details</span>
            </div>
                                 <div class="relative mt-4">
    <input  type="file" id="AdminPRofile" name="AdminPRofile" class="hidden" accept=".jpg, .png .jpeg .pdf, .doc, .docx" onchange="displaySelectedImage(event)">
    <div class="relative">
    <?php if(isset($row["AdminProfile"]) && !empty($row["AdminProfile"])): ?>
        <img id="profilePicture" src="../Backend/uploads/<?php echo $row["AdminProfile"]; ?>" class="w-32 h-32 bg-gray-300 rounded-full  mb-4 border-4" alt="Profile Picture">
    <?php else: ?>
        <img id="profilePicture"  src="/Images/brgylogo.png" class="w-32 h-32 bg-gray-300 rounded-full mb-4" alt="Default Profile Picture">
    <?php endif; ?>
  </div>
  <label for="AdminPRofile" class="absolute bottom-0 right-0 p-2 bg-gray-100 text-black rounded-full hover:bg-gray-400 focus:outline-none focus:bg-gray-400 cursor-pointer border-4 " title="Edit Profile">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
      <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
    </svg>
  </label>
  </div>
  <script>
    function displaySelectedImage(event) {
      const file = event.target.files[0];
      if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
          document.getElementById('profilePicture').src = e.target.result;
        };
        reader.readAsDataURL(file);
      }
    }
  
    function displaySelectedImage(event) {
    const fileInput = event.target;
    const file = fileInput.files[0];
    const profileImg = document.getElementById("profilePicture");
  
    if (file) {
      const reader = new FileReader();
      reader.onload = function() {
        profileImg.src = reader.result;
      }
      reader.readAsDataURL(file);
    }
  }
  </script>
                                     <h1 class="text-xl font-bold"><?php echo $row["Fname"]?>, <?php echo $row["MName"]?> <?php echo $row["Lname"]?></h1>
                                     <h3 class="text-lg font-semibold"><?php echo $row["BrgyPosition"]?></h1>
                                 </div>
                 <div class="mx-auto max-w-3xl mt-6">
                <div class="grid grid-cols-1 gap-y-6 gap-x-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 2xl:grid-cols-3">
                    <div class="flex flex-col">
                        <label for="AdminEditFirstName" class="block text-sm font-medium text-gray-700">First Name</label>
                        <input value="<?php echo $row["Fname"]?>"  required="" type="text" name="AdminEditFirstName" id="AdminEditFirstName" autocomplete="given-name" placeholder="First Name"
                            class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 mb-2">
                    </div>
                    <div class="flex flex-col">
                        <label for="AdminEditMiddleName" class="block text-sm font-medium text-gray-700">Middle Name</label>
                        <input value="<?php echo $row["MName"]?>" required="" type="text" name="AdminEditMiddleName" id="AdminEditMiddleName" autocomplete="additional-name" placeholder="Middle Name"
                            class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 mb-2">
                    </div>
                    <div class="flex flex-col">
                        <label for="AdminEditLastName" class="block text-sm font-medium text-gray-700">Last Name</label>
                        <input value="<?php echo $row["Lname"]?>" required="" type="text" name="AdminEditLastName" id="AdminEditLastName" autocomplete="family-name" placeholder="Last Name"
                            class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 mb-2">
                    </div>
                </div>
                <div class=" mt-3 flex flex-col sm:flex-row gap-x-6">
                <div class="sm:flex-1">
                    <label for="AdminsID" class="block text-sm font-medium text-gray-700">Administrator ID</label>
                    <input value="<?php echo $row["AdminID"]?>" readonly required="" type="text" name="AdminsID" id="AdminsID" autocomplete="street-address" placeholder="Registered ID"
                        class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 mb-2">
                </div>
                <div class="sm:flex-1">
    <label for="AdminGender" class="block text-sm font-semibold leading-6 text-gray-900">Gender</label>
   
        <select required id="AdminGender" name="AdminGender" autocomplete="family-name"
                placeholder="Select Gender"
                class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
                <?php if (!empty($row["AdGender"])): ?>
        <option value="<?php echo $row["AdGender"]; ?>" selected><?php echo $row["AdGender"]; ?></option>
    <?php else: ?>
      <option value="" disabled selected>Select Gender</option>
    <?php endif; ?>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select>
          </div>
                </div>

                <div class=" mt-3 flex flex-col sm:flex-row gap-x-6">
                <div class="sm:flex-1">
                    <label for="AdminEmail" class="block text-sm font-medium text-gray-700">Email</label>
                    <input value="<?php echo $row["Email"]?>" required="" type="text" name="AdminEmail" id="AdminEmail" autocomplete="street-address" placeholder="Email Address"
                        class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 mb-2">
                </div>
<div class="sm:flex-1">
    <label for="AdminPosition" class="block text-sm font-semibold leading-6 text-gray-900">Officials Position</label>
   
        <select required id="AdminPosition" name="AdminPosition" autocomplete="family-name"
                placeholder="Select Voter Status"
                class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
                <?php if (!empty($row["BrgyPosition"])): ?>
        <option value="<?php echo $row["BrgyPosition"]; ?>" selected><?php echo $row["BrgyPosition"]; ?></option>
    <?php else: ?>
      <option value="" disabled selected>Select Barangay Position</option>
    <?php endif; ?>
        <option value="Barangay Chairman">Barangay Chairman</option>
        <option value="Barangay Kagawad">Barangay Kagawad</option>
        <option value="Barangay Secretary">Barangay Secretary</option>
        <option value="Barangay Treasurer">Barangay Treasurer</option>
        <option value="Barangay Tanod">Barangay Tanod</option>
        </select>
          </div>
                </div>
              
                <div class=" mt-3 flex flex-col sm:flex-row gap-x-6">
                <div class="sm:flex-1 mt-2">
                    <label for="RenderedServicestart" class="block text-sm font-medium text-gray-700">Rendered Service Start</label>
                    <input value="<?php echo $row["RenderedServiceStart"]?>" required="" type="date" name="RenderedServicestart" id="RenderedServicestart" autocomplete="street-address" placeholder="Rendered Service"
                        class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 mb-2">
                    </div>
                    <div class="sm:flex-1 mt-2">
                    <label for="RenderedServiceend" class="block text-sm font-medium text-gray-700">Rendered Service End</label>
                    <input value="<?php echo $row["RenderedServiceend"]?>" required="" type="date" name="RenderedServiceend" id="RenderedServiceend" autocomplete="street-address" placeholder="Rendered Service"
                        class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 mb-2">
                    </div>
                    </div>
                </form>
            </div>
            
            <div class="px-4 py-3 sm:px-6 flex align-items justify-center p-4 gap-4 flex-row mt-3">
            <button id="SubmitAdminInformation" class="inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-500 hover:bg-green-600 text-base font-medium text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 sm:w-auto sm:text-sm"> 
  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-1">
    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
  </svg>
  Save Profile
</button>
         
<form method="dialog">
<button onclick="addadminnistrator.showModal()" class="inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-500 hover:bg-green-600 text-base font-medium text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 sm:w-auto sm:text-sm"> 
<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-1">
  <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
</svg>
  Add Admin
</button>
    </form>
</div>

</dialog>
<?php
        } else {
            echo "User data not found.";
        }
    } else {
        echo "User session ID not set.";
    }
?>
<script>
$(function() {
    $('#SubmitAdminInformation').click(function(e) {
        e.preventDefault();
        var valid = $('#updateinformationadmin')[0].checkValidity();
        if (valid) {
            var formData = new FormData($('#updateinformationadmin')[0]);
            $.ajax({
                type: 'POST',
                url: '../Backend/Update.php',
                data: formData,
                processData: false,
                contentType: false,
                success: function(data) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: data,
                    }).then(function() {
                        // Show personal profile
                        window.location.reload(); // Reload the page
                    });
                },
                error: function(data) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'There were errors while saving the data.',
                    });
                },
            });
        } else {
            // Handle invalid form data here
        }
    });
});
document.getElementById('SubmitAdminInformation').addEventListener('click', function() {
    var dialog = document.getElementById('adminedit');
    dialog.close();
});
</script>
     <script>
         const profileButton = document.getElementById('user-menu-button');
         const userMenu = document.getElementById('user-menu');
     
         profileButton.addEventListener('click', (event) => {
             userMenu.classList.toggle('hidden');
             event.stopPropagation(); // Stop the click event from propagating further
         });
     
         document.addEventListener('click', (event) => {
             const isClickInside = profileButton.contains(event.target) || userMenu.contains(event.target);
             if (!isClickInside) {
                 userMenu.classList.add('hidden');
             }
         });
     </script>
<dialog id="addadminnistrator" class="modal">
<div class="modal-box w-100 max-w-4xl rounded-lg">
  <form method="dialog">
    <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
  </form>
  <form id="addadmin" action="../Backend/Insert.php" method="POST" enctype="multipart/form-data" autocomplete="off">
            <div class="flex flex-col items-center">
            <div class="mb-2 lg:mb-0">
              <h3 class="text-2xl font-bold text-blue-500 text-center">BRGY-409 Document Request Management System</h3>
              <span class="flex text-base font-medium text-blue-500 justify-center text-center mt-2">Add Administrator</span>
            </div>
            <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
            <div class="relative mt-4">
    <input  type="file" id="addAdminPRofile" name="addAdminPRofile" class="hidden" accept=".jpg, .png .jpeg .pdf, .doc, .docx" onchange="displaySelectedImage(event)">
    <div class="relative">
        <img id="adprofilePicture"  src="/Images/blank.png" class="w-32 h-32 bg-gray-300 rounded-full mb-4" alt="Default Profile Picture">
  </div>
  <label for="addAdminPRofile" class="absolute bottom-0 right-0 p-2 bg-gray-100 text-black rounded-full hover:bg-gray-400 focus:outline-none focus:bg-gray-400 cursor-pointer border-4 " title="Edit Profile">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
      <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
    </svg>
  </label>
  </div>
          <script>
            function displaySelectedImage(event) {
              const file = event.target.files[0];
              if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                  document.getElementById('adprofilePicture').src = e.target.result;
                };
                reader.readAsDataURL(file);
              }
            }
          
            function displaySelectedImage(event) {
            const fileInput = event.target;
            const file = fileInput.files[0];
            const profileImg = document.getElementById("adprofilePicture");
          
            if (file) {
              const reader = new FileReader();
              reader.onload = function() {
                profileImg.src = reader.result;
              }
              reader.readAsDataURL(file);
            }
          }
          </script>
                                           
                                         </div>
                               <div class="mx-auto max-w-3xl mt-6">
                        <div class="grid grid-cols-1 gap-y-6 gap-x-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 2xl:grid-cols-3">
                            
                        <div class="flex flex-col">
                        <label for="AdminaddFirstName" class="block text-sm font-medium text-gray-700">First Name</label>
                        <input  required="" type="text" name="AdminaddFirstName" id="AdminaddFirstName" autocomplete="given-name" placeholder="First Name"
                            class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 mb-2">
                    </div>
                    <div class="flex flex-col">
                        <label for="AdminaddMiddleName" class="block text-sm font-medium text-gray-700">Middle Name</label>
                        <input  required="" type="text" name="AdminaddMiddleName" id="AdminaddMiddleName" autocomplete="additional-name" placeholder="Middle Name"
                            class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 mb-2">
                    </div>
                    <div class="flex flex-col">
                        <label for="AdminaddLastName" class="block text-sm font-medium text-gray-700">Last Name</label>
                        <input  required="" type="text" name="AdminaddLastName" id="AdminaddLastName" autocomplete="family-name" placeholder="Last Name"
                            class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 mb-2">
                    </div>
                        </div>
                        <div class=" mt-3 flex flex-col sm:flex-row gap-x-6">
                        <div class="sm:flex-1">
<label for="addAdminPosition" class="block text-sm font-semibold leading-6 text-gray-900">Position</label>
<select required id="addAdminPosition" name="addAdminPosition" autocomplete="family-name"
placeholder="Select Voter Status"
class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
<option value="" disabled selected>Select Barangay Position</option>
<option value="Barangay Chairman">Barangay Chairman</option>
<option value="Barangay Kagawad">Barangay Kagawad</option>
<option value="Barangay Secretary">Barangay Secretary</option>
<option value="Barangay Treasurer">Barangay Treasurer</option>
<option value="Barangay Tanod">Barangay Tanod</option>
</select>
</div>

<div class="sm:flex-1">
<label for="addAdminGender" class="block text-sm font-semibold leading-6 text-gray-900">Gender</label>
<select required id="addAdminGender" name="addAdminGender"
class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6"
 name="Gender" type="text" required>
<option  value="" disabled selected>Gender</option>
<option value="Male">Male</option>
<option value="Female">Female</option>
</select>
</div>
</div>
        
      <div class=" mt-3 flex flex-col sm:flex-row gap-x-6">
      <div class="sm:flex-1">
            <label for="AdminaddEmail" class="block text-sm font-medium text-gray-700">Email</label>
            <input  required="" type="text" name="AdminaddEmail" id="AdminaddEmail" autocomplete="given-name" placeholder="Ex. Juan@gmail.com"
            class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 mb-2">
           </div>
        <div class="sm:flex-1">
        <label for="AdminPassword" class="block text-sm font-medium text-gray-700">Password</label>
      <input  required="" type="password" name="AdminPassword" id="AdminPassword" autocomplete="given-name" placeholder="Enter Password"
      class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 mb-2">
   </div>
</div>

<div class="flex flex-col sm:flex-row gap-x-6">
                <div class="sm:flex-1 mt-2">
                    <label for="RenderedServicestartadd" class="block text-sm font-medium text-gray-700">Rendered Service Start</label>
                    <input  required="" type="date" name="RenderedServicestartadd" id="RenderedServicestartadd" autocomplete="street-address" placeholder="Rendered Service"
                        class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 mb-2">
                    </div>
                    <div class="sm:flex-1 mt-2">
                    <label for="RenderedServiceendadd" class="block text-sm font-medium text-gray-700">Rendered Service End</label>
                    <input  required="" type="date" name="RenderedServiceendadd" id="RenderedServiceendadd" autocomplete="street-address" placeholder="Rendered Service"
                        class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 mb-2">
                    </div>
                    </div>
<div>
        <label for="ConfirmPAssword" class="block text-sm font-medium text-gray-700 mt-2">Confirm Password</label>
      <input  required="" type="password" name="ConfirmPAssword" id="ConfirmPAssword" autocomplete="given-name" placeholder="Enter Password"
      class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 mb-2">
   </div>
</div>
          <div class="px-4 py-3 sm:px-6 flex align-items justify-center p-4 gap-4 flex-row mt-3">
          <button id="Addadministrator"  type="submit" class="inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-500 hover:bg-green-600 text-base font-medium text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 sm:w-auto sm:text-sm"> 
<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-1">
  <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
</svg>
Add Administrator
</button>
</div>
</form>
</div>
</dialog>
<script>
$(function() {
    $('#Addadministrator').click(function(e) {
        e.preventDefault();
        var valid = $('#addadmin')[0].checkValidity();
        if (valid) {
            var formData = new FormData($('#addadmin')[0]);
            $.ajax({
                type: 'POST',
                url: '../Backend/Insert.php',
                data: formData,
                processData: false,
                contentType: false,
                success: function(data) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: data,
                    }).then(function() {
                        window.location.reload();
                    });
                },
                error: function(xhr, status, error) {
                    if (xhr.status === 400) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: xhr.responseText,
                            confirmButtonText: 'OK',
                        }).then(function() {
                         addadminnistrator.showModal(); // Open the modal
                       });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'There were errors while saving the data.',
                            confirmButtonText: 'OK',
                        }).then(function() {
                         addadminnistrator.showModal(); // Open the modal
                       });
                    }
                },
            });
        } else {
            // Handle invalid form data here
        }
    });
});
document.getElementById('Addadministrator').addEventListener('click', function() {
    var dialog = document.getElementById('addadminnistrator');
    dialog.close();
});
</script>  
</div>
</div>
</div>
    </nav>
    
    <div class="flex overflow-hidden bg-white pt-16">
       <aside id="sidebar" class="fixed hidden z-20 h-full top-0 left-0 pt-16 flex lg:flex flex-shrink-0 flex-col w-64 transition-width duration-75" aria-label="Sidebar">
          <div class="relative flex-1 flex flex-col min-h-0 border-r border-gray-200 bg-white pt-0">
             <div class="flex-1 flex flex-col pt-5 pb-4 overflow-y-auto">
                <div class="flex-1 px-3 bg-white divide-y space-y-1">
                   <ul class="space-y-2 pb-2">
                      <li>
                         <form action="#" method="GET" class="lg:hidden">
                            <label for="mobile-search" class="sr-only">Search</label>
                            <div class="relative">
                               <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                  <svg class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                     <path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
                                  </svg>
                               </div>
                               <input type="text" name="email" id="mobile-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-cyan-600 focus:ring-cyan-600 block w-full pl-10 p-2.5" placeholder="Search">
                            </div>
                         </form>
                      </li>
                      <li>
                         <a href="#" class="text-base text-gray-900 font-normal rounded-lg flex items-center p-2 hover:bg-gray-100 group" onclick="showAdminDashboard()">
                           <svg class="w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75"  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" className="w-6 h-6">
                              <path strokeLinecap="round" strokeLinejoin="round" d="M10.5 6a7.5 7.5 0 1 0 7.5 7.5h-7.5V6Z" />
                              <path strokeLinecap="round" strokeLinejoin="round" d="M13.5 10.5H21A7.5 7.5 0 0 0 13.5 3v7.5Z" />
                            </svg>
                            
                            <span class="ml-3">Dashboard</span>
                         </a>
                      </li>
                      <li>
                         <a href="#"  class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 flex items-center p-2 group " onclick="showresidentsRecord()">
                           <svg class="w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75"  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" className="w-6 h-6">
                              <path strokeLinecap="round" strokeLinejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                            </svg>
                            <span class="ml-3 flex-1 whitespace-nowrap">Resident Record</span>
                         </a>
                      </li>
                      <li>
                         <a href="#"  class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 flex items-center p-2 group" onclick="showRequestedDocuments()">
                           <svg class="w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" className="w-6 h-6">
                              <path strokeLinecap="round" strokeLinejoin="round" d="M15.75 17.25v3.375c0 .621-.504 1.125-1.125 1.125h-9.75a1.125 1.125 0 0 1-1.125-1.125V7.875c0-.621.504-1.125 1.125-1.125H6.75a9.06 9.06 0 0 1 1.5.124m7.5 10.376h3.375c.621 0 1.125-.504 1.125-1.125V11.25c0-4.46-3.243-8.161-7.5-8.876a9.06 9.06 0 0 0-1.5-.124H9.375c-.621 0-1.125.504-1.125 1.125v3.5m7.5 10.375H9.375a1.125 1.125 0 0 1-1.125-1.125v-9.25m12 6.625v-1.875a3.375 3.375 0 0 0-3.375-3.375h-1.5a1.125 1.125 0 0 1-1.125-1.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H9.75" />
                            </svg>
                            <span class="ml-3 flex-1 whitespace-nowrap">Requested Documents</span>
                         </a>
                      </li>

                      <li>
                         <a href="#"  class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 flex items-center p-2 group" onclick="showBlotterreport()">
                         <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75">
                         <path stroke-linecap="round" stroke-linejoin="round" d="M3 3v1.5M3 21v-6m0 0 2.77-.693a9 9 0 0 1 6.208.682l.108.054a9 9 0 0 0 6.086.71l3.114-.732a48.524 48.524 0 0 1-.005-10.499l-3.11.732a9 9 0 0 1-6.085-.711l-.108-.054a9 9 0 0 0-6.208-.682L3 4.5M3 15V4.5" />
                         </svg>
                            <span class="ml-3 flex-1 whitespace-nowrap">Blotter Report</span>
                         </a>
                      </li>


                      <li>
                         <a href="#" class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 flex items-center p-2 group" onclick="showpublicnews()">
                           <svg  class="w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" className="w-6 h-6">
                              <path strokeLinecap="round" strokeLinejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 0 1-2.25 2.25M16.5 7.5V18a2.25 2.25 0 0 0 2.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 0 0 2.25 2.25h13.5M6 7.5h3v3H6v-3Z" />
                            </svg>
                            
                            <span class="ml-3 flex-1 whitespace-nowrap">Publish News</span>
                         </a>
                      </li>
                      
                      <li>
                         <a href="#" class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 flex items-center p-2 group" onclick="showofficials()">
                           <svg class="w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" className="w-6 h-6">
                              <path strokeLinecap="round" strokeLinejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                            </svg>
                            
                            <span class="ml-3 flex-1 whitespace-nowrap">Barangay Officials</span>
                         </a>
                      </li>
                      <li>
                         <a href="#" class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 flex items-center p-2 group" onclick="showMessage()">
                           <svg class="w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" className="w-6 h-6">
                              <path strokeLinecap="round" strokeLinejoin="round" d="M8.625 12a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H8.25m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H12m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0h-.375M21 12c0 4.556-4.03 8.25-9 8.25a9.764 9.764 0 0 1-2.555-.337A5.972 5.972 0 0 1 5.41 20.97a5.969 5.969 0 0 1-.474-.065 4.48 4.48 0 0 0 .978-2.025c.09-.457-.133-.901-.467-1.226C3.93 16.178 3 14.189 3 12c0-4.556 4.03-8.25 9-8.25s9 3.694 9 8.25Z" />
                            </svg>
                            
                            <span class="ml-3 flex-1 whitespace-nowrap">Message</span>
                         </a>
                      </li>
                    
                      <div class="space-y-2 pt-2">

                   </ul>
               
                </div>
             </div>
          </div>
       </aside>

       
<div class="bg-gray-900 opacity-50 hidden fixed inset-0 z-10" id="sidebarBackdrop"></div>

<div id="main-content" class="absolute bg-gray-50 inset-0 overflow-y-auto lg:ml-64 mt-16">
<main>
<?php
 // Start the session
if(isset($_SESSION["AdminID"])) {
    $ID = $_SESSION["AdminID"];
    $result = mysqli_query($conn, "SELECT * FROM admintbl WHERE AdminID = $ID");
    if($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result); // Fetch the user data
?>
<div class="pt-6 px-4">
<div class="w-full grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
<div class="bg-blue-500 shadow rounded-lg p-4 sm:p-6 xl:p-8 relative">
    <div class="flex items-center justify-between">
        <h3 class="text-base font-normal text-white">Document Request</h3>
        <div class="absolute top-0 right-0 mt-2 mr-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-file-description">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10.125 2.25h-4.5c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125v-9M10.125 2.25h.375a9 9 0 0 1 9 9v.375M10.125 2.25A3.375 3.375 0 0 1 13.5 5.625v1.5c0 .621.504 1.125 1.125 1.125h1.5a3.375 3.375 0 0 1 3.375 3.375M9 15l2.25 2.25L15 12" />
            </svg>
        </div>
    </div>            
    <div class="flex items-center">
        <div class="flex-shrink-0 w-full">
            <?php
                include '../Backend/AdminTables/Admindata/count_data.php';
                countRequestDocuments();
            ?>
            <div class="relative" style="height: 200px;">
                <canvas id="requestchart"></canvas>
            </div>
            <?php include '../Backend/AdminTables/Admindata/RequestdoDataReport.php'; ?>
            <script>
                var ctx = document.getElementById('requestchart').getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'line', data: {labels: <?php echo json_encode($dates); ?>,datasets: [{
                            label: 'Document Request Report over Months',
                        data: <?php echo json_encode($counts); ?>, backgroundColor: 'rgba(75, 192, 192, 0.2)', borderColor: 'rgba(255, 255, 255, 1)',borderWidth: 1}]},
                    options: {responsive: true,maintainAspectRatio: false,scales: {
                            y: {beginAtZero: true,ticks: { color: 'white' }, grid: { color: 'rgba(255, 255, 255, 0.5)' }},
                            x: {ticks: { color: 'white' },grid: { color: 'rgba(255, 255, 255, 0.5)' } }},plugins: {legend: {labels: { color: 'white' } }}}});
            </script>
        </div>
    </div>
</div>
    <div class="bg-red-400 shadow rounded-lg p-4 sm:p-6 xl:p-8 relative">
    <div class="flex items-center justify-between">
        <h3 class="text-base font-normal text-white">Complain Report</h3>
        <div class="absolute top-0 right-0 mt-2 mr-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-file-description"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M14 3v4a1 1 0 0 0 1 1h4" /><path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" /><path d="M9 17h6" /><path d="M9 13h6" /></svg>
        </div>
    </div>
    <div class="flex items-center">
        <div class="flex-shrink-0 w-full">
            <?php countComplaints(); ?>
            <div class="relative" style="height: 200px;">
                <canvas id="myChart"></canvas>
            </div>
            <?php include '../Backend/AdminTables/Admindata/ComplaintReport.php'; ?>
            <script>
                var ctx = document.getElementById('myChart').getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'line',
                    data: {labels: <?php echo json_encode($dates); ?>,datasets: [{label: 'Complaint Count Report over Months',
                    data: <?php echo json_encode($counts); ?>,backgroundColor: 'rgba(75, 192, 192, 0.2)', borderColor: 'rgba(255, 255, 255, 1)',borderWidth: 1}]},
                    options: {responsive: true,maintainAspectRatio: false,scales: {y: {
                    beginAtZero: true,ticks: { color: 'white' },grid: { color: 'rgba(255, 255, 255, 0.5)' }},
                    x: {ticks: { color: 'white' },grid: { color: 'rgba(255, 255, 255, 0.5)' }}},plugins: {legend: {labels: { color: 'white' }
                    }}}});
            </script>
        </div>
    </div>
</div>


                   <div class="bg-yellow-500 shadow rounded-lg p-4 sm:p-6 xl:p-8 relative">
    <div class="flex items-center justify-between">
        <h3 class="text-base font-normal text-white">Registered Residents</h3>
        <div class="absolute top-0 right-0 mt-2 mr-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-file-description">
                <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
            </svg>
        </div>
    </div>
    <div class="flex items-center">
        <div class="flex-shrink-0 w-full">
            <?php countUsers();?>
            <div class="relative" style="height: 200px;">
                <canvas id="ResidentChart"></canvas>
            </div>
            <?php include '../Backend/AdminTables/Admindata/Residentdatareport.php'; ?>
            <script>
                var ctx = document.getElementById('ResidentChart').getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['Male', 'Female'],
                        datasets: [{label: 'Registered Residents',data: <?php echo json_encode($counts); ?>,backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            backgroundColor: [ 'rgba(75, 192, 192, 0.2)', 'rgba(255, 99, 132, 0.2)'], borderColor: 'rgba(255, 255, 255, 1)',borderWidth: 1}]},
                    options: {responsive: true,maintainAspectRatio: false,scales: {y: {beginAtZero: true,ticks: { color: 'white' },
                    grid: { color: 'rgba(255, 255, 255, 0.5)' }},x: {ticks: { color: 'white' },grid: { color: 'rgba(255, 255, 255, 0.5)' }}},
                    plugins: {legend: {labels: { color: 'white' }}}}});
            </script>
        </div>
    </div>
</div>

                   <div class="bg-green-400 shadow rounded-lg p-4 sm:p-6 xl:p-8 relative">
    <div class="flex items-center justify-between">
        <h3 class="text-base font-normal text-white">Resident Voters Status</h3>
        <div class="absolute top-0 right-0 mt-2 mr-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-file-description">
                <path stroke-linecap="round" stroke-linejoin="round" d="M7.864 4.243A7.5 7.5 0 0 1 19.5 10.5c0 2.92-.556 5.709-1.568 8.268M5.742 6.364A7.465 7.465 0 0 0 4.5 10.5a7.464 7.464 0 0 1-1.15 3.993m1.989 3.559A11.209 11.209 0 0 0 8.25 10.5a3.75 3.75 0 1 1 7.5 0c0 .527-.021 1.049-.064 1.565M12 10.5a14.94 14.94 0 0 1-3.6 9.75m6.633-4.596a18.666 18.666 0 0 1-2.485 5.33" />
            </svg>
        </div>
    </div>
    <div class="flex items-center">
        <div class="flex-shrink-0 w-full">
            <?php countUsers();?>
            <div class="relative" style="height: 200px;">
                <canvas id="VotersChart"></canvas>
            </div>
            <?php include '../Backend/AdminTables/Admindata/VotersStatusData.php'; ?>
            <script>
                var ctx = document.getElementById('VotersChart').getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {labels: ['Not Registered', 'Registered', 'Pending Registration'],datasets: [{label: 'Residents Voter Status',data: <?php echo json_encode($counts); ?>,
                        backgroundColor: [ 'rgba(75, 192, 192, 0.2)', 'rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)'],borderColor: 'rgba(255, 255, 255, 1)',borderWidth: 1}]},
                    options: {responsive: true,maintainAspectRatio: false,scales: {
                    y: {beginAtZero: true,ticks: { color: 'white' },grid: { color: 'rgba(255, 255, 255, 0.5)' }},x: {ticks: { color: 'white' },grid: { color: 'rgba(255, 255, 255, 0.5)' }
                    }},plugins: {legend: {labels: { color: 'white' }}}}});
            </script>
        </div>
    </div>
</div>

                   <div class="bg-blue-300 shadow rounded-lg p-4 sm:p-6 xl:p-8 relative">
    <div class="flex items-center justify-between">
        <h3 class="text-base font-normal text-white">Resident Marital Status</h3>
        <div class="absolute top-0 right-0 mt-2 mr-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-file-description">
                <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />
                <path d="M9 7l1 0" />
                <path d="M9 13l6 0" />
                <path d="M13 17l2 0" />
            </svg>
        </div>
    </div>
    <div class="flex items-center">
        <div class="flex-shrink-0 w-full">
            <?php countUsers();?>
            <div class="relative" style="height: 200px;">
                <canvas id="MstatChart"></canvas>
            </div>
            <?php include '../Backend/AdminTables/Admindata/MaritalStatusdata.php'; ?>
            <script>
                var ctx = document.getElementById('MstatChart').getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'polarArea',
                    data: {labels: ['Married', 'Single', 'Divorced', 'Widowed', 'Separated'],datasets: [{label: 'Residents Marital Status',
                    data: <?php echo json_encode($counts); ?>, backgroundColor: [ 'rgba(75, 192, 192, 0.2)', 'rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)',  'rgba(255, 206, 86, 0.2)', 'rgba(153, 102, 255, 0.2)' ],borderColor: 'rgba(255, 255, 255, 1)',borderWidth: 1}]},
                    options: {responsive: true,maintainAspectRatio: false,
                    scales: {y: { beginAtZero: true,ticks: { color: 'white' },grid: { color: 'rgba(255, 255, 255, 0.5)' }},x: {
                    ticks: { color: 'white' },grid: { color: 'rgba(255, 255, 255, 0.5)' }}},plugins: {
                    legend: {labels: { color: 'white' }}}}});
            </script>
        </div>
    </div>
</div>

                   <div class="bg-orange-400 shadow rounded-lg p-4 sm:p-6 xl:p-8 relative">
    <div class="flex items-center justify-between">
        <h3 class="text-base font-normal text-white">Resident Account Status</h3>
        <div class="absolute top-0 right-0 mt-2 mr-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-file-description">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 0 1-1.043 3.296 3.745 3.745 0 0 1-3.296 1.043A3.745 3.745 0 0 1 12 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 0 1-3.296-1.043 3.745 3.745 0 0 1-1.043-3.296A3.745 3.745 0 0 1 3 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 0 1 1.043-3.296 3.746 3.746 0 0 1 3.296-1.043A3.746 3.746 0 0 1 12 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 0 1 3.296 1.043 3.746 3.746 0 0 1 1.043 3.296A3.745 3.745 0 0 1 21 12Z" />
            </svg>
        </div>
    </div>
    <div class="flex items-center">
        <div class="flex-shrink-0 w-full">
            <?php countUsers();?>
            <div class="relative" style="height: 200px;">
                <canvas id="VerifiedChart"></canvas>
            </div>
            <?php include '../Backend/AdminTables/Admindata/Verified.php'; ?>
            <script>
                var ctx = document.getElementById('VerifiedChart').getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'polarArea',data: {labels: ['Verified', 'Not-Verified'],datasets: [{label: 'Residents Account Status',data: <?php echo json_encode($counts); ?>,
                    backgroundColor: ['rgba(75, 192, 192, 0.2)','rgba(255, 99, 132, 0.2)'],borderColor: 'rgba(255, 255, 255, 1)',borderWidth: 1}]},
                    options: {responsive: true,maintainAspectRatio: false,
                    scales: {y: {beginAtZero: true,ticks: { color: 'white' },grid: { color: 'rgba(255, 255, 255, 0.5)' }},x: {ticks: { color: 'white' },grid: { color: 'rgba(255, 255, 255, 0.5)' }
                    }}, plugins: {legend: {labels: { color: 'white' }}}}});
            </script>
        </div>
    </div>
</div>

                </div>
                <div class="bg-white mt-4 shadow rounded-lg p-4 sm:p-6 xl:p-8 2xl:col-span-2">
    <div class="flex items-center justify-center">
        <h3 class="text-center text-black font-semibold">Barangay-409  Document Request & Blotter Report Monitoring Chart</h3>
        <div class="absolute top-0 right-0 mt-2 mr-2">
        </div>
    </div>
    <div class="flex items-center">
        <div class="w-full">
            <div class="relative  rounded-lg" style="height: 500px;">
                <canvas id="MainChart"></canvas>
            </div>
            <?php include '../Backend/AdminTables/Admindata/Mainchart.php'; ?>
            <script>
                var ctx = document.getElementById('MainChart').getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'radar',
                    data: {
                        labels: <?php echo json_encode($dates); ?>,datasets: [{
                        label: 'Requests',data: <?php echo json_encode($request_counts); ?>,backgroundColor: 'rgba(75, 192, 192, 0.2)',borderColor: 'rgba(75, 192, 192, 1)',borderWidth: 1
                        },{label: 'Complaints',data: <?php echo json_encode($complaint_counts); ?>,
                        backgroundColor: 'rgba(192, 75, 75, 0.2)',borderColor: 'rgba(192, 75, 75, 1)',borderWidth: 1}]},options: {
                        responsive: true,maintainAspectRatio: false,scales: {y: {
                        beginAtZero: true,ticks: { color: 'black' },grid: { color: 'rgba(0, 0, 0, 0.5)' }},
                        x: {ticks: { color: 'black' },grid: { color: 'rgba(0, 0, 0, 0.5)' }}},
                        plugins: {legend: {labels: { color: 'black' }
                        },title: {display: true,text: 'Residents Document & Complaint Monitoring',
                        color: 'black'}}}});
            </script>
        </div>
    </div>
</div>
             </div>
             <?php
        } else {
            echo "User data not found.";
        }
    } else {
        echo "User session ID not set.";
    }
?>
          </main>
          <footer class="bg-white md:flex md:items-center md:justify-between shadow rounded-lg p-4 md:p-6 xl:p-8 my-6 mx-4">
             <ul class="flex items-center flex-wrap mb-6 md:mb-0">
                <li><a href="#" class="text-sm font-normal text-gray-500 hover:underline mr-4 md:mr-6">Terms and conditions</a></li>
                <li><a href="#" class="text-sm font-normal text-gray-500 hover:underline mr-4 md:mr-6">Privacy Policy</a></li>
                <li><a href="#" class="text-sm font-normal text-gray-500 hover:underline mr-4 md:mr-6">Licensing</a></li>
                <li><a href="#" class="text-sm font-normal text-gray-500 hover:underline mr-4 md:mr-6">Cookie Policy</a></li>
                <li><a href="#" class="text-sm font-normal text-gray-500 hover:underline">Contact</a></li>
             </ul>
             <div class="flex sm:justify-center space-x-6">
                <a href="#" class="text-gray-500 hover:text-gray-900">
                   <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                      <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" />
                   </svg>
                </a>
                <a href="#" class="text-gray-500 hover:text-gray-900">
                   <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                      <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd" />
                   </svg>
                </a>
                <a href="#" class="text-gray-500 hover:text-gray-900">
                   <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                      <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" />
                   </svg>
                </a>
                <a href="#" class="text-gray-500 hover:text-gray-900">
                   <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                      <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd" />
                   </svg>
                </a>
                <a href="#" class="text-gray-500 hover:text-gray-900">
                   <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                      <path fill-rule="evenodd" d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10c5.51 0 10-4.48 10-10S17.51 2 12 2zm6.605 4.61a8.502 8.502 0 011.93 5.314c-.281-.054-3.101-.629-5.943-.271-.065-.141-.12-.293-.184-.445a25.416 25.416 0 00-.564-1.236c3.145-1.28 4.577-3.124 4.761-3.362zM12 3.475c2.17 0 4.154.813 5.662 2.148-.152.216-1.443 1.941-4.48 3.08-1.399-2.57-2.95-4.675-3.189-5A8.687 8.687 0 0112 3.475zm-3.633.803a53.896 53.896 0 013.167 4.935c-3.992 1.063-7.517 1.04-7.896 1.04a8.581 8.581 0 014.729-5.975zM3.453 12.01v-.26c.37.01 4.512.065 8.775-1.215.25.477.477.965.694 1.453-.109.033-.228.065-.336.098-4.404 1.42-6.747 5.303-6.942 5.629a8.522 8.522 0 01-2.19-5.705zM12 20.547a8.482 8.482 0 01-5.239-1.8c.152-.315 1.888-3.656 6.703-5.337.022-.01.033-.01.054-.022a35.318 35.318 0 011.823 6.475 8.4 8.4 0 01-3.341.684zm4.761-1.465c-.086-.52-.542-3.015-1.659-6.084 2.679-.423 5.022.271 5.314.369a8.468 8.468 0 01-3.655 5.715z" clip-rule="evenodd" />
                   </svg>
                </a>
             </div>
          </footer>
         
       </div>
  

<!-- Residents Record -------------------------------------------------------------------------------------------------------------->
<div id="ResidentRecord" style="display: none;" class="absolute bg-gray-50 inset-0 overflow-y-auto lg:ml-64 mt-16">
    <div class="pt-3 px-4">
        <div class="flex flex-col">
            <div class="overflow-x-auto rounded-lg">
                <div class="bg-white h-full shadow rounded-lg p-4 sm:p-6 xl:p-8 xl:gap-4 my-4">

                <div class="mb-4 flex flex-col lg:flex-row items-center justify-between">
             <div class="mb-4 lg:mb-0">
             <h3 class="text-xl font-bold text-gray-900 mb-2">Manage Residents Information</h3>
                 <span class="text-base font-normal text-gray-500">This is a list Current Registered Residents</span>
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
                         <input type="text" name="email" id="topbar-search" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full pl-10 p-2.5" placeholder="Search Residents">
                     </div>
                 </form>
                  <div class="lg:flex lg:items-center lg:pl-32">
                 <button  class="mt-2 w-full relative text-white border-2 rounded-lg bg-green-400 dark:bg-gray-800 dark:border-gray-700 hover:bg-green-500  font-semibold py-2 px-4">
                 <svg xmlns="http://www.w3.org/2000/svg"  fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="white" class="w-5 h-5 mr-1 inline-block align-middle text-white">
  <path stroke-linecap="round" stroke-linejoin="round" d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z" />
</svg>
Add Residents Information
            </button>
            </div>
             </div>
         </div>

         <nav class="flex flex-wrap justify-center mb-3 px-5 py-3 text-gray-700 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-800 dark:border-gray-700" aria-label="Breadcrumb">
    <ol class="flex flex-wrap items-center space-x-2 sm:space-x-4 md:space-x-6 rtl:space-x-reverse">
        <li class="flex items-center">
            <a href="#" onclick="displayallresident()" class="inline-flex items-center text-sm font-medium text-gray-700 focus:outline-none focus:text-blue-600 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="rtl:rotate-180 block w-6 h-6 mx-1 text-gray-400">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                </svg>
                All Residents
            </a>
        </li>
        <li class="flex items-center">
            <svg class="rtl:rotate-180 block w-3 h-3 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="rtl:rotate-180 block w-6 h-6 ml-2 sm:ml-4 text-gray-400">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 14m-5 0a5 5 0 1 0 10 0a5 5 0 1 0 -10 0" /> <path d="M19 5l-5.4 5.4" /> <path d="M19 5h-5"/><path d="M19 5v5" />
            </svg>
            <a href="#" onclick="displayMaleresident()" class="text-sm font-medium text-gray-700 focus:outline-none focus:text-blue-600 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white ml-1 sm:ml-2">Male Resident</a>
        </li>
        <li class="flex items-center">
            <svg class="rtl:rotate-180 block w-3 h-3 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="rtl:rotate-180 block w-6 h-6 ml-2 sm:ml-4 text-gray-400">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <path d="M12 9m-5 0a5 5 0 1 0 10 0a5 5 0 1 0 -10 0" />
                <path d="M12 14v7" />
                <path d="M9 18h6" />
            </svg>
            <a href="#" onclick="displayFemaleresident()" class="text-sm font-medium text-gray-700 focus:outline-none focus:text-blue-600 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white ml-1 sm:ml-2">Female Resident</a>
        </li>
        <li class="flex items-center">
            <svg class="rtl:rotate-180 block w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="rtl:rotate-180 block w-6 h-6 ml-2 sm:ml-4 text-gray-400">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <path d="M11 21l-1 -4l-2 -3v-6" />
                <path d="M5 14l-1 -3l4 -3l3 2l3 .5" />
                <path d="M8 4m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                <path d="M7 17l-2 4" />
                <path d="M16 21v-8.5a1.5 1.5 0 0 1 3 0v.5" />
            </svg>
            <a href="#" onclick="displaySenioreresident()" class="text-sm font-medium text-gray-700 focus:outline-none focus:text-blue-600 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white ml-1 sm:ml-2">Senior Resident</a>
        </li>
    </ol>
</nav>
<div id="Allresidenttbl">
    <?php include '../Backend/AdminTables/residenttable.php'; ?>
</div>
<script>
$(document).ready(function() {
    var currentUrl = window.location.href;
    var pathToTable = currentUrl.substring(0, currentUrl.lastIndexOf('/')) + '../Backend/AdminTables/residenttable.php';
    
    $.ajax({
        url: pathToTable,
        type: 'POST',
        data: {page: 1},
        success: function(response) {
            $('#Allresidenttbl').html(response);
        },
        error: function() {
            alert('Error loading data');
        }
    });
    
    $(document).on('click', '.pagination-btn', function() {
        var page = $(this).data('page');
        $.ajax({
            url: pathToTable,
            type: 'POST',
            data: {page: page},
            success: function(response) {
                $('#Allresidenttbl').html(response);
            },
            error: function() {
                alert('Error loading data');
            }
        });
    });
});


</script>

         <div id="Maleresidenttbl" class="hidden"> 
         <?php include '../Backend/AdminTables/ResidentMaletbl.php'; ?>
         </div>
         <div id="Femaleresidenttbl" class="hidden"> 
         <?php include '../Backend/AdminTables/ResidentFemaletbl.php'; ?>
         </div>
         <div id="Seniorresidenttbl" class="hidden"> 
         <?php include '../Backend/AdminTables/Seniortbl.php'; ?>
         </div>
                </div>
            </div>
        </div>
    </div>
</div>





<!-- List of Requested Documents -------------------------------------------------------------------------------------------------------------->
<div id="showRequestedDocuments" style="display: none;" class="absolute bg-gray-50 inset-0 overflow-y-auto lg:ml-64 mt-16">
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
                     <button onclick="Request_Archive.showModal()" class="mt-3 w-full relative text-white border-2 rounded-lg border-gray-200  bg-green-400 dark:bg-gray-800 dark:border-gray-700 hover:bg-green-500  font-semibold py-2 px-4">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="white"class="w-5 h-5 inline-block align-middle text-white">
                 <path stroke-linecap="round" stroke-linejoin="round" d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
                </svg>
                 Document Request Archive
                  </button>
                 </div>
                 <dialog id="Request_Archive" class="modal p-3">
                 <div class="modal-box w-full h-full max-w-6xl rounded-none">
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
         <?php include '../Backend/AdminTables/Docreleasedtbl.php'; ?>
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
  <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
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
                        <?php include '../Backend/AdminTables/PendingRequesttbl.php'; ?>
                           </div>

                           <div id="Onprocessrequesttable" class="hidden"> 
                           <?php include '../Backend/AdminTables/Onprocesstbl.php'; ?>
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
<?php include '../Backend/AdminTables/Setscheduletbl.php'; ?>
</div>

<div id="showfuturechedule" class="hidden">  
<?php include '../Backend/AdminTables/futurescheduletbl.php'; ?>
</div>

<div id="showtodayschedule" class="hidden">  
<?php include '../Backend/AdminTables/Todaysscheduletbl.php'; ?>
</div>

<div id="showoverduechedule" class="hidden">  
<?php include '../Backend/AdminTables/Overduetbl.php'; ?>
</div>
</div>
                           </div>
                    </div>
                </div>
            </div>
        </div>
    

<!-- Blotter report---------------------------------------------------------------------------------------------------------------->
<div id="ManageBlotterReports" style="display: none;" class="absolute bg-gray-50 inset-0 overflow-y-auto lg:ml-64 mt-16">
<div class="pt-3 px-4 mb-4">
            <div class="flex flex-col">
                <div class="overflow-y-auto rounded-lg ">
                <div class="bg-white h-full shadow rounded-lg p-4  sm:p-6 xl:p-8 xl:gap-4 my-4">
                        <div class="mb-4 flex flex-col lg:flex-row items-center justify-between">
                        <div class="mb-4 lg:mb-0 flex justify-center lg:justify-start">
    <div class="text-center lg:text-left">
        <h3 class="text-xl font-bold text-gray-900 mb-2">Manage Blotter Report</h3>
        <span class="text-base font-normal text-gray-500">This is a list of Residents Complaint Report</span>
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
                     <button onclick="Blotter_Archive.showModal()" class="mt-3 w-full relative text-white rounded-lg border-2 border-gray-200  bg-green-400 dark:bg-gray-800 dark:border-gray-700 hover:bg-green-500  font-semibold py-2 px-4">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="white"class="w-5 h-5 inline-block align-middle text-white">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v17.25m0 0c-1.472 0-2.882.265-4.185.75M12 20.25c1.472 0 2.882.265 4.185.75M18.75 4.97A48.416 48.416 0 0 0 12 4.5c-2.291 0-4.545.16-6.75.47m13.5 0c1.01.143 2.01.317 3 .52m-3-.52 2.62 10.726c.122.499-.106 1.028-.589 1.202a5.988 5.988 0 0 1-2.031.352 5.988 5.988 0 0 1-2.031-.352c-.483-.174-.711-.703-.59-1.202L18.75 4.971Zm-16.5.52c.99-.203 1.99-.377 3-.52m0 0 2.62 10.726c.122.499-.106 1.028-.589 1.202a5.989 5.989 0 0 1-2.031.352 5.989 5.989 0 0 1-2.031-.352c-.483-.174-.711-.703-.59-1.202L5.25 4.971Z" />
                  </svg>
                  View Setteled Blotter
                  </button>
                 </div>
                 <dialog id="Blotter_Archive" class="modal p-3">
                 <div class="modal-box w-full h-full max-w-6xl rounded-none">
        <div class="flex flex-col">
            <div class="overflow-x-auto rounded-lg">
                <div class="mb-2 lg:mb-0">
                    <h3 class="text-2xl font-bold text-blue-400 text-center">BRGY-409 Document Request Management System</h3>
                    <span class="flex text-base font-medium text-blue-400 justify-center text-center">List of Blotter Archive</span>
                </div>
                <form method="dialog">
          <button  class="btn btn-sm btn-circle btn-ghost absolute top-2 right-2">
          ✕
        </button>
         </form>
         <?php include '../Backend/AdminTables/Setteledblootertbl.php'; ?>
            </div>
                </div>
                     </div>
                    </dialog>
                            </div>
                        </div>

                        <div class="flex justify-center">
                            <div class="flex mt-4 lg:mt-3 space-x-2">
                            <?php
if (!empty($_SESSION["AdminID"])) {
    $ID = $_SESSION["AdminID"];
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT COUNT(*) AS pending_countblotter FROM complaintbl WHERE ComplainStatus='Pending'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $totalCount = $row["pending_countblotter"];
    } else {
        echo "Error retrieving data from the database.";
    }
    $conn->close();
}
?>
                  <button  onclick="showPendingComplaint()" class="relative text-gray-600 border-2 border-gray-200 focus:outline-none focus:bg-gray-100 rounded-lg bg-gray-50 dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-100  font-semibold py-2 px-4">
                  <span class="absolute bg-red-400 text-white text-xs rounded-full -top-1 -left-1 px-2 py-1"><?=  $totalCount ?></span>
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="gray" class="w-5 h-5 inline-block align-middle text-white">
  <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
</svg>
Pending Complaint Case
</button>
<?php
if (!empty($_SESSION["AdminID"])) {
    $ID = $_SESSION["AdminID"];
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT COUNT(*) AS pending_countblotter FROM complaintbl WHERE ComplainStatus='On-Process'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $totalonprocessCount = $row["pending_countblotter"];
    } else {
        echo "Error retrieving data from the database.";
    }
    $conn->close();
}
?>
                  <button  onclick="showonprocessComplaint()" class="relative text-gray-600 border-2 border-gray-200 focus:outline-none focus:bg-gray-100 rounded-lg bg-gray-50 dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-100  font-semibold py-2 px-4">
                  <span class="absolute bg-red-400 text-white text-xs rounded-full -top-1 -left-1 px-2 py-1"><?=  $totalonprocessCount ?></span>
<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="gray" class="w-5 h-5 inline-block align-middle text-white">
 <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
</svg>
On-Process Complaint Case
</button>
<?php
if (!empty($_SESSION["AdminID"])) {
    $ID = $_SESSION["AdminID"];
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT COUNT(*) AS onschedule_count FROM complaintbl WHERE ComplainStatus='On-Schedule'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $totalCouncompleted = $row["onschedule_count"];
    } else {
        echo "Error retrieving data from the database.";
    }
    $conn->close();
}
?>
<button onclick="showOnscheduleComplaint()" class="relative text-gray-600 border-2 border-gray-200 rounded-lg bg-gray-50 focus:outline-none focus:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-100  font-semibold py-2 px-4">
  <span class="absolute bg-red-400 text-white text-xs rounded-full -top-1 -left-1 px-2 py-1"><?= $totalCouncompleted ?></span>
  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="gray" class="w-5 h-5 inline-block align-middle text-gray-700">
    <path stroke-linecap="round" stroke-linejoin="round" d="M11.35 3.836c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m8.9-4.414c.376.023.75.05 1.124.08 1.131.094 1.976 1.057 1.976 2.192V16.5A2.25 2.25 0 0 1 18 18.75h-2.25m-7.5-10.5H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V18.75m-7.5-10.5h6.375c.621 0 1.125.504 1.125 1.125v9.375m-8.25-3 1.5 1.5 3-3.75" />
  </svg>
  On-Schedule Complaint Case
</button>

</div>
</div>
        <div class="flex flex-col mt-4">
         <div class="overflow-x-auto rounded-lg">
            <div class="align-middle inline-block min-w-full">
               <div class="shadow overflow-hidden sm:rounded-lg">
                
            <div id="PendingBlottertable"> 
            <?php include '../Backend/AdminTables/PendingBlottertbl.php'; ?>
               </div>
               <div id="OnprocessBlotter" class="hidden"> 
               <?php include '../Backend/AdminTables/OnprocessBlottertbl.php'; ?>
               </div>
               <script>
               document.getElementById('printblotterdocument-btn').addEventListener('click', function() {
        var newTab = window.open('', '_blank');
        if (newTab) {
            var clonedForm = document.getElementById('printblotterdocsform').cloneNode(true);
            newTab.document.body.appendChild(clonedForm);
            clonedForm.submit();
        } else {
            alert('Unable to open a new tab. Please enable pop-ups for this site.');
        }
    });
               </script>
               <div id="CompleteBlottertable" class="hidden"> 

               <nav class="flex space-x-8 justify-center px-5 py-3  text-gray-700 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-800 dark:border-gray-700" aria-label="Breadcrumb">
    <ol class="inline-flex items-end space-x-4 md:space-x-6 rtl:space-x-reverse">
        <li class="inline-flex items-center">
            <a href="#" onclick="showsetBlotterschedule()" class="inline-flex items-center text-sm font-medium text-gray-700 focus:outline-none focus:text-blue-600 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white" >
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
                <a href="#" onclick="showfutureBlotterschedule()" class="text-sm font-medium text-gray-700 focus:outline-none focus:text-blue-600 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white" >View Future's Schedule</a>
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
                <a href="#" onclick="showblottertoday()" class="text-sm font-medium text-gray-700 focus:outline-none focus:text-blue-600 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white" >View Today's Schedule</a>
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
                <a href="#" onclick="showblotteroverdue()"  class="ms-1 text-sm font-medium text-gray-700 focus:outline-none focus:text-blue-600 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white" >View Over Due</a>
            </div>
        </li>
    </ol>
</nav>
               <div id="BlotterSetschedule" class="mt-3">
               <?php include '../Backend/AdminTables/CompleteBlottertbl.php'; ?>
                </div>

                <div id="BlotterFutureSchedule" class="hidden mt-3">
               <?php include '../Backend/AdminTables/ComFutureSchedBlottertbl.php'; ?>
                </div>
                
                <div id="TodaysScheduleBlotter" class="hidden mt-3">
               <?php include '../Backend/AdminTables/ComTodaysschedBlottertbl.php'; ?>
                </div>
                
                <div id="OverdueScheduleBlotter" class="hidden mt-3">
               <?php include '../Backend/AdminTables/ComOverduewBlottertbl.php'; ?>
                </div>


            </div>
            </div>
         </div>
      </div>
</div>
</div>
</div>
</div>
</div>
</div> 

<!-- List of publsih news -------------------------------------------------------------------------------------------------------------->
<div  id="showpublicNews"  style="display: none;" class="absolute bg-gray-50 inset-0 overflow-y-auto lg:ml-64 mt-16">
   <div class="pt-3 px-4">
      <div class="bg-white h-full  shadow rounded-lg p-4 sm:p-6 xl:p-8  xl:gap-4 my-4">
      <div class="mb-4 flex flex-col lg:flex-row items-center justify-between">
             <div class="mb-4 lg:mb-0">
             <h3 class="text-xl font-bold text-gray-900 mb-2">Manage News and Updates</h3>
                 <span class="text-base font-normal text-gray-500">This is a list Current News and Announcements</span>
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
                         <input type="text" name="email" id="topbar-search" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full pl-10 p-2.5" placeholder="Search Announcement">
                     </div>
                 </form>
                  <div class="lg:flex lg:items-center lg:pl-32">
                 <button class="mt-2 w-full relative text-white border-2 border-gray-200  rounded-lg bg-green-400 dark:bg-gray-800 dark:border-gray-700 hover:bg-green-500  font-semibold py-2 px-4" onclick="publish_news.showModal()">
                 <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="white" class="w-5 h-5 mr-2 inline-block align-middle text-white">
   <path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 0 1-2.25 2.25M16.5 7.5V18a2.25 2.25 0 0 0 2.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 0 0 2.25 2.25h13.5M6 7.5h3v3H6v-3Z" />
 </svg>
Add News/Announcement
            </button>


            <dialog id="publish_news" class="modal p-3">
    <div class="modal-box w-full max-w-6xl rounded-none">
        <div class="flex flex-col">
            <div class="overflow-x-auto rounded-lg">
                <div class="mb-2 lg:mb-0">
                    <h3 class="text-2xl font-bold text-blue-400 text-center">BRGY-409 Document Request Management System</h3>
                    <span class="flex text-base font-medium text-blue-400 justify-center text-center">Publish News and Announcements</span>
                </div>
                <form method="dialog">
          <button  class="btn btn-sm btn-circle btn-ghost absolute top-2 right-2">
          ✕
        </button>
</form>
<form id="newsinsertform" action="../Backend/Insert.php"  method="post" enctype="multipart/form-data">
    <div class="mt-4 px-4 py-3 sm:px-6 md:px-8 lg:px-10 flex flex-col md:flex-row gap-4">
        <!-- Left side inputs -->
        <div class="flex-1 flex flex-col">
            <div class="flex flex-col items-center justify-center w-full h-full">
                <div class="text-lg font-bold text-center">
                    <h2>News Thumbnails</h2>
                    <p class="text-xs text-gray-500 dark:text-gray-400 mb-2">SVG, PNG, JPG, or GIF (MAX. 800x400px)</p>
                </div>
                <label for="NewsImage" class="flex flex-col items-center justify-center w-full h-full p-2 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600"
                    style="background-image: url('<?php echo isset($row["NewsImages"]) && !empty($row["NewsImages"]) ? "../Backend/uploads/" . $row["NewsImages"] : ""; ?>'); background-size: cover; background-position: center;">
                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                        <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                        </svg>
                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                    </div>
                    <input type="file" name="NewsImage" id="NewsImage" accept=".jpg, .png, .jpeg, .pdf, .doc, .docx" class="hidden" onchange="displayImage(this, 'front')" />
                </label>
            </div>
        </div>
        <!-- Right side input -->
        <div class="flex-1 flex flex-col">
            <span class="block text-sm font-semibold leading-6 text-gray-900">News Title</span>
            <input type="text" name="NewsTitle" placeholder="Enter News Title" class="input input-bordered focus:outline-none focus:ring-1 focus:border-blue-500 input-white w-full bg-white text-slate-900" required />

            <div class="mt-3 flex flex-col sm:flex-row gap-x-6">
                <div class="sm:flex-1">
                    <label for="NewsDate" class="block text-sm font-semibold leading-6 text-gray-900">News Date</label>
                    <div>
                        <input required type="date" name="NewsDate" id="NewsDate" autocomplete="Address" placeholder="Enter Address" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 flex-1">
                    </div>
                </div>
                <div class="sm:flex-1">
                    <label for="NewsTime" class="block text-sm font-semibold leading-6 text-gray-900">News Time</label>
                    <div>
                        <input required type="time" name="NewsTime" id="NewsTime" autocomplete="Zip-Code" placeholder="Enter City Zip Code Ex. 1008" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 flex-1">
                    </div>
                </div>
            </div>
            <span class="block text-sm font-semibold leading-6 text-gray-900 mt-3">News Content</span>
            <textarea name="NewsContent" rows="6" class="rounded-lg border-gray-200 w-full h-64 pt-2 text-gray-900 border-1 bg-white input input-bordered focus:outline-none focus:ring-1 focus:border-blue-500 resize-none" placeholder="Enter News Content....." required></textarea>
        </div>
    </div>
    </form>
    <div class="modal-action flex justify-center items-center">
        <button id="btnSubmitnews" class="btn bg-green-500 hover:bg-green-700 text-md text-white">Publish News | Announcements</button>
    </div>

<script>
$(function() {
    $('#btnSubmitnews').click(function(e) {
        e.preventDefault();
        var valid = $('#newsinsertform')[0].checkValidity();
        if (valid) {
            var formData = new FormData($('#newsinsertform')[0]);
            $.ajax({
                type: 'POST',
                url: '../Backend/Insert.php',
                data: formData,
                processData: false,
                contentType: false,
                success: function(data) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: data,
                    }).then(function() {
                        // Show personal profile
                        window.location.reload(); // Reload the page
                    });
                },
                error: function(data) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'There were errors while saving the data.',
                    });
                },
            });
        } else {
            // Handle invalid form data here
        }
    });
});
document.getElementById('btnSubmitnews').addEventListener('click', function() {
    var dialog = document.getElementById('publish_news');
    dialog.close();
});
function displayImage(input, side) {
        const file = input.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const label = input.parentElement;
                label.style.backgroundImage = `url('${e.target.result}')`;
            }
            reader.readAsDataURL(file);
        }
    }
</script>
            </div>
        </div>
    </div>

</dialog>

            </div>
             </div>
         </div>
         <div class="flex flex-col mt-8">
         <div class="overflow-x-auto rounded-lg">
            <div class="align-middle inline-block min-w-full">
               <div class="shadow overflow-hidden sm:rounded-lg">
               <?php include '../Backend/AdminTables/Newstbl.php'; ?>
               </div>
            </div>
         </div>
      </div>
     </div>
   </div>
</div>
</div>

<!-- Barangay Officials -------------------------------------------------------------------------------------------------------------->
<div  id="showBrgyOfficials"  style="display: none;" class="absolute bg-gray-50 inset-0 overflow-y-auto lg:ml-64 mt-16">
   <div class="pt-3 px-4">
      <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8  xl:gap-4 my-4">
      <div class="mb-4 flex flex-col lg:flex-row items-center justify-between">
      <div class="mb-4 lg:mb-0">
             <h3 class="text-xl font-bold text-gray-900 mb-2">BARANGAY-409 OFFICIALS</h3>
                 <span class="text-base font-normal text-gray-500">Manage Officials Information</span>
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
                         <input type="text" name="email" id="topbar-search" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full pl-10 p-2.5" placeholder="Search Officials">
                     </div>
                 </form>
                  <div class="lg:flex lg:items-center lg:pl-32">
                  <button onclick="addadminnistrator.showModal()" class="mt-2 w-full relative round-md text-white border-2 border-gray-200 rounded-lg bg-green-400 dark:bg-gray-800 dark:border-gray-700 hover:bg-green-500  font-semibold py-2 px-4">
<svg xmlns="http://www.w3.org/2000/svg"  fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="white" class="w-5 h-5 mr-1 inline-block align-middle text-white">
  <path stroke-linecap="round" stroke-linejoin="round" d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z" />
</svg>
Add Officials
</button>
            </div>
             </div>
         </div>
         <div class="flex flex-col mt-8">
         <div class="overflow-x-auto rounded-lg">
            <div class="align-middle inline-block min-w-full">
               <div class="shadow overflow-hidden sm:rounded-lg">
               <?php include '../Backend/AdminTables/Officialstbl.php'; ?>
               </div>
            </div>
         </div>
      </div>
     </div>
   </div>
</div>
</div>

<!-- Message -------------------------------------------------------------------------------------------------------------->
<div  id="showMessage"  style="display: none;" class="absolute bg-gray-50 inset-0 overflow-y-auto lg:ml-64 mt-16">
   <div class="pt-3 px-4">
      <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8  xl:gap-4 my-4">
        <div class="mb-4 flex flex-col lg:flex-row items-center justify-between">
               <div class="mb-4 lg:mb-0">
                   <h3 class="text-xl font-bold text-gray-900 mb-2">Message</h3>
                   <span class="text-base font-normal text-gray-500">BRGY. 409, Chat System</span>
               </div>
           </div>
        <div class="flex flex-col mt-8">
           <div class="overflow-x-auto rounded-lg">
              <div class="align-middle inline-block min-w-full">
                 <div class="shadow overflow-hidden sm:rounded-lg">
                 </div>
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
 <script src="../javascript/Crudajax.js"></script>
 <script src="../javascript/Pagination.js"></script>



</body>
</html>