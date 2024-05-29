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
-- Table structure for table `items2`
--

CREATE TABLE `items2` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  `price` decimal(10,2) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items2`
--

INSERT INTO `items2` (`id`, `name`, `description`, `price`, `link`, `user_id`, `photo`) VALUES
(7, 'D?gs Zadrots', 'kuilis', 2.50, 'https://www.youtube.com/channel/UCKHjwbBcE3s4YKUPH-5EEFA', 3, 'soon.jpg'),
(9, 'peteris zobens', 'ubludak', 99999999.99, 'https://www.tiktok.com/@fitnesaizaicinajums', 3, 'soon.jpg'),
(4, 'zimpis', 'terstd', 222222.00, 'amazon.penis', 2, 'soon.jpg'),
(31, 'SFDASDASD', 'ASD', 1111.00, 'delfi.lv', 5, 'soon.jpg'),
(39, 'asdasd', '123', 123.00, 'https://translate.google.lv/?hl=lv&amp;sl=en&amp;tl=lv&amp;text=Wish&amp;op=translate', 1, 'uploads/66548b390d363_bobislieslma.png'),
(34, 'daudz viiriesi', 'tas ir bijis mans sapnis jau no bernibas', 500.00, 'draugiem.lv', 7, 'soon.jpg'),
(44, 'Norberts', '123', 123.00, 'https://translate.google.lv/?hl=lv&amp;sl=en&amp;tl=lv&amp;text=Wish&amp;op=translate', 1, 'uploads/6654942fbc1a2_norbis.png'),
(46, 'labaks kompjuteris', 'kompis ar 4090ti ))))', 1500.00, 'youtube.com', 8, 'uploads/6654befc82215_IMG_3633.png'),
(47, 'dzo baidens', 'xdxdxdxdxd???xd..xd.dddd..!', 99999999.99, 'http://norbertuhs.atwebpages.com/Velmes/insert.php', 8, 'uploads/6654bf6eeac6a_e93e39b1c6da3636b13872a6a11f5f5a.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `items2`
--
ALTER TABLE `items2`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items2`
--
ALTER TABLE `items2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
