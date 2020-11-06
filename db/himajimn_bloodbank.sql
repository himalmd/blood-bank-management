-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 06, 2020 at 12:12 AM
-- Server version: 10.3.24-MariaDB-log-cll-lve
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `himajimn_bloodbank`
--

-- --------------------------------------------------------

--
-- Table structure for table `blood`
--

CREATE TABLE `blood` (
  `BloodID` int(2) NOT NULL,
  `Type` varchar(50) NOT NULL,
  `Description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blood`
--

INSERT INTO `blood` (`BloodID`, `Type`, `Description`) VALUES
(1, 'O+', 'O Positive'),
(2, 'O-', 'O Negative'),
(3, 'A+', 'A Positive'),
(4, 'A-', 'A Negative'),
(5, 'B+', 'B Positive'),
(6, 'B-', 'B Negative'),
(7, 'AB+', 'AB Positive'),
(8, 'AB-', 'AB Negative');

-- --------------------------------------------------------

--
-- Table structure for table `blood_bank_admin`
--

CREATE TABLE `blood_bank_admin` (
  `BAdminID` int(10) NOT NULL,
  `NIC` varchar(15) NOT NULL,
  `FirstName` varchar(100) NOT NULL,
  `LastName` varchar(100) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Grade` varchar(50) NOT NULL,
  `BloodBankID` int(10) NOT NULL,
  `Email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blood_bank_admin`
--

INSERT INTO `blood_bank_admin` (`BAdminID`, `NIC`, `FirstName`, `LastName`, `Password`, `Grade`, `BloodBankID`, `Email`) VALUES
(15, '970000000V', 'Nuwan', 'Zetti', '$2y$10$memGHPdbKNf1//ZDwlvAQuLYZk28tm.mAfJ15KpCc9bh2lhZBApra', '', 10, 'sfhgsfhdtrh4563875@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `blood_bank_hospital`
--

CREATE TABLE `blood_bank_hospital` (
  `HospitalID` int(100) NOT NULL,
  `Name` varchar(200) NOT NULL,
  `Address` varchar(200) NOT NULL,
  `District` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blood_bank_hospital`
--

INSERT INTO `blood_bank_hospital` (`HospitalID`, `Name`, `Address`, `District`) VALUES
(10, 'Ragama Hospital', 'Ragama', 'Gampaha'),
(11, 'Ganemulla Hospital', 'Ganemulla RD', 'Gampaha');

-- --------------------------------------------------------

--
-- Table structure for table `blood_bank_hospital_telephone`
--

CREATE TABLE `blood_bank_hospital_telephone` (
  `BBID` int(10) NOT NULL,
  `TelephoneNo` int(10) NOT NULL,
  `Flag` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blood_bank_hospital_telephone`
--

INSERT INTO `blood_bank_hospital_telephone` (`BBID`, `TelephoneNo`, `Flag`) VALUES
(10, 335555555, 1),
(10, 667777777, 0),
(11, 664444444, 1),
(11, 665555555, 0);

-- --------------------------------------------------------

--
-- Table structure for table `blood_bank_request`
--

CREATE TABLE `blood_bank_request` (
  `ID` varchar(100) NOT NULL,
  `SenderID` int(100) NOT NULL,
  `ReceiverID` varchar(100) NOT NULL,
  `Type` varchar(50) NOT NULL,
  `Amount` varchar(500) NOT NULL,
  `Dates` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `blood_stock`
--

CREATE TABLE `blood_stock` (
  `StockID` int(100) NOT NULL,
  `BloodID` int(10) NOT NULL,
  `Volume` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blood_stock`
--

INSERT INTO `blood_stock` (`StockID`, `BloodID`, `Volume`) VALUES
(10, 1, 819),
(10, 2, NULL),
(10, 3, 200),
(10, 4, 464),
(10, 5, NULL),
(10, 6, NULL),
(10, 7, NULL),
(10, 8, NULL),
(11, 1, NULL),
(11, 2, NULL),
(11, 3, NULL),
(11, 4, NULL),
(11, 5, NULL),
(11, 6, NULL),
(11, 7, NULL),
(11, 8, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `campaign`
--

CREATE TABLE `campaign` (
  `CampaignID` int(10) NOT NULL,
  `Name` varchar(500) NOT NULL,
  `Location` varchar(500) NOT NULL,
  `Estimate` varchar(500) NOT NULL,
  `BHospitalID` int(10) NOT NULL,
  `Dates` varchar(12) NOT NULL,
  `Tme` time NOT NULL,
  `OrganizationID` varchar(100) NOT NULL,
  `Flag` tinyint(1) NOT NULL,
  `Email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `campaign`
--

INSERT INTO `campaign` (`CampaignID`, `Name`, `Location`, `Estimate`, `BHospitalID`, `Dates`, `Tme`, `OrganizationID`, `Flag`, `Email`) VALUES
(27, 'Little Hearts', 'Jaffna School', '40', 10, '2020-11-27', '04:37:00', 'sandun', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `cash_donation`
--

CREATE TABLE `cash_donation` (
  `CashID` int(100) NOT NULL,
  `RequesterID` varchar(10) NOT NULL,
  `Amount` int(250) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `choose_campaign`
--

CREATE TABLE `choose_campaign` (
  `Id` int(100) NOT NULL,
  `campId` int(100) NOT NULL,
  `donorId` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `choose_hospital`
--

CREATE TABLE `choose_hospital` (
  `Id` int(100) NOT NULL,
  `donorId` int(100) NOT NULL,
  `hodId` int(100) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `donate_campaign`
--

CREATE TABLE `donate_campaign` (
  `DonateID` int(100) NOT NULL,
  `CampID` int(100) NOT NULL,
  `DonorID` varchar(15) NOT NULL,
  `Volume` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `donate_hospital`
--

CREATE TABLE `donate_hospital` (
  `DonateID` int(100) NOT NULL,
  `HospitalID` int(100) NOT NULL,
  `DonorID` varchar(15) NOT NULL,
  `Dates` date NOT NULL,
  `Tme` varchar(15) NOT NULL,
  `Volume` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donate_hospital`
--

INSERT INTO `donate_hospital` (`DonateID`, `HospitalID`, `DonorID`, `Dates`, `Tme`, `Volume`) VALUES
(13, 10, '971234567v', '2020-11-05', '09:17:52am', 464),
(14, 10, '971234567v', '2020-11-05', '09:20:28am', 200),
(15, 10, '971234567v', '2020-11-05', '09:30:24am', 100),
(16, 10, '971234567v', '2020-11-05', '09:31:17am', 55);

-- --------------------------------------------------------

--
-- Table structure for table `donor`
--

CREATE TABLE `donor` (
  `nic` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `bloodgroup` varchar(4) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `district` varchar(20) NOT NULL,
  `addressline1` varchar(255) NOT NULL,
  `addressline2` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `status` varchar(5000) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `validation` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donor`
--

INSERT INTO `donor` (`nic`, `password`, `first_name`, `last_name`, `dob`, `bloodgroup`, `gender`, `district`, `addressline1`, `addressline2`, `email`, `status`, `created_at`, `validation`) VALUES
('960410580V', '$2y$10$GXebwhGMcgixFXqXCbWIN.yC6FsLth6NIVs81AARBQ9TU6DbmLI3C', 'Himal', 'Malith', '2020-10-17', 'O+', 'male', 'Ampara', 'Haggamuwa Road, Alankulama, Sravasthipura', 'Kolila 3', 'dphmalith@gmail.com', '', '2020-10-29 11:59:30', 0),
('971111111V', '$2y$10$1wNJCn7cP8e2NEKi/XYv0.z6CktklqQQEnVHnXR/NjxkqoiyAM9rW', 'Ranmal', 'Rathnayaka', '2020-10-01', 'O+', 'male', 'Batticaloa', '87/5, yagoda rd', 'yagoda', '', 'Good Health', '2020-10-25 10:27:48', 1),
('971234567V', '$2y$10$fX0G4Lg8acNJ32ZfGDlU1uokoCXY7FcJPMrf1M/qh1vRB9vO/43P2', 'Pissu', 'kanna', '2020-10-24', 'O+', 'male', 'Gampaha', '87/5, yagoda rd', 'yagoda', 'madushankanipunajith@gmail.com', 'kXPzUx6WvjBSDfAgs7JUXWIxWCcLZpTf', '2020-10-24 23:15:46', 1),
('972222222V', '$2y$10$wOgcMtTN.5/bJrczgXaRLeSnxPiSZ2W7Z8leLfT11WAmBls35DOUa', 'Nimal', 'Lanzza', '2020-10-11', 'B+', 'male', 'Matale', '87/5, yagoda rd', 'yagoda', '', 'Not Good', '2020-10-25 10:40:06', 0),
('972723818V', '$2y$10$gb2gaBvDVo45RDm3QNX82uPrAt0.47CLH2CmSAfmwyTh4aGtARXKe', 'adithya', 'deshan', '2020-03-10', 'O+', 'male', 'Gampaha', '168C,Oruthota,Gampaha', '', '', '', '2020-10-26 09:34:22', 1),
('972723819V', '$2y$10$a0MXeYeYk5/xBBOSsQOaDOWoUnBKg1r36kdIHIkUTaJ/ex6Gtb/yW', 'madusanka', 'nipunajith', '2020-10-06', 'B+', 'male', 'Gampaha', '168B,Oruthota,Gampaha', '', 'madushankanipunajith@gmail.com', '', '2020-10-26 09:28:49', 1),
('973333333V', '$2y$10$9H2W4JUjK2c5pZTbMFtK2.KxdMwLQa59s0jZQiscmn/WL8hok/NYu', 'Amal', 'Perera', '2020-10-06', 'A-', 'male', 'Matale', '87/5, yagoda rd', 'yagoda', '', '', '2020-10-25 11:26:15', 0),
('975555555V', '$2y$10$g4KyI3h5zre54Pf/G1leieGvDkhXpugJwpjTsx4aD2SSvv1O03dja', 'Lila', 'Gunasekara', '2020-11-02', 'B-', 'female', 'Matale', '87/5, yagoda rd', 'yagoda', 'kcjgjuydutdkuh@gmail.com', '', '2020-11-05 03:56:37', 0),
('976666666V', '$2y$10$f89XPtaXTe1B9gZFiCc43e145tO9wNTf71KP.ehVYuOZJM2SZa/sW', 'Nuwan', 'Pradeep', '2020-10-25', 'AB+', 'male', 'Mannar', '87/5, yagoda rd', 'yagoda', 'madushankanipunajith@gmail.com', '', '2020-10-29 23:32:21', 0);

-- --------------------------------------------------------

--
-- Table structure for table `donor_reservation`
--

CREATE TABLE `donor_reservation` (
  `ID` int(10) NOT NULL,
  `HosID` int(10) NOT NULL,
  `DonorID` varchar(15) NOT NULL,
  `Dates` date NOT NULL,
  `Tme` time NOT NULL,
  `Flag` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `donor_satisfaction`
--

CREATE TABLE `donor_satisfaction` (
  `HospitalID` int(5) NOT NULL,
  `DonorID` varchar(15) NOT NULL,
  `Satisfaction` int(2) NOT NULL,
  `Validation` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donor_satisfaction`
--

INSERT INTO `donor_satisfaction` (`HospitalID`, `DonorID`, `Satisfaction`, `Validation`) VALUES
(10, '971234567v', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `donor_telephone`
--

CREATE TABLE `donor_telephone` (
  `NIC` varchar(15) NOT NULL,
  `TelephoneNo` varchar(10) NOT NULL,
  `Flag` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donor_telephone`
--

INSERT INTO `donor_telephone` (`NIC`, `TelephoneNo`, `Flag`) VALUES
('960410580V', '0767239908', 1),
('971111111V', '0332222222', 1),
('971111111V', '0556666666', 0),
('971234567V', '0225555555', 1),
('971234567V', '0997777777', 0),
('972222222V', '0335555555', 0),
('972222222V', '0665555555', 1),
('972723818V', '0332228526', 1),
('972723818V', '0332234782', 0),
('972723819V', '', 0),
('972723819V', '0712081918', 1),
('973333333V', '0332121212', 1),
('973333333V', '0332121252', 0),
('975555555V', '0664444444', 1),
('975555555V', '0665555555', 0),
('976666666V', '0334444444', 1),
('976666666V', '0665555555', 0);

-- --------------------------------------------------------

--
-- Table structure for table `normal_blood_request`
--

CREATE TABLE `normal_blood_request` (
  `ID` int(100) NOT NULL,
  `SenderID` int(100) NOT NULL,
  `ReceiverID` int(100) NOT NULL,
  `Type` varchar(50) NOT NULL,
  `Amount` varchar(500) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `normal_hospital`
--

CREATE TABLE `normal_hospital` (
  `UserName` varchar(200) NOT NULL,
  `Name` varchar(200) NOT NULL,
  `Address` varchar(200) NOT NULL,
  `District` varchar(15) NOT NULL,
  `Chief` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `normal_hospital`
--

INSERT INTO `normal_hospital` (`UserName`, `Name`, `Address`, `District`, `Chief`, `Password`, `Email`) VALUES
('0987654', 'kurunegala teaching hospital', 'colombo road, kurunegala', 'Kegalle', 'Dr. C.Perera', '$2y$10$KwHLgMLrckAylNDtsbB04u8/l1Q9AKKzFl1eWRveZ2G1bg73Wplni', 'ppp@gmail.com'),
('1234567', 'main', 'puththalama, halawatha', 'Kalutara', 'dr. jaffna', '$2y$10$7EhPqBmIC0VtBUC0YFn//OnbFdFosTulWm7Jmmn5smYsZ65k4sCmO', 'main@gmail.com'),
('971234567V', 'Yagoda Hospital', 'Yaogda RD, Yagoda', 'Gampaha', 'Dr. Amila', '$2y$10$YvYtNUTwkxpIilQZspsqe.6ZHfP8a82RVsIJz5EM5EU.N2EugB0UK', ''),
('asdfghj', 'hambanthota hospital', 'sooriyawewa, hambanthota', 'Kalutara', 'Dr.Perera', '$2y$10$aZNG5pCxpPutZapdRur3UOyA4o0NzI6V7FwQMa7vMLQph2O0Qy.WG', ''),
('gfdgdg', 'uryeuyru', 'bhgy', 'hdtruuwrg', 'cccccc', '$2y$10$mta3aHFQkOKt3Tkevoij9u5owYl4zYVNnlv2ifjHlysDsOYOM9j8K', ''),
('Gune', 'Ja-ela Hospital', 'Ragama', 'Batticaloa', 'Dr. Gune', '$2y$10$QhHlwNnNcnsNpT03qPaczemG.uw8HuzeLCZ9lfXgdZjP2lxjgTco2', ''),
('hambanHos', 'hambanthota hospital', 'sooriyawewa, hambanthota', 'Hambantota', 'dr. hambanthota', '$2y$10$wQqVGNDalQc0C2thQPCOteJBIXyoEgEPMUhLoNthlEeocGwVzgZui', ''),
('himajimn_bloodbank', 'jaffna hospital', 'kilinochchi', 'Jaffna', 'dr. jaffna', '$2y$10$oMxWzQY0db.pMpPgYFIowehRWI7rKskallw4Hv2t9ScVc0uaZlOBK', ''),
('Hospitalku', 'kuliyapitiya hospital', 'kuliyaitiya, kurunegala', 'kuruneala', 'Dr. Nimal', '$2y$10$FjR3QX.0KJmhN3vVblIol.tywAcx1PmXjJIfMmTyG6Ipgu7k5.CzW', ''),
('Janith', 'Yagoda isapiritale', '168b, Oruthota', 'Gampaha', 'MaduRox', '$2y$10$zovRL/pFt1STomeoIUZGzelBM2gH0F/ZrJH7zeMWGlUqL/m9cztcC', ''),
('Kamals', 'Oruthota Hospital', 'Oruthota RD', 'Gampaha', 'Dr. Kamals Herath', '$2y$10$pQodqImWXIjjiplFyQKTAu70GJM/8lhDS3Y2sXEy.xMPzc3WKqdzu', ''),
('Kuhospital', 'kurunegala teaching hospital', 'colombo road, kurunegala', 'kurunegala', 'Dr. C.Perera', '$2y$10$kim4vJcJx9u25SyprBwnheR/Q78GCp0ClUDpR1kMg0OVoVj40Ob8G', ''),
('lkjhgfd', 'hambanthota hospital', 'kilinochchi', 'Anuradhapura', 'dr. hambanthota', '$2y$10$WDuo24b8Y5qx/HiFlgluh.19Jx9n0eRkNfp.V1szVhKko9/Zj28Ki', ''),
('main', 'main', 'main', 'Badulla', 'main', '$2y$10$l3kSN2LMs91tkCI2/sAPSOqe/HnVE2aFOX1ITPY8vq4MGcAfolNDG', ''),
('maintest', 'main', 'main', 'Ampara', 'main', '$2y$10$/6c7awJUaKm9Yain7.IAG./g32XjStbb/6CQX.7oNTMbgAwpTTSIK', 'main@gmail.com'),
('mbvcxz', 'jaffna hospital', 'sooriyawewa, hambanthota', 'Ampara', 'Dr. Perera', '$2y$10$uc8aidRQLqLXZOQsVxA/aO0K6hbf2hpSSV.zPswImeilhZJwrq.te', ''),
('mnbvcxz', 'kurunegala teaching hospital', 'colombo road, kurunegala', 'Kurunegala', 'Dr. Rathnayaka', '$2y$10$7ws.xow3pL6E5n4dg615W.ZFc9wxEQqKkDieAqo8l/EvxMNIZs8Di', 'kuru@gmail.com'),
('test', 'test', 'test', 'Gampaha', 'test', 'efe6398127928f1b2e9ef3207fb82663', 'test@test.com'),
('zxcvbnm', 'halawatha hospital', 'puththalama, halawatha', 'Puttalam', 'Dr. Perera', '$2y$10$VenB.HmD5sj/NSZhUe7KVutTO5PpGgrNZP2C.QYD5G7ZKWZeo9OlW', '');

-- --------------------------------------------------------

--
-- Table structure for table `normal_hospital2`
--

CREATE TABLE `normal_hospital2` (
  `NHospitalID` int(250) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Chief` varchar(100) NOT NULL,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `normal_hospital2`
--

INSERT INTO `normal_hospital2` (`NHospitalID`, `Name`, `Address`, `Chief`, `UserName`, `Password`) VALUES
(1, 'kurunegala teaching hospital', 'colombo road, kurunegala', 'Dr. C.Perera', 'Kuhospital', '$2y$10$CQr5MLVkAfxVIdZ0hLGmWevrqppAtvo0TQPCmf6l.VEma9dfsLoNi');

-- --------------------------------------------------------

--
-- Table structure for table `normal_hospital_telephone`
--

CREATE TABLE `normal_hospital_telephone` (
  `username` varchar(100) NOT NULL,
  `TelephoneNo` int(10) NOT NULL,
  `flag` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `normal_hospital_telephone`
--

INSERT INTO `normal_hospital_telephone` (`username`, `TelephoneNo`, `flag`) VALUES
('0987654', 371234588, 1),
('0987654', 753214567, 0),
('1234567', 764322123, 1),
('main', 764322123, 1),
('maintest', 764322123, 1),
('mnbvcxz', 1232134500, 1),
('mnbvcxz', 1232134501, 0);

-- --------------------------------------------------------

--
-- Table structure for table `organization`
--

CREATE TABLE `organization` (
  `UserName` varchar(100) NOT NULL,
  `OrganizationName` varchar(200) NOT NULL,
  `District` varchar(50) NOT NULL,
  `President` varchar(100) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Purpose` varchar(500) NOT NULL,
  `Created_At` datetime DEFAULT current_timestamp(),
  `Email` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `organization`
--

INSERT INTO `organization` (`UserName`, `OrganizationName`, `District`, `President`, `Password`, `Purpose`, `Created_At`, `Email`) VALUES
('951111111V', 'Ganga Addara', 'Colombo', 'pasindu', '$2y$10$Z.zIPWqbZjQ7A6XDTN1dLOUVEh84q6tzi6bD3u8VCmrM1SQ9YiSB2', 'To help people', '2020-10-26 09:41:31', ''),
('asdfghj', 'saman kakulu', 'Ampara', 'saman', '$2y$10$/jVytKrsddc3YiHivbcLvOdyE9rltWEqqYKl49y6CGm0VxiNOYVwq', '', '2020-10-27 11:25:32', ''),
('hfyuryf', 'hrurhhg', 'Ampara', 'hdjhfsih', '$2y$10$JqqSDOKcPa5jgAlfSBfAhukFE4LHVZsOw94LBFmVvGYptWYjAcB8u', '', '2020-11-02 09:24:37', 'hfhutk@gmail.com'),
('kanna', 'Kanna stor', 'Colombo', 'Pissu Kanna', '$2y$10$PeCjCsiPmTd9GzFb8pjec.wH1//wd8g86/REt3wiK6gA5FDbyKncK', 'Mmmmmmmmmmmmmmmmmmmm.........                                                                                                                                                                                                                                                                                                ', '2020-10-25 01:45:25', 'jgfufvuhgxdyfixcyfr@gmail.com'),
('Kuppa', 'Kuppa Cinema', 'Kegalle', 'Sookiri Banda', '$2y$10$qTiR9zwHk6qn6QhParCz7.CI0tYQxfd5FGUMLQoKqK/EfjY/1e5eO', 'Hari Hari Hari......', '2020-10-30 07:59:25', 'madushankanipunajith@gmail.com'),
('lkjhgfd', 'saman kakulu', 'Galle', 'nimal', '$2y$10$4eYVybYuVRbj5ZGqFfQf9.zKZvfmnqx/.81QP0Mi96IKIE40uzwdS', '', '2020-10-27 11:20:16', ''),
('nimalK', 'saman kakulu', 'Ampara', 'nimal', '$2y$10$FlNjTChjkcHcAXM2hpZkBuHu8lNTPmDHNXeWZbpt5pXbly5bu/40O', '', '2020-10-27 03:11:21', ''),
('samanK1', 'saman kakulu', 'Kurunegala', 'Saman', '$2y$10$HbsgePFq8.bp8elPsOM4NuhWqQn.wf2zb8jbuFWK9i3aqRzXCLcna', '                                                                                                ', '2020-10-27 02:43:28', ''),
('sandun', 'Muthu Ahura', 'Gampaha', 'sandun galpatha', '$2y$10$v.LLSWmavmdkiUSbExGxOOmDnwi.zhPpfRg8Cjox4f8MPeO3pQvkW', 'fndtrdju rdsmykm                                                ', '2020-10-25 09:24:39', 'gayanlaksiri@gmail.com'),
('sookiri', 'Suwanda Saban', 'Kurunegala', 'Nana Sookiri banda', '$2y$10$SqT.Jr.30muVsqBmuNaOYOLq1G3dqNHt/Sgs9j60Y8iHXuXKM9rkG', 'ow****', '2020-10-25 10:42:26', '');

-- --------------------------------------------------------

--
-- Table structure for table `organization_telephone`
--

CREATE TABLE `organization_telephone` (
  `OrgId` varchar(100) NOT NULL,
  `TelephoneNo` varchar(11) NOT NULL,
  `Flag` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `organization_telephone`
--

INSERT INTO `organization_telephone` (`OrgId`, `TelephoneNo`, `Flag`) VALUES
('samanK1', '', 0),
('sookiri', '0112222222', 0),
('Kuppa', '0221111111', 1),
('sookiri', '0223333333', 1),
('sandun', '0330000000', 0),
('sandun', '0331111111', 1),
('951111111V', '0332234782', 1),
('kanna', '0334444444', 1),
('kanna', '0335555555', 0),
('Kuppa', '0668888888', 0),
('asdfghj', '0764322123', 1),
('lkjhgfd', '0764322123', 1),
('samanK1', '0987654321', 1),
('hfyuryf', '1232134567', 1),
('nimalK', '9875678754', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`id`, `email`, `token`) VALUES
(0, 'dphmalith@gmail.com', 'f34ea60ad01e2d1a9288104adcc766e0f7c51a4e29f95afd7d069c16f2bd8b58a8e8c351cfa37a48334d137bf05e359558b5'),
(0, 'dphmalith@gmail.com', 'b4848dc4703a32d9ef6c043d6c8315a60875d2d0c869a5be6ee168c41456516417f23cd52a10e5788faf42fa9b7964a977db'),
(0, 'dphmalith@gmail.com', 'e7264114837db3fcd63eb92a5176a01076ac41612e276aa0ae464bca80a1e6fa34763323e801eb72da4de68b754bcfad446a'),
(0, 'dphmalith@gmail.com', '85809aa3f954bd84719bec16ccdc3631f2006d8822399f8c8e8b05fbd1e75fe0e075ca6f9ad1d6e7b71314a8d8c446e59e50'),
(0, 'dphmalith@gmail.com', 'b8176139bcf8552da9429244c5debcc88fb9c66cb24d749dc3386e3daf382c235ad87d2ce13398dbd6cd064f3c0fe5f3cb51'),
(0, 'dphmalith@gmail.com', '2142dfbf4da405a562764bfbf3ff0f3021e664cb4bad9c03269174cb2f0b12d2289e75bd0d0de6c40ca765bd1340b8ac1d48'),
(0, 'dphmalith@gmail.com', 'ee8c99fba65d041d2c691303fd7bd2c63fe29eb36e2f931877e647a0425d4e3e633848303170871f7df2281fc02899342638'),
(0, 'dphmalith@gmail.com', 'bb393212cea9a42528fa6ca36e7e8193f4438979c4f8db5675364fec1de43814ccf709cc6cf4cceef3c2cad97ee305f2a6e9'),
(0, 'madushankanipunajith@gmail.com', '0e3e6e45747e869f6c911187c318e5f659a9c232c496fef85c9f1aac6224fb3e3d64856214ffa738709d16fd084b522f5a8b'),
(0, 'madushankanipunajith@gmail.com', '7a85b673dfb4c5e62a846ce212125b74b77b6d09b4f9739da42c2a3fff8d2e45a153790ccd3a675d99a065c8c09a96dd691c');

-- --------------------------------------------------------

--
-- Table structure for table `requestor`
--

CREATE TABLE `requestor` (
  `NIC` varchar(15) NOT NULL,
  `FirstName` varchar(20) NOT NULL,
  `LastName` varchar(20) NOT NULL,
  `DateOfBirth` date NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Lane1` varchar(100) NOT NULL,
  `Lane2` varchar(20) DEFAULT NULL,
  `District` varchar(100) NOT NULL,
  `Gender` varchar(7) NOT NULL,
  `CreatedAt` datetime DEFAULT current_timestamp(),
  `Email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `requestor`
--

INSERT INTO `requestor` (`NIC`, `FirstName`, `LastName`, `DateOfBirth`, `Password`, `Lane1`, `Lane2`, `District`, `Gender`, `CreatedAt`, `Email`) VALUES
('960410580V', 'Himal', 'Malith', '2020-10-23', '$2y$10$2L4ZxthHvkgINsJRjdBnV.LqOwJeZdzDncmgtqYUcFZm8lM7PzO4O', 'Haggamuwa Road, Alankulama, Sravasthipura', 'Kolila 3', 'Anuradhapura', 'male', '2020-10-27 12:36:25', ''),
('972222222v', 'Thama', 'Danna', '2020-10-11', '$2y$10$L/FZdhzfOIL1j3gKnEJVK.95cXh/RCerOKTB0sZZ0VI9XlqUpnz3K', '87/5, yagoda rd', 'yagoda', 'Gampaha', 'male', '2020-10-25 03:38:16', 'gayanlaksiri@gmail.com'),
('973333333V', 'csccsc', 'sbdsbd', '2020-10-16', '$2y$10$LWFB9BBUSoIH09uIP1SZq.f.U3GoHv9UExv3RpLD8NnL83ikgr7.a', 'kandy', '', 'Kandy', 'female', '2020-10-30 10:08:34', 'tett@gamil.com'),
('978888888V', 'Gayan', 'Laksiri', '2020-10-13', '$2y$10$0iJc1ntHw0Ms38BNVrElWepLAPDRuXyP5l4ROmjIOgFdWuGYS7QTa', '87/5, yagoda rd', 'yagoda', 'Colombo', 'male', '2020-10-30 07:48:05', 'gayanlaksiri@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `requestor_telephone`
--

CREATE TABLE `requestor_telephone` (
  `NIC` varchar(15) NOT NULL,
  `TelephoneNo` varchar(10) NOT NULL,
  `Flag` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `requestor_telephone`
--

INSERT INTO `requestor_telephone` (`NIC`, `TelephoneNo`, `Flag`) VALUES
('960410580V', '0767239908', 1),
('972222222v', '0115555555', 0),
('972222222v', '0333333333', 1),
('973333333V', '0765433213', 1),
('978888888V', '0336666666', 1),
('978888888V', '0663333333', 0);

-- --------------------------------------------------------

--
-- Table structure for table `super_admin`
--

CREATE TABLE `super_admin` (
  `SID` int(3) NOT NULL,
  `UserName` varchar(200) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `super_admin`
--

INSERT INTO `super_admin` (`SID`, `UserName`, `Password`, `Email`) VALUES
(1, 'Anonymus', '$2y$10$LrU6qeB8iUaB22qjZPentu9vMSwVXvAMNWV00bmShvCZUa4tDsVBW', 'madushankanipunajith@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blood`
--
ALTER TABLE `blood`
  ADD PRIMARY KEY (`BloodID`);

--
-- Indexes for table `blood_bank_admin`
--
ALTER TABLE `blood_bank_admin`
  ADD PRIMARY KEY (`BAdminID`),
  ADD KEY `BloodBankID` (`BloodBankID`);

--
-- Indexes for table `blood_bank_hospital`
--
ALTER TABLE `blood_bank_hospital`
  ADD PRIMARY KEY (`HospitalID`);

--
-- Indexes for table `blood_bank_hospital_telephone`
--
ALTER TABLE `blood_bank_hospital_telephone`
  ADD PRIMARY KEY (`BBID`,`TelephoneNo`);

--
-- Indexes for table `blood_bank_request`
--
ALTER TABLE `blood_bank_request`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ReceiverID` (`ReceiverID`),
  ADD KEY `SenderID` (`SenderID`);

--
-- Indexes for table `blood_stock`
--
ALTER TABLE `blood_stock`
  ADD PRIMARY KEY (`StockID`,`BloodID`),
  ADD KEY `blood_stock_ibfk_2` (`BloodID`);

--
-- Indexes for table `campaign`
--
ALTER TABLE `campaign`
  ADD PRIMARY KEY (`CampaignID`),
  ADD KEY `campaign_ibfk_3` (`BHospitalID`),
  ADD KEY `campaign_ibfk_4` (`OrganizationID`);

--
-- Indexes for table `cash_donation`
--
ALTER TABLE `cash_donation`
  ADD PRIMARY KEY (`CashID`),
  ADD KEY `cash_donation_ibfk_1` (`RequesterID`);

--
-- Indexes for table `choose_campaign`
--
ALTER TABLE `choose_campaign`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `choose_hospital`
--
ALTER TABLE `choose_hospital`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `donate_campaign`
--
ALTER TABLE `donate_campaign`
  ADD PRIMARY KEY (`DonateID`),
  ADD KEY `donate_campaign_ibfk_3` (`CampID`);

--
-- Indexes for table `donate_hospital`
--
ALTER TABLE `donate_hospital`
  ADD PRIMARY KEY (`DonateID`),
  ADD KEY `hosId` (`HospitalID`);

--
-- Indexes for table `donor`
--
ALTER TABLE `donor`
  ADD PRIMARY KEY (`nic`);

--
-- Indexes for table `donor_reservation`
--
ALTER TABLE `donor_reservation`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `HosID` (`HosID`),
  ADD KEY `DonorID` (`DonorID`);

--
-- Indexes for table `donor_satisfaction`
--
ALTER TABLE `donor_satisfaction`
  ADD PRIMARY KEY (`HospitalID`,`DonorID`),
  ADD KEY `DonorID` (`DonorID`);

--
-- Indexes for table `donor_telephone`
--
ALTER TABLE `donor_telephone`
  ADD PRIMARY KEY (`NIC`,`TelephoneNo`);

--
-- Indexes for table `normal_blood_request`
--
ALTER TABLE `normal_blood_request`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `SenderID` (`SenderID`);

--
-- Indexes for table `normal_hospital`
--
ALTER TABLE `normal_hospital`
  ADD PRIMARY KEY (`UserName`);

--
-- Indexes for table `normal_hospital2`
--
ALTER TABLE `normal_hospital2`
  ADD PRIMARY KEY (`NHospitalID`);

--
-- Indexes for table `normal_hospital_telephone`
--
ALTER TABLE `normal_hospital_telephone`
  ADD PRIMARY KEY (`TelephoneNo`,`username`) USING BTREE,
  ADD KEY `username` (`username`);

--
-- Indexes for table `organization`
--
ALTER TABLE `organization`
  ADD PRIMARY KEY (`UserName`);

--
-- Indexes for table `organization_telephone`
--
ALTER TABLE `organization_telephone`
  ADD PRIMARY KEY (`TelephoneNo`,`OrgId`) USING BTREE,
  ADD KEY `OrgId` (`OrgId`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD UNIQUE KEY `token` (`token`);

--
-- Indexes for table `requestor`
--
ALTER TABLE `requestor`
  ADD PRIMARY KEY (`NIC`);

--
-- Indexes for table `requestor_telephone`
--
ALTER TABLE `requestor_telephone`
  ADD PRIMARY KEY (`NIC`,`TelephoneNo`);

--
-- Indexes for table `super_admin`
--
ALTER TABLE `super_admin`
  ADD PRIMARY KEY (`SID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blood_bank_admin`
--
ALTER TABLE `blood_bank_admin`
  MODIFY `BAdminID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `blood_bank_hospital`
--
ALTER TABLE `blood_bank_hospital`
  MODIFY `HospitalID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `campaign`
--
ALTER TABLE `campaign`
  MODIFY `CampaignID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `cash_donation`
--
ALTER TABLE `cash_donation`
  MODIFY `CashID` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `choose_campaign`
--
ALTER TABLE `choose_campaign`
  MODIFY `Id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `choose_hospital`
--
ALTER TABLE `choose_hospital`
  MODIFY `Id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `donate_campaign`
--
ALTER TABLE `donate_campaign`
  MODIFY `DonateID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `donate_hospital`
--
ALTER TABLE `donate_hospital`
  MODIFY `DonateID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `donor_reservation`
--
ALTER TABLE `donor_reservation`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `normal_blood_request`
--
ALTER TABLE `normal_blood_request`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `normal_hospital2`
--
ALTER TABLE `normal_hospital2`
  MODIFY `NHospitalID` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `super_admin`
--
ALTER TABLE `super_admin`
  MODIFY `SID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blood_bank_admin`
--
ALTER TABLE `blood_bank_admin`
  ADD CONSTRAINT `blood_bank_admin_ibfk_1` FOREIGN KEY (`BloodBankID`) REFERENCES `blood_bank_hospital` (`HospitalID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `blood_bank_hospital_telephone`
--
ALTER TABLE `blood_bank_hospital_telephone`
  ADD CONSTRAINT `blood_bank_hospital_telephone_ibfk_1` FOREIGN KEY (`BBID`) REFERENCES `blood_bank_hospital` (`HospitalID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `blood_bank_request`
--
ALTER TABLE `blood_bank_request`
  ADD CONSTRAINT `blood_bank_request_ibfk_1` FOREIGN KEY (`ReceiverID`) REFERENCES `normal_hospital` (`UserName`),
  ADD CONSTRAINT `blood_bank_request_ibfk_2` FOREIGN KEY (`SenderID`) REFERENCES `blood_bank_hospital` (`HospitalID`);

--
-- Constraints for table `blood_stock`
--
ALTER TABLE `blood_stock`
  ADD CONSTRAINT `blood_stock_ibfk_1` FOREIGN KEY (`StockID`) REFERENCES `blood_bank_hospital` (`HospitalID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `blood_stock_ibfk_2` FOREIGN KEY (`BloodID`) REFERENCES `blood` (`BloodID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `campaign`
--
ALTER TABLE `campaign`
  ADD CONSTRAINT `campaign_ibfk_3` FOREIGN KEY (`BHospitalID`) REFERENCES `blood_bank_hospital` (`HospitalID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `campaign_ibfk_4` FOREIGN KEY (`OrganizationID`) REFERENCES `organization` (`UserName`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cash_donation`
--
ALTER TABLE `cash_donation`
  ADD CONSTRAINT `cash_donation_ibfk_1` FOREIGN KEY (`RequesterID`) REFERENCES `requestor` (`NIC`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `donate_campaign`
--
ALTER TABLE `donate_campaign`
  ADD CONSTRAINT `donate_campaign_ibfk_3` FOREIGN KEY (`CampID`) REFERENCES `campaign` (`CampaignID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `donate_hospital`
--
ALTER TABLE `donate_hospital`
  ADD CONSTRAINT `donate_hospital_ibfk_1` FOREIGN KEY (`HospitalID`) REFERENCES `blood_bank_hospital` (`HospitalID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `donor_reservation`
--
ALTER TABLE `donor_reservation`
  ADD CONSTRAINT `donor_reservation_ibfk_1` FOREIGN KEY (`HosID`) REFERENCES `blood_bank_hospital` (`HospitalID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `donor_reservation_ibfk_2` FOREIGN KEY (`DonorID`) REFERENCES `donor` (`nic`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `donor_satisfaction`
--
ALTER TABLE `donor_satisfaction`
  ADD CONSTRAINT `donor_satisfaction_ibfk_1` FOREIGN KEY (`HospitalID`) REFERENCES `blood_bank_hospital` (`HospitalID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `donor_satisfaction_ibfk_2` FOREIGN KEY (`DonorID`) REFERENCES `donor` (`nic`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `donor_telephone`
--
ALTER TABLE `donor_telephone`
  ADD CONSTRAINT `donor_telephone_ibfk_1` FOREIGN KEY (`NIC`) REFERENCES `donor` (`nic`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `normal_blood_request`
--
ALTER TABLE `normal_blood_request`
  ADD CONSTRAINT `normal_blood_request_ibfk_3` FOREIGN KEY (`SenderID`) REFERENCES `blood_bank_hospital` (`HospitalID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `normal_hospital_telephone`
--
ALTER TABLE `normal_hospital_telephone`
  ADD CONSTRAINT `normal_hospital_telephone_ibfk_1` FOREIGN KEY (`username`) REFERENCES `normal_hospital` (`UserName`);

--
-- Constraints for table `organization_telephone`
--
ALTER TABLE `organization_telephone`
  ADD CONSTRAINT `organization_telephone_ibfk_1` FOREIGN KEY (`OrgId`) REFERENCES `organization` (`UserName`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `requestor_telephone`
--
ALTER TABLE `requestor_telephone`
  ADD CONSTRAINT `requestor_telephone_ibfk_1` FOREIGN KEY (`NIC`) REFERENCES `requestor` (`NIC`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
