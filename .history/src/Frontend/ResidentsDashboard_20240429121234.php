<?php
require '../Backend/Connection.php';
    if(!empty($_SESSION["ID"])){
$ID = $_SESSION["ID"];
$result = mysqli_query($conn, "SELECT * FROM users WHERE ID = $ID");
$row = mysqli_fetch_assoc($result);

    }else{
      header("Location: Login.php");

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

        <button type="button" class="relative rounded-full  p-1 text-gray-400 text-gray-500focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2">
          <span class="absolute -inset-1.5"></span>
          <span class="sr-only">View notifications</span>
          <svg class="w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
          </svg>
        </button>

        <!-- Profile dropdown -->
        <div class="relative ml-3">
         <div>
             <button type="button"
                     class="relative flex rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                     id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                 <span class="absolute -inset-1.5"></span>
                 <span class="sr-only">Open user menu</span>
                      <?php if(isset($row["Profile"]) && !empty($row["Profile"])): ?>
        <img src="../Backend/uploads/<?php echo $row["Profile"]; ?>" class="h-8 w-8 rounded-full" alt="Profile Picture">
    <?php else: ?>
        <img src="/Images/blank.png" class="h-8 w-8 rounded-full" alt="Default Profile Picture">
    <?php endif; ?>
             </button>
         </div>
         <div id="user-menu"
              class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none hidden"
              role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
             <!-- Active: "bg-gray-100", Not Active: "" -->
             <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1"
                id="user-menu-item-0">Your Profile</a>
             <a href="logout.php" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1"
                id="user-menu-item-2">Sign out</a>
         </div>
     
     </div>
     
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
                         <a href="#" class="text-base text-gray-900 font-normal rounded-lg flex items-center p-2 hover:bg-gray-100 group" onclick="showResidetsDashboard()">
                           <svg class="w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75"  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" className="w-6 h-6">
                              <path strokeLinecap="round" strokeLinejoin="round" d="M10.5 6a7.5 7.5 0 1 0 7.5 7.5h-7.5V6Z" />
                              <path strokeLinecap="round" strokeLinejoin="round" d="M13.5 10.5H21A7.5 7.5 0 0 0 13.5 3v7.5Z" />
                            </svg>
                            
                            <span class="ml-3">Dashboard</span>
                         </a>
                      </li>
                      <li>
                         <a href="#"  class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 flex items-center p-2 group " onclick="showPersonalProfile()">
                           <svg class="w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75"  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" className="w-6 h-6">
                              <path strokeLinecap="round" strokeLinejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                            </svg>
                            
                            
                            <span class="ml-3 flex-1 whitespace-nowrap">Personal Profile</span>
                           
                         </a>
                      </li>
                      <li>
                         <a href="#"  class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 flex items-center p-2 group" onclick="showDocumentRequested()">
                           <svg class="w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" className="w-6 h-6">
                              <path strokeLinecap="round" strokeLinejoin="round" d="M15.75 17.25v3.375c0 .621-.504 1.125-1.125 1.125h-9.75a1.125 1.125 0 0 1-1.125-1.125V7.875c0-.621.504-1.125 1.125-1.125H6.75a9.06 9.06 0 0 1 1.5.124m7.5 10.376h3.375c.621 0 1.125-.504 1.125-1.125V11.25c0-4.46-3.243-8.161-7.5-8.876a9.06 9.06 0 0 0-1.5-.124H9.375c-.621 0-1.125.504-1.125 1.125v3.5m7.5 10.375H9.375a1.125 1.125 0 0 1-1.125-1.125v-9.25m12 6.625v-1.875a3.375 3.375 0 0 0-3.375-3.375h-1.5a1.125 1.125 0 0 1-1.125-1.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H9.75" />
                            </svg>
                            
                            <span class="ml-3 flex-1 whitespace-nowrap">Document Request</span>
                           
                         </a>
                      </li>
                      <li>
                         <a href="#" class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 flex items-center p-2 group" onclick="showNotification()">
                          <svg class="w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" className="w-6 h-6">
                            <path strokeLinecap="round" strokeLinejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
                          </svg>
                          
                            
                            <span class="ml-3 flex-1 whitespace-nowrap">Notification</span>
                         </a>
                      </li>
                      <li>
                         <a href="#" class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 flex items-center p-2 group" onclick="showResidentsbrgyOfficials()">
                           <svg class="w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" className="w-6 h-6">
                              <path strokeLinecap="round" strokeLinejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                            </svg>
                            
                            <span class="ml-3 flex-1 whitespace-nowrap">Barangay Officials</span>
                         </a>
                      </li>
                      <li>
                         <a href="#" class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 flex items-center p-2 group"  onclick="showResidentsMessage()">
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



      
      

     
<!-- Residents Record -------------------------------------------------------------------------------------------------------------->
<div class="bg-gray-900 opacity-50 hidden fixed inset-0 z-10" id="sidebarBackdrop"></div>
<div id="ResidentsDashboard" class="absolute bg-gray-50 inset-0 overflow-y-auto lg:ml-64 mt-16">
  <main>
     <div class="pt-6 px-4">
       
      <div class="mt-2 w-full grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
        <div class="bg-red-400 shadow rounded-lg p-4 sm:p-6 xl:p-8">
           <div class="flex items-center">
              <div class="flex-shrink-0">
                 <span class="text-2xl sm:text-3xl leading-none font-bold text-white">

                 <?php
if (!empty($_SESSION["ID"])) {
    // Retrieve the user's ID from the session
    $ID = $_SESSION["ID"];

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Query to get the count of rows in the requestdocument table with Pending status for the specified UserID
    $sql = "SELECT COUNT(*) AS total FROM requestdocument WHERE UserID = $ID AND Status = 'Pending'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Fetch the result
        $row = $result->fetch_assoc();
        $totalCount = $row["total"];

        // Display the count in the specified HTML element
        echo '<span class="h3 font-bold mb-0">' . $totalCount . '</span>';
    } else {
        echo "Error retrieving data from the database.";
    }

    // Close the database connection
    $conn->close();
}
?>







                 </span>
                 <h3 class="text-base font-medium text-white">Pending</h3>
              </div>
              <div class="ml-5 w-0 flex items-center justify-end flex-1 text-white text-base font-bold">
                <svg class="h-20 w-20" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" className="w-6 h-6">
                  <path strokeLinecap="round" strokeLinejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                
                 
              </div>
           </div>
        </div>
        <div class="bg-yellow-300 shadow rounded-lg p-4 sm:p-6 xl:p-8">
           <div class="flex items-center">
              <div class="flex-shrink-0">
                 <span class="text-2xl sm:text-3xl leading-none font-bold text-white">

                 <?php
if (!empty($_SESSION["ID"])) {
    // Retrieve the user's ID from the session
    $ID = $_SESSION["ID"];

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Query to get the count of rows in the requestdocument table with Pending status for the specified UserID
    $sql = "SELECT COUNT(*) AS total FROM requestdocument WHERE UserID = $ID AND Status = 'On-Process'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Fetch the result
        $row = $result->fetch_assoc();
        $totalCount = $row["total"];

        // Display the count in the specified HTML element
        echo '<span class="h3 font-bold mb-0">' . $totalCount . '</span>';
    } else {
        echo "Error retrieving data from the database.";
    }

    // Close the database connection
    $conn->close();
}
?>


                 </span>
                 <h3 class="text-base font-medium text-white">On-Process</h3>
              </div>
              <div class="ml-5 w-0 flex items-center justify-end flex-1 text-white text-base font-bold">
              
                <svg class="h-20 w-20"  fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" className="w-6 h-6">
                    <path stroke="none" d="M0 0h24v24H0z"/>  
                    <path d="M20 11a8.1 8.1 0 0 0 -15.5 -2m-.5 -5v5h5" />  <path d="M4 13a8.1 8.1 0 0 0 15.5 2m.5 5v-5h-5" />
                  </svg>
                 
              </div>
           </div>
        </div>
        <div class="bg-green-400 shadow rounded-lg p-4 sm:p-6 xl:p-8">
           <div class="flex items-center">
              <div class="flex-shrink-0">
                 <span class="text-2xl sm:text-3xl leading-none font-bold text-white">
                 <?php
if (!empty($_SESSION["ID"])) {
    // Retrieve the user's ID from the session
    $ID = $_SESSION["ID"];

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Query to get the count of rows in the requestdocument table with Pending status for the specified UserID
    $sql = "SELECT COUNT(*) AS total FROM requestdocument WHERE UserID = $ID AND Status = 'Completed'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Fetch the result
        $row = $result->fetch_assoc();
        $totalCount = $row["total"];

        // Display the count in the specified HTML element
        echo '<span class="h3 font-bold mb-0">' . $totalCount . '</span>';
    } else {
        echo "Error retrieving data from the database.";
    }

    // Close the database connection
    $conn->close();
}
?>

                 </span>
                 <h3 class="text-base font-medium text-white">Completed</h3>
              </div>
              <div class="ml-5 w-0 flex items-center justify-end flex-1 text-white text-base font-bold">
                <svg class="w-20 h-20" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" className="w-6 h-6">
                  <path strokeLinecap="round" strokeLinejoin="round" d="M10.125 2.25h-4.5c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125v-9M10.125 2.25h.375a9 9 0 0 1 9 9v.375M10.125 2.25A3.375 3.375 0 0 1 13.5 5.625v1.5c0 .621.504 1.125 1.125 1.125h1.5a3.375 3.375 0 0 1 3.375 3.375M9 15l2.25 2.25L15 12" />
                </svg>
              </div>
           </div>
        </div>



        
     </div>



     
     <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8  xl:gap-4 my-4">


      <div class="mb-4 flex flex-col lg:flex-row items-center justify-between">
             <div class="mb-4 lg:mb-0">
                 <h3 class="text-xl font-bold text-gray-900 mb-2">List of Requested Documents</h3>
                 <span class="text-base font-normal text-gray-500">This is a list of your Requested Documents</span>
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
         
                 <div class="flex justify-end mt-2 lg:mt-3 space-x-2">
                     <button class="bg-green-400 hover:bg-green-600 text-white font-bold py-2 px-4 rounded" onclick="ViewSchedule.showModal()"  >
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"class="w-5 h-5 inline-block align-middle text-white">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
                    </svg>
                          View Schedule
                     </button>
         
                     <button class="bg-green-400 hover:bg-green-600 text-white font-bold py-2 px-4 rounded" onclick="TransactionHistory.showModal()">
                     <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="white" class="w-5 h-5 inline-block align-middle text-white">
                        <path strokeLinecap="round" strokeLinejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                      </svg>
                         Transaction History
                     </button>
                 </div>
             </div>
         </div>



         <dialog id="ViewSchedule" class="modal p-3">
  <div class="modal-box w-full h-full max-w-6xl rounded-lg">
  
        <div class="mb-2 lg:mb-0">
            <h3 class="text-2xl font-bold text-blue-400 text-center">BRGY-409 Document Request Management System</h3>
            <span class="flex text-base font-medium text-blue-400 justify-center text-center">List of Completed Transactions</span>
        </div>
        <form method="dialog">
        <div class="mt-4 px-4 py-3 sm:px-6 flex align-items justify-center p-4 gap-4 flex-row">
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

// Check if the user is logged in
if(!empty($_SESSION["ID"])) {
    // Retrieve the user's ID from the session
    $ID = $_SESSION["ID"];

    // Prepare and execute the SQL query to fetch requests for the user
    $query = "SELECT RequestID, ServiceType, DateRequested, Status, PickUpDate 
              FROM requestdocument 
              WHERE UserID = $ID";
    $result = mysqli_query($conn, $query);

    // Check if there are any rows returned
    if(mysqli_num_rows($result) > 0) {
        // Output table header
        echo '<table class="min-w-full divide-y divide-gray-200 mt-3">
                <thead class="bg-gray-50">
                    <tr>
                    <th scope="col" class="p-4 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Request ID</th>
                    <th scope="col" class="p-4 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Service Type</th>
                    <th scope="col" class="p-4 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Date Requested</th>
                    <th scope="col" class="p-4 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    <th scope="col" class="p-4 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Date for Release</th>
                    <th scope="col" class="p-4 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Time for Release</th>
                    </tr>
                </thead>
                <tbody class="bg-white">';

        // Fetch and display each row
        while($row = mysqli_fetch_assoc($result)) {
          if ($row["Status"] == "Completed") {
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
                default:
                    $statusBgColor = ''; // No background color if status is not recognized
            }
            echo '<tr>';
            echo '<td class="p-1 border border-inherit text-center  whitespace-nowrap text-sm font-semibold text-gray-900">' . $row["RequestID"] . '</td>';
            echo '<td class="p-1 border border-inherit text-center  whitespace-nowrap text-sm font-semibold text-gray-900">' . $row["ServiceType"] . '</td>';
            echo '<td class="p-1 border border-inherit text-center  whitespace-nowrap text-sm font-semibold text-gray-900">' . $row["DateRequested"] . '</td>';
            echo '<td class="text-center border-2 border-inherit rounded-md text-sm font-semibold text-gray-900 ' . $statusBgColor . '">' . $row["Status"] . '</td>';
            echo '<td class="p-1 border border-inherit text-center  whitespace-nowrap text-sm font-semibold text-gray-900">' . $row["PickUpDate"] . '</td>';
            echo '<td class="p-1 border border-inherit text-center  whitespace-nowrap text-sm font-semibold text-gray-900"></td>';
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
 
  </div>
</dialog>

<dialog id="TransactionHistory" class="modal p-3">
  
  <div class="modal-box w-full h-full max-w-6xl rounded-lg">
  
        <div class="mb-2 lg:mb-0">
            <h3 class="text-2xl font-bold text-blue-400 text-center">BRGY-409 Document Request Management System</h3>
            <span class="flex text-base font-medium text-blue-400 justify-center text-center">List of Released Document</span>
        </div>
        <form method="dialog">
        <div class="mt-4 px-4 py-3 sm:px-6 flex align-items justify-center p-4 gap-4 flex-row">
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

// Check if the user is logged in
if(!empty($_SESSION["ID"])) {
    // Retrieve the user's ID from the session
    $ID = $_SESSION["ID"];

    // Prepare and execute the SQL query to fetch requests for the user
    $query = "SELECT RequestID, ServiceType, DateRequested, Status, PickUpDate 
              FROM requestdocument 
              WHERE UserID = $ID";
    $result = mysqli_query($conn, $query);

    // Check if there are any rows returned
    if(mysqli_num_rows($result) > 0) {
        // Output table header
        echo '<table class="min-w-full divide-y divide-gray-200 mt-3">
                <thead class="bg-gray-50">
                    <tr>
                    <th scope="col" class="p-4 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Request ID</th>
                    <th scope="col" class="p-4 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Service Type</th>
                    <th scope="col" class="p-4 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Date Requested</th>
                    <th scope="col" class="p-4 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    <th scope="col" class="p-4 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Date for Release</th>
                    <th scope="col" class="p-4 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Time for Release</th>
                    </tr>
                </thead>
                <tbody class="bg-white">';

        // Fetch and display each row
        while($row = mysqli_fetch_assoc($result)) {
          if ($row["Status"] == "Released") {
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

                    case 'Released':
                      $statusBgColor = 'bg-orange-400 text-white';
                      break;

                default:
                    $statusBgColor = ''; // No background color if status is not recognized
            }
            echo '<tr>';
            echo '<td class="p-1 border border-inherit text-center  whitespace-nowrap text-sm font-semibold text-gray-900">' . $row["RequestID"] . '</td>';
            echo '<td class="p-1 border border-inherit text-center  whitespace-nowrap text-sm font-semibold text-gray-900">' . $row["ServiceType"] . '</td>';
            echo '<td class="p-1 border border-inherit text-center  whitespace-nowrap text-sm font-semibold text-gray-900">' . $row["DateRequested"] . '</td>';
            echo '<td class="text-center border-2 border-inherit rounded-md text-sm font-semibold text-gray-900 ' . $statusBgColor . '">' . $row["Status"] . '</td>';
            echo '<td class="p-1 border border-inherit text-center  whitespace-nowrap text-sm font-semibold text-gray-900">' . $row["PickUpDate"] . '</td>';
            echo '<td class="p-1 border border-inherit text-center  whitespace-nowrap text-sm font-semibold text-gray-900"></td>';
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
 
  </div>
</dialog>












      <div class="flex flex-col mt-8">
         <div class="overflow-x-auto rounded-lg">
            <div class="align-middle inline-block min-w-full">
               <div class="shadow overflow-hidden sm:rounded-lg">

               <?php
// Include the database connection file
$conn = mysqli_connect($servername, $username, $password, $dbname);
if(!$conn){
  echo "Database connection error".mysqli_connect_error();
}

// Check if the user is logged in
if(!empty($_SESSION["ID"])) {
    // Retrieve the user's ID from the session
    $ID = $_SESSION["ID"];

    // Prepare and execute the SQL query to fetch requests for the user
    $query = "SELECT RequestID, ServiceType, DateRequested, Status, PickUpDate, UserID 
              FROM requestdocument 
              WHERE UserID = $ID";
    $result = mysqli_query($conn, $query);

    // Check if there are any rows returned
    if(mysqli_num_rows($result) > 0) {
        // Output table header
        echo '<table class="min-w-full divide-y divide-gray-200 mb-20">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="p-4 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Request ID</th>
                        <th scope="col" class="p-4 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Service Type</th>
                        <th scope="col" class="p-4 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Date Requested</th>
                        <th scope="col" class="p-4 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th scope="col" class="p-4 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Schedule for Release</th>
                        <th scope="col" class="p-4 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white">';

        // Fetch and display each row
       // Fetch and display each row
while($row = mysqli_fetch_assoc($result)) {
  // Check the status and set the background color accordingly
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

          case 'Released':
            $statusBgColor = 'bg-orange-400 text-white';
            break;


      default:
          $statusBgColor = ''; // No background color if status is not recognized
  }

  // Display the row only if the status is not "Completed"
  if ($row["Status"] !== "Completed" && $row["Status"] !== "Released") {
    {
      echo '<tr>';
      echo '<td class="p-1 border border-inherit text-center  whitespace-nowrap text-sm font-semibold text-gray-900">' . $row["RequestID"] . '</td>';
      echo '<td class="p-1  border border-inherit text-center whitespace-nowrap text-sm font-semibold text-gray-900">' . $row["ServiceType"] . '</td>';
      echo '<td class="p-1  border border-inherit text-center whitespace-nowrap text-sm font-semibold text-gray-900">' . $row["DateRequested"] . '</td>';
      echo '<td class="text-center border-2 border-inherit rounded-md text-sm font-semibold text-gray-900 ' . $statusBgColor . '">' . $row["Status"] . '</td>';
      echo '<td class="p-1  border border-inherit text-center whitespace-nowrap text-sm font-semibold text-gray-900">' . $row["PickUpDate"] . '</td>';
      echo '<td class="p-1   border border-inherit text-center whitespace-nowrap text-sm font-semibold text-gray-900">
      <div class="dropdown  dropdown-end">
      <div tabindex="0" role="button" class="flex items-center justify-between text-white font-semibold btn w-40 bg-blue-400 hover:bg-blue-500">
      Action Details
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
        <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
      </svg>
    </div>
      <ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow-2xl bg-base-100 rounded-box w-52 ">
          <li class="open-modal-btn" data-request-id="' . $row["RequestID"] . '"><a><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
          <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
          <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
        </svg>
         View Details</a></li>


         <li class="edit-request-btn" data-request-id="' . $row["RequestID"] . '" data-service-type="' . $row["ServiceType"] . '"><a>Edit Request</a></li>




         <li class="delete-request-btn" data-request-id="' . $row["RequestID"] . '"><a><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
         <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
     </svg> Delete Request</a></li>
     
      </ul>
  </div>
</td>';
      echo '</tr>';
  }
}
 
}

        // Close table body and table tags
        echo '</tbody></table>';

        echo '<dialog id="Viewrequestdetails" class="modal p-3">
        <div class="modal-box w-100 max-w-4xl rounded-none">
         
            <div class="mb-2 lg:mb-0">
              <h3 class="text-2xl font-bold text-blue-500 text-center">BRGY-409 Document Request Management System</h3>
              <span class="flex text-base font-medium text-blue-500 justify-center text-center">Document Request Details</span>
            </div>
          
          <div id="modal-content" class="mt-8 px-4 py-3 sm:px-6 flex align-items justify-center p-4 gap-4 flex-row"></div>



          <div class="mt-4 px-4 py-3 sm:px-6 flex align-items justify-center p-4 gap-4 flex-row">
          <button id="close-modal-btn" class="btn btn-sm btn-circle btn-ghost absolute top-2 right-2">
          ✕
        </button>
        
          </div>
        </div>
      </dialog>';
// JavaScript to handle modal functionality
echo '<script>
        document.addEventListener("DOMContentLoaded", function () {
          const modal = document.getElementById("Viewrequestdetails");
          const modalContent = document.getElementById("modal-content");
          const openModalButtons = document.querySelectorAll(".open-modal-btn");
          const closeModalButton = document.getElementById("close-modal-btn");

          openModalButtons.forEach(function (button) {
            button.addEventListener("click", function () {
              const requestId = button.getAttribute("data-request-id");

              // Fetch request details using AJAX
              fetch("../Backend/fetch_request_details.php?request_id=" + requestId)
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


      echo '<script>
      document.addEventListener("DOMContentLoaded", function () {
          const deleteRequestButtons = document.querySelectorAll(".delete-request-btn");
  
          deleteRequestButtons.forEach(function (button) {
              button.addEventListener("click", function () {
                  const requestId = button.getAttribute("data-request-id");
  
                  // Show confirmation dialog
                  Swal.fire({
                      title: "Are you sure?",
                      text: "You won\'t be able to revert this!",
                      icon: "warning",
                      showCancelButton: true,
                      confirmButtonColor: "#3085d6",
                      cancelButtonColor: "#d33",
                      confirmButtonText: "Yes, delete it!"
                  }).then((result) => {
                      if (result.isConfirmed) {
                          // User confirmed, send request to delete
                          fetch("../Backend/Delete.php?request_id=" + requestId)
                              .then(response => response.text())
                              .then(data => {
                                  // Display success message
                                  Swal.fire(
                                      "Deleted!",
                                      "Your request has been deleted.",
                                      "success"
                                  );
                                  
                              })
                              .catch(error => {
                                  // Display error message
                                  Swal.fire(
                                      "Error!",
                                      "An error occurred while deleting the request.",
                                      "error"
                                  );
                              });
                      }
                  });
              });
          });
      });
  </script>';
  

  echo'<!-- Modal -->
  <div id="editRequestModal" class="fixed inset-0 z-50 overflow-auto bg-smoke-800 bg-opacity-75 flex justify-center items-center hidden">
    <!-- Modal Content -->
    <div class="bg-white w-1/2 p-8 rounded-lg">
      <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-bold">Edit Request</h2>
        <button id="closeModalBtn" class="text-red-500 hover:text-red-700">Close</button>
      </div>
      <form id="editRequestForm">
        <label for="requestId" class="block mb-2">Request ID:</label>
        <input type="text" id="requestId" name="requestId" class="w-full border rounded-md px-3 py-2 mb-4" readonly>
        
        <label for="serviceType" class="block mb-2">Service Type:</label>
        <input type="text" id="serviceType" name="serviceType" class="w-full border rounded-md px-3 py-2 mb-4" readonly>
        
        <!-- Add more input fields as needed -->
        
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Submit</button>
      </form>
    </div>
  </div>
  ';




  echo'<script>
  // JavaScript to handle opening the modal for editing request
document.addEventListener("DOMContentLoaded", function () {
    const editRequestButtons = document.querySelectorAll(".edit-request-btn");
    const modal = document.getElementById("your-daisyui-modal-id");

    editRequestButtons.forEach(function (button) {
        button.addEventListener("click", function () {
            const requestId = button.getAttribute("data-request-id");
            const serviceType = button.getAttribute("data-service-type");

            // Update the modal content with the request details
            // For example, set the modal title and form fields with the request details
            modal.querySelector(".modal-title").innerText = "Edit Request";
            modal.querySelector("#request-id-input").value = requestId;
            modal.querySelector("#service-type-input").value = serviceType;

            // Open the modal
            modal.show();
        });
    });
});

  
  
  
  </script>';
  
  
  




    } else {
      echo '<div class="mx-auto text-center mt-4" style="width: 200px;">';
      echo '<img src="/Images/norequest.svg" alt="Illustration" class="w-30 h-auto">';
      echo "<p class='text-lg font-semibold text-center '>No requests found</p>";
      echo '</div>';
      
    }
} 

// Close the database connection
?> 




<div class="flex items-center justify-first mt-5">
        <button class="w-16 p-4 border text-base rounded-l-xl text-gray-600 bg-white hover:bg-gray-100">
            <svg width="9" fill="currentColor" height="8" class="" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                <path d="M1427 301l-531 531 531 531q19 19 19 45t-19 45l-166 166q-19 19-45 19t-45-19l-742-742q-19-19-19-45t19-45l742-742q19-19 45-19t45 19l166 166q19 19 19 45t-19 45z">
                </path>
            </svg>
        </button>
        <button class="w-16 px-4 py-2 border-t border-b text-base text-indigo-500 bg-white hover:bg-gray-100">
            1
        </button>
        <button class="w-16 px-4 py-2 border text-base text-gray-600 bg-white hover:bg-gray-100">
            2
        </button>
        <button class="w-16 px-4 py-2 border-t border-b text-base text-gray-600 bg-white hover:bg-gray-100">
            3
        </button>
        <button class="w-16 px-4 py-2 border text-base text-gray-600 bg-white hover:bg-gray-100">
            4
        </button>
        <button class="w-16 p-4 border-t border-b border-r text-base rounded-r-xl text-gray-600 bg-white hover:bg-gray-100">
            <svg width="9" fill="currentColor" height="8" class="" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                <path d="M1363 877l-742 742q-19 19-45 19t-45-19l-166-166q-19-19-19-45t19-45l531-531-531-531q-19-19-19-45t19-45l166-166q19-19 45-19t45 19l742 742q19 19 19 45t-19 45z">
                </path>
            </svg>
        </button>

        
    </div>



               </div>
            </div>
         </div>
      </div>


   




   </div>
     </div>
  </main>
</div>



<!-- Pesonal Profile -------------------------------------------------------------------------------------------------------------->

       <div  id="ResidentPersonalProfile"  style="display: none;" class="absolute bg-gray-50 inset-0 overflow-y-auto lg:ml-64 mt-16">
         <div class="pt-3 px-4">
            <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8  xl:gap-4 my-4">
               
            
               <div class="flex flex-col lg:flex-row items-center justify-between">
                  <div class="lg:mb-0">
                      <h3 class="text-xl font-bold text-gray-900 mb-2 align-items-center flex">Personal Profile</h3>
                    
                  </div>
                  <div class="flex justify-end space-x-2">
                     <button class="bg-green-400 hover:bg-green-600 text-white font-bold py-2 px-4 rounded" onclick="EditResidentprofile.showModal()">
                     <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="white" class="w-5 h-5 inline-block align-middle">
  <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 0 1-1.043 3.296 3.745 3.745 0 0 1-3.296 1.043A3.745 3.745 0 0 1 12 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 0 1-3.296-1.043 3.745 3.745 0 0 1-1.043-3.296A3.745 3.745 0 0 1 3 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 0 1 1.043-3.296 3.746 3.746 0 0 1 3.296-1.043A3.746 3.746 0 0 1 12 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 0 1 3.296 1.043 3.746 3.746 0 0 1 1.043 3.296A3.745 3.745 0 0 1 21 12Z" />
</svg>
                          Edit Profile
                     </button>
         
                     <button class="bg-red-400 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">
                         <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="white" class="w-5 h-5 inline-block align-middle text-white">
                             <path strokeLinecap="round" strokeLinejoin="round" d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5m6 4.125 2.25 2.25m0 0 2.25 2.25M12 13.875l2.25-2.25M12 13.875l-2.25 2.25M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
                         </svg>
                         Delete Account
                     </button>
                 </div>
              </div>
              


            
              <?php
 // Start the session
if(isset($_SESSION["ID"])) {
    $ID = $_SESSION["ID"];
    $result = mysqli_query($conn, "SELECT * FROM users WHERE ID = $ID");
    if($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result); // Fetch the user data
?>



<div class="bg-white">
               <div class="container mx-auto py-8">
                   <div class="grid grid-cols-4 sm:grid-cols-12 gap-6 px-4">
                       <div class="col-span-4 sm:col-span-3">
                        
                           <div class="bg-white shadow-2xl rounded-lg p-6 h-full ">
                               <div class="flex flex-col items-center">
                                 
                               <div class="relative">
    <?php if(isset($row["Profile"]) && !empty($row["Profile"])): ?>
        <img src="../Backend/uploads/<?php echo $row["Profile"]; ?>" class="w-32 h-32 bg-gray-300 rounded-full mb-4 border-4" alt="Profile Picture">
    <?php else: ?>
        <img src="/Images/blank.png" class="w-32 h-32 bg-gray-300 rounded-full mb-4" alt="Default Profile Picture border-4">
    <?php endif; ?>

    <div class="absolute bottom-0 right-2">
        <!-- Additional content here -->
    </div>
</div>
                                   <h1 class="text-xl font-bold"><?php echo $row["fname"]?></h1>
                                   <p class="text-gray-700 font-medium">Status: <span class="<?php  echo $row["Status"] === 'Verified' ? 'text-green-400' : 'text-red-400'; ?>"><?php echo $row["Status"]; ?></span></p>
                               </div>

<?php
if(!empty($_SESSION["ID"])){
  $ID = $_SESSION["ID"];
  $result = mysqli_query($conn, "SELECT * FROM users WHERE ID = $ID");
  $userData = mysqli_fetch_assoc($result);

  $progress = 0; // Initialize progress
  $columns = [
      'fname' => 5, 'Mname' => 5, 'lname' => 5, 'ContactNumber' => 5, 'Gender' => 5, 'email' => 5, 'password' => 5, 'Nickname' => 5, 
      'PlaceofBirth' => 5, 'Dateofbirth' => 5, 'Age' => 5, 'CivilStatus' => 5, 'Purok' => 5, 'VoterStatus' => 5, 'Occupation' => 5, 
      'Address' => 5, 'Zipcode' => 5, 'Citezenship' => 5, 'Profile' => 5, 'GovernmentIDFront' => 5, 'GovernmentIDBack' => 5,
      'AnotherColumn' => 5 // Example of an additional column with 5 weight
  ];

  foreach ($columns as $column => $weight) {
      if (!empty($userData[$column])) {
          $progress += $weight; // Increase progress by the weight of the column if not empty
      }
  }

  // Ensure progress is not greater than 100
  $progress = min(100, $progress);

  // Output the progress bar
  echo '<div class="mt-4">
  <div>
    <h2 class="text-sm text-gray-400 text-center">Profile Progress</h2>
  </div>
  <progress class="progress progress-success w-50" value="' . $progress . '" max="100"></progress>
  <div class="text-center mb-2">' . $progress . '% Complete</div>
</div>';
}
?>

                              <div>
                                 <label for="first-name" class="block text-sm font-semibold leading-6 text-gray-900">Resident ID</label>
                                 <div class="mt-2.5">
                                     <input value="<?php echo $row["ID"]?>" required="" type="text" name="first-name" id="first-name" autocomplete="given-name"
                                         placeholder="Residents ID" 
                                         class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
                                 
                                        </div>
                             </div>
                             <div>
                                 <label for="last-name" class="block text-sm font-semibold leading-6 text-gray-900 mt-2">Username</label>
                                 <div class="mt-2.5">
                                     <input value="<?php echo $row["email"]?>" required="" type="text" name="last-name" id="last-name" autocomplete="family-name"
                                         placeholder="Username"
                                         class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
                                 </div>
                             </div>
                             <div>
                                 <label for="last-name" class="block text-sm font-semibold leading-6 text-gray-900 mt-2">Password</label>
                                 <div class="mt-2.5">
                                     <input value="<?php echo $row["password"]?>" required="" type="password" name="last-name" id="last-name" autocomplete="family-name"
                                         placeholder="Password"
                                         class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
                                 </div>
                             </div>


                             <div>
                                 <label for="last-name" class="block text-sm font-semibold leading-6 text-gray-900  mt-4">Government ID</label>
                                 <div class="mt-2.5 flex justify-center items-center">
                                 <button onclick="viewid.showModal()" class="bg-blue-400 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded mt-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="white" class="w-5 h-5 inline-block align-middle text-white">
              <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
              <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
            </svg>
              View Details
         </button>


         <dialog id="viewid" class="modal">
  <div class="modal-box">
    <form id="passwordForm" method="post">
      <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2" onclick="closeModal()">✕</button>

      <h3 class="font-bold text-lg">Enter Account Password for Verification</h3>

      <div>
        <div class="mt-2.5">
          <input value="<?php echo $row["ID"]?>" required="" type="text" name="user_id" id="user_id" autocomplete="given-name" placeholder="Residents ID" class="w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 hidden">
          <input required type="password" name="password" id="password" autocomplete="off" placeholder="Password" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
        </div>
      </div>

      <div class="mt-3 flex items-center justify-center">
        <button type="button" id="verifyButton"  class="inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-400 hover:bg-green-600 text-base font-medium text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 sm:w-auto sm:text-sm" onclick="verifyPassword()"> 
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-1">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
          </svg>
          Verify
        </button>
      </div>
    </form>
  </div>
</dialog>

<dialog id="ViewGovernmentID" class="modal">
  <div class="modal-box w-full max-w-6xl rounded-none">
    <form method="dialog">
      <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2" onclick="closeCustomModal()">✕</button>
    </form>
    

    <div class="mb-2 lg:mb-0">
        <h3 class="text-2xl font-bold text-black text-center">Submmitted Government ID</h3>
        <span class="flex text-base font-medium text-black justify-center text-center">Note! Images must be clear</span>
    </div>

    <div class="mt-8 flex items-center justify-center flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-4">
        <div class="flex flex-col items-center justify-center w-full">
            <div class="text-lg font-bold text-center">
                <h2>Front ID</h2>
            </div>
            <label for="Government-ID" class="flex flex-col items-center justify-center w-full h-64 p-2 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600" style="background-image: url('<?php echo isset($row["GovernmentIDFront"]) && !empty($row["GovernmentIDFront"]) ? "../Backend/uploads/" . $row["GovernmentIDFront"] : ""; ?>'); background-size: cover; background-position: center;">
            </label>
        </div>
        <div class="flex flex-col items-center justify-center w-full">
            <div class="text-lg font-bold text-center">
                <h2>Back ID</h2>
            </div>
            <label for="Government-ID-back" class="flex flex-col items-center justify-center w-full h-64 p-2 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600" style="background-image: url('<?php echo isset($row["GovernmentIDBack"]) && !empty($row["GovernmentIDBack"]) ? "../Backend/uploads/" . $row["GovernmentIDBack"] : ""; ?>'); background-size: cover; background-position: center;">
            </label>
        </div>
    </div>

  </div>
</dialog>

<script>
  function closeModal() {
    document.getElementById('viewid').close();
  }

  function closeCustomModal() {
    document.getElementById('ViewGovernmentID').close();
  }

  function verifyPassword() {
    var userID = document.getElementById('user_id').value;
    var password = document.getElementById('password').value;

    // Make AJAX request
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '../Backend/check_password.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          var response = xhr.responseText;
          if (response === 'success') {
            // Show the custom modal dialog
            document.getElementById('ViewGovernmentID').showModal();
          } else {
            // Password is incorrect
            Swal.fire({
              icon: 'error',
              title: 'Error!',
              text: 'Incorrect password. Please try again.'
            });
          }
          // Close the modal dialog regardless of success or failure
          closeModal();
        } else {
          // Error handling
          Swal.fire({
            icon: 'error',
            title: 'Error!',
            text: 'Error: ' + xhr.statusText
          });
        }
      }
    };
    // Send data
    xhr.send('user_id=' + encodeURIComponent(userID) + '&password=' + encodeURIComponent(password));
  }
</script>


                                 </div>
                             </div>




                           </div>

                         

                       </div>
                       <div class="col-span-4 sm:col-span-9">
                           <div class="bg-white shadow-2xl rounded-lg p-6 h-full">
                             

                              <form class="mx-auto max-w-3xl mt-3">
                                 <div class="grid grid-cols-1 gap-y-6 gap-x-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 2xl:grid-cols-4">
                                     <div>
                                         <label for="first-name" class="block text-sm font-semibold leading-6 text-gray-900">First Name</label>
                                         <div class="mt-2.5">
                                             <input value="<?php echo $row["fname"]?>" required="" type="text" name="first-name" id="first-name" autocomplete="given-name"
                                                 placeholder="Enter Your First Name"
                                                 class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
                                         </div>
                                     </div>
                                     <div>
                                         <label for="last-name" class="block text-sm font-semibold leading-6 text-gray-900">Middle Name</label>
                                         <div class="mt-2.5">
                                             <input value="<?php echo $row["Mname"]?>"  required="" type="text" name="last-name" id="last-name" autocomplete="family-name"
                                                 placeholder="Enter Your Last Name"
                                                 class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
                                         </div>
                                     </div>
                                     <div>
                                         <label for="last-name" class="block text-sm font-semibold leading-6 text-gray-900">Last Name</label>
                                         <div class="mt-2">
                                             <input value="<?php echo $row["lname"]?>" required="" type="text" name="last-name" id="last-name" autocomplete="family-name"
                                                 placeholder="Enter Your Last Name"
                                                 class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
                                         </div>
                                     </div>
                                     <div>
                                         <label for="first-name" class="block text-sm font-semibold leading-6 text-gray-900">Nick Name</label>
                                         <div class="mt-2.5">
                                             <input value="<?php echo $row["Nickname"]?>"  required="" type="text" name="first-name" id="first-name" autocomplete="given-name"
                                                 placeholder="Add NickName"
                                                 class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
                                         </div>
                                     </div>
                                     <div>
                                         <label for="last-name" class="block text-sm font-semibold leading-6 text-gray-900">Place of Birth</label>
                                         <div class="mt-2.5">
                                             <input value="<?php echo $row["PlaceofBirth"]?>"  required="" type="text" name="last-name" id="last-name" autocomplete="family-name"
                                                 placeholder="Enter Place of Birth"
                                                 class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
                                         </div>
                                     </div>
                                     <div>
                                         <label for="last-name" class="block text-sm font-semibold leading-6 text-gray-900">Birthdate</label>
                                         <div class="mt-2">
                                             <input value="<?php echo $row["Dateofbirth"]?>" required="" type="date" name="last-name" id="last-name" autocomplete="family-name"
                                                 placeholder="Select Birthdate"
                                                 class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
                                         </div>
                                     </div>
                                     <div>
                                         <label for="first-name" class="block text-sm font-semibold leading-6 text-gray-900">Age</label>
                                         <div class="mt-2.5">
                                             <input value="<?php echo $row["Age"]?>" required="" type="text" name="first-name" id="first-name" autocomplete="given-name"
                                                 placeholder="Enter Age"
                                                 class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
                                         </div>
                                     </div>
                                     <div>
                                         <label for="last-name" class="block text-sm font-semibold leading-6 text-gray-900">Civil Status</label>
                                         <div class="mt-2.5">
                                             <input value="<?php echo $row["CivilStatus"]?>" required="" type="text" name="last-name" id="last-name" autocomplete="family-name"
                                                 placeholder="Select Civil Status"
                                                 class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
                                         </div>
                                     </div>
                                     <div>
                                         <label for="last-name" class="block text-sm font-semibold leading-6 text-gray-900">Gender</label>
                                         <div class="mt-2">
                                             <input value="<?php echo $row["Gender"]?>" required="" type="text" name="last-name" id="last-name" autocomplete="family-name"
                                                 placeholder="Select Gender"
                                                 class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
                                         </div>
                                     </div>
                                     <div>
                                         <label for="first-name" class="block text-sm font-semibold leading-6 text-gray-900">Purok</label>
                                         <div class="mt-2.5">
                                             <input value="<?php echo $row["Purok"]?>" required="" type="text" name="first-name" id="first-name" autocomplete="given-name"
                                                 placeholder="Select Purok"
                                                 class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
                                         </div>
                                     </div>
                                     <div>
                                         <label for="last-name" class="block text-sm font-semibold leading-6 text-gray-900">Voters Status</label>
                                         <div class="mt-2.5">
                                             <input value="<?php echo $row["VoterStatus"]?>" required="" type="text" name="last-name" id="last-name" autocomplete="family-name"
                                                 placeholder="Select Voter Status"
                                                 class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
                                         </div>
                                     </div>
                                     <div>
                                         <label for="last-name" class="block text-sm font-semibold leading-6 text-gray-900">Email</label>
                                         <div class="mt-2">
                                             <input value="<?php echo $row["email"]?>"  required="" type="text" name="last-name" id="last-name" autocomplete="family-name"
                                                 placeholder="Enter Email"
                                                 class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
                                         </div>
                                     </div>
                              
                                  


                                 </div>

                                 <div class=" mt-3 flex flex-col sm:flex-row gap-x-6">
                                    <div class="sm:flex-1">
                                        <label for="company" class="block text-sm font-semibold leading-6 text-gray-900">Occupation</label>
                                        <div class="mt-2">
                                            <input  value="<?php echo $row["Occupation"]?>" required="" type="text" name="company" id="company" autocomplete="organization"
                                                placeholder="Your Occupation"
                                                class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 flex-1">
                                        </div>
                                    </div>
                                    <div class="sm:flex-1">
                                        <label for="email" class="block text-sm font-semibold leading-6 text-gray-900">Contact Number</label>
                                        <div class="mt-2">
                                            <input value="<?php echo $row["ContactNumber"]?>"  required="" type="text" name="email" id="email" autocomplete="email"
                                                placeholder="Your Contact Number"
                                                class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 flex-1">
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class=" mt-3 flex flex-col sm:flex-row gap-x-6">
                                 <div class="sm:flex-1">
                                     <label for="company" class="block text-sm font-semibold leading-6 text-gray-900">Address</label>
                                     <div class="mt-2">
                                         <input value="<?php echo $row["Address"]?>" required="" type="text" name="company" id="company" autocomplete="organization"
                                             placeholder="Enter Address"
                                             class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 flex-1">
                                     </div>
                                 </div>
                                 <div class="sm:flex-1">
                                     <label for="email" class="block text-sm font-semibold leading-6 text-gray-900">Zip Code</label>
                                     <div class="mt-2">
                                         <input value="<?php echo $row["Zipcode"]?>" required="" type="text" name="email" id="email" autocomplete="email"
                                             placeholder="Enter ZIp Code"
                                             class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 flex-1">
                                     </div>
                                 </div>
                                 
                             </div>



                             <div class="mt-3">
                              <label for="last-name" class="block text-sm font-semibold leading-6 text-gray-900">Citizenship</label>
                              <div class="mt-2">
                                  <input  value="<?php echo $row["Citezenship"]?>" required="" type="text" name="last-name" id="last-name" autocomplete="family-name"
                                      placeholder="Select Citizenship"
                                      class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
                              </div>
                          </div>
                             </form>
                       </div>
                   </div>
               </div>
           </div>
           </div>






                    <!-- Other form fields here -->
                </div>
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
         </div>
   </div>
</div>


<!--personal profile dialog-->


<dialog id="EditResidentprofile" class="modal p-3">
  <div class="modal-box w-full max-w-6xl rounded-none">
   
  

    <div class="bg-blue-500 shadow-2xl rounded-md p-6 mb-3 ">
        <div class="mb-2 lg:mb-0">
            <h3 class="text-2xl font-bold text-white text-center">BRGY-409 Document Request Management System</h3>
            <span class="flex text-base font-medium text-white justify-center text-center">Edit User Personal Information</span>
        </div>
    </div>

 
    <div class="grid grid-cols-4 sm:grid-cols-12 gap-6 px-4">
      <div class="col-span-4 sm:col-span-3">




            
      <?php
 // Start the session
if(isset($_SESSION["ID"])) {
    $ID = $_SESSION["ID"];
    $result = mysqli_query($conn, "SELECT * FROM users WHERE ID = $ID");
    if($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result); // Fetch the user data
?>



      <div class="bg-white shadow-2xl rounded-lg p-6 h-full">

      
      <form id="VerifyForm" action="../Backend/Update.php" method="post" enctype="multipart/form-data">
                               <div class="flex flex-col items-center">
                                 
                               
                               <div class="relative">
  <input  type="file" id="PRofile" name="PRofile" class="hidden" accept=".jpg, .png .jpeg .pdf, .doc, .docx" onchange="displaySelectedImage(event)">


  <div class="relative">
    <?php if(isset($row["Profile"]) && !empty($row["Profile"])): ?>
        <img id="profilePicture" src="../Backend/uploads/<?php echo $row["Profile"]; ?>" class="w-32 h-32 bg-gray-300 rounded-full  mb-4 border-4" alt="Profile Picture">
    <?php else: ?>
        <img id="profilePicture"  src="/Images/blank.png" class="w-32 h-32 bg-gray-300 rounded-full mb-4" alt="Default Profile Picture">
    <?php endif; ?>


</div>


<label for="PRofile" class="absolute bottom-0 right-0 p-2 bg-gray-100 text-black rounded-full hover:bg-gray-400 focus:outline-none focus:bg-gray-400 cursor-pointer border-4 " title="Edit Profile">
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
                                   <h1 class="text-xl font-bold"><?php echo $row["fname"]?></h1>
                                   <p class="text-gray-700 font-medium">Status: <span class="<?php echo $row["Status"] === 'Verified' ? 'text-green-400' : 'text-red-400'; ?>"><?php echo $row["Status"]; ?></span></p>
                               </div>

                         


                               <?php
if(!empty($_SESSION["ID"])){
  $ID = $_SESSION["ID"];
  $result = mysqli_query($conn, "SELECT * FROM users WHERE ID = $ID");
  $userData = mysqli_fetch_assoc($result);

  $progress = 0; // Initialize progress
  $columns = [
      'fname' => 5, 'Mname' => 5, 'lname' => 5, 'ContactNumber' => 5, 'Gender' => 5, 'email' => 5, 'password' => 5, 'Nickname' => 5, 
      'PlaceofBirth' => 5, 'Dateofbirth' => 5, 'Age' => 5, 'CivilStatus' => 5, 'Purok' => 5, 'VoterStatus' => 5, 'Occupation' => 5, 
      'Address' => 5, 'Zipcode' => 5, 'Citezenship' => 5, 'Profile' => 5, 'GovernmentIDFront' => 5, 'GovernmentIDBack' => 5,
      'AnotherColumn' => 5 // Example of an additional column with 5 weight
  ];

  foreach ($columns as $column => $weight) {
      if (!empty($userData[$column])) {
          $progress += $weight; // Increase progress by the weight of the column if not empty
      }
  }

  // Ensure progress is not greater than 100
  $progress = min(100, $progress);

  // Output the progress bar
  echo '<div class="mt-4">
  <div>
    <h2 class="text-sm text-gray-400 text-center">Profile Verification Progress</h2>
  </div>
  <progress class="progress progress-success w-50" value="' . $progress . '" max="100"></progress>
  <div class="text-center mb-2">' . $progress . '% Complete</div>
</div>';

}
?>




                              <div>
                                 <label for="ResidentID" class="block text-sm font-semibold leading-6 text-gray-900">Resident ID</label>
                                 <div class="mt-2.5">
                                     <input value="<?php echo $row["ID"]?>" required="" type="text" name="ResidentID" id="ResidentID" autocomplete="given-name"
                                         placeholder="Residents ID" 
                                         class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
                                 
                                        </div>
                             </div>
                             <div>
                                 <label for="User-name" class="block text-sm font-semibold leading-6 text-gray-900 mt-2">Username</label>
                                 <div class="mt-2.5">
                                     <input value="<?php echo $row["email"]?>" required="" type="text" name="User-name" id="User-name" autocomplete="family-name"
                                         placeholder="Username"
                                         class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
                                 </div>
                             </div>
                             <div>
                                 <label for="userpassword" class="block text-sm font-semibold leading-6 text-gray-900 mt-2">Password</label>
                                 <div class="mt-2.5">
                                     <input value="<?php echo $row["password"]?>" required="" type="password" name="userpassword" id="userpassword" autocomplete="family-name"
                                         placeholder="Password"
                                         class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
                                 </div>
                             </div>
                           </div>



        
                          
      </div>
      <div class="col-span-4 sm:col-span-9">
          <div class="bg-white shadow-2xl rounded-lg p-6">
            

          <div class="mx-auto max-w-3xl">
                                 <div class="grid grid-cols-1 gap-y-6 gap-x-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 2xl:grid-cols-4">
                                     <div>
                                         <label for="first-name" class="block text-sm font-semibold leading-6 text-gray-900">First Name</label>
                                         <div class="mt-2.5">
                                             <input value="<?php echo $row["fname"]?>" required="" type="text" name="first-name" id="first-name" autocomplete="given-name"
                                                 placeholder="Enter Your First Name"
                                                 class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
                                         </div>
                                     </div>
                                     <div>
                                         <label for="Middle-name" class="block text-sm font-semibold leading-6 text-gray-900">Middle Name</label>
                                         <div class="mt-2.5">
                                             <input  value="<?php echo $row["Mname"]?>"  required="" type="text" name="Middle-name" id="Middle-name" autocomplete="family-name"
                                                 placeholder="Enter Your Last Name"
                                                 class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
                                         </div>
                                     </div>
                                     <div>
                                         <label for="last-name" class="block text-sm font-semibold leading-6 text-gray-900">Last Name</label>
                                         <div class="mt-2">
                                             <input value="<?php echo $row["lname"]?>" required="" type="text" name="last-name" id="last-name" autocomplete="family-name"
                                                 placeholder="Enter Your Last Name"
                                                 class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
                                         </div>
                                     </div>
                                     <div>
                                         <label for="Nick-name" class="block text-sm font-semibold leading-6 text-gray-900">Nick Name</label>
                                         <div class="mt-2.5">
                                             <input value="<?php echo $row["Nickname"]?>" required="" type="text" name="Nick-name" id="Nick-name" autocomplete="given-name"
                                                 placeholder="Add NickName"
                                                 class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
                                         </div>
                                     </div>
                                     <div>
                                         <label for="PlaceofBirth" class="block text-sm font-semibold leading-6 text-gray-900">Place of Birth</label>
                                         <div class="mt-2.5">
                                             <input value="<?php echo $row["PlaceofBirth"]?>" required="" type="text" name="PlaceofBirth" id="PlaceofBirth" autocomplete="family-name"
                                                 placeholder="Enter Place of Birth"
                                                 class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
                                         </div>
                                     </div>
                                     <div>
                                         <label for="Birthdate" class="block text-sm font-semibold leading-6 text-gray-900">Birthdate</label>
                                         <div  class="mt-2">
                                             <input value="<?php echo $row["Dateofbirth"]?>" required="" type="date" name="Birthdate" id="Birthdate" autocomplete="family-name"
                                                 placeholder="Select Birthdate"
                                                 class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
                                         </div>
                                     </div>
                                     <div>
                                         <label for="Age" class="block text-sm font-semibold leading-6 text-gray-900">Age</label>
                                         <div class="mt-2.5">
                                             <input  value="<?php echo $row["Age"]?>" required="" type="number" name="Age" id="Age" autocomplete="given-name"
                                                 placeholder="Enter Age"
                                                 class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
                                         </div>
                                     </div>
                                     <div>
    <label for="civil-status" class="block text-sm font-semibold leading-6 text-gray-900">Civil Status</label>
    <div class="mt-2.5">
    <select id="civil-status" name="civil-status" autocomplete="family-name"
    class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
    <?php if (!empty($row["CivilStatus"])): ?>
        <option value="<?php echo $row["CivilStatus"]; ?>" selected><?php echo $row["CivilStatus"]; ?></option>
    <?php else: ?>
        <option value="" disabled selected>Select Civil Status</option>
    <?php endif; ?>
    <option value="Single">Single</option>
    <option value="Married">Married</option>
    <option value="Divorced">Divorced</option>
    <option value="Widowed">Widowed</option>
    <option value="Separated">Separated</option>
</select>

    </div>
     </div>
                                     <div>
                                         <label for="Gender" class="block text-sm font-semibold leading-6 text-gray-900">Gender</label>
                                         <div class="mt-2">
                                             <input value="<?php echo $row["Gender"]?>" required="" type="text" name="Gender" id="Gender" autocomplete="family-name"
                                                 placeholder="Select Gender"
                                                 class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
                                         </div>
                                     </div>
                                     <div>
    <label for="purok" class="block text-sm font-semibold leading-6 text-gray-900">Purok</label>
    <div class="mt-2.5">
        <select required id="purok" name="purok" autocomplete="given-name"
                placeholder="Select Purok"
                class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
           
                <?php if (!empty($row["Purok"])): ?>
        <option value="<?php echo $row["Purok"]; ?>" selected><?php echo $row["Purok"]; ?></option>
    <?php else: ?>
      <option value="" disabled selected>Select Purok</option>
    <?php endif; ?>
           
           
           
           
               
            <option value="Purok Sunflower">Purok Sunflower</option>
            <option value="Purok Rosal">Purok Rosal</option>
            <option value="Purok Dahlia">Purok Dahlia</option>
            <option value="Purok Camia">Purok Camia</option>
            <option value="Purok Gumamela">Purok Gumamela</option>
            <option value="Purok Jasmin">Purok Jasmin</option>
            <option value="Purok Sampaguita">Purok Sampaguita</option>
        </select>
    </div>
</div>

                                     <div>
    <label for="voter-status" class="block text-sm font-semibold leading-6 text-gray-900">Voter Status</label>
    <div class="mt-2.5">
        <select required id="voter-status" name="voter-status" autocomplete="family-name"
                placeholder="Select Voter Status"
                class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
        
        
                <?php if (!empty($row["VoterStatus"])): ?>
        <option value="<?php echo $row["VoterStatus"]; ?>" selected><?php echo $row["VoterStatus"]; ?></option>
    <?php else: ?>
      <option value="" disabled selected>Select Voter Status</option>
    <?php endif; ?>
           
           
        
        
              
            <option value="Registered">Registered</option>
            <option value="Not Registered">Not Registered</option>
            <option value="Pending Registration">Pending Registration</option>
        </select>
    </div>
</div>

                                     <div>
                                         <label for="email" class="block text-sm font-semibold leading-6 text-gray-900">Email</label>
                                         <div class="mt-2">
                                             <input value="<?php echo $row["email"]?>"  required="" type="email" name="email" id="email" autocomplete="email"
                                                 placeholder="Enter Email"
                                                 class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
                                         </div>
                                     </div>
                              
                                  


                                 </div>

                                 <div class=" mt-3 flex flex-col sm:flex-row gap-x-6">
                                  
                                    <div class="sm:flex-1">
                                        <label for="Occupation" class="block text-sm font-semibold leading-6 text-gray-900">Occupation</label>
                                        <div class="mt-2">
                                            <input value="<?php echo $row["Occupation"]?>" required="" type="text" name="Occupation" id="Occupation" autocomplete="Occupation"
                                                placeholder="Enter Occupation"
                                                class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 flex-1">
                                        </div>
                                    </div>

                                    
                                    <div class="sm:flex-1">
                                        <label for="Contact-Number" class="block text-sm font-semibold leading-6 text-gray-900">Contact Number</label>
                                        <div class="mt-2">
                                            <input value="<?php echo $row["ContactNumber"]?>"  required="" type="number" name="Contact-Number" id="Contact-Number" autocomplete="email"
                                                placeholder="Your Contact Number"
                                                class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 flex-1">
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class=" mt-3 flex flex-col sm:flex-row gap-x-6">
                                 <div class="sm:flex-1">
                                     <label for="Address" class="block text-sm font-semibold leading-6 text-gray-900">Address</label>
                                     <div class="mt-2">
                                         <input value="<?php echo $row["Address"]?>" required="" type="text" name="Address" id="Address" autocomplete="Address"
                                             placeholder="Enter Address"
                                             class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 flex-1">
                                     </div>
                                 </div>
                                 <div class="sm:flex-1">
                                     <label for="Zip-Code" class="block text-sm font-semibold leading-6 text-gray-900">Zip Code</label>
                                     <div class="mt-2">
                                         <input value="<?php echo $row["Zipcode"]?>" required="" type="number" name="Zip-Code" id="Zip-Code" autocomplete="Zip-Code"
                                             placeholder="Enter City Zip Code Ex. 1008"
                                             class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 flex-1">
                                     </div>
                                 </div>
                                 
                             </div>



                             <div class="mt-3">
                              <label for="Citizenship" class="block text-sm font-semibold leading-6 text-gray-900">Citizenship</label>
                              <div class="mt-2">
                                  <input  value="<?php echo $row["Citezenship"]?>" value="Filipino" required="" type="text" name="Citizenship" id="Citizenship" autocomplete="Citizenship"
                                      placeholder="Select Citizenship"
                                      class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
                        </div>
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
  
</div>


<div class="bg-white shadow-2xl rounded-md p-6 mb-3 mt-4">
    <div class="mb-2 lg:mb-0">
        <h3 class="text-2xl font-bold text-black text-center">Submission of Government ID</h3>
        <span class="flex text-base font-medium text-black justify-center text-center">Note! Images must be clear</span>
    </div>
    <div class="mt-8 flex items-center justify-center flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-4">
        <div class="flex flex-col items-center justify-center w-full">
            <div class="text-lg font-bold text-center">
                <h2>Front ID</h2>
                <p class="text-xs text-gray-500 dark:text-gray-400 mb-2">SVG, PNG, JPG, or GIF (MAX. 800x400px)</p>
            </div>
            <label for="Government-ID" class="flex flex-col items-center justify-center w-full h-64 p-2 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600" style="background-image: url('<?php echo isset($row["GovernmentIDFront"]) && !empty($row["GovernmentIDFront"]) ? "../Backend/uploads/" . $row["GovernmentIDFront"] : ""; ?>'); background-size: cover; background-position: center;">
                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                    <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                    </svg>
                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                </div>
                <input  type="file" name="Government-ID" id="Government-ID" accept=".jpg, .png, .jpeg, .pdf, .doc, .docx" class="hidden" onchange="displayImage(this, 'front')" />
            </label>
        </div>
        <div class="flex flex-col items-center justify-center w-full">
            <div class="text-lg font-bold text-center">
                <h2>Back ID</h2>
                <p class="text-xs text-gray-500 dark:text-gray-400 mb-2">SVG, PNG, JPG, or GIF (MAX. 800x400px)</p>
            </div>
            <label for="Government-ID-back" class="flex flex-col items-center justify-center w-full h-64 p-2 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600" style="background-image: url('<?php echo isset($row["GovernmentIDBack"]) && !empty($row["GovernmentIDBack"]) ? "../Backend/uploads/" . $row["GovernmentIDBack"] : ""; ?>'); background-size: cover; background-position: center;">
                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                    <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                    </svg>
                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                </div>
                <input  type="file" name="Government-ID-back" id="Government-ID-back" accept=".jpg, .png, .jpeg, .pdf, .doc, .docx" class="hidden" onchange="displayImage(this, 'back')" />
            </label>
        </div>
    </div>

<script>
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





<div class="bg-white shadow-2xl rounded-md p-6 mb-3  mt-4">
        <div class="mb-2 lg:mb-0">
            <h3 class="text-2xl font-bold text-black text-center">Residents Verification Process</h3>
            <span class="flex text-base font-medium text-black justify-center text-center">Verification Process</span>
        </div>


        <ol class="items-center justify-center gap-6 sm:flex mt-4">
        <li class="relative mb-6 sm:mb-0 ">
            <div class="flex items-center justify-center">
                <div class="z-10 flex items-center justify-center w-14 h-14 bg-blue-100 rounded-full ring-0 ring-white dark:bg-blue-900 sm:ring-8 dark:ring-gray-900 shrink-0">
                <svg class="w-10 h-10 text-blue-800 dark:text-blue-300"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="1.5"  stroke-linecap="round"  stroke-linejoin="round">  
                        <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z" />  <polyline points="17 21 17 13 7 13 7 21" />  <polyline points="7 3 7 8 15 8" /></svg>
                </div>
              
            </div>
           
            <div class="mt-3 text-center">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-1">Submit Personal Details</h3>
                <time class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">Complete your Personal Information</time>
            </div>
        </li>

     

        <li class="relative mb-6 sm:mb-0">
            <div class="flex items-center justify-center">
                <div class="z-10 flex items-center justify-center w-14 h-14 bg-blue-100 rounded-full ring-0 ring-white dark:bg-blue-900 sm:ring-8 dark:ring-gray-900 shrink-0">
                    <svg class="w-10 h-10 text-blue-800 dark:text-blue-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" className="w-6 h-6">
                        <path strokeLinecap="round" strokeLinejoin="round" d="M10.125 2.25h-4.5c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125v-9M10.125 2.25h.375a9 9 0 0 1 9 9v.375M10.125 2.25A3.375 3.375 0 0 1 13.5 5.625v1.5c0 .621.504 1.125 1.125 1.125h1.5a3.375 3.375 0 0 1 3.375 3.375M9 15l2.25 2.25L15 12" />
                      </svg>
                      
                </div>
               
            </div>
            <div class="mt-3  text-center">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-1">Resident Verification</h3>
                <time class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">Verifying residents Information</time>
            </div>
        </li>


        <li class="relative mb-6 sm:mb-0 ">
            <div class="flex items-center justify-center">
                <div class="z-10 flex items-center justify-center w-14 h-14 bg-blue-100 rounded-full ring-0 ring-white dark:bg-blue-900 sm:ring-8 dark:ring-gray-900 shrink-0">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10 text-blue-800 dark:text-blue-300">
  <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285Z" />
</svg>
                </div>
                
            </div>
            <div class="mt-3  text-center">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-1">Verification Result</h3>
                <time class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">View Status of your Account</time>
            </div>
        </li>
    </ol>


<div class="bg-blue-100 p-3 rounded-md mt-2 ">
<div class="flex items-center">
  <h2 class="text-lg font-semibold mr-1">Note</h2>
  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
  </svg>
</div>



 <h3 class="text-lg font-semibold mb-2">Submmision of Government ID</h3>
              <p>Please make sure to follow the Following:</p>
              <ul class="list-disc ml-6 mb-4">
                <li>Only these Government ID's we will accept (Barangay ID, Philhealth ID, National ID, Drivers License, Postal ID) if you are a student you can submit your school ID</li>
                <li>Upon Submmiting Govenrment ID's please make sure that it is Clear Front and Back</li>
                <li>Failed to follow these will results not Verifiying your account!</li>
              </ul>
              <h3 class="text-lg font-semibold mb-2">How we use your Information</h3>
              <p>We may use your information for various purposes, including:</p>
              <ul class="list-disc ml-6 mb-4">
                <li>Providing  Document Request Services to you</li>
                <li>Sending you updates and information about our Barangay activities and services</li>
                <li>Improving our website and services</li>
              </ul>
</div>



    </div>

    </form>

<div class="px-4 py-3 sm:px-6 flex align-items justify-center p-4 gap-4 flex-row mt-3">
<button id="SubmitInfotoVerify" class="inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-500 hover:bg-green-600 text-base font-medium text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 sm:w-auto sm:text-sm"> 
  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-1">
    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
  </svg>
  Save Profile
</button>

<form method="dialog">
  <button  class="inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-400 hover:bg-red-600 text-base font-medium text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400  sm:w-auto sm:text-sm">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-1">
        <path stroke-linecap="round" stroke-linejoin="round" d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
      </svg>
    Cancel Edit </button>
</form>
</div>

  </div>


 

</dialog>



<script >
$(function() {
    $('#SubmitInfotoVerify').click(function(e) {
        e.preventDefault();

        var valid = $('#VerifyForm')[0].checkValidity();

        if (valid) {
            var formData = new FormData($('#VerifyForm')[0]);

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


document.getElementById('SubmitInfotoVerify').addEventListener('click', function() {
    var dialog = document.getElementById('EditResidentprofile');
    dialog.close();
});


</script>


<!-- List of Requested Documents -------------------------------------------------------------------------------------------------------------->

<div  id="ResidentsDocumentsRequested"  style="display: none;" class="absolute bg-gray-50 inset-0 overflow-y-auto lg:ml-64 mt-16">
      <div class="pt-3 px-4">
         <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8  xl:gap-4 my-4">

              <div class="bg-gradient-to-r from-blue-400 to-indigo-500 shadow rounded-lg p-4 sm:p-6 xl:p-8 h-56  xl:gap-4 my-4">
           
                  <div class="mb-2 lg:mb-0 ">
                      <h3 class="text-3xl font-bold text-white mb-2 text-center">Document Request Services</h3>
                      <span class=" flex text-base font-medium text-white justify-center items-center">This is a list of Services of BRGY-409</span>
                  </div>
            
              </div>
              
              <div class="flex flex-wrap justify-center gap-y-3 gap-x-3 items-center px-3 lg:px-12">

    <div class="bg-white py-4 px-5 text-center rounded-md shadow-2xl transform -translate-y-20 sm:-translate-y-24 max-w-sm mx-auto mt-2 sm:m-2">
        <div class="flex justify-between items-center">
            <div>
            <svg class="w-20 h-20  p-1" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns="http://www.w3.org/2000/svg"  xmlns:cc="http://creativecommons.org/ns#" xmlns:dc="http://purl.org/dc/elements/1.1/" fill="none" viewBox="0 0 24 24"  className="w-6 h-6">
                    <g transform="translate(0 -1028.4)">
                     <path d="m5 1030.4c-1.1046 0-2 0.9-2 2v8 4 6c0 1.1 0.8954 2 2 2h14c1.105 0 2-0.9 2-2v-6-4-4l-6-6h-10z" fill="#95a5a6"></path>
                     <path d="m5 1029.4c-1.1046 0-2 0.9-2 2v8 4 6c0 1.1 0.8954 2 2 2h14c1.105 0 2-0.9 2-2v-6-4-4l-6-6h-10z" fill="#bdc3c7"></path>
                     <path d="m21 1035.4-6-6v4c0 1.1 0.895 2 2 2h4z" fill="#95a5a6"></path>
                     <path d="m6 8v1h12v-1h-12zm0 3v1h12v-1h-12zm0 3v1h12v-1h-12zm0 3v1h12v-1h-12z" transform="translate(0 1028.4)" fill="#95a5a6"></path>
                    </g>
                   </svg>
            </div>
            <div class="text-left ml-4">
                <h2 class="font-semibold text-xl mb-3">Certificate of Residency</h2>
                <p class="capitalize text-sm mt-2 mb-2">Fill-out the needed requirements before requesting the documents</p>
                <button class="mt-2 rounded-md bg-gradient-to-r from-blue-400 to-indigo-500 text-xl text-white pt-3 pb-4 px-8 inline" onclick="RequestRecidency.showModal()" >Request</button>
            </div>
        </div>
    </div>

    <div class="bg-white py-4 px-5 text-center rounded-md shadow-2xl transform -translate-y-20 sm:-translate-y-24 max-w-sm mx-auto mt-2 sm:m-2">
        <div class="flex justify-between items-center">
            <div>
            <svg class="w-20 h-20  p-1 " fill="none" viewBox="0 0 24 24" s className="w-6 h-6" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns="http://www.w3.org/2000/svg"  version="1.1" xmlns:cc="http://creativecommons.org/ns#" xmlns:dc="http://purl.org/dc/elements/1.1/">
                          <g transform="translate(0 -1028.4)">
                           <path d="m5 1030.4c-1.1046 0-2 0.9-2 2v8 4 6c0 1.1 0.8954 2 2 2h14c1.105 0 2-0.9 2-2v-6-4-4l-6-6h-10z" fill="#95a5a6"></path>
                           <path d="m5 1029.4c-1.1046 0-2 0.9-2 2v8 4 6c0 1.1 0.8954 2 2 2h14c1.105 0 2-0.9 2-2v-6-4-4l-6-6h-10z" fill="#bdc3c7"></path>
                           <path d="m15 1039.4v4h4c0-2.2-1.791-4-4-4z" fill="#e67e22"></path>
                           <path d="m14 1040.4c-2.209 0-4 1.8-4 4s1.791 4 4 4 4-1.8 4-4h-4v-4z" fill="#d35400"></path>
                           <g fill="#95a5a6">
                            <rect height="1" width="12" y="1034.4" x="6"></rect>
                            <rect height="2" width="3" y="1040.4" x="6"></rect>
                            <rect height="2" width="3" y="1043.4" x="6"></rect>
                            <rect height="2" width="3" y="1046.4" x="6"></rect>
                            <rect height="1" width="12" y="1036.4" x="6"></rect>
                            <path d="m21 1035.4-6-6v4c0 1.1 0.895 2 2 2h4z"></path>
                           </g>
                          </g>
                         </svg>
                 
            </div>
            <div class="text-left ml-4">
                <h2 class="font-semibold text-xl mb-3">Business Clearance</h2>
                <p class="capitalize text-sm mt-2 mb-2">Ensure you have all the necessary documents and clearances</p>
                <button class="mt-2 rounded-md bg-gradient-to-r from-blue-400 to-indigo-500 text-xl text-white pt-3 pb-4 px-8 inline" onclick="Businesspermit.showModal()">Request</button>
            </div>
        </div>
    </div>

    <div class="bg-white py-4 px-5 text-center rounded-md shadow-2xl transform -translate-y-20 sm:-translate-y-24 max-w-sm mx-auto mt-2 sm:m-2">
        <div class="flex justify-between items-center">
            <div>
            <svg  class="w-20 h-20  p-1" viewBox="0 0 64 64" fill="none"  xmlns="http://www.w3.org/2000/svg">
                    <path d="M50.0898 13L40.3398 3.29C40.1535 3.10526 39.9021 3.0011 39.6398 3H14.7598C13.3072 3.00264 11.9149 3.58085 10.8878 4.60797C9.86063 5.6351 9.28243 7.02743 9.27979 8.48V49.93C9.28243 51.3826 9.86063 52.7749 10.8878 53.802C11.9149 54.8292 13.3072 55.4074 14.7598 55.41H44.8998C46.3541 55.41 47.749 54.833 48.7783 53.8056C49.8076 52.7781 50.3871 51.3843 50.3898 49.93V13.75C50.3947 13.611 50.3705 13.4725 50.3189 13.3434C50.2672 13.2142 50.1892 13.0973 50.0898 13V13Z" fill="#E6E6E6"></path>
                    <path d="M50.2199 13.19L50.0899 13L40.3899 3.34005C40.2037 3.1553 39.9523 3.05115 39.6899 3.05005C39.4247 3.05005 39.1704 3.15541 38.9828 3.34294C38.7953 3.53048 38.6899 3.78483 38.6899 4.05005V13.8C38.6899 14.0653 38.7953 14.3196 38.9828 14.5072C39.1704 14.6947 39.4247 14.8 39.6899 14.8H49.4399C49.7052 14.8 49.9595 14.6947 50.147 14.5072C50.3346 14.3196 50.4399 14.0653 50.4399 13.8C50.4364 13.5779 50.359 13.3633 50.2199 13.19V13.19Z" fill="#C0BDBA"></path>
                    <path d="M39.6399 40.3799C38.1683 40.3736 36.7313 40.8267 35.5295 41.676C34.3277 42.5252 33.4208 43.7284 32.9353 45.1176C32.4499 46.5068 32.41 48.013 32.8213 49.4259C33.2326 50.8389 34.0746 52.0883 35.2299 52.9999V59.9999C35.2305 60.1943 35.2877 60.3842 35.3945 60.5465C35.5013 60.7088 35.6531 60.8365 35.8313 60.9139C36.0095 60.9913 36.2064 61.0152 36.398 60.9825C36.5895 60.9498 36.7674 60.8621 36.9099 60.7299L39.6399 58.1999L42.3699 60.7299C42.5543 60.9026 42.7972 60.9991 43.0499 60.9999C43.1869 60.9975 43.3224 60.9704 43.4499 60.9199C43.6287 60.8419 43.7809 60.7132 43.8875 60.5497C43.9941 60.3862 44.0505 60.1951 44.0499 59.9999V52.9999C45.1952 52.0843 46.028 50.8356 46.4332 49.4264C46.8384 48.0171 46.796 46.5169 46.3119 45.1327C45.8279 43.7486 44.926 42.5489 43.7308 41.6993C42.5357 40.8497 41.1062 40.3922 39.6399 40.3899V40.3799Z" fill="#FFB454"></path>
                    <path d="M39.64 43.4001C38.8341 43.3882 38.043 43.6164 37.3672 44.0557C36.6915 44.4949 36.1618 45.1254 35.8456 45.8667C35.5294 46.608 35.4409 47.4267 35.5916 48.2184C35.7422 49.0102 36.1251 49.7392 36.6914 50.3126C37.2577 50.886 37.9819 51.2779 38.7718 51.4384C39.5616 51.5988 40.3813 51.5206 41.1265 51.2136C41.8717 50.9066 42.5086 50.3848 42.9563 49.7146C43.4039 49.0443 43.6419 48.2561 43.64 47.4501C43.6375 46.3854 43.2168 45.3642 42.4687 44.6067C41.7205 43.8491 40.7046 43.4158 39.64 43.4001V43.4001Z" fill="#FFD845"></path>
                    <path d="M15 16.1799H28.1C28.3652 16.1799 28.6196 16.0746 28.8071 15.887C28.9946 15.6995 29.1 15.4451 29.1 15.1799C29.1 14.9147 28.9946 14.6604 28.8071 14.4728C28.6196 14.2853 28.3652 14.1799 28.1 14.1799H15C14.7348 14.1799 14.4804 14.2853 14.2929 14.4728C14.1054 14.6604 14 14.9147 14 15.1799C14 15.4451 14.1054 15.6995 14.2929 15.887C14.4804 16.0746 14.7348 16.1799 15 16.1799V16.1799Z" fill="#C0BDBA"></path>
                    <path d="M15 21.77H44.51C44.7752 21.77 45.0296 21.6647 45.2171 21.4771C45.4046 21.2896 45.51 21.0352 45.51 20.77C45.51 20.5048 45.4046 20.2504 45.2171 20.0629C45.0296 19.8754 44.7752 19.77 44.51 19.77H15C14.7348 19.77 14.4804 19.8754 14.2929 20.0629C14.1054 20.2504 14 20.5048 14 20.77C14 21.0352 14.1054 21.2896 14.2929 21.4771C14.4804 21.6647 14.7348 21.77 15 21.77V21.77Z" fill="#C0BDBA"></path>
                    <path d="M44.51 25.3701H15C14.7348 25.3701 14.4804 25.4755 14.2929 25.663C14.1054 25.8505 14 26.1049 14 26.3701C14 26.6353 14.1054 26.8897 14.2929 27.0772C14.4804 27.2648 14.7348 27.3701 15 27.3701H44.51C44.7752 27.3701 45.0296 27.2648 45.2171 27.0772C45.4046 26.8897 45.51 26.6353 45.51 26.3701C45.51 26.1049 45.4046 25.8505 45.2171 25.663C45.0296 25.4755 44.7752 25.3701 44.51 25.3701Z" fill="#C0BDBA"></path>
                    <path d="M44.51 31H15C14.7348 31 14.4804 31.1054 14.2929 31.2929C14.1054 31.4804 14 31.7348 14 32C14 32.2652 14.1054 32.5196 14.2929 32.7071C14.4804 32.8946 14.7348 33 15 33H44.51C44.7752 33 45.0296 32.8946 45.2171 32.7071C45.4046 32.5196 45.51 32.2652 45.51 32C45.51 31.7348 45.4046 31.4804 45.2171 31.2929C45.0296 31.1054 44.7752 31 44.51 31Z" fill="#C0BDBA"></path>
                    <path d="M44.51 36.55H15C14.7348 36.55 14.4804 36.6554 14.2929 36.8429C14.1054 37.0305 14 37.2848 14 37.55C14 37.8153 14.1054 38.0696 14.2929 38.2572C14.4804 38.4447 14.7348 38.55 15 38.55H44.51C44.7752 38.55 45.0296 38.4447 45.2171 38.2572C45.4046 38.0696 45.51 37.8153 45.51 37.55C45.51 37.2848 45.4046 37.0305 45.2171 36.8429C45.0296 36.6554 44.7752 36.55 44.51 36.55Z" fill="#C0BDBA"></path>
                    <path d="M28.36 42.1399H15C14.7348 42.1399 14.4804 42.2452 14.2929 42.4328C14.1054 42.6203 14 42.8747 14 43.1399C14 43.4051 14.1054 43.6595 14.2929 43.847C14.4804 44.0345 14.7348 44.1399 15 44.1399H28.36C28.6252 44.1399 28.8796 44.0345 29.0671 43.847C29.2546 43.6595 29.36 43.4051 29.36 43.1399C29.36 42.8747 29.2546 42.6203 29.0671 42.4328C28.8796 42.2452 28.6252 42.1399 28.36 42.1399Z" fill="#C0BDBA"></path>
                    </svg>
            </div>
            <div class="text-left ml-4">
                <h2 class="font-semibold text-xl mb-3">Barangay Indigency</h2>
                <p class="capitalize text-sm mt-2 mb-2">Complete the necessary forms and payments</p>
                <button class="mt-2 rounded-md bg-gradient-to-r from-blue-400 to-indigo-500 text-xl text-white pt-3 pb-4 px-8 inline" onclick="RequestIndigency.showModal()">Request</button>
            </div>
        </div>
    </div>

    <div class="bg-white py-4 px-5 text-center rounded-md shadow-2xl transform -translate-y-20 sm:-translate-y-24 max-w-sm mx-auto mt-2 sm:m-2">
        <div class="flex justify-between items-center">
            <div>
            <svg class="w-20 h-20  p-1" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"  className="w-6 h-6" xmlns:cc="http://creativecommons.org/ns#" xmlns:dc="http://purl.org/dc/elements/1.1/">
                    <g transform="translate(0 -1028.4)">
                     <path d="m3 1033.4c-1.1046 0-2 0.9-2 2v10 1c0 1.1 0.8954 2 2 2h16 2c1.105 0 2-0.9 2-2v-1-9-1c0-1.1-0.895-2-2-2h-2-14-2z" fill="#95a5a6"></path>
                     <path d="m3 1032.4c-1.1046 0-2 0.9-2 2v10 1c0 1.1 0.8954 2 2 2h16 2c1.105 0 2-0.9 2-2v-1-9-1c0-1.1-0.895-2-2-2h-2-14-2z" fill="#bdc3c7"></path>
                     <path d="m13 1035.4v1h4v-1h-4zm0 2v1h7v-1h-7zm0 2v1h7v-1h-7z" fill="#7f8c8d"></path>
                     <path d="m4 6c-0.5523 0-1 0.4477-1 1v9c0 0.552 0.4477 1 1 1h6c0.552 0 1-0.448 1-1v-9c0-0.5523-0.448-1-1-1h-6z" transform="translate(0 1028.4)" fill="#ecf0f1"></path>
                     <path d="m7 1035.5c-0.6655 0-1.2798 0.4-1.7324 0.8-0.3868 0.5-0.6104 1-0.7546 1.6-0.4216 0.4-0.3708 1-0.0589 1.4 0.3297 0.4 0.3253 0.9 0.5757 1.4 0.1042 0.4 0.6974 0.7 0.6972 1.1 0.1491 0.7-0.7098 0.5-1.0969 0.7-0.5399 0.2-1.2466 0.4-1.6286 0.8 0.04 0.6-0.1095 1.2 0.125 1.7 0.2 0.4 0.7004 0.4 1.1035 0.4h6.208c0.459-0.2 0.621-0.8 0.562-1.2v-1c-0.705-0.3-1.3602-0.7-2.1396-0.9-0.4624 0-0.6621-0.3-0.6986-0.7 0.6429-0.5 0.9832-1.3 1.2132-2.1 0.3596-0.3 0.655-1.1 0.1842-1.5-0.2308-0.4-0.2642-0.9-0.5832-1.4-0.4221-0.6-1.1761-1.1-1.976-1.1z" fill="#34495e"></path>
                    </g>
                   </svg>
            </div>
            <div class="text-left ml-4">
                <h2 class="font-semibold text-xl mb-3">Barangay Identification</h2>
                <p class="capitalize text-sm mt-2 mb-2">Fill-Out The Needed Requirements Before Requesting The ID</p>
                <button class="mt-2 rounded-md bg-gradient-to-r from-blue-400 to-indigo-500 text-xl text-white pt-3 pb-4 px-8 inline" onclick="RequestbrgyID.showModal()">Request</button>
            </div>
        </div>
    </div>


    
</div>


      </div>
</div>
</div>

<!-- modals to fill up ipon requesting documents-->

<dialog id="Businesspermit" class="modal p-3">
  <div class="modal-box w-full max-w-6xl rounded-none">
   
  

    <div class="bg-blue-500 shadow-2xl rounded-md p-6 mb-3 ">
        <div class="mb-2 lg:mb-0">
            <h3 class="text-2xl font-bold text-white text-center">BRGY-409 Document Request Management System</h3>
            <span class="flex text-base font-medium text-white justify-center text-center">Request for Business Clearance Document</span>
        </div>
    </div>

    <div class="grid grid-cols-4 sm:grid-cols-12 gap-6 px-4">
      <div class="col-span-4 sm:col-span-3">
       
          <div class="bg-white shadow-2xl rounded-lg p-6 h-full">
              <div class="flex flex-col items-center">
                <svg class="w-25 h-25  p-1 " fill="none" viewBox="0 0 24 24" s className="w-6 h-6" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns="http://www.w3.org/2000/svg"  version="1.1" xmlns:cc="http://creativecommons.org/ns#" xmlns:dc="http://purl.org/dc/elements/1.1/">
                  <g transform="translate(0 -1028.4)">
                   <path d="m5 1030.4c-1.1046 0-2 0.9-2 2v8 4 6c0 1.1 0.8954 2 2 2h14c1.105 0 2-0.9 2-2v-6-4-4l-6-6h-10z" fill="#95a5a6"></path>
                   <path d="m5 1029.4c-1.1046 0-2 0.9-2 2v8 4 6c0 1.1 0.8954 2 2 2h14c1.105 0 2-0.9 2-2v-6-4-4l-6-6h-10z" fill="#bdc3c7"></path>
                   <path d="m15 1039.4v4h4c0-2.2-1.791-4-4-4z" fill="#e67e22"></path>
                   <path d="m14 1040.4c-2.209 0-4 1.8-4 4s1.791 4 4 4 4-1.8 4-4h-4v-4z" fill="#d35400"></path>
                   <g fill="#95a5a6">
                    <rect height="1" width="12" y="1034.4" x="6"></rect>
                    <rect height="2" width="3" y="1040.4" x="6"></rect>
                    <rect height="2" width="3" y="1043.4" x="6"></rect>
                    <rect height="2" width="3" y="1046.4" x="6"></rect>
                    <rect height="1" width="12" y="1036.4" x="6"></rect>
                    <path d="m21 1035.4-6-6v4c0 1.1 0.895 2 2 2h4z"></path>
                   </g>
                  </g>
                 </svg>
                  <h1 class="text-sm font-bold">Business Clearance</h1>
                 
                  <p class="text-black font-normal text-center text-sm">Confirm the Privided Information & requirements before requesting the documents</p>
                
                  <h3 class="mt-1 text-sm font-bold mb-2">Upon Requesting Document you must:</h3>
    <ul class="list-disc text-sm">
      <li class="text-green-500">Verified Resident</li>
      <li class="text-green-500">Complete Information</li>
    </ul>
              </div>
          </div>
      </div>
      <div class="col-span-4 sm:col-span-9">
          <div class="bg-white shadow-2xl rounded-lg p-6">
            
              <div class="mb-2 lg:mb-0 ">
                  <h3 class="text-2xl font-bold text-blue-500 mb-2 text-center">Provide Details to Request Documents</h3>
                  <span class="flex text-base font-medium text-blue-500 justify-center text-center">This Information will apear to your Document</span>
              </div>

              <form action="ResidentsDashboard.php" method="post" class="mx-auto max-w-3xl mt-4">
              <div class="block text-sm font-semibold leading-6 text-gray-900 text-center mb-1"  > 
             <h1>Business Operator / Manager</h1>
              </div>

             <div class="grid grid-cols-1 gap-y-6 gap-x-6 mb-3  sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 2xl:grid-cols-3">
             <div>
                        <label for="firstnamebrgyBClearance" class="block text-sm  leading-6 text-gray-900">First Name</label>
                        <div>
                            <input value="<?php echo $row["fname"]?>"  required="" type="text" name="firstnamebrgyBClearance" id="firstnamebrgyBClearance" autocomplete="given-name"
                                placeholder="Enter Your First Name"
                                class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    <div>
                        <label for="MnameBClearance" class="block text-sm leading-6 text-gray-900">Middle Name</label>
                        <div>
                            <input value="<?php echo $row["Mname"]?>" required="" type="text" name="MnameBClearance" id="MnameBClearance" autocomplete="family-name"
                                placeholder="Enter Your Last Name"
                                class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    <div>
                        <label for="lastnameBClearance" class="block text-sm  leading-6 text-gray-900">Last Name</label>
                        <div>
                            <input  value="<?php echo $row["lname"]?>" required="" type="text" name="lastnameBClearance" id="lastnameBClearance" autocomplete="family-name"
                                placeholder="Enter Your Last Name"
                                class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                  </div>


                  <div>
                      <label for="BusinessNameBClearance" class="block text-sm font-semibold leading-6 text-gray-900">Business / Trade Activity</label>
                      <div class="mt-2.5">
                          <input required="" type="text" name="BusinessNameBClearance" id="BusinessNameBClearance" autocomplete="given-name"
                              placeholder="State you Business (Halimbawa. Juan's Sari-Sari Store)"
                              class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400  sm:text-sm sm:leading-6">
                      </div>
                  </div>
                  <div>
                      <label for="BusinessLocBClearance" class="mt-2 block text-sm font-semibold leading-6 text-gray-900">Business Location</label>
                      <div class="mt-2.5">
                          <input required="" type="text" name="BusinessLocBClearance" id="BusinessLocBClearance" autocomplete="family-name"
                              placeholder="State you Business Location (Halimbawa. 134 Purok Rosal Sampaloc Manila)"
                              class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400  sm:text-sm sm:leading-6">
                      </div>
                  </div>

                  <div class="flex flex-col sm:flex-row gap-x-6">
                      <div class="sm:flex-1">
                          <label for="DateReqBClearance" class="block text-sm font-semibold leading-6 text-gray-900 mt-3">Date Requested</label>
                            <div class="mt-2">
                                <input required="" type="date" name="DateReqBClearance" id="DateReqBClearance" autocomplete="family-name"
                                    placeholder="Select Birthdate"
                                    class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
                            </div>
                      </div>
                      <div class="sm:flex-1">
                          <label for="HomeAddBClearance" class="block text-sm font-semibold leading-6 text-gray-900 mt-3">Home Address</label>
                          <div class="mt-2.5">
                              <input value="<?php echo $row["Address"]?>" required="" type="text" name="HomeAddBClearance" id="HomeAddBClearance" autocomplete="family-name"
                                  placeholder="Enter Complete Address"
                                  class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
                          </div>
                      </div>
                      
                      <div class="hidden">
                      <label for="ServicetyBClearance" class="block text-sm font-semibold leading-6 text-gray-900 mt-3">Service Type</label>
                    <div class="mt-2">
                        <input value="Business Clearance" type="text" name="ServicetyBClearance" id="ServicetyBClearance" autocomplete="family-name" required
                            placeholder="Ex. Employment , School Enrollment , Government Requirements , Legal Matters etc"
                            class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6" >
                    </div>
                      </div>


                      <div class="hidden">
                      <label for="DocStatusBClearance" class="block text-sm font-semibold leading-6 text-gray-900 mt-3">Document Status</label>
                    <div class="mt-2">
                        <input value="Pending" type="text" name="DocStatusBClearance" id="DocStatusBClearance" autocomplete="family-name" required
                            class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6" >
                    </div>
                      </div>

                      <div class="hidden">
                      <label for="UserIDBGClerance" class="block text-sm font-semibold leading-6 text-gray-900 mt-3">UserID</label>
                    <div class="mt-2">
                        <input value="<?php echo $row["ID"]?>"  type="text" name="UserIDBGClerance" id="UserIDBGClerance" autocomplete="family-name" required
                            class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6" >
                    </div>
                      </div>





                  </div>
            </form>
            <div class="bg-blue-100 p-3 rounded-md mt-4 ">
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
</div>

           
      </div>
  </div>
</div>

<div class="bg-white shadow-2xl rounded-lg p-6 mt-8">
                      
  <div class="mb-2 lg:mb-0 ">
      <h3 class="text-2xl font-bold text-blue-500 text-center">Document Request Timeline</h3>
      <span class="flex text-base font-medium text-blue-500 justify-center text-center">This is the Timeline upon Requesting Document</span>
  </div>
  <ol class="items-center sm:flex mt-4">
      <li class="relative mb-6 sm:mb-0 ">
          <div class="flex items-center justify-center">
              <div class="z-10 flex items-center justify-center w-14 h-14 bg-blue-100 rounded-full ring-0 ring-white dark:bg-blue-900 sm:ring-8 dark:ring-gray-900 shrink-0">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"  class="w-10 h-10 text-blue-800 dark:text-blue-300">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
              </div>
            
          </div>
         
          <div class="mt-3 text-center">
              <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-1">Pending Request</h3>
              <time class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">Your Document Request is under Validation</time>
          </div>
      </li>

      <li class="relative mb-6 sm:mb-0">
          <div class="flex items-center justify-center">
              <div class="z-10 flex items-center justify-center w-14 h-14 bg-blue-100 rounded-full ring-0 ring-white dark:bg-blue-900 sm:ring-8 dark:ring-gray-900 shrink-0">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10 text-blue-800 dark:text-blue-300">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12c0-1.232-.046-2.453-.138-3.662a4.006 4.006 0 0 0-3.7-3.7 48.678 48.678 0 0 0-7.324 0 4.006 4.006 0 0 0-3.7 3.7c-.017.22-.032.441-.046.662M19.5 12l3-3m-3 3-3-3m-12 3c0 1.232.046 2.453.138 3.662a4.006 4.006 0 0 0 3.7 3.7 48.656 48.656 0 0 0 7.324 0 4.006 4.006 0 0 0 3.7-3.7c.017-.22.032-.441.046-.662M4.5 12l3 3m-3-3-3 3" />
                    </svg>
              </div>
           
          </div>
          <div class="mt-3  text-center">
              <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-1">Request On-Process</h3>
              <time class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">Your Document Request is under Processing & Verification</time>
          </div>
      </li>

      <li class="relative mb-6 sm:mb-0">
          <div class="flex items-center justify-center">
              <div class="z-10 flex items-center justify-center w-14 h-14 bg-blue-100 rounded-full ring-0 ring-white dark:bg-blue-900 sm:ring-8 dark:ring-gray-900 shrink-0">
                  <svg class="w-10 h-10 text-blue-800 dark:text-blue-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" className="w-6 h-6">
                      <path strokeLinecap="round" strokeLinejoin="round" d="M10.125 2.25h-4.5c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125v-9M10.125 2.25h.375a9 9 0 0 1 9 9v.375M10.125 2.25A3.375 3.375 0 0 1 13.5 5.625v1.5c0 .621.504 1.125 1.125 1.125h1.5a3.375 3.375 0 0 1 3.375 3.375M9 15l2.25 2.25L15 12" />
                    </svg>
              </div>
             
          </div>
          <div class="mt-3  text-center">
              <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-1">Request Completed</h3>
              <time class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">Your Document Has been Verified and Ready for Realeasing</time>
          </div>
      </li>


      <li class="relative mb-6 sm:mb-0 ">
          <div class="flex items-center justify-center">
              <div class="z-10 flex items-center justify-center w-14 h-14 bg-blue-100 rounded-full ring-0 ring-white dark:bg-blue-900 sm:ring-8 dark:ring-gray-900 shrink-0">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10 text-blue-800 dark:text-blue-300">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
                    </svg>
              </div>
              
          </div>
          <div class="mt-3  text-center">
              <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-1">Document Realeasing</h3>
              <time class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">View Schedule for Document Releasing</time>
          </div>
      </li>
  </ol>
</div>
<div class=" mt-8 px-4 py-3 sm:px-6 flex align-items justify-center p-4 gap-4 flex-row">
<form method="dialog">
  <button  id="submitBClearance" class=" inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-500 hover:bg-green-600 text-base font-medium text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400  sm:w-auto sm:text-sm"> 
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-1">
        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
      </svg>
    Submit Request 
</button>
</form>
    <form method="dialog">
  <button  class="inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-500 hover:bg-red-600 text-base font-medium text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400  sm:w-auto sm:text-sm">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-1">
        <path stroke-linecap="round" stroke-linejoin="round" d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
      </svg>
    Cancel Request </button>
</form>
</div>
    
  </div>
</dialog>


<script>
  $(document).ready(function(){
    $("#submitBClearance").click(function(){
      var UserIDBGClerance = $("input[name='UserIDBGClerance']").val();
        var firstnamebrgyBClearance = $("input[name='firstnamebrgyBClearance']").val();
        var MnameBClearance = $("input[name='MnameBClearance']").val();
        var lastnameBClearance = $("input[name='lastnameBClearance']").val();
        var BusinessNameBClearance = $("input[name='BusinessNameBClearance']").val();
        var BusinessLocBClearance = $("input[name='BusinessLocBClearance']").val();
        var DateReqBClearance = $("input[name='DateReqBClearance']").val();
        var HomeAddBClearance = $("input[name='HomeAddBClearance']").val();
        var ServicetyBClearance = $("input[name='ServicetyBClearance']").val();
        var DocStatusBClearance = $("input[name='DocStatusBClearance']").val();
      



      
        // Check if any field is empty
     // Check if any field is empty
if (!firstnamebrgyBClearance || !MnameBClearance || !lastnameBClearance || !BusinessNameBClearance || !BusinessLocBClearance || !DateReqBClearance || !HomeAddBClearance || !ServicetyBClearance || !DocStatusBClearance || !UserIDBGClerance) {
    Swal.fire({
        title: 'Error!',
        text: 'Please fill out all fields for Requesting Business Clearance',
        icon: 'error',
        confirmButtonText: 'Okay',
    }).then((result) => {
        if (result.isConfirmed) {
          Businesspermit.showModal();
        }
    });
    return; // Exit the function
}
        $.post("../Backend/Insert.php",
        {
          UserIDBGClerance: UserIDBGClerance,
          firstnamebrgyBClearance: firstnamebrgyBClearance,
          MnameBClearance: MnameBClearance,
          lastnameBClearance : lastnameBClearance,
          BusinessNameBClearance: BusinessNameBClearance,
          BusinessLocBClearance: BusinessLocBClearance,
          DateReqBClearance :DateReqBClearance,
          HomeAddBClearance:  HomeAddBClearance,
          ServicetyBClearance:  ServicetyBClearance,
          DocStatusBClearance:  DocStatusBClearance
         

        },
        function(data, status){
    Swal.fire({
        title: 'Success!',
        text: 'Document Request for Business Clearance Submitted Successfully',
        icon: 'success',
        confirmButtonText: 'Monitor Document Request Status',
        onClose: () => {
            window.location.reload();
        }
    });
           // Apply custom class for light theme
            $(".swal2-popup").addClass('light-theme');
        });
    });
});
</script>


<!--Indigency modal -->

<dialog id="RequestIndigency" class="modal p-3">
  <div class="modal-box w-full max-w-6xl rounded-none">
    <div class="bg-blue-500 shadow-2xl rounded-md p-6 mb-3 w-full ">
        <div class="mb-2 lg:mb-0">
            <h3 class="text-2xl font-bold text-white text-center">BRGY-409 Document Request Management System</h3>
            <span class="flex text-base font-medium text-white justify-center text-center">Request for Certificate of Indigency Document</span>
        </div>
    </div>

    <div class="grid grid-cols-4 sm:grid-cols-12 gap-6 px-4">
        <div class="col-span-4 sm:col-span-3">
         
            <div class="bg-white shadow-2xl rounded-lg p-6 h-full">
                <div class="flex flex-col items-center">
                    

                    <svg  class="w-25 h-25  p-1" viewBox="0 0 64 64" fill="none"  xmlns="http://www.w3.org/2000/svg">
                        <path d="M50.0898 13L40.3398 3.29C40.1535 3.10526 39.9021 3.0011 39.6398 3H14.7598C13.3072 3.00264 11.9149 3.58085 10.8878 4.60797C9.86063 5.6351 9.28243 7.02743 9.27979 8.48V49.93C9.28243 51.3826 9.86063 52.7749 10.8878 53.802C11.9149 54.8292 13.3072 55.4074 14.7598 55.41H44.8998C46.3541 55.41 47.749 54.833 48.7783 53.8056C49.8076 52.7781 50.3871 51.3843 50.3898 49.93V13.75C50.3947 13.611 50.3705 13.4725 50.3189 13.3434C50.2672 13.2142 50.1892 13.0973 50.0898 13V13Z" fill="#E6E6E6"></path>
                        <path d="M50.2199 13.19L50.0899 13L40.3899 3.34005C40.2037 3.1553 39.9523 3.05115 39.6899 3.05005C39.4247 3.05005 39.1704 3.15541 38.9828 3.34294C38.7953 3.53048 38.6899 3.78483 38.6899 4.05005V13.8C38.6899 14.0653 38.7953 14.3196 38.9828 14.5072C39.1704 14.6947 39.4247 14.8 39.6899 14.8H49.4399C49.7052 14.8 49.9595 14.6947 50.147 14.5072C50.3346 14.3196 50.4399 14.0653 50.4399 13.8C50.4364 13.5779 50.359 13.3633 50.2199 13.19V13.19Z" fill="#C0BDBA"></path>
                        <path d="M39.6399 40.3799C38.1683 40.3736 36.7313 40.8267 35.5295 41.676C34.3277 42.5252 33.4208 43.7284 32.9353 45.1176C32.4499 46.5068 32.41 48.013 32.8213 49.4259C33.2326 50.8389 34.0746 52.0883 35.2299 52.9999V59.9999C35.2305 60.1943 35.2877 60.3842 35.3945 60.5465C35.5013 60.7088 35.6531 60.8365 35.8313 60.9139C36.0095 60.9913 36.2064 61.0152 36.398 60.9825C36.5895 60.9498 36.7674 60.8621 36.9099 60.7299L39.6399 58.1999L42.3699 60.7299C42.5543 60.9026 42.7972 60.9991 43.0499 60.9999C43.1869 60.9975 43.3224 60.9704 43.4499 60.9199C43.6287 60.8419 43.7809 60.7132 43.8875 60.5497C43.9941 60.3862 44.0505 60.1951 44.0499 59.9999V52.9999C45.1952 52.0843 46.028 50.8356 46.4332 49.4264C46.8384 48.0171 46.796 46.5169 46.3119 45.1327C45.8279 43.7486 44.926 42.5489 43.7308 41.6993C42.5357 40.8497 41.1062 40.3922 39.6399 40.3899V40.3799Z" fill="#FFB454"></path>
                        <path d="M39.64 43.4001C38.8341 43.3882 38.043 43.6164 37.3672 44.0557C36.6915 44.4949 36.1618 45.1254 35.8456 45.8667C35.5294 46.608 35.4409 47.4267 35.5916 48.2184C35.7422 49.0102 36.1251 49.7392 36.6914 50.3126C37.2577 50.886 37.9819 51.2779 38.7718 51.4384C39.5616 51.5988 40.3813 51.5206 41.1265 51.2136C41.8717 50.9066 42.5086 50.3848 42.9563 49.7146C43.4039 49.0443 43.6419 48.2561 43.64 47.4501C43.6375 46.3854 43.2168 45.3642 42.4687 44.6067C41.7205 43.8491 40.7046 43.4158 39.64 43.4001V43.4001Z" fill="#FFD845"></path>
                        <path d="M15 16.1799H28.1C28.3652 16.1799 28.6196 16.0746 28.8071 15.887C28.9946 15.6995 29.1 15.4451 29.1 15.1799C29.1 14.9147 28.9946 14.6604 28.8071 14.4728C28.6196 14.2853 28.3652 14.1799 28.1 14.1799H15C14.7348 14.1799 14.4804 14.2853 14.2929 14.4728C14.1054 14.6604 14 14.9147 14 15.1799C14 15.4451 14.1054 15.6995 14.2929 15.887C14.4804 16.0746 14.7348 16.1799 15 16.1799V16.1799Z" fill="#C0BDBA"></path>
                        <path d="M15 21.77H44.51C44.7752 21.77 45.0296 21.6647 45.2171 21.4771C45.4046 21.2896 45.51 21.0352 45.51 20.77C45.51 20.5048 45.4046 20.2504 45.2171 20.0629C45.0296 19.8754 44.7752 19.77 44.51 19.77H15C14.7348 19.77 14.4804 19.8754 14.2929 20.0629C14.1054 20.2504 14 20.5048 14 20.77C14 21.0352 14.1054 21.2896 14.2929 21.4771C14.4804 21.6647 14.7348 21.77 15 21.77V21.77Z" fill="#C0BDBA"></path>
                        <path d="M44.51 25.3701H15C14.7348 25.3701 14.4804 25.4755 14.2929 25.663C14.1054 25.8505 14 26.1049 14 26.3701C14 26.6353 14.1054 26.8897 14.2929 27.0772C14.4804 27.2648 14.7348 27.3701 15 27.3701H44.51C44.7752 27.3701 45.0296 27.2648 45.2171 27.0772C45.4046 26.8897 45.51 26.6353 45.51 26.3701C45.51 26.1049 45.4046 25.8505 45.2171 25.663C45.0296 25.4755 44.7752 25.3701 44.51 25.3701Z" fill="#C0BDBA"></path>
                        <path d="M44.51 31H15C14.7348 31 14.4804 31.1054 14.2929 31.2929C14.1054 31.4804 14 31.7348 14 32C14 32.2652 14.1054 32.5196 14.2929 32.7071C14.4804 32.8946 14.7348 33 15 33H44.51C44.7752 33 45.0296 32.8946 45.2171 32.7071C45.4046 32.5196 45.51 32.2652 45.51 32C45.51 31.7348 45.4046 31.4804 45.2171 31.2929C45.0296 31.1054 44.7752 31 44.51 31Z" fill="#C0BDBA"></path>
                        <path d="M44.51 36.55H15C14.7348 36.55 14.4804 36.6554 14.2929 36.8429C14.1054 37.0305 14 37.2848 14 37.55C14 37.8153 14.1054 38.0696 14.2929 38.2572C14.4804 38.4447 14.7348 38.55 15 38.55H44.51C44.7752 38.55 45.0296 38.4447 45.2171 38.2572C45.4046 38.0696 45.51 37.8153 45.51 37.55C45.51 37.2848 45.4046 37.0305 45.2171 36.8429C45.0296 36.6554 44.7752 36.55 44.51 36.55Z" fill="#C0BDBA"></path>
                        <path d="M28.36 42.1399H15C14.7348 42.1399 14.4804 42.2452 14.2929 42.4328C14.1054 42.6203 14 42.8747 14 43.1399C14 43.4051 14.1054 43.6595 14.2929 43.847C14.4804 44.0345 14.7348 44.1399 15 44.1399H28.36C28.6252 44.1399 28.8796 44.0345 29.0671 43.847C29.2546 43.6595 29.36 43.4051 29.36 43.1399C29.36 42.8747 29.2546 42.6203 29.0671 42.4328C28.8796 42.2452 28.6252 42.1399 28.36 42.1399Z" fill="#C0BDBA"></path>
                        </svg>
                    <h1 class="text-sm font-bold">Certificate of Indigency</h1>
                   
                    <p class="text-black font-normal text-center text-sm">Confirm the Privided Information & requirements before requesting the documents</p>
                  
                    <h3 class="mt-1 text-sm font-bold mb-2">Upon Requesting Document you must:</h3>
      <ul class="list-disc text-sm">
        <li class="text-green-500">Verified Resident</li>
        <li class="text-green-500">Complete Information</li>
      </ul>
                </div>
            </div>
        </div>
        <div class="col-span-4 sm:col-span-9">
            <div class="bg-white shadow-2xl rounded-lg p-6">
              
                <div class="mb-2 lg:mb-0 ">
                    <h3 class="text-2xl font-bold text-blue-500 mb-2 text-center">Confirm your Personal Information</h3>
                    <span class="flex text-base font-medium text-blue-500 justify-center text-center">This Information will apear to your Document</span>
                </div>

               <form action="ResidentsDashboard.php" method="post" class="mx-auto max-w-3xl mt-12">

                 <div class="grid grid-cols-1 gap-y-6 gap-x-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 2xl:grid-cols-3">
                    <div>
                        <label for="firstnamebrgyIndigency" class="block text-sm font-semibold leading-6 text-gray-900">First Name</label>
                        <div class="mt-2.5">
                            <input value="<?php echo $row["fname"]?>"  required="" type="text" name="firstnamebrgyIndigency" id="firstnamebrgyIndigency" autocomplete="given-name"
                                placeholder="Enter Your First Name"
                                class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    <div>
                        <label for="MnamebrgyIndigency" class="block text-sm font-semibold leading-6 text-gray-900">Middle Name</label>
                        <div class="mt-2.5">
                            <input value="<?php echo $row["Mname"]?>" required="" type="text" name="MnamebrgyIndigency" id="MnamebrgyIndigency" autocomplete="family-name"
                                placeholder="Enter Your Last Name"
                                class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    <div>
                        <label for="lastnamebrgyIndigency" class="block text-sm font-semibold leading-6 text-gray-900">Last Name</label>
                        <div class="mt-2">
                            <input  value="<?php echo $row["lname"]?>" required="" type="text" name="lastnamebrgyIndigency" id="lastnamebrgyIndigency" autocomplete="family-name"
                                placeholder="Enter Your Last Name"
                                class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                  </div>

                  <div class=" mt-3 flex flex-col sm:flex-row gap-x-6">
                    <div class="sm:flex-1">
                        <label for="DaterequestedbrgyIndigency" class="block text-sm font-semibold leading-6 text-gray-900 mt-3">Date Requested</label>
                          <div class="mt-2">
                              <input required="" type="date" name="DaterequestedbrgyIndigency" id="DaterequestedbrgyIndigency" autocomplete="family-name"
                                  placeholder="Select Birthdate"
                                  class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
                          </div>
                    </div>
                    <div class="sm:flex-1">
                        <label for="AddressbrgyIndigency" class="block text-sm font-semibold leading-6 text-gray-900 mt-3">Address</label>
                        <div class="mt-2.5">
                            <input value="<?php echo $row["Address"]?>"  required="" type="text" name="AddressbrgyIndigency" id="AddressbrgyIndigency" autocomplete="family-name"
                                placeholder="Enter Complete Address"
                                class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    
                </div>

                <div>
    <label for="PurposebrgyIndigency" class="block text-sm font-semibold leading-6 text-gray-900 mt-6">State your Purpose for Requesting Certificate of Indigency</label>
    <div class="mt-2">
        <select required name="PurposebrgyIndigency" id="PurposebrgyIndigency" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
            <option value="" disabled selected>Select your purpose</option>
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
        </select>
    </div>
</div>
              


<div class="hidden">
                    <label for="ServicetypebrgyIndigency" class="block text-sm font-semibold leading-6 text-gray-900 mt-6">Service Type</label>
                    <div class="mt-2">
                        <input value="Certificate of Indigency" type="text" name="ServicetypebrgyIndigency" id="ServicetypebrgyIndigency" autocomplete="family-name" required
                            placeholder="Ex. Employment , School Enrollment , Government Requirements , Legal Matters etc"
                            class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6" >
                    </div>
                </div>

                <div class="hidden">
                    <label for="DocStatusbrgyIndigency" class="block text-sm font-semibold leading-6 text-gray-900 mt-6">Document Status</label>
                    <div class="mt-2">
                        <input value="Pending" type="text" name="DocStatusbrgyIndigency" id="DocStatusbrgyIndigency" autocomplete="family-name" required
                            class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6" >
                    </div>
                </div>

             
                <div class="hidden">
                    <label for="UserIDbrgyIndigency" class="block text-sm font-semibold leading-6 text-gray-900 mt-6">UserID</label>
                    <div class="mt-2">
                        <input  value="<?php echo $row["ID"]?>" type="text" name="UserIDbrgyIndigency" id="UserIDbrgyIndigency" autocomplete="family-name" required
                            class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6" >
                    </div>
                </div>


              </form>

              <div class="bg-blue-100 p-3 rounded-md mt-4 ">
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
</div>





        </div>
    </div>
</div>


<div class="bg-white shadow-2xl rounded-lg p-6 mt-8">
                      
    <div class="mb-2 lg:mb-0 ">
        <h3 class="text-2xl font-bold text-blue-500 mb-2 text-center">Document Request Timeline</h3>
        <span class="flex text-base font-medium text-blue-500 justify-center text-center">This is the Timeline upon Requesting Document</span>
    </div>

    <ol class="items-center sm:flex mt-4">
        <li class="relative mb-6 sm:mb-0 ">
            <div class="flex items-center justify-center">
                <div class="z-10 flex items-center justify-center w-14 h-14 bg-blue-100 rounded-full ring-0 ring-white dark:bg-blue-900 sm:ring-8 dark:ring-gray-900 shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"  class="w-10 h-10 text-blue-800 dark:text-blue-300">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                      </svg>
                </div>
              
            </div>
           
            <div class="mt-3 text-center">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-1">Pending Request</h3>
                <time class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">Your Document Request is under Validation</time>
            </div>
        </li>

        <li class="relative mb-6 sm:mb-0">
            <div class="flex items-center justify-center">
                <div class="z-10 flex items-center justify-center w-14 h-14 bg-blue-100 rounded-full ring-0 ring-white dark:bg-blue-900 sm:ring-8 dark:ring-gray-900 shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10 text-blue-800 dark:text-blue-300">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12c0-1.232-.046-2.453-.138-3.662a4.006 4.006 0 0 0-3.7-3.7 48.678 48.678 0 0 0-7.324 0 4.006 4.006 0 0 0-3.7 3.7c-.017.22-.032.441-.046.662M19.5 12l3-3m-3 3-3-3m-12 3c0 1.232.046 2.453.138 3.662a4.006 4.006 0 0 0 3.7 3.7 48.656 48.656 0 0 0 7.324 0 4.006 4.006 0 0 0 3.7-3.7c.017-.22.032-.441.046-.662M4.5 12l3 3m-3-3-3 3" />
                      </svg>
                </div>
             
            </div>
            <div class="mt-3  text-center">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-1">Request On-Process</h3>
                <time class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">Your Document Request is under Processing & Verification</time>
            </div>
        </li>

        <li class="relative mb-6 sm:mb-0">
            <div class="flex items-center justify-center">
                <div class="z-10 flex items-center justify-center w-14 h-14 bg-blue-100 rounded-full ring-0 ring-white dark:bg-blue-900 sm:ring-8 dark:ring-gray-900 shrink-0">
                    <svg class="w-10 h-10 text-blue-800 dark:text-blue-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" className="w-6 h-6">
                        <path strokeLinecap="round" strokeLinejoin="round" d="M10.125 2.25h-4.5c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125v-9M10.125 2.25h.375a9 9 0 0 1 9 9v.375M10.125 2.25A3.375 3.375 0 0 1 13.5 5.625v1.5c0 .621.504 1.125 1.125 1.125h1.5a3.375 3.375 0 0 1 3.375 3.375M9 15l2.25 2.25L15 12" />
                      </svg>
                </div>
               
            </div>
            <div class="mt-3  text-center">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-1">Request Completed</h3>
                <time class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">Your Document Has been Verified and Ready for Realeasing</time>
            </div>
        </li>


        <li class="relative mb-6 sm:mb-0 ">
            <div class="flex items-center justify-center">
                <div class="z-10 flex items-center justify-center w-14 h-14 bg-blue-100 rounded-full ring-0 ring-white dark:bg-blue-900 sm:ring-8 dark:ring-gray-900 shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10 text-blue-800 dark:text-blue-300">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
                      </svg>
                </div>
                
            </div>
            <div class="mt-3  text-center">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-1">Document Realeasing</h3>
                <time class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">View Schedule for Document Releasing</time>
            </div>
        </li>
    </ol>

</div>


<div class=" mt-8 px-4 py-3 sm:px-6 flex align-items justify-center p-4 gap-4 flex-row">
<form method="dialog">
<button id="submitbrgyIndigency" class=" inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-500 hover:bg-green-600 text-base font-medium text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400  sm:w-auto sm:text-sm"> 
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-1">
        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
      </svg>
    Submit Request 
</form>
    <form method="dialog">
  <button  class="inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-500 hover:bg-red-600 text-base font-medium text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400  sm:w-auto sm:text-sm">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-1">
        <path stroke-linecap="round" stroke-linejoin="round" d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
      </svg>
    Cancel Request </button>
</form>
</div>
    
  </div>
</dialog>



<script>
  $(document).ready(function(){
    $("#submitbrgyIndigency").click(function(){
        var UserIDbrgyIndigency = $("input[name='UserIDbrgyIndigency']").val();
        var firstnamebrgyIndigency = $("input[name='firstnamebrgyIndigency']").val();
        var MnamebrgyIndigency = $("input[name='MnamebrgyIndigency']").val();
        var lastnamebrgyIndigency = $("input[name='lastnamebrgyIndigency']").val();
        var ServicetypebrgyIndigency = $("input[name='ServicetypebrgyIndigency']").val();
        var DaterequestedbrgyIndigency = $("input[name='DaterequestedbrgyIndigency']").val();
        var AddressbrgyIndigency = $("input[name='AddressbrgyIndigency']").val();
        var PurposebrgyIndigency = $("#PurposebrgyIndigency").val();
        var DocStatusbrgyIndigency = $("input[name='DocStatusbrgyIndigency']").val();

if (!UserIDbrgyIndigency || !firstnamebrgyIndigency || !MnamebrgyIndigency || !lastnamebrgyIndigency || !ServicetypebrgyIndigency || !DaterequestedbrgyIndigency || !AddressbrgyIndigency || !PurposebrgyIndigency || !DocStatusbrgyIndigency) {
    Swal.fire({
        title: 'Error!',
        text: 'Please fill out all fields for Requesting Certificate of Indigency',
        icon: 'error',
        confirmButtonText: 'Okay',
    }).then((result) => {
        if (result.isConfirmed) {
          RequestIndigency.showModal();
        }
    });
    return; // Exit the function
}
        $.post("../Backend/Insert.php",
        {
          UserIDbrgyIndigency: UserIDbrgyIndigency,
          firstnamebrgyIndigency: firstnamebrgyIndigency,
          MnamebrgyIndigency: MnamebrgyIndigency,
          lastnamebrgyIndigency: lastnamebrgyIndigency,
          ServicetypebrgyIndigency: ServicetypebrgyIndigency,
          DaterequestedbrgyIndigency: DaterequestedbrgyIndigency,
          AddressbrgyIndigency : AddressbrgyIndigency ,
          PurposebrgyIndigency:  PurposebrgyIndigency,
          DocStatusbrgyIndigency:  DocStatusbrgyIndigency


        },
        function(data, status){
    Swal.fire({
        title: 'Success!',
        text: 'Document Request for Certificate of Indigency Submitted Successfully',
        icon: 'success',
        confirmButtonText: 'Monitor Document Request Status',
        onClose: () => {
            window.location.reload();
        }
    });
           // Apply custom class for light theme
            $(".swal2-popup").addClass('light-theme');
        });
    });
});
</script>




<!--Certi of Recidency -->

<dialog id="RequestRecidency" class="modal p-3">
  <div class="modal-box w-full max-w-6xl rounded-none">
    <div class="bg-blue-500 shadow-2xl rounded-md p-6 mb-3 ">
        <div class="mb-2 lg:mb-0">
            <h3 class="text-2xl font-bold text-white text-center">BRGY-409 Document Request Management System</h3>
            <span class="flex text-base font-medium text-white justify-center text-center">Request for Certificate of Recidency Document</span>
        </div>
    </div>

    <div class="grid grid-cols-4 sm:grid-cols-12 gap-6 px-4">
    <div class="col-span-4 sm:col-span-3">
     
        <div class="bg-white shadow-2xl rounded-lg p-6 h-full">
            <div class="flex flex-col items-center">
              <svg class="w-25 h-25  p-1" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns="http://www.w3.org/2000/svg"  xmlns:cc="http://creativecommons.org/ns#" xmlns:dc="http://purl.org/dc/elements/1.1/" fill="none" viewBox="0 0 24 24"  className="w-6 h-6">
                <g transform="translate(0 -1028.4)">
                 <path d="m5 1030.4c-1.1046 0-2 0.9-2 2v8 4 6c0 1.1 0.8954 2 2 2h14c1.105 0 2-0.9 2-2v-6-4-4l-6-6h-10z" fill="#95a5a6"></path>
                 <path d="m5 1029.4c-1.1046 0-2 0.9-2 2v8 4 6c0 1.1 0.8954 2 2 2h14c1.105 0 2-0.9 2-2v-6-4-4l-6-6h-10z" fill="#bdc3c7"></path>
                 <path d="m21 1035.4-6-6v4c0 1.1 0.895 2 2 2h4z" fill="#95a5a6"></path>
                 <path d="m6 8v1h12v-1h-12zm0 3v1h12v-1h-12zm0 3v1h12v-1h-12zm0 3v1h12v-1h-12z" transform="translate(0 1028.4)" fill="#95a5a6"></path>
                </g>
               </svg>
                <h1 class="text-sm font-bold">Certificate of Residency</h1>
               
                <p class="text-black font-normal text-center text-sm">Confirm the Privided Information & requirements before requesting the documents</p>
              
                <h3 class="mt-1 text-sm font-bold mb-2">Upon Requesting Document you must:</h3>
  <ul class="list-disc text-sm">
    <li class="text-green-500">Verified Resident</li>
    <li class="text-green-500">Complete Information</li>
  </ul>
            </div>
        </div>
    </div>
    <div class="col-span-4 sm:col-span-9">
        <div class="bg-white shadow-2xl rounded-lg p-6">
          
            <div class="mb-2 lg:mb-0 ">
                <h3 class="text-2xl font-bold text-blue-500 mb-2 text-center">Confirm your Personal Information</h3>
                <span class="flex text-base font-medium text-blue-500 justify-center text-center">This Information will apear to your Document</span>
            </div>
           
           <form action="ResidentsDashboard.php" method="post" class="mx-auto max-w-3xl mt-12">

             <div class="grid grid-cols-1 gap-y-6 gap-x-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 2xl:grid-cols-3">
                <div>
                    <label for="firstnamebrgyResidency" class="block text-sm font-semibold leading-6 text-gray-900">First Name</label>
                    <div class="mt-2.5">
                        <input value="<?php echo $row["fname"]?>" required="" type="text" name="firstnamebrgyResidency" id="firstnamebrgyResidency" autocomplete="given-name"
                            placeholder="Enter Your First Name"
                            class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
                <div>
                    <label for="MnamebrgyResidency" class="block text-sm font-semibold leading-6 text-gray-900">Middle Name</label>
                    <div class="mt-2.5">
                        <input value="<?php echo $row["Mname"]?>" required="" type="text" name="MnamebrgyResidency" id="MnamebrgyResidency" autocomplete="family-name"
                            placeholder="Enter Your Last Name"
                            class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
                <div>
                    <label for="lastnamebrgyResidency" class="block text-sm font-semibold leading-6 text-gray-900">Last Name</label>
                    <div class="mt-2">
                        <input value="<?php echo $row["lname"]?>" required="" type="text" name="lastnamebrgyResidency" id="lastnamebrgyResidency" autocomplete="family-name"
                            placeholder="Enter Your Last Name"
                            class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
                
              </div>



              <div class=" mt-3 flex flex-col sm:flex-row gap-x-6">
                <div class="sm:flex-1">
                    <label for="DaterequestedbrgyResidency" class="block text-sm font-semibold leading-6 text-gray-900 mt-3">Date Requested</label>
                      <div class="mt-2">
                          <input required type="date" name="DaterequestedbrgyResidency" id="DaterequestedbrgyResidency" autocomplete="family-name"
                              placeholder="Select Birthdate"
                              class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
                      </div>
                </div>
                <div class="sm:flex-1">
                    <label for="AddressdbrgyResidency" class="block text-sm font-semibold leading-6 text-gray-900 mt-3">Address</label>
                    <div class="mt-2.5">
                        <input value="<?php echo $row["Address"]?>" required="" type="text" name="AddressdbrgyResidency" id="AddressdbrgyResidency" autocomplete="family-name"
                            placeholder="Enter Complete Address"
                            class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
                
            </div>


            <div>
    <label for="PurposebrgyResidency" class="block text-sm font-semibold leading-6 text-gray-900 mt-6">State your Purpose for Requesting Certificate of Residency</label>
    <div class="mt-2">
        <select required name="PurposebrgyResidency" id="PurposebrgyResidency" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
            <option value="" disabled selected>Select your purpose</option>
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
        </select>
    </div>
</div>

                
                <div class="hidden" >
                    <label for="ServicetypebrgyResidency" class="block text-sm font-semibold leading-6 text-gray-900 mt-6">Service Type</label>
                    <div class="mt-2">
                        <input value="Certificate of Residency" type="text" name="ServicetypebrgyResidency" id="ServicetypebrgyResidency" autocomplete="family-name" required
                            placeholder="Ex. Employment , School Enrollment , Government Requirements , Legal Matters etc"
                            class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6" >
                    </div>
                </div>


                <div class="hidden" >
                    <label for="DocumentStatbrgyResidency" class="block text-sm font-semibold leading-6 text-gray-900 mt-6">Document Status</label>
                    <div class="mt-2">
                        <input value="Pending" type="text" name="DocumentStatbrgyResidency" id="DocumentStatbrgyResidency" autocomplete="family-name" required
                            class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6" >
                    </div>
                </div>

                <div class="hidden">
                    <label for="UserIDbrgyResidency" class="block text-sm font-semibold leading-6 text-gray-900 mt-6">UserID</label>
                    <div class="mt-2">
                        <input value="<?php echo $row["ID"]?>" type="text" name="UserIDbrgyResidency" id="UserIDbrgyResidency" autocomplete="family-name" required
                            class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6" >
                    </div>
                </div>
                
                </form>
           


                <div class="bg-blue-100 p-3 rounded-md mt-4 ">
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
            
</div>


         
    </div>
</div>
</div>

<div class="bg-white shadow-2xl rounded-lg p-6 mt-8">
          
<div class="mb-2 lg:mb-0 ">
    <h3 class="text-2xl font-bold text-blue-500 mb-2 text-center">Document Request Timeline</h3>
    <span class="flex text-base font-medium text-blue-500 justify-center text-center">This is the Timeline upon Requesting Document</span>
</div>
<ol class="items-center sm:flex mt-4">
    <li class="relative mb-6 sm:mb-0 ">
        <div class="flex items-center justify-center">
            <div class="z-10 flex items-center justify-center w-14 h-14 bg-blue-100 rounded-full ring-0 ring-white dark:bg-blue-900 sm:ring-8 dark:ring-gray-900 shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"  class="w-10 h-10 text-blue-800 dark:text-blue-300">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                  </svg>
            </div>
          
        </div>
       
        <div class="mt-3 text-center">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-1">Pending Request</h3>
            <time class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">Your Document Request is under Validation</time>
        </div>
    </li>

    <li class="relative mb-6 sm:mb-0">
        <div class="flex items-center justify-center">
            <div class="z-10 flex items-center justify-center w-14 h-14 bg-blue-100 rounded-full ring-0 ring-white dark:bg-blue-900 sm:ring-8 dark:ring-gray-900 shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10 text-blue-800 dark:text-blue-300">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12c0-1.232-.046-2.453-.138-3.662a4.006 4.006 0 0 0-3.7-3.7 48.678 48.678 0 0 0-7.324 0 4.006 4.006 0 0 0-3.7 3.7c-.017.22-.032.441-.046.662M19.5 12l3-3m-3 3-3-3m-12 3c0 1.232.046 2.453.138 3.662a4.006 4.006 0 0 0 3.7 3.7 48.656 48.656 0 0 0 7.324 0 4.006 4.006 0 0 0 3.7-3.7c.017-.22.032-.441.046-.662M4.5 12l3 3m-3-3-3 3" />
                  </svg>
            </div>
         
        </div>
        <div class="mt-3  text-center">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-1">Request On-Process</h3>
            <time class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">Your Document Request is under Processing & Verification</time>
        </div>
    </li>

    <li class="relative mb-6 sm:mb-0">
        <div class="flex items-center justify-center">
            <div class="z-10 flex items-center justify-center w-14 h-14 bg-blue-100 rounded-full ring-0 ring-white dark:bg-blue-900 sm:ring-8 dark:ring-gray-900 shrink-0">
                <svg class="w-10 h-10 text-blue-800 dark:text-blue-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" className="w-6 h-6">
                    <path strokeLinecap="round" strokeLinejoin="round" d="M10.125 2.25h-4.5c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125v-9M10.125 2.25h.375a9 9 0 0 1 9 9v.375M10.125 2.25A3.375 3.375 0 0 1 13.5 5.625v1.5c0 .621.504 1.125 1.125 1.125h1.5a3.375 3.375 0 0 1 3.375 3.375M9 15l2.25 2.25L15 12" />
                  </svg>
            </div>
           
        </div>
        <div class="mt-3  text-center">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-1">Request Completed</h3>
            <time class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">Your Document Has been Verified and Ready for Realeasing</time>
        </div>
    </li>


    <li class="relative mb-6 sm:mb-0 ">
        <div class="flex items-center justify-center">
            <div class="z-10 flex items-center justify-center w-14 h-14 bg-blue-100 rounded-full ring-0 ring-white dark:bg-blue-900 sm:ring-8 dark:ring-gray-900 shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10 text-blue-800 dark:text-blue-300">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
                  </svg>
            </div>
            
        </div>
        <div class="mt-3  text-center">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-1">Document Realeasing</h3>
            <time class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">View Schedule for Document Releasing</time>
        </div>
    </li>
</ol>
</div>


<div class=" mt-8 px-4 py-3 sm:px-6 flex align-items justify-center p-4 gap-4 flex-row">
<form method="dialog">
<button id="submitbrgyResidency"  class=" inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-500 hover:bg-green-600 text-base font-medium text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400  sm:w-auto sm:text-sm"> 
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-1">
        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
      </svg>
    Submit Request 
</button>
</form>
    <form method="dialog">
  <button  class="inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-500 hover:bg-red-600 text-base font-medium text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400  sm:w-auto sm:text-sm">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-1">
        <path stroke-linecap="round" stroke-linejoin="round" d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
      </svg>
    Cancel Request </button>
</form>
</div>
    
  </div>
</dialog>




<script>
  $(document).ready(function(){
    $("#submitbrgyResidency").click(function(){

        var UserIDbrgyResidency = $("input[name='UserIDbrgyResidency']").val();
        var firstnamebrgyResidency = $("input[name='firstnamebrgyResidency']").val();
        var MnamebrgyResidency = $("input[name='MnamebrgyResidency']").val();
        var lastnamebrgyResidency = $("input[name='lastnamebrgyResidency']").val();
        var ServicetypebrgyResidency = $("input[name='ServicetypebrgyResidency']").val();
        var DaterequestedbrgyResidency = $("input[name='DaterequestedbrgyResidency']").val();
        var AddressdbrgyResidency = $("input[name='AddressdbrgyResidency']").val();
        var PurposebrgyResidency = $("#PurposebrgyResidency").val();
        var DocumentStatbrgyResidency = $("input[name='DocumentStatbrgyResidency']").val();
        // Check if any field is empty
     // Check if any field is empty
if (!UserIDbrgyResidency || !firstnamebrgyResidency || !MnamebrgyResidency || !lastnamebrgyResidency || !ServicetypebrgyResidency || !DaterequestedbrgyResidency || !AddressdbrgyResidency || !PurposebrgyResidency || !DocumentStatbrgyResidency) {
    Swal.fire({
        title: 'Error!',
        text: 'Please fill out all fields for Requesting Certificate of Residents',
        icon: 'error',
        confirmButtonText: 'Okay',
    }).then((result) => {
        if (result.isConfirmed) {
            RequestRecidency.showModal();
        }
    });
    return; // Exit the function
}



        $.post("../Backend/Insert.php",
        {
          UserIDbrgyResidency: UserIDbrgyResidency,
          firstnamebrgyResidency: firstnamebrgyResidency,
          MnamebrgyResidency: MnamebrgyResidency,
          lastnamebrgyResidency: lastnamebrgyResidency,
          ServicetypebrgyResidency: ServicetypebrgyResidency,
          DaterequestedbrgyResidency: DaterequestedbrgyResidency,
          AddressdbrgyResidency: AddressdbrgyResidency,
          PurposebrgyResidency:  PurposebrgyResidency,
          DocumentStatbrgyResidency:  DocumentStatbrgyResidency
        },
        function(data, status){
            Swal.fire({
                title: 'Success!',
                text: 'Document Request for Certificate of Residency Submitted Successfully',
                icon: 'success',
                confirmButtonText: 'Monitor Document Request Status',
        onClose: () => {
            window.location.reload();
        }
            });
            // Apply custom class for light theme
            $(".swal2-popup").addClass('light-theme');
        });
    });
});

</script>




<!--Barangfay ID modal -->

<dialog id="RequestbrgyID" class="modal p-3">
  <div class="modal-box w-full max-w-6xl rounded-none">
    <div class="bg-blue-500 shadow-2xl rounded-md p-6 mb-3 ">
        <div class="mb-2 lg:mb-0">
            <h3 class="text-2xl font-bold text-white text-center">BRGY-409 Document Request Management System</h3>
            <span class="flex text-base font-medium text-white justify-center text-center">Request for Barangay-Resident Identification (ID)</span>
        </div>
    </div>

    <div class="grid grid-cols-4 sm:grid-cols-12 gap-6 px-4">
      <div class="col-span-4 sm:col-span-3">
       
          <div class="bg-white shadow-2xl rounded-lg p-6 h-full">
              <div class="flex flex-col items-center">
                <svg class="w-25 h-25 " xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"  className="w-6 h-6" xmlns:cc="http://creativecommons.org/ns#" xmlns:dc="http://purl.org/dc/elements/1.1/">
                  <g transform="translate(0 -1028.4)">
                   <path d="m3 1033.4c-1.1046 0-2 0.9-2 2v10 1c0 1.1 0.8954 2 2 2h16 2c1.105 0 2-0.9 2-2v-1-9-1c0-1.1-0.895-2-2-2h-2-14-2z" fill="#95a5a6"></path>
                   <path d="m3 1032.4c-1.1046 0-2 0.9-2 2v10 1c0 1.1 0.8954 2 2 2h16 2c1.105 0 2-0.9 2-2v-1-9-1c0-1.1-0.895-2-2-2h-2-14-2z" fill="#bdc3c7"></path>
                   <path d="m13 1035.4v1h4v-1h-4zm0 2v1h7v-1h-7zm0 2v1h7v-1h-7z" fill="#7f8c8d"></path>
                   <path d="m4 6c-0.5523 0-1 0.4477-1 1v9c0 0.552 0.4477 1 1 1h6c0.552 0 1-0.448 1-1v-9c0-0.5523-0.448-1-1-1h-6z" transform="translate(0 1028.4)" fill="#ecf0f1"></path>
                   <path d="m7 1035.5c-0.6655 0-1.2798 0.4-1.7324 0.8-0.3868 0.5-0.6104 1-0.7546 1.6-0.4216 0.4-0.3708 1-0.0589 1.4 0.3297 0.4 0.3253 0.9 0.5757 1.4 0.1042 0.4 0.6974 0.7 0.6972 1.1 0.1491 0.7-0.7098 0.5-1.0969 0.7-0.5399 0.2-1.2466 0.4-1.6286 0.8 0.04 0.6-0.1095 1.2 0.125 1.7 0.2 0.4 0.7004 0.4 1.1035 0.4h6.208c0.459-0.2 0.621-0.8 0.562-1.2v-1c-0.705-0.3-1.3602-0.7-2.1396-0.9-0.4624 0-0.6621-0.3-0.6986-0.7 0.6429-0.5 0.9832-1.3 1.2132-2.1 0.3596-0.3 0.655-1.1 0.1842-1.5-0.2308-0.4-0.2642-0.9-0.5832-1.4-0.4221-0.6-1.1761-1.1-1.976-1.1z" fill="#34495e"></path>
                  </g>
                 </svg>
                  <h1 class="text-sm font-bold">Barangay ID</h1>
                 
                  <p class="text-black font-normal text-center text-sm">Confirm the Privided Information & requirements before requesting the documents</p>
                
                  <h3 class="mt-1 text-sm font-bold mb-2">Upon Requesting Document you must:</h3>
    <ul class="list-disc text-sm">
      <li class="text-green-500">Verified Resident</li>
      <li class="text-green-500">Complete Information</li>
    </ul>
              </div>


              <div class="bg-blue-100 p-3 rounded-md mt-4 ">
<div class="flex items-center">
  <h2 class="text-lg font-semibold mr-1">Note</h2>
  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
  </svg>
</div>
              <p class="text-center">Review Information</p>
              <ul class="list-disc ml-6 mb-4">
                <li>Double check your Information</li>
                <li>Check Input Typography</li>
                <li>Fill up all Fields</li>
              </ul>
</div>




          </div>

      </div>
      <div class="col-span-4 sm:col-span-9">
          <div class="bg-white shadow-2xl rounded-lg p-6 h-full">
            
              <div class="mb-2 lg:mb-0 ">
                  <h3 class="text-2xl font-bold text-blue-500 mb-2 text-center">Confirm your Personal Information</h3>
                  <span class="flex text-base font-medium text-blue-500 justify-center text-center">This Information will apear to your Document</span>
              </div>

             <form action="ResidentsDashboard.php" method="post"  class="mx-auto max-w-3xl mt-8">

               <div class="grid grid-cols-1 gap-y-6 gap-x-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 2xl:grid-cols-3">
                  <div>
                      <label for="firstnamebrgyID" class="block text-sm font-semibold leading-6 text-gray-900">First Name</label>
                      <div class="mt-2.5">
                          <input value="<?php echo $row["fname"]?>" required="" type="text" name="firstnamebrgyID" id="firstnamebrgyID" autocomplete="given-name"
                              placeholder="Enter Your First Name"
                              class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
                      </div>
                  </div>
                  <div>
                      <label for="MnamebrgyID" class="block text-sm font-semibold leading-6 text-gray-900">Middle Name</label>
                      <div class="mt-2.5">
                          <input value="<?php echo $row["Mname"]?>" required="" type="text" name="MnamebrgyID" id="MnamebrgyID" autocomplete="family-name"
                              placeholder="Enter Your Last Name"
                              class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
                      </div>
                  </div>
                  <div>
                      <label for="lastnamebrgyID" class="block text-sm font-semibold leading-6 text-gray-900">Last Name</label>
                      <div class="mt-2">
                          <input value="<?php echo $row["lname"]?>" required="" type="text" name="lastnamebrgyID" id="lastnamebrgyID" autocomplete="family-name"
                              placeholder="Enter Your Last Name"
                              class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
                      </div>
                  </div>
                  
                  <div>
                    <label for="DateofbirthbrgyID" class="block text-sm font-semibold leading-6 text-gray-900">Date of Birth</label>
                    <div class="mt-2.5">
                        <input  value="<?php echo $row["Dateofbirth"]?>" required="" type="date" name="DateofbirthbrgyID" id="DateofbirthbrgyID" autocomplete="given-name"
                            placeholder="Enter Your First Name"
                            class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
                <div>
                    <label for="PlaceofBirthbrgyID" class="block text-sm font-semibold leading-6 text-gray-900">Place of Birth</label>
                    <div class="mt-2.5">
                        <input value="<?php echo $row["PlaceofBirth"]?>" required="" type="text" name="PlaceofBirthbrgyID" id="PlaceofBirthbrgyID" autocomplete="family-name"
                            placeholder="Enter Place of Birth"
                            class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
                    </div>
                </div>


        <div>
                    <label for="CivilStatisbrgyID" class="block text-sm font-semibold leading-6 text-gray-900">Civil Status</label>
                    <div class="mt-2.5">
                        <input value="<?php echo $row["CivilStatus"]?>" required="" type="text" name="CivilStatisbrgyID" id="CivilStatisbrgyID" autocomplete="family-name"
                            placeholder="Enter Place of Birth"
                            class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
                    </div>
                </div>





                </div>
                <div class=" mt-3 flex flex-col sm:flex-row gap-x-6">
                  <div class="sm:flex-1">
                      <label for="SSSGSISbrgyID" class="block text-sm font-semibold leading-6 text-gray-900 mt-3">SSS/GSIS</label>
                        <div class="mt-2">
                            <input  required="" type="text" name="SSSGSISbrgyID" id="SSSGSISbrgyID" autocomplete="family-name"
                                placeholder="Enter SSS/GSIS"
                                class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
                        </div>
                  </div>
                  
                  <div class="sm:flex-1">
                      <label for="DaterequestedbrgyID" class="block text-sm font-semibold leading-6 text-gray-900 mt-3">Date Requested</label>
                      <div class="mt-2">
                          <input required="" type="date" name="DaterequestedbrgyID" id="DaterequestedbrgyID" autocomplete="family-name"
                              placeholder="Select Date"
                              class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
                      </div>
                  </div>
                  
              </div>


              <div class="sm:flex-1">
                  <label for="AddressbrgyID" class="block text-sm font-semibold leading-6 text-gray-900 mt-3">Address</label>
                  <div class="mt-2.5">
                      <input value="<?php echo $row["Address"]?>" required="" type="text" name="AddressbrgyID" id="AddressbrgyID" autocomplete="family-name"
                          placeholder="Enter Complete Address"
                          class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
                  </div>
              </div>
              

              <div class="mb-2 mt-4 lg:mb-0 ">
  <h3 class="text-2xl font-bold text-blue-500 mb-2 text-center">Person to Contact in Case of Emergency</h3>
  <span class="flex text-base font-medium text-blue-500 justify-center text-center">Provide a Emergency Contact Person</span>

  <div class="mt-4 grid grid-cols-1 gap-y-6 gap-x-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 2xl:grid-cols-3">
    <div>
        <label for="ContactpersonNamebrgyID" class="block text-sm font-semibold leading-6 text-gray-900">Full Name</label>
        <div class="mt-2.5">
            <input required="" type="text" name="ContactpersonNamebrgyID" id="ContactpersonNamebrgyID" autocomplete="given-name"
                placeholder="Ex. Juan"
                class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
        </div>
    </div>
    <div>
        <label for="ContactpersonAddressbrgyID" class="block text-sm font-semibold leading-6 text-gray-900">Address</label>
        <div class="mt-2.5">
            <input required="" type="text" name="ContactpersonAddressbrgyID" id="ContactpersonAddressbrgyID" autocomplete="family-name"
            placeholder="Ex. 123 Purok Manila City"
                class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
        </div>
    </div>
    <div>
        <label for="ContactpersonnumberbrgyID" class="block text-sm font-semibold leading-6 text-gray-900">Contact Number</label>
        <div class="mt-2">
            <input required="" type="number" name="ContactpersonnumberbrgyID" id="ContactpersonnumberbrgyID" autocomplete="family-name"
            placeholder="Ex. (+63)-000-0000"
                class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
        </div>
    </div>

    <div class="hidden">
        <label for="ServicetypebrgyID" class="block text-sm font-semibold leading-6 text-gray-900">Service Type</label>
        <div class="mt-2">
            <input value="Barangay Identification" required="" type="text" name="ServicetypebrgyID" id="ServicetypebrgyID" autocomplete="family-name"
                placeholder="Enter Service Type"
                class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
        </div>
    </div>

    <div class="hidden">
        <label for="DocStatbrgyID" class="block text-sm font-semibold leading-6 text-gray-900">Document Status</label>
        <div class="mt-2">
            <input value="Pending" required="" type="text" name="DocStatbrgyID" id="DocStatbrgyID" autocomplete="family-name"
                
                class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
        </div>
    </div>

    <div class="hidden">
        <label for="UserIDbrgyID" class="block text-sm font-semibold leading-6 text-gray-900">UserID</label>
        <div class="mt-2">
            <input value="<?php echo $row["ID"]?>" required="" type="text" name="UserIDbrgyID" id="UserIDbrgyID" autocomplete="family-name"
                class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
        </div>
    </div>




  </div>
</div>

            </form>
      </div>
  </div>
</div>



<div class="bg-white shadow-2xl rounded-lg p-6 mt-8">
            
  <div class="mb-2 lg:mb-0 ">
      <h3 class="text-2xl font-bold text-blue-500 mb-2 text-center">Document Request Timeline</h3>
      <span class="flex text-base font-medium text-blue-500 justify-center text-center">This is the Timeline upon Requesting Document</span>
  </div>
  <ol class="items-center sm:flex mt-4">
      <li class="relative mb-6 sm:mb-0 ">
          <div class="flex items-center justify-center">
              <div class="z-10 flex items-center justify-center w-14 h-14 bg-blue-100 rounded-full ring-0 ring-white dark:bg-blue-900 sm:ring-8 dark:ring-gray-900 shrink-0">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"  class="w-10 h-10 text-blue-800 dark:text-blue-300">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
              </div>
            
          </div>
         
          <div class="mt-3 text-center">
              <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-1">Pending Request</h3>
              <time class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">Your Document Request is under Validation</time>
          </div>
      </li>

      <li class="relative mb-6 sm:mb-0">
          <div class="flex items-center justify-center">
              <div class="z-10 flex items-center justify-center w-14 h-14 bg-blue-100 rounded-full ring-0 ring-white dark:bg-blue-900 sm:ring-8 dark:ring-gray-900 shrink-0">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10 text-blue-800 dark:text-blue-300">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12c0-1.232-.046-2.453-.138-3.662a4.006 4.006 0 0 0-3.7-3.7 48.678 48.678 0 0 0-7.324 0 4.006 4.006 0 0 0-3.7 3.7c-.017.22-.032.441-.046.662M19.5 12l3-3m-3 3-3-3m-12 3c0 1.232.046 2.453.138 3.662a4.006 4.006 0 0 0 3.7 3.7 48.656 48.656 0 0 0 7.324 0 4.006 4.006 0 0 0 3.7-3.7c.017-.22.032-.441.046-.662M4.5 12l3 3m-3-3-3 3" />
                    </svg>
              </div>
           
          </div>
          <div class="mt-3  text-center">
              <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-1">Request On-Process</h3>
              <time class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">Your Document Request is under Processing & Verification</time>
          </div>
      </li>

      <li class="relative mb-6 sm:mb-0">
          <div class="flex items-center justify-center">
              <div class="z-10 flex items-center justify-center w-14 h-14 bg-blue-100 rounded-full ring-0 ring-white dark:bg-blue-900 sm:ring-8 dark:ring-gray-900 shrink-0">
                  <svg class="w-10 h-10 text-blue-800 dark:text-blue-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" className="w-6 h-6">
                      <path strokeLinecap="round" strokeLinejoin="round" d="M10.125 2.25h-4.5c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125v-9M10.125 2.25h.375a9 9 0 0 1 9 9v.375M10.125 2.25A3.375 3.375 0 0 1 13.5 5.625v1.5c0 .621.504 1.125 1.125 1.125h1.5a3.375 3.375 0 0 1 3.375 3.375M9 15l2.25 2.25L15 12" />
                    </svg>
              </div>
             
          </div>
          <div class="mt-3  text-center">
              <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-1">Request Completed</h3>
              <time class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">Your Document Has been Verified and Ready for Realeasing</time>
          </div>
      </li>


      <li class="relative mb-6 sm:mb-0 ">
          <div class="flex items-center justify-center">
              <div class="z-10 flex items-center justify-center w-14 h-14 bg-blue-100 rounded-full ring-0 ring-white dark:bg-blue-900 sm:ring-8 dark:ring-gray-900 shrink-0">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10 text-blue-800 dark:text-blue-300">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
                    </svg>
              </div>
              
          </div>
          <div class="mt-3  text-center">
              <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-1">Document Realeasing</h3>
              <time class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">View Schedule for Document Releasing</time>
          </div>
      </li>
  </ol>
</div>




<div class=" mt-8 px-4 py-3 sm:px-6 flex align-items justify-center p-4 gap-4 flex-row">
<form method="dialog">
<button id="submitBarangayID" class=" inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-500 hover:bg-green-600 text-base font-medium text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400  sm:w-auto sm:text-sm"> 
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-1">
        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
      </svg>
    Submit Request 
</button>
</form>
    <form method="dialog">
  <button  class="inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-500 hover:bg-red-600 text-base font-medium text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400  sm:w-auto sm:text-sm">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-1">
        <path stroke-linecap="round" stroke-linejoin="round" d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
      </svg>
    Cancel Request </button>
</form>
</div>
    
  </div>
</dialog>

<script>
  $(document).ready(function(){
    $("#submitBarangayID").click(function(){
        var UserIDbrgyID = $("input[name='UserIDbrgyID']").val();
        var firstnamebrgyID = $("input[name='firstnamebrgyID']").val();
        var MnamebrgyID = $("input[name='MnamebrgyID']").val();
        var lastnamebrgyID = $("input[name='lastnamebrgyID']").val();
        var DateofbirthbrgyID = $("input[name='DateofbirthbrgyID']").val();
        var PlaceofBirthbrgyID = $("input[name='PlaceofBirthbrgyID']").val();
        var CivilStatisbrgyID = $("input[name='CivilStatisbrgyID']").val();
        var SSSGSISbrgyID = $("input[name='SSSGSISbrgyID']").val();
        var DaterequestedbrgyID = $("input[name='DaterequestedbrgyID']").val();
        var AddressbrgyID = $("input[name='AddressbrgyID']").val();
        var ContactpersonNamebrgyID = $("input[name='ContactpersonNamebrgyID']").val();
        var ContactpersonAddressbrgyID = $("input[name='ContactpersonAddressbrgyID']").val();
        var ContactpersonnumberbrgyID = $("input[name='ContactpersonnumberbrgyID']").val();
        var ServicetypebrgyID = $("input[name='ServicetypebrgyID']").val();
        var DocStatbrgyID = $("input[name='DocStatbrgyID']").val();

      
        // Check if any field is empty
     // Check if any field is empty
if (!UserIDbrgyID || !firstnamebrgyID || !MnamebrgyID || !lastnamebrgyID || !DateofbirthbrgyID || !PlaceofBirthbrgyID || !CivilStatisbrgyID || !SSSGSISbrgyID || !DaterequestedbrgyID || !AddressbrgyID || !ContactpersonNamebrgyID || !ContactpersonAddressbrgyID || !ContactpersonnumberbrgyID || !ServicetypebrgyID || !DocStatbrgyID) {
    Swal.fire({
        title: 'Error!',
        text: 'Please fill out all fields for Requesting Barangay Identification Card',
        icon: 'error',
        confirmButtonText: 'Okay',
    }).then((result) => {
        if (result.isConfirmed) {
          RequestbrgyID.showModal();
        }
    });
    return; // Exit the function
}
        $.post("../Backend/Insert.php",
        {
          UserIDbrgyID: UserIDbrgyID,
          firstnamebrgyID: firstnamebrgyID,
          MnamebrgyID: MnamebrgyID,
          lastnamebrgyID: lastnamebrgyID,
          DateofbirthbrgyID: DateofbirthbrgyID,
          PlaceofBirthbrgyID: PlaceofBirthbrgyID,
          CivilStatisbrgyID : CivilStatisbrgyID ,
          SSSGSISbrgyID:  SSSGSISbrgyID,
          DaterequestedbrgyID: DaterequestedbrgyID,
          AddressbrgyID: AddressbrgyID,
          ContactpersonNamebrgyID : ContactpersonNamebrgyID ,
          ContactpersonAddressbrgyID:  ContactpersonAddressbrgyID,
          ContactpersonnumberbrgyID : ContactpersonnumberbrgyID ,
          ServicetypebrgyID:  ServicetypebrgyID,
          DocStatbrgyID:  DocStatbrgyID


        },
        function(data, status){
    Swal.fire({
        title: 'Success!',
        text: 'Request for Barangay Identification Submitted Successfully',
        icon: 'success',
        confirmButtonText: 'Monitor Document Request Status',
        onClose: () => {
            window.location.reload();
        }
    });
           // Apply custom class for light theme
            $(".swal2-popup").addClass('light-theme');
        });
    });
});
</script>







<!-- Residents Notification -------------------------------------------------------------------------------------------------------------->

<div  id="ResidentsNotofication"  style="display: none;" class="absolute bg-gray-50 inset-0 overflow-y-auto lg:ml-64 mt-16">
   <div class="pt-3 px-4">
      <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8  xl:gap-4 my-4">


        <div class="mb-4 flex flex-col lg:flex-row items-center justify-between">
               <div class="mb-4 lg:mb-0">
                   <h3 class="text-xl font-bold text-gray-900 mb-2">Notifications</h3>
                   <span class="text-base font-normal text-gray-500">Manage Notifications</span>
               </div>
           
              
           </div>

        
           <div class='flex flex-col gap-3'>
            <div class="relative border border-gray-200 rounded-lg shadow-lg">
              <button onClick='return this.parentNode.remove()'
                class="absolute p-1 bg-gray-100 border border-gray-300 rounded-full -top-1 -right-1"
              >
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  class="w-3 h-3"
                  viewBox="0 0 20 20"
                  fill="currentColor"
                >
                  <path
                    fill-rule="evenodd"
                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                    clip-rule="evenodd"
                  />
                </svg>
              </button>
            
              <div class="flex items-center p-4">
                <img
                  class="object-cover w-12 h-12 rounded-lg"
                  src="https://randomuser.me/api/portraits/women/71.jpg"
                  alt=""
                />
            
                <div class="ml-3 overflow-hidden">
                  <p class="font-medium text-gray-900">Jan Doe</p>
                  <p class="max-w-xs text-sm text-gray-500 truncate">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet,
                    laborum?
                  </p>
                </div>
              </div>
            </div>
            <div class="relative border border-gray-200 rounded-lg shadow-lg">
              <button onClick='return this.parentNode.remove()'
                class="absolute p-1 bg-gray-100 border border-gray-300 rounded-full -top-1 -right-1"
              >
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  class="w-3 h-3"
                  viewBox="0 0 20 20"
                  fill="currentColor"
                >
                  <path
                    fill-rule="evenodd"
                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                    clip-rule="evenodd"
                  />
                </svg>
              </button>
            
              <div class="flex items-center p-4">
                <img
                  class="object-cover w-12 h-12 rounded-lg"
                  src="https://randomuser.me/api/portraits/men/71.jpg"
                  alt=""
                />
            
                <div class="ml-3 overflow-hidden">
                  <p class="font-medium text-gray-900">John Doe</p>
                  <p class="max-w-xs text-sm text-gray-500 truncate">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet,
                    laborum?
                  </p>
                </div>
              </div>
            </div>
            <div class="relative border border-gray-200 rounded-lg shadow-lg">
              <button onClick='return this.parentNode.remove()'
                class="absolute p-1 bg-gray-100 border border-gray-300 rounded-full -top-1 -right-1"
              >
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  class="w-3 h-3"
                  viewBox="0 0 20 20"
                  fill="currentColor"
                >
                  <path
                    fill-rule="evenodd"
                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                    clip-rule="evenodd"
                  />
                </svg>
              </button>
            
              <div class="flex items-center p-4">
                <img
                  class="object-cover w-12 h-12 rounded-lg"
                  src="https://randomuser.me/api/portraits/men/5.jpg"
                  alt=""
                />
            
                <div class="ml-3 overflow-hidden">
                  <p class="font-medium text-gray-900">Mike Doe</p>
                  <p class="max-w-xs text-sm text-gray-500 truncate">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet,
                    laborum?
                  </p>
                </div>
              </div>
            </div>
        
        
        </div>

     
     </div>
   </div>
</div>


<!-- Barangay Officials -------------------------------------------------------------------------------------------------------------->

<div  id="ResidentsBarangayOfficails"  style="display: none;" class="absolute bg-gray-50 inset-0 overflow-y-auto lg:ml-64 mt-16">
  <div class="pt-3 px-4">
    <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8  xl:gap-4 my-4">
       
      <div class="flex justify-center items-center mb-4 lg:mb-0">
        <div>
            <h3 class="text-4xl font-bold text-blue-500 mb-2 ">BARANGAY 409 OFFICIALS</h3>
            <h3 class="text-md font-medium text-blue-500 mb-2 text-center">BRGY. 409, SAMPALOC MANILA</h3>
           
        </div>
    </div>
    <div class="flex justify-center text-sm">
      <div class="p-4 m-2">
        <div class="text-center">
          <img src="/Images/lettericon.jpg" alt="Avatar" class="w-20 h-20 rounded-full mx-auto mb-1">
          <h2 class="text-lg font-bold">Brenda</h2>
          <p>Barangay Chairman</p>
          <button class="bg-blue-400 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded mt-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="white" class="w-5 h-5 inline-block align-middle text-white">
              <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
              <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
            </svg>
            
              View Details
         </button>
        </div>
        
        <div class="flex flex-col md:flex-row items-center justify-center mt-4">
          <div class="p-4">
            <div class="text-center">
              <img src="/Images/lettericon.jpg" alt="Avatar" class="w-20 h-20 rounded-full mx-auto mb-1">
              <h2 class="text-lg font-bold">Brenda</h2>
              <p>Barangay Chairman</p>
              <button class="bg-blue-400 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded mt-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="white" class="w-5 h-5 inline-block align-middle text-white">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                  <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                </svg>
                
                  View Details
             </button>
            </div>
          </div>
          <div class="p-4">
            <div class="text-center">
              <img src="/Images/lettericon.jpg" alt="Avatar" class="w-20 h-20 rounded-full mx-auto mb-1">
              <h2 class="text-lg font-bold">Brenda</h2>
              <p>Barangay Chairman</p>
              <button class="bg-blue-400 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded mt-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="white" class="w-5 h-5 inline-block align-middle text-white">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                  <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                </svg>
                
                  View Details
             </button>
            </div>
          </div>
          <div class="p-4">
            <div class="text-center">
              <img src="/Images/lettericon.jpg" alt="Avatar" class="w-20 h-20 rounded-full mx-auto mb-1">
              <h2 class="text-lg font-bold">Brenda</h2>
              <p>Barangay Chairman</p>
              <button class="bg-blue-400 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded mt-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="white" class="w-5 h-5 inline-block align-middle text-white">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                  <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                </svg>
                
                  View Details
             </button>
            </div>
          </div>
        </div>
        
        <div class="flex flex-col md:flex-row justify-between mt-2">
          <div class="p-4">
            <div class="text-center">
              <img src="/Images/lettericon.jpg" alt="Avatar" class="w-20 h-20 rounded-full mx-auto mb-1">
              <h2 class="text-lg font-bold">Brenda</h2>
              <p>Barangay Chairman</p>
              <button class="bg-blue-400 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded mt-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="white" class="w-5 h-5 inline-block align-middle text-white">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                  <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                </svg>
                
                  View Details
             </button>
            </div>
          </div>
          <div class="p-4">
            <div class="text-center">
              <img src="/Images/lettericon.jpg" alt="Avatar" class="w-20 h-20 rounded-full mx-auto mb-1">
              <h2 class="text-lg font-bold">Brenda</h2>
              <p>Barangay Chairman</p>
              <button class="bg-blue-400 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded mt-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="white" class="w-5 h-5 inline-block align-middle text-white">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                  <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                </svg>
                
                  View Details
             </button>
            </div>
          </div>
          <div class="p-4">
            <div class="text-center">
              <img src="/Images/lettericon.jpg" alt="Avatar" class="w-20 h-20 rounded-full mx-auto mb-1">
              <h2 class="text-lg font-bold">Brenda</h2>
              <p>Barangay Chairman</p>
              <button class="bg-blue-400 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded mt-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="white" class="w-5 h-5 inline-block align-middle text-white">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                  <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                </svg>
                
                  View Details
             </button>
            </div>
          </div>
          <div class="p-4">
            <div class="text-center">
              <img src="/Images/lettericon.jpg" alt="Avatar" class="w-20 h-20 rounded-full mx-auto mb-1">
              <h2 class="text-lg font-bold">Brenda</h2>
              <p>Barangay Chairman</p>
              <button class="bg-blue-400 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded mt-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="white" class="w-5 h-5 inline-block align-middle text-white">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                  <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                </svg>
                
                  View Details
             </button>
            </div>
          </div>
          <div class="p-4">
            <div class="text-center">
              <img src="/Images/lettericon.jpg" alt="Avatar" class="w-20 h-20 rounded-full mx-auto mb-1">
              <h2 class="text-lg font-bold">Brenda</h2>
              <p>Barangay Chairman</p>
              <button class="bg-blue-400 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded mt-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="white" class="w-5 h-5 inline-block align-middle text-white">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                  <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                </svg>
                
                  View Details
             </button>
            </div>
          </div>
      
        </div>


      </div>
    </div>





   </div>
 </div>
</div>


<!-- Message -------------------------------------------------------------------------------------------------------------->

<div  id="ResidentsMessage"  style="display: none;" class="absolute bg-gray-50 inset-0 overflow-y-auto lg:ml-64 mt-16">
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
 </div>
  <script src="../javascript/dashboard.js"></script>

 

  




</body>
</html>