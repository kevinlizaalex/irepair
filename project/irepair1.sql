-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 03, 2022 at 08:08 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `irepair1`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_repairdetails`
--

DROP TABLE IF EXISTS `tbl_repairdetails`;
CREATE TABLE IF NOT EXISTS `tbl_repairdetails` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `userphone` bigint(10) NOT NULL,
  `useremail` varchar(30) NOT NULL,
  `repairtype` varchar(30) NOT NULL,
  `brand` varchar(39) NOT NULL,
  `model` varchar(20) NOT NULL,
  `imei` bigint(15) NOT NULL,
  `rate` int(10) NOT NULL,
  `addressline1` varchar(50) NOT NULL,
  `addressline2` varchar(50) NOT NULL,
  `city` varchar(30) NOT NULL,
  `state` varchar(30) NOT NULL,
  `zip` int(10) NOT NULL,
  `country` varchar(30) NOT NULL,
  `rstate` int(1) NOT NULL DEFAULT '0',
  `date` varchar(50) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_repairdetails`
--

INSERT INTO `tbl_repairdetails` (`id`, `username`, `userphone`, `useremail`, `repairtype`, `brand`, `model`, `imei`, `rate`, `addressline1`, `addressline2`, `city`, `state`, `zip`, `country`, `rstate`, `date`, `status`) VALUES
(1, 'Kevin Liza Alex', 7902772169, 'kevin@gmail.com', 'Display', 'Apple', 'iPhone 13 Pro Max', 645643747567567, 9000, 'Home Eds', 'Opposite Post Office', 'Kottayam', 'Kerala', 686001, 'India', 3, '', 1),
(2, 'Kevin Liza Alex', 7902772169, 'kevin@gmail.com', 'Battery', 'Pixel', 'Pixel 6 Pro', 237848675865728, 8000, 'Office Ad', 'Inside Center', 'Kottayam', 'Kerala', 686001, 'India', 0, '2022-03-03', 1),
(3, 'Kevin Liza Alex', 7902772169, 'kevin@gmail.com', 'Battery', 'Samsung', 'Samsung S20 Ultra', 785768678678670, 7000, 'My House', 'Belkin', 'Ernakulam', 'Kerala', 686777, 'India', 0, '2022-03-03', 1),
(4, 'Kevin Liza Alex', 7902772169, 'kevin@gmail.com', 'Display', 'Apple', 'iPhone 13 Pro', 785768678678674, 9000, 'Hossur', 'Belaan', 'Trivandrum', 'Kerala', 675454, 'India', 0, '2022-03-03 14:55:00', 0),
(5, 'Akhil Siby', 9207200171, 'akhil@gmail.com', 'Battery', 'Samsung', 'Samsung S20 Ultra', 785768678678688, 7000, 'Parackal House', 'Vilakkumadom P.O', 'Kottayam', 'Kerala', 687665, 'India', 3, '2022-03-03 20:20:23', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_spares`
--

DROP TABLE IF EXISTS `tbl_spares`;
CREATE TABLE IF NOT EXISTS `tbl_spares` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(20) NOT NULL,
  `brand` varchar(30) NOT NULL,
  `model` varchar(30) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_spares`
--

INSERT INTO `tbl_spares` (`id`, `category`, `brand`, `model`, `price`, `quantity`, `status`) VALUES
(4, 'Display', 'Samsung', 'Original Grade 1', 9000, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `phone` bigint(10) NOT NULL,
  `password` varchar(200) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '2',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `name`, `email`, `phone`, `password`, `status`) VALUES
(1, 'Admin', 'admin@irepair.com', 9495969991, '21232f297a57a5a743894a0e4a801fc3', 1),
(2, 'Akhil Siby', 'akhil@gmail.com', 9207200171, '545d26918d43a640c4bed801fa7c86a4', 2),
(3, 'sample', 'sabhj@gmail.com', 7777777777, '21232f297a57a5a743894a0e4a801fc3', 2),
(4, 'Kevin Liza Alex', 'kevin@gmail.com', 7902772169, '9d5e3ecdeb4cdb7acfd63075ae046672', 3),
(5, 'sam', 'sam@gmail.com', 7878787878, '332532dcfaa1cbf61e2a266bd723612c', 2),
(6, 'Aby Paul', 'aby@gmail.com', 9961557946, 'f722acc637a77362c9fe03bd1c81d433', 2);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
