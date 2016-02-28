-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2016 at 04:34 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `seproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_fullname` text,
  `user_name` text NOT NULL,
  `user_password` text NOT NULL,
  `user_email` text,
  `user_type` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_fullname`, `user_name`, `user_password`, `user_email`, `user_type`) VALUES
(2, 'Sohail Haider', 'sohail', '4a9618951d55fa3fab9200151cadf007', 'sohailh343@gmail.com', 'superadmin'),
(3, 'Admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', NULL, 'newbee'),
(4, 'Test User', 'test', '098f6bcd4621d373cade4e832627b4f6', NULL, 'newbee'),
(5, 'Admin 2', 'admin2', 'c84258e9c39059a89ab77d846ddab909', NULL, 'newbee'),
(6, 'Test2', 'test2', 'ad0234829205b9033196ba818f7a872b', NULL, 'newbee');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
