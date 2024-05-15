<?php
require_once('../tcpdf.php');

// Get the RequestID from the AJAX request
$servername = "localhost"; // Replace with your server name
$username = "root"; // Replace with your username
$password = ""; // Replace with your password
$dbname = "brgy409drms"; 
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Database connection error" . mysqli_connect_error());
}
$requestID = $_POST['requestID'];
$query = "SELECT * FROM requestdocument WHERE RequestID = $requestID";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$serviceType = $row['ServiceType'];

// Create a new TCPDF instance
$pdf = new TCPDF();

// Set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Your Name');
$pdf->SetTitle('Request Document');
$pdf->SetSubject('Request Document');
$pdf->SetKeywords('TCPDF, PDF, request, document');

// Add a page
$pdf->AddPage();

// Set font
$pdf->SetFont('helvetica', '', 10);

// Check ServiceType and fetch data accordingly
if ($serviceType == "Certificate of Residency" || $serviceType == "Certificate of Indigency") {
    // Fetch columns: RequestID, ServiceType, DateRequested, FirstName, Middlename, Lastname, Address, Purpose
    $data = array(
        'RequestID' => $row['RequestID'],
        'ServiceType' => $row['ServiceType'],
        'DateRequested' => $row['DateRequested'],
        'FirstName' => $row['FirstName'],
        'Middlename' => $row['Middlename'],
        'Lastname' => $row['Lastname'],
        'Address' => $row['Address'],
        'Purpose' => $row['Purpose']
    );
    // Add data to PDF
    foreach ($data as $key => $value) {
        $pdf->Cell(40, 10, $key . ': ' . $value, 0, 1);
    }
} elseif ($serviceType == "Business Clearance") {
    // Fetch columns: RequestID, ServiceType, DateRequested, FirstName, Middlename, Lastname, Address, BusinessAct, BusinessLoc
    $data = array(
        'RequestID' => $row['RequestID'],
        'ServiceType' => $row['ServiceType'],
        'DateRequested' => $row['DateRequested'],
        'FirstName' => $row['FirstName'],
        'Middlename' => $row['Middlename'],
        'Lastname' => $row['Lastname'],
        'Address' => $row['Address'],
        'BusinessAct' => $row['BusinessAct'],
        'BusinessLoc' => $row['BusinessLoc']
    );
    // Add data to PDF
    foreach ($data as $key => $value) {
        $pdf->Cell(40, 10, $key . ': ' . $value, 0, 1);
    }
} elseif ($serviceType == "Barangay Identification") {
    // Fetch columns: RequestID, ServiceType, DateRequested, FirstName, Middlename, Lastname, Address, DateofBirth, PlaceofBirth, Contactname, Contactaddress, Contactnum
    $data = array(
        'RequestID' => $row['RequestID'],
        'ServiceType' => $row['ServiceType'],
        'DateRequested' => $row['DateRequested'],
        'FirstName' => $row['FirstName'],
        'Middlename' => $row['Middlename'],
        'Lastname' => $row['Lastname'],
        'Address' => $row['Address'],
        'DateofBirth' => $row['DateofBirth'],
        'PlaceofBirth' => $row['PlaceofBirth'],
        'Contactname' => $row['Contactname'],
        'Contactaddress' => $row['Contactaddress'],
        'Contactnum' => $row['Contactnum']
    );
    // Add data to PDF
    foreach ($data as $key => $value) {
        $pdf->Cell(40, 10, $key . ': ' . $value, 0, 1);
    }
}

// Close and output PDF
$pdf->Output('RequestDocument.pdf', 'I'); // I: send the file inline to the browser

// Close the database connection
mysqli_close($conn);
?>
