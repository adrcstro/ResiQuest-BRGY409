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

        <button type="button" class="relative rounded-full  p-1 text-gray-400 text-gray-500focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2">
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
                         <a href="ResidentsDashboard.php" class="text-base text-gray-900 font-normal rounded-lg flex items-center p-2 hover:bg-gray-100 group" onclick="showResidetsDashboard()">
                           <svg class="w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75"  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" className="w-6 h-6">
                              <path strokeLinecap="round" strokeLinejoin="round" d="M10.5 6a7.5 7.5 0 1 0 7.5 7.5h-7.5V6Z" />
                              <path strokeLinecap="round" strokeLinejoin="round" d="M13.5 10.5H21A7.5 7.5 0 0 0 13.5 3v7.5Z" />
                            </svg>
                            
                            <span class="ml-3">Dashboard</span>
                         </a>
                      </li>

                      <li>
                         <a href="ResidentPersonalProfile.php"  class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 flex items-center p-2 group " onclick="showPersonalProfile()">
                           <svg class="w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75"  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" className="w-6 h-6">
                              <path strokeLinecap="round" strokeLinejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                            </svg>
                            
                            
                            <span class="ml-3 flex-1 whitespace-nowrap">Personal Profile</span>
                           
                         </a>
                      </li>
                      <li id="view-services-li">
    <a href="#" class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 flex items-center p-2 group" onclick="showDocumentRequested()">
        <svg class="w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" className="w-6 h-6">
            <path strokeLinecap="round" strokeLinejoin="round" d="M15.75 17.25v3.375c0 .621-.504 1.125-1.125 1.125h-9.75a1.125 1.125 0 0 1-1.125-1.125V7.875c0-.621.504-1.125 1.125-1.125H6.75a9.06 9.06 0 0 1 1.5.124m7.5 10.376h3.375c.621 0 1.125-.504 1.125-1.125V11.25c0-4.46-3.243-8.161-7.5-8.876a9.06 9.06 0 0 0-1.5-.124H9.375c-.621 0-1.125.504-1.125 1.125v3.5m7.5 10.375H9.375a1.125 1.125 0 0 1-1.125-1.125v-9.25m12 6.625v-1.875a3.375 3.375 0 0 0-3.375-3.375h-1.5a1.125 1.125 0 0 1-1.125-1.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H9.75" />
        </svg>
        <span class="ml-3 flex-1 whitespace-nowrap">View Services</span>
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


 <!-- Pesonal Profile -------------------------------------------------------------------------------------------------------------->

 <div  id="ResidentPersonalProfile"   class="absolute bg-gray-50 inset-0 overflow-y-auto lg:ml-64 mt-16">
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
  
<?php
        } else {
            echo "User data not found.";
        }
    } else {
        echo "User session ID not set.";
    }
?>
\
         
      
  


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