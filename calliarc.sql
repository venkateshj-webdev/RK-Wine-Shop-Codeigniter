-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2018 at 11:47 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `calliarc`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) NOT NULL,
  `users_id` bigint(20) NOT NULL,
  `brand_number` varchar(50) CHARACTER SET latin1 NOT NULL,
  `brand_name` varchar(250) CHARACTER SET latin1 NOT NULL,
  `product_type` varchar(50) CHARACTER SET latin1 NOT NULL,
  `size` varchar(50) NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '1',
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `users_id`, `brand_number`, `brand_name`, `product_type`, `size`, `is_active`, `date_created`, `date_updated`) VALUES
(1, 1, '5006 (12)', 'TUBORG GOLD PREMIUM STRONG BEER', 'Beer', '650', 1, '2018-01-12 08:50:59', NULL),
(2, 1, '5016 (12)', 'KING FISHER PREMIUM LAGER BEER', 'Beer', '350', 1, '2018-01-12 08:51:15', NULL),
(3, 1, '5018 (12)', 'BUDWEISER KING OF BEERS', 'Beer', '500 - Tin', 1, '2018-01-12 08:51:37', NULL),
(4, 1, '5015 (12)', 'KNOCKOUT HIGH PUNCH STRONG BEER', 'Beer', '250 - Tin', 1, '2018-01-12 08:52:00', NULL),
(5, 1, '5059 (12)', 'CARLSBERG ELEPHENT SUPER STRONG SUPER', 'Beer', '330 - Tin', 1, '2018-01-12 08:52:28', NULL),
(6, 1, '6032 (12)', 'KINGFISHER ULTRA LAGER BEER', 'Beer', '250 - Tin', 1, '2018-01-12 08:52:45', NULL),
(7, 1, '0045 (12)', 'OLD ADMIRAL SPECIAL VSOP BRANDY', 'Iml', '1000 - litre', 1, '2018-01-12 08:53:15', NULL),
(8, 1, '0084 (48)', 'HONEY BEE GENUINE BRANDY', 'Iml', '750 - Qts', 1, '2018-01-12 08:53:33', NULL),
(9, 1, '0027 (12)', 'MCDOWELL\\\'S NO.1 GOLD BRANDY', 'Iml', '375 - Pts', 1, '2018-01-12 08:54:30', NULL),
(10, 1, '0261 (12)', 'TI COURIER NAPOLEON FINEST PURE GRAPE FRENCH BY', 'Iml', '180 - Nip', 1, '2018-01-12 08:55:09', NULL),
(11, 1, '0338 (12)', 'MORPHEUS XO BLENDED RARE BRANDY', 'Iml', '180 - Nip', 1, '2018-01-12 08:55:44', NULL),
(12, 1, '0432 (12)', 'MCDOWELL VSOP BRANDY', 'Iml', '90 - Dip', 1, '2018-01-12 08:56:26', NULL),
(13, 1, '1256 (13)', 'R.R.Wine', 'Wine', '187 - Split', 1, '2018-01-12 08:57:20', NULL),
(14, 1, '1536 (14)', 'P.P.Wine', 'Wine', '375 - Half-Bottle', 1, '2018-01-12 08:57:41', NULL),
(15, 1, '1254 (15)', 'Madeera Wine', 'Wine', '750 - Bottle', 1, '2018-01-12 08:57:56', NULL),
(16, 1, '1021', 'M.H.Brandy', 'Iml', '1000 - litre', 1, '2018-01-26 07:13:57', NULL),
(17, 1, '1023', 'M.H.Brandy', 'Iml', '750 - Qts', 1, '2018-01-26 07:14:12', NULL),
(18, 1, '1024', 'M.H.Brandy', 'Iml', '375 - Pts', 1, '2018-01-26 07:14:25', NULL),
(19, 1, '1025', 'M.H.Brandy', 'Iml', '180 - Nip', 1, '2018-01-26 07:14:37', NULL),
(20, 1, '1026', 'M.H.Brandy', 'Iml', '180 - Nip', 1, '2018-01-26 07:14:49', NULL),
(21, 1, '1027', 'M.H.Brandy', 'Iml', '90 - Dip', 1, '2018-01-26 07:14:59', NULL),
(22, 1, '5017 (12)', 'KING FISHER PREMIUM LAGER BEER', 'Beer', '650', 1, '2018-01-31 12:59:33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `expenditure`
--

CREATE TABLE `expenditure` (
  `id` bigint(20) NOT NULL,
  `users_id` bigint(20) NOT NULL DEFAULT '1',
  `expenditure_item` varchar(50) NOT NULL,
  `expenditure_value` varchar(50) NOT NULL,
  `comments` varchar(150) NOT NULL,
  `date_of_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `id` bigint(20) NOT NULL,
  `users_id` bigint(20) NOT NULL DEFAULT '1',
  `brands_id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `invoice_number` bigint(50) NOT NULL,
  `invoice_date` date NOT NULL,
  `no_of_cases` bigint(50) NOT NULL,
  `no_of_bottles` int(20) NOT NULL,
  `unit_rate` int(50) NOT NULL,
  `total` int(50) NOT NULL,
  `sale_price` float NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` datetime DEFAULT NULL,
  `damage_bottles` int(20) NOT NULL DEFAULT '0',
  `description` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `users_id`, `brands_id`, `name`, `invoice_number`, `invoice_date`, `no_of_cases`, `no_of_bottles`, `unit_rate`, `total`, `sale_price`, `date_created`, `date_updated`, `damage_bottles`, `description`) VALUES
(1, 1, 1, 'Stock received on 01-Jan-2018', 1000, '2018-01-12', 2, 40, 130, 5200, 150, '2018-01-12 09:44:27', NULL, 0, NULL),
(2, 1, 2, 'Stock received on 01-Jan-2018', 1001, '2018-01-01', 3, 90, 140, 12600, 160, '2018-01-12 09:45:17', NULL, 0, NULL),
(3, 1, 3, 'Stock received on 02-Jan-2018', 1003, '2018-01-02', 3, 75, 160, 12000, 170, '2018-01-12 09:48:01', NULL, 0, NULL),
(4, 1, 4, 'Stock received on 02-Jan-2018', 1004, '2018-01-02', 3, 66, 160, 10560, 180, '2018-01-12 09:48:29', NULL, 0, NULL),
(5, 1, 4, 'Stock received on 03-Jan-2018', 1005, '2018-01-03', 5, 110, 180, 19800, 195, '2018-01-12 09:49:02', NULL, 0, NULL),
(6, 1, 6, 'Stock received on 03-Jan-2018', 1006, '2017-11-03', 3, 66, 175, 11550, 180, '2018-01-12 09:50:26', NULL, 0, NULL),
(7, 1, 6, 'Stock received on 04-Jan-2018', 1008, '2018-01-04', 2, 44, 165, 7260, 180, '2018-01-12 09:55:19', NULL, 0, NULL),
(8, 1, 7, 'Stock received on 04-Jan-2018', 1009, '2018-01-04', 5, 30, 100, 3000, 120, '2018-01-12 09:56:05', NULL, 0, NULL),
(9, 1, 8, 'Stock received on 05-Jan-2018', 1010, '2018-01-05', 3, 36, 125, 4500, 145, '2018-01-12 09:56:45', NULL, 0, NULL),
(10, 1, 9, 'Stock received on 06-Jan-2018', 1011, '2018-01-06', 3, 72, 132, 9504, 150, '2018-01-12 09:57:54', NULL, 0, NULL),
(11, 1, 10, 'Stock received on 06-Jan-2018', 1012, '2018-01-06', 3, 144, 200, 28800, 220, '2018-01-12 09:58:35', NULL, 0, NULL),
(12, 1, 12, 'Stock received on 07-Jan-2018', 1013, '2018-01-07', 3, 288, 100, 28800, 135, '2018-01-12 09:59:26', NULL, 0, NULL),
(13, 1, 12, 'Stock received on 07-Jan-2018', 1014, '2018-01-07', 5, 480, 142, 68160, 165, '2018-01-12 10:00:19', NULL, 0, NULL),
(14, 1, 13, 'Stock received on 08-Jan-2018', 1015, '2018-01-08', 3, 66, 120, 7920, 125, '2018-01-12 10:01:05', NULL, 0, NULL),
(15, 1, 14, 'Stock received on 09-Jan-2018', 1016, '2018-01-09', 3, 78, 165, 12870, 175, '2018-01-12 10:01:41', NULL, 0, NULL),
(16, 1, 15, 'Stock received on 10-Jan-2018', 1018, '2018-01-10', 3, 84, 152, 12768, 175, '2018-01-12 10:02:40', NULL, 0, NULL),
(17, 1, 5, 'Stock received on 10-Jan-2018', 1020, '2018-01-10', 2, 56, 136, 7616, 155, '2018-01-12 10:06:59', NULL, 0, NULL),
(18, 1, 11, 'Stock received on 11-Jan-2018', 1021, '2018-01-11', 1, 48, 125, 6000, 150, '2018-01-12 10:09:12', NULL, 0, NULL),
(19, 1, 16, 'Stock received on 26-Jan-2018', 1124, '2018-01-26', 1, 6, 120, 720, 135, '2018-01-26 07:16:08', NULL, 0, NULL),
(20, 1, 17, 'Stock received on 26-Jan-2018', 1125, '2018-01-26', 2, 24, 125, 3000, 130, '2018-01-26 07:16:24', NULL, 0, NULL),
(21, 1, 18, 'Stock received on 26-Jan-2018', 1126, '2018-01-26', 1, 24, 152, 3648, 160, '2018-01-26 07:16:45', NULL, 0, NULL),
(22, 1, 19, 'Stock received on 26-Jan-2018', 1127, '2018-01-26', 2, 96, 160, 15360, 180, '2018-01-26 07:17:03', NULL, 0, NULL),
(23, 1, 20, 'Stock received on 26-Jan-2018', 1128, '2018-01-26', 1, 48, 150, 7200, 175, '2018-01-26 07:17:19', NULL, 0, NULL),
(24, 1, 21, 'Stock received on 26-Jan-2018', 1129, '2018-01-26', 2, 192, 135, 25920, 165, '2018-01-26 07:17:37', NULL, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` bigint(20) NOT NULL,
  `users_id` bigint(20) NOT NULL,
  `brands_id` bigint(100) NOT NULL,
  `inventory_id` bigint(100) NOT NULL,
  `customer_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(50) NOT NULL,
  `price` double NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `users_id`, `brands_id`, `inventory_id`, `customer_name`, `quantity`, `price`, `date_created`) VALUES
(1, 1, 1, 1, 'Rick', 2, 300, '2018-01-03 10:03:42'),
(2, 1, 2, 2, 'Ramesh', 2, 320, '2018-01-04 10:04:20'),
(3, 1, 3, 3, 'Suresh', 2, 340, '2018-01-09 10:04:34'),
(4, 1, 4, 4, 'Chum', 1, 180, '2018-01-10 10:05:03'),
(5, 1, 4, 5, 'Roli', 2, 390, '2018-01-11 10:05:21'),
(6, 1, 5, 17, 'Coery', 1, 155, '2018-01-12 10:07:32'),
(7, 1, 7, 8, 'Frank', 3, 360, '2018-01-08 10:07:46'),
(8, 1, 8, 9, 'Mike', 6, 870, '2018-01-13 10:08:02'),
(9, 1, 9, 10, 'Dinesh', 1, 150, '2018-01-09 10:08:17'),
(10, 1, 10, 11, 'Magesh', 4, 880, '2018-01-10 10:08:31'),
(11, 1, 11, 18, 'Murugeah', 2, 300, '2018-01-06 10:09:54'),
(12, 1, 13, 14, 'Richard', 6, 750, '2018-01-15 10:11:05'),
(13, 1, 4, 5, 'Anderson', 6, 1170, '2018-01-05 10:46:09'),
(14, 1, 1, 1, 'ghgh', 2, 300, '2018-01-06 10:55:17'),
(15, 1, 2, 2, 'sd', 2, 320, '2018-01-10 10:55:27'),
(16, 1, 3, 3, 'ad', 2, 340, '2018-01-12 10:55:36'),
(17, 1, 4, 5, 'dsf', 3, 585, '2018-01-09 10:55:46'),
(18, 1, 5, 17, 'f', 4, 620, '2018-01-07 10:55:56'),
(19, 1, 6, 7, 'df', 4, 720, '2018-01-06 10:56:07'),
(20, 1, 7, 8, 'df', 3, 360, '2018-01-10 10:56:17'),
(21, 1, 10, 11, 'zf', 23, 5060, '2018-01-12 10:56:29'),
(22, 1, 11, 18, 'd', 3, 450, '2018-01-10 10:56:40'),
(23, 1, 12, 12, 'fd', 3, 405, '2018-01-05 10:56:54'),
(24, 1, 13, 14, 'd', 4, 500, '2018-01-09 10:57:09'),
(25, 1, 14, 15, 'df', 5, 875, '2018-01-02 10:57:18'),
(26, 1, 15, 16, 'se', 5, 875, '2018-01-11 10:57:28'),
(27, 1, 15, 16, 'd', 6, 1050, '2018-01-11 10:59:09'),
(28, 1, 1, 1, 'df', 2, 300, '2018-01-03 10:59:17'),
(29, 1, 2, 2, 'zf', 3, 480, '2018-01-03 10:59:25'),
(30, 1, 3, 3, 'sdf', 8, 1360, '2018-01-03 10:59:36'),
(31, 1, 5, 17, 'sa', 5, 775, '2018-01-10 10:59:44'),
(32, 1, 6, 6, 'dsf', 3, 540, '2018-01-03 10:59:59'),
(33, 1, 7, 8, 'sd', 2, 240, '2018-01-09 11:00:23'),
(34, 1, 8, 9, 'sd', 2, 290, '2018-01-08 11:00:37'),
(35, 1, 10, 11, 'rwe', 2, 440, '2018-01-07 11:00:49'),
(36, 1, 15, 16, 'swd', 4, 700, '2018-01-11 11:00:57'),
(37, 1, 14, 15, 'dfa', 3, 525, '2018-01-04 11:01:04'),
(38, 1, 13, 14, 'af', 3, 375, '2018-01-13 11:01:14'),
(39, 1, 12, 13, 'afa', 4, 660, '2018-01-11 11:01:22'),
(40, 1, 4, 4, 'asd', 4, 720, '2018-01-04 11:01:31'),
(41, 1, 5, 17, 'adf', 4, 620, '2018-01-10 11:01:39'),
(42, 1, 6, 6, 'adf', 4, 720, '2018-01-15 11:02:29'),
(43, 1, 13, 14, 'faa', 4, 500, '2018-01-04 11:02:41'),
(44, 1, 12, 13, 'dfa', 4, 660, '2018-01-10 11:02:51'),
(45, 1, 11, 18, 'e', 4, 600, '2018-01-04 11:03:00'),
(46, 1, 13, 14, 'sad', 4, 500, '2018-01-05 11:03:08'),
(47, 1, 2, 2, 'dfa', 4, 640, '2018-01-05 11:03:15'),
(48, 1, 6, 7, 'ADS', 4, 720, '2018-01-05 11:03:23'),
(49, 1, 12, 12, 'asdf', 45, 6075, '2018-01-05 11:03:33'),
(50, 1, 10, 11, 'vbn', 4, 880, '2018-01-05 11:03:55'),
(51, 1, 6, 7, 'xfg', 5, 900, '2018-01-06 11:04:09'),
(52, 1, 4, 5, 'dfg', 6, 1170, '2018-01-06 11:04:18'),
(53, 1, 4, 5, 'xfg', 6, 1170, '2018-01-06 11:04:33'),
(54, 1, 4, 5, 'aer', 4, 780, '2018-01-06 11:28:08'),
(55, 1, 13, 14, 'Ssd', 5, 625, '2018-01-06 11:28:20'),
(56, 1, 4, 5, 'SD', 4, 780, '2018-01-06 11:28:34'),
(57, 1, 11, 18, 'zdf', 3, 450, '2018-01-06 11:28:41'),
(58, 1, 14, 15, 'zxfc', 2, 350, '2018-01-07 11:28:50'),
(59, 1, 14, 15, 'zfc', 2, 350, '2018-01-07 11:29:05'),
(60, 1, 13, 14, 'adf', 4, 500, '2018-01-07 11:29:15'),
(61, 1, 13, 14, 'qew', 3, 375, '2018-01-07 11:29:22'),
(62, 1, 6, 6, 'Rick', 3, 540, '2018-01-07 11:29:33'),
(63, 1, 12, 12, 'adf', 3, 405, '2018-01-07 11:29:41'),
(64, 1, 10, 11, 'adf', 2, 440, '2018-01-08 11:29:47'),
(65, 1, 12, 13, 'asd', 4, 660, '2018-01-08 11:29:57'),
(66, 1, 10, 11, 'zc', 3, 660, '2018-01-08 11:30:04'),
(67, 1, 12, 13, 'ads', 3, 495, '2018-01-08 11:30:10'),
(68, 1, 2, 2, 'asd', 4, 640, '2018-01-08 11:30:17'),
(69, 1, 11, 18, 'asd', 3, 450, '2018-01-08 11:30:23'),
(70, 1, 2, 2, 'qwe', 3, 480, '2018-01-08 11:30:30'),
(71, 1, 13, 14, 'D', 4, 500, '2018-01-08 11:30:36'),
(72, 1, 2, 2, 'sad', 3, 480, '2018-01-08 11:30:43'),
(73, 1, 1, 1, 'ads', 3, 450, '2018-01-09 11:30:49'),
(74, 1, 6, 6, 'ZDC', 4, 720, '2018-01-09 11:31:02'),
(75, 1, 8, 9, 'Chum', 2, 290, '2018-01-09 06:08:03'),
(76, 1, 2, 2, '', 3, 480, '2018-01-09 06:10:30'),
(77, 1, 4, 5, '', 2, 390, '2018-01-09 06:10:38'),
(78, 1, 13, 14, '', 2, 250, '2018-01-10 06:10:53'),
(79, 1, 13, 14, '', 2, 250, '2018-01-10 06:11:20'),
(80, 1, 14, 15, '', 3, 525, '2018-01-10 06:11:29'),
(81, 1, 10, 11, '', 4, 880, '2018-01-10 06:11:36'),
(82, 1, 13, 14, '', 5, 625, '2018-01-10 06:11:44'),
(83, 1, 14, 15, '', 2, 350, '2018-01-10 06:11:52'),
(84, 1, 4, 4, '', 4, 720, '2018-01-11 06:11:59'),
(85, 1, 8, 9, '', 5, 725, '2018-01-11 06:12:07'),
(86, 1, 12, 13, '', 3, 495, '2018-01-11 06:12:15'),
(87, 1, 8, 9, '', 3, 435, '2018-01-12 06:12:50'),
(88, 1, 8, 9, 'Chumly', 3, 435, '2018-01-12 06:13:24'),
(89, 1, 4, 4, '', 3, 540, '2018-01-12 06:23:42'),
(90, 1, 5, 17, '', 3, 465, '2018-01-12 06:23:48'),
(91, 1, 2, 2, '', 43, 6880, '2018-01-13 06:23:54'),
(92, 1, 6, 6, '', 3, 540, '2018-01-13 06:23:59'),
(93, 1, 11, 18, '', 1, 150, '2018-01-13 06:24:06'),
(94, 1, 4, 5, '', 5, 975, '2018-01-13 06:24:12'),
(95, 1, 15, 16, '', 4, 700, '2018-01-13 06:24:19'),
(96, 1, 14, 15, '', 5, 875, '2018-01-13 06:24:28'),
(97, 1, 10, 11, '', 5, 1100, '2018-01-13 06:24:36'),
(98, 1, 6, 7, '', 4, 720, '2018-01-13 06:24:43'),
(99, 1, 3, 3, '', 7, 1190, '2018-01-13 06:24:49'),
(100, 1, 2, 2, '', 4, 640, '2018-01-13 06:24:54'),
(101, 1, 1, 1, '', 1, 150, '2018-01-14 06:25:00'),
(102, 1, 7, 8, '', 6, 720, '2018-01-14 06:25:06'),
(103, 1, 11, 18, '', 1, 150, '2018-01-14 06:25:12'),
(104, 1, 11, 18, '', 5, 750, '2018-01-14 06:25:19'),
(105, 1, 13, 14, '', 3, 375, '2018-01-14 06:25:26'),
(106, 1, 7, 8, '', 1, 120, '2018-01-14 06:25:33'),
(107, 1, 11, 18, '', 26, 3900, '2018-01-14 06:25:43'),
(108, 1, 10, 11, '', 6, 1320, '2018-01-14 06:26:04'),
(109, 1, 5, 17, '', 2, 310, '2018-01-14 06:26:18'),
(110, 1, 5, 17, '', 1, 155, '2018-01-14 06:26:25'),
(111, 1, 3, 3, '', 1, 170, '2018-01-15 06:26:30'),
(112, 1, 5, 17, '', 3, 465, '2018-01-15 06:26:36'),
(113, 1, 8, 9, '', 1, 145, '2018-01-15 06:26:42'),
(114, 1, 8, 9, '', 4, 580, '2018-01-15 06:26:51'),
(115, 1, 3, 3, '', 54, 9180, '2018-01-15 06:27:13'),
(116, 1, 2, 2, '', 3, 480, '2018-01-15 06:27:20'),
(117, 1, 5, 17, '', 2, 310, '2018-01-15 06:27:27'),
(118, 1, 6, 7, '', 4, 720, '2018-01-15 06:27:33'),
(119, 1, 5, 17, '', 2, 310, '2018-01-15 06:27:41'),
(120, 1, 9, 10, '', 26, 300, '2018-01-15 06:27:48'),
(121, 1, 12, 12, '', 1, 135, '2018-01-16 06:27:54'),
(122, 1, 12, 13, '', 2, 330, '2018-01-16 06:28:02'),
(123, 1, 9, 10, '', 3, 450, '2018-01-16 06:28:21'),
(124, 1, 14, 15, 'df', 5, 875, '2018-01-10 10:57:18'),
(125, 1, 16, 19, '', 2, 270, '2018-01-26 07:17:52'),
(126, 1, 16, 19, '', 3, 405, '2018-01-26 07:18:04'),
(127, 1, 16, 19, '', 1, 135, '2018-01-26 07:18:23'),
(128, 1, 17, 20, '', 1, 130, '2018-01-26 07:18:32'),
(129, 1, 17, 20, '', 2, 260, '2018-01-26 07:18:43'),
(130, 1, 18, 21, '', 2, 320, '2018-01-26 07:18:55'),
(131, 1, 17, 20, '', 2, 260, '2018-01-26 07:19:07'),
(132, 1, 18, 21, '', 1, 160, '2018-01-26 07:19:15'),
(133, 1, 18, 21, '', 3, 480, '2018-01-26 07:19:25'),
(134, 1, 18, 21, '', 1, 160, '2018-01-26 07:19:36'),
(135, 1, 19, 22, 'adf', 2, 360, '2018-01-26 07:19:48'),
(136, 1, 19, 22, '', 1, 180, '2018-01-26 07:19:59'),
(137, 1, 19, 22, '', 1, 180, '2018-01-26 07:20:10'),
(138, 1, 20, 23, '', 2, 350, '2018-01-26 07:20:20'),
(139, 1, 20, 23, '', 2, 350, '2018-01-26 07:20:31'),
(140, 1, 21, 24, '', 2, 330, '2018-01-26 07:20:41'),
(141, 1, 21, 24, '', 2, 330, '2018-01-26 07:20:53'),
(142, 1, 21, 24, '', 5, 825, '2018-01-26 07:21:03');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `username` varchar(20) CHARACTER SET latin1 NOT NULL,
  `password` varchar(100) CHARACTER SET latin1 NOT NULL,
  `users_role_id` int(11) UNSIGNED NOT NULL,
  `first_name` varchar(100) CHARACTER SET latin1 NOT NULL,
  `last_name` varchar(100) CHARACTER SET latin1 NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '1',
  `is_delete` tinyint(4) NOT NULL DEFAULT '0',
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `users_role_id`, `first_name`, `last_name`, `is_active`, `is_delete`, `date_created`, `date_updated`) VALUES
(1, 'ca', 'ca', 1, 'ca', 'ca', 1, 0, '2017-09-02 02:29:14', NULL),
(7, 'manager', 'manager', 2, 'manager', 'm', 1, 0, '2017-09-13 05:47:02', NULL),
(8, 'employee', 'employee', 3, 'Employee', 'E', 1, 0, '2017-09-13 05:50:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_details`
--

CREATE TABLE `users_details` (
  `id` bigint(20) NOT NULL,
  `users_id` bigint(20) NOT NULL,
  `email_address` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `phone_number` varchar(15) CHARACTER SET latin1 DEFAULT NULL,
  `address` varchar(250) CHARACTER SET latin1 DEFAULT NULL,
  `addhar_card_no` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `pan_card_no` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `ration_card_no` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users_roles`
--

CREATE TABLE `users_roles` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(100) CHARACTER SET latin1 NOT NULL,
  `description` varchar(250) CHARACTER SET latin1 DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '1',
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_roles`
--

INSERT INTO `users_roles` (`id`, `name`, `description`, `is_active`, `date_created`, `date_updated`) VALUES
(1, 'Admin', NULL, 1, '2017-08-15 02:15:53', NULL),
(2, 'Manager', NULL, 1, '2017-08-15 02:15:53', NULL),
(3, 'Employee\r\n', NULL, 1, '2017-08-15 02:16:19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_salary_details`
--

CREATE TABLE `users_salary_details` (
  `id` bigint(20) NOT NULL,
  `users_id` bigint(20) NOT NULL,
  `salary` float NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_brands_users_id_users_id_idx` (`users_id`);

--
-- Indexes for table `expenditure`
--
ALTER TABLE `expenditure`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_inventory_users` (`users_id`),
  ADD KEY `fk_ inventory_brands_brands_id_id_idx` (`brands_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_sales_users_users_id_id_idx` (`users_id`),
  ADD KEY `fk_sales_brands_brands_id_id_idx` (`brands_id`),
  ADD KEY `fk_sales_inventory_inventory_id_id_idx` (`inventory_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_users_users_roles` (`users_role_id`);

--
-- Indexes for table `users_details`
--
ALTER TABLE `users_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `d_idx` (`users_id`);

--
-- Indexes for table `users_roles`
--
ALTER TABLE `users_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_salary_details`
--
ALTER TABLE `users_salary_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_users_salary_details_users_usersid_id_idx` (`users_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `expenditure`
--
ALTER TABLE `expenditure`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `users_details`
--
ALTER TABLE `users_details`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users_salary_details`
--
ALTER TABLE `users_salary_details`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `brands`
--
ALTER TABLE `brands`
  ADD CONSTRAINT `fk_brands_users_id_users_id` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `fk_ inventory_users_users_id_id` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_inventory_brands_brands_id_id` FOREIGN KEY (`brands_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `fk_sales_brands_brands_id_id` FOREIGN KEY (`brands_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_sales_inventory_inventory_id_id` FOREIGN KEY (`inventory_id`) REFERENCES `inventory` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_sales_users_users_id_id` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `FK_users_users_roles` FOREIGN KEY (`users_role_id`) REFERENCES `users_roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users_details`
--
ALTER TABLE `users_details`
  ADD CONSTRAINT `fk_users_details_users_users_id_id` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users_salary_details`
--
ALTER TABLE `users_salary_details`
  ADD CONSTRAINT `fk_users_salary_details_users_users_id_id` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
