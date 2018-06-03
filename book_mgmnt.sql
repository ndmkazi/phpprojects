-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 03, 2018 at 05:08 PM
-- Server version: 5.5.25a
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `book_mgmnt`
--

-- --------------------------------------------------------

--
-- Table structure for table `book_details`
--

CREATE TABLE IF NOT EXISTS `book_details` (
  `bkid` int(11) NOT NULL AUTO_INCREMENT,
  `bknm` varchar(100) NOT NULL,
  `bkauthor` varchar(100) NOT NULL,
  `bkstatus` int(1) NOT NULL,
  PRIMARY KEY (`bkid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `book_details`
--

INSERT INTO `book_details` (`bkid`, `bknm`, `bkauthor`, `bkstatus`) VALUES
(1, 'Harry potter', 'J K Rowling', 1),
(3, 'The Hunger Games', 'Suzanne Collins', 0),
(4, 'The three mistakes of my life', 'Chetan Bhagat', 1),
(5, 'Half girlfriend', 'Chetan Bhagat', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
