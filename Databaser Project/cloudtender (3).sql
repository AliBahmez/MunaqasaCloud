-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2024 at 10:40 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cloudtender`
--

-- --------------------------------------------------------

--
-- Table structure for table `account__permissions`
--

CREATE TABLE `account__permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `module_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `account__permissions`
--

INSERT INTO `account__permissions` (`id`, `module_id`, `name`, `label`, `created_at`, `updated_at`) VALUES
(1, 0, 'become_tenant', 'يكون مستأجر', '2024-01-18 13:50:20', '2024-01-18 13:50:20'),
(2, 0, 'manage_tenants', 'يدير المستأجرين', '2024-01-18 13:50:20', '2024-01-18 13:50:20'),
(3, 0, 'manage_own_tenant', 'يدير إستئجاره فقط', '2024-01-18 13:50:20', '2024-01-18 13:50:20'),
(4, 0, 'account__manage_accounts', 'يدير الحسابات', '2024-01-18 13:50:21', '2024-01-18 13:50:21'),
(5, 0, 'account__manage_users', 'يدير المستخدمون', '2024-01-18 13:50:21', '2024-01-18 13:50:21'),
(6, 0, 'account__list_users', 'يستعرض المستخدمون', '2024-01-18 13:50:21', '2024-01-18 13:50:21'),
(7, 0, 'account__add_user', 'يضيف مستخدم', '2024-01-18 13:50:21', '2024-01-18 13:50:21'),
(8, 0, 'account__edit_user', 'يعدل مستخدم', '2024-01-18 13:50:21', '2024-01-18 13:50:21'),
(9, 0, 'account__show_user', 'يعرض مستخدم', '2024-01-18 13:50:21', '2024-01-18 13:50:21'),
(10, 0, 'account__delete_user', 'يحذف مستخدم', '2024-01-18 13:50:21', '2024-01-18 13:50:21'),
(11, 0, 'account__manage_roles', 'يدير الأدوار', '2024-01-18 13:50:21', '2024-01-18 13:50:21'),
(12, 0, 'account__list_roles', 'يستعرض الأدوار', '2024-01-18 13:50:21', '2024-01-18 13:50:21'),
(13, 0, 'account__add_role', 'يضيف دور', '2024-01-18 13:50:21', '2024-01-18 13:50:21'),
(14, 0, 'account__edit_role', 'يعدل دور', '2024-01-18 13:50:21', '2024-01-18 13:50:21'),
(15, 0, 'account__show_role', 'يعرض دور', '2024-01-18 13:50:21', '2024-01-18 13:50:21'),
(16, 0, 'account__delete_role', 'يحذف دور', '2024-01-18 13:50:21', '2024-01-18 13:50:21'),
(17, 0, 'manage_any_content', 'يدير أي محتوى', '2024-01-18 13:50:21', '2024-01-18 13:50:21'),
(18, 0, 'manage_own_content', 'يدير محتواه فقط', '2024-01-18 13:50:21', '2024-01-18 13:50:21'),
(19, 0, 'add_content', 'يضيف محتوى', '2024-01-18 13:50:21', '2024-01-18 13:50:21'),
(20, 0, 'show_any_content', 'يعرض أي محتوى', '2024-01-18 13:50:21', '2024-01-18 13:50:21'),
(21, 0, 'show_own_content', 'يعرض محتواه فقط', '2024-01-18 13:50:21', '2024-01-18 13:50:21'),
(22, 0, 'edit_any_content', 'يعدل أي محتوى', '2024-01-18 13:50:21', '2024-01-18 13:50:21'),
(23, 0, 'edit_own_content', 'يعدل محتواه فقط', '2024-01-18 13:50:21', '2024-01-18 13:50:21'),
(24, 0, 'delete_any_content', 'يحذف أي محتوى', '2024-01-18 13:50:21', '2024-01-18 13:50:21'),
(25, 0, 'delete_own_content', 'يحذف محتواه فقط', '2024-01-18 13:50:21', '2024-01-18 13:50:21');

-- --------------------------------------------------------

--
-- Table structure for table `account__roles`
--

CREATE TABLE `account__roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tenant_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `account__roles`
--

INSERT INTO `account__roles` (`id`, `tenant_id`, `name`, `label`, `created_at`, `updated_at`) VALUES
(1, 1, 'administration', 'الإدارة', '2024-01-18 13:50:23', '2024-01-18 13:50:23'),
(2, 1, 'using', 'الإستخدام', '2024-01-18 13:50:23', '2024-01-18 13:50:23'),
(3, 2, 'administration', 'الإدارة', '2024-01-18 13:50:23', '2024-01-18 13:50:23'),
(4, 2, 'using', 'الإستخدام', '2024-01-18 13:50:23', '2024-01-18 13:50:23');

-- --------------------------------------------------------

--
-- Table structure for table `account__roles_permissions`
--

CREATE TABLE `account__roles_permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `account_role_id` bigint(20) UNSIGNED NOT NULL,
  `account_permission_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `account__roles_permissions`
--

INSERT INTO `account__roles_permissions` (`id`, `account_role_id`, `account_permission_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(6, 1, 6),
(7, 1, 7),
(8, 1, 8),
(9, 1, 9),
(10, 1, 10),
(11, 1, 11),
(12, 1, 12),
(13, 1, 13),
(14, 1, 14),
(15, 1, 15),
(16, 1, 16),
(17, 1, 17),
(18, 1, 18),
(19, 1, 19),
(20, 1, 20),
(21, 1, 21),
(22, 1, 22),
(23, 1, 23),
(24, 1, 24),
(25, 1, 25),
(27, 3, 3),
(29, 3, 17),
(28, 3, 19),
(26, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `account__roles_users`
--

CREATE TABLE `account__roles_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `account_role_id` bigint(20) UNSIGNED NOT NULL,
  `account_user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `account__roles_users`
--

INSERT INTO `account__roles_users` (`id`, `account_role_id`, `account_user_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 3),
(4, 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `account__tenants`
--

CREATE TABLE `account__tenants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `account__tenants`
--

INSERT INTO `account__tenants` (`id`, `name`, `label`, `created_at`, `updated_at`) VALUES
(1, 'platform', 'المنصة', '2024-01-18 13:50:21', '2024-01-18 13:50:21'),
(2, 'app', 'التطبيق', '2024-01-18 13:50:21', '2024-01-18 13:50:21'),
(3, 'alown', 'مؤسسة العون للاعمال الخيرية', '2024-01-18 13:50:24', '2024-01-18 13:50:24'),
(47, 'alkhair', 'foundation', '2024-01-19 15:39:45', '2024-01-19 15:39:45'),
(48, 'ali', 'contractor', '2024-01-19 15:53:44', '2024-01-19 15:53:44');

-- --------------------------------------------------------

--
-- Table structure for table `account__users`
--

CREATE TABLE `account__users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tenant_id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `account__users`
--

INSERT INTO `account__users` (`id`, `tenant_id`, `username`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'admin', 'admin@platform.com', NULL, '$2y$12$4r4LhQ7UohVr2.bI4MKll.drOWppAUmGEI1xTDvw8hExfFwkthNdO', NULL, '2024-01-18 13:50:22', '2024-01-18 13:50:22'),
(2, 1, 'user', 'user@platform.com', NULL, '$2y$12$X1iL3p5T2I550V5DtR0Yg.X3KZ09pzoLQ39iEFncdOmSkdUauzk.W', NULL, '2024-01-18 13:50:22', '2024-01-18 13:50:22'),
(3, 2, 'admin', 'admin@app.com', NULL, '$2y$12$elSX3n.h7CLL/Z7R8nHrEOaB7yj.zCreUHD.sprLkLwQMhPn5UcBW', NULL, '2024-01-18 13:50:22', '2024-01-18 13:50:22'),
(4, 2, 'user', 'user@app.com', NULL, '$2y$12$lKGsrrj0VB6tGwxdbSDq3uoSC4F4pOm4lx407Ss.78nNuYNW043A2', NULL, '2024-01-18 13:50:23', '2024-01-18 13:50:23'),
(36, 47, 'alkhair', 'alkhair@gmail.com', NULL, '$2y$12$1fffzJf4h5oAOKoX8V8R/OAX0t8CzZ.xJfE1kV1z2FHSslpLnp9Zm', NULL, '2024-01-19 15:39:46', '2024-01-19 15:39:46'),
(37, 48, 'ali', 'Ali@gmail.com', NULL, '$2y$12$WkRsq5ARqGaif8O8lXUvgO.0urWa09jBmKcs54.MomYPgB6tBeLtC', NULL, '2024-01-19 15:53:44', '2024-01-19 15:53:44');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2020_01_01_002001_create_account_tenants_table', 1),
(5, '2020_01_01_002002_create_account_permissions_table', 1),
(6, '2020_01_01_002003_create_account_roles_table', 1),
(7, '2020_01_01_002004_create_account_users_table', 1),
(8, '2020_01_01_002005_create_account_roles_permissions_table', 1),
(9, '2020_01_01_002006_create_account_roles_users_table', 1),
(10, '2024_01_01_003001_create_munaqasatcloud_organizations_table', 1),
(11, '2024_01_01_003002_create_munaqasatcloud_tenders_table', 1),
(12, '2024_01_01_003003_create_munaqasatcloud_freelancers_table', 1),
(13, '2024_01_01_003004_create_munaqasatcloud_tenderapplicants_table', 1),
(14, '2024_01_01_003005_create_munaqasatclou_tdenderdocuments_table', 1),
(15, '2024_01_01_003006_create__munaqasatcloud_tender_offer_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `munaqasatcloud__freelancers`
--

CREATE TABLE `munaqasatcloud__freelancers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `munaqasatcloud__freelancers`
--

INSERT INTO `munaqasatcloud__freelancers` (`id`, `name`, `title`, `description`, `state`, `created_at`, `updated_at`) VALUES
(48, 'المقاول علي', 'غيل باوزير', 'مقاولات صبة و تخشيبة و و و و', 1, '2024-01-19 15:53:44', '2024-01-21 19:53:42');

-- --------------------------------------------------------

--
-- Table structure for table `munaqasatcloud__organizations`
--

CREATE TABLE `munaqasatcloud__organizations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_statement` bigint(20) UNSIGNED NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trade_document` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` int(11) NOT NULL DEFAULT 0,
  `accountnumber` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `munaqasatcloud__organizations`
--

INSERT INTO `munaqasatcloud__organizations` (`id`, `name`, `title`, `contact_statement`, `description`, `trade_document`, `state`, `accountnumber`, `created_at`, `updated_at`) VALUES
(47, 'alkhair', 'مؤسسة الخير لأعمال الخيرية', 356007, 'مؤسسة الخير للمساهمة في الخير', '1705678786_السجل التجاري لمؤسسة الخير.pdf', 1, '971654', '2024-01-19 15:39:46', '2024-01-19 16:26:43');

-- --------------------------------------------------------

--
-- Table structure for table `munaqasatcloud__tenders`
--

CREATE TABLE `munaqasatcloud__tenders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` int(11) NOT NULL,
  `state` int(11) NOT NULL DEFAULT 0,
  `participation_price` bigint(20) UNSIGNED NOT NULL,
  `starting_date` datetime NOT NULL,
  `ending_date` datetime NOT NULL,
  `open_date` datetime NOT NULL,
  `working_location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `organization_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `munaqasatcloud__tenders`
--

INSERT INTO `munaqasatcloud__tenders` (`id`, `name`, `title`, `description`, `number`, `state`, `participation_price`, `starting_date`, `ending_date`, `open_date`, `working_location`, `organization_id`, `created_at`, `updated_at`) VALUES
(4, 'بناء وتشطيب مسجد  برالوادين الجديد', 'مؤسسة الخير لأعمال الخيرية', 'بناء وتشطيب وتجهيز المسجد', 500, 2, 15000, '2024-01-19 00:00:00', '2024-01-22 00:00:00', '2024-01-26 00:00:00', 'حضرموت \\ المكلا', 47, '2024-01-19 16:34:09', '2024-01-21 21:00:36'),
(6, 'بناء وتشطيب مدرسة الأبداع الجديد', 'مؤسسة الخير لأعمال الخيرية', 'بناء وتشطيب مدرسة الأبداع الجديد', 500, 1, 15000, '2024-01-22 00:00:00', '2024-01-24 00:00:00', '2024-01-24 00:00:00', 'حضرموت \\ المكلا', 47, '2024-01-21 22:44:28', '2024-01-21 22:45:28');

-- --------------------------------------------------------

--
-- Table structure for table `munaqasatcloud__tender_applicants`
--

CREATE TABLE `munaqasatcloud__tender_applicants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tender_id` bigint(20) UNSIGNED NOT NULL,
  `freelancer_id` bigint(20) UNSIGNED NOT NULL,
  `voucher` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `munaqasatcloud__tender_applicants`
--

INSERT INTO `munaqasatcloud__tender_applicants` (`id`, `tender_id`, `freelancer_id`, `voucher`, `status`, `created_at`, `updated_at`) VALUES
(5, 4, 48, '1705686115_OIP (3).jfif', 1, '2024-01-19 17:41:55', '2024-01-21 21:20:39'),
(8, 6, 48, '1705914335_OIP__1_-removebg-preview (1).png', 1, '2024-01-22 09:05:35', '2024-01-22 09:14:41');

-- --------------------------------------------------------

--
-- Table structure for table `munaqasatcloud__tender_documents`
--

CREATE TABLE `munaqasatcloud__tender_documents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `technical_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `technical_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tender_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `munaqasatcloud__tender_documents`
--

INSERT INTO `munaqasatcloud__tender_documents` (`id`, `technical_title`, `technical_description`, `tender_id`, `created_at`, `updated_at`) VALUES
(6, 'إنشاء المبنى الرئيسي للمسجد', 'الجدران والأساسات والسقف والأعمدة', 4, '2024-01-19 17:03:52', '2024-01-19 17:03:52'),
(7, 'تجهيز وتركيب أنظمة الإضاءة والكهرباء والتكييف والتدفئة والتهوية', 'تركيب أنظمة الحماية من الحريق والإنذار', 4, '2024-01-19 17:03:52', '2024-01-19 17:03:52'),
(8, 'أعمال التشطيب الداخلي', 'تنفيذ أعمال الدهانات والتشطيبات الداخلية للجدران والأسقف', 4, '2024-01-19 17:03:53', '2024-01-19 17:03:53'),
(13, 'إنشاء المباني الرئيسية للمدرسة', 'لفصول الدراسية والمكاتب الإدارية والمكتبة والمرافق الأخرى', 6, '2024-01-21 22:45:22', '2024-01-21 22:45:22'),
(14, 'أعمال التشطيب الداخلي', 'تنفيذ أعمال الدهانات والتشطيبات الداخلية للجدران والأسقف', 6, '2024-01-21 22:45:22', '2024-01-21 22:45:22');

-- --------------------------------------------------------

--
-- Table structure for table `munaqasatcloud__tender_offer`
--

CREATE TABLE `munaqasatcloud__tender_offer` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tender_applicant_id` bigint(20) UNSIGNED NOT NULL,
  `tender_document_id` bigint(20) UNSIGNED NOT NULL,
  `price` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `munaqasatcloud__tender_offer`
--

INSERT INTO `munaqasatcloud__tender_offer` (`id`, `tender_applicant_id`, `tender_document_id`, `price`, `created_at`, `updated_at`) VALUES
(9, 5, 6, 5000, '2024-01-19 17:44:40', '2024-01-19 17:44:40'),
(10, 5, 6, 10000, '2024-01-19 17:44:40', '2024-01-19 17:44:40'),
(11, 5, 6, 12000, '2024-01-19 17:44:41', '2024-01-19 17:44:41');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account__permissions`
--
ALTER TABLE `account__permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `account__permissions_name_unique` (`name`);

--
-- Indexes for table `account__roles`
--
ALTER TABLE `account__roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `account__roles_tenant_id_name_unique` (`tenant_id`,`name`);

--
-- Indexes for table `account__roles_permissions`
--
ALTER TABLE `account__roles_permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `account__roles_permissions__unique` (`account_role_id`,`account_permission_id`),
  ADD KEY `account__roles_permissions_account_permission_id_foreign` (`account_permission_id`);

--
-- Indexes for table `account__roles_users`
--
ALTER TABLE `account__roles_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `account__roles_users__unique` (`account_role_id`,`account_user_id`),
  ADD KEY `account__roles_users_account_user_id_foreign` (`account_user_id`);

--
-- Indexes for table `account__tenants`
--
ALTER TABLE `account__tenants`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `account__tenants_name_unique` (`name`);

--
-- Indexes for table `account__users`
--
ALTER TABLE `account__users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `account__users_tenant_id_username_unique` (`tenant_id`,`username`),
  ADD UNIQUE KEY `account__users_email_unique` (`email`);

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
-- Indexes for table `munaqasatcloud__freelancers`
--
ALTER TABLE `munaqasatcloud__freelancers`
  ADD UNIQUE KEY `munaqasatcloud__freelancers_id_unique` (`id`),
  ADD UNIQUE KEY `munaqasatcloud__freelancers_name_unique` (`name`);

--
-- Indexes for table `munaqasatcloud__organizations`
--
ALTER TABLE `munaqasatcloud__organizations`
  ADD UNIQUE KEY `munaqasatcloud__organizations_id_unique` (`id`),
  ADD UNIQUE KEY `munaqasatcloud__organizations_name_unique` (`name`),
  ADD UNIQUE KEY `munaqasatcloud__organizations_contact_statement_unique` (`contact_statement`),
  ADD UNIQUE KEY `munaqasatcloud__organizations_accountnumber_unique` (`accountnumber`);

--
-- Indexes for table `munaqasatcloud__tenders`
--
ALTER TABLE `munaqasatcloud__tenders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `munaqasatcloud__tenders_organization_id_foreign` (`organization_id`);

--
-- Indexes for table `munaqasatcloud__tender_applicants`
--
ALTER TABLE `munaqasatcloud__tender_applicants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `munaqasatcloud__tender_applicants_tender_id_foreign` (`tender_id`),
  ADD KEY `munaqasatcloud__tender_applicants_freelancer_id_foreign` (`freelancer_id`);

--
-- Indexes for table `munaqasatcloud__tender_documents`
--
ALTER TABLE `munaqasatcloud__tender_documents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `munaqasatcloud__tender_documents_tender_id_foreign` (`tender_id`);

--
-- Indexes for table `munaqasatcloud__tender_offer`
--
ALTER TABLE `munaqasatcloud__tender_offer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `munaqasatcloud__tender_offer_tender_applicant_id_foreign` (`tender_applicant_id`),
  ADD KEY `munaqasatcloud__tender_offer_tender_document_id_foreign` (`tender_document_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account__permissions`
--
ALTER TABLE `account__permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `account__roles`
--
ALTER TABLE `account__roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `account__roles_permissions`
--
ALTER TABLE `account__roles_permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `account__roles_users`
--
ALTER TABLE `account__roles_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `account__tenants`
--
ALTER TABLE `account__tenants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `account__users`
--
ALTER TABLE `account__users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `munaqasatcloud__tenders`
--
ALTER TABLE `munaqasatcloud__tenders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `munaqasatcloud__tender_applicants`
--
ALTER TABLE `munaqasatcloud__tender_applicants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `munaqasatcloud__tender_documents`
--
ALTER TABLE `munaqasatcloud__tender_documents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `munaqasatcloud__tender_offer`
--
ALTER TABLE `munaqasatcloud__tender_offer`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account__roles`
--
ALTER TABLE `account__roles`
  ADD CONSTRAINT `account__roles_tenant_id_foreign` FOREIGN KEY (`tenant_id`) REFERENCES `account__tenants` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `account__roles_permissions`
--
ALTER TABLE `account__roles_permissions`
  ADD CONSTRAINT `account__roles_permissions_account_permission_id_foreign` FOREIGN KEY (`account_permission_id`) REFERENCES `account__permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `account__roles_permissions_account_role_id_foreign` FOREIGN KEY (`account_role_id`) REFERENCES `account__roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `account__roles_users`
--
ALTER TABLE `account__roles_users`
  ADD CONSTRAINT `account__roles_users_account_role_id_foreign` FOREIGN KEY (`account_role_id`) REFERENCES `account__roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `account__roles_users_account_user_id_foreign` FOREIGN KEY (`account_user_id`) REFERENCES `account__users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `account__users`
--
ALTER TABLE `account__users`
  ADD CONSTRAINT `account__users_tenant_id_foreign` FOREIGN KEY (`tenant_id`) REFERENCES `account__tenants` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `munaqasatcloud__tenders`
--
ALTER TABLE `munaqasatcloud__tenders`
  ADD CONSTRAINT `munaqasatcloud__tenders_organization_id_foreign` FOREIGN KEY (`organization_id`) REFERENCES `munaqasatcloud__organizations` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `munaqasatcloud__tender_applicants`
--
ALTER TABLE `munaqasatcloud__tender_applicants`
  ADD CONSTRAINT `munaqasatcloud__tender_applicants_freelancer_id_foreign` FOREIGN KEY (`freelancer_id`) REFERENCES `munaqasatcloud__freelancers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `munaqasatcloud__tender_applicants_tender_id_foreign` FOREIGN KEY (`tender_id`) REFERENCES `munaqasatcloud__tenders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `munaqasatcloud__tender_documents`
--
ALTER TABLE `munaqasatcloud__tender_documents`
  ADD CONSTRAINT `munaqasatcloud__tender_documents_tender_id_foreign` FOREIGN KEY (`tender_id`) REFERENCES `munaqasatcloud__tenders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `munaqasatcloud__tender_offer`
--
ALTER TABLE `munaqasatcloud__tender_offer`
  ADD CONSTRAINT `munaqasatcloud__tender_offer_tender_applicant_id_foreign` FOREIGN KEY (`tender_applicant_id`) REFERENCES `munaqasatcloud__tender_applicants` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `munaqasatcloud__tender_offer_tender_document_id_foreign` FOREIGN KEY (`tender_document_id`) REFERENCES `munaqasatcloud__tender_documents` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
