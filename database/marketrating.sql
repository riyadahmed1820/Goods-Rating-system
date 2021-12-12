-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 27, 2021 at 06:12 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `marketrating`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin1', 'admin1@gmail.com', NULL, '$2y$10$H.pXwqI6lHPS.okTLmWDtOwfrvQW.X/7mErZYBVtyNSpvJzrAQma2', NULL, '2021-07-25 11:37:25', '2021-07-25 11:37:25');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `created_at`, `updated_at`) VALUES
(1, 'Fish', '2021-07-25 08:15:39', '2021-07-27 11:33:08'),
(2, 'Vegetables', '2021-07-25 08:15:48', '2021-07-26 04:22:21'),
(3, 'Meats', '2021-07-26 04:21:56', '2021-07-26 04:21:56'),
(4, 'Fruits', '2021-07-26 04:22:03', '2021-07-26 04:22:03'),
(5, 'Groceries', '2021-07-26 04:30:02', '2021-07-26 04:30:02');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `complains`
--

CREATE TABLE `complains` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `complain` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `complains`
--

INSERT INTO `complains` (`id`, `name`, `email`, `product_location`, `complain`, `created_at`, `updated_at`) VALUES
(1, 'Emrul Minhaz', 'emrulminhaz@gmail.com', 'Uttara', 'hello', '2021-07-27 10:45:23', '2021-07-27 10:45:23'),
(2, 'Emrul Minhaz', 'emrulminhaz@gmail.com', 'Mirpur1', 'hi', '2021-07-27 10:45:55', '2021-07-27 10:45:55'),
(3, 'Emrul Minhaz', 'emrulminhaz@gmail.com', 'Mirpur', 'dsgdgdgfdgfg', '2021-07-27 11:34:04', '2021-07-27 11:34:04'),
(4, 'Emrul Minhaz', 'emrulminhaz@gmail.com', 'Uttara1', 'tomato price high', '2021-07-27 11:38:12', '2021-07-27 11:38:12'),
(5, 'Emrul Minhaz', 'emrulminhaz@gmail.com', 'Mirpur', 'High', '2021-07-31 07:26:41', '2021-07-31 07:26:41');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `location_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `location_name`, `created_at`, `updated_at`) VALUES
(1, 'Mirpur', '2021-07-27 04:13:52', '2021-07-27 11:27:35'),
(2, 'Bashundhara', '2021-07-27 04:13:59', '2021-07-27 04:13:59'),
(3, 'Uttara1', '2021-07-27 10:33:00', '2021-07-27 11:33:17'),
(4, 'Motijheel', '2021-07-31 05:52:43', '2021-07-31 05:52:43');

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
(10, '2014_10_12_000000_create_users_table', 1),
(11, '2014_10_12_100000_create_password_resets_table', 1),
(12, '2019_08_19_000000_create_failed_jobs_table', 1),
(13, '2021_03_26_033716_create_categories_table', 1),
(16, '2021_03_27_215938_create_clients_table', 1),
(17, '2021_03_30_195153_create_sliders_table', 1),
(18, '2021_07_25_163801_create_admins_table', 2),
(23, '2021_07_27_085333_create_locations_table', 3),
(25, '2021_03_26_082315_create_products_table', 5),
(26, '2014_10_12_000000_create_users_table', 1),
(27, '2014_10_12_100000_create_password_resets_table', 1),
(28, '2019_08_19_000000_create_failed_jobs_table', 1),
(29, '2021_03_26_033716_create_categories_table', 1),
(30, '2021_07_27_114201_create_complains_table', 6),
(31, '2021_03_27_195643_create_orders_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cart` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('pending','processing','delivered','cencelled') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `order_number`, `email`, `address`, `cart`, `payment_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Emrul Minhaz', 'ORD-VQYDX6ZSGU', 'emrulminhaz@gmail.com', 'Kalachadpur,23', 'O:8:\"App\\Cart\":3:{s:5:\"items\";a:1:{i:2;a:6:{s:3:\"qty\";s:1:\"6\";s:10:\"product_id\";s:1:\"2\";s:12:\"product_name\";s:6:\"tomato\";s:13:\"product_price\";i:10;s:13:\"product_image\";s:21:\"tomato_1627407169.jpg\";s:4:\"item\";O:11:\"App\\Product\":27:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:8:\"products\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:13:\"\0*\0attributes\";a:9:{s:2:\"id\";i:2;s:12:\"product_name\";s:6:\"tomato\";s:13:\"product_price\";i:10;s:16:\"product_category\";s:10:\"Vegetables\";s:13:\"product_image\";s:21:\"tomato_1627407169.jpg\";s:19:\"product_location_id\";i:2;s:6:\"status\";i:1;s:10:\"created_at\";s:19:\"2021-07-27 21:19:14\";s:10:\"updated_at\";s:19:\"2021-07-27 17:32:49\";}s:11:\"\0*\0original\";a:9:{s:2:\"id\";i:2;s:12:\"product_name\";s:6:\"tomato\";s:13:\"product_price\";i:10;s:16:\"product_category\";s:10:\"Vegetables\";s:13:\"product_image\";s:21:\"tomato_1627407169.jpg\";s:19:\"product_location_id\";i:2;s:6:\"status\";i:1;s:10:\"created_at\";s:19:\"2021-07-27 21:19:14\";s:10:\"updated_at\";s:19:\"2021-07-27 17:32:49\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:8:\"\0*\0dates\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}}}s:8:\"totalQty\";i:6;s:10:\"totalPrice\";i:60;}', 'ch_3JT6K4LPanEYYPGj1OcdEuSk', 'pending', '2021-08-27 08:46:26', '2021-08-27 08:46:26');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_location_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_price`, `product_category`, `product_image`, `product_location_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'tomato', 10, 'Vegetables', 'tomato_1627407103.jpg', 1, 2, '2021-07-27 15:19:14', '2021-07-27 11:31:43'),
(2, 'tomato', 10, 'Vegetables', 'tomato_1627407169.jpg', 2, 1, '2021-07-27 15:19:14', '2021-07-27 11:32:49'),
(3, 'Beef', 200, 'Meats', 'beef-meat_1627406204.jpg', 1, 1, '2021-07-27 11:16:44', '2021-07-27 11:16:44'),
(4, 'Catla', 150, 'Fish', 'Catla-fish-কাতল_1627732405.jpg', 4, 1, '2021-07-31 05:53:25', '2021-07-31 05:53:25');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `description1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slider_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `description1`, `description2`, `slider_image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Vegetables', 'Green', 'veg1_1627295047.jpg', 1, '2021-07-25 08:17:16', '2021-07-26 04:24:07'),
(2, 'Fishes', 'Sea food', 'fishess_1627222673.jpg', 1, '2021-07-25 08:17:53', '2021-07-25 08:17:53'),
(3, 'Fruit', 'Eat Every Day', 'fruit1_1627294985.jpg', 1, '2021-07-26 04:23:05', '2021-07-26 04:23:05'),
(4, 'Meat', 'Callories', 'meat-5_1627295012.jpg', 1, '2021-07-26 04:23:32', '2021-07-26 04:23:32');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `type`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'user', 'admin', 'admin1@gmail.com', NULL, '$2y$10$KNtGuHpY7QzucqjFM2KMheFPx5326iodpSS67kQQ9jXJ5x6ZWbwRC', NULL, '2021-07-25 08:14:10', '2021-07-26 02:59:41'),
(2, 'user', 'test user1', 'testuser@gmail.com', NULL, '$2y$10$6MvrcFAJ.hLyj8or11yTuuGldD0kCiJuBKKs4nHb4syVA8IMlqbyq', NULL, '2021-07-25 08:19:40', '2021-07-26 01:31:46'),
(3, 'user', 'test user 1', 'testuser1@gmail.com', NULL, '$2y$10$4hswY0NWPmcJTSgFHeqs0.rmIyH4YglFKhdWq1tNL7kUNwC17Z3sC', NULL, '2021-07-25 08:21:55', '2021-07-25 09:08:55'),
(4, 'user', 'Emrul Minhaz', 'emrulminhaz@gmail.com', NULL, '$2y$10$yi2dusuGh/CClbcNi3c4.uT72ANuq0OlIY/uph.Q5pCkGDKTqSwGO', NULL, '2021-07-25 14:32:26', '2021-07-25 14:32:26');

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
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `clients_email_unique` (`email`);

--
-- Indexes for table `complains`
--
ALTER TABLE `complains`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `orders_order_number_unique` (`order_number`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `complains`
--
ALTER TABLE `complains`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
