-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2016 at 08:32 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel53-modular`
--

-- --------------------------------------------------------

--
-- Table structure for table `attachments`
--

CREATE TABLE `attachments` (
  `id` int(10) UNSIGNED NOT NULL,
  `ticket_id` int(10) UNSIGNED DEFAULT NULL,
  `reply_id` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `attachments`
--

INSERT INTO `attachments` (`id`, `ticket_id`, `reply_id`, `name`, `path`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 'final-survey.PNG', 'uploads/ticket/it/120216/it-a4b61923583e92128e959a52ccf6b56b-final-survey.PNG', '2016-12-01 19:25:02', '2016-12-01 19:25:02'),
(2, 1, NULL, 'url.jpg', 'uploads/ticket/it/120216/it-a4b61923583e92128e959a52ccf6b56b-url.jpg', '2016-12-01 19:25:02', '2016-12-01 19:25:02'),
(3, 1, NULL, 'Jianas Sweepstakes app.docx', 'uploads/ticket/it/120216/it-a4b61923583e92128e959a52ccf6b56b-Jianas Sweepstakes app.docx', '2016-12-01 19:25:02', '2016-12-01 19:25:02');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `description`, `is_active`) VALUES
(1, 'IT', 'Information Technology Department', 1),
(2, 'HR', 'Human Resources Department', 1);

-- --------------------------------------------------------

--
-- Table structure for table `meta_user`
--

CREATE TABLE `meta_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `key` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `meta_user`
--

INSERT INTO `meta_user` (`id`, `user_id`, `key`, `value`) VALUES
(5, 8, 'fname', 'Jaymie12 '),
(6, 8, 'lname', 'Dingle12 '),
(7, 9, 'fname', 'Rinoa'),
(8, 9, 'lname', 'Dingle'),
(9, 10, 'fname', 'Riuna'),
(10, 10, 'lname', 'Dingle'),
(11, 11, 'fname', 'Emman'),
(12, 11, 'lname', 'Dubria'),
(13, 11, 'avatar', 'https://scontent-hkg3-1.xx.fbcdn.net/v/t1.0-1/c0.0.240.240/p240x240/1001518_10151545049989157_1385099634_n.jpg?oh=040673b27bb541df2c001ab2cd463b11&oe=58C2D0DA'),
(15, 12, 'fname', 'Mat Levi'),
(16, 12, 'lname', 'Famorca'),
(17, 12, 'avatar', 'https://yt3.ggpht.com/-6Dyk38WfLLA/AAAAAAAAAAI/AAAAAAAAAAA/ROWm_aZ4a8A/s900-c-k-no-rj-c0xffffff/photo.jpg'),
(18, 13, 'fname', 'Fritz'),
(19, 13, 'lname', 'Roca'),
(20, 13, 'avatar', 'https://scontent-hkg3-1.xx.fbcdn.net/v/t1.0-0/p206x206/969206_600655649954346_572023468_n.jpg?oh=5c28e307b447028bab83c659a7cfa30d&oe=58CA0527'),
(21, 14, 'fname', 'Roy Vincent'),
(22, 14, 'lname', 'Niepes'),
(23, 14, 'avatar', 'https://scontent-hkg3-1.xx.fbcdn.net/v/t1.0-1/p160x160/13921060_10210143984735301_4730930208779921412_n.jpg?oh=a9cb2b867e22976178958671a16a5afb&oe=58CCF1F5'),
(50, 7, 'fname', 'Roel'),
(51, 7, 'lname', 'Dingle'),
(52, 7, 'avatar', 'https://scontent-hkg3-1.xx.fbcdn.net/v/t1.0-1/p240x240/11825953_1047734388583992_1727016485304329009_n.jpg?oh=ed7ab6e96b1c6207630c1ea5103c5756&oe=58C0C07E       '),
(53, 8, 'avatar', 'https://scontent-hkg3-1.xx.fbcdn.net/v/t1.0-9/73922_169433869747386_2101709_n.jpg?oh=71a8b766697a7f8cf083ed46a489485b&oe=58CB2155 '),
(54, 15, 'fname', 'Koo'),
(55, 15, 'lname', 'Vergara'),
(56, 15, 'avatar', 'https://scontent-hkg3-1.xx.fbcdn.net/v/t1.0-0/p206x206/12274547_10153664129136970_9079724772982545809_n.jpg?oh=71d82aa6ae0ee87051e9c63463f5b0ce&oe=58B71010'),
(57, 16, 'fname', 'Belinda'),
(58, 16, 'lname', 'Natividad'),
(59, 16, 'avatar', 'https://scontent-hkg3-1.xx.fbcdn.net/v/t1.0-9/11037826_10204910287949997_6666961425357080920_n.jpg?oh=c0adb2a04f938fe7b6d341889eeb730e&oe=58B4BC8B'),
(60, 17, 'fname', 'Coleen'),
(61, 17, 'lname', 'Ambrosio'),
(62, 17, 'avatar', 'https://scontent.fceb1-1.fna.fbcdn.net/v/t1.0-0/p206x206/988956_899391390073066_1687973438360295652_n.jpg?oh=50b116e37a09626a71cd1bb5426fbd68&oe=58BCA577'),
(63, 18, 'fname', 'Mc Clynrey'),
(64, 18, 'lname', 'Arboleda'),
(65, 18, 'avatar', 'https://scontent.fceb1-1.fna.fbcdn.net/v/t1.0-9/1656252_983641708328061_8115763111636737198_n.jpg?oh=7f63f0c5b08cbf5ee17fe26f52605aee&oe=58CFDF5D'),
(66, 19, 'fname', 'Keith Randell'),
(67, 19, 'lname', 'Gapusan'),
(68, 19, 'avatar', 'https://scontent.fceb1-1.fna.fbcdn.net/v/t1.0-9/14670699_1488534401160497_4915313798251371591_n.jpg?oh=766727b283fe8417591c5ed388a26c95&oe=58B3FFAE'),
(69, 20, 'fname', 'Nixon'),
(70, 20, 'lname', 'Taguinod'),
(71, 20, 'avatar', 'https://scontent.fceb1-1.fna.fbcdn.net/v/t1.0-9/14440744_1106614349376359_9040510494061933594_n.jpg?oh=997d5b4e21fef959aab9c245593ebdb1&oe=58D29469');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2016_11_15_025624_create_roles_table', 1),
(2, '2016_11_15_024541_create_users_table', 2),
(28, '2016_11_15_025624_create_tickets_table', 3),
(29, '2016_12_01_015234_create_replies_table', 3),
(30, '2016_12_01_065001_create_attachments_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE `replies` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `ticket_id` int(10) UNSIGNED NOT NULL,
  `message` longtext COLLATE utf8_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `replies`
--

INSERT INTO `replies` (`id`, `user_id`, `ticket_id`, `message`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 16, 1, '<p>dfdfdfdfdfdffdfdfdfdfdf</p>\r\n<p><img src="https://kushsrivastava.files.wordpress.com/2012/11/test.gif" alt="test" width="200" height="100" /></p>', 1, '2016-12-01 21:09:02', '2016-12-01 21:09:02'),
(2, 16, 1, '<p><a title="www" href="https://laravel.com/docs/4.2/schema" target="_blank" rel="noopener noreferrer">dfdfd</a></p>', 1, '2016-12-01 21:10:45', '2016-12-01 21:10:45'),
(3, 16, 1, '<p>sdsdsdsdsdsdsdds</p>\r\n<p>dsds</p>\r\n<p>dsdsdsdsdsdd</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>sds</p>\r\n<p>dsdsdsdsd</p>\r\n<p>&nbsp;</p>\r\n<p>sdsd</p>', 1, '2016-12-01 21:39:40', '2016-12-01 21:39:40');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Superadmin', 'Access to everything on the systemdfdfsdsd', 1, '2016-11-14 21:12:51', '2016-11-23 23:54:41'),
(2, 'Admin', 'To manage admin stuff on the system', 1, '2016-11-14 21:12:51', '2016-11-14 21:12:51'),
(3, 'Staff', 'Assist with system operation', 1, '2016-11-14 21:12:51', '2016-11-14 21:12:51'),
(4, 'User', 'Normal user of system', 1, '2016-11-14 21:12:51', '2016-11-14 21:12:51'),
(5, 'sdsd', 'sdsd', 0, '2016-11-23 23:39:10', '2016-11-23 23:45:26'),
(6, 'testuser', 'dfdfdfdf', 0, '2016-11-23 23:45:19', '2016-11-23 23:45:26'),
(7, 'IT staff', 'IT personnel working under IT Team Manager', 1, '2016-11-23 23:51:43', '2016-11-23 23:55:23'),
(8, 'asa', 'asasas', 0, '2016-11-23 23:55:53', '2016-11-24 15:39:36'),
(9, 'sdsdsdsd', 'sdsdsds', 1, '2016-11-23 23:56:10', '2016-11-23 23:56:10'),
(10, 'qqqq', 'qqq', 0, '2016-11-23 23:56:23', '2016-11-24 15:39:36'),
(11, '44', '4444', 0, '2016-11-23 23:56:30', '2016-11-23 23:59:55'),
(12, '555', '55555', 0, '2016-11-23 23:56:40', '2016-11-23 23:59:55'),
(13, '77777', '777', 0, '2016-11-23 23:56:51', '2016-11-23 23:59:55');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `department_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `priority_id` int(10) UNSIGNED NOT NULL,
  `status_id` int(10) UNSIGNED NOT NULL,
  `subject` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `message` longtext COLLATE utf8_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `code`, `department_id`, `user_id`, `priority_id`, `status_id`, `subject`, `message`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'IT-A4B61923-120216', 1, 16, 3, 1, 'No Internet in 305', '<p>Please provide ff:</p>\r\n<ul>\r\n<li>cable</li>\r\n<li>monitor</li>\r\n<li>money</li>\r\n</ul>', 1, '2016-12-01 19:25:02', '2016-12-01 19:25:02');

-- --------------------------------------------------------

--
-- Table structure for table `ticket_priority`
--

CREATE TABLE `ticket_priority` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ticket_priority`
--

INSERT INTO `ticket_priority` (`id`, `name`, `description`, `is_active`) VALUES
(1, 'Low', '', 1),
(2, 'Medium', '', 1),
(3, 'High', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ticket_status`
--

CREATE TABLE `ticket_status` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ticket_status`
--

INSERT INTO `ticket_status` (`id`, `name`, `description`, `is_active`) VALUES
(1, 'Open', 'submitted ticket', 1),
(2, 'On-process', 'ticket is in ongoing process', 1),
(3, 'Close', 'ticket close and done', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `email`, `password`, `is_active`, `remember_token`, `created_at`, `updated_at`) VALUES
(7, 2, 'roeldingle@gmail.com', '$2y$10$R8duaOP.JuSnWZchLrFcFuR6AGYDl2jpgyLZceXA./tPmhaD6fbkC', 0, 'HxM1GNOXDKb17BzYdKm2IcBlkmlO0FMddiUJTJ5GYKEdkzGaHLMpAW1ASkI0', '2016-11-14 22:49:31', '2016-11-21 23:18:59'),
(8, 2, 'jaymie@gmail.com ', '$2y$10$1VEyKBcz0EVD1AWSokOzOOQvg7rQ8llNZEbmvE2H8rFBw1oLuv87O', 0, 'WhB3F11JT0HgArJBe7jUfEOv8q3EINLGXkt4knmbqvqQWRtOC9v6eZz0UFKH', '2016-11-14 22:52:10', '2016-11-21 23:18:59'),
(9, 3, 'baby@gmail.com', '$2y$10$16Ekv6w8IYS.hBzgbIA3cO8IGXq744Q3XE53cCaJz7kRae2l5SYfC', 0, 'kHtROAjfOey3Cw3DEEiVqgw1cILVbYDCaezWRTKWimi63zCHyjJqoqN9do9n', '2016-11-14 22:53:18', '2016-11-21 23:18:59'),
(10, 1, 'riuna@gmail.com', '$2y$10$hjcVYD/l1qr8rx.nWVxLWOUDn0qyGMWIUrgMW44H/pcGtB.0N51hy', 0, 'MF5tX3fhycde5qBKKu0g5R9oejr6ZdtBo87wM7IoNGRBSmfuvTzLvvEifoq5', '2016-11-14 22:56:25', '2016-11-21 23:18:59'),
(11, 1, 'etdubria@straightarrow.com.ph', '$2y$10$oAOmzxozWRa1tydyOQu7U.j3k/e0cznf003QoT9TDZe99DQn6829.', 1, 'QTNdaYcZOiAb0ixN4UmRyY5QWpy2vfB8BcUbW5a1NlMkoEr0dNMzDLG9zlwq', '2016-11-20 17:56:37', '2016-11-22 15:30:47'),
(12, 1, 'mrfamorca@straightarrow.com.ph', '$2y$10$ipA06hl8eb5yk7jrs6nvV.8gMCAQ0ELlvtBtYCE4J5ns4aYpWgYLq', 1, NULL, '2016-11-20 17:59:59', '2016-11-24 15:48:28'),
(13, 3, 'fproca@straightarrow.com.ph', '$2y$10$FVTEo.KGQB41y5/txn7LaezMuLXT9NqX7ne1EH.mrFPL//lczEM9y', 1, 'h2pQSVpVMS9vVzcC2Hr2ejV8wLap3q4eClnY88hYRAaicta8qJ2aMbfzP1Zt', '2016-11-20 18:38:04', '2016-11-28 17:52:22'),
(14, 2, 'rlniepes@straightarrow.com.ph', '$2y$10$3s0jIoKVIvHfK6uyhfqZ7OZcX6W6pCo/th0zglcv4pFy5l7icD0LS', 1, NULL, '2016-11-20 22:15:11', '2016-11-21 23:18:01'),
(15, 1, 'kcvergara@straightarrow.com.ph', '$2y$10$VQ1qw.Wryq1.0gOlgwWYm.JyejciyoIi5BejNK4tFxjR7QDev1CYW', 1, 'GUydWsOKwFidM45fYtBAl1mGMJmTg9LDxjHPxUGgfeh94amVqXIGZRjXLdg3', '2016-11-21 20:46:19', '2016-11-28 17:46:38'),
(16, 2, 'bsnatividad@straightarrow.com.ph', '$2y$10$9ApvuvVPcriQvUwJVGJ5TOgBT1VbFSJaMpBALHipkqU51hR3Q60FS', 1, NULL, '2016-11-21 20:50:52', '2016-11-21 21:12:27'),
(17, 1, 'cpambrosio@straightarrow.com.ph', '$2y$10$8tYZx.0MJAtOx.YKl8BtX.Q21qlKmuchd/Vv2TnGO8tYxv1f3Y55S', 1, NULL, '2016-11-22 18:16:34', '2016-11-22 19:22:31'),
(18, 1, 'mdarboleda@straightarrow.com.ph', '$2y$10$Wn0Zv6Cem/ghTmqNQ.LOlOyCdt1D7LNEFSGEj1FuZQ1fCLAXpOjN.', 1, NULL, '2016-11-22 18:46:07', '2016-11-22 18:46:07'),
(19, 1, 'krsgapusan@gmail.com', '$2y$10$Wh3SEnVX6eAIsPwSoXkJb./l5I4bhTnL4RUdS3uHr/nviqyT/xh8S', 1, 'vSG9KUC388fccfFa0JoMvMq65GdgSnUwYsOFcgfaYeWSt3ALyR1XYQ7wke0V', '2016-11-22 19:11:29', '2016-11-24 16:12:16'),
(20, 1, 'nctaguinod@straightarrow.com.ph', '$2y$10$ZnUA1YxkAJ.jRSC5vqbODe6fxCQgXgVK4wbJiOYOZhTdizDhrp2Ba', 1, NULL, '2016-11-22 19:20:05', '2016-11-22 19:20:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attachments`
--
ALTER TABLE `attachments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attachments_ticket_id_index` (`ticket_id`),
  ADD KEY `attachments_reply_id_index` (`reply_id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meta_user`
--
ALTER TABLE `meta_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `meta_user_user_id_index` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `replies_user_id_index` (`user_id`),
  ADD KEY `replies_ticket_id_index` (`ticket_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tickets_department_id_index` (`department_id`),
  ADD KEY `tickets_user_id_index` (`user_id`),
  ADD KEY `tickets_priority_id_index` (`priority_id`),
  ADD KEY `tickets_status_id_index` (`status_id`);

--
-- Indexes for table `ticket_priority`
--
ALTER TABLE `ticket_priority`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket_status`
--
ALTER TABLE `ticket_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attachments`
--
ALTER TABLE `attachments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `meta_user`
--
ALTER TABLE `meta_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `replies`
--
ALTER TABLE `replies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ticket_priority`
--
ALTER TABLE `ticket_priority`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ticket_status`
--
ALTER TABLE `ticket_status`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `attachments`
--
ALTER TABLE `attachments`
  ADD CONSTRAINT `attachments_reply_id_foreign` FOREIGN KEY (`reply_id`) REFERENCES `replies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `attachments_ticket_id_foreign` FOREIGN KEY (`ticket_id`) REFERENCES `tickets` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `meta_user`
--
ALTER TABLE `meta_user`
  ADD CONSTRAINT `meta_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `replies`
--
ALTER TABLE `replies`
  ADD CONSTRAINT `replies_ticket_id_foreign` FOREIGN KEY (`ticket_id`) REFERENCES `tickets` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `replies_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tickets_priority_id_foreign` FOREIGN KEY (`priority_id`) REFERENCES `ticket_priority` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tickets_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `ticket_status` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tickets_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
