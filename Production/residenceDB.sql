-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2015 at 07:30 AM
-- Server version: 5.5.44-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `residenceDB`
--

-- --------------------------------------------------------

--
-- Table structure for table `residence_areas`
--

CREATE TABLE IF NOT EXISTS `residence_areas` (
  `id` int(5) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `first_name` varchar(60) NOT NULL,
  `last_name` varchar(60) NOT NULL,
  `year` varchar(60) NOT NULL,
  `gender` varchar(60) NOT NULL,
  `cwid` varchar(60) NOT NULL,
  `hall` varchar(60) NOT NULL,
  `special_services` varchar(60) DEFAULT NULL,
  `kitchen` varchar(60) DEFAULT NULL,
  `laundry` varchar(60) DEFAULT NULL,
  `email` varchar(60) NOT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `confirm_code` varchar(16) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `residence_halls`
--

CREATE TABLE IF NOT EXISTS `residence_halls` (
  `champagnat` int(2) NOT NULL DEFAULT '5',
  `leo` int(2) NOT NULL DEFAULT '5',
  `marian` int(2) NOT NULL DEFAULT '5',
  `sheahan` int(2) NOT NULL DEFAULT '5',
  `midrise` int(2) NOT NULL DEFAULT '5',
  `foy` int(2) NOT NULL DEFAULT '5',
  `gartland` int(2) NOT NULL DEFAULT '5',
  `uppernew` int(2) NOT NULL DEFAULT '5',
  `lowernew` int(2) NOT NULL DEFAULT '5',
  `newfulton` int(2) NOT NULL DEFAULT '5',
  `lowerwest` int(2) NOT NULL DEFAULT '5',
  `upperwest` int(2) NOT NULL DEFAULT '5',
  `fulton` int(2) NOT NULL DEFAULT '5',
  `talmadge` int(2) NOT NULL DEFAULT '5'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `residence_halls`
--

INSERT INTO `residence_halls` (`champagnat`, `leo`, `marian`, `sheahan`, `midrise`, `foy`, `gartland`, `uppernew`, `lowernew`, `newfulton`, `lowerwest`, `upperwest`, `fulton`, `talmadge`) VALUES
(5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
