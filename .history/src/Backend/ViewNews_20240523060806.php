<?php
require 'Connection.php';
 
// Get the news ID from the request
$newsId = $_GET['request_id'];

// Prepare and execute the SQL query to fetch news details
$query = "SELECT * FROM newsandevents WHERE NewsID = '$newsId'";
$result = mysqli_query($conn, $query);

// Check if there is a row returned
if (mysqli_num_rows($result) > 0) {
    // Fetch the news details
    $row = mysqli_fetch_assoc($result);

    // Display the picture centered
  


    echo '<div class="mt-4 px-4 py-3 sm:px-6 md:px-8 lg:px-10 flex flex-col md:flex-row gap-4">
    <!-- Left side inputs -->
    <div class="flex-1 flex flex-col justify-between">
        <div class="flex flex-col items-center justify-center w-full h-full">
            <div class="text-lg font-bold text-center">
                <h2>News Thumbnails</h2>
                <p class="text-xs text-gray-500 dark:text-gray-400 mb-2">SVG, PNG, JPG, or GIF (MAX. 800x400px)</p>
            </div>
            <div class="flex flex-col items-center justify-center w-full h-full p-2 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-gray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500">
                <img src="../Backend/uploads/' . $row["NewsImages"] . '" alt="News Image" class="w-80 h-80 object-contain bg-contain border-2 border-gray-400 rounded-md p-2">
            </div>
        </div>
    </div>
    <!-- Right side input -->
    <div class="flex-1 flex flex-col justify-between">
        <div>
            <span class="block text-sm font-semibold leading-6 text-gray-900">News Title</span>
            <input type="text" name="NewsTitle" placeholder="Enter News Title" class="input input-bordered focus:outline-none focus:ring-1 focus:border-blue-500 input-white w-full bg-white text-slate-900" required />
        </div>
        <div class="mt-3 flex flex-col sm:flex-row gap-x-6">
            <div class="sm:flex-1">
                <label for="NewsDate" class="block text-sm font-semibold leading-6 text-gray-900">News Date</label>
                <div>
                    <input required type="date" name="NewsDate" id="NewsDate" autocomplete="Address" placeholder="Enter Address" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 flex-1">
                </div>
            </div>
            <div class="sm:flex-1">
                <label for="NewsTime" class="block text-sm font-semibold leading-6 text-gray-900">News Time</label>
                <div>
                    <input required type="time" name="NewsTime" id="NewsTime" autocomplete="Zip-Code" placeholder="Enter City Zip Code Ex. 1008" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 flex-1">
                </div>
            </div>
        </div>
        <div class="mt-3">
            <span class="block text-sm font-semibold leading-6 text-gray-900">News Content</span>
            <textarea name="NewsContent" rows="6" class="rounded-lg border-gray-200 w-full h-64 pt-2 text-gray-900 border-1 bg-white input input-bordered focus:outline-none focus:ring-1 focus:border-blue-500 resize-none" placeholder="Enter News Content....." required></textarea>
        </div>
    </div>
    </div>';
    





















    
} else {
    // Return an error message if no news found
    echo json_encode(["error" => "No news found"]);
}

// Close the database connection
mysqli_close($conn);
?>
