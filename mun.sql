-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2015 at 04:40 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mun`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_message`
--

CREATE TABLE IF NOT EXISTS `tbl_message` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `message_from` tinytext NOT NULL,
  `message_to` tinytext NOT NULL,
  `message` text NOT NULL,
  `verify` int(11) NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_message`
--

INSERT INTO `tbl_message` (`id`, `message_from`, `message_to`, `message`, `verify`, `time_stamp`) VALUES
(1, 'IP1', 'IP1', 'checlkk', 1, '2015-01-20 08:25:20'),
(2, 'IP1', 'Afghanistan', 'check', 1, '2015-01-20 14:55:32'),
(3, 'IP1', 'Afghanistan', 'test', 1, '2015-01-20 14:55:32'),
(4, 'IP1', 'IP1', 'check', 1, '2015-01-20 14:55:32'),
(5, 'IP1', 'Central African Republic', 'fsdfsff', 1, '2015-01-20 15:28:46');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_notification`
--

CREATE TABLE IF NOT EXISTS `tbl_notification` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `message` text NOT NULL,
  `message_from` int(11) NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_notification`
--

INSERT INTO `tbl_notification` (`id`, `message`, `message_from`, `time_stamp`) VALUES
(1, 'test', 0, '2015-01-20 15:17:25');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_name` tinytext NOT NULL,
  `name` tinytext NOT NULL,
  `institute` tinytext NOT NULL,
  `password` tinytext NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `user_name`, `name`, `institute`, `password`) VALUES
(1, 'IP1', 'IP Name', '', 'ip1');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
