-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2017 at 09:09 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `retailers`
--

-- --------------------------------------------------------

--
-- Table structure for table `retailers`
--

CREATE TABLE `retailers` (
  `retails_ID` int(5) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(32) NOT NULL,
  `company_Name` varchar(100) NOT NULL,
  `e-mail` varchar(254) NOT NULL,
  `phone_Number` int(8) NOT NULL,
  `address` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL,
  `hash` varchar(32) NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `retailers`
--

INSERT INTO `retailers` (`retails_ID`, `username`, `password`, `company_Name`, `e-mail`, `phone_Number`, `address`, `description`, `hash`, `active`) VALUES
(1, 'drugdealer', 'iselldrugs', 'Legal Drugs', 'idontsellweed@ido.com', 84206969, 'Backstreet Boys Avenue 2', 'We totally sell legal drugs', '0', 0),
(5, 'awd', 'awd', 'awd', 'awd', 0, 'awd', 'awd', '', 0),
(6, 'CoolMeister', 'coolbeans', 'Cool Hats Co.', 'coomeister69@gmail.com', 81882341, 'Paya Lebar MRT Station', 'We sell cool hats to people.', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `retail_items`
--

CREATE TABLE `retail_items` (
  `item_ID` int(3) NOT NULL,
  `item_Name` varchar(30) NOT NULL,
  `item_Description` varchar(100) NOT NULL,
  `item_Cost` decimal(65,2) NOT NULL,
  `retails_ID` int(3) NOT NULL,
  `stock` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `retail_items`
--

INSERT INTO `retail_items` (`item_ID`, `item_Name`, `item_Description`, `item_Cost`, `retails_ID`, `stock`) VALUES
(8, 'Coke', 'Delicious and Sweet!', '3.00', 1, 100),
(9, 'Sprite', 'Nice drink!', '2.50', 1, 50),
(10, 'Chocolate', 'Exquisite!', '5.00', 1, 300);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `retailers`
--
ALTER TABLE `retailers`
  ADD PRIMARY KEY (`retails_ID`);

--
-- Indexes for table `retail_items`
--
ALTER TABLE `retail_items`
  ADD PRIMARY KEY (`item_ID`),
  ADD KEY `retails_ID` (`retails_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `retailers`
--
ALTER TABLE `retailers`
  MODIFY `retails_ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `retail_items`
--
ALTER TABLE `retail_items`
  MODIFY `item_ID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `retail_items`
--
ALTER TABLE `retail_items`
  ADD CONSTRAINT `retail_items_ibfk_1` FOREIGN KEY (`retails_ID`) REFERENCES `retailers` (`retails_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
