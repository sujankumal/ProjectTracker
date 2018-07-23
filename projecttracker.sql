-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2018 at 06:28 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projecttracker`
--

-- --------------------------------------------------------

--
-- Table structure for table `acheivements`
--

CREATE TABLE `acheivements` (
  `id` int(10) UNSIGNED NOT NULL,
  `member_id` int(10) UNSIGNED NOT NULL,
  `minute_id` int(10) UNSIGNED NOT NULL,
  `acheivement` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `acheivements`
--

INSERT INTO `acheivements` (`id`, `member_id`, `minute_id`, `acheivement`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 1, '2018-06-26 02:13:25', '2018-06-26 02:13:25'),
(2, 4, 1, 2, '2018-06-26 02:13:25', '2018-06-26 02:13:25'),
(3, 3, 2, 3, '2018-07-03 02:40:04', '2018-07-03 02:40:04'),
(4, 4, 2, 4, '2018-07-03 02:40:04', '2018-07-03 02:40:04'),
(5, 2, 3, 19, '2018-07-07 10:04:02', '2018-07-07 10:04:02');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(10) UNSIGNED NOT NULL,
  `minute_id` int(10) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `minute_id`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, 'L5Hp2Uu7hR_1.PNG', '2018-06-26 02:13:25', '2018-06-26 02:13:25'),
(2, 2, 'UjbZffMuJg_DZGitJlX0AEzQdW.jpg', '2018-07-03 02:40:04', '2018-07-03 02:40:04'),
(3, 3, 'ZWKDxdlW45_adascas.png', '2018-07-07 10:04:02', '2018-07-07 10:04:02');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(14, '2014_10_12_000000_create_users_table', 1),
(15, '2014_10_12_100000_create_password_resets_table', 1),
(16, '2018_03_04_004644_create_project_details_table', 1),
(17, '2018_03_06_054816_create_qrs_table', 1),
(18, '2018_03_06_065529_create_minutes_table', 1),
(19, '2018_03_06_104759_create_notices_table', 1),
(20, '2018_03_22_094624_create_images_table', 1),
(21, '2018_04_13_132225_create_project_tasks_table', 1),
(22, '2018_05_14_073544_create_acheivements_table', 1),
(23, '2018_05_14_104934_create_responsibilities_table', 1),
(24, '2018_05_16_103023_create_powerpoints_table', 1),
(25, '2018_05_18_094533_create_profile_images_table', 1),
(26, '2018_05_29_143402_create_verify_users_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `minutes`
--

CREATE TABLE `minutes` (
  `id` int(10) UNSIGNED NOT NULL,
  `project_id` int(10) UNSIGNED NOT NULL,
  `agenda` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `discussion` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `qr_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `minutes`
--

INSERT INTO `minutes` (`id`, `project_id`, `agenda`, `discussion`, `qr_id`, `created_at`, `updated_at`) VALUES
(1, 1, '1st Discussion', 'about progress', 1, '2018-06-26 02:13:25', '2018-06-26 02:13:25'),
(2, 1, '2nd Discussion', 'about progress', 1, '2018-07-03 02:40:04', '2018-07-03 02:40:04'),
(3, 3, 'This is 1st Agenda', 'This is 1st Discussion', 6, '2018-07-07 10:04:02', '2018-07-07 10:04:02');

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE `notices` (
  `id` int(10) UNSIGNED NOT NULL,
  `u_id` int(10) UNSIGNED NOT NULL,
  `project_id` int(10) UNSIGNED NOT NULL,
  `notice` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notices`
--

INSERT INTO `notices` (`id`, `u_id`, `project_id`, `notice`, `created_at`, `updated_at`) VALUES
(1, 4, 3, 'this is to notify that upcoming meeting is scheduled at june 24th 2018.', '2018-06-26 01:25:58', '2018-06-26 01:25:58'),
(2, 1, 1, 'immediate meeting on 4pm today', '2018-06-28 20:20:07', '2018-06-28 20:20:07');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `powerpoints`
--

CREATE TABLE `powerpoints` (
  `id` int(10) UNSIGNED NOT NULL,
  `project_id` int(10) UNSIGNED NOT NULL,
  `powerpoint` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `powerpoints`
--

INSERT INTO `powerpoints` (`id`, `project_id`, `powerpoint`, `created_at`, `updated_at`) VALUES
(1, 1, '57m2mCWEia_Proposal.pptx', '2018-07-04 01:13:38', '2018-07-04 01:13:38');

-- --------------------------------------------------------

--
-- Table structure for table `profile_images`
--

CREATE TABLE `profile_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `pimage` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profile_images`
--

INSERT INTO `profile_images` (`id`, `user_id`, `pimage`, `created_at`, `updated_at`) VALUES
(1, 1, 'wSbA2Kerm4_1.PNG', '2018-06-24 05:04:10', '2018-06-24 05:04:10'),
(2, 4, 'ybEE6SYBbz_aanchal.PNG', '2018-06-26 01:30:22', '2018-06-26 01:30:22'),
(3, 2, 'JN0mEk2bpT_35618085_243025483167959_7419474253432487936_n.jpg', '2018-07-06 10:39:10', '2018-07-06 10:39:10');

-- --------------------------------------------------------

--
-- Table structure for table `project_details`
--

CREATE TABLE `project_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` year(4) NOT NULL,
  `type` tinyint(3) UNSIGNED NOT NULL,
  `head_id` int(10) UNSIGNED NOT NULL,
  `supervisor_id` int(10) UNSIGNED NOT NULL,
  `leader_id` int(10) UNSIGNED NOT NULL,
  `member_idi` int(10) UNSIGNED DEFAULT NULL,
  `member_idii` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_details`
--

INSERT INTO `project_details` (`id`, `name`, `year`, `type`, `head_id`, `supervisor_id`, `leader_id`, `member_idi`, `member_idii`, `created_at`, `updated_at`) VALUES
(1, 'Gandaki Hydro power', 2018, 2, 1, 2, 3, 4, NULL, '2018-06-24 05:00:44', '2018-06-24 05:00:44'),
(2, 'Int''l airport', 2018, 1, 2, 3, 4, NULL, NULL, '2018-06-24 05:01:32', '2018-06-24 05:01:32'),
(3, 'irrigation project', 2017, 0, 3, 4, 2, NULL, NULL, '2018-06-24 05:03:06', '2018-06-24 05:03:06'),
(4, 'tracking vehicle', 2013, 1, 2, 3, 4, NULL, NULL, '2018-06-27 04:48:06', '2018-06-27 04:48:06'),
(5, 'live broadcast', 2015, 1, 2, 3, 4, NULL, NULL, '2018-06-27 04:48:30', '2018-06-27 04:48:30'),
(6, 'airplane tracking', 2018, 2, 3, 4, 4, NULL, NULL, '2018-06-27 04:48:55', '2018-06-27 04:48:55');

-- --------------------------------------------------------

--
-- Table structure for table `project_tasks`
--

CREATE TABLE `project_tasks` (
  `id` int(10) UNSIGNED NOT NULL,
  `project_id` int(10) UNSIGNED NOT NULL,
  `task` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `task_complete` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_tasks`
--

INSERT INTO `project_tasks` (`id`, `project_id`, `task`, `task_complete`, `created_at`, `updated_at`) VALUES
(1, 1, 'water diversion', 3, '2018-06-26 01:34:03', '2018-06-26 01:34:03'),
(2, 1, 'dam base', 4, '2018-06-26 01:34:26', '2018-06-26 01:34:26'),
(3, 1, 'cement', 3, '2018-06-26 01:36:22', '2018-06-26 01:36:22'),
(4, 1, 'Rods', 4, '2018-06-26 01:36:26', '2018-06-26 01:36:26'),
(5, 1, 'labour', NULL, '2018-06-26 01:36:37', '2018-06-26 01:36:37'),
(6, 1, 'engineer', NULL, '2018-06-26 01:36:42', '2018-06-26 01:36:42'),
(7, 1, 'survey', NULL, '2018-06-26 01:36:51', '2018-06-26 01:36:51'),
(8, 1, 'compensatation', NULL, '2018-06-26 01:37:16', '2018-06-26 01:37:16'),
(9, 1, 'salary', NULL, '2018-06-26 01:37:28', '2018-06-26 01:37:28'),
(10, 1, 'final report', NULL, '2018-06-26 01:37:38', '2018-06-26 01:37:38'),
(12, 2, 'proposal', NULL, '2018-06-26 01:38:10', '2018-06-26 01:38:10'),
(13, 2, 'DPR', NULL, '2018-06-26 01:38:16', '2018-06-26 01:38:16'),
(16, 2, 'tender', NULL, '2018-06-26 01:42:29', '2018-06-26 01:42:29'),
(17, 2, 'aircraft', NULL, '2018-06-26 01:42:44', '2018-06-26 01:42:44'),
(18, 2, 'tower', NULL, '2018-06-26 01:42:50', '2018-06-26 01:42:50'),
(19, 3, 'river', 2, '2018-06-26 01:42:59', '2018-06-26 01:42:59'),
(20, 3, 'field', NULL, '2018-06-26 01:43:15', '2018-06-26 01:43:15'),
(21, 3, 'time', NULL, '2018-06-26 01:43:31', '2018-06-26 01:43:31'),
(24, 1, 'land', NULL, '2018-07-01 03:23:33', '2018-07-01 03:23:33'),
(28, 1, 'turbine', NULL, '2018-07-07 04:33:49', '2018-07-07 04:33:49'),
(32, 1, 'irrigation facility', NULL, '2018-07-07 05:02:29', '2018-07-07 05:02:29');

-- --------------------------------------------------------

--
-- Table structure for table `qrs`
--

CREATE TABLE `qrs` (
  `id` int(10) UNSIGNED NOT NULL,
  `project_id` int(10) UNSIGNED NOT NULL,
  `QR_Generate` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supervisor_check` tinyint(1) DEFAULT NULL,
  `leader_check` tinyint(1) DEFAULT NULL,
  `member_i_check` tinyint(1) DEFAULT NULL,
  `member_ii_check` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `qrs`
--

INSERT INTO `qrs` (`id`, `project_id`, `QR_Generate`, `supervisor_check`, `leader_check`, `member_i_check`, `member_ii_check`, `created_at`, `updated_at`) VALUES
(1, 1, 'QrCode generated! Have a nice Day!!6O1to1mRPBBDcR1_2', NULL, NULL, NULL, NULL, '2018-06-26 02:12:40', '2018-06-26 02:12:40'),
(2, 2, 'QrCode generated! Have a nice Day!!XHSnm2fel8sQJ2Z_2', NULL, NULL, NULL, NULL, '2018-07-03 10:09:23', '2018-07-03 10:09:23'),
(3, 1, 'QrCode generated! Have a nice Day!!Fs1pxMLyNwz8dst_1', NULL, NULL, NULL, NULL, '2018-07-07 05:52:06', '2018-07-07 05:52:06'),
(4, 1, 'QrCode generated! Have a nice Day!!jBELXO3yhPI5zsH_1', NULL, NULL, NULL, NULL, '2018-07-07 06:01:33', '2018-07-07 06:01:33'),
(5, 1, 'QrCode generated! Have a nice Day!!KY16SMPhKaGUG7k_1', NULL, NULL, NULL, NULL, '2018-07-07 06:03:53', '2018-07-07 06:03:53'),
(6, 3, 'QrCode generated! Have a nice Day!!WgeJtDQ1tvwcbEv_3', NULL, NULL, NULL, NULL, '2018-07-07 10:03:05', '2018-07-07 10:03:05'),
(7, 1, 'QrCode generated! Have a nice Day!!z5oBsta0ENX1V51_1', 1, NULL, NULL, NULL, '2018-07-08 06:24:19', '2018-07-08 06:24:19');

-- --------------------------------------------------------

--
-- Table structure for table `responsibilities`
--

CREATE TABLE `responsibilities` (
  `id` int(10) UNSIGNED NOT NULL,
  `member_id` int(10) UNSIGNED NOT NULL,
  `minute_id` int(10) UNSIGNED NOT NULL,
  `responsibility` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `responsibilities`
--

INSERT INTO `responsibilities` (`id`, `member_id`, `minute_id`, `responsibility`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 4, '2018-06-26 02:13:25', '2018-06-26 02:13:25'),
(2, 4, 1, 5, '2018-06-26 02:13:25', '2018-06-26 02:13:25'),
(3, 3, 2, 6, '2018-07-03 02:40:05', '2018-07-03 02:40:05'),
(4, 4, 2, 7, '2018-07-03 02:40:05', '2018-07-03 02:40:05'),
(5, 2, 3, 20, '2018-07-07 10:04:02', '2018-07-07 10:04:02');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` year(4) DEFAULT NULL,
  `confirmed` tinyint(1) NOT NULL DEFAULT '0',
  `confirmation_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `batch`, `confirmed`, `confirmation_code`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@projecttracker.com', '$2y$10$N/9UI29kecMi1lOTwNriwubgVSLvRMXrGK9JAZUKrOwKPgdH1R.Ay', NULL, 1, NULL, '3stnsMaPI2qnMcU12P5K4PIEcsrggFxehKNNDRXXgrp10uMRfJ5hWhgI4Z4W', NULL, NULL),
(2, 'Sujan kumal', 'setobhagera@gmail.com', '$2y$10$moSVIGuwBcODBxrtzn8J0e2g9y9gDEEE9x/oY.XLawUJlZ6JcbiYq', 2014, 1, NULL, 'K6BZBRo9OOlDz67yHjEOeWasCRI8XlwZr8zCiybAqnnqRz96AOihrHuGqGzI', '2018-06-24 02:09:39', '2018-06-24 02:12:18'),
(3, 'Hari Krishna', 'Hari@gmail.com', '$2y$10$b52Zyb/QfsBgo6THHoXviuWoAXn5PIMSQJSzaV7lhZG.C.su0FTxG', 2018, 1, NULL, 'uandD0IZy9JQEPAkh13dNaRBhYCQu07bRi8MVScBnNDNgrVtQPb2DHw9KVnU', '2018-06-24 02:13:28', '2018-06-24 02:22:48'),
(4, 'bso raj', 'bsoraj@gmail.com', '$2y$10$Wll7sGwg.zDYqc64oI4Yzu3zpwzOx4v2rgc33Xp02bL9uOUtAUjwu', 2017, 1, NULL, 'tmuYbhs9RTkkMgmPUsPao73XYIF9tzjRuEz2TNlfKDz0a1cwA9h7megMalmf', '2018-06-24 02:24:24', '2018-06-24 02:24:52');

-- --------------------------------------------------------

--
-- Table structure for table `verify_users`
--

CREATE TABLE `verify_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `verify_users`
--

INSERT INTO `verify_users` (`id`, `user_id`, `token`, `created_at`, `updated_at`) VALUES
(1, 3, 'eYJi04sgDn70Fkls5xg5VXR4vHjpqMtObUay4XaX', '2018-06-24 02:13:28', '2018-06-24 02:13:28'),
(2, 4, '7pQ4Aka1zddXovnbpJhCBOEhW2cA8HyfiwMng4bO', '2018-06-24 02:24:24', '2018-06-24 02:24:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acheivements`
--
ALTER TABLE `acheivements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `acheivements_member_id_foreign` (`member_id`),
  ADD KEY `acheivements_minute_id_foreign` (`minute_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `images_minute_id_foreign` (`minute_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `minutes`
--
ALTER TABLE `minutes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `minutes_project_id_foreign` (`project_id`),
  ADD KEY `minutes_qr_id_foreign` (`qr_id`);

--
-- Indexes for table `notices`
--
ALTER TABLE `notices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notices_u_id_foreign` (`u_id`),
  ADD KEY `notices_project_id_foreign` (`project_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `powerpoints`
--
ALTER TABLE `powerpoints`
  ADD PRIMARY KEY (`id`),
  ADD KEY `powerpoints_project_id_foreign` (`project_id`);

--
-- Indexes for table `profile_images`
--
ALTER TABLE `profile_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profile_images_user_id_foreign` (`user_id`);

--
-- Indexes for table `project_details`
--
ALTER TABLE `project_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_details_head_id_foreign` (`head_id`),
  ADD KEY `project_details_supervisor_id_foreign` (`supervisor_id`),
  ADD KEY `project_details_leader_id_foreign` (`leader_id`),
  ADD KEY `project_details_member_idi_foreign` (`member_idi`),
  ADD KEY `project_details_member_idii_foreign` (`member_idii`);

--
-- Indexes for table `project_tasks`
--
ALTER TABLE `project_tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_tasks_project_id_foreign` (`project_id`);

--
-- Indexes for table `qrs`
--
ALTER TABLE `qrs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `qrs_project_id_foreign` (`project_id`);

--
-- Indexes for table `responsibilities`
--
ALTER TABLE `responsibilities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `responsibilities_member_id_foreign` (`member_id`),
  ADD KEY `responsibilities_minute_id_foreign` (`minute_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `verify_users`
--
ALTER TABLE `verify_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acheivements`
--
ALTER TABLE `acheivements`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `minutes`
--
ALTER TABLE `minutes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `notices`
--
ALTER TABLE `notices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `powerpoints`
--
ALTER TABLE `powerpoints`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `profile_images`
--
ALTER TABLE `profile_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `project_details`
--
ALTER TABLE `project_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `project_tasks`
--
ALTER TABLE `project_tasks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `qrs`
--
ALTER TABLE `qrs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `responsibilities`
--
ALTER TABLE `responsibilities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `verify_users`
--
ALTER TABLE `verify_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `acheivements`
--
ALTER TABLE `acheivements`
  ADD CONSTRAINT `acheivements_member_id_foreign` FOREIGN KEY (`member_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `acheivements_minute_id_foreign` FOREIGN KEY (`minute_id`) REFERENCES `minutes` (`id`);

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_minute_id_foreign` FOREIGN KEY (`minute_id`) REFERENCES `minutes` (`id`);

--
-- Constraints for table `minutes`
--
ALTER TABLE `minutes`
  ADD CONSTRAINT `minutes_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `project_details` (`id`),
  ADD CONSTRAINT `minutes_qr_id_foreign` FOREIGN KEY (`qr_id`) REFERENCES `qrs` (`id`);

--
-- Constraints for table `notices`
--
ALTER TABLE `notices`
  ADD CONSTRAINT `notices_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `project_details` (`id`),
  ADD CONSTRAINT `notices_u_id_foreign` FOREIGN KEY (`u_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `powerpoints`
--
ALTER TABLE `powerpoints`
  ADD CONSTRAINT `powerpoints_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `project_details` (`id`);

--
-- Constraints for table `profile_images`
--
ALTER TABLE `profile_images`
  ADD CONSTRAINT `profile_images_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `project_details`
--
ALTER TABLE `project_details`
  ADD CONSTRAINT `project_details_head_id_foreign` FOREIGN KEY (`head_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `project_details_leader_id_foreign` FOREIGN KEY (`leader_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `project_details_member_idi_foreign` FOREIGN KEY (`member_idi`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `project_details_member_idii_foreign` FOREIGN KEY (`member_idii`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `project_details_supervisor_id_foreign` FOREIGN KEY (`supervisor_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `project_tasks`
--
ALTER TABLE `project_tasks`
  ADD CONSTRAINT `project_tasks_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `project_details` (`id`);

--
-- Constraints for table `qrs`
--
ALTER TABLE `qrs`
  ADD CONSTRAINT `qrs_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `project_details` (`id`);

--
-- Constraints for table `responsibilities`
--
ALTER TABLE `responsibilities`
  ADD CONSTRAINT `responsibilities_member_id_foreign` FOREIGN KEY (`member_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `responsibilities_minute_id_foreign` FOREIGN KEY (`minute_id`) REFERENCES `minutes` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
