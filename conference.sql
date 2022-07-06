-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2021 at 05:21 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `conference`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminn`
--

CREATE TABLE `adminn` (
  `Email` varchar(100) NOT NULL,
  `User_Password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adminn`
--

INSERT INTO `adminn` (`Email`, `User_Password`) VALUES
('online.learning@mut.ac.za', 'TLDC');

-- --------------------------------------------------------

--
-- Table structure for table `delegate`
--

CREATE TABLE `delegate` (
  `Title` varchar(30) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Surname` varchar(100) NOT NULL,
  `Institution` varchar(100) NOT NULL,
  `Bar_Code` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `delegate`
--

INSERT INTO `delegate` (`Title`, `Name`, `Surname`, `Institution`, `Bar_Code`) VALUES
('Mr', 'Syanda', 'Ngwane', 'Mangosuthu University of Technology', '111111'),
('Mr', 'Nhhhh', 'AAAAA', 'MUT', '3456789'),
('MrS', 'NNN', 'FFFFF', 'MUT', '5438998'),
('Dr', 'BBBB', 'HHHH', 'MUT', '9889908');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `delegate`
--
ALTER TABLE `delegate`
  ADD UNIQUE KEY `Bar_Code` (`Bar_Code`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
