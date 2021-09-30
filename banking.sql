-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2021 at 03:49 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `banking`
--

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE `details` (
  `id` int(2) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `currentbalance` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`id`, `name`, `email`, `currentbalance`) VALUES
(1, 'Richa Singh', 'richa@gmail.com', 7500),
(2, 'Sanjana Mukherjee', 'sanjana@gmail.com', 1000),
(3, 'Sonvi Gupta', 'sonvi@gmail.com', 9000),
(4, 'Yash Kapoor', 'yash@gmail.com', 4000),
(5, 'Rohan Singh', 'rohan@gmail.com', 5000),
(6, 'Ritu Raj', 'ritu@gmail.com', 2000),
(7, 'Gaurav Tripathi', 'gaurav@gmail.com', 7000),
(8, 'Shraddha Singh', 'shraddha@gmail.com', 3000),
(9, 'Sonal Rai', 'sonal@gmail.com', 10000),
(10, 'Adarsh Sinha', 'adarsh@gmail.com', 6000);

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id` int(2) NOT NULL,
  `sender` varchar(255) NOT NULL,
  `receiver` varchar(255) NOT NULL,
  `amount` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id`, `sender`, `receiver`, `amount`) VALUES
(1, 'Richa Singh', 'Sonvi Gupta', '500'),
(2, 'Richa Singh', 'Sonvi Gupta', '500'),
(3, 'Richa Singh', 'Sonvi Gupta', '500'),
(4, 'Sonvi Gupta', 'Richa Singh', '1000'),
(5, 'Sonvi Gupta', 'Richa Singh', '1000'),
(6, 'Sonvi Gupta', 'Richa Singh', '500');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
