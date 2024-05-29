<?php
require 'Connection.php';
    if(!empty($_SESSION["AdminID"])){
$ID = $_SESSION["AdminID"];
$result = mysqli_query($conn, "SELECT * FROM admintbl WHERE AdminID = $ID");
$row = mysqli_fetch_assoc($result);
    }else{
      header("Location: AdminLogin.php");

    }
?>





<?php

// Database connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    echo "Database connection error" . mysqli_connect_error();
}

$date_filter = $_GET['filter'] ?? 'empty'; // Default to 'empty' filter if no filter is provided

switch ($date_filter) {
    case 'today':
        $query = "SELECT * FROM requestdocument WHERE Status='Completed' AND PickUpDate = CURDATE()";
        break;

        case 'Future':
            $query = "SELECT * FROM requestdocument WHERE Status='Completed' AND PickUpDate > CURDATE() AND PickUpDate IS NOT NULL AND PickUpDate != ''";
            break;
        case 'overdue':
            $query = "SELECT * FROM requestdocument WHERE Status='Completed' AND PickUpDate < CURDATE() AND PickUpDate IS NOT NULL AND PickUpDate != ''";
            break;
        
    case 'empty':
    default: // Include 'empty' case as default behavior
        $query = "SELECT * FROM requestdocument WHERE Status='Completed' AND (PickUpDate IS NULL OR PickUpDate = '')";
        break;
}

$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    echo '<div class="overflow-x-auto h-screen"><table class="table-auto min-w-full divide-y divide-gray-200 mt-3">
    <thead class="bg-gray-50">
        <tr>
            <th scope="col" class="p-4 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Request ID</th>
            <th scope="col" class="p-4 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Residents Name</th>
            <th scope="col" class="p-4 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Service Type</th>
            <th scope="col" class="p-4 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Pickup Date</th>
            <th scope="col" class="p-4 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Pickup Time</th>
            <th scope="col" class="p-4 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
        </tr>
    </thead>
    <tbody class="bg-white">';
    
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td class="p-3 border border-inherit text-center whitespace-nowrap text-sm font-semibold text-gray-900">' . $row["RequestID"] . '</td>';
        echo '<td class="p-3 border border-inherit text-center whitespace-nowrap text-sm font-semibold text-gray-900">' . $row["FirstName"] . ' ' . $row["Middlename"] . ' ' . $row["Lastname"] . '</td>';
        echo '<td class="p-3 border border-inherit text-center whitespace-nowrap text-sm font-semibold text-gray-900">' . $row["ServiceType"] . '</td>';
        echo '<td class="p-3 border border-inherit text-center whitespace-nowrap text-sm font-semibold text-gray-900">' . $row["PickUpDate"] . '</td>';
        echo '<td class="p-3 border border-inherit text-center whitespace-nowrap text-sm font-semibold text-gray-900">' . $row["Pickuptime"] . '</td>';
        echo '<td class="p-1 border flex items-center justify-center border-inherit text-center whitespace-nowrap text-sm font-semibold text-gray-900">
            <div class="dropdown dropdown-end">
                <div tabindex="0" role="button" class="flex items-center justify-between text-white font-semibold btn w-40 bg-blue-400 hover:bg-blue-500">
                    Action Details
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                    </svg>
                </div>
                <ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow-2xl bg-base-100 rounded-box w-52">
                    <li class="Schedule-resident-pickup" data-request-id="' . $row["RequestID"] . '" data-request-servietype="' . $row["ServiceType"] . '" data-request-Fname="' . $row["FirstName"] . '" data-request-Mname="' . $row["Middlename"] . '" data-request-Lname="' . $row["Lastname"] . '">
                        <a>Schedule Released</a>
                    </li>
                    <li class="ReSchedule-resident-request" data-request-id="' . $row["RequestID"] . '" data-request-servietype="' . $row["ServiceType"] . '" data-request-Fname="' . $row["FirstName"] . '" data-request-Mname="' . $row["Middlename"] . '" data-request-Lname="' . $row["Lastname"] . '" data-reschedule-date="' . $row["PickUpDate"] . '" data-reschedule-time="' . $row["Pickuptime"] . '">
                        <a>Reschedule</a>
                    </li>
                    <li class="mark-as-released" data-request-id="' . $row["RequestID"] . '" data-request-servietype="' . $row["ServiceType"] . '" data-request-Fname="' . $row["FirstName"] . '" data-request-Mname="' . $row["Middlename"] . '" data-request-Lname="' . $row["Lastname"] . '">
                        <a>Mark Released</a>
                    </li>
                </ul>
            </div>
        </td>';
        echo '</tr>';
    }
    echo '</tbody></table>  </div>';


        //set schedule 
        echo '<dialog id="Schedulerequest" class="modal p-3 ">
        <div class="modal-box w-70 max-w-3xl rounded-lg">
         
            <div class="mb-2 lg:mb-0">
              <h3 class="text-2xl font-bold text-blue-500 text-center">BRGY-409 Document Request Management System</h3>
              <span class="flex text-base font-medium text-blue-500 justify-center text-center">Schedule Residents Request</span>
            </div>
            <form id="scheduleform" action="Update.php" method="post" enctype="multipart/form-data">
          <div id="schedulemodalcontent"></div>
          </form>
          <div class="mt-4 px-4 py-3 sm:px-6 flex align-items justify-center p-4 gap-4 flex-row">
          <button id="scheduleclose" class="btn btn-sm btn-circle btn-ghost absolute top-2 right-2">
          ✕
        </button>
        <div class="px-4 py-3 sm:px-6 flex align-items justify-center p-4 gap-4 flex-row">
        <button" id="schedulrbutton" class="inline-flex justify-center  rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-500 hover:bg-green-600 text-base font-medium text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 sm:w-auto sm:text-sm"> 
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
        const modal = document.getElementById("Schedulerequest");
        const modalContent = document.getElementById("schedulemodalcontent");
        const openModalButtons = document.querySelectorAll(".Schedule-resident-pickup");
        const closeModalButton = document.getElementById("scheduleclose");
        openModalButtons.forEach(function (button) {
          button.addEventListener("click", function () {
            const ID = button.getAttribute("data-request-id");
            const servietype = button.getAttribute("data-request-servietype");
            const fname = button.getAttribute("data-request-Fname");
            const mname = button.getAttribute("data-request-Mname");
            const lname = button.getAttribute("data-request-Lname");
            // Display default text in modal content
            modalContent.innerHTML = `
          

            <div class="flex flex-col items-center mt-3 mb-5">
           
            <div class="mx-auto text-center" style="width: 200px;">
            <img src="/Images/schedule.svg" alt="Illustration" class="w-30 h-auto">
            <p class="text-lg font-semibold text-center ">Schedule Release for</p>
            </div>
            
        <h1 class="text-xl font-bold">${fname}, ${mname} ${lname}</h1>
        <h1 class="text-sm mt-3  font-bold"><span class="font-semibold">Request-ID:</span> ${ID}</h1>
        <h1 class="text-sm font-bold"><span class="font-semibold">Service-Type:</span> ${servietype}</h1>
            <div class="hidden  items-center justify-center mt-3">
            <input  value="${ID}"   type="text" name="scheduleID" id="scheduleID" autocomplete="given-name" placeholder=""
                class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 ">
        </div>
        </div>

        <div class=" mt-3 flex flex-col sm:flex-row gap-x-6">
        <div class="sm:flex-1">
            <label for="setdate" class="block text-sm font-semibold leading-6 text-gray-900 text-center">Set Date</label>
            <div class="mt-2">
                <input  required="" type="date" name="setdate" id="setdate" autocomplete="organization"
                    placeholder="Your Occupation"
                    class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 flex-1">
            </div>
        </div>
        <div class="sm:flex-1">
            <label for="settime" class="block text-sm font-semibold leading-6 text-gray-900 text-center">Set Time</label>
            <div class="mt-2">
                <input   required="" type="time" name="settime" id="settime" autocomplete="email"
                    placeholder="Your Contact Number"
                    class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 flex-1">
            </div>
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
          $("#schedulrbutton").click(function(e) {
              e.preventDefault();
  
              var valid = $("#scheduleform")[0].checkValidity();
  
              if (valid) {
                  var formData = new FormData($("#scheduleform")[0]);
  
                  $.ajax({
                      type: "POST",
                      url: "Update.php",
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
      document.getElementById("schedulrbutton").addEventListener("click", function() {
          var dialog = document.getElementById("Schedulerequest");
          dialog.close();
      });
  </script>';


 //reschdule request

 echo '<dialog id="Re-Schedulerequest" class="modal p-3 ">
 <div class="modal-box w-70 max-w-3xl rounded-lg">
  
     <div class="mb-2 lg:mb-0">
       <h3 class="text-2xl font-bold text-blue-500 text-center">BRGY-409 Document Request Management System</h3>
       <span class="flex text-base font-medium text-blue-500 justify-center text-center">Re-Schedule Residents Request</span>
     </div>
     <form id="Re-scheduleform" action="Update.php" method="post" enctype="multipart/form-data">
   <div id="reschedulemodalcontent"></div>
   </form>
   <div class="mt-4 px-4 py-3 sm:px-6 flex align-items justify-center p-4 gap-4 flex-row">
   <button id="Re-scheduleclose" class="btn btn-sm btn-circle btn-ghost absolute top-2 right-2">
   ✕
 </button>
 <div class="px-4 py-3 sm:px-6 flex align-items justify-center p-4 gap-4 flex-row">
 <button" id="Re-schedulrbutton" class="inline-flex justify-center  rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-500 hover:bg-green-600 text-base font-medium text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 sm:w-auto sm:text-sm"> 
 <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-1">
 <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
</svg>
  Re-Schedule Date of Request
 </button>
  </div>
   </div>
 </div>
</dialog>';
echo '<script>
document.addEventListener("DOMContentLoaded", function () {
 const modal = document.getElementById("Re-Schedulerequest");
 const modalContent = document.getElementById("reschedulemodalcontent");
 const openModalButtons = document.querySelectorAll(".ReSchedule-resident-request");
 const closeModalButton = document.getElementById("Re-scheduleclose");
 openModalButtons.forEach(function (button) {
   button.addEventListener("click", function () {
     const ID = button.getAttribute("data-request-id");
     const servietype = button.getAttribute("data-request-servietype");
     const fname = button.getAttribute("data-request-Fname");
     const mname = button.getAttribute("data-request-Mname");
     const lname = button.getAttribute("data-request-Lname");

     const setdate = button.getAttribute("data-reschedule-date");
     const settime = button.getAttribute("data-reschedule-time");



     // Display default text in modal content
     modalContent.innerHTML = `
   

     <div class="flex flex-col items-center mt-3 mb-5">
    
     <div class="mx-auto text-center" style="width: 200px;">
     <img src="/Images/reschedule.svg" alt="Illustration" class="w-30 h-auto">
     <p class="text-lg font-semibold text-center ">Re Schedule Release for</p>
     </div>
     
 <h1 class="text-xl font-bold">${fname}, ${mname} ${lname}</h1>
 <h1 class="text-sm mt-3  font-bold"><span class="font-semibold">Request-ID:</span> ${ID}</h1>
 <h1 class="text-sm font-bold"><span class="font-semibold">Service-Type:</span> ${servietype}</h1>
     <div class="hidden  items-center justify-center mt-3">
     <input  value="${ID}"   type="text" name="scheduleID" id="scheduleID" autocomplete="given-name" placeholder=""
         class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 ">
 </div>
 </div>

 <div class=" mt-3 flex flex-col sm:flex-row gap-x-6">
 <div class="sm:flex-1">
     <label for="setdate" class="block text-sm font-semibold leading-6 text-gray-900 text-center">Set Date</label>
     <div class="mt-2">
         <input value="${setdate}"  required="" type="date" name="setdate" id="setdate" autocomplete="organization"
             placeholder="Your Occupation"
             class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 flex-1">
     </div>
 </div>
 <div class="sm:flex-1">
     <label for="settime" class="block text-sm font-semibold leading-6 text-gray-900 text-center">Set Time</label>
     <div class="mt-2">
         <input  value="${settime}" required="" type="time" name="settime" id="settime" autocomplete="email"
             placeholder="Your Contact Number"
             class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 flex-1">
     </div>
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
   $("#Re-schedulrbutton").click(function(e) {
       e.preventDefault();

       var valid = $("#Re-scheduleform")[0].checkValidity();

       if (valid) {
           var formData = new FormData($("#Re-scheduleform")[0]);

           $.ajax({
               type: "POST",
               url: "Update.php",
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
document.getElementById("Re-schedulrbutton").addEventListener("click", function() {
   var dialog = document.getElementById("Re-Schedulerequest");
   dialog.close();
});
</script>';


//mark as release

echo '<dialog id="markkasreleased" class="modal p-3 ">
<div class="modal-box w-70 max-w-3xl rounded-lg">

<div class="mb-2 lg:mb-0">
 <h3 class="text-2xl font-bold text-blue-500 text-center">BRGY-409 Document Request Management System</h3>
 <span class="flex text-base font-medium text-blue-500 justify-center text-center">Released Residents Request</span>
</div>
<form id="releasedresidentreq" action="Update.php" method="post" enctype="multipart/form-data">
<div id="released-request-info"></div>
</form>
<div class="mt-4 px-4 py-3 sm:px-6 flex align-items justify-center p-4 gap-4 flex-row">
<button id="releasedresident-edit-close-modal-btn" class="btn btn-sm btn-circle btn-ghost absolute top-2 right-2">
✕
</button>
<div class="px-4 py-3 sm:px-6 flex align-items justify-center p-4 gap-4 flex-row">
<button" id="releasedsidentbutton" class="inline-flex justify-center  rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-500 hover:bg-green-600 text-base font-medium text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 sm:w-auto sm:text-sm"> 
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
const modal = document.getElementById("markkasreleased");
const modalContent = document.getElementById("released-request-info");
const openModalButtons = document.querySelectorAll(".mark-as-released");
const closeModalButton = document.getElementById("releasedresident-edit-close-modal-btn");
openModalButtons.forEach(function (button) {
button.addEventListener("click", function () {
const ID = button.getAttribute("data-request-id");
const servietype = button.getAttribute("data-request-servietype");
const profile = button.getAttribute("data-verifyResidents-profile");
const fname = button.getAttribute("data-request-Fname");
const mname = button.getAttribute("data-request-Mname");
const lname = button.getAttribute("data-request-Lname");
// Display default text in modal content
modalContent.innerHTML = `


<div class="flex flex-col items-center mt-3 mb-5">

<div class="mx-auto text-center" style="width: 200px;">
<img src="/Images/release.svg" alt="Illustration" class="w-30 h-auto">
<p class="text-lg font-semibold text-center ">Mark Released</p>
</div>

<h1 class="text-xl font-bold">${fname}, ${mname} ${lname}</h1>
<h1 class="text-sm mt-3  font-bold"><span class="font-semibold">Request-ID:</span> ${ID}</h1>
<h1 class="text-sm font-bold"><span class="font-semibold">Service-Type:</span> ${servietype}</h1>
<div class="hidden items-center justify-center mt-3">
   <input Value="Released" type="text" name="releasedstat" id="releasedstat" autocomplete="given-name" placeholder=""
       class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 ">
</div>

<div class="hidden  items-center justify-center mt-3">
<input  value="${ID}"   type="text" name="markreleasedID" id="markreleasedID" autocomplete="given-name" placeholder=""
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
$("#releasedsidentbutton").click(function(e) {
 e.preventDefault();

 var valid = $("#releasedresidentreq")[0].checkValidity();

 if (valid) {
     var formData = new FormData($("#releasedresidentreq")[0]);

     $.ajax({
         type: "POST",
         url: "Update.php",
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
document.getElementById("releasedsidentbutton").addEventListener("click", function() {
var dialog = document.getElementById("markkasreleased");
dialog.close();
});
</script>';

} else {
    echo '<div class="mx-auto text-center mt-8" style="width: 200px;">';
    echo '<img src="/Images/norequest.svg" alt="Illustration" class="w-30 h-auto">';
    echo "<p class='text-lg font-semibold text-center'>No Request Found</p>";
    echo '</div>';
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.3/dist/sweetalert2.all.min.js"></script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="https://demo.themesberg.com/windster/app.bundle.js"></script>
 </div>
 <script src="../javascript/dashboard.js"></script>
</body>
</html>