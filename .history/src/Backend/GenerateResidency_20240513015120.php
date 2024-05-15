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
    private $tel ;


    // Constructor to set organization details
    public function __construct($organizationName, $organizationAddress, $brgyname, $Zonenumname, $fulladdress , $officeofbrgy, $serviceType,$tel)
    
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
    }

    // Page header
    public function Header() {
        // Set font
        $this->SetFont('times', 'B', 12);
        
        // Set text color to red
        $this->SetTextColor(255, 0, 0); // Red color
        
        // Output serviceType text in red
        $this->Cell(0, 10, $this->serviceType, 0, 9, 'C');
        
        // Reset text color to black
        $this->SetTextColor(0, 0, 0); // Black color
        
        // Other header content...
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
    $sql = "SELECT RequestID, ServiceType, DateRequested, FirstName, Middlename, Lastname, Address, Purpose FROM requestdocument WHERE RequestID = '$searchID' AND (ServiceType = 'Certificate of Residency')";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Create PDF instance with organization details
        $pdf = new PDF($organizationName, $organizationAddress ,$brgyname, $Zonenumname, $fulladdress, $officeofbrgy, $serviceType,$tel);
    
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
