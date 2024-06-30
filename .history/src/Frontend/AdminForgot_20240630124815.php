<?php
require '../Backend/Connection.php';

if (isset($_POST["submit"])) {
    $email = $_POST['Emails'];
    $newPassword = $_POST['New-Password'];
    $confirmPassword = $_POST['Confirm-newPassword'];
    $position = $_POST['BrgyPosition'];

    // Password strength requirements
    $uppercase = preg_match('@[A-Z]@', $newPassword);
    $lowercase = preg_match('@[a-z]@', $newPassword);
    $number    = preg_match('@[0-9]@', $newPassword);
    $specialChars = preg_match('@[^\w]@', $newPassword);

    if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($newPassword) < 8) {
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
        // Check if the email exists in the database
        $stmt = $conn->prepare("SELECT BrgyPosition	FROM admintbl WHERE Email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($storedPosition);
        $stmt->fetch();

        if ($stmt->num_rows == 0) {
            echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire(
                    'Error',
                    'Email you typed is not registered Administrator',
                    'error'
                );
            });
         </script>";
        } else {
            // Check if the new password and confirm password match
            if ($newPassword !== $confirmPassword) {
                echo "<script>
                    document.addEventListener('DOMContentLoaded', function() {
                        Swal.fire(
                            'Error',
                            'Passwords do not match',
                            'error'
                        );
                    });
                 </script>";
            } else {
                // Hash the new password
                $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

             
if (trim($position) !== trim($storedPosition)) {
    echo "<script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire(
                'Error',
                'Government Position does not match the Position you registered',
                'error'
            );
        });
     </script>";
                } else {
                    // Update the user's password in hashed form in the database
                    $stmt = $conn->prepare("UPDATE admintbl SET Password = ? WHERE Email = ?");
                    $stmt->bind_param("ss", $hashedPassword, $email);
                    $stmt->execute();
                    echo "<script>
                        document.addEventListener('DOMContentLoaded', function() {
                            Swal.fire(
                                'Success',
                                'Admin Password Updated Successfully',
                                'success'
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


    <div id="forgot" class="min-h-screen bg-gray-100 text-gray-900 flex justify-center rounded-lg">
    <div class="min-h-full m-0 sm:m-10 bg-white shadow sm:rounded-lg flex justify-center flex-1">
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
                <span class="mb-3 text-2xl font-bold text-blue-800">Forgot Admin Password<br></span>
                <span class="font-light text-blue-800 mb-8">Please Fill-out the Form</span>
              </div>
            <div class="flex flex-col items-center">
                <div class="w-full flex-1 mt-8">
                 

                <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
  

                    <div class="mx-auto max-w-sm">
                       <div class="mb-2"> 
                        <span class="mb-2 text-md font-medium">Email<span class="text-xs text-red-500 ml-1">*Required</span></span>
                        
                    </div>
                    <div class="relative">
                        <input
                            class="w-full px-8 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white pl-12"
                            type="email" name="Emails" placeholder="Email" />
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            class="absolute left-4 top-1/2 transform -translate-y-1/2 h-6 w-6 text-gray-400">
                            <path strokeLinecap="round" strokeLinejoin="round"
                                d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                        </svg>
                    </div>
                        <div class="mt-3 mb-2">
                                    <span class="text-md font-medium">Position<span class="text-xs text-red-500 ml-1">*Required</span></span>
                                </div>
                                <div class="relative">
                                <div>
        <select
        class="w-full px-2 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white"
        name="BrgyPosition" required>
        <option value="" disabled selected>Select Position</option>
        <option value="Barangay Chairman">Barangay Chairman</option>
        <option value="Barangay Kagawad">Barangay Kagawad</option>
        <option value="Barangay Secretary">Barangay Secretary</option>
        <option value="Barangay Treasurer">Barangay Treasurer</option>
        <option value="Barangay Tanod">Barangay Tanod</option>
    </select>
    </div>
                                </div>
                        
                        <div class="mt-3 mb-2"> 
                            <span class=" text-md font-medium">New Password<span class="text-xs text-red-500 ml-1">*Required</span></span>
                        </div>
                        <div class="relative">
                            <input
                                class="w-full px-8 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white pl-12"
                                type="password" name="New-Password" placeholder="Enter New Password" />
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                class="absolute left-4 top-1/2 transform -translate-y-1/2 h-6 w-6 text-gray-400">
                                <path strokeLinecap="round" strokeLinejoin="round"
                                    d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
                            </svg>
                        </div>

                        <div class="mt-3 mb-2"> 
                            <span class=" text-md font-medium">Confirm New Password<span class="text-xs text-red-500 ml-1">*Required</span></span>
                        </div>
                        <div class="relative">
                            <input
                                class="w-full px-8 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white pl-12"
                                type="password" name="Confirm-newPassword" placeholder="Enter Confirm Password" />
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                class="absolute left-4 top-1/2 transform -translate-y-1/2 h-6 w-6 text-gray-400">
                                <path strokeLinecap="round" strokeLinejoin="round"
                                    d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
                            </svg>
                        </div>

                        <button 
                        class="mt-4 tracking-wide font-semibold bg-blue-700 text-white-500 w-full py-4 rounded-lg hover:bg-blue-500 transition-all duration-300 ease-in-out flex items-center justify-center focus:shadow-outline focus:outline-none" name="submit" type="submit">
                          

                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                            class="w-6 h-6 -ml-2 text-white">
                            <path strokeLinecap="round" strokeLinejoin="round"
                                d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
                        </svg>
                            <span class="ml-3 text-white">
                               Update Administrator Password
                            </span>
                        </button>

                         </form>


                        
                        <p class="mt-6 text-xs text-gray-600 text-center">
                            Already set up?
                            <a href="AdminLogin.php" class="border-b border-gray-500 border-dotted text-blue-600" onclick="showsignup()" >
                               Login now
                            </a>
                           
                          
                        </p>
                    </div>


                   

                  


                </div>
            </div>
        </div>
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
    <h2 class="text-md font-semibold text-gray-600">New Password Setup</h2>
    <ul class="list-disc text-first text-sm text-gray-600">
        <li>Enter Resident Email</li>
        <li>Enter Resident Phone</li>
        <li>Set Desire Password</li>
    </ul>
</div>


                    <!-- Illustration 2 -->

                    <div class="bg-white p-4 rounded-lg shadow-2xl flex flex-col items-center">
    <img src="/Images/password.svg" alt="Illustration" class="w-32 h-auto">
    <h2 class="text-md font-semibold text-gray-600">Used Strong Passsword</h2>
    <ul class="list-disc text-first text-sm text-gray-600">
        <li>Used Upper & Lowercase</li>
        <li>Used Special Integers</li>
        <li>Used Special Symbols</li>
        <li>Atleast 8 Characters</li>
    </ul>
</div>
        
                    <!-- Illustration 3 -->
                    <div class="bg-white p-4 rounded-lg shadow-2xl flex flex-col items-center">
    <img src="/Images/no.svg" alt="Illustration" class="w-32 h-auto">
    <h2 class="text-md font-semibold text-gray-600">Choosing a Password</h2>
    <ul class="list-disc text-first text-sm text-gray-600">
        <li>Avoid Short Password</li>
        <li>Avoid only Numbers </li>
        <li>Avoid only Characters </li>
        <li>Avoid only Symbols </li>
    </ul>
</div>

        
                    <!-- Illustration 4 -->
                    <div class="bg-white p-4 rounded-lg shadow-2xl flex flex-col items-center">
    <img src="/Images/passconfirm.svg" alt="Illustration" class="w-32 h-auto">
    <h2 class="text-md font-semibold text-gray-600">Confirm Password</h2>
    <p class="text-sm text-gray-600">Final Password Setup</p>
</div>

                    
                </div>
            </div>
        </div>
        
        
        
        
        
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.3/dist/sweetalert2.all.min.js"></script>
    <script src="../javascript/dashboard.js"></script>
</body>
</html>