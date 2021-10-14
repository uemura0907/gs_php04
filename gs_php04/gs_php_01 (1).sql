-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 14, 2021 at 12:21 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gs_php_db01`
--

-- --------------------------------------------------------

--
-- Table structure for table `gs_php_01`
--

CREATE TABLE `gs_php_01` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `url` text NOT NULL,
  `comment` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gs_php_01`
--

INSERT INTO `gs_php_01` (`id`, `name`, `url`, `comment`, `date`) VALUES
(1, 'テスト', 'test@test.com', 'hello world', '2021-09-29 22:19:16'),
(2, 'test', 'test.com', 'test', '2021-09-29 22:19:37'),
(3, 'aaa', 'iii', 'hello world', '2021-09-29 22:40:34'),
(4, 'テスト', 'https://www.youtube.com/watch?v=ZdKuXxdMHjs', 'a', '2021-10-06 22:55:26'),
(5, 'テスト', 'https://www.youtube.com/watch?v=ZdKuXxdMHjs', 'a', '2021-10-06 22:55:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gs_php_01`
--
ALTER TABLE `gs_php_01`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gs_php_01`
--
ALTER TABLE `gs_php_01`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
