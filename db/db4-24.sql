-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2016 at 12:44 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.5.30

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_fullname` varchar(255) DEFAULT NULL,
  `user_type` varchar(255) DEFAULT NULL,
  `user_email` varchar(255) DEFAULT NULL,
  `CWID` int(8) NOT NULL,
  `user_phone` varchar(10) DEFAULT NULL,
  `advised_by` int(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_password`, `user_fullname`, `user_type`, `user_email`, `CWID`, `user_phone`, `advised_by`) VALUES
(1, 'Smitty', 'f382e5edf264775e13ce513384e4f152', 'Smitty', 'advisee', 'smitty@smitty.com', 12345678, NULL, 12341234),
(2, 'advisorA', 'f62c214dbc10935d391df7bba6725045', 'advisorA', 'advisor', 'advisorA@advisorA.com', 12341234, NULL, 0),
(3, 'jojo', '7510d498f23f5815d3376ea7bad64e29', 'Jojo', 'advisee', 'jojo@jojo.com', 89891234, NULL, 12341234),
(4, 'wanz', '41716cd920c769df1550df0fc7277ce7', 'Wanz', 'advisee', 'wanz@wanz.com', 12349876, NULL, 12341234);

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
