<?php
ob_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="output.css">
  <script src="https://kit.fontawesome.com/817c4fe6aa.js" crossorigin="anonymous"></script>
  <link rel="icon" href="/Images/logo.png">
  <title>Barangay 409 | News</title>
</head>
<body>
  <nav id="navbar" class="fixed top-0 bg-primary border-gray-200 z-10 w-full">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
      <a id="color" href="landing_page.html" class="flex items-center space-x-3">
        <img src="/Images/logo.png" class="h-12" alt="Logo" />
        <div class="flex flex-col justify-start">
          <span class="self-center text-2xl whitespace-nowrap text-white font-bold ">BARANGAY-409</span>
          <span class="text-sm font-semibold whitespace-nowrap text-white">Local Government System</span>
        </div>
      </a>
      <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center w-10 h-10 justify-center text-sm rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-slate-600 text-slate-600 " aria-controls="navbar-default" aria-expanded="false">
        <span class="sr-only">Open main menu</span>
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
        </svg>
      </button>
      <div class="hidden w-full md:block md:w-auto" id="navbar-default">
        <ul class="font-medium flex md:items-center flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-transparent md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-transparent">
          <li>
            <a href="landing_page.html" class="block py-2 px-3 rounded md:bg-transparent md:border-0 text-white md:p-0 cursor-default hover:text-blue-950" aria-current="page">Home</a>
          </li>
          <li>
            <a href="services.html" class="block py-2 px-3 text-white rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 hover:text-blue-950 md:p-0">Services</a>
          </li>
          <li>
            <div class="py-2 px-3 text-white rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:p-0" name="more" id="more">
              <button class="hover:text-blue-950 rounded w-full flex items-center justify-start gap-2" type="button" onclick="openMore()">
                More
                <i class="fa-solid fa-caret-down"></i>
              </button>
              <div class="relative md:absolute md:top-0 hidden bg-transparent md:bg-white rounded px-2 py-2 space-y-4 md:space-y-2 pt-3 md:pt-0 md:mt-16 z-20 text-slate-800 shadow-xl" id="navMoreItems">
                <a href="news.php" class="dropdown">News & Updates</a>
                <a href="contact_us.php" class="dropdown">Contact Us</a>
                <a href="about_us.html" class="dropdown">About Us</a>
                <a href="FAQ.html" class="dropdown">FAQs</a>
              </div>
            </div>
          </li>
          <div class="grid grid-rows-2 md:grid-rows-1 md:grid-cols-2 gap-2 mt-2 md:mt-0">
            <button class="text-primary bg-white hover:bg-btnDark hover:text-white bg-opacity-90 hover: focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2"><a href="Login.php">
              Login
              </a>
            </button>
            <button class="text-white hover:text-white border border-white hover:bg-btnDark hover:border-btnDark focus:ring-2 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2 text-center"><a href="signup.php">
              Sign up
              </a>
            </button>
          </div>
        </ul>
      </div>
    </div>
  </nav>
  <section class="mt-20 lg:mt-48 z-50" id="news">
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

      });

  </script>

  
</body>
</html>
