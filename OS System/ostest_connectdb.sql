-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2023 at 09:44 AM
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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`, `role`) VALUES
('admin', 'password', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `booking_status`
--

CREATE TABLE `booking_status` (
  `Date` date NOT NULL,
  `Booking Client` varchar(50) NOT NULL,
  `Head Count` int(2) NOT NULL,
  `Paid Price` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking_status`
--

INSERT INTO `booking_status` (`Date`, `Booking Client`, `Head Count`, `Paid Price`) VALUES
('0000-00-00', '', 0, '0'),
('2023-07-28', 'bvxcdhfgh', 18, '9000'),
('2023-07-18', 'guoihjklhj', 18, '9000'),
('2023-08-25', 'jnhbkj', 9, '4500'),
('2023-07-27', 'kjniojiiiiiii', 12, '6000'),
('2023-07-20', 'Lloyd Hontiveros', 7, '3500'),
('2023-07-25', 'Lloyd Hontiveros2', 14, '7000');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `FullName` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `email address` varchar(50) NOT NULL,
  `contact number` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `FullName`, `surname`, `firstname`, `email address`, `contact number`) VALUES
('lloyd', '$2y$10$HVD/w1Ftict5WUnbC4KG4ueai2icuxNkabhFLCBZTHRU9sLn.poKu', 'ehsfdghfht', 'thdfghdfht', 'hdfdfhdfghd', 'ydfghd5ydddfh@gmail.com', '+634563456346'),
('sdfgsdfgsdfg', '$2y$10$0r9OjcPctQqordhGAM2duOziySk0JuEBlUsZ9Xr3PTdreh7J1jNgK', 'fgsdfgsdf', 'vscxvxcvbcvx', 'bsrgsdfgsd', 'bcxvbsdfgsdf@gmail.com', '+63g345345345'),
('xcvbgfdbgs', '$2y$10$pDOaLOYs7C5uqY5p5bo1SeqkSxyMIywOnyh7T/YyZtUX21IETggyG', 'rfsfsdfads', 'vxzcvzxdf', 'asdfaea', 'rqwerqwefasd@gmail.com', '+632345346454');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking_status`
--
ALTER TABLE `booking_status`
  ADD PRIMARY KEY (`Booking Client`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
