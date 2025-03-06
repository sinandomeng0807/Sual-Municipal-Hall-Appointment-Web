-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2025 at 07:31 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sual_municipal_hall`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(11) NOT NULL,
  `occupant` varchar(255) NOT NULL,
  `office` varchar(255) DEFAULT NULL,
  `purpose` varchar(255) NOT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `other` text DEFAULT NULL,
  `r_name` varchar(255) DEFAULT NULL,
  `r_address` text DEFAULT NULL,
  `r_barangay` varchar(255) DEFAULT NULL,
  `r_contact` varchar(20) DEFAULT NULL,
  `r_email` varchar(255) DEFAULT NULL,
  `v_zip` varchar(10) DEFAULT NULL,
  `v_province` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `occupant`, `office`, `purpose`, `date`, `time`, `other`, `r_name`, `r_address`, `r_barangay`, `r_contact`, `r_email`, `v_zip`, `v_province`, `created_at`) VALUES
(55, 'Resident', 'Office of the Municipal Treasurer', 'Retirement and Separation Services', '2025-02-26', '01:00:00', '', 'asdasdasdasdad', 'asdasdasdasdasd', 'Baybay Norte', '09564654654', '', '2654', '', '2025-02-24 09:06:59'),
(57, 'Resident', 'Office of the Municipal Secretary', 'Preparation of Local Budget and Financial Reports', '2025-03-19', '01:00:00', '', 'Aquino, Angelo', 'makaykayawan rd bgc', 'Baybay Norte', '09564654646', '', '6546', '', '2025-03-01 14:41:37'),
(58, 'Resident', 'Office of the Municipal Planning and Development Officer', 'Conducting Public Consultations and Stakeholder Engagement', '2025-03-26', '01:00:00', '', 'baninam reyes', 'agulgul road santa barbs', 'Baybay Norte', '09654654654', '', '6546', '', '2025-03-01 14:43:13'),
(59, 'Resident', 'Office of the Municipal Mayor', 'Public Welfare and Social Services', '2025-03-19', '01:00:00', '', 'fsfsdfsdfsdf', 'sdfsdfsdfsfsdfs', 'Baybay Norte', '09561316546', '', '2401', '', '2025-03-01 14:44:46'),
(60, 'Resident', 'Office of the Municipal Secretary', 'Audit and Financial Oversight', '2025-03-28', '01:00:00', '', 'dbsjsjsjxjzjs', 'sksksjsjsjjss', 'Calumbuyan', '09764646464', '', '8646', '', '2025-03-01 14:50:05'),
(61, 'Resident', 'Office of the Municipal Mayor', 'Issuance of Local Permits and Licenses', '2025-03-19', '01:00:00', '', 'igicjicjcicififfif', 'cjcjhchuhchuch', 'Calumbuyan', '09656566556', '', '8668', '', '2025-03-01 14:53:54'),
(62, 'Resident', 'COMELEC', 'Election Monitoring and Observations', '2025-03-20', '01:00:00', '', 'baninam, agulgulol', 'bgc road tabing dagat', 'Calumbuyan', '09464648767', '', '8649', '', '2025-03-01 14:56:33'),
(63, 'Resident', 'Office of the Municipal Secretary', 'Licensing and Permitting Services', '2025-03-19', '01:00:00', '', 'asdasdasdasd', 'asdasdasdasd', 'Baybay Sur', '09546546546', '', '2403', '', '2025-03-01 15:07:21'),
(64, 'Visitor', 'Office of the Human Resource Management Officer', 'Preparation and Filing of Election-Related Documents', '2025-03-19', '01:00:00', '', 'sdfsdfsdfsdfsd', 'fdsfsdfsdfsdf', '', '09654654654', '', '6546', 'Antique', '2025-03-01 15:08:27'),
(65, 'Resident', 'Office of the Municipal Mayor', 'Solicitation', '2025-03-20', '01:00:00', '', 'cueiendkcockdns', 'cudhdneksodksks', 'Bolaoen', '09464346464', '', '8946', '', '2025-03-01 15:21:14'),
(66, 'Resident', 'Office of the Human Resource Management Officer', 'Legislative Support and Documentation', '2025-03-19', '01:00:00', '', 'sdfsdfsfdsfds', 'sdfsdfsdfsfsdfsdf', 'Baybay Sur', '09545465465', '', '2403', '', '2025-03-03 05:24:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
