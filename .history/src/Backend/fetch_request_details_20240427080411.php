<?php
require 'Connection.php';

// Include the database connection file
$conn = mysqli_connect($servername, $username, $password, $dbname);
if(!$conn){
  echo "Database connection error".mysqli_connect_error();
}

// Get the request ID from the query string
$requestId = $_GET['request_id'];

// Prepare and execute the SQL query to fetch request details
$query = "SELECT * FROM requestdocument WHERE RequestID = $requestId";
$result = mysqli_query($conn, $query);

// Check if there is a row returned
// Check if there is a row returned
// Check if there is a row returned
if(mysqli_num_rows($result) > 0) {
  // Fetch and display each row
  while($row = mysqli_fetch_assoc($result)) {


   echo' <div class="grid grid-cols-4 sm:grid-cols-12 gap-6 px-4">
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













';
    
    
  }
}

// Close the database connection
mysqli_close($conn);
?>
