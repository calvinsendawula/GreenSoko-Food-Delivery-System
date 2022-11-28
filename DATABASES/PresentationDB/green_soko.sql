-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2022 at 09:48 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `green_soko`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `adminID` int(11) NOT NULL,
  `firstName` varchar(15) NOT NULL,
  `lastName` varchar(15) NOT NULL,
  `password` varchar(60) NOT NULL,
  `createdAt` datetime NOT NULL,
  `updatedOn` datetime NOT NULL,
  `isDeleted` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`adminID`, `firstName`, `lastName`, `password`, `createdAt`, `updatedOn`, `isDeleted`) VALUES
(84575460, 'Calvin', 'Sendawula', '$2y$10$NJ65zCIyI/6GgcL8BUNrieIr7s1uyL3B5YybQQTFzA.37Hbb5Gyfm', '2022-06-11 22:29:07', '2022-06-11 22:29:07', 0),
(84575461, 'Jean', 'Wasike', '$2y$10$tYcQUhm61r3uCmZx9NjzpOjuQsBdgV43sZsIGmJ/GiOBhQt6vfdfS', '2022-06-11 22:40:32', '2022-06-11 22:40:32', 0),
(84575462, 'Mwangi', 'Danroy', '$2y$10$wvIlSncI0mTjkXwkQKZb2eM.4F0iO6b9KGD8cA08/aJolCit.QX.q', '2022-06-11 22:41:05', '2022-06-11 22:41:05', 0),
(84575467, 'Michael', 'Muya', '$2y$10$ZAHu3FcJKQ7NNhMSTp5XsOIjEGtzDMx.YKOMIab3s2tyhtMMwgNaS', '2022-06-11 22:41:35', '2022-06-11 22:41:35', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_api_token`
--

CREATE TABLE `tbl_api_token` (
  `apiTokenID` int(11) NOT NULL,
  `apiUserID` int(11) NOT NULL,
  `apiToken` varchar(255) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `expiresAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `isDeleted` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_api_user`
--

CREATE TABLE `tbl_api_user` (
  `apiUserID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `apiKey` varchar(60) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedOn` timestamp NOT NULL DEFAULT current_timestamp(),
  `isDeleted` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_invoice`
--

CREATE TABLE `tbl_invoice` (
  `invoiceID` int(5) NOT NULL,
  `methodID` int(5) NOT NULL,
  `orderID` int(5) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `isDeleted` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_location`
--

CREATE TABLE `tbl_location` (
  `locationID` int(8) NOT NULL,
  `locationName` varchar(25) NOT NULL,
  `locationImage` varchar(100) NOT NULL,
  `createdAt` datetime NOT NULL,
  `updatedOn` datetime NOT NULL,
  `isDeleted` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_location`
--

INSERT INTO `tbl_location` (`locationID`, `locationName`, `locationImage`, `createdAt`, `updatedOn`, `isDeleted`) VALUES
(40001235, 'Magharibi', 'Magharibi_.jpg', '2022-05-06 11:40:46', '2022-05-06 11:40:46', 0),
(40001238, 'Nairobi West', 'N_West.jpg', '2022-05-06 11:48:47', '2022-05-06 11:48:47', 0),
(40001239, 'Madaraka', 'Kilimani2_.jpg', '2022-05-10 08:16:02', '2022-05-10 08:16:02', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `orderID` int(5) NOT NULL,
  `userID` int(5) NOT NULL,
  `orderDetails` varchar(400) NOT NULL,
  `converted` enum('0','1') NOT NULL DEFAULT '0',
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedOn` timestamp NOT NULL DEFAULT current_timestamp(),
  `isDeleted` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`orderID`, `userID`, `orderDetails`, `converted`, `createdAt`, `updatedOn`, `isDeleted`) VALUES
(15146210, 84575461, '{\"cartItems\":[{\"itemId\":\"12\",\"quantity\":\"1\"}],\"totalPrice\":250}', '1', '2022-06-14 06:05:07', '2022-06-14 06:05:07', '0'),
(15146211, 84575461, '{\"cartItems\":[{\"itemId\":\"14\",\"quantity\":\"1\"}],\"totalPrice\":2150}', '1', '2022-06-14 06:12:41', '2022-06-14 06:12:41', '0'),
(15146212, 84575463, '{\"cartItems\":[{\"itemId\":\"11\",\"quantity\":\"1\"}],\"totalPrice\":280}', '1', '2022-06-14 06:15:08', '2022-06-14 06:15:08', '0'),
(15146213, 84575463, '{\"cartItems\":[{\"itemId\":\"12\",\"quantity\":\"1\"}],\"totalPrice\":250}', '1', '2022-06-14 06:17:11', '2022-06-14 06:17:11', '0'),
(15146214, 84575465, '{\"cartItems\":[{\"itemId\":\"16\",\"quantity\":\"1\"}],\"totalPrice\":800}', '1', '2022-06-14 06:23:31', '2022-06-14 06:23:31', '0'),
(15146215, 84575463, '{\"cartItems\":[{\"itemId\":\"328\",\"quantity\":\"1\"}],\"totalPrice\":130}', '1', '2022-06-21 06:43:48', '2022-06-21 06:43:48', '0'),
(15146216, 84575463, '{\"cartItems\":[{\"itemId\":\"2\",\"quantity\":\"2\"},{\"itemId\":\"48\",\"quantity\":\"1\"}],\"totalPrice\":1270}', '1', '2022-06-22 16:38:42', '2022-06-22 16:38:42', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_verification`
--

CREATE TABLE `tbl_order_verification` (
  `verificationID` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `phone_number` int(30) NOT NULL,
  `order_mpesa_code` varchar(30) NOT NULL,
  `is_verified` tinyint(1) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedOn` timestamp NOT NULL DEFAULT current_timestamp(),
  `isDeleted` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_order_verification`
--

INSERT INTO `tbl_order_verification` (`verificationID`, `user_id`, `phone_number`, `order_mpesa_code`, `is_verified`, `createdAt`, `updatedOn`, `isDeleted`) VALUES
(55113410, 84575460, 729524962, 'werfgthysju', 0, '2022-06-27 17:04:02', '2022-06-27 17:04:02', '0'),
(55113411, 84575463, 729524962, 'Kamma', 0, '2022-06-27 17:04:02', '2022-06-27 17:04:02', '0'),
(55113412, 84575465, 234567890, 'sqwertyuio', 0, '2022-06-27 17:04:02', '2022-06-27 17:04:02', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment_methods`
--

CREATE TABLE `tbl_payment_methods` (
  `methodID` int(5) NOT NULL,
  `methodName` varchar(15) DEFAULT NULL,
  `isDeleted` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `productID` int(8) NOT NULL,
  `restaurantID` int(8) NOT NULL,
  `productName` varchar(300) NOT NULL,
  `productImage` varchar(100) NOT NULL,
  `productPrice` double NOT NULL,
  `availability` int(1) NOT NULL DEFAULT 0 COMMENT '0 for available, 1 for not available',
  `addedAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL,
  `isDeleted` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`productID`, `restaurantID`, `productName`, `productImage`, `productPrice`, `availability`, `addedAt`, `updatedAt`, `isDeleted`) VALUES
(1, 40009813, 'Philly Cheesesteak Fries + 1 Reg Fries + 350ml soda', 'Cheesesteak+Fries.jpg', 600, 0, '2022-05-14 08:30:38', '2022-05-14 08:30:38', 0),
(2, 40009813, '1 Milkshake and 2 pcs of Cookies', 'Milkshake+Cookies.jpg', 350, 0, '2022-05-14 08:47:40', '2022-05-14 08:47:40', 0),
(3, 40009813, '1 Double Burger + 1 Reg Fries + 350ml Soda', 'BurgerFriesSoda1.jpg', 650, 0, '2022-05-14 08:48:34', '2022-05-14 08:48:34', 0),
(4, 40009813, '1 Pc Crispy Chicken + 1 Reg Fries + 350ml soda + Salad', 'ChickenFriesSoda.jpg', 490, 0, '2022-05-14 08:50:56', '2022-05-14 08:50:56', 0),
(5, 40009814, 'Bacon fries with cheese', 'BaconFries.jpg', 680, 0, '2022-05-14 08:52:32', '2022-05-14 08:52:32', 0),
(6, 40009814, 'Pork fries', 'PorkFries.jpg', 480, 0, '2022-05-14 08:52:58', '2022-05-14 08:52:58', 0),
(7, 40009814, 'Bacon fries', 'BaconFries.jpg', 650, 0, '2022-05-14 08:53:16', '2022-05-14 08:53:16', 0),
(8, 40009814, 'Chicken fries', 'Chicken+chips1.png', 480, 0, '2022-05-14 08:53:45', '2022-05-14 08:53:45', 0),
(9, 40009811, 'Coca cola 1.25l', 'Coke1250ml.jpg', 130, 0, '2022-05-14 08:55:16', '2022-05-14 08:55:16', 0),
(10, 40009811, 'Coca cola 2l', 'Coke2l.jpg', 190, 0, '2022-05-14 08:55:41', '2022-05-14 08:55:41', 0),
(11, 40009811, 'Coca cola 500ml', 'Coke500ml.jpg', 80, 0, '2022-05-14 08:56:05', '2022-05-14 08:56:05', 0),
(12, 40009811, 'Coca cola 350ml', 'Coke350ml.jpg', 50, 0, '2022-05-14 08:56:24', '2022-05-14 08:56:24', 0),
(13, 40009812, '1/2kg goat meat and chips', 'Goat+Chips1.jpg', 750, 0, '2022-05-14 08:59:44', '2022-05-14 08:59:44', 0),
(14, 40009812, 'Chicken and chips', 'Chicken+chips1.png', 1950, 0, '2022-05-14 09:00:36', '2022-05-14 09:00:36', 0),
(15, 40009812, 'Chicken and chips', 'Chicken+chips1.png', 1100, 0, '2022-05-14 09:01:21', '2022-05-14 09:01:21', 0),
(16, 40009812, '1/2 Goat meat and ugali', 'Goat+Ugali1.png', 600, 0, '2022-05-14 09:01:58', '2022-05-14 09:01:58', 0),
(22, 40009818, 'Full Chicken + Lyonnase potatoes ', 'Goat+Chips1.jpg', 1350, 0, '2022-05-15 19:13:39', '2022-05-15 19:13:39', 0),
(23, 40009818, 'Coca cola 1.25l', 'Coke1250ml.jpg', 130, 0, '2022-05-15 19:14:01', '2022-05-15 19:14:01', 0),
(24, 40009818, 'Coca cola 2l', 'Coke2l.jpg', 190, 0, '2022-05-15 19:15:26', '2022-05-15 19:15:26', 0),
(25, 40009831, 'Rice + Beef Stew', 'rice+beefstew.jpg', 190, 0, '2022-05-15 19:17:25', '2022-05-15 19:17:25', 0),
(26, 40009831, 'Plain Pilau', 'pilau.jpg', 150, 0, '2022-05-15 19:17:44', '2022-05-15 19:17:44', 0),
(27, 40009831, 'Rice + Beans', 'rice+beans.jpg', 140, 0, '2022-05-15 19:18:11', '2022-05-15 19:18:11', 0),
(29, 40009831, 'Rice + Mayai', 'rice+mayai.jpg', 170, 0, '2022-05-15 19:30:11', '2022-05-15 19:30:11', 0),
(30, 40009812, '1kg Goat meat + Ugali', 'Goat+Ugali2.png', 1200, 0, '2022-05-16 17:53:25', '2022-05-16 17:53:25', 0),
(31, 40009812, 'Coca cola 1.25l', 'Coke1250ml.jpg', 130, 0, '2022-05-16 17:54:03', '2022-05-16 17:54:03', 0),
(32, 40009812, 'Coca cola 2l', 'Coke2l.jpg', 190, 0, '2022-05-16 17:54:30', '2022-05-16 17:54:30', 0),
(33, 40009812, 'Coca cola 500 ml', 'Coke500ml.jpg', 80, 0, '2022-05-16 17:55:04', '2022-05-16 17:55:04', 0),
(34, 40009812, 'Coca cola 350ml', 'Coke350ml.jpg', 50, 0, '2022-05-16 17:55:52', '2022-05-16 17:55:52', 0),
(35, 40009812, 'Sprite 350ml', 'Sprite350ml.jpg', 50, 0, '2022-05-16 17:56:14', '2022-05-16 17:56:14', 0),
(36, 40009812, 'Sprite 500ml', 'Sprite500ml.jpg', 80, 0, '2022-05-16 17:56:37', '2022-05-16 17:56:37', 0),
(37, 40009812, 'Sprite 2l', 'Sprite2l.jpg', 190, 0, '2022-05-16 18:01:02', '2022-05-16 18:01:02', 0),
(38, 40009812, 'Sprite 1.25l', 'Sprite1250ml.jpg', 130, 0, '2022-05-16 18:01:02', '2022-05-16 18:01:02', 0),
(39, 40009812, 'Novida 350ml', 'Novida.jpg', 50, 0, '2022-05-16 18:01:02', '2022-05-16 18:01:02', 0),
(40, 40009812, 'Fanta Passion 2l', 'FantaPassion2l.jpg', 190, 0, '2022-05-16 18:01:02', '2022-05-16 18:01:02', 0),
(41, 40009812, 'Fanta Passion 1.25l', 'FantaPassion1250ml.jpg', 130, 0, '2022-05-16 18:01:02', '2022-05-16 18:01:02', 0),
(42, 40009812, 'Fanta Passion 500ml', 'FantaPassion500ml.jpg', 80, 0, '2022-05-16 18:01:02', '2022-05-16 18:01:02', 0),
(43, 40009812, 'Fanta Orange 2l', 'FantaOrange2l.jpg', 190, 0, '2022-05-17 18:16:33', '2022-05-17 18:16:33', 0),
(44, 40009812, 'Fanta Orange 350ml', 'FantaOrange350ml.jpg', 80, 0, '2022-05-17 18:16:33', '2022-05-17 18:16:33', 0),
(45, 40009812, 'Mango Juice 500ml', 'Mango500ml.jpg', 85, 0, '2022-05-17 18:16:33', '2022-05-17 18:16:33', 0),
(46, 40009812, 'Minute Maid Mango Juice 1l', 'MinuteMaidMango.jpg', 160, 0, '2022-05-17 18:16:33', '2022-05-17 18:16:33', 0),
(47, 40009813, 'Coca cola 1.25l', 'Coke1250ml.jpg', 130, 0, '2022-05-18 05:47:46', '2022-05-18 05:47:46', 0),
(48, 40009813, '4 pc Hot wings + 1 Reg Fries + 350ml Soda', 'WingsFriesSoda.jpg', 570, 0, '2022-05-18 05:47:46', '2022-05-18 05:47:46', 0),
(49, 40009813, '1 Burger + 1 Reg Fries + 350ml Soda', 'BurgerFriesSoda2.jpg', 570, 0, '2022-05-18 05:47:46', '2022-05-18 05:47:46', 0),
(50, 40009813, 'Coca cola 2l', 'Coke2l.jpg', 190, 0, '2022-05-18 05:47:46', '2022-05-18 05:47:46', 0),
(51, 40009813, 'Coca cola 500ml', 'Coke500ml.jpg', 80, 0, '2022-05-18 05:47:46', '2022-05-18 05:47:46', 0),
(52, 40009813, 'Coca cola 350ml', 'Coke350ml.jpg', 50, 0, '2022-05-18 05:47:46', '2022-05-18 05:47:46', 0),
(53, 40009813, 'Sprite 1.25l', 'Sprite1250ml.jpg', 130, 0, '2022-05-18 05:47:46', '2022-05-18 05:47:46', 0),
(54, 40009813, 'Sprite 2l', 'Sprite2l.jpg', 190, 0, '2022-05-18 05:47:46', '2022-05-18 05:47:46', 0),
(55, 40009813, 'Sprite 500ml', 'Sprite500ml.jpg', 80, 0, '2022-05-18 05:47:46', '2022-05-18 05:47:46', 0),
(56, 40009813, 'Sprite 350ml', 'Sprite350ml.jpg', 50, 0, '2022-05-18 05:47:46', '2022-05-18 05:47:46', 0),
(57, 40009813, 'Novida 350ml', 'Novida.jpg', 50, 0, '2022-05-18 05:47:46', '2022-05-18 05:47:46', 0),
(58, 40009813, 'Fanta Passion 1.25l', 'FantaPassion1250ml.jpg', 130, 0, '2022-05-18 05:47:46', '2022-05-18 05:47:46', 0),
(59, 40009813, 'Fanta Passion 2l', 'FantaPassion2l.jpg', 190, 0, '2022-05-18 05:47:46', '2022-05-18 05:47:46', 0),
(60, 40009813, 'Fanta Passion 500ml', 'FantaPassion500ml.jpg', 80, 0, '2022-05-18 05:47:46', '2022-05-18 05:47:46', 0),
(61, 40009813, 'Fanta Orange 2l', 'FantaOrange2l.jpg', 190, 0, '2022-05-18 05:47:46', '2022-05-18 05:47:46', 0),
(62, 40009813, 'Fanta Orange 350ml', 'FantaOrange350ml.jpg', 50, 0, '2022-05-18 05:47:46', '2022-05-18 05:47:46', 0),
(63, 40009813, 'Mango Juice 500ml', 'Mango500ml.jpg', 85, 0, '2022-05-18 05:47:46', '2022-05-18 05:47:46', 0),
(64, 40009813, 'Minute Maid Mango 1l', 'MinuteMaidMango.jpg', 160, 0, '2022-05-18 05:47:46', '2022-05-18 05:47:46', 0),
(65, 40009814, 'Chicken Fries with cheese', 'Chicken+chips1.png', 570, 0, '2022-05-18 05:56:18', '2022-05-18 05:56:18', 0),
(66, 40009814, 'Coca cola 1.25l', 'Coke1250ml.jpg', 130, 0, '2022-05-18 05:56:18', '2022-05-18 05:56:18', 0),
(67, 40009814, 'Coca cola 2l', 'Coke2l.jpg', 190, 0, '2022-05-18 05:56:18', '2022-05-18 05:56:18', 0),
(68, 40009814, 'Coca cola 500ml', 'Coke500ml.jpg', 80, 0, '2022-05-18 05:56:18', '2022-05-18 05:56:18', 0),
(69, 40009814, 'Coca cola 350ml', 'Coke350ml.jpg', 50, 0, '2022-05-18 05:56:18', '2022-05-18 05:56:18', 0),
(70, 40009814, 'Sprite 1.25l', 'Sprite1250ml.jpg', 130, 0, '2022-05-18 05:56:18', '2022-05-18 05:56:18', 0),
(71, 40009814, 'Sprite 2l', 'Sprite2l.jpg', 190, 0, '2022-05-18 05:56:18', '2022-05-18 05:56:18', 0),
(72, 40009814, 'Sprite 500ml', 'Sprite500ml.jpg', 80, 0, '2022-05-18 05:56:18', '2022-05-18 05:56:18', 0),
(73, 40009814, 'Sprite 350ml', 'Sprite350ml.jpg', 50, 0, '2022-05-18 05:56:18', '2022-05-18 05:56:18', 0),
(74, 40009814, 'Novida 350ml', 'Novida.jpg', 50, 0, '2022-05-18 05:56:18', '2022-05-18 05:56:18', 0),
(75, 40009814, 'Fanta Passion 1.25l', 'FantaPassion1250ml.jpg', 130, 0, '2022-05-18 05:56:18', '2022-05-18 05:56:18', 0),
(76, 40009814, 'Fanta Passion 2l', 'FantaPassion2l.jpg', 190, 0, '2022-05-18 05:56:18', '2022-05-18 05:56:18', 0),
(77, 40009814, 'Fanta Passion 500ml', 'FantaPassion500ml.jpg', 80, 0, '2022-05-18 05:56:18', '2022-05-18 05:56:18', 0),
(78, 40009814, 'Fanta Orange 2l', 'FantaOrange2l.jpg', 190, 0, '2022-05-18 05:56:18', '2022-05-18 05:56:18', 0),
(79, 40009814, 'Fanta Orange 350ml', 'FantaOrange350ml.jpg', 50, 0, '2022-05-18 05:56:18', '2022-05-18 05:56:18', 0),
(80, 40009814, 'Mango Juice 500ml', 'Mango500ml.jpg', 85, 0, '2022-05-18 05:56:18', '2022-05-18 05:56:18', 0),
(81, 40009814, 'Minute Maid Mango 1l', 'MinuteMaidMango.jpg', 160, 0, '2022-05-18 05:56:18', '2022-05-18 05:56:18', 0),
(82, 40009811, 'Sprite 1.25l', 'Sprite1250ml.jpg', 130, 0, '2022-05-18 06:00:10', '2022-05-18 06:00:10', 0),
(83, 40009811, 'Sprite 2l', 'Sprite2l.jpg', 190, 0, '2022-05-18 06:00:10', '2022-05-18 06:00:10', 0),
(84, 40009811, 'Sprite 500ml', 'Sprite500ml.jpg', 80, 0, '2022-05-18 06:00:10', '2022-05-18 06:00:10', 0),
(85, 40009811, 'Sprite 350ml', 'Sprite350ml.jpg', 50, 0, '2022-05-18 06:00:10', '2022-05-18 06:00:10', 0),
(86, 40009811, 'Novida 350ml', 'Novida.jpg', 50, 0, '2022-05-18 06:00:10', '2022-05-18 06:00:10', 0),
(87, 40009811, 'Fanta Passion 1.25l', 'FantaPassion1250ml.jpg', 130, 0, '2022-05-18 06:00:10', '2022-05-18 06:00:10', 0),
(88, 40009811, 'Fanta Passion 2l', 'FantaPassion2l.jpg', 190, 0, '2022-05-18 06:00:10', '2022-05-18 06:00:10', 0),
(89, 40009811, 'Fanta Passion 500ml', 'FantaPassion500ml.jpg', 80, 0, '2022-05-18 06:00:10', '2022-05-18 06:00:10', 0),
(90, 40009811, 'Fanta Orange 2l', 'FantaOrange2l.jpg', 190, 0, '2022-05-18 06:00:10', '2022-05-18 06:00:10', 0),
(91, 40009811, 'Fanta Orange 350ml', 'FantaOrange350ml.jpg', 50, 0, '2022-05-18 06:00:10', '2022-05-18 06:00:10', 0),
(92, 40009811, 'Mango Juice 500ml', 'Mango500ml.jpg', 85, 0, '2022-05-18 06:00:10', '2022-05-18 06:00:10', 0),
(93, 40009811, 'Minute Maid Mango 1l', 'MinuteMaidMango.jpg', 160, 0, '2022-05-18 06:00:10', '2022-05-18 06:00:10', 0),
(99, 40009817, 'Plain Fries', 'fries.jpg', 140, 0, '2022-05-19 09:26:15', '2022-05-19 09:26:15', 0),
(116, 40009817, 'Coca cola 1.25l', 'Coke1250ml.jpg', 130, 0, '2022-05-19 09:29:02', '2022-05-19 09:29:02', 0),
(117, 40009817, 'Coca cola 2l', 'Coke2l.jpg', 190, 0, '2022-05-19 09:29:02', '2022-05-19 09:29:02', 0),
(118, 40009817, 'Coca cola 500ml', 'Coke500ml.jpg', 80, 0, '2022-05-19 09:29:02', '2022-05-19 09:29:02', 0),
(119, 40009817, 'Coca cola 350ml', 'Coke350ml.jpg', 50, 0, '2022-05-19 09:29:02', '2022-05-19 09:29:02', 0),
(120, 40009817, 'Sprite 1.25l', 'Sprite1250ml.jpg', 130, 0, '2022-05-19 09:29:02', '2022-05-19 09:29:02', 0),
(121, 40009817, 'Sprite 2l', 'Sprite2l.jpg', 190, 0, '2022-05-19 09:29:02', '2022-05-19 09:29:02', 0),
(122, 40009817, 'Sprite 500ml', 'Sprite500ml.jpg', 80, 0, '2022-05-19 09:29:02', '2022-05-19 09:29:02', 0),
(123, 40009817, 'Sprite 350ml', 'Sprite350ml.jpg', 50, 0, '2022-05-19 09:29:02', '2022-05-19 09:29:02', 0),
(124, 40009817, 'Novida 350ml', 'Novida.jpg', 50, 0, '2022-05-19 09:29:02', '2022-05-19 09:29:02', 0),
(125, 40009817, 'Fanta Passion 1.25l', 'FantaPassion1250ml.jpg', 130, 0, '2022-05-19 09:29:02', '2022-05-19 09:29:02', 0),
(126, 40009817, 'Fanta Passion 2l', 'FantaPassion2l.jpg', 190, 0, '2022-05-19 09:29:02', '2022-05-19 09:29:02', 0),
(127, 40009817, 'Fanta Passion 500ml', 'FantaPassion500ml.jpg', 80, 0, '2022-05-19 09:29:02', '2022-05-19 09:29:02', 0),
(128, 40009817, 'Fanta Orange 2l', 'FantaOrange2l.jpg', 190, 0, '2022-05-19 09:29:02', '2022-05-19 09:29:02', 0),
(129, 40009817, 'Fanta Orange 350ml', 'FantaOrange350ml.jpg', 50, 0, '2022-05-19 09:29:02', '2022-05-19 09:29:02', 0),
(130, 40009817, 'Mango Juice 500ml', 'Mango500ml.jpg', 85, 0, '2022-05-19 09:29:02', '2022-05-19 09:29:02', 0),
(131, 40009817, 'Minute Maid Mango 1l', 'MinuteMaidMango.jpg', 160, 0, '2022-05-19 09:29:02', '2022-05-19 09:29:02', 0),
(132, 40009816, '3/4kg Pork + Ugali', 'Goat+Ugali2.png', 650, 0, '2022-05-19 09:33:50', '2022-05-19 09:33:50', 0),
(133, 40009816, '1/2kg Pork + Ugali', 'Goat+Ugali2.png', 550, 0, '2022-05-19 09:33:50', '2022-05-19 09:33:50', 0),
(134, 40009816, '1kg Pork + Fries', 'PorkFries2.png', 900, 0, '2022-05-19 09:33:50', '2022-05-19 09:33:50', 0),
(135, 40009816, '1/2kg Pork + Fries', 'PorkFries2.png', 550, 0, '2022-05-19 09:33:50', '2022-05-19 09:33:50', 0),
(136, 40009816, '3/4kg Pork + Fries', 'PorkFries2.png', 700, 0, '2022-05-19 09:33:50', '2022-05-19 09:33:50', 0),
(137, 40009816, '1kg Pork + Ugali', 'Goat+Ugali2.png', 900, 0, '2022-05-19 09:33:50', '2022-05-19 09:33:50', 0),
(138, 40009816, 'Coca cola 1.25l', 'Coke1250ml.jpg', 130, 0, '2022-05-19 09:33:50', '2022-05-19 09:33:50', 0),
(139, 40009816, 'Coca cola 2l', 'Coke2l.jpg', 190, 0, '2022-05-19 09:33:50', '2022-05-19 09:33:50', 0),
(140, 40009816, 'Coca cola 500ml', 'Coke500ml.jpg', 80, 0, '2022-05-19 09:33:50', '2022-05-19 09:33:50', 0),
(141, 40009816, 'Coca cola 350ml', 'Coke350ml.jpg', 50, 0, '2022-05-19 09:33:50', '2022-05-19 09:33:50', 0),
(142, 40009816, 'Sprite 1.25l', 'Sprite1250ml.jpg', 130, 0, '2022-05-19 09:33:50', '2022-05-19 09:33:50', 0),
(143, 40009816, 'Sprite 2l', 'Sprite2l.jpg', 190, 0, '2022-05-19 09:33:50', '2022-05-19 09:33:50', 0),
(144, 40009816, 'Sprite 500ml', 'Sprite500ml.jpg', 80, 0, '2022-05-19 09:33:50', '2022-05-19 09:33:50', 0),
(145, 40009816, 'Sprite 350ml', 'Sprite350ml.jpg', 50, 0, '2022-05-19 09:33:50', '2022-05-19 09:33:50', 0),
(146, 40009816, 'Novida 350ml', 'Novida.jpg', 50, 1, '2022-05-19 09:33:50', '2022-05-19 09:33:50', 0),
(147, 40009816, 'Fanta Passion 1.25l', 'FantaPassion1250ml.jpg', 130, 0, '2022-05-19 09:33:50', '2022-05-19 09:33:50', 0),
(148, 40009816, 'Fanta Passion 2l', 'FantaPassion2l.jpg', 190, 0, '2022-05-19 09:33:50', '2022-05-19 09:33:50', 0),
(149, 40009816, 'Fanta Passion 500ml', 'FantaPassion500ml.jpg', 80, 0, '2022-05-19 09:33:50', '2022-05-19 09:33:50', 0),
(150, 40009816, 'Fanta Orange 2l', 'FantaOrange2l.jpg', 190, 0, '2022-05-19 09:33:50', '2022-05-19 09:33:50', 0),
(151, 40009816, 'Fanta Orange 350ml', 'FantaOrange350ml.jpg', 50, 0, '2022-05-19 09:33:50', '2022-05-19 09:33:50', 0),
(152, 40009816, 'Mango Juice 500ml', 'Mango500ml.jpg', 85, 0, '2022-05-19 09:33:50', '2022-05-19 09:33:50', 0),
(153, 40009816, 'Minute Maid Mango 1l', 'MinuteMaidMango.jpg', 160, 0, '2022-05-19 09:33:50', '2022-05-19 09:33:50', 0),
(154, 40009818, 'Coca cola 500ml', 'Coke500ml.jpg', 80, 0, '2022-05-19 09:37:15', '2022-05-19 09:37:15', 0),
(155, 40009818, 'Coca cola 350ml', 'Coke350ml.jpg', 50, 0, '2022-05-19 09:37:15', '2022-05-19 09:37:15', 0),
(156, 40009818, 'Sprite 1.25l', 'Sprite1250ml.jpg', 130, 0, '2022-05-19 09:37:15', '2022-05-19 09:37:15', 0),
(157, 40009818, 'Sprite 2l', 'Sprite2l.jpg', 190, 0, '2022-05-19 09:37:15', '2022-05-19 09:37:15', 0),
(158, 40009818, 'Sprite 500ml', 'Sprite500ml.jpg', 80, 0, '2022-05-19 09:37:15', '2022-05-19 09:37:15', 0),
(159, 40009818, 'Sprite 350ml', 'Sprite350ml.jpg', 50, 0, '2022-05-19 09:37:15', '2022-05-19 09:37:15', 0),
(160, 40009818, 'Novida 350ml', 'Novida.jpg', 50, 0, '2022-05-19 09:37:15', '2022-05-19 09:37:15', 0),
(161, 40009818, 'Fanta Passion 1.25l', 'FantaPassion1250ml.jpg', 130, 0, '2022-05-19 09:37:15', '2022-05-19 09:37:15', 0),
(162, 40009818, 'Fanta Passion 2l', 'FantaPassion2l.jpg', 190, 0, '2022-05-19 09:37:15', '2022-05-19 09:37:15', 0),
(163, 40009818, 'Fanta Passion 500ml', 'FantaPassion500ml.jpg', 80, 0, '2022-05-19 09:37:15', '2022-05-19 09:37:15', 0),
(164, 40009818, 'Fanta Orange 2l', 'FantaOrange2l.jpg', 190, 0, '2022-05-19 09:37:15', '2022-05-19 09:37:15', 0),
(165, 40009818, 'Fanta Orange 350ml', 'FantaOrange350ml.jpg', 50, 0, '2022-05-19 09:37:15', '2022-05-19 09:37:15', 0),
(166, 40009818, 'Mango Juice 500ml', 'Mango500ml.jpg', 85, 0, '2022-05-19 09:37:15', '2022-05-19 09:37:15', 0),
(167, 40009818, 'Minute Maid Mango 1l', 'MinuteMaidMango.jpg', 160, 0, '2022-05-19 09:37:15', '2022-05-19 09:37:15', 0),
(168, 40009828, 'Ukwaju Juice 500ml', 'ukwaju.jpg', 160, 0, '2022-05-19 09:50:57', '2022-05-19 09:50:57', 0),
(169, 40009828, 'Ukwaju Juice 350ml ', 'ukwaju.jpg', 85, 0, '2022-05-19 09:50:57', '2022-05-19 09:50:57', 0),
(170, 40009828, 'Strawberry Milkshake 350ml ', 'strawberrymilkshake.jpg', 110, 0, '2022-05-19 09:50:57', '2022-05-19 09:50:57', 0),
(171, 40009828, 'Strawberry Milkshake 500ml', 'strawberrymilkshake.jpg', 160, 0, '2022-05-19 09:50:57', '2022-05-19 09:50:57', 0),
(172, 40009828, 'Mint Milkshake 350ml ', 'mintmilkshake.jpg', 110, 0, '2022-05-19 09:50:57', '2022-05-19 09:50:57', 0),
(173, 40009828, 'Mint Milkshake 500ml', 'mintmilkshake.jpg', 160, 0, '2022-05-19 09:50:57', '2022-05-19 09:50:57', 0),
(174, 40009828, 'Pistachio Milkshake 500ml', 'pistachiomilkshake.jpg', 160, 0, '2022-05-19 09:50:57', '2022-05-19 09:50:57', 0),
(175, 40009828, 'Pistachio Milkshake 350ml ', 'pistachiomilkshake.jpg', 110, 0, '2022-05-19 09:50:57', '2022-05-19 09:50:57', 0),
(176, 40009828, 'Passion Juice 350ml ', 'passionjuice.jpg', 85, 0, '2022-05-19 09:50:57', '2022-05-19 09:50:57', 0),
(177, 40009828, 'Passion Juice 500ml', 'passionjuice.jpg', 160, 0, '2022-05-19 09:50:57', '2022-05-19 09:50:57', 0),
(178, 40009828, 'Vanilla Milkshake 500ml', 'vanillamilkshake.jpg', 160, 0, '2022-05-19 09:50:57', '2022-05-19 09:50:57', 0),
(179, 40009828, 'Vanilla Milkshake 350ml ', 'vanillamilkshake.jpg', 110, 0, '2022-05-19 09:50:57', '2022-05-19 09:50:57', 0),
(180, 40009828, 'Blueberry Milkshake 350ml ', 'blueberrymilkshake.jpg', 110, 0, '2022-05-19 09:50:57', '2022-05-19 09:50:57', 0),
(181, 40009828, 'Blueberry Milkshake', 'blueberrymilkshake.jpg', 160, 0, '2022-05-19 09:50:57', '2022-05-19 09:50:57', 0),
(182, 40009828, 'Mango Juice 350ml', 'mangojuice.jpg', 85, 0, '2022-05-19 09:50:57', '2022-05-19 09:50:57', 0),
(183, 40009828, 'Chocolate Milkshake 500ml', 'chocolatemilkshake.jpg', 160, 0, '2022-05-19 09:50:57', '2022-05-19 09:50:57', 0),
(184, 40009828, 'Chocolate Milkshake 350ml', 'chocolatemilkshake.jpg', 110, 0, '2022-05-19 09:50:57', '2022-05-19 09:50:57', 0),
(185, 40009828, 'Coca cola 1.25l', 'Coke1250ml.jpg', 130, 0, '2022-05-19 09:50:57', '2022-05-19 09:50:57', 0),
(186, 40009828, 'Coca cola 2l', 'Coke2l.jpg', 190, 0, '2022-05-19 09:50:57', '2022-05-19 09:50:57', 0),
(187, 40009828, 'Coca cola 500ml', 'Coke500ml.jpg', 80, 0, '2022-05-19 09:50:57', '2022-05-19 09:50:57', 0),
(188, 40009828, 'Coca cola 350ml', 'Coke350ml.jpg', 50, 0, '2022-05-19 09:50:57', '2022-05-19 09:50:57', 0),
(189, 40009828, 'Sprite 2l', 'Sprite2l.jpg', 190, 0, '2022-05-19 09:50:57', '2022-05-19 09:50:57', 0),
(190, 40009828, 'Sprite 500ml', 'Sprite500ml.jpg', 80, 0, '2022-05-19 09:50:57', '2022-05-19 09:50:57', 0),
(191, 40009828, 'Fanta Passion 1.25l', 'FantaPassion1250ml.jpg', 130, 0, '2022-05-19 09:50:57', '2022-05-19 09:50:57', 0),
(192, 40009828, 'Fanta Passion 2l', 'FantaPassion2l.jpg', 190, 0, '2022-05-19 09:50:57', '2022-05-19 09:50:57', 0),
(193, 40009828, 'Fanta Passion 500ml', 'FantaPassion500ml.jpg', 80, 0, '2022-05-19 09:50:57', '2022-05-19 09:50:57', 0),
(194, 40009828, 'Fanta Orange 2l', 'FantaOrange2l.jpg', 190, 0, '2022-05-19 09:50:57', '2022-05-19 09:50:57', 0),
(195, 40009828, 'Fanta Orange 350ml', 'FantaOrange350ml.jpg', 80, 0, '2022-05-19 09:50:57', '2022-05-19 09:50:57', 0),
(196, 40009828, 'Mango Juice 500ml', 'Mango500ml.jpg', 160, 0, '2022-05-19 09:50:57', '2022-05-19 09:50:57', 0),
(197, 40009828, 'Minute Maid Mango 1l', 'MinuteMaidMango.jpg', 160, 0, '2022-05-19 09:50:57', '2022-05-19 09:50:57', 0),
(198, 40009819, 'Plain Fries', 'PlainFries.jpg', 140, 0, '2022-05-22 10:26:11', '2022-05-22 10:26:11', 0),
(199, 40009819, 'Smokie', 'Smokie.png', 35, 0, '2022-05-22 10:26:11', '2022-05-22 10:26:11', 0),
(200, 40009819, 'Beef Burger + Big Chips', 'Burger+Chips.png', 270, 0, '2022-05-22 10:26:11', '2022-05-22 10:26:11', 0),
(201, 40009819, 'Beef Burger + Small Chips', 'Burger+Chips.png', 230, 0, '2022-05-22 10:26:11', '2022-05-22 10:26:11', 0),
(202, 40009819, 'Sausage', 'Sausage.png', 65, 0, '2022-05-22 10:26:11', '2022-05-22 10:26:11', 0),
(203, 40009819, 'Beef + Masala Chips', 'MasalaChips.png', 210, 0, '2022-05-22 10:26:11', '2022-05-22 10:26:11', 0),
(204, 40009819, 'Southern Chcken + Big Chips', 'Chicken+chips1.png', 280, 0, '2022-05-22 10:26:11', '2022-05-22 10:26:11', 0),
(205, 40009819, 'Spice Fries', 'SpiceFries.png', 160, 0, '2022-05-22 10:26:11', '2022-05-22 10:26:11', 0),
(206, 40009819, 'Masala Fries', 'MasalaChips.png', 190, 0, '2022-05-22 10:26:11', '2022-05-22 10:26:11', 0),
(207, 40009819, 'Coca cola 1.25l', 'Coke1250ml.jpg', 130, 0, '2022-05-22 10:26:11', '2022-05-22 10:26:11', 0),
(208, 40009819, 'Coca cola 2l', 'Coke2l.jpg', 190, 0, '2022-05-22 10:26:11', '2022-05-22 10:26:11', 0),
(209, 40009819, 'Coca cola 500ml', 'Coke500ml.jpg', 80, 0, '2022-05-22 10:26:11', '2022-05-22 10:26:11', 0),
(210, 40009819, 'Coca cola 350ml', 'Coke350ml.jpg', 50, 0, '2022-05-22 10:26:11', '2022-05-22 10:26:11', 0),
(211, 40009819, 'Sprite 1.25l', 'Sprite1250ml.jpg', 130, 0, '2022-05-22 10:26:11', '2022-05-22 10:26:11', 0),
(212, 40009819, 'Sprite 2l', 'Sprite2l.jpg', 190, 0, '2022-05-22 10:26:11', '2022-05-22 10:26:11', 0),
(213, 40009819, 'Sprite 500ml', 'Sprite500ml.jpg', 80, 0, '2022-05-22 10:26:11', '2022-05-22 10:26:11', 0),
(214, 40009819, 'Sprite 350ml', 'Sprite350ml.jpg', 50, 0, '2022-05-22 10:26:11', '2022-05-22 10:26:11', 0),
(215, 40009819, 'Novida 350ml', 'Novida.jpg', 50, 0, '2022-05-22 10:26:11', '2022-05-22 10:26:11', 0),
(216, 40009819, 'Fanta Passion 1.25l', 'FantaPassion1250ml.jpg', 130, 0, '2022-05-22 10:26:11', '2022-05-22 10:26:11', 0),
(217, 40009819, 'Fanta Passion 2l', 'FantaPassion2l.jpg', 190, 0, '2022-05-22 10:26:11', '2022-05-22 10:26:11', 0),
(218, 40009819, 'Fanta Passion 500ml', 'FantaPassion500ml.jpg', 80, 0, '2022-05-22 10:26:11', '2022-05-22 10:26:11', 0),
(219, 40009819, 'Fanta Orange 2l', 'FantaOrange2l.jpg', 190, 0, '2022-05-22 10:26:11', '2022-05-22 10:26:11', 0),
(220, 40009819, 'Fanta Orange 350ml', 'FantaOrange350ml.jpg', 50, 0, '2022-05-22 10:26:11', '2022-05-22 10:26:11', 0),
(221, 40009819, 'Mango Juice 500ml', 'Mango500ml.jpg', 85, 0, '2022-05-22 10:26:11', '2022-05-22 10:26:11', 0),
(222, 40009819, 'Minute Maid Mango 1l', 'MinuteMaidMango.jpg', 160, 0, '2022-05-22 10:26:11', '2022-05-22 10:26:11', 0),
(223, 40009821, '1/8kg Minced  ', 'MincedMeat.jpg', 200, 0, '2022-05-22 10:52:33', '2022-05-22 10:52:33', 0),
(224, 40009821, '1/4kg Minced meat', 'MincedMeat.jpg', 250, 0, '2022-05-22 10:52:33', '2022-05-22 10:52:33', 0),
(225, 40009821, '1/4kg Minced meat', 'MincedMeat.jpg', 300, 0, '2022-05-22 10:52:33', '2022-05-22 10:52:33', 0),
(226, 40009821, '3/4kg Minced meat', 'MincedMeat.jpg', 400, 0, '2022-05-22 10:52:33', '2022-05-22 10:52:33', 0),
(227, 40009821, 'Minced meat 1kg', 'MincedMeat2.jpg', 570, 0, '2022-05-22 10:52:33', '2022-05-22 10:52:33', 0),
(228, 40009821, '1kg Liver', 'Liver1.jpg', 630, 0, '2022-05-22 10:52:33', '2022-05-22 10:52:33', 0),
(229, 40009821, '1/2kg Liver', 'Liver2.jpg', 320, 0, '2022-05-22 10:52:33', '2022-05-22 10:52:33', 0),
(230, 40009821, '1/4kg Liver', 'Liver2.jpg', 170, 0, '2022-05-22 10:52:33', '2022-05-22 10:52:33', 0),
(231, 40009821, '1/8kg Beef Steak', 'BeefSteak2.jpg', 200, 0, '2022-05-22 10:52:33', '2022-05-22 10:52:33', 0),
(232, 40009821, '1/4kg Beef Steak', 'BeefSteak3.jpg', 250, 0, '2022-05-22 10:52:33', '2022-05-22 10:52:33', 0),
(233, 40009821, '1/2kg Beef Steak', 'BeefSteak2.jpg', 300, 0, '2022-05-22 10:52:33', '2022-05-22 10:52:33', 0),
(234, 40009821, '3/4kg Beef Steak', 'BeefSteak.jpg', 400, 0, '2022-05-22 10:52:33', '2022-05-22 10:52:33', 0),
(235, 40009821, '1kg Beef Steak', 'BeefSteak.jpg', 600, 0, '2022-05-22 10:52:33', '2022-05-22 10:52:33', 0),
(236, 40009821, '1kg Goat Meat', 'GoatMeat.jpg', 670, 0, '2022-05-22 10:52:33', '2022-05-22 10:52:33', 0),
(237, 40009821, '1/2kg Goat Meat', 'GoatMeat.jpg', 340, 0, '2022-05-22 10:52:33', '2022-05-22 10:52:33', 0),
(238, 40009821, '1/4kg Goat Meat', 'GoatMeat.jpg', 180, 0, '2022-05-22 10:52:33', '2022-05-22 10:52:33', 0),
(239, 40009821, '4 eggs', 'Eggs.png', 60, 0, '2022-05-22 10:52:33', '2022-05-22 10:52:33', 0),
(240, 40009821, '1.2kg Full Chicken', 'Chicken.png', 520, 0, '2022-05-22 10:52:33', '2022-05-22 10:52:33', 0),
(241, 40009821, '1.4kg Full Chicken', 'Chicken.png', 600, 0, '2022-05-22 10:52:33', '2022-05-22 10:52:33', 0),
(242, 40009821, '(Full)Kienyeji Chicken', 'Chicken.png', 740, 0, '2022-05-22 10:52:33', '2022-05-22 10:52:33', 0),
(243, 40009826, 'Onions', 'onions.jpg', 10, 0, '2022-05-22 11:13:38', '2022-05-22 11:13:38', 0),
(244, 40009826, 'Bananas', 'bananas.jpg', 10, 0, '2022-05-22 11:13:38', '2022-05-22 11:13:38', 0),
(245, 40009826, 'Carrots', 'carrots.jpg', 25, 0, '2022-05-22 11:13:38', '2022-05-22 11:13:38', 0),
(246, 40009826, 'Cucumber', 'cucumbers.jpg', 40, 0, '2022-05-22 11:13:38', '2022-05-22 11:13:38', 0),
(247, 40009826, 'Irish Potatoes', 'irishpotatoes.jpg', 10, 0, '2022-05-22 11:13:38', '2022-05-22 11:13:38', 0),
(248, 40009826, 'Watermelon', 'watermelon.jpg', 25, 0, '2022-05-22 11:13:38', '2022-05-22 11:13:38', 0),
(249, 40009826, 'Ginger', 'ginger.jpg', 10, 0, '2022-05-22 11:13:38', '2022-05-22 11:13:38', 0),
(250, 40009826, 'Oranges(Local)', 'oranges2.jpg', 10, 0, '2022-05-22 11:13:38', '2022-05-22 11:13:38', 0),
(251, 40009826, 'Mango', 'mangoes.jpg', 40, 0, '2022-05-22 11:13:38', '2022-05-22 11:13:38', 0),
(252, 40009826, 'Tomatoes', 'tomatoes.jpg', 10, 0, '2022-05-22 11:13:38', '2022-05-22 11:13:38', 0),
(253, 40009826, 'Apples', 'apples.jpg', 35, 0, '2022-05-22 11:13:38', '2022-05-22 11:13:38', 0),
(254, 40009826, 'Chilli', 'chilli.jpg', 10, 0, '2022-05-22 11:13:38', '2022-05-22 11:13:38', 0),
(255, 40009826, 'Sukuma(Kales+Spinach)', 'sukuma.jpg', 30, 0, '2022-05-22 11:13:38', '2022-05-22 11:13:38', 0),
(256, 40009826, 'Green pepper(hoho)', 'hoho.jpg', 15, 0, '2022-05-22 11:13:38', '2022-05-22 11:13:38', 0),
(257, 40009826, 'Pawpaw', 'pawpaw.jpg', 140, 0, '2022-05-22 11:13:38', '2022-05-22 11:13:38', 0),
(258, 40009826, 'Oranges(Imported)', 'oranges.jpg', 40, 0, '2022-05-22 11:13:38', '2022-05-22 11:13:38', 0),
(259, 40009826, 'Coriander', 'coriander.jpg', 10, 0, '2022-05-22 11:13:38', '2022-05-22 11:13:38', 0),
(260, 40009826, 'Pineapple', 'pineapple.jpg', 90, 0, '2022-05-22 11:13:38', '2022-05-22 11:13:38', 0),
(261, 40009826, 'Passion(3 pieces)', 'passion.jpg', 20, 0, '2022-05-22 11:13:38', '2022-05-22 11:13:38', 0),
(262, 40009826, 'Garlic', 'garlic.jpg', 20, 0, '2022-05-22 11:13:38', '2022-05-22 11:13:38', 0),
(263, 40009824, '2 Chapos + Beef', 'chapo+beef.jpg', 180, 0, '2022-05-22 11:34:54', '2022-05-22 11:34:54', 0),
(264, 40009824, 'Rice + Beef Fry', 'rice+beeffry.jpg', 200, 0, '2022-05-22 11:34:54', '2022-05-22 11:34:54', 0),
(265, 40009824, 'Rice + Beef Stew', 'rice+beefstew.jpg', 180, 0, '2022-05-22 11:34:54', '2022-05-22 11:34:54', 0),
(266, 40009824, 'Rice + Beans + Chapo', 'rice+chapo+beans.jpg', 160, 0, '2022-05-22 11:34:54', '2022-05-22 11:34:54', 0),
(267, 40009824, 'Rice + Beef + Chapo', 'rice+beef+chapo.jpg', 200, 0, '2022-05-22 11:34:54', '2022-05-22 11:34:54', 0),
(268, 40009824, '4 Chapo + Beans', 'chapo+beans.jpg', 180, 0, '2022-05-22 11:34:54', '2022-05-22 11:34:54', 0),
(269, 40009824, 'Ugali + Omena', 'ugali+omena.jpg', 140, 0, '2022-05-22 11:34:54', '2022-05-22 11:34:54', 0),
(270, 40009824, 'Pilau + Beef', 'pilau+beef.jpg', 190, 0, '2022-05-22 11:34:54', '2022-05-22 11:34:54', 0),
(271, 40009824, 'Ugali + Mayai', 'ugali+mayai.jpg', 170, 0, '2022-05-22 11:34:54', '2022-05-22 11:34:54', 0),
(272, 40009824, '2 Chapo + Beans', 'chapo+beans.jpg', 140, 0, '2022-05-22 11:34:54', '2022-05-22 11:34:54', 0),
(273, 40009824, '2 Chapo + Ndengu', 'chapo+ndengu.jpg', 140, 0, '2022-05-22 11:34:54', '2022-05-22 11:34:54', 0),
(274, 40009824, 'Rice + Minji', 'rice+peas.jpg', 160, 0, '2022-05-22 11:34:54', '2022-05-22 11:34:54', 0),
(275, 40009824, 'Rice + Liver', 'rice+liver.jpg', 240, 0, '2022-05-22 11:34:54', '2022-05-22 11:34:54', 0),
(276, 40009824, 'Rice + Matumbo + Chapo', 'rice+matumbo.jpg', 180, 0, '2022-05-22 11:34:54', '2022-05-22 11:34:54', 0),
(277, 40009824, 'Ugali + Chicken', 'ugali+chicken.jpg', 240, 0, '2022-05-22 11:34:54', '2022-05-22 11:34:54', 0),
(278, 40009824, '3 Chapo + Beef', 'chapo+beef.jpg', 200, 0, '2022-05-22 11:34:54', '2022-05-22 11:34:54', 0),
(279, 40009824, 'Pilau + Beef Fry + Chapo', 'chapo+pilau.jpg', 230, 0, '2022-05-22 11:34:54', '2022-05-22 11:34:54', 0),
(280, 40009824, '3 Chapo + Beans', 'chapo+beans.jpg', 160, 0, '2022-05-22 11:34:54', '2022-05-22 11:34:54', 0),
(281, 40009824, 'Ugali + Fish', 'ugali+fish.jpg', 290, 0, '2022-05-22 11:34:54', '2022-05-22 11:34:54', 0),
(282, 40009824, 'Rice + Matumbo', 'rice+matumbo2.jpg', 160, 0, '2022-05-22 11:34:54', '2022-05-22 11:34:54', 0),
(283, 40009824, 'Pilau + Chicken', 'pilau+chicken.jpg', 250, 0, '2022-05-22 11:34:54', '2022-05-22 11:34:54', 0),
(284, 40009824, 'Ugali + Beef Fry', 'Goat+Ugali1.png', 300, 0, '2022-05-22 11:34:54', '2022-05-22 11:34:54', 0),
(285, 40009824, '4 Chapo + Beef', 'chapo+beef.jpg', 220, 0, '2022-05-22 11:34:54', '2022-05-22 11:34:54', 0),
(286, 40009824, '2 Chapo + Beef Fry', 'chapo+beef.jpg', 200, 0, '2022-05-22 11:34:54', '2022-05-22 11:34:54', 0),
(287, 40009824, 'Rice + Beans', 'rice+beans.jpg', 140, 0, '2022-05-22 11:34:54', '2022-05-22 11:34:54', 0),
(288, 40009824, 'Ugali + Liver', 'ugali+liver.jpg', 240, 0, '2022-05-22 11:34:54', '2022-05-22 11:34:54', 0),
(289, 40009824, 'Avocado', 'avocado.jpg', 40, 0, '2022-05-22 11:34:54', '2022-05-22 11:34:54', 0),
(290, 40009824, 'Chapati', 'chapati.jpg', 25, 0, '2022-05-22 11:34:54', '2022-05-22 11:34:54', 0),
(291, 40009824, 'Pilau + Beef Stew + Chapo', 'chapo+pilau.jpg', 210, 0, '2022-05-22 11:34:54', '2022-05-22 11:34:54', 0),
(292, 40009824, 'Coca cola 1.25l', 'Coke1250ml.jpg', 130, 0, '2022-05-22 11:34:54', '2022-05-22 11:34:54', 0),
(293, 40009824, 'Coca cola 2l', 'Coke2l.jpg', 190, 0, '2022-05-22 11:34:54', '2022-05-22 11:34:54', 0),
(294, 40009824, 'Coca cola 500ml', 'Coke500ml.jpg', 80, 0, '2022-05-22 11:34:54', '2022-05-22 11:34:54', 0),
(295, 40009824, 'Coca cola 350ml', 'Coke350ml.jpg', 50, 0, '2022-05-22 11:34:54', '2022-05-22 11:34:54', 0),
(296, 40009824, 'Sprite 1.25l', 'Sprite1250ml.jpg', 130, 0, '2022-05-22 11:34:54', '2022-05-22 11:34:54', 0),
(297, 40009824, 'Sprite 2l', 'Sprite2l.jpg', 190, 0, '2022-05-22 11:34:54', '2022-05-22 11:34:54', 0),
(298, 40009824, 'Sprite 500ml', 'Sprite500ml.jpg', 80, 0, '2022-05-22 11:34:54', '2022-05-22 11:34:54', 0),
(299, 40009824, 'Sprite 350ml', 'Sprite350ml.jpg', 50, 0, '2022-05-22 11:34:54', '2022-05-22 11:34:54', 0),
(300, 40009824, 'Novida 350ml', 'Novida.jpg', 50, 0, '2022-05-22 11:34:54', '2022-05-22 11:34:54', 0),
(301, 40009824, 'Fanta Passion 1.25l', 'FantaPassion1250ml.jpg', 130, 0, '2022-05-22 11:34:54', '2022-05-22 11:34:54', 0),
(302, 40009824, 'Fanta Passion 2l', 'FantaPassion2l.jpg', 190, 0, '2022-05-22 11:34:54', '2022-05-22 11:34:54', 0),
(303, 40009824, 'Fanta Passion 500ml', 'FantaPassion500ml.jpg', 80, 0, '2022-05-22 11:34:54', '2022-05-22 11:34:54', 0),
(304, 40009824, 'Fanta Orange 2l', 'FantaOrange2l.jpg', 190, 0, '2022-05-22 11:34:54', '2022-05-22 11:34:54', 0),
(305, 40009824, 'Fanta Orange 350ml', 'FantaOrange350ml.jpg', 50, 0, '2022-05-22 11:34:54', '2022-05-22 11:34:54', 0),
(306, 40009824, 'Mango Juice 500ml', 'Mango500ml.jpg', 85, 0, '2022-05-22 11:34:54', '2022-05-22 11:34:54', 0),
(307, 40009824, 'Minute Maid Mango 1l', 'MinuteMaidMango.jpg', 160, 0, '2022-05-22 11:34:54', '2022-05-22 11:34:54', 0),
(308, 40009815, 'Coca cola 1.25l', 'Coke1250ml.jpg', 130, 0, '2022-05-22 12:08:38', '2022-05-22 12:08:38', 0),
(309, 40009815, 'Coca cola 2l', 'Coke2l.jpg', 190, 0, '2022-05-22 12:08:38', '2022-05-22 12:08:38', 0),
(310, 40009815, 'Coca cola 500ml', 'Coke500ml.jpg', 80, 0, '2022-05-22 12:08:38', '2022-05-22 12:08:38', 0),
(311, 40009815, 'Coca cola 350ml', 'Coke350ml.jpg', 50, 0, '2022-05-22 12:08:38', '2022-05-22 12:08:38', 0),
(312, 40009815, 'Sprite 1.25l', 'Sprite1250ml.jpg', 130, 0, '2022-05-22 12:08:38', '2022-05-22 12:08:38', 0),
(313, 40009815, 'Sprite 2l', 'Sprite2l.jpg', 190, 0, '2022-05-22 12:08:38', '2022-05-22 12:08:38', 0),
(314, 40009815, 'Sprite 500ml', 'Sprite500ml.jpg', 80, 0, '2022-05-22 12:08:38', '2022-05-22 12:08:38', 0),
(315, 40009815, 'Sprite 350ml', 'Sprite350ml.jpg', 50, 0, '2022-05-22 12:08:38', '2022-05-22 12:08:38', 0),
(316, 40009815, 'Novida 350ml', 'Novida.jpg', 50, 0, '2022-05-22 12:08:38', '2022-05-22 12:08:38', 0),
(317, 40009815, 'Fanta Passion 1.25l', 'FantaPassion1250ml.jpg', 130, 0, '2022-05-22 12:08:38', '2022-05-22 12:08:38', 0),
(318, 40009815, 'Fanta Passion 2l', 'FantaPassion2l.jpg', 190, 0, '2022-05-22 12:08:38', '2022-05-22 12:08:38', 0),
(319, 40009815, 'Fanta Passion 500ml', 'FantaPassion500ml.jpg', 80, 0, '2022-05-22 12:08:38', '2022-05-22 12:08:38', 0),
(320, 40009815, 'Fanta Orange 2l', 'FantaOrange2l.jpg', 190, 0, '2022-05-22 12:08:38', '2022-05-22 12:08:38', 0),
(321, 40009815, 'Fanta Orange 350ml', 'FantaOrange350ml.jpg', 50, 0, '2022-05-22 12:08:38', '2022-05-22 12:08:38', 0),
(322, 40009815, 'Mango Juice 500ml', 'Mango500ml.jpg', 85, 0, '2022-05-22 12:08:38', '2022-05-22 12:08:38', 0),
(323, 40009815, 'Minute Maid Mango 1l', 'MinuteMaidMango.jpg', 160, 0, '2022-05-22 12:08:38', '2022-05-22 12:08:38', 0),
(324, 40009820, 'Coca cola 1.25l', 'Coke1250ml.jpg', 130, 0, '2022-05-31 08:25:01', '2022-05-31 08:25:01', 0),
(325, 40009820, 'Coca cola 2l', 'Coke2l.jpg', 190, 0, '2022-05-31 08:25:01', '2022-05-31 08:25:01', 0),
(326, 40009820, 'Coca cola 500ml', 'Coke500ml.jpg', 80, 0, '2022-05-31 08:25:01', '2022-05-31 08:25:01', 0),
(327, 40009820, 'Coca cola 350ml', 'Coke350ml.jpg', 50, 0, '2022-05-31 08:25:01', '2022-05-31 08:25:01', 0),
(328, 40009820, 'Sprite 1.25l', 'Sprite1250ml.jpg', 130, 0, '2022-05-31 08:25:01', '2022-05-31 08:25:01', 0),
(329, 40009820, 'Sprite 2l', 'Sprite2l.jpg', 190, 0, '2022-05-31 08:25:01', '2022-05-31 08:25:01', 0),
(330, 40009820, 'Sprite 500ml', 'Sprite500ml.jpg', 80, 0, '2022-05-31 08:25:01', '2022-05-31 08:25:01', 0),
(331, 40009820, 'Sprite 350ml', 'Sprite350ml.jpg', 50, 0, '2022-05-31 08:25:01', '2022-05-31 08:25:01', 0),
(332, 40009820, 'Novida 350ml', 'Novida.jpg', 50, 0, '2022-05-31 08:25:01', '2022-05-31 08:25:01', 0),
(333, 40009820, 'Fanta Passion 1.25l', 'FantaPassion1250ml.jpg', 130, 0, '2022-05-31 08:25:01', '2022-05-31 08:25:01', 0),
(334, 40009820, 'Fanta Passion 2l', 'FantaPassion2l.jpg', 190, 0, '2022-05-31 08:25:01', '2022-05-31 08:25:01', 0),
(335, 40009820, 'Fanta Passion 500ml', 'FantaPassion500ml.jpg', 80, 0, '2022-05-31 08:25:01', '2022-05-31 08:25:01', 0),
(336, 40009820, 'Fanta Orange 2l', 'FantaOrange2l.jpg', 190, 0, '2022-05-31 08:25:01', '2022-05-31 08:25:01', 0),
(337, 40009820, 'Fanta Orange 350ml', 'FantaOrange350ml.jpg', 50, 0, '2022-05-31 08:25:01', '2022-05-31 08:25:01', 0),
(338, 40009820, 'Mango Juice 500ml', 'Mango500ml.jpg', 85, 0, '2022-05-31 08:25:01', '2022-05-31 08:25:01', 0),
(339, 40009820, 'Minute Maid Mango 1l', 'MinuteMaidMango.jpg', 160, 0, '2022-05-31 08:25:01', '2022-05-31 08:25:01', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_restaurant`
--

CREATE TABLE `tbl_restaurant` (
  `restaurantID` int(8) NOT NULL,
  `locationID` int(8) NOT NULL,
  `restaurantName` varchar(25) NOT NULL,
  `restaurantImage` varchar(100) NOT NULL,
  `addedAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL,
  `isDeleted` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_restaurant`
--

INSERT INTO `tbl_restaurant` (`restaurantID`, `locationID`, `restaurantName`, `restaurantImage`, `addedAt`, `updatedAt`, `isDeleted`) VALUES
(40009811, 40001235, 'The Shack', 'The_Shack.jpg', '2022-05-08 19:39:04', '2022-05-08 19:39:04', 0),
(40009812, 40001235, 'Tortila Restaurant', 'Tortila.jpg', '2022-05-08 19:39:27', '2022-05-08 19:39:27', 0),
(40009813, 40001235, 'Miam Fastfood', 'Miams.jpg', '2022-05-08 19:39:48', '2022-05-08 19:39:48', 0),
(40009814, 40001235, 'Toni Restaurant', 'Tonis_Kitch.jpeg', '2022-05-08 19:40:08', '2022-05-08 19:40:08', 0),
(40009815, 40001238, '24/7 Fries & Chicken', '247.jpg', '2022-05-08 19:48:49', '2022-05-08 19:48:49', 0),
(40009816, 40001238, 'Blazing Pork(Mutiso)', 'Blazing_Pork.jpg', '2022-05-08 19:49:09', '2022-05-08 19:49:09', 0),
(40009817, 40001238, 'Aliman Kitchen', 'Aliman_Kitchen.jpg', '2022-05-08 19:49:38', '2022-05-08 19:49:38', 0),
(40009818, 40001238, 'Minabo Kitchen', 'Minabos.jpg', '2022-05-08 19:49:56', '2022-05-08 19:49:56', 0),
(40009819, 40001239, 'Maritozz', 'Maritozz.jpeg', '2022-05-10 08:24:19', '2022-05-10 08:24:19', 0),
(40009820, 40001239, 'Biggie & Bro', 'Biggie.jpg', '2022-05-10 08:24:46', '2022-05-10 08:24:46', 0),
(40009821, 40001239, 'Judy butchery', 'Judy_Butchery.jpg', '2022-05-10 08:25:10', '2022-05-10 08:25:10', 0),
(40009824, 40001239, 'Maurice Ouma', 'Maurice.jpg', '2022-05-11 12:29:31', '2022-05-11 12:29:31', 0),
(40009826, 40001239, 'Adesh Groceries', 'Adesh.jpg', '2022-05-14 08:20:38', '2022-05-14 08:20:38', 0),
(40009828, 40001239, 'Sharubatea', 'Sharubatea.png', '2022-05-14 08:21:30', '2022-05-14 08:21:30', 0),
(40009831, 40001239, 'Joyceplens', 'Joyceplens.jpg', '2022-05-14 08:23:02', '2022-05-14 08:23:02', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_role`
--

CREATE TABLE `tbl_role` (
  `roleID` int(11) NOT NULL,
  `roleName` varchar(15) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedOn` timestamp NOT NULL DEFAULT current_timestamp(),
  `isDeleted` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_role`
--

INSERT INTO `tbl_role` (`roleID`, `roleName`, `createdAt`, `updatedOn`, `isDeleted`) VALUES
(25257672, 'Admin', '2022-05-22 15:11:52', '2022-05-22 15:11:52', '0'),
(25257673, 'Client', '2022-05-22 15:17:21', '2022-05-22 15:17:21', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `userID` int(11) NOT NULL,
  `roleID` int(11) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedOn` timestamp NOT NULL DEFAULT current_timestamp(),
  `isDeleted` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`userID`, `roleID`, `email`, `password`, `phone`, `createdAt`, `updatedOn`, `isDeleted`) VALUES
(84575460, 25257672, 'calvin.sendawula@strathmore.edu', '$2y$10$NJ65zCIyI/6GgcL8BUNrieIr7s1uyL3B5YybQQTFzA.37Hbb5Gyfm', '+254759128880', '2022-05-22 15:11:52', '2022-05-22 15:11:52', '0'),
(84575461, 25257672, 'jean.wasike@strathmore.edu', '$2y$10$tYcQUhm61r3uCmZx9NjzpOjuQsBdgV43sZsIGmJ/GiOBhQt6vfdfS', '+254718385668', '2022-05-22 15:13:45', '2022-05-22 15:13:45', '0'),
(84575462, 25257672, 'danroy.mwangi@strathmore.edu', '$2y$10$wvIlSncI0mTjkXwkQKZb2eM.4F0iO6b9KGD8cA08/aJolCit.QX.q', '+254727143069', '2022-05-22 15:14:43', '2022-05-22 15:14:43', '0'),
(84575463, 25257673, 'rebecca.muiruri@strathmore.edu', '$2y$10$Uz0KaGXesro.43QgzNYylekQKuqfVkgMD/rore0.Zqp0FsWeAa0pO', '+254702125597', '2022-05-22 15:15:41', '2022-05-22 15:15:41', '0'),
(84575464, 25257673, 'nelson.mwangi@strathmore.edu', '$2y$10$oglZEHxlM3eV2xkOtYh1IeRzLwG9V8oesgyvZdfGbl9o73vjuYiZ.', '+254714165105', '2022-05-22 15:17:21', '2022-05-22 15:17:21', '0'),
(84575465, 25257673, 'cindy.bosibori@strathmore.edu', '$2y$10$EdIoxBWytEPMJY7K/ZDYk.yL7KTfakEOAxUpaL/YFqL7vLhZoGIBW', '+254715712137', '2022-05-22 15:19:17', '2022-05-22 15:19:17', '0'),
(84575466, 25257673, 'mwikali.assumpta@strathmore.edu', '$2y$10$Tx2GUl4Gh.imwS2K6wPU6O1XqrLDsVkQUQM1iUwYiKduVQdy.qbyq', '+254714507075', '2022-05-22 15:19:54', '2022-05-22 15:19:54', '0'),
(84575467, 25257672, 'michael.kimuri@strathmore.edu', '$2y$10$ZAHu3FcJKQ7NNhMSTp5XsOIjEGtzDMx.YKOMIab3s2tyhtMMwgNaS', '+254759890545', '2022-05-22 15:20:46', '2022-05-22 15:20:46', '0'),
(84575468, 25257673, 'ryan.bahati@gmail.com', '$2y$10$8.tdo7G2vS4TqJAjFbkiQ.KXowigY6WETHeFArxxD0L3fGHIDLg5e', '+254708212720', '2022-06-27 19:45:25', '2022-06-27 19:45:25', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_address`
--

CREATE TABLE `tbl_user_address` (
  `userAddressID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `userLocation` varchar(255) NOT NULL DEFAULT 'Nairobi',
  `dropOffInstructions` varchar(255) NOT NULL DEFAULT 'Leave with doorman',
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `isDeleted` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user_address`
--

INSERT INTO `tbl_user_address` (`userAddressID`, `userID`, `userLocation`, `dropOffInstructions`, `createdAt`, `isDeleted`) VALUES
(96548141, 84575463, 'MRQ6+4Q6, Ole Sangale Link Rd, Nairobi, Kenya', 'Leave with doorman', '2022-06-12 11:08:17', '0'),
(96548142, 84575465, 'Kajiado, Kenya', 'Leave at the door', '2022-06-12 11:08:53', '0'),
(96548143, 84575466, 'Mai Mahiu Rd, Nairobi City, Kenya', 'Leave with doorman', '2022-06-12 11:09:36', '0'),
(96548144, 84575464, 'Keri Road, Nairobi, Kenya', 'Leave at the gate', '2022-06-12 11:10:06', '0'),
(96548145, 84575468, 'Nairobi', 'Leave with doorman', '2022-06-27 19:45:25', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_card_sessions`
--

CREATE TABLE `tbl_user_card_sessions` (
  `userCardSessionID` int(15) NOT NULL,
  `userID` int(11) NOT NULL,
  `cardHolder` varchar(60) NOT NULL DEFAULT 'Jane Doe',
  `CCN` varchar(19) NOT NULL DEFAULT '4000 1234 5678 9010',
  `validity` varchar(5) NOT NULL DEFAULT '12/22',
  `CVV` int(3) NOT NULL DEFAULT 208,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedOn` timestamp NOT NULL DEFAULT current_timestamp(),
  `isDeleted` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user_card_sessions`
--

INSERT INTO `tbl_user_card_sessions` (`userCardSessionID`, `userID`, `cardHolder`, `CCN`, `validity`, `CVV`, `createdAt`, `updatedOn`, `isDeleted`) VALUES
(87168318, 84575463, 'Jane Doe', '4000 1234 5678 9010', '12/22', 208, '2022-06-18 17:26:36', '2022-06-18 17:26:36', '0'),
(87168319, 84575464, 'Jane Doe', '4000 1234 5678 9010', '12/22', 208, '2022-06-18 17:26:43', '2022-06-18 17:26:43', '0'),
(87168320, 84575465, 'Jane Doe', '4000 1234 5678 9010', '12/22', 208, '2022-06-18 17:26:53', '2022-06-18 17:26:53', '0'),
(87168321, 84575466, 'Jane Doe', '4000 1234 5678 9010', '12/22', 208, '2022-06-18 17:26:59', '2022-06-18 17:26:59', '0'),
(87168323, 84575468, 'Jane Doe', '4000 1234 5678 9010', '12/22', 208, '2022-06-27 19:45:25', '2022-06-27 19:45:25', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_feedback`
--

CREATE TABLE `tbl_user_feedback` (
  `userFeedbackID` int(15) NOT NULL,
  `userID` int(11) NOT NULL,
  `fname` varchar(25) NOT NULL,
  `lname` varchar(25) NOT NULL,
  `email` varchar(60) NOT NULL,
  `message` varchar(255) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `isDeleted` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user_feedback`
--

INSERT INTO `tbl_user_feedback` (`userFeedbackID`, `userID`, `fname`, `lname`, `email`, `message`, `createdAt`, `isDeleted`) VALUES
(67394262, 84575464, 'Mwangi', 'Nelson', 'mwangi.nelson@gmail.com', 'I loved the food, it was fine, but the delivery time needs improvement.', '2022-05-28 13:27:32', '0'),
(67394263, 84575465, 'Cindy', 'Bosibori', 'cindy.bosibori@gmail.com', 'Nice service, but the food was low-key oily this time.', '2022-05-28 13:34:00', '0'),
(67394264, 84575466, 'Mwikali', 'Assumpta', 'mwikali.assumpta@gmail.com', 'Good food. Nice website too. I hope the feedback is put to good use.', '2022-05-28 13:35:16', '0'),
(67394265, 84575467, 'Michael', 'Muya', 'michael.muya@gmail.com', 'Bro, my last order took like 2 hours to arrive. Ati rain. Unamaanisha nini rain? Niliagiza saa moja kabla mvua ianze kunyesha.', '2022-05-28 13:47:35', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_login`
--

CREATE TABLE `tbl_user_login` (
  `userLoginID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `userIP` varchar(25) NOT NULL,
  `lastLogin` timestamp NOT NULL DEFAULT current_timestamp(),
  `isDeleted` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_notifications`
--

CREATE TABLE `tbl_user_notifications` (
  `userNotificationsID` int(15) NOT NULL,
  `userSettingsID` int(15) NOT NULL,
  `userID` int(11) NOT NULL,
  `newDeals` enum('0','1') NOT NULL DEFAULT '1',
  `newRestaurants` enum('0','1') NOT NULL DEFAULT '1',
  `orderStatuses` enum('0','1') NOT NULL DEFAULT '1',
  `passwordChanges` enum('0','1') NOT NULL DEFAULT '1',
  `specialOffers` enum('0','1') NOT NULL DEFAULT '1',
  `newsLetter` enum('0','1') NOT NULL DEFAULT '1',
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedOn` timestamp NOT NULL DEFAULT current_timestamp(),
  `isDeleted` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user_notifications`
--

INSERT INTO `tbl_user_notifications` (`userNotificationsID`, `userSettingsID`, `userID`, `newDeals`, `newRestaurants`, `orderStatuses`, `passwordChanges`, `specialOffers`, `newsLetter`, `createdAt`, `updatedOn`, `isDeleted`) VALUES
(53922922, 69062181, 84575463, '1', '1', '1', '1', '1', '1', '2022-06-12 09:51:23', '2022-06-12 09:51:23', '0'),
(53922923, 69062182, 84575464, '1', '1', '1', '1', '1', '1', '2022-06-12 09:51:33', '2022-06-12 09:51:33', '0'),
(53922924, 69062183, 84575465, '1', '1', '1', '1', '1', '1', '2022-06-12 09:51:43', '2022-06-12 09:51:43', '0'),
(53922925, 69062184, 84575466, '1', '1', '1', '1', '1', '1', '2022-06-12 09:51:53', '2022-06-12 09:51:53', '0'),
(53922926, 69062185, 84575468, '1', '1', '1', '1', '1', '1', '2022-06-27 19:45:25', '2022-06-27 19:45:25', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_order`
--

CREATE TABLE `tbl_user_order` (
  `userOrderID` int(15) NOT NULL,
  `userID` int(11) NOT NULL,
  `restaurantName` varchar(255) NOT NULL,
  `deliveryFee` int(5) NOT NULL,
  `orderTotal` int(5) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedOn` timestamp NOT NULL DEFAULT current_timestamp(),
  `isDeleted` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user_order`
--

INSERT INTO `tbl_user_order` (`userOrderID`, `userID`, `restaurantName`, `deliveryFee`, `orderTotal`, `createdAt`, `updatedOn`, `isDeleted`) VALUES
(15146206, 84575465, 'Aliman Kitchen', 200, 420, '2022-06-19 12:08:32', '2022-06-19 12:08:32', '0'),
(15146207, 84575465, 'Minabo\'s Kitchen', 150, 1350, '2022-06-19 12:09:06', '2022-06-19 12:09:06', '0'),
(15146208, 84575466, 'The Shack', 170, 360, '2022-06-19 12:17:37', '2022-06-19 12:17:37', '0'),
(15146209, 84575465, 'Maurice Ouma', 220, 390, '2022-06-19 12:22:05', '2022-06-19 12:22:05', '0'),
(15146210, 84575461, 'The Shack', 200, 250, '2022-06-21 06:13:15', '2022-06-21 06:13:15', '0'),
(15146211, 84575461, 'Tortila Restaurant', 200, 2150, '2022-06-21 06:13:15', '2022-06-21 06:13:15', '0'),
(15146212, 84575463, 'The Shack', 200, 280, '2022-06-21 06:13:15', '2022-06-21 06:13:15', '0'),
(15146213, 84575463, 'The Shack', 200, 250, '2022-06-21 06:13:15', '2022-06-21 06:13:15', '0'),
(15146214, 84575465, 'Tortila Restaurant', 200, 800, '2022-06-21 06:13:15', '2022-06-21 06:13:15', '0'),
(15146215, 84575463, 'Biggie & Bro', 200, 130, '2022-06-21 06:43:49', '2022-06-21 06:43:49', '0'),
(15146216, 84575463, 'Miam Fastfood', 200, 1270, '2022-06-22 16:38:42', '2022-06-22 16:38:42', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_order_item`
--

CREATE TABLE `tbl_user_order_item` (
  `userOrderItemID` int(15) NOT NULL,
  `userOrderID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `itemOrderedName` varchar(255) NOT NULL,
  `itemOrderedQty` int(3) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedOn` timestamp NOT NULL DEFAULT current_timestamp(),
  `isDeleted` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user_order_item`
--

INSERT INTO `tbl_user_order_item` (`userOrderItemID`, `userOrderID`, `userID`, `itemOrderedName`, `itemOrderedQty`, `createdAt`, `updatedOn`, `isDeleted`) VALUES
(27116132, 15146206, 84575465, 'Plain Fries', 1, '2022-06-19 10:30:51', '2022-06-19 10:30:51', '0'),
(27116133, 15146206, 84575465, 'coca cola', 1, '2022-06-19 11:58:33', '2022-06-19 11:58:33', '0'),
(27116134, 15146207, 84575465, 'Full Chicken + Lyonnase Potatoes', 1, '2022-06-19 12:09:48', '2022-06-19 12:09:48', '0'),
(27116135, 15146208, 84575466, 'Fanta Passion 2l', 1, '2022-06-19 12:18:05', '2022-06-19 12:18:05', '0'),
(27116136, 15146209, 84575465, 'Ugali + Mayai', 1, '2022-06-19 12:22:27', '2022-06-19 12:22:27', '0'),
(27116137, 15146210, 84575461, 'Coca cola 350ml', 1, '2022-06-21 06:13:15', '2022-06-21 06:13:15', '0'),
(27116138, 15146211, 84575461, 'Chicken and chips', 1, '2022-06-21 06:13:15', '2022-06-21 06:13:15', '0'),
(27116139, 15146212, 84575463, 'Coca cola 500ml', 1, '2022-06-21 06:13:15', '2022-06-21 06:13:15', '0'),
(27116140, 15146213, 84575463, 'Coca cola 350ml', 1, '2022-06-21 06:13:15', '2022-06-21 06:13:15', '0'),
(27116141, 15146214, 84575465, '1/2 Goat meat and ugali', 1, '2022-06-21 06:13:15', '2022-06-21 06:13:15', '0'),
(27116142, 15146210, 84575461, 'Coca cola 350ml', 1, '2022-06-21 06:43:48', '2022-06-21 06:43:48', '0'),
(27116143, 15146211, 84575461, 'Chicken and chips', 1, '2022-06-21 06:43:49', '2022-06-21 06:43:49', '0'),
(27116144, 15146212, 84575463, 'Coca cola 500ml', 1, '2022-06-21 06:43:49', '2022-06-21 06:43:49', '0'),
(27116145, 15146213, 84575463, 'Coca cola 350ml', 1, '2022-06-21 06:43:49', '2022-06-21 06:43:49', '0'),
(27116147, 15146215, 84575463, 'Sprite 1.25l', 1, '2022-06-21 06:43:49', '2022-06-21 06:43:49', '0'),
(27116148, 15146210, 84575461, 'Coca cola 350ml', 1, '2022-06-22 16:38:42', '2022-06-22 16:38:42', '0'),
(27116149, 15146211, 84575461, 'Chicken and chips', 1, '2022-06-22 16:38:42', '2022-06-22 16:38:42', '0'),
(27116150, 15146212, 84575463, 'Coca cola 500ml', 1, '2022-06-22 16:38:42', '2022-06-22 16:38:42', '0'),
(27116151, 15146213, 84575463, 'Coca cola 350ml', 1, '2022-06-22 16:38:42', '2022-06-22 16:38:42', '0'),
(27116153, 15146215, 84575463, 'Sprite 1.25l', 1, '2022-06-22 16:38:42', '2022-06-22 16:38:42', '0'),
(27116154, 15146216, 84575463, '1 Milkshake and 2 pcs of Cookies', 2, '2022-06-22 16:38:42', '2022-06-22 16:38:42', '0'),
(27116155, 15146216, 84575463, '4 pc Hot wings + 1 Reg Fries + 350ml Soda', 1, '2022-06-22 16:38:42', '2022-06-22 16:38:42', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_settings`
--

CREATE TABLE `tbl_user_settings` (
  `userSettingsID` int(15) NOT NULL,
  `userID` int(11) NOT NULL,
  `twoFAEnabled` enum('0','1') NOT NULL DEFAULT '0',
  `alternateEmail` varchar(60) NOT NULL DEFAULT 'john@example.com',
  `emailNotificationsEnabled` enum('0','1') NOT NULL DEFAULT '1',
  `userImagePath` varchar(255) NOT NULL DEFAULT '../imagesDashboard/user_default.png',
  `otp` int(6) DEFAULT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedOn` timestamp NOT NULL DEFAULT current_timestamp(),
  `isDeleted` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user_settings`
--

INSERT INTO `tbl_user_settings` (`userSettingsID`, `userID`, `twoFAEnabled`, `alternateEmail`, `emailNotificationsEnabled`, `userImagePath`, `otp`, `createdAt`, `updatedOn`, `isDeleted`) VALUES
(69062181, 84575463, '0', 'john@example.com', '1', '../imagesDashboard/user_default.png', NULL, '2022-06-12 09:49:43', '2022-06-12 09:49:43', '0'),
(69062182, 84575464, '0', 'nelson2@gmail.com', '1', '../imagesDashboard/user_default.png', NULL, '2022-06-12 09:49:57', '2022-06-12 09:49:57', '0'),
(69062183, 84575465, '0', 'john@example.com', '1', '../imagesDashboard/user_default.png', NULL, '2022-06-12 09:50:04', '2022-06-12 09:50:04', '0'),
(69062184, 84575466, '0', 'john@example.com', '1', '../imagesDashboard/user_default.png', NULL, '2022-06-12 09:50:12', '2022-06-12 09:50:12', '0'),
(69062185, 84575468, '0', 'john@example.com', '1', '../imagesDashboard/user_default.png', NULL, '2022-06-27 19:45:25', '2022-06-27 19:45:25', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `tbl_api_token`
--
ALTER TABLE `tbl_api_token`
  ADD PRIMARY KEY (`apiTokenID`),
  ADD KEY `apiUserID` (`apiUserID`);

--
-- Indexes for table `tbl_api_user`
--
ALTER TABLE `tbl_api_user`
  ADD PRIMARY KEY (`apiUserID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `tbl_invoice`
--
ALTER TABLE `tbl_invoice`
  ADD PRIMARY KEY (`invoiceID`),
  ADD KEY `methodID` (`methodID`),
  ADD KEY `orderID` (`orderID`);

--
-- Indexes for table `tbl_location`
--
ALTER TABLE `tbl_location`
  ADD PRIMARY KEY (`locationID`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`orderID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `tbl_order_verification`
--
ALTER TABLE `tbl_order_verification`
  ADD PRIMARY KEY (`verificationID`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tbl_payment_methods`
--
ALTER TABLE `tbl_payment_methods`
  ADD PRIMARY KEY (`methodID`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`productID`),
  ADD KEY `restaurantID` (`restaurantID`);

--
-- Indexes for table `tbl_restaurant`
--
ALTER TABLE `tbl_restaurant`
  ADD PRIMARY KEY (`restaurantID`),
  ADD KEY `locationID` (`locationID`);

--
-- Indexes for table `tbl_role`
--
ALTER TABLE `tbl_role`
  ADD PRIMARY KEY (`roleID`),
  ADD UNIQUE KEY `roleName` (`roleName`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `roleID` (`roleID`);

--
-- Indexes for table `tbl_user_address`
--
ALTER TABLE `tbl_user_address`
  ADD PRIMARY KEY (`userAddressID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `tbl_user_card_sessions`
--
ALTER TABLE `tbl_user_card_sessions`
  ADD PRIMARY KEY (`userCardSessionID`),
  ADD UNIQUE KEY `userID` (`userID`);

--
-- Indexes for table `tbl_user_feedback`
--
ALTER TABLE `tbl_user_feedback`
  ADD PRIMARY KEY (`userFeedbackID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `tbl_user_login`
--
ALTER TABLE `tbl_user_login`
  ADD PRIMARY KEY (`userLoginID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `tbl_user_notifications`
--
ALTER TABLE `tbl_user_notifications`
  ADD PRIMARY KEY (`userNotificationsID`),
  ADD UNIQUE KEY `userSettingsID` (`userSettingsID`),
  ADD UNIQUE KEY `userID` (`userID`);

--
-- Indexes for table `tbl_user_order`
--
ALTER TABLE `tbl_user_order`
  ADD PRIMARY KEY (`userOrderID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `tbl_user_order_item`
--
ALTER TABLE `tbl_user_order_item`
  ADD PRIMARY KEY (`userOrderItemID`),
  ADD KEY `userOrderID` (`userOrderID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `tbl_user_settings`
--
ALTER TABLE `tbl_user_settings`
  ADD PRIMARY KEY (`userSettingsID`),
  ADD UNIQUE KEY `userID` (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84575468;

--
-- AUTO_INCREMENT for table `tbl_api_token`
--
ALTER TABLE `tbl_api_token`
  MODIFY `apiTokenID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21824263;

--
-- AUTO_INCREMENT for table `tbl_api_user`
--
ALTER TABLE `tbl_api_user`
  MODIFY `apiUserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92485867;

--
-- AUTO_INCREMENT for table `tbl_invoice`
--
ALTER TABLE `tbl_invoice`
  MODIFY `invoiceID` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_location`
--
ALTER TABLE `tbl_location`
  MODIFY `locationID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40001241;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `orderID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15146217;

--
-- AUTO_INCREMENT for table `tbl_order_verification`
--
ALTER TABLE `tbl_order_verification`
  MODIFY `verificationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55113413;

--
-- AUTO_INCREMENT for table `tbl_payment_methods`
--
ALTER TABLE `tbl_payment_methods`
  MODIFY `methodID` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `productID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=340;

--
-- AUTO_INCREMENT for table `tbl_role`
--
ALTER TABLE `tbl_role`
  MODIFY `roleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25257674;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84575469;

--
-- AUTO_INCREMENT for table `tbl_user_address`
--
ALTER TABLE `tbl_user_address`
  MODIFY `userAddressID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96548146;

--
-- AUTO_INCREMENT for table `tbl_user_card_sessions`
--
ALTER TABLE `tbl_user_card_sessions`
  MODIFY `userCardSessionID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87168324;

--
-- AUTO_INCREMENT for table `tbl_user_feedback`
--
ALTER TABLE `tbl_user_feedback`
  MODIFY `userFeedbackID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67394266;

--
-- AUTO_INCREMENT for table `tbl_user_login`
--
ALTER TABLE `tbl_user_login`
  MODIFY `userLoginID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50906154;

--
-- AUTO_INCREMENT for table `tbl_user_notifications`
--
ALTER TABLE `tbl_user_notifications`
  MODIFY `userNotificationsID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53922927;

--
-- AUTO_INCREMENT for table `tbl_user_order`
--
ALTER TABLE `tbl_user_order`
  MODIFY `userOrderID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15146217;

--
-- AUTO_INCREMENT for table `tbl_user_order_item`
--
ALTER TABLE `tbl_user_order_item`
  MODIFY `userOrderItemID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27116156;

--
-- AUTO_INCREMENT for table `tbl_user_settings`
--
ALTER TABLE `tbl_user_settings`
  MODIFY `userSettingsID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69062186;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD CONSTRAINT `adminID` FOREIGN KEY (`adminID`) REFERENCES `tbl_user` (`userID`);

--
-- Constraints for table `tbl_api_token`
--
ALTER TABLE `tbl_api_token`
  ADD CONSTRAINT `tbl_api_token_ibfk_1` FOREIGN KEY (`apiUserID`) REFERENCES `tbl_api_user` (`apiUserID`);

--
-- Constraints for table `tbl_api_user`
--
ALTER TABLE `tbl_api_user`
  ADD CONSTRAINT `tbl_api_user_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `tbl_user` (`userID`);

--
-- Constraints for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD CONSTRAINT `tbl_order_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `tbl_user` (`userID`);

--
-- Constraints for table `tbl_order_verification`
--
ALTER TABLE `tbl_order_verification`
  ADD CONSTRAINT `tbl_order_verification_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`userID`);

--
-- Constraints for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD CONSTRAINT `tbl_product_ibfk_1` FOREIGN KEY (`restaurantID`) REFERENCES `tbl_restaurant` (`restaurantID`);

--
-- Constraints for table `tbl_restaurant`
--
ALTER TABLE `tbl_restaurant`
  ADD CONSTRAINT `tbl_restaurant_ibfk_1` FOREIGN KEY (`locationID`) REFERENCES `tbl_location` (`locationID`);

--
-- Constraints for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD CONSTRAINT `tbl_user_ibfk_1` FOREIGN KEY (`roleID`) REFERENCES `tbl_role` (`roleID`);

--
-- Constraints for table `tbl_user_address`
--
ALTER TABLE `tbl_user_address`
  ADD CONSTRAINT `tbl_user_address_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `tbl_user` (`userID`);

--
-- Constraints for table `tbl_user_card_sessions`
--
ALTER TABLE `tbl_user_card_sessions`
  ADD CONSTRAINT `tbl_user_card_sessions_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `tbl_user` (`userID`);

--
-- Constraints for table `tbl_user_feedback`
--
ALTER TABLE `tbl_user_feedback`
  ADD CONSTRAINT `tbl_user_feedback_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `tbl_user` (`userID`);

--
-- Constraints for table `tbl_user_login`
--
ALTER TABLE `tbl_user_login`
  ADD CONSTRAINT `tbl_user_login_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `tbl_user` (`userID`);

--
-- Constraints for table `tbl_user_notifications`
--
ALTER TABLE `tbl_user_notifications`
  ADD CONSTRAINT `tbl_user_notifications_ibfk_1` FOREIGN KEY (`userSettingsID`) REFERENCES `tbl_user_settings` (`userSettingsID`),
  ADD CONSTRAINT `tbl_user_notifications_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `tbl_user` (`userID`);

--
-- Constraints for table `tbl_user_order`
--
ALTER TABLE `tbl_user_order`
  ADD CONSTRAINT `tbl_user_order_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `tbl_user` (`userID`);

--
-- Constraints for table `tbl_user_order_item`
--
ALTER TABLE `tbl_user_order_item`
  ADD CONSTRAINT `tbl_user_order_item_ibfk_1` FOREIGN KEY (`userOrderID`) REFERENCES `tbl_user_order` (`userOrderID`),
  ADD CONSTRAINT `tbl_user_order_item_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `tbl_user` (`userID`);

--
-- Constraints for table `tbl_user_settings`
--
ALTER TABLE `tbl_user_settings`
  ADD CONSTRAINT `tbl_user_settings_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `tbl_user` (`userID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
