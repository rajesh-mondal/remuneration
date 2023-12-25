-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2023 at 09:34 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rem`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `descipline_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course`, `title`, `descipline_id`, `created_at`, `updated_at`) VALUES
(1, 'CSE 2222', 'Data Structures', 1, '2023-10-08 08:44:58', '2023-10-08 08:45:24'),
(2, 'CSE 2213', 'Advance Software Engineering', 1, '2023-10-08 08:46:44', '2023-10-08 08:46:44');

-- --------------------------------------------------------

--
-- Table structure for table `desciplines`
--

CREATE TABLE `desciplines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `desciplines`
--

INSERT INTO `desciplines` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'CSE', '2023-06-20 13:37:13', '2023-06-20 13:37:13'),
(2, 'ECE', '2023-06-20 13:37:23', '2023-06-20 13:37:23'),
(3, 'HRM', '2023-06-20 13:37:38', '2023-06-20 13:37:38'),
(4, 'URP', '2023-06-20 13:38:01', '2023-06-20 13:38:01'),
(5, 'ENG', '2023-06-20 13:38:09', '2023-06-20 13:38:09'),
(6, 'BBA', '2023-06-20 13:38:36', '2023-06-20 13:38:36'),
(7, 'ACC', '2023-06-20 13:38:45', '2023-06-20 13:38:45'),
(8, 'FWT', '2023-06-20 13:39:36', '2023-06-20 13:39:36');

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE `designations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Professor', '2023-06-20 13:42:24', '2023-06-20 13:42:24'),
(2, 'Associate Professor', '2023-06-20 13:42:45', '2023-06-20 13:42:45'),
(3, 'Lecturer', '2023-06-20 13:42:54', '2023-06-20 13:42:54'),
(4, 'Assistant Professor', '2023-06-20 13:43:14', '2023-06-20 13:43:14'),
(5, 'Assistant Lab Technician', '2023-06-20 13:44:22', '2023-06-20 13:44:22'),
(6, 'Administrative Officer', '2023-06-20 13:44:55', '2023-06-20 13:44:55'),
(7, 'Assistant Registrar', '2023-06-20 13:45:38', '2023-06-20 13:45:38'),
(8, 'Office Assistant cum Computer Operator', '2023-06-20 13:45:53', '2023-10-19 12:37:39'),
(9, 'Accountant', '2023-12-04 11:30:23', '2023-12-04 11:30:23');

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `year_id` int(11) NOT NULL,
  `term_id` int(11) NOT NULL,
  `session_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`id`, `year_id`, `term_id`, `session_id`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 3, '2023-06-01', '2023-06-14', '2023-06-20 13:53:41', '2023-06-20 13:53:41'),
(2, 1, 2, 4, '2023-11-05', '2023-12-20', '2023-10-19 12:34:37', '2023-10-19 12:34:37');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(7, '2023_02_17_134146_create_exams_table', 1),
(9, '2023_02_17_142310_create_remuneration_categories_table', 1),
(10, '2023_02_17_142412_create_remuneration_rates_table', 1),
(11, '2023_02_24_141830_create_desciplines_table', 1),
(12, '2023_03_06_170128_create_designations_table', 1),
(13, '2023_03_07_181148_create_years_table', 1),
(14, '2023_03_07_181320_create_terms_table', 1),
(15, '2023_03_13_165301_create_sessions_table', 1),
(19, '2023_08_05_132902_create_roles_table', 3),
(20, '2014_10_12_000000_create_users_table', 4),
(21, '2023_08_06_194832_create_types_table', 5),
(22, '2023_02_17_133826_create_courses_table', 6),
(23, '2023_02_17_134212_create_remunerations_table', 7),
(24, '2023_12_23_061540_create_notifications_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) NOT NULL,
  `type` varchar(255) NOT NULL,
  `notifiable_type` varchar(255) NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('3bab114d-ce33-4e33-8eda-c76a92b64581', 'App\\Notifications\\FeedbackNotification', 'App\\Models\\User', 8, '{\"data\":{\"rem_id\":\"1\",\"feedback\":\"ok\"},\"role\":\"feedback\"}', NULL, '2023-12-23 00:38:43', '2023-12-23 00:38:43'),
('92be179a-2b2e-49a5-9290-202b3238a870', 'App\\Notifications\\FeedbackNotification', 'App\\Models\\User', 4, '{\"data\":{\"rem_id\":\"1\",\"feedback\":\"ok\"},\"role\":\"feedback\"}', '2023-12-23 01:58:49', '2023-12-23 00:38:43', '2023-12-23 01:58:49');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `remunerations`
--

CREATE TABLE `remunerations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `discipline_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `rate_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `paper` varchar(255) NOT NULL,
  `course_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `number` int(11) DEFAULT NULL,
  `students` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `feedback` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `remunerations`
--

INSERT INTO `remunerations` (`id`, `discipline_id`, `exam_id`, `category_id`, `rate_id`, `type_id`, `paper`, `course_id`, `user_id`, `number`, `students`, `status`, `feedback`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 16, 3, 1, 'full', 2, 4, 10, NULL, 1, 'ok', '2023-12-23 00:14:33', '2023-12-23 00:38:43');

-- --------------------------------------------------------

--
-- Table structure for table `remuneration_categories`
--

CREATE TABLE `remuneration_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `remuneration_categories`
--

INSERT INTO `remuneration_categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(16, 'প্রশ্নপত্র প্রনয়ন', '2023-10-20 00:39:14', '2023-10-20 00:39:14'),
(17, 'প্রশ্নপত্র মডারেশন', '2023-10-20 00:39:49', '2023-10-20 00:39:49'),
(18, 'উত্তরপত্র পরীক্ষণ', '2023-10-20 00:40:19', '2023-10-20 00:40:19'),
(19, 'ক্লাস টেস্ট/টার্ম পেপার/হোম ওয়ার্ক/এসাইনমেন্ট', '2023-10-20 00:42:17', '2023-10-20 00:42:17'),
(20, 'সেশনাল', '2023-10-20 00:42:41', '2023-10-20 00:42:41'),
(21, 'সেশনাল মৌখিক পরীক্ষা', '2023-10-20 00:43:42', '2023-10-20 00:43:42'),
(22, 'প্রফেশনাল এটাসমেন্ট/ইন্ডাস্ট্রিয়াল (ট্রেনিং/এটাসমেন্ট)', '2023-10-20 00:45:20', '2023-10-20 00:50:26'),
(23, 'উত্তরপত্র নিরীক্ষণ', '2023-10-20 00:45:41', '2023-10-20 00:45:41'),
(24, 'টেবুলেশন', '2023-10-20 00:45:52', '2023-10-20 00:45:52'),
(25, 'প্রশ্নপত্র প্রস্তুতকরণ (অংকন, স্টেনসিল কাটা ও ঘুরানো)', '2023-10-20 00:47:15', '2023-10-20 00:50:17'),
(26, 'পরীক্ষা কমিটির সভাপতি/সদস্য', '2023-10-20 00:47:47', '2023-10-20 00:47:47'),
(27, 'চীফ ইনভিজিলেশন/ইনভিজিলেশন', '2023-10-20 00:48:18', '2023-10-20 00:50:08'),
(28, 'থিসিস', '2023-10-20 00:49:53', '2023-10-20 00:49:53');

-- --------------------------------------------------------

--
-- Table structure for table `remuneration_rates`
--

CREATE TABLE `remuneration_rates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `title` varchar(500) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `remuneration_rates`
--

INSERT INTO `remuneration_rates` (`id`, `category_id`, `amount`, `title`, `created_at`, `updated_at`) VALUES
(1, 17, 2400, 'ক) প্রশ্নপত্র প্রণয়নের সর্বমোট পারিতোষিকের সমপরিমান অর্থ নির্দিষ্ট পরীক্ষা কমিটির আওতাধীন সকল বিষয়ের প্রশ্নপত্র মডারেশনের কাজে অংশগ্রহণকারী সদস্যবৃন্দের মধ্যে সমানভাবে ভাগ করা হবে।\r\nসর্বোচ্চ ২৪০০/=', '2023-06-20 14:20:24', '2023-12-03 10:01:41'),
(3, 16, 2300, 'ক) স্নাতক : প্রতি প্রশ্নপত্র প্রনয়নের জন্য', '2023-10-20 00:58:04', '2023-10-20 00:58:04'),
(4, 16, 2400, 'খ) স্নাতকোত্তর/এমফিল/পিএইচডিঃ প্রতি প্রশ্নপত্র প্রণয়নের জন্য (৩ ঘণ্টা পরীক্ষা)', '2023-10-20 08:30:01', '2023-10-20 08:30:01'),
(5, 17, 1500, 'খ) প্রশ্নপত্র প্রণয়নের সর্বমোট পারিতোষিকের সমপরিমান অর্থ নির্দিষ্ট পরীক্ষা কমিটির আওতাধীন সকল বিষয়ের প্রশ্নপত্র মডারেশনের কাজে অংশগ্রহণকারী সদস্যবৃন্দের মধ্যে সমানভাবে ভাগ করা হবে।\r\nসর্বনিম্ন ১৫০০/=', '2023-12-03 10:03:06', '2023-12-03 10:03:30');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '2023-08-05 08:07:17', '2023-08-05 08:07:17'),
(2, 'Teacher', '2023-08-05 08:07:33', '2023-08-05 08:07:33'),
(3, 'Accountant', '2023-08-05 08:08:07', '2023-08-05 08:08:07'),
(4, 'Staff', '2023-08-05 08:08:29', '2023-08-05 08:16:04');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `session` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `session`, `created_at`, `updated_at`) VALUES
(1, '2020-2021', '2023-06-20 13:48:54', '2023-06-20 13:48:54'),
(2, '2019-2020', '2023-06-20 13:49:20', '2023-06-20 13:49:20'),
(3, '2021-2022', '2023-06-20 13:49:30', '2023-06-20 13:49:30'),
(4, '2022-2023', '2023-10-19 12:33:37', '2023-10-19 12:33:37'),
(5, '2023-2024', '2023-10-19 12:33:53', '2023-10-19 12:33:53');

-- --------------------------------------------------------

--
-- Table structure for table `terms`
--

CREATE TABLE `terms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `term` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `terms`
--

INSERT INTO `terms` (`id`, `term`, `created_at`, `updated_at`) VALUES
(1, 'First', '2023-06-20 13:48:12', '2023-06-20 13:48:12'),
(2, 'Second', '2023-06-20 13:48:21', '2023-06-20 13:48:21');

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Question', NULL, NULL),
(2, 'Script', NULL, NULL),
(3, 'Assessment', NULL, NULL),
(4, 'Course', NULL, NULL),
(5, 'Page', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `designation_id` int(11) DEFAULT NULL,
  `descipline_id` int(11) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `address`, `image`, `password`, `designation_id`, `descipline_id`, `role_id`, `is_admin`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Mr. John Doe', 'sabya.citik@gmail.com', NULL, NULL, NULL, '$2y$10$O0IiIdmloY7WDFAEBZgj4e5dRDjY3UxaOsLkv0ai5Dmd4iB9.zf4C', NULL, NULL, NULL, 1, NULL, NULL, '2023-08-05 12:22:15', '2023-11-11 03:56:02'),
(2, 'Rajesh Mondal', 'rajesh@gmail.com', NULL, NULL, NULL, '$2y$10$HfJ3MlyJQvRxZxjuDAu2cek7SiPAw5IGRJEXjWW3g1uMAIVNmsjs6', NULL, 1, NULL, 1, NULL, 'vMl9fWilydxbCdXfoZAa27OBsQbB07WSFPKC50Bu7rlBsMynpKOGTp9mSsvr', '2023-09-13 23:18:06', '2023-12-04 11:39:06'),
(4, 'Atanu Shome', 'atanu@cse.ku.ac.bd', '+8801717250819', 'KU', NULL, '$2y$10$iEIZgTH/JrKT..lgCDeRJ.Lnq3S6vNqsMVLlonNPZPuwDagexfRae', 4, 1, 1, 0, NULL, NULL, '2023-10-19 01:16:53', '2023-10-19 10:10:29'),
(5, 'Dr. Abu Shamim Md. Arif', 'abushamim@gmail.com', '+8801711223345', 'KU', NULL, '$2y$10$me77cb..AdeHUD81mYUqKezSfmzWFZsT2754VQYa6MROVOweQm6Oi', 1, 1, 2, 0, NULL, NULL, '2023-10-19 01:19:01', '2023-10-19 01:19:01'),
(6, 'SK Alamgir Hossain', 'alamgirhossain@gmail.com', '+8801711223346', 'KU', NULL, '$2y$10$VPn1Cnnu8SvLTZg0Pj3FpugBx9SMAeo8382cEKAAtllDIGiib34Oq', 2, 1, 2, 0, NULL, NULL, '2023-10-19 01:20:24', '2023-10-19 01:20:24'),
(7, 'Dr. Rameswar Debnath', 'rameswardebnath@gmail.com', '+8801711223347', 'KU', NULL, '$2y$10$Eaw81hrVA.sFTD6F6jgtouruezxPmiStZGX2/9yHSe8kqbybjx/jK', 1, 1, 2, 0, NULL, NULL, '2023-10-19 01:21:40', '2023-10-19 01:21:40'),
(8, 'Md. Anwar Hossain', 'anowarhossain@gmail.com', '+8801711223350', 'KU', NULL, '$2y$10$zpsnfu3t1J1SIHYyDZrcgOyaqLakeyRFPZGR13omN3UYzsFY.kdVK', 6, 1, 1, 0, NULL, NULL, '2023-10-19 01:36:26', '2023-10-19 01:36:26'),
(9, 'Mr. Accountant', 'accountant@gmail.com', '01711556677', 'KU', NULL, '$2y$10$s4fGBz/0xLdB.TkXgPL9FeSneNsj.x8NX/W9CL6bmo3pxSSQ6qNje', 9, 1, 3, 0, NULL, NULL, '2023-12-04 11:32:37', '2023-12-04 11:32:37');

-- --------------------------------------------------------

--
-- Table structure for table `years`
--

CREATE TABLE `years` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `year` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `years`
--

INSERT INTO `years` (`id`, `year`, `created_at`, `updated_at`) VALUES
(1, 'First', '2023-06-20 13:46:20', '2023-06-20 13:46:20'),
(2, 'Second', '2023-06-20 13:46:50', '2023-06-20 13:46:50'),
(3, 'Third', '2023-06-20 13:47:00', '2023-06-20 13:47:10'),
(4, 'Fourth', '2023-06-20 13:47:41', '2023-06-20 13:47:41'),
(5, 'Fifth', '2023-06-20 13:47:48', '2023-06-20 13:47:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `desciplines`
--
ALTER TABLE `desciplines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designations`
--
ALTER TABLE `designations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `remunerations`
--
ALTER TABLE `remunerations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `remuneration_categories`
--
ALTER TABLE `remuneration_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `remuneration_rates`
--
ALTER TABLE `remuneration_rates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `terms`
--
ALTER TABLE `terms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

--
-- Indexes for table `years`
--
ALTER TABLE `years`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `desciplines`
--
ALTER TABLE `desciplines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `remunerations`
--
ALTER TABLE `remunerations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `remuneration_categories`
--
ALTER TABLE `remuneration_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `remuneration_rates`
--
ALTER TABLE `remuneration_rates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `terms`
--
ALTER TABLE `terms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `years`
--
ALTER TABLE `years`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
