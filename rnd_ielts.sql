-- phpMyAdmin SQL Dump
-- version 4.4.13.1
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Jan 16, 2016 at 06:41 PM
-- Server version: 10.0.20-MariaDB
-- PHP Version: 5.6.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rnd_ielts`
--

-- --------------------------------------------------------

--
-- Table structure for table `rnd_curl_records`
--

CREATE TABLE IF NOT EXISTS `rnd_curl_records` (
  `id` int(11) NOT NULL,
  `curl_date` date NOT NULL,
  `curl_count` int(11) NOT NULL,
  `ietls_date` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rnd_curl_records`
--

INSERT INTO `rnd_curl_records` (`id`, `curl_date`, `curl_count`, `ietls_date`) VALUES
(1, '2016-01-15', 1, 'na');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rnd_curl_records`
--
ALTER TABLE `rnd_curl_records`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rnd_curl_records`
--
ALTER TABLE `rnd_curl_records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
