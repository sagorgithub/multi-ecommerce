-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2025 at 12:57 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sagor`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `category_description` longtext NOT NULL,
  `user_id` int(11) NOT NULL COMMENT 'Relationship with users table',
  `category_photo` varchar(255) NOT NULL DEFAULT 'default.png',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `category_description`, `user_id`, `category_photo`, `created_at`, `updated_at`, `deleted_at`) VALUES
(16, 'PureHoney', 'Pure Honey', 1, '16.jpg', '2025-02-01 11:58:03', '2025-02-01 11:58:04', NULL),
(17, 'MustardOil', 'Mustard Oil', 1, '17.jpg', '2025-02-01 11:58:55', '2025-02-01 11:58:55', NULL),
(18, 'OliveOil', 'Olive Oil', 1, '18.jpg', '2025-02-01 11:59:16', '2025-02-01 11:59:16', NULL),
(19, 'Nut', 'Nut', 1, '19.jpg', '2025-02-01 12:10:31', '2025-02-01 12:10:31', NULL),
(20, 'Coconut', 'Coconut', 1, '20.jpg', '2025-02-01 12:11:13', '2025-02-01 12:11:13', NULL),
(21, 'Cooktops', 'ertfgre', 1, '21.png', '2025-02-01 23:50:19', '2025-02-01 23:50:19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `contact_name` varchar(255) NOT NULL,
  `contact_email` varchar(255) NOT NULL,
  `contact_subject` varchar(255) NOT NULL,
  `contact_message` longtext NOT NULL,
  `contact_attachment` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `contact_name`, `contact_email`, `contact_subject`, `contact_message`, `contact_attachment`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Md Noman', 'nomans@deepde.com', 'fdsf', 'fvdasfsadf', 'C:\\xampp\\tmp\\php8BC2.tmp', '2025-02-03 07:28:16', NULL, NULL),
(2, 'Md Noman', 'nomans@deepde.com', 'fdsf', 'fvdasfsadf', 'contact_uploads/2.jpg', '2025-02-03 07:31:01', '2025-02-03 07:31:01', NULL),
(3, 'Md Noman', 'nomans@deepde.com', 'fgsdfgdfsgdfgdsfgdfgfgfdvgbvdbcvbcvxgbdffgh', 'fggdfgfsdg', 'contact_uploads/3.png', '2025-02-03 07:33:12', '2025-02-03 07:33:12', NULL),
(4, 'MD SAGOR HOSEN', 'sagorhossenrased@gmail.com', 'fgsdfgdfsgdfgdsfgdfgfgfdvgbvdbcvbcvxgbdffgh', 'fvdasfsadf', NULL, '2025-02-03 08:59:03', NULL, NULL),
(5, 'MD SAGOR HOSEN', 'sagorhossenrased@gmail.com', 'fgsdfgdfsgdfgdsfgdfgfgfdvgbvdbcvbcvxgbdffgh', 'rt hsbdfgsdfgvsdf', 'contact_uploads/5.pdf', '2025-02-04 12:12:22', '2025-02-04 12:12:22', NULL),
(6, 'MD SAGOR HOSEN', 'sagorhossenrased@gmail.com', 'fgsdfgdfsgdfgdsfgdfgfgfdvgbvdbcvbcvxgbdffgh', 'eartesrtgfer', 'contact_uploads/6.txt', '2025-02-04 12:13:28', '2025-02-04 12:13:28', NULL);

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2014_10_12_100000_create_password_resets_table', 2),
(8, '2024_12_25_155022_create_categories_table', 3),
(15, '2024_12_25_194509_create_products_table', 4),
(20, '2025_02_02_084951_create_contacts_table', 5),
(21, '2025_02_05_135828_create_product_images_table', 6);

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
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_short_description` longtext NOT NULL,
  `product_long_description` longtext NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_quantity` double(8,2) NOT NULL,
  `product_alert_quantity` int(11) NOT NULL,
  `product_thumbnail_photo` varchar(255) NOT NULL DEFAULT 'default_product_thumbnail_photo.jpg',
  `slug` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `product_name`, `product_short_description`, `product_long_description`, `product_price`, `product_quantity`, `product_alert_quantity`, `product_thumbnail_photo`, `slug`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 20, 'Mega Stainless Steel Infrared Cooker - 3500 Watt - Gold', 'fdsfsdf', 'sdfd', 120, 12.00, 2, 'default_product_thumbnail_photo.jpg', 'mega-stainless-steel-infrared-cooker-3500-watt-gold-sbrql', '2025-02-01 23:55:10', '2025-02-05 08:24:46', '2025-02-05 08:24:46'),
(3, 19, 'Nature Honey', 'On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs', 'we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain.\r\n\r\nThese cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided.', 120, 12.00, 2, '3.jpg', 'nature-honey-w5cyy', '2025-02-05 06:53:26', '2025-02-05 06:53:27', NULL),
(6, 17, 'Pure Nature Product', 'dsfsdfsd', 'fdasdfsdf', 120, 12.00, 2, '6.jpg', 'pure-nature-product-l8oyy', '2025-02-05 08:22:25', '2025-02-05 08:22:26', NULL),
(7, 19, 'Pure Nature Product', 'werwer', 'defsadrf', 120, 12.00, 2, '7.jpg', 'pure-nature-product-mi9uk', '2025-02-05 08:23:57', '2025-02-05 08:23:58', NULL),
(8, 19, 'dffadsafdsf', 'sdfaadsf', 'dfsadfs', 120, 12.00, 2, '8.jpg', 'dffadsafdsf-zv8md', '2025-02-05 08:24:29', '2025-02-05 08:24:29', NULL),
(9, 19, 'afdsfdsafsdf', 'sdfsdafdsfsad', 'fsadfwadfsdf', 120, 12.00, 2, '9.jpg', 'afdsfdsafsdf-glhwi', '2025-02-05 08:25:14', '2025-02-05 08:25:14', NULL),
(10, 19, 'afdsfdsafsdfasdfdf', 'sadfdsaf', 'dsfafdffdsa', 120, 12.00, 2, '10.jpg', 'afdsfdsafsdfasdfdf-5hiqi', '2025-02-05 08:25:56', '2025-02-05 08:25:56', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_multiple_image_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `product_multiple_image_name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 5, '5-1.jpg', '2025-02-05 08:09:54', NULL, NULL),
(2, 5, '5-2.jpg', '2025-02-05 08:09:54', NULL, NULL),
(3, 5, '5-3.jpg', '2025-02-05 08:09:55', NULL, NULL),
(4, 5, '5-4.jpg', '2025-02-05 08:09:55', NULL, NULL),
(5, 5, '5-5.jpg', '2025-02-05 08:09:55', NULL, NULL),
(6, 5, '5-6.jpg', '2025-02-05 08:09:55', NULL, NULL),
(7, 6, '6-1.jpg', '2025-02-05 08:22:26', NULL, NULL),
(8, 6, '6-2.jpg', '2025-02-05 08:22:26', NULL, NULL),
(9, 6, '6-3.jpg', '2025-02-05 08:22:26', NULL, NULL),
(10, 8, '8-1.jpg', '2025-02-05 08:24:29', NULL, NULL),
(11, 8, '8-2.jpg', '2025-02-05 08:24:29', NULL, NULL),
(12, 9, '9-1.jpg', '2025-02-05 08:25:14', NULL, NULL),
(13, 9, '9-2.jpg', '2025-02-05 08:25:14', NULL, NULL),
(14, 10, '10-1.jpg', '2025-02-05 08:25:56', NULL, NULL),
(15, 10, '10-2.jpg', '2025-02-05 08:25:56', NULL, NULL),
(16, 10, '10-3.jpg', '2025-02-05 08:25:56', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `profile_photo` varchar(225) NOT NULL DEFAULT 'default.png',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `profile_photo`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'SAGOR HOSEN', 'sagorhossenrased@gmail.com', '2024-12-25 13:36:08', '$2y$10$HOXm8Vk44Uq4ECiGtTAw5u4cx6yr2pgIP3IT0feGiVqjiVQvFNJGq', '1.png', 's97JL2IIYbSDE665SAr0n1oFVCPOi7z5TwLVCqDsVCkTlLhQ44UFzEd5ca8l', '2023-12-25 09:05:14', '2024-12-28 11:15:18'),
(2, 'Rased Hosen', 'sagorhosenrased@gmail.com', NULL, '$2y$12$cd.nLRfbxtvunsajshmQiOtdb.znyqSe.HT6SN/ZyMXmjt/NqF2i6', '2.png', NULL, '2024-12-25 09:06:01', '2024-12-25 12:05:32'),
(3, 'Toufiq', 'toufiq@gmail.com', '2024-12-25 13:34:52', '$2y$12$Llw4ZlMBQ2LBnJBvGdRr8e./aJ9Q4PdZRlRFTUT/CaIFW64i1cozy', 'default.png', NULL, '2024-12-25 13:19:39', '2024-12-25 13:34:52'),
(4, 'Rakib khan', 'ceorakib@yahoo.com', NULL, '$2y$12$.bKTszjMp8hdOGscOJff9eyhirR8.J22hiwW1R3sJqMbz0qVzEi76', 'default.png', NULL, '2025-01-27 07:42:16', '2025-01-27 07:42:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_category_name_unique` (`category_name`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
