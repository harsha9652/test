-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2021 at 06:25 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test_reimbursment`
--

-- --------------------------------------------------------

--
-- Table structure for table `mode`
--

CREATE TABLE `mode` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mode`
--

INSERT INTO `mode` (`id`, `name`, `created_at`) VALUES
(1, 'Bike', '2021-03-19 18:25:39'),
(2, 'Bus', '2021-03-19 18:25:39'),
(3, 'Taxi', '2021-03-19 18:25:39'),
(4, 'Auto', '2021-03-19 18:25:39'),
(5, 'Test mode', '2021-03-19 13:45:48'),
(6, 'Test mode2', '2021-03-19 13:46:48');

-- --------------------------------------------------------

--
-- Table structure for table `purpose`
--

CREATE TABLE `purpose` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purpose`
--

INSERT INTO `purpose` (`id`, `name`, `created_at`) VALUES
(1, 'Market visit', '2021-03-19 18:24:05'),
(2, 'Other city travel', '2021-03-19 18:24:05'),
(3, 'Office Visit', '2021-03-19 18:24:05'),
(4, 'Training', '2021-03-19 18:24:05'),
(5, 'Test Purpose', '2021-03-19 13:39:39'),
(6, 'Test 2', '2021-03-19 13:45:34'),
(7, 'Test 2', '2021-03-19 13:45:48'),
(8, 'Test 2', '2021-03-19 13:46:48');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_conveyance`
--

CREATE TABLE `tbl_conveyance` (
  `id` int(11) NOT NULL,
  `from_date` datetime NOT NULL,
  `to_date` datetime NOT NULL,
  `sel_month` date NOT NULL,
  `purpose` int(11) DEFAULT 0,
  `mode` int(11) DEFAULT 0,
  `km` int(11) DEFAULT NULL,
  `inv_no` varchar(100) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `modified_at` datetime NOT NULL,
  `attachment` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_food`
--

CREATE TABLE `tbl_food` (
  `id` int(11) NOT NULL,
  `inv_no` varchar(100) DEFAULT NULL,
  `amount` double NOT NULL,
  `attachment` text DEFAULT NULL,
  `sel_month` date NOT NULL,
  `created_at` datetime NOT NULL,
  `modified_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hotel`
--

CREATE TABLE `tbl_hotel` (
  `id` int(11) NOT NULL,
  `from_date` datetime NOT NULL,
  `to_date` datetime NOT NULL,
  `hotel_name` varchar(225) DEFAULT NULL,
  `inv_no` varchar(100) DEFAULT NULL,
  `amount` double NOT NULL,
  `attachment` text DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `modified_at` datetime NOT NULL,
  `sel_month` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_internet`
--

CREATE TABLE `tbl_internet` (
  `id` int(11) NOT NULL,
  `inv_no` varchar(100) DEFAULT NULL,
  `amount` double NOT NULL,
  `attachment` text DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `modified_at` datetime NOT NULL,
  `sel_month` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mobile`
--

CREATE TABLE `tbl_mobile` (
  `id` int(11) NOT NULL,
  `inv_no` varchar(100) DEFAULT NULL,
  `amount` double NOT NULL,
  `attachment` text DEFAULT NULL,
  `sel_month` date NOT NULL,
  `created_at` datetime NOT NULL,
  `modified_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mode`
--
ALTER TABLE `mode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purpose`
--
ALTER TABLE `purpose`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_conveyance`
--
ALTER TABLE `tbl_conveyance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_food`
--
ALTER TABLE `tbl_food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_hotel`
--
ALTER TABLE `tbl_hotel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_internet`
--
ALTER TABLE `tbl_internet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_mobile`
--
ALTER TABLE `tbl_mobile`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mode`
--
ALTER TABLE `mode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `purpose`
--
ALTER TABLE `purpose`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_conveyance`
--
ALTER TABLE `tbl_conveyance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_food`
--
ALTER TABLE `tbl_food`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_hotel`
--
ALTER TABLE `tbl_hotel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_internet`
--
ALTER TABLE `tbl_internet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_mobile`
--
ALTER TABLE `tbl_mobile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
