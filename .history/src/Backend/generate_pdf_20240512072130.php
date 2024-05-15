<?php
// generate_pdf.php

// Include the TCPDF library
require_once('../../tcpdf.php');






// Your database connection details
$servername = "localhost"; // Replace with your server name
$username = "root"; // Replace with your username
$password = ""; // Replace with your password
$dbname = "brgy409drms";
// Organization details
$organizationName = "Republic of the Philippines";
$organizationAddress = "City of Manila";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

class PDF extends TCPDF {
    private $organizationName;
    private $organizationAddress;

    // Constructor to set organization details
    public function __construct($organizationName, $organizationAddress) {
        parent::__construct();
        $this->organizationName = $organizationName;
        $this->organizationAddress = $organizationAddress;
    }

    // Page header
    public function Header() {
        // Set font
        $this->SetFont('times', 'B', 12);
        

        // Watermark image path
        $watermarkPath = '../images/lettericon.jpg';

        // Position and size of the watermark image
        $this->Image($watermarkPath, 30, 50, 150, 150, '', '', '', false, 300, '', false, false, 0, 'Multiply');
        
        // Add blurred effect to the watermark
        $this->SetAlpha(0.3); // You can adjust the transparency level (0.0 to 1.0)
        $this->Image($watermarkPath, 30, 50, 150, 150, '', '', '', false, 300, '', false, false, 0, 'Multiply');
        $this->SetAlpha(1); // Reset transparency to normal
        
        
        
        // Adjust the position and size of the white background rectangle
        $whiteBgX = 30;
        $whiteBgY = 50;
        $whiteBgWidth = 150;
        $whiteBgHeight = 150;
        
        // Set transparency for the white background
        $this->SetAlpha(0.5);
        
        // Whiter background for the watermark (RGB: 255, 255, 255)
        $this->SetFillColor(255, 255, 255);
        $this->Rect($whiteBgX, $whiteBgY, $whiteBgWidth, $whiteBgHeight, 'F');
        
        // Reset alpha to default
        $this->SetAlpha(1);
        
        // Set font
        $this->SetFont('times', '', 12);
        
        


        // Logo
        $logoPath = '../Images/lettericon.jpg'; // Adjust the path based on your project structure
        $this->Image($logoPath,140, 7, 26); 
        $logoPath = '../Images/logomanila.jpg'; // Adjust the path based on your project structure
        $this->Image($logoPath, 45, 8, 23);// Adjust the coordinates and size as needed
        $this->Ln(9);
        // Organization details
        $this->Cell(0, 10, $this->organizationName, 0, 1, 'C');
        $this->Ln(-3); // Adjust the line spacing as needed
        $this->Cell(0, 10, $this->organizationAddress, 0, 1, 'C');
        $this->Ln(-3); // Adjust the line spacing as needed
    
        // Title
        $this->Cell(0, 10, 'Barangay-409 Sampaloc Manila', 0, 1, 'C');
        $this->Line(10, 35, 200, 35);



       



    }
    
    
    // Page footer
    public function Footer() {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);

        // Set font
        $this->SetFont('times', 'I', 8);

        // Page number
        $this->Cell(0, 10, 'Page ' . $this->getAliasNumPage() . ' / ' . $this->getAliasNbPages(), 0, 0, 'C');
    }







    
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle the search form submission
    $searchID = $_POST["RequestIDprint"];

    // Fetch data from the database based on the search ID
    $sql = "SELECT * FROM requestdocument WHERE RequestID = '$searchID'";
    
    // Determine the ServiceType from the request
    $serviceType = $_POST["ServiceType"];
    if ($serviceType == "Certificate of Residency" || $serviceType == "Certificate of Indigency") {
        // Adjust the SQL query for Certificate of Residency and Certificate of Indigency
        $sql = "SELECT RequestID, ServiceType, DateRequested, FirstName, Middlename, Lastname, Address, Purpose FROM requestdocument WHERE RequestID = '$searchID'";
    } elseif ($serviceType == "Business Clearance") {
        // Adjust the SQL query for Business Clearance
        $sql = "SELECT RequestID, ServiceType, DateRequested, FirstName, Middlename, Lastname, Address, BusinessAct, BusinessLoc FROM requestdocument WHERE RequestID = '$searchID'";
    } elseif ($serviceType == "Barangay Identification") {
        // Adjust the SQL query for Barangay Identification
        $sql = "SELECT RequestID, ServiceType, DateRequested, FirstName, Middlename, Lastname, Address, DateofBirth, PlaceofBirth, Contactname, Contactaddress, Contactnum FROM requestdocument WHERE RequestID = '$searchID'";
    }

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Create PDF instance with organization details
        $pdf = new PDF($organizationName, $organizationAddress);

        // Add a page
        $pdf->AddPage();

        // Set font
        $pdf->SetFont('times', '', 12);

        while ($row = $result->fetch_assoc()) {
            // Append fetched data to the existing $letterContent
            $letterContent .= "Additional Details based on ServiceType:\n";
            foreach ($row as $key => $value) {
                $letterContent .= "$key: $value\n";
            }

            // Output the letter content to the PDF
            $pdf->MultiCell(0, 12, $letterContent);
        }

        // Output the PDF to the browser
        $pdf->Output();
    } else {
        echo "No records found for the given Request ID.";
    }
}


$conn->close();
?>
