<?php
include __DIR__ . '/../Connection.php';
$conn = mysqli_connect($servername, $username, $password, $dbname);
if(!$conn){
  echo "Database connection error".mysqli_connect_error();
}
  
    $ID = $_SESSION["AdminID"];
    $query = "SELECT complaintbl.*, admintbl.* 
    FROM complaintbl INNER JOIN admintbl ON admintbl.AdminID WHERE admintbl.AdminID = $ID AND ComplainStatus='On-Schedule' AND SettlementDate = CURDATE()";




    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) > 0) {
        // Output table header
        echo '<div class="overflow-x-auto h-screen"><table class="table-auto min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="p-4 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Case ID</th>
                        <th scope="col" class="p-4 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Complainant</th>
                        <th scope="col" class="p-4 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Date Filed</th>
                        <th scope="col" class="p-4 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Set Date</th>
                        <th scope="col" class="p-4 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Set Time</th>
                      <th scope="col" class="p-4 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white">';
while($row = mysqli_fetch_assoc($result)) {
  echo "<tr>";
  echo '<td class="p-3 border border-inherit text-center  whitespace-nowrap text-sm font-semibold text-gray-900">' . $row["ComplainID"] . '</td>';
  echo '<td class="p-3 border border-inherit text-center  whitespace-nowrap text-sm font-semibold text-gray-900">' . $row["ComplainantFName"] . ' ' . $row["ComplainantMName"] . ' ' . $row["ComplainantLName"] . '</td>';
  echo '<td class="p-3 border border-inherit text-center  whitespace-nowrap text-sm font-semibold text-gray-900">' . $row["DateofReport"] . '</td>';
  echo '<td class="p-3 border border-inherit text-center  whitespace-nowrap text-sm font-semibold text-gray-900">' . $row["SettlementDate"] . '</td>';
  echo '<td class="p-3 border border-inherit text-center  whitespace-nowrap text-sm font-semibold text-gray-900">' . $row["SettlementTime"] . '</td>';


  echo '<td class="p-3 border border-inherit text-center   whitespace-nowrap text-sm font-semibold text-gray-900">
    <div class="dropdown dropdown-end">
        <div tabindex="0" role="button" class="flex items-center justify-between text-white font-semibold btn w-40 bg-blue-400 hover:bg-blue-500">
            Action Details
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
            </svg>
        </div>
        <ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow-2xl bg-base-100 rounded-box w-52">
            <li class="blottertodayssched" data-setscheduleblootter-id="' . $row["ComplainID"] . '" data-adminid-logs="' . $row["AdminID"] . '" data-adminusername-logs="' . $row["Lname"] . ',' . $row["Fname"] . ' ' . $row["MName"] . ' " data-adminposition-logs="' . $row["BrgyPosition"] . '">
            <a>
             <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
            </svg>
            Re Schedule</a></li>

            <li class="markasswtteledToday" data-setscheduleblootter-id="' . $row["ComplainID"] . '" data-request-Fname="' . $row["ComplainantFName"] . '" data-request-Mname="' . $row["ComplainantMName"] . '" data-request-Lname="' . $row["ComplainantLName"] . '">
            <a>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M11.35 3.836c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m8.9-4.414c.376.023.75.05 1.124.08 1.131.094 1.976 1.057 1.976 2.192V16.5A2.25 2.25 0 0 1 18 18.75h-2.25m-7.5-10.5H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V18.75m-7.5-10.5h6.375c.621 0 1.125.504 1.125 1.125v9.375m-8.25-3 1.5 1.5 3-3.75" />
          </svg>
          
            Mark as Setteled</a></li>




        </ul>
    </div>
</td>';

      echo '</tr>';
}
echo '</tbody></table></div>';



echo '<dialog id="settodaysschedtblotter" class="modal p-3 ">
<div class="modal-box w-70 max-w-3xl rounded-lg">
    <div class="mb-2 lg:mb-0">
      <h3 class="text-2xl font-bold text-blue-500 text-center">BRGY-409 Document Request Management System</h3>
      <span class="flex text-base font-medium text-blue-500 justify-center text-center">Schedule Residents Blotter Settlement</span>
    </div>
    <form id="settodayBlotterform" action="../Backend/Update.php" method="post" enctype="multipart/form-data">
  <div id="contentscheduletodays"></div>
  </form>
  <div class="mt-4 px-4 py-3 sm:px-6 flex align-items justify-center p-4 gap-4 flex-row">
  <button id="setscheduletodayBlotterclose" class="btn btn-sm btn-circle btn-ghost absolute top-2 right-2">
  ✕
</button>
<div class="px-4 py-3 sm:px-6 flex align-items justify-center p-4 gap-4 flex-row">
<button" id="settodaybtnblotter" class="inline-flex justify-center  rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-500 hover:bg-green-600 text-base font-medium text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 sm:w-auto sm:text-sm"> 
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
const modal = document.getElementById("settodaysschedtblotter");
const modalContent = document.getElementById("contentscheduletodays");
const openModalButtons = document.querySelectorAll(".blottertodayssched");
const closeModalButton = document.getElementById("setscheduletodayBlotterclose");
openModalButtons.forEach(function (button) {
  button.addEventListener("click", function () {
    const settodaysschedID = button.getAttribute("data-setscheduleblootter-id");
    const adminidlogs = button.getAttribute("data-adminid-logs");
    const adminusernamelogs = button.getAttribute("data-adminusername-logs");
    const adminpositionlogs = button.getAttribute("data-adminposition-logs");
    
    // Display default text in modal content
    modalContent.innerHTML = `
    <div class="flex flex-col items-center mt-3 mb-5">
    <div class="mx-auto text-center" style="width: 200px;">
    <img src="/Images/schedule.svg" alt="Illustration" class="w-30 h-auto">
    <p class="text-lg font-semibold text-center ">Schedule Release for</p>
    </div>
<h1 class="text-sm mt-3  font-bold"><span class="font-semibold">Case-ID:</span> ${settodaysschedID}</h1>
    <div class="hidden  items-center justify-center mt-3">
    <input  value="${settodaysschedID}"   type="text" name="blotteridsetschedID" id="blotteridsetschedID" autocomplete="given-name" placeholder=""
        class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 ">
</div>
</div>

<div class=" mt-3 flex flex-col sm:flex-row gap-x-6">
<div class="sm:flex-1">
    <label for="setdate" class="block text-sm font-semibold leading-6 text-gray-900 text-center">Set Date</label>
    <div class="mt-2">
        <input  required="" type="date" name="setdateblotter" id="setdateblotter" autocomplete="organization"
            placeholder="Your Occupation"
            class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 flex-1">
    </div>
</div>
<div class="sm:flex-1">
    <label for="settime" class="block text-sm font-semibold leading-6 text-gray-900 text-center">Set Time</label>
    <div class="mt-2">
        <input   required="" type="time" name="settimeblotter" id="settimeblotter" autocomplete="email"
           
            class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 flex-1">
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
<input value="Re-Schedule Todays Case ${settodaysschedID}"  type="text" name="Adminactiondone" id="Adminactiondone" autocomplete="street-address" 
  class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 mb-4">
</div>
<div class="hidden">
<label for="categorization" class="block text-sm font-medium text-gray-700">categorization</label>
<input value="set"  type="text" name="categorization" id="categorization" autocomplete="street-address" 
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
  $("#settodaybtnblotter").click(function(e) {
      e.preventDefault();
      var valid = $("#settodayBlotterform")[0].checkValidity();
      if (valid) {
          var formData = new FormData($("#settodayBlotterform")[0]);
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
document.getElementById("settodaybtnblotter").addEventListener("click", function() {
  var dialog = document.getElementById("settodaysschedtblotter");
  dialog.close();
});
</script>';















echo '<dialog id="MarkasSetteledToday" class="modal p-3 ">
<div class="modal-box w-70 max-w-3xl rounded-lg">

<div class="mb-2 lg:mb-0">
 <h3 class="text-2xl font-bold text-blue-500 text-center">BRGY-409 Document Request Management System</h3>
 <span class="flex text-base font-medium text-blue-500 justify-center text-center">Mark as Setteled Residents Complaint</span>
</div>
<form id="MarkasSetteleddresidentreqToday" action="Update.php" method="post" enctype="multipart/form-data">
<div id="MarkasSetteled-request-infoToday"></div>
</form>
<div class="mt-4 px-4 py-3 sm:px-6 flex align-items justify-center p-4 gap-4 flex-row">
<button id="MarkasSetteledresident-edit-close-modal-btnToday" class="btn btn-sm btn-circle btn-ghost absolute top-2 right-2">
✕
</button>
<div class="px-4 py-3 sm:px-6 flex align-items justify-center p-4 gap-4 flex-row">
<button" id="MarkasSetteldbtnToday" class="inline-flex justify-center  rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-500 hover:bg-green-600 text-base font-medium text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 sm:w-auto sm:text-sm"> 
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
const modal = document.getElementById("MarkasSetteledToday");
const modalContent = document.getElementById("MarkasSetteled-request-infoToday");
const openModalButtons = document.querySelectorAll(".markasswtteledToday");
const closeModalButton = document.getElementById("MarkasSetteledresident-edit-close-modal-btnToday");
openModalButtons.forEach(function (button) {
button.addEventListener("click", function () {
const ID = button.getAttribute("data-setscheduleblootter-id");
const fname = button.getAttribute("data-request-Fname");
const mname = button.getAttribute("data-request-Mname");
const lname = button.getAttribute("data-request-Lname");
// Display default text in modal content
modalContent.innerHTML = `


<div class="flex flex-col items-center mt-3 mb-5">

<div class="mx-auto text-center" style="width: 200px;">
<img src="/Images/release.svg" alt="Illustration" class="w-30 h-auto">
<p class="text-lg font-semibold text-center">Mark Setteled Blotter Report</p>
</div>

<h1 class="text-xl font-bold">${lname},${fname} ${mname}</h1>
<h1 class="text-sm mt-3  font-bold"><span class="font-semibold">Case-ID:</span> ${ID}</h1>
<div class="hidden items-center justify-center mt-3">
   <input Value="Settled" type="text" name="Settleddstat" id="Settleddstat" autocomplete="given-name" placeholder=""
       class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 ">
</div>

<div class="hidden  items-center justify-center mt-3">
<input  value="${ID}"   type="text" name="SettledID" id="SettledID" autocomplete="given-name" placeholder=""
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
$("#MarkasSetteldbtn").click(function(e) {
 e.preventDefault();
 var valid = $("#MarkasSetteleddresidentreq")[0].checkValidity();
 if (valid) {
     var formData = new FormData($("#MarkasSetteleddresidentreq")[0]);
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
document.getElementById("MarkasSetteldbtn").addEventListener("click", function() {
var dialog = document.getElementById("MarkasSetteled");
dialog.close();
});
</script>';

    } else {
        echo '<div class="mx-auto text-center mt-4" style="width: 200px;">';
        echo '<img src="/Images/norequest.svg" alt="Illustration" class="w-30 h-auto">';
        echo "<p class='text-lg font-semibold text-center '>No Blotter Found</p>";
        echo '</div>';
    }
?> 