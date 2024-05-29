<?php
// generate_pdf.php

// Include the TCPDF library
require_once('../../tcpdf.php');


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
function generatePDF($requestID, $serviceType)
{
    // Create new PDF instance
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

    // Set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Your Name');
    $pdf->SetTitle('Document Title');
    $pdf->SetSubject('Document Subject');
    $pdf->SetKeywords('TCPDF, PDF, example, test, guide');

    // Set default font subsetting mode
    $pdf->setFontSubsetting(true);

    // Set font
    $pdf->SetFont('helvetica', '', 12);

    // Add a page
    $pdf->AddPage();

    // Fetch data based on ServiceType
    switch ($serviceType) {
        case 'Certificate of Residency':
        case 'Certificate of Indigency':
            $columns = ['RequestID', 'ServiceType', 'DateRequested', 'FirstName', 'Middlename', 'Lastname', 'Address', 'Purpose'];
            break;
        case 'Business Clearance':
            $columns = ['RequestID', 'ServiceType', 'DateRequested', 'FirstName', 'Middlename', 'Lastname', 'Address', 'BusinessAct', 'BusinessLoc'];
            break;
        case 'Barangay Identification':
            $columns = ['RequestID', 'ServiceType', 'DateRequested', 'FirstName', 'Middlename', 'Lastname', 'Address', 'DateofBirth', 'PlaceofBirth', 'Contactname', 'Contactaddress', 'Contactnum'];
            break;
        default:
            $columns = [];
    }

    // Fetch data from database or any other source
    $data = fetchDataFromDatabase($requestID, $columns);

    // Generate PDF content
    $content = '<h1>' . $serviceType . '</h1>';
    $content .= '<table border="1">';
    foreach ($data as $row) {
        $content .= '<tr>';
        foreach ($columns as $column) {
            $content .= '<td>' . $row[$column] . '</td>';
        }
        $content .= '</tr>';
    }
    $content .= '</table>';

    // Output PDF
    $pdf->writeHTML($content, true, false, true, false, '');

    // Close and output PDF document
    $pdf->Output('document.pdf', 'I');
}

// Dummy function to fetch data (replace with actual implementation)
function fetchDataFromDatabase($requestID, $columns)
{
    // Dummy data, replace with actual database query
    $data = [
        ['RequestID' => '1', 'ServiceType' => 'Certificate of Residency', 'DateRequested' => '2024-05-12', 'FirstName' => 'John', 'Middlename' => 'Doe', 'Lastname' => 'Smith', 'Address' => '123 Main St', 'Purpose' => 'Some purpose'],
        ['RequestID' => '2', 'ServiceType' => 'Certificate of Indigency', 'DateRequested' => '2024-05-13', 'FirstName' => 'Jane', 'Middlename' => 'Doe', 'Lastname' => 'Smith', 'Address' => '456 Elm St', 'Purpose' => 'Another purpose'],
    ];

    return $data;
}

// Check if request ID and service type are provided
if (isset($_POST['requestID'], $_POST['serviceType'])) {
    $requestID = $_POST['requestID'];
    $serviceType = $_POST['serviceType'];
    generatePDF($requestID, $serviceType);
} else {
    echo 'Error: Request ID or Service Type not provided.';
}
?>