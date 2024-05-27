-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2023 at 02:32 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `btms`
--

-- --------------------------------------------------------

--
-- Table structure for table `accountant`
--

CREATE TABLE `accountant` (
  `id` int(11) NOT NULL,
  `uname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accountant`
--

INSERT INTO `accountant` (`id`, `uname`, `email`, `contact`, `address`, `password`) VALUES
(4, 'Avye Fuller', 'jepuxem@mailinator.com', '01216546541', 'Ut officia exercitat', '123456'),
(5, 'Garrett Bush', 'gyzop@mailinator.com', '08516514515', 'Est molestiae culpa', 'Pa$$w0rd!');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `uname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `uname`, `email`, `contact`, `address`, `password`) VALUES
(3, 'Admin Shaheb', 'admin@mail.com', '0125196465', 'Uttara, Metro rail', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `bus`
--

CREATE TABLE `bus` (
  `id` int(11) NOT NULL,
  `vendor_id` int(11) DEFAULT NULL,
  `bus_name` varchar(50) NOT NULL,
  `total_seat` int(11) NOT NULL DEFAULT 40,
  `seat_price` int(11) NOT NULL,
  `start_place` int(11) NOT NULL,
  `end_place` int(11) NOT NULL,
  `start_datetime` datetime NOT NULL,
  `end_datetime` datetime NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bus`
--

INSERT INTO `bus` (`id`, `vendor_id`, `bus_name`, `total_seat`, `seat_price`, `start_place`, `end_place`, `start_datetime`, `end_datetime`, `status`) VALUES
(10, 1, 'Toyota', 40, 550, 1, 2, '2023-11-14 06:40:00', '2023-11-20 21:40:00', 'added'),
(11, 1, 'Hunday', 40, 800, 2, 3, '2023-11-15 13:00:00', '2023-11-16 10:30:00', 'added'),
(12, 2, 'Royal', 40, 700, 1, 2, '2023-11-14 09:00:00', '2023-11-14 19:00:00', 'added'),
(13, 2, 'Marchedes', 40, 800, 1, 4, '2023-11-18 11:00:00', '2023-11-20 16:57:00', 'added'),
(14, 2, 'Luxury', 40, 1150, 1, 4, '2023-11-16 09:00:00', '2023-11-16 22:00:00', 'added'),
(17, 3, 'enim.', 40, 1650, 1, 8, '2023-11-20 03:00:00', '2023-11-20 08:00:00', 'added'),
(18, 6, 'pede', 40, 2300, 4, 6, '2023-11-19 08:00:00', '2023-11-23 07:00:00', 'added'),
(23, 2, 'imperdiet', 40, 800, 2, 4, '2023-11-27 07:00:00', '2023-11-28 08:00:00', 'added'),
(24, 7, 'est arcu', 40, 200, 6, 8, '2023-11-26 08:00:00', '2023-11-29 07:00:00', 'added'),
(25, 1, 'vel', 40, 2350, 7, 3, '2023-11-22 01:00:00', '2023-11-27 06:00:00', 'added'),
(26, 5, 'Duis mi', 40, 1950, 6, 3, '2023-11-19 03:00:00', '2023-11-24 10:00:00', 'added'),
(27, 3, 'nec,', 40, 2950, 6, 4, '2023-11-20 06:00:00', '2023-11-26 12:00:00', 'added'),
(29, 1, 'eget,', 40, 1250, 2, 3, '2023-11-19 02:00:00', '2023-11-30 10:00:00', 'added'),
(33, 1, 'sit', 40, 550, 7, 8, '2023-11-18 08:00:00', '2023-11-27 10:00:00', 'added'),
(36, 6, 'massa rutrum', 40, 1600, 3, 7, '2023-11-17 06:00:00', '2023-11-29 04:00:00', 'added'),
(38, 5, 'tristique', 40, 1650, 6, 1, '2023-11-20 02:00:00', '2023-11-29 06:00:00', 'added'),
(40, 2, 'fames ac', 40, 450, 7, 6, '2023-11-20 01:00:00', '2023-11-23 04:00:00', 'added'),
(44, 6, 'lacus.', 40, 2650, 2, 1, '2023-11-25 06:00:00', '2023-11-26 08:00:00', 'added'),
(46, 6, 'facilisi.', 40, 1550, 4, 7, '2023-11-24 09:00:00', '2023-11-25 10:00:00', 'added'),
(50, 6, 'Donec est.', 40, 500, 2, 6, '2023-11-19 03:00:00', '2023-11-20 11:00:00', 'added'),
(51, 6, 'nunc, ullamcorper', 40, 1800, 4, 7, '2023-11-22 03:00:00', '2023-11-25 08:00:00', 'added'),
(55, 4, 'mauris sit', 40, 1250, 6, 2, '2023-11-20 03:00:00', '2023-11-25 04:00:00', 'added'),
(59, 2, 'enim diam', 40, 550, 3, 2, '2023-11-21 01:00:00', '2023-11-28 10:00:00', 'added'),
(61, 3, 'Phasellus libero', 40, 200, 4, 5, '2023-11-24 07:00:00', '2023-11-27 05:00:00', 'added'),
(62, 4, 'Vestibulum', 40, 500, 5, 7, '2023-11-28 02:00:00', '2023-11-30 07:00:00', 'added'),
(67, 6, 'volutpat. Nulla', 40, 1500, 5, 7, '2023-11-23 03:00:00', '2023-11-30 05:00:00', 'added'),
(69, 5, 'Sed', 40, 500, 3, 4, '2023-11-18 03:00:00', '2023-11-28 03:00:00', 'added'),
(71, 4, 'magna a', 40, 2100, 6, 1, '2023-11-24 05:00:00', '2023-11-30 04:00:00', 'added'),
(73, 6, 'Donec', 40, 850, 4, 5, '2023-11-23 09:00:00', '2023-11-24 11:00:00', 'added'),
(74, 5, 'amet luctus', 40, 300, 7, 3, '2023-11-20 01:00:00', '2023-11-22 04:00:00', 'added'),
(75, 4, 'tellus', 40, 200, 1, 7, '2023-11-24 07:00:00', '2023-11-26 03:00:00', 'added'),
(76, 5, 'magna. Sed', 40, 1950, 6, 4, '2023-11-22 11:00:00', '2023-11-29 12:00:00', 'added'),
(79, 1, 'odio', 40, 700, 8, 5, '2023-11-20 05:00:00', '2023-11-29 05:00:00', 'added'),
(81, 5, 'enim', 40, 650, 7, 2, '2023-11-17 08:00:00', '2023-11-21 12:00:00', 'added'),
(83, 3, 'cursus in,', 40, 2900, 5, 2, '2023-11-20 03:00:00', '2023-11-28 08:00:00', 'added'),
(84, 5, 'Donec', 40, 1250, 7, 8, '2023-11-18 11:00:00', '2023-11-23 04:00:00', 'added'),
(85, 6, 'in magna.', 40, 2600, 4, 7, '2023-11-26 07:00:00', '2023-11-27 03:00:00', 'added'),
(87, 4, 'enim consequat', 40, 2100, 2, 6, '2023-11-19 05:00:00', '2023-11-23 01:00:00', 'added'),
(88, 2, 'dui', 40, 2350, 6, 4, '2023-11-23 06:00:00', '2023-11-29 11:00:00', 'added'),
(91, 6, 'pharetra', 40, 2850, 5, 8, '2023-11-23 11:00:00', '2023-11-30 02:00:00', 'added'),
(92, 6, 'Nulla semper', 40, 2600, 7, 1, '2023-11-21 10:00:00', '2023-11-28 01:00:00', 'added'),
(93, 1, 'quis lectus.', 40, 2550, 5, 8, '2023-11-20 09:00:00', '2023-11-28 05:00:00', 'added'),
(95, 3, 'eu', 40, 2850, 2, 5, '2023-11-18 06:00:00', '2023-11-20 08:00:00', 'added'),
(97, 1, 'Etiam bibendum', 40, 550, 4, 7, '2023-11-19 09:00:00', '2023-11-28 12:00:00', 'added'),
(98, 2, 'eros', 40, 2450, 7, 3, '2023-11-29 09:00:00', '2023-11-30 10:00:00', 'added'),
(100, 7, 'nibh', 40, 2250, 2, 4, '2023-11-18 07:00:00', '2023-11-28 11:00:00', 'added'),
(102, 6, 'accumsan interdum', 40, 1950, 4, 5, '2023-11-18 06:00:00', '2023-11-21 11:00:00', 'added'),
(103, 1, 'mattis.', 40, 1950, 1, 8, '2023-11-18 11:00:00', '2023-11-20 02:00:00', 'added'),
(105, 2, 'elit.', 40, 750, 1, 4, '2023-11-22 11:00:00', '2023-11-28 10:00:00', 'added'),
(108, 3, 'ornare. In', 40, 1700, 2, 4, '2023-11-22 08:00:00', '2023-11-30 11:00:00', 'added'),
(110, 6, 'euismod', 40, 550, 4, 6, '2023-11-20 06:00:00', '2023-11-29 05:00:00', 'added'),
(111, 6, 'et magnis', 40, 1200, 5, 3, '2023-11-24 11:00:00', '2023-11-28 12:00:00', 'added'),
(112, 5, 'et', 40, 1300, 6, 3, '2023-11-20 01:00:00', '2023-11-26 04:00:00', 'added'),
(113, 2, 'ut', 40, 2850, 7, 2, '2023-11-17 03:00:00', '2023-11-25 06:00:00', 'added'),
(114, 1, 'faucibus orci', 40, 2200, 8, 6, '2023-11-19 10:00:00', '2023-11-20 06:00:00', 'added'),
(117, 7, 'non ante', 40, 750, 7, 6, '2023-11-28 11:00:00', '2023-11-30 08:00:00', 'added'),
(120, 3, 'sed,', 40, 2900, 7, 6, '2023-11-21 05:00:00', '2023-11-27 07:00:00', 'added'),
(123, 6, 'commodo', 40, 1750, 3, 2, '2023-11-19 12:00:00', '2023-11-26 04:00:00', 'added'),
(124, 6, 'penatibus', 40, 450, 2, 8, '2023-11-18 07:00:00', '2023-11-23 02:00:00', 'added'),
(125, 6, 'id', 40, 850, 6, 4, '2023-11-21 11:00:00', '2023-11-22 06:00:00', 'added'),
(128, 1, 'euismod', 40, 1350, 7, 3, '2023-11-23 09:00:00', '2023-11-24 10:00:00', 'added'),
(131, 2, 'fringilla', 40, 500, 7, 2, '2023-11-21 06:00:00', '2023-11-23 09:00:00', 'added'),
(133, 7, 'ligula tortor,', 40, 800, 5, 7, '2023-11-25 03:00:00', '2023-11-27 12:00:00', 'added'),
(135, 2, 'lorem', 40, 1450, 7, 3, '2023-11-27 03:00:00', '2023-11-30 05:00:00', 'added'),
(136, 4, 'Phasellus fermentum', 40, 1800, 3, 5, '2023-11-23 07:00:00', '2023-11-29 04:00:00', 'added'),
(138, 5, 'pede. Suspendisse', 40, 1700, 5, 6, '2023-11-19 10:00:00', '2023-11-23 05:00:00', 'added'),
(141, 7, 'a odio', 40, 1550, 6, 7, '2023-11-24 04:00:00', '2023-11-28 12:00:00', 'added'),
(142, 7, 'amet', 40, 1800, 2, 4, '2023-11-21 05:00:00', '2023-11-27 06:00:00', 'added'),
(143, 6, 'congue,', 40, 1150, 8, 5, '2023-11-18 03:00:00', '2023-11-22 11:00:00', 'added'),
(144, 5, 'dictum.', 40, 1700, 4, 2, '2023-11-28 01:00:00', '2023-11-28 02:00:00', 'added'),
(146, 6, 'lacus.', 40, 600, 7, 5, '2023-11-18 06:00:00', '2023-11-20 05:00:00', 'added'),
(148, 5, 'amet', 40, 650, 4, 7, '2023-11-22 10:00:00', '2023-11-30 10:00:00', 'added'),
(151, 4, 'torquent per', 40, 2200, 7, 5, '2023-11-19 03:00:00', '2023-11-28 07:00:00', 'added'),
(153, 2, 'vitae, aliquet', 40, 350, 4, 2, '2023-11-20 07:00:00', '2023-11-21 08:00:00', 'added'),
(154, 5, 'laoreet, libero', 40, 1600, 5, 1, '2023-11-22 11:00:00', '2023-11-24 12:00:00', 'added'),
(157, 3, 'et malesuada', 40, 1300, 8, 7, '2023-11-21 10:00:00', '2023-11-21 11:00:00', 'added'),
(158, 2, 'ac', 40, 1900, 7, 2, '2023-11-25 01:00:00', '2023-11-26 12:00:00', 'added'),
(159, 5, 'non,', 40, 2250, 5, 8, '2023-11-17 08:00:00', '2023-11-24 09:00:00', 'added'),
(160, 6, 'tincidunt', 40, 1500, 2, 5, '2023-11-23 12:00:00', '2023-11-28 03:00:00', 'added'),
(161, 3, 'a, facilisis', 40, 1500, 6, 2, '2023-11-21 08:00:00', '2023-11-26 03:00:00', 'added'),
(162, 6, 'tristique pharetra.', 40, 2150, 8, 6, '2023-11-20 06:00:00', '2023-11-27 11:00:00', 'added'),
(164, 4, 'Nunc', 40, 2750, 3, 8, '2023-11-21 01:00:00', '2023-11-28 10:00:00', 'added'),
(170, 3, 'ligula', 40, 1700, 7, 2, '2023-11-26 12:00:00', '2023-11-29 11:00:00', 'added'),
(171, 1, 'dictum', 40, 2250, 8, 6, '2023-11-27 07:00:00', '2023-11-29 02:00:00', 'added'),
(172, 7, 'ipsum.', 40, 550, 2, 6, '2023-11-28 08:00:00', '2023-11-29 08:00:00', 'added'),
(173, 2, 'odio,', 40, 650, 7, 1, '2023-11-23 10:00:00', '2023-11-24 10:00:00', 'added'),
(174, 3, 'sodales at,', 40, 700, 5, 1, '2023-11-18 08:00:00', '2023-11-25 06:00:00', 'added'),
(176, 6, 'enim.', 40, 1900, 4, 3, '2023-11-18 01:00:00', '2023-11-23 01:00:00', 'added'),
(180, 2, 'Maecenas', 40, 2700, 6, 1, '2023-11-24 10:00:00', '2023-11-25 11:00:00', 'added'),
(181, 7, 'egestas lacinia.', 40, 1300, 2, 3, '2023-11-21 12:00:00', '2023-11-23 04:00:00', 'added'),
(186, 7, 'Nullam', 40, 1800, 5, 2, '2023-11-18 11:00:00', '2023-11-27 05:00:00', 'added'),
(192, 6, 'pellentesque eget,', 40, 2300, 8, 4, '2023-11-20 05:00:00', '2023-11-26 12:00:00', 'added'),
(194, 2, 'ligula.', 40, 350, 7, 6, '2023-11-19 09:00:00', '2023-11-25 01:00:00', 'added'),
(196, 2, 'ac', 40, 2300, 3, 5, '2023-11-18 08:00:00', '2023-11-21 11:00:00', 'added'),
(199, 6, 'sagittis', 40, 450, 2, 7, '2023-11-24 02:00:00', '2023-11-25 05:00:00', 'added'),
(202, 5, 'nonummy', 40, 2100, 4, 1, '2023-11-23 10:00:00', '2023-11-29 01:00:00', 'added'),
(203, 3, 'vitae, erat.', 40, 1800, 5, 3, '2023-11-23 03:00:00', '2023-11-23 08:00:00', 'added'),
(205, 1, 'sodales', 40, 850, 3, 1, '2023-11-24 05:00:00', '2023-11-27 05:00:00', 'added'),
(211, 7, 'eu nulla', 40, 300, 8, 3, '2023-11-19 09:00:00', '2023-11-22 08:00:00', 'added'),
(212, 5, 'eros non', 40, 650, 4, 3, '2023-11-19 07:00:00', '2023-11-23 09:00:00', 'added'),
(213, 1, 'Maecenas', 40, 700, 6, 2, '2023-11-24 01:00:00', '2023-11-29 09:00:00', 'added'),
(215, 5, 'Phasellus nulla.', 40, 2300, 3, 5, '2023-11-20 10:00:00', '2023-11-24 11:00:00', 'added'),
(218, 5, 'lacus.', 40, 1850, 3, 2, '2023-11-20 09:00:00', '2023-11-28 07:00:00', 'added'),
(222, 2, 'pellentesque,', 40, 150, 7, 1, '2023-11-20 08:00:00', '2023-11-22 06:00:00', 'added'),
(223, 6, 'eu nulla', 40, 1850, 4, 3, '2023-11-22 11:00:00', '2023-11-29 12:00:00', 'added'),
(224, 3, 'dui augue', 40, 1450, 2, 1, '2023-11-18 11:00:00', '2023-11-25 09:00:00', 'added'),
(225, 6, 'pulvinar arcu', 40, 200, 8, 6, '2023-11-20 03:00:00', '2023-11-21 12:00:00', 'added'),
(228, 6, 'congue turpis.', 40, 2600, 6, 5, '2023-11-20 09:00:00', '2023-11-24 07:00:00', 'added'),
(229, 1, 'eu, euismod', 40, 1600, 8, 2, '2023-11-18 04:00:00', '2023-11-23 04:00:00', 'added'),
(232, 1, 'velit justo', 40, 1200, 6, 2, '2023-11-25 09:00:00', '2023-11-29 02:00:00', 'added'),
(234, 2, 'turpis nec', 40, 2750, 5, 4, '2023-11-20 04:00:00', '2023-11-27 12:00:00', 'added'),
(238, 6, 'fringilla euismod', 40, 2200, 8, 7, '2023-11-19 05:00:00', '2023-11-23 03:00:00', 'added'),
(239, 6, 'dictum', 40, 2700, 4, 8, '2023-11-19 12:00:00', '2023-11-22 11:00:00', 'added'),
(241, 3, 'nunc ac', 40, 2650, 6, 5, '2023-11-24 08:00:00', '2023-11-28 06:00:00', 'added'),
(242, 5, 'tempor bibendum.', 40, 900, 3, 2, '2023-11-20 11:00:00', '2023-11-27 01:00:00', 'added'),
(243, 2, 'mi felis,', 40, 1600, 1, 7, '2023-11-19 06:00:00', '2023-11-19 09:00:00', 'added'),
(245, 2, 'nisl.', 40, 1700, 8, 2, '2023-11-24 09:00:00', '2023-11-29 01:00:00', 'added'),
(247, 6, 'Pellentesque', 40, 2950, 6, 2, '2023-11-27 10:00:00', '2023-11-28 12:00:00', 'added'),
(248, 4, 'Ut', 40, 1950, 5, 1, '2023-11-18 10:00:00', '2023-11-23 07:00:00', 'added'),
(250, 2, 'sed', 40, 1550, 7, 2, '2023-11-17 04:00:00', '2023-11-21 04:00:00', 'added'),
(252, 6, 'lacus.', 40, 2650, 2, 5, '2023-11-22 01:00:00', '2023-11-27 03:00:00', 'added'),
(253, 6, 'consectetuer', 40, 1500, 5, 1, '2023-11-18 06:00:00', '2023-11-30 10:00:00', 'added'),
(254, 5, 'Cras interdum.', 40, 400, 5, 2, '2023-11-26 03:00:00', '2023-11-30 07:00:00', 'added'),
(257, 2, 'nec orci.', 40, 1100, 1, 2, '2023-11-18 03:00:00', '2023-11-29 03:00:00', 'added'),
(258, 6, 'neque', 40, 2850, 3, 1, '2023-11-17 02:00:00', '2023-11-25 12:00:00', 'added'),
(260, 2, 'a', 40, 1550, 8, 5, '2023-11-21 01:00:00', '2023-11-23 03:00:00', 'added'),
(261, 6, 'nec', 40, 2450, 3, 4, '2023-11-21 11:00:00', '2023-11-30 01:00:00', 'added'),
(262, 2, 'quis', 40, 2450, 6, 3, '2023-11-20 01:00:00', '2023-11-21 04:00:00', 'added'),
(263, 7, 'at pede.', 40, 2750, 4, 2, '2023-11-18 04:00:00', '2023-11-27 04:00:00', 'added'),
(265, 4, 'molestie', 40, 100, 3, 5, '2023-11-18 12:00:00', '2023-11-28 12:00:00', 'added'),
(267, 5, 'sed tortor.', 40, 2800, 8, 3, '2023-11-18 02:00:00', '2023-11-22 12:00:00', 'added'),
(269, 5, 'amet, consectetuer', 40, 1650, 7, 6, '2023-11-20 11:00:00', '2023-11-24 06:00:00', 'added'),
(271, 5, 'laoreet, libero', 40, 750, 5, 1, '2023-11-23 01:00:00', '2023-11-27 03:00:00', 'added'),
(272, 5, 'vulputate, nisi', 40, 2600, 4, 6, '2023-11-19 10:00:00', '2023-11-28 10:00:00', 'added'),
(277, 5, 'eu', 40, 950, 4, 7, '2023-11-21 03:00:00', '2023-11-21 06:00:00', 'added'),
(280, 2, 'ipsum.', 40, 1900, 6, 8, '2023-11-26 04:00:00', '2023-11-29 03:00:00', 'added'),
(283, 3, 'interdum', 40, 1200, 7, 4, '2023-11-18 06:00:00', '2023-11-28 07:00:00', 'added'),
(284, 4, 'luctus et', 40, 1550, 2, 5, '2023-11-25 04:00:00', '2023-11-28 01:00:00', 'added'),
(288, 6, 'ullamcorper,', 40, 1500, 3, 5, '2023-11-18 06:00:00', '2023-11-27 11:00:00', 'added'),
(291, 3, 'ut aliquam', 40, 350, 5, 4, '2023-11-25 11:00:00', '2023-11-27 11:00:00', 'added'),
(293, 6, 'sit amet,', 40, 2050, 5, 3, '2023-11-19 11:00:00', '2023-11-30 02:00:00', 'added'),
(297, 6, 'Quisque', 40, 2750, 6, 7, '2023-11-19 10:00:00', '2023-11-25 12:00:00', 'added'),
(298, 5, 'dapibus', 40, 1400, 4, 3, '2023-11-29 06:00:00', '2023-11-29 11:00:00', 'added'),
(301, 7, 'arcu. Aliquam', 40, 1200, 5, 7, '2023-11-20 02:00:00', '2023-11-25 05:00:00', 'added'),
(304, 5, 'facilisis.', 40, 250, 3, 5, '2023-11-21 09:00:00', '2023-11-24 04:00:00', 'added'),
(306, 6, 'dolor,', 40, 1550, 1, 8, '2023-11-26 01:00:00', '2023-11-29 03:00:00', 'added'),
(309, 1, 'morbi tristique', 40, 700, 2, 6, '2023-11-20 10:00:00', '2023-11-25 03:00:00', 'added'),
(310, 6, 'ac', 40, 1250, 2, 5, '2023-11-20 02:00:00', '2023-11-25 01:00:00', 'added'),
(311, 7, 'dis parturient', 40, 150, 3, 7, '2023-11-27 08:00:00', '2023-11-29 05:00:00', 'added'),
(318, 5, 'Duis dignissim', 40, 1450, 7, 4, '2023-11-19 01:00:00', '2023-11-28 02:00:00', 'added'),
(322, 1, 'amet, consectetuer', 40, 1600, 2, 4, '2023-11-27 03:00:00', '2023-11-27 07:00:00', 'added'),
(323, 2, 'tellus non', 40, 1550, 7, 4, '2023-11-18 02:00:00', '2023-11-29 12:00:00', 'added'),
(328, 1, 'Mauris magna.', 40, 200, 4, 2, '2023-11-23 03:00:00', '2023-11-29 08:00:00', 'added'),
(333, 5, 'Donec', 40, 1550, 1, 6, '2023-11-19 05:00:00', '2023-11-20 04:00:00', 'added'),
(334, 5, 'dictum. Phasellus', 40, 1650, 1, 6, '2023-11-18 06:00:00', '2023-11-30 01:00:00', 'added'),
(336, 3, 'mattis velit', 40, 1200, 3, 4, '2023-11-20 01:00:00', '2023-11-26 10:00:00', 'added'),
(340, 1, 'neque', 40, 200, 5, 4, '2023-11-21 11:00:00', '2023-11-25 05:00:00', 'added'),
(342, 1, 'aliquet lobortis,', 40, 2800, 7, 3, '2023-11-22 01:00:00', '2023-11-25 01:00:00', 'added'),
(343, 7, 'pede. Cras', 40, 550, 4, 1, '2023-11-19 03:00:00', '2023-11-29 01:00:00', 'added'),
(345, 5, 'dui', 40, 2450, 2, 5, '2023-11-26 01:00:00', '2023-11-29 04:00:00', 'added'),
(352, 2, 'auctor', 40, 1900, 8, 1, '2023-11-21 08:00:00', '2023-11-23 06:00:00', 'added'),
(353, 3, 'magna nec', 40, 1650, 7, 3, '2023-11-18 09:00:00', '2023-11-19 08:00:00', 'added'),
(354, 7, 'Fusce aliquam,', 40, 2450, 5, 1, '2023-11-19 02:00:00', '2023-11-27 11:00:00', 'added'),
(360, 2, 'amet,', 40, 2000, 4, 3, '2023-11-18 05:00:00', '2023-11-26 03:00:00', 'added'),
(361, 5, 'vel', 40, 500, 6, 7, '2023-11-19 08:00:00', '2023-11-25 03:00:00', 'added'),
(362, 2, 'dolor quam,', 40, 1950, 5, 8, '2023-11-18 06:00:00', '2023-11-27 10:00:00', 'added'),
(365, 3, 'Aliquam', 40, 2400, 5, 2, '2023-11-25 02:00:00', '2023-11-29 03:00:00', 'added'),
(368, 6, 'eros non', 40, 1250, 2, 7, '2023-11-28 03:00:00', '2023-11-29 04:00:00', 'added'),
(369, 6, 'mi, ac', 40, 1200, 7, 4, '2023-11-24 01:00:00', '2023-11-27 08:00:00', 'added'),
(377, 5, 'posuere at,', 40, 2850, 8, 1, '2023-11-17 08:00:00', '2023-11-29 01:00:00', 'added'),
(378, 4, 'Integer', 40, 1850, 2, 4, '2023-11-24 11:00:00', '2023-11-26 09:00:00', 'added'),
(379, 3, 'sit', 40, 1150, 6, 3, '2023-11-20 01:00:00', '2023-11-23 12:00:00', 'added'),
(383, 2, 'lacus. Cras', 40, 1300, 5, 4, '2023-11-20 08:00:00', '2023-11-26 01:00:00', 'added'),
(384, 4, 'quis,', 40, 2600, 7, 1, '2023-11-25 02:00:00', '2023-11-26 12:00:00', 'added'),
(385, 1, 'viverra.', 40, 400, 2, 7, '2023-11-26 03:00:00', '2023-11-28 08:00:00', 'added'),
(397, 1, 'Maecenas', 40, 450, 7, 3, '2023-11-29 02:00:00', '2023-11-29 11:00:00', 'added'),
(399, 4, 'ipsum', 40, 400, 5, 8, '2023-11-20 07:00:00', '2023-11-25 03:00:00', 'added'),
(400, 2, 'Mauris quis', 40, 300, 1, 7, '2023-11-26 01:00:00', '2023-11-26 03:00:00', 'added'),
(401, 1, 'Nam', 40, 2150, 8, 6, '2023-11-21 07:00:00', '2023-11-28 03:00:00', 'added'),
(403, 4, 'sit amet', 40, 1550, 2, 3, '2023-11-22 10:00:00', '2023-11-28 05:00:00', 'added'),
(405, 5, 'enim commodo', 40, 1700, 4, 2, '2023-11-19 01:00:00', '2023-11-30 12:00:00', 'added'),
(407, 7, 'a, facilisis', 40, 1750, 6, 3, '2023-11-19 09:00:00', '2023-11-24 01:00:00', 'added'),
(411, 6, 'habitant', 40, 650, 2, 6, '2023-11-19 07:00:00', '2023-11-26 03:00:00', 'added'),
(415, 5, 'Vivamus non', 40, 2850, 4, 7, '2023-11-23 10:00:00', '2023-11-27 06:00:00', 'added'),
(416, 1, 'Sed eu', 40, 2250, 1, 5, '2023-11-22 07:00:00', '2023-11-29 03:00:00', 'added'),
(417, 1, 'vitae diam.', 40, 1150, 8, 1, '2023-11-23 08:00:00', '2023-11-28 12:00:00', 'added'),
(419, 3, 'ac,', 40, 750, 1, 8, '2023-11-19 03:00:00', '2023-11-21 10:00:00', 'added'),
(421, 1, 'ipsum', 40, 1800, 4, 6, '2023-11-19 05:00:00', '2023-11-27 06:00:00', 'added'),
(422, 4, 'lacinia orci,', 40, 200, 7, 6, '2023-11-19 11:00:00', '2023-11-24 03:00:00', 'added'),
(427, 3, 'magnis dis', 40, 2300, 7, 8, '2023-11-20 10:00:00', '2023-11-29 11:00:00', 'added'),
(429, 6, 'neque.', 40, 400, 6, 4, '2023-11-21 05:00:00', '2023-11-24 03:00:00', 'added'),
(430, 2, 'mollis dui,', 40, 1700, 3, 6, '2023-11-23 10:00:00', '2023-11-30 02:00:00', 'added'),
(431, 4, 'erat volutpat.', 40, 1400, 5, 3, '2023-11-20 10:00:00', '2023-11-21 01:00:00', 'added'),
(432, 3, 'risus. Donec', 40, 400, 5, 4, '2023-11-20 11:00:00', '2023-11-20 12:00:00', 'added'),
(433, 1, 'scelerisque', 40, 1650, 4, 6, '2023-11-26 01:00:00', '2023-11-27 06:00:00', 'added'),
(440, 7, 'tincidunt.', 40, 600, 7, 2, '2023-11-17 06:00:00', '2023-11-19 03:00:00', 'added'),
(446, 1, 'Vestibulum', 40, 2150, 6, 3, '2023-11-18 10:00:00', '2023-11-29 04:00:00', 'added'),
(449, 7, 'rutrum. Fusce', 40, 1900, 8, 2, '2023-11-21 11:00:00', '2023-11-29 01:00:00', 'added'),
(450, 6, 'Proin dolor.', 40, 200, 2, 3, '2023-11-22 07:00:00', '2023-11-28 08:00:00', 'added'),
(453, 3, 'velit. Sed', 40, 1800, 8, 3, '2023-11-18 03:00:00', '2023-11-19 12:00:00', 'added'),
(454, 1, 'nunc.', 40, 250, 2, 3, '2023-11-26 06:00:00', '2023-11-27 09:00:00', 'added'),
(456, 3, 'mauris, rhoncus', 40, 2450, 2, 4, '2023-11-24 04:00:00', '2023-11-28 07:00:00', 'added'),
(458, 3, 'Lorem', 40, 650, 6, 5, '2023-11-19 03:00:00', '2023-11-19 05:00:00', 'added'),
(460, 7, 'dolor.', 40, 1450, 2, 8, '2023-11-18 02:00:00', '2023-11-19 12:00:00', 'added'),
(462, 2, 'vel,', 40, 1300, 7, 6, '2023-11-17 04:00:00', '2023-11-22 11:00:00', 'added'),
(464, 6, 'vitae nibh.', 40, 2250, 6, 5, '2023-11-22 07:00:00', '2023-11-25 04:00:00', 'added'),
(468, 3, 'diam', 40, 2600, 2, 1, '2023-11-20 12:00:00', '2023-11-21 08:00:00', 'added'),
(472, 2, 'eros', 40, 850, 4, 6, '2023-11-23 01:00:00', '2023-11-26 01:00:00', 'added'),
(473, 2, 'euismod', 40, 1250, 4, 2, '2023-11-17 07:00:00', '2023-11-22 08:00:00', 'added'),
(478, 3, 'ipsum', 40, 2250, 5, 3, '2023-11-23 03:00:00', '2023-11-24 03:00:00', 'added'),
(480, 5, 'auctor.', 40, 1250, 3, 7, '2023-11-18 06:00:00', '2023-11-28 01:00:00', 'added'),
(481, 7, 'leo', 40, 2250, 5, 3, '2023-11-27 07:00:00', '2023-11-29 04:00:00', 'added'),
(482, 3, 'metus. In', 40, 2850, 1, 5, '2023-11-24 06:00:00', '2023-11-26 09:00:00', 'added'),
(483, 4, 'mauris sit', 40, 200, 7, 5, '2023-11-20 03:00:00', '2023-11-24 02:00:00', 'added'),
(487, 2, 'libero.', 40, 2750, 4, 6, '2023-11-18 08:00:00', '2023-11-20 10:00:00', 'added'),
(490, 7, 'mauris ut', 40, 500, 6, 3, '2023-11-21 10:00:00', '2023-11-24 07:00:00', 'added'),
(492, 4, 'nascetur', 40, 1500, 6, 4, '2023-11-27 08:00:00', '2023-11-29 02:00:00', 'added'),
(494, 1, 'id ante', 40, 550, 6, 4, '2023-11-23 03:00:00', '2023-11-25 06:00:00', 'added'),
(497, 2, 'non, bibendum', 40, 2950, 4, 7, '2023-11-26 10:00:00', '2023-11-28 12:00:00', 'added'),
(498, 4, 'nunc risus', 40, 1200, 6, 5, '2023-11-18 07:00:00', '2023-11-23 12:00:00', 'added'),
(499, 2, 'luctus', 40, 2750, 2, 6, '2023-11-20 07:00:00', '2023-11-21 03:00:00', 'added'),
(502, 5, 'Maecenas iaculis', 40, 850, 3, 6, '2023-11-21 03:00:00', '2023-11-30 02:00:00', 'added'),
(504, 4, 'tristique senectus', 40, 2200, 2, 4, '2023-11-23 08:00:00', '2023-11-25 03:00:00', 'added'),
(505, 1, 'tempor bibendum.', 40, 300, 5, 7, '2023-11-21 05:00:00', '2023-11-27 08:00:00', 'added'),
(506, 4, 'dolor.', 40, 2400, 4, 2, '2023-11-20 08:00:00', '2023-11-21 08:00:00', 'added'),
(507, 3, 'cubilia Curae', 40, 2800, 4, 8, '2023-11-21 03:00:00', '2023-11-28 03:00:00', 'added'),
(509, 4, 'orci luctus', 40, 2550, 6, 3, '2023-11-22 03:00:00', '2023-11-22 11:00:00', 'added'),
(514, 4, 'dignissim. Maecenas', 40, 2250, 7, 6, '2023-11-18 12:00:00', '2023-11-27 11:00:00', 'added');

-- --------------------------------------------------------

--
-- Table structure for table `discount_coupon`
--

CREATE TABLE `discount_coupon` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `coupon` varchar(50) NOT NULL,
  `percentage` int(11) NOT NULL,
  `max_discount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `discount_coupon`
--

INSERT INTO `discount_coupon` (`id`, `name`, `coupon`, `percentage`, `max_discount`) VALUES
(1, 'Winter15', 'winter15', 15, 200),
(3, 'Summer 20 offer', 'summer20', 20, 500),
(4, 'Fatafati Offer', 'fatafati50', 40, 2000);

-- --------------------------------------------------------

--
-- Table structure for table `passenger`
--

CREATE TABLE `passenger` (
  `id` int(11) NOT NULL,
  `uname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `security_question` varchar(50) DEFAULT NULL,
  `security_answer` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `passenger`
--

INSERT INTO `passenger` (`id`, `uname`, `email`, `contact`, `address`, `password`, `security_question`, `security_answer`) VALUES
(1, 'Monkir Chowdhury', 'monkir@gmail.com', '01531190845', 'Flat A-1, ', 'asdfas', 'Where I live?', 'Motijheel'),
(2, 'Mayesha Khan', 'mayesha@gmail.com', '06516516352', 'Kamalapur', 'qwerqwer', 'Favourite teacher', 'Farzana Binte Alam'),
(3, 'Monkir Chowdhury', 'monkir@mail.com', '01352163521', 'Motijheel', 'asdfasdf', 'Where I live?', 'Kamalapur'),
(4, 'Griffin Bird', 'rori@mailinator.com', '09854165164', 'Reprehenderit mollit', 'Pa$$w0rd!', 'Adipisicing possimus', 'Adipisicing possimus');

-- --------------------------------------------------------

--
-- Table structure for table `place`
--

CREATE TABLE `place` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `place`
--

INSERT INTO `place` (`id`, `name`) VALUES
(1, 'Dhaka'),
(2, 'Chittagong'),
(3, 'Sylhet'),
(4, 'Barishal'),
(5, 'Narshingdhi'),
(6, 'Kumilla'),
(7, 'Rajshahi'),
(8, 'Rangpur');

-- --------------------------------------------------------

--
-- Table structure for table `seat`
--

CREATE TABLE `seat` (
  `id` int(11) NOT NULL,
  `seat_no` int(11) NOT NULL,
  `ticket_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seat`
--

INSERT INTO `seat` (`id`, `seat_no`, `ticket_id`) VALUES
(1, 25, 3),
(2, 26, 3),
(3, 29, 4),
(4, 30, 4),
(5, 25, 5),
(6, 26, 5),
(7, 29, 5),
(8, 30, 5),
(9, 21, 6),
(10, 22, 6),
(11, 23, 6),
(12, 24, 6),
(13, 25, 6),
(14, 26, 6),
(15, 27, 6),
(16, 28, 6),
(17, 25, 7),
(18, 26, 7),
(19, 29, 7),
(20, 30, 7),
(21, 21, 8),
(22, 22, 8),
(23, 25, 8),
(24, 26, 8),
(25, 23, 9),
(26, 24, 9),
(27, 27, 9),
(28, 28, 9),
(29, 21, 10),
(30, 22, 10),
(31, 25, 10),
(32, 26, 10),
(33, 1, 11),
(34, 2, 11),
(35, 3, 11),
(36, 4, 11),
(37, 5, 11),
(38, 6, 11),
(39, 7, 11),
(40, 8, 11),
(41, 21, 12),
(42, 22, 12),
(43, 25, 12),
(44, 26, 12),
(45, 25, 13),
(46, 26, 13),
(47, 29, 13),
(48, 30, 13),
(49, 9, 14),
(50, 10, 14),
(51, 13, 14),
(52, 14, 14),
(53, 17, 15),
(54, 18, 15),
(55, 21, 15),
(56, 22, 15),
(57, 13, 16),
(58, 14, 16);

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `discount_price` int(11) NOT NULL DEFAULT 0,
  `purchase_datetime` datetime NOT NULL DEFAULT current_timestamp(),
  `status` varchar(50) NOT NULL,
  `bus_id` int(11) NOT NULL,
  `passenger_id` int(11) NOT NULL,
  `coupon_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`id`, `price`, `discount_price`, `purchase_datetime`, `status`, `bus_id`, `passenger_id`, `coupon_id`) VALUES
(2, 1100, 165, '2023-11-11 17:28:46', 'booked', 10, 1, 1),
(3, 1100, 165, '2023-11-11 17:30:04', 'booked', 10, 1, 1),
(4, 1100, 220, '2023-11-12 00:07:47', 'booked', 10, 3, 3),
(5, 3200, 500, '2023-11-12 13:49:15', 'cancelled', 11, 1, 3),
(6, 6400, 200, '2023-11-12 14:45:46', 'cancelled', 11, 1, 1),
(7, 3200, 500, '2023-11-12 18:43:20', 'cancelled', 11, 1, 3),
(8, 3200, 1280, '2023-11-13 08:00:19', 'booked', 13, 1, 4),
(9, 3200, 1280, '2023-11-13 08:01:21', 'booked', 13, 2, 4),
(10, 3200, 500, '2023-11-14 17:32:27', 'booked', 11, 3, 3),
(11, 9200, 2000, '2023-11-14 17:37:15', 'cancelled', 14, 3, 4),
(12, 9000, 2000, '2023-11-15 15:41:32', 'cancelled', 416, 2, 4),
(13, 10600, 200, '2023-11-15 15:59:20', 'booked', 44, 2, 1),
(14, 3200, 500, '2023-11-15 19:03:52', 'cancelled', 13, 2, 3),
(15, 4600, 0, '2023-11-15 19:16:51', 'booked', 14, 2, NULL),
(16, 2300, 0, '2023-11-15 19:17:02', 'booked', 14, 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `trans_datetime` datetime NOT NULL DEFAULT current_timestamp(),
  `ammount` int(11) NOT NULL,
  `description` varchar(100) NOT NULL,
  `usertype` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `trans_datetime`, `ammount`, `description`, `usertype`, `user_id`) VALUES
(1, '2023-11-12 18:57:19', 2430, 'Refunds for cancelling ticekt(ID: 7)', 'passenger', 1),
(2, '2023-11-12 19:37:22', 500, 'Deposits', 'passenger', 1),
(3, '2023-11-12 19:56:04', -500, 'withdraw', 'passenger', 1),
(4, '2023-11-14 17:38:26', 5760, 'Refunds for cancelling ticekt(ID: 11)', 'passenger', 3),
(5, '2023-11-15 15:41:41', 6300, 'Refunds for cancelling ticekt(ID: 12)', 'passenger', 2),
(6, '2023-11-15 15:42:03', 600, 'Deposits', 'passenger', 2),
(7, '2023-11-15 15:42:18', -5000, 'withdraw', 'passenger', 2),
(8, '2023-11-15 19:04:07', 2430, 'Refunds for cancelling ticekt(ID: 14)', 'passenger', 2);

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `id` int(11) NOT NULL,
  `uname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`id`, `uname`, `email`, `contact`, `address`, `password`) VALUES
(1, 'Baker Whitney', 'juzerany@mailinator.com', '03521635211', 'Ullam mollitia enim', '123456'),
(2, 'Md Muzahidul Islam', 'muzahid@mail.com', '01352163521', 'Ishwerdi, Pabna', 'asdfasdf'),
(3, 'Ivor Gilmore', 'molestie.in.tempus@outlook.org', '01844876852', '352-456 Metus. St.', 'jcnwyo'),
(4, 'Buckminster Bentley', 'integer.id@google.ca', '01351569475', 'P.O. Box 720, 1553 Luctus Av.', 'rztcvp'),
(5, 'Heidi Moses', 'dui.suspendisse@google.org', '01723126014', 'P.O. Box 627, 4592 Nonummy Road', 'qpnxys'),
(6, 'Charles Horne', 'eu@icloud.com', '01384483424', 'P.O. Box 473, 2314 Proin Av.', 'kihkze'),
(7, 'Scarlett Benjamin', 'consequat.purus@yahoo.edu', '01371378644', 'P.O. Box 993, 2965 Fringilla. Rd.', 'rubwjd');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accountant`
--
ALTER TABLE `accountant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bus`
--
ALTER TABLE `bus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_bus_vendor_id` (`vendor_id`),
  ADD KEY `start_place` (`start_place`),
  ADD KEY `end_place` (`end_place`);

--
-- Indexes for table `discount_coupon`
--
ALTER TABLE `discount_coupon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `passenger`
--
ALTER TABLE `passenger`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `place`
--
ALTER TABLE `place`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seat`
--
ALTER TABLE `seat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ticket_id` (`ticket_id`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `coupon_id` (`coupon_id`),
  ADD KEY `ticket_ibfk_2` (`passenger_id`),
  ADD KEY `bus_id` (`bus_id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accountant`
--
ALTER TABLE `accountant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bus`
--
ALTER TABLE `bus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=515;

--
-- AUTO_INCREMENT for table `discount_coupon`
--
ALTER TABLE `discount_coupon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `passenger`
--
ALTER TABLE `passenger`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `place`
--
ALTER TABLE `place`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `seat`
--
ALTER TABLE `seat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bus`
--
ALTER TABLE `bus`
  ADD CONSTRAINT `bus_ibfk_1` FOREIGN KEY (`start_place`) REFERENCES `place` (`id`),
  ADD CONSTRAINT `bus_ibfk_2` FOREIGN KEY (`end_place`) REFERENCES `place` (`id`),
  ADD CONSTRAINT `fk_bus_vendor_id` FOREIGN KEY (`vendor_id`) REFERENCES `vendor` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `ticket_ibfk_1` FOREIGN KEY (`coupon_id`) REFERENCES `discount_coupon` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `ticket_ibfk_2` FOREIGN KEY (`passenger_id`) REFERENCES `passenger` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `ticket_ibfk_3` FOREIGN KEY (`bus_id`) REFERENCES `bus` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
