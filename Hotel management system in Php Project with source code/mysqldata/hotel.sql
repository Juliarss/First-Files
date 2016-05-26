-- phpMyAdmin SQL Dump
-- version 3.1.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 25, 2010 at 10:54 PM
-- Server version: 5.1.33
-- PHP Version: 5.2.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `name` varchar(25) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `mno` varchar(15) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `email` varchar(50) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `date` varchar(15) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `ymsg` varchar(200) COLLATE latin1_general_ci NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`name`, `mno`, `email`, `date`, `ymsg`) VALUES
('vipul', '9825817442', 'vipul@yahoo.com', '12-5-2010', 'wel come'),
('fff', '69875698425', 'tt@yahoo.in', '2-2-2010', 'fggdf'),
('vipul', '9825817442', 'vipul@yahoo.com', '2-2-2010', 'hiiiiiiiii'),
('nikunj', '9601626442', 'n_m@yahoo.com', '20-3-2010', 'wel come'),
('ravi', '9979524123', 'r@yahoo.com', '24-3-2010', 'wel come'),
('', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE IF NOT EXISTS `reservation` (
  `r_id` int(30) NOT NULL DEFAULT '0',
  `r_chkindt` varchar(50) NOT NULL DEFAULT '',
  `r_chkoutdt` varchar(50) NOT NULL DEFAULT '',
  `r_rooms` varchar(20) NOT NULL DEFAULT '0',
  `r_type` varchar(20) NOT NULL DEFAULT '',
  `r_name` varchar(50) NOT NULL DEFAULT '',
  `r_email` varchar(100) NOT NULL DEFAULT '',
  `r_company` varchar(50) NOT NULL DEFAULT '',
  `r_phone` varchar(20) NOT NULL DEFAULT '0',
  `r_address` varchar(200) NOT NULL DEFAULT '',
  `r_spanyreq` varchar(200) NOT NULL DEFAULT '',
  KEY `r_id` (`r_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 PACK_KEYS=0;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`r_id`, `r_chkindt`, `r_chkoutdt`, `r_rooms`, `r_type`, `r_name`, `r_email`, `r_company`, `r_phone`, `r_address`, `r_spanyreq`) VALUES
(8, '24-3-2010', '24-4-2010', '8', 'deluxe', 'finava vipul', 'f_v@gmail.com', 'abc', '9825817442', 'Anida', 'no'),
(7, '24-3-2010', '28-3-2010', '17', 'deluxe', 'nikunj', 'n@yahoo.com', 'nn', '9601626442', 'Lathi', 'yes'),
(6, '2008-3-4', '2010-3-8', '1', '2600', 'vipul', 'v@gmail.com', 'sd', '9825817442', 'Anida', 'no '),
(8, '24-3-2010', '30-3-2010', '14', 'delux', 'vishal', 'vishal@ya.com', 'vishal', '972580180', 'Anida', 'no'),
(9, '25-3-2010', '28-3-2010', '3', 'deluxe', 'vipul', 'vipul@yahoo.com', 'lg', '9825817442', 'Anida', 'no '),
(0, '2008-3-4', '2010-3-8', '1', '2600', 'vipul', 'v@gmail.com', 'sd', '9825817442', 'Anida', 'no ');

-- --------------------------------------------------------

--
-- Table structure for table `tariff`
--

CREATE TABLE IF NOT EXISTS `tariff` (
  `type` varchar(50) NOT NULL DEFAULT '',
  `inrsin` varchar(30) NOT NULL DEFAULT '0',
  `inrdbl` varchar(30) NOT NULL DEFAULT '0',
  `usdsin` varchar(30) NOT NULL DEFAULT '0',
  `usddbl` varchar(30) NOT NULL DEFAULT '0',
  `avroom` int(3) NOT NULL DEFAULT '0',
  `totroom` int(3) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tariff`
--

INSERT INTO `tariff` (`type`, `inrsin`, `inrdbl`, `usdsin`, `usddbl`, `avroom`, `totroom`) VALUES
('standard', '2600', '3100', '80', '90', 17, 6),
('deluxe', '3100', '3600', '90', '110', 10, 15),
('suite', '2100', '3200', '80', '100', 9, 10),
('delux', '1100', '2200', '50', '80', 25, 50);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `username` varchar(20) NOT NULL DEFAULT '',
  `password` varchar(20) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`) VALUES
('vishal', '789'),
('vijay', '123'),
('nikunj', '456'),
('kkk', 'kkk'),
('vipul', '123');
