-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2019 at 04:40 PM
-- Server version: 5.6.37
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proiecttw`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL,
  `postContent` text NOT NULL,
  `uid` int(11) NOT NULL,
  `likes` int(11) NOT NULL DEFAULT '0',
  `dislikes` int(11) NOT NULL DEFAULT '0',
  `dateCreated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `hidden` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `postContent`, `uid`, `likes`, `dislikes`, `dateCreated`, `hidden`) VALUES
(1, 'adasd', 2, 0, 0, '2019-10-15 15:26:44', 1),
(2, 'Hey, ma numesc Denis si o sa devin un milionar cat de curand =))))', 2, 0, 0, '2019-10-15 17:20:23', 1),
(3, 'oidasjdaosjda', 2, 0, 0, '2019-10-15 17:21:29', 1),
(4, 'asidaidasdia', 2, 0, 0, '2019-10-15 17:23:14', 1),
(5, 'asdasda', 2, 0, 0, '2019-10-15 17:26:09', 1),
(6, 'sadasdasd', 2, 0, 0, '2019-10-15 17:26:40', 1),
(7, '3edgjeh3djdg3', 2, 0, 0, '2019-10-15 17:41:40', 1),
(8, 'asdasdasd', 2, 0, 0, '2019-10-15 17:47:11', 1),
(9, 'dasasdasd', 2, 0, 0, '2019-10-15 17:47:15', 1),
(10, 'fadfadf', 2, 0, 0, '2019-10-15 17:47:18', 1),
(11, 'asdadasda', 2, 0, 0, '2019-10-15 22:43:17', 1),
(12, 'asjdhasoudahs', 2, 0, 0, '2019-10-17 10:28:16', 1),
(13, 'dsadasda', 2, 0, 0, '2019-10-17 15:05:29', 1),
(14, 'dsouadhaudaosdjai', 2, 0, 0, '2019-10-17 17:47:02', 1),
(15, 'Hey eu sunt frumoasa si inteligenta <3', 4, 0, 0, '2019-10-22 23:22:29', 0),
(16, 'si foarte sexy ', 4, 0, 0, '2019-10-22 23:22:45', 0),
(17, 'ajdoiasjdaoij', 2, 0, 0, '2019-10-29 15:46:58', 1),
(18, 'dadasds', 2, 0, 0, '2019-11-12 18:08:41', 1),
(19, 'This is my post! :)', 2, 0, 0, '2019-12-10 14:42:59', 1),
(20, 'dasiodajsdoaj', 2, 0, 0, '2019-12-10 14:43:42', 0),
(21, 'hvgyvyvyvfytt', 7, 0, 0, '2019-12-10 16:48:02', 0),
(22, 'aiuhaiudh', 11, 0, 0, '2019-12-10 18:04:20', 1),
(23, 'adfhiudhfids', 11, 0, 0, '2019-12-10 18:04:28', 0);

-- --------------------------------------------------------

--
-- Table structure for table `profilepic`
--

CREATE TABLE IF NOT EXISTS `profilepic` (
  `id` int(11) NOT NULL,
  `avatar` text NOT NULL,
  `uid` int(11) NOT NULL,
  `dateChanged` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profilepic`
--

INSERT INTO `profilepic` (`id`, `avatar`, `uid`, `dateChanged`) VALUES
(1, '2/profilePic/111.jpeg', 2, '2019-10-15 23:31:09');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `username` varchar(125) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `fname` varchar(125) NOT NULL,
  `lname` varchar(125) NOT NULL,
  `gender` tinyint(4) NOT NULL,
  `ovt` text,
  `password` varchar(255) NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '0',
  `dateCreated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `fname`, `lname`, `gender`, `ovt`, `password`, `active`, `dateCreated`) VALUES
(11, 'itsdenispavlovic', 'pavlovicdenis@icloud.com', 'Denis', 'Pavlovic', 0, 'cn2z470q6am6kqsg', '$2y$10$Rr2wYFWBNftcS2eaQsDCe.9hc5SXcSqX3iCRcvAIJaq0M/pAQtkxO', 1, '2019-12-10 18:03:13');

-- --------------------------------------------------------

--
-- Table structure for table `user_settings`
--

CREATE TABLE IF NOT EXISTS `user_settings` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `avatar` text NOT NULL,
  `lastTimeChanged` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_settings`
--

INSERT INTO `user_settings` (`id`, `uid`, `avatar`, `lastTimeChanged`) VALUES
(7, 10, 'users//uid10//avatar//jenny-caywood-T5QccwsMRtk-unsplash.jpg', '2019-12-10 18:00:48'),
(8, 11, 'users//uid11//avatar//jenny-caywood-T5QccwsMRtk-unsplash.jpg', '2019-12-10 18:04:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profilepic`
--
ALTER TABLE `profilepic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_settings`
--
ALTER TABLE `user_settings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `profilepic`
--
ALTER TABLE `profilepic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `user_settings`
--
ALTER TABLE `user_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
