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
$officeofbrgy = "OFFICE OF THE PUNONG BARANGAY";
$serviceType = "CERTIFICATE OF INDIGENCY";

$psotiontitle = "Punong Barangay";
$attestedby = "Attested:";
$line="_________________________";
$kagawad="KAGAWAD";
$notvalid="(Not Valid whithout Barangay Official seal)";
$kagawad2="K   A   G   A   W   A   D";




//kagawad details

$kagawadsunflower="Jeffrey L. Salcedo";
$puroknSun="Purok Sunflower";

$kagawadRosal="Ma.Gienel N. Fontanilla";
$purokRosal="Purok Rosal";


$kagawadDahlia="Alfredo C. Regino Jr.";
$purokDahlia="Purok Dahlia";

$kagawadCamia="Ruel P. Cabrera";
$purokCamia="Purok Camia";

$kagawadGumamela="Rafaelito C. Apanay";
$purokGumamela="Purok Gumamela";


$kagawadJasmin="Kevin Michael C. Batac";
$purokJasmin="Purok Jasmin";


$kagawadSampaguita="Edric Justine Y. Macainag";
$purokSampaguita="Purok Sampaguita";

$kagawadSKCHAIRMAN="SK CHAIRMAN";
$purokSKCHAIRMAN="Mycky Sharee M. Pajeres";

$kagawadTREASURER="TREASURER";
$purokTREASURER="Reynaldo A. Camacho";


$kagawadSECRETARY="SECRETARY";
$purokSECRETARY="Ma. Verinica M. Pajeras";

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
    private $nameofbrgycharman;
    private $psotiontitle;

    private $attestedby;
    private $line;
    private $kagawad;
    private $notvalid;
    private $kagawad2;

    private $kagawadsunflower;
    private $puroknSun;
    private $kagawadRosal;
    private $purokRosal;

    private $kagawadDahlia;
    private $purokDahlia;
    private $kagawadCamia;
    private $purokCamia;
    private $kagawadGumamela;
    private $purokGumamela;
    private $kagawadJasmin;
    private $purokJasmin;

    private $kagawadSampaguita;
    private $purokSampaguita;

    private $kagawadSKCHAIRMAN;
    private $purokSKCHAIRMAN;
    private $kagawadTREASURER;
    private $purokTREASURER;
    private $kagawadSECRETARY;
    private $purokSECRETARY;


    // Constructor to set organization details
    public function __construct($organizationName, $organizationAddress, $brgyname, $Zonenumname, $fulladdress , $officeofbrgy, $serviceType, $nameofbrgycharman, $psotiontitle , $attestedby, $line, $kagawad, $notvalid ,$kagawad2,
    $kagawadsunflower, $puroknSun ,$kagawadRosal, $purokRosal,$kagawadDahlia,$purokDahlia ,$kagawadCamia,$purokCamia,$kagawadGumamela,$purokGumamela ,$kagawadJasmin,$purokJasmin,$kagawadSampaguita,$purokSampaguita,
    $kagawadSKCHAIRMAN,$purokSKCHAIRMAN, $kagawadTREASURER,$purokTREASURER, $kagawadSECRETARY,$purokSECRETARY)
    
    {
        parent::__construct();
        $this->organizationName = $organizationName;
        $this->organizationAddress = $organizationAddress;
        $this->brgyname = $brgyname;
        $this->Zonenumname = $Zonenumname;
        $this->fulladdress = $fulladdress;
        $this->officeofbrgy = $officeofbrgy;
        $this->serviceType  = $serviceType ;
        $this->nameofbrgycharman  = $nameofbrgycharman;
        $this->psotiontitle  = $psotiontitle;
        $this->attestedby = $attestedby;
        $this->line  = $line;
        $this->kagawad  = $kagawad;
        $this->notvalid  = $notvalid;
        $this->kagawad2  = $kagawad2;
        $this->kagawadsunflower  = $kagawadsunflower;
        $this->puroknSun  = $puroknSun;
        $this->kagawadRosal  = $kagawadRosal;
        $this->purokRosal  =  $purokRosal;
        $this->kagawadDahlia  = $kagawadDahlia;
        $this->purokDahlia  =  $purokDahlia;
        $this->kagawadCamia  = $kagawadCamia;
        $this->purokCamia  =  $purokCamia;
        $this->kagawadGumamela  = $kagawadGumamela;
        $this->purokGumamela =  $purokGumamela;
        $this->kagawadJasmin  = $kagawadJasmin;
        $this->purokJasmin =  $purokJasmin;
        $this->kagawadSampaguita  = $kagawadSampaguita;
        $this->purokSampaguita =  $purokSampaguita;
        $this->kagawadSKCHAIRMAN  = $kagawadSKCHAIRMAN;
        $this->purokSKCHAIRMAN =  $purokSKCHAIRMAN;
        $this->kagawadTREASURER  = $kagawadTREASURER;
        $this->purokTREASURER =  $purokTREASURER;
        $this->kagawadSECRETARY  = $kagawadSECRETARY;
        $this->purokSECRETARY =  $purokSECRETARY;
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
        $this->Ln(3); // Adjust the line spacing as needed
        $this->SetFont('times', 'B', 14); // Set font to bold and size 14
        $this->Cell(0, 10, $this->officeofbrgy, 0, 9, 'C');
        $this->Ln(1);
        $this->SetFont('times', 'B', 18); // Set font to bold and size 14
        $this->Cell(0, 10, $this->serviceType, 0, 9, 'C');
       
        $this->Ln(-5); // Adjust the line spacing as needed

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
        $this->Ln(10); // Adjust the line spacing as needed
        $this->SetFont('times', 'B', 12); // Set font to bold and size 14
        $this->Cell(0, 10, $this->attestedby, 0, 9, 'L');
        $this->Ln(5);
        $this->SetFont('times', 'B', 10); // Set font to bold and size 14
        $this->SetX(30); // Set X coordinate to 30 (adjust as needed)
        $this->Cell(0, 10, $this->line, 0, 10, 'L');
        $this->Ln(-5); // Adjust the line spacing as needed
        $this->SetFont('times', 'B', 12); // Set font to bold and size 14
        $this->Cell(0, 10, $this->kagawad, 0, 9, 'L');
        $this->Ln(2);
        $this->SetFont('times', 'B', 10); // Set font to bold and size 14
        $this->SetX(30); // Set X coordinate to 30 (adjust as needed)
        $this->Cell(0, 10, $this->notvalid, 0, 10, 'L');


      
     
        // Title
     
   // Set line thickness to 0.5 mm
$this->SetLineWidth(1);
$this->Line(10, 43, 200, 43);
$this->Line(10, 240, 200, 240);





    }
    
    
    // Page footer
    public function Footer() {
        // Position at 1.5 cm from bottom
        $this->Ln(-58); // Adjust the line spacing as needed
$this->SetFont('times', 'B', 12); // Set font to bold and size 14
$this->Cell(0, 10, $this->nameofbrgycharman, 0, 9, 'C');
$this->Ln(-5);
$this->SetFont('times', 'B', 10); // Set font to bold and size 14
$this->SetX(90); // Set X coordinate to 30 (adjust as needed)
$this->Cell(0, 10, $this->psotiontitle, 0, 10, 'L');
$this->Ln(-4);
$this->SetFont('times', 'B', 13); // Set font to bold and size 14
$text = $this->kagawad2; // Your text
$spacing = 8; // Small spacing between characters (in user units)
$charWidth = 3; // Character width (adjust as needed)
$startX = $this->GetX(); // Initial X position

// Output each character with spacing
$text = $this->kagawad2; // Your text
$spacing = 8; // Small spacing between characters (in user units)
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

$this->SetY(-43);
$this->Ln(5); // Adjust the line spacing as needed
$this->SetFont('times', 'B', 10); // Set font to bold and size 14
$this->Cell(0, 10, $this->kagawadsunflower, 0, 9, 'L');
$this->Ln(-5);
$this->SetFont('times', 'B', 8); // Set font to bold and size 14
$this->SetX(13);
$this->Cell(0, 10, $this->puroknSun, 0, 10, 'L');

$this->SetY(-30);

$this->Ln(-8); 

$this->SetX(45);
$this->SetFont('times', 'B', 10); // Set font to bold and size 14
$this->Cell(0, 10, $this->kagawadRosal, 0, 9, 'L');
$this->Ln(-5);
$this->SetFont('times', 'B', 8); // Set font to bold and size 14
$this->SetX(55);
$this->Cell(0, 10, $this->purokRosal, 0, 10, 'L');

$this->SetY(-30);
$this->Ln(-8); 
$this->SetX(90);
$this->SetFont('times', 'B', 10); // Set font to bold and size 14
$this->Cell(0, 10, $this->kagawadDahlia, 0, 9, 'L');
$this->Ln(-5);
$this->SetFont('times', 'B', 8); // Set font to bold and size 14
$this->SetX(98);
$this->Cell(0, 10, $this->purokDahlia, 0, 10, 'L');


$this->SetY(-30);
$this->Ln(-8); 
$this->SetX(130);
$this->SetFont('times', 'B', 10); // Set font to bold and size 14
$this->Cell(0, 10, $this->kagawadCamia, 0, 9, 'L');
$this->Ln(-5);
$this->SetFont('times', 'B', 8); // Set font to bold and size 14
$this->SetX(135);
$this->Cell(0, 10, $this->purokCamia, 0, 10, 'L');


$this->SetY(-30);
$this->Ln(-8); 
$this->SetX(165);
$this->SetFont('times', 'B', 10); // Set font to bold and size 14
$this->Cell(0, 10, $this->kagawadGumamela, 0, 9, 'L');
$this->Ln(-5);
$this->SetFont('times', 'B', 8); // Set font to bold and size 14
$this->SetX(170);
$this->Cell(0, 10, $this->purokGumamela, 0, 10, 'L');



$this->SetY(-15);
$this->Ln(-8); 
$this->SetX(10);
$this->SetFont('times', 'B', 10); // Set font to bold and size 14
$this->Cell(0, 10, $this->kagawadJasmin, 0, 9, 'L');
$this->Ln(-5);
$this->SetFont('times', 'B', 8); // Set font to bold and size 14
$this->SetX(15);
$this->Cell(0, 10, $this->purokJasmin, 0, 10, 'L');

$this->SetY(-15);
$this->Ln(-8); 
$this->SetX(50);
$this->SetFont('times', 'B', 10); // Set font to bold and size 14
$this->Cell(0, 10, $this->kagawadSampaguita, 0, 9, 'L');
$this->Ln(-5);
$this->SetFont('times', 'B', 8); // Set font to bold and size 14
$this->SetX(58);
$this->Cell(0, 10, $this->purokSampaguita, 0, 10, 'L');


$this->SetY(-15);
$this->Ln(-8); 
$this->SetX(100);
$this->SetFont('times', 'B', 10); // Set font to bold and size 14
$this->Cell(0, 10, $this->kagawadSKCHAIRMAN, 0, 9, 'L');
$this->Ln(-5);
$this->SetFont('times', 'B', 8); // Set font to bold and size 14
$this->SetX(98);
$this->Cell(0, 10, $this->purokSKCHAIRMAN, 0, 10, 'L');

$this->SetY(-15);
$this->Ln(-8); 
$this->SetX(140);
$this->SetFont('times', 'B', 10); // Set font to bold and size 14
$this->Cell(0, 10, $this->kagawadTREASURER, 0, 9, 'L');
$this->Ln(-5);
$this->SetFont('times', 'B', 8); // Set font to bold and size 14
$this->SetX(138);
$this->Cell(0, 10, $this->purokTREASURER, 0, 10, 'L');

$this->SetY(-15);
$this->Ln(-8); 
$this->SetX(173);
$this->SetFont('times', 'B', 10); // Set font to bold and size 14
$this->Cell(0, 10, $this->kagawadSECRETARY, 0, 9, 'L');
$this->Ln(-5);
$this->SetFont('times', 'B', 8); // Set font to bold and size 14
$this->SetX(170);
$this->Cell(0, 10, $this->purokSECRETARY, 0, 10, 'L');







    }
    
}
 // Adjust the line spacing as needed
 // Adjust the line spacing as needed
  
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle the search form submission
    $searchID = $_POST["RequestIDprint"];

    // Fetch data from the database based on the search ID
    $sql = "SELECT RequestID, ServiceType, DateRequested, FirstName, Middlename, Lastname, Address, Purpose FROM requestdocument WHERE RequestID = '$searchID' AND (ServiceType = 'Certificate of Indigency')";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Create PDF instance with organization details
        $pdf = new PDF($organizationName, $organizationAddress ,$brgyname, $Zonenumname, $fulladdress, $officeofbrgy, $serviceType, $nameofbrgycharman, $psotiontitle,$attestedby,$line,$kagawad,$notvalid,$kagawad,
        $kagawadsunflower , $puroknSun, $kagawadRosal,$purokRosal,$kagawadDahlia,$purokDahlia ,$kagawadCamia,$purokCamia,$kagawadGumamela,$purokGumamela,$kagawadJasmin,$purokJasmin,$kagawadSampaguita,$purokSampaguita,
        $kagawadSKCHAIRMAN,$purokSKCHAIRMAN,$kagawadTREASURER,$purokTREASURER,$kagawadSECRETARY,$purokSECRETARY);
    
$pdf->AddPage();

// Set margins (left, top, right)
$pdf->SetMargins(30, 25, 30);

// Set font
$pdf->SetFont('times', '', 12);

while ($row = $result->fetch_assoc()) {

$pdf->SetY(50); // Adjust this value as needed for more space
$pdf->setCellHeightRatio(1.7);

$letterContent = str_pad("", 120, " ", STR_PAD_RIGHT) . "\n\n"; // Increased spacing for "BLOTTER REPORT"
$dateOfReport = "TO WHOM IT MAY CONCERN ";
$letterContent .= str_pad($dateOfReport, 150, " ", STR_PAD_RIGHT) . "\n"; // Increased spacing for the date

$letterContent .= "            This is to Certify that the bearer  " . $row['Lastname'] . ", " . $row['FirstName'] . "  " . $row['Middlename'] . "";
$letterContent .= " with postal address at  " . $row['Address'] . ", Sampaloc Manila is INDIGENT in this Barangay. \n\n";

$letterContent .= "          I Certify further that the same known to me to be a person of good moral character and has no derogatory record";
$letterContent .= " whatsoever filed against him/her in this office.\n\n";

$letterContent .= "            This Certification is being issued upon the request of the above mentioned\n";
$letterContent .= " person for  " . $row['Purpose'] . "\n\n";

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
