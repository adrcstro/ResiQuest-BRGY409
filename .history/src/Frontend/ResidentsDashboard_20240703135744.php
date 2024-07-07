<?php include 'ResidentSessiondetails.php'; ?>
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

        <button  type="button" class="relative rounded-full  p-1 text-gray-400 text-gray-500focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2">
          <span class="absolute -inset-1.5"></span>
          <span class="sr-only">View notifications</span>
          <svg class="w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
          </svg>
        </button>

        <!-- Profile dropdown -->
        <div class="dropdown dropdown-end relative ml-3">
         
         <div>
             <button type="button"  tabindex="0" role="button"
                     class="m-1 relative flex rounded-full"
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

         <ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-box w-52">
    <li onclick="EditResidentprofile.showModal()"><a><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.325.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 0 1 1.37.49l1.296 2.247a1.125 1.125 0 0 1-.26 1.431l-1.003.827c-.293.241-.438.613-.43.992a7.723 7.723 0 0 1 0 .255c-.008.378.137.75.43.991l1.004.827c.424.35.534.955.26 1.43l-1.298 2.247a1.125 1.125 0 0 1-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.47 6.47 0 0 1-.22.128c-.331.183-.581.495-.644.869l-.213 1.281c-.09.543-.56.94-1.11.94h-2.594c-.55 0-1.019-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 0 1-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 0 1-1.369-.49l-1.297-2.247a1.125 1.125 0 0 1 .26-1.431l1.004-.827c.292-.24.437-.613.43-.991a6.932 6.932 0 0 1 0-.255c.007-.38-.138-.751-.43-.992l-1.004-.827a1.125 1.125 0 0 1-.26-1.43l1.297-2.247a1.125 1.125 0 0 1 1.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.086.22-.128.332-.183.582-.495.644-.869l.214-1.28Z" />
  <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
</svg>
Your Profile</a></li>
    <li ><a href="logout.php"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15M12 9l-3 3m0 0 3 3m-3-3h12.75" />
</svg>
Sign out</a></li>
  </ul>
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
                         <a href="ResidentsDashboard.php" class="text-base text-gray-900 font-normal rounded-lg flex items-center p-2 hover:bg-gray-100 group" >
                           <svg class="w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75"  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" className="w-6 h-6">
                              <path strokeLinecap="round" strokeLinejoin="round" d="M10.5 6a7.5 7.5 0 1 0 7.5 7.5h-7.5V6Z" />
                              <path strokeLinecap="round" strokeLinejoin="round" d="M13.5 10.5H21A7.5 7.5 0 0 0 13.5 3v7.5Z" />
                            </svg>
                            
                            <span class="ml-3">Dashboard</span>
                         </a>
                      </li>

                      <li>
                         <a href="ResidentPersonalProfile.php"  class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 flex items-center p-2 group " >
                           <svg class="w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75"  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" className="w-6 h-6">
                              <path strokeLinecap="round" strokeLinejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                            </svg>
                            
                            
                            <span class="ml-3 flex-1 whitespace-nowrap">Personal Profile</span>
                           
                         </a>
                      </li>
                      <li id="view-services-li">
    <a href="ResidentServices.php" class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 flex items-center p-2 group" >
        <svg class="w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" className="w-6 h-6">
            <path strokeLinecap="round" strokeLinejoin="round" d="M15.75 17.25v3.375c0 .621-.504 1.125-1.125 1.125h-9.75a1.125 1.125 0 0 1-1.125-1.125V7.875c0-.621.504-1.125 1.125-1.125H6.75a9.06 9.06 0 0 1 1.5.124m7.5 10.376h3.375c.621 0 1.125-.504 1.125-1.125V11.25c0-4.46-3.243-8.161-7.5-8.876a9.06 9.06 0 0 0-1.5-.124H9.375c-.621 0-1.125.504-1.125 1.125v3.5m7.5 10.375H9.375a1.125 1.125 0 0 1-1.125-1.125v-9.25m12 6.625v-1.875a3.375 3.375 0 0 0-3.375-3.375h-1.5a1.125 1.125 0 0 1-1.125-1.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H9.75" />
        </svg>
        <span class="ml-3 flex-1 whitespace-nowrap">View Services</span>
    </a>
</li>

                      <li>
                         <a href="ResidentNitification.php" class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 flex items-center p-2 group" >
                          <svg class="w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" className="w-6 h-6">
                            <path strokeLinecap="round" strokeLinejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
                          </svg>
                          
                            
                            <span class="ml-3 flex-1 whitespace-nowrap">Notification</span>
                         </a>
                      </li>
                      <li>
                         <a href="ResidentBrgyOfficial.php" class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 flex items-center p-2 group" >
                           <svg class="w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" className="w-6 h-6">
                              <path strokeLinecap="round" strokeLinejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                            </svg>
                            
                            <span class="ml-3 flex-1 whitespace-nowrap">Barangay Officials</span>
                         </a>
                      </li>
                      <li>
                         <a href="ResidentMessage.php" class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 flex items-center p-2 group" >
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
<div id="ResidentsDashboard" class="absolute bg-gray-50 inset-0  overflow-y-auto lg:ml-64 mt-16">

     <div id="userdashcontent" class="pt-6 px-4">
       
      <div class="mt-2 w-full grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
        <div class="bg-red-400 shadow rounded-lg p-4 sm:p-6 xl:p-8">
           <div class="flex items-center">
              <div class="flex-shrink-0">
                 <span class="text-2xl sm:text-3xl leading-none font-bold text-white">
                 <?php include '../Backend/ResidentTables/Pendingcount.php'; ?>
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
                 <?php include '../Backend/ResidentTables/OnProcesscount.php'; ?>
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
                 <?php include '../Backend/ResidentTables/Onschedulecount.php'; ?>
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




     

     
     <div class="bg-white h-full  shadow rounded-lg p-4 sm:p-6 xl:p-8  xl:gap-4 my-4">


      <div class="mb-4 flex flex-col lg:flex-row items-center justify-between">
             <div class="mb-4 lg:mb-0">
                 <h3 class="text-xl font-bold text-gray-900 mb-2">List of Requested Documents & Complaint Report</h3>
                 <span class="text-base font-normal text-gray-500">This is a list of your Requested Documents & Report Details</span>
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
                 <button class="mt-2 w-full relative text-white border-2 border-gray-200 focus:outline-none rounded-lg bg-green-400 dark:bg-gray-800 dark:border-gray-700 hover:bg-green-500  font-semibold py-2 px-4" onclick="ViewComplain.showModal()">
                 <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="white" class="w-5 h-5 mr-2 inline-block align-middle text-white">
              <path stroke-linecap="round" stroke-linejoin="round" d="M3 3v1.5M3 21v-6m0 0 2.77-.693a9 9 0 0 1 6.208.682l.108.054a9 9 0 0 0 6.086.71l3.114-.732a48.524 48.524 0 0 1-.005-10.499l-3.11.732a9 9 0 0 1-6.085-.711l-.108-.054a9 9 0 0 0-6.208-.682L3 4.5M3 15V4.5" />
               </svg>
                Monitor Complaint Report
            </button>
            </div>
             </div>
         </div>

         <div class="flex justify-center">
                            <div class="flex  space-x-2">
                 <div class="flex justify-end mt-2 lg:mt-3 space-x-2">
                 <?php
if (!empty($_SESSION["ID"])) {
    $ID = $_SESSION["ID"];
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT COUNT(*) AS schedule_count FROM requestdocument WHERE UserID = $ID AND status = 'Completed'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $scheduleCount = $row["schedule_count"];
    } else {
        echo "Error retrieving data from the database.";
    }
    $conn->close();
}
?>
                 <button class="relative text-gray-600 border-2 border-gray-200 focus:outline-none focus:bg-gray-100 rounded-lg bg-gray-50 dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-100  font-semibold py-2 px-4" onclick="ViewSchedule.showModal()">
                     <span class="absolute bg-red-400 text-white text-xs rounded-full -top-1 -left-1 px-2 py-1"><?=   $scheduleCount ?></span>
                     <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="gray" class="w-5 h-5 inline-block align-middle text-white">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
                    </svg>
                          View Schedule
                     </button>
                     <?php
if (!empty($_SESSION["ID"])) {
    $ID = $_SESSION["ID"];
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT COUNT(*) AS Rejected_count FROM requestdocument WHERE UserID = $ID AND status = 'Rejected'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $RejectedCount = $row["Rejected_count"];
    } else {
        echo "Error retrieving data from the database.";
    }
    $conn->close();
}
?>
                     <button class="relative text-gray-600 border-2 border-gray-200 focus:outline-none focus:bg-gray-100 rounded-lg bg-gray-50 dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-100  font-semibold py-2 px-4" onclick="ViewrejectedRequest.showModal()" >
                     <span class="absolute bg-red-400 text-white text-xs rounded-full -top-1 -left-1 px-2 py-1"><?=  $RejectedCount ?></span>
                     <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="gray" class="w-5 h-5 inline-block align-middle text-white">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                     </svg>
                         Rejected Request
                     </button>
                     <?php
if (!empty($_SESSION["ID"])) {
    $ID = $_SESSION["ID"];
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
       $sql = "SELECT COUNT(*) AS Released_count FROM requestdocument WHERE UserID = $ID AND status = 'Released'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $ReleasedCount = $row["Released_count"];
    } else {
        echo "Error retrieving data from the database.";
    }
    $conn->close();
}
?>
                     <button class="relative text-gray-600 border-2 border-gray-200 focus:outline-none focus:bg-gray-100 rounded-lg bg-gray-50 dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-100  font-semibold py-2 px-4" onclick="TransactionHistory.showModal()">
                     <span class="absolute bg-red-400 text-white text-xs rounded-full -top-1 -left-1 px-2 py-1"><?=  $ReleasedCount ?></span>
                     <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="gray" class="w-5 h-5 inline-block align-middle text-white">
                        <path strokeLinecap="round" strokeLinejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                      </svg>
                      Released History
                     </button>

                 </div>
                 </div>
         </div>


<dialog id="ViewSchedule" class="modal p-3">
  <div class="modal-box w-full h-full max-w-6xl rounded-lg">
  <div class="flex flex-col mt-8">
         <div class="overflow-x-auto rounded-lg">
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
<?php include '../Backend/ResidentTables/ResidentSchedtbl.php'; ?>
   </div>
   </div>
  </div>
</dialog>
<dialog id="ViewrejectedRequest" class="modal p-3">
  <div class="modal-box w-full h-full max-w-6xl rounded-lg">
  <div class="flex flex-col mt-8">
         <div class="overflow-x-auto rounded-lg">
        <div class="mb-2 lg:mb-0">
            <h3 class="text-2xl font-bold text-blue-400 text-center">BRGY-409 Document Request Management System</h3>
            <span class="flex text-base font-medium text-blue-400 justify-center text-center">List of Rejected Transactions</span>
        </div>
        <form method="dialog">
        <div class="mt-4 px-4 py-3 sm:px-6 flex align-items justify-center p-4 gap-4 flex-row">
          <button  class="btn btn-sm btn-circle btn-ghost absolute top-2 right-2">
          ✕
        </button>
</form>
<?php include '../Backend/ResidentTables/ResiRejTransac.php'; ?>
   </div>
   </div>
  </div>
</dialog>
<dialog id="TransactionHistory" class="modal p-3">

  <div class="modal-box w-full h-full max-w-6xl rounded-lg">
  
  <div class="flex flex-col mt-8">
         <div class="overflow-x-auto rounded-lg">

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
<?php include '../Backend/ResidentTables/ResiComTransac.php'; ?>
  </div>
  </div>
  </div>
</dialog>



<dialog id="ViewComplain" class="modal p-3">
  <div class="modal-box w-full h-full max-w-6xl rounded-lg">
  <div class="flex flex-col mt-8">
         <div class="overflow-x-auto rounded-lg">
        <div class="mb-2 lg:mb-0">
            <h3 class="text-2xl font-bold text-blue-400 text-center">BRGY-409 Complaint Report Services</h3>
            <span class="flex text-base font-medium text-blue-400 justify-center text-center">List of Filed Complaint</span>
        </div>
        <div class="flex justify-center">
                            <div class="flex  space-x-2">
                 <div class="flex justify-end mt-2 lg:mt-3 space-x-2">
                 <nav class="flex px-5 py-3 text-gray-700 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-800 dark:border-gray-700" aria-label="Breadcrumb">
        <ol class="inline-flex items-end space-x-10 md:space-x-2 rtl:space-x-reverse">
            <li class="inline-flex items-center ">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="gray" class="w-5 h-5 mr-1 inline-block align-middle text-white">
  <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
</svg>
                <a href="#" data-status="Pending" class="status-link inline-flex items-center text-sm font-medium focus:outline-none focus:text-blue-600 text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                    Pending Complaint
                </a>
            </li>
            <li>
                <div class="flex items-center">
                <svg class="rtl:rotate-180 block w-3 h-3 mx-1 text-gray-400 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
        </svg>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="gray" class="w-5 h-5 inline-block align-middle text-white">
        <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
        </svg>
                    <a href="#" data-status="On-Process" class="status-link ms-1 text-sm font-medium focus:outline-none focus:text-blue-600 text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">On Process Complaint</a>
                </div>
            </li>
            <li>
                <div class="flex items-center">
                <svg class="rtl:rotate-180 block w-3 h-3 mx-1 text-gray-400 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
        </svg>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="gray" class="w-5 h-5 inline-block align-middle text-white">
     <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
     </svg>
                    <a href="#" data-status="On-Schedule" class="status-link ms-1 text-sm font-medium focus:outline-none focus:text-blue-600 text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">View Schedule for Settlement</a>
                </div>
            </li>
            <li>
                <div class="flex items-center">
                <svg class="rtl:rotate-180 block w-3 h-3 mx-1 text-gray-400 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
        </svg>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="gray"  class="w-5 h-5 inline-block align-middle text-white">
  <path stroke-linecap="round" stroke-linejoin="round" d="M10.125 2.25h-4.5c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125v-9M10.125 2.25h.375a9 9 0 0 1 9 9v.375M10.125 2.25A3.375 3.375 0 0 1 13.5 5.625v1.5c0 .621.504 1.125 1.125 1.125h1.5a3.375 3.375 0 0 1 3.375 3.375M9 15l2.25 2.25L15 12" />
</svg>
                    <a href="#" data-status="Settled" class="status-link ms-1 text-sm font-medium focus:outline-none focus:text-blue-600 text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Settled Complaint History</a>
                </div>
            </li>
        </ol>
    </nav>
                 </div>
                 </div>
         </div>

        <form method="dialog">
        <div class="mt-4 px-4 py-3 sm:px-6 flex align-items justify-center p-4 gap-4 flex-row">
          <button  class="btn btn-sm btn-circle btn-ghost absolute top-2 right-2">
          ✕
        </button>
</form>
<div id="complaints-container">
        <!-- Complaints will be loaded here dynamically -->
    </div>
    <script>
        $(document).ready(function() {
            // Function to fetch complaints based on status
            function fetchComplaints(status) {
                $.ajax({
                    url: '../Backend/complaints.php',
                    type: 'GET',
                    data: { status: status },
                    success: function(response) {
                        $('#complaints-container').html(response);
                    },
                    error: function() {
                        alert('An error occurred while fetching the complaints.');
                    }
                });
            }

            // Load pending complaints by default when the page loads
            fetchComplaints('Pending');

            // Handle click event for status links
            $('.status-link').on('click', function(e) {
                e.preventDefault();
                var status = $(this).data('status');
                fetchComplaints(status);
            });
        });
    </script>
   </div>
   </div>
  </div>

</dialog>

      <div class="flex flex-col mt-8">
         <div class="overflow-x-auto rounded-lg">
            <div class="align-middle inline-block min-w-full">
               <div class="shadow overflow-hidden sm:rounded-lg">
               <?php include '../Backend/ResidentTables/ResidentReqtbl.php'; ?>
               </div>
            </div>
         </div>
      </div>
    
   </div>
   
     </div>

    
 
     <div id="NotVerifiedContent" class="hidden pt-6 px-4">
     <div class="relative bg-white w-full h-auto shadow rounded-lg p-4 sm:p-6 xl:p-8 my-4">
    <div class="flex flex-col lg:flex-row lg:justify-between lg:items-start lg:gap-x-8">
        <!-- SVG Image Container -->
        <div class="flex justify-center lg:mr-4 mb-4 lg:mb-0 lg:w-1/3">
            <img src="/Images/residencyt.svg" alt="Verification Process Icon" class="w-72 h-72">
        </div>

        <!-- Features Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 lg:w-2/3">
            <div class="bg-blue-100 p-4 rounded-md">
                <div class="flex items-center mb-2">
                    <h2 class="text-lg font-semibold mr-2">Not Verified</h2>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                </div>
                <h3 class="text-lg font-semibold mb-2">Available Features for Not Verified Residents</h3>
                <p>Please make sure to follow the following:</p>
                <ul class="list-disc ml-6 mb-4">
                    <li>Receives Notification About Barangay News & Events</li>
                    <li>View Current Officials</li>
                    <li>Can't Request Document & File Blotter Report</li>
                </ul>
            </div>

            <div class="bg-blue-100 p-4 rounded-md">
                <div class="flex items-center mb-2">
                    <h2 class="text-lg font-semibold mr-2">Verified</h2>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 0 1-1.043 3.296 3.745 3.745 0 0 1-3.296 1.043A3.745 3.745 0 0 1 12 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 0 1-3.296-1.043 3.745 3.745 0 0 1-1.043-3.296A3.745 3.745 0 0 1 3 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 0 1 1.043-3.296 3.746 3.746 0 0 1 3.296-1.043A3.746 3.746 0 0 1 12 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 0 1 3.296 1.043 3.746 3.746 0 0 1 1.043 3.296A3.745 3.745 0 0 1 21 12Z" />
                    </svg>
                </div>
                <h3 class="text-lg font-semibold mb-2">Available Features for Verified Residents</h3>
                <p>Please make sure to follow the following:</p>
                <ul class="list-disc ml-6 mb-4">
                    <li>Request Document & File Blotter Report</li>
                    <li>Monitor Document Status</li>
                    <li>Monitor Blotter Report</li>
                </ul>
            </div>
        </div>
    </div>

    
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

    <div class="mb-2 mt-3 lg:mb-0">
            <h3 class="text-2xl font-bold text-black text-center">Residents Verification Process</h3>
            <span class="flex text-base font-medium text-black justify-center text-center">Verification Process</span>
        </div>


        <ol class="items-center justify-center gap-6 sm:flex mt-4">
        <li class="relative mb-6 p-4 sm:mb-0  border-2 border-inherit ">
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

     

        <li class="relative mb-6 p-4 sm:mb-0  border-2 border-inherit ">
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


        <li class="relative mb-6 p-4 sm:mb-0  border-2 border-inherit ">
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

    <div class="flex items-center justify-center mt-4 ">
        <button class="bg-green-400 hover:bg-green-600 text-white font-bold py-2 px-4 rounded" onclick="EditResidentprofile.showModal()">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="white" class="w-5 h-5 inline-block align-middle">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 0 1-1.043 3.296 3.745 3.745 0 0 1-3.296 1.043A3.745 3.745 0 0 1 12 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 0 1-3.296-1.043 3.745 3.745 0 0 1-1.043-3.296A3.745 3.745 0 0 1 3 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 0 1 1.043-3.296 3.746 3.746 0 0 1 3.296-1.043A3.746 3.746 0 0 1 12 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 0 1 3.296 1.043 3.746 3.746 0 0 1 1.043 3.296A3.745 3.745 0 0 1 21 12Z"/>
            </svg>
            Get Verified Account
        </button>
    </div>


</div>
      </div>

</div>

      


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
      <form id="VerifyForm" action="../Backend/Insert.php" method="post" enctype="multipart/form-data">
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
  <button id="SubmitInfotoVerify" class="inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 h-full bg-green-500 hover:bg-green-600 text-base font-medium text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 sm:w-auto sm:text-sm"> 
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-1">
      <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
    </svg>
    Save Profile
  </button>

  <form method="dialog">
    <button class="inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 h-full bg-red-400 hover:bg-red-600 text-base font-medium text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 sm:w-auto sm:text-sm">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-1">
        <path stroke-linecap="round" stroke-linejoin="round" d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
      </svg>
      Cancel Edit
    </button>
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