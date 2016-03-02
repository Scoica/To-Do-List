-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2015 at 01:54 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `todo`
--

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE IF NOT EXISTS `tasks` (
  `index` int(11) NOT NULL AUTO_INCREMENT,
  `completed` varchar(5) NOT NULL DEFAULT 'FALSE',
  `title` varchar(535) NOT NULL,
  `details` text,
  `deadline` date NOT NULL,
  PRIMARY KEY (`index`),
  UNIQUE KEY `index` (`index`),
  UNIQUE KEY `title` (`title`),
  FULLTEXT KEY `details` (`details`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=52 ;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`index`, `completed`, `title`, `details`, `deadline`) VALUES
(49, 'TRUE', 'Login/Register', 'Login\r\nRegister', '2015-11-17'),
(48, 'TRUE', 'Project To-Do List', 'Add\r\nDelete\r\nEdit\r\nMark', '2015-11-16');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
