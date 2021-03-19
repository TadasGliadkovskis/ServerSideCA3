-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2021 at 08:16 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `computer-hardware`
--

-- --------------------------------------------------------

DROP TABLE IF EXISTS `orders`,`components`,`categories`;


--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categoryID` int(11) NOT NULL,
  `categoryName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categoryID`, `categoryName`) VALUES
(1, 'CPUs'),
(2, 'Graphics Card'),
(3, 'Motherboard'),
(4, 'Maintenance');

-- --------------------------------------------------------

--
-- Table structure for table `components`
--

CREATE TABLE `components` (
  `componentID` int(11) NOT NULL,
  `categoryID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `stock` int(1) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `components`
--

INSERT INTO `components` (`componentID`, `categoryID`, `name`, `price`, `stock`, `image`) VALUES
(1, 1, 'i7-8700k', '340.00', 5, '8700k.jpg'),
(2, 1, 'i9-10900k', '429.99', 20, '10900k.jpg'),
(3, 1, 'RYZEN 5 3600', '199.99', 16, 'R 5 3600.jpg'),
(4, 1, 'RYZEN 9 3900X', '499.99', 12, 'R 9 3900X.jpg'),
(5, 2, 'MSI RTX 3080', '799.99', 3, 'RTX 3080.jpg'),
(6, 2, 'AORUS RTX 3070', '550.00', 0, 'RTX 3070.jpg'),
(7, 2, 'RADEON RX 6800', '999.99', 13, 'RX 6800.jpg'),
(8, 2, 'RADEON RX 6900XT', '1399.99', 17, 'RX 6900XT.jpg'),
(9, 2, 'EVGA RTX 3060', '450.00', 6, 'RTX 3060.jpg'),
(10, 3, 'MSI B450 Tomahawk', '129.99', 23, 'MSI B450.jpg'),
(11, 3, 'ASROCK X570 Taichi', '300.00', 16, 'ASROCK X570.jpg'),
(12, 3, 'STRIX Z490-H', '210.00', 9, 'STRIX Z490-H.jpg');

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `componentID` int(11) NOT NULL,
  `orderID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
)  ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--



--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--

ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderID`),
  ADD KEY `componentID` (`componentID`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categoryID`);

--
-- Indexes for table `components`
--
ALTER TABLE `components`
  ADD PRIMARY KEY (`componentID`),
  ADD KEY `categoryID` (`categoryID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `components`
--
ALTER TABLE `components`
  MODIFY `componentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--

ALTER TABLE `orders`
  ADD CONSTRAINT `components_ibfk_1` FOREIGN KEY (`componentID`) REFERENCES `components` (`componentID`);

--
-- Constraints for table `components`
--
ALTER TABLE `components`
  ADD CONSTRAINT `components_ibfk_2` FOREIGN KEY (`categoryID`) REFERENCES `categories` (`categoryID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
