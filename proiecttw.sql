-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2019 at 08:32 PM
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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

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
(11, 'asdadasda', 2, 0, 0, '2019-10-15 22:43:17', 0);

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
  `fname` varchar(125) NOT NULL,
  `lname` varchar(125) NOT NULL,
  `password` varchar(255) NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '0',
  `dateCreated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `fname`, `lname`, `password`, `active`, `dateCreated`) VALUES
(2, 'itsdenispavlovic', 'Denis', 'Pavlovic', '$2y$10$f99ycVxFhgiYabJGJRM3BuAoquvbc81zF0q1GZaud7gH9OOUK24mG', 0, '2019-10-09 23:00:53'),
(3, 'adimiculescu', 'Adrian', 'Miculescu', '$2y$10$20TmVc80Nl9LpVDXIQFNIeokXf64kfrh3VDIF11VyYIhKK7oAkKBS', 0, '2019-10-09 23:37:07');

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `profilepic`
--
ALTER TABLE `profilepic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
