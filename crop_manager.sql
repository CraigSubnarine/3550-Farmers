-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2014 at 04:57 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `crop_manager`
--

-- --------------------------------------------------------

--
-- Table structure for table `crops`
--

CREATE TABLE IF NOT EXISTS `crops` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `farmer` int(11) NOT NULL,
  `crop` varchar(255) NOT NULL,
  `date` varchar(10) NOT NULL,
  `amount` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `farmer` (`farmer`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `crops`
--

INSERT INTO `crops` (`id`, `farmer`, `crop`, `date`, `amount`) VALUES
(1, 2, 'Spinach', '03/09/2013', 15),
(2, 2, 'Potato', '23/11/2013', 23),
(3, 1, 'Lettuce', '11/12/2013', 40),
(4, 3, 'Tomato', '11/10/2013', 20),
(5, 1, 'Corn', '01/03/2013', 50),
(6, 1, 'Pumpkin', '10/08/2013', 60),
(7, 5, 'Banana', '02/11/2013', 40),
(8, 5, 'Carrots', '02/11/2013', 10),
(9, 5, 'Cassava', '01/09/2013', 5),
(11, 6, 'Carrots', '11/09/2013', 5),
(12, 5, 'Cassava', '09/12/2013', 7),
(18, 6, 'Banana', '10/12/2014', 12),
(19, 1, 'Banana', '10/12/2014', 50);

-- --------------------------------------------------------

--
-- Table structure for table `farmers`
--

CREATE TABLE IF NOT EXISTS `farmers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `farmers`
--

INSERT INTO `farmers` (`id`, `firstname`, `lastname`, `address`, `username`, `password`) VALUES
(1, 'Bob', 'Bobberson', '#23 farm road', 'bob', '48181acd22b3edaebc8a447868a7df7ce629920a'),
(2, 'Jeff', 'Jefferson', '#34 Ranch Street\r\n', 'jeff', 'f3e731dfa293c7a83119d8aacfa41b5d2d780be9'),
(3, 'jake', 'Jakeson', '#66 Silo Drive', 'jake', 'c8d99c2f7cd5f432c163abcd422672b9f77550bb'),
(4, 'Larry', 'Larrison', '#21 Farmland Trace', 'larry', '968845783c158b6287022517450dc1205322081b'),
(5, 'Ben', 'Benson', '#45 Barnesville Avenue', 'ben', '73675debcd8a436be48ec22211dcf44fe0df0a64'),
(6, 'John', 'Johnson', '#33 Crop Street', 'john', 'a51dda7c7ff50b61eaea0444371f4a6a9301e501'),
(7, 'Sam', 'Samsom', '#12 Garden Road', 'sam', 'f16bed56189e249fe4ca8ed10a1ecae60e8ceac0');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `crops`
--
ALTER TABLE `crops`
  ADD CONSTRAINT `crops_ibfk_1` FOREIGN KEY (`farmer`) REFERENCES `farmers` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
