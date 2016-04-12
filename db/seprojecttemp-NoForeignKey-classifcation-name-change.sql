-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2016 at 05:26 PM
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
-- Table structure for table `advisee`
--

CREATE TABLE `advisee` (
  `student_id` int(11) NOT NULL,
  `major` varchar(255) DEFAULT NULL,
  `classification` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `advisee`
--

INSERT INTO `advisee` (`student_id`, `major`, `classification`, `user_id`) VALUES
(1, NULL, NULL, 12346),
(2, NULL, NULL, 12369),
(999, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `advises`
--

CREATE TABLE `advises` (
  `advisor_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `advises`
--

INSERT INTO `advises` (`advisor_id`, `student_id`) VALUES
(1, 12370),
(100001, 1),
(100001, 2);

-- --------------------------------------------------------

--
-- Table structure for table `advisor`
--

CREATE TABLE `advisor` (
  `advisor_id` int(11) NOT NULL,
  `major` varchar(255) DEFAULT NULL,
  `office_loc` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `advisor`
--

INSERT INTO `advisor` (`advisor_id`, `major`, `office_loc`, `user_id`) VALUES
(1, NULL, NULL, 12363),
(2, NULL, NULL, 12365),
(3, NULL, NULL, 12366),
(100001, 'hey', NULL, 12367),
(100002, NULL, NULL, 12368),
(100003, NULL, NULL, 12370);

-- --------------------------------------------------------

--
-- Table structure for table `timeslots`
--

CREATE TABLE `timeslots` (
  `slot_id` int(11) NOT NULL,
  `start_time` varchar(255) NOT NULL,
  `open` tinyint(1) NOT NULL,
  `student_id` int(11) NOT NULL,
  `advisor_id` int(11) NOT NULL,
  `end_time` varchar(255) DEFAULT NULL,
  `is_repeating` tinyint(1) NOT NULL,
  `day` int(15) DEFAULT NULL
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
  `user_phone` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_fullname`, `user_name`, `user_password`, `user_email`, `user_type`, `user_phone`) VALUES
(2, 'Sohail Haider', 'sohail', '4a9618951d55fa3fab9200151cadf007', 'sohailh343@gmail.com', 'superadmin', ''),
(3, 'Admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', NULL, 'newbee', ''),
(4, 'Test User', 'test', '098f6bcd4621d373cade4e832627b4f6', NULL, 'newbee', ''),
(5, 'Admin 2', 'admin2', 'c84258e9c39059a89ab77d846ddab909', NULL, 'newbee', ''),
(6, 'Test2', 'test2', 'ad0234829205b9033196ba818f7a872b', NULL, 'newbee', ''),
(7, 'Vernon', 'vdub', '827ccb0eea8a706c4c34a16891f84e7b', NULL, 'newbee', ''),
(8, 'Vernon Bush', 'vernon', '827ccb0eea8a706c4c34a16891f84e7b', NULL, 'newbee', ''),
(10, 'advisee', 'advisee', '5871e0cbf261071cd5b595a3b71fa5e8', NULL, 'advisee', ''),
(11, 'advisee1', 'advisee1', '02ec19d4d373e1340715e4b73f50e173', NULL, 'advisee', ''),
(12345, 'Jon', 'Jon', '48bc893fcbc0a33ed3ad2cf2d5d57cfe', NULL, 'advisor', ''),
(12346, 'username', 'username', '14c4b06b824ec593239362517f538b29', NULL, 'advisee', ''),
(12347, 'advsorA', 'advisorA', 'f62c214dbc10935d391df7bba6725045', NULL, 'advisor', ''),
(12348, 'staff', 'staff', '1253208465b1efa876f982d8a9e73eef', NULL, 'Staff_Worker', ''),
(12349, 'staffa', 'staffa', 'aacaa0ad8d7b3ead8553051b185595b7', NULL, 'Staff_Worker', ''),
(12350, 'staffb', 'staffb', '2cdc82e67260b097d6b49198977ab934', NULL, 'Staff_Worker', ''),
(12351, 'staffc', 'staffc', '4bdea032d309a2989293b6ee90f1ad68', NULL, 'Staff_Worker', ''),
(12352, 'staffd', 'staffd', 'ab0d080d4a58143de48e067c85ba64e8', NULL, 'staffMember', ''),
(12353, 'fuckit', 'fuckit', '91da4589b012c2fe1ceac1fb2363dbc6', NULL, 'advisor', ''),
(12354, 'lame', 'lame', '6780237a0c54951693513efb491f7aae', NULL, 'advisor', ''),
(12355, 'hey', 'hey', '6057f13c496ecf7fd777ceb9e79ae285', NULL, 'advisor', ''),
(12356, 'clide', 'clide', '98dbd3a2f14355281576fefb06ac738b', NULL, 'advisor', ''),
(12357, 'bonnie', 'bonnie', 'eb5ba7c977d21014520ad3ee0432d10f', NULL, 'advisor', ''),
(12358, 'jo', 'jo', '674f33841e2309ffdd24c85dc3b999de', NULL, 'advisor', ''),
(12359, 'ja', 'ja', 'a78c5bf69b40d464b954ef76815c6fa0', NULL, 'advisor', ''),
(12360, 'as', 'as', 'f970e2767d0cfe75876ea857f92e319b', NULL, 'advisor', ''),
(12361, 'af', 'af', 'f0357a3f154bc2ffe2bff55055457068', NULL, 'advisor', ''),
(12362, 'ka', 'ka', '2c68e1d50809e4ae357bcffe1fc99d2a', NULL, 'advisor', ''),
(12363, 'qw', 'qw', '006d2143154327a64d86a264aea225f3', NULL, 'advisor', ''),
(12364, 'lo', 'lo', '7ce8636c076f5f42316676f7ca5ccfbe', NULL, 'advisor', ''),
(12365, 'az', 'az', 'cc8c0a97c2dfcd73caff160b65aa39e2', NULL, 'advisor', ''),
(12366, 'fuck', 'fuck', '99754106633f94d350db34d548d6091a', NULL, 'advisor', ''),
(12367, 'sammy', 'sammy', '4385695633f8c6c8ab52592092cecf04', NULL, 'advisor', ''),
(12368, 'bam', 'bam', 'e5bea9a864d5b94d76ebdaaf43d66f4d', NULL, 'advisor', ''),
(12369, 'new', 'new', '22af645d1859cb5ca6da0c484f1f37ea', NULL, 'advisee', ''),
(12370, 'james', 'james', 'b4cc344d25a2efe540adbf2678e2304c', NULL, 'advisor', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advisee`
--
ALTER TABLE `advisee`
  ADD PRIMARY KEY (`student_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `advises`
--
ALTER TABLE `advises`
  ADD PRIMARY KEY (`advisor_id`,`student_id`),
  ADD UNIQUE KEY `student_id_2` (`student_id`),
  ADD UNIQUE KEY `student_id_4` (`student_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `student_id_3` (`student_id`);

--
-- Indexes for table `advisor`
--
ALTER TABLE `advisor`
  ADD PRIMARY KEY (`advisor_id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `timeslots`
--
ALTER TABLE `timeslots`
  ADD PRIMARY KEY (`student_id`,`advisor_id`),
  ADD UNIQUE KEY `slot_id` (`slot_id`),
  ADD KEY `advisor_id` (`advisor_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advisee`
--
ALTER TABLE `advisee`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1000;
--
-- AUTO_INCREMENT for table `advisor`
--
ALTER TABLE `advisor`
  MODIFY `advisor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100004;
--
-- AUTO_INCREMENT for table `timeslots`
--
ALTER TABLE `timeslots`
  MODIFY `slot_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12371;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `advisor`
--
ALTER TABLE `advisor`
  ADD CONSTRAINT `advisor_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
