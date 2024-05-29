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

    // Constructor to set organization details
    public function __construct($organizationName, $organizationAddress, $brgyname, $Zonenumname, $fulladdress , $officeofbrgy,$serviceType  ) {
        parent::__construct();
        $this->organizationName = $organizationName;
        $this->organizationAddress = $organizationAddress;
        $this->brgyname = $brgyname;
        $this->Zonenumname = $Zonenumname;
        $this->fulladdress = $fulladdress;
        $this->officeofbrgy = $officeofbrgy;
        $this->serviceType  = $serviceType ;
       
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
        $logoPath = '../../Images/manilalogo.jpg'; // Adjust the path based on your project structure
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



        // Title
     
        $this->Line(10, 43, 200, 43);

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
        $pdf = new PDF($organizationName, $organizationAddress ,$brgyname, $Zonenumname, $fulladdress, $officeofbrgy, $serviceType);

        // Add a page
        $pdf->AddPage();

        // Set font
        $pdf->SetFont('times', '', 12);

        while ($row = $result->fetch_assoc()) {
            // Letter content resembling a formal letter
           
        
           
            $letterContent = str_pad("", 100  + strlen("BLOTTER REPORT") / 2, " ", STR_PAD_RIGHT) . "\n\n";
$dateOfReport = "TO WHOM IT MAY CONCERN ";
$letterContent .= str_pad($dateOfReport, 130, " ", STR_PAD_RIGHT) . "\n\n";

     
            $letterContent .= "        I am writing to formally bring to your attention a matter that requires your immediate Action. Complaint ID: . This report pertains to a  that transpired on . The incident involves ";
            $letterContent .= "a complainant identified as . The complainant, residing at  and reachable at , reported an incident involving the complainee, .\n\n";
            
            $letterContent .= "In providing a comprehensive Details of the incident, the complainant details are as follows:\n";
            $letterContent .= "Name: . ";
            $letterContent .= "Contact Number: . ";
            $letterContent .= "Address: .\n\n";
            
            $letterContent .= "I would like to furnish you with the following details: ";
            $letterContent .= ". Subsequent to this, a diligent investigation has been conducted. Actions taken during the investigation include ";
            $letterContent .= "documenting statements, gathering evidence, and interviewing relevant parties. This report encapsulates the details of the complaint, our investigative efforts, and the actions taken thus far.\n\n";
            
            $letterContent .= "We appreciate your prompt attention to this matter and anticipate your cooperation in resolving the issues presented herein. Thank you for your commitment to maintaining the integrity and safety within our community.\n\n";


            // Set the spacing from the top
            $pdf->SetY(46);
        
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
