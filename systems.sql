-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 21, 2024 at 09:15 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `registration`
--

-- --------------------------------------------------------

--
-- Table structure for table `systems`
--

DROP TABLE IF EXISTS `systems`;
CREATE TABLE IF NOT EXISTS `systems` (
  `sys_id` int(11) NOT NULL AUTO_INCREMENT,
  `sys_name` varchar(100) COLLATE utf8_bin NOT NULL,
  `sys_type` enum('Card','Core','Inner','Digital') COLLATE utf8_bin NOT NULL,
  `sys_cost` varchar(10) COLLATE utf8_bin NOT NULL,
  `sys_desc` varchar(1000) COLLATE utf8_bin NOT NULL,
  `sys_rel` varchar(500) COLLATE utf8_bin NOT NULL,
  `sys_dev` varchar(100) COLLATE utf8_bin NOT NULL,
  `sys_date` varchar(10) COLLATE utf8_bin NOT NULL,
  `sys_use` enum('Yes','No') COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`sys_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
