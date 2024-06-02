<?php
$conn = mysqli_connect($servername, $username, $password, $dbname);
if(!$conn){
  echo "Database connection error".mysqli_connect_error();
}
    $query = "SELECT * FROM  complaintbl WHERE ComplainStatus='On-Schedule' AND (SettlementDate IS NULL OR SettlementDate = '')";
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
            <li class="setscheduleBlotter" data-setscheduleblootter-id="' . $row["ComplainID"] . '">
            <a>
             <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
            </svg>
            Set Schedule</a></li>
        </ul>
    </div>
</td>';

      echo '</tr>';
}
echo '</tbody></table></div>';

echo '</tbody></table></div>';
echo '<dialog id="setblotterschedule" class="modal p-3 ">
<div class="modal-box w-70 max-w-3xl rounded-lg">
    <div class="mb-2 lg:mb-0">
      <h3 class="text-2xl font-bold text-blue-500 text-center">BRGY-409 Document Request Management System</h3>
      <span class="flex text-base font-medium text-blue-500 justify-center text-center">Schedule Residents Blotter Settlement</span>
    </div>
    <form id="setscheduleBlotterform" action="../Backend/Update.php" method="post" enctype="multipart/form-data">
  <div id="setscheduleBlottermodalcontent"></div>
  </form>
  <div class="mt-4 px-4 py-3 sm:px-6 flex align-items justify-center p-4 gap-4 flex-row">
  <button id="setscheduleBlotterclose" class="btn btn-sm btn-circle btn-ghost absolute top-2 right-2">
  ✕
</button>
<div class="px-4 py-3 sm:px-6 flex align-items justify-center p-4 gap-4 flex-row">
<button" id="setscheduleBlotterbutton" class="inline-flex justify-center  rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-500 hover:bg-green-600 text-base font-medium text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 sm:w-auto sm:text-sm"> 
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
const modal = document.getElementById("setblotterschedule");
const modalContent = document.getElementById("setscheduleBlottermodalcontent");
const openModalButtons = document.querySelectorAll(".setscheduleBlotter");
const closeModalButton = document.getElementById("setscheduleBlotterclose");
openModalButtons.forEach(function (button) {
  button.addEventListener("click", function () {
    const setscheduleblotterid = button.getAttribute("data-setscheduleblootter-id");
    
    // Display default text in modal content
    modalContent.innerHTML = `
    <div class="flex flex-col items-center mt-3 mb-5">
    <div class="mx-auto text-center" style="width: 200px;">
    <img src="/Images/schedule.svg" alt="Illustration" class="w-30 h-auto">
    <p class="text-lg font-semibold text-center ">Schedule Blotter Report</p>
    </div>
<h1 class="text-sm mt-3  font-bold"><span class="font-semibold">Case-ID:</span> ${setscheduleblotterid}</h1>
    <div class="hidden  items-center justify-center mt-3">
    <input  value="${setscheduleblotterid}"   type="text" name="blotteridsetschedID" id="blotteridsetschedID" autocomplete="given-name" placeholder=""
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
  $("#setscheduleBlotterbutton").click(function(e) {
      e.preventDefault();
      var valid = $("#setscheduleBlotterform")[0].checkValidity();
      if (valid) {
          var formData = new FormData($("#setscheduleBlotterform")[0]);
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
document.getElementById("setscheduleBlotterbutton").addEventListener("click", function() {
  var dialog = document.getElementById("setblotterschedule");
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