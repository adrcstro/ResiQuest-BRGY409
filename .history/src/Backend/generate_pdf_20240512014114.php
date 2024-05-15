<?php
// generate_pdf.php

// Include the TCPDF library
require_once('../tcpdf.php');

// Your database connection details
$servername = "localhost"; // Replace with your server name
$username = "root"; // Replace with your username
$password = ""; // Replace with your password
$dbname = "plate-to-place-v-tracking";
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
    $searchID = $_POST["SearchReportpassenger"];
    
    // Fetch data from the database based on the search ID
    $sql = "SELECT ComplaintID, TypeofComplaint, DateofReport, ComplainantName, ContactNumber, Address, NameofComplainee , IncidentDescription FROM complainttbl WHERE ComplaintID = '$searchID'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Create PDF instance with organization details
        $pdf = new PDF($organizationName, $organizationAddress);

        // Add a page
        $pdf->AddPage();

        // Set font
        $pdf->SetFont('times', '', 12);

   
        while ($row = $result->fetch_assoc()) {
            // Letter content resembling a police report
            $letterContent = str_pad("BLOTTER REPORT", 80 + strlen("BLOTTER REPORT") / 2, " ", STR_PAD_LEFT) . "\n\n";
            $dateOfReport = "Date Filed: " . $row['DateofReport'];
            $letterContent .= str_pad($dateOfReport, 155, " ", STR_PAD_LEFT) . "\n\n";
            
            // Rest of your code...
            


            $letterContent .= "        I am writing to formally bring to your attention a matter that requires your immediate Action. Complaint ID: " . $row['ComplaintID'] . ". This report pertains to a " . $row['TypeofComplaint'] . " that transpired on " . $row['DateofReport'] . ". The incident involves ";
            $letterContent .= "a complainant identified as " . $row['ComplainantName'] . ". The complainant, residing at " . $row['Address'] . " and reachable at " . $row['ContactNumber'] . ", reported an incident involving the complainee, " . $row['NameofComplainee'] . ".\n\n";
            
            $letterContent .= "In providing a comprehensive Details of the incident, the complainant details are as follows:\n";
            $letterContent .= "Name: " . $row['ComplainantName'] . ". ";
            $letterContent .= "Contact Number: " . $row['ContactNumber'] . ". ";
            $letterContent .= "Address: " . $row['Address'] . ".\n\n";
            
            $letterContent .= "I would like to furnish you with the following details: ";
            $letterContent .= $row['IncidentDescription'] . ". Subsequent to this, a diligent investigation has been conducted. Actions taken during the investigation include ";
            $letterContent .= "documenting statements, gathering evidence, and interviewing relevant parties. This report encapsulates the details of the complaint, our investigative efforts, and the actions taken thus far.\n\n";
            
            $letterContent .= "We appreciate your prompt attention to this matter and anticipate your cooperation in resolving the issues presented herein. Thank you for your commitment to maintaining the integrity and safety within our community.\n\n";
            
            // Set the spacing from the top
            $pdf->SetY(40);
        
            // Output the letter content to the PDF
            $pdf->MultiCell(0, 12, $letterContent);
            
     
            
            // Add a table with two columns and two rows
            $pdf->SetFillColor(200, 220, 255); // Set the background color for the first row

            // First column with color (width: 50)
            $pdf->Cell(190, 10, 'Complainee Details', 1, 1, 'C', 1);
            // Second column with color (width: 70)
         

   // Move to the next line
            // First row, first column without color (width: 50)
            // Fetch additional data from driverstbl based on NameofComplainee
            $complaineeName = $row['NameofComplainee'];
$driverInfoQuery = "SELECT Name,Age, Gender, Phone, HomeAddress FROM passengertbl WHERE Name = '$complaineeName'";
$driverInfoResult = $conn->query($driverInfoQuery);

    if ($driverInfoResult) {
    if ($driverInfoResult->num_rows > 0) {
        $driverInfo = $driverInfoResult->fetch_assoc();

        // Display complainee information
   
        

        // Continue displaying other information
        $pdf->Cell(190, 10, "Name: " . $driverInfo['Name'], 1, 1, 'L');
        $pdf->Cell(190, 10, "Age: " . $driverInfo['Age'], 1, 1, 'L');
        $pdf->Cell(190, 10, "Gender: " . $driverInfo['Gender'], 1, 1, 'L');
        $pdf->Cell(190, 10, "Phone: " . $driverInfo['Phone'], 1, 1, 'L');
        $pdf->MultiCell(190, 20, "Address: " . $driverInfo['HomeAddress'], 1, 'L');
  // Add the cell with the driver's home address
    
    

    } else {
        // No information found for the complainee.
        $pdf->Cell(50, 60, "No details found for Complainee: $complaineeName", 1, 0, 'L');
    }
} else {
    // Handle the query error
    echo "Error: " . $conn->error;
}

            
           
        }
        



        // Output the PDF to the browser
        $pdf->Output();
    } else {
        echo "No records found for the given Complaint ID.";
    }
}

$conn->close();
?>
