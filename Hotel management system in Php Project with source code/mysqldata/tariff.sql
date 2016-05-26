-- phpMyAdmin SQL Dump
-- version 2.6.1-pl3
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Dec 26, 2008 at 03:40 AM
-- Server version: 4.1.10
-- PHP Version: 5.0.4
-- 
-- Database: `hotel`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `tariff`
-- 

CREATE TABLE `tariff` (
  `srno` int(3) NOT NULL default '0',
  `type` varchar(50) NOT NULL default '',
  `inrsin` bigint(30) NOT NULL default '0',
  `inrdbl` bigint(30) NOT NULL default '0',
  `usdsin` bigint(30) NOT NULL default '0',
  `usddbl` bigint(30) NOT NULL default '0',
  `avroom` int(3) NOT NULL default '0',
  `totroom` int(3) NOT NULL default '0',
  KEY `srno` (`srno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `tariff`
-- 

INSERT INTO `tariff` VALUES (1, 'standard', 2650, 3150, 75, 90, 17, 6);
INSERT INTO `tariff` VALUES (2, 'deluxe', 3150, 3650, 90, 105, 10, 15);
INSERT INTO `tariff` VALUES (3, 'suite', 2100, 3200, 80, 50, 9, 10);
INSERT INTO `tariff` VALUES (0, 'delux', 100, 200, 50, 50, 25, 50);
