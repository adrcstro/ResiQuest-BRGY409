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
$fulladdress= "Barangay Hall, 254 Sta, Teresita Fronting Lardizabal, Sampaloc, Manila";
$tel ="Tel. No. 733-1499";
$officeofbrgy = "OFFICE OF THE PUNONG BARANGAY";
$serviceType = "BARANGAY BUSINESS CLEARANCE";
$nameofbrgycharman = "BRENDA S. PUERTOLLANO";
$psotiontitle = "Punong Barangay";
$notvalid="(Not Valid whithout Barangay Official seal)";
$businesstrad="(Business or Trade Activity)";
$loc="(Business Location)";
$operatormaneger="(Operator/Maneger)";
$address="(Address)";
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
    private $serviceType ;
    private $tel;
    private $nameofbrgycharman;
    private $psotiontitle;

    private $businesstrad;
    private $loc;
    private $operatormaneger;
    private $address;

  

    private $notvalid;

    // Constructor to set organization details
    public function __construct($organizationName, $organizationAddress, $brgyname, $Zonenumname, $fulladdress , $officeofbrgy, $serviceType,$tel, $nameofbrgycharman, $psotiontitle, $notvalid,
    $businesstrad,$loc,$operatormaneger,$address)
    
    {
        parent::__construct();
        $this->organizationName = $organizationName;
        $this->organizationAddress = $organizationAddress;
        $this->brgyname = $brgyname;
        $this->Zonenumname = $Zonenumname;
        $this->fulladdress = $fulladdress;
        $this->officeofbrgy = $officeofbrgy;
        $this->serviceType  = $serviceType ;
        $this->tel = $tel;
        $this->nameofbrgycharman  = $nameofbrgycharman;
        $this->psotiontitle  = $psotiontitle;
        $this->notvalid  =  $notvalid;

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
        
        // Whiter background for the watermark (RGB: 255, 255, 255)
        $this->SetFillColor(255, 255, 255);
        $this->Rect($whiteBgX, $whiteBgY, $whiteBgWidth, $whiteBgHeight, 'F');
        
        // Reset alpha to default
        $this->SetAlpha(1);
        
        // Set font
        $this->SetFont('times', '', 12);

        // Logo
        $logoPath = '../../Images/manilalogocert.jpg'; // Adjust the path based on your project structure
        $this->Image($logoPath,170, 7, 26); 
        $logoPath = '../../Images/barangaycetrlogo.jpg'; // Adjust the path based on your project structure
        $this->Image($logoPath, 15, 8, 23);// Adjust the coordinates and size as needed
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


    
        $this->Ln(-5);
        $this->SetFont('times', 'B', 10); // Set font to bold and size 14
        $this->SetY(101);
        $this->SetX(10); // Set X coordinate to 30 (adjust as needed)
        $this->Cell(0, 10, $this->businesstrad, 0, 10, 'C');
        

        $this->Ln(-5);
        $this->SetFont('times', 'B', 10); // Set font to bold and size 14
        $this->SetY(113);
        $this->SetX(10); // Set X coordinate to 30 (adjust as needed)
        $this->Cell(0, 10, $this->loc, 0, 10, 'C');
        
        $this->Ln(-5);
        $this->SetFont('times', 'B', 10); // Set font to bold and size 14
        $this->SetY(125);
        $this->SetX(10); // Set X coordinate to 30 (adjust as needed)
        $this->Cell(0, 10, $this->operatormaneger, 0, 10, 'C');

        $this->Ln(-5);
        $this->SetFont('times', 'B', 10); // Set font to bold and size 14
        $this->SetY(137);
        $this->SetX(10); // Set X coordinate to 30 (adjust as needed)
        $this->Cell(0, 10, $this->address, 0, 10, 'C');



        $this->SetTextColor(0, 0, 0); // Black color


        $this->SetX(90);
        $this->Ln(-70); // Adjust the line spacing as needed

        $this->SetMargins(30, 25, 30);
     
        $this->Ln(180); // Adjust the line spacing as needed
        $this->SetFont('times', 'B', 12); // Set font to bold and size 14
        
        $this->Cell(0, 10, $this->nameofbrgycharman, 0, 9, 'R');
        $this->Ln(-5);
        $this->SetFont('times', 'B', 10); // Set font to bold and size 14
        $this->SetX(125); // Set X coordinate to 30 (adjust as needed)
        $this->Cell(0, 10, $this->psotiontitle, 0, 10, 'C');

    

        $this->Ln(-5); // Adjust the line spacing as needed
      

        $this->Ln(2);
        $this->SetFont('times', 'B', 10); // Set font to bold and size 14
        $this->SetX(30); // Set X coordinate to 30 (adjust as needed)
        $this->Cell(0, 10, $this->notvalid, 0, 10, 'L');
     
$this->Line(50, 103, 163, 103);
$this->Line(50, 115, 163, 115);
$this->Line(50, 127, 163, 127);
$this->Line(50, 139, 163, 139);
$this->SetLineWidth(1);
$this->Line(10, 48, 200, 48);










    }
    
    
    // Page footer
    public function Footer() {
        // Position at 1.5 cm from bottom
      
}
}
    
    

 // Adjust the line spacing as needed
 // Adjust the line spacing as needed
  
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle the search form submission
    $searchID = $_POST["RequestIDprint"];

    // Fetch data from the database based on the search ID
    $sql = "SELECT RequestID, ServiceType, DateRequested, FirstName, Middlename, Lastname, Address,	BusinessAct,BusinessLoc  FROM requestdocument WHERE RequestID = '$searchID' AND (ServiceType = 'Business Clearance')";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Create PDF instance with organization details
        $pdf = new PDF($organizationName, $organizationAddress ,$brgyname, $Zonenumname, $fulladdress, $officeofbrgy, $serviceType,$tel, $nameofbrgycharman, $psotiontitle,$notvalid,$businesstrad,$loc,$operatormaneger,$address);
      
$pdf->AddPage();

// Set margins (left, top, right)
$pdf->SetMargins(30, 25, 30);

// Set font
$pdf->SetFont('times', '', 12);

while ($row = $result->fetch_assoc()) {

$pdf->SetY(80); // Adjust this value as needed for more space
$pdf->setCellHeightRatio(1.7);

$letterContent = str_pad("", 120, " ", STR_PAD_RIGHT) . "\n\n"; // Increased spacing for "BLOTTER REPORT"
$dateOfReport = "TO WHOM IT MAY CONCERN";

$noText = "Date          .______________________";
$pdf->SetY(60); // Adjust the Y position as needed
$pdf->SetX($pdf->GetPageWidth() - 50); // Position from right
$pdf->Cell(0, 10, $noText, 0, 1, 'R');

$contrlno = "Control No.______________________";
$pdf->SetY(65); // Adjust the Y position as needed
$pdf->SetX($pdf->GetPageWidth() - 50); // Position from right
$pdf->Cell(0, 10, $contrlno, 0, 1, 'R');



$pdf->SetY(58); 
$letterContent .= str_pad($dateOfReport, 150, " ", STR_PAD_RIGHT) . "\n"; // Increased spacing for the date
$letterContent .= "                This is to Certify that the Business or trade activity described below:\n";

$pdf->MultiCell(0, 12, $letterContent, 0, 'J');

// Center the BusinessAct text
$pdf->SetFont('times',  12);
$pdf->SetX(($pdf->GetPageWidth() - $pdf->GetStringWidth($row['BusinessAct'])) / 2);
$pdf->Cell(0, 12, $row['BusinessAct'], 0, 1, 'L');

// Center the BusinessLoc text
$pdf->SetFont('times',  12);
$pdf->SetX(($pdf->GetPageWidth() - $pdf->GetStringWidth($row['BusinessLoc'])) / 2);
$pdf->Cell(0, 12, $row['BusinessLoc'], 0, 1, 'L');


$fullName = $row['FirstName'] . ' ' . $row['Middlename'] . ' ' . $row['Lastname'];

// Center and display the concatenated full name
$pdf->SetFont('times', 12);
$pdf->SetX(($pdf->GetPageWidth() - $pdf->GetStringWidth($fullName)) / 2);
$pdf->Cell(0, 12, $fullName, 0, 1, 'L');

$pdf->SetFont('times',  12);
$pdf->SetX(($pdf->GetPageWidth() - $pdf->GetStringWidth($row['Address'])) / 2);
$pdf->Cell(0, 12, $row['Address'], 0, 1, 'L');



// Add a paragraph of text below the address
$pdf->SetFont('times', '', 12); // Set font to regular Times, size 12
$paragraphText = "being applied for the NEW / RENEWAL of the corresponding Mayor's Permit has been found to be:
________/ Complying with the provitions of existing Barangay ordinances, rules and regualtions being enforced in this barangay:   
________/ Partially complying with the provision of existing Barangay ordinances rules and regulation being enforced in this barangay: 
             In view of the foregoing, this Barnagay thru the undersign ---
________/ Interposes NO objection for the issuance of the corresponding Mayor's Permit being applied for:        
________/ Recommend only the issuance of TEMPORARY PERMIT for not more than (3) months and within the period of the requirments under existing barangayordinances,rules and regulation on that matter should be totally compiled with otherwise this barangay
would take the necessary action,within legal bounds, to stop its continued operation";
// Adjust the positioning for the paragraph
$pdf->SetX(30); // Set the X coordinate to 30 (adjust as needed)
$pdf->SetY($pdf->GetY() + 10); // Move down 10 units for spacing

// Output the paragraph text
$pdf->MultiCell(0, 10, $paragraphText, 0, 'J');



    

    // Adjust the spacing after the content
    $pdf->SetY($pdf->GetY() + 10); // Increase the value (10) for more spacing
}

        
        
        // Output the PDF to the browser
        $pdf->Output();
    } else {
        echo "No records found for the given Request ID.";
    }
}




$conn->close();
?>
