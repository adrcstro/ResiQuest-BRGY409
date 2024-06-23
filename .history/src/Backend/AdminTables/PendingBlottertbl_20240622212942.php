<?php
include __DIR__ . '/../Connection.php';
$conn = mysqli_connect($servername, $username, $password, $dbname);
if(!$conn){
  echo "Database connection error".mysqli_connect_error();
}
   

    $limit = 5; // Number of entries per page
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $offset = ($page - 1) * $limit;
    
    // Total records query
    $total_query = "SELECT COUNT(*) as total FROM complaintbl INNER JOIN admintbl ON admintbl.AdminID WHERE admintbl.AdminID = $ID AND ComplainStatus='Pending'";
    $total_result = mysqli_query($conn, $total_query);
    $total_row = mysqli_fetch_assoc($total_result);
    $total_records = $total_row['total'];
    $total_pages = ceil($total_records / $limit);
    
    // Data query with pagination
    $query = "SELECT complaintbl.*, admintbl.* 
    FROM complaintbl 
    INNER JOIN admintbl ON admintbl.AdminID
    WHERE admintbl.AdminID = $ID AND Status='Pending'
    LIMIT $limit OFFSET $offset";
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
            <li class="ViewBlotter" data-viewblootter-id="' . $row["ComplainID"] . '" ><a><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
            </svg> View Blotter Details</a></li>
            <li class="processBlotter" data-processblootter-id="' . $row["ComplainID"] . '" data-adminid-logs="' . $row["AdminID"] . '" data-adminusername-logs="' . $row["Lname"] . ',' . $row["Fname"] . ' ' . $row["MName"] . ' " data-adminposition-logs="' . $row["BrgyPosition"] . '" >
                <a>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
</svg>
                Process Blotter</a></li>
        </ul>
    </div>
</td>';

      echo '</tr>';
}
echo '</tbody></table>';
   
echo '<nav aria-label="Page navigation example" class="flex justify-first mt-4">';
echo '<ul class="inline-flex -space-x-px text-sm">';

// Previous button
if ($page > 1) {
    echo '<li><a href="?page=' . ($page - 1) . '" class="pagination-btn flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Previous</a></li>';
}

// Page numbers
for ($i = 1; $i <= $total_pages; $i++) {
    $activeClass = $i == $page ? 'text-blue-600 bg-blue-50 hover:bg-blue-100 hover:text-blue-700' : 'text-gray-500 bg-white hover:bg-gray-100 hover:text-gray-700';
    echo '<li><a href="?page=' . $i . '" class="pagination-btn flex items-center justify-center px-3 h-8 leading-tight border border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white ' . $activeClass . '">' . $i . '</a></li>';
}

// Next button
if ($page < $total_pages) {
    echo '<li><a href="?page=' . ($page + 1) . '" class="pagination-btn flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Next</a></li>';
}

echo '</ul></nav>';
echo'</div>';
           

echo '<dialog id="ViewBlotterdetails" class="modal p-3">
                            <div class="modal-box w-100 max-w-4xl rounded-none">
                                <div class="mb-2 lg:mb-0">
                                  <h3 class="text-2xl font-bold text-blue-500 text-center">BRGY-409 Document Request Management System</h3>
                                  <span class="flex text-base font-medium text-blue-500 justify-center text-center">Blotter Details</span>
                                </div>
                              <div id="ViewBlotter-modal-content-resident-request" class="mt-8 px-4 py-3 sm:px-6 flex align-items justify-center p-4 gap-4 flex-row"></div>
                              <div class="mt-4 px-4 py-3 sm:px-6 flex align-items justify-center p-4 gap-4 flex-row">
                              <button id="ViewBlotteradminrequestclose-modal-btn" class="btn btn-sm btn-circle btn-ghost absolute top-2 right-2">
                              ✕
                            </button>
                              </div>
                            </div>
                          </dialog>';
                    // JavaScript to handle modal functionality
                    echo '<script>
                            document.addEventListener("DOMContentLoaded", function () {
                              const modal = document.getElementById("ViewBlotterdetails");
                              const modalContent = document.getElementById("ViewBlotter-modal-content-resident-request");
                              const openModalButtons = document.querySelectorAll(".ViewBlotter");
                              const closeModalButton = document.getElementById("ViewBlotteradminrequestclose-modal-btn");
                    
                              openModalButtons.forEach(function (button) {
                                button.addEventListener("click", function () {
                                  const blotterid = button.getAttribute("data-viewblootter-id");
                    
                                  // Fetch request details using AJAX
                                  fetch("../Backend/fetch_blotterinfo.php?blootter_id=" + blotterid)
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


                          echo '<dialog id="processblotter" class="modal p-3 ">
                          <div class="modal-box w-70 max-w-3xl rounded-lg">
                           
                              <div class="mb-2 lg:mb-0">
                                <h3 class="text-2xl font-bold text-blue-500 text-center">BRGY-409 Document Request Management System</h3>
                                <span class="flex text-base font-medium text-blue-500 justify-center text-center">Process Blotter Report</span>
                              </div>
                            
                              <form id="processblotterform" action="../Backend/Update.php" method="post" enctype="multipart/form-data">
                  
                            <div id="processresi-blotter-info"></div>
                            </form>
                  
                            <div class="mt-4 px-4 py-3 sm:px-6 flex align-items justify-center p-4 gap-4 flex-row">
                            <button id="processblotter-edit-close-modal-btn" class="btn btn-sm btn-circle btn-ghost absolute top-2 right-2">
                            ✕
                          </button>
                          <div class="px-4 py-3 sm:px-6 flex align-items justify-center p-4 gap-4 flex-row">
                          
                          <button" id="processblotterresidentbutton" class="inline-flex justify-center  rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-500 hover:bg-green-600 text-base font-medium text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 sm:w-auto sm:text-sm"> 
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2">
    <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
  </svg>
                            Mark as Process
                          </button>
                           </div>
                            </div>
                          </div>
                        </dialog>';
                  
                  
                        echo '<script>
                        document.addEventListener("DOMContentLoaded", function () {
                          const modal = document.getElementById("processblotter");
                          const modalContent = document.getElementById("processresi-blotter-info");
                          const openModalButtons = document.querySelectorAll(".processBlotter");
                          const closeModalButton = document.getElementById("processblotter-edit-close-modal-btn");
                        
                          openModalButtons.forEach(function (button) {
                            button.addEventListener("click", function () {
                              const blotteridprocess = button.getAttribute("data-processblootter-id");
                              const adminidlogs = button.getAttribute("data-adminid-logs");
                              const adminusernamelogs = button.getAttribute("data-adminusername-logs");
                              const adminpositionlogs = button.getAttribute("data-adminposition-logs");
                        




                              // Display default text in modal content
                              modalContent.innerHTML = `
                            
                  
                              <div class="flex flex-col items-center mt-3">
                             
                              <div class="mx-auto text-center mt-8" style="width: 200px;">
                              <img src="/Images/processreq.svg" alt="Illustration" class="w-30 h-auto">
                              <p class="text-lg font-semibold text-center ">Process Blotter Report</p>
                              </div>
                              
                          <h1 class="text-xl font-bold">Case-ID: ${blotteridprocess}</h1>
                              
                          <div class="hidden items-center justify-center mt-3">
                          <input Value="On-Process" type="text" name="blotterprocessstat" id="blotterprocessstat" autocomplete="given-name" placeholder=""
                              class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 ">
                      </div>

                          <div class="hidden  items-center justify-center mt-3">
                          <input  value="${blotteridprocess}"   type="text" name="blotterprocessID" id="blotterprocessID" autocomplete="given-name" placeholder=""
                              class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 ">
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
                    <input value="Process Blotter Case ${blotteridprocess}"  type="text" name="Adminactiondone" id="Adminactiondone" autocomplete="street-address" 
                        class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 mb-4">
                    </div>
                    <div class="hidden">
                      <label for="categorization" class="block text-sm font-medium text-gray-700">categorization</label>
                      <input value="process"  type="text" name="categorization" id="categorization" autocomplete="street-address" 
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
                            $("#processblotterresidentbutton").click(function(e) {
                                e.preventDefault();
                    
                                var valid = $("#processblotterform")[0].checkValidity();
                    
                                if (valid) {
                                    var formData = new FormData($("#processblotterform")[0]);
                    
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
                        document.getElementById("processblotterresidentbutton").addEventListener("click", function() {
                            var dialog = document.getElementById("processblotter");
                            dialog.close();
                        });
                    </script>';
    } else {
        echo '<div class="mx-auto text-center mt-4" style="width: 200px;">';
        echo '<img src="/Images/norequest.svg" alt="Illustration" class="w-30 h-auto">';
        echo "<p class='text-lg font-semibold text-center '>No Pending Blotter </p>";
        echo '</div>';
    }
?> 