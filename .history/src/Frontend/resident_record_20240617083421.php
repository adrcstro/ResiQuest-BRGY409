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
<div id="ResidentRecord"  class="absolute bg-gray-50 inset-0 overflow-y-auto lg:ml-64 mt-16">
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
