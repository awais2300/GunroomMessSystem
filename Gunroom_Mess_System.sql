-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2021 at 03:48 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gunroom_mess_system`
--
CREATE DATABASE IF NOT EXISTS `gunroom_mess_system` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `gunroom_mess_system`;

-- --------------------------------------------------------

--
-- Table structure for table `gunrooms`
--

CREATE TABLE `gunrooms` (
  `id` bigint(20) NOT NULL,
  `gunroom_name` varchar(255) NOT NULL,
  `total_floors` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Dumping data for table `gunrooms`
--

INSERT INTO `gunrooms` (`id`, `gunroom_name`, `total_floors`) VALUES
(1, 'Gunroom 1', '3'),
(2, 'Gunroom 2', '3'),
(3, 'Gunroom 3', '3'),
(4, 'Gunroom 4', '3');

--
-- Table structure for table `gunrooms_floors`
--

CREATE TABLE `gunrooms_floors` (
  `id` bigint(20) NOT NULL,
  `gunroom_id` bigint(20) NOT NULL,
  `gunroom_floor_name` varchar(255) NOT NULL,
  `total_rooms` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Dumping data for table `gunrooms_floors`
--

INSERT INTO `gunrooms_floors` (`id`, `gunroom_id`, `gunroom_floor_name`, `total_rooms`) VALUES
(1, 1, 'Floor 1', '20'),
(2, 1, 'Floor 2', '20'),
(3, 1, 'Floor 3', '20'),
(4, 2, 'Floor 1', '20'),
(5, 2, 'Floor 2', '20'),
(6, 2, 'Floor 3', '20'),
(7, 3, 'Floor 1', '20'),
(8, 3, 'Floor 2', '20'),
(9, 3, 'Floor 3', '20'),
(10, 4, 'Floor 1', '20'),
(11, 4, 'Floor 2', '20'),
(12, 4, 'Floor 3', '20');


--
-- Table structure for table `gunrooms_rooms`
--

CREATE TABLE `gunrooms_rooms` (
  `id` bigint(20) NOT NULL,
  `gunroom_id` bigint(20) NOT NULL,
  `gunroom_floor_id` bigint(20) NOT NULL,
  `Room_no` varchar(255) NOT NULL,
  `allocated_to` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Dumping data for table `gunrooms_rooms`
--

INSERT INTO `gunrooms_rooms` (`id`, `gunroom_id`, `gunroom_floor_id`, `Room_no`, `allocated_to`, `status`) VALUES
(1, 1, 1, '1', '', 'Vacant'),
(2, 1, 1, '2', '', 'Vacant'),
(3, 1, 1, '3', '', 'Vacant'),
(4, 1, 1, '4', '', 'Vacant'),
(5, 1, 1, '5', '', 'Vacant'),
(6, 1, 1, '6', '', 'Vacant'),
(7, 1, 1, '7', '', 'Vacant'),
(8, 1, 1, '8', '', 'Vacant'),
(9, 1, 1, '9', '', 'Vacant'),
(10, 1, 1, '10', '', 'Vacant'),
(11, 1, 1, '11', '', 'Vacant'),
(12, 1, 1, '12', '', 'Vacant'),
(13, 1, 1, '13', '', 'Vacant'),
(14, 1, 1, '14', '', 'Vacant'),
(15, 1, 1, '15', '', 'Vacant'),
(16, 1, 1, '16', '', 'Vacant'),
(17, 1, 1, '17', '', 'Vacant'),
(18, 1, 1, '18', '', 'Vacant'),
(19, 1, 1, '19', '', 'Vacant'),
(20, 1, 1, '20', '', 'Vacant');

INSERT INTO `gunrooms_rooms` (`id`, `gunroom_id`, `gunroom_floor_id`, `Room_no`, `allocated_to`, `status`) VALUES
(21, 1, 2, '1', '', 'Vacant'),
(22, 1, 2, '2', '', 'Vacant'),
(23, 1, 2, '3', '', 'Vacant'),
(24, 1, 2, '4', '', 'Vacant'),
(25, 1, 2, '5', '', 'Vacant'),
(26, 1, 2, '6', '', 'Vacant'),
(27, 1, 2, '7', '', 'Vacant'),
(28, 1, 2, '8', '', 'Vacant'),
(29, 1, 2, '9', '', 'Vacant'),
(30, 1, 2, '10', '', 'Vacant'),
(31, 1, 2, '11', '', 'Vacant'),
(32, 1, 2, '12', '', 'Vacant'),
(33, 1, 2, '13', '', 'Vacant'),
(34, 1, 2, '14', '', 'Vacant'),
(35, 1, 2, '15', '', 'Vacant'),
(36, 1, 2, '16', '', 'Vacant'),
(37, 1, 2, '17', '', 'Vacant'),
(38, 1, 2, '18', '', 'Vacant'),
(39, 1, 2, '19', '', 'Vacant'),
(40, 1, 2, '20', '', 'Vacant');

INSERT INTO `gunrooms_rooms` (`id`, `gunroom_id`, `gunroom_floor_id`, `Room_no`, `allocated_to`, `status`) VALUES
(41, 1, 3, '1', '', 'Vacant'),
(42, 1, 3, '2', '', 'Vacant'),
(43, 1, 3, '3', '', 'Vacant'),
(44, 1, 3, '4', '', 'Vacant'),
(45, 1, 3, '5', '', 'Vacant'),
(46, 1, 3, '6', '', 'Vacant'),
(47, 1, 3, '7', '', 'Vacant'),
(48, 1, 3, '8', '', 'Vacant'),
(49, 1, 3, '9', '', 'Vacant'),
(50, 1, 3, '10', '', 'Vacant'),
(51, 1, 3, '11', '', 'Vacant'),
(52, 1, 3, '12', '', 'Vacant'),
(53, 1, 3, '13', '', 'Vacant'),
(54, 1, 3, '14', '', 'Vacant'),
(55, 1, 3, '15', '', 'Vacant'),
(56, 1, 3, '16', '', 'Vacant'),
(57, 1, 3, '17', '', 'Vacant'),
(58, 1, 3, '18', '', 'Vacant'),
(59, 1, 3, '19', '', 'Vacant'),
(60, 1, 3, '20', '', 'Vacant');

--
-- Table structure for table `security_info`
--

CREATE TABLE `security_info` (
  `id` bigint(20) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `acct_type` enum('admin','UTO','Operator') NOT NULL,
  `status` enum('offline','online') NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `address` varchar(500) NOT NULL,
  `full_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `security_info`
--

INSERT INTO `security_info` (`id`, `username`, `password`, `reg_date`, `acct_type`, `status`, `email`, `phone`, `address`, `full_name`) VALUES
(1, 'awais', '$2y$10$/6ZG1xPTs92CYRNV3CjjnuG8MWZ1NwfWzrzK8GCC14BETqHCpWsGi', '2021-07-13 15:14:39', 'UTO', 'offline', '', '', '', 'Awais Ahmad'),
(2, 'admin', '$2y$10$uVajLuVrXeV2S4TWWuH4a.CLTS4LW92nmGiitB94akkA6pAWMJyI2', '2021-05-21 14:00:00', 'admin', 'offline', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gunrooms`
--
ALTER TABLE `gunrooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gunrooms_floors`
--
ALTER TABLE `gunrooms_floors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gunroom_id` (`gunroom_id`);

--
-- Indexes for table `gunrooms_rooms`
--
ALTER TABLE `gunrooms_rooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gunroom_id` (`gunroom_id`),
  ADD KEY `gunroom_floor_id` (`gunroom_floor_id`);

--
-- Indexes for table `security_info`
--
ALTER TABLE `security_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gunrooms`
--
ALTER TABLE `gunrooms`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `gunrooms_floors`
--
ALTER TABLE `gunrooms_floors`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `gunrooms_rooms`
--
ALTER TABLE `gunrooms_rooms`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `security_info`
--
ALTER TABLE `security_info`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `gunrooms_floors`
--
ALTER TABLE `gunrooms_floors`
  ADD CONSTRAINT `gunrooms_floors_ibfk_1` FOREIGN KEY (`gunroom_id`) REFERENCES `gunrooms` (`id`);

--
-- Constraints for table `gunrooms_rooms`
--
ALTER TABLE `gunrooms_rooms`
  ADD CONSTRAINT `gunrooms_rooms_ibfk_1` FOREIGN KEY (`gunroom_id`) REFERENCES `gunrooms` (`id`),
  ADD CONSTRAINT `gunrooms_rooms_ibfk_2` FOREIGN KEY (`gunroom_floor_id`) REFERENCES `gunrooms_floors` (`id`);
COMMIT;


CREATE TABLE `complaints` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `p_no` bigint(20) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `allocated_to` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
 `remarks` varchar(255) NOT NULL,
 `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `complaints` 
  ADD column `attachement` varchar(255);
 
COMMIT;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
