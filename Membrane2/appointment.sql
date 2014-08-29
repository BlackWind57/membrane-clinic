-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 04, 2014 at 02:06 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `appointment`
--

-- --------------------------------------------------------

--
-- Table structure for table `registeration`
--

CREATE TABLE IF NOT EXISTS `registeration` (
  `regId` int(11) NOT NULL AUTO_INCREMENT,
  `date` varchar(20) NOT NULL,
  `time` varchar(20) NOT NULL,
  `userId` int(11) NOT NULL,
  `Doctor` tinyblob NOT NULL,
  PRIMARY KEY (`regId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(30) NOT NULL,
  `firstName` text NOT NULL,
  `lastName` text NOT NULL,
  `age` int(3) NOT NULL,
  `phoneNum` int(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`userId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userId`, `username`, `password`, `firstName`, `lastName`, `age`, `phoneNum`, `email`) VALUES
(1, 'test', 'test', 'test', 'test', 11, 1234567, 'test@haha.com'),
(2, 'asdhjk', '25d55ad283aa400af464c76d713c07', 'asd', 'asd', 19, 123456789, 'asd@haha.com'),
(3, 'testing', 'ae2b1fca515949e5d54fb22b8ed955', 'test', 'user', 11, 1234567890, 'testing@hoho.com'),
(4, 'md5test', 'ae2b1fca515949e5d54fb22b8ed955', 'asd', 'asd', 1, 1245678, 'asd@aha.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
