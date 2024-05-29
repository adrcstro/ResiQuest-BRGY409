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
    echo '<div class="flex justify-center mb-4 flex-col">';
    echo '<img src="../Backend/uploads/' . $row["NewsImages"] . '" alt="News Image" class="w-80 h-80 object-contain border-2 border-gray-400 rounded-md p-2">';
        // Display the news details
        echo '<div class="text-center">';
        echo '<h2 class="text-2xl font-bold mb-2">' . $row["NewsTittle"] . '</h2>';
        echo '<p class="text-gray-500 mb-2"><span class="font-semibold">Date:</span> ' . $row["NewsDate"] . '</p>';
        echo '<p class="text-gray-500 mb-2"><span class="font-semibold">Time:</span> ' . $row["Newstime"] . '</p>';
        echo '<p class="text-gray-500 mb-4"><span class="font-semibold">Content:</span> ' . $row["NewsContent"] . '</p>';
        echo '</div>';
    echo '</div>';


} else {
    // Return an error message if no news found
    echo json_encode(["error" => "No news found"]);
}

// Close the database connection
mysqli_close($conn);
?>
