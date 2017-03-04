-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 04, 2017 at 09:47 AM
-- Server version: 5.6.34
-- PHP Version: 7.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rating`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`id`, `username`, `password`) VALUES
(1, 'admin', 'pass'),
(3, 'root', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `problem`
--

CREATE TABLE `problem` (
  `service_id` int(11) UNSIGNED NOT NULL,
  `hardware` varchar(255) DEFAULT NULL,
  `software` varchar(255) DEFAULT NULL,
  `network` varchar(255) DEFAULT NULL,
  `other` varchar(255) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `problem`
--

INSERT INTO `problem` (`service_id`, `hardware`, `software`, `network`, `other`, `note`) VALUES
(1, 'จอภาพ', '', '', '', 'จอติด 1 นาทีแล้วดับเอง'),
(3, '', '', '', 'เน็ตเข้าไม่ได้', ''),
(4, '', '', '', 'คอมกลิ่นไหม้', ''),
(5, '', 'ระบบปฏิบัติการ', '', '', 'ติดไวรัส'),
(7, '', 'โปรแกรม', '', '', 'โปรแกรม Office 2010 เปิดไม่ได้'),
(9, 'จอภาพ', '', '', '', 'ลายจุด');

-- --------------------------------------------------------

--
-- Table structure for table `rate`
--

CREATE TABLE `rate` (
  `service_id` int(11) UNSIGNED NOT NULL,
  `score` tinyint(1) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rate`
--

INSERT INTO `rate` (`service_id`, `score`) VALUES
(1, 5),
(3, 2),
(4, 4),
(7, 4),
(9, 4);

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `id` int(11) UNSIGNED NOT NULL,
  `service_code` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `major` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id`, `service_code`, `full_name`, `major`, `created_at`) VALUES
(1, '600001', 'test1', 'ชีววิทยา', '01-01-2560'),
(3, '600002', 'Me', 'ฟิสิกส์', '02-03-2560'),
(4, '600003', 'Test1', 'คณิตศาสตร์', '01-03-2560'),
(5, '600004', 'Oops', 'เคมี', '01-01-2560'),
(7, '600005', 'Haha', 'เคมี', '01-12-2559'),
(9, '600006', 'GG', 'ฟิสิกส์', '30-11-2559');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `service_id` int(11) UNSIGNED NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`service_id`, `status`) VALUES
(1, 'เสร็จสิ้น'),
(3, 'เสร็จสิ้น'),
(4, 'เสร็จสิ้น'),
(5, 'กำลังดำเนินการ'),
(7, 'เสร็จสิ้น'),
(9, 'เสร็จสิ้น');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `problem`
--
ALTER TABLE `problem`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `rate`
--
ALTER TABLE `rate`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`service_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrator`
--
ALTER TABLE `administrator`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `problem`
--
ALTER TABLE `problem`
  ADD CONSTRAINT `fk_problem_service_1` FOREIGN KEY (`service_id`) REFERENCES `service` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `rate`
--
ALTER TABLE `rate`
  ADD CONSTRAINT `fk_rate_service_1` FOREIGN KEY (`service_id`) REFERENCES `service` (`id`);

--
-- Constraints for table `status`
--
ALTER TABLE `status`
  ADD CONSTRAINT `fk_status_service_1` FOREIGN KEY (`service_id`) REFERENCES `service` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
