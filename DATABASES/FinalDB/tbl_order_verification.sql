-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2022 at 10:36 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.28

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
-- Table structure for table `tbl_order_verification`
--

CREATE TABLE `tbl_order_verification` (
  `user_id` int(11) NOT NULL,
  `phone_number` int(30) NOT NULL,
  `order_mpesa_code` varchar(30) NOT NULL,
  `is_verified` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_order_verification`
--

INSERT INTO `tbl_order_verification` (`user_id`, `phone_number`, `order_mpesa_code`, `is_verified`) VALUES
(84575460, 729524962, 'werfgthysju', 0),
(84575463, 729524962, 'Kamma', 0),
(84575465, 234567890, 'sqwertyuio', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_order_verification`
--
ALTER TABLE `tbl_order_verification`
  ADD PRIMARY KEY (`user_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_order_verification`
--
ALTER TABLE `tbl_order_verification`
  ADD CONSTRAINT `tbl_order_verification_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`userID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
