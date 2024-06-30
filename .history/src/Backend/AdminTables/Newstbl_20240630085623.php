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
    $total_query = "SELECT COUNT(*) as total FROM newsandevents";
    $total_result = mysqli_query($conn, $total_query);
    $total_row = mysqli_fetch_assoc($total_result);
    $total_records = $total_row['total'];
    $total_pages = ceil($total_records / $limit);
    
    // Data query with pagination
    $query = "SELECT *
    FROM newsandevents LIMIT $limit OFFSET $offset";
    $result = mysqli_query($conn, $query);

    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) > 0) {
        // Output table header
      echo '<div class="overflow-x-auto h-screen"><table class="table-auto min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="p-4 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">News ID</th>
                        <th scope="col" class="p-4 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">News Tittle</th>
                        <th scope="col" class="p-4 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">News Content</th>
                        <th scope="col" class="p-4 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">News time</th>
                        <th scope="col" class="p-4 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">News Date</th>
                        <th scope="col" class="p-4 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">News Images</th>
                        <th scope="col" class="p-4 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white">';

        // Fetch and display each row
       // Fetch and display each row
while($row = mysqli_fetch_assoc($result)) {
  echo "<tr>";
  echo "<tr>";
  echo '<td class="p-3 border border-inherit text-center whitespace-nowrap text-sm font-semibold text-gray-900">' . htmlspecialchars($row["NewsID"]) . "</td>";
  echo '<td class="p-3 border border-inherit text-center whitespace-nowrap text-sm font-semibold text-gray-900">' . htmlspecialchars($row["NewsTittle"]) . "</td>";
  $newsContent = htmlspecialchars($row["NewsContent"]);
  if (strlen($newsContent) > 10) {
    $newsContent = substr($newsContent, 0, 10) . '...';
  }
  echo '<td class="p-3 border border-inherit text-center whitespace-nowrap text-sm font-semibold text-gray-900">' . $newsContent . "</td>";
  echo '<td class="p-3 border border-inherit text-center whitespace-nowrap text-sm font-semibold text-gray-900">' . htmlspecialchars($row["Newstime"]) . "</td>";
  echo '<td class="p-3 border border-inherit text-center whitespace-nowrap text-sm font-semibold text-gray-900">' . htmlspecialchars($row["NewsDate"]) . "</td>";
  echo "<td><img src='../Backend/uploads/" . $row["NewsImages"] . "' alt='News Image' style='width: 100%; height: 100px;' class='p-3 border border-inherit text-center  whitespace-nowrap text-sm font-semibold text-gray-900'></td>";

  echo '<td class="p-3 border border-inherit text-center flex items-center justify-center  whitespace-nowrap text-sm font-semibold text-gray-900">
    <div class="dropdown dropdown-end">
        <div tabindex="0" role="button" class="flex items-center justify-between text-white font-semibold btn w-40 bg-blue-400 hover:bg-blue-500">
            Action Details
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
            </svg>
        </div>
        <ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow-2xl bg-base-100 rounded-box w-52">
            <li class="open-modal-News-btn"  data-request-id="' . $row["NewsID"]  . '"><a><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
            </svg> View News Details</a></li>

            <li class="edit-news-btn"  data-News-id="' . $row["NewsID"] . '"  data-News-Tittle="' . $row["NewsTittle"] . '" data-News-Content="' . $row["NewsContent"] . '"  data-News-Time="' . $row["Newstime"] . '"  data-News-Date="' . $row["NewsDate"] . '" data-News-Images="' . $row["NewsImages"] . '">
                <a><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                </svg> Edit News</a></li>

            <li class="delete-news-btn"  data-News-id="' . $row["NewsID"]  . '"><a><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
            </svg> Delete News</a></li>
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

        echo '<dialog id="ViewNewsDetails" class="modal p-3">
        <div class="modal-box w-full max-w-6xl rounded-none">
           
              <div class="lg:mb-0">
              <h3 class="text-2xl font-bold text-blue-500 text-center">BRGY-409 Document Request Management System</h3>
              <span class="flex text-base font-medium text-blue-500 justify-center text-center">News Details</span>
              </div>
           <div id="modal-content-viewnews" class="px-4 py-3 sm:px-6 flex align-items justify-center p-4 gap-4 flex-row"></div>
           <div class="mt-4 px-4 py-3 sm:px-6 flex align-items justify-center p-4 gap-4 flex-row">
           <button id="close-view-btn" class="btn btn-sm btn-circle btn-ghost absolute top-2 right-2">
           ✕
           </button>
           </div>
        </div>
        </dialog>';
        echo '<script>
              document.addEventListener("DOMContentLoaded", function () {
                 const modal = document.getElementById("ViewNewsDetails");
                 const modalContent = document.getElementById("modal-content-viewnews");
                 const openModalButtons = document.querySelectorAll(".open-modal-News-btn");
                 const closeModalButton = document.getElementById("close-view-btn");

                 openModalButtons.forEach(function (button) {
                    button.addEventListener("click", function () {
                    const requestId = button.getAttribute("data-request-id");

                    // Fetch request details using AJAX
                    fetch("../Backend/ViewNews.php?request_id=" + requestId)
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


              echo '<dialog id="ViewNewsDetails" class="modal p-3">
              <div class="modal-box w-100 max-w-3xl rounded-lg bg-white">
                 
                    <div class="mb-2 lg:mb-0">
                    <h3 class="text-2xl font-bold text-blue-500 text-center">BRGY-409 Document Request Management System</h3>
                    <span class="flex text-base font-medium text-blue-500 justify-center text-center">News Details</span>
                    </div>
                 
                 <div id="modal-content" class="mt-8 px-4 py-3 sm:px-6 flex align-items justify-center p-4 gap-4 flex-row"></div>
                 

                 <div class="mt-4 px-4 py-3 sm:px-6 flex align-items justify-center p-4 gap-4 flex-row">
                 <button id="close-view-btn" class="btn btn-sm btn-circle btn-ghost absolute top-2 right-2">
                 ✕
                 </button>
              
                 </div>
              </div>
              </dialog>';

              echo '<script>
                    document.addEventListener("DOMContentLoaded", function () {
                       const modal = document.getElementById("ViewNewsDetails");
                       const modalContent = document.getElementById("modal-content");
                       const openModalButtons = document.querySelectorAll(".open-modal-btn");
                       const closeModalButton = document.getElementById("close-view-btn");

                       openModalButtons.forEach(function (button) {
                          button.addEventListener("click", function () {
                          const requestId = button.getAttribute("data-request-id");

                          // Fetch request details using AJAX
                          fetch("../Backend/ViewNews.php?request_id=" + requestId)
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

                    // Edit News Modal
                    echo '<dialog id="EditNewsDetails" class="modal p-3">
                    <div class="modal-box w-100 max-w-4xl rounded-lg bg-white">
                     
                        <div class="mb-2 lg:mb-0">
                          <h3 class="text-2xl font-bold text-blue-500 text-center">BRGY-409 Document Request Management System</h3>
                          <span class="flex text-base font-medium text-blue-500 justify-center text-center">Edit News Details</span>
                        </div>
                      
                        <form id="EditNewsForm" action="../Backend/EditNews.php" method="post" enctype="multipart/form-data">
            
                      <div id="Edit-News-Content"></div>
                      </form>
            
                      <div class="mt-4 px-4 py-3 sm:px-6 flex align-items justify-center p-4 gap-4 flex-row">
                      <button id="Close-Edit-Button" class="btn btn-sm btn-circle btn-ghost absolute top-2 right-2">
                      ✕
                    </button>
                    <div class="px-4 py-3 sm:px-6 flex align-items justify-center p-4 gap-4 flex-row">
                    
                    <button id="Edit-News-Button" class="inline-flex justify-center  rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-500 hover:bg-green-600 text-base font-medium text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 sm:w-auto sm:text-sm"> 
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-1">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                      </svg>
                      Save News Details
                    </button>
                     </div>
                      </div>
                    </div>
                  </dialog>';


     //script for residents info
     echo '<script>
     document.addEventListener("DOMContentLoaded", function () {
     const modal = document.getElementById("EditNewsDetails");
     const modalContent = document.getElementById("Edit-News-Content");
     const openModalButtons = document.querySelectorAll(".edit-news-btn");
     const closeModalButton = document.getElementById("Close-Edit-Button");
   

     openModalButtons.forEach(function (button) {
        button.addEventListener("click", function () {
           const ID = button.getAttribute("data-News-id");
           const Title = button.getAttribute("data-News-Tittle");
           const Content = button.getAttribute("data-News-Content");
           const Time = button.getAttribute("data-News-Time");
           const Date = button.getAttribute("data-News-Date");
           const Image = button.getAttribute("data-News-Images");
          

           
           // Display default text in modal content
                 modalContent.innerHTML = `

                 <div class="mt-4 px-4 py-3 sm:px-6 md:px-8 lg:px-10 flex flex-col md:flex-row gap-4">
                 <!-- Left side inputs -->
                 <div class="flex-1 flex flex-col justify-between">
                     <div class="flex flex-col items-center justify-center w-full h-full">
                         <div class="text-lg font-bold text-center">
                             <h2>News Thumbnails</h2>
                             <p class="text-xs text-gray-500 dark:text-gray-400 mb-2">SVG, PNG, JPG, or GIF (MAX. 800x400px)</p>
                         </div>

                         <label for="NewsEditImage" class="flex flex-col items-center justify-center w-full h-full p-2 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-gray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                         <img src="${Image ? "../Backend/uploads/" + Image : "/Images/blank.png"}" class="flex flex-col items-center justify-center w-full h-full p-2">
                         <div class="flex flex-col items-center justify-center pt-5 pb-6">
                             <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                 <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                             </svg>
                             <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload New News Thumbnails</span></p>
                         </div>
                         <input type="file" name="NewsEditImage" id="NewsEditImage" accept=".jpg, .png, .jpeg, .pdf, .doc, .docx" class="hidden" onchange="displayNewsImage(this, \'front\')" />
                     </label>

                     </div>
                 </div>
                 <!-- Right side input -->
                 <div class="flex-1 flex flex-col justify-between">
             
                 <div class="text bg-white hidden">
                 <label for="NewsEditId" class="block text-sm font-medium text-gray-700">News ID</label>
                 <input value="${ID}"  type="text" name="NewsEditId" id="NewsEditId" autocomplete="given-name" placeholder="First Name" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 bg-white">
              </div>
                     <div>
                         <span class="block text-sm font-semibold leading-6 text-gray-900">News Title</span>
                         <input value="${Title}" type="text" name="NewsEditTitle" placeholder="Enter News Title" class="input input-bordered focus:outline-none focus:ring-1 focus:border-blue-500 input-white w-full bg-white text-slate-900"/>
                     </div>
                     <div class="mt-3 flex flex-col sm:flex-row gap-x-6">
                         <div class="sm:flex-1">
                             <label for="NewsEditDate" class="block text-sm font-semibold leading-6 text-gray-900">News Date</label>
                             <div>
                                 <input value="${Date}" required type="date" name="NewsEditDate" id="NewsEditDate" autocomplete="Address" placeholder="Enter Address" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 flex-1">
                             </div>
                         </div>
                         <div class="sm:flex-1">
                             <label for="NewsEditTime" class="block text-sm font-semibold leading-6 text-gray-900">News Time</label>
                             <div>
                                 <input value="${Time}" required type="time" name="NewsEditTime" id="NewsEditTime" autocomplete="Zip-Code" placeholder="Enter City Zip Code Ex. 1008" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 flex-1">
                             </div>
                         </div>
                     </div>
                     <div>
                     <span class="block text-sm font-semibold leading-6 text-gray-900">News Content</span>
                     <textarea name="NewsEditContent" rows="6" class="rounded-lg border-gray-200 w-full h-64 pt-2 text-gray-900 border-1 bg-white input input-bordered focus:outline-none focus:ring-1 focus:border-blue-500 resize-none" placeholder="Enter News Content.....">${Content}</textarea>
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
$("#Edit-News-Button").click(function(e) {
 e.preventDefault();
 var valid = $("#EditNewsForm")[0].checkValidity();
 if (valid) {
     var formData = new FormData($("#EditNewsForm")[0]);
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
document.getElementById("Edit-News-Button").addEventListener("click", function() {
var dialog = document.getElementById("EditNewsDetails");
dialog.close();
});

function displayNewsImage(input, side) {
    const file = input.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const img = input.parentElement.querySelector("img");
            if (img) {
                img.src = e.target.result;
            }
        }
        reader.readAsDataURL(file);
    }
}
</script>';
              echo '<script>
              document.addEventListener("DOMContentLoaded", function () {
                  const deleteRequestButtons = document.querySelectorAll(".delete-news-btn");
              
                  deleteRequestButtons.forEach(function (button) {
                      button.addEventListener("click", function () {
                          const NewsID = button.getAttribute("data-News-id");
              
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
                                  fetch("../Backend/Delete.php?news_id=" + NewsID)
                                      .then(response => response.text())
                                      .then(data => {
                                          // Display success message
                                          Swal.fire(
                                              "Deleted!",
                                              "Your News has been deleted.",
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
                                      });
                              }
                          });
                      });
                  });
              });
              </script>';
    } else {
      echo '<div class="mx-auto text-center mt-4" style="width: 200px;">';
      echo '<img src="/Images/nonews.svg" alt="Illustration" class="w-30 h-auto">';
      echo "<p class='text-lg font-semibold text-center '>No  News Found</p>";
      echo '</div>';
    }
?> 