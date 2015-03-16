-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2014 at 11:22 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `jvbboard`
--

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
  `update_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `daily_message_tbl`
--

INSERT INTO `daily_message_tbl` (`daily_message_id`, `user_id`, `message`, `type`, `create_time`, `update_time`) VALUES
('97468bd0-6bc3-11e4-b45f-40167e34a12f', '7eb969f0-6978-11e4-9803-0800200c9a66', '1. Hôm nay\n- Tung\n2. Ngày mai\n- edf\n3. Vấn đề\n- không', 3, '2014-11-14 13:00:52', '2014-11-21 14:52:51'),
('9de1f855-6bc3-11e4-b45f-40167e34a12f', '1ba797bc-6b24-11e4-b7fc-40167e34a12f', '1. Hôm nay\n- abc\n2. Ngày mai\n- edf asdasd asd as \n3. Vấn đề\n- no', 3, '2014-11-14 13:01:04', '2014-11-21 14:54:02'),
('a36138f8-7160-11e4-a1ee-40167e347eff', '5d65eb70-6978-11e4-9803-0800200c9a66', 'Hello world !!!\n...\n...', 3, '2014-11-21 16:27:40', '2014-11-21 16:29:58'),
('abd9da51-7067-11e4-aa6a-40167e347eff', 'eb980f6a-6bcd-11e4-b45f-40167e34a12f', 'Hi all,\nHave a nice day !!!', 2, '2014-11-20 10:45:29', '2014-11-21 13:55:52'),
('b16520f6-7095-11e4-aa6a-40167e347eff', 'b7636b32-6977-11e4-8db0-40167e347eff', 'Thông báo nhân viên mới gia nhập công ty.\nNgày hôm nay, công ty nhiệt liệt chào mừng bạn Tim Cook gia nhập công ty.\n.\n.\n.\nChúc bạn gặt hái nhiều thành công !', 1, '2014-11-20 16:14:55', '2014-11-21 14:53:33'),
('e8c12f49-6bc9-11e4-b45f-40167e34a12f', '394c6f20-6978-11e4-9803-0800200c9a66', 'Banana Fighting !!', 2, '2014-11-14 13:46:06', '2014-11-21 14:52:35');

-- --------------------------------------------------------

--
-- Table structure for table `member_project_tbl`
--

CREATE TABLE IF NOT EXISTS `member_project_tbl` (
  `member_project_id` char(36) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` char(36) COLLATE utf8_unicode_ci NOT NULL,
  `project_id` char(36) COLLATE utf8_unicode_ci NOT NULL,
  `create_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
  `update_time` datetime DEFAULT NULL
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
  `update_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role_mst`
--

CREATE TABLE IF NOT EXISTS `role_mst` (
  `role_id` char(36) COLLATE utf8_unicode_ci NOT NULL,
  `value` varchar(55) COLLATE utf8_unicode_ci DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL
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
  `update_time` datetime DEFAULT NULL
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
  `update_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `team_tbl`
--

INSERT INTO `team_tbl` (`team_id`, `leader`, `name`, `slogan`, `create_time`, `update_time`) VALUES
('25f3de0d-6978-11e4-8db0-40167e347eff', '5d65eb70-6978-11e4-9803-0800200c9a66', 'Banana', 'Banana Banana Banana !!!', '2014-11-11 00:00:00', '2014-11-11 00:00:00');

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
  `update_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_tbl`
--

INSERT INTO `user_tbl` (`user_id`, `team_id`, `username`, `password`, `email_add`, `fullname`, `nickname`, `slogan`, `role_id`, `status`, `create_time`, `update_time`) VALUES
('1ba797bc-6b24-11e4-b7fc-40167e34a12f', '25f3de0d-6978-11e4-8db0-40167e347eff', 'hmlinh512', '8540df00bc3caf9acb981f82084f5b7f79460735', 'sad@123', 'Hà Mạnh Linh', NULL, NULL, 'bb165d60-6976-11e4-9803-0800200c9a66', 1, '2014-11-13 00:00:00', '2014-11-13 00:00:00'),
('394c6f20-6978-11e4-9803-0800200c9a66', NULL, 'anhhai', '8540df00bc3caf9acb981f82084f5b7f79460735', 'manage@jvb.com', 'Vũ An Hải', 'manage', 'manage slogan', 'b04ed010-6976-11e4-9803-0800200c9a66', 1, '2014-11-11 00:00:00', '2014-11-11 00:00:00'),
('5d65eb70-6978-11e4-9803-0800200c9a66', '25f3de0d-6978-11e4-8db0-40167e347eff', 'linhanh', '8540df00bc3caf9acb981f82084f5b7f79460735', 'mem1@jvb.com', 'Nguyễn Duy Linh', 'member 1', 'member 1 slogan', '98417eef-7053-11e4-b1cb-40167e34a12f', 1, '2014-11-11 00:00:00', '2014-11-11 00:00:00'),
('7eb969f0-6978-11e4-9803-0800200c9a66', '25f3de0d-6978-11e4-8db0-40167e347eff', 'tung', '8540df00bc3caf9acb981f82084f5b7f79460735', 'mem2@jvb.com', 'Đỗ Thanh Tùng', 'member 2', 'member 2 slogan', 'bb165d60-6976-11e4-9803-0800200c9a66', 1, '2014-11-11 00:00:00', '2014-11-11 00:00:00'),
('b7636b32-6977-11e4-8db0-40167e347eff', NULL, 'admin', '8540df00bc3caf9acb981f82084f5b7f79460735', 'admin@jvb.com', 'Administrator', 'admin', 'admin slogan', '3070f8cc-6976-11e4-8db0-40167e347eff', 1, '2014-11-11 00:00:00', '2014-11-11 00:00:00'),
('eb980f6a-6bcd-11e4-b45f-40167e34a12f', NULL, 'anhquy', '8540df00bc3caf9acb981f82084f5b7f79460735', 'manage@jvb.com', 'Chu Văn Quý', 'chuquy', NULL, 'b04ed010-6976-11e4-9803-0800200c9a66', 1, '2014-11-14 00:00:16', '2014-11-14 00:00:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `daily_message_tbl`
--
ALTER TABLE `daily_message_tbl`
 ADD PRIMARY KEY (`daily_message_id`), ADD KEY `fk_message_daily_users_idx` (`user_id`);

--
-- Indexes for table `member_project_tbl`
--
ALTER TABLE `member_project_tbl`
 ADD PRIMARY KEY (`member_project_id`), ADD KEY `fk_member_project_users1_idx` (`user_id`), ADD KEY `fk_member_project_projects1_idx` (`project_id`);

--
-- Indexes for table `message_tbl`
--
ALTER TABLE `message_tbl`
 ADD PRIMARY KEY (`message_id`), ADD KEY `fk_messages_users1_idx` (`user_id`);

--
-- Indexes for table `project_tbl`
--
ALTER TABLE `project_tbl`
 ADD PRIMARY KEY (`project_id`);

--
-- Indexes for table `role_mst`
--
ALTER TABLE `role_mst`
 ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `team_project_tbl`
--
ALTER TABLE `team_project_tbl`
 ADD PRIMARY KEY (`team_project_id`), ADD KEY `fk_team_project_teams1_idx` (`team_id`), ADD KEY `fk_team_project_projects1_idx` (`project_id`);

--
-- Indexes for table `team_tbl`
--
ALTER TABLE `team_tbl`
 ADD PRIMARY KEY (`team_id`), ADD KEY `fk_team_tbl_user_tbl1_idx` (`leader`);

--
-- Indexes for table `user_tbl`
--
ALTER TABLE `user_tbl`
 ADD PRIMARY KEY (`user_id`), ADD KEY `fk_users_tbl_role_mst1_idx` (`role_id`), ADD KEY `fk_user_tbl_team_tbl2_idx` (`team_id`);

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
ADD CONSTRAINT `fk_member_project_projects1` FOREIGN KEY (`project_id`) REFERENCES `project_tbl` (`project_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
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

--
-- Constraints for table `team_tbl`
--
ALTER TABLE `team_tbl`
ADD CONSTRAINT `fk_team_tbl_user_tbl1` FOREIGN KEY (`leader`) REFERENCES `user_tbl` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user_tbl`
--
ALTER TABLE `user_tbl`
ADD CONSTRAINT `fk_user_tbl_team_tbl2` FOREIGN KEY (`team_id`) REFERENCES `team_tbl` (`team_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_users_tbl_role_mst1` FOREIGN KEY (`role_id`) REFERENCES `role_mst` (`role_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
