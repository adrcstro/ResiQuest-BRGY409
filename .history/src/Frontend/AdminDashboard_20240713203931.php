<?php include 'Sessiondetails.php'; ?>
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
                         <a href="AdminDashboard.php" class="text-base text-gray-900 font-normal rounded-lg flex items-center p-2 hover:bg-gray-100 group" >
                           <svg class="w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75"  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" className="w-6 h-6">
                              <path strokeLinecap="round" strokeLinejoin="round" d="M10.5 6a7.5 7.5 0 1 0 7.5 7.5h-7.5V6Z" />
                              <path strokeLinecap="round" strokeLinejoin="round" d="M13.5 10.5H21A7.5 7.5 0 0 0 13.5 3v7.5Z" />
                            </svg>
                            
                            <span class="ml-3">Dashboard</span>
                         </a>
                      </li>
                      <li>
                         <a href="Residentrecord.php"  class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 flex items-center p-2 group " >
                           <svg class="w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75"  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" className="w-6 h-6">
                              <path strokeLinecap="round" strokeLinejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                            </svg>
                            <span class="ml-3 flex-1 whitespace-nowrap">Resident Record</span>
                         </a>
                      </li>
                      <li>
                         <a href="DocumentRequest.php"  class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 flex items-center p-2 group" >
                           <svg class="w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" className="w-6 h-6">
                              <path strokeLinecap="round" strokeLinejoin="round" d="M15.75 17.25v3.375c0 .621-.504 1.125-1.125 1.125h-9.75a1.125 1.125 0 0 1-1.125-1.125V7.875c0-.621.504-1.125 1.125-1.125H6.75a9.06 9.06 0 0 1 1.5.124m7.5 10.376h3.375c.621 0 1.125-.504 1.125-1.125V11.25c0-4.46-3.243-8.161-7.5-8.876a9.06 9.06 0 0 0-1.5-.124H9.375c-.621 0-1.125.504-1.125 1.125v3.5m7.5 10.375H9.375a1.125 1.125 0 0 1-1.125-1.125v-9.25m12 6.625v-1.875a3.375 3.375 0 0 0-3.375-3.375h-1.5a1.125 1.125 0 0 1-1.125-1.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H9.75" />
                            </svg>
                            <span class="ml-3 flex-1 whitespace-nowrap">Requested Documents</span>
                         </a>
                      </li>

                      <li>
                         <a href="BlotterReport.php"  class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 flex items-center p-2 group" onclick="showBlotterreport()">
                         <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75">
                         <path stroke-linecap="round" stroke-linejoin="round" d="M3 3v1.5M3 21v-6m0 0 2.77-.693a9 9 0 0 1 6.208.682l.108.054a9 9 0 0 0 6.086.71l3.114-.732a48.524 48.524 0 0 1-.005-10.499l-3.11.732a9 9 0 0 1-6.085-.711l-.108-.054a9 9 0 0 0-6.208-.682L3 4.5M3 15V4.5" />
                         </svg>
                            <span class="ml-3 flex-1 whitespace-nowrap">Blotter Report</span>
                         </a>
                      </li>


                      <li>
                         <a href="PublishNews.php" class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 flex items-center p-2 group" onclick="showpublicnews()">
                           <svg  class="w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" className="w-6 h-6">
                              <path strokeLinecap="round" strokeLinejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 0 1-2.25 2.25M16.5 7.5V18a2.25 2.25 0 0 0 2.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 0 0 2.25 2.25h13.5M6 7.5h3v3H6v-3Z" />
                            </svg>
                            
                            <span class="ml-3 flex-1 whitespace-nowrap">Publish News</span>
                         </a>
                      </li>
                      
                      <li id="superadminonlyaccess">
                         <a href="BrgyOfficials.php" class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 flex items-center p-2 group" onclick="showofficials()">
                           <svg class="w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" className="w-6 h-6">
                              <path strokeLinecap="round" strokeLinejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                            </svg>
                            <span class="ml-3 flex-1 whitespace-nowrap">Manage Administrator</span>
                         </a>
                      </li>
                      <li>
                         <a href="Message.php" class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 flex items-center p-2 group" onclick="showMessage()">
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
    
<div class="flex justify-end align-end"> 
     <button onclick="Admin_printanalytics.showModal()" class="mt-3  relative text-white border-2 rounded-lg border-gray-200  bg-green-400 dark:bg-gray-800 dark:border-gray-700 hover:bg-green-500  font-semibold py-2 px-4">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="white"class="w-5 h-5 inline-block align-middle text-white">
  <path stroke-linecap="round" stroke-linejoin="round" d="M6.72 13.829c-.24.03-.48.062-.72.096m.72-.096a42.415 42.415 0 0 1 10.56 0m-10.56 0L6.34 18m10.94-4.171c.24.03.48.062.72.096m-.72-.096L17.66 18m0 0 .229 2.523a1.125 1.125 0 0 1-1.12 1.227H7.231c-.662 0-1.18-.568-1.12-1.227L6.34 18m11.318 0h1.091A2.25 2.25 0 0 0 21 15.75V9.456c0-1.081-.768-2.015-1.837-2.175a48.055 48.055 0 0 0-1.913-.247M6.34 18H5.25A2.25 2.25 0 0 1 3 15.75V9.456c0-1.081.768-2.015 1.837-2.175a48.041 48.041 0 0 1 1.913-.247m10.5 0a48.536 48.536 0 0 0-10.5 0m10.5 0V3.375c0-.621-.504-1.125-1.125-1.125h-8.25c-.621 0-1.125.504-1.125 1.125v3.659M18 10.5h.008v.008H18V10.5Zm-3 0h.008v.008H15V10.5Z" />
</svg>
 View Monthly Service
</button>
</div>

<dialog id="Admin_printanalytics" class="modal p-3">
    <div class="modal-box w-full h-full max-w-6xl rounded-none">
        <div class="flex flex-col">
            <div class="overflow-x-auto rounded-lg">
                <div class="mb-2 lg:mb-0 text-center">
                    <h3 class="text-2xl font-bold text-blue-400">BRGY-409 Document Request Management System</h3>
                    <span class="text-base font-medium text-blue-400">Print Document And Complaint Chart Data</span>
                </div>
                <form method="dialog">
                    <button class="btn btn-sm btn-circle btn-ghost absolute top-2 right-2">✕</button>
                </form>
                <div class="flex flex-col items-center mt-4">
                    <div class="w-full flex items-center justify-center mb-4">
                        <img src="/Images/residencyt.svg" alt="Illustration" class="w-1/2 h-auto md:w-1/4">
                    </div>
                    
                    <div class="w-full flex flex-col items-center justify-center">
                        <div class="mt-3 flex flex-col sm:flex-col gap-y-6">
                            <div class="flex flex-row items-center justify-center gap-x-6 mb-6">
                                <div class="flex items-center border border-gray-200 rounded dark:border-gray-700 w-64 lg:w-72">
                                    <input id="bordered-radio-1" type="radio" value="" name="bordered-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="bordered-radio-1" class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Default radio</label>
                                </div>
                                <div class="flex items-center border border-gray-200 rounded dark:border-gray-700 w-64 lg:w-72">
                                    <input checked id="bordered-radio-2" type="radio" value="" name="bordered-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="bordered-radio-2" class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Checked state</label>
                                </div>
                            </div>
                            
                            <div class="flex flex-col sm:flex-row gap-x-4">
                                <div class="sm:flex-1">
                                    <label for="SelectYear" class="block text-sm text-center font-semibold leading-6 text-gray-900">Select Year</label>
                                    <select required id="SelectYear" name="SelectYear" autocomplete="family-name" placeholder="Select Year" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 lg:w-64 xl:w-72">
                                    </select>

                                    <script>
                                        const selectYear = document.getElementById('SelectYear');
                                        const startYear = 2024;
                                        const endYear = new Date().getFullYear() + 50; // Example: current year + 50

                                        for (let year = startYear; year <= endYear; year++) {
                                            const option = document.createElement('option');
                                            option.value = year;
                                            option.textContent = year;
                                            selectYear.appendChild(option);
                                        }
                                    </script>
                                </div>
                                <div class="sm:flex-1">
                                    <label for="SelectMonth" class="block text-sm font-semibold leading-6 text-gray-900">Select Month</label>
                                    <select required id="SelectMonth" name="SelectMonth" autocomplete="family-name" placeholder="Select Month" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 lg:w-64 xl:w-72">
                                    </select>

                                    <script>
                                        const selectMonth = document.getElementById('SelectMonth');
                                        const months = [
                                            "January", "February", "March", "April", "May", "June",
                                            "July", "August", "September", "October", "November", "December"
                                        ];

                                        months.forEach((month, index) => {
                                            const option = document.createElement('option');
                                            option.value = index + 1; // month number (1-12)
                                            option.textContent = month;
                                            selectMonth.appendChild(option);
                                        });
                                    </script>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="mt-3 flex justify-center align-center"> 
                        <button onclick="Admin_printanalytics.showModal()" class="mt-3  relative text-white border-2 rounded-lg border-gray-200  bg-green-400 dark:bg-gray-800 dark:border-gray-700 hover:bg-green-500  font-semibold py-2 px-4">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="white"class="w-5 h-5 inline-block align-middle text-white">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.72 13.829c-.24.03-.48.062-.72.096m.72-.096a42.415 42.415 0 0 1 10.56 0m-10.56 0L6.34 18m10.94-4.171c.24.03.48.062.72.096m-.72-.096L17.66 18m0 0 .229 2.523a1.125 1.125 0 0 1-1.12 1.227H7.231c-.662 0-1.18-.568-1.12-1.227L6.34 18m11.318 0h1.091A2.25 2.25 0 0 0 21 15.75V9.456c0-1.081-.768-2.015-1.837-2.175a48.055 48.055 0 0 0-1.913-.247M6.34 18H5.25A2.25 2.25 0 0 1 3 15.75V9.456c0-1.081.768-2.015 1.837-2.175a48.041 48.041 0 0 1 1.913-.247m10.5 0a48.536 48.536 0 0 0-10.5 0m10.5 0V3.375c0-.621-.504-1.125-1.125-1.125h-8.25c-.621 0-1.125.504-1.125 1.125v3.659M18 10.5h.008v.008H18V10.5Zm-3 0h.008v.008H15V10.5Z" />
                            </svg>
                            Print Data
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</dialog>





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
    <li class="flex items-center mr-4 md:mr-6">
      <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-500 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25ZM6.75 12h.008v.008H6.75V12Zm0 3h.008v.008H6.75V15Zm0 3h.008v.008H6.75V18Z" />
</svg>
      <a href="#" onclick="privacyPolicyModal.showModal()"  class="text-sm font-normal text-gray-500 hover:underline">Terms Conditions & Privacy Policy</a>
    </li>
   
    <li class="flex items-center mr-4 md:mr-6">
    <svg class="w-5 h-5 text-gray-500 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" />
                   </svg>
      <a href="https://www.facebook.com/Barangay409" class="text-sm font-normal text-gray-500 hover:underline" target="_blank">Facebook Page</a>
    </li>
  </ul>

  <dialog id="privacyPolicyModal" class="modal">
<div class="modal-box w-100 h-full max-w-6xl rounded-lg">
  <form method="dialog">
    <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
  </form>
           <h2 class="text-2xl font-bold mb-4">Terms Conditions & Privacy Policy</h2>
              <p class="mb-4">This Privacy Policy describes how we collect, use, and disclose information that we obtain through our website and services.</p>
              <h3 class="text-lg font-semibold mb-2">Information We Collect</h3>
              <p>We may collect the following types of information:</p>
              <ul class="list-disc ml-6 mb-4">
                <li>Personal Information: We may collect your name, email address, and other personal information when you provide it to us.</li>
                <li>Usage Information: We may collect information about your usage of our website and services, such as the pages you visit and your interactions with our content.</li>
              </ul>
              <h3 class="text-lg font-semibold mb-2">How We Use Your Information</h3>
              <p>We may use your information for various purposes, including:</p>
              <ul class="list-disc ml-6 mb-4">
                <li>Providing our services to you</li>
                <li>Sending you updates and information about our products and services</li>
                <li>Improving our website and services</li>
              </ul>
              <h3 class="text-lg font-semibold mb-2">Disclosure of Your Information</h3>
              <p>We may disclose your information to third parties in certain circumstances, including:</p>
              <ul class="list-disc ml-6 mb-4">
                <li>With your consent</li>
                <li>When required by law</li>
                <li>With service providers and partners who assist us in delivering our services</li>
              </ul>
              <h3 class="text-lg font-semibold mb-2">Security</h3>
              <p>We take reasonable measures to protect your information, but no method of transmission over the internet is 100% secure. We cannot guarantee the security of your information.</p>
              <h3 class="text-lg font-semibold mb-2">Changes to this Privacy Policy</h3>
              <p>We may update this Privacy Policy from time to time. Any changes will be posted on our website. By continuing to use our services, you agree to the updated Privacy Policy.</p>
           
           
</dialog>


          </footer>
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