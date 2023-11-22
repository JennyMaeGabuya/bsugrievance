-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 19, 2023 at 02:20 PM
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
-- Database: `sdg15`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl15_1_landecosystem`
--

DROP TABLE IF EXISTS `tbl15_1_landecosystem`;
CREATE TABLE IF NOT EXISTS `tbl15_1_landecosystem` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `year` text NOT NULL,
  `total_citation` int NOT NULL,
  `source` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl15_1_landecosystem`
--

INSERT INTO `tbl15_1_landecosystem` (`ID`, `title`, `author`, `year`, `total_citation`, `source`) VALUES
(1, 'FGFGFG', 'DSDS', '2009', 44, 'FDFD');

-- --------------------------------------------------------

--
-- Table structure for table `tbl15_2_measuresslp`
--

DROP TABLE IF EXISTS `tbl15_2_measuresslp`;
CREATE TABLE IF NOT EXISTS `tbl15_2_measuresslp` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `total_number` int NOT NULL,
  `male` int NOT NULL,
  `female` int NOT NULL,
  `percentage` int NOT NULL,
  `total_numberVertical` int NOT NULL,
  `male_vertical` int NOT NULL,
  `female_vertical` int NOT NULL,
  `percentage_vertical` int NOT NULL,
  `totalNumber_slp` int NOT NULL,
  `title_PPA` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `cost` int NOT NULL,
  `fund` int NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl15_3_`
--

DROP TABLE IF EXISTS `tbl15_3_`;
CREATE TABLE IF NOT EXISTS `tbl15_3_` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `total_number` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `cost` int NOT NULL,
  `fund` int NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl15_3_endagered`
--

DROP TABLE IF EXISTS `tbl15_3_endagered`;
CREATE TABLE IF NOT EXISTS `tbl15_3_endagered` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `total_number` int NOT NULL,
  `evidence` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl15_4_ecosystem`
--

DROP TABLE IF EXISTS `tbl15_4_ecosystem`;
CREATE TABLE IF NOT EXISTS `tbl15_4_ecosystem` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `total_number` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `cost` int NOT NULL,
  `fund` int NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl15_4_events`
--

DROP TABLE IF EXISTS `tbl15_4_events`;
CREATE TABLE IF NOT EXISTS `tbl15_4_events` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `total_number` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `cost` int NOT NULL,
  `fund` int NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl15_4_food`
--

DROP TABLE IF EXISTS `tbl15_4_food`;
CREATE TABLE IF NOT EXISTS `tbl15_4_food` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `total_policies` int NOT NULL,
  `totalPPAS` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `cost` int NOT NULL,
  `fund` int NOT NULL,
  `evidence` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl15_5_1_biodiversity`
--

DROP TABLE IF EXISTS `tbl15_5_1_biodiversity`;
CREATE TABLE IF NOT EXISTS `tbl15_5_1_biodiversity` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `total_number` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `cost` int NOT NULL,
  `fund` int NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
