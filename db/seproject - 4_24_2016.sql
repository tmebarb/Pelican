-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2016 at 09:18 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.3

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
  `startdate` date NOT NULL,
  `enddate` date NOT NULL,
  `advisor_id` int(11) NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `active_advising_sessions`
--

INSERT INTO `active_advising_sessions` (`session_id`, `startdate`, `enddate`, `advisor_id`, `type`) VALUES
(0, '2016-04-19', '2016-04-29', 100004, 1),
(0, '2016-04-19', '2016-04-29', 100004, 1),
(0, '2016-04-19', '2016-04-29', 100004, 1),
(0, '2016-04-21', '2016-04-22', 100019, 1),
(0, '2016-04-27', '2016-04-27', 100019, 1),
(0, '2016-04-25', '2016-04-29', 100019, 1),
(0, '2016-04-25', '2016-04-29', 100019, 1),
(0, '0000-00-00', '0000-00-00', 100019, 1);

-- --------------------------------------------------------

--
-- Table structure for table `advisee`
--

CREATE TABLE `advisee` (
  `student_id` int(11) NOT NULL,
  `major` varchar(255) DEFAULT NULL,
  `classification` varchar(255) DEFAULT NULL,
  `CWID` int(8) NOT NULL,
  `advisor_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `advisee`
--

INSERT INTO `advisee` (`student_id`, `major`, `classification`, `CWID`, `advisor_id`) VALUES
(100004, 'HIST', 'Senior', 30012121, NULL),
(100005, 'AVIA', 'Freshman', 30023232, NULL),
(100006, 'AVIA', 'Sophomore', 30034343, NULL),
(100007, 'AVIA', 'Sophomore', 30045454, NULL),
(100008, 'CSCI', 'Freshman', 30056565, NULL),
(100009, 'CSCI', 'Senior', 30067676, NULL),
(100010, 'CSCI', 'Senior', 30078787, NULL),
(100011, 'ENGL', 'Senior', 30089898, NULL),
(100012, 'ENGL', 'Freshman', 30090909, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `advisor`
--

CREATE TABLE `advisor` (
  `advisor_id` int(11) NOT NULL,
  `major` varchar(255) DEFAULT NULL,
  `office_loc` varchar(255) DEFAULT NULL,
  `CWID` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `advisor`
--

INSERT INTO `advisor` (`advisor_id`, `major`, `office_loc`, `CWID`) VALUES
(100004, 'CSCI', 'Hemphill Hall 346', 30012345),
(100006, 'AVIA', NULL, 30011111),
(100007, 'CSCI', NULL, 30022222),
(100008, 'AVIA', NULL, 30033333),
(100009, 'ENGL', NULL, 30044444),
(100019, 'HIST', NULL, 30055555);

-- --------------------------------------------------------

--
-- Table structure for table `calendar`
--

CREATE TABLE `calendar` (
  `date` date NOT NULL,
  `event` varchar(255) NOT NULL,
  `advisor_id` int(11) DEFAULT NULL,
  `student_id` int(11) NOT NULL,
  `placeholder` int(11) NOT NULL,
  `avail` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `calendar`
--

INSERT INTO `calendar` (`date`, `event`, `advisor_id`, `student_id`, `placeholder`, `avail`) VALUES
('2016-04-29', 'Zuko', 100004, 100003, 3, 1),
('2016-04-25', 'Harry', 100006, 0, 4, 1),
('2016-04-26', 'Hermione', 100006, 0, 5, 1),
('2016-04-13', 'Frisk', 100007, 0, 6, 1),
('2016-04-30', 'Asriel', 100007, 0, 7, 1),
('2016-04-11', 'Chara', 100007, 0, 8, 1),
('2016-04-23', 'Aang', 100008, 0, 9, 1),
('2016-04-29', 'Bilbo', 100009, 0, 10, 1),
('2016-04-29', 'Frodo', 100009, 0, 11, 1);

-- --------------------------------------------------------

--
-- Table structure for table `timeslots`
--

CREATE TABLE `timeslots` (
  `slot_id` int(11) NOT NULL,
  `start_time` varchar(255) NOT NULL,
  `open` tinyint(1) NOT NULL,
  `end_time` varchar(255) DEFAULT NULL,
  `is_repeating` tinyint(1) NOT NULL,
  `day` varchar(255) DEFAULT NULL,
  `advisor_id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_fullname` varchar(255) DEFAULT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_email` varchar(255) DEFAULT NULL,
  `user_type` varchar(255) DEFAULT NULL,
  `user_phone` varchar(10) DEFAULT NULL,
  `CWID` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_fullname`, `user_name`, `user_password`, `user_email`, `user_type`, `user_phone`, `CWID`) VALUES
(18879, 'Dr. Advisor', 'visor', '9e963409fb69601d2d791b423f43e803', 'visor@ulm.edu', 'advisor', NULL, 30012345),
(18880, 'Albus Dumbledore', 'wizard', 'd8d3a01ba7e5d44394b6f0a8533f4647', 'ddore@ulm.edu', 'advisor', NULL, 30011111),
(18881, 'Asgore Dreemurr', 'goat', 'a94aa000f9a94cc51775bd5eac97c926', 'goat@ulm.edu', 'advisor', NULL, 30022222),
(18882, 'Avatar Roku', 'avatar', 'aaca0f5eb4d2d98a6ce6dffa99f8254b', 'avatar@ulm.edu', 'advisor', NULL, 30033333),
(18883, 'Gandalf Gray', 'ring', '1a5df958e0f29d35594c7cf057fe4bd1', 'ring@ulm.edu', 'advisor', NULL, 30044444),
(18899, 'Iroh', 'dragon', '8621ffdbc5698829397d97767ac13db3', 'dragon@ulm.edu', 'advisor', NULL, 30055555),
(18902, 'Zuko', 'fire', '015f28b9df1bdd36427dd976fb73b29d', 'fire@ulm.edu', 'advisee', NULL, 30012121),
(18903, 'Aang', 'appa', 'c5ffabd145b8ebaeaaebfbb4ad901a90', 'appa@ulm.edu', 'advisee', NULL, 30023232),
(18904, 'Harry Potter', 'harry', '3b87c97d15e8eb11e51aa25e9a5770e9', 'harry@ulm.edu', 'advisee', NULL, 30034343),
(18905, 'Hermione Granger', 'hermy', '9b59076b1a984f6f09fcaf1ca7ce4ec7', 'hermy@ulm.edu', 'advisee', NULL, 30045454),
(18906, 'Frisk', 'frisk', '82e08454f81c02be8cf53c479c09cba2', 'frisk@ulm.edu', 'advisee', NULL, 30056565),
(18907, 'Chara', 'chara', 'e3de68fe07345b556cb591d0b29a5145', 'chara@ulm.edu', 'advisee', NULL, 30067676),
(18908, 'Asriel', 'flowey', '96c85b6effced99ce1bb9b43a83e5bfa', 'flowey@ulm.edu', 'advisee', NULL, 30078787),
(18909, 'Bilbo Baggins', 'bilbo', 'fc09d87d5e86c6002f04ece7ea95aa27', 'bilbo@ulm.edu', 'advisee', NULL, 30089898),
(18910, 'Frodo Baggins', 'frodo', 'f0f8820ee817181d9c6852a097d70d8d', 'frodo@ulm.edu', 'advisee', NULL, 30090909);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advisee`
--
ALTER TABLE `advisee`
  ADD PRIMARY KEY (`student_id`),
  ADD KEY `user_id` (`CWID`);

--
-- Indexes for table `advisor`
--
ALTER TABLE `advisor`
  ADD PRIMARY KEY (`advisor_id`),
  ADD UNIQUE KEY `user_id` (`CWID`);

--
-- Indexes for table `calendar`
--
ALTER TABLE `calendar`
  ADD PRIMARY KEY (`placeholder`);

--
-- Indexes for table `timeslots`
--
ALTER TABLE `timeslots`
  ADD PRIMARY KEY (`slot_id`),
  ADD UNIQUE KEY `slot_id` (`slot_id`),
  ADD UNIQUE KEY `student_id` (`student_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `CWID` (`CWID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advisee`
--
ALTER TABLE `advisee`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100013;
--
-- AUTO_INCREMENT for table `advisor`
--
ALTER TABLE `advisor`
  MODIFY `advisor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100020;
--
-- AUTO_INCREMENT for table `calendar`
--
ALTER TABLE `calendar`
  MODIFY `placeholder` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `timeslots`
--
ALTER TABLE `timeslots`
  MODIFY `slot_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18911;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
