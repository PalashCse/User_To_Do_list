-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2016 at 02:34 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `to_do_lists`
--

CREATE TABLE `to_do_lists` (
  `task_id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `task_title` varchar(100) NOT NULL,
  `task_description` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `task_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `to_do_lists`
--

INSERT INTO `to_do_lists` (`task_id`, `user_id`, `task_title`, `task_description`, `date`, `task_status`) VALUES
(7, 39, 'Return Home', 'Return home after completing the task of college', '2016/05/25 13:00', 'Completed'),
(8, 39, 'College', 'College', '2016/05/21 10:00', 'New'),
(9, 39, 'Study', 'Study on Serveying-3', '2016/05/19 15:50', 'New'),
(10, 37, 'Writing Codes', 'Write down the code from W3 Schools.', '2016/05/20 20:00', 'New'),
(11, 37, 'Exercise', 'Physical Exercise', '2016/05/21 07:00', 'Completed'),
(12, 37, 'Tutionee', 'Tutionee at Bayra', '2016/05/21 10:00', 'Completed'),
(14, 37, 'Breakfast', 'Breakfast at outside Hotel', '2016/05/21 08:00', 'In Progress');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(100) NOT NULL,
  `user_fname` varchar(100) NOT NULL,
  `user_lname` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_session` varchar(100) NOT NULL,
  `user_roll` int(100) NOT NULL,
  `user_subject` varchar(100) NOT NULL,
  `user_pwd` varchar(100) NOT NULL,
  `user_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_fname`, `user_lname`, `user_email`, `user_session`, `user_roll`, `user_subject`, `user_pwd`, `user_type`) VALUES
(37, 'palash', 'sarkar', 'palash.ku11@gmail.com', '2011-2012', 110243, 'ECE', 'PalashKu110243', 'user'),
(38, 'Litan', 'Das', 'cseku.palash2011@gmail.com', '2014-2015', 140923, 'ECE', 'PalashKu110243', 'admin'),
(40, 'Gautam', 'Gamvir', 'partho.Ku14@gmail.com', '2011-2012', 110233, 'ECE', 'ParthoKU140923', 'user'),
(41, 'Salam', 'Gazi', 'salamgazi@gmail.com', '2010-2011', 100245, 'English', 'SalamGazi2010', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `to_do_lists`
--
ALTER TABLE `to_do_lists`
  ADD PRIMARY KEY (`task_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `to_do_lists`
--
ALTER TABLE `to_do_lists`
  MODIFY `task_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
