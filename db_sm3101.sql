-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 09, 2023 at 04:19 AM
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
-- Table structure for table `adminpass`
--

CREATE TABLE `adminpass` (
  `id` int(11) NOT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adminpass`
--

INSERT INTO `adminpass` (`id`, `admin_id`, `password`) VALUES
(12347, 2, 'erika'),
(12348, 3, 'jenny'),
(12349, 4, 'everson'),
(12350, 5, 'ryan'),
(12351, 6, 'jella');

-- --------------------------------------------------------

--
-- Table structure for table `admin_tbl`
--

CREATE TABLE `admin_tbl` (
  `admin_id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `updationDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_tbl`
--

INSERT INTO `admin_tbl` (`admin_id`, `fullname`, `email`, `updationDate`) VALUES
(2, 'Erika Magnaye', 'erika@gmail.com', '2023-11-07 00:25:47'),
(3, 'Jenny Mae Gabuya', 'jenny@gmail.com', '2023-11-07 00:26:04'),
(4, 'Everson Dimaculangan', 'ever@gmail.com', '2023-11-07 00:26:22'),
(5, 'Ryan Ceasar Ramos', 'ryan@gmail.com', '2023-11-07 00:26:39'),
(6, 'Jelladane Peloramas', 'jella@gmail.com', '2023-11-07 00:27:00');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `categoryName` varchar(255) NOT NULL,
  `categoryDescription` varchar(255) NOT NULL,
  `creationDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `categoryName`, `categoryDescription`, `creationDate`, `updationDate`) VALUES
(1, 'Plagiarism', 'Cheating', '2023-11-07 00:31:21', '2023-10-25 08:42:09'),
(2, 'Not Teaching', 'The teacher is not attending the class.', '2023-11-07 00:31:42', '2023-10-25 08:42:09'),
(3, 'Cheating', 'Caught my classmate open their notes during examination.', '2023-11-07 00:31:58', '2023-10-25 09:37:43'),
(4, 'Humiliation', 'The teacher makes an embarrassing comment about me.', '2023-10-25 09:37:54', '2023-10-25 09:37:54'),
(5, 'Dishonesty', 'With regard to examination-related cheating and plagiarism on written assignments and papers.', '2023-10-25 09:38:42', '2023-10-25 09:38:42');

-- --------------------------------------------------------

--
-- Table structure for table `complaint_remark`
--

CREATE TABLE `complaint_remark` (
  `complaint_id` int(11) NOT NULL,
  `complaintNo` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `remark` mediumtext NOT NULL,
  `remarkDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `complaint_remark`
--

INSERT INTO `complaint_remark` (`complaint_id`, `complaintNo`, `status`, `remark`, `remarkDate`) VALUES
(1, 1, 'pending', 'pending', '2023-10-25 08:23:14'),
(3, 1, 'ongoing', 'still processing', '2023-10-25 09:43:32'),
(4, 2, 'resolved', 'closed', '2023-10-25 09:43:32'),
(5, 4, 'pending', 'processing', '2023-10-25 09:43:32'),
(6, 4, 'resolved', 'closed', '2023-10-25 09:43:32'),
(7, 1, 'ongoing', 'processing', '2023-10-25 09:43:32'),
(9, 8, 'resolved', 'closed', '2023-10-25 09:43:32'),
(11, 2, 'ongoing', 'processing', '2023-10-25 09:43:32');

-- --------------------------------------------------------

--
-- Table structure for table `login_tbl`
--

CREATE TABLE `login_tbl` (
  `login_id` int(11) NOT NULL,
  `Sr-code` varchar(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `login_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `logout` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `account_type` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login_tbl`
--

INSERT INTO `login_tbl` (`login_id`, `Sr-code`, `email`, `login_time`, `logout`, `account_type`) VALUES
(1, '2', '', '2023-11-07 00:35:10', '2023-10-25 10:09:25', 1),
(2, '3', '', '2023-10-25 10:09:25', '2023-10-25 10:09:25', 2),
(3, '4', '', '2023-10-25 10:09:25', '2023-10-25 10:09:25', 1),
(4, '6', '', '2023-10-25 10:09:25', '2023-10-25 10:09:25', 1),
(5, '7', '', '2023-10-25 10:09:25', '2023-10-25 10:09:25', 1);

-- --------------------------------------------------------

--
-- Table structure for table `studentpass`
--

CREATE TABLE `studentpass` (
  `id` int(11) NOT NULL,
  `sr-code` int(11) DEFAULT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `studentpass`
--

INSERT INTO `studentpass` (`id`, `sr-code`, `password`) VALUES
(2, 2, 'erika'),
(3, 3, 'jenny'),
(4, 4, 'evers'),
(5, 5, 'ryan'),
(6, 6, 'jella');

-- --------------------------------------------------------

--
-- Table structure for table `tablecomplaints`
--

CREATE TABLE `tablecomplaints` (
  `complaintNumber` int(11) NOT NULL AUTO_INCREMENT,
  `sr-code` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `complaintName` varchar(255) NOT NULL,
  `complaintDetails` varchar(255) NOT NULL,
  `complaintFile` varchar(255) NOT NULL,
  `regDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(50) DEFAULT NULL,
  `lastUpdationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tablecomplaints`
--

INSERT INTO `tablecomplaints` (`complaintNumber`, `sr-code`, `category_id`, `complaintName`, `complaintDetails`, `complaintFile`, `regDate`, `status`, `lastUpdationDate`) VALUES
(1, 1, 1, 'Plagiarism', 'Someone cheated.', '', '2023-11-07 00:38:29', '', '2023-10-25 08:37:55'),
(2, 1, 1, 'Cheating', 'Someone is cheating during exam.', '', '2023-11-07 00:38:51', '', '2023-10-25 10:00:08'),
(3, 4, 2, 'Not Teaching', 'The teacher is not attending class for 3 months.', '', '2023-11-07 00:37:57', '', '2023-10-25 10:06:28'),
(12, 3, 5, 'Dishonesty', 'saw someone using phone during exam', '', '2023-10-25 10:06:28', '', '2023-10-25 10:06:28'),
(7, 5, 4, 'Humiliation', 'The teacher makes an embarrassing comment about me', '', '2023-10-25 10:06:28', '', '2023-10-25 10:06:28'),
(11, 3, 2, 'Not Teaching', 'The teacher is not attending class for 3 months.', '', '2023-11-07 00:39:38', '', '2023-10-25 10:06:53');

-- --------------------------------------------------------

--
-- Table structure for table `tbstudinfo`
--

CREATE TABLE `tbstudinfo` (
  `studid` int(11) NOT NULL,
  `lastname` varchar(25) NOT NULL,
  `firstname` varchar(25) NOT NULL,
  `course` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact_no` bigint(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `userImage` varchar(255) NOT NULL,
  `regdate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbstudinfo`
--

INSERT INTO `tbstudinfo` (`studid`, `lastname`, `firstname`, `course`, `email`, `contact_no`, `address`, `userImage`, `regdate`, `updationDate`, `status`) VALUES
(2, 'Magnaye', 'Erika', 'BSIT', 'erika@gmail.com', 9123456789, 'Quezon', '', '2023-11-07 00:46:48', '2023-10-25 09:21:02', 0),
(3, 'Gabuya', 'Jenny Mae', 'BSIT', 'jenny@gmail.com', 9123456543, 'Lipa City, Batangas', '', '2023-11-07 00:44:21', '2023-10-25 09:44:07', 0),
(4, 'Dimaculangan', 'Everson', 'BSIT', 'everson@gmail.com', 9126542784, 'Lipa City, Batangas', '', '2023-11-07 00:47:01', '2023-10-25 09:32:22', 0),
(5, 'Ramos', 'Ryan Ceasar', 'BSIT', 'ryan@gmail.com', 9543782193, 'Cuenca', '', '2023-11-07 00:46:30', '2023-10-25 09:30:46', 0),
(6, 'Peloramas', 'Jelladane', 'BSIT', 'jella@gmail.com', 9748329140, 'Lipa City, Batangas', '', '2023-11-07 00:48:14', '2023-10-25 09:32:22', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
