-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2014 at 01:37 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `membrane`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` text NOT NULL,
  `password` text NOT NULL,
  `psalt` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE IF NOT EXISTS `appointment` (
  `regId` int(11) NOT NULL AUTO_INCREMENT,
  `date` varchar(20) NOT NULL,
  `time` varchar(20) NOT NULL,
  `doctor` varchar(30) NOT NULL,
  `patientname` varchar(50) NOT NULL,
  `patientphone` int(15) NOT NULL,
  `patientage` int(3) NOT NULL,
  PRIMARY KEY (`regId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`regId`, `date`, `time`, `doctor`, `patientname`, `patientphone`, `patientage`) VALUES
(1, '', '', '', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE IF NOT EXISTS `login_attempts` (
  `user_id` int(11) NOT NULL,
  `time` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_attempts`
--

INSERT INTO `login_attempts` (`user_id`, `time`) VALUES
(3, '1408957447'),
(3, '1408957461'),
(3, '1408957779'),
(3, '1408959848');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` char(128) NOT NULL,
  `salt` char(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `username`, `email`, `password`, `salt`) VALUES
(3, 'test', 'test@testmail.com', 'ae6bb28ad53a38b08a2bb7322b2941eb2043cfdf2c31279db91dcd3f1e0356002cf75bb4f81db41f9fc280bb27abdc8c576c6fbff8d5754833fdc75d7d6f40c2', '18cfd6b83f6a0c1c547e589eb918267edfbd7278c20cb33c1d4e8dc792dacc8217c921b027bf61da380bf2533431e8cc1c3c2b4faf2fcfdae668c5d97afb3558'),
(4, 'john', 'john@mail.com', '916e21f02d1949743fd5b138fcfd352b8435e1f7fd985673b3f23bcde61893a6079d1993d6fbb2cea10e2b78f1f49aac1271ebac8e9d24e3382e05f8e6d9a734', '7e89d875aa045e7fb18cb6fd5e55e7e4d2b906c82a242767fac3f88c7448bee2104a100b1351549381626884b8095c8190717088a65e47027a1438d4d91c7878');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
