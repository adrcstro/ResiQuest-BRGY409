<?php
                     include __DIR__ . '/../Connection.php';
                        $conn = mysqli_connect($servername, $username, $password, $dbname);
                        if (!$conn) {
                            echo "Database connection error" . mysqli_connect_error();
                        }
                        $ID = $_SESSION["AdminID"];
                        $query = "SELECT requestdocument.*, admintbl.* 
                        FROM requestdocument INNER JOIN admintbl ON admintbl.AdminID WHERE admintbl.AdminID = $ID AND Status='Pending'";
                        $result = mysqli_query($conn, $query);



                        $limit = 5; // Number of entries per page
                        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                        $offset = ($page - 1) * $limit;
                        
                        // Total records query
                        $total_query = "SELECT COUNT(*) as total FROM requestdocument INNER JOIN admintbl ON admintbl.AdminID WHERE admintbl.AdminID = $ID AND Status='Pending'";
                        $total_result = mysqli_query($conn, $total_query);
                        $total_row = mysqli_fetch_assoc($total_result);
                        $total_records = $total_row['total'];
                        $total_pages = ceil($total_records / $limit);
                        
                        // Data query with pagination
                        $query = "SELECT requestdocument.*, admintbl.* 
                        FROM requestdocument AND Status='Pending'
                        INNER JOIN admintbl ON admintbl.AdminID
                        WHERE admintbl.AdminID = $ID 
                        LIMIT $limit OFFSET $offset";
                        $result = mysqli_query($conn, $query);
                        















                        if (mysqli_num_rows($result) > 0) {
                            // Output table header
                            echo '<div class="overflow-x-auto h-screen"><table class="table-auto min-w-full divide-y divide-gray-200 mt-3 mb-6">
           <thead class="bg-gray-50 ">
               <tr>
               <th scope="col" class="p-4 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Request ID</th>
               <th scope="col" class="p-4 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Residents Name</th>
               <th scope="col" class="p-4 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Service Type</th>
               <th scope="col" class="p-4 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Date Requested</th>
               <th scope="col" class="p-4 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
               </tr>
           </thead>
           <tbody class="bg-white ">';
                            // Fetch and display each row
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<tr">';
                                echo '<td class="p-3 border border-inherit text-center  whitespace-nowrap text-sm font-semibold text-gray-900">' . $row["RequestID"] . '</td>';
                                echo '<td class="p-3 border border-inherit text-center  whitespace-nowrap text-sm font-semibold text-gray-900">' . $row["FirstName"] . ' ' . $row["Middlename"] . ' ' . $row["Lastname"] . '</td>';
                                echo '<td class="p-3 border border-inherit text-center  whitespace-nowrap text-sm font-semibold text-gray-900">' . $row["ServiceType"] . '</td>';
                                echo '<td class="p-3 border border-inherit text-center  whitespace-nowrap text-sm font-semibold text-gray-900">' . $row["DateRequested"] . '</td>';
                                echo '<td class="p-1 border flex items-center justify-center border-inherit text-center whitespace-nowrap text-sm font-semibold text-gray-900">
       <div class="dropdown  dropdown-end">
       <div tabindex="0" role="button" class="flex items-center justify-between text-white font-semibold btn w-40 bg-blue-400 hover:bg-blue-500">
       Action Details
       <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
         <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
       </svg>
     </div>
       <ul tabindex="0"  class="dropdown-content z-[1] menu p-2 shadow-2xl bg-base-100 rounded-box w-52 ">
           <li class="view-request-btn" data-request-id="' . $row["RequestID"] . '"><a><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
           <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
           <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
         </svg>
          View Request</a></li>
 
           <li class="admin-edit-request-btn"  data-request-id="' . $row["RequestID"] . '" data-request-Fname="' . $row["FirstName"] . '" data-request-Mname="' . $row["Middlename"] . '" data-request-Lname="' . $row["Lastname"] . '" data-request-Sertype="' . $row["ServiceType"] . '" data-request-DateRequested="' . $row["DateRequested"] . '" data-request-Address="' . $row["Address"] . '" data-request-DateofBirth="' . $row["DateofBirth"] . '"
           data-request-PlaceofBirth="' . $row["PlaceofBirth"] . '" data-request-Civilstat="' . $row["Civilstat"] . '"  data-request-SSSGSIS="' . $row["SSSGSIS"] . '" data-request-Contactname="' . $row["Contactname"] . '" data-request-Contactname="' . $row["Contactname"] . '" data-request-Contactaddress="' . $row["Contactaddress"] . '"  data-request-Contactnum="' . $row["Contactnum"] . '"  data-request-businessloc="' . $row["BusinessLoc"] . '"
           data-request-BusinessAct="' . $row["BusinessAct"] . '" data-request-Purpose="' . $row["Purpose"] . '" data-adminid-logs="' . $row["AdminID"] . '" data-adminusername-logs="' . $row["Lname"] . ',' . $row["Fname"] . ' ' . $row["MName"] . ' " data-adminposition-logs="' . $row["BrgyPosition"] . '" >
           <a><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
           <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
         </svg>
          Edit Request</a></li>
 
          <li class="reject-btn" data-request-id="' . $row["RequestID"] . '"  data-request-Fname="' . $row["FirstName"] . '"  data-request-Mname="' . $row["Middlename"] . '" data-request-Lname="' . $row["Lastname"] . '" data-adminid-logs="' . $row["AdminID"] . '" data-adminusername-logs="' . $row["Lname"] . ',' . $row["Fname"] . ' ' . $row["MName"] . ' " data-adminposition-logs="' . $row["BrgyPosition"] . '" ><a><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
          <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
      </svg>Reject Request</a></li>

      <li class="process-request-btn" data-request-id="' . $row["RequestID"] . '"  data-request-Fname="' . $row["FirstName"] . '"  data-request-Mname="' . $row["Middlename"] . '" data-request-Lname="' . $row["Lastname"] . '" data-adminid-logs="' . $row["AdminID"] . '" data-adminusername-logs="' . $row["Lname"] . ',' . $row["Fname"] . ' ' . $row["MName"] . ' " data-adminposition-logs="' . $row["BrgyPosition"] . '" ><a><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
      <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
    </svg>
    Process Request</a></li>
       </ul>
   </div>
 </td>';
                          echo '</tr>';
                            }
                            // Close table body and table tags
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
                            echo '<dialog id="adminViewrequestdetails" class="modal p-3">
                            <div class="modal-box w-100 max-w-4xl rounded-none">
                                <div class="mb-2 lg:mb-0">
                                  <h3 class="text-2xl font-bold text-blue-500 text-center">BRGY-409 Document Request Management System</h3>
                                  <span class="flex text-base font-medium text-blue-500 justify-center text-center">Document Request Details</span>
                                </div>
                              <div id="modal-content-resident-request" class="mt-8 px-4 py-3 sm:px-6 flex align-items justify-center p-4 gap-4 flex-row"></div>
                              <div class="mt-4 px-4 py-3 sm:px-6 flex align-items justify-center p-4 gap-4 flex-row">
                              <button id="adminrequestclose-modal-btn" class="btn btn-sm btn-circle btn-ghost absolute top-2 right-2">
                              ✕
                            </button>
                              </div>
                            </div>
                          </dialog>';
                    // JavaScript to handle modal functionality
                    echo '<script>
                            document.addEventListener("DOMContentLoaded", function () {
                              const modal = document.getElementById("adminViewrequestdetails");
                              const modalContent = document.getElementById("modal-content-resident-request");
                              const openModalButtons = document.querySelectorAll(".view-request-btn");
                              const closeModalButton = document.getElementById("adminrequestclose-modal-btn");
                    
                              openModalButtons.forEach(function (button) {
                                button.addEventListener("click", function () {
                                  const requestId = button.getAttribute("data-request-id");
                    
                                  // Fetch request details using AJAX
                                  fetch("../Backend/fetch_adminresident_request.php?adminrequest_id=" + requestId)
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
                          echo '<dialog id="adminEditRequestDetails" class="modal p-3 ">
                          <div class="modal-box w-100 max-w-4xl rounded-lg">
                           
                              <div class="mb-2 lg:mb-0">
                                <h3 class="text-2xl font-bold text-blue-500 text-center">BRGY-409 Document Request Management System</h3>
                                <span class="flex text-base font-medium text-blue-500 justify-center text-center">Edit Request Details</span>
                              </div>
                              <form id="admineditrequest" action="../Backend/Update.php" method="post" enctype="multipart/form-data">
                            <div id="Edit-modal-content"></div>
                              </form>
                            <div class="mt-4 px-4 py-3 sm:px-6 flex align-items justify-center p-4 gap-4 flex-row">
                            <button id="adminedit-close-modal-btn" class="btn btn-sm btn-circle btn-ghost absolute top-2 right-2">
                            ✕
                          </button>
                          <div class="px-4 py-3 sm:px-6 flex align-items justify-center p-4 gap-4 flex-row">
                          <button" id="admineditrequestbutton" class="inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-500 hover:bg-green-600 text-base font-medium text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 sm:w-auto sm:text-sm"> 
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-1">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                            Save Request Details
                          </button>
                           </div>
                            </div>
                          </div>
                        </dialog>';


                        echo '<script>
                        document.getElementById("admineditrequestbutton").addEventListener("click", function() {
                            var dialog = document.getElementById("adminEditRequestDetails");
                            dialog.close();
                          });
                        document.addEventListener("DOMContentLoaded", function () {
                            const modal = document.getElementById("adminEditRequestDetails");
                            const modalContent = document.getElementById("Edit-modal-content");
                            const openModalButtons = document.querySelectorAll(".admin-edit-request-btn");
                            const closeModalButton = document.getElementById("adminedit-close-modal-btn");
                            console.log("Modal:", modal);
                            console.log("Modal Content:", modalContent);
                            console.log("Open Modal Buttons:", openModalButtons);
                            console.log("Close Modal Button:", closeModalButton);
                           
                        
                            openModalButtons.forEach(function (button) {
                                button.addEventListener("click", function () {
                                    const status = button.getAttribute("data-Status");
                                    if (status === "On-Process" || status === "Completed") {
                                        Swal.fire({
                                            icon: "error",
                                            title: "Cannot edit this request",
                                            text: "This request is already processed by the Barangay",
                                        });
                                        return; // Stop further execution
                                    }
                                    const requestId = button.getAttribute("data-request-id");
                                    const serviceType = button.getAttribute("data-request-Sertype");
                                    const firstname = button.getAttribute("data-request-Fname");
                                    const middlename = button.getAttribute("data-request-Mname");
                                    const lastname = button.getAttribute("data-request-Lname");
                                    const address = button.getAttribute("data-request-Address");
                                    const purpose = button.getAttribute("data-request-Purpose");
                                    const businesact = button.getAttribute("data-request-BusinessAct");
                                    const businesloc = button.getAttribute("data-request-businessloc");
                                    const dateofbirth = button.getAttribute("data-request-DateofBirth");
                                    const placeofbirth = button.getAttribute("data-request-PlaceofBirth");
                                    const sssgsis = button.getAttribute("data-request-SSSGSIS");
                                    const contactpersonname = button.getAttribute("data-request-Contactname");
                                    const contactpersonnumber = button.getAttribute("data-request-Contactnum");
                                    const contactpersonaddress = button.getAttribute("data-request-Contactaddress");
                                    const adminidlogs = button.getAttribute("data-adminid-logs");
                                    const adminusernamelogs = button.getAttribute("data-adminusername-logs");
                                    const adminpositionlogs = button.getAttribute("data-adminposition-logs");
                                    console.log("Request ID:", requestId);
                                    console.log("Service Type:", serviceType);
                        
                                    // Display static content in modal
                                    modalContent.innerHTML = `
                                        <div class="font-semibold mb-4 text-center mt-4" >
                                            <p>Request ID: ${requestId}</p>
                                            <p>Service Type: ${serviceType}</p>
                                        </div>
                                    `;
                                    // Add static input fields based on ServiceType
                                    let inputFields = "";
                                    if (serviceType === "Certificate of Residency" || serviceType === "Certificate of Indigency") {
                                        inputFields = `
                                        <div class="mx-auto max-w-3xl mt-6">
                                        <div class="grid grid-cols-1 gap-y-6 gap-x-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 2xl:grid-cols-3">
                        
                                        <div class="hidden">
                                        <label for="requestId" class="block text-sm font-medium text-gray-700">RequestID</label>
                                        <input value="${requestId}" required="" type="text" name="requestId" id="requestId" autocomplete="given-name" placeholder="First Name"
                                            class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 mb-2">
                                    </div>
                                    <div class="hidden">
                                        <label for="serviceType" class="block text-sm font-medium text-gray-700">Service Type</label>
                                        <input value="${serviceType}" required="" type="text" name="serviceType" id="serviceType" autocomplete="additional-name" placeholder="Middle Name"
                                            class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 mb-2">
                                    </div>
                                            <div class="flex flex-col">
                                                <label for="EditFirstName" class="block text-sm font-medium text-gray-700">First Name</label>
                                                <input value="${firstname}" required="" type="text" name="EditFirstName" id="EditFirstName" autocomplete="given-name" placeholder="First Name"
                                                    class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 mb-2">
                                            </div>
                                            <div class="flex flex-col">
                                                <label for="EditMiddleName" class="block text-sm font-medium text-gray-700">Middle Name</label>
                                                <input value="${middlename}" required="" type="text" name="EditMiddleName" id="EditMiddleName" autocomplete="additional-name" placeholder="Middle Name"
                                                    class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 mb-2">
                                            </div>
                                            <div class="flex flex-col">
                                                <label for="EditLastName" class="block text-sm font-medium text-gray-700">Last Name</label>
                                                <input value="${lastname}" required="" type="text" name="EditLastName" id="EditLastName" autocomplete="family-name" placeholder="Last Name"
                                                    class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 mb-2">
                                            </div>
                                        </div>
                                        <div class="flex flex-col">
                                            <label for="EditAddress" class="block text-sm font-medium text-gray-700">Complete Address</label>
                                            <input value="${address}" required="" type="text" name="EditAddress" id="EditAddress" autocomplete="street-address" placeholder="Address"
                                                class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 mb-2">
                                        </div>
                                
                                        <div class="flex flex-col">
                                            <label for="EditPurpose" class="block text-sm font-medium text-gray-700">Document Purpose</label>
                                            <select  required="" type="text" name="EditPurpose" id="EditPurpose" autocomplete="off" placeholder="Purpose" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 mb-2">
                                            <option value="${purpose}">${purpose}</option>
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
                                      
                                      </select
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
                                          <input value="Edit Request ${requestId}"  type="text" name="Adminactiondone" id="Adminactiondone" autocomplete="street-address" 
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
                                    } else if (serviceType === "Business Clearance") {
                                        inputFields = `
                                   
                                        <div class="mx-auto max-w-3xl mt-6">
                                        <div class="grid grid-cols-1 gap-y-6 gap-x-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 2xl:grid-cols-3">
                        
                                        <div class="hidden">
                                        <label for="requestId" class="block text-sm font-medium text-gray-700">RequestID</label>
                                        <input value="${requestId}" required="" type="text" name="requestId" id="requestId" autocomplete="given-name" placeholder="First Name"
                                            class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 mb-2">
                                    </div>
                                    <div class="hidden">
                                        <label for="serviceType" class="block text-sm font-medium text-gray-700">Service Type</label>
                                        <input value="${serviceType}" required="" type="text" name="serviceType" id="serviceType" autocomplete="additional-name" placeholder="Middle Name"
                                            class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 mb-2">
                                    </div>
                        
                        
                        
                                            <div>
                                                <label for="EditFirstName" class="block text-sm font-medium text-gray-700">First Name</label>
                                                <input  value="${firstname}" required="" type="text" name="EditFirstName" id="EditFirstName" autocomplete="given-name" placeholder="First Name"
                                                    class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 mr-2">
                                            </div>
                                            <div>
                                                <label for="EditMiddleName" class="block text-sm font-medium text-gray-700">Middle Name</label>
                                                <input value="${middlename}" required="" type="text" name="EditMiddleName" id="EditMiddleName" autocomplete="additional-name" placeholder="Middle Name"
                                                    class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 mr-2">
                                            </div>
                                            <div>
                                                <label for="EditLastName" class="block text-sm font-medium text-gray-700">Last Name</label>
                                                <input value="${lastname}" required="" type="text" name="EditLastName" id="EditLastName" autocomplete="family-name" placeholder="Last Name"
                                                    class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 mr-2">
                                            </div>
                                        </div>
                                        <div class="flex flex-col sm:flex-row gap-x-6">
                                        <div class="mt-4 sm:flex-1">
                                            <label  for="EditBusinessAct" class="block text-sm font-medium text-gray-700">Business Activity</label>
                                            <input  value="${businesact}" required="" type="text" name="EditBusinessAct" id="EditBusinessAct" autocomplete="off" placeholder="Business Activity"
                                                class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 mr-2">
                                        </div>
                        
                                        <div class="mt-4 sm:flex-1 ">
                                            <label for="EditBusinessLoc" class="block text-sm font-medium text-gray-700">Business Location</label>
                                            <input value="${businesloc}" required="" type="text" name="EditBusinessLoc" id="EditBusinessLoc" autocomplete="off" placeholder="Business Location"
                                                class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
                                        </div>
                                        </div>
                        
                                        <div class="mt-4" >
                                        <label for="EditAddress" class="block text-sm font-medium text-gray-700">Complete Address</label>
                                        <input value="${address}" required="" type="text" name="EditAddress" id="EditAddress" autocomplete="street-address" placeholder="Address"
                                            class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 mr-2">
                                    </div>
                        
                        
                                    </div>
                                        `;
                                    } else if (serviceType === "Barangay Identification") {
                                        inputFields = `
                                        <div class="mx-auto max-w-3xl mt-6">
                                        <div class="grid grid-cols-1 gap-y-6 gap-x-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 2xl:grid-cols-3">
                        
                        
                                        <div class="hidden">
                                        <label for="requestId" class="block text-sm font-medium text-gray-700">RequestID</label>
                                        <input value="${requestId}" required="" type="text" name="requestId" id="requestId" autocomplete="given-name" placeholder="First Name"
                                            class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 mb-2">
                                    </div>
                                    <div class="hidden">
                                        <label for="serviceType" class="block text-sm font-medium text-gray-700">Service Type</label>
                                        <input value="${serviceType}" required="" type="text" name="serviceType" id="serviceType" autocomplete="additional-name" placeholder="Middle Name"
                                            class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 mb-2">
                                    </div>
                        
                        
                                            <div>
                                                <label for="EditFirstName" class="block text-sm font-medium text-gray-700">First Name</label>
                                                <input value="${firstname}" required="" type="text" name="EditFirstName" id="EditFirstName" autocomplete="given-name" placeholder="First Name"
                                                    class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 mr-2">
                                            </div>
                                            <div>
                                                <label for="EditMiddleName" class="block text-sm font-medium text-gray-700">Middle Name</label>
                                                <input value="${middlename}" required="" type="text" name="EditMiddleName" id="EditMiddleName" autocomplete="additional-name" placeholder="Middle Name"
                                                    class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 mr-2">
                                            </div>
                                            <div>
                                                <label for="EditLastName" class="block text-sm font-medium text-gray-700">Last Name</label>
                                                <input value="${lastname}" required="" type="text" name="EditLastName" id="EditLastName" autocomplete="family-name" placeholder="Last Name"
                                                    class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 mr-2">
                                            </div>
                                            
                                            <div>
                                                <label for="EditDateOfBirth" class="block text-sm font-medium text-gray-700">Date of Birth</label>
                                                <input value="${dateofbirth}"  required="" type="text" name="EditDateOfBirth" id="EditDateOfBirth" autocomplete="off" placeholder="Date of Birth"
                                                    class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 mr-2">
                                            </div>
                                            <div>
                                                <label for="EditPlaceOfBirth" class="block text-sm font-medium text-gray-700">Place of Birth</label>
                                                <input value="${placeofbirth}" required="" type="text" name="EditPlaceOfBirth" id="EditPlaceOfBirth" autocomplete="off" placeholder="Place of Birth"
                                                    class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 mr-2">
                                            </div>
                        
                                            <div>
                                            <label for="EditSSSGSIS" class="block text-sm font-medium text-gray-700">SSS/GSIS</label>
                                            <input value="${sssgsis}" required="" type="text" name="EditSSSGSIS" id="EditSSSGSIS" autocomplete="off" placeholder="SSS/GSIS"
                                                class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 mr-2">
                                        </div>
                                        </div>
                        
                                        <div class="mt-4">
                                        <label for="EditAddress" class="block text-sm font-medium text-gray-700">Complete Address</label>
                                        <input value="${address}" required="" type="text" name="EditAddress" id="EditAddress" autocomplete="street-address" placeholder="Address"
                                            class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 mr-2">
                                    </div>
                        
                                        <div class="mb-2 mt-8 lg:mb-0">
                                        <h3 class="text-2xl font-bold text-blue-500 text-center">Edit Contact Person  in Case of Emergency</h3>
                                        <span class="flex text-base font-medium text-blue-500 justify-center text-center">Edit a Emergency Contact Person</span>
                                      </div>
                        
                                      <div class="mt-5 flex flex-col sm:flex-row gap-x-6">
                                      <div class="sm:flex-1">
                                            <label for="EditContactName" class="block text-sm font-medium text-gray-700">Contact Person Name</label>
                                            <input value="${contactpersonname}" required="" type="text" name="EditContactName" id="EditContactName" autocomplete="off" placeholder="Contact Name"
                                                class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 mr-2">
                                        </div>
                                        <div class="sm:flex-1">
                                            <label for="EditContactNum" class="block text-sm font-medium text-gray-700">Contact Person Number</label>
                                            <input value="${contactpersonnumber}" required="" type="text" name="EditContactNum" id="EditContactNum" autocomplete="off" placeholder="Contact Number"
                                                class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
                                        </div>
                                        </div>
                                        <div class="mt-2" >
                                            <label for="EditContactAddress" class="block text-sm font-medium text-gray-700">Contact Person Complete Address</label>
                                            <input value="${contactpersonaddress}" required="" type="text" name="EditContactAddress" id="EditContactAddress" autocomplete="off" placeholder="Contact Address"
                                                class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 mr-2">
                                        </div>
                                    </div>
                                        `;
                                    }
                                    
                                    modalContent.innerHTML += inputFields;
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
                            $("#admineditrequestbutton").click(function(e) {
                                e.preventDefault();
                                var valid = $("#admineditrequest")[0].checkValidity();
                                if (valid) {
                                    var formData = new FormData($("#admineditrequest")[0]);
                        
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
                        </script>';
                        echo '<dialog id="processresidentrequest" class="modal p-3 ">
                        <div class="modal-box w-70 max-w-3xl rounded-lg">
                         
                            <div class="mb-2 lg:mb-0">
                              <h3 class="text-2xl font-bold text-blue-500 text-center">BRGY-409 Document Request Management System</h3>
                              <span class="flex text-base font-medium text-blue-500 justify-center text-center">Process Residents Request</span>
                            </div>
                          
                            <form id="processresidentreq" action="../Backend/Update.php" method="post" enctype="multipart/form-data">
                
                          <div id="processresi-request-info"></div>
                          </form>
                
                          <div class="mt-4 px-4 py-3 sm:px-6 flex align-items justify-center p-4 gap-4 flex-row">
                          <button id="processresident-edit-close-modal-btn" class="btn btn-sm btn-circle btn-ghost absolute top-2 right-2">
                          ✕
                        </button>
                        <div class="px-4 py-3 sm:px-6 flex align-items justify-center p-4 gap-4 flex-row">
                        
                        <button" id="processresidentbutton" class="inline-flex justify-center  rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-500 hover:bg-green-600 text-base font-medium text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 sm:w-auto sm:text-sm"> 
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
                        const modal = document.getElementById("processresidentrequest");
                        const modalContent = document.getElementById("processresi-request-info");
                        const openModalButtons = document.querySelectorAll(".process-request-btn");
                        const closeModalButton = document.getElementById("processresident-edit-close-modal-btn");
                      
                        openModalButtons.forEach(function (button) {
                          button.addEventListener("click", function () {
                            const ID = button.getAttribute("data-request-id");
                            const profile = button.getAttribute("data-verifyResidents-profile");
                            const fname = button.getAttribute("data-request-Fname");
                            const mname = button.getAttribute("data-request-Mname");
                            const lname = button.getAttribute("data-request-Lname");
                            const adminidlogs = button.getAttribute("data-adminid-logs");
                            const adminusernamelogs = button.getAttribute("data-adminusername-logs");
                            const adminpositionlogs = button.getAttribute("data-adminposition-logs");

                            // Display default text in modal content
                            modalContent.innerHTML = `
                          
                
                            <div class="flex flex-col items-center mt-3">
                           
                            <div class="mx-auto text-center mt-8" style="width: 200px;">
                            <img src="/Images/processreq.svg" alt="Illustration" class="w-30 h-auto">
                            <p class="text-lg font-semibold text-center ">Process Request of </p>
                            </div>
                            
                        <h1 class="text-xl font-bold">${fname}, ${mname} ${lname}</h1>
                        <h1 class="text-sm font-bold">Request-ID: ${ID}</h1>
                            
                            <div class="hidden items-center justify-center mt-3">
                                <input Value="On-Process" type="text" name="processstat" id="processstat" autocomplete="given-name" placeholder=""
                                    class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 ">
                            </div>
                            
                            <div class="hidden  items-center justify-center mt-3">
                            <input  value="${ID}"   type="text" name="processID" id="processID" autocomplete="given-name" placeholder=""
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
<input value="Process the Request ${ID}"  type="text" name="Adminactiondone" id="Adminactiondone" autocomplete="street-address" 
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
                          $("#processresidentbutton").click(function(e) {
                              e.preventDefault();
                  
                              var valid = $("#processresidentreq")[0].checkValidity();
                  
                              if (valid) {
                                  var formData = new FormData($("#processresidentreq")[0]);
                  
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
                      document.getElementById("processresidentbutton").addEventListener("click", function() {
                          var dialog = document.getElementById("processresidentrequest");
                          dialog.close();
                      });
                  </script>';


//reject request

echo '<dialog id="rejectrequest" class="modal p-3 ">
<div class="modal-box w-70 max-w-3xl rounded-lg">
 
    <div class="mb-2 lg:mb-0">
      <h3 class="text-2xl font-bold text-blue-500 text-center">BRGY-409 Document Request Management System</h3>
      <span class="flex text-base font-medium text-blue-500 justify-center text-center">Reject Residents Request</span>
    </div>
  
    <form id="rejectresidentreqform" action="../Backend/Update.php" method="post" enctype="multipart/form-data">
    <div id="rejectresi-request-info"></div>
    </form>

  <div class="mt-4 px-4 py-3 sm:px-6 flex align-items justify-center p-4 gap-4 flex-row">
  <button id="rejectresident-edit-close-modal-btn" class="btn btn-sm btn-circle btn-ghost absolute top-2 right-2">
✕
</button>
<div class="px-4 py-3 sm:px-6 flex align-items justify-center p-4 gap-4 flex-row">

<button" id="rejectresidentbutton" class="inline-flex justify-center  rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-500 hover:bg-red-600 text-base font-medium text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 sm:w-auto sm:text-sm"> 
<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2">
  <path stroke-linecap="round" stroke-linejoin="round" d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
</svg>
  Reject Residents Request
</button>
 </div>
  </div>
</div>
</dialog>';


echo '<script>
document.addEventListener("DOMContentLoaded", function () {
const modal = document.getElementById("rejectrequest");
const modalContent = document.getElementById("rejectresi-request-info");
const openModalButtons = document.querySelectorAll(".reject-btn");
const closeModalButton = document.getElementById("rejectresident-edit-close-modal-btn");

openModalButtons.forEach(function (button) {
  button.addEventListener("click", function () {
    const ID = button.getAttribute("data-request-id");
    const profile = button.getAttribute("data-verifyResidents-profile");
    const fname = button.getAttribute("data-request-Fname");
    const mname = button.getAttribute("data-request-Mname");
    const lname = button.getAttribute("data-request-Lname");
    const adminidlogs = button.getAttribute("data-adminid-logs");
    const adminusernamelogs = button.getAttribute("data-adminusername-logs");
    const adminpositionlogs = button.getAttribute("data-adminposition-logs");
    // Display default text in modal content
    modalContent.innerHTML = `
  

    <div class="flex flex-col items-center mt-3">
   
    <div class="mx-auto text-center" style="width: 200px;">
    <img src="/Images/rejected.svg" alt="Illustration" class="w-30 h-auto">
    <p class="text-lg font-semibold text-center ">Reject Request of </p>
    </div>
    
<h1 class="text-xl font-bold">${fname}, ${mname} ${lname}</h1>
<h1 class="text-sm font-bold">Request-ID: ${ID}</h1>
    
    <div class="hidden items-center justify-center mt-3">
        <input Value="Rejected" type="text" name="rejectstat" id="rejectstat" autocomplete="given-name" placeholder=""
            class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 ">
    </div>
    
    <div class="hidden  items-center justify-center mt-3">
    <input  value="${ID}"   type="text" name="rejectID" id="rejectID" autocomplete="given-name" placeholder=""
        class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 ">
</div>

<div class="items-center justify-center mt-3 w-full">
<label for="comment" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">State Reason for Rejection</label>
<textarea id="comment" name="comment" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your Reason here..."></textarea>

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
<input value="Rejected Request ${ID}"  type="text" name="Adminactiondone" id="Adminactiondone" autocomplete="street-address" 
  class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 mb-4">
</div>
<div class="hidden">
<label for="categorization" class="block text-sm font-medium text-gray-700">categorization</label>
<input value="Deleted"  type="text" name="categorization" id="categorization" autocomplete="street-address" 
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
    $("#rejectresidentbutton").click(function(e) {
        e.preventDefault();

        var valid = $("#rejectresidentreqform")[0].checkValidity();

        if (valid) {
            var formData = new FormData($("#rejectresidentreqform")[0]);

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
document.getElementById("rejectresidentbutton").addEventListener("click", function() {
    var dialog = document.getElementById("rejectrequest");
    dialog.close();
});
</script>';
                        } else {
                            echo '<div class="mx-auto text-center mt-8" style="width: 200px;">';
                            echo '<img src="/Images/norequest.svg" alt="Illustration" class="w-30 h-auto">';
                            echo "<p class='text-lg font-semibold text-center '>No Pending Found</p>";
                            echo '</div>';
                        }
                        ?>