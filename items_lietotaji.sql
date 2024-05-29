-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: fdb34.awardspace.net
-- Generation Time: May 28, 2024 at 01:32 PM
-- Server version: 5.7.40-log
-- PHP Version: 8.1.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `3931237_norbertuhs`
--

-- --------------------------------------------------------

--
-- Table structure for table `items_lietotaji`
--

CREATE TABLE `items_lietotaji` (
  `id` int(11) NOT NULL,
  `username2` varchar(50) DEFAULT NULL,
  `password2` text,
  `email` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items_lietotaji`
--

INSERT INTO `items_lietotaji` (`id`, `username2`, `password2`, `email`) VALUES
(1, 'norberts', '$2y$10$TYA2Te4drep3GeGDFHFsmO40b9pIPdvGspnCO8Jof0JKOgncIC9wO', 'norberts@gmail.com'),
(2, 'testers', '$2y$10$bB1x/GGl.PI6nMmi4K08e.70V4ovfAf4x2FRHNG5Q7NatunlbnWHi', 'penis@sexmail.penis'),
(3, 'gabriela', '$2y$10$xv5jTlXE2JNNNSWQTgWpOuwOMCC/aE3HY6ZORvBG/0AKk6R3eOHfy', 'varbut.smily@gmail.com'),
(4, 'admin', '$2y$10$PR6iqAChTmD.w7BtwDqQieG.IZphbw1eZXyZmNNbfL0XeRkwRWhXG', 'admin@yahoo.com'),
(5, 'tastetest', '$2y$10$4F7Ba9bPprIpsUXmhKiZBuBM4Pw78zKHX9fD9JclDm5W3x9SJYnYW', 'tastetest@gmail.com'),
(6, 'username', '$2y$10$ippfTNKnoXTvW1utCDQFGe3KFRHqO7xPT5dPas7XP/62iC9l8Zivq', 'norberts@gmail.com'),
(7, 'aaaaa', '$2y$10$DlvcStH8W7NEYHgEPXo8Muu4n7TgOkLB48lwXMGTN5U6P2O7Jg2qO', 'aaa@aa.aa'),
(8, 'marks', '$2y$10$Nm0stwInQyuqPNQsEZACf.tG9CdUUNoNpCh8r4uCfmNZNJ0FDGx3u', 'epasts@epasts.lv'),
(9, 'toster', '$2y$10$Hv2IYS5vlukmyc/pSIu5JecUPy1VyZxFOATbhxG59pMU2BvdnGiCW', 'tostermaizitesfans@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `items_lietotaji`
--
ALTER TABLE `items_lietotaji`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items_lietotaji`
--
ALTER TABLE `items_lietotaji`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
