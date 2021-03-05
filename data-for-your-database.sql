DROP DATABASE IF EXISTS `computer-hardware`;
CREATE DATABASE `computer-hardware`;
USE `computer-hardware`;
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

--
-- Table structure for table `records`
--

CREATE TABLE `records` (
  `recordID` int(11) NOT NULL,
  `categoryID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `records`
--

INSERT INTO `records` (`recordID`, `categoryID`, `name`, `price`, `image`) VALUES
(1, 1, 'i7-8700k', '340.00', '8700k.jpg'),
(2, 1, 'i9-10900k', '429.99', '10900k.jpg'),
(3, 1, 'RYZEN 5 3600', '199.99', 'R 5 3600.jpg'),
(4, 1, 'RYZEN 9 3900X', '499.99', 'R 9 3900X.jpg'),
(5, 2, 'MSI RTX 3080', '799.99', 'RTX 3080.jpg'),
(6, 2, 'AORUS RTX 3070', '550.00', 'RTX 3070.jpg'),
(7, 2, 'RADEON RX 6800', '999.99', 'RX 6800.jpg'),
(8, 2, 'RADEON RX 6900XT', '1399.99', 'RX 6900XT.jpg'),
(9, 2, 'EVGA RTX 3060', '450.00', 'RTX 3060.jpg'),
(10, 3, 'MSI B450 Tomahawk', '129.99', 'MSI B450.jpg'),
(11, 3, 'ASROCK X570 Taichi', '300.00', 'ASROCK X570.jpg'),
(12, 3, 'STRIX Z490-H', '210.00', 'STRIX Z490-H.jpg');


--
-- Indexes for dumped tables
--

--
-- Indexes for table `records`
--
ALTER TABLE `records`
  ADD PRIMARY KEY (`recordID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `records`
--
ALTER TABLE `records`
  MODIFY `recordID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
