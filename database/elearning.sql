-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2018 at 12:43 PM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `elearning`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(200) NOT NULL AUTO_INCREMENT,
  `ml` varchar(400) NOT NULL,
  `pas` varchar(400) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `ml`, `pas`) VALUES
(1, 'admin@gmail.com', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `chapter`
--

CREATE TABLE IF NOT EXISTS `chapter` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `chapid` varchar(400) NOT NULL,
  `subid` varchar(400) NOT NULL,
  `stdid` varchar(400) NOT NULL,
  `chapname` varchar(400) NOT NULL,
  `createdat` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  `updatedat` timestamp(6) NOT NULL DEFAULT '0000-00-00 00:00:00.000000',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `lession`
--

CREATE TABLE IF NOT EXISTS `lession` (
  `id` int(200) NOT NULL AUTO_INCREMENT,
  `lesnid` varchar(400) NOT NULL,
  `chapid` varchar(400) NOT NULL,
  `subid` varchar(400) NOT NULL,
  `stdid` varchar(400) NOT NULL,
  `lesnname` varchar(400) NOT NULL,
  `createdat` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  `updatedat` timestamp(6) NOT NULL DEFAULT '0000-00-00 00:00:00.000000',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `std`
--

CREATE TABLE IF NOT EXISTS `std` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `stdid` varchar(400) NOT NULL,
  `stdname` varchar(400) NOT NULL,
  `createdat` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  `updatedat` timestamp(6) NOT NULL DEFAULT '0000-00-00 00:00:00.000000',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sub`
--

CREATE TABLE IF NOT EXISTS `sub` (
  `id` int(200) NOT NULL AUTO_INCREMENT,
  `subid` varchar(400) NOT NULL,
  `stdid` varchar(400) NOT NULL,
  `subname` varchar(400) NOT NULL,
  `createdat` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  `updatedat` timestamp(6) NOT NULL DEFAULT '0000-00-00 00:00:00.000000',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `sub`
--

INSERT INTO `sub` (`id`, `subid`, `stdid`, `subname`, `createdat`, `updatedat`) VALUES
(4, '01', 'juhj', 'jbnj', '2018-01-04 04:07:27.610224', '0000-00-00 00:00:00.000000');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
