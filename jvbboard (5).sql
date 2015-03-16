-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2015 at 09:25 AM
-- Server version: 5.6.11
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `jvbboard`
--
CREATE DATABASE IF NOT EXISTS `jvbboard` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `jvbboard`;

-- --------------------------------------------------------

--
-- Table structure for table `daily_message_tbl`
--

CREATE TABLE IF NOT EXISTS `daily_message_tbl` (
  `daily_message_id` char(36) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` char(36) COLLATE utf8_unicode_ci NOT NULL,
  `message` text COLLATE utf8_unicode_ci,
  `type` tinyint(1) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  PRIMARY KEY (`daily_message_id`),
  KEY `fk_message_daily_users_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `daily_message_tbl`
--

INSERT INTO `daily_message_tbl` (`daily_message_id`, `user_id`, `message`, `type`, `create_time`, `update_time`) VALUES
('97468bd0-6bc3-11e4-b45f-40167e34a12f', '7eb969f0-6978-11e4-9803-0800200c9a66', '1. Hôm nay\n- Tung\n2. Ngày mai\n- edf\n3. Vấn đề\n- khônglp,lp,lp', 3, '2014-11-14 13:00:52', '2015-01-19 08:53:17'),
('9de1f855-6bc3-11e4-b45f-40167e34a12f', '1ba797bc-6b24-11e4-b7fc-40167e34a12f', '1. Hôm nay\n- abc\n2. Ngày mai\n- edf asdasd asd as \n3. Vấn đề\n- no', 3, '2014-11-14 13:01:04', '2014-11-21 14:54:02'),
('a36138f8-7160-11e4-a1ee-40167e347eff', '5d65eb70-6978-11e4-9803-0800200c9a66', 'Hello world !!!\n...\n...', 3, '2014-11-21 16:27:40', '2014-11-21 16:29:58'),
('abd9da51-7067-11e4-aa6a-40167e347eff', 'eb980f6a-6bcd-11e4-b45f-40167e34a12f', 'Hi all,\nHave a nice day !!!', 2, '2014-11-20 10:45:29', '2014-11-21 13:55:52'),
('b16520f6-7095-11e4-aa6a-40167e347eff', 'b7636b32-6977-11e4-8db0-40167e347eff', 'Thông báo nhân viên mới gia nhập công ty.\nNgày hôm nay, công ty nhiệt liệt chào mừng bạn Tim Cook gia nhập công ty.\n.\n.\n.\nChúc bạn gặt hái nhiều thành công !', 1, '2014-11-20 16:14:55', '2014-11-21 14:53:33'),
('e8c12f49-6bc9-11e4-b45f-40167e34a12f', '394c6f20-6978-11e4-9803-0800200c9a66', 'Banana Fighting !!', 2, '2014-11-14 13:46:06', '2014-11-21 14:52:35');

-- --------------------------------------------------------

--
-- Table structure for table `manage_holiday_tbl`
--

CREATE TABLE IF NOT EXISTS `manage_holiday_tbl` (
  `holiday_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(100) NOT NULL,
  `number_day` int(11) NOT NULL,
  `reason` text NOT NULL,
  `status` int(11) NOT NULL,
  `created` varchar(50) NOT NULL,
  PRIMARY KEY (`holiday_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `manage_holiday_tbl`
--

INSERT INTO `manage_holiday_tbl` (`holiday_id`, `user_id`, `number_day`, `reason`, `status`, `created`) VALUES
(8, 'b7636b32-6977-11e4-8db0-40167e347eff', 1, 'I had a nightmare last night and i''ve got terrible headache', 1, '2015-03-14'),
(9, 'b7636b32-6977-11e4-8db0-40167e347eff', 3, 'I can''t wait to go to downtown with you', 2, '2015-03-15'),
(10, '1ba797bc-6b24-11e4-b7fc-40167e34a12f', 3, 'i am sick', 2, '2015-03-13'),
(11, '1ba797bc-6b24-11e4-b7fc-40167e34a12f', 2, 'so prepare yourself to face difficulties and hard work', 1, '2015-03-15'),
(12, '1ba797bc-6b24-11e4-b7fc-40167e34a12f', 2, 'aaaaaaaa', 1, '2015-03-16'),
(13, 'b7636b32-6977-11e4-8db0-40167e347eff', 1, 'tttt', 0, '2015-03-17');

-- --------------------------------------------------------

--
-- Table structure for table `manage_time_tbl`
--

CREATE TABLE IF NOT EXISTS `manage_time_tbl` (
  `manage_time_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(100) NOT NULL,
  `username` varchar(200) NOT NULL,
  `start_time` varchar(200) NOT NULL,
  `end_time` varchar(200) NOT NULL,
  `total_time_of_day` varchar(200) NOT NULL,
  `late` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  `created` varchar(200) NOT NULL,
  PRIMARY KEY (`manage_time_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=113 ;

--
-- Dumping data for table `manage_time_tbl`
--

INSERT INTO `manage_time_tbl` (`manage_time_id`, `user_id`, `username`, `start_time`, `end_time`, `total_time_of_day`, `late`, `status`, `created`) VALUES
(103, 'b7636b32-6977-11e4-8db0-40167e347eff', 'admin', '07:39:43', '13:40:54', '06:01:11', 0, 1, '2015-03-12'),
(104, 'b7636b32-6977-11e4-8db0-40167e347eff', 'admin', '09:10:28', '14:10:33', '05:00:05', 1, 1, '2015-02-11'),
(105, 'b7636b32-6977-11e4-8db0-40167e347eff', 'admin', '14:13:43', '14:15:08', '00:01:25', 1, 1, '2015-03-10'),
(106, 'b7636b32-6977-11e4-8db0-40167e347eff', 'admin', '14:15:35', '14:17:21', '00:01:46', 0, 1, '2015-03-09'),
(107, 'b7636b32-6977-11e4-8db0-40167e347eff', 'admin', '14:17:52', '14:19:26', '00:01:34', 0, 1, '2015-03-08'),
(111, '1ba797bc-6b24-11e4-b7fc-40167e34a12f', 'hmlinh512', '08:30:00', '17:00:00', '08:30:00', 1, 1, '2015-02-01'),
(112, '1ba797bc-6b24-11e4-b7fc-40167e34a12f', 'hmlinh512', '15:59:10', '15:59:20', '00:00:10', 1, 1, '2015-03-13');

-- --------------------------------------------------------

--
-- Table structure for table `member_project_tbl`
--

CREATE TABLE IF NOT EXISTS `member_project_tbl` (
  `member_project_id` char(36) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` char(36) COLLATE utf8_unicode_ci NOT NULL,
  `project_id` char(36) COLLATE utf8_unicode_ci NOT NULL,
  `create_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  PRIMARY KEY (`member_project_id`),
  KEY `fk_member_project_users1_idx` (`user_id`),
  KEY `fk_member_project_projects1_idx` (`project_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `member_project_tbl`
--

INSERT INTO `member_project_tbl` (`member_project_id`, `user_id`, `project_id`, `create_time`, `update_time`) VALUES
('54ed51e0-6564-4951-b5a7-0898ebea388e', '394c6f20-6978-11e4-9803-0800200c9a66', '54dd7437-b9d4-4068-adf8-08e0ebea388e', '2015-02-26 05:36:28', NULL),
('54f7c23b-8fb4-4d44-87cb-0730ebea388e', '7eb969f0-6978-11e4-9803-0800200c9a66', '54f7c228-0d80-481b-9204-0730ebea388e', NULL, NULL),
('54f9260a-b5b0-48eb-bfb9-1eb8ebea388e', '1ba797bc-6b24-11e4-b7fc-40167e34a12f', '54ae4461-1728-4ff2-a6dc-099cebea388e', NULL, NULL),
('54f927aa-aa4c-4e63-8a45-1eb8ebea388e', '394c6f20-6978-11e4-9803-0800200c9a66', '54ae4461-1728-4ff2-a6dc-099cebea388e', NULL, NULL),
('54f92dcb-67d4-4268-a7d7-1eb8ebea388e', '1ba797bc-6b24-11e4-b7fc-40167e34a12f', '54ae4461-1728-4ff2-a6dc-099cebea388e', NULL, NULL),
('fec52a0f-97d3-11e4-84c1-54271e5ea8ac', '5d65eb70-6978-11e4-9803-0800200c9a66', '54ae4f34-bd14-4b0e-a3fe-099cebea388e', '2015-01-14 00:00:00', '2015-01-21 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `message_tbl`
--

CREATE TABLE IF NOT EXISTS `message_tbl` (
  `message_id` char(36) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` char(36) COLLATE utf8_unicode_ci NOT NULL,
  `message` text COLLATE utf8_unicode_ci,
  `type` tinyint(1) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  PRIMARY KEY (`message_id`),
  KEY `fk_messages_users1_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `message_tbl`
--

INSERT INTO `message_tbl` (`message_id`, `user_id`, `message`, `type`, `create_time`, `update_time`) VALUES
('c3c9bbc9-6a42-11e4-9666-40167e347eff', '7eb969f0-6978-11e4-9803-0800200c9a66', 'mem 1 hi mem 2', 3, '2014-11-13 00:00:00', '2014-11-13 00:00:00'),
('c5eaa653-711e-11e4-a1ee-40167e347eff', 'b7636b32-6977-11e4-8db0-40167e347eff', 'Thông báo nhân viên mới gia nhập công ty.\r\nNgày hôm nay, công ty nhiệt liệt chào mừng bạn Steve Ballmer gia nhập công ty.\r\n.\r\n.\r\n.\r\nChúc bạn gặt hái nhiều thành công !', 1, '2014-11-20 00:00:00', '2014-11-20 00:00:00'),
('d2b418d7-711e-11e4-a1ee-40167e347eff', 'b7636b32-6977-11e4-8db0-40167e347eff', 'Thông báo nhân viên mới gia nhập công ty.\r\nNgày hôm nay, công ty nhiệt liệt chào mừng bạn Eric Schmidt gia nhập công ty.\r\n.\r\n.\r\n.\r\nChúc bạn gặt hái nhiều thành công !', 1, '2014-11-19 00:00:00', '2014-11-19 00:00:00'),
('ded5edc4-6978-11e4-8db0-40167e347eff', '7eb969f0-6978-11e4-9803-0800200c9a66', 'hi mem 1', 3, '2014-11-13 00:00:00', '2014-11-13 00:00:00'),
('f23efa9d-6978-11e4-8db0-40167e347eff', '5d65eb70-6978-11e4-9803-0800200c9a66', 'hi mem 2', 3, '2014-11-13 05:00:00', '2014-11-14 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `project_tbl`
--

CREATE TABLE IF NOT EXISTS `project_tbl` (
  `project_id` char(36) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(55) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `status` tinyint(2) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  PRIMARY KEY (`project_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `project_tbl`
--

INSERT INTO `project_tbl` (`project_id`, `name`, `description`, `start_date`, `end_date`, `status`, `create_time`, `update_time`) VALUES
('54ae4461-1728-4ff2-a6dc-099cebea388e', '12bc', 'bbbbbbbbbbbbbbb', '2015-01-08 09:48:00', '2015-01-08 09:48:00', 1, '2015-01-08 09:48:00', '2015-01-08 09:48:00'),
('54ae4f34-bd14-4b0e-a3fe-099cebea388e', 'Animol..!! bfjj', 'Tuuuuu...! speedy..!  abc', '2015-01-08 10:34:00', '2015-01-08 10:34:00', 1, '2015-01-08 10:34:00', '2015-01-08 10:34:00'),
('54dd7437-b9d4-4068-adf8-08e0ebea388e', 'thu thuy 3', 'bjdfgjdfgjk', NULL, NULL, 1, NULL, NULL),
('54dd749b-17ec-4a71-b879-08e0ebea388e', '123ndjkk', 'bjjj', NULL, NULL, 2, NULL, NULL),
('54ed2c78-49dc-43da-abd4-0898ebea388e', '456abc', 'aaaaaaaaaaaaaaaaaaaaa', NULL, NULL, 1, NULL, NULL),
('54eff551-abc0-4fee-aa91-1720ebea388e', 'bgnbmkn,', 'tuyui', NULL, NULL, NULL, NULL, NULL),
('54f7c228-0d80-481b-9204-0730ebea388e', 'Peco', 'hamhamham!!!!!!', NULL, NULL, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_mst`
--

CREATE TABLE IF NOT EXISTS `role_mst` (
  `role_id` char(36) COLLATE utf8_unicode_ci NOT NULL,
  `value` varchar(55) COLLATE utf8_unicode_ci DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `role_mst`
--

INSERT INTO `role_mst` (`role_id`, `value`, `create_time`, `update_time`) VALUES
('3070f8cc-6976-11e4-8db0-40167e347eff', 'ADMINISTRATORS', '2014-11-11 07:00:00', '2014-11-11 07:00:00'),
('98417eef-7053-11e4-b1cb-40167e34a12f', 'LEADERS', '2014-11-20 00:00:00', '2014-11-20 00:00:00'),
('b04ed010-6976-11e4-9803-0800200c9a66', 'MANAGERS', '2014-11-11 07:00:00', '2014-11-11 07:00:00'),
('bb165d60-6976-11e4-9803-0800200c9a66', 'MEMBERS', '2014-11-11 07:00:00', '2014-11-11 07:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `team_project_tbl`
--

CREATE TABLE IF NOT EXISTS `team_project_tbl` (
  `team_project_id` char(36) COLLATE utf8_unicode_ci NOT NULL,
  `team_id` char(36) COLLATE utf8_unicode_ci NOT NULL,
  `project_id` char(36) COLLATE utf8_unicode_ci NOT NULL,
  `create_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  PRIMARY KEY (`team_project_id`),
  KEY `fk_team_project_teams1_idx` (`team_id`),
  KEY `fk_team_project_projects1_idx` (`project_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `team_tbl`
--

CREATE TABLE IF NOT EXISTS `team_tbl` (
  `team_id` char(36) COLLATE utf8_unicode_ci NOT NULL,
  `leader` char(36) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(55) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slogan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  PRIMARY KEY (`team_id`),
  KEY `fk_team_tbl_user_tbl1_idx` (`leader`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `team_tbl`
--

INSERT INTO `team_tbl` (`team_id`, `leader`, `name`, `slogan`, `create_time`, `update_time`) VALUES
('25f3de0d-6978-11e4-8db0-40167e347eff', '5d65eb70-6978-11e4-9803-0800200c9a66', 'Banana', 'Banana Banana Banana !!!', '2014-11-11 00:00:00', '2014-11-11 00:00:00'),
('54ae01a4-ffc8-4644-a3bd-099cebea388e', '', 'MIT', 'MIT MIT MIT..!', NULL, NULL),
('54ae6a25-a4cc-47a2-884c-099cebea388e', '', 'Banana2', 'Banana2 Banana2 Banana2', NULL, NULL),
('54ae6b34-30e0-4482-9e7b-099cebea388e', '', 'Voka', 'Voka Voka Voka..!', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_tbl`
--

CREATE TABLE IF NOT EXISTS `user_tbl` (
  `user_id` char(36) COLLATE utf8_unicode_ci NOT NULL,
  `team_id` char(36) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` char(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` char(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email_add` varchar(55) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fullname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nickname` varchar(55) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slogan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role_id` char(36) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  `project_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  KEY `fk_users_tbl_role_mst1_idx` (`role_id`),
  KEY `fk_user_tbl_team_tbl2_idx` (`team_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_tbl`
--

INSERT INTO `user_tbl` (`user_id`, `team_id`, `username`, `password`, `email_add`, `fullname`, `nickname`, `slogan`, `role_id`, `status`, `create_time`, `update_time`, `project_id`) VALUES
('1ba797bc-6b24-11e4-b7fc-40167e34a12f', '25f3de0d-6978-11e4-8db0-40167e347eff', 'hmlinh512', '8540df00bc3caf9acb981f82084f5b7f79460735', 'sad@123', 'Hà Mạnh Linh', NULL, NULL, 'bb165d60-6976-11e4-9803-0800200c9a66', 1, '2014-11-13 00:00:00', '2014-11-13 00:00:00', '54ae4461-1728-4ff2-a6dc-099cebea388e|54ae4f34-bd14-4b0e-a3fe-099cebea388e'),
('394c6f20-6978-11e4-9803-0800200c9a66', NULL, 'anhhai', '8540df00bc3caf9acb981f82084f5b7f79460735', 'manage@jvb.com', 'Vũ An Hải', 'manage', 'manage slogan', 'b04ed010-6976-11e4-9803-0800200c9a66', 1, '2014-11-11 00:00:00', '2014-11-11 00:00:00', ''),
('54ae1080-d700-42ea-86dc-099cebea388e', '54ae01a4-ffc8-4644-a3bd-099cebea388e', 'iiiiiiiiiiiiii', 'b2954a22a53f839484cc0d9883af983341af0f01', '1123@gmail.com', '', '', 'Mit go head..!', '98417eef-7053-11e4-b1cb-40167e34a12f', 0, NULL, NULL, '54ae4f34-bd14-4b0e-a3fe-099cebea388e'),
('54af9911-7448-48cd-acbc-0250ebea388e', '54ae01a4-ffc8-4644-a3bd-099cebea388e', 'dddddddddddddd', 'fd30e404d565456db2b95634ac35635f2510a81b', 'dsasas@gmail.com', '', '', 'sssd', '98417eef-7053-11e4-b1cb-40167e34a12f', 0, NULL, NULL, '54ae4f34-bd14-4b0e-a3fe-099cebea388e'),
('54d82158-83e8-4791-a87d-08c4ebea388e', '25f3de0d-6978-11e4-8db0-40167e347eff', 'thuythuy', '58f957852558e8688bd77a320bd5dcfe1304c2ed', 'thuythu@gmail.com', 'le thuy thu', 'thuy thu', '@@@$$$$%%%%jdbfjbgj', '3070f8cc-6976-11e4-8db0-40167e347eff', NULL, NULL, NULL, NULL),
('54d821bd-b8cc-41f2-9c41-08c4ebea388e', '54ae01a4-ffc8-4644-a3bd-099cebea388e', 'quynh anh', '58f957852558e8688bd77a320bd5dcfe1304c2ed', 'thuythuy@gmail.com', 'le ngoc quynh anh', 'quynh anh', 'be len 1', '98417eef-7053-11e4-b1cb-40167e34a12f', NULL, NULL, NULL, NULL),
('54d83703-ff90-4e54-9532-08c4ebea388e', '25f3de0d-6978-11e4-8db0-40167e347eff', 'pham thu thu', 'baf1ea0e1be812eec913e1936b9ab46e83cfdcd6', 'pthuy@gmail.com', 'pham thu thuy', 'keo dang', 'yeah yeah yeash', '3070f8cc-6976-11e4-8db0-40167e347eff', NULL, NULL, NULL, NULL),
('5d65eb70-6978-11e4-9803-0800200c9a66', '25f3de0d-6978-11e4-8db0-40167e347eff', 'linhanh', '8540df00bc3caf9acb981f82084f5b7f79460735', 'mem1@jvb.com', 'Nguyễn Duy Linh', 'member 1', 'member 1 slogan', '98417eef-7053-11e4-b1cb-40167e34a12f', 1, '2014-11-11 00:00:00', '2014-11-11 00:00:00', ''),
('7eb969f0-6978-11e4-9803-0800200c9a66', '25f3de0d-6978-11e4-8db0-40167e347eff', 'tung', '8540df00bc3caf9acb981f82084f5b7f79460735', 'mem2@jvb.com', 'Đỗ Thanh Tùng', 'member 2', 'member 2 slogan', 'bb165d60-6976-11e4-9803-0800200c9a66', 1, '2014-11-11 00:00:00', '2014-11-11 00:00:00', '54ae4f34-bd14-4b0e-a3fe-099cebea388e'),
('b7636b32-6977-11e4-8db0-40167e347eff', NULL, 'admin', '8540df00bc3caf9acb981f82084f5b7f79460735', 'admin@jvb.com', 'Administrator', 'admin', 'admin slogan', '3070f8cc-6976-11e4-8db0-40167e347eff', 1, '2014-11-11 00:00:00', '2014-11-11 00:00:00', ''),
('eb980f6a-6bcd-11e4-b45f-40167e34a12f', NULL, 'anhquy', '8540df00bc3caf9acb981f82084f5b7f79460735', 'manage@jvb.com', 'Chu Văn Quý', 'chuquy', NULL, 'b04ed010-6976-11e4-9803-0800200c9a66', 1, '2014-11-14 00:00:16', '2014-11-14 00:00:35', '');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `daily_message_tbl`
--
ALTER TABLE `daily_message_tbl`
  ADD CONSTRAINT `fk_message_daily_users` FOREIGN KEY (`user_id`) REFERENCES `user_tbl` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `member_project_tbl`
--
ALTER TABLE `member_project_tbl`
  ADD CONSTRAINT `fk_member_project_users1` FOREIGN KEY (`user_id`) REFERENCES `user_tbl` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `message_tbl`
--
ALTER TABLE `message_tbl`
  ADD CONSTRAINT `fk_messages_users1` FOREIGN KEY (`user_id`) REFERENCES `user_tbl` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `team_project_tbl`
--
ALTER TABLE `team_project_tbl`
  ADD CONSTRAINT `fk_team_project_projects1` FOREIGN KEY (`project_id`) REFERENCES `project_tbl` (`project_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_team_project_teams1` FOREIGN KEY (`team_id`) REFERENCES `team_tbl` (`team_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
