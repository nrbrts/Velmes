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
-- Table structure for table `items_contact`
--

CREATE TABLE `items_contact` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items_contact`
--

INSERT INTO `items_contact` (`id`, `name`, `email`, `message`) VALUES
(1, 'sew', 'varbut.smily@gmail.com', 'niger'),
(2, 'arnolds wiesulis', 'stabsgeorgs@gmail.com', 'kuilis'),
(3, 'sew', 'varbut.smily@gmail.com', 'ninin'),
(4, 'marks', 'epasts@epasts.lv', 'dzo baidens???? wtfff'),
(5, 'tostergeion', 'tostermaizitesfans@gmail.com', 'Tev što?i viss k?rt?b??');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `items_contact`
--
ALTER TABLE `items_contact`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items_contact`
--
ALTER TABLE `items_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
