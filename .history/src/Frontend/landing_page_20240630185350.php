<!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="../Frontend/output.css">
      <script src="https://kit.fontawesome.com/817c4fe6aa.js" crossorigin="anonymous"></script>
      <title>Barangay 409 | Home</title>
      <link rel="icon" href="/Images/logo.png">
  </head>
  <div>
    <!-- content wrapper -->
    <div>
      <div class="relative">
        <!-- navigation bar-->
        <nav class="bg-white border-gray-200">
          <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="landing_page.html" class="flex items-center space-x-3">
              <img src="/Images/barangay 409 logo.jpg" class="h-12" alt="Logo" />
              <div class="flex flex-col justify-start">
                <span class="self-center text-2xl whitespace-nowrap text-primary font-bold">BARANGAY-409</span>
                <span class="text-sm font-semibold whitespace-nowrap text-primary">Local Government System</span>
              </div>
            </a>
            <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center w-10 h-10 justify-center text-sm  rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-slate-600 text-slate-600 " aria-controls="navbar-default" aria-expanded="false">
              <span class="sr-only">Open main menu</span>
              <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
              </svg>
            </button>
            <div class="hidden w-full md:block md:w-auto" id="navbar-default">
              <ul class="font-medium flex md:items-center flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white">
                <li>
                  <a href="#" class="block py-2 px-3 rounded md:bg-transparent md:border-0 text-blue-700 md:p-0 cursor-default relative w-fit after:block after:content-[''] after:absolute after:h-[3px] after:bg-primary after:w-full after:scale-x-0 after:hover:scale-x-100 after:transition after:duration-300 after:origin-left" aria-current="page">Home</a>
                </li>
                <li>
                  <a href="#services" class="block py-2 px-3 text-slate-600 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 hover:text-blue-700 md:p-0 relative w-fit after:block after:content-[''] after:absolute after:h-[3px] after:bg-primary after:w-full after:scale-x-0 after:hover:scale-x-100 after:transition after:duration-300 after:origin-left">Services</a>
                </li>
                <li>
                  <div class="py-2 px-3 text-slate-600 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:p-0" name="more" id="more">
                    <button class="hover:text-blue-700 rounded w-full flex items-center justify-start gap-2" type="button" onclick="openMore()">
                      More
                      <i class="fa-solid fa-caret-down"></i>
                    </button>
                    <div class="relative md:absolute md:top-0 hidden bg-transparent md:bg-white rounded px-2 py-2 space-y-4 md:space-y-2 pt-3 md:pt-0 md:mt-16 z-20 " id="navMoreItems">
                      <a href="#news" class="dropdown">News & Updates</a>
                      <a href="#contact" class="dropdown">Contact Us</a>
                      <a href="#about" class="dropdown">About Us</a>
                      <a href="#FAQ" class="dropdown">FAQs</a>
                    </div>
                  </div>
                </li>
                <div class="grid grid-rows-2 md:grid-rows-1 md:grid-cols-2 gap-2 mt-2 md:mt-0">
                  <button class="text-white bg-blue-700 bg-opacity-90 border-t border-b border-b-blue-950 border-t-gray-200 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2">
                    Login
                  </button>
                  <button class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 hover:border-blue-800 focus:ring-2 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2 text-center">
                    Sign up
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
          </div>/div>
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
        <div class="relative mx-16 lg:mx-20">
          <!-- text-->
          <div class="flex pt-40 justify-center">
            <div class="text-center">
              <h2 class="text-white text-xl lg:text-2xl xl:text-3xl font-extralight tracking-widest">Rasi<span class="text-white">Quest</span></h2>
              <h1 class="text-white text-6xl lg:text-7xl xl:text-8xl font-bold">Document Request</h1>
              <div class="flex justify-center">
                <button class="border-4 border-white bg-transparent rounded-full text-xl lg:text-2xl xl:text-3xl mt-14 p-5 px-12 font-bold relative flex h-[80px] w-72 items-center justify-center overflow-hidden bg-gray-800 text-white transition-all before:absolute before:h-0 before:w-0 before:rounded-full before:bg-primary hover:scale-105 before:duration-500 before:ease-out hover:shadow-primary hover:before:h-56 hover:before:w-72">
                  <span class="relative z-10">Get Started</span>
                </button>
              </div>
            </div>
          </div>
          <!-- card row -->
          <div class="grid grid-cols-1 lg:grid-cols-3 lg:flex items-start text-center py-auto mt-40 md:mx-20 gap-4 rounded-lg ">
            <!-- card container -->
            <div class="card-container">
              <div class="flex justify-center min-h-32 min-w-32">
                <img class="h-32 w-32" src="/Images/barangay 409 logo.jpg" alt="vector1" />
              </div>
              <div class="flex items-start justify-between space-x-3">
                <div class="w-full tex-center space-y-3">
                  <h5 class="text-xl font-semibold">News & Announcements</h5>
                  <p class="font-extralight">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius, nulla.</p>
                </div>
              </div>
              <div class="flex justify-center items-end py-4">
                <button class="rounded-full border-2 bg-transparent border-white p-2 pr-5 pl-5 hover:bg-white hover:text-primary transform">View Details</button>
              </div>
            </div>
            <!-- card container -->
            <div class="card-container">
              <div class="flex justify-center min-h-32 min-w-32">
                <img class="h-32 w-32" src="/Images/barangay 409 logo.jpg" alt="vector1" />
              </div>
              <div class="flex items-start justify-between space-x-3">
                <div class="w-full tex-center space-y-3">
                  <h5 class="text-xl font-semibold">Document Issuance</h5>
                  <p class="font-extralight">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius, nulla.</p>
                </div>
              </div>
              <div class="flex justify-center items-end py-4">
                <button class="rounded-full border-2 bg-transparent border-white p-2 pr-5 pl-5 hover:bg-white hover:text-primary transform">View Details</button>
              </div>
            </div>
            <!-- card container -->
            <div class="card-container ">
              <div class="flex justify-center min-h-32 min-w-32">
                <img class="h-32 w-32" src="/Images/barangay 409 logo.jpg" alt="vector1" />
              </div>
              <div class="flex items-start justify-between space-x-3">
                <div class="w-full tex-center space-y-3">
                  <h5 class="text-xl font-semibold">Barangay Officials</h5>
                  <p class="font-extralight">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius, nulla.</p>
                </div>
              </div>
              <div class="flex justify-center items-end py-4">
                <button class="rounded-full border-2 bg-transparent border-white p-2 pr-5 pl-5 hover:bg-white hover:text-primary transform">View Details</button>
              </div>
            </div>
          </div>
        </div>
          <!-- news and updates -->
          <section class="mt-32 lg:mt-48 z-50" id="news">
            <span class="pl-3 border-l-8 mx-10 md:mx-40 border-primary flex flex-col">
              <h1 class= "text-black text-5xl font-semibold">
                Barangay <b>Announcements</b>
              </h1>
              <p>
                List of News & updates
              </p>
            </span>
            <!-- news content -->
            <div class="flex flex-row justify-center">
              <div class="bg-gray-700 h-auto w-9/12 mt-12 relative rounded-md">
                <div class="grid grid-cols-1 lg:grid-cols-2 relative">
                  <img class="h-fit p-10" src="/public/assets/bg1.jpg" alt="image">
                  <div class="p-10 text-white text-lg text-justify font-extralight pt-0 lg:pt-10 lg:pl-0 flex flex-col">
                    <h1>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus aperiam, sed magni eius aspernatur et praesentium accusantium libero nemo? Repellat recusandae aut in doloremque, facilis aliquam earum deleniti quasi nesciunt Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.?</h1>
                    <h1 class="pt-5 text-white font-bold">Read more</h1>
                    <div class="text-white bg-transparent border-2 border-white rounded-full p-4 w-64 flex justify-center gap-2 ml-auto ">
                      <button class="text-xl font-bold text-white">Read more news</button>
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10 place-content-center text-white">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m12.75 15 3-3m0 0-3-3m3 3h-7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                      </svg>
                    </div>
                  </div>
                  
                  <div class="rounded-lg bg-primary p-3 absolute top-0 right-10 -translate-y-1/2">
                    <span class="text-white text-3xl">News & Updates</span>
                  </div>
                </div>
                <div class="bg-gray-600 w-full grid md:grid-flow-col mb-5">
                  
                  <h1 class="flex items-center bg-red-700 text-white font-bold text-2xl p-4">Breaking News</h1>
                  <p class="flex items-center text-sm text-white text-left p-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas at unde tempore suscipit delectus ea aperiam eius temporibus animi consectetur. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Culpa, dicta?</p>
                </div>
                
              </div>
            </div>
          </section>
          <!-- barangay services -->
          <section class="bg-gray-200 mt-32 pt-10 lg:mt-36z-50" id="services">
            <span class="pl-3 border-l-8  mx-10 md:mx-40 border-primary flex flex-col relative">
              <h1 class= "text-black text-5xl font-semibold">
                Barangay <b>Services</b>
              </h1>
              <h1>
                List of Barangay Services
              </h1>
            </span>
            <!-- card columns -->
            <div class="grid grid-cols-1 lg:grid-cols-3 p-24 py-auto md:mx-20 gap-4 rounded-lg">
              <!-- card container -->
              <div class="card-services">
                <div class="flex justify-center min-h-32 min-w-32">
                  <img class="h-32 w-32" src="./assets/barangay 409 logo.jpg" alt="vector1" />
                </div>
                <div class="flex items-start justify-between space-x-3">
                  <div class="w-full tex-center space-y-3">
                    <h5 class="text-xl font-semibold text-gray-800">Request <b>Documents</b></h5>
                    <p class="font-extralight text-gray-800">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                  </div>
                </div>
              </div>
              <!-- card container -->
              <div class="card-services">
                <div class="flex justify-center min-h-32 min-w-32">
                  <img class="h-32 w-32" src="./assets/barangay 409 logo.jpg" alt="vector1" />
                </div>
                <div class="flex items-start justify-between space-x-3">
                  <div class="w-full tex-center space-y-3">
                    <h5 class="text-xl font-semibold text-gray-800">Schedule Releasing <b>Documents</b></h5>
                    <p class="font-extralight text-gray-800">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                  </div>
                </div>
              </div>
              <!-- card container -->
              <div class="card-services">
                <div class="flex justify-center min-h-32 min-w-32">
                  <img class="h-32 w-32" src="./assets/barangay 409 logo.jpg" alt="vector1" />
                </div>
                <div class="flex items-start justify-between space-x-3">
                  <div class="w-full tex-center space-y-3">
                    <h5 class="text-xl font-semibold text-gray-800">Manage Residents <b>Information</b></h5>
                    <p class="font-extralight text-gray-800">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                  </div>
                </div>
              </div>
              <!-- card container -->
              <div class="card-services">
                <div class="flex justify-center min-h-32 min-w-32">
                  <img class="h-32 w-32" src="./assets/barangay 409 logo.jpg" alt="vector1" />
                </div>
                <div class="flex items-start justify-between space-x-3">
                  <div class="w-full tex-center space-y-3">
                    <h5 class="text-xl font-semibold text-gray-800">Print <b>Documents</b></h5>
                    <p class="font-extralight text-gray-800">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                  </div>
                </div>
              </div>
              <!-- card container -->
              <div class="card-services">
                <div class="flex justify-center min-h-32 min-w-32">
                  <img class="h-32 w-32" src="./assets/barangay 409 logo.jpg" alt="vector1" />
                </div>
                <div class="flex items-start justify-between space-x-3">
                  <div class="w-full tex-center space-y-3">
                    <h5 class="text-xl font-semibold text-gray-800">News & <b>Announcements</b></h5>
                    <p class="font-extralight text-gray-800">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                  </div>
                </div>
              </div>
              <!-- card container -->
              <div class="card-services">
                <div class="flex justify-center min-h-32 min-w-32">
                  <img class="h-32 w-32" src="./assets/barangay 409 logo.jpg" alt="vector1" />
                </div>
                <div class="flex items-start justify-between space-x-3">
                  <div class="w-full tex-center space-y-3">
                    <h5 class="text-xl font-semibold text-gray-800">Pickup <b>Documents</b></h5>
                    <p class="font-extralight text-gray-800">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <!-- baragay FAQ -->
          <section class="mt-32 lg:mt-36 bg-white z-50" id="FAQ">
            <span class="pl-3 border-l-8  mx-10 md:mx-40 border-primary flex flex-col">
              <h1 class= "text-black text-5xl font-semibold">
                Barangay <b>FAQ's</b>
              </h1>
              <h1>
                Frequently Asked Questions
              </h1>
            </span>
            <!-- content -->
            <div class="grid grid-cols-1 gap-6 md:grid-cols-2 p-24 pl-32 pr-32 md:mx-20 sm:grid-cols-1">
            <!-- accordion 1 -->
              <div class="relative mb-3 shadow-sm">
                <h6 class="mb-0">
                  <button class="relative flex items-center text-xl w-full p-4 font-semibold text-left transition-all ease-in border-b border-solid cursor-pointer border-slate-100 text-slate-700 rounded-t-1 group text-dark-500" data-collapse-target="animated-collapse-1">
                    <span>What is Material Tailwind?</span>
                    <i class="absolute right-0 pt-1 text-base transition-transform fa fa-chevron-down group-open:rotate-180"></i>
                  </button>
                </h6>
                <div data-collapse="animated-collapse-1" class="h-0 overflow-hidden transition-all duration-300 ease-in-out">
                  <div class="p-4 text-sm leading-semibold text-blue-gray-500/80">
                    We're not always in the position that we want to be at. We're constantly
                    growing. We're constantly making mistakes. We're constantly trying to
                    express ourselves and actualize our dreams.
                  </div>
                </div>
              </div>
              <!-- accordion 2 -->
              <div class="relative mb-3 shadow-sm">
                <h6 class="mb-0">
                  <button class="relative flex items-center text-xl w-full p-4 font-semibold text-left transition-all ease-in border-b border-solid cursor-pointer border-slate-100 text-slate-700 rounded-t-1 group text-dark-500" data-collapse-target="animated-collapse-2">
                    <span>How to use Material Tailwind?</span>
                    <i class="absolute right-0 pt-1 text-base transition-transform fa fa-chevron-down group-open:rotate-180"></i>
                  </button>
                </h6>
                <div data-collapse="animated-collapse-2" class="h-0 overflow-hidden transition-all duration-300 ease-in-out">
                  <div class="p-4 text-sm leading-semibold text-blue-gray-500/80">
                    We're not always in the position that we want to be at. We're constantly
                    growing. We're constantly making mistakes. We're constantly trying to
                    express ourselves and actualize our dreams.
                  </div>
                </div>
              </div>
              <!-- accordion 3 -->
              <div class="relative mb-3 shadow-sm">
                <h6 class="mb-0">
                  <button class="relative flex items-center text-xl w-full p-4 font-semibold text-left transition-all ease-in border-b border-solid cursor-pointer border-slate-100 text-slate-700 rounded-t-1 group text-dark-500" data-collapse-target="animated-collapse-3">
                    <span>What can I do with Material Tailwind?</span>
                    <i class="absolute right-0 pt-1 text-base transition-transform fa fa-chevron-down group-open:rotate-180"></i>
                  </button>
                </h6>
                <div data-collapse="animated-collapse-3" class="h-0 overflow-hidden transition-all duration-300 ease-in-out">
                  <div class="p-4 text-sm leading-semibold text-blue-gray-500/80">
                    We're not always in the position that we want to be at. We're constantly
                    growing. We're constantly making mistakes. We're constantly trying to
                    express ourselves and actualize our dreams.
                  </div>
                </div>
              </div>
              <!-- accordion 4 -->
              <div class="relative mb-3 shadow-sm">
                <h6 class="mb-0">
                  <button class="relative flex items-center text-xl w-full p-4 font-semibold text-left transition-all ease-in border-b border-solid cursor-pointer border-slate-100 text-slate-700 rounded-t-1 group text-dark-500" data-collapse-target="animated-collapse-4">
                    <span>What can I do with Material Tailwind?</span>
                    <i class="absolute right-0 pt-1 text-base transition-transform fa fa-chevron-down group-open:rotate-180"></i>
                  </button>
                </h6>
                <div data-collapse="animated-collapse-4" class="h-0 overflow-hidden transition-all duration-300 ease-in-out">
                  <div class="p-4 text-sm leading-semibold text-blue-gray-500/80">
                    We're not always in the position that we want to be at. We're constantly
                    growing. We're constantly making mistakes. We're constantly trying to
                    express ourselves and actualize our dreams.
                  </div>
                </div>
              </div>
              <!-- accordion 5 -->
              <div class="relative mb-3 shadow-sm">
                <h6 class="mb-0">
                  <button class="relative flex items-center text-xl w-full p-4 font-semibold text-left transition-all ease-in border-b border-solid cursor-pointer border-slate-100 text-slate-700 rounded-t-1 group text-dark-500" data-collapse-target="animated-collapse-5">
                    <span>What can I do with Material Tailwind?</span>
                    <i class="absolute right-0 pt-1 text-base transition-transform fa fa-chevron-down group-open:rotate-180"></i>
                  </button>
                </h6>
                <div data-collapse="animated-collapse-5" class="h-0 overflow-hidden transition-all duration-300 ease-in-out">
                  <div class="p-4 text-sm leading-semibold text-blue-gray-500/80">
                    We're not always in the position that we want to be at. We're constantly
                    growing. We're constantly making mistakes. We're constantly trying to
                    express ourselves and actualize our dreams.
                  </div>
                </div>
              </div>
              <!-- accordion 6 -->
              <div class="relative mb-3 shadow-sm">
                <h6 class="mb-0">
                  <button class="relative flex items-center text-xl w-full p-4 font-semibold text-left transition-all ease-in border-b border-solid cursor-pointer border-slate-100 text-slate-700 rounded-t-1 group text-dark-500" data-collapse-target="animated-collapse-6">
                    <span>What can I do with Material Tailwind?</span>
                    <i class="absolute right-0 pt-1 text-base transition-transform fa fa-chevron-down group-open:rotate-180"></i>
                  </button>
                </h6>
                <div data-collapse="animated-collapse-6" class="h-0 overflow-hidden transition-all duration-300 ease-in-out">
                  <div class="p-4 text-sm leading-semibold text-blue-gray-500/80">
                    We're not always in the position that we want to be at. We're constantly
                    growing. We're constantly making mistakes. We're constantly trying to
                    express ourselves and actualize our dreams.
                  </div>
                </div>
              </div>
            </div>
          </section>
          <!-- about us -->
          <section class="mt-32 lg:mt-48 z-50">
            <span class="pl-3 border-l-8  mx-10 md:mx-28 border-primary flex flex-col">
              <h1 class= "text-black text-5xl font-normal mb-2">
                About <b>Us</b>
              </h1>
              <p>
                List of News & updates
              </p>
            </span>
            <!-- content -->
            <div class="flex justify-center">
              <div class="h-auto w-10/12 mt-12 grid grid-cols-1 lg:grid-cols-2 rounded-md shadow-md">
                <img class="h-fit max-h-96 p-10 mx-auto my-auto" src="/public/assets/About-us.png" alt="image">
                <div class="p-10 text-black text-lg text-justify font-extralight pt-0 lg:pt-10 lg:pl-0 space-y-4">
                  <h1 class="font-bold text-4xl text-center lg:text-start">About Barangay 409</h1>
                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus aperiam, sed magni eius aspernatur et praesentium accusantium libero nemo? Repellat recusandae aut in doloremque, facilis aliquam earum deleniti quasi nesciunt Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.?</p>
                  <span class="text-white font-bold">Read more</span>
                </div>
              </div>
            </div>
          </section>
        </div>
      </div>
      <!-- footer -->
      <footer class="bg-gray-800 text-white mt-52 px-10 space-y-4 py-4">
        <div class="grid sm:grid-cols-2 gap-4 justify-center">
          <div class="flex space-x-2">
            <img src="./assets/logo.png" class="h-12" alt="Logo" />
            <div class="">
              <h1 class="self-center text-2xl font-semibold whitespace-nowrap">BARANGAY-409</h1>
              <p class="text-sm font-light whitespace-nowrap">Local Government System</p>
            </div>
          </div>
          <!-- search form -->
          <form class="m-auto sm:me-0" action="">
            <input class="py-1 px-3 rounded text-black" type="text" placeholder="Search">
          </form>
        </div>
        <div class="h-px w-full bg-white"></div>
        <div class="flex flex-col lg:flex-row gap-2">
          <img class="flex flex-grow min-h-36 max-h-36 object-contain" src="./assets/manila_logo.png" alt="Logo" />
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
          <img class="flex flex-grow min-h-36 max-h-36 object-contain" src="./assets/logo.png" alt="Logo" />
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
          "/public/assets/bg1.jpg",
          "/public/assets/bg2.jpg"
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
    </script>
    <script src="https://unpkg.com/@material-tailwind/html@latest/scripts/collapse.js"></script>
  </body>
  </html>