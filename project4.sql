-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 23, 2020 at 04:55 PM
-- Server version: 8.0.21-0ubuntu0.20.04.4
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project4`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_09_10_132535_create_months_table', 2),
(5, '2020_09_10_133010_create_suppliers_table', 3),
(6, '2020_09_10_133031_create_products_table', 3),
(7, '2020_09_10_133805_create_transections_table', 3),
(8, '2020_09_17_075411_create_transactions_table', 4),
(9, '2020_09_21_082542_add_cascade_delete', 5),
(10, '2020_09_21_085536_delete_transactions_on_supplier__delete', 6),
(11, '2020_09_22_095948_delele_transaction_on_month_delete', 7),
(12, '2020_09_22_101416_delele_transaction_on_month_delete', 8);

-- --------------------------------------------------------

--
-- Table structure for table `months`
--

CREATE TABLE `months` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `user_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `months`
--

INSERT INTO `months` (`id`, `name`, `start_date`, `end_date`, `user_id`, `created_at`, `updated_at`) VALUES
(32, 'umer (grocery)', '2020-09-22', '2020-10-22', 1, '2020-09-22 08:28:37', '2020-09-22 08:28:37'),
(33, 'ali (milkman)', '2020-09-16', '2020-10-16', 1, '2020-09-22 08:28:57', '2020-09-22 08:28:57'),
(34, 'Jhon_month (meet supplier)', '2020-09-16', '2020-09-30', 1, '2020-09-22 08:42:36', '2020-09-22 08:42:36'),
(35, 'Saad (meet supplier)', '2020-09-16', '2020-10-16', 2, '2020-09-23 02:50:31', '2020-09-23 02:50:31'),
(38, 'test', '2020-09-24', '2020-10-14', 2, '2020-09-23 03:31:07', '2020-09-23 03:31:07');

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
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `supplier_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `user_id`, `supplier_id`, `created_at`, `updated_at`) VALUES
(104, 'Chicken', 200, 2, 20, '2020-09-21 03:01:25', '2020-09-21 03:01:25'),
(105, 'mutton', 1330, 2, 20, '2020-09-21 03:01:33', '2020-09-21 03:01:33'),
(106, 'beef', 500, 2, 20, '2020-09-21 03:01:45', '2020-09-21 03:01:45'),
(107, 'Apples', 200, 2, 20, '2020-09-21 03:02:11', '2020-09-21 03:02:11'),
(108, 'orange', 55, 2, 21, '2020-09-21 03:02:28', '2020-09-21 03:02:28'),
(116, 'yougurt', 66, 1, 24, '2020-09-21 04:39:43', '2020-09-21 04:39:43'),
(117, 'rice', 200, 1, 23, '2020-09-21 04:39:53', '2020-09-21 04:39:53'),
(119, 'breadd', 88, 1, 23, '2020-09-21 08:54:25', '2020-09-21 08:54:25'),
(120, 'suger', 666, 1, 23, '2020-09-22 04:02:22', '2020-09-22 04:02:22'),
(123, 'milk', 100, 1, 24, '2020-09-22 08:03:08', '2020-09-22 08:03:08'),
(124, 'chicken', 200, 1, 33, '2020-09-22 08:42:00', '2020-09-22 08:42:00');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int NOT NULL,
  `phone_number` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `user_id`, `phone_number`, `created_at`, `updated_at`) VALUES
(20, 'Sasd (Meat supplier)', 2, 333765, '2020-09-21 03:01:02', '2020-09-21 03:01:02'),
(21, 'Jhon (Fruit supplier)', 2, 757650, '2020-09-21 03:01:58', '2020-09-21 03:01:58'),
(23, 'Umer  (grocery supplier )', 1, 92321558744, '2020-09-21 04:08:31', '2020-09-22 08:02:22'),
(24, 'Ali (milk supplier)', 1, 92321544785, '2020-09-21 04:39:22', '2020-09-22 08:02:37'),
(33, 'jhon (meet supplier)', 1, 3256989877, '2020-09-22 08:41:35', '2020-09-22 08:41:42');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` int NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `supplier_id` bigint UNSIGNED NOT NULL,
  `month_id` bigint UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `quantity` int NOT NULL,
  `price` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `user_id`, `product_id`, `supplier_id`, `month_id`, `date`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(53, 1, 119, 23, 32, '2020-09-22', 2, 23, '2020-09-22 08:29:16', '2020-09-23 06:49:43'),
(54, 1, 117, 23, 32, '2020-09-22', 2, 400, '2020-09-22 08:29:55', '2020-09-22 08:29:55'),
(55, 1, 123, 24, 33, '2020-09-23', 1, 100, '2020-09-22 08:30:10', '2020-09-22 08:30:10'),
(56, 1, 116, 24, 33, '2020-09-22', 2, 120, '2020-09-22 08:30:28', '2020-09-22 08:30:28'),
(57, 1, 120, 23, 32, '2020-09-24', 2, 40, '2020-09-22 08:30:55', '2020-09-22 08:30:55'),
(58, 1, 116, 24, 33, '2020-10-01', 1, 100, '2020-09-22 08:40:08', '2020-09-22 08:40:08'),
(59, 1, 124, 33, 34, '2020-09-23', 1, 200, '2020-09-22 08:42:52', '2020-09-22 08:42:52'),
(60, 1, 124, 33, 34, '2020-09-25', 2, 400, '2020-09-22 08:43:07', '2020-09-22 08:43:07'),
(62, 1, 120, 24, 33, '2020-09-08', 89, 898, '2020-09-22 09:53:14', '2020-09-22 09:53:14'),
(64, 1, 116, 23, 33, '2020-09-24', 2, 334, '2020-09-23 02:27:56', '2020-09-23 02:27:56'),
(65, 1, 119, 24, 33, '2020-09-24', 6, 7, '2020-09-23 02:43:10', '2020-09-23 02:43:10'),
(66, 1, 117, 23, 32, '2020-10-08', 2, 400, '2020-09-23 02:47:38', '2020-09-23 02:47:38'),
(68, 2, 105, 20, 35, '2020-09-16', 1, 1330, '2020-09-23 02:50:44', '2020-09-23 02:50:44');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
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

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'muaz', 'muaaz.muhammad@nxb.com.pk', NULL, '$2y$10$v82cOfQ0LWMOYnxrDObewuzlXehjtqfitZvRU4qvMZPXvJOYnDn96', NULL, '2020-09-10 08:22:53', '2020-09-10 08:22:53'),
(2, 'ali', 'ali@123.com', NULL, '$2y$10$k2zjKjIEhmAqXv6Y1rBb4Org3DSXYm8Gmp6mdsAUJUg9be.GV3696', NULL, '2020-09-10 09:53:29', '2020-09-10 09:53:29'),
(6, 'jhon', 'jhon@123.com', NULL, '$2y$10$UT6797scb951pJnl/7AgNerUEE7gVVYdUa1CetB6Q2DjdSoXFslIq', NULL, '2020-09-21 08:13:16', '2020-09-21 08:13:16'),
(7, 'Abdul Rafey', 'rafey@gmail.com', NULL, '$2y$10$2l1nVTGl7u1hDrUiV4X0O.06VOjsZ/4hFTn6vsM3R2HX6I2JHWKHO', NULL, '2020-09-21 10:18:42', '2020-09-21 10:18:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `months`
--
ALTER TABLE `months`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_supplier_id_foreign` (`supplier_id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_supplier_id_foreign` (`supplier_id`),
  ADD KEY `transactions_month_id_foreign` (`month_id`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `months`
--
ALTER TABLE `months`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_month_id_foreign` FOREIGN KEY (`month_id`) REFERENCES `months` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transactions_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
