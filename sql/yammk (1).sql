-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2022 at 10:46 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yammk`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `image`, `mobile`, `password`, `remember_token`, `status`, `created_at`, `updated_at`) VALUES
(1, 'mahmoud', 'admin@admin.com', '214868', '1234567891', '$2y$10$3HGTi0J3vT7fEq1OosdMou8S0eP1pwLNPnzcuHyXBvWJxC1GhHgsK', 'od90DIolm2v1pH8n0QS48H0Gao5lSPt6ZZmaBmtNkQU4Mk6c0N9nXzDZrJB3', 'active', '2022-04-05 11:13:26', '2022-06-13 09:23:23'),
(5, 'mahmoud', 'b@b.com', NULL, '0592123488', '$2y$10$oZ79nsqhxIffD67ACV7xf.V0BBlT5D/7/sdRIITLwXPxswvtZRmZS', NULL, 'active', '2021-06-21 07:20:27', '2022-08-03 02:28:26'),
(6, 'ali', 'a@a.com', 'byhefXzQ0IOfsYR79208421655122939_6484132.png', '1234567890', '$2y$10$ey2njugOIQeKfpiU4Ms63OTfQH/mcdz5Aqv30qgCOESg2Tj.lPCFO', NULL, 'active', '2022-04-11 08:07:11', '2022-06-13 09:22:19');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fcm_token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `meal_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `fcm_token`, `user_id`, `meal_id`, `quantity`, `created_at`, `updated_at`, `deleted_at`) VALUES
(10, '123', 0, 1, 2, '2022-08-11 08:37:02', '2022-08-11 09:30:00', '2022-08-11 09:30:00'),
(11, '123', 0, 1, 2, '2022-08-14 02:17:45', '2022-08-14 02:19:41', '2022-08-14 02:19:41'),
(12, '123', 0, 1, 2, '2022-08-14 02:19:47', '2022-08-14 02:46:24', '2022-08-14 02:46:24'),
(13, '123', 0, 1, 2, '2022-08-14 04:30:16', '2022-08-14 08:19:40', '2022-08-14 08:19:40'),
(14, '123', 0, 1, 2, '2022-08-14 08:22:14', '2022-08-14 08:22:20', '2022-08-14 08:22:20'),
(15, '123', 0, 1, 2, '2022-08-14 08:25:47', '2022-08-14 08:25:57', '2022-08-14 08:25:57'),
(16, '123', 0, 1, 2, '2022-08-15 02:34:54', '2022-08-15 02:35:12', '2022-08-15 02:35:12'),
(17, '123', 0, 1, 2, '2022-08-15 02:36:36', '2022-08-15 02:36:42', '2022-08-15 02:36:42'),
(18, '123', 0, 1, 2, '2022-08-15 02:37:31', '2022-08-15 02:37:36', '2022-08-15 02:37:36'),
(19, '123', 0, 1, 2, '2022-08-15 02:38:58', '2022-08-15 02:39:04', '2022-08-15 02:39:04'),
(20, '123', 0, 1, 2, '2022-08-15 02:41:37', '2022-08-15 02:41:50', '2022-08-15 02:41:50'),
(21, '123', 0, 1, 2, '2022-08-15 02:42:04', '2022-08-15 02:42:09', '2022-08-15 02:42:09'),
(22, '123', 0, 1, 2, '2022-08-15 02:43:36', '2022-08-15 04:52:49', '2022-08-15 04:52:49');

-- --------------------------------------------------------

--
-- Table structure for table `cart_extras`
--

CREATE TABLE `cart_extras` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cart_id` int(11) NOT NULL,
  `extra_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cart_extras`
--

INSERT INTO `cart_extras` (`id`, `cart_id`, `extra_id`, `quantity`, `created_at`, `updated_at`, `deleted_at`) VALUES
(17, 11, 1, 2, '2022-08-14 05:17:46', '2022-08-14 02:19:41', '2022-08-14 02:19:41'),
(18, 11, 2, 3, '2022-08-14 05:17:46', '2022-08-14 02:19:41', '2022-08-14 02:19:41'),
(19, 12, 1, 2, '2022-08-14 05:19:47', '2022-08-14 02:45:23', '2022-08-14 02:45:23'),
(20, 12, 2, 3, '2022-08-14 05:19:47', '2022-08-14 02:45:23', '2022-08-14 02:45:23'),
(21, 13, 1, 2, '2022-08-14 07:30:16', '2022-08-14 08:19:40', '2022-08-14 08:19:40'),
(22, 13, 2, 3, '2022-08-14 07:30:16', '2022-08-14 08:19:40', '2022-08-14 08:19:40'),
(23, 14, 1, 2, '2022-08-14 11:22:14', '2022-08-14 08:22:20', '2022-08-14 08:22:20'),
(24, 14, 2, 3, '2022-08-14 11:22:14', '2022-08-14 08:22:20', '2022-08-14 08:22:20'),
(25, 15, 1, 2, '2022-08-14 11:25:47', '2022-08-14 08:25:57', '2022-08-14 08:25:57'),
(26, 15, 2, 3, '2022-08-14 11:25:47', '2022-08-14 08:25:57', '2022-08-14 08:25:57'),
(27, 16, 1, 2, '2022-08-15 05:34:54', '2022-08-15 02:35:12', '2022-08-15 02:35:12'),
(28, 16, 2, 3, '2022-08-15 05:34:54', '2022-08-15 02:35:12', '2022-08-15 02:35:12'),
(29, 17, 1, 2, '2022-08-15 05:36:36', '2022-08-15 02:36:42', '2022-08-15 02:36:42'),
(30, 17, 2, 3, '2022-08-15 05:36:36', '2022-08-15 02:36:42', '2022-08-15 02:36:42'),
(31, 18, 1, 2, '2022-08-15 05:37:31', '2022-08-15 02:37:36', '2022-08-15 02:37:36'),
(32, 18, 2, 3, '2022-08-15 05:37:31', '2022-08-15 02:37:36', '2022-08-15 02:37:36'),
(33, 19, 1, 2, '2022-08-15 05:38:58', '2022-08-15 02:39:04', '2022-08-15 02:39:04'),
(34, 19, 2, 3, '2022-08-15 05:38:58', '2022-08-15 02:39:04', '2022-08-15 02:39:04'),
(35, 20, 1, 2, '2022-08-15 05:41:37', '2022-08-15 02:41:50', '2022-08-15 02:41:50'),
(36, 20, 2, 3, '2022-08-15 05:41:37', '2022-08-15 02:41:50', '2022-08-15 02:41:50'),
(37, 21, 1, 2, '2022-08-15 05:42:04', '2022-08-15 02:42:09', '2022-08-15 02:42:09'),
(38, 21, 2, 3, '2022-08-15 05:42:04', '2022-08-15 02:42:09', '2022-08-15 02:42:09'),
(39, 22, 1, 2, '2022-08-15 05:43:36', '2022-08-15 04:52:49', '2022-08-15 04:52:49'),
(40, 22, 2, 3, '2022-08-15 05:43:36', '2022-08-15 04:52:49', '2022-08-15 04:52:49');

-- --------------------------------------------------------

--
-- Table structure for table `cart_options`
--

CREATE TABLE `cart_options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cart_id` int(11) NOT NULL,
  `option_value_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cart_options`
--

INSERT INTO `cart_options` (`id`, `cart_id`, `option_value_id`, `parent_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(22, 11, 3, 1, '2022-08-14 02:17:45', '2022-08-14 02:19:41', '2022-08-14 02:19:41'),
(23, 11, 4, 2, '2022-08-14 02:17:45', '2022-08-14 02:19:41', '2022-08-14 02:19:41'),
(24, 12, 3, 1, '2022-08-14 02:19:47', '2022-08-14 02:45:23', '2022-08-14 02:45:23'),
(25, 12, 4, 2, '2022-08-14 02:19:47', '2022-08-14 02:45:23', '2022-08-14 02:45:23'),
(26, 13, 3, 1, '2022-08-14 04:30:16', '2022-08-14 08:19:40', '2022-08-14 08:19:40'),
(27, 13, 4, 2, '2022-08-14 04:30:16', '2022-08-14 08:19:40', '2022-08-14 08:19:40'),
(28, 14, 3, 1, '2022-08-14 08:22:14', '2022-08-14 08:22:20', '2022-08-14 08:22:20'),
(29, 14, 4, 2, '2022-08-14 08:22:14', '2022-08-14 08:22:20', '2022-08-14 08:22:20'),
(30, 15, 3, 1, '2022-08-14 08:25:47', '2022-08-14 08:25:57', '2022-08-14 08:25:57'),
(31, 15, 4, 2, '2022-08-14 08:25:47', '2022-08-14 08:25:57', '2022-08-14 08:25:57'),
(32, 16, 3, 1, '2022-08-15 02:34:54', '2022-08-15 02:35:12', '2022-08-15 02:35:12'),
(33, 16, 4, 2, '2022-08-15 02:34:54', '2022-08-15 02:35:12', '2022-08-15 02:35:12'),
(34, 17, 3, 1, '2022-08-15 02:36:36', '2022-08-15 02:36:42', '2022-08-15 02:36:42'),
(35, 17, 4, 2, '2022-08-15 02:36:36', '2022-08-15 02:36:42', '2022-08-15 02:36:42'),
(36, 18, 3, 1, '2022-08-15 02:37:31', '2022-08-15 02:37:36', '2022-08-15 02:37:36'),
(37, 18, 4, 2, '2022-08-15 02:37:31', '2022-08-15 02:37:36', '2022-08-15 02:37:36'),
(38, 19, 3, 1, '2022-08-15 02:38:58', '2022-08-15 02:39:04', '2022-08-15 02:39:04'),
(39, 19, 4, 2, '2022-08-15 02:38:58', '2022-08-15 02:39:04', '2022-08-15 02:39:04'),
(40, 20, 3, 1, '2022-08-15 02:41:37', '2022-08-15 02:41:50', '2022-08-15 02:41:50'),
(41, 20, 4, 2, '2022-08-15 02:41:37', '2022-08-15 02:41:50', '2022-08-15 02:41:50'),
(42, 21, 3, 1, '2022-08-15 02:42:04', '2022-08-15 02:42:09', '2022-08-15 02:42:09'),
(43, 21, 4, 2, '2022-08-15 02:42:04', '2022-08-15 02:42:09', '2022-08-15 02:42:09'),
(44, 22, 3, 1, '2022-08-15 02:43:36', '2022-08-15 04:52:49', '2022-08-15 04:52:49'),
(45, 22, 4, 2, '2022-08-15 02:43:36', '2022-08-15 04:52:49', '2022-08-15 04:52:49');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `status` enum('active','not_active') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `user_id`, `parent_id`, `sort_order`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 0, 2, 'active', '2022-08-08 08:40:16', '2022-08-08 08:40:16', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category_translations`
--

CREATE TABLE `category_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_translations`
--

INSERT INTO `category_translations` (`id`, `category_id`, `locale`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'en', 'east food', '2022-08-08 08:40:16', '2022-08-08 08:40:16', NULL),
(2, 1, 'ar', 'أكل شرقي', '2022-08-08 08:40:16', '2022-08-08 08:40:16', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

-- CREATE TABLE `contacts` (
--   `id` bigint(20) UNSIGNED NOT NULL,
--   `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
--   `is_read` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL,
--   `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
--   `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
--   `deleted_at` timestamp NULL DEFAULT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

-- INSERT INTO `contacts` (`id`, `name`, `email`, `mobile`, `message`, `is_read`, `created_at`, `updated_at`, `deleted_at`) VALUES
-- (1, 'hello', 'a@a.com', '13456789', '111111111111111111', '0', '2022-08-07 05:14:28', '2022-08-07 05:14:28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cuisines`
--

CREATE TABLE `cuisines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cuisines`
--

INSERT INTO `cuisines` (`id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '2022-08-07 11:14:36', '2022-08-08 05:45:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cuisine_translations`
--

CREATE TABLE `cuisine_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cuisine_id` int(11) NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cuisine_translations`
--

INSERT INTO `cuisine_translations` (`id`, `cuisine_id`, `locale`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'en', 'chinees', '2022-08-07 11:15:04', '2022-08-08 06:14:20', NULL),
(2, 1, 'ar', 'الاكل الصيني', '2022-08-07 11:15:04', '2022-08-08 06:14:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `days`
--

CREATE TABLE `days` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `days`
--

INSERT INTO `days` (`id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '2022-08-10 08:47:35', NULL, NULL),
(2, '2022-08-10 08:47:35', NULL, NULL),
(3, '2022-08-10 08:47:35', NULL, NULL),
(4, '2022-08-10 08:47:35', NULL, NULL),
(5, '2022-08-10 08:47:35', NULL, NULL),
(6, '2022-08-10 08:47:35', NULL, NULL),
(7, '2022-08-10 08:47:35', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `day_translations`
--

CREATE TABLE `day_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `day_id` int(11) NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `day_translations`
--

INSERT INTO `day_translations` (`id`, `day_id`, `locale`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'en', 'Sat', '2022-08-10 08:53:06', NULL, NULL),
(2, 1, 'ar', 'السبت', '2022-08-10 08:53:06', NULL, NULL),
(3, 2, 'en', 'Sun', '2022-08-10 08:53:06', NULL, NULL),
(4, 2, 'ar', 'الأحد', '2022-08-10 08:53:06', NULL, NULL),
(5, 3, 'en', 'Mon', '2022-08-10 08:53:06', NULL, NULL),
(6, 3, 'ar', 'Mon', '2022-08-10 08:53:06', NULL, NULL),
(7, 4, 'en', 'Tue', '2022-08-10 08:53:06', NULL, NULL),
(8, 4, 'ar', 'الثلاثاء', '2022-08-10 08:53:06', NULL, NULL),
(9, 5, 'en', 'Wed', '2022-08-10 08:53:06', NULL, NULL),
(10, 5, 'ar', 'الأربعاء', '2022-08-10 08:53:06', NULL, NULL),
(11, 6, 'en', 'Thr', '2022-08-10 08:53:06', NULL, NULL),
(12, 6, 'ar', 'الخميس', '2022-08-10 08:53:06', NULL, NULL),
(13, 7, 'en', 'Fri', '2022-08-10 08:53:06', NULL, NULL),
(14, 7, 'ar', 'الجمعة', '2022-08-10 08:53:06', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `extras`
--

CREATE TABLE `extras` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `meal_id` int(11) NOT NULL,
  `price` double NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `extras`
--

INSERT INTO `extras` (`id`, `meal_id`, `price`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 0, 117, '2022-08-09 08:36:56', '2022-08-09 08:36:56', NULL),
(2, 0, 1, '2022-08-09 08:36:56', '2022-08-09 08:36:56', NULL),
(3, 0, 2, '2022-08-09 08:36:56', '2022-08-09 08:36:56', NULL),
(4, 5, 922, '2022-08-09 08:38:58', '2022-08-09 08:55:24', '2022-08-09 08:55:24'),
(5, 5, 864, '2022-08-09 08:38:58', '2022-08-09 08:55:24', '2022-08-09 08:55:24'),
(6, 5, 612, '2022-08-09 08:38:58', '2022-08-09 08:55:24', '2022-08-09 08:55:24'),
(7, 5, 922, '2022-08-09 08:55:24', '2022-08-09 08:55:34', '2022-08-09 08:55:34'),
(8, 5, 864, '2022-08-09 08:55:24', '2022-08-09 08:55:34', '2022-08-09 08:55:34'),
(9, 5, 612, '2022-08-09 08:55:24', '2022-08-09 08:55:34', '2022-08-09 08:55:34'),
(10, 5, 1, '2022-08-09 08:55:24', '2022-08-09 08:55:34', '2022-08-09 08:55:34'),
(11, 5, 922, '2022-08-09 08:55:34', '2022-08-09 08:55:42', '2022-08-09 08:55:42'),
(12, 5, 864, '2022-08-09 08:55:34', '2022-08-09 08:55:42', '2022-08-09 08:55:42'),
(13, 5, 612, '2022-08-09 08:55:34', '2022-08-09 08:55:42', '2022-08-09 08:55:42'),
(14, 5, 1, '2022-08-09 08:55:34', '2022-08-09 08:55:42', '2022-08-09 08:55:42'),
(15, 5, 2, '2022-08-09 08:55:34', '2022-08-09 08:55:42', '2022-08-09 08:55:42'),
(16, 5, 612, '2022-08-09 08:55:42', '2022-08-09 08:55:42', NULL),
(17, 5, 1, '2022-08-09 08:55:42', '2022-08-09 08:55:42', NULL),
(18, 5, 2, '2022-08-09 08:55:42', '2022-08-09 08:55:42', NULL),
(19, 4, 1, '2022-08-09 08:59:25', '2022-08-09 08:59:37', '2022-08-09 08:59:37'),
(20, 4, 2, '2022-08-09 08:59:25', '2022-08-09 08:59:37', '2022-08-09 08:59:37'),
(21, 4, 1, '2022-08-09 08:59:37', '2022-08-09 08:59:43', '2022-08-09 08:59:43'),
(22, 4, 2, '2022-08-09 08:59:37', '2022-08-09 08:59:43', '2022-08-09 08:59:43'),
(23, 4, 3, '2022-08-09 08:59:37', '2022-08-09 08:59:43', '2022-08-09 08:59:43'),
(24, 4, 1, '2022-08-09 08:59:43', '2022-08-09 08:59:43', NULL),
(25, 4, 3, '2022-08-09 08:59:43', '2022-08-09 08:59:43', NULL),
(26, 1, 1, '2022-08-10 04:09:41', '2022-08-10 04:10:26', '2022-08-10 04:10:26'),
(27, 6, 1, '2022-08-10 04:12:11', '2022-08-10 04:12:39', '2022-08-10 04:12:39'),
(28, 6, 1, '2022-08-10 04:12:39', '2022-08-10 04:12:40', '2022-08-10 04:12:40'),
(29, 6, 1, '2022-08-10 04:12:40', '2022-08-10 04:12:45', '2022-08-10 04:12:45'),
(30, 7, 1, '2022-08-10 04:20:21', '2022-08-10 04:21:33', '2022-08-10 04:21:33'),
(31, 7, 1, '2022-08-10 04:21:33', '2022-08-10 04:21:33', NULL),
(32, 1, 123, '2022-08-10 06:48:18', '2022-08-10 06:48:18', NULL),
(33, 1, 12, '2022-08-10 06:48:18', '2022-08-10 06:48:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `extra_translations`
--

CREATE TABLE `extra_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `extra_id` int(11) NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `extra_translations`
--

INSERT INTO `extra_translations` (`id`, `extra_id`, `locale`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'en', 'Carson Bush', '2022-08-09 08:36:56', '2022-08-09 08:36:56', NULL),
(2, 1, 'ar', 'Emmanuel Yang', '2022-08-09 08:36:56', '2022-08-09 08:36:56', NULL),
(3, 2, 'en', '1', '2022-08-09 08:36:56', '2022-08-09 08:36:56', NULL),
(4, 2, 'ar', '1', '2022-08-09 08:36:56', '2022-08-09 08:36:56', NULL),
(5, 3, 'en', '2', '2022-08-09 08:36:56', '2022-08-09 08:36:56', NULL),
(6, 3, 'ar', '2', '2022-08-09 08:36:56', '2022-08-09 08:36:56', NULL),
(7, 4, 'en', 'Yetta Mcintosh', '2022-08-09 08:38:58', '2022-08-09 08:38:58', NULL),
(8, 4, 'ar', 'Luke Cobb', '2022-08-09 08:38:58', '2022-08-09 08:38:58', NULL),
(9, 5, 'en', 'Montana Lowe', '2022-08-09 08:38:58', '2022-08-09 08:38:58', NULL),
(10, 5, 'ar', 'Buffy Huffman', '2022-08-09 08:38:58', '2022-08-09 08:38:58', NULL),
(11, 6, 'en', 'Cairo Stewart', '2022-08-09 08:38:58', '2022-08-09 08:38:58', NULL),
(12, 6, 'ar', 'Jillian Robles', '2022-08-09 08:38:58', '2022-08-09 08:38:58', NULL),
(13, 7, 'en', 'Yetta Mcintosh', '2022-08-09 08:55:24', '2022-08-09 08:55:24', NULL),
(14, 7, 'ar', 'Luke Cobb', '2022-08-09 08:55:24', '2022-08-09 08:55:24', NULL),
(15, 8, 'en', 'Montana Lowe', '2022-08-09 08:55:24', '2022-08-09 08:55:24', NULL),
(16, 8, 'ar', 'Buffy Huffman', '2022-08-09 08:55:24', '2022-08-09 08:55:24', NULL),
(17, 9, 'en', 'Cairo Stewart', '2022-08-09 08:55:24', '2022-08-09 08:55:24', NULL),
(18, 9, 'ar', 'Jillian Robles', '2022-08-09 08:55:24', '2022-08-09 08:55:24', NULL),
(19, 10, 'en', '1', '2022-08-09 08:55:24', '2022-08-09 08:55:24', NULL),
(20, 10, 'ar', '1', '2022-08-09 08:55:24', '2022-08-09 08:55:24', NULL),
(21, 11, 'en', 'Yetta Mcintosh', '2022-08-09 08:55:34', '2022-08-09 08:55:34', NULL),
(22, 11, 'ar', 'Luke Cobb', '2022-08-09 08:55:34', '2022-08-09 08:55:34', NULL),
(23, 12, 'en', 'Montana Lowe', '2022-08-09 08:55:34', '2022-08-09 08:55:34', NULL),
(24, 12, 'ar', 'Buffy Huffman', '2022-08-09 08:55:34', '2022-08-09 08:55:34', NULL),
(25, 13, 'en', 'Cairo Stewart', '2022-08-09 08:55:34', '2022-08-09 08:55:34', NULL),
(26, 13, 'ar', 'Jillian Robles', '2022-08-09 08:55:34', '2022-08-09 08:55:34', NULL),
(27, 14, 'en', '1', '2022-08-09 08:55:34', '2022-08-09 08:55:34', NULL),
(28, 14, 'ar', '1', '2022-08-09 08:55:34', '2022-08-09 08:55:34', NULL),
(29, 15, 'en', '2', '2022-08-09 08:55:34', '2022-08-09 08:55:34', NULL),
(30, 15, 'ar', '2', '2022-08-09 08:55:34', '2022-08-09 08:55:34', NULL),
(31, 16, 'en', 'Cairo Stewart', '2022-08-09 08:55:42', '2022-08-09 08:55:42', NULL),
(32, 16, 'ar', 'Jillian Robles', '2022-08-09 08:55:42', '2022-08-09 08:55:42', NULL),
(33, 17, 'en', '1', '2022-08-09 08:55:42', '2022-08-09 08:55:42', NULL),
(34, 17, 'ar', '1', '2022-08-09 08:55:42', '2022-08-09 08:55:42', NULL),
(35, 18, 'en', '2', '2022-08-09 08:55:42', '2022-08-09 08:55:42', NULL),
(36, 18, 'ar', '2', '2022-08-09 08:55:42', '2022-08-09 08:55:42', NULL),
(37, 19, 'en', '1', '2022-08-09 08:59:25', '2022-08-09 08:59:25', NULL),
(38, 19, 'ar', '1', '2022-08-09 08:59:25', '2022-08-09 08:59:25', NULL),
(39, 20, 'en', '2', '2022-08-09 08:59:25', '2022-08-09 08:59:25', NULL),
(40, 20, 'ar', '2', '2022-08-09 08:59:25', '2022-08-09 08:59:25', NULL),
(41, 21, 'en', '1', '2022-08-09 08:59:37', '2022-08-09 08:59:37', NULL),
(42, 21, 'ar', '1', '2022-08-09 08:59:37', '2022-08-09 08:59:37', NULL),
(43, 22, 'en', '2', '2022-08-09 08:59:37', '2022-08-09 08:59:37', NULL),
(44, 22, 'ar', '2', '2022-08-09 08:59:37', '2022-08-09 08:59:37', NULL),
(45, 23, 'en', '3', '2022-08-09 08:59:37', '2022-08-09 08:59:37', NULL),
(46, 23, 'ar', '3', '2022-08-09 08:59:37', '2022-08-09 08:59:37', NULL),
(47, 24, 'en', '1', '2022-08-09 08:59:43', '2022-08-09 08:59:43', NULL),
(48, 24, 'ar', '1', '2022-08-09 08:59:43', '2022-08-09 08:59:43', NULL),
(49, 25, 'en', '3', '2022-08-09 08:59:43', '2022-08-09 08:59:43', NULL),
(50, 25, 'ar', '3', '2022-08-09 08:59:43', '2022-08-09 08:59:43', NULL),
(51, 26, 'en', '1', '2022-08-10 04:09:41', '2022-08-10 04:09:41', NULL),
(52, 26, 'ar', '1', '2022-08-10 04:09:41', '2022-08-10 04:09:41', NULL),
(53, 27, 'en', '1', '2022-08-10 04:12:11', '2022-08-10 04:12:11', NULL),
(54, 27, 'ar', '1', '2022-08-10 04:12:11', '2022-08-10 04:12:11', NULL),
(55, 28, 'en', '1', '2022-08-10 04:12:39', '2022-08-10 04:12:39', NULL),
(56, 28, 'ar', '1', '2022-08-10 04:12:39', '2022-08-10 04:12:39', NULL),
(57, 29, 'en', '1', '2022-08-10 04:12:40', '2022-08-10 04:12:40', NULL),
(58, 29, 'ar', '1', '2022-08-10 04:12:40', '2022-08-10 04:12:40', NULL),
(59, 30, 'en', '1', '2022-08-10 04:20:21', '2022-08-10 04:20:21', NULL),
(60, 30, 'ar', '1', '2022-08-10 04:20:21', '2022-08-10 04:20:21', NULL),
(61, 31, 'en', '1', '2022-08-10 04:21:33', '2022-08-10 04:21:33', NULL),
(62, 31, 'ar', '1', '2022-08-10 04:21:33', '2022-08-10 04:21:33', NULL),
(63, 32, 'en', 'garlic', '2022-08-10 06:48:18', '2022-08-10 06:48:18', NULL),
(64, 32, 'ar', 'garlic  ar', '2022-08-10 06:48:18', '2022-08-10 06:48:18', NULL),
(65, 33, 'en', 'garlic 2', '2022-08-10 06:48:18', '2022-08-10 06:48:18', NULL),
(66, 33, 'ar', 'garlic 2 ae', '2022-08-10 06:48:18', '2022-08-10 06:48:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `flag` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `lang`, `flag`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'en', '', NULL, NULL, NULL),
(2, 'ar', '', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `language_translation`
--

CREATE TABLE `language_translation` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `language_id` int(11) NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `language_translation`
--

INSERT INTO `language_translation` (`id`, `language_id`, `locale`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'en', 'English', NULL, NULL, NULL),
(2, 1, 'ar', 'إنجليزي', NULL, NULL, NULL),
(3, 2, 'en', 'Arabic', NULL, NULL, NULL),
(4, 2, 'ar', 'عربي', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `meals`
--

CREATE TABLE `meals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `category_id` int(11) NOT NULL DEFAULT 0,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double NOT NULL DEFAULT 0,
  `price_offer` double NOT NULL DEFAULT 0,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `status` enum('active','not_active') COLLATE utf8mb4_unicode_ci NOT NULL,
  `best_selling` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '1->yes , 0->no',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `meals`
--

INSERT INTO `meals` (`id`, `user_id`, `category_id`, `image`, `price`, `price_offer`, `sort_order`, `status`, `best_selling`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 'tfvL3kRuGXW4VdV19501921660114883_9597654.png', 1, 1, 1, 'active', '1', '2022-08-09 04:07:48', '2022-08-14 05:26:12', NULL),
(2, 1, 0, 'EgneZDKroXzHPAM28001931660030782_9313546.png', 10, 9, 2, 'active', '0', '2022-08-09 04:33:18', '2022-08-09 04:41:48', '2022-08-09 04:41:48'),
(3, 2, 1, '5oZSlbq9c0YmcAz90841391660030967_1569638.png', 10, 0, 2, 'active', '1', '2022-08-09 04:42:47', '2022-08-10 12:46:42', NULL),
(4, 1, 1, '7i9JRpnGByVPTVQ82656811660045016_4482096.png', 61, 913, 13, 'active', '1', '2022-08-09 08:36:56', '2022-08-09 08:36:56', NULL),
(5, 1, 1, '1CtsGjZ0AKxvYGQ84852751660045138_7456287.png', 803, 434, 91, 'active', '0', '2022-08-09 08:38:58', '2022-08-09 08:38:58', NULL),
(6, 1, 1, '1GRuMlbiP2ArOEK65745261660115531_5124599.png', 1000, 12, 1, 'active', '1', '2022-08-10 04:12:11', '2022-08-10 04:12:11', NULL),
(7, 1, 2, 'gSunc2t3cp7nnlf65892831660116021_5418052.png', 1, 11, 1, 'active', '1', '2022-08-10 04:20:21', '2022-08-10 08:28:06', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `meal_images`
--

CREATE TABLE `meal_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `meal_id` int(11) NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `meal_images`
--

INSERT INTO `meal_images` (`id`, `meal_id`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, '6SHOSpv716600303984534031.jpg', '2022-08-09 04:33:19', '2022-08-09 04:33:19', NULL),
(2, 2, 'tJPD5kx116600303994134620.jpg', '2022-08-09 04:33:19', '2022-08-09 04:33:19', NULL),
(3, 2, 'GpwiWlGs16600303993633235.jpg', '2022-08-09 04:33:19', '2022-08-09 04:33:19', NULL),
(4, 2, 'sZ9b0KYI16600303994656948.jpg', '2022-08-09 04:33:19', '2022-08-09 04:33:19', NULL),
(5, 2, 'yQZ1st7P16600303996996044.jpg', '2022-08-09 04:33:19', '2022-08-09 04:33:19', NULL),
(6, 2, 'foCjXXgC16600303998997452.jpg', '2022-08-09 04:33:19', '2022-08-09 04:33:19', NULL),
(7, 3, '7lBoiH5m16600309671183617.jpg', '2022-08-09 04:42:48', '2022-08-09 04:42:48', NULL),
(8, 3, 'v4pXTpk216600309686942465.jpg', '2022-08-09 04:42:48', '2022-08-09 04:42:48', NULL),
(9, 3, 'rAk6XvEf16600309685238024.jpg', '2022-08-09 04:42:48', '2022-08-09 04:42:48', NULL),
(10, 3, 'adHFM2Uk16600309684765367.jpg', '2022-08-09 04:42:48', '2022-08-09 04:42:48', NULL),
(11, 3, 'Rcis1cxN16600309685289171.jpg', '2022-08-09 04:42:48', '2022-08-09 04:42:48', NULL),
(12, 3, 'MQ0OaRay16600309689435204.jpg', '2022-08-09 04:42:48', '2022-08-09 04:42:48', NULL),
(13, 4, 'Wf4shjMF16600450165805208.jpg', '2022-08-09 08:36:56', '2022-08-09 08:36:56', NULL),
(14, 4, '2k8BnWyX16600450169388102.jpg', '2022-08-09 08:36:56', '2022-08-09 08:36:56', NULL),
(15, 4, '5ixv85ay16600450162399474.jpg', '2022-08-09 08:36:56', '2022-08-09 08:36:56', NULL),
(16, 4, 'bcYzpi5t16600450166054357.jpg', '2022-08-09 08:36:56', '2022-08-09 08:36:56', NULL),
(17, 4, 'd6QvJlYW16600450169997287.jpg', '2022-08-09 08:36:57', '2022-08-09 08:36:57', NULL),
(18, 4, 'ii0nY5Tc16600450172646476.jpg', '2022-08-09 08:36:57', '2022-08-09 08:36:57', NULL),
(19, 4, 'p6ylhLJ216600450179396489.jpg', '2022-08-09 08:36:57', '2022-08-09 08:36:57', NULL),
(20, 4, 'IXXyyWYi16600450175899583.jpg', '2022-08-09 08:36:57', '2022-08-09 08:36:57', NULL),
(21, 5, 'rQoydNwT16600451389887531.jpg', '2022-08-09 08:38:58', '2022-08-09 08:38:58', NULL),
(22, 5, 'DIEMlEh416600451385270534.jpg', '2022-08-09 08:38:58', '2022-08-09 08:38:58', NULL),
(23, 5, 'YNCSHA3y16600451387909976.jpg', '2022-08-09 08:38:58', '2022-08-09 08:38:58', NULL),
(24, 5, '9026DHiv16600451384795495.jpg', '2022-08-09 08:38:58', '2022-08-09 08:38:58', NULL),
(25, 5, '58psO7PQ16600451383247435.jpg', '2022-08-09 08:38:58', '2022-08-09 08:38:58', NULL),
(26, 5, 'SE0QdWPX16600451385971161.jpg', '2022-08-09 08:38:59', '2022-08-09 08:38:59', NULL),
(27, 6, 'sqVAi67E16601155317141167.jpg', '2022-08-10 04:12:11', '2022-08-10 04:12:11', NULL),
(28, 6, 'PnjfOtCX16601155316125238.jpg', '2022-08-10 04:12:11', '2022-08-10 04:12:11', NULL),
(29, 6, 'RgvKesm016601155317142775.jpg', '2022-08-10 04:12:12', '2022-08-10 04:12:12', NULL),
(30, 6, 'zuhVwdV816601155322962756.jpg', '2022-08-10 04:12:12', '2022-08-10 04:12:12', NULL),
(31, 7, 'vqQujQ8Y16601160214472919.jpg', '2022-08-10 04:20:21', '2022-08-10 04:20:21', NULL),
(32, 7, 'H6NEwij216601160217802788.jpg', '2022-08-10 04:20:21', '2022-08-10 04:21:33', '2022-08-10 04:21:33'),
(33, 7, 'ZHzyO9Zn16601160217598669.jpg', '2022-08-10 04:20:21', '2022-08-10 04:21:33', '2022-08-10 04:21:33'),
(34, 7, 'whjALaWw16601160215211677.jpg', '2022-08-10 04:20:22', '2022-08-10 04:20:22', NULL),
(35, 7, '2n7mSIzk16601160229762336.jpg', '2022-08-10 04:20:22', '2022-08-10 04:20:22', NULL),
(36, 1, 'VFRYFAbo16601248989644208.jpg', '2022-08-10 06:48:18', '2022-08-10 06:48:18', NULL),
(37, 1, 'VIwx6Dn416601248989131606.jpg', '2022-08-10 06:48:18', '2022-08-10 06:48:18', NULL),
(38, 1, '5ezqJybe16601248988207879.jpg', '2022-08-10 06:48:18', '2022-08-10 06:48:18', NULL),
(39, 1, 'kTfR9FP316601248987877583.jpg', '2022-08-10 06:48:18', '2022-08-10 06:48:18', NULL),
(40, 1, 'YkfB9SF416601248982508136.jpg', '2022-08-10 06:48:19', '2022-08-10 06:48:19', NULL),
(41, 1, 'w4Erldxy16601248992748193.jpg', '2022-08-10 06:48:19', '2022-08-10 06:48:19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `meal_translations`
--

CREATE TABLE `meal_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `meal_id` int(11) NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `meal_translations`
--

INSERT INTO `meal_translations` (`id`, `meal_id`, `locale`, `title`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'en', '1', '11', '2022-08-09 04:07:48', '2022-08-09 04:07:48', NULL),
(2, 1, 'ar', '1', '1', '2022-08-09 04:07:48', '2022-08-09 04:07:48', NULL),
(3, 2, 'en', 'hello', 'hello hello', '2022-08-09 04:33:18', '2022-08-09 04:33:18', NULL),
(4, 2, 'ar', 'يسيسيسس', 'سييسيسي', '2022-08-09 04:33:18', '2022-08-09 04:33:18', NULL),
(5, 3, 'en', 'shawerma', 'shawerma shawerma shawerma', '2022-08-09 04:42:47', '2022-08-09 04:42:47', NULL),
(6, 3, 'ar', 'شاورما', 'شاورما شاورما شاورما', '2022-08-09 04:42:47', '2022-08-09 04:42:47', NULL),
(7, 4, 'en', 'Voluptas reiciendis', 'Quidem illum nemo excepteur occaecat maxime qui nostrum iste et fugiat ipsum quia minima quis', '2022-08-09 08:36:56', '2022-08-09 08:36:56', NULL),
(8, 4, 'ar', 'Reprehenderit ipsum', 'In dolore alias dolores et', '2022-08-09 08:36:56', '2022-08-09 08:36:56', NULL),
(9, 5, 'en', 'In ut voluptatem ea', 'Dolor eveniet libero qui ducimus nobis doloribus minus ex reiciendis est laudantium tenetur quis est sed nisi vel perspiciatis nisi', '2022-08-09 08:38:58', '2022-08-09 08:38:58', NULL),
(10, 5, 'ar', 'Harum libero volupta', 'Incididunt quo consequuntur cupiditate dolorum minima sequi autem dolor est id quo doloribus veniam pariatur Corporis', '2022-08-09 08:38:58', '2022-08-09 08:38:58', NULL),
(11, 6, 'en', '1', '1', '2022-08-10 04:12:11', '2022-08-10 04:12:11', NULL),
(12, 6, 'ar', '1', '1', '2022-08-10 04:12:11', '2022-08-10 04:12:11', NULL),
(13, 7, 'en', '1', '1', '2022-08-10 04:20:21', '2022-08-10 04:20:21', NULL),
(14, 7, 'ar', '1', '11', '2022-08-10 04:20:21', '2022-08-10 04:20:21', NULL);

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
(1, '0000_00_00_000000_create_websockets_statistics_entries_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(5, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(6, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(7, '2016_06_01_000004_create_oauth_clients_table', 1),
(8, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(9, '2019_08_19_000000_create_failed_jobs_table', 1),
(10, '2022_02_05_120404_create_settings_table', 1),
(11, '2022_02_05_120430_create_setting_translations_table', 1),
(12, '2022_03_04_115027_create_contacts_table', 1),
(13, '2022_03_07_201822_create_pages_table', 1),
(14, '2022_03_07_201850_create_page_translations_table', 1),
(15, '2022_03_20_132959_create_languages_table', 1),
(16, '2022_03_20_133027_create_language_translation_table', 1),
(17, '2022_05_24_063926_create_varification_codes_table', 1),
(18, '2022_08_07_080113_create_user_translations_table', 1),
(19, '2022_08_07_095539_create_cuisines_table', 2),
(20, '2022_08_07_095556_create_cuisine_translations_table', 2),
(21, '2022_08_07_104845_create_user_images_table', 3),
(22, '2022_08_07_105720_create_user_cuisines_table', 4),
(23, '2022_02_28_125214_create_categories_table', 5),
(24, '2022_02_28_125336_create_category_translations_table', 5),
(25, '2022_08_09_054954_create_meals_table', 6),
(26, '2022_08_09_055048_create_meal_translations_table', 6),
(27, '2022_08_09_060402_create_meal_images_table', 6),
(28, '2022_08_09_084953_create_options_table', 7),
(29, '2022_08_09_085016_create_option_translations_table', 7),
(30, '2022_08_09_091355_create_option_values_table', 7),
(31, '2022_08_09_091417_create_option_value_translations_table', 7),
(32, '2022_08_09_112544_create_extras_table', 8),
(33, '2022_08_09_112600_create_extra_translations_table', 8),
(34, '2022_08_09_122510_create_option_option_values_table', 9),
(35, '2022_08_10_084001_create_days_table', 10),
(36, '2022_08_10_084028_create_day_translations_table', 10),
(37, '2022_08_10_085526_create_times_table', 11),
(38, '2022_08_10_095236_create_carts_table', 12),
(39, '2022_08_10_095305_create_cart_options_table', 12),
(40, '2022_08_10_095322_create_cart_extras_table', 12),
(41, '2022_07_24_073256_create_promo_codes_table', 13),
(42, '2022_07_25_085907_create_orders_table', 14),
(44, '2022_07_25_085922_create_order_products_table', 15),
(45, '2022_08_14_081853_create_order_product_options_table', 15),
(46, '2022_08_14_081921_create_order_product_extras_table', 15),
(47, '2022_08_14_082650_create_order_meals_table', 16),
(48, '2022_08_14_082903_create_order_meal_options_table', 17),
(49, '2022_08_14_082959_create_order_meal_extras_table', 17);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `meal_id` int(11) NOT NULL,
  `options_type` int(11) NOT NULL DEFAULT 0 COMMENT '0->optional , 1->mandatory',
  `selection_type` int(11) NOT NULL DEFAULT 0 COMMENT '0->single , 1->multiple',
  `minimum_value` int(11) NOT NULL,
  `maximum_value` int(11) NOT NULL,
  `sort_order` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `meal_id`, `options_type`, `selection_type`, `minimum_value`, `maximum_value`, `sort_order`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 0, 0, 0, 2, '2022-08-10 02:51:29', '2022-08-11 08:43:12', NULL),
(2, 1, 0, 0, 1, 1, 1, '2022-08-10 03:58:05', '2022-08-11 08:45:20', NULL),
(3, 3, 1, 1, 1, 2, 1, '2022-08-10 05:02:51', '2022-08-11 08:18:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `option_option_values`
--

CREATE TABLE `option_option_values` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `option_id` int(11) NOT NULL,
  `option_value_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `option_option_values`
--

INSERT INTO `option_option_values` (`id`, `option_id`, `option_value_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(9, 2, 4, '2022-08-10 06:58:05', NULL, NULL),
(34, 1, 3, '2022-08-10 08:00:53', NULL, NULL),
(35, 1, 4, '2022-08-10 08:00:53', NULL, NULL),
(37, 3, 3, '2022-08-11 11:18:45', NULL, NULL),
(38, 3, 4, '2022-08-11 11:18:45', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `option_translations`
--

CREATE TABLE `option_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `option_id` int(11) NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `option_translations`
--

INSERT INTO `option_translations` (`id`, `option_id`, `locale`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'en', 'mmm', '2022-08-10 02:51:29', '2022-08-10 02:51:29', NULL),
(2, 1, 'ar', 'المقبلات', '2022-08-10 02:51:29', '2022-08-10 02:51:29', NULL),
(3, 2, 'en', '1', '2022-08-10 03:58:05', '2022-08-10 03:58:05', NULL),
(4, 2, 'ar', '1', '2022-08-10 03:58:05', '2022-08-10 03:58:05', NULL),
(5, 3, 'en', '1', '2022-08-10 05:02:51', '2022-08-10 05:02:51', NULL),
(6, 3, 'ar', '1', '2022-08-10 05:02:51', '2022-08-10 05:02:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `option_values`
--

CREATE TABLE `option_values` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `price` double NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `option_values`
--

INSERT INTO `option_values` (`id`, `user_id`, `price`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 1, 10, '2022-08-09 06:42:55', '2022-08-09 06:42:55', NULL),
(4, 1, 3, '2022-08-09 06:43:18', '2022-08-09 06:43:18', NULL),
(5, 1, 3, '2022-08-09 06:43:18', '2022-08-09 06:43:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `option_value_translations`
--

CREATE TABLE `option_value_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `option_value_id` int(11) NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `option_value_translations`
--

INSERT INTO `option_value_translations` (`id`, `option_value_id`, `locale`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 3, 'en', 'botato', '2022-08-09 06:42:55', '2022-08-09 06:42:55', NULL),
(4, 3, 'ar', 'بطاطا', '2022-08-09 06:42:55', '2022-08-09 06:42:55', NULL),
(5, 4, 'en', 'mionaz', '2022-08-09 06:43:18', '2022-08-09 06:43:18', NULL),
(6, 4, 'ar', 'مايونيز', '2022-08-09 06:43:18', '2022-08-09 06:43:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `provider_id` int(11) NOT NULL DEFAULT 0,
  `fcm_token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total` double NOT NULL,
  `sub_total` double NOT NULL,
  `discount` double NOT NULL DEFAULT 0,
  `promo_code_id` int(11) DEFAULT NULL,
  `promo_code_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `promo_code_amount` double DEFAULT NULL,
  `promo_code_type` double DEFAULT NULL COMMENT '0->percentage , 1->amount',
  `customer_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_method` int(11) NOT NULL COMMENT '1-> online , 2-> cache_on_pickup',
  `payment_status` int(11) NOT NULL DEFAULT 0 COMMENT '1 ->yes , 0->no',
  `payment_ref` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_date` date NOT NULL,
  `status` enum('1','2','3','4','5') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1->confirmed, 2-> under_preparing , 3->ready_for_pickup , 4->completed , 5->canceled',
  `refuse_comment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `provider_id`, `fcm_token`, `total`, `sub_total`, `discount`, `promo_code_id`, `promo_code_name`, `promo_code_amount`, `promo_code_type`, `customer_name`, `customer_email`, `customer_mobile`, `payment_method`, `payment_status`, `payment_ref`, `order_date`, `status`, `refuse_comment`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 0, 0, '123', 225.9, 251, 25.1, 3, 'hexa', 10, NULL, 'mahmoud', '', '1234567890', 2, 0, NULL, '2022-08-14', '1', NULL, '2022-08-14 08:02:26', '2022-08-14 08:02:26', NULL),
(2, 0, 0, '123', 225.9, 251, 25.1, 3, 'hexa', 10, NULL, 'mahmoud', '', '1234567890', 2, 0, NULL, '2022-08-14', '1', NULL, '2022-08-14 08:04:10', '2022-08-14 08:04:10', NULL),
(3, 0, 0, '123', 225.9, 251, 25.1, 3, 'hexa', 10, 0, 'mahmoud', '', '1234567890', 1, 0, NULL, '2022-08-14', '1', NULL, '2022-08-14 08:18:19', '2022-08-14 08:18:19', NULL),
(4, 0, 0, '123', 225.9, 251, 25.1, 3, 'hexa', 10, 0, 'mahmoud', '', '1234567890', 1, 0, NULL, '2022-08-14', '1', NULL, '2022-08-14 08:18:24', '2022-08-14 08:18:24', NULL),
(5, 0, 0, '123', 225.9, 251, 25.1, 3, 'hexa', 10, 0, 'mahmoud', '', '1234567890', 1, 0, NULL, '2022-08-14', '1', NULL, '2022-08-14 08:19:40', '2022-08-14 08:19:40', NULL),
(6, 0, 0, '123', 225.9, 251, 25.1, 3, 'hexa', 10, 0, 'mahmoud', '', '1234567890', 1, 0, NULL, '2022-08-14', '1', NULL, '2022-08-14 08:22:20', '2022-08-14 08:22:20', NULL),
(7, 0, 1, '123', 225.9, 251, 25.1, 3, 'hexa', 10, 0, 'mahmoud', '', '1234567890', 1, 0, NULL, '2022-08-14', '1', NULL, '2022-08-14 08:25:57', '2022-08-14 08:25:57', NULL),
(8, 0, 1, '123', 251, 251, 0, NULL, NULL, NULL, NULL, 'mahmoud', '', '1234567890', 1, 0, NULL, '2022-08-15', '1', NULL, '2022-08-15 02:35:12', '2022-08-15 02:35:12', NULL),
(9, 0, 1, '123', 251, 251, 0, NULL, NULL, NULL, NULL, 'mahmoud', '', '1234567890', 1, 0, NULL, '2022-08-15', '1', NULL, '2022-08-15 02:36:42', '2022-08-15 02:36:42', NULL),
(10, 0, 1, '123', 251, 251, 0, NULL, NULL, NULL, NULL, 'mahmoud', '', '1234567890', 1, 0, NULL, '2022-08-15', '1', NULL, '2022-08-15 02:37:36', '2022-08-15 02:37:36', NULL),
(11, 0, 1, '123', 251, 251, 0, NULL, NULL, NULL, NULL, 'mahmoud', '', '1234567890', 1, 0, NULL, '2022-08-15', '1', NULL, '2022-08-15 02:39:04', '2022-08-15 02:39:04', NULL),
(12, 0, 1, '123', 225.9, 251, 25.1, 3, 'hexa', 10, 0, 'mahmoud', '', '1234567890', 1, 0, NULL, '2022-08-15', '1', NULL, '2022-08-15 02:41:50', '2022-08-15 02:41:50', NULL),
(13, 0, 1, '123', 225.9, 251, 25.1, 3, 'hexa', 10, 0, 'mahmoud', '', '1234567890', 1, 0, NULL, '2022-08-15', '1', NULL, '2022-08-15 02:42:09', '2022-08-15 02:42:09', NULL),
(14, 0, 1, '123', 225.9, 251, 25.1, 3, 'hexa', 10, 0, 'mahmoud', '', '1234567890', 1, 0, NULL, '2022-08-15', '1', NULL, '2022-08-15 04:52:49', '2022-08-15 04:52:49', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_meals`
--

CREATE TABLE `order_meals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `meal_id` int(11) NOT NULL,
  `price` double NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_meals`
--

INSERT INTO `order_meals` (`id`, `order_id`, `meal_id`, `price`, `quantity`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 1, 2, '2022-08-14 08:02:26', '2022-08-14 08:02:26', NULL),
(2, 2, 1, 1, 2, '2022-08-14 08:04:10', '2022-08-14 08:04:10', NULL),
(3, 3, 1, 1, 2, '2022-08-14 08:18:19', '2022-08-14 08:18:19', NULL),
(4, 4, 1, 1, 2, '2022-08-14 08:18:24', '2022-08-14 08:18:24', NULL),
(5, 5, 1, 1, 2, '2022-08-14 08:19:40', '2022-08-14 08:19:40', NULL),
(6, 6, 1, 1, 2, '2022-08-14 08:22:20', '2022-08-14 08:22:20', NULL),
(7, 7, 1, 1, 2, '2022-08-14 08:25:57', '2022-08-14 08:25:57', NULL),
(8, 8, 1, 1, 2, '2022-08-15 02:35:12', '2022-08-15 02:35:12', NULL),
(9, 9, 1, 1, 2, '2022-08-15 02:36:42', '2022-08-15 02:36:42', NULL),
(10, 10, 1, 1, 2, '2022-08-15 02:37:36', '2022-08-15 02:37:36', NULL),
(11, 11, 1, 1, 2, '2022-08-15 02:39:04', '2022-08-15 02:39:04', NULL),
(12, 12, 1, 1, 2, '2022-08-15 02:41:50', '2022-08-15 02:41:50', NULL),
(13, 13, 1, 1, 2, '2022-08-15 02:42:09', '2022-08-15 02:42:09', NULL),
(14, 14, 1, 1, 2, '2022-08-15 04:52:49', '2022-08-15 04:52:49', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_meal_extras`
--

CREATE TABLE `order_meal_extras` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_meal_id` int(11) NOT NULL,
  `extra_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_meal_extras`
--

INSERT INTO `order_meal_extras` (`id`, `order_meal_id`, `extra_id`, `quantity`, `price`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 1, 0, 117, '2022-08-14 08:04:10', '2022-08-14 08:04:10', NULL),
(2, 2, 2, 0, 1, '2022-08-14 08:04:10', '2022-08-14 08:04:10', NULL),
(3, 3, 1, 0, 117, '2022-08-14 08:18:19', '2022-08-14 08:18:19', NULL),
(4, 3, 2, 0, 1, '2022-08-14 08:18:19', '2022-08-14 08:18:19', NULL),
(5, 4, 1, 0, 117, '2022-08-14 08:18:24', '2022-08-14 08:18:24', NULL),
(6, 4, 2, 0, 1, '2022-08-14 08:18:24', '2022-08-14 08:18:24', NULL),
(7, 5, 1, 0, 117, '2022-08-14 08:19:40', '2022-08-14 08:19:40', NULL),
(8, 5, 2, 0, 1, '2022-08-14 08:19:40', '2022-08-14 08:19:40', NULL),
(9, 6, 1, 0, 117, '2022-08-14 08:22:20', '2022-08-14 08:22:20', NULL),
(10, 6, 2, 0, 1, '2022-08-14 08:22:20', '2022-08-14 08:22:20', NULL),
(11, 7, 1, 0, 117, '2022-08-14 08:25:57', '2022-08-14 08:25:57', NULL),
(12, 7, 2, 0, 1, '2022-08-14 08:25:57', '2022-08-14 08:25:57', NULL),
(13, 8, 1, 0, 117, '2022-08-15 02:35:12', '2022-08-15 02:35:12', NULL),
(14, 8, 2, 0, 1, '2022-08-15 02:35:12', '2022-08-15 02:35:12', NULL),
(15, 9, 1, 0, 117, '2022-08-15 02:36:42', '2022-08-15 02:36:42', NULL),
(16, 9, 2, 0, 1, '2022-08-15 02:36:42', '2022-08-15 02:36:42', NULL),
(17, 10, 1, 0, 117, '2022-08-15 02:37:36', '2022-08-15 02:37:36', NULL),
(18, 10, 2, 0, 1, '2022-08-15 02:37:36', '2022-08-15 02:37:36', NULL),
(19, 11, 1, 0, 117, '2022-08-15 02:39:04', '2022-08-15 02:39:04', NULL),
(20, 11, 2, 0, 1, '2022-08-15 02:39:04', '2022-08-15 02:39:04', NULL),
(21, 12, 1, 0, 117, '2022-08-15 02:41:50', '2022-08-15 02:41:50', NULL),
(22, 12, 2, 0, 1, '2022-08-15 02:41:50', '2022-08-15 02:41:50', NULL),
(23, 13, 1, 0, 117, '2022-08-15 02:42:09', '2022-08-15 02:42:09', NULL),
(24, 13, 2, 0, 1, '2022-08-15 02:42:09', '2022-08-15 02:42:09', NULL),
(25, 14, 1, 0, 117, '2022-08-15 04:52:49', '2022-08-15 04:52:49', NULL),
(26, 14, 2, 0, 1, '2022-08-15 04:52:49', '2022-08-15 04:52:49', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_meal_options`
--

CREATE TABLE `order_meal_options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_meal_id` int(11) NOT NULL,
  `option_id` int(11) NOT NULL,
  `price` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_meal_options`
--

INSERT INTO `order_meal_options` (`id`, `order_meal_id`, `option_id`, `price`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 3, 10, '2022-08-14 08:04:10', '2022-08-14 08:04:10', NULL),
(2, 2, 4, 3, '2022-08-14 08:04:10', '2022-08-14 08:04:10', NULL),
(3, 3, 3, 10, '2022-08-14 08:18:19', '2022-08-14 08:18:19', NULL),
(4, 3, 4, 3, '2022-08-14 08:18:19', '2022-08-14 08:18:19', NULL),
(5, 4, 3, 10, '2022-08-14 08:18:24', '2022-08-14 08:18:24', NULL),
(6, 4, 4, 3, '2022-08-14 08:18:24', '2022-08-14 08:18:24', NULL),
(7, 5, 3, 10, '2022-08-14 08:19:40', '2022-08-14 08:19:40', NULL),
(8, 5, 4, 3, '2022-08-14 08:19:40', '2022-08-14 08:19:40', NULL),
(9, 6, 3, 10, '2022-08-14 08:22:20', '2022-08-14 08:22:20', NULL),
(10, 6, 4, 3, '2022-08-14 08:22:20', '2022-08-14 08:22:20', NULL),
(11, 7, 3, 10, '2022-08-14 08:25:57', '2022-08-14 08:25:57', NULL),
(12, 7, 4, 3, '2022-08-14 08:25:57', '2022-08-14 08:25:57', NULL),
(13, 8, 3, 10, '2022-08-15 02:35:12', '2022-08-15 02:35:12', NULL),
(14, 8, 4, 3, '2022-08-15 02:35:12', '2022-08-15 02:35:12', NULL),
(15, 9, 3, 10, '2022-08-15 02:36:42', '2022-08-15 02:36:42', NULL),
(16, 9, 4, 3, '2022-08-15 02:36:42', '2022-08-15 02:36:42', NULL),
(17, 10, 3, 10, '2022-08-15 02:37:36', '2022-08-15 02:37:36', NULL),
(18, 10, 4, 3, '2022-08-15 02:37:36', '2022-08-15 02:37:36', NULL),
(19, 11, 3, 10, '2022-08-15 02:39:04', '2022-08-15 02:39:04', NULL),
(20, 11, 4, 3, '2022-08-15 02:39:04', '2022-08-15 02:39:04', NULL),
(21, 12, 3, 10, '2022-08-15 02:41:50', '2022-08-15 02:41:50', NULL),
(22, 12, 4, 3, '2022-08-15 02:41:50', '2022-08-15 02:41:50', NULL),
(23, 13, 3, 10, '2022-08-15 02:42:09', '2022-08-15 02:42:09', NULL),
(24, 13, 4, 3, '2022-08-15 02:42:09', '2022-08-15 02:42:09', NULL),
(25, 14, 3, 10, '2022-08-15 04:52:49', '2022-08-15 04:52:49', NULL),
(26, 14, 4, 3, '2022-08-15 04:52:49', '2022-08-15 04:52:49', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `views` int(11) NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','not_active') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `image`, `views`, `slug`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'image.png', 1, 'about-us', 'active', '2022-08-07 08:03:36', NULL, NULL),
(2, 'image.png', 1, 'privacy-policy', 'active', '2022-08-07 08:03:36', NULL, NULL),
(3, 'image.png', 1, 'terms-of-use', 'active', '2022-08-07 08:03:36', NULL, NULL),
(4, 'image.png', 1, 'return_policy_page', 'active', '2022-08-07 08:03:36', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `page_translations`
--

CREATE TABLE `page_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page_id` int(11) NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `page_translations`
--

INSERT INTO `page_translations` (`id`, `page_id`, `locale`, `title`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'en', 'about us', 'description', NULL, NULL, NULL),
(2, 1, 'ar', 'من نحن', 'description', NULL, NULL, NULL),
(3, 2, 'en', 'privacy policy', 'description', NULL, NULL, NULL),
(4, 2, 'ar', 'سياسة الخصوصية', 'description', NULL, NULL, NULL),
(5, 3, 'en', 'terms of use', 'description', NULL, NULL, NULL),
(6, 3, 'ar', 'شروط الاستخدام', 'description', NULL, NULL, NULL),
(7, 4, 'en', 'return policy page', 'description', NULL, NULL, NULL),
(8, 4, 'ar', 'سياسة الارجاع', 'description', NULL, NULL, NULL);

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
-- Table structure for table `promo_codes`
--

CREATE TABLE `promo_codes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double NOT NULL,
  `max_usage` int(11) DEFAULT NULL,
  `count_usage` int(11) NOT NULL DEFAULT 0,
  `end_date` date NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 0 COMMENT '0->all restaurants',
  `discount_type` int(11) NOT NULL COMMENT '0->percentage , 1->amount',
  `status` enum('active','not_active') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `promo_codes`
--

INSERT INTO `promo_codes` (`id`, `name`, `amount`, `max_usage`, `count_usage`, `end_date`, `user_id`, `discount_type`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1', 1, 1, 0, '2022-08-22', 0, 1, 'not_active', '2022-08-14 06:39:01', '2022-08-14 03:40:52', NULL),
(2, '2', 2, 2, 0, '2022-08-15', 0, 1, 'active', '2022-08-14 06:39:01', '2022-08-14 04:36:46', NULL),
(3, 'hexa', 10, 10, 4, '2022-08-18', 0, 0, 'active', '2022-08-14 03:58:13', '2022-08-15 04:52:49', NULL),
(4, 'admin', 111, NULL, 0, '2022-08-15', 0, 0, 'active', '2022-08-14 04:07:18', '2022-08-14 04:07:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `restaurant_busines_hours`
--

CREATE TABLE `restaurant_busines_hours` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `from` time DEFAULT NULL,
  `to` time DEFAULT NULL,
  `day` int(11) NOT NULL COMMENT '0->sunday to 6->saturday',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `restaurant_busines_hours`
--

INSERT INTO `restaurant_busines_hours` (`id`, `user_id`, `from`, `to`, `day`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 3, '09:55:00', '09:57:00', 6, '2022-08-15 03:51:44', '2022-08-15 04:37:08', '2022-08-15 04:37:08'),
(7, 3, '10:42:00', '10:40:00', 0, '2022-08-15 04:37:00', '2022-08-15 04:39:35', '2022-08-15 04:39:35'),
(8, 3, '00:39:00', '10:45:00', 6, '2022-08-15 04:39:21', '2022-08-15 04:39:35', NULL),
(9, 3, '10:42:00', '10:45:00', 1, '2022-08-15 04:39:30', '2022-08-15 04:39:35', NULL),
(10, 1, '10:48:00', '02:45:00', 6, '2022-08-15 04:45:26', '2022-08-15 04:45:26', NULL),
(11, 1, '10:51:00', '04:45:00', 0, '2022-08-15 04:45:26', '2022-08-15 04:45:26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `paginateTotal` int(11) NOT NULL,
  `login_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `app_logo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `info_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `twitter` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instagram` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_maintenance_mode` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '0->off 1->on',
  `is_allow_register` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '0->off 1->on',
  `is_allow_login` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '0->off 1->on',
  `is_allow_buy` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '0->off 1->on',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `paginateTotal`, `login_image`, `app_logo`, `info_email`, `mobile`, `facebook`, `twitter`, `instagram`, `is_maintenance_mode`, `is_allow_register`, `is_allow_login`, `is_allow_buy`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 12, '1', '1', '1', '1', '1', '1', '1', '0', '1', '1', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `setting_translations`
--

CREATE TABLE `setting_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `setting_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tokens`
--

CREATE TABLE `tokens` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `fcm_token` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `device_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '0->android , 1 ->ios',
  `accept` int(11) DEFAULT NULL,
  `lang` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'ar',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tokens`
--

INSERT INTO `tokens` (`id`, `user_id`, `fcm_token`, `device_type`, `accept`, `lang`, `created_at`, `updated_at`, `deleted_at`) VALUES
(93, 6, '123', '0', NULL, 'en', '2022-08-08 09:57:51', '2022-08-08 09:57:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notifications` enum('1','0') COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '1->yes , 0->no',
  `status` enum('active','not_active') COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('1','2','3') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1->user , 2->restaurant , 3->truck',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `opening_status` enum('1','2','3') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '1->open , 2->crowded , 3->closed',
  `branch_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supplier_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accept_pick_up` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '''1->yes , 0->no''',
  `is_deleted` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '1->yes , 0->no',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `email`, `mobile`, `notifications`, `status`, `email_verified_at`, `password`, `type`, `remember_token`, `image`, `latitude`, `longitude`, `opening_status`, `branch_name`, `supplier_code`, `accept_pick_up`, `is_deleted`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, NULL, 'a@a.com', '1234567890', '1', 'active', NULL, '$2y$10$3HGTi0J3vT7fEq1OosdMou8S0eP1pwLNPnzcuHyXBvWJxC1GhHgsK', '2', NULL, NULL, '21.515639', '39.174498', '1', 'a', '222', '1', '0', '2022-08-07 08:18:26', '2022-08-15 07:52:46', NULL),
(2, NULL, NULL, '12345678901', NULL, 'active', NULL, '$2y$10$zmjf9J6BnVelH8.s.boOU.AOFBHA88JGQx6RGVuQiOLFQXerdUbHm', '3', NULL, 'cKRKVw3Xb7OVhm147032131659871432_4431417.png', '24.428351343207712', '46.820982375', '1', '1212', '122112', '1', '0', '2022-08-07 08:23:52', '2022-08-15 05:40:34', NULL),
(3, NULL, NULL, '222222222222', NULL, 'active', NULL, '$2y$10$F8CwxOT1ZqH2tybZ4L0HguoI.US7KCuKD28f7dA0CStkEPIydzjya', '2', NULL, 'vsxtZPJ4KNbVuDO61155351659871528_3201745.png', '34.58004298481133', '38.559263625', '1', '22', '121221', '1', '0', '2022-08-07 08:25:28', '2022-08-08 03:16:40', NULL),
(6, NULL, 'b@b.com', '123456789', NULL, 'active', NULL, '$2y$10$COCmLdG7td8fWEnmOTPUlOgJpAUoc938fURexUvWrE3yBBfd27R8i', '1', NULL, NULL, NULL, NULL, '1', NULL, NULL, '1', '0', '2022-08-08 09:57:51', '2022-08-08 09:57:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_cuisines`
--

CREATE TABLE `user_cuisines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cuisine_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_cuisines`
--

INSERT INTO `user_cuisines` (`id`, `user_id`, `cuisine_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(10, '3', '1', '2022-08-08 07:10:57', '2022-08-08 07:17:20', NULL),
(11, '1', '1', '2022-08-08 11:56:46', NULL, NULL),
(12, '2', '1', '2022-08-15 08:40:34', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_images`
--

CREATE TABLE `user_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_images`
--

INSERT INTO `user_images` (`id`, `user_id`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(6, 3, '8UsTzrJ316599396033510645.jpg', '2022-08-08 03:20:04', '2022-08-08 03:20:04', NULL),
(7, 3, 'NLnISZho16599396041735344.jpg', '2022-08-08 03:20:04', '2022-08-08 03:20:04', NULL),
(8, 3, '27MrLytQ16599396043240762.jpg', '2022-08-08 03:20:04', '2022-08-08 03:20:04', NULL),
(9, 3, '11bUbXlC16599396048715317.jpg', '2022-08-08 03:20:04', '2022-08-08 03:20:04', NULL),
(11, 1, 'xicsLI6m16599598062164427.jpg', '2022-08-08 08:56:46', '2022-08-08 08:56:46', NULL),
(12, 1, 'RNiujqCD16599598064643706.jpg', '2022-08-08 08:56:46', '2022-08-08 08:56:46', NULL),
(13, 1, 'EYs3TC7f16599598067620675.jpg', '2022-08-08 08:56:46', '2022-08-08 08:56:46', NULL),
(14, 1, '1sCN4gh316599598068124911.jpg', '2022-08-08 08:56:47', '2022-08-08 08:56:47', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_translations`
--

CREATE TABLE `user_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_translations`
--

INSERT INTO `user_translations` (`id`, `user_id`, `locale`, `name`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'en', 'tailandi', 'tailandi tailandi tailandi', '2022-08-07 08:19:30', NULL, NULL),
(2, 1, 'ar', 'مطعم التايلندي', 'مطعم التايلندي مطعم التايلندي مطعم التايلندي', '2022-08-07 08:19:30', '2022-08-08 04:10:57', NULL),
(3, 2, 'en', '1', '1', '2022-08-07 08:23:52', '2022-08-07 08:23:52', NULL),
(4, 2, 'ar', '1', '1', '2022-08-07 08:23:52', '2022-08-07 08:23:52', NULL),
(5, 3, 'en', '2', '1', '2022-08-07 08:25:28', '2022-08-08 02:37:18', NULL),
(6, 3, 'ar', '22', '12', '2022-08-07 08:25:28', '2022-08-07 08:25:28', NULL),
(7, 4, 'en', 'mahmoud', NULL, '2022-08-08 09:48:46', '2022-08-08 09:48:46', NULL),
(8, 5, 'en', 'mahmoud', NULL, '2022-08-08 09:55:07', '2022-08-08 09:55:07', NULL),
(9, 6, 'en', 'mahmoud', NULL, '2022-08-08 09:57:51', '2022-08-08 09:57:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `varification_codes`
--

CREATE TABLE `varification_codes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `websockets_statistics_entries`
--

CREATE TABLE `websockets_statistics_entries` (
  `id` int(10) UNSIGNED NOT NULL,
  `app_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `peak_connection_count` int(11) NOT NULL,
  `websocket_message_count` int(11) NOT NULL,
  `api_message_count` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart_extras`
--
ALTER TABLE `cart_extras`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart_options`
--
ALTER TABLE `cart_options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_translations`
--
ALTER TABLE `category_translations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_translations_locale_index` (`locale`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cuisines`
--
ALTER TABLE `cuisines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cuisine_translations`
--
ALTER TABLE `cuisine_translations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `days`
--
ALTER TABLE `days`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `day_translations`
--
ALTER TABLE `day_translations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `extras`
--
ALTER TABLE `extras`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `extra_translations`
--
ALTER TABLE `extra_translations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `language_translation`
--
ALTER TABLE `language_translation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meals`
--
ALTER TABLE `meals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meal_images`
--
ALTER TABLE `meal_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meal_translations`
--
ALTER TABLE `meal_translations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `option_option_values`
--
ALTER TABLE `option_option_values`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `option_translations`
--
ALTER TABLE `option_translations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `option_values`
--
ALTER TABLE `option_values`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `option_value_translations`
--
ALTER TABLE `option_value_translations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_meals`
--
ALTER TABLE `order_meals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_meal_extras`
--
ALTER TABLE `order_meal_extras`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_meal_options`
--
ALTER TABLE `order_meal_options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_translations`
--
ALTER TABLE `page_translations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `promo_codes`
--
ALTER TABLE `promo_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `restaurant_busines_hours`
--
ALTER TABLE `restaurant_busines_hours`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting_translations`
--
ALTER TABLE `setting_translations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `setting_translations_locale_index` (`locale`);

--
-- Indexes for table `tokens`
--
ALTER TABLE `tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_cuisines`
--
ALTER TABLE `user_cuisines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_images`
--
ALTER TABLE `user_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_translations`
--
ALTER TABLE `user_translations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `varification_codes`
--
ALTER TABLE `varification_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `websockets_statistics_entries`
--
ALTER TABLE `websockets_statistics_entries`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `cart_extras`
--
ALTER TABLE `cart_extras`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `cart_options`
--
ALTER TABLE `cart_options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category_translations`
--
ALTER TABLE `category_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cuisines`
--
ALTER TABLE `cuisines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cuisine_translations`
--
ALTER TABLE `cuisine_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `days`
--
ALTER TABLE `days`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `day_translations`
--
ALTER TABLE `day_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `extras`
--
ALTER TABLE `extras`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `extra_translations`
--
ALTER TABLE `extra_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `language_translation`
--
ALTER TABLE `language_translation`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `meals`
--
ALTER TABLE `meals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `meal_images`
--
ALTER TABLE `meal_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `meal_translations`
--
ALTER TABLE `meal_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `option_option_values`
--
ALTER TABLE `option_option_values`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `option_translations`
--
ALTER TABLE `option_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `option_values`
--
ALTER TABLE `option_values`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `option_value_translations`
--
ALTER TABLE `option_value_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `order_meals`
--
ALTER TABLE `order_meals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `order_meal_extras`
--
ALTER TABLE `order_meal_extras`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `order_meal_options`
--
ALTER TABLE `order_meal_options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `page_translations`
--
ALTER TABLE `page_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `promo_codes`
--
ALTER TABLE `promo_codes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `restaurant_busines_hours`
--
ALTER TABLE `restaurant_busines_hours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `setting_translations`
--
ALTER TABLE `setting_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tokens`
--
ALTER TABLE `tokens`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_cuisines`
--
ALTER TABLE `user_cuisines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_images`
--
ALTER TABLE `user_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user_translations`
--
ALTER TABLE `user_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `varification_codes`
--
ALTER TABLE `varification_codes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `websockets_statistics_entries`
--
ALTER TABLE `websockets_statistics_entries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
