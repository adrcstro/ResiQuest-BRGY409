<?php
ob_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Frontend/output.css">
    <script src="https://kit.fontawesome.com/817c4fe6aa.js" crossorigin="anonymous"></script>
    <title>Barangay 409 | Home</title>
    <link rel="icon" href="/Images/barangay 409 logo.jpg">
    <style>

      .scrolled {
        background-color: #083BB0; /* Change to whatever color you want when scrolled */
        transition: background-color 0.3s ease;
        z-index: 20;
      }

      .scrolled .text-slate-600 {
        color: #FFFFFF; 
      }

      .scrolled .text-slate-600:hover {
        color: #012475; 
      }

      .scrolled .bg-blue-700 {
        background-color: white;
      }

      .scrolled .bg-blue-700:hover {
        background-color: #012577;
        color: #FFFFFF;
        border-color: #012577;
      }

      .scrolled .text-white{
        color: #083BB0;
      }

      .scrolled .text-primary {
        color: #FFFFFF;
      }

      .scrolled .border-blue-700 {
        border-color: #FFFFFF;
      }

      .scrolled .border-blue-700:hover {
        border-color: #012577;
        background-color: #012577;
        color: #FFFFFF;
      }

      .scrolled #navMoreItems{
        color: #616161;
      }

    </style>
</head>
<div class="bg-secondary">
  <!-- content wrapper -->
  <div>
    <div class="relative">
      <!-- navigation bar-->
      <nav id="navbar" class="fixed top-0 bg-white border-gray-200 z-10 w-full">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
          <a id="color" href="landing_page.html" class="flex items-center space-x-3">
            <img src="/Images/brgylogo.png" class="h-12" alt="Logo" />
            <div class="flex flex-col justify-start">
              <span class="self-center text-2xl whitespace-nowrap text-primary font-bold ">BARANGAY-409</span>
              <span class="text-sm font-semibold whitespace-nowrap text-primary">Local Government System</span>
            </div>
          </a>
          <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center w-10 h-10 justify-center text-sm  rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-slate-600 text-slate-600 " aria-controls="navbar-default" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
            </svg>
          </button>
          <div class="hidden  items-center justify-center w-full md:block md:w-auto" id="navbar-default">
            <ul class="font-medium flex md:items-center flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-transparent md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-transparent">
              <li >
                <a href="#home" class="block py-2 px-3 rounded md:bg-transparent md:border-0 text-slate-600 md:p-0 cursor-default hover:text-primary" aria-current="page">Home</a>
              </li>
              <li>
                <a href="#services" class="block py-2 px-3 text-slate-600 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 hover:text-primary md:p-0">Services</a>
              </li>

              <li>
                <a href="#news" class="block py-2 px-3 text-slate-600 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 hover:text-primary md:p-0">News & Updates</a>
              </li>


              <li>
                <a href="#about" class="block py-2 px-3 text-slate-600 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 hover:text-primary md:p-0">About Us</a>
              </li>

              <li>
                <a href="#faq" class="block py-2 px-3 text-slate-600 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 hover:text-primary md:p-0">FAQs</a>
              </li>


              <div class="grid grid-rows-2 md:grid-rows-1 md:grid-cols-2 gap-2 mt-2 md:mt-0">
                <button  class="text-white bg-blue-700 bg-opacity-90 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2"><a href="../frontend/Login.php">
                  Login
                </a>
                </button>
                <button class="text-primary hover:text-white border border-blue-700 hover:bg-blue-800 hover:border-blue-800 focus:ring-2 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2 text-center"><a href="../frontend/signup.php">
                  Sign up
                </a>
                </button>
              </div>
            </ul>
          </div>
        </div>
      </nav>
      <!-- picture-carousel -->
      <div class="absolute flex items-center">
        <img class="object-cover" style="min-height: 110vh; max-height: 700px; width: 100vw; filter: brightness(.2);" src="/Images/bg2.jpg" alt="image" id="imgCarousel">
        <!-- gradient -->
        <div class="absolute inset-0" style="
          background: linear-gradient(0deg, rgb(255, 255, 255) 0%, rgba(255, 255, 255, 0.603) 10%, rgba(255, 255, 255, 0.253) 30%, rgba(255, 255, 255, 0) 60%);
          ">
        </div>
        <!-- prev next btn -->
        <div class="absolute inset-0 flex items-center justify-between text-white px-2">
          <button class="border-2 rounded-full p-2 hover:bg-white hover:text-gray-800 hover:scale-95 transform" id="prev">
            <svg class="w-6 h-6 xl:w-9 xl:h-9" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
            </svg>
          </button>
          <button class="border-2 rounded-full p-2 hover:bg-white hover:text-gray-800 hover:scale-95 transform" id="next">
            <svg class="w-6 h-6 xl:w-9 xl:h-9" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
            </svg>            
          </button>
        </div>
      </div>
      <!-- hero -->
      <div id="home" class="relative mx-16 lg:mx-20">
        <!-- text-->
        <div class="flex pt-52 justify-center">
          <div class="text-center">
            <h2 class="text-white text-xl lg:text-2xl xl:text-3xl font-extralight tracking-widest pt-5">Welcome to Barangay-409</h2>
            <h1 class="text-white text-6xl lg:text-5xl xl:text-6xl font-bold pt-3 pb-5">Document Request and Blotter Report Management System</h1>
            <div class="flex justify-center mt-8">
            <button type="button" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-md text-sm px-12 py-2.5 text-center me-2 mb-2 flex items-center">
  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2">
    <path stroke-linecap="round" stroke-linejoin="round" d="M15.042 21.672L13.684 16.6m0 0-2.51 2.225.569-9.47 5.227 7.917-3.286-.672ZM12 2.25V4.5m5.834.166-1.591 1.591M20.25 10.5H18M7.757 14.743l-1.59 1.59M6 10.5H3.75m4.007-4.243-1.59-1.59" />
  </svg>
  <a href="../Frontend/signup.php">Started</a> 
</button>

          </div>
          </div>
        </div>
        <!-- card row -->
          <div class="grid grid-cols-1 lg:grid-cols-3 lg:flex items-start text-center py-auto mt-40 md:mx-20 gap-4 rounded-lg">
            <!-- card container -->
            <div class="card-container">
              <div class="flex justify-center min-h-32 min-w-32">
                <img class="h-40 w-40" src="/Images/News.svg" alt="vector1" />
              </div>
              <div class="flex items-start justify-between space-x-3">
                <div class="w-full tex-center space-y-3">
                  <h5 class="text-2xl font-semibold">News & Announcements</h5>
                  <p class="font-extralight">Stay updated with the latest news and announcements from our community.</p>
                </div>
              </div>
              <div class="flex justify-center items-end py-4">
                <button class="rounded-full border-2 bg-transparent border-white p-2 pr-5 pl-5 hover:bg-white hover:text-primary transform text-white btn" onclick="my_modal_1.showModal()" >View Details</button>
              </div>
            </div>
            <!-- card container -->
            <div class="card-container">
              <div class="flex justify-center min-h-32 min-w-32">
                <img class="h-40 w-40" src="/Images/Documents.svg" alt="vector1" />
              </div>
              <div class="flex items-start justify-between space-x-3">
                <div class="w-full tex-center space-y-3">
                  <h5 class="text-2xl font-semibold">Document Issuance</h5>
                  <p class="font-extralight">Get your documents processed efficiently with our document issuance services.</p>
                </div>
              </div>
              <div class="flex justify-center items-end py-4">
                <button class="rounded-full border-2 bg-transparent border-white p-2 pr-5 pl-5 hover:bg-white hover:text-primary transform btn text-white" onclick="my_modal_2.showModal()" >View Details</button>
              </div>
            </div>
            <!-- card container -->
            <div class="card-container ">
              <div class="flex justify-center min-h-32 min-w-32">
                <img class="h-40 w-40" src="/Images/New team members.svg" alt="vector1" />
              </div>
              <div class="flex items-start justify-between space-x-3">
                <div class="w-full tex-center space-y-3">
                  <h5 class="text-2xl font-semibold">Barangay Officials</h5>
                  <p class="font-extralight">Meet our new barangay officials and learn about their roles in our barangay.</p>
                </div>
              </div>
              <div class="flex justify-center items-end py-4">
                <button class="rounded-full border-2 bg-transparent border-white p-2 pr-5 pl-5 hover:bg-white hover:text-primary transform btn text-white" onclick="my_modal_3.showModal()" >View Details</button>
              </div>
            </div>
          </div>
      </div>

        <!-- modal 1 -->
      <dialog id="my_modal_1" class="modal">
        <div class="modal-box">
          <div class="modal-content">
            <div class="flex justify-center min-h-32 min-w-32">
              <img class="h-40 w-40" src="/Images/News.svg" alt="vector1" />
            </div>
            <h3 class="font-bold text-lg">News & Announcements</h3>
            <p class="pt-3">Stay updated with the latest news and announcements from our community.</p><br>
            <p>Our news section includes information about upcoming events, community initiatives, and important announcements. We strive to keep our residents informed about everything happening in our neighborhood.</p>
          </div>
          <div class="modal-action">
            <button class="btn bg-primary text-white hover:bg-btnDark" onclick="closeModal('my_modal_1')">Close</button>
          </div>
        </div>
      </dialog>

      <!-- modal 2 -->
      <dialog id="my_modal_2" class="modal">
        <div class="modal-box">
          <div class="modal-content">
            <div class="flex justify-center min-h-32 min-w-32">
              <img class="h-40 w-40" src="/Images/Documents.svg" alt="vector1" />
            </div>
            <h3 class="font-bold text-lg">Document Issuance</h3>
            <p class="pt-3">Get your documents processed efficiently with our document issuance services.</p><br>
            <p>Our document issuance services cover a wide range of documents, including permits, licenses, certificates, and more. Our dedicated team ensures that your documents are processed accurately and promptly, saving you time and hassle.</p>
          </div>
          <div class="modal-action">
            <form method="dialog">
            <button class="btn bg-primary text-white hover:bg-btnDark" onclick="closeModal('my_modal_2')">Close</button>
          </form>
          </div>
        </div>
      </dialog>

      <!-- modal 3 -->
      <dialog id="my_modal_3" class="modal">
        <div class="modal-box"> 
          <div class="modal-content">
            <div class="flex justify-center min-h-32 min-w-32">
              <img class="h-40 w-40" src="/Images/New team members.svg" alt="vector1" />
            </div>
            <h3 class="font-bold text-lg">Barangay Officials</h3>
            <p class="pt-3">Meet our new barangay officials and learn about their roles in our barangay.</p><br>
            <p>We are pleased to introduce our newly elected barangay officials who are dedicated to serving our community. Learn about their backgrounds, responsibilities, and commitments to making our barangay a better place for everyone.</p>
          </div>
          <div class="modal-action">
            <button class="btn bg-primary text-white hover:bg-btnDark" onclick="closeModal('my_modal_3')">Close</button>
          </div>
        </div>
      </dialog>
      <!-- news and updates -->
        <!-- barangay services -->
        <!-- baragay FAQ -->
        <!-- about us -->
        
      </div>
    </div>

    <section itemid="services" class="bg-white w-full mt-32 pt-10 lg:mt-32 z-50 px-4 md:px-10" id="services">
  <span class="pl-3 border-l-8 mx-10 md:mx-40 border-primary flex flex-col relative">
    <h1 class="text-black text-5xl font-semibold mb-2">
      Barangay <b>Services</b>
    </h1>
    <h1>
      List of Barangay Services
    </h1>
  </span>
  <!-- card columns -->
  <div class=" grid grid-cols-1 lg:grid-cols-3 p-6 md:p-12 lg:p-24 py-auto md:mx-20 gap-4 rounded-lg">
    <!-- card container -->
    <div class="card-services border-2">
      <div class="flex justify-center min-h-32 min-w-32">
        <img class="h-32 w-32" src="/Images/documents-icon.svg" alt="vector1" />
      </div>
      <div class="flex items-start justify-between space-x-3">
        <div class="w-full text-center space-y-3">
          <h5 class="text-xl font-semibold text-gray-800">Request <b>Documents</b></h5>
          <p class="font-extralight text-gray-800">Request important documents such as certificates, permits, and clearances hassle-free through our online platform.</p>
        </div>
      </div>
    </div>
    <!-- card container -->
    <div class="card-services border-2">
      <div class="flex justify-center min-h-32 min-w-32">
        <img class="h-32 w-32" src="/Images/email-icon.svg" alt="vector1" />
      </div>
      <div class="flex items-start justify-between space-x-3">
        <div class="w-full text-center space-y-3">
          <h5 class="text-xl font-semibold text-gray-800">Schedule Releasing <b>Documents</b></h5>
          <p class="font-extralight text-gray-800">Book your appointment to collect your requested documents conveniently and avoid long waiting times.</p>
        </div>
      </div>
    </div>
    <!-- card container -->
    <div class="card-services border-2">
      <div class="flex justify-center min-h-32 min-w-32">
        <img class="h-32 w-32" src="/Images/chat-icon.svg" alt="vector1" />
      </div>
      <div class="flex items-start justify-between space-x-3">
        <div class="w-full text-center space-y-3">
          <h5 class="text-xl font-semibold text-gray-800">Manage Residents <b>Information</b></h5>
          <p class="font-extralight text-gray-800">Efficiently manage residents' information, including updates, registrations, and verifications for better community services.</p>
        </div>
      </div>
    </div>
    <!-- card container -->
    <div class="card-services border-2">
      <div class="flex justify-center min-h-32 min-w-32">
        <img class="h-32 w-32" src="/Images/document-print-icon.svg" alt="vector1" />
      </div>
      <div class="flex items-start justify-between space-x-3">
        <div class="w-full text-center space-y-3">
          <h5 class="text-xl font-semibold text-gray-800">Print <b>Documents</b></h5>
          <p class="font-extralight text-gray-800">Print your official documents quickly and conveniently at our barangay office for all your administrative needs.</p>
        </div>
      </div>
    </div>
    <!-- card container -->
    <div class="card-services border-2">
      <div class="flex justify-center min-h-32 min-w-32">
        <img class="h-32 w-32" src="/Images/find-icon.svg" alt="vector1" />
      </div>
      <div class="flex items-start justify-between space-x-3">
        <div class="w-full text-center space-y-3">
          <h5 class="text-xl font-semibold text-gray-800">News & <b>Announcements</b></h5>
          <p class="font-extralight text-gray-800">Stay informed about the latest news, announcements, and events happening in Barangay-409 to keep yourself updated and engaged with the community.</p>
        </div>
      </div>
    </div>
    <!-- card container -->
    <div class="card-services border-2">
      <div class="flex justify-center min-h-32 min-w-32">
        <img class="h-32 w-32" src="/Images/achievement-icon.svg" alt="vector1" />
      </div>
      <div class="flex items-start justify-between space-x-3">
        <div class="w-full text-center space-y-3">
          <h5 class="text-xl font-semibold text-gray-800">Pickup <b>Documents</b></h5>
          <p class="font-extralight text-gray-800">Effortlessly collect your printed documents from our designated barangay hall without any hassle or delays.</p>
        </div>
      </div>
    </div>
  </div>
</section>


 

<section id="news" class=" lg:mt-48 z-50" id="news">
    <span class="pl-3 border-l-8 mx-10 md:mx-40 border-primary flex flex-col mb-2">
      <h1 class="text-black text-5xl font-semibold mb-2">
        Barangay <b>Announcements</b>
      </h1>
      <p>
        List of News & updates
      </p>
    </span>
    <!-- news content -->
    <div class="flex flex-wrap mx-10 md:mx-40">
   <?php
    // Replace these with your actual database connection details
    include('../Backend/Connection.php');

    // Create a database connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Check the connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Fetch data from the "newsandevents" table
    $query = "SELECT NewsID, NewsTittle, NewsContent, Newstime, NewsDate, NewsImages FROM newsandevents";
    $result = mysqli_query($conn, $query);

    // Check if the query was successful
    if ($result) { 
        // Fetch data row by row
        while ($row = mysqli_fetch_assoc($result)) {
            $header = $row['NewsTittle'];
            $time = $row['Newstime'];
            $date = $row['NewsDate'];
            $body = $row['NewsContent'];
            $image = $row['NewsImages'];

            // Display data in Tailwind CSS cards
            echo '<div class="w-full md:w-1/3 p-4 pt-10">';
            echo '<div class="bg-white rounded-lg shadow-xl overflow-hidden flex flex-col h-full">';
            echo '<img src="../Backend/uploads/' . $image . '" class="h-48 w-full object-cover" alt="Card Image">';
            echo '<div class="p-4 flex-grow flex flex-col">';
            echo '<div class="flex justify-between items-center mb-2">';
            echo '<p class="text-gray-500 text-sm">' . date('F j, Y', strtotime($date)) . ' | ' . date('g:i A', strtotime($time)) . '</p>';
            echo '</div>';
            echo '<h5 class="text-lg font-bold mb-2">' . $header . '</h5>';
            $trimmed_body = strlen($body) > 90 ? substr($body, 0, 90) . '...' : $body;
            echo '<p class="text-gray-700" style="word-wrap: break-word; white-space: pre-wrap;"">' . $trimmed_body . '</p>';
            echo '</div>';
            echo '<div class="bg-transparent text-center p-4">';
            echo '<button class="open-modal-News-btn " data-request-id="' . $row["NewsID"] . '">
                  <span class="flex items-center text-blue-400 hover:text-blue-800 font-semibold">
                      Read More 
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5 ml-1">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                      </svg>
                  </span>
                </button>';
            echo '</div>';
            echo '</div>';
            echo '</div>';

            // Modal for full text
            echo '<dialog id="ViewNewsDetails" class="modal p-3">';
            echo '<div class="modal-box w-full max-w-6xl rounded-none">';
            echo '<div class="lg:mb-0">';
            echo '<h3 class="text-2xl font-bold text-blue-500 text-center">BRGY-409 Document Request Management System</h3>';
            echo '<span class="flex text-base font-medium text-blue-500 justify-center text-center">News Details</span>';
            echo '</div>';
            echo '<div id="modal-content-viewnews" class="px-4 py-3 sm:px-6 flex align-items justify-center p-4 gap-4 flex-row"></div>';
            echo '<div class="mt-4 px-4 py-3 sm:px-6 flex align-items justify-center p-4 gap-4 flex-row">';
            echo '<button id="close-view-btn" class="btn btn-sm btn-circle btn-ghost absolute top-2 right-2">✕</button>';
            echo '</div>';
            echo '</div>';
            echo '</dialog>';

            echo '<script>';
            echo 'document.addEventListener("DOMContentLoaded", function () {';
            echo 'const modal = document.getElementById("ViewNewsDetails");';
            echo 'const modalContent = document.getElementById("modal-content-viewnews");';
            echo 'const openModalButtons = document.querySelectorAll(".open-modal-News-btn");';
            echo 'const closeModalButton = document.getElementById("close-view-btn");';

            echo 'openModalButtons.forEach(function (button) {';
            echo 'button.addEventListener("click", function () {';
            echo 'const requestId = button.getAttribute("data-request-id");';

            // Fetch request details using AJAX
            echo 'fetch("../Backend/ViewNews.php?request_id=" + requestId)';
            echo '.then(response => response.text())';
            echo '.then(data => {';
            echo 'modalContent.innerHTML = data;';
            echo 'modal.showModal();';
            echo '});';
            echo '});';
            echo '});';

            // Close modal when clicking on the close button
            echo 'closeModalButton.addEventListener("click", function () {';
            echo 'modal.close();';
            echo '});';
            echo '});';
            echo '</script>';

            echo '<dialog id="ViewNewsDetails" class="modal p-3">';
            echo '<div class="modal-box w-100 max-w-3xl rounded-lg bg-white">';
            echo '<div class="mb-2 lg:mb-0">';
            echo '<h3 class="text-2xl font-bold text-blue-500 text-center">BRGY-409 Document Request Management System</h3>';
            echo '<span class="flex text-base font-medium text-blue-500 justify-center text-center">News Details</span>';
            echo '</div>';
            echo '<div id="modal-content" class="mt-8 px-4 py-3 sm:px-6 flex align-items justify-center p-4 gap-4 flex-row"></div>';
            echo '<div class="mt-4 px-4 py-3 sm:px-6 flex align-items justify-center p-4 gap-4 flex-row">';
            echo '<button id="close-view-btn" class="btn btn-sm btn-circle btn-ghost absolute top-2 right-2">✕</button>';
            echo '</div>';
            echo '</div>';
            echo '</dialog>';

            echo '<script>';
            echo 'document.addEventListener("DOMContentLoaded", function () {';
            echo 'const modal = document.getElementById("ViewNewsDetails");';
            echo 'const modalContent = document.getElementById("modal-content");';
            echo 'const openModalButtons = document.querySelectorAll(".open-modal-btn");';
            echo 'const closeModalButton = document.getElementById("close-view-btn");';

            echo 'openModalButtons.forEach(function (button) {';
            echo 'button.addEventListener("click", function () {';
            echo 'const requestId = button.getAttribute("data-request-id");';

            // Fetch request details using AJAX
            echo 'fetch("../Backend/ViewNews.php?request_id=" + requestId)';
            echo '.then(response => response.text())';
            echo '.then(data => {';
            echo 'modalContent.innerHTML = data;';
            echo 'modal.showModal();';
            echo '});';
            echo '});';
            echo '});';

            // Close modal when clicking on the close button
            echo 'closeModalButton.addEventListener("click", function () {';
            echo 'modal.close();';
            echo '});';
            echo '});';
            echo '</script>';
        }

        // Free result set
        mysqli_free_result($result);
    } else {
        // Handle the error if the query fails
        echo "Error: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
?>

    </div>
  </section>


  <section id="about" class="mt-32 lg:mt-32 z-50 pt-10">
    <span class="pl-3 border-l-8 mx-10 md:mx-40 border-primary flex flex-col">
        <h1 class="text-black text-5xl font-normal mb-2">
            About <b>Us</b>
        </h1>
        <p>
            About the Barangay 409
        </p>
    </span>
    <!-- content -->
    <div class="flex justify-center">
        <div class="h-auto w-10/12 mt-12 grid grid-cols-1 lg:grid-cols-2 rounded-md ">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3860.949628665719!2d120.99471412605968!3d14.601945327041818!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397c9fb6c83552d%3A0x54ad786f735dc69e!2sBrgy.%20409%2C%20Sampaloc%2C%20Manila%2C%201008%20Metro%20Manila!5e0!3m2!1sen!2sph!4v1712758766856!5m2!1sen!2sph" class="p-14 mx-auto my-auto h-full w-full" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            <div class="p-10 text-black text-lg text-justify font-extralight pt-0 lg:pt-10 lg:pl-0 space-y-4 flex flex-col">
                <h1 class="font-bold text-4xl text-center lg:text-start">About Barangay 409</h1>
                <p>Barangay-409 Is situated at the 4th District of Manila, Sampaloc. Headed by Chairman Brenda S. Puertollano and known as the lone barangay that has Purok sectoring named after flowers and the original host for events like Supergames, Santacruzan Grande.<br><br>Our Barangay actively participates in various programs and initiatives aimed at improving the quality of life for all residents. The Barangay Officials shall pursue timely, effective and continuous improvement of quality services to its constituents.
                </p>
                <h2 class="font-bold text-black text-xl">VISION</h2>
                <p>Barangay 409 council shall provide excellent needed services and committed in ensuring the safety and wellness of its constituents</p>
                <span class="text-white font-bold">Read more</span>
            </div>
        </div>
    </div>
</section>



  <section id="faq" class="pt-10 lg:mt-32 bg-white z-50" id="FAQ">
    <span class="pl-3 border-l-8 mx-10 md:mx-40 border-primary flex flex-col">
      <h1 class= "text-black text-5xl font-semibold mb-2">
        Barangay <b>FAQ's</b>
      </h1>
      <h1>
        Frequently Asked Questions
      </h1>
    </span>
    <!-- content -->
    <div class="grid grid-cols-1 gap-6 mt-16 px-24 md:mx-20">
    <!-- accordion 1 -->
      <div class="relative mb-3 shadow-md">
        <h6 class="mb-0">
          <button class="relative flex items-center text-xl w-full p-4 font-semibold text-left transition-all ease-in border-b border-solid cursor-pointer border-slate-100 text-slate-700 rounded-t-1 group text-dark-500" data-collapse-target="animated-collapse-1">
            <span>What services does the Barangay Document Request provide?</span>
            <i class="absolute right-5 pt-1 text-base transition-transform fa fa-chevron-down group-open:rotate-180"></i>
          </button>
        </h6>
        <div data-collapse="animated-collapse-1" class="h-0 overflow-hidden transition-all duration-300 ease-in-out ">
          <div class="p-4 text-sm leading-semibold text-blue-gray-500/80">
            The Barangay provides various services including issuance of barangay clearances, barangay i.d, barangay indigency, business permit, letter for barangay hearing, and many more.
          </div>
        </div>
      </div>
      <!-- accordion 2 -->
      <div class="relative mb-3 shadow-md">
        <h6 class="mb-0">
          <button class="relative flex items-center text-xl w-full p-4 font-semibold text-left transition-all ease-in border-b border-solid cursor-pointer border-slate-100 text-slate-700 rounded-t-1 group text-dark-500" data-collapse-target="animated-collapse-2">
            <span>How can I report community issues or concerns?</span>
            <i class="absolute right-5 pt-1 text-base transition-transform fa fa-chevron-down group-open:rotate-180"></i>
          </button>
        </h6>
        <div data-collapse="animated-collapse-2" class="h-0 overflow-hidden transition-all duration-300 ease-in-out ">
          <div class="p-4 text-sm leading-semibold text-blue-gray-500/80">
            You can report community issues or concerns by contacting the Barangay office directly, attending Barangay assemblies, or using online platforms provided by the Barangay for feedback and inquiries.
          </div>
        </div>
      </div>
      <!-- accordion 3 -->
      <div class="relative mb-3 shadow-md">
        <h6 class="mb-0">
          <button class="relative flex items-center text-xl w-full p-4 font-semibold text-left transition-all ease-in border-b border-solid cursor-pointer border-slate-100 text-slate-700 rounded-t-1 group text-dark-500" data-collapse-target="animated-collapse-3">
            <span>What are the requirements for obtaining a barangay clearance?</span>
            <i class="absolute right-5 pt-1 text-base transition-transform fa fa-chevron-down group-open:rotate-180"></i>
          </button>
        </h6>
        <div data-collapse="animated-collapse-3" class="h-0 overflow-hidden transition-all duration-300 ease-in-out">
          <div class="p-4 text-sm leading-semibold text-blue-gray-500/80">
            The requirements for obtaining a barangay clearance may vary depending on the Barangay's regulations but commonly include valid identification documents, proof of residency, and payment of necessary fees.
          </div>
        </div>
      </div>
      <!-- accordion 4 -->
      <div class="relative mb-3 shadow-md">
        <h6 class="mb-0">
          <button class="relative flex items-center text-xl w-full p-4 font-semibold text-left transition-all ease-in border-b border-solid cursor-pointer border-slate-100 text-slate-700 rounded-t-1 group text-dark-500" data-collapse-target="animated-collapse-4">
            <span>How can I participate in Barangay activities and events?</span>
            <i class="absolute right-5 pt-1 text-base transition-transform fa fa-chevron-down group-open:rotate-180"></i>
          </button>
        </h6>
        <div data-collapse="animated-collapse-4" class="h-0 overflow-hidden transition-all duration-300 ease-in-out">
          <div class="p-4 text-sm leading-semibold text-blue-gray-500/80">
            You can participate in Barangay activities and events by attending community gatherings, volunteering for programs and projects, joining Barangay-sponsored initiatives, or contacting the Barangay officials for more information.
          </div>
        </div>
      </div>
      <!-- accordion 5 -->
      <div class="relative mb-3 shadow-md">
        <h6 class="mb-0">
          <button class="relative flex items-center text-xl w-full p-4 font-semibold text-left transition-all ease-in border-b border-solid cursor-pointer border-slate-100 text-slate-700 rounded-t-1 group text-dark-500" data-collapse-target="animated-collapse-5">
            <span>How can I report a crime or emergency situation?</span>
            <i class="absolute right-5 pt-1 text-base transition-transform fa fa-chevron-down group-open:rotate-180"></i>
          </button>
        </h6>
        <div data-collapse="animated-collapse-5" class="h-0 overflow-hidden transition-all duration-300 ease-in-out">
          <div class="p-4 text-sm leading-semibold text-blue-gray-500/80">
            To report a crime or emergency situation, you can contact the local police authorities, Barangay officials, or emergency hotlines provided by the government. It's important to provide accurate information and cooperate with authorities for prompt assistance.
          </div>
        </div>
      </div>
      <!-- accordion 6 -->
      <div class="relative mb-3 shadow-md">
        <h6 class="mb-0">
          <button class="relative flex items-center text-xl w-full p-4 font-semibold text-left transition-all ease-in border-b border-solid cursor-pointer border-slate-100 text-slate-700 rounded-t-1 group text-dark-500" data-collapse-target="animated-collapse-6">
            <span>How can I get the Document I Requested?</span>
            <i class="absolute right-5 pt-1 text-base transition-transform fa fa-chevron-down group-open:rotate-180"></i>
          </button>
        </h6>
        <div data-collapse="animated-collapse-6" class="h-0 overflow-hidden transition-all duration-300 ease-in-out">
          <div class="p-4 text-sm leading-semibold text-blue-gray-500/80">
            The document you've requeted will be placed and process in our barangay hall, so you can pick it up there when it's indicate that it is ready to be pick-up.
          </div>
        </div>
      </div>
    </div>
  </section>







    <!-- footer -->
    <footer class="bg-gray-800 text-white mt-52 px-10 space-y-4 py-4">
      <div class="grid sm:grid-cols-2 gap-4 justify-center">
        <div class="flex space-x-2">
          <img src="/Images/brgylogo.png" class="h-12" alt="Logo" />
          <div class="">
            <h1 class="self-center text-2xl font-semibold whitespace-nowrap">BARANGAY-409</h1>
            <p class="text-sm font-light whitespace-nowrap">Local Government System</p>
          </div>
        </div>
      </div>
      <div class="h-px w-full bg-white"></div>
      <div class="flex flex-col lg:flex-row gap-2">
        <img class="flex flex-grow min-h-36 max-h-36 object-contain" src="/Images/manila_logo.png" alt="Logo" />
        <div class="grid sm:grid-cols-3 gap-10 my-10 lg:my-0 items-center text-center sm:text-start">
          <div class="flex flex-col flex-grow mx-auto gap-2">
            <h1 class="text-xl font-semibold underline">Gov Links</h1>
            <a class="font-light hover:text-gray-400" href="#">Manila Gov</a>
            <a class="font-light hover:text-gray-400" href="#">Government Portal</a>
            <a class="font-light hover:text-gray-400" href="#">Lungsod ng Maynila</a>
          </div>
          <div class="flex flex-col flex-grow mx-auto gap-2">
            <h1 class="text-xl font-semibold underline">Quick Links</h1>
            <a class="font-light hover:text-gray-400" href="#">Services</a>
            <a class="font-light hover:text-gray-400" href="#">Announcements</a>
            <a class="font-light hover:text-gray-400" href="#">About Barangay-409</a>
          </div>
          <div class="flex flex-col flex-grow mx-auto gap-2">
            <h1 class="text-xl font-semibold underline">Contact Us</h1>
            <p class="font-light">0912-0210-2100</p>
            <p class="font-light">Barangay-409, Phillipines</p>
            <p class="font-light">Barangay-409@gmail.com</p>
          </div>
        </div>
        <img class="flex flex-grow min-h-36 max-h-36 object-contain" src="/Images/brgylogo.png" alt="Logo" />
      </div>
      <div>
        <p class="text-sm font-light text-center">© 2024 Barangay-409 Santa Teresita ST Sampaloc Manila. All Rights Reserved.</p>
      </div>
    </footer>
  </div>
  <script>
    function openMore() {
      var navMoreItems = document.getElementById("navMoreItems");
      if (navMoreItems.classList.contains("hidden")) {
        navMoreItems.classList.remove("hidden");
      } else {
        navMoreItems.classList.add("hidden");
      }
    }
    // JavaScript to toggle the visibility of the menu
    document.addEventListener('DOMContentLoaded', function () {
      const button = document.querySelector('[data-collapse-toggle="navbar-default"]');
      const menu = document.getElementById('navbar-default');

      button.addEventListener('click', function () {
        menu.classList.toggle('hidden');
      });

      // Array of image URLs
      var imageUrls = [
        "/Images/bg1.jpg",
        "/Images/bg2.jpg"
      ];

      var currentImageIndex = 0; // Current index of the displayed image
      var imgCarousel = document.getElementById("imgCarousel"); // Reference to the image element

      // Function to change the image source
      function changeImage(index) {
        imgCarousel.src = imageUrls[index];
      }

      // Function to handle previous button click
      document.getElementById("prev").addEventListener("click", function() {
        currentImageIndex = (currentImageIndex - 1 + imageUrls.length) % imageUrls.length;
        changeImage(currentImageIndex);
        resetTimer();
      });

      // Function to handle next button click
      document.getElementById("next").addEventListener("click", function() {
        currentImageIndex = (currentImageIndex + 1) % imageUrls.length;
        changeImage(currentImageIndex);
        resetTimer();
      });

      // Function to change image in an interval
      function changeImageAutomatically() {
        currentImageIndex = (currentImageIndex + 1) % imageUrls.length;
        changeImage(currentImageIndex);
      }

      // Interval to change image automatically every 5 seconds
      var intervalId = setInterval(changeImageAutomatically, 5000);

      // Function to reset the timer
      function resetTimer() {
        clearInterval(intervalId);
        intervalId = setInterval(changeImageAutomatically, 5000);
      }

      // Stop automatic image change on hover
      imgCarousel.addEventListener("mouseenter", function() {
        clearInterval(intervalId);
      });

      // Resume automatic image change on mouse leave
      imgCarousel.addEventListener("mouseleave", function() {
        resetTimer();
      });

    });

    window.addEventListener('scroll', function() {
    var navbar = document.getElementById('navbar');
      if (window.scrollY > 0) {
        navbar.classList.add('scrolled'); // Add a class when scrolled
      } else {
        navbar.classList.remove('scrolled'); // Remove the class when at the top
      }
    });
    function closeModal(modalId) {
    var modal = document.getElementById(modalId);
    modal.close();
  }
  </script>
  <script src="https://unpkg.com/@material-tailwind/html@latest/scripts/collapse.js"></script>
</body>
</html>