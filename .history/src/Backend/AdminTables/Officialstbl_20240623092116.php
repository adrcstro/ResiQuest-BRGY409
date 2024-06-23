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
    $total_query = "SELECT COUNT(*) as total FROM admintbl";
    $total_result = mysqli_query($conn, $total_query);
    $total_row = mysqli_fetch_assoc($total_result);
    $total_records = $total_row['total'];
    $total_pages = ceil($total_records / $limit);   
    
    // Data query with pagination
    $query = "SELECT *
    FROM  admintbl LIMIT $limit OFFSET $offset";
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) > 0) {
        // Output table header
        echo '<div class="overflow-x-auto h-screen"><table class="table-auto min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="p-4 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Profile</th>
                        <th scope="col" class="p-4 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Officials Name</th>
                        <th scope="col" class="p-4 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Position</th>
                        <th scope="col" class="p-4 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Rendered Service</th>
                        <th scope="col" class="p-4 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white">';

        // Fetch and display each row
       // Fetch and display each row
while($row = mysqli_fetch_assoc($result)) {
  echo "<tr>";
  echo "<td><img src='../Backend/uploads/" . $row["AdminProfile"] . "' alt='News Image' style='width: 100%; height: 100px;' class='p-3 border border-inherit text-center  whitespace-nowrap text-sm font-semibold text-gray-900'></td>";
  echo '<td class="p-3 border border-inherit text-center  whitespace-nowrap text-sm font-semibold text-gray-900">' . $row["Lname"] . ', ' . $row["Fname"] . ' ' . $row["MName"] . '</td>';
  echo '<td class="p-3 border border-inherit text-center  whitespace-nowrap text-sm font-semibold text-gray-900">' . $row["BrgyPosition"] . '</td>';
  echo '<td class="p-3 border border-inherit text-center  whitespace-nowrap text-sm font-semibold text-gray-900">' . $row["RenderedServiceStart"] . ' | ' . $row["RenderedServiceend"] . '</td>';
  echo '<td class="p-3  border border-inherit text-center whitespace-nowrap text-sm font-semibold text-gray-900 ">
  <div class="dropdown dropdown-end h-full flex items-center">
      <div tabindex="0" role="button" class="flex items-center justify-between text-white font-semibold btn w-40 bg-blue-400 hover:bg-blue-500 h-full">
          Action Details
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
          </svg>
      </div>
      <ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow-2xl bg-base-100 rounded-box w-52">
          <li class="open-modal-AdminID-btn"  data-AdminID-id="' . $row["AdminID"]  . '"><a><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
              <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
          </svg>Officials Details</a></li>

          <li class="open-modal-AdminID-Delete"  data-AdminID-id="' . $row["AdminID"]  . '"><a><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
          </svg>Delete Officials</a></li>
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



        echo '<dialog id="ViewAdminDetails" class="modal p-3">
        <div class="modal-box w-full max-w-6xl rounded-none">
           
              <div class="lg:mb-0">
              <h3 class="text-2xl font-bold text-blue-500 text-center">BRGY-409 Document Request Management System</h3>
              <span class="flex text-base font-medium text-blue-500 justify-center text-center">BRGY-409 Officials Details</span>
              </div>
           <div id="modal-content-viewAdmin" class="px-4 py-3 sm:px-6 flex align-items justify-center p-4 gap-4 flex-row"></div>
           <div class="mt-4 px-4 py-3 sm:px-6 flex align-items justify-center p-4 gap-4 flex-row">
           <button id="close-Admin-btn" class="btn btn-sm btn-circle btn-ghost absolute top-2 right-2">
           ✕
           </button>
           </div>
        </div>
        </dialog>';
        echo '<script>
              document.addEventListener("DOMContentLoaded", function () {
                 const modal = document.getElementById("ViewAdminDetails");
                 const modalContent = document.getElementById("modal-content-viewAdmin");
                 const openModalButtons = document.querySelectorAll(".open-modal-AdminID-btn");
                 const closeModalButton = document.getElementById("close-Admin-btn");

                 openModalButtons.forEach(function (button) {
                    button.addEventListener("click", function () {
                    const adminId = button.getAttribute("data-AdminID-id");

                    // Fetch request details using AJAX
                    fetch("../Backend/viewadmindetails.php?admin_id=" + adminId)
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
              echo '<script>
              document.addEventListener("DOMContentLoaded", function () {
                  const deleteRequestButtons = document.querySelectorAll(".open-modal-AdminID-Delete");
              
                  deleteRequestButtons.forEach(function (button) {
                      button.addEventListener("click", function () {
                          const adminidfelete = button.getAttribute("data-AdminID-id");
              
                          // Show confirmation dialog
                          Swal.fire({
                              title: "Are you sure?",
                              text: "You won\'t be able to revert this!",
                              icon: "warning",
                              showCancelButton: true,
                              confirmButtonColor: "#3085d6",
                              cancelButtonColor: "#d33",
                              confirmButtonText: "Yes, delete it!"
                          }).then((result) => {
                              if (result.isConfirmed) {
                                  // User confirmed, send request to delete
                                  fetch("../Backend/Delete.php?admin_id=" + adminidfelete)
                                      .then(response => response.text())
                                      .then(data => {
                                          // Display success message
                                          Swal.fire(
                                              "Deleted!",
                                              "Official has been deleted.",
                                              "success"
                                          );
                                      })
                                      .catch(error => {
                                          // Display error message
                                          Swal.fire(
                                              "Error!",
                                              "An error occurred while deleting the Admin.",
                                              "error"
                                          );
                                      });
                              }
                          });
                      });
                  });
              });
              </script>';
    } else {
      echo '<div class="mx-auto text-center mt-4" style="width: 200px;">';
      echo '<img src="/Images/norequest.svg" alt="Illustration" class="w-30 h-auto">';
      echo "<p class='text-lg font-semibold text-center '>No Officials Found</p>";
      echo '</div>';
    }
?> 