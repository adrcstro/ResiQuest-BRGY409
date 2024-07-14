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
$serviceType = "Request Monitoring Chart";
$persontocontact = "----------------------------------------Nothing Fallows----------------------------------------";
$nameofbrgycharman = "BRENDA S. PUERTOLLANO";
$psotiontitle = "Punong Barangay";

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
    private $persontocontact;
    private $nameofbrgycharman;
    private $psotiontitle;

    // Constructor to set organization details
    public function __construct($organizationName, $organizationAddress, $brgyname, $Zonenumname, $fulladdress, $officeofbrgy, $serviceType, $tel, $persontocontact, $nameofbrgycharman, $psotiontitle) {
        parent::__construct();
        $this->organizationName = $organizationName;
        $this->organizationAddress = $organizationAddress;
        $this->brgyname = $brgyname;
        $this->Zonenumname = $Zonenumname;
        $this->fulladdress = $fulladdress;
        $this->officeofbrgy = $officeofbrgy;
        $this->serviceType = $serviceType;
        $this->tel = $tel;
        $this->persontocontact = $persontocontact;
        $this->nameofbrgycharman = $nameofbrgycharman;
        $this->psotiontitle = $psotiontitle;
    }

    // Page header
    public function Header() {
        // Set font
        $this->SetFont('times', 'B', 12);

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
        $this->Ln(80); // Adjust the line spacing as needed
        $this->SetFont('times', 'B', 13); // Set font to bold and size 14
        $this->SetX($this->GetX() + 21); // Move 10 units to the right
        $this->Cell(0, 10, $this->persontocontact, 0, 0, 'L');

        $this->Ln(10); // Adjust the line spacing as needed

        $this->SetMargins(30, 25, 30);
        $this->Ln(120); // Adjust the line spacing as needed
        $this->SetFont('times', 'B', 12); // Set font to bold and size 14
        $this->Cell(0, 10, $this->nameofbrgycharman, 0, 9, 'R');
        $this->Ln(-5);
        $this->SetFont('times', 'B', 10); // Set font to bold and size 14
        $this->SetX(125); // Set X coordinate to 30 (adjust as needed)
        $this->Cell(0, 10, $this->psotiontitle, 0, 10, 'C');

        $this->SetLineWidth(1);
        $this->Line(10, 48, 200, 48);
    }

    // Page footer
    public function Footer() {
        // Position at 1.5 cm from bottom
    }
}

$year = $_GET['year'];
$month = $_GET['month'];

// Convert $year and $month to a formatted string like "February, 2024"
$date = DateTime::createFromFormat('!m-Y', $month . '-' . $year);
$formattedDate = $date->format('F, Y');

// Define all service types
$all_service_types = [
    'Certificate of Residency',
    'Certificate of Indigency',
    'Business Clearance',
    'Barangay Identification'
];

// Fetch request counts for each service type
$sql = "SELECT 
            ServiceType, COUNT(*) as count
        FROM requestdocument 
        WHERE YEAR(DateRequested) = ? AND MONTH(DateRequested) = ?
        GROUP BY ServiceType";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $year, $month);
$stmt->execute();
$result = $stmt->get_result();

$service_counts = [];
while ($row = $result->fetch_assoc()) {
    $service_counts[$row['ServiceType']] = $row['count'];
}

// Ensure all service types are included in the results
foreach ($all_service_types as $service_type) {
    if (!isset($service_counts[$service_type])) {
        $service_counts[$service_type] = 0;
    }
}

// Calculate the total number of requests
$total_requests = array_sum($service_counts);

// Create PDF instance with organization details
$pdf = new PDF($organizationName, $organizationAddress, $brgyname, $Zonenumname, $fulladdress, $officeofbrgy, $serviceType, $tel, $persontocontact, $nameofbrgycharman, $psotiontitle);
$pdf->AddPage();

// Set margins (left, top, right)
$pdf->SetMargins(30, 25, 30);

// Set font
$pdf->SetFont('times', '', 12);

// Move the position down to the middle
$pdf->SetY($pdf->GetPageHeight() / 2 - 80); // Adjust the value (-30) as needed for exact positioning

$html = '
<h2>Document Request for the Month of (' . $formattedDate . ')</h2>
<table border="1" cellpadding="5">
    <tr>
        <th>Service Type</th>
        <th>Number of Requests</th>
    </tr>';

foreach ($service_counts as $service_type => $count) {
    $html .= '
    <tr>
        <td>' . $service_type . '</td>
        <td>' . $count . '</td>
    </tr>';
}

$html .= '
    <tr>
        <td><strong>Total Requests</strong></td>
        <td><strong>' . $total_requests . '</strong></td>
    </tr>
</table>';

$pdf->writeHTML($html, true, false, true, false, '');

// Close and output PDF document
$pdf->Output('document_request_report.pdf', 'I');

$conn->close();
?>
