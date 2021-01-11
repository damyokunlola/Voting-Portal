-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2021 at 11:48 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vote_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(250) DEFAULT NULL,
  `lastname` varchar(250) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `phonenumber` varchar(50) DEFAULT NULL,
  `pwd` varchar(250) DEFAULT NULL,
  `type` enum('voter','candidate') DEFAULT 'voter',
  `position` enum('None','Governorship','Presidency','Chairman','Senator') DEFAULT 'None'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `age`, `email`, `phonenumber`, `pwd`, `type`, `position`) VALUES
(1, 'Dami', 'okunlola', 4, 'ebukaodini@gmail.com', '08163085863', '$2y$08$NfxI1C0MNQVTjJKDUtzH/OhoHIssHEl2cMPCkDIYLYH0BUjOPYRmG', 'candidate', 'Presidency'),
(2, 'Dami', 'okunlola', 56, 'dini@gmail.com', '08163085863', '$2y$08$HVcFmQc3Vaqp3oaT4QRSxuxQejNI0DZukVkghyEb5q4XseAuDbiPO', 'candidate', 'Presidency'),
(3, 'Dami', 'okunlola', 34, 'eb@gmail.com', '08163085863', '$2y$08$jkIHh6TYvZyzu27sYBolKuRcmeNixLgucU1fvXuyWpTRCDs5N11pu', 'voter', 'None'),
(4, 'Dami', 'okunlola', 23, 'ini@gmail.com', '08163085863', '$2y$08$NhX4Rv0HTu8m9Kz5XuKWQechaOnn.YhugSRh76tw.FpYbG6FMQGJG', 'voter', 'None'),
(5, 'Dami', 'okunlola', 22, 'dami@gmail.com', '08163085863', '$2y$08$trH0FpnlCVmi4Q0GQkFzcu4ntb0f2XEfSB2Dil8mz4EAyZVAiuzEy', 'candidate', 'Governorship'),
(6, 'ade', 'ade', 23, 'ade@gmail.com', '08163085863', '$2y$08$ZtXAeWkvU/Lq5PSJI8u60.R6vK4GY3YwjrCg7/PurGz0ppeONSaWa', 'voter', 'None'),
(7, 'Williams', 'Daniel', 35, 'williams@gmail.com', '08163085863', '$2y$08$cTvXR8exWMTdbiieajW1mOP7DsuKZR6PIJt6FlXT7hgTIIw.BDHda', 'candidate', 'Governorship'),
(8, 'Glory', 'Glory', 19, 'glory@gmail.com', '08163085863', '$2y$08$W5FrTbnztIz44euqkpYL7eB0ge.K.xV7DMyHnzHSReGe.TCLBtcCe', 'candidate', 'Governorship'),
(9, 'ade', 'ade', 25, 'age@gmail.com', '08163085863', '$2y$08$zZVBqW04rhgj6NwoP6MYU.YIof91ljH8YBHE.q/Q5PVa6hsf2DNiW', 'candidate', 'Governorship'),
(10, 'kdk', 'kdk', 20, 'kdk@gmail.com', '08163085863', '$2y$08$Fy.g.rpfI/m2mI95DvfV0eAp09MN32DDKU4fyVvKpmSoULo9yNxjC', 'voter', 'None'),
(11, 'ayo', 'ayo', 21, 'ayo@gmail.com', '08163085863', '$2y$08$gotbYAa2LsIwGqGpZQ1dj.WoYTay4ttJcL4CER2hP9DsLDaLW3esS', 'voter', 'None');

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE `votes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `can_id` int(11) DEFAULT NULL,
  `election_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `votes`
--

INSERT INTO `votes` (`id`, `user_id`, `can_id`, `election_type`) VALUES
(1, 6, 1, 'Presidential'),
(2, 6, 7, 'Governorship'),
(3, 10, 1, 'Presidential'),
(4, 10, 7, 'Governorship');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `votes`
--
ALTER TABLE `votes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `can_id` (`can_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `votes`
--
ALTER TABLE `votes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `votes`
--
ALTER TABLE `votes`
  ADD CONSTRAINT `votes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `votes_ibfk_2` FOREIGN KEY (`can_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
