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
                 <span class="text-2xl sm:text-3xl leading-none font-bold text-white">1</span>
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
                 <span class="text-2xl sm:text-3xl leading-none font-bold text-white">0</span>
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
                 <span class="text-2xl sm:text-3xl leading-none font-bold text-white">0</span>
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
                 <span class="text-base font-normal text-gray-500">This is a list of Residents Requested Documents</span>
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
                     <button class="bg-green-400 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="white" class="w-5 h-5 inline-block align-middle text-white">
                        <path strokeLinecap="round" strokeLinejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                      </svg>
                      
                          View History
                     </button>
         
                     <button class="bg-red-400 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">
                         <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="white" class="w-5 h-5 inline-block align-middle text-white">
                             <path strokeLinecap="round" strokeLinejoin="round" d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5m6 4.125 2.25 2.25m0 0 2.25 2.25M12 13.875l2.25-2.25M12 13.875l-2.25 2.25M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
                         </svg>
                         Delete Request
                     </button>
                 </div>
             </div>
         </div>




      <div class="flex flex-col mt-8">
         <div class="overflow-x-auto rounded-lg">
            <div class="align-middle inline-block min-w-full">
               <div class="shadow overflow-hidden sm:rounded-lg">
                 


               <?php
// Include the database connection file


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
        echo '<table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Request ID</th>
                        <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Service Type</th>
                        <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date Requested</th>
                        <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pick up Date</th>
                        <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white">';

        // Fetch and display each row
        while($row = mysqli_fetch_assoc($result)) {
            echo '<tr>';
            echo '<td class="p-4 whitespace-nowrap text-sm font-normal text-gray-900">' . $row["RequestID"] . '</td>';
            echo '<td class="p-4 whitespace-nowrap text-sm font-normal text-gray-900">' . $row["ServiceType"] . '</td>';
            echo '<td class="p-4 whitespace-nowrap text-sm font-semibold text-gray-900">' . $row["DateRequested"] . '</td>';
            echo '<td class="p-4 whitespace-nowrap text-sm font-semibold text-gray-900">' . $row["Status"] . '</td>';
            echo '<td class="p-4 whitespace-nowrap text-sm font-semibold text-gray-900">' . $row["PickUpDate"] . '</td>';
            echo '<td class="p-4 whitespace-nowrap text-sm font-semibold text-gray-900">Action Button</td>';
            echo '</tr>';
        }

        // Close table body and table tags
        echo '</tbody></table>';
    } else {
      echo '<div class="text-center">';
      echo '<svg xmlns="http://www.w3.org/2000/svg" id="ebc7c95e-7bf0-45aa-b47d-6acc1baedf34" data-name="Layer 1" width="862.70323" height="644.78592" viewBox="0 0 862.70323 644.78592" class="injected-svg ClassicGrid__ImageFile-sc-td9pmq-4 fNAcXv grid_media" xmlns:xlink="http://www.w3.org/1999/xlink"><polygon points="629.943 612.644 612.777 612.644 604.608 546.435 629.943 546.435 629.943 612.644" fill="#9e616a"></polygon><path d="M807.65107,769.99215H795.34112l-2.19727-11.62205-5.62754,11.62205H754.86738A7.33919,7.33919,0,0,1,750.697,756.6135l26.07247-18.00658v-11.7495l27.42368,1.63683Z" transform="translate(-168.64838 -127.60704)" fill="#2f2e41"></path><polygon points="731.923 590.981 718.148 601.224 672.085 552.969 692.415 537.851 731.923 590.981" fill="#9e616a"></polygon><path d="M925.58816,737.04791,915.71,744.39344l-8.69827-8.015,2.41922,12.68419-26.19923,19.48211a7.33918,7.33918,0,0,1-11.32976-8.24721l10.17712-30.00728-7.0111-9.42842,22.98294-15.05066Z" transform="translate(-168.64838 -127.60704)" fill="#2f2e41"></path><path d="M818.57583,398.64705s32.56879,28.13791,17.542,108.35207l-18.3454,78.59653,59.8294,99.2561-19.07664,23.20771-77.77961-107.4334-28.18529-66.11365L744.6516,416.843Z" transform="translate(-168.64838 -127.60704)" fill="#2f2e41"></path><polygon points="599.447 425.746 597.488 456.084 603.483 585.365 631.692 580.452 637.083 488.406 599.447 425.746" fill="#2f2e41"></polygon><polygon points="237.445 628.211 252.796 628.21 260.098 569.001 237.443 569.002 237.445 628.211" fill="#ffb6b6"></polygon><path d="M402.178,750.80612l4.32074-.00018,16.86888-6.86018,9.0412,6.85913H432.41A19.26648,19.26648,0,0,1,451.67546,770.07v.62605l-49.49658.00183Z" transform="translate(-168.64838 -127.60704)" fill="#2f2e41"></path><polygon points="296.932 618.538 311.905 621.918 332.071 565.772 309.972 560.782 296.932 618.538" fill="#ffb6b6"></polygon><path d="M462.86463,740.39329l4.21465.9516,17.96568-2.97583,7.3082,8.68223.0012.00027a19.26648,19.26648,0,0,1,14.54854,23.03569l-.1379.61067L458.48379,759.7967Z" transform="translate(-168.64838 -127.60704)" fill="#2f2e41"></path><path d="M386.6516,393.843c-7.19708,21.70636-6.43618,45.268,1.72992,70.55606l3.49087,142.37821S386.67128,700.146,403.4543,733.00177h24.34l12.05112-134.75129,1.5133-90.44591,52.18244,76.30583L460.30462,730.79868l29.9568,2.678,53.93408-159.1909L477.6516,419.843Z" transform="translate(-168.64838 -127.60704)" fill="#2f2e41"></path><path d="M667.346,332.01487c18.61732-16.77656,46.30893-25.21208,69.53714-15.805a115.466,115.466,0,0,0-51.888,59.93484c-3.6979,9.83846-6.78644,21.16623-15.88188,26.43349-5.65933,3.27753-12.70027,3.4377-19.04568,1.85557-6.34568-1.58237-12.16226-4.75415-17.89913-7.89422l-1.63218-.03691C637.86406,372.53682,648.72872,348.79142,667.346,332.01487Z" transform="translate(-168.64838 -127.60704)" fill="#e6e6e6"></path><path d="M736.75328,316.71942A98.69239,98.69239,0,0,0,681.847,342.64994a42.50049,42.50049,0,0,0-8.34534,10.37667,24.37584,24.37584,0,0,0-2.81751,12.51568c.10054,4.05833.67335,8.19792-.21438,12.21a14.92537,14.92537,0,0,1-7.42454,9.68865c-4.54586,2.613-9.7595,3.43673-14.886,4.0651-5.692.69769-11.61526,1.33219-16.54238,4.5248-.597.38683-1.16231-.56211-.56622-.94836,8.57235-5.5546,19.41969-3.5335,28.63724-7.24065,4.30108-1.72983,8.10691-4.76631,9.454-9.35719,1.17794-4.01452.5909-8.2838.45359-12.39207a26.01068,26.01068,0,0,1,2.299-12.34028,39.29038,39.29038,0,0,1,7.9156-10.65924,95.74917,95.74917,0,0,1,24.3333-17.41978A100.44256,100.44256,0,0,1,736.743,315.61475c.70319-.09065.70886,1.01461.01026,1.10467Z" transform="translate(-168.64838 -127.60704)" fill="#fff"></path><path d="M686.44718,337.79134a14.807,14.807,0,0,1,1.63241-19.1039c.50628-.49873,1.30506.26457.79811.764a13.71094,13.71094,0,0,0-1.48216,17.77371c.41512.5769-.53561,1.13983-.94836.56623Z" transform="translate(-168.64838 -127.60704)" fill="#fff"></path><path d="M670.36216,363.49127a28.53932,28.53932,0,0,0,20.3938-4.08346c.59834-.38471,1.16384.56412.56622.94836a29.68517,29.68517,0,0,1-21.23023,4.20607c-.70085-.12626-.42683-1.19655.27021-1.071Z" transform="translate(-168.64838 -127.60704)" fill="#fff"></path><path d="M714.44656,321.9478a8.38148,8.38148,0,0,0,6.2686,4.89443c.7021.11732.42732,1.18753-.27021,1.071a9.39213,9.39213,0,0,1-6.94675-5.39917.57084.57084,0,0,1,.19107-.7573.55506.55506,0,0,1,.75729.19107Z" transform="translate(-168.64838 -127.60704)" fill="#fff"></path><path d="M762.46124,397.11454c-.44048-.06079-.881-.12157-1.32791-.1756a110.37862,110.37862,0,0,0-17.88208-.90839c-.46221.00673-.93053.02051-1.39159.0405a116.3646,116.3646,0,0,0-41.75015,9.61014,113.00482,113.00482,0,0,0-15.16291,8.0555c-6.68773,4.23438-13.602,9.35764-21.078,11.08459a19.38584,19.38584,0,0,1-2.36217.42086l-30.88864-26.74546c-.03969-.096-.0858-.18531-.12584-.28162l-1.28212-1.01147c.23872-.17556.49008-.35251.72879-.52808.138-.10241.283-.19887.421-.30128.09422-.06639.18881-.13253.27-.19782.03128-.02222.0629-.04413.08811-.05934.08122-.06529.1636-.11732.23871-.17556q2.10345-1.4895,4.23516-2.95463c.00611-.007.00611-.007.0191-.00815a166.15689,166.15689,0,0,1,34.601-18.59939c.36686-.13859.73948-.28453,1.12045-.4109a107.831,107.831,0,0,1,16.93919-4.76651,95.32878,95.32878,0,0,1,9.5528-1.33433,79.272,79.272,0,0,1,24.72335,1.7516c16.14332,3.7433,30.90977,12.60785,39.65578,26.43254C762.02688,396.40555,762.24387,396.75367,762.46124,397.11454Z" transform="translate(-168.64838 -127.60704)" fill="#e6e6e6"></path><path d="M762.05235,397.44645a98.69236,98.69236,0,0,0-59.45156-12.3533A42.50006,42.50006,0,0,0,689.69,388.35387a24.3758,24.3758,0,0,0-9.78493,8.29673c-2.36313,3.30088-4.39808,6.951-7.52245,9.62a14.92533,14.92533,0,0,1-11.76132,3.26575c-5.2028-.6506-9.86156-3.13185-14.3331-5.71664-4.9648-2.86991-10.0762-5.92951-15.93241-6.34685-.70956-.05056-.5896-1.14861.11888-1.09812,10.1888.72611,17.633,8.8707,27.22462,11.46035,4.47564,1.20837,9.34256,1.07528,13.18213-1.77925,3.35754-2.49617,5.45923-6.25839,7.82305-9.62129a26.01082,26.01082,0,0,1,9.26529-8.46889,39.29037,39.29037,0,0,1,12.73777-3.74506,95.74907,95.74907,0,0,1,29.91669.7416,100.44263,100.44263,0,0,1,32.085,11.59611c.616.351-.04488,1.23688-.65689.88819Z" transform="translate(-168.64838 -127.60704)" fill="#fff"></path><path d="M709.199,383.98345a14.807,14.807,0,0,1,12.80526-14.27057c.7045-.09339.88272.997.17729,1.0905a13.711,13.711,0,0,0-11.88443,13.29895c-.01588.71056-1.11391.58761-1.09812-.11888Z" transform="translate(-168.64838 -127.60704)" fill="#fff"></path><path d="M680.88287,394.81911a28.53928,28.53928,0,0,0,18.74183,9.01806c.70936.05308.58963,1.15113-.11888,1.09812a29.68518,29.68518,0,0,1-19.4835-9.42375c-.48357-.52277.37961-1.21236.86055-.69243Z" transform="translate(-168.64838 -127.60704)" fill="#fff"></path><path d="M741.09383,388.19084a8.38147,8.38147,0,0,0,2.05834,7.68205c.49.51638-.37378,1.20545-.86055.69243a9.39216,9.39216,0,0,1-2.29591-8.49336.57082.57082,0,0,1,.6085-.48962.55506.55506,0,0,1,.48962.6085Z" transform="translate(-168.64838 -127.60704)" fill="#fff"></path><path d="M219.92162,754.74293c-1.45,5.44-5.26,9.97-9.86,13.27-.75.54-1.52,1.04-2.3,1.51-.24.14-.48.29-.73.42q-.405.24-.81.45h-21.63c-.39-.79-.77-1.59-1.15-2.38-9.27-19.48-15.78-40.5-14.67-61.91a79.25417,79.25417,0,0,1,5.17-24.25c5.94-15.47,16.78-28.86,31.69-35.6.37-.17.76-.34,1.14-.5-.12.43-.24.85-.36,1.28a110.78533,110.78533,0,0,0-3.38,17.59c-.06.46-.11.92-.15,1.39a116.05427,116.05427,0,0,0,3.72,42.69c.01.03.01995.07.03.1q1.27506,4.605,2.96,9.07c.88,2.35,1.83,4.67,2.87,6.95C216.80163,734.393,222.62157,744.593,219.92162,754.74293Z" transform="translate(-168.64838 -127.60704)" fill="#e6e6e6"></path><path d="M207.04162,646.203c-.21.28-.42005.55-.63.83a98.12885,98.12885,0,0,0-11.12,18.76c-.16.33-.31.66-.44,1a97.8135,97.8135,0,0,0-7.82,29.24,1.49,1.49,0,0,0-.02.21c-.25,2.36005-.4,4.74-.46,7.12a42.48011,42.48011,0,0,0,1.43,13.24,23.7688,23.7688,0,0,0,5.46,9.42c.25.27.5.54.77.8.2.21.42.42.63.62,2.02,1.93,4.23,3.72,6.13,5.79a21.43163,21.43163,0,0,1,2.35,3,14.90407,14.90407,0,0,1,1.6,12.1c-1.36,5.06-4.47,9.33-7.65,13.4-1.59,2.04-3.23,4.1-4.65,6.28-.51995.78-1,1.57-1.43994,2.38h-1.26c.42-.81.88-1.6,1.38-2.38,3.65-5.75,8.84-10.69,11.53-17.02,1.82-4.26995,2.37-9.11.07-13.3a17.68156,17.68156,0,0,0-2.43-3.38c-1.83-2.07-4.02-3.84-6.01-5.71-.5-.47-.99-.95-1.46-1.45a24.96377,24.96377,0,0,1-5.64-8.9,39.23028,39.23028,0,0,1-1.94-13.13c0-2.84.15-5.7.43-8.54.03-.36.07-.73.11-1.1a100.76663,100.76663,0,0,1,19.67-49.23c.2-.28.41-.55.62-.82C206.68163,644.87294,207.47161,645.653,207.04162,646.203Z" transform="translate(-168.64838 -127.60704)" fill="#fff"></path><path d="M186.36526,696.67763a14.807,14.807,0,0,1-12.3542-14.66278.55275.55275,0,0,1,1.10455-.02415,13.711,13.711,0,0,0,11.51986,13.616c.70147.11439.42725,1.18471-.27021,1.071Z" transform="translate(-168.64838 -127.60704)" fill="#fff"></path><path d="M193.164,726.22406a28.5393,28.5393,0,0,0,11.53315-17.308c.15106-.69512,1.22186-.42407,1.071.27021a29.68514,29.68514,0,0,1-12.0379,17.98619c-.58485.40629-1.1479-.54428-.56622-.94836Z" transform="translate(-168.64838 -127.60704)" fill="#fff"></path><path d="M194.96075,665.676a8.38149,8.38149,0,0,0,7.89345-.97168c.57941-.41351,1.14186.53754.56622.94836a9.39215,9.39215,0,0,1-8.72989,1.09429.57082.57082,0,0,1-.40038-.67059.55507.55507,0,0,1,.6706-.40038Z" transform="translate(-168.64838 -127.60704)" fill="#fff"></path><path d="M282.06158,684.87294c-.35.27-.71.54-1.06.82a110.362,110.362,0,0,0-13.29,12c-.32.33-.64.67-.95,1.01l-.01.01a116.347,116.347,0,0,0-22.66,36.14l-.03.09c-.01.03-.02.05-.03.08a114.44321,114.44321,0,0,0-5.03,16.42c-1.22,5.46-2.22,11.31-4.13,16.57-.29.81-.61,1.61-.95,2.38h-44.46c.15-.79.31-1.59.47-2.38a160.30168,160.30168,0,0,1,10.54-33.7c.16-.36.32-.72.5-1.08a108.30478,108.30478,0,0,1,8.61-15.35.0098.0098,0,0,1,.01-.01,94.95585,94.95585,0,0,1,5.8-7.69,79.11871,79.11871,0,0,1,18.72-16.24c.04-.03.09-.05.13-.08,14.04-8.71,30.68-12.86,46.59-9.27h.01C281.25158,684.68294,281.6516,684.773,282.06158,684.87294Z" transform="translate(-168.64838 -127.60704)" fill="#e6e6e6"></path><path d="M282.01159,685.403c-.34.09-.68.19-1.01.29a98.5888,98.5888,0,0,0-20.17,8.27c-.32.17-.64.35-.96.53a98.25544,98.25544,0,0,0-23.79,18.59.035.035,0,0,0-.01.02c-.08.08-.17.17-.24.25-1.6,1.72-3.14,3.51-4.6,5.35a42.769,42.769,0,0,0-6.82,11.43,23.67365,23.67365,0,0,0-1.31,10.81c.03.37.08.73.13,1.1.04.29.08.58.13.88.66,4.01,1.8,8.03,1.48,12.12a14.90913,14.90913,0,0,1-6.01,10.63,23.794,23.794,0,0,1-3.68,2.34,36.85232,36.85232,0,0,1-5.77,2.38h-3.93c.53-.15,1.05-.3,1.58-.45a48.21182,48.21182,0,0,0,5.53-1.93,26.912,26.912,0,0,0,3-1.48c4.02-2.31,7.37005-5.85,8.07-10.58.61-4.14-.57-8.28-1.27-12.33-.12-.7-.23-1.39-.29-2.08a24.43856,24.43856,0,0,1,.85-10.46,39.0623,39.0623,0,0,1,6.36-11.66,83.355,83.355,0,0,1,5.48-6.55q.36-.40494.75-.81a100.901,100.901,0,0,1,24.21-18.73h.01a99.28782,99.28782,0,0,1,21.1-8.74h.01c.33-.1.67-.2,1-.29C282.53161,684.12294,282.69158,685.213,282.01159,685.403Z" transform="translate(-168.64838 -127.60704)" fill="#fff"></path><path d="M235.116,713.25243a14.807,14.807,0,0,1-1.03613-19.1455c.43212-.5642,1.32915.08079.89646.64574A13.711,13.711,0,0,0,235.97653,712.56c.49121.51367-.37215,1.20316-.86055.69243Z" transform="translate(-168.64838 -127.60704)" fill="#fff"></path><path d="M222.75543,740.93692a28.53931,28.53931,0,0,0,19.62921-6.87574c.53912-.46406,1.2309.397.69242.86054a29.68514,29.68514,0,0,1-20.44051,7.11332c-.71159-.02772-.58885-1.12569.11888-1.09812Z" transform="translate(-168.64838 -127.60704)" fill="#fff"></path><path d="M260.64411,693.67444a8.38149,8.38149,0,0,0,6.8875,3.97657c.71159.01869.58807,1.11668-.11888,1.09812a9.39215,9.39215,0,0,1-7.62917-4.38226.57083.57083,0,0,1,.08406-.77649.55507.55507,0,0,1,.77649.08406Z" transform="translate(-168.64838 -127.60704)" fill="#fff"></path><path d="M625.03076,300.73673a11.59945,11.59945,0,0,1-17.7667.83759l-37.80039,16.44009,3.682-21.10161,35.3314-12.37668a11.66235,11.66235,0,0,1,16.55372,16.20061Z" transform="translate(-168.64838 -127.60704)" fill="#ffb8b8"></path><path d="M599.80571,307.32525l-87.7976,39.10831-.18835-.06738-100.067-35.65889a32.95966,32.95966,0,0,1-14.78168-42.75569h0a32.92423,32.92423,0,0,1,46.9872-14.63652l74.4685,44.85908,72.21121-9.35878Z" transform="translate(-168.64838 -127.60704)" fill="#e6e6e6"></path><path d="M1031.35162,771.203a1.1865,1.1865,0,0,1-1.19,1.19h-860.29a1.19,1.19,0,0,1,0-2.38h860.29A1.1865,1.1865,0,0,1,1031.35162,771.203Z" transform="translate(-168.64838 -127.60704)" fill="#ccc"></path><path d="M481.99193,424.40352l-88.50585-14.15674a16.89334,16.89334,0,0,1-9.95557-23.646l4.01367-8.02832-1.55908-84.34668A62.48156,62.48156,0,0,1,416.32152,239.572l8.63086-5.16064,4.36182-11.07666,40.22022.981.11718,14.52734,14.40381,22.96826-.00049.09522-.90381,125.01367-3.96972,12.90137,6.00244,15.00586Z" transform="translate(-168.64838 -127.60704)" fill="#e6e6e6"></path><circle cx="284.4591" cy="45.40997" r="36.54413" fill="#ffb8b8"></circle><path d="M415.05385,180.98352c-1.09-4.59187-.58956-11.05349.02641-15.677,1.61485-12.12129,8.3464-23.64474,18.57336-30.47048a13.37957,13.37957,0,0,1,6.66453-2.64845c2.41939-.101,5.04189,1.19418,5.78465,3.499a11.99254,11.99254,0,0,1,6.76552-6.709,21.1355,21.1355,0,0,1,9.63075-1.29746,35.19728,35.19728,0,0,1,29.36306,20.98947c.97609,2.3188,3.70246-6.24621,4.93916-4.05528a9.7407,9.7407,0,0,0,5.52388,4.85342c2.4233.67619,3.40756,10.66034,4.3612,8.33222a11.0984,11.0984,0,0,1-10.61055,15.47525c-2.46642-.09228-4.82489-.99947-7.262-1.39-8.71512-1.39642-17.96,4.92316-19.82312,13.55058a23.98689,23.98689,0,0,0-3.15565-7.021,8.1187,8.1187,0,0,0-6.51321-3.57866c-2.47957.09278-4.6591,1.7139-6.26793,3.60295s-2.81713,4.093-4.43782,5.97186c-4.7555,5.513-11.18745,18.3697-17.96453,17.432C425.30335,201.103,416.54206,187.25309,415.05385,180.98352Z" transform="translate(-168.64838 -127.60704)" fill="#2f2e41"></path><path d="M674.01238,342.14754a7.1328,7.1328,0,0,0-4.80706-7.85363l-98.41317-32.77709a7.13219,7.13219,0,0,0-2.933-.3368l-24.66687,2.33267-14.15377,1.34255-26.11867,2.46833a7.15519,7.15519,0,0,0-6.38357,5.98973l-13.26135,82.8376a7.18646,7.18646,0,0,0,4.48439,7.79592l99.4404,38.38442a6.94669,6.94669,0,0,0,1.44636.38836,7.13621,7.13621,0,0,0,2.17571.01648l64.25546-9.52349a7.12057,7.12057,0,0,0,6.023-5.99919Z" transform="translate(-168.64838 -127.60704)" fill="#fff"></path><path d="M490.01349,398.1102l99.44009,38.38234a.89711.89711,0,0,0,.457.05366l64.247-9.52224a.88347.88347,0,0,0,.7549-.75161l12.91979-85.06677a.90469.90469,0,0,0-.59937-.98151l-.66169-.22392-97.75762-32.54588a.67787.67787,0,0,0-.13742-.03318.88732.88732,0,0,0-.23-.01192l-60.16426,5.6932-4.77428.44794a.90314.90314,0,0,0-.7947.74781l-13.259,82.83439A.89735.89735,0,0,0,490.01349,398.1102Z" transform="translate(-168.64838 -127.60704)" fill="#6c63ff"></path><path d="M508.28194,313.10237l60.16426-5.6932a.88732.88732,0,0,1,.23.01192.67787.67787,0,0,1,.13742.03318l97.75762,32.54588-25.78658,2.72965-9.65046,1.01669-27.46045,2.90123a1.939,1.939,0,0,1-.24081-.0029c-.04881-.01472-.09762-.02944-.15639-.04511Z" transform="translate(-168.64838 -127.60704)" fill="#2f2e41"></path><path d="M487.75761,403.95209l99.44009,38.38233a6.72242,6.72242,0,0,0,1.4505.37968,7.22358,7.22358,0,0,0,2.17727.02722l64.247-9.52224a7.13521,7.13521,0,0,0,6.02839-6.00387l12.90982-85.06772a7.19014,7.19014,0,0,0-.4184-3.71669c-.06533-.15688-.13072-.31384-.207-.46172a6.99031,6.99031,0,0,0-2.26369-2.69758,7.13789,7.13789,0,0,0-1.91579-.97662l-.11659-.04131-98.29175-32.73751a8.95539,8.95539,0,0,0-1.22721-.29807,7.08573,7.08573,0,0,0-1.71463-.03323l-24.66295,2.32468-14.15253,1.35L502.917,307.3259a7.09173,7.09173,0,0,0-3.01853.99744,1.32948,1.32948,0,0,0-.20245.12125,1.1922,1.1922,0,0,0-.12992.09813,7.14818,7.14818,0,0,0-3.02682,4.76367l-13.2699,82.84346A7.19418,7.19418,0,0,0,487.75761,403.95209Zm10.54219-90.35694a5.29965,5.29965,0,0,1,1.26984-2.6713,4.65147,4.65147,0,0,1,.67571-.65875,5.31719,5.31719,0,0,1,2.32365-1.08389,4.059,4.059,0,0,1,.50915-.07189l43.98466-4.15521,20.96479-1.995c.14217-.01658.27254-.01418.40386-.02168a5.00673,5.00673,0,0,1,.94761.07043,4.14489,4.14489,0,0,1,.84467.20125l98.4084,32.77882c.07775.02754.14554.05407.22323.0816a5.218,5.218,0,0,1,2.27305,1.6537,5.25912,5.25912,0,0,1,1.12074,4.14541l-12.92068,85.07674a5.34916,5.34916,0,0,1-4.5086,4.50155l-64.257,9.52134a5.41346,5.41346,0,0,1-2.72281-.31038l-99.441-38.37237a5.40237,5.40237,0,0,1-3.35921-5.846Z" transform="translate(-168.64838 -127.60704)" fill="#3f3d56"></path><path d="M499.35216,308.99439a.87724.87724,0,0,1,.268-.38623,1.05132,1.05132,0,0,1,.129-.08817c.04169-.01607.08434-.04216.12611-.05828a.87349.87349,0,0,1,.62383-.01066l2.06994.73016,101.1157,35.66943,23.66513-2.5004,13.24288-1.39675,28.02932-2.96742,2.50639-.26279.48732-.05387a.9043.9043,0,0,1,.95216.65352.73938.73938,0,0,1,.02649.14313.893.893,0,0,1-.55014.92188.98843.98843,0,0,1-.24752.06673l-3.40944.35738-27.60268,2.91775-9.65046,1.01669-27.46045,2.90123a1.939,1.939,0,0,1-.24081-.0029c-.04881-.01472-.09762-.02944-.15639-.04511L500.24535,310.2651l-.3498-.1238a.67025.67025,0,0,1-.21942-.12146A.91016.91016,0,0,1,499.35216,308.99439Z" transform="translate(-168.64838 -127.60704)" fill="#3f3d56"></path><path d="M588.91905,442.97456a.89376.89376,0,0,1-.74251-1.01574l14.51687-96.33414a.894.894,0,0,1,1.017-.75056l.008.00129a.89377.89377,0,0,1,.74252,1.01574l-14.51687,96.33414a.894.894,0,0,1-1.017.75055Z" transform="translate(-168.64838 -127.60704)" fill="#3f3d56"></path><path d="M625.716,436.86342l-9.6548,1.01888,11.29337-95.5347s12.89458-2.33464,13.23951-1.39846C640.80631,341.50808,625.80805,436.25066,625.716,436.86342Z" transform="translate(-168.64838 -127.60704)" fill="#3f3d56"></path><polygon points="331.25 182.533 330.99 226.1 408.116 255.488 435.813 218.284 331.25 182.533" fill="#3f3d56"></polygon><path d="M671.13144,337.72465a5.30105,5.30105,0,0,0-2.49688-1.73654l-98.40594-32.7777a5.10582,5.10582,0,0,0-.848-.20665,5.00894,5.00894,0,0,0-.95065-.07115l.15966-.99731.98511-.71323,23.36822-16.9188,78.04053,23.91705.13549,27.05154Z" transform="translate(-168.64838 -127.60704)" fill="#3f3d56"></path><path d="M503.829,380.07963a1.51326,1.51326,0,0,1,.326.06843l30.19365,9.91686a1.50014,1.50014,0,0,1-.93555,2.85069l-30.19364-9.91685a1.50039,1.50039,0,0,1,.60952-2.91913Z" transform="translate(-168.64838 -127.60704)" fill="#fff"></path><circle cx="457.00322" cy="423.23593" r="12" fill="#f2f2f2"></circle><circle cx="151.00322" cy="467.23593" r="12" fill="#f2f2f2"></circle><circle cx="401.00322" cy="70.23593" r="12" fill="#f2f2f2"></circle><path d="M589.34024,397.72852A11.59947,11.59947,0,0,1,573.433,389.7714L532.421,385.62792l13.53022-16.60628,36.87128,6.48065a11.66236,11.66236,0,0,1,6.5177,22.22623Z" transform="translate(-168.64838 -127.60704)" fill="#ffb8b8"></path><path d="M564.115,391.14082l-95.70849-8.81836-.13135-.15088L398.42455,302.135a32.95967,32.95967,0,0,1,8.01319-44.52344h0a32.92425,32.92425,0,0,1,48.14355,10.209l43.02246,75.54443,67.56543,27.147Z" transform="translate(-168.64838 -127.60704)" fill="#e6e6e6"></path><path d="M804.33859,237.22376c-2.37688-17.43387-5.35788-36.15172-17.65411-48.7369a41.34992,41.34992,0,0,0-59.74384.61837c-8.95079,9.54876-12.90365,22.95672-13.2654,36.03983s2.55205,26.02081,5.78442,38.70347a119.28958,119.28958,0,0,0,49.78577-9.79937c3.92617-1.70407,7.789-3.63056,11.93689-4.68634,4.14784-1.05571,7.10454,1.60088,10.96292,3.45335l2.118-4.05545c1.73377,3.22659,7.10244,2.27017,9.04978-.83224C805.26007,244.82608,804.83352,240.853,804.33859,237.22376Z" transform="translate(-168.64838 -127.60704)" fill="#2f2e41"></path><path d="M736.532,334.53244l-69.876,1.49441a11.05455,11.05455,0,1,0-4.93974,15.57383c9.26761.52674,81.77191,10.81733,86.0974,4.18549,4.39027-6.73106,27.82423-30.48612,27.82423-30.48612l-18.01271-25.64378Z" transform="translate(-168.64838 -127.60704)" fill="#9e616a"></path><circle cx="584.91096" cy="94.03525" r="32.83012" fill="#9e616a"></circle><path d="M599.36147,299.184" transform="translate(-168.64838 -127.60704)" fill="#6c63ff"></path><path d="M806.14195,284.81075c-3.86888-7.69981-5.74873-17.212-13.99671-19.70823-5.56965-1.68563-28.09691.84048-33.17312,3.6859-8.44356,4.73313-.79189,13.60234-5.77332,21.90214-5.41517,9.02271-20.132,27.12978-25.5472,36.15241-3.72279,6.20279,8.8171,24.40947,6.80408,31.358-2.01273,6.94848-2.10962,14.74736,1.31952,21.11722,3.06888,5.70141-1.37137,10.745,1.71521,16.437,3.20957,5.91962,7.14849,28.05274,4.16119,34.08785l-2,6c19.84682,1.16609,36.53459-22.54427,56.25813-25.04188,4.89894-.62032,9.98565-1.43073,14.02251-4.27435,5.94639-4.18864,8.29717-11.78923,9.76638-18.91282A159.32576,159.32576,0,0,0,806.14195,284.81075Z" transform="translate(-168.64838 -127.60704)" fill="#3f3d56"></path><path d="M835.89793,366.11245c-2.76443-7.54563-7.769-40.5366-7.769-40.5366l-31.32417-.91848,15.31443,37.772-41.79036,58.50283s.07739.12853.21808.35778a11.052,11.052,0,1,0,9.26964,11.74483.76305.76305,0,0,0,.95807-.16445C785.42465,427.035,838.66236,373.65815,835.89793,366.11245Z" transform="translate(-168.64838 -127.60704)" fill="#9e616a"></path><path d="M839.0826,345.27741c-2.87511-12.13478-5.77152-24.33549-10.61887-35.82566s-11.78661-22.34286-21.54669-30.10543c-3.12048-2.48179-6.609-4.67232-10.52078-5.44389-3.91147-.77165-8.31967.09193-11.0667,2.98137-4.39621,4.62357-3.07339,12.0451-1.4611,18.21781Q791,322.40224,798.13123,349.70286q20.59418-2.18287,41.188-4.36591Z" transform="translate(-168.64838 -127.60704)" fill="#3f3d56"></path><path d="M793.7871,226.19592c-1.20908-7.942-2.47188-15.95043-5.31228-23.42857-2.8404-7.47821-7.41882-14.48249-13.98647-18.71882-10.39879-6.70709-23.862-5.41352-35.52074-1.55544-9.01622,2.9837-17.81761,7.51864-24.17574,14.8093-6.35848,7.29074-9.92957,17.69379-7.56439,27.22665q18.65464-4.40738,37.30893-8.81483l-1.36137.962a30.03765,30.03765,0,0,1,16.03083,20.8927,31.12209,31.12209,0,0,1-6.56554,25.84773q12.72244-4.51323,25.44489-9.0263c5.23526-1.85713,10.83833-3.997,13.94267-8.76047C795.62723,240.107,794.79091,232.78685,793.7871,226.19592Z" transform="translate(-168.64838 -127.60704)" fill="#2f2e41"></path></svg>';
      echo "<p class='text-lg'>No requests found for this user.</p>";
      echo '</div>';
      

      
    }
} else {
    // Redirect to login page if user is not logged in
    header("Location: Login.php");
    exit(); // Terminate script execution after redirection
}

// Close the database connection
mysqli_close($conn);
?>




               </div>

           

            </div>
         </div>
      </div>


      <div class="flex items-center justify-center mt-5">
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
if (!firstnamebrgyBClearance || !MnameBClearance || !lastnameBClearance || !BusinessNameBClearance || !BusinessLocBClearance || !DateReqBClearance || !HomeAddBClearance || !ServicetyBClearance || !DocStatusBClearance) {
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
              

<div class="hidden" >
                    <label for="ServicetypebrgyIndigency" class="block text-sm font-semibold leading-6 text-gray-900 mt-6">Service Type</label>
                    <div class="mt-2">
                        <input value="Certificate of Indigency" type="text" name="ServicetypebrgyIndigency" id="ServicetypebrgyIndigency" autocomplete="family-name" required
                            placeholder="Ex. Employment , School Enrollment , Government Requirements , Legal Matters etc"
                            class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6" >
                    </div>
                </div>

                <div class="hidden" >
                    <label for="DocStatusbrgyIndigency" class="block text-sm font-semibold leading-6 text-gray-900 mt-6">Document Status</label>
                    <div class="mt-2">
                        <input value="Pending" type="text" name="DocStatusbrgyIndigency" id="DocStatusbrgyIndigency" autocomplete="family-name" required
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
        var firstnamebrgyIndigency = $("input[name='firstnamebrgyIndigency']").val();
        var MnamebrgyIndigency = $("input[name='MnamebrgyIndigency']").val();
        var lastnamebrgyIndigency = $("input[name='lastnamebrgyIndigency']").val();
        var ServicetypebrgyIndigency = $("input[name='ServicetypebrgyIndigency']").val();
        var DaterequestedbrgyIndigency = $("input[name='DaterequestedbrgyIndigency']").val();
        var AddressbrgyIndigency = $("input[name='AddressbrgyIndigency']").val();
        var PurposebrgyIndigency = $("#PurposebrgyIndigency").val();
        var DocStatusbrgyIndigency = $("input[name='DocStatusbrgyIndigency']").val();

if (!firstnamebrgyIndigency || !MnamebrgyIndigency || !lastnamebrgyIndigency || !ServicetypebrgyIndigency || !DaterequestedbrgyIndigency || !AddressbrgyIndigency || !PurposebrgyIndigency || !DocStatusbrgyIndigency) {
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
if (!firstnamebrgyResidency || !MnamebrgyResidency || !lastnamebrgyResidency || !ServicetypebrgyResidency || !DaterequestedbrgyResidency || !AddressdbrgyResidency || !PurposebrgyResidency || !DocumentStatbrgyResidency) {
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
                    <label for="CivilStatisbrgyID" class="block text-sm font-semibold leading-6 text-gray-900">Place of Birth</label>
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
if (!firstnamebrgyID || !MnamebrgyID || !lastnamebrgyID || !DateofbirthbrgyID || !PlaceofBirthbrgyID || !CivilStatisbrgyID || !SSSGSISbrgyID || !DaterequestedbrgyID || !AddressbrgyID || !ContactpersonNamebrgyID || !ContactpersonAddressbrgyID || !ContactpersonnumberbrgyID || !ServicetypebrgyID || !DocStatbrgyID) {
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