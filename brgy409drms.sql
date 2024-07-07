-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2024 at 12:51 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `brgy409drms`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminactivitylog`
--

CREATE TABLE `adminactivitylog` (
  `AdminID` int(11) NOT NULL,
  `Username` varchar(250) NOT NULL,
  `OfficialPosition` varchar(250) NOT NULL,
  `Action` varchar(250) NOT NULL,
  `Createdate` varchar(250) NOT NULL,
  `Categorization` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adminactivitylog`
--

INSERT INTO `adminactivitylog` (`AdminID`, `Username`, `OfficialPosition`, `Action`, `Createdate`, `Categorization`) VALUES
(13898294, 'PUERTOLLANO,BRENDA S. ', 'Barangay Chairman', 'Edit Info of Resident 42025748', '06/09/2024', 'Edit'),
(13898294, 'PUERTOLLANO,BRENDA S. ', 'Barangay Chairman', 'Deleted Resident 12347259', '06/09/2024', 'Deleted'),
(13898294, 'PUERTOLLANO,BRENDA S. ', 'Barangay Chairman', 'Verifying Resident 86437860', '06/09/2024', 'process'),
(13898294, 'PUERTOLLANO,BRENDA S. ', 'Barangay Chairman', 'Edit Info of Resident 42025748', '06/10/2024', 'Edit'),
(96651951, 'castro,Andre Thomas Liquido ', 'Barangay Kagawad', 'Edit Info of Resident 42025748', '06/10/2024', 'Edit'),
(96651953, 'castro,Andre Thomas Liquido ', 'Barangay Kagawad', 'Edit Info of Resident 42025748', '06/14/2024', 'Edit'),
(13898294, 'PUERTOLLANO,BRENDA S. ', 'Barangay Chairman', 'Edit Info of Resident 39648752', '06/17/2024', 'Edit'),
(13898294, 'PUERTOLLANO,BRENDA S. ', 'Barangay Chairman', 'Verifying Resident 41736699', '06/17/2024', 'process'),
(13898294, 'PUERTOLLANO,BRENDA S. ', 'Barangay Chairman', 'Edit Info of Resident 41736699', '06/21/2024', 'Edit'),
(13898294, 'PUERTOLLANO,BRENDA S. ', 'Barangay Chairman', 'Process Blotter Case 472462', '06/21/2024', 'process'),
(13898294, 'PUERTOLLANO,BRENDA S. ', 'Barangay Chairman', 'Edit Info of Resident 39648752', '06/22/2024', 'Edit'),
(13898294, 'PUERTOLLANO,BRENDA S. ', 'Barangay Chairman', 'Edit Info of Resident 39648752', '06/22/2024', 'Edit'),
(13898294, 'PUERTOLLANOO,BRENDA S. ', 'Barangay Chairman', 'Edit Info of Resident 39648752', '06/22/2024', 'Edit'),
(13898294, 'PUERTOLLANOO,BRENDA S. ', 'Barangay Chairman', 'Edit Info of Resident 39648752', '06/22/2024', 'Edit'),
(13898294, 'PUERTOLLANOO,BRENDA S. ', 'Barangay Chairman', 'Edit Info of Resident 39648752', '06/22/2024', 'Edit'),
(13898294, 'PUERTOLLANOO,BRENDA S.', 'Barangay Chairman', 'Set Schedule Request 638261', '06/22/2024', 'set'),
(13898294, 'PUERTOLLANOO,BRENDA S.', 'Barangay Chairman', 'Set Schedule Request 648117', '06/22/2024', 'set'),
(13898294, 'PUERTOLLANOO,BRENDA S. ', 'Barangay Chairman', 'Edit Info of Resident 29346800', '06/24/2024', 'Edit'),
(13898294, 'PUERTOLLANOO,BRENDA S. ', 'Barangay Chairman', 'Edit Info of Resident 42025748', '06/24/2024', 'Edit'),
(13898294, 'PUERTOLLANOO,BRENDA S. ', 'Barangay Chairman', 'Edit Info of Resident 41736699', '06/24/2024', 'Edit'),
(13898294, 'PUERTOLLANOO,BRENDA S. ', 'Barangay Chairman', 'Deleted Resident 2853141', '06/24/2024', 'Deleted'),
(13898294, 'PUERTOLLANOO,BRENDA S. ', 'Barangay Chairman', 'Deleted Resident 29346800', '06/24/2024', 'Deleted'),
(13898294, 'PUERTOLLANOO,BRENDA S. ', 'Barangay Chairman', 'Deleted Resident 29346800', '06/24/2024', 'Deleted'),
(13898294, 'PUERTOLLANOO,BRENDA S. ', 'Barangay Chairman', 'Deleted Resident 29346800', '06/24/2024', 'Deleted'),
(13898294, 'PUERTOLLANOO,BRENDA S. ', 'Barangay Chairman', 'Deleted Resident 2853141', '06/24/2024', 'Deleted'),
(13898294, 'PUERTOLLANOO,BRENDA S. ', 'Barangay Chairman', 'Deleted Resident 2853141', '06/24/2024', 'Deleted'),
(13898294, 'PUERTOLLANOO,BRENDA S. ', 'Barangay Chairman', 'Edit Info of Resident 2853141', '06/24/2024', 'Edit'),
(13898294, 'PUERTOLLANOO,BRENDA S. ', 'Barangay Chairman', 'Deleted Resident 2853141', '06/24/2024', 'Deleted'),
(13898294, 'PUERTOLLANOO,BRENDA S. ', 'Barangay Chairman', 'Deleted Resident 2853141', '06/24/2024', 'Deleted'),
(13898294, 'PUERTOLLANOO,BRENDA S. ', 'Barangay Chairman', 'Deleted Resident 2853141', '06/24/2024', 'Deleted'),
(13898294, 'PUERTOLLANOO,BRENDA S. ', 'Barangay Chairman', 'Edit Info of Resident 39648752', '06/24/2024', 'Edit'),
(13898294, 'PUERTOLLANOO,BRENDA S. ', 'Barangay Chairman', 'Deleted Resident 2853141', '06/27/2024', 'Deleted'),
(13898294, 'PUERTOLLANOO,BRENDA S. ', 'Barangay Chairman', 'Deleted Resident 2853141', '06/27/2024', 'Deleted'),
(13898294, 'PUERTOLLANOO,BRENDA S. ', 'Barangay Chairman', 'Deleted Resident 39648752', '06/27/2024', 'Deleted'),
(13898294, 'PUERTOLLANOO,BRENDA S. ', 'Barangay Chairman', 'Deleted Resident 29346800', '06/27/2024', 'Deleted'),
(13898294, 'PUERTOLLANOO,BRENDA S. ', 'Barangay Chairman', 'Deleted Resident 71563121', '06/27/2024', 'Deleted'),
(13898294, 'PUERTOLLANOO,BRENDA S. ', 'Barangay Chairman', 'Deleted Resident 97468144', '06/27/2024', 'Deleted'),
(13898294, 'PUERTOLLANOO,BRENDA S. ', 'Barangay Chairman', 'Deleted Resident 2853141', '06/27/2024', 'Deleted'),
(13898294, 'PUERTOLLANOO,BRENDA S. ', 'Barangay Chairman', 'Deleted Resident 29346800', '06/27/2024', 'Deleted'),
(13898294, 'PUERTOLLANOO,BRENDA S. ', 'Barangay Chairman', 'Deleted Resident 39648752', '06/27/2024', 'Deleted'),
(13898294, 'PUERTOLLANOO,BRENDA S. ', 'Barangay Chairman', 'Deleted Resident 41736699', '06/27/2024', 'Deleted'),
(13898294, 'PUERTOLLANOO,BRENDA S. ', 'Barangay Chairman', 'Deleted Resident 71563121', '06/27/2024', 'Deleted'),
(13898294, 'PUERTOLLANOO,BRENDA S. ', 'Barangay Chairman', 'Deleted Resident 71563121', '06/27/2024', 'Deleted'),
(13898294, 'PUERTOLLANOO,BRENDA S. ', 'Barangay Chairman', 'Deleted Resident 97468144', '06/27/2024', 'Deleted'),
(13898294, 'PUERTOLLANOO,BRENDA S. ', 'Barangay Chairman', 'Deleted Resident 2853141', '06/27/2024', 'Deleted'),
(13898294, 'PUERTOLLANOO,BRENDA S. ', 'Barangay Chairman', 'Deleted Resident 2853141', '06/27/2024', 'Deleted'),
(13898294, 'PUERTOLLANOO,BRENDA S. ', 'Barangay Chairman', 'Deleted Resident 2853141', '06/27/2024', 'Deleted'),
(13898294, 'PUERTOLLANOO,BRENDA S. ', 'Barangay Chairman', 'Deleted Resident 2853141', '06/27/2024', 'Deleted'),
(13898294, 'PUERTOLLANOO,BRENDA S. ', 'Barangay Chairman', 'Deleted Resident 2853141', '06/27/2024', 'Deleted'),
(13898294, 'PUERTOLLANOO,BRENDA S. ', 'Barangay Chairman', 'Deleted Resident 2853141', '06/28/2024', 'Deleted'),
(13898294, 'PUERTOLLANOO,BRENDA S. ', 'Barangay Chairman', 'Deleted Resident 2853141', '07/02/2024', 'Deleted');

-- --------------------------------------------------------

--
-- Table structure for table `admintbl`
--

CREATE TABLE `admintbl` (
  `AdminID` int(11) NOT NULL,
  `Fname` varchar(250) NOT NULL,
  `MName` varchar(250) NOT NULL,
  `Lname` varchar(250) NOT NULL,
  `BrgyPosition` varchar(250) NOT NULL,
  `AdGender` varchar(250) NOT NULL,
  `RenderedServiceStart` varchar(250) NOT NULL,
  `RenderedServiceend` varchar(250) NOT NULL,
  `Email` varchar(250) NOT NULL,
  `Password` varchar(250) NOT NULL,
  `AdminProfile` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admintbl`
--

INSERT INTO `admintbl` (`AdminID`, `Fname`, `MName`, `Lname`, `BrgyPosition`, `AdGender`, `RenderedServiceStart`, `RenderedServiceend`, `Email`, `Password`, `AdminProfile`) VALUES
(13898294, 'BRENDA', 'S.', 'PUERTOLLANOO', 'Barangay Chairman', 'Male', '2024-05-30', '2024-05-06', 'Liquido@gmail.com', '$2y$10$qFHYnKwo6pX2ddUvbjnq6eJPIc2w4mNZ1Hlm7ZwwDbECw2m2WB2sq', 'bravo.jpg'),
(96651948, 'Alberto', 'Santiago', 'Montenegro', 'Barangay Secretary', 'Male', '2024-05-26', '2024-05-24', 'JEff@gmail.com', '$2y$10$xUC9qpEC20/EDxDT0uO9zuCzWn4k515JBEEva.DrJhxVy2xmyGFQ6', 'bravo.jpg'),
(96651951, 'Andre Thomas', 'Liquido', 'castro', 'Barangay Kagawad', 'Male', '2024-06-02', '2024-06-02', 'Sample@gmail.com', '$2y$10$dbF.IIVyYe84AqVya8D5yOVoww8Nah5h292Fdl9DLEIuT7u6KA0NK', 'asd.jpg'),
(96651954, 'Andre Thomas', 'Liquido', 'castro', 'Barangay Kagawad', 'Male', '2024-06-06', '2024-05-28', 'Sampassssssle@gmail.com', '$2y$10$bYHR83gMiVbZoRfYkEZy9eOKxoEwzkS8eeAjD3cW4zXYU3LPNFmMS', 'asd.jpg'),
(96651955, 'Andre Thomas', 'Liquido', 'castro', 'Barangay Kagawad', 'Male', '2024-05-29', '2024-05-28', 'Sampaassssssle@gmail.com', '$2y$10$vbAQa4268RhaRiEoYN4M0eHeHTvuiYlD2PZxmtO8Xqi.Nzur3cFdu', 'dr.jpg'),
(96651957, 'ssssssssss', 'ssssssssssssssssss', 'ssssssssssssss', 'Barangay Kagawad', 'Female', '2024-07-06', '2024-06-20', 'sasa@gmail.com', '$2y$10$NpNwXgAt1Z.DQlvemzqsdurxWMKJrmDEY0m9g01WYM.iaMnjA1RpK', '295d350fee7229fa6594d84228591b25.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `archive_my_table`
--

CREATE TABLE `archive_my_table` (
  `ID` int(11) NOT NULL DEFAULT 0,
  `fname` varchar(255) NOT NULL,
  `Mname` varchar(250) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `ContactNumber` varchar(250) NOT NULL,
  `Gender` varchar(250) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `Nickname` varchar(250) NOT NULL,
  `PlaceofBirth` varchar(250) NOT NULL,
  `Dateofbirth` varchar(250) NOT NULL,
  `Age` varchar(250) NOT NULL,
  `CivilStatus` varchar(250) NOT NULL,
  `Purok` varchar(250) NOT NULL,
  `VoterStatus` varchar(250) NOT NULL,
  `Occupation` varchar(250) NOT NULL,
  `Address` varchar(250) NOT NULL,
  `Zipcode` varchar(250) NOT NULL,
  `Citezenship` varchar(250) NOT NULL,
  `Profile` varchar(250) NOT NULL,
  `GovernmentIDFront` varchar(250) NOT NULL,
  `GovernmentIDBack` varchar(250) NOT NULL,
  `Status` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `complaintbl`
--

CREATE TABLE `complaintbl` (
  `ComplainID` int(11) NOT NULL,
  `ComUserID` int(11) NOT NULL,
  `DateofReport` varchar(250) NOT NULL,
  `ComplainantFName` varchar(250) NOT NULL,
  `ComplainantMName` varchar(250) NOT NULL,
  `ComplainantLName` varchar(250) NOT NULL,
  `ContactNumber` varchar(250) NOT NULL,
  `Address` varchar(250) NOT NULL,
  `ComplainDescription` varchar(2000) NOT NULL,
  `TypeofComplaint` varchar(250) NOT NULL,
  `NameofComplainee` varchar(250) NOT NULL,
  `Complaineeaddress` varchar(250) NOT NULL,
  `ProfofEvidence` varchar(250) NOT NULL,
  `ComplainStatus` varchar(250) NOT NULL,
  `SettlementDate` varchar(250) NOT NULL,
  `SettlementTime` varchar(250) NOT NULL,
  `Date-Settled` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `complaintbl`
--

INSERT INTO `complaintbl` (`ComplainID`, `ComUserID`, `DateofReport`, `ComplainantFName`, `ComplainantMName`, `ComplainantLName`, `ContactNumber`, `Address`, `ComplainDescription`, `TypeofComplaint`, `NameofComplainee`, `Complaineeaddress`, `ProfofEvidence`, `ComplainStatus`, `SettlementDate`, `SettlementTime`, `Date-Settled`) VALUES
(174106, 62255244, '2024-05-20', 'sadasda', 'gfhghfgh', 'fgfhghfghfgh', '09917210064', 'asda', 'sssssssssss', 'Stray-animals', 's', 'ssssssssssssssssssssssss', '', 'Settled', '2024-06-01', '22:40', ''),
(386485, 42025748, '2024-05-13', 'Andre Thomas', 'Liquido', 'Castro', '09284864322', '#49 Chikadee St Barangay Muntingdilaw', 'asdasdasd', 'Barking-dogs', 'asdasd', 'asdasd', 'avatar.png', 'On-Schedule', '2024-06-01', '22:55', ''),
(398178, 62255244, '2024-05-22', 'sadasda', 'gfhghfgh', 'fgfhghfghfgh', '09917210064', 'asda', 'assssssssssssss', 'Inadequate-parking-facilities', 'aaaaaa', 'aaaaaaaaaaa', '', 'On-Schedule', '2024-05-29', '22:55', ''),
(472462, 42025748, '2024-07-07', 'Andre Thomas', 'Liquido', 'Castro', '09284864322', '#49 Chikadee St Barangay Muntingdilaw', 'aaaaaaaaaaaaaaaaaaaaaaaa', 'Vandalism-and-graffiti', 'aaaaaaaaaa', 'aaaaaaaaaaaaaaaaa', 'SOFTENG TRIAL ER DIAGRAM.png', 'On-Process', '', '', ''),
(475771, 42025748, '2024-05-15', 'Andre Thomas', 'Liquido', 'Castro', '09284864322', '#49 Chikadee St Barangay Muntingdilaw', 'asdasdasd', 'Vandalism-and-graffiti', 'asdas', 'dasdasd', '', 'On-Schedule', '2024-06-02', '11:33', ''),
(495537, 42025748, '2024-07-23', 'Andre Thomas', 'Liquido', 'Castro', '09284864322', '#49 Chikadee St Barangay Muntingdilaw', 'ddddddddddddddddddddddddddddddddddd', 'Barking-dogs', 'ssssssssssssss', 'sssssssssssssssssssssss', 'SOFTENG TRIAL ER DIAGRAM.png', 'Pending', '', '', ''),
(688587, 42025748, '2024-05-28', 'Andre Thomas', 'Liquido', 'Castro', '09284864322', '#49 Chikadee St Barangay Muntingdilaw', 'Complaints about illegal dumping have surged in recent years, reflecting a growing environmental concern among communities. Illegal dumping, the unauthorized disposal of waste in non-designated areas, poses significant health and environmental risks. It often involves hazardous materials such as chemicals, construction debris, and electronic waste, which can contaminate soil and water sources, leading to long-term ecological damage. Residents and environmental advocacy groups are increasingly vocal about the need for stringent enforcement of waste management laws and the implementation of effective waste disposal facilities. The public outcry highlights the urgent need for local authorities to address the issue through increased surveillance, harsher penalties, and community education initiatives to deter potential offenders.\r\n', 'Illegal-dumping', 'Liliniew Castro', 'Ex San Mateo Rizal ', '', 'On-Schedule', '2024-06-03', '22:59', ''),
(689571, 42025748, '2024-05-23', 'Andre Thomas', 'Liquido', 'Castro', '09284864322', '#49 Chikadee St Barangay Muntingdilaw', 'ssssssssss', 'Power-outages', 'ss', 'sssssssssssssssssssss', '', 'Settled', '', '', ''),
(803015, 62255244, '2024-05-15', 'sadasda', 'gfhghfgh', 'fgfhghfghfgh', '09917210064', 'asda', 'ssssssssssss', 'Traffic-congestion', 'sssssssss', 'sssssssssssss', '', 'On-Schedule', '2024-06-04', '23:03', ''),
(847718, 62255244, '2024-05-22', 'sadasda', 'gfhghfgh', 'fgfhghfghfgh', '09917210064', 'asdaaaaaaaaaa', 'aaaaaaaaaaaa', 'Traffic-congestion', 'aaaaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaa', '', 'Settled', '', '', ''),
(884917, 62255244, '2024-04-22', 'sadasda', 'gfhghfgh', 'fgfhghfghfgh', '09917210064', 'asda', 'ssssssssssss', 'Inadequate-parking-facilities', 'Dorio Santa Santaresa', 'sssssssssss', '', 'On-Process', '2024-05-22', '8:00', ''),
(978164, 42025748, '2024-06-01', 'Andre Thomas', 'Liquido', 'Castro', '09284864322', '#49 Chikadee St Barangay Muntingdilaw', 'assssssssssssssssssssssssssssssss', 'Stray-animals', 'aaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaa', 'avatar.png', 'On-Schedule', '2024-06-21', '21:36', '');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `MessageID` int(11) NOT NULL,
  `SenderID` varchar(250) NOT NULL,
  `SenderProfile` varchar(250) NOT NULL,
  `SenderName` varchar(250) NOT NULL,
  `msg` varchar(1000) NOT NULL,
  `Date` varchar(250) NOT NULL,
  `Time` varchar(250) NOT NULL,
  `MessageImage` varchar(250) NOT NULL,
  `viewed` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`MessageID`, `SenderID`, `SenderProfile`, `SenderName`, `msg`, `Date`, `Time`, `MessageImage`, `viewed`) VALUES
(154463, '42025748', 'asd.jpg', 'Andre Thomas Liquido Castro', 'hi po  ', '6/30/2024', '7:43:11 AM', '68b5b1de60c0ecd37ee5dd2fa7871593.jpg', 1),
(468722, '42025748', 'asd.jpg', 'Andre Thomas Liquido Castro', 'hello po ', '6/28/2024', '10:24:30 PM', '', 1),
(614009, '42025748', 'asd.jpg', 'Andre Thomas Liquido Castro', 'hulo', '6/30/2024', '8:11:13 PM', '', 1),
(677930, '42025748', 'asd.jpg', 'Andre Thomas Liquido Castro', 'kamusta', '6/28/2024', '10:24:47 PM', '', 1),
(762935, '42025748', 'asd.jpg', 'Andre Thomas Liquido Castro', 'hi', '6/28/2024', '10:24:25 PM', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `newsandevents`
--

CREATE TABLE `newsandevents` (
  `NewsID` int(11) NOT NULL,
  `NewsTittle` varchar(250) NOT NULL,
  `NewsContent` varchar(250) NOT NULL,
  `Newstime` varchar(250) NOT NULL,
  `NewsDate` varchar(250) NOT NULL,
  `NewsImages` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `newsandevents`
--

INSERT INTO `newsandevents` (`NewsID`, `NewsTittle`, `NewsContent`, `Newstime`, `NewsDate`, `NewsImages`) VALUES
(219302, 'Dance Revo2', 'hihissss', '10:30', '2024-05-25', '6644c9a7a047d3.81248958.jpg'),
(656505, 'ggggggggggggggggggggggggggggg', 'asdasdasdasd', '10:54', '2024-06-30', '448597507_484528650909399_8876441395503138956_n.jpg'),
(901766, 'Dance Revo 2', 'gjasdasdabsdabsdabsjakjsdkasjdjasdjaskdbakjsbdkajsbdkjasbdkjadbbbbbbbbbbbbbbasdkjabskjdbakjsd', '21:24', '2024-05-24', '66492f230f4cd5.72618012.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `NotificationID` int(11) NOT NULL,
  `ResidentsID` int(11) NOT NULL,
  `NotifHeader` varchar(250) NOT NULL,
  `NotifBody` varchar(250) NOT NULL,
  `NotifImage` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `requestdocument`
--

CREATE TABLE `requestdocument` (
  `RequestID` int(11) NOT NULL,
  `UserID` varchar(250) NOT NULL,
  `FirstName` varchar(250) NOT NULL,
  `Middlename` varchar(250) NOT NULL,
  `Lastname` varchar(250) NOT NULL,
  `ServiceType` varchar(250) NOT NULL,
  `DateRequested` varchar(250) NOT NULL,
  `Address` varchar(250) NOT NULL,
  `DateofBirth` varchar(250) NOT NULL,
  `PlaceofBirth` varchar(250) NOT NULL,
  `Civilstat` varchar(250) NOT NULL,
  `SSSGSIS` varchar(250) NOT NULL,
  `RequestorContactNum` varchar(250) NOT NULL,
  `Contactname` varchar(250) NOT NULL,
  `Contactaddress` varchar(250) NOT NULL,
  `Contactnum` varchar(250) NOT NULL,
  `BusinessAct` varchar(250) NOT NULL,
  `BusinessLoc` varchar(250) NOT NULL,
  `Purpose` varchar(250) NOT NULL,
  `PickUpDate` varchar(250) NOT NULL,
  `Pickuptime` varchar(250) NOT NULL,
  `Status` varchar(250) NOT NULL,
  `RejReason` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `requestdocument`
--

INSERT INTO `requestdocument` (`RequestID`, `UserID`, `FirstName`, `Middlename`, `Lastname`, `ServiceType`, `DateRequested`, `Address`, `DateofBirth`, `PlaceofBirth`, `Civilstat`, `SSSGSIS`, `RequestorContactNum`, `Contactname`, `Contactaddress`, `Contactnum`, `BusinessAct`, `BusinessLoc`, `Purpose`, `PickUpDate`, `Pickuptime`, `Status`, `RejReason`) VALUES
(146087, '42025748', 'Andre Thomas', 'Liquido', 'Castro', 'Certificate of Residency', '2024-05-03', '#49 Chikadee St Barangay Muntingdilaw', '', '', '', '', '', '', '', '', '', '', 'School Enrollment', '2024-06-03', '10:06', 'Completed', ''),
(164376, '42025748', 'Andre Thomas', 'Liquid', 'Castro', 'Certificate of Residency', '2024-06-01', '#49 Chikadee St Barangay Muntingdilaw', '', '', '', '', '', '', '', '', '', '', 'Government Requirements', '', '', 'On-Process', ''),
(166172, '42025748', 'Andre Thomas', 'Liquido', 'castro', 'Certificate of Indigency', '2024-05-12', '#49 Chikadee St Barangay Muntingdilaw', '', '', '', '', '', '', '', '', '', '', 'Legal Matters', '2024-05-02', '12:40', 'On-Process', ''),
(198402, '42025748', 'Andre Thomas', 'Liquido', 'castro', 'Certificate of Residency', '2024-05-16', '#49 Chikadee St Barangay Muntingdilaw', '', '', '', '', '', '', '', '', '', '', 'Government Requirements', '2024-05-27', '01:00', 'Released', ''),
(257022, '42025748', 'Andre Thomas', 'Liquido', 'Castro', 'Certificate of Residency', '2024-06-23', '#49 Chikadee St Barangay Muntingdilaw', '', '', '', '', '', '', '', '', '', '', 'Bank Account', '', '', 'Pending', ''),
(294535, '42025748', 'Andre Thomas', 'Liquido', 'castro', 'Business Clearance', '2024-05-12', '#49 Chikadee St Barangay Muntingdilaw', '', '', '', '', '', '', '', '', 'sd', 'dddddddddddddddd', '', '2024-06-22', '17:53', 'Completed', ''),
(327449, '42025748', 'Andre Thomas', 'Liquido', 'Castro', 'Certificate of Residency', '2024-06-22', '#49 Chikadee St Barangay Muntingdilaw', '', '', '', '', '', '', '', '', '', '', 'Government Requirements', '', '', 'Pending', ''),
(329181, '42025748', 'Andre Thomas', 'Liquido', 'Castro', 'Business Clearance', '2024-05-28', '#49 Chikadee St Barangay Muntingdilaw', '', '', '', '', '', '', '', '', 'Aling nena Business', 'Ermitamanila San lereo St Santamesa Manila', '', '2024-06-01', '22:12', 'Released', ''),
(335947, '39648752', 'lheanna', 'Liquidp', 'castro', 'Certificate of Residency', '2024-06-20', 'chikadee st. Antipolo City Barangay Muntingdilaw', '', '', '', '', '', '', '', '', '', '', 'Legal Matters', '', '', 'Pending', ''),
(358544, '39648752', 'lheanna', 'Liquidp', 'castro', 'Certificate of Indigency', '2024-06-13', 'chikadee st. Antipolo City Barangay Muntingdilaw', '', '', '', '', '', '', '', '', '', '', 'Legal Matters', '', '', 'Pending', ''),
(363798, '42025748', 'Andre Thomas', 'Liquido', 'Castro', 'Certificate of Residency', '2024-06-22', '#49 Chikadee St Barangay Muntingdilaw', '', '', '', '', '', '', '', '', '', '', 'Health Insurance', '', '', 'Pending', ''),
(367158, '42025748', 'Andre Thomas', 'Liquido', 'Castro', 'Certificate of Residency', '2024-06-22', '#49 Chikadee St Barangay Muntingdilaw', '', '', '', '', '', '', '', '', '', '', 'Health Insurance', '', '', 'Pending', ''),
(407125, '42025748', 'Andre Thomas', 'Liquido', 'Castro', 'Barangay Identification', '2024-05-09', '#49 Chikadee St Barangay Muntingdilaw', '2024-04-14', 'Cavite', 'Married', '123123', '', 'asd', 'asd', '123123123', '', '', '', '2024-05-11', '18:45', 'On-Process', ''),
(432343, '42025748', 'Andre Thomas', 'Liquido', 'castro', 'Business Clearance', '2024-05-09', '#49 Chikadee St Barangay Muntingdilaw', '', '', '', '', '', '', '', '', 'asdasdas', 'dasdasdasd', '', '2024-05-27', '03:24', 'Released', ''),
(478620, '39648752', 'lheanna', 'Liquidp', 'castro', 'Certificate of Residency', '2024-06-21', 'chikadee st. Antipolo City Barangay Muntingdilaw', '', '', '', '', '', '', '', '', '', '', 'Government Requirements', '', '', 'Pending', ''),
(494388, '39648752', 'lheanna', 'Liquidp', 'castro', 'Barangay Identification', '2024-06-02', 'chikadee st. Antipolo City Barangay Muntingdilaw', '2024-06-02', 'Taytay rizal', 'Single', '21312323', '234234234', 'asdasd', 'asda', '213123123', '', '', '', '', '', 'On-Process', ''),
(509680, '42025748', 'Andre Thomas', 'Liquido', 'castro', 'Barangay Identification', '2024-05-01', '#49 Chikadee St Barangay Muntingdilaw', '2024-04-14', 'Cavite', 'Married', '2134234', '', 'Anthony', 'SAntamesa', '102312312312', '', '', '', '2024-05-28', '09:48', 'Completed', ''),
(533478, '42025748', 'Andre Thomas', 'Liquido', 'castro', 'Certificate of Residency', '2024-04-28', '#49 Chikadee St Barangay Muntingdilaw', '', '', '', '', '', '', '', '', '', '', 'Government Requirements', '', '', 'Released', ''),
(578908, '42025748', 'Andre Thomas', 'Liquido', 'Castro', 'Certificate of Residency', '2024-06-22', '#49 Chikadee St Barangay Muntingdilaw', '', '', '', '', '', '', '', '', '', '', 'Government Requirements', '', '', 'Pending', ''),
(593487, '42025748', 'Andre Thomas', 'Liquido', 'Castro', 'Certificate of Residency', '2024-06-22', '#49 Chikadee St Barangay Muntingdilaw', '', '', '', '', '', '', '', '', '', '', 'Legal Matters', '', '', 'Pending', ''),
(638261, '42025748', 'Andre Thomass', 'Liquido', 'Castro', 'Certificate of Indigency', '2024-05-31', '#49 Chikadee St Barangay Muntingdilaw', '', '', '', '', '', '', '', '', '', '', 'ID renewal', '2024-06-22', '20:57', 'Completed', ''),
(642571, '62255244', 'sadasda', 'gfhghfgh', 'fgfhghfghfgh', 'Certificate of Residency', '2024-05-15', 'asda', '', '', '', '', '', '', '', '', '', '', 'Legal Matters', '', '', 'Completed', ''),
(648117, '42025748', 'Andre Thomas', 'Liquido', 'Castro', 'Barangay Identification', '2024-04-30', '#49 Chikadee St Barangay Muntingdilaw', '2024-04-14', 'Cavite', 'Married', 'asdasdasd', '09284864322', 'asda', 'sdasdasd', '213123123', '', '', '', '2024-06-24', '20:57', 'Completed', ''),
(863902, '42025748', 'Andre Thomas', 'Liquido', 'castro', 'Certificate of Indigency', '2024-04-26', '#49 Chikadee St Barangay Muntingdilaw', '', '', '', '', '', '', '', '', '', '', 'Government Requirements', '2024-05-11', '09:42', 'Completed', ''),
(871818, '39648752', 'lheanna', 'Liquidp', 'castro', 'Certificate of Indigency', '2024-06-13', 'chikadee st. Antipolo City Barangay Muntingdilaw', '', '', '', '', '', '', '', '', '', '', 'Government Requirements', '', '', 'Pending', ''),
(881984, '42025748', 'Andre Thomas', 'Liquido', 'castro', 'Certificate of Residency', '2024-05-05', '#49 Chikadee St Barangay Muntingdilaw', '', '', '', '', '', '', '', '', '', '', 'Legal Matters', '2024-05-15', '14:26', 'On-Process', ''),
(920113, '42025748', 'Andre Thomas', 'Liquido', 'castro', 'Certificate of Residency', '2024-04-29', '#49 Chikadee St Barangay Muntingdilaw', '', '', '', '', '', '', '', '', '', '', 'School Enrollment', '2024-05-20', '13:49', 'Completed', ''),
(922935, '39648752', 'lheanna', 'Liquidp', 'castro', 'Certificate of Residency', '2024-06-14', 'chikadee st. Antipolo City Barangay Muntingdilaw', '', '', '', '', '', '', '', '', '', '', 'Government Requirements', '', '', 'Pending', ''),
(949449, '42025748', 'Andre Thomas', 'Liquido', 'castro', 'Certificate of Indigency', '2024-05-04', '#49 Chikadee St Barangay Muntingdilaw', '', '', '', '', '', '', '', '', '', '', 'Government Requirements', '', '', 'Rejected', 'baho ng muka mo'),
(950936, '42025748', 'Andre Thomas', 'Liquido', 'Castro', 'Certificate of Residency', '2024-05-29', '#49 Chikadee St Barangay Muntingdilaw', '', '', '', '', '', '', '', '', '', '', 'Bank Account', '', '', 'Rejected', 'no valid ID'),
(973641, '42025748', 'Andre Thomas', 'Liquido', 'castro', 'Certificate of Residency', '2024-05-23', '#49 Chikadee St Barangay Muntingdilaw', '', '', '', '', '', '', '', '', '', '', 'Bank Account', '', '', 'Released', ''),
(989410, '42025748', 'Andre Thomas', 'Liquido', 'Castro', 'Certificate of Residency', '2024-06-22', '#49 Chikadee St Barangay Muntingdilaw', '', '', '', '', '', '', '', '', '', '', 'Government Requirements', '', '', 'Pending', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `Mname` varchar(250) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `ContactNumber` varchar(250) NOT NULL,
  `Gender` varchar(250) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `Nickname` varchar(250) NOT NULL,
  `PlaceofBirth` varchar(250) NOT NULL,
  `Dateofbirth` varchar(250) NOT NULL,
  `Age` varchar(250) NOT NULL,
  `CivilStatus` varchar(250) NOT NULL,
  `Purok` varchar(250) NOT NULL,
  `VoterStatus` varchar(250) NOT NULL,
  `Occupation` varchar(250) NOT NULL,
  `Address` varchar(250) NOT NULL,
  `Zipcode` varchar(250) NOT NULL,
  `Citezenship` varchar(250) NOT NULL,
  `Profile` varchar(250) NOT NULL,
  `GovernmentIDFront` varchar(250) NOT NULL,
  `GovernmentIDBack` varchar(250) NOT NULL,
  `Status` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `fname`, `Mname`, `lname`, `ContactNumber`, `Gender`, `email`, `password`, `Nickname`, `PlaceofBirth`, `Dateofbirth`, `Age`, `CivilStatus`, `Purok`, `VoterStatus`, `Occupation`, `Address`, `Zipcode`, `Citezenship`, `Profile`, `GovernmentIDFront`, `GovernmentIDBack`, `Status`) VALUES
(2853141, 'HANNAH DESIREE', '', 'CASTRO', '09612646119', 'Male', 'HANADdddCT.06@GMAIL.COM', '$2y$10$udI9/BgMM1OYHMAy.Dh.FeUggEC9Rpp6j/akSxRA0o7AN65a7yhWW', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'NotVerified'),
(29346800, 'HANNAH DESIREE', '', 'CASTRO', '09612646119', 'Male', 'HANAdDCT.06@GMAIL.COM', '$2y$10$n2uDkuklEgmg6euXkCYnI.hzlHTKls5gdIBj6Uy4rnJ6yV2EHMqea', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'NotVerified'),
(39648752, 'lheanna', 'Liquidp', 'castro', '234234234', 'Female', 'lheannacastro36@gmail.com', '$2y$10$X4LFpe5bqdOglkxfeIS5B.65yUaLpQ3z6/gxH.S7xZWTugb8uYXDC', 'Leanna', 'Taytay rizal', '2024-06-02', '27', 'Single', 'Purok Rosal', 'Not Registered', 'Back teller', 'chikadee st. Antipolo City Barangay Muntingdilaw', '234234', 'Filipino', '344559212_616862553442238_8160250917885417293_n.jpg', 'license3.jpg', '345804330_602693021816430_3227319303242373257_n.jpg', 'Verified'),
(41736699, 'juylia', 'santiago', 'asdasd', '213123123', 'Male', 'Sample_12!@gmail.com', '$2y$10$Jpyw4SIi./4V9ahd802N5umsbdLqUX3lZULs0sLKwlKvO.eXpVhAS', 'juylia', 'tayray', '2024-06-05', '25', 'Single', 'Purok Rosal', 'Pending Registration', 'sadasdasdasd', 'asdasdasd', '234234234', 'Filipino', 'R.jpg', '344559212_616862553442238_8160250917885417293_n.jpg', 'R.jpg', 'Verified'),
(42025748, 'Andre Thomas', 'Liquido', 'Castro', '09284864322', 'Male', 'castroandre@gmail.com', '$2y$10$wyhIdpWQvgHtiidG6.FXJeQY71ftVWmtdSltIK931LnulAgb8vv12', 'Andre ', 'Cavite', '2024-04-14', '77', 'Married', 'Purok Sunflower', 'Registered', 'driver', '#49 Chikadee St Barangay Muntingdilaw', '1800', 'Filipino', 'asd.jpg', 'avatar.png', '345804330_602693021816430_3227319303242373257_n.jpg', 'Verified'),
(71563121, 'HANNAH DESIREE', '', 'CASTRO', '09612646119', 'Male', 'HANADCT.06@GMAIL.COM', '$2y$10$1GJ29isBwBm7xek5o4RTxuUDQjYucv2g4gBHFw9L0GiK56VNkEM7m', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'NotVerified'),
(97468144, 'HANNAH DESIREE', '', 'CASTRO', '09612646119', 'Male', 'HANADsCT.06@GMAIL.COM', '$2y$10$uIAGt5gkp00XnncJ/Uulx.F1jAPpTpinoZb7MOBBQp1cQlMf8SsZK', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'NotVerified'),
(99009445, 'Andre Thomas', 'Liquido', 'Castro', '09284864322', 'Female', 'castroandre@gmail.com', '$2y$10$wyhIdpWQvgHtiidG6.FXJeQY71ftVWmtdSltIK931LnulAgb8vv12', 'Andre ', 'Cavite', '2024-04-14', '63', 'Married', 'Purok Sunflower', 'Registered', 'driver', '#49 Chikadee St Barangay Muntingdilaw', '1800', 'Filipino', 'asd.jpg', 'avatar.png', '345804330_602693021816430_3227319303242373257_n.jpg', 'Verified');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admintbl`
--
ALTER TABLE `admintbl`
  ADD UNIQUE KEY `AdminID` (`AdminID`);

--
-- Indexes for table `complaintbl`
--
ALTER TABLE `complaintbl`
  ADD UNIQUE KEY `ComplainID` (`ComplainID`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD UNIQUE KEY `MessageID` (`MessageID`);

--
-- Indexes for table `newsandevents`
--
ALTER TABLE `newsandevents`
  ADD PRIMARY KEY (`NewsID`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD UNIQUE KEY `NotificationID` (`NotificationID`,`ResidentsID`),
  ADD UNIQUE KEY `NotificationID_2` (`NotificationID`),
  ADD UNIQUE KEY `NotificationID_3` (`NotificationID`);

--
-- Indexes for table `requestdocument`
--
ALTER TABLE `requestdocument`
  ADD UNIQUE KEY `RequestID` (`RequestID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `ID` (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admintbl`
--
ALTER TABLE `admintbl`
  MODIFY `AdminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96651958;

--
-- AUTO_INCREMENT for table `complaintbl`
--
ALTER TABLE `complaintbl`
  MODIFY `ComplainID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=978165;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `MessageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=762936;

--
-- AUTO_INCREMENT for table `newsandevents`
--
ALTER TABLE `newsandevents`
  MODIFY `NewsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=911292;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `NotificationID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `requestdocument`
--
ALTER TABLE `requestdocument`
  MODIFY `RequestID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=990762;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99009446;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
