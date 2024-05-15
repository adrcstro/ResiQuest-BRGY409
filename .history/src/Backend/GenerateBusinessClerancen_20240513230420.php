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


  

    private $notvalid;

    // Constructor to set organization details
    public function __construct($organizationName, $organizationAddress, $brgyname, $Zonenumname, $fulladdress , $officeofbrgy, $serviceType,$tel, $nameofbrgycharman, $psotiontitle, $notvalid)
    
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
        $this->Cell(0, 10, $this->notvalid, 0, 10, 'L');










        $this->SetY(90); 
        $this->Line(50, 105, 130, 105);

     
        // Title
     
   // Set line thickness to 0.5 mm
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
    $sql = "SELECT RequestID, ServiceType, DateRequested, FirstName, Middlename, Lastname, Address, Purpose FROM requestdocument WHERE RequestID = '$searchID' AND (ServiceType = 'Business Clearance')";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Create PDF instance with organization details
        $pdf = new PDF($organizationName, $organizationAddress ,$brgyname, $Zonenumname, $fulladdress, $officeofbrgy, $serviceType,$tel, $nameofbrgycharman, $psotiontitle,$notvalid);
      
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



$pdf->SetY(60); 
$letterContent .= str_pad($dateOfReport, 150, " ", STR_PAD_RIGHT) . "\n"; // Increased spacing for the date
$letterContent .= "                This is to Certify that the Business or trade activity described below:\n";
$letterContent .= "                                               " . $row['Lastname'] . ", " . $row['FirstName'] . "  " . $row['Middlename'] . "\n\n";


$letterContent .= "            I hereby certify further, that the name is knownto me to be a person of good moral character and has no derogatory record whatsoever";
$letterContent .= "filed against him/her in his office.\n\n";

$letterContent .= "            This Certification is being issued upon the request of the interested party for\n";
$letterContent .= "" . $row['Purpose'] . "\n\n";

$letterContent .= "            Given This________day of ____________________,___________\n";

$pdf->MultiCell(0, 12, $letterContent, 0, 'J');



    

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
