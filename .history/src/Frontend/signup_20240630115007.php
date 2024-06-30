<?php
require '../Backend/Connection.php';

if (!empty($_SESSION["ID"])) {
    header("Location: ResidentsDashboard.php");
}

function generateRandomID($length = 8) {
    $characters = '0123456789';
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $randomString;
}

if (isset($_POST["submit"])) {
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $ContactNumber = $_POST["ContactNumber"];
    $Gender = $_POST["Gender"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $ConfirmPAssword = $_POST["ConfirmPAssword"];

    // Password strength requirements
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number    = preg_match('@[0-9]@', $password);
    $specialChars = preg_match('@[^\w]@', $password);

    if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
        echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        title: 'Password must Contains the Following',
                        html: '<ul style=\"text-align: left; list-style: disc; padding-left: 20px;\"><li>at least 1 uppercase letter [Ex. A-Z]</li><li>1 lowercase letter [Ex. a-z]</li><li>1 numerical character [Ex. 1-0]</li><li>1 special character [Ex. ^*!_]</li><li>Be at least 8 characters long</li></ul>',
                        icon: 'error'
                    });
                });
             </script>";
    } else {
        // Check if the email is a valid email address
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "<script>
                    document.addEventListener('DOMContentLoaded', function() {
                        Swal.fire(
                            'Error',
                            'This is not a valid email address<br>Ex. JuanCruz@gmail.com',
                            'error'
                        );
                    });
                 </script>";
        } else {
            $duplicate = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");
            if (mysqli_num_rows($duplicate)) {
                echo "<script>
                        document.addEventListener('DOMContentLoaded', function() {
                            Swal.fire(
                                'Error',
                                'This email is already taken',
                                'error'
                            );
                        });
                     </script>";
            } else {
                if ($password == $ConfirmPAssword) {
                    $uniqueID = generateRandomID();
                    // Hash the password
                    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                    
                    // Specify the columns in the INSERT query
                    $query = "INSERT INTO users (ID, fname, lname, ContactNumber, Gender, email, password, Status) 
                              VALUES ('$uniqueID', '$fname', '$lname', '$ContactNumber', '$Gender', '$email', '$hashedPassword', 'NotVerified')";

                    
                    mysqli_query($conn, $query);
                    echo "<script>
                            document.addEventListener('DOMContentLoaded', function() {
                                Swal.fire(
                                    'Success',
                                    'Registration successful',
                                    'success'
                                );
                            });
                         </script>";
                } else {
                    echo "<script>
                            document.addEventListener('DOMContentLoaded', function() {
                                Swal.fire(
                                    'Error',
                                    'Password doesn\'t match',
                                    'error'
                                );
                            });
                         </script>";
                }
            }
        }
    }
}
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="x-icon" href="/Images/brgylogo.png">
    <title>BRGY-409</title>
    <link href="output.css" rel="stylesheet" >
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.3/dist/sweetalert2.min.css">
</head>
<body>
 
<!-- login -------------------------------------------------------------------------------------------------------------->



    <div id="signup" class="min-h-screen bg-gray-100 text-gray-900 flex justify-center rounded-lg">
    <div class="min-h-full m-0 sm:m-10 bg-white shadow sm:rounded-lg flex justify-center flex-1">
       
        <div class="relative flex-1 text-center hidden lg:flex">
            <div class="absolute inset-0 bg-no-repeat bg-cover bg-center" style="background-image: url('/Images/loginimage.jpg');"></div>
            <div class="absolute inset-0 bg-blue-800 opacity-50 bg-blend-lighten"></div>
            <div class="mt-8 absolute top-0 left-1/2 transform -translate-x-1/2 text-white">
                <h1 class="text-4xl font-extrabold truncate p-2">Local Government System</h1>
                <h1 class="text-xl font-bold">Document Request Management System</h1>
        
                <div class="grid grid-cols-2 grid-rows-2 gap-9 mt-16">
                    <!-- Illustration 1 -->
                    <div class="bg-white p-4 rounded-lg shadow-2xl flex flex-col items-center">
    <img src="/Images/fillup.svg" alt="Illustration" class="w-32 h-auto">
    <h2 class="text-lg font-semibold text-gray-600">Account Setup</h2>
    <p class="text-sm text-gray-600">Illustration Description 4</p>
</div>

                    <!-- Illustration 2 -->

                    <div class="bg-white p-4 rounded-lg shadow-2xl flex flex-col items-center">
    <img src="/Images/minitor.svg" alt="Illustration" class="w-32 h-auto">
    <h2 class="text-lg font-semibold text-gray-600">Used Strong Passwword</h2>
    <p class="text-sm text-gray-600">Illustration Description 4</p>
</div>

         

        
                    <!-- Illustration 3 -->
                    <div class="bg-white p-4 rounded-lg shadow-2xl flex flex-col items-center">
    <img src="/Images/profilesetup.svg" alt="Illustration" class="w-32 h-auto">
    <h2 class="text-lg font-semibold text-gray-600">Profile Setup</h2>
    <p class="text-sm text-gray-600">Illustration Description 4</p>
</div>

        
                    <!-- Illustration 4 -->
                    <div class="bg-white p-4 rounded-lg shadow-2xl flex flex-col items-center">
    <img src="/Images/minitor.svg" alt="Illustration" class="w-32 h-auto">
    <h2 class="text-lg font-semibold text-gray-600">Monitor Status</h2>
    <p class="text-sm text-gray-600">Illustration Description 4</p>
</div>


<div class="bg-white p-4 rounded-lg shadow-2xl flex flex-col items-center">
    <img src="/Images/minitor.svg" alt="Illustration" class="w-32 h-auto">
    <h2 class="text-lg font-semibold text-gray-600">Monitor Status</h2>
    <p class="text-sm text-gray-600">Illustration Description 4</p>
</div>

<div class="bg-white p-4 rounded-lg shadow-2xl flex flex-col items-center">
    <img src="/Images/minitor.svg" alt="Illustration" class="w-32 h-auto">
    <h2 class="text-lg font-semibold text-gray-600">Monitor Status</h2>
    <p class="text-sm text-gray-600">Illustration Description 4</p>
</div>

            
                    
                </div>
            </div>
        </div>



        <div class="lg:w-1/2 xl:w-5/12 p-6 sm:p-12">

            <div class="flex items-center justify-center gap-4 mt-4">
                <img src="/Images/lettericon.jpg" alt="lettericon" class="[60px] h-[60px]  rounded-r-2xl md:block object-cover" />
                    <div class="text-center grid gap-0 ">
                      <div class="font-bold text-blue-800">BARANGAY - 409, Sampaloc Manila</div>
                      <div class="font-normal text-blue-800">Local Goverment System</div>
                    </div>
                    <img
                    src="/Images/manilalogo.png"
                    alt="lettericon" class="[60px] h-[60px]  rounded-r-2xl md:block object-cover" />
               </div>

               <div class="text-center mt-3">
                <span class="mb-3 text-2xl font-bold text-blue-800">Create Resident Account<br></span>
                <span class="font-light text-blue-800 mb-8">Please Fill-up the Information</span>
              </div>
            <div class="flex flex-col items-center">
                <div class="w-full flex-1 mt-8">

                <section class="form signup">
    <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">

                    <div class="mx-auto max-w-sm">


                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="col-span-1">
                                <div class="mb-2">
                                    <span class="text-md font-medium">First Name<span class="text-xs text-red-500 ml-1">*Required</span></span>
                                </div>
                                <div class="relative">
                                    <input
                                        class="w-full px-8 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white pl-12"
                                        type="text" name="fname" placeholder="Ex.Juan" required />
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                        class="absolute left-4 top-1/2 transform -translate-y-1/2 h-6 w-6 text-gray-400">
                                        <path strokeLinecap="round" strokeLinejoin="round"
                                            d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                                    </svg>
                                </div>
                            </div>
                            <div class="col-span-1">
                                <div class="mb-2">
                                    <span class="text-md font-medium">Last Name<span class="text-xs text-red-500 ml-1">*Required</span></span>
                                </div>
                                <div class="relative">
                                    <input
                                        class="w-full px-8 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white pl-12"
                                        type="text" name="lname" placeholder="Ex.Cruz" required/>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                        class="absolute left-4 top-1/2 transform -translate-y-1/2 h-6 w-6 text-gray-400">
                                        <path strokeLinecap="round" strokeLinejoin="round"
                                            d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                                    </svg>
                                </div>
                            </div>
                            
                            <div class="col-span-1">
                                <div class="mb-2">
                                    <span class="text-md font-medium">Contact Number<span class="text-xs text-red-500 ml-1">*Required</span></span>
                                </div>
                                <div class="relative">
                                    <input
                                        class="w-full px-8 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white pl-12"
                                        type="number" name="ContactNumber" placeholder="+63" required/>
                                          <img
                                          src="/Images/flg.svg"
                                          alt="lettericon" class="absolute left-4 top-1/2 transform -translate-y-1/2 h-6 w-6 text-gray-400"/>
                                </div>
                            </div>
                            <div class="col-span-1">
                                <div class="mb-2">
                                    <span class="text-md font-medium">Gender<span class="text-xs text-red-500 ml-1">*Required</span></span>
                                </div>
                                <div class="relative">
                                    <select
                                        class="w-full px-8 py-4 rounded-lg font-medium bg-gray-100  border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white pl-12"
                                        name="Gender" type="text" required >
                                        <option  value="" disabled selected>Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                     
                                    </select>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"  class="absolute left-4 top-1/2 transform -translate-y-1/2 h-6 w-6 text-gray-400">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                                    </svg>
                                </div>
                            </div>
                            
                        </div>
                        

        <div class="mt-3">
            <div class="mb-2"> 
        <span class=" text-md font-medium">Email<span class="text-xs text-red-500 ml-1">*Required</span></span>
    </div>
    <div class="relative">
        <input
            class="w-full px-8 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white pl-12"
            type="text" name="email" placeholder="Ex. JuanCruz@gmail.com" required  />
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="absolute left-4 top-1/2 transform -translate-y-1/2 h-6 w-6 text-gray-400">
                <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
              </svg>
              
    </div>
                        </div>
                            

                        <div class="mt-3">
                            <div class="mb-2"> 
                        <span class=" text-md font-medium">Password<span class="text-xs text-red-500 ml-1">*Required</span></span>
                    </div>
                    <div class="relative">
                        <input
                            class="w-full px-8 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white pl-12"
                            type="password" name="password" placeholder="Password" required/>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            class="absolute left-4 top-1/2 transform -translate-y-1/2 h-6 w-6 text-gray-400">
                            <path strokeLinecap="round" strokeLinejoin="round"
                                d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
                        </svg>
                    </div>
                </div>
                                            
                <div class="mt-3">
                    <div class="mb-2"> 
                <span class=" text-md font-medium">Confirm Password<span class="text-xs text-red-500 ml-1">*Required</span></span>
            </div>
            <div class="relative">
                <input
                    class="w-full px-8 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white pl-12"
                    type="password" name="ConfirmPAssword" placeholder="Confirm Password" required />
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    class="absolute left-4 top-1/2 transform -translate-y-1/2 h-6 w-6 text-gray-400">
                    <path strokeLinecap="round" strokeLinejoin="round"
                        d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
                </svg>
            </div>
            </div>
                                    
          
            <div class="flex justify-between w-full py-4">
                <div class="mr-19">
                  <input type="checkbox" name="Agreedtermsandcondition" id="ch" class="mr-2" />
                  <span class="text-md">I agree with the</span>
                  <a onclick="document.getElementById('privacyPolicyModal').classList.remove('hidden')"class="text-md text-blue-600  tracking-tighter cursor-pointer">Terms and Conditions</a>
                </div>
               
              </div>
              
              <div class="field button">
                        <button name="submit" type="submit"
                            class=" tracking-wide font-semibold bg-blue-700 text-white-500 w-full py-4 rounded-lg hover:bg-blue-500 transition-all duration-300 ease-in-out flex items-center justify-center focus:shadow-outline focus:outline-none">
                            <svg class="w-6 h-6 -ml-2 text-white" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="M16 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2" />
                                <circle cx="8.5" cy="7" r="4" />
                                <path d="M20 8v6M23 11h-6" />
                            </svg>
                            <span class="ml-3 text-white">
                                Register
                            </span>
                            
                        </button>
                        </div>


                        
                        <p class="mt-4 text-xs text-gray-600 text-center">
                            Already have an account?
                            <a href="Login.php" class="border-b border-gray-500 border-dotted text-blue-600" onclick="showsignup()" >
                                Login
                            </a>
                           
                          
                        </p>
                    </div>
                    </form>
                        <section>
                   

                    <div class="my-6 border-b text-center">
                        <div
                            class="leading-none px-2 inline-block text-sm text-gray-600 tracking-wide font-medium bg-white transform translate-y-1/2">
                            Or sign Up with Google
                        </div>
                    </div>

                    <div class="flex flex-col items-center">
                        <button
                            class="w-full max-w-xs font-bold shadow-sm rounded-lg py-3 bg-gray-200 text-gray-800 flex items-center justify-center transition-all duration-300 ease-in-out focus:outline-none hover:shadow focus:shadow-sm focus:shadow-outline">
                            <div class="bg-white p-2 rounded-full">
                                <svg class="w-4" viewBox="0 0 533.5 544.3">
                                    <path
                                        d="M533.5 278.4c0-18.5-1.5-37.1-4.7-55.3H272.1v104.8h147c-6.1 33.8-25.7 63.7-54.4 82.7v68h87.7c51.5-47.4 81.1-117.4 81.1-200.2z"
                                        fill="#4285f4" />
                                    <path
                                        d="M272.1 544.3c73.4 0 135.3-24.1 180.4-65.7l-87.7-68c-24.4 16.6-55.9 26-92.6 26-71 0-131.2-47.9-152.8-112.3H28.9v70.1c46.2 91.9 140.3 149.9 243.2 149.9z"
                                        fill="#34a853" />
                                    <path
                                        d="M119.3 324.3c-11.4-33.8-11.4-70.4 0-104.2V150H28.9c-38.6 76.9-38.6 167.5 0 244.4l90.4-70.1z"
                                        fill="#fbbc04" />
                                    <path
                                        d="M272.1 107.7c38.8-.6 76.3 14 104.4 40.8l77.7-77.7C405 24.6 339.7-.8 272.1 0 169.2 0 75.1 58 28.9 150l90.4 70.1c21.5-64.5 81.8-112.4 152.8-112.4z"
                                        fill="#ea4335" />
                                </svg>
                            </div>
                            <span class="ml-4">
                                Sign In with Google
                            </span>
                        </button>

                    </div>


                </div>
            </div>
        </div>
        
        
        
        </div>
    </div>





    <div id="privacyPolicyModal" class="hidden">  
        <div class="fixed z-10 inset-0 overflow-y-auto  flex items-center justify-center">
          <div class="absolute inset-0 bg-black opacity-75"></div>
          <div class="relative bg-blue-600 rounded-lg overflow-hidden shadow-xl max-w-screen-md w-full m-4" x-transition:enter="transition ease-out duration-300 transform opacity-0 scale-95" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-200 transform opacity-100 scale-100" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95" x-cloak>
         
            <div class="px-6 py-4 flex items-center justify-between">
                <h3 class="text-lg leading-6 font-medium text-white"> Terms and Conditions </h3>
                <!-- Hero icon -->
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6 text-white cursor-pointer" onclick="document.getElementById('privacyPolicyModal').classList.add('hidden')">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </div>
            <div class="prose max-w-screen-md p-6 overflow-y-auto" style="max-height: 70vh; background-color: #fff; border: 1px solid #e2e8f0;  box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.1);">
              <h2 class="text-2xl font-bold mb-4">Privacy Policy</h2>
              <p class="mb-4">This Privacy Policy describes how we collect, use, and disclose information that we obtain through our website and services.</p>
              <h3 class="text-lg font-semibold mb-2">Information We Collect</h3>
              <p>We may collect the following types of information:</p>
              <ul class="list-disc ml-6 mb-4">
                <li>Personal Information: We may collect your name, email address, and other personal information when you provide it to us.</li>
                <li>Usage Information: We may collect information about your usage of our website and services, such as the pages you visit and your interactions with our content.</li>
              </ul>
              <h3 class="text-lg font-semibold mb-2">How We Use Your Information</h3>
              <p>We may use your information for various purposes, including:</p>
              <ul class="list-disc ml-6 mb-4">
                <li>Providing our services to you</li>
                <li>Sending you updates and information about our products and services</li>
                <li>Improving our website and services</li>
              </ul>
              <h3 class="text-lg font-semibold mb-2">Disclosure of Your Information</h3>
              <p>We may disclose your information to third parties in certain circumstances, including:</p>
              <ul class="list-disc ml-6 mb-4">
                <li>With your consent</li>
                <li>When required by law</li>
                <li>With service providers and partners who assist us in delivering our services</li>
              </ul>
              <h3 class="text-lg font-semibold mb-2">Security</h3>
              <p>We take reasonable measures to protect your information, but no method of transmission over the internet is 100% secure. We cannot guarantee the security of your information.</p>
              <h3 class="text-lg font-semibold mb-2">Changes to this Privacy Policy</h3>
              <p>We may update this Privacy Policy from time to time. Any changes will be posted on our website. By continuing to use our services, you agree to the updated Privacy Policy.</p>
           
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:px-6 flex align-items justify-center p-4 gap-4 flex-row">
                <button onclick="document.getElementById('privacyPolicyModal').classList.add('hidden'); document.getElementById('ch').checked = true;" type="button" class="inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-700 hover:bg-green-500 text-base font-medium text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 sm:w-auto sm:text-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-1">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    Agree 
                </button>
                

                <button onclick="document.getElementById('privacyPolicyModal').classList.add('hidden'); document.getElementById('ch').checked = false;" type="button" class="inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-700 hover:bg-red-500 text-base font-medium text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 sm:w-auto sm:text-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-1">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    Disagree 
                </button>
                



            </div>
          </div>
        </div>
    </div>
    



 


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.3/dist/sweetalert2.all.min.js"></script>
    <script src="../javascript/dashboard.js"></script>
      
</body>
</html>