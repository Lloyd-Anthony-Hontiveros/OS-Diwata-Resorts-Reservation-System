-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2023 at 02:33 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ostest_connectdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking_status`
--

CREATE TABLE `booking_status` (
  `Date` date NOT NULL,
  `Payment Status` varchar(50) NOT NULL,
  `Booking Client` varchar(50) NOT NULL,
  `Accomodation Type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking_status`
--

INSERT INTO `booking_status` (`Date`, `Payment Status`, `Booking Client`, `Accomodation Type`) VALUES
('0000-00-00', 'Paid', '', ''),
('2023-07-07', 'Paid', 'brother', ''),
('2023-08-09', 'Paid', 'Brutha', ''),
('2023-05-04', 'Paid', 'Christian Almazan', ''),
('2023-07-04', 'Paid', 'dfhg', ''),
('2023-07-05', 'Paid', 'dsdsfdfd', ''),
('2023-05-01', 'Paid', 'dszfxv', ''),
('2023-07-09', 'Paid', 'ffe', ''),
('2023-05-09', 'Paid', 'Hontiveros, Lloyd Anthony', ''),
('2023-07-12', 'Paid', 'LLL', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking_status`
--
ALTER TABLE `booking_status`
  ADD PRIMARY KEY (`Booking Client`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
