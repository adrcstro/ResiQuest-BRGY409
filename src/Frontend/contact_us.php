<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="output.css">
  <script src="https://kit.fontawesome.com/817c4fe6aa.js" crossorigin="anonymous"></script>
  <title>Barangay 409 | Contact Us</title>
  <link rel="icon" href="/Images/logo.png">
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
      <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center w-10 h-10 justify-center text-sm  rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-slate-600 text-slate-600 " aria-controls="navbar-default" aria-expanded="false">
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
  <section class="bg-white dark:bg-gray-900 mt-32 p-10">
     <span class="pl-3 border-l-8 mx-10 md:mx-40 border-primary flex flex-col">
      <h1 class= "text-black text-5xl font-semibold mb-2">
        Contact <b>US</b>
      </h1>
      <h1>
        Contact the Barangay 409
      </h1>
    </span>
  <div class="py-8 lg:py-16 px-4 mx-auto max-w-screen-md">
      <p class="mb-8 lg:mb-16 font-light text-center text-gray-500 dark:text-gray-400 sm:text-xl">Got a problem with out website? Want to send feedback about the website function? Need help about our website? Let us know.</p>
      <form action="contact_us.php" method="post" class="space-y-8">
          <div>
              <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Your email</label>
              <input type="email" id="email"  name="email" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light" placeholder="Ex. Juandelacruz@gmail.com" required>
          </div>
          <div>
              <label for="subject" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Subject</label>
              <input type="text" id="subject" name="subject" class="block p-3 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 shadow-sm focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light" placeholder="Let us know how we can help you" required>
          </div>
          <div class="sm:col-span-2">
              <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Your message</label>
              <textarea id="message" rows="6" name="message" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg shadow-sm border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Leave a comment..."></textarea>
          </div>
          <button type="submit" class="py-3 px-5 text-sm font-medium text-center text-white bg-blue-500 hover:bg-btnDark rounded-lg sm:w-fit focus:ring-4 focus:outline-none focus:ring-primary-300 ">Send message</button>
      </form>
  </div>
</section>

<dialog id="success_sent" class="modal">
  <div class="modal-box">
    <h3 class="font-bold text-lg">Hello!</h3>
    <p class="py-4">Press ESC key or click the button below to close</p>
    <div class="modal-action">
      <form method="dialog">
        <!-- if there is a button in form, it will close the modal -->
        <button class="btn">Close</button>
      </form>
    </div>
  </div>
</dialog>
<?php
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     // Get form data
//     $email = $_POST['email'];
//     $subject = $_POST['subject'];
//     $message = $_POST['message'];

//     // Email address where you want to receive the emails
//     $to = 'sample@gmail.com';

//     // Email headers
//     $headers = "From: $email \r\n";
//     $headers .= "Reply-To: $email \r\n";
//     $headers .= "Content-type: text/html; charset=UTF-8 \r\n";

//     // Email content
//     $email_content = "
//     <html>
//     <head>
//         <title>New Message from Website</title>
//     </head>
//     <body>
//         <h2>New Message from Website</h2>
//         <p><strong>Email:</strong> $email</p>
//         <p><strong>Subject:</strong> $subject</p>
//         <p><strong>Message:</strong><br>$message</p>
//     </body>
//     </html>
//     ";

//     // Send email
//     if (mail($to, $subject, $email_content, $headers)) {
//         // Email sent successfully
//         echo "Thank you for your message. We will get back to you soon.";
//     } else {
//         // Error sending email
//         echo "Oops! Something went wrong. Please try again later.";
//     }
// }
// ?>

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
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
<script src="https://unpkg.com/@material-tailwind/html@latest/scripts/collapse.js"></script>
</body>
</html>