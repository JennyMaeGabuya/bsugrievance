-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 21, 2023 at 05:52 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sm3101`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_tbl`
--

DROP TABLE IF EXISTS `admin_tbl`;
CREATE TABLE IF NOT EXISTS `admin_tbl` (
  `admin_id` int NOT NULL AUTO_INCREMENT,
  `lastname` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  `firstname` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `contact_no` bigint NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM AUTO_INCREMENT=502 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_tbl`
--

INSERT INTO `admin_tbl` (`admin_id`, `lastname`, `firstname`, `password`, `email`, `contact_no`) VALUES
(501, '1', 'Admin', 'admin', 'admin@gmail.com', 9123456788);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `category_id` int NOT NULL AUTO_INCREMENT,
  `categoryName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `categoryDescription` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `creationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `categoryName`, `categoryDescription`, `creationDate`) VALUES
(1, 'Plagiarism', 'Cheating', '2023-11-06 16:31:21'),
(2, 'Not Teaching', 'The teacher is not attending the class.', '2023-11-06 16:31:42'),
(3, 'Cheating', 'Caught my classmate open their notes during examination.', '2023-11-06 16:31:58'),
(4, 'Humiliation', 'The teacher makes an embarrassing comment about me.', '2023-10-25 01:37:54'),
(5, 'Dishonesty', 'With regard to examination-related cheating and plagiarism on written assignments and papers.', '2023-10-25 01:38:42'),
(6, 'Other', 'Please specify the complaint category if not already mentioned. Your input is essential for a more accurate resolution.', '2023-11-16 03:31:02');

-- --------------------------------------------------------

--
-- Table structure for table `complaint_remark`
--

DROP TABLE IF EXISTS `complaint_remark`;
CREATE TABLE IF NOT EXISTS `complaint_remark` (
  `complaint_id` int NOT NULL AUTO_INCREMENT,
  `complaintNumber` int NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `remark` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `remarkDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`complaint_id`),
  KEY `complaintNumber` (`complaintNumber`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `complaint_remark`
--

INSERT INTO `complaint_remark` (`complaint_id`, `complaintNumber`, `status`, `remark`, `remarkDate`) VALUES
(1, 1, 'pending', 'pending', '2023-10-25 00:23:14'),
(3, 1, 'ongoing', 'still processing', '2023-10-25 01:43:32'),
(4, 2, 'resolved', 'closed', '2023-10-25 01:43:32'),
(5, 4, 'pending', 'processing', '2023-10-25 01:43:32'),
(6, 4, 'resolved', 'closed', '2023-10-25 01:43:32'),
(7, 1, 'ongoing', 'processing', '2023-10-25 01:43:32'),
(9, 8, 'resolved', 'closed', '2023-10-25 01:43:32'),
(11, 2, 'ongoing', 'processing', '2023-10-25 01:43:32');

-- --------------------------------------------------------

--
-- Table structure for table `tablecomplaints`
--

DROP TABLE IF EXISTS `tablecomplaints`;
CREATE TABLE IF NOT EXISTS `tablecomplaints` (
  `complaintNumber` int NOT NULL AUTO_INCREMENT,
  `sr-code` int NOT NULL,
  `category_id` int NOT NULL,
  `complaintName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `complaintDetails` varchar(5000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `complaintFile` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `regDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`complaintNumber`),
  KEY `sr-code` (`sr-code`),
  KEY `category_id` (`category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tablecomplaints`
--

INSERT INTO `tablecomplaints` (`complaintNumber`, `sr-code`, `category_id`, `complaintName`, `complaintDetails`, `complaintFile`, `regDate`, `status`) VALUES
(1, 1001, 1, 'Plagiarism', 'Someone cheated.', '', '2023-11-21 16:29:56', ''),
(2, 1001, 1, 'Cheating', 'Someone is cheating during exam.', '', '2023-11-21 16:30:10', ''),
(12, 1003, 5, 'Dishonesty', 'saw someone using phone during exam', '', '2023-11-21 16:30:24', ''),
(7, 1004, 4, 'Humiliation', 'The teacher makes an embarrassing comment about me', '', '2023-11-21 16:30:37', ''),
(13, 1, 3, 'Complaint For Student', 'hello, testing po, hehe', '', '2023-11-21 17:50:15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbempcontact`
--

DROP TABLE IF EXISTS `tbempcontact`;
CREATE TABLE IF NOT EXISTS `tbempcontact` (
  `id` int NOT NULL AUTO_INCREMENT,
  `empid` int NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `contact_no` bigint NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `empid` (`empid`)
) ENGINE=MyISAM AUTO_INCREMENT=902 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbempcontact`
--

INSERT INTO `tbempcontact` (`id`, `empid`, `password`, `email`, `contact_no`, `address`) VALUES
(901, 101, 'staff', 'balazon@gmail.com', 9123456789, 'Lipa City, Batangas');

-- --------------------------------------------------------

--
-- Table structure for table `tbempinfo`
--

DROP TABLE IF EXISTS `tbempinfo`;
CREATE TABLE IF NOT EXISTS `tbempinfo` (
  `empid` int NOT NULL AUTO_INCREMENT,
  `lastname` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  `firstname` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  `department` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`empid`)
) ENGINE=MyISAM AUTO_INCREMENT=102 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbempinfo`
--

INSERT INTO `tbempinfo` (`empid`, `lastname`, `firstname`, `department`) VALUES
(1, 'aguila', 'nina', 'cics'),
(101, 'Balazon', 'Francis', 'CICS');

-- --------------------------------------------------------

--
-- Table structure for table `tbstudcontact`
--

DROP TABLE IF EXISTS `tbstudcontact`;
CREATE TABLE IF NOT EXISTS `tbstudcontact` (
  `id` int NOT NULL AUTO_INCREMENT,
  `studid` int NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `contact_no` bigint NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `studid` (`studid`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbstudcontact`
--

INSERT INTO `tbstudcontact` (`id`, `studid`, `password`, `email`, `contact_no`, `address`) VALUES
(1, 1001, '10c7ccc7a4f0aff03c915c485565b9da', 'ryan@gmail.com', 9123456789, 'Cuenca, Batangas');

-- --------------------------------------------------------

--
-- Table structure for table `tbstudinfo`
--

DROP TABLE IF EXISTS `tbstudinfo`;
CREATE TABLE IF NOT EXISTS `tbstudinfo` (
  `studid` int NOT NULL AUTO_INCREMENT,
  `lastname` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  `firstname` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  `course` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`studid`)
) ENGINE=MyISAM AUTO_INCREMENT=1006 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbstudinfo`
--

INSERT INTO `tbstudinfo` (`studid`, `lastname`, `firstname`, `course`) VALUES
(1, 'parker', 'peter', 'bsit'),
(2, 'kent', 'clark', 'bscs'),
(1001, 'Ramos', 'Ryan Ceasar', 'BSIT'),
(1002, 'Magnaye', 'Erika', 'BSIT'),
(1003, 'Gabuya', 'Jenny Mae', 'BSIT'),
(1004, 'Peloramas', 'Jelladane', 'BSIT'),
(1005, 'Dimaculangan', 'Everson', 'BSIT');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
