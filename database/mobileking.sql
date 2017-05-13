-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2015 at 04:49 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mobileking`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbcustomer`
--

CREATE TABLE IF NOT EXISTS `tbcustomer` (
  `CustomerID` int(5) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Telephone` varchar(15) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `UserName` varchar(50) DEFAULT NULL,
  `admin` int(11) NOT NULL,
  `Password` varchar(50) DEFAULT NULL,
  `Credit` double(9,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`CustomerID`),
  UNIQUE KEY `UserName` (`UserName`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AVG_ROW_LENGTH=3276 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tbcustomer`
--

INSERT INTO `tbcustomer` (`CustomerID`, `FirstName`, `LastName`, `Address`, `Telephone`, `Email`, `UserName`, `admin`, `Password`, `Credit`) VALUES
(1, 'Marry', 'Smith', '234 Great South Road', '123454544', 'mary.smith@gmail.com', 'marry.smith', 1, '1', 0.00),
(2, 'Peter', 'Pan', '12 Neveland', '3433323', 'peter.pan@gmail.com', 'peter.pan', 0, '1', 0.00),
(3, 'John', 'Willis', '543 Queen Street', '4439483', 'john.willis@gmail.com', 'john.willis', 0, '1', 0.00),
(4, 'Oscar', 'Dillingworth', '563 Epsom', '58483904', 'ocsar.dillingworth@gmail.com', 'oscar.dillingworth', 0, '1', 0.00),
(5, 'Charles', 'Jones', '45 Northcote', '434566534', 'charles.jones@gmail.com', 'charles.jones', 0, '1', 0.00),
(6, 'Mario', 'Sutherland', '143 Hart Street', '454454334', 'mario.sutherland@gmail.com', 'mario.sutherland', 0, '1', 0.00),
(7, 'Admin', 'Admin', '45 Queen Street', '233234', 'admin@gmail.com', 'admin', 0, '1', 0.00),
(8, '', '', '', '', '', 'root', 0, 'password', 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `tborder`
--

CREATE TABLE IF NOT EXISTS `tborder` (
  `OrderID` int(5) NOT NULL AUTO_INCREMENT,
  `OrderDate` date NOT NULL,
  `DeliveryDate` date NOT NULL,
  `OrderStatus` varchar(20) NOT NULL DEFAULT 'Being processed',
  `CustomerID` int(5) NOT NULL,
  PRIMARY KEY (`OrderID`),
  KEY `CustomerID` (`CustomerID`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AVG_ROW_LENGTH=4096 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tborder`
--

INSERT INTO `tborder` (`OrderID`, `OrderDate`, `DeliveryDate`, `OrderStatus`, `CustomerID`) VALUES
(1, '2009-10-12', '0001-01-01', 'Being processed', 1),
(2, '2009-10-12', '2009-10-15', 'Pending', 2),
(3, '2009-10-12', '2009-10-22', 'Pending', 2),
(4, '2009-10-12', '0001-01-01', 'Being processed', 3),
(5, '2009-10-12', '2009-10-22', 'Being processed', 4),
(6, '2009-10-14', '2009-11-10', 'Being processed', 6);

-- --------------------------------------------------------

--
-- Table structure for table `tborderline`
--

CREATE TABLE IF NOT EXISTS `tborderline` (
  `OrderlineID` int(11) NOT NULL AUTO_INCREMENT,
  `OrderID` int(5) NOT NULL,
  `ProductID` int(5) NOT NULL,
  `Quantity` int(5) NOT NULL,
  PRIMARY KEY (`OrderlineID`),
  KEY `OrderID` (`OrderID`),
  KEY `ProductID` (`ProductID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AVG_ROW_LENGTH=1365 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `tborderline`
--

INSERT INTO `tborderline` (`OrderlineID`, `OrderID`, `ProductID`, `Quantity`) VALUES
(1, 1, 1, 1),
(2, 1, 2, 2),
(3, 2, 2, 1),
(4, 2, 3, 1),
(5, 2, 4, 1),
(6, 3, 3, 1),
(7, 3, 4, 1),
(8, 3, 7, 2),
(9, 4, 1, 2),
(10, 4, 5, 1),
(11, 4, 6, 1),
(12, 4, 7, 1),
(13, 5, 5, 3),
(14, 6, 2, 1),
(15, 6, 8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbproduct`
--

CREATE TABLE IF NOT EXISTS `tbproduct` (
  `ProductID` int(5) NOT NULL AUTO_INCREMENT,
  `ProductName` varchar(50) NOT NULL,
  `Description` varchar(1000) NOT NULL,
  `Price` double NOT NULL,
  `BrandID` int(5) NOT NULL,
  `StockLevel` int(5) DEFAULT '0',
  `PhotoPath` varchar(100) DEFAULT NULL,
  `Active` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`ProductID`),
  KEY `TypeID` (`BrandID`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AVG_ROW_LENGTH=2340 AUTO_INCREMENT=54 ;

--
-- Dumping data for table `tbproduct`
--

INSERT INTO `tbproduct` (`ProductID`, `ProductName`, `Description`, `Price`, `BrandID`, `StockLevel`, `PhotoPath`, `Active`) VALUES
(1, 'Samsung Galaxy S6 Edge', '•	5.1” super amoled screen\n•	4G capability\n•	16MP rear camera\n•	5MP front camera\n•	Quad-core 2.1Ghz\n•	3GB RAM\n•	GPS\n•	Bluetooth', 999.99, 1, 10, 's6edge.jpg', 1),
(2, 'Samsung Galaxy S6', '•	5.1” super amoled screen\n•	4G capability\n•	16MP rear camera\n•	5MP front camera\n•	Quad-core 2.1Ghz\n•	3GB RAM\n•	GPS\n•	Bluetooth', 959.99, 1, 10, 'ss6.jpg', 1),
(3, 'Samsung Galaxy S5', '•	5.1” super amoled screen\n•	4G capability\n•	16MP rear camera\n•	2MP front camera\n•	Quad-core 2.5Ghz\n•	2GB RAM\n•	GPS\n•	Bluetooth', 899.99, 1, 10, 'ss5.jpg', 1),
(4, 'Samsung Galaxy Note4', '•	5.7” super amoled screen\n•	4G capability\n•	13MP rear camera\n•	5MP front camera\n•	Quad-core 1.2Ghz\n•	2GB RAM\n•	GPS\n•	Bluetooth', 999.99, 1, 10, 'note4.jpg', 1),
(5, 'Sony Xperia Z3', '•	5.2” triluminos screen\n•	4G capability\n•	20.7MP rear camera\n•	2.2MP front camera\n•	Quad-core 2.3Ghz\n•	3GB RAM\n•	GPS\n•	Bluetooth\n•	Dust proof\n•	Water resistant', 999.99, 2, 10, 'sony xperia z3.jpg', 1),
(6, 'Sony Xperia Z3 Compact', '•	4.6” triluminos screen\n•	4G capability\n•	20.7MP rear camera\n•	2.2MP front camera\n•	Quad-core 2.5Ghz\n•	2GB RAM\n•	GPS\n•	Bluetooth\n•	Dust proof\n•	Water resistant', 699.99, 2, 10, 'sony xperia z3 compact.jpg', 1),
(7, 'Sony Xperia Z2', '•	5.2” triluminos screen\n•	4G capability\n•	20.7MP rear camera\n•	2.2MP front camera\n•	Quad-core 2.3Ghz\n•	3GB RAM\n•	GPS\n•	Bluetooth\n•	Dust proof\n•	Water resistant', 899.99, 2, 10, 'sony xperia z2.jpg', 1),
(8, 'Sony Xperia M2', '•	4.8” screen\n•	4G capability\n•	8MP rear camera\n•	2.2MP front camera\n•	Quad-core 1.2Ghz\n•	1GB RAM\n•	GPS\n•	Bluetooth', 899.99, 2, 10, 'sony xperia m2.jpg', 1),
(9, 'HTC One M9', '•	5.0” screen\n•	4G capability\n•	20MP rear camera\n•	4MP front camera\n•	Quad-core 2Ghz\n•	3GB RAM\n•	GPS\n•	Bluetooth', 999.99, 3, 10, 'HTC One M9.jpg', 1),
(10, 'HTC One M8', '•	5.0” screen\n•	4G capability\n•	4MP dual rear camera\n•	5MP front camera\n•	Quad-core 2.5Ghz\n•	2GB RAM\n•	GPS\n•	Bluetooth', 959.99, 3, 10, 'HTC One M8.jpg', 1),
(11, 'HTC One', '•	4.7” screen\n•	4G capability\n•	4MP dual rear camera\n•	2.1MP front camera\n•	Quad-core 1.7Ghz\n•	2GB RAM\n•	GPS\n•	Bluetooth', 799.99, 3, 10, 'HTC One.jpg', 1),
(12, 'HTC One mini', '•	4.3” screen\n•	4G capability\n•	4MP rear camera\n•	1.6MP front camera\n•	Quad-core 1.4Ghz\n•	1GB RAM\n•	GPS\n•	Bluetooth', 499.99, 3, 10, 'HTC One Mini.jpg', 1),
(13, 'iPhone 6', '•	4.7” screen\n•	4G capability\n•	8MP rear camera\n•	1.2MP front camera\n•	Dual-core 1.4Ghz\n•	1GB RAM\n•	GPS\n•	Bluetooth', 1, 4, 10, 'iPhone6.jpg', 1),
(14, 'iPhone 6 plus', '•	5.5” screen\n•	4G capability\n•	8MP rear camera\n•	1.2MP front camera\n•	Dual-core 1.4Ghz\n•	1GB RAM\n•	GPS\n•	Bluetooth\n', 1, 4, 10, 'iPhone6 Plus.jpg', 1),
(16, 'iPhone 5s', '•	4.0” screen\n•	4G capability\n•	8MP rear camera\n•	1.2MP front camera\n•	Dual-core 1.3Ghz\n•	1GB RAM\n•	GPS\n•	Bluetooth\n', 1, 4, 10, 'iPhone 5s.jpg', 1),
(17, 'Phone charger', 'Mobile phone chargers', 1, 5, 10, 'mobile charger.jpg', 1),
(18, 'Screen Protector', 'Mobile phone screen protector', 1, 5, 10, 'screen protector.jpeg', 1),
(19, 'Case', 'Mobile phone cases', 1, 5, 10, 'mobile case.jpg', 1),
(20, 'Headphone', 'Mobile phone headphones', 1, 5, 10, 'Headphones.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbproductbrand`
--

CREATE TABLE IF NOT EXISTS `tbproductbrand` (
  `BrandID` int(5) NOT NULL AUTO_INCREMENT,
  `BrandName` varchar(50) NOT NULL,
  `Description` varchar(100) NOT NULL,
  `DisplayOrder` int(5) DEFAULT NULL,
  PRIMARY KEY (`BrandID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AVG_ROW_LENGTH=4096 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbproductbrand`
--

INSERT INTO `tbproductbrand` (`BrandID`, `BrandName`, `Description`, `DisplayOrder`) VALUES
(1, 'Samsung', 'Mobile Brand 1', 1),
(2, 'Sony', 'Mobile Brand 2', 2),
(3, 'HTC', 'Mobile Brand 3', 3),
(4, 'Apple', 'Mobile Brand 4', 4),
(5, 'Accessories', 'Mobile accessories', 5);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tborder`
--
ALTER TABLE `tborder`
  ADD CONSTRAINT `tborder_FK1` FOREIGN KEY (`CustomerID`) REFERENCES `tbcustomer` (`CustomerID`);

--
-- Constraints for table `tborderline`
--
ALTER TABLE `tborderline`
  ADD CONSTRAINT `tborderline_ibfk_1` FOREIGN KEY (`OrderID`) REFERENCES `tborder` (`OrderID`),
  ADD CONSTRAINT `tborderline_ibfk_2` FOREIGN KEY (`ProductID`) REFERENCES `tbproduct` (`ProductID`);

--
-- Constraints for table `tbproduct`
--
ALTER TABLE `tbproduct`
  ADD CONSTRAINT `tbproduct_ibfk_1` FOREIGN KEY (`BrandID`) REFERENCES `tbproductbrand` (`BrandID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
