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
$serviceType = "CERTIFICATION";
$nameofbrgycharman = "BRENDA S. PUERTOLLANO";
$psotiontitle = "Punong Barangay";

$specimensig = "Specimen Signiture";
$line = "________________________________";
$rescertnum="Res. Cert. No ____________________";
$Issued="Issued at ________________________";
$on="On_____________________________";

$attestedby = "ATTESTED BY:";
$line2="_________________________";
$kagawad="Purok Kagawad";

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


    private $specimensig;
    private $line;
    private $rescertnum;
    private $Issued;
    private $on;

    private $attestedby;
    private $line2;
    private $kagawad;

    private $notvalid;

    // Constructor to set organization details
    public function __construct($organizationName, $organizationAddress, $brgyname, $Zonenumname, $fulladdress , $officeofbrgy, $serviceType,$tel, $nameofbrgycharman, $psotiontitle, $specimensig, $line, $rescertnum, $Issued, $on ,$attestedby,$line2,$kagawad,$notvalid)
    
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
        $this->specimensig = $specimensig;
        $this->line  = $line;
        $this->rescertnum = $rescertnum;
        $this->Issued  = $Issued;
        $this->on  =  $on;
        $this->attestedby =  $attestedby;
        $this->line2  = $line2;
        $this->kagawad  =  $kagawad;
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
        $this->SetTextColor(255, 0, 0);
        $this->Ln(1);
        $this->SetFont('times', 'B', 18); // Set font to bold and size 14
        $text = $this->serviceType; // Your text
        $spacing = 5; // Small spacing between characters (in user units)
        $charWidth = 3; // Character width (adjust as needed)
        $startX = $this->GetX(); // Initial X position
        
        // Output each character with spacing
        $text = $this->serviceType; // Your text
        $spacing = 5; // Small spacing between characters (in user units)
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

        $this->SetMargins(30, 25, 30);
        $this->Ln(-5); // Adjust the line spacing as needed
        $this->SetFont('times', 'B', 12); // Set font to bold and size 14
        $this->Cell(0, 10, $this->specimensig, 0, 9, 'L');
        $this->Ln(5);
        $this->SetFont('times', 'B', 10); // Set font to bold and size 14
        $this->SetX(30); // Set X coordinate to 30 (adjust as needed)
        $this->Cell(0, 10, $this->line, 0, 10, 'L');
        $this->Ln(-3); // Adjust the line spacing as needed
        $this->SetFont('times', 'B', 10); // Set font to bold and size 14
        $this->Cell(0, 10, $this->rescertnum, 0, 9, 'L');
        $this->Ln(-5);
        $this->SetFont('times', 'B', 10); // Set font to bold and size 14
        $this->SetX(30); // Set X coordinate to 30 (adjust as needed)
        $this->Cell(0, 10, $this->Issued, 0, 10, 'L');
        $this->Ln(-5);
        $this->SetFont('times', 'B', 10); // Set font to bold and size 14
        $this->SetX(30); // Set X coordinate to 30 (adjust as needed)
        $this->Cell(0, 10, $this->on, 0, 10, 'L');



        $this->Ln(20); // Adjust the line spacing as needed

        $this->SetMargins(30, 25, 30);
        $this->Ln(-5); // Adjust the line spacing as needed
        $this->SetFont('times', 'B', 12); // Set font to bold and size 14
        $this->Cell(0, 10, $this->attestedby, 0, 9, 'L');
        $this->Ln(5);
        $this->SetFont('times', 'B', 10); // Set font to bold and size 14
        $this->SetX(30); // Set X coordinate to 30 (adjust as needed)
        $this->Cell(0, 10, $this->line2, 0, 10, 'L');
        $this->Ln(-3); // Adjust the line spacing as needed
        $this->SetFont('times', 'B', 10); // Set font to bold and size 14
        $this->Cell(0, 10, $this->kagawad, 0, 9, 'L');
      
        $this->Sety(-30); 
        $this->Ln(2);
        $this->SetFont('times', 'B', 10); // Set font to bold and size 14
        $this->SetX(115); // Set X coordinate to 30 (adjust as needed)
        $this->Cell(0, 10, $this->notvalid, 0, 10, 'L');













     
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
    $query = "SELECT requestdocument.*, admintbl.*
              FROM requestdocument
              INNER JOIN admintbl ON admintbl.AdminID = requestdocument.AdminID
              WHERE RequestID = '$searchID' AND ServiceType = 'Certificate of Residency'";

    // Ensure that $query is not empty before executing the query
    if (!empty($query)) {
        $result = $conn->query($query);

        if ($result) {
            if ($result->num_rows > 0) {
                // Create PDF instance with organization details
                $pdf = new PDF($organizationName, $organizationAddress, $brgyname, $Zonenumname, $fulladdress, $officeofbrgy, $serviceType, $tel, $nameofbrgycharman, $psotiontitle, $specimensig, $line, $rescertnum, $Issued, $on, $attestedby, $line2, $kagawad, $notvalid);

                $pdf->AddPage();
                $pdf->SetMargins(30, 25, 30);
                $pdf->SetFont('times', '', 12); // Set font to regular

                while ($row = $result->fetch_assoc()) {
                    $pdf->SetY(80);
                    $pdf->setCellHeightRatio(1.7);

                    $letterContent = str_pad("", 120, " ", STR_PAD_RIGHT) . "\n\n";
                    $dateOfReport = "TO WHOM IT MAY CONCERN";
                    $noText = "No.______________________";
                    $pdf->SetY(60);
                    $pdf->SetX($pdf->GetPageWidth() - 50);
                    $pdf->Cell(0, 10, $noText, 0, 1, 'R');
                    $pdf->SetY(60);
                    $letterContent .= str_pad($dateOfReport, 150, " ", STR_PAD_RIGHT) . "\n";
                    $letterContent .= "            This is to Certify that the " . $row['Lastname'] . ", " . $row['FirstName'] . "  " . $row['Middlename'] . " whose specimen";
                    $letterContent .= "signiture appears below, is a bonafide residents of these barangay with postal address at  " . $row['Address'] . " Sanpaloc Manila \n\n";
                    $letterContent .= "            I hereby certify further, that the name is knownto me to be a person of good moral character and has no derogatory record whatsoever";
                    $letterContent .= "filed against him/her in his office.\n\n";
                    $letterContent .= "            This Certification is being issued upon the request of the interested party for\n";
                    $letterContent .= "" . $row['Purpose'] . "\n\n";
                    $letterContent .= "            Given This________day of ____________________,___________\n";
                    $letterContent .= "" . $row['Fname'] . "\n";
                    $pdf->MultiCell(0, 12, $letterContent, 0, 'J');
                    $pdf->SetY($pdf->GetY() + 10);
                }

                $pdf->Output();
            } else {
                echo "No records found for the given Request ID.";
            }
        } else {
            echo "Error executing query: " . $conn->error;
        }
    } else {
        echo "Query is empty.";
    }
}




$conn->close();
?>
