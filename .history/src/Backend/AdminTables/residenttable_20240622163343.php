<?php
include __DIR__ . '/../Connection.php';
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    echo "Database connection error" . mysqli_connect_error();
}
// Pagination setup
$limit = 5; // Number of entries per page
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;

// Total records query
$total_query = "SELECT COUNT(*) as total FROM users INNER JOIN admintbl ON admintbl.AdminID WHERE admintbl.AdminID = $ID";
$total_result = mysqli_query($conn, $total_query);
$total_row = mysqli_fetch_assoc($total_result);
$total_records = $total_row['total'];
$total_pages = ceil($total_records / $limit);

// Data query with pagination
$query = "SELECT users.*, admintbl.* 
FROM users 
INNER JOIN admintbl ON admintbl.AdminID
WHERE admintbl.AdminID = $ID 
LIMIT $limit OFFSET $offset";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    // Output table header
    echo '<div class="overflow-x-auto h-screen">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th scope="col"
                    class=" bg-gray-50 border-2 border-inherit text-center px-6 py-3  text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Residents ID
                </th>
                <th scope="col"
                    class=" bg-gray-50 px-6 py-3 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Residents Name
                </th>
                <th scope="col"
                    class=" bg-gray-50 px-6 py-3 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Age
                </th>
                <th scope="col"
                    class=" bg-gray-50 px-6 py-3 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Gender
                </th>
                <th scope="col"
                class=" bg-gray-50 px-6 py-3 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                Account Status
            </th>
            <th scope="col"
            class=" bg-gray-100 px-6 py-3  border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
            Action
        </th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">';

    // Fetch and display each row
    while ($row = mysqli_fetch_assoc($result)) {

        $statusBgColor = '';
        switch ($row["Status"]) {
            case 'Verified':
                $statusBgColor = 'bg-green-400';
                break;
            case 'NotVerified':
                $statusBgColor = 'bg-red-400';
                break;
            default:
                $statusBgColor = ''; // No background color if status is not recognized
        }
        echo '<tr>';
        echo '<td class="p-3 border border-inherit text-center  whitespace-nowrap text-sm font-semibold text-gray-900">' . $row["ID"] . '</td>';
        echo '<td class="p-3 border border-inherit text-center  whitespace-nowrap text-sm font-semibold text-gray-900">' . $row["fname"] . ' ' . $row["Mname"] . ' ' . $row["lname"] . '</td>';
        echo '<td class="p-3 border border-inherit text-center  whitespace-nowrap text-sm font-semibold text-gray-900">' . $row["Age"] . '</td>';
        echo '<td class="p-3 border border-inherit text-center  whitespace-nowrap text-sm font-semibold text-gray-900">' . $row["Gender"] . '</td>';
        echo '<td class="p-3 border-2 border-inherit text-center text-sm font-semibold text-gray-900">' . 
        '<div class="flex justify-center items-center  text-white px-2 py-2 ' . $statusBgColor . ' h-full rounded">' . $row["Status"] . '</div>' . 
        '</td>';
        echo '<td class="p-2 flex items-center justify-center border border-inherit text-center whitespace-nowrap text-sm font-semibold text-gray-900">
       <div class="dropdown   dropdown-end">
       <div tabindex="0" role="button" class="flex items-center justify-center text-white font-semibold btn w-40 bg-blue-400 hover:bg-blue-500">
       Action Details
       <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
         <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
       </svg>
     </div>
       <ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow-2xl bg-base-100 rounded-box w-52 ">
           <li class="open-resident-details-modal-btn" data-Residents-id="' . $row["ID"] . '"><a><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
           <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
           <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
         </svg>
          View Details</a></li>

           <li class="edit-residents-btn"  data-Residents-id="' . $row["ID"] . '"  data-Residents-profile="' . $row["Profile"] . '" data-Residents-fname="' . $row["fname"] . '"  data-Residents-mname="' . $row["Mname"] . '"  data-Residents-Lname="' . $row["lname"] . '" data-Residents-nname="' . $row["Nickname"] . '" data-Residents-placeofbirth="' . $row["PlaceofBirth"] . '"  data-Residents-dateofbirth="' . $row["Dateofbirth"] . '"
           data-Residents-age="' . $row["Age"] . '"   data-Residents-civilstat="' . $row["CivilStatus"] . '" data-Residents-gender="' . $row["Gender"] . '"  data-Residents-purok="' . $row["Purok"] . '"
           data-Residents-voterstat="' . $row["VoterStatus"] . '"   data-Residents-email="' . $row["email"] . '"   data-Residents-occupation="' . $row["Occupation"] . '"   data-Residents-contactnum="' . $row["ContactNumber"] . '"
           data-Residents-address="' . $row["Address"] . '"  data-Residents-zipcode="' . $row["Zipcode"] . '"  data-Residents-citizenship="' . $row["Citezenship"] . '" data-adminid-logs="' . $row["AdminID"] . '" data-adminusername-logs="' . $row["Lname"] . ',' . $row["Fname"] . ' ' . $row["MName"] . ' " data-adminposition-logs="' . $row["BrgyPosition"] . '">
           <a><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
           <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
         </svg>
          Edit Residents</a></li>
          <li class="delete-residents-btn" data-Residents-id="' . $row["ID"] . '" data-adminid-logs="' . $row["AdminID"] . '" data-adminusername-logs="' . $row["Lname"] . ',' . $row["Fname"] . ' ' . $row["MName"] . ' " data-adminposition-logs="' . $row["BrgyPosition"] . '" ><a><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
          <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m-1.022-.166a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
      </svg> Delete Residents</a></li>

      <li class="delete-verify-btn" data-Residents-id="' . $row["ID"] . '"  data-verifyResidents-profile="' . $row["Profile"] . '" data-Residents-fname="' . $row["fname"] . '"  data-Residents-mname="' . $row["Mname"] . '"  data-Residents-Lname="' . $row["lname"] . '"  data-adminid-logs="' . $row["AdminID"] . '" data-adminusername-logs="' . $row["Lname"] . ',' . $row["Fname"] . ' ' . $row["MName"] . ' " data-adminposition-logs="' . $row["BrgyPosition"] . '"><a><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
      <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 0 1-1.043 3.296 3.745 3.745 0 0 1-3.296 1.043A3.745 3.745 0 0 1 12 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 0 1-3.296-1.043 3.745 3.745 0 0 1-1.043-3.296A3.745 3.745 0 0 1 3 12c0-1.268.63-2.39 1.593-3.068a3.746 3.746 0 0 1 1.043-3.296 3.746 3.746 0 0 1 3.296-1.043A3.746 3.746 0 0 1 12 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 0 1 3.296 1.043 3.746 3.746 0 0 1 1.043 3.296A3.745 3.745 0 0 1 21 12Z" />
    </svg>Verify Residents</a></li>
      </ul>
  </div>
</td>';
        echo '</tr>';
    }
    // Close table body and table tags
    echo '</tbody></table>';

    // Pagination links with Tailwind CSS
    echo '<nav aria-label="Page navigation example" class="flex justify-first mt-4">';
    echo '<ul class="inline-flex -space-x-px text-sm">';
    
    // Previous button
    if ($page > 1) {
        echo '<li><a href="#" class="pagination-btn flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white" data-page="' . ($page - 1) . '">Previous</a></li>';
    }

    // Page numbers
    for ($i = 1; $i <= $total_pages; $i++) {
        $activeClass = $i == $page ? 'text-blue-600 bg-blue-50 hover:bg-blue-100 hover:text-blue-700' : 'text-gray-500 bg-white hover:bg-gray-100 hover:text-gray-700';
        echo '<li><a href="#" class="pagination-btn flex items-center justify-center px-3 h-8 leading-tight border border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white ' . $activeClass . '" data-page="' . $i . '">' . $i . '</a></li>';
    }

    // Next button
    if ($page < $total_pages) {
        echo '<li><a href="#" class="pagination-btn flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white" data-page="' . ($page + 1) . '">Next</a></li>';
    }

    echo '</ul></nav>';
    echo '</div>';













  

//modal for view residents info

    echo '<dialog id="ViewResidentsdetails" class="modal p-3">
    <div class="modal-box w-100 max-w-4xl rounded-none">
        <div class="mb-2 lg:mb-0">
          <h3 class="text-2xl font-bold text-blue-500 text-center">BRGY-409 Document Request Management System</h3>
          <span class="flex text-base font-medium text-blue-500 justify-center text-center">Residents Information</span>
        </div>
      <div id="modal-content-resident-info" class="mt-8 px-4 py-3 sm:px-6 flex align-items justify-center p-4 gap-4 flex-row"></div>
      <div class="mt-4 px-4 py-3 sm:px-6 flex align-items justify-center p-4 gap-4 flex-row">
      <button id="close-modal-btn" class="btn btn-sm btn-circle btn-ghost absolute top-2 right-2">
      ✕
    </button>
      </div>
    </div>
  </dialog>';
 
// script for residents info
echo '<script>
document.addEventListener("DOMContentLoaded", function () {
  const modal = document.getElementById("ViewResidentsdetails");
  const modalContent = document.getElementById("modal-content-resident-info");
  const openModalButtons = document.querySelectorAll(".open-resident-details-modal-btn");
  const closeModalButton = document.getElementById("close-modal-btn");

  openModalButtons.forEach(function (button) {
    button.addEventListener("click", function () {
      const ID = button.getAttribute("data-Residents-id");

      // Fetch residents details using AJAX
      fetch("../Backend/Fetch_residents_info.php?residents_id=" + ID)
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


//modal for edit residnets info

echo '<dialog id="EditResidentsDetails" class="modal p-3 ">
        <div class="modal-box w-100 max-w-4xl rounded-lg">
         
            <div class="mb-2 lg:mb-0">
              <h3 class="text-2xl font-bold text-blue-500 text-center">BRGY-409 Document Request Management System</h3>
              <span class="flex text-base font-medium text-blue-500 justify-center text-center">Edit Residents Details</span>
            </div>
          
            <form id="admineditresidentinfo" action="../Backend/Update.php" method="post" enctype="multipart/form-data">
          <div id="modal-content-editresident-info"></div>
          </form>

          <div class="mt-4 px-4 py-3 sm:px-6 flex align-items justify-center p-4 gap-4 flex-row">
          <button id="resident-edit-close-modal-btn" class="btn btn-sm btn-circle btn-ghost absolute top-2 right-2">
          ✕
        </button>
        <div class="px-4 py-3 sm:px-6 flex align-items justify-center p-4 gap-4 flex-row">
        
        <button" id="admineditresidentbutton" class="inline-flex justify-center  rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-500 hover:bg-green-600 text-base font-medium text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 sm:w-auto sm:text-sm"> 
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-1">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
          </svg>
          Save Residents Details
        </button>
         </div>
          </div>
        </div>
      </dialog>';

//script for residents info
echo '<script>
document.addEventListener("DOMContentLoaded", function () {
  const modal = document.getElementById("EditResidentsDetails");
  const modalContent = document.getElementById("modal-content-editresident-info");
  const openModalButtons = document.querySelectorAll(".edit-residents-btn");
  const closeModalButton = document.getElementById("resident-edit-close-modal-btn");

  openModalButtons.forEach(function (button) {
    button.addEventListener("click", function () {
      const ID = button.getAttribute("data-Residents-id");
      const profile = button.getAttribute("data-Residents-profile");
      const fname = button.getAttribute("data-Residents-fname");
      const mname = button.getAttribute("data-Residents-mname");
      const lname = button.getAttribute("data-Residents-Lname");
      const Nname = button.getAttribute("data-Residents-nname");
      const Placeorbirth = button.getAttribute("data-Residents-placeofbirth");
      const dateofrbirth = button.getAttribute("data-Residents-dateofbirth");
      const age = button.getAttribute("data-Residents-age");
      const civilstatu = button.getAttribute("data-Residents-civilstat");
      const gender = button.getAttribute("data-Residents-gender");
      const purok = button.getAttribute("data-Residents-purok");
      const voterstat = button.getAttribute("data-Residents-voterstat");
      const email = button.getAttribute("data-Residents-email");
      const occupation = button.getAttribute("data-Residents-occupation");
      const contactnum = button.getAttribute("data-Residents-contactnum");
      const address = button.getAttribute("data-Residents-address");
      const zipcode = button.getAttribute("data-Residents-zipcode");
      const citizenship = button.getAttribute("data-Residents-citizenship");
      const adminidlogs = button.getAttribute("data-adminid-logs");
      const adminusernamelogs = button.getAttribute("data-adminusername-logs");
      const adminpositionlogs = button.getAttribute("data-adminposition-logs");



      // Display default text in modal content
      modalContent.innerHTML = `
      <div class="flex flex-col items-center mt-3">
      <div class="relative">
      <input  type="file" id="admineditresiPRofile" name="admineditresiPRofile" class="hidden" accept=".jpg, .png .jpeg .pdf, .doc, .docx">
      <img id="profilePicture" src="${profile ? "../Backend/uploads/" + profile : "/Images/blank.png"}" class="w-32 h-32 bg-gray-300 rounded-full mb-2 border-4" alt="Profile Picture">
      <label for="admineditresiPRofile" class="absolute bottom-0 right-0 p-2 bg-gray-100 text-black rounded-full hover:bg-gray-400 focus:outline-none focus:bg-gray-400 cursor-pointer border-4 " title="Edit Profile">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
        <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
      </svg>
    </label>
      </div>
      <h1 class="text-xl font-bold">${fname}, ${mname} ${lname}</h1>
      <h1 class="text-sm font-bold">Residents-ID: ${ID}</h1>
      <div class="mx-auto max-w-3xl mt-6">
      <div class="grid grid-cols-1 gap-y-6 gap-x-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 2xl:grid-cols-3">
      <div class="hidden">
      <label for="adminedituserid" class="block text-sm font-medium text-gray-700">resiid</label>
      <input value="${ID}"   type="text" name="adminedituserid" id="adminedituserid" autocomplete="given-name" placeholder="First Name"
          class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 ">
  </div>
      <div class="flex flex-col">
              <label for="AdminEditresidentFirstName" class="block text-sm font-medium text-gray-700">First Name</label>
              <input value="${fname}" type="text" name="AdminEditresidentFirstName" id="AdminEditresidentFirstName" autocomplete="given-name" placeholder="First Name"
                  class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 ">
          </div>
          <div class="flex flex-col">
              <label for="AdminEditresidentMiddleName" class="block text-sm font-medium text-gray-700">Middle Name</label>
              <input value="${mname}"  type="text" name="AdminEditresidentMiddleName" id="AdminEditresidentMiddleName" autocomplete="additional-name" placeholder="Middle Name"
                  class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 ">
          </div>
          <div class="flex flex-col">
              <label for="AdminEditresidentLastName" class="block text-sm font-medium text-gray-700">Last Name</label>
              <input value="${lname}"   type="text" name="AdminEditresidentLastName" id="AdminEditresidentLastName" autocomplete="family-name" placeholder="Last Name"
                  class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 ">
          </div>
    
    
          <div class="flex flex-col">
              <label for="AdminEditresidentnickname" class="block text-sm font-medium text-gray-700">Nick Name</label>
              <input value="${Nname}" type="text" name="AdminEditresidentnickname" id="AdminEditresidentnickname" autocomplete="given-name" 
                  class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 ">
          </div>
          <div class="flex flex-col">
              <label for="AdminEditresidentplaceofbirth" class="block text-sm font-medium text-gray-700">Place of Birth</label>
              <input value="${Placeorbirth}"   type="text" name="AdminEditresidentplaceofbirth" id="AdminEditresidentplaceofbirth" autocomplete="additional-name" 
                  class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 ">
          </div>
          <div class="flex flex-col">
              <label for="AdminEditresibirthdate" class="block text-sm font-medium text-gray-700">Birthdate</label>
              <input value="${dateofrbirth}"  type="date" name="AdminEditresibirthdate" id="AdminEditresibirthdate" autocomplete="family-name" 
                  class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 ">
          </div>
    
    
          <div class="flex flex-col">
          <label for="AdminEditresiage" class="block text-sm font-medium text-gray-700">Age</label>
          <input value="${age}"  type="number" name="AdminEditresiage" id="AdminEditresiage" autocomplete="given-name" 
              class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 ">
      </div>

      <div class="flex flex-col">
      <label for="AdminEditresicivilstat" class="block text-sm font-medium text-gray-700">Civil Status</label>
      <select required name="AdminEditresicivilstat" id="AdminEditresicivilstat" autocomplete="additional-name" 
          class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
          <option value="${civilstatu}">${civilstatu}</option>
          <option value="Single">Single</option>
          <option value="Married">Married</option>
          <option value="Divorced">Divorced</option>
          <option value="Widowed">Widowed</option>
          <option value="Separated">Separated</option>
      </select>
  </div>
  

  <div class="flex flex-col">
  <label for="AdminEditGender" class="block text-sm font-medium text-gray-700">Gender</label>
  <select required name="AdminEditGender" id="AdminEditGender" autocomplete="sex" 
      class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
      <option value="${gender}">${gender}</option>
      <option value="Male">Male</option>
      <option value="Female">Female</option>
  </select>
</div>
      </div>

      <div class=" mt-3 flex flex-col sm:flex-row gap-x-6">
      <div class="sm:flex-1">
      <label for="admineditresipurok" class="block text-sm font-medium text-gray-700">Purok</label>
      <select required name="admineditresipurok" id="admineditresipurok" autocomplete="street-address" 
          class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 mb-4">
          <option value="${purok}">${purok}</option>
          <option value="Purok Sunflower">Purok Sunflower</option>
            <option value="Purok Rosal">Purok Rosal</option>
            <option value="Purok Dahlia">Purok Dahlia</option>
            <option value="Purok Camia">Purok Camia</option>
            <option value="Purok Gumamela">Purok Gumamela</option>
            <option value="Purok Jasmin">Purok Jasmin</option>
            <option value="Purok Sampaguita">Purok Sampaguita</option>
      </select>
  </div>

  <div class="sm:flex-1">
  <label for="Admineditresivotestat" class="block text-sm font-medium text-gray-700">Voter Status</label>
  <select required name="Admineditresivotestat" id="Admineditresivotestat" autocomplete="street-address" 
      class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 mb-4">
      <option value="${voterstat}">${voterstat}</option>
      <option value="Registered">Registered</option>
      <option value="Not Registered">Not Registered</option>
      <option value="Pending Registration">Pending Registration</option>
  </select>
</div>

  </div>
  
  <div class=" mt-3 flex flex-col sm:flex-row gap-x-6">
      <div class="sm:flex-1">
          <label for="Admineditresiemail" class="block text-sm font-medium text-gray-700">Email</label>
          <input value="${email}" type="email" name="Admineditresiemail" id="Admineditresiemail" autocomplete="street-address" 
              class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 mb-4">
      </div>
      <div class="sm:flex-1">
          <label for="Admineditresioccupation" class="block text-sm font-medium text-gray-700">Occupation</label>
          <input value="${occupation}" type="text" name="Admineditresioccupation" id="Admineditresioccupation" autocomplete="street-address" 
              class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 mb-4">
      </div>
  </div>
  
  <div class=" mt-3 flex flex-col sm:flex-row gap-x-6">

      <div class="sm:flex-1">
          <label for="Admineditresicontact" class="block text-sm font-medium text-gray-700">Contact Number</label>
          <input value="${contactnum}" type="number" name="Admineditresicontact" id="Admineditresicontact" autocomplete="street-address" 
              class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 mb-4">
      </div>

      <div class="sm:flex-1">
          <label for="Admineditresiaddress" class="block text-sm font-medium text-gray-700">Address</label>
          <input value="${address}"   type="text" name="Admineditresiaddress" id="Admineditresiaddress" autocomplete="street-address" 
              class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 mb-4">
      </div>
  </div>
  
  <div class=" mt-3 flex flex-col sm:flex-row gap-x-6">
      <div class="sm:flex-1">
          <label for="Admineditresizipcode" class="block text-sm font-medium text-gray-700">Zip Code</label>
          <input value="${zipcode}"   type="number" name="Admineditresizipcode" id="Admineditresizipcode" autocomplete="street-address" 
              class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 mb-4">
      </div>
      <div class="sm:flex-1">
          <label for="Admineditresicitizenship" class="block text-sm font-medium text-gray-700">Citizenship</label>
          <input value="${citizenship}"  type="text" name="Admineditresicitizenship" id="Admineditresicitizenship" autocomplete="street-address" 
              class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 mb-4">
      </div>
  </div>
  
  <div class="hidden">
  <label for="ADminIDlogs" class="block text-sm font-medium text-gray-700">ADminIDlogs</label>
  <input value="${adminidlogs}"  type="text" name="ADminIDlogs" id="ADminIDlogs" autocomplete="street-address" 
      class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 mb-4">
</div>
<div class="hidden">
<label for="Adminusername" class="block text-sm font-medium text-gray-700">Adminusername</label>
<input value="${adminusernamelogs}"  type="text" name="Adminusername" id="Adminusername" autocomplete="street-address" 
    class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 mb-4">
</div>
<div class="hidden">
<label for="AdminPosition" class="block text-sm font-medium text-gray-700">AdminPosition</label>
<input value="${adminpositionlogs}"  type="text" name="AdminPosition" id="AdminPosition" autocomplete="street-address" 
    class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 mb-4">
</div>
<div class="hidden">
<label for="Adminactiondone" class="block text-sm font-medium text-gray-700">action-Done</label>
<input value="Edit Info of Resident ${ID}"  type="text" name="Adminactiondone" id="Adminactiondone" autocomplete="street-address" 
    class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 mb-4">
</div>
<div class="hidden">
  <label for="categorization" class="block text-sm font-medium text-gray-700">categorization</label>
  <input value="Edit"  type="text" name="categorization" id="categorization" autocomplete="street-address" 
      class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 mb-4">
</div>
<div class="hidden">
  <label for="DateCreated" class="block text-sm font-medium text-gray-700">Date Created</label>
  <input value="' . date('m/d/Y') . '" type="text" name="DateCreated" id="DateCreated" autocomplete="street-address"
    class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 mb-4">
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
        $("#admineditresidentbutton").click(function(e) {
            e.preventDefault();
            var valid = $("#admineditresidentinfo")[0].checkValidity();
            if (valid) {
                var formData = new FormData($("#admineditresidentinfo")[0]);
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
    document.getElementById("admineditresidentbutton").addEventListener("click", function() {
        var dialog = document.getElementById("EditResidentsDetails");
        dialog.close();
    });
</script>';


// for delete residnets info
echo '<script>
document.addEventListener("DOMContentLoaded", function () {
    const deleteRequestButtons = document.querySelectorAll(".delete-residents-btn");

    deleteRequestButtons.forEach(function (button) {
        button.addEventListener("click", function () {
            const ResidentId = button.getAttribute("data-Residents-id");
            const adminidlogs = button.getAttribute("data-adminid-logs");
            const adminusernamelogs = button.getAttribute("data-adminusername-logs");
            const adminpositionlogs = button.getAttribute("data-adminposition-logs");

            Swal.fire({
                title: "Are you sure?",
                text: "You won\'t be able to revert this!",
                icon: "warning",
                html: `
                    <div class="hidden">
                        <label for="ADminIDlogs" class="block text-sm font-medium text-gray-700">ADminIDlogs</label>
                        <input value="${adminidlogs}" type="text" name="ADminIDlogs" id="ADminIDlogs" autocomplete="street-address" 
                            class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 mb-4">
                    </div>
                    <div class="hidden">
                        <label for="Adminusername" class="block text-sm font-medium text-gray-700">Adminusername</label>
                        <input value="${adminusernamelogs}" type="text" name="Adminusername" id="Adminusername" autocomplete="street-address" 
                            class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 mb-4">
                    </div>
                    <div class="hidden">
                        <label for="AdminPosition" class="block text-sm font-medium text-gray-700">AdminPosition</label>
                        <input value="${adminpositionlogs}" type="text" name="AdminPosition" id="AdminPosition" autocomplete="street-address" 
                            class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 mb-4">
                    </div>
                    <div class="hidden">
                        <label for="Adminactiondone" class="block text-sm font-medium text-gray-700">action-Done</label>
                        <input value="Deleted Resident ${ResidentId}" type="text" name="Adminactiondone" id="Adminactiondone" autocomplete="street-address" 
                            class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 mb-4">
                    </div>
                    <div class="hidden">
                        <label for="categorization" class="block text-sm font-medium text-gray-700">categorization</label>
                        <input value="Deleted" type="text" name="categorization" id="categorization" autocomplete="street-address" 
                            class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 mb-4">
                    </div>
                    <div class="hidden">
                        <label for="DateCreated" class="block text-sm font-medium text-gray-700">Date Created</label>
                        <input value="' . date('m/d/Y') . '" type="text" name="DateCreated" id="DateCreated" autocomplete="street-address"
                            class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 mb-4">
                    </div>
                `,
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    // Collect the data from the input fields
                    const adminIdLogs = document.getElementById("ADminIDlogs").value;
                    const adminUsernameLogs = document.getElementById("Adminusername").value;
                    const adminPositionLogs = document.getElementById("AdminPosition").value;
                    const adminActionDone = document.getElementById("Adminactiondone").value;
                    const categorization = document.getElementById("categorization").value;
                    const dateCreated = document.getElementById("DateCreated").value;

                    // Prepare the data to be sent
                    const formData = new FormData();
                    formData.append("resident_id", ResidentId);
                    formData.append("ADminIDlogs", adminIdLogs);
                    formData.append("Adminusername", adminUsernameLogs);
                    formData.append("AdminPosition", adminPositionLogs);
                    formData.append("Adminactiondone", adminActionDone);
                    formData.append("categorization", categorization);
                    formData.append("DateCreated", dateCreated);

                    // Send the data to the backend
                    fetch("../Backend/Delete.php", {
                        method: "POST",
                        body: formData
                    })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error("Network response was not ok");
                        }
                        return response.text();
                    })
                    .then(data => {
                        // Display success message
                        Swal.fire(
                            "Deleted!",
                            "Residents has been deleted",
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
                        console.error("There was a problem with the fetch operation:", error);
                    });
                }
            });
        });
    });
});
</script>';




// for Verifying residents


echo '<dialog id="Verifyresidents" class="modal p-3 ">
        <div class="modal-box w-70 max-w-3xl rounded-lg">
         
            <div class="mb-2 lg:mb-0">
              <h3 class="text-2xl font-bold text-blue-500 text-center">BRGY-409 Document Request Management System</h3>
              <span class="flex text-base font-medium text-blue-500 justify-center text-center">Verify Residents Details</span>
            </div>
          
            <form id="Verifyresidentinfo" action="../Backend/Update.php" method="post" enctype="multipart/form-data">

          <div id="modal-content-Verifyresident-info"></div>
          </form>

          <div class="mt-4 px-4 py-3 sm:px-6 flex align-items justify-center p-4 gap-4 flex-row">
          <button id="Verifyresident-edit-close-modal-btn" class="btn btn-sm btn-circle btn-ghost absolute top-2 right-2">
          ✕
        </button>
        <div class="px-4 py-3 sm:px-6 flex align-items justify-center p-4 gap-4 flex-row">
        
        <button" id="Verifyresidentbutton" class="inline-flex justify-center  rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-500 hover:bg-green-600 text-base font-medium text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 sm:w-auto sm:text-sm"> 
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-1">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
          </svg>
          Verify Resident Account Status
        </button>
         </div>
          </div>
        </div>
      </dialog>';


      echo '<script>
      document.addEventListener("DOMContentLoaded", function () {
        const modal = document.getElementById("Verifyresidents");
        const modalContent = document.getElementById("modal-content-Verifyresident-info");
        const openModalButtons = document.querySelectorAll(".delete-verify-btn");
        const closeModalButton = document.getElementById("Verifyresident-edit-close-modal-btn");
      
        openModalButtons.forEach(function (button) {
          button.addEventListener("click", function () {
            const ID = button.getAttribute("data-Residents-id");
            const profile = button.getAttribute("data-verifyResidents-profile");
            const fname = button.getAttribute("data-Residents-fname");
            const mname = button.getAttribute("data-Residents-mname");
            const lname = button.getAttribute("data-Residents-Lname");
            const adminidlogs = button.getAttribute("data-adminid-logs");
            const adminusernamelogs = button.getAttribute("data-adminusername-logs");
            const adminpositionlogs = button.getAttribute("data-adminposition-logs");
            // Display default text in modal content
            modalContent.innerHTML = `
            <div class="flex flex-col items-center mt-3">
            <div class="relative">
            <img id="profilePicture" src="${profile ? "../Backend/uploads/" + profile : "/Images/blank.png"}" class="w-32 h-32 bg-gray-300 rounded-full mb-2 border-4" alt="Profile Picture">
        </div>
        <h1 class="text-xl font-bold">${fname}, ${mname} ${lname}</h1>
        <h1 class="text-sm font-bold">Residents-ID: ${ID}</h1>
            
            <div class="hidden items-center justify-center mt-3">
                <input value="Verified" type="text" name="verificationstat" id="verificationstat" autocomplete="given-name" placeholder="Verification choice"
                    class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 ">
            </div>
            
            <div class="hidden items-center justify-center mt-3">
            <input  value="${ID}"   type="text" name="resiID" id="resiID" autocomplete="given-name" placeholder="Verification choice"
                class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 ">
        </div>


        <div class="hidden">
        <label for="ADminIDlogs" class="block text-sm font-medium text-gray-700">ADminIDlogs</label>
        <input value="${adminidlogs}" type="text" name="ADminIDlogs" id="ADminIDlogs" autocomplete="street-address" 
            class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 mb-4">
    </div>
    <div class="hidden">
        <label for="Adminusername" class="block text-sm font-medium text-gray-700">Adminusername</label>
        <input value="${adminusernamelogs}" type="text" name="Adminusername" id="Adminusername" autocomplete="street-address" 
            class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 mb-4">
    </div>
    <div class="hidden">
        <label for="AdminPosition" class="block text-sm font-medium text-gray-700">AdminPosition</label>
        <input value="${adminpositionlogs}" type="text" name="AdminPosition" id="AdminPosition" autocomplete="street-address" 
            class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 mb-4">
    </div>
    <div class="hidden">
        <label for="Adminactiondone" class="block text-sm font-medium text-gray-700">action-Done</label>
        <input value="Verifying Resident ${ID}" type="text" name="Adminactiondone" id="Adminactiondone" autocomplete="street-address" 
            class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 mb-4">
    </div>
    <div class="hidden">
        <label for="categorization" class="block text-sm font-medium text-gray-700">categorization</label>
        <input value="process" type="text" name="categorization" id="categorization" autocomplete="street-address" 
            class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 mb-4">
    </div>
    <div class="hidden">
        <label for="DateCreated" class="block text-sm font-medium text-gray-700">Date Created</label>
        <input value="' . date('m/d/Y') . '" type="text" name="DateCreated" id="DateCreated" autocomplete="street-address">
            class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 mb-4">
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
        $("#Verifyresidentbutton").click(function(e) {
            e.preventDefault();

            var valid = $("#Verifyresidentinfo")[0].checkValidity();

            if (valid) {
                var formData = new FormData($("#Verifyresidentinfo")[0]);

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
    document.getElementById("Verifyresidentbutton").addEventListener("click", function() {
        var dialog = document.getElementById("Verifyresidents");
        dialog.close();
    });
</script>';

} else {
    echo '<div class="mx-auto text-center mt-8" style="width: 200px;">';
    echo '<img src="/Images/norequest.svg" alt="Illustration" class="w-30 h-auto">';
    echo "<p class='text-lg font-semibold text-center '>No Residents Found</p>";
    echo '</div>';
}

?>