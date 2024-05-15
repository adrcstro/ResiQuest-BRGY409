<?php
require '../Backend/Connection.php';

if (isset($_POST["submit"])) {
    $Email = $_POST['email'];
    $newPassword = $_POST['New-Password'];
    $confirmPassword = $_POST['Confirm-newPassword'];
    $position = $_POST['Position'];

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
        $stmt->bind_param("s", $Email);
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

                // Verify the contact number
                if ($position !== $storedPosition) {
                    echo "<script>
                        document.addEventListener('DOMContentLoaded', function() {
                            Swal.fire(
                                'Error',
                                'Government Position does not match to the <br> Position  you registered',
                                'error'
                            );
                        });
                     </script>";
                } else {
                    // Update the user's password in hashed form in the database
                    $stmt = $conn->prepare("UPDATE admintbl SET Password = ? WHERE Email = ?");
                    $stmt->bind_param("ss", $hashedPassword, $Email);
                    $stmt->execute();
                    echo "<script>
                        document.addEventListener('DOMContentLoaded', function() {
                            Swal.fire(
                                'Success',
                                'Admin Password updated successfully',
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
                            type="email" name="email" placeholder="Email" />
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
                                        <select
        class="w-full px-4 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white"
        name="Position" required>
        <option value="" disabled selected>Select Position</option>
        <option value="Captain">Barangay Captain</option>
        <option value="Kagawad">Barangay Kagawad</option>
        <option value="Secretary">Barangay Secretary</option>
        <option value="Treasurer">Barangay Treasurer</option>
        <option value="Tanod">Barangay Tanod</option>
        <option value="Health Worker">Barangay Health Worker</option>
        <option value="Day Care Worker">Barangay Day Care Worker</option>
    </select>
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
                               Update Password
                            </span>
                        </button>

                         </form>


                        
                        <p class="mt-6 text-xs text-gray-600 text-center">
                            Already set up?
                            <a href="#" class="border-b border-gray-500 border-dotted text-blue-600" onclick="showsignup()" >
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
                    <div class="bg-white  p-4 rounded-lg  shadow-2xl">
                      
<svg xmlns="http://www.w3.org/2000/svg" id="currentIllo" data-name="Layer 1" class="w-32 h-32 mx-auto" viewBox="0 0 680.83858 584.23207" class="injected-svg DownloadModal__ImageFile-sc-p17csy-5 iIfSkb grid_media" xmlns:xlink="http://www.w3.org/1999/xlink"><path id="b9ccae5a-ffdd-4f5c-9c1e-05af9f0f3372-61" data-name="Path 438" d="M310.70569,694.02818a24.21459,24.21459,0,0,0,23.38269-4.11877c8.18977-6.87441,10.758-18.196,12.8467-28.68191l6.17973-31.01657-12.9377,8.90837c-9.30465,6.40641-18.81826,13.01866-25.26011,22.29785s-9.25223,21.94707-4.07792,31.988" transform="translate(-259.58071 -157.88396)" fill="#e6e6e6"></path><path id="f4ad1d06-bd03-4ced-a5c4-c19a65ab4ee5-62" data-name="Path 439" d="M312.7034,733.73874c-1.62839-11.86368-3.30382-23.88078-2.15884-35.87167,1.01467-10.64932,4.26373-21.04881,10.87831-29.57938a49.20592,49.20592,0,0,1,12.62466-11.44039c1.26215-.79648,2.42409,1.20354,1.16733,1.997a46.77949,46.77949,0,0,0-18.50446,22.32562c-4.02857,10.24607-4.67545,21.41582-3.98154,32.3003.41944,6.58218,1.31074,13.1212,2.20588,19.65251a1.19817,1.19817,0,0,1-.808,1.42251,1.16348,1.16348,0,0,1-1.42253-.808Z" transform="translate(-259.58071 -157.88396)" fill="#f2f2f2"></path><path id="baf785f8-b4c6-42cf-85bd-8a16037845f7-63" data-name="Path 442" d="M324.42443,714.70229a17.82513,17.82513,0,0,0,15.53141,8.01862c7.8644-.37318,14.41806-5.85973,20.31713-11.07027l17.452-15.4088-11.54987-.55281c-8.30619-.39784-16.82672-.771-24.73813,1.79338s-15.20758,8.72639-16.654,16.91541" transform="translate(-259.58071 -157.88396)" fill="#e6e6e6"></path><path id="a14e4330-7125-4e03-a856-d6453c34f6cc-64" data-name="Path 443" d="M308.10042,740.55843c7.83972-13.87142,16.93234-29.28794,33.1808-34.21552a37.02609,37.02609,0,0,1,13.95545-1.441c1.48189.128,1.11179,2.41174-.367,2.28454a34.39833,34.39833,0,0,0-22.27164,5.89215c-6.27994,4.27453-11.16975,10.21755-15.30781,16.51907-2.53511,3.86051-4.80576,7.88445-7.07642,11.903C309.48824,742.78513,307.36641,741.85759,308.10042,740.55843Z" transform="translate(-259.58071 -157.88396)" fill="#f2f2f2"></path><path id="ac20a106-7eb8-4a45-8835-674ef3bf3222-65" data-name="Path 141" d="M935.3957,569.31654H503.18092a5.03014,5.03014,0,0,1-5.02359-5.02359V162.90754a5.03017,5.03017,0,0,1,5.02359-5.02358H935.3957a5.03017,5.03017,0,0,1,5.02359,5.02358V564.292a5.02922,5.02922,0,0,1-5.02359,5.02359Z" transform="translate(-259.58071 -157.88396)" fill="#fff"></path><path id="a8878079-c7cd-406f-a434-8b15b914b9b4-66" data-name="Path 141" d="M935.3957,569.31654H503.18092a5.03014,5.03014,0,0,1-5.02359-5.02359V162.90754a5.03017,5.03017,0,0,1,5.02359-5.02358H935.3957a5.03017,5.03017,0,0,1,5.02359,5.02358V564.292a5.02922,5.02922,0,0,1-5.02359,5.02359ZM503.18092,159.88944a3.01808,3.01808,0,0,0-3.01152,3.01151V564.292a3.01808,3.01808,0,0,0,3.01152,3.01152H935.3957a3.01717,3.01717,0,0,0,3.01153-3.01152V162.90754a3.01809,3.01809,0,0,0-3.01153-3.01151Z" transform="translate(-259.58071 -157.88396)" fill="#cacaca"></path><path id="af64f961-e9a2-4c53-a333-5060c7f850d2-67" data-name="Path 142" d="M707.41023,262.18528a3.41053,3.41053,0,0,0,0,6.82105H894.55305a3.41053,3.41053,0,0,0,0-6.82105Z" transform="translate(-259.58071 -157.88396)" fill="#e4e4e4"></path><path id="baad4cfb-158d-4439-9cc3-22475bf47b22-68" data-name="Path 143" d="M707.41023,282.65037a3.41054,3.41054,0,0,0,0,6.82106h95.54019a3.41054,3.41054,0,0,0,0-6.82106Z" transform="translate(-259.58071 -157.88396)" fill="#e4e4e4"></path><path id="f3456279-91e5-49ad-aa43-9838b26fb6ca-69" data-name="Path 142" d="M543.84146,392.7046a3.41054,3.41054,0,0,0,0,6.82106h350.8937a3.41054,3.41054,0,0,0,0-6.82106Z" transform="translate(-259.58071 -157.88396)" fill="#e4e4e4"></path><path id="a3288adf-49f8-485f-8ae9-1e4f1a13d849-70" data-name="Path 143" d="M543.84146,413.1697a3.41054,3.41054,0,0,0,0,6.82106H803.13254a3.41054,3.41054,0,0,0,0-6.82106Z" transform="translate(-259.58071 -157.88396)" fill="#e4e4e4"></path><path id="e63a5b48-5a7d-40a2-b9b0-6adec326348a-71" data-name="Path 142" d="M543.84146,433.17177a3.41054,3.41054,0,0,0,0,6.82106h350.8937a3.41054,3.41054,0,0,0,0-6.82106Z" transform="translate(-259.58071 -157.88396)" fill="#e4e4e4"></path><path id="a1c669b4-dfc3-4cfa-a7be-66b71399844d-72" data-name="Path 143" d="M543.84146,453.63687a3.41054,3.41054,0,0,0,0,6.82106H803.13254a3.41054,3.41054,0,0,0,0-6.82106Z" transform="translate(-259.58071 -157.88396)" fill="#e4e4e4"></path><path id="bfec50d1-ffb1-4de6-a9ef-a1085e40e016-73" data-name="Path 142" d="M543.84146,474.17177a3.41054,3.41054,0,0,0,0,6.82106h350.8937a3.41054,3.41054,0,0,0,0-6.82106Z" transform="translate(-259.58071 -157.88396)" fill="#e4e4e4"></path><path id="bc9696ec-ec99-41d5-9116-3ad9737a38ac-74" data-name="Path 143" d="M543.84146,494.63687a3.41054,3.41054,0,0,0,0,6.82106H803.13254a3.41054,3.41054,0,0,0,0-6.82106Z" transform="translate(-259.58071 -157.88396)" fill="#e4e4e4"></path><path d="M599.41943,324.82812a49,49,0,1,1,48.99952-49A49.05567,49.05567,0,0,1,599.41943,324.82812Z" transform="translate(-259.58071 -157.88396)" fill="#6c63ff"></path><path d="M450.67833,510.10041a12.24754,12.24754,0,0,0-14.953-11.36231l-16.19641-22.82521-16.27138,6.45945,23.32519,31.91237a12.31392,12.31392,0,0,0,24.09559-4.1843Z" transform="translate(-259.58071 -157.88396)" fill="#a0616a"></path><path d="M419.11211,508.40888l-49.00774-63.57777L388.46714,387.12c1.34563-14.50936,10.425-18.56089,10.81135-18.72645l.5893-.25281,15.979,42.6119-11.73235,31.28625,28.79671,48.4319Z" transform="translate(-259.58071 -157.88396)" fill="#3f3d56"></path><path d="M589.30794,312.41993a12.24758,12.24758,0,0,0-10.17219,15.78672l-21.50463,17.91269,7.69816,15.72326,30.01343-25.72272a12.31392,12.31392,0,0,0-6.03477-23.69995Z" transform="translate(-259.58071 -157.88396)" fill="#a0616a"></path><path d="M590.06206,344.02244l-59.59835,53.77665-58.95815-13.84578c-14.57-.21979-19.31136-8.9587-19.50629-9.33113l-.29761-.568,41.2489-19.22578,32.0997,9.27828,46.06046-32.45509Z" transform="translate(-259.58071 -157.88396)" fill="#3f3d56"></path><polygon points="227.248 568.437 243.261 568.436 250.878 506.672 227.245 506.673 227.248 568.437" fill="#a0616a"></polygon><path d="M483.39733,721.74476h50.32614a0,0,0,0,1,0,0V741.189a0,0,0,0,1,0,0h-36.207a14.11914,14.11914,0,0,1-14.11914-14.11914v-5.32505A0,0,0,0,1,483.39733,721.74476Z" transform="translate(757.57348 1305.02654) rotate(179.99738)" fill="#2f2e41"></path><polygon points="163.247 568.437 179.26 568.436 186.878 506.672 163.245 506.673 163.247 568.437" fill="#a0616a"></polygon><path d="M419.397,721.74476H469.7231a0,0,0,0,1,0,0V741.189a0,0,0,0,1,0,0h-36.207A14.11914,14.11914,0,0,1,419.397,727.06981v-5.32505a0,0,0,0,1,0,0Z" transform="translate(629.57273 1305.02946) rotate(179.99738)" fill="#2f2e41"></path><polygon points="157.552 342.991 158.858 434.42 160.165 554.584 188.899 551.972 203.267 386.094 221.553 551.972 251.218 551.972 254.206 384.788 243.757 348.216 157.552 342.991" fill="#2f2e41"></polygon><path d="M473.37417,513.1531c-31.26533.00239-60.04471-14.14839-60.43319-14.34263l-.32273-.16136-2.62373-62.96637c-.76082-2.22509-15.74263-46.13091-18.28-60.08625-2.57083-14.13882,34.68842-26.54742,39.213-27.99853l1.02678-11.37405,41.75366-4.49918,5.292,14.5536,14.97942,5.6168a7.40924,7.40924,0,0,1,4.59212,8.7043l-8.32539,33.85619,20.33325,112.01266-4.37755.18946C495.709,511.39658,484.38425,513.1525,473.37417,513.1531Z" transform="translate(-259.58071 -157.88396)" fill="#3f3d56"></path><circle cx="454.46738" cy="294.45965" r="30.06284" transform="matrix(0.87745, -0.47966, 0.47966, 0.87745, -345.12824, 96.19037)" fill="#a0616a"></circle><path d="M430.1166,323.56132c5.72926,6.10289,16.36927,2.82672,17.1158-5.51069a10.07153,10.07153,0,0,0-.01268-1.94523c-.38544-3.69311-2.519-7.046-2.008-10.94542a5.73974,5.73974,0,0,1,1.05046-2.687c4.56548-6.11359,15.28263,2.73444,19.59138-2.8,2.642-3.39359-.46364-8.73664,1.56381-12.52956,2.67591-5.006,10.60183-2.53654,15.57222-5.27809,5.53017-3.05032,5.1994-11.53517,1.55907-16.6961-4.43955-6.294-12.22348-9.65241-19.91044-10.13643s-15.32094,1.59394-22.4974,4.39069c-8.15392,3.17767-16.23969,7.56925-21.25749,14.739-6.10218,8.71919-6.68942,20.44132-3.6376,30.63677C419.10222,311.0013,425.43805,318.57766,430.1166,323.56132Z" transform="translate(-259.58071 -157.88396)" fill="#2f2e41"></path><path d="M641.58071,741.9626h-381a1,1,0,0,1,0-2h381a1,1,0,0,1,0,2Z" transform="translate(-259.58071 -157.88396)" fill="#cacaca"></path><path d="M596.58984,294.33545a3.488,3.488,0,0,1-2.38134-.93555l-16.15723-15.00732a3.49994,3.49994,0,0,1,4.76367-5.12891l13.68555,12.71192,27.07666-27.07618a3.5,3.5,0,1,1,4.94922,4.9502l-29.46094,29.46094A3.49275,3.49275,0,0,1,596.58984,294.33545Z" transform="translate(-259.58071 -157.88396)" fill="#fff"></path></svg>
                        <h2 class="text-lg text-gray-600 font-semibold">Select Document</h2>
                        <p class="text-sm text-gray-600">Illustration Description 1</p>
                    </div>
        
                    <!-- Illustration 2 -->
                    <div class="bg-white p-4 rounded-lg shadow-2xl ">
                      <svg xmlns="http://www.w3.org/2000/svg" id="currentIllo" data-name="Layer 1" class="w-32 h-32 mx-auto" viewBox="0 0 538.0218 520.24984" class="injected-svg DownloadModal__ImageFile-sc-p17csy-5 iIfSkb grid_media" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M821.82762,687.5884a2.80741,2.80741,0,0,1-2.03464-4.86593l.19237-.76476q-.038-.09189-.07644-.18358a7.53909,7.53909,0,0,0-13.90673.05167c-2.27452,5.4781-5.17038,10.96553-5.88341,16.75771a22.30362,22.30362,0,0,0,.39153,7.67061,89.41943,89.41943,0,0,1-8.13413-37.13874,86.307,86.307,0,0,1,.53535-9.6283q.44349-3.93128,1.23055-7.80653a90.45559,90.45559,0,0,1,17.93812-38.3373A24.07278,24.07278,0,0,0,822.092,602.9559a18.3625,18.3625,0,0,0,1.67-5.01791c-.48738.06393-1.83778-7.35909-1.47017-7.81452-.67924-1.03071-1.895-1.54307-2.63681-2.54885-3.68943-5.0021-8.77253-4.12872-11.42612,2.66876-5.6687,2.861-5.72357,7.60577-2.24528,12.16916,2.2129,2.90325,2.51695,6.83168,4.45862,9.93984-.19981.25572-.40756.50344-.6073.75916a91.04046,91.04046,0,0,0-9.50223,15.05378,37.84589,37.84589,0,0,0-2.25945-17.5787c-2.16269-5.21725-6.21632-9.61123-9.786-14.12153-4.2878-5.41757-13.08033-3.05324-13.83575,3.81439q-.011.09973-.02142.19941.79533.44867,1.55706.95247a3.808,3.808,0,0,1-1.53532,6.92992l-.07765.012a37.88961,37.88961,0,0,0,.99876,5.66515c-4.57949,17.71009,5.30731,24.16047,19.42432,24.45023.31163.15979.61531.31958.92694.47145a92.92537,92.92537,0,0,0-5.00193,23.5393,88.13663,88.13663,0,0,0,.06393,14.23066l-.024-.16777a23.28922,23.28922,0,0,0-7.95036-13.44764c-6.11822-5.02589-14.76211-6.87666-21.36259-10.9165a4.37072,4.37072,0,0,0-6.69422,4.252q.01327.0882.027.17642a25.5799,25.5799,0,0,1,2.86849,1.38225q.79532.44877,1.55706.95247a3.8081,3.8081,0,0,1-1.53533,6.93l-.07772.01193c-.05591.008-.10387.016-.15972.024a37.92271,37.92271,0,0,0,6.97545,10.92264c2.86344,15.46022,15.162,16.927,28.31753,12.42488h.008a92.89716,92.89716,0,0,0,6.24043,18.21781H821.269c.08-.24769.15184-.50341.22379-.75113a25.329,25.329,0,0,1-6.16856-.36745c1.654-2.02957,3.308-4.07513,4.962-6.10463a1.384,1.384,0,0,0,.10388-.11987c.839-1.03867,1.68595-2.06945,2.52491-3.10816l.00045-.00126a37.10118,37.10118,0,0,0-1.08711-9.45127Z" transform="translate(-330.9891 -189.87508)" fill="#f2f2f2"></path><path d="M784.68188,489.35329c5.90814-21.45223,16.9292-39.72273,34.72329-53.77843a4.89248,4.89248,0,0,1,6.75634-1.45469l40.61465,26.2238a4.89245,4.89245,0,0,1,1.45468,6.75632l-34.72329,53.77843a4.89246,4.89246,0,0,1-6.75632,1.45471l-40.61465-26.22379A4.89247,4.89247,0,0,1,784.68188,489.35329Z" transform="translate(-330.9891 -189.87508)" fill="#f2f2f2"></path><path d="M798.28516,475.12149c1.52248-11.3345,10.89894-22.92117,22.32328-34.57366a4.58185,4.58185,0,0,1,6.32752-1.36236l34.90487,22.53714a4.58206,4.58206,0,0,1,1.36257,6.32764l-30.899,47.85549a4.58205,4.58205,0,0,1-6.32771,1.36224l-21.62285-13.96129A20.40975,20.40975,0,0,1,798.28516,475.12149Z" transform="translate(-330.9891 -189.87508)" fill="#fff"></path><path d="M801.39977,521.3357c-5.15377-21.64585-4.29431-42.9657,4.53083-63.85372a4.89248,4.89248,0,0,1,5.22058-4.52878l48.22374,3.42179a4.89246,4.89246,0,0,1,4.52876,5.22056l-4.53084,63.85372a4.89247,4.89247,0,0,1-5.22054,4.5288l-48.22374-3.42179A4.89248,4.89248,0,0,1,801.39977,521.3357Z" transform="translate(-330.9891 -189.87508)" fill="#f2f2f2"></path><path d="M806.46733,502.31169c-4.12451-10.66664-1.48736-25.33683,2.91283-41.051a4.58187,4.58187,0,0,1,4.88923-4.24135l41.44424,2.94074a4.58205,4.58205,0,0,1,4.24158,4.88924l-4.03183,56.82112a4.582,4.582,0,0,1-4.88945,4.24133l-25.67385-1.82172A20.40974,20.40974,0,0,1,806.46733,502.31169Z" transform="translate(-330.9891 -189.87508)" fill="#fff"></path><path d="M805.558,387.709l-20.65947-76.46688A12.785,12.785,0,0,0,769.3901,302.229l0,0a12.785,12.785,0,0,0-9.02253,16.21244l23.89523,78.77245,12.50192,48.47714a11.15676,11.15676,0,1,0,14.30444.63831Z" transform="translate(-330.9891 -189.87508)" fill="#ffb6b6"></path><path d="M656.56436,400.93746l21.18655-76.32252a12.785,12.785,0,0,0-8.75169-15.65748l0,0a12.785,12.785,0,0,0-16.02429,9.35261l-19.57713,79.95509L619.454,446.34739a11.15677,11.15677,0,1,0,11.983,7.83792Z" transform="translate(-330.9891 -189.87508)" fill="#ffb6b6"></path><polygon points="446.816 504.239 433.315 504.238 426.893 452.165 446.818 452.166 446.816 504.239" fill="#ffb6b6"></polygon><path d="M778.28,708.19791l-41.5155-.00158v-.525a16.15988,16.15988,0,0,1,16.159-16.15874h.001l7.58332-5.75307,14.14881,5.754,3.62405.00009Z" transform="translate(-330.9891 -189.87508)" fill="#2f2e41"></path><polygon points="351.81 504.375 338.519 502.004 341.337 449.611 360.953 453.11 351.81 504.375" fill="#ffb6b6"></polygon><path d="M680.79465,708.19791,639.924,700.90914l.09215-.51682a16.15988,16.15988,0,0,1,18.74445-13.07148l.001.00018,8.47541-4.33265,12.91914,8.14819,3.56777.63621Z" transform="translate(-330.9891 -189.87508)" fill="#2f2e41"></path><path d="M684.1149,454.68878S671.533,472.51,672.04585,478.49051s4.95628,1.20962.51287,5.98048-7.03249,1.57014-4.84927,7.46428,3.07191,2.07745,2.18322,5.89414.88869,149.80512.88869,149.80512h23.13691s13.04781-84.65063,11.39607-88.60269-1.61387-2.23155.14456-6.43141,3.41329-9.19612,3.41329-9.19612l18.288-51.46886,14.107,72.46739L757.87262,650.515h22.17212s3.79668-126.62986,5.47535-128.20763-.32961-5.12377-2.43586-7.16746-1.6864-4.11877-1.00764-8.32918,3.54219-6.55872,3.4435-9.20125,6.12208-44.62614-3.65343-51.30535S684.1149,454.68878,684.1149,454.68878Z" transform="translate(-330.9891 -189.87508)" fill="#2f2e41"></path><path d="M761.47653,277.1745l-25.88066-6.70645L723.515,253.80572l-28.6905,3.527-6.10734,22.72759L668.29182,291.9164c36.61419.21884,16.89656,106.2934,22.27807,113.13715,4.37946,5.56948-21.85839,18.81883-13.63532,27.27064s5.18276,5.06989,3.27462,14.27147-15.81778,18.93956,0,18.84293,111.265-1.46016,108.538-12.36842-2.68412-8.13825-6.79619-14.97738-6.87956-3.01732-5.49582-13.10942-3.1106-17.89788.02026-22.3639c4.80557-6.85486-.03728-56.33733-4.56872-55.01654Z" transform="translate(-330.9891 -189.87508)" fill="#6c63ff"></path><path d="M754.08714,277.52823s18.9315-8.04275,25.74916,6.9561c2.17752,4.79055,4.011,16.82332,5.77769,14.155s.06211,3.18135,1.15575,3.18859c.97613.00645,2.47689-1.57243,1.34256,3.86689a10.77325,10.77325,0,0,0,3.14761,9.9166l-32.90372,19.70629Z" transform="translate(-330.9891 -189.87508)" fill="#6c63ff"></path><path d="M682.95747,291.16355s-18.93151-8.04275-25.74917,6.95611c-1.9174,4.21827-1.44033,13.5912-5.17412,12.53891s-1.08315,2.9125-1.57576,4.28986c-.54906,1.53518,1.848,5.87959-1.51854,4.35932s-3.15519,9.939-3.15519,9.939L678.68842,348.953Z" transform="translate(-330.9891 -189.87508)" fill="#6c63ff"></path><path d="M691.93342,268.70032l-5.45413,9.54473s-14.99885,8.18119-14.99885,9.54472,2.72706,12.49726,0,21.24749,5.20554,25.20618,6.81766,38.74793c6.81766,57.26836-13.4564,78.07668-17.72592,114.53672l43.268,12.63683s7.1827-95.8123,7.1827-117.62882S691.93342,268.70032,691.93342,268.70032Z" transform="translate(-330.9891 -189.87508)" fill="#2f2e41"></path><path d="M731.47586,264.60972l11.14636,6.33981s14.58658,3.21609,14.76075,4.56845.226,15.72546,4.04844,24.05567,2.76922,12.7597,13.06359,37.38552c5.25977,12.58224,17.33492,113.25015,17.33492,113.25015L750.5305,468.26941s-19.36232-94.11-22.149-115.74779S731.47586,264.60972,731.47586,264.60972Z" transform="translate(-330.9891 -189.87508)" fill="#2f2e41"></path><circle cx="372.61606" cy="33.54069" r="28.19388" fill="#ffb6b6"></circle><path d="M722.15989,245.32132c-6.6646-5.20939,2.44572-28.12577-8.56-23.23433,0,0-13.45145-8.56-16.154-2.93489-3.1293,6.51338-14.25851,3.55856-21.09433,1.25958a16.60841,16.60841,0,0,0,1.13726-3.90093,31.22909,31.22909,0,0,1-3.9987,2.67807,8.11676,8.11676,0,0,1-2.44572-2.00551,4.96705,4.96705,0,0,1-.62367-5.63736c1.13725-1.74868,3.48512-2.28674,4.86695-3.8398a1.672,1.672,0,0,0,.2295-1.5362,4.39444,4.39444,0,0,1,3.93738-5.50333,1.58022,1.58022,0,0,0,.749-.16313,17.13328,17.13328,0,0,0,3.19165-2.51909c-1.60195.07337.357-9.73249,16.23961-7.87522,3.9987-.14673,6.08693,4.26336,10.0245,4.9604,9.54473-5.45413,18.06454,2.41348,22.21006,9.934C736.01491,212.52422,740.50278,236.7613,722.15989,245.32132Z" transform="translate(-330.9891 -189.87508)" fill="#2f2e41"></path><path d="M601.85909,204.87508h-252.73a18.15513,18.15513,0,0,0-18.14,18.13V450.73513a18.16363,18.16363,0,0,0,18.14,18.14h252.73a18.15509,18.15509,0,0,0,18.13-18.13995V223.00508A18.14658,18.14658,0,0,0,601.85909,204.87508Z" transform="translate(-330.9891 -189.87508)" fill="#fff"></path><path d="M486.3832,257.1428h-27a5,5,0,1,1,0-10h27a5,5,0,0,1,0,10Z" transform="translate(-330.9891 -189.87508)" fill="#6c63ff"></path><path d="M844.3832,486.87508h-27a5,5,0,0,1,0-10h27a5,5,0,0,1,0,10Z" transform="translate(-330.9891 -189.87508)" fill="#6c63ff"></path><path d="M556.3832,361.87508h-167a5,5,0,0,1,0-10h167a5,5,0,0,1,0,10Z" transform="translate(-330.9891 -189.87508)" fill="#e6e6e6"></path><path d="M556.3832,394.87508h-167a5,5,0,0,1,0-10h167a5,5,0,0,1,0,10Z" transform="translate(-330.9891 -189.87508)" fill="#e6e6e6"></path><path d="M556.3832,427.87508h-167a5,5,0,0,1,0-10h167a5,5,0,0,1,0,10Z" transform="translate(-330.9891 -189.87508)" fill="#e6e6e6"></path><path d="M522.24911,272.145h-98.73a18.15514,18.15514,0,0,0-18.14,18.13v29.73a18.16365,18.16365,0,0,0,18.14,18.14h98.73a18.15509,18.15509,0,0,0,18.13-18.14v-29.73A18.14657,18.14657,0,0,0,522.24911,272.145Zm16.13,47.86a16.14,16.14,0,0,1-16.13995,16.14H451.36633a43.98722,43.98722,0,0,1-43.98722-43.98722V290.275a16.15571,16.15571,0,0,1,16.14-16.13h98.73a16.14718,16.14718,0,0,1,16.13,16.13Z" transform="translate(-330.9891 -189.87508)" fill="#e6e6e6"></path><circle cx="143" cy="109" r="17" fill="#e6e6e6"></circle><polygon points="182.11 148.27 106 148 130 142 132.99 132.13 156 132 162.89 141.76 180.29 146.27 181.87 146.68 182.11 148.27" fill="#e6e6e6"></polygon><path d="M464.32753,309.72917c3.648-2.8515-1.33872-15.39537,4.68555-12.71791,0,0,7.363-4.68555,8.84232-1.60649,1.7129,3.56527,7.80476,1.94787,11.54653.68946a9.09074,9.09074,0,0,1-.62251-2.13527,17.09573,17.09573,0,0,0,2.18879,1.46591,4.44311,4.44311,0,0,0,1.33873-1.09777,2.71885,2.71885,0,0,0,.34138-3.08576c-.6225-.95719-1.90767-1.25171-2.66405-2.10181a.91524.91524,0,0,1-.12562-.84088,2.40541,2.40541,0,0,0-2.15523-3.01239.86493.86493,0,0,1-.41-.0893,9.37792,9.37792,0,0,1-1.747-1.37889c.87687.04017-.19541-5.32733-8.88917-4.3107-2.1888-.08032-3.33184,2.33366-5.48718,2.7152-5.22455-2.98546-9.8881,1.32108-12.15725,5.43765S454.28707,305.04362,464.32753,309.72917Z" transform="translate(-330.9891 -189.87508)" fill="#e6e6e6"></path><path d="M601.85909,204.87508h-252.73a18.15513,18.15513,0,0,0-18.14,18.13V450.73513a18.16363,18.16363,0,0,0,18.14,18.14h252.73a18.15509,18.15509,0,0,0,18.13-18.13995V223.00508A18.14658,18.14658,0,0,0,601.85909,204.87508Zm16.13,245.86005a16.14,16.14,0,0,1-16.14,16.14H463.18989A130.20079,130.20079,0,0,1,332.9891,336.67429V223.00508a16.15571,16.15571,0,0,1,16.14-16.13h252.73a16.14719,16.14719,0,0,1,16.13,16.13Z" transform="translate(-330.9891 -189.87508)" fill="#e6e6e6"></path><path d="M865.89621,709.81761l-315.3575.30731a1.19069,1.19069,0,0,1,0-2.38135l315.3575-.30731a1.19069,1.19069,0,0,1,0,2.38135Z" transform="translate(-330.9891 -189.87508)" fill="#cacaca"></path></svg>
                        <h2 class="text-lg font-semibold text-gray-600">Fill up Forms</h2>
                        <p class="text-sm text-gray-600">Illustration Description 2</p>
                    </div>
        
                    <!-- Illustration 3 -->
                    <div class="bg-white p-4 rounded-lg shadow-2xl ">
                       <svg xmlns="http://www.w3.org/2000/svg" id="currentIllo" data-name="Layer 1" class="w-32 h-32 mx-auto" viewBox="0 0 601.6 630" class="injected-svg DownloadModal__ImageFile-sc-p17csy-5 iIfSkb grid_media" xmlns:xlink="http://www.w3.org/1999/xlink"><rect x="756.96373" y="195.50659" width="1.67162" height="109.19622" transform="translate(-245.06837 491.48745) rotate(-46.40674)" fill="#e6e6e6"></rect><polygon points="498.845 143.982 497.175 144.083 497.679 152.309 489.437 152.21 489.419 153.882 499.457 154.001 498.845 143.982" fill="#e6e6e6"></polygon><polygon points="427.781 76.326 427.763 77.998 419.522 77.899 420.026 86.125 418.355 86.226 417.745 76.206 427.781 76.326" fill="#e6e6e6"></polygon><circle cx="458.59956" cy="115.10464" r="9.19286" fill="#e6e6e6"></circle><rect x="389.27378" y="249.26889" width="109.19622" height="1.67162" transform="translate(-349.25942 240.03057) rotate(-43.59326)" fill="#e6e6e6"></rect><polygon points="103.815 154.001 113.853 153.882 113.834 152.21 105.593 152.309 106.097 144.083 104.427 143.982 103.815 154.001" fill="#e6e6e6"></polygon><polygon points="185.527 76.206 184.916 86.226 183.246 86.125 183.749 77.899 175.508 77.998 175.49 76.326 185.527 76.206" fill="#e6e6e6"></polygon><circle cx="144.67187" cy="115.10464" r="9.19286" fill="#e6e6e6"></circle><path d="M669.36429,325.54286H530.63571a7.53,7.53,0,0,1-7.52142-7.52143v-175.5A7.53,7.53,0,0,1,530.63571,135H669.36429a7.53,7.53,0,0,1,7.52142,7.52143v175.5A7.53,7.53,0,0,1,669.36429,325.54286ZM530.63571,136.67143a5.85658,5.85658,0,0,0-5.85,5.85v175.5a5.85658,5.85658,0,0,0,5.85,5.85H669.36429a5.85658,5.85658,0,0,0,5.85-5.85v-175.5a5.85658,5.85658,0,0,0-5.85-5.85Z" transform="translate(-299.2 -135)" fill="#3f3d56"></path><path d="M588.45985,219.35842h-30.537a3.76488,3.76488,0,0,1-3.76071-3.76071V179.562a3.76488,3.76488,0,0,1,3.76071-3.76071h30.537a3.76489,3.76489,0,0,1,3.76072,3.76071v36.03569A3.76489,3.76489,0,0,1,588.45985,219.35842Z" transform="translate(-299.2 -135)" fill="#6c63ff"></path><path d="M647.79557,236.07271h-30.537a3.7649,3.7649,0,0,1-3.76072-3.76071V196.27631a3.7649,3.7649,0,0,1,3.76072-3.76072h30.537a3.76489,3.76489,0,0,1,3.76071,3.76072V232.312A3.76489,3.76489,0,0,1,647.79557,236.07271Z" transform="translate(-299.2 -135)" fill="#ccc"></path><path d="M600.15985,287.05128h-30.537a3.76488,3.76488,0,0,1-3.76071-3.76071V247.25488a3.76489,3.76489,0,0,1,3.76071-3.76072h30.537a3.7649,3.7649,0,0,1,3.76072,3.76072v36.03569A3.76489,3.76489,0,0,1,600.15985,287.05128Z" transform="translate(-299.2 -135)" fill="#ff6584"></path><path d="M893.27857,506H754.55a7.53005,7.53005,0,0,1-7.52143-7.52143v-175.5a7.53005,7.53005,0,0,1,7.52143-7.52143H893.27857A7.53,7.53,0,0,1,900.8,322.97857v175.5A7.53,7.53,0,0,1,893.27857,506ZM754.55,317.12857a5.85658,5.85658,0,0,0-5.85,5.85v175.5a5.85658,5.85658,0,0,0,5.85,5.85H893.27857a5.85658,5.85658,0,0,0,5.85-5.85v-175.5a5.85658,5.85658,0,0,0-5.85-5.85Z" transform="translate(-299.2 -135)" fill="#3f3d56"></path><path d="M847.73214,354.31786H800.09643a3.34286,3.34286,0,0,1,0-6.68572h47.63571a3.34286,3.34286,0,0,1,0,6.68572Z" transform="translate(-299.2 -135)" fill="#6c63ff"></path><path d="M871.13214,386.075H776.69643a3.34286,3.34286,0,1,1,0-6.68571h94.43571a3.34286,3.34286,0,1,1,0,6.68571Z" transform="translate(-299.2 -135)" fill="#ccc"></path><path d="M871.13214,403.625H776.69643a3.34286,3.34286,0,1,1,0-6.68571h94.43571a3.34286,3.34286,0,1,1,0,6.68571Z" transform="translate(-299.2 -135)" fill="#ccc"></path><path d="M871.13214,421.175H776.69643a3.34286,3.34286,0,1,1,0-6.68571h94.43571a3.34286,3.34286,0,1,1,0,6.68571Z" transform="translate(-299.2 -135)" fill="#ccc"></path><path d="M871.13214,438.725H776.69643a3.34286,3.34286,0,1,1,0-6.68571h94.43571a3.34286,3.34286,0,1,1,0,6.68571Z" transform="translate(-299.2 -135)" fill="#ccc"></path><path d="M871.13214,456.275H776.69643a3.34286,3.34286,0,1,1,0-6.68571h94.43571a3.34286,3.34286,0,1,1,0,6.68571Z" transform="translate(-299.2 -135)" fill="#ccc"></path><path d="M871.13214,473.825H776.69643a3.34286,3.34286,0,1,1,0-6.68571h94.43571a3.34286,3.34286,0,1,1,0,6.68571Z" transform="translate(-299.2 -135)" fill="#ccc"></path><path d="M445.45,506H306.72143A7.53,7.53,0,0,1,299.2,498.47857v-175.5a7.53,7.53,0,0,1,7.52143-7.52143H445.45a7.53005,7.53005,0,0,1,7.52143,7.52143v175.5A7.53005,7.53005,0,0,1,445.45,506ZM306.72143,317.12857a5.85658,5.85658,0,0,0-5.85,5.85v175.5a5.85658,5.85658,0,0,0,5.85,5.85H445.45a5.85658,5.85658,0,0,0,5.85-5.85v-175.5a5.85658,5.85658,0,0,0-5.85-5.85Z" transform="translate(-299.2 -135)" fill="#3f3d56"></path><path d="M423.44834,356.89277H381.66263a3.34286,3.34286,0,0,1,0-6.68572h41.78571a3.34286,3.34286,0,1,1,0,6.68572Z" transform="translate(-299.2 -135)" fill="#3f3d56"></path><path d="M423.44834,374.44277H381.66263a3.34286,3.34286,0,0,1,0-6.68572h41.78571a3.34286,3.34286,0,1,1,0,6.68572Z" transform="translate(-299.2 -135)" fill="#3f3d56"></path><path d="M360.22223,384.43578h-30.537a3.76489,3.76489,0,0,1-3.76072-3.76071V344.63938a3.7649,3.7649,0,0,1,3.76072-3.76072h30.537a3.76489,3.76489,0,0,1,3.76071,3.76072v36.03569A3.76488,3.76488,0,0,1,360.22223,384.43578Z" transform="translate(-299.2 -135)" fill="#6c63ff"></path><path d="M423.1588,410.37848H328.72309a3.34286,3.34286,0,1,1,0-6.68571H423.1588a3.34286,3.34286,0,1,1,0,6.68571Z" transform="translate(-299.2 -135)" fill="#ccc"></path><path d="M423.1588,427.92848H328.72309a3.34286,3.34286,0,1,1,0-6.68571H423.1588a3.34286,3.34286,0,1,1,0,6.68571Z" transform="translate(-299.2 -135)" fill="#ccc"></path><path d="M423.1588,445.47848H328.72309a3.34286,3.34286,0,1,1,0-6.68571H423.1588a3.34286,3.34286,0,1,1,0,6.68571Z" transform="translate(-299.2 -135)" fill="#ccc"></path><path d="M423.1588,463.02848H328.72309a3.34286,3.34286,0,1,1,0-6.68571H423.1588a3.34286,3.34286,0,1,1,0,6.68571Z" transform="translate(-299.2 -135)" fill="#ccc"></path><path d="M423.1588,480.57848H328.72309a3.34286,3.34286,0,1,1,0-6.68571H423.1588a3.34286,3.34286,0,1,1,0,6.68571Z" transform="translate(-299.2 -135)" fill="#ccc"></path><path d="M497.89518,607.71863V571.68294a3.76489,3.76489,0,0,1,3.76071-3.76071h30.537a3.76489,3.76489,0,0,1,3.76071,3.76071v36.03569a3.7649,3.7649,0,0,1-3.76071,3.76072h-30.537A3.7649,3.7649,0,0,1,497.89518,607.71863Z" transform="translate(-299.2 -135)" fill="#e6e6e6"></path><path d="M508.89518,595.71863V559.68294a3.76489,3.76489,0,0,1,3.76071-3.76071h30.537a3.76489,3.76489,0,0,1,3.76071,3.76071v36.03569a3.7649,3.7649,0,0,1-3.76071,3.76072h-30.537A3.7649,3.7649,0,0,1,508.89518,595.71863Z" transform="translate(-299.2 -135)" fill="#6c63ff"></path><path d="M645.78429,584.18843a9.07776,9.07776,0,0,1-2.39821-13.71145l-9.4656-69.18787,19.71756.9678,3.09564,67.48557a9.12692,9.12692,0,0,1-10.94939,14.446Z" transform="translate(-299.2 -135)" fill="#a0616a"></path><path d="M656.34418,503.17871a3.70494,3.70494,0,0,1-1.5051,1.06441l-17.71963,6.76294a3.72283,3.72283,0,0,1-4.729-1.96465l-15.69629-35.27523a14.73962,14.73962,0,0,1-.7212-10.43132,14.33679,14.33679,0,0,1,10.91159-9.78216,13.67275,13.67275,0,0,1,5.89.08316,14.27981,14.27981,0,0,1,10.26305,8.92147l13.956,36.89A3.73032,3.73032,0,0,1,656.34418,503.17871Z" transform="translate(-299.2 -135)" fill="#ccc"></path><polygon points="264.807 618.06 252.547 618.06 248.102 570.549 264.809 570.773 264.807 618.06" fill="#a0616a"></polygon><path d="M243.79024,614.55666h23.64387a0,0,0,0,1,0,0v14.88687a0,0,0,0,1,0,0H228.90338a0,0,0,0,1,0,0v0A14.88686,14.88686,0,0,1,243.79024,614.55666Z" fill="#2f2e41"></path><polygon points="321.807 618.06 309.547 618.06 303.715 570.772 321.809 570.773 321.807 618.06" fill="#a0616a"></polygon><path d="M300.79024,614.55666h23.64387a0,0,0,0,1,0,0v14.88687a0,0,0,0,1,0,0H285.90338a0,0,0,0,1,0,0v0A14.88686,14.88686,0,0,1,300.79024,614.55666Z" fill="#2f2e41"></path><path d="M622.54889,736.23552l-19.25513-1.42578a4.50578,4.50578,0,0,1-4.16235-4.27051L594.838,641.80876a3.50008,3.50008,0,0,0-6.92481-.5332L570.002,728.68278a4.50575,4.50575,0,0,1-4.76709,3.582l-17.40576-1.39257a4.4995,4.4995,0,0,1-4.1189-4.93262L559.858,564.46306a4.49952,4.49952,0,0,1,5.43359-3.94922l61.406,13.34863a4.511,4.511,0,0,1,3.543,4.48145L627.38067,731.8322a4.5022,4.5022,0,0,1-4.489,4.416C622.77789,736.24821,622.66363,736.24333,622.54889,736.23552Z" transform="translate(-299.2 -135)" fill="#2f2e41"></path><circle cx="306.50339" cy="269.88758" r="24.56103" fill="#a0616a"></circle><path d="M567.59552,576.9152a21.96161,21.96161,0,0,1-7.2937-16.86621c0-35.30078,30.55566-114.168,31.51367-116.6289.0935-.59278.89966-.84864,5.12939-3.70606,4.23242-2.85937,10.335-3.29883,18.13941-1.30566a4.47911,4.47911,0,0,1,3.25,3.31836l1.4519,2.09765a3.49144,3.49144,0,0,0,2.02881,2.40625c6.29346,2.65137,26.29809,14.87793,19.48144,60.89161-6.33227,42.74316-8.90185,67.88086-9.71264,76.70507a4.49122,4.49122,0,0,1-4.07154,4.06543c-3.08569.27637-8.38183.64356-14.68945.64356C598.20172,588.5363,578.14654,586.56364,567.59552,576.9152Z" transform="translate(-299.2 -135)" fill="#ccc"></path><path d="M538.24736,563.83729a9.07771,9.07771,0,0,1,5.649-12.72182L574.58944,488.39l15.83345,11.79069-35.034,57.76251a9.12692,9.12692,0,0,1-17.14158,5.89414Z" transform="translate(-299.2 -135)" fill="#a0616a"></path><path d="M592.15633,502.454a3.7049,3.7049,0,0,1-1.8429.04517l-18.48219-4.25807a3.72282,3.72282,0,0,1-2.832-4.26646l6.62251-38.03759a14.73969,14.73969,0,0,1,5.21371-9.06366,14.33681,14.33681,0,0,1,14.51142-2.04255,13.67258,13.67258,0,0,1,4.84448,3.35107,14.27983,14.27983,0,0,1,3.55082,13.12686l-8.96734,38.40871A3.7303,3.7303,0,0,1,592.15633,502.454Z" transform="translate(-299.2 -135)" fill="#ccc"></path><path d="M599.95291,427.0789a10.58407,10.58407,0,0,1-2.83917-9.3866c.85636-4.47943,1.35942-7.41039,1.45471-8.47667h0c.32608-3.64766-3.36133-6.60057-7.01009-7.07047-.1414-.01845-.25976-.03074-.35857-.03865.09288.09135.19279.18445.2804.267.693.65084,1.55573,1.46153,1.35064,2.29769-.12362.50327-.58364.86075-1.40663,1.09087-5.70622,1.59678-10.1009.13087-13.83068-4.61645a11.026,11.026,0,0,1-2.10511-4.598c-1.33593-6.5549,2.2239-12.14277,5.4458-15.67537,2.6567-2.91295,6.96354-6.44907,12.39419-6.75209,4.2234-.23583,9.24563,2.19448,10.74888,6.57423a8.15937,8.15937,0,0,1,6.36123-3.58618,14.662,14.662,0,0,1,8.15827,2.26914c11.90914,6.8219,17.02732,23.07258,11.17684,35.48763-3.68038,7.80914-11.65421,13.62273-20.80981,15.17209a10.39312,10.39312,0,0,1-1.7349.14668A10.11515,10.11515,0,0,1,599.95291,427.0789Z" transform="translate(-299.2 -135)" fill="#2f2e41"></path><path d="M484.77874,765h195a1,1,0,0,0,0-2h-195a1,1,0,1,0,0,2Z" transform="translate(-299.2 -135)" fill="#3f3d56"></path></svg>
                        <h2 class="text-lg font-semibold text-gray-600">Document Processing</h2>
                        <p class="text-sm text-gray-600">Illustration Description 3</p>
                    </div>
        
                    <!-- Illustration 4 -->
                    <div class="bg-white p-4 rounded-lg shadow-2xl ">
                    <svg xmlns="http://www.w3.org/2000/svg" id="currentIllo" data-name="Layer 1" class="w-32 h-32 mx-auto"  viewBox="0 0 865.67004 576.44344" class="injected-svg DownloadModal__ImageFile-sc-p17csy-5 iIfSkb grid_media" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M716.98158,481.91549a11.79841,11.79841,0,0,0,9.17288-13.77266,11.5925,11.5925,0,0,0-.56729-1.96845l31.47108-27.12907-20.57508-5.82065-26.73111,26.65459a11.84062,11.84062,0,0,0-5.66184,15.631,11.52872,11.52872,0,0,0,12.89128,6.40523Z" transform="translate(-167.16498 -161.77828)" fill="#ffb6b6"></path><path d="M921.34506,674.30605l1.14386-25.71947a83.066,83.066,0,0,1,38.74474-9.80778c-18.60844,15.21376-16.28294,44.54069-28.899,64.99961a49.96435,49.96435,0,0,1-36.63939,23.08922L880.123,736.402a83.72449,83.72449,0,0,1,17.647-67.84511A80.87311,80.87311,0,0,1,912.633,654.74678C916.36256,664.58091,921.34506,674.30605,921.34506,674.30605Z" transform="translate(-167.16498 -161.77828)" fill="#f2f2f2"></path><polygon points="714.057 561.388 699.956 561.387 693.248 507 714.059 507.001 714.057 561.388" fill="#ffb6b6"></polygon><path d="M884.81747,736.83421l-45.46566-.00168v-.57507a17.69746,17.69746,0,0,1,17.69651-17.69622h.00112l8.3049-6.30054,15.4951,6.3015,3.96888.00016Z" transform="translate(-167.16498 -161.77828)" fill="#2f2e41"></path><polygon points="648.548 561.388 634.448 561.387 627.74 507 648.551 507.001 648.548 561.388" fill="#ffb6b6"></polygon><path d="M819.30945,736.83421l-45.46566-.00168v-.57507a17.69744,17.69744,0,0,1,17.6965-17.69622h.00112l8.30491-6.30054,15.4951,6.3015,3.96887.00016Z" transform="translate(-167.16498 -161.77828)" fill="#2f2e41"></path><path d="M809.61006,425.82623l91.71538,2.29289c17.41873,9.461,17.68323,29.93793,11.97593,54.24993,0,0,1.92669,14.45029-1.92672,18.3037s-5.78012,3.85342-3.85342,10.59689-8.253,17.75756-7.01655,18.994,4.12649,7.9799,4.12649,7.9799l-9.63353,54.91114s-6.74347,95.372-8.67018,97.29868-3.85341,0-1.92671,4.81677,3.85342,2.89006,1.92671,4.81677a70.94945,70.94945,0,0,0-4.81677,5.78012H858.21954s-1.756-9.63354-1.756-10.59689-1.92671-6.74347-1.92671-7.70683,1.70294-2.66628,1.70294-2.66628a31.6937,31.6937,0,0,0,1.18712-6.00389c0-1.92671,5.78012-76.10492,5.78012-76.10492l-11.56024-96.33533L823.7095,600.8615s0,82.84838-1.92671,84.77509-1.92671.96335-.96335,4.81676,4.81676,2.89006,1.9267,5.78012-3.85341-1.9267-2.89006,2.89006l.96336,4.81677-28.9006.41341s-3.85342-8.12024-1.92671-11.0103,1.8111-2.10117-.53948-6.8307-3.31393-5.69289-2.35058-6.65624.96335-6.08733.96335-6.08733l4.81677-92.17471s.96335-97.29868.96335-100.18874a9.60908,9.60908,0,0,0-.80026-4.3339v-3.92288l3.69032-13.90035Z" transform="translate(-167.16498 -161.77828)" fill="#2f2e41"></path><path d="M715.92132,450.62325l15.5,12.5,84.5-65.5-5-114h0a46.03861,46.03861,0,0,0-17.02258,31.10257l-14.47736,64.39743Z" transform="translate(-167.16498 -161.77828)" fill="#e6e6e6"></path><path d="M795.92132,454.62325c29.91065,3.82254,57.46869-7.75858,83.50018-16.5,11.75165-3.9462,23.59021.17343,34.49988-6.5-4.71759-46.46695-.1372-98.808,9.88373-154.58624a13.21728,13.21728,0,0,0-8.98633-14.94638l-32.29116-9.2644-9.94172-10.96751L846.909,248.3769l-8.98765,16.24635-30.88769,20.87009a11.29194,11.29194,0,0,0-4.80756,11.28048A370.22031,370.22031,0,0,1,795.92132,454.62325Z" transform="translate(-167.16498 -161.77828)" fill="#e6e6e6"></path><path d="M891.38192,469.005a11.79841,11.79841,0,0,0,5.06679-15.75295,11.5916,11.5916,0,0,0-1.08288-1.739l22.87441-34.68684-21.38255.01435-18.44377,32.937a11.84063,11.84063,0,0,0-1.18191,16.58276,11.52872,11.52872,0,0,0,14.14984,2.64466Z" transform="translate(-167.16498 -161.77828)" fill="#ffb6b6"></path><path d="M884.92132,436.62325l14,18,49-73-4.23791-74.16342a56.0961,56.0961,0,0,0-28.76209-45.83655h0l1,114Z" transform="translate(-167.16498 -161.77828)" fill="#e6e6e6"></path><circle cx="682.57563" cy="44.50177" r="31.33548" fill="#ffb6b6"></circle><path d="M829.77509,187.89a14.80718,14.80718,0,0,1,3.593.47152,51.13867,51.13867,0,0,0,7.03333,1.1794,32.59027,32.59027,0,0,1,29.18165,27.64337c1.82081-1.58751,5.96412-4.50771,9.36014-1.79372h0c.0517.04308.08187.06524.20128.00861,2.2554-1.06983,6.259-14.239,6.38024-25.83425.064-6.15432-.90487-14.01312-5.88225-16.50181l-.26223-.13112-.06894-.285c-.3324-1.38438-4.04789-3.7475-10.50507-5.58678-11.735-3.34247-29.22732-9.85366-39.07744-.27131-.74544,3.23044-3.17061,10.14359-5.62052,10.92719-2.71275.86732-5.05555,1.61583-5.42489,4.94353a101.999,101.999,0,0,0,.0671,14.21933,14.52178,14.52178,0,0,1,5.159-7.24693A10.22518,10.22518,0,0,1,829.77509,187.89Z" transform="translate(-167.16498 -161.77828)" fill="#2f2e41"></path><path d="M1032.835,737.03172a1.18647,1.18647,0,0,1-1.19006,1.19H168.355a1.19,1.19,0,0,1,0-2.38h863.29A1.18651,1.18651,0,0,1,1032.835,737.03172Z" transform="translate(-167.16498 -161.77828)" fill="#ccc"></path><path d="M524.442,262.90072,406.8168,289.36394a12.20139,12.20139,0,0,0-9.215,14.56508l32.25406,143.36459,138.20269-31.09275a6.05643,6.05643,0,0,0,2.99313-1.65173L539.00708,272.11575A12.20141,12.20141,0,0,0,524.442,262.90072Z" transform="translate(-167.16498 -161.77828)" fill="#e6e6e6"></path><path d="M481.71486,282.64153l-64.46158,14.50252a11.11125,11.11125,0,0,0-8.39446,13.26082l30.325,134.79013,122.744-27.61485-22.08437-98.16179A48.695,48.695,0,0,0,481.71486,282.64153Z" transform="translate(-167.16498 -161.77828)" fill="#fff"></path><path d="M538.32333,410.31393l-80.92146,18.20566a2.70338,2.70338,0,1,0,1.18675,5.2749l80.92146-18.20565a2.70339,2.70339,0,1,0-1.18675-5.27491Z" transform="translate(-167.16498 -161.77828)" fill="#e4e4e4"></path><path d="M535.97648,399.88253,455.055,418.08818a2.70614,2.70614,0,0,0,1.188,5.28029l80.92146-18.20565a2.70614,2.70614,0,1,0-1.188-5.28029Z" transform="translate(-167.16498 -161.77828)" fill="#e4e4e4"></path><path d="M487.78753,399.7703l-35.07815,7.89186a2.70337,2.70337,0,1,0,1.18674,5.2749l35.07816-7.89185a2.70339,2.70339,0,1,0-1.18675-5.27491Z" transform="translate(-167.16498 -161.77828)" fill="#e4e4e4"></path><path d="M528.71675,367.61405l-80.92147,18.20566a2.70614,2.70614,0,0,0,1.188,5.28029l80.92146-18.20565a2.70614,2.70614,0,1,0-1.188-5.2803Z" transform="translate(-167.16498 -161.77828)" fill="#e4e4e4"></path><path d="M526.37111,357.188l-80.92147,18.20566a2.70338,2.70338,0,1,0,1.18675,5.2749l80.92146-18.20565a2.70338,2.70338,0,1,0-1.18674-5.27491Z" transform="translate(-167.16498 -161.77828)" fill="#e4e4e4"></path><path d="M478.18094,357.07042l-35.07815,7.89186a2.70614,2.70614,0,0,0,1.188,5.28029l35.07815-7.89186a2.70614,2.70614,0,1,0-1.188-5.28029Z" transform="translate(-167.16498 -161.77828)" fill="#e4e4e4"></path><path d="M519.11016,324.91417l-80.92147,18.20566a2.70614,2.70614,0,0,0,1.188,5.28029l80.92146-18.20565a2.70614,2.70614,0,1,0-1.188-5.2803Z" transform="translate(-167.16498 -161.77828)" fill="#e6e6e6"></path><path d="M516.76452,314.48815l-80.92147,18.20566a2.70614,2.70614,0,0,0,1.188,5.28029l80.92146-18.20565a2.70614,2.70614,0,1,0-1.188-5.2803Z" transform="translate(-167.16498 -161.77828)" fill="#e6e6e6"></path><path d="M468.57435,314.37054,433.4962,322.2624a2.70614,2.70614,0,0,0,1.188,5.28029l35.07815-7.89186a2.70614,2.70614,0,1,0-1.188-5.28029Z" transform="translate(-167.16498 -161.77828)" fill="#e6e6e6"></path><path d="M289.77873,429.24128a2.89533,2.89533,0,0,0-2.89209,2.89209V731.1807a2.89574,2.89574,0,0,0,2.89209,2.89258h374.9458a2.89537,2.89537,0,0,0,2.8916-2.89258V480.13679a2.89534,2.89534,0,0,0-2.8916-2.89258H449.5302a8.76523,8.76523,0,0,1-5.90674-2.28223l-48.37891-43.95752a6.77,6.77,0,0,0-4.5625-1.76318Z" transform="translate(-167.16498 -161.77828)" fill="#3f3d56"></path><path d="M737.24238,351.02466,536.47946,264.71345a22.11557,22.11557,0,0,0-29.0187,11.56928l-105.19833,244.695,235.8847,101.41061a10.97749,10.97749,0,0,0,6.14956.76065l104.515-243.10564A22.11562,22.11562,0,0,0,737.24238,351.02466Z" transform="translate(-167.16498 -161.77828)" fill="#e6e6e6"></path><path d="M653.5401,334.53467,543.51692,287.23394a20.13964,20.13964,0,0,0-26.4269,10.5284L418.18347,527.82247l209.49968,90.06727L699.71249,450.347A88.26188,88.26188,0,0,0,653.5401,334.53467Z" transform="translate(-167.16498 -161.77828)" fill="#fff"></path><path d="M600.77576,582.11364l-138.117-59.3787a4.9,4.9,0,1,0-3.87063,9.00322l138.117,59.3787a4.9,4.9,0,1,0,3.87063-9.00322Z" transform="translate(-167.16498 -161.77828)" fill="#e4e4e4"></path><path d="M608.43014,564.30928l-138.117-59.3787a4.905,4.905,0,0,0-3.87458,9.01242l138.117,59.3787a4.905,4.905,0,1,0,3.87459-9.01242Z" transform="translate(-167.16498 -161.77828)" fill="#e4e4e4"></path><path d="M537.83508,512.87513,477.9636,487.13542a4.9,4.9,0,1,0-3.87063,9.00323l59.87148,25.73971a4.9,4.9,0,1,0,3.87063-9.00323Z" transform="translate(-167.16498 -161.77828)" fill="#e4e4e4"></path><path d="M632.10815,509.23338l-138.117-59.3787a4.905,4.905,0,0,0-3.87459,9.01241l138.117,59.3787a4.905,4.905,0,1,0,3.87458-9.01241Z" transform="translate(-167.16498 -161.77828)" fill="#e4e4e4"></path><path d="M639.75858,491.43822l-138.117-59.3787a4.9,4.9,0,1,0-3.87063,9.00322l138.117,59.3787a4.9,4.9,0,1,0,3.87063-9.00322Z" transform="translate(-167.16498 -161.77828)" fill="#e4e4e4"></path><path d="M569.16748,439.99487,509.296,414.25516a4.905,4.905,0,0,0-3.87458,9.01242l59.87148,25.73971a4.905,4.905,0,1,0,3.87458-9.01242Z" transform="translate(-167.16498 -161.77828)" fill="#e4e4e4"></path><path d="M663.44055,436.35311l-138.117-59.37869a4.905,4.905,0,0,0-3.87458,9.01241l138.117,59.3787a4.905,4.905,0,1,0,3.87458-9.01242Z" transform="translate(-167.16498 -161.77828)" fill="#6c63ff"></path><path d="M671.091,418.558,532.974,359.17926a4.905,4.905,0,0,0-3.87459,9.01241l138.117,59.3787A4.905,4.905,0,1,0,671.091,418.558Z" transform="translate(-167.16498 -161.77828)" fill="#6c63ff"></path><path d="M600.49987,367.11461,540.62839,341.3749a4.905,4.905,0,0,0-3.87458,9.01242L596.62529,376.127a4.905,4.905,0,1,0,3.87458-9.01242Z" transform="translate(-167.16498 -161.77828)" fill="#6c63ff"></path><path d="M451.442,439.90072,333.8168,466.36394a12.20139,12.20139,0,0,0-9.215,14.56508l32.25406,143.36459,138.20269-31.09275a6.05643,6.05643,0,0,0,2.99313-1.65173L466.00708,449.11575A12.20141,12.20141,0,0,0,451.442,439.90072Z" transform="translate(-167.16498 -161.77828)" fill="#e6e6e6"></path><path d="M408.71486,459.64153l-64.46158,14.50252a11.11125,11.11125,0,0,0-8.39446,13.26082l30.325,134.79013,122.74395-27.61485-22.08437-98.16179A48.695,48.695,0,0,0,408.71486,459.64153Z" transform="translate(-167.16498 -161.77828)" fill="#fff"></path><path d="M465.32333,587.31393l-80.92146,18.20566a2.70338,2.70338,0,1,0,1.18675,5.2749l80.92146-18.20565a2.70339,2.70339,0,1,0-1.18675-5.27491Z" transform="translate(-167.16498 -161.77828)" fill="#e4e4e4"></path><path d="M462.97648,576.88253,382.055,595.08818a2.70614,2.70614,0,0,0,1.188,5.28029l80.92146-18.20565a2.70614,2.70614,0,1,0-1.188-5.28029Z" transform="translate(-167.16498 -161.77828)" fill="#e4e4e4"></path><path d="M414.78753,576.7703l-35.07815,7.89186a2.70337,2.70337,0,1,0,1.18674,5.2749l35.07816-7.89185a2.70339,2.70339,0,1,0-1.18675-5.27491Z" transform="translate(-167.16498 -161.77828)" fill="#e4e4e4"></path><path d="M455.71675,544.61405l-80.92147,18.20566a2.70614,2.70614,0,0,0,1.188,5.28029l80.92146-18.20565a2.70614,2.70614,0,1,0-1.188-5.2803Z" transform="translate(-167.16498 -161.77828)" fill="#e4e4e4"></path><path d="M453.37111,534.188l-80.92147,18.20566a2.70338,2.70338,0,1,0,1.18675,5.2749l80.92146-18.20565a2.70338,2.70338,0,1,0-1.18674-5.27491Z" transform="translate(-167.16498 -161.77828)" fill="#e4e4e4"></path><path d="M405.18094,534.07042l-35.07815,7.89186a2.70614,2.70614,0,0,0,1.188,5.28029l35.07815-7.89186a2.70614,2.70614,0,1,0-1.188-5.28029Z" transform="translate(-167.16498 -161.77828)" fill="#e4e4e4"></path><path d="M446.11016,501.91417l-80.92147,18.20566a2.70614,2.70614,0,0,0,1.188,5.28029l80.92146-18.20565a2.70614,2.70614,0,1,0-1.188-5.2803Z" transform="translate(-167.16498 -161.77828)" fill="#e6e6e6"></path><path d="M443.76452,491.48815l-80.92147,18.20566a2.70614,2.70614,0,0,0,1.188,5.28029l80.92146-18.20565a2.70614,2.70614,0,1,0-1.188-5.2803Z" transform="translate(-167.16498 -161.77828)" fill="#e6e6e6"></path><path d="M395.57435,491.37054,360.4962,499.2624a2.70614,2.70614,0,0,0,1.188,5.28029l35.07815-7.89186a2.70614,2.70614,0,1,0-1.188-5.28029Z" transform="translate(-167.16498 -161.77828)" fill="#e6e6e6"></path><path d="M287.29436,507.78715a2.89166,2.89166,0,0,0-2.89222,2.89117c0,.10846.089,222.82666.089,222.82666a2.89026,2.89026,0,0,0,2.874,2.56836H690.13762a2.88958,2.88958,0,0,0,2.874-2.56836L718.082,511.003a2.89272,2.89272,0,0,0-.71679-2.251,2.85868,2.85868,0,0,0-2.15625-.96484Z" transform="translate(-167.16498 -161.77828)" fill="#3f3d56"></path><path d="M315.71659,520.11725a15.55483,15.55483,0,0,0-15.50879,15.374l.50293,172.60742A15.50883,15.50883,0,0,0,316.22,723.74322H571.89725A119.17426,119.17426,0,0,0,690.41043,617.83307l9.0669-80.46973a15.50838,15.50838,0,0,0-15.41162-17.24609Zm391.811,0-.0459-1h.0459Z" transform="translate(-167.16498 -161.77828)" fill="#6c63ff"></path><path d="M427.39952,649.43435H328.3533a3.85894,3.85894,0,1,1,0-7.71789h99.04622C432.37608,641.647,432.42585,649.50444,427.39952,649.43435Z" transform="translate(-167.16498 -161.77828)" fill="#e4e4e4"></path><path d="M560.8259,669.62041H328.3533a3.85894,3.85894,0,1,1,0-7.71789H560.8259C565.80245,661.83306,565.85223,669.6905,560.8259,669.62041Z" transform="translate(-167.16498 -161.77828)" fill="#e4e4e4"></path></svg>
                        <h2 class="text-lg font-semibold text-gray-600">Pickup Documents</h2>
                        <p class="text-sm text-gray-600">Illustration Description 4</p>
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