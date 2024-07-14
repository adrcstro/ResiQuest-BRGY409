<?php
require_once('../../tcpdf.php');
require_once('Connection.php'); // Include your database configuration
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
$serviceType = "BLOTTER INFORMATION";
$persontocontact = "Narrative of the Report";
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
    public function __construct($organizationName, $organizationAddress, $brgyname, $Zonenumname, $fulladdress , $officeofbrgy, $serviceType ,$tel,$persontocontact,$nameofbrgycharman, $psotiontitle, )
    
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
        $this->persontocontact = $persontocontact;
        $this->nameofbrgycharman  = $nameofbrgycharman;
        $this->psotiontitle  = $psotiontitle;

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
        $this->Ln(72); // Adjust the line spacing as needed
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
    
    

class MYPDF extends TCPDF {
    // Page header
    public function Header() {
        // Set font
        $this->SetFont('helvetica', 'B', 12);
        // Title
        $this->Cell(0, 15, 'Document Request Report', 0, 1, 'C');
    }

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().' of '.$this->getAliasNbPages(), 0, 0, 'C');
    }
}

// Create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Your Name');
$pdf->SetTitle('Document Request Report');
$pdf->SetSubject('Report');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// Set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 006', PDF_HEADER_STRING);

// Set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// Set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// Set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// Set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// Set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// Add a page
$pdf->AddPage();

// Set font
$pdf->SetFont('helvetica', '', 10);

// Fetch data from database
$year = $_GET['year'];
$month = $_GET['month'];

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT COUNT(*) as request_count FROM requestdocument WHERE YEAR(DateRequested) = ? AND MONTH(DateRequested) = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $year, $month);
$stmt->execute();
$result = $stmt->get_result();

$request_count = 0;
if ($row = $result->fetch_assoc()) {
    $request_count = $row['request_count'];
}

$html = '
<h2>Document Request Data</h2>
<table border="1" cellpadding="5">
    <tr>
        <th>Year-Month</th>
        <th>Total Document Requests</th>
    </tr>
    <tr>
        <td>' . $year . '-' . str_pad($month, 2, '0', STR_PAD_LEFT) . '</td>
        <td>' . $request_count . '</td>
    </tr>
</table>';

$pdf->writeHTML($html, true, false, true, false, '');

// Close and output PDF document
$pdf->Output('document_request_report.pdf', 'I');

$conn->close();
?>
