<?php
require '../Backend/Connection.php';
if(isset($_POST["submit"])){
    $email = $_POST["Email"];
    $password = $_POST["Password"];
    $result = mysqli_query($conn, "SELECT * FROM admintbl WHERE Email='$email'" );
    $row = mysqli_fetch_assoc($result);
    if(mysqli_num_rows($result) > 0 ){
        if(password_verify($password, $row["Password"])){
            $_SESSION["Login"] = true;
            $_SESSION["AdminID"] = $row["AdminID"];
            header("Location: AdminDashboard.php");
        } else {
            echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire(
                    'Error',
                    'Wrong password',
                    'error'
                );
            });
         </script>";
        }
    } else {
        echo "<script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire(
                'Error',
                'Email not registered',
                'error'
            );
        });
     </script>";
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.3/dist/sweetalert2.min.css">
</head>
<body>
 
<!-- login -------------------------------------------------------------------------------------------------------------->


    <div id="login" class="min-h-screen  bg-gray-100 text-gray-900 flex justify-center rounded-lg ">
    <div class="min-h-full   m-0 sm:m-10 bg-white shadow sm:rounded-lg flex justify-center flex-1 ">
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
                <span class="mb-3 text-2xl font-bold text-blue-800">Welcome Administrator<br></span>
                <span class="font-light text-blue-800 mb-8">Please login to your account</span>
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
                           id="email" type="Email" name="Email" placeholder="Email" required />
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            class="absolute left-4 top-1/2 transform -translate-y-1/2 h-6 w-6 text-gray-400">
                            <path strokeLinecap="round" strokeLinejoin="round"
                                d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                        </svg>
                    </div>
                    
                    
                      

                            <div class="mt-3">
                                <div class="mb-2"> 
                            <span class=" text-md font-medium">Password<span class="text-xs text-red-500 ml-1">*Required</span></span>
                        </div>
                        <div class="relative">
                            <input
                                class="w-full px-8 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white pl-12"
                            id="password"  type="Password" name="Password" placeholder="Password" required />
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                class="absolute left-4 top-1/2 transform -translate-y-1/2 h-6 w-6 text-gray-400">
                                <path strokeLinecap="round" strokeLinejoin="round"
                                    d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
                            </svg>
                        </div>
                        



                        </div>
                            <div class="flex justify-between w-full py-4">
                                <div class="mr-19">
                                  <input type="checkbox" name="ch" id="ch" class="mr-2" />
                                  <span class="text-md">Remember me</span>
                                </div>
                                <a href="#" class="text-md text-blue-600 ml-3 tracking-tighter">Forgot Password</a>
                              </div>


                        <button  type="submit" name="submit"
                            class="mt-4 tracking-wide font-semibold bg-blue-700 text-white-500 w-full py-4 rounded-lg hover:bg-blue-500 transition-all duration-300 ease-in-out flex items-center justify-center focus:shadow-outline focus:outline-none">
                            <svg class="w-6 h-6 -ml-2 text-white" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="M16 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2" />
                                <circle cx="8.5" cy="7" r="4" />
                                <path d="M20 8v6M23 11h-6" />
                            </svg>
                            <span class="ml-3 text-white">
                                Login 
                            </span>
                            
                        </button>


                        
                    
                    </div>

                </form>
                   

                   


                </div>
            </div>
        </div>
        <div class="relative flex-1 text-center hidden lg:flex">
            <div class="absolute inset-0 bg-no-repeat bg-cover bg-center" style="background-image: url('/Images/loginimage.jpg');"></div>
            <div class="absolute inset-0 bg-blue-800 opacity-50 bg-blend-lighten"></div>
            <div class="mt-4 absolute top-0 left-1/2 transform -translate-x-1/2 text-white ">
                <h1 class="text-4xl font-extrabold truncate p-2">Local Government System</h1>
                <h1 class="text-xl font-bold">Document Request Management System</h1>
        
                <div class="grid grid-cols-2 grid-rows-2 gap-6 mt-8">
                    <!-- Illustration 1 -->
                 

                    <div class="bg-white p-4 rounded-lg shadow-2xl flex flex-col items-center">
    <img src="/Images/managepeople.svg" alt="Illustration" class="w-32 h-auto">
    <h2 class="text-md font-semibold text-gray-600">Manage Resident Information</h2>
    <p class="text-sm text-gray-600">Update Resident Information</p>
</div>

                    <!-- Illustration 2 -->

                    <div class="bg-white p-4 rounded-lg shadow-2xl flex flex-col items-center">
    <img src="/Images/managerequest.svg" alt="Illustration" class="w-32 h-auto">
    <h2 class="text-md font-semibold text-gray-600">Manage Request</h2>
    <p class="text-sm text-gray-600">Manage Complaint And Document Request</p>
</div>
        
                    <!-- Illustration 3 -->
                    <div class="bg-white p-4 rounded-lg shadow-2xl flex flex-col items-center">
    <img src="/Images/setupschedule.svg" alt="Illustration" class="w-32 h-auto">
    <h2 class="text-md font-semibold text-gray-600">Setup Schedule</h2>
    <p class="text-sm text-gray-600">Setup Resident Schedule for Concern</p>
</div>

        
                    <!-- Illustration 4 -->
                    <div class="bg-white p-4 rounded-lg shadow-2xl flex flex-col items-center">
    <img src="/Images/MonitorComminity.svg" alt="Illustration" class="w-32 h-auto">
    <h2 class="text-md font-semibold text-gray-600">Monitor Community Status</h2>
    <p class="text-sm text-gray-600">Monitor Community Agenda & Announcements</p>
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