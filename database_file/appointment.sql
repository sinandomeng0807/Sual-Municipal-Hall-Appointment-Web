-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2025 at 03:02 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `appointment`
--

-- --------------------------------------------------------

--
-- Table structure for table `personal_data`
--

CREATE TABLE `personal_data` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `complete_address` varchar(255) NOT NULL,
  `occupant` varchar(9) NOT NULL,
  `barangay` varchar(255) DEFAULT NULL,
  `zip_code` char(4) DEFAULT NULL,
  `province` varchar(255) DEFAULT NULL,
  `contact_number` varchar(25) NOT NULL,
  `email_address` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `personal_data`
--

INSERT INTO `personal_data` (`id`, `full_name`, `complete_address`, `occupant`, `barangay`, `zip_code`, `province`, `contact_number`, `email_address`) VALUES
(10, 'BRIAN ISAAC', 'test address again again', 'RESIDENT', '', '2431', 'PANGASINAN', '09123987987', 'TEST_EMAIL@GMAIL.COM'),
(11, 'test name', 'test address', 'VISITOR', NULL, '2431', 'Pangasinan', '09123123123', NULL),
(12, 'test name RESIDENT', 'test address', 'RESIDENT', 'BARANGAY', '2431', NULL, '09123123123', NULL),
(13, 'test name VISITOR', 'test address', 'VISITOR', NULL, '2431', 'Pangasinan', '09123123123', NULL),
(14, 'test name RESIDENT 2', 'test address', 'RESIDENT', 'BARANGAY 2', '2431', NULL, '09123123123', NULL),
(15, 'test name VISITOR 2', 'test address', 'VISITOR', NULL, '2431', 'Pangasinan', '09123123123', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `personal_data`
--
ALTER TABLE `personal_data`
  ADD PRIMARY KEY (`id`,`occupant`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `personal_data`
--
ALTER TABLE `personal_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
