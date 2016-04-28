-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2016 at 08:23 PM
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
-- Table structure for table `active_advising_sessions`
--

CREATE TABLE IF NOT EXISTS `active_advising_sessions` (
  `session_id` int(11) NOT NULL AUTO_INCREMENT,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `type` int(11) NOT NULL,
  `advisor_id` int(11) NOT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `active_advising_sessions`
--

INSERT INTO `active_advising_sessions` (`session_id`, `startDate`, `endDate`, `type`, `advisor_id`) VALUES
(1, '2016-04-24', '2016-04-27', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `advisee`
--

CREATE TABLE IF NOT EXISTS `advisee` (
  `advisee_id` int(11) NOT NULL AUTO_INCREMENT,
  `major` varchar(255) DEFAULT NULL,
  `classification` varchar(32) DEFAULT NULL,
  `hold` tinyint(1) NOT NULL DEFAULT '1',
  `student_worker` tinyint(1) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`advisee_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `advisee`
--

INSERT INTO `advisee` (`advisee_id`, `major`, `classification`, `hold`, `student_worker`, `user_id`) VALUES
(1, 'computerscience', 'senior', 1, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `advisor`
--

CREATE TABLE IF NOT EXISTS `advisor` (
  `advisor_id` int(11) NOT NULL AUTO_INCREMENT,
  `major` varchar(255) NOT NULL,
  `office_loc` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`advisor_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `advisor`
--

INSERT INTO `advisor` (`advisor_id`, `major`, `office_loc`, `user_id`) VALUES
(9, 'computersciences', 124, 18);

-- --------------------------------------------------------

--
-- Table structure for table `majors`
--

CREATE TABLE IF NOT EXISTS `majors` (
  `major_code` varchar(255) NOT NULL,
  `major_name` varchar(255) NOT NULL,
  PRIMARY KEY (`major_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `majors`
--

INSERT INTO `majors` (`major_code`, `major_name`) VALUES
('bussiness', 'Bussiness'),
('computersciences', 'Computer Sciences');

-- --------------------------------------------------------

--
-- Table structure for table `timeslots`
--

CREATE TABLE IF NOT EXISTS `timeslots` (
  `slot_id` int(11) NOT NULL AUTO_INCREMENT,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `day` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `is_repeating` tinyint(1) NOT NULL DEFAULT '0',
  `open` tinyint(1) NOT NULL DEFAULT '0',
  `event` varchar(255) DEFAULT NULL,
  `advisor_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`slot_id`),
  UNIQUE KEY `Timeslot` (`start_time`,`end_time`,`day`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `timeslots`
--

INSERT INTO `timeslots` (`slot_id`, `start_time`, `end_time`, `day`, `date`, `is_repeating`, `open`, `event`, `advisor_id`, `student_id`) VALUES
(1, '12:30:00', '02:00:00', 'monday', '2016-04-25', 1, 1, 'available', 3, 0),
(3, '01:00:00', '03:30:00', 'tuesday', '2016-04-26', 1, 1, 'asdf', 3, 0),
(4, '01:00:00', '02:00:00', 'monday', NULL, 1, 1, NULL, 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `CWID` int(8) NOT NULL,
  `user_fullname` varchar(255) NOT NULL,
  `user_name` varchar(32) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_phone` varchar(32) DEFAULT NULL,
  `user_type` varchar(32) NOT NULL,
  `advised_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user-name` (`user_name`),
  UNIQUE KEY `CWID` (`CWID`,`user_name`,`user_email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `CWID`, `user_fullname`, `user_name`, `user_password`, `user_email`, `user_phone`, `user_type`, `advised_by`) VALUES
(18, 30080331, 'Sohail Haider', 'sohail', 'a2de32da8c7b9de7332c15c194ce20df', 'sohailh343@gmail.com', '3186287627', 'advisor', NULL),
(19, 30080332, 't2', 't2', '0f826a89cf68c399c5f4cf320c1a5842', 't2@gmail.com', '2026288188', 'Staff_member', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
