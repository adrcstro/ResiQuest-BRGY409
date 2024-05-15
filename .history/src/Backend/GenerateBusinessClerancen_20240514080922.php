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
$brgyname = "Barangay 409";
$Zonenumname = "ZONE, 42 District IV";
$fulladdress = "Barangay Hall, 254 Sta, Teresita Fronting Lardizabal, Sampaloc, Manila";
$tel = "Tel. No. 733-1499";
$officeofbrgy = "OFFICE OF THE PUNONG BARANGAY";
$serviceType = "BARANGAY BUSINESS CLEARANCE";
$nameofbrgycharman = "BRENDA S. PUERTOLLANO";
$psotiontitle = "Punong Barangay";
$notvalid = "(Not Valid without Barangay Official seal)";
$businesstrad = "(Business or Trade Activity)";
$loc = "(Location)";
$operatormaneger = "(Operator/Manager)";
$address = "(Address)";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

class PDF extends TCPDF {
    private $organizationName;
    private $organizationAddress;
    private $brgyname;
    private $Zonenumname;
    private $fulladdress;
    private $officeofbrgy;
    private $serviceType;
    private $tel;
    private $nameofbrgycharman;
    private $psotiontitle;
    private $businesstrad;
    private $loc;
    private $operatormaneger;
    private $address;
    private $notvalid;

    // Constructor to set organization details
    public function __construct($organizationName, $organizationAddress, $brgyname, $Zonenumname, $fulladdress, $officeofbrgy, $serviceType, $tel, $nameofbrgycharman, $psotiontitle, $notvalid, $businesstrad, $loc, $operatormaneger, $address) {
        parent::__construct();
        $this->organizationName = $organizationName;
        $this->organizationAddress = $organizationAddress;
        $this->brgyname = $brgyname;
        $this->Zonenumname = $Zonenumname;
        $this->fulladdress = $fulladdress;
        $this->officeofbrgy = $officeofbrgy;
        $this->serviceType = $serviceType;
        $this->tel = $tel;
        $this->nameofbrgycharman = $nameofbrgycharman;
        $this->psotiontitle = $psotiontitle;
        $this->notvalid = $notvalid;
        $this->businesstrad = $businesstrad;
        $this->loc = $loc;
        $this->operatormaneger = $operatormaneger;
        $this->address = $address;
    }

    // Page header
    public function Header() {
        // Set font
        $this->SetFont('times', 'B', 12);

        // Watermark image path

        // Adjust the position and size of the white background rectangle
        $whiteBgX = 30;
        $whiteBgY = 50;
        $whiteBgWidth = 150;
        $whiteBgHeight = 150;

        // Set transparency for the white background
        $this->SetAlpha(0.5);

        // White background for the watermark (RGB: 255, 255, 255)
        $this->SetFillColor(255, 255, 255);
        $this->Rect($whiteBgX, $whiteBgY, $whiteBgWidth, $whiteBgHeight, 'F');

        // Reset alpha to default
        $this->SetAlpha(1);

        // Set font
        $this->SetFont('times', '', 12);

        // Logo
        $logoPath = '../../Images/manilalogocert.jpg'; // Adjust the path based on your project structure
        $this->Image($logoPath, 170, 7, 26); 
        $logoPath = '../../Images/barangaycetrlogo.jpg'; // Adjust the path based on your project structure
        $this->Image($logoPath, 15, 8, 23); // Adjust the coordinates and size as needed
        $this->Ln(5);
        // Organization details
        $this->Cell(0, 10, $this->organizationName, 0, 9, 'C');
        $this->Ln(-5); // Adjust the line spacing as needed
        $this->Cell(0, 10, $this->organizationAddress, 0, 9, 'C');
        $this->Ln(-5); // Adjust the line spacing as needed
        $this->Cell(0, 10, $this->brgyname, 0, 9, 'C');
        $this->Ln(-5); // Adjust the line spacing as needed
        $this->Cell(0, 10, $this->Zonenumname, 0, 9, 'C');
        $this->Ln(-5); // Adjust the line spacing as needed
        $this->Cell(0, 10, $this->fulladdress, 0, 9, 'C');
        $this->Ln(-5); // Adjust the line spacing as needed
        $this->Cell(0, 10, $this->tel, 0, 9, 'C');
        $this->Ln(-5); // Adjust the line spacing as needed
        $this->Ln(3); // Adjust the line spacing as needed
        $this->SetFont('times', 'B', 14); // Set font to bold and size 14
        $this->Cell(0, 10, $this->officeofbrgy, 0, 9, 'C');
        $this->Ln(1);
        $this->SetTextColor(0, 0, 0);
        $this->Ln(1);
        $this->SetFont('times', 'B', 15); // Set font to bold and size 14
        $text = $this->serviceType; // Your text
        $spacing = 1; // Small spacing between characters (in user units)
        $charWidth = 3; // Character width (adjust as needed)
        $startX = $this->GetX(); // Initial X position

        // Output each character with spacing
        $text = $this->serviceType; // Your text
        $spacing = 1; // Small spacing between characters (in user units)
        $charWidth = 3; // Character width (adjust as needed)

        // Calculate total width of the text
        $totalWidth = strlen($text) * $charWidth + (strlen($text) - 1) * $spacing;

        // Calculate starting X position to center the text
        $startX = ($this->GetPageWidth() - $totalWidth) / 2;

        $this->SetX($startX); // Set initial X position

        // Output each character with spacing
        for ($i = 0; $i < strlen($text); $i++) {
            $char = $text[$i];
            $this->Cell($charWidth, 10, $char, 0, 0, 'C');
            if ($i < strlen($text) - 1) {
                $this->SetX($this->GetX() + $spacing); // Move X position for spacing
            }
        }

        $this->SetTextColor(0, 0, 0); // Black color

        $this->Ln(20); // Adjust the line spacing as needed

        $this->SetMargins(30, 25, 30);
        $this->Ln(120); // Adjust the line spacing as needed
        $this->SetFont('times', 'B', 12); // Set font to bold and size 14
        $this->Cell(0, 10, $this->nameofbrgycharman, 0, 9, 'R');
        $this->Ln(-5);
        $this->SetFont('times', 'B', 10); // Set font to bold and size 14
        $this->SetX(125); // Set X coordinate to 30 (adjust as needed)
        $this->Cell(0, 10, $this->psotiontitle, 0, 10, 'C');

        $this->Ln(-5); // Adjust the line spacing as needed

        $this->SetY(-90); 
        $this->Ln(2);
        $this->SetFont('times', 'B', 10); // Set font to bold and size 14
        $this->SetX(30); // Set X coordinate to 30 (adjust as needed)
        $this->Cell(0, 10, $this->notvalid, 0, 10, 'C');
    }

    // Page footer
    public function Footer() {
        // Add your footer content if needed
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $searchID = $_POST["RequestIDprint"];

    // SQL query to retrieve the data for the given RequestID
    $sql = "SELECT RequestID, ServiceType, DateRequested, FirstName, Middlename, Lastname, Address, BusinessAct, BusinessLoc FROM requestdocument WHERE RequestID = '$searchID' AND (ServiceType = 'Business Clearance')";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Create a new PDF document with custom header
        $pdf = new PDF($organizationName, $organizationAddress, $brgyname, $Zonenumname, $fulladdress, $officeofbrgy, $serviceType, $tel, $nameofbrgycharman, $psotiontitle, $notvalid, $businesstrad, $loc, $operatormaneger, $address);
        $pdf->AddPage();
        $pdf->SetMargins(30, 25, 30);
        $pdf->SetFont('times', '', 12);

        while ($row = $result->fetch_assoc()) {
            $pdf->SetY(80);
            $pdf->setCellHeightRatio(1.7);

            $letterContent = "TO WHOM IT MAY CONCERN\n\n";
            $letterContent .= "This is to Certify that the Business or trade activity described below:\n";

            // MultiCell for left-aligned content
            $pdf->MultiCell(0, 12, $letterContent, 0, 'J');

            // Center the BusinessAct text
            $pdf->SetFont('times', 'B', 12);
            $pdf->SetX(($pdf->GetPageWidth() - $pdf->GetStringWidth($row['BusinessAct'])) / 2);
            $pdf->Cell(0, 12, $row['BusinessAct'], 0, 1, 'C');

            // Center the BusinessLoc text
            $pdf->SetFont('times', 'B', 12);
            $pdf->SetX(($pdf->GetPageWidth() - $pdf->GetStringWidth($row['BusinessLoc'])) / 2);
            $pdf->Cell(0, 12, $row['BusinessLoc'], 0, 1, 'C');

            // Add the remaining letter content
            $letterContent = "\n\n\nI hereby certify further, that the name is known to me to be a person of good moral character and has no derogatory record whatsoever filed against him/her in his office.\n\n";
            $letterContent .= "This Certification is being issued upon the request of the interested party for\n";
            $letterContent .= "Given This________day of ____________________,___________\n";

            // MultiCell for the remaining left-aligned content
            $pdf->MultiCell(0, 12, $letterContent, 0, 'J');
        }

        // Output the PDF
        $pdf->Output();
    } else {
        echo "No records found for the given Request ID.";
    }
}

// Close the database connection
$conn->close();
?>
