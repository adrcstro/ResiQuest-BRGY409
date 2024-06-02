<?php
include __DIR__ . '/../Connection.php';
$conn = mysqli_connect($servername, $username, $password, $dbname);
if(!$conn){
  echo "Database connection error".mysqli_connect_error();
}
    $query = "SELECT * FROM  complaintbl WHERE ComplainStatus='On-Process'";

    $ID = $_SESSION["AdminID"];
    $query = "SELECT complaintbl.*, admintbl.* 
    FROM complaintbl INNER JOIN admintbl ON admintbl.AdminID WHERE admintbl.AdminID = $ID AND ComplainStatus='On-Process'";

    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) > 0) {
        // Output table header
        echo '<div class="overflow-x-auto h-screen"><table class="table-auto min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="p-4 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Case ID</th>
                        <th scope="col" class="p-4 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Complainant</th>
                        <th scope="col" class="p-4 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Date Filed</th>
                        <th scope="col" class="p-4 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Respondent</th>
                        <th scope="col" class="p-4 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Narrative Report</th>
                      <th scope="col" class="p-4 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white">';

        // Fetch and display each row
       // Fetch and display each row
while($row = mysqli_fetch_assoc($result)) {
  echo "<tr>";
  echo '<td class="p-3 border border-inherit text-center  whitespace-nowrap text-sm font-semibold text-gray-900">' . $row["ComplainID"] . '</td>';
  echo '<td class="p-3 border border-inherit text-center  whitespace-nowrap text-sm font-semibold text-gray-900">' . $row["ComplainantFName"] . ' ' . $row["ComplainantMName"] . ' ' . $row["ComplainantLName"] . '</td>';
  echo '<td class="p-3 border border-inherit text-center  whitespace-nowrap text-sm font-semibold text-gray-900">' . $row["DateofReport"] . '</td>';
  echo '<td class="p-3 border border-inherit text-center  whitespace-nowrap text-sm font-semibold text-gray-900">' . $row["NameofComplainee"] . '</td>';
  $ComplainDescription = htmlspecialchars($row["ComplainDescription"]);
  if (strlen($ComplainDescription) > 10) {
    $ComplainDescription = substr($ComplainDescription, 0, 10) . '...';
  }
  echo '<td class="p-3 border border-inherit text-center whitespace-nowrap text-sm font-semibold text-gray-900">' . $ComplainDescription . "</td>";
  echo '<td class="p-3 border border-inherit text-center   whitespace-nowrap text-sm font-semibold text-gray-900">
    <div class="dropdown dropdown-end">
        <div tabindex="0" role="button" class="flex items-center justify-between text-white font-semibold btn w-40 bg-blue-400 hover:bg-blue-500">
            Action Details
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
            </svg>
        </div>
        <ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow-2xl bg-base-100 rounded-box w-52">
            <li class="blotterbtnprint" data-Complaint-id="' . $row["ComplainID"] . '"><a><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6.72 13.829c-.24.03-.48.062-.72.096m.72-.096a42.415 42.415 0 0 1 10.56 0m-10.56 0L6.34 18m10.94-4.171c.24.03.48.062.72.096m-.72-.096L17.66 18m0 0 .229 2.523a1.125 1.125 0 0 1-1.12 1.227H7.231c-.662 0-1.18-.568-1.12-1.227L6.34 18m11.318 0h1.091A2.25 2.25 0 0 0 21 15.75V9.456c0-1.081-.768-2.015-1.837-2.175a48.055 48.055 0 0 0-1.913-.247M6.34 18H5.25A2.25 2.25 0 0 1 3 15.75V9.456c0-1.081.768-2.015 1.837-2.175a48.041 48.041 0 0 1 1.913-.247m10.5 0a48.536 48.536 0 0 0-10.5 0m10.5 0V3.375c0-.621-.504-1.125-1.125-1.125h-8.25c-.621 0-1.125.504-1.125 1.125v3.659M18 10.5h.008v.008H18V10.5Zm-3 0h.008v.008H15V10.5Z" />
          </svg>
          Print Blotter Report</a></li>

            <li class="blottersetonsched" data-Complaint-id="' . $row["ComplainID"] . '">
                <a>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                 <path stroke-linecap="round" stroke-linejoin="round" d="M11.35 3.836c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m8.9-4.414c.376.023.75.05 1.124.08 1.131.094 1.976 1.057 1.976 2.192V16.5A2.25 2.25 0 0 1 18 18.75h-2.25m-7.5-10.5H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V18.75m-7.5-10.5h6.375c.621 0 1.125.504 1.125 1.125v9.375m-8.25-3 1.5 1.5 3-3.75" />
                 </svg>
                Mark as Complete</a></li>
        </ul>
    </div>
</td>';

      echo '</tr>';
}
echo '</tbody></table></div>';

//print request 
echo '<dialog id="blotterreport" class="modal p-3 ">
<div class="modal-box w-70 max-w-3xl rounded-lg">
 
    <div class="mb-2 lg:mb-0">
      <h3 class="text-2xl font-bold text-blue-500 text-center">BRGY-409 Document Request Management System</h3>
      <span class="flex text-base font-medium text-blue-500 justify-center text-center">Print Blotter Report</span>
    </div>
    <form id="printblotterdocsform" action="" method="post" enctype="multipart/form-data">
      <div id="printblotterdocument"></div>
    </form>
    <div class="mt-4 px-4 py-3 sm:px-6 flex align-items justify-center p-4 gap-4 flex-row">
      <button id="printblotterclose" class="btn btn-sm btn-circle btn-ghost absolute top-2 right-2">✕</button>
      <div class="px-4 py-3 sm:px-6 flex align-items justify-center p-4 gap-4 flex-row">
        <button id="printblotterdocument-btn" class="inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-500 hover:bg-green-600 text-base font-medium text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 sm:w-auto sm:text-sm"> 
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-1">
        <path stroke-linecap="round" stroke-linejoin="round" d="M6.72 13.829c-.24.03-.48.062-.72.096m.72-.096a42.415 42.415 0 0 1 10.56 0m-10.56 0L6.34 18m10.94-4.171c.24.03.48.062.72.096m-.72-.096L17.66 18m0 0 .229 2.523a1.125 1.125 0 0 1-1.12 1.227H7.231c-.662 0-1.18-.568-1.12-1.227L6.34 18m11.318 0h1.091A2.25 2.25 0 0 0 21 15.75V9.456c0-1.081-.768-2.015-1.837-2.175a48.055 48.055 0 0 0-1.913-.247M6.34 18H5.25A2.25 2.25 0 0 1 3 15.75V9.456c0-1.081.768-2.015 1.837-2.175a48.041 48.041 0 0 1 1.913-.247m10.5 0a48.536 48.536 0 0 0-10.5 0m10.5 0V3.375c0-.621-.504-1.125-1.125-1.125h-8.25c-.621 0-1.125.504-1.125 1.125v3.659M18 10.5h.008v.008H18V10.5Zm-3 0h.008v.008H15V10.5Z" />
      </svg>
          Print Blotter Report
        </button>
      </div>
    </div>
  </div>
</dialog>';


echo '<script>
document.addEventListener("DOMContentLoaded", function () {
  const modal = document.getElementById("blotterreport");
  const modalContent = document.getElementById("printblotterdocument");
  const openModalButtons = document.querySelectorAll(".blotterbtnprint");
  const closeModalButton = document.getElementById("printblotterclose");
  const printblotterdocsform = document.getElementById("printblotterdocsform");
  openModalButtons.forEach(function (button) {
    button.addEventListener("click", function () {
      const blotterID = button.getAttribute("data-Complaint-id");
      printblotterdocsform.action = "../Backend/Generateblotterreport.php";
      // Display default text in modal content
      modalContent.innerHTML = `
        <div class="flex flex-col items-center mt-3 mb-5">
          <div class="mx-auto text-center" style="width: 200px;">
            <img src="/Images/print.svg" alt="Illustration" class="w-30 h-auto">
            <p class="text-lg font-semibold text-center ">Print Blotter Report</p>
          </div>
          <h1 class="text-sm mt-3  font-bold"><span class="font-semibold">Case-ID:</span> ${blotterID}</h1>
          <div class="hidden  items-center justify-center mt-3">
            <input  value="${blotterID}"   type="text" name="blotterIDprint" id="blotterIDprint" autocomplete="given-name" placeholder=""
                class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 ">
          </div>
        </div>
      `;
      
      // Open the modal
      modal.showModal();
    });
  });

  // Close modal button
  closeModalButton.addEventListener("click", function () {
    modal.close();
  });
});
</script>';

echo '<dialog id="setonschedblotter" class="modal p-3 ">
                          <div class="modal-box w-70 max-w-3xl rounded-lg">
                           
                              <div class="mb-2 lg:mb-0">
                                <h3 class="text-2xl font-bold text-blue-500 text-center">BRGY-409 Document Request Management System</h3>
                                <span class="flex text-base font-medium text-blue-500 justify-center text-center">Mark as Complete</span>
                              </div>
                            
                              <form id="setonschedblotterform" action="../Backend/Update.php" method="post" enctype="multipart/form-data">
                  
                            <div id="setonschedresi-blotter-info"></div>
                            </form>
                  
                            <div class="mt-4 px-4 py-3 sm:px-6 flex align-items justify-center p-4 gap-4 flex-row">
                            <button id="setonschedblotter-edit-close-modal-btn" class="btn btn-sm btn-circle btn-ghost absolute top-2 right-2">
                            ✕
                          </button>
                          <div class="px-4 py-3 sm:px-6 flex align-items justify-center p-4 gap-4 flex-row">
                          
                          <button" id="setonschedblotterresidentbutton" class="inline-flex justify-center  rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-500 hover:bg-green-600 text-base font-medium text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 sm:w-auto sm:text-sm"> 
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2">
    <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
  </svg>
                            Mark as Completed Blotter Report
                          </button>
                           </div>
                            </div>
                          </div>
                        </dialog>';
                  
                  
                        echo '<script>
                        document.addEventListener("DOMContentLoaded", function () {
                          const modal = document.getElementById("setonschedblotter");
                          const modalContent = document.getElementById("setonschedresi-blotter-info");
                          const openModalButtons = document.querySelectorAll(".blottersetonsched");
                          const closeModalButton = document.getElementById("setonschedblotter-edit-close-modal-btn");
                        
                          openModalButtons.forEach(function (button) {
                            button.addEventListener("click", function () {
                              const blotterid = button.getAttribute("data-Complaint-id");
                              // Display default text in modal content
                              modalContent.innerHTML = `
                            
                  
                              <div class="flex flex-col items-center mt-3">
                             
                              <div class="mx-auto text-center mt-8" style="width: 200px;">
                              <img src="/Images/processreq.svg" alt="Illustration" class="w-30 h-auto">
                              <p class="text-lg font-semibold text-center ">Mark Complete Report</p>
                              </div>
                              
                          <h1 class="text-xl font-bold">Case-ID: ${blotterid}</h1>
                              
                          <div class="hidden items-center justify-center mt-3">
                          <input Value="On-Schedule" type="text" name="blottercompletestat" id="blottercompletestat" autocomplete="given-name" placeholder=""
                              class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 ">
                      </div>

                          <div class="hidden  items-center justify-center mt-3">
                          <input  value="${blotterid}"   type="text" name="completedblotterID" id="completedblotterID" autocomplete="given-name" placeholder=""
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
                            $("#setonschedblotterresidentbutton").click(function(e) {
                                e.preventDefault();
                                var valid = $("#setonschedblotterform")[0].checkValidity();
                                if (valid) {
                                    var formData = new FormData($("#setonschedblotterform")[0]);
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
                        document.getElementById("setonschedblotterresidentbutton").addEventListener("click", function() {
                            var dialog = document.getElementById("setonschedblotter");
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