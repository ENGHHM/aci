-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 25, 2017 at 01:47 AM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lang`
--

-- --------------------------------------------------------

--
-- Table structure for table `langs`
--

DROP TABLE IF EXISTS `langs`;
CREATE TABLE IF NOT EXISTS `langs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lang_name` varchar(55) COLLATE utf8_bin NOT NULL,
  `files_dir` varchar(50) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `langs`
--

INSERT INTO `langs` (`id`, `lang_name`, `files_dir`) VALUES
(1, 'Arabic', 'ar'),
(2, 'English', 'en');

-- --------------------------------------------------------

--
-- Table structure for table `lang_strs`
--

DROP TABLE IF EXISTS `lang_strs`;
CREATE TABLE IF NOT EXISTS `lang_strs` (
  `arabic` longtext COLLATE utf8_bin NOT NULL,
  `english` varchar(55) COLLATE utf8_bin NOT NULL,
  `french` longtext COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`english`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `lang_strs`
--

INSERT INTO `lang_strs` (`arabic`, `english`, `french`) VALUES
('الرئيسية', 'Home', '0');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
