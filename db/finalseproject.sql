-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2016 at 07:40 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `seproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `active_advising_sessions`
--

CREATE TABLE `active_advising_sessions` (
  `session_id` int(11) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `type` int(11) NOT NULL,
  `advisor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `active_advising_sessions`
--

INSERT INTO `active_advising_sessions` (`session_id`, `startDate`, `endDate`, `type`, `advisor_id`) VALUES
(1, '2016-04-30', '2016-05-06', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `advisee`
--

CREATE TABLE `advisee` (
  `advisee_id` int(11) NOT NULL,
  `major` varchar(255) DEFAULT NULL,
  `classification` varchar(32) DEFAULT NULL,
  `hold` tinyint(1) NOT NULL DEFAULT '0',
  `student_worker` tinyint(1) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `advisee`
--

INSERT INTO `advisee` (`advisee_id`, `major`, `classification`, `hold`, `student_worker`, `user_id`) VALUES
(1, 'CSCI', 'Freshman', 1, 0, 8),
(2, 'CSCI', 'Sophomore', 0, 1, 10),
(3, 'CINS', 'Sophomore', 0, 0, 11),
(4, 'CSCI', 'Freshman', 1, 1, 13),
(5, 'CSCI', 'Junior', 1, 1, 14),
(8, 'BUSN', 'Senior', 0, 0, 19),
(9, 'CINS', 'Freshman', 0, 0, 24);

-- --------------------------------------------------------

--
-- Table structure for table `advisor`
--

CREATE TABLE `advisor` (
  `advisor_id` int(11) NOT NULL,
  `major` varchar(255) NOT NULL,
  `office_loc` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `advisor`
--

INSERT INTO `advisor` (`advisor_id`, `major`, `office_loc`, `user_id`) VALUES
(1, 'CSCI', 'Hemp 101', 9),
(2, 'CINS', '0', 12),
(3, 'CSCI', 'Hemp 102', 22);

-- --------------------------------------------------------

--
-- Table structure for table `majors`
--

CREATE TABLE `majors` (
  `major_code` varchar(255) NOT NULL,
  `major_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `majors`
--

INSERT INTO `majors` (`major_code`, `major_name`) VALUES
('CINS', 'Computer Information Systems'),
('CSCI', 'Computer Science');

-- --------------------------------------------------------

--
-- Table structure for table `timeslots`
--

CREATE TABLE `timeslots` (
  `slot_id` int(11) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `day` varchar(255) DEFAULT NULL,
  `date` date NOT NULL,
  `is_repeating` tinyint(1) NOT NULL DEFAULT '0',
  `open` tinyint(1) NOT NULL DEFAULT '0',
  `event` varchar(255) DEFAULT NULL,
  `advisor_id` int(11) NOT NULL,
  `advisee_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timeslots`
--

INSERT INTO `timeslots` (`slot_id`, `start_time`, `end_time`, `day`, `date`, `is_repeating`, `open`, `event`, `advisor_id`, `advisee_id`) VALUES
(4, '12:30:00', '02:00:00', 'monday', '0000-00-00', 1, 1, NULL, 1, 0),
(5, '01:30:00', '02:30:00', 'thrday', '0000-00-00', 1, 1, NULL, 1, 0),
(6, '01:00:00', '01:30:00', 'monday', '0000-00-00', 1, 1, NULL, 1, 0),
(7, '03:30:00', '05:30:00', 'tuesday', '0000-00-00', 1, 1, NULL, 1, 0),
(8, '01:30:00', '02:00:00', NULL, '2016-05-05', 0, 0, NULL, 9, 10),
(9, '02:00:00', '02:30:00', NULL, '2016-05-05', 0, 0, NULL, 9, 11);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `CWID` int(8) NOT NULL,
  `user_fullname` varchar(255) NOT NULL,
  `user_name` varchar(32) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_phone` varchar(32) DEFAULT NULL,
  `user_type` varchar(32) NOT NULL,
  `advised_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `CWID`, `user_fullname`, `user_name`, `user_password`, `user_email`, `user_phone`, `user_type`, `advised_by`) VALUES
(0, 10000001, 'Herman Thomas', 'thomashp', '66ac3964ba845c8a82904c19a7bea869', 'herm@herm.com', '2813308004', 'advisee', 22),
(1, 30013084, 'Wesley Roberson', 'roberswd', '051820300fd29f805a12880abd0ac596', 'wes@wes.com', NULL, 'admin', NULL),
(8, 11111111, 'Grace Wilson', 'wilsonsg', 'c53be7c3d8f388454e1b64b5767fd39a', 'grace@grace.com', NULL, 'advisee', 9),
(9, 22222222, 'Maurice Roberson', 'robersam', '5f958aa50f12213d724b476ac436a658', 'ahman@ahman.com', '3183051111', 'advisor', NULL),
(10, 33333333, 'Brianna Roberson', 'robersbl', 'e5bac81332079c54e403b2a37e81f663', 'bri@bri.com', NULL, 'advisee', 9),
(11, 44444444, 'Ahmani Roberson', 'robersav', '5f958aa50f12213d724b476ac436a658', 'mani@mani.com', NULL, 'advisee', 9),
(12, 55555555, 'Chaun Stevenson', 'frielscl', '1308f8447dee8e4107314f0863167aa9', 'chaun@chaun.com', NULL, 'advisor', NULL),
(13, 66666666, 'Quez Friels', 'frielsjj', 'e0ff1fcef4b5adbe8672398c1a72b6c8', 'quez@quez.com', NULL, 'advisee', 12),
(14, 77777777, 'Jacquan Friels', 'frielsjd', 'e0ff1fcef4b5adbe8672398c1a72b6c8', 'quan@quan.com', NULL, 'advisee', 12),
(15, 88888888, 'Reginald Iles', 'ilesrw', '3d11c2a55f6df87151b12b0f9a0185aa', 'gata@gata.com', NULL, 'Staff_member', NULL),
(16, 99999999, 'Javonta Thomas', 'vonnie', 'f1d7057e7e123e2da2e0917ca27cb185', 'vonnie@vonnie.com', NULL, 'Staff_member', NULL),
(22, 10000002, 'Alecia Roberson', 'robersaf', '053ddbf7c46bfba0016233ed25385dfc', 'lecia@lecia.com', '1472583690', 'advisor', NULL),
(23, 0, 'No Advisor', '-', 'pword', 'N/A', 'N/A', 'advisor', NULL),
(24, 10000003, 'Jay Will', 'williaji', '87f7e060c27e44b4545fc34a19a500e6', 'jay@jay.com', '102301251', 'advisee', NULL),
(25, 10000004, 'Lisa Thomas', 'thomaslm', 'c1b75589c0217bb311a7374500d73e1f', 'lisa@lisa.com', '759846132', 'Staff_member', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `active_advising_sessions`
--
ALTER TABLE `active_advising_sessions`
  ADD PRIMARY KEY (`session_id`);

--
-- Indexes for table `advisee`
--
ALTER TABLE `advisee`
  ADD PRIMARY KEY (`advisee_id`);

--
-- Indexes for table `advisor`
--
ALTER TABLE `advisor`
  ADD PRIMARY KEY (`advisor_id`);

--
-- Indexes for table `majors`
--
ALTER TABLE `majors`
  ADD PRIMARY KEY (`major_code`);

--
-- Indexes for table `timeslots`
--
ALTER TABLE `timeslots`
  ADD PRIMARY KEY (`slot_id`),
  ADD UNIQUE KEY `Timeslot` (`start_time`,`end_time`,`day`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user-name` (`user_name`),
  ADD UNIQUE KEY `CWID` (`CWID`,`user_name`,`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `active_advising_sessions`
--
ALTER TABLE `active_advising_sessions`
  MODIFY `session_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `advisee`
--
ALTER TABLE `advisee`
  MODIFY `advisee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `advisor`
--
ALTER TABLE `advisor`
  MODIFY `advisor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `timeslots`
--
ALTER TABLE `timeslots`
  MODIFY `slot_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
