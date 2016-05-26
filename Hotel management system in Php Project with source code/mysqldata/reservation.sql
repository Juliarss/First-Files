-- phpMyAdmin SQL Dump
-- version 2.6.1-pl3
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Dec 26, 2008 at 03:38 AM
-- Server version: 4.1.10
-- PHP Version: 5.0.4
-- 
-- Database: `hotel`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `reservation`
-- 

CREATE TABLE `reservation` (
  `r_id` int(3) NOT NULL default '0',
  `r_chkindt` varchar(50) NOT NULL default '',
  `r_chkoutdt` varchar(50) NOT NULL default '',
  `r_rooms` int(3) NOT NULL default '0',
  `r_type` varchar(20) NOT NULL default '',
  `r_name` varchar(50) NOT NULL default '',
  `r_email` varchar(100) NOT NULL default '',
  `r_company` varchar(50) NOT NULL default '',
  `r_phone` int(15) NOT NULL default '0',
  `r_address` varchar(200) NOT NULL default '',
  `r_spanyreq` varchar(200) NOT NULL default '',
  KEY `r_id` (`r_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `reservation`
-- 

INSERT INTO `reservation` VALUES (0, '2008-12-18', '2008-12-20', 3, 'standard', 'neha', 'neha@yahoo.com', 'neha co.', 3492090, 'yagnik road,rajkot', 'no');
INSERT INTO `reservation` VALUES (0, '2008-12-24', '2008-12-31', 5, 'standard', 'abc', 'abc@yahoo.com', 'abc com.', 5435908, 'yagnik road,', 'no');
