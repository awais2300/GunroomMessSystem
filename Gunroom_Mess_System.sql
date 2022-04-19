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
  `total_floors` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Dumping data for table `gunrooms`
--

INSERT INTO `gunrooms` (`id`, `gunroom_name`, `total_floors`) VALUES
(1, 'Gunroom 1', 3),
(2, 'Gunroom 2', 3),
(3, 'Gunroom 3', 3),
(4, 'Gunroom 4', 3);

--
-- Table structure for table `gunrooms_floors`
--

CREATE TABLE `gunrooms_floors` (
  `id` bigint(20) NOT NULL,
  `gunroom_id` bigint(20) NOT NULL,
  `gunroom_floor_name` varchar(255) NOT NULL,
  `total_rooms` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Dumping data for table `gunrooms_floors`
--

INSERT INTO `gunrooms_floors` (`id`, `gunroom_id`, `gunroom_floor_name`, `total_rooms`) VALUES
(1, 1, 'Floor 1', 20),
(2, 1, 'Floor 2', 20),
(3, 1, 'Floor 3', 20),
(4, 2, 'Floor 1', 20),
(5, 2, 'Floor 2', 20),
(6, 2, 'Floor 3', 20),
(7, 3, 'Floor 1', 20),
(8, 3, 'Floor 2', 20),
(9, 3, 'Floor 3', 20),
(10, 4, 'Floor 1', 20),
(11, 4, 'Floor 2', 20),
(12, 4, 'Floor 3', 20);


--
-- Table structure for table `gunrooms_rooms`
--

CREATE TABLE `gunrooms_rooms` (
  `id` bigint(20) NOT NULL,
  `gunroom_id` bigint(20) NOT NULL,
  `gunroom_floor_id` bigint(20) NOT NULL,
  `Room_no` varchar(255) NOT NULL,
  `allocated_to_1` varchar(255) NULL,
  `allocated_to_2` varchar(255) NULL,
  `allocated_to_3` varchar(255) NULL,
  `allocated_to_4` varchar(255) NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Dumping data for table `gunrooms_rooms`
--

INSERT INTO `gunrooms_rooms` (`id`, `gunroom_id`, `gunroom_floor_id`, `Room_no`, `allocated_to_1`, `status`) VALUES
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

INSERT INTO `gunrooms_rooms` (`id`, `gunroom_id`, `gunroom_floor_id`, `Room_no`, `allocated_to_1`, `status`) VALUES
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

INSERT INTO `gunrooms_rooms` (`id`, `gunroom_id`, `gunroom_floor_id`, `Room_no`, `allocated_to_1`, `status`) VALUES
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


-- room 2
INSERT INTO `gunrooms_rooms` (`id`, `gunroom_id`, `gunroom_floor_id`, `Room_no`, `allocated_to_1`, `status`) VALUES
(61, 2, 4, '1', '', 'Vacant'),
(62, 2, 4, '2', '', 'Vacant'),
(63, 2, 4, '3', '', 'Vacant'),
(64, 2, 4, '4', '', 'Vacant'),
(65, 2, 4, '5', '', 'Vacant'),
(66, 2, 4, '6', '', 'Vacant'),
(67, 2, 4, '7', '', 'Vacant'),
(68, 2, 4, '8', '', 'Vacant'),
(69, 2, 4, '9', '', 'Vacant'),
(70,2, 4, '10', '', 'Vacant'),
(71, 2, 4, '11', '', 'Vacant'),
(72, 2, 4, '12', '', 'Vacant'),
(73, 2, 4, '13', '', 'Vacant'),
(74, 2, 4, '14', '', 'Vacant'),
(75, 2, 4, '15', '', 'Vacant'),
(76, 2, 4, '16', '', 'Vacant'),
(77, 2, 4, '17', '', 'Vacant'),
(78, 2, 4, '18', '', 'Vacant'),
(79, 2, 4, '19', '', 'Vacant'),
(80, 2, 4, '20', '', 'Vacant');

INSERT INTO `gunrooms_rooms` (`id`, `gunroom_id`, `gunroom_floor_id`, `Room_no`, `allocated_to_1`, `status`) VALUES
(81, 2, 5, '1', '', 'Vacant'),
(82, 2, 5, '2', '', 'Vacant'),
(83, 2, 5, '3', '', 'Vacant'),
(84, 2, 5, '4', '', 'Vacant'),
(85, 2, 5, '5', '', 'Vacant'),
(86, 2, 5, '6', '', 'Vacant'),
(87, 2, 5, '7', '', 'Vacant'),
(88, 2, 5, '8', '', 'Vacant'),
(89, 2, 5, '9', '', 'Vacant'),
(90, 2, 5, '10', '', 'Vacant'),
(91, 2, 5, '11', '', 'Vacant'),
(92, 2, 5, '12', '', 'Vacant'),
(93, 2, 5, '13', '', 'Vacant'),
(94, 2, 5, '14', '', 'Vacant'),
(95, 2, 5, '15', '', 'Vacant'),
(96, 2, 5, '16', '', 'Vacant'),
(97, 2, 5, '17', '', 'Vacant'),
(98, 2, 5, '18', '', 'Vacant'),
(99, 2, 5, '19', '', 'Vacant'),
(100, 2, 5, '20', '', 'Vacant');

INSERT INTO `gunrooms_rooms` (`id`, `gunroom_id`, `gunroom_floor_id`, `Room_no`, `allocated_to_1`, `status`) VALUES
(101, 2, 6, '1', '', 'Vacant'),
(102, 2, 6, '2', '', 'Vacant'),
(103, 2, 6, '3', '', 'Vacant'),
(104, 2, 6, '4', '', 'Vacant'),
(105, 2, 6, '5', '', 'Vacant'),
(106, 2, 6, '6', '', 'Vacant'),
(107, 2, 6, '7', '', 'Vacant'),
(108, 2, 6, '8', '', 'Vacant'),
(109, 2, 6, '9', '', 'Vacant'),
(110, 2, 6, '10', '', 'Vacant'),
(111, 2, 6, '11', '', 'Vacant'),
(112, 2, 6, '12', '', 'Vacant'),
(113, 2, 6, '13', '', 'Vacant'),
(114, 2, 6, '14', '', 'Vacant'),
(115, 2, 6, '15', '', 'Vacant'),
(116, 2, 6, '16', '', 'Vacant'),
(117, 2, 6, '17', '', 'Vacant'),
(118, 2, 6, '18', '', 'Vacant'),
(119, 2, 6, '19', '', 'Vacant'),
(120, 2, 6, '20', '', 'Vacant');


-- room 3

INSERT INTO `gunrooms_rooms` (`id`, `gunroom_id`, `gunroom_floor_id`, `Room_no`, `allocated_to_1`, `status`) VALUES
(121, 3, 7, '1', '', 'Vacant'),
(122, 3, 7, '2', '', 'Vacant'),
(123, 3, 7, '3', '', 'Vacant'),
(124, 3, 7, '4', '', 'Vacant'),
(125, 3, 7, '5', '', 'Vacant'),
(126, 3, 7, '6', '', 'Vacant'),
(127, 3, 7, '7', '', 'Vacant'),
(128, 3, 7, '8', '', 'Vacant'),
(129, 3, 7, '9', '', 'Vacant'),
(130, 3, 7, '10', '', 'Vacant'),
(131, 3, 7, '11', '', 'Vacant'),
(132, 3, 7, '12', '', 'Vacant'),
(133, 3, 7, '13', '', 'Vacant'),
(134, 3, 7, '14', '', 'Vacant'),
(135, 3, 7, '15', '', 'Vacant'),
(136, 3, 7, '16', '', 'Vacant'),
(137, 3, 7, '17', '', 'Vacant'),
(138, 3, 7, '18', '', 'Vacant'),
(139, 3, 7, '19', '', 'Vacant'),
(140, 3, 7, '20', '', 'Vacant');

INSERT INTO `gunrooms_rooms` (`id`, `gunroom_id`, `gunroom_floor_id`, `Room_no`, `allocated_to_1`, `status`) VALUES
(141, 3, 8, '1', '', 'Vacant'),
(142, 3, 8, '2', '', 'Vacant'),
(143, 3, 8, '3', '', 'Vacant'),
(144, 3, 8, '4', '', 'Vacant'),
(145, 3, 8, '5', '', 'Vacant'),
(146, 3, 8, '6', '', 'Vacant'),
(147, 3, 8, '7', '', 'Vacant'),
(148, 3, 8, '8', '', 'Vacant'),
(149, 3, 8, '9', '', 'Vacant'),
(150, 3, 8, '10', '', 'Vacant'),
(151, 3, 8, '11', '', 'Vacant'),
(152, 3, 8, '12', '', 'Vacant'),
(153, 3, 8, '13', '', 'Vacant'),
(154, 3, 8, '14', '', 'Vacant'),
(155, 3, 8, '15', '', 'Vacant'),
(156, 3, 8, '16', '', 'Vacant'),
(157, 3, 8, '17', '', 'Vacant'),
(158, 3, 8, '18', '', 'Vacant'),
(159, 3, 8, '19', '', 'Vacant'),
(160, 3, 8, '20', '', 'Vacant');

INSERT INTO `gunrooms_rooms` (`id`, `gunroom_id`, `gunroom_floor_id`, `Room_no`, `allocated_to_1`, `status`) VALUES
(161, 3, 9, '1', '', 'Vacant'),
(162, 3, 9, '2', '', 'Vacant'),
(163, 3, 9, '3', '', 'Vacant'),
(164, 3, 9, '4', '', 'Vacant'),
(165, 3, 9, '5', '', 'Vacant'),
(166, 3, 9, '6', '', 'Vacant'),
(167, 3, 9, '7', '', 'Vacant'),
(168, 3, 9, '8', '', 'Vacant'),
(169, 3, 9, '9', '', 'Vacant'),
(170, 3, 9, '10', '', 'Vacant'),
(171, 3, 9, '11', '', 'Vacant'),
(172, 3, 9, '12', '', 'Vacant'),
(173, 3, 9, '13', '', 'Vacant'),
(174, 3, 9, '14', '', 'Vacant'),
(175, 3, 9, '15', '', 'Vacant'),
(176, 3, 9, '16', '', 'Vacant'),
(177, 3, 9, '17', '', 'Vacant'),
(178, 3, 9, '18', '', 'Vacant'),
(179, 3, 9, '19', '', 'Vacant'),
(180, 3, 9, '20', '', 'Vacant');

-- Gunroom 4
INSERT INTO `gunrooms_rooms` (`id`, `gunroom_id`, `gunroom_floor_id`, `Room_no`, `allocated_to_1`, `status`) VALUES
(181, 4, 10, '1', '', 'Vacant'),
(182, 4, 10, '2', '', 'Vacant'),
(183, 4, 10, '3', '', 'Vacant'),
(184, 4, 10, '4', '', 'Vacant'),
(185, 4, 10, '5', '', 'Vacant'),
(186, 4, 10, '6', '', 'Vacant'),
(187, 4, 10, '7', '', 'Vacant'),
(188, 4, 10, '8', '', 'Vacant'),
(189, 4, 10, '9', '', 'Vacant'),
(190, 4, 10, '10', '', 'Vacant'),
(191, 4, 10, '11', '', 'Vacant'),
(192, 4, 10, '12', '', 'Vacant'),
(193, 4, 10, '13', '', 'Vacant'),
(194, 4, 10, '14', '', 'Vacant'),
(195, 4, 10, '15', '', 'Vacant'),
(196, 4, 10, '16', '', 'Vacant'),
(197, 4, 10, '17', '', 'Vacant'),
(198, 4, 10, '18', '', 'Vacant'),
(199, 4, 10, '19', '', 'Vacant'),
(200, 4, 10, '20', '', 'Vacant');

INSERT INTO `gunrooms_rooms` (`id`, `gunroom_id`, `gunroom_floor_id`, `Room_no`, `allocated_to_1`, `status`) VALUES
(201, 4, 11, '1', '', 'Vacant'),
(202, 4, 11, '2', '', 'Vacant'),
(203, 4, 11, '3', '', 'Vacant'),
(204, 4, 11, '4', '', 'Vacant'),
(205, 4, 11, '5', '', 'Vacant'),
(206, 4, 11, '6', '', 'Vacant'),
(207, 4, 11, '7', '', 'Vacant'),
(208, 4, 11, '8', '', 'Vacant'),
(209, 4, 11, '9', '', 'Vacant'),
(210, 4, 11, '10', '', 'Vacant'),
(211, 4, 11, '11', '', 'Vacant'),
(212, 4, 11, '12', '', 'Vacant'),
(213, 4, 11, '13', '', 'Vacant'),
(214, 4, 11, '14', '', 'Vacant'),
(215, 4, 11, '15', '', 'Vacant'),
(216, 4, 11, '16', '', 'Vacant'),
(217, 4, 11, '17', '', 'Vacant'),
(218, 4, 11, '18', '', 'Vacant'),
(219, 4, 11, '19', '', 'Vacant'),
(220, 4, 11, '20', '', 'Vacant');

INSERT INTO `gunrooms_rooms` (`id`, `gunroom_id`, `gunroom_floor_id`, `Room_no`, `allocated_to_1`, `status`) VALUES
(221, 4, 12, '1', '', 'Vacant'),
(222, 4, 12, '2', '', 'Vacant'),
(223, 4, 12, '3', '', 'Vacant'),
(224, 4, 12, '4', '', 'Vacant'),
(225, 4, 12, '5', '', 'Vacant'),
(226, 4, 12, '6', '', 'Vacant'),
(227, 4, 12, '7', '', 'Vacant'),
(228, 4, 12, '8', '', 'Vacant'),
(229, 4, 12, '9', '', 'Vacant'),
(230, 4, 12, '10', '', 'Vacant'),
(231, 4, 12, '11', '', 'Vacant'),
(232, 4, 12, '12', '', 'Vacant'),
(233, 4, 12, '13', '', 'Vacant'),
(234, 4, 12, '14', '', 'Vacant'),
(235, 4, 12, '15', '', 'Vacant'),
(236, 4, 12, '16', '', 'Vacant'),
(237, 4, 12, '17', '', 'Vacant'),
(238, 4, 12, '18', '', 'Vacant'),
(239, 4, 12, '19', '', 'Vacant'),
(240, 4, 12, '20', '', 'Vacant');




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


CREATE TABLE `mess_menu` (
  `id` bigint(20) NOT NULL,
  `menu_name` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Indexes for table `gunrooms`
--
ALTER TABLE `mess_menu`
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
-- AUTO_INCREMENT for table `mess_menu`
--
ALTER TABLE `mess_menu`
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
 
 
ALTER TABLE `complaints` 
  ADD column `seen` enum('no','yes');
ALTER TABLE `complaints` 
  ADD column `admin_seen` enum('no','yes');



--
-- Indexes for table `security_info`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for table `gunrooms_rooms`
--
ALTER TABLE `complaints`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;


CREATE TABLE `guest_reservation` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `p_no` varchar(255) NOT NULL,
  `total_guests` bigint(20) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `menu`  varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `requesting_menu` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `p_no` varchar(255) NOT NULL,
  `total_persons` bigint(20) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `menu`  varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `guest_reservation`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `guest_reservation`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE `requesting_menu`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `requesting_menu`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE `guest_reservation`
  ADD column `remarks` varchar(255) NOT NULL;
ALTER TABLE `requesting_menu` 
  ADD column `remarks` varchar(255) NOT NULL;

ALTER TABLE `gunrooms_rooms`
  ADD column `total_beds` INT NULL DEFAULT 4;

ALTER TABLE `requesting_menu` 
  ADD column `seen` enum('no','yes');
ALTER TABLE `requesting_menu` 
  ADD column `admin_seen` enum('no','yes');

ALTER TABLE `guest_reservation` 
  ADD column `seen` enum('no','yes');
ALTER TABLE `guest_reservation` 
  ADD column `admin_seen` enum('no','yes');



COMMIT;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
