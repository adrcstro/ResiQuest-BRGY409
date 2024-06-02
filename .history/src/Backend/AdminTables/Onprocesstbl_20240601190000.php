<?php
                       include __DIR__ . '/../Connection.php';
                        $conn = mysqli_connect($servername, $username, $password, $dbname);
                        if (!$conn) {
                            echo "Database connection error" . mysqli_connect_error();
                        }
                        $ID = $_SESSION["AdminID"];
                        $query = "SELECT requestdocument.*, admintbl.* 
                        FROM requestdocument INNER JOIN admintbl ON admintbl.AdminID WHERE admintbl.AdminID = $ID AND Status='On-Process'";
                        $result = mysqli_query($conn, $query);
                        if (mysqli_num_rows($result) > 0) {
                            // Output table header
                            echo '<div class="overflow-x-auto h-screen"><table class="table-auto  min-w-full divide-y divide-gray-200 mt-3">
           <thead class="bg-gray-50 ">
               <tr>
               <th scope="col" class="p-4 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Request ID</th>
               <th scope="col" class="p-4 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Residents Name</th>
               <th scope="col" class="p-4 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Service Type</th>
               <th scope="col" class="p-4 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Date Requested</th>
               <th scope="col" class="p-4 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
               </tr>
           </thead>
           <tbody class="bg-white">';

                            // Fetch and display each row
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<tr>';
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
       <ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow-2xl bg-base-100 rounded-box w-52 ">
       <li class="Adminprocess-view-request-btn" data-request-id="' . $row["RequestID"] . '"><a><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
       <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
       <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
     </svg>
      View Request</a></li>

      <li class="Print-Document-btn" data-request-id="' . $row["RequestID"] . '" data-request-servietype="' . $row["ServiceType"] . '"><a><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
      <path stroke-linecap="round" stroke-linejoin="round" d="M6.72 13.829c-.24.03-.48.062-.72.096m.72-.096a42.415 42.415 0 0 1 10.56 0m-10.56 0L6.34 18m10.94-4.171c.24.03.48.062.72.096m-.72-.096L17.66 18m0 0 .229 2.523a1.125 1.125 0 0 1-1.12 1.227H7.231c-.662 0-1.18-.568-1.12-1.227L6.34 18m11.318 0h1.091A2.25 2.25 0 0 0 21 15.75V9.456c0-1.081-.768-2.015-1.837-2.175a48.055 48.055 0 0 0-1.913-.247M6.34 18H5.25A2.25 2.25 0 0 1 3 15.75V9.456c0-1.081.768-2.015 1.837-2.175a48.041 48.041 0 0 1 1.913-.247m10.5 0a48.536 48.536 0 0 0-10.5 0m10.5 0V3.375c0-.621-.504-1.125-1.125-1.125h-8.25c-.621 0-1.125.504-1.125 1.125v3.659M18 10.5h.008v.008H18V10.5Zm-3 0h.008v.008H15V10.5Z" />
    </svg>
    Print Document</a></li>

      <li class="mark-as-completed" data-request-id="' . $row["RequestID"] . '" data-request-servietype="' . $row["ServiceType"] . '"  data-request-Fname="' . $row["FirstName"] . '"  data-request-Mname="' . $row["Middlename"] . '" data-request-Lname="' . $row["Lastname"] . '" data-adminid-logs="' . $row["AdminID"] . '" data-adminusername-logs="' . $row["Lname"] . ',' . $row["Fname"] . ' ' . $row["MName"] . ' " data-adminposition-logs="' . $row["BrgyPosition"] . '"  ><a><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
      <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 0 1-1.043 3.296 3.745 3.745 0 0 1-3.296 1.043A3.745 3.745 0 0 1 12 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 0 1-3.296-1.043 3.745 3.745 0 0 1-1.043-3.296A3.745 3.745 0 0 1 3 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 0 1 1.043-3.296 3.746 3.746 0 0 1 3.296-1.043A3.746 3.746 0 0 1 12 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 0 1 3.296 1.043 3.746 3.746 0 0 1 1.043 3.296A3.745 3.745 0 0 1 21 12Z" />
    </svg>
    Mark Complete</a></li>
       </ul>
   </div>
 </td>';
                  echo '</tr>';
                            }
                            echo '</tbody></table></div>';

                            echo '<dialog id="adminprovressViewrequestdetails" class="modal p-3">
                            <div class="modal-box w-100 max-w-4xl rounded-none">
                                <div class="mb-2 lg:mb-0">
                                  <h3 class="text-2xl font-bold text-blue-500 text-center">BRGY-409 Document Request Management System</h3>
                                  <span class="flex text-base font-medium text-blue-500 justify-center text-center">Document Request Details</span>
                                </div>
                              <div id="admin-process-view-request" class="mt-8 px-4 py-3 sm:px-6 flex align-items justify-center p-4 gap-4 flex-row"></div>
                              <div class="mt-4 px-4 py-3 sm:px-6 flex align-items justify-center p-4 gap-4 flex-row">
                              <button id="adminrequestprocessclose-modal-btn" class="btn btn-sm btn-circle btn-ghost absolute top-2 right-2">
                              ✕
                            </button>
                              </div>
                            </div>
                          </dialog>';
                    // JavaScript to handle modal functionality
                    echo '<script>
                            document.addEventListener("DOMContentLoaded", function () {
                              const modal = document.getElementById("adminprovressViewrequestdetails");
                              const modalContent = document.getElementById("admin-process-view-request");
                              const openModalButtons = document.querySelectorAll(".Adminprocess-view-request-btn");
                              const closeModalButton = document.getElementById("adminrequestprocessclose-modal-btn");
                    
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



                          echo '<dialog id="markkascompleteresidentrequest" class="modal p-3 ">
                          <div class="modal-box w-70 max-w-3xl rounded-lg">
                           
                              <div class="mb-2 lg:mb-0">
                                <h3 class="text-2xl font-bold text-blue-500 text-center">BRGY-409 Document Request Management System</h3>
                                <span class="flex text-base font-medium text-blue-500 justify-center text-center">Completed Residents Request</span>
                              </div>
                              <form id="completedresidentreq" action="../Backend/Update.php" method="post" enctype="multipart/form-data">
                            <div id="completed-request-info"></div>
                            </form>
                            <div class="mt-4 px-4 py-3 sm:px-6 flex align-items justify-center p-4 gap-4 flex-row">
                            <button id="completedresident-edit-close-modal-btn" class="btn btn-sm btn-circle btn-ghost absolute top-2 right-2">
                            ✕
                          </button>
                          <div class="px-4 py-3 sm:px-6 flex align-items justify-center p-4 gap-4 flex-row">
                          <button" id="completedsidentbutton" class="inline-flex justify-center  rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-500 hover:bg-green-600 text-base font-medium text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 sm:w-auto sm:text-sm"> 
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
                          const modal = document.getElementById("markkascompleteresidentrequest");
                          const modalContent = document.getElementById("completed-request-info");
                          const openModalButtons = document.querySelectorAll(".mark-as-completed");
                          const closeModalButton = document.getElementById("completedresident-edit-close-modal-btn");
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
                              <img src="/Images/Completed.svg" alt="Illustration" class="w-30 h-auto">
                              <p class="text-lg font-semibold text-center ">Complete Request for </p>
                              </div>
                              
                          <h1 class="text-xl font-bold">${fname}, ${mname} ${lname}</h1>
                          <h1 class="text-sm mt-3  font-bold"><span class="font-semibold">Request-ID:</span> ${ID}</h1>
                          <h1 class="text-sm font-bold"><span class="font-semibold">Service-Type:</span> ${servietype}</h1>
                              <div class="hidden items-center justify-center mt-3">
                                  <input Value="Completed" type="text" name="completestat" id="completestat" autocomplete="given-name" placeholder=""
                                      class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 ">
                              </div>
                              
                              <div class="hidden  items-center justify-center mt-3">
                              <input  value="${ID}"   type="text" name="completeID" id="completeID" autocomplete="given-name" placeholder=""
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
                            $("#completedsidentbutton").click(function(e) {
                                e.preventDefault();
                    
                                var valid = $("#completedresidentreq")[0].checkValidity();
                    
                                if (valid) {
                                    var formData = new FormData($("#completedresidentreq")[0]);
                    
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
                        document.getElementById("completedsidentbutton").addEventListener("click", function() {
                            var dialog = document.getElementById("markkascompleteresidentrequest");
                            dialog.close();
                        });
                    </script>';

//print request 
echo '<dialog id="printrequest" class="modal p-3 ">
<div class="modal-box w-70 max-w-3xl rounded-lg">
 
    <div class="mb-2 lg:mb-0">
      <h3 class="text-2xl font-bold text-blue-500 text-center">BRGY-409 Document Request Management System</h3>
      <span class="flex text-base font-medium text-blue-500 justify-center text-center">Print Request</span>
    </div>
    <form id="printdocsform" action="" method="post" enctype="multipart/form-data">
      <div id="printdocument"></div>
    </form>
    <div class="mt-4 px-4 py-3 sm:px-6 flex align-items justify-center p-4 gap-4 flex-row">
      <button id="printclose" class="btn btn-sm btn-circle btn-ghost absolute top-2 right-2">✕</button>
      <div class="px-4 py-3 sm:px-6 flex align-items justify-center p-4 gap-4 flex-row">
        <button id="printdocument-btn" class="inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-500 hover:bg-green-600 text-base font-medium text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 sm:w-auto sm:text-sm"> 
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-1">
        <path stroke-linecap="round" stroke-linejoin="round" d="M6.72 13.829c-.24.03-.48.062-.72.096m.72-.096a42.415 42.415 0 0 1 10.56 0m-10.56 0L6.34 18m10.94-4.171c.24.03.48.062.72.096m-.72-.096L17.66 18m0 0 .229 2.523a1.125 1.125 0 0 1-1.12 1.227H7.231c-.662 0-1.18-.568-1.12-1.227L6.34 18m11.318 0h1.091A2.25 2.25 0 0 0 21 15.75V9.456c0-1.081-.768-2.015-1.837-2.175a48.055 48.055 0 0 0-1.913-.247M6.34 18H5.25A2.25 2.25 0 0 1 3 15.75V9.456c0-1.081.768-2.015 1.837-2.175a48.041 48.041 0 0 1 1.913-.247m10.5 0a48.536 48.536 0 0 0-10.5 0m10.5 0V3.375c0-.621-.504-1.125-1.125-1.125h-8.25c-.621 0-1.125.504-1.125 1.125v3.659M18 10.5h.008v.008H18V10.5Zm-3 0h.008v.008H15V10.5Z" />
      </svg>
          Print Document
        </button>
      </div>
    </div>
  </div>
</dialog>';

echo '<script>
document.addEventListener("DOMContentLoaded", function () {
  const modal = document.getElementById("printrequest");
  const modalContent = document.getElementById("printdocument");
  const openModalButtons = document.querySelectorAll(".Print-Document-btn");
  const closeModalButton = document.getElementById("printclose");
  const printdocsform = document.getElementById("printdocsform");

  openModalButtons.forEach(function (button) {
    button.addEventListener("click", function () {
      const ID = button.getAttribute("data-request-id");
      const servietype = button.getAttribute("data-request-servietype");
      
      // Update form action based on service type
      switch (servietype) {
        case "Certificate of Residency":
          printdocsform.action = "../Backend/GenerateResidency.php";
          break;
        case "Business Clearance":
          printdocsform.action = "../Backend/GenerateBusinessClerancen.php";
          break;
        case "Barangay Identification":
          printdocsform.action = "../Backend/GenerateBrgyForm.php";
          break;
        case "Certificate of Indigency":
          printdocsform.action = "../Backend/GenerateIndigency.php";
          break;

        default:
          console.log("Invalid ServiceType");
      }
      
      // Display default text in modal content
      modalContent.innerHTML = `
        <div class="flex flex-col items-center mt-3 mb-5">
          <div class="mx-auto text-center" style="width: 200px;">
            <img src="/Images/print.svg" alt="Illustration" class="w-30 h-auto">
            <p class="text-lg font-semibold text-center ">Print Document</p>
          </div>
          <h1 class="text-sm mt-3  font-bold"><span class="font-semibold">Request-ID:</span> ${ID}</h1>
          <h1 class="text-sm font-bold"><span class="font-semibold">Service-Type:</span> ${servietype}</h1>
          <div class="hidden  items-center justify-center mt-3">
            <input  value="${ID}"   type="text" name="RequestIDprint" id="RequestIDprint" autocomplete="given-name" placeholder=""
                class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 ">
          </div>
          <div class="hidden  items-center justify-center mt-3">
            <input  value="${servietype}"   type="text" name="ServiceType" id="ServiceType" autocomplete="given-name" placeholder=""
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

                        } else {
                            echo '<div class="mx-auto text-center mt-8" style="width: 200px;">';
                            echo '<img src="/Images/norequest.svg" alt="Illustration" class="w-30 h-auto">';
                            echo "<p class='text-lg font-semibold text-center '>No Processing Request</p>";
                            echo '</div>';
                        }
                        ?>