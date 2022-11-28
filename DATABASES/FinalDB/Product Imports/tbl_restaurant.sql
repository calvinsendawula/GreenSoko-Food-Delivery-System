-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Jun 27, 2022 at 09:02 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

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
-- Table structure for table `tbl_restaurant`
--

CREATE TABLE `tbl_restaurant` (
  `restaurantID` int(8) NOT NULL,
  `locationID` int(8) NOT NULL,
  `restaurantName` varchar(25) NOT NULL,
  `restaurantImage` varchar(100) NOT NULL,
  `addedAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL,
  `isDeleted` int(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`restaurantID`),
  FOREIGN KEY (`locationID`) REFERENCES `tbl_location`(`locationID`)
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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_restaurant`
--
ALTER TABLE `tbl_restaurant`
  ADD PRIMARY KEY (`restaurantID`),
  ADD KEY `locationID` (`locationID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_restaurant`
--
ALTER TABLE `tbl_restaurant`
  MODIFY `restaurantID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40009837;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_restaurant`
--
ALTER TABLE `tbl_restaurant`
  ADD CONSTRAINT `tbl_restaurant_ibfk_1` FOREIGN KEY (`locationID`) REFERENCES `tbl_location` (`locationID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
