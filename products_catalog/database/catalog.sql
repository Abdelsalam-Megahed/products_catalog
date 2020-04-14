-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 14, 2020 at 06:09 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `catalog`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'MacBooks', '2020-04-13 09:33:54', '2020-04-13 09:33:54'),
(7, 'Phones', '2020-04-14 04:35:27', '2020-04-14 04:35:27'),
(8, 'Earphones', '2020-04-14 04:35:54', '2020-04-14 04:35:54'),
(13, 'Shoe', '2020-04-14 07:13:04', '2020-04-14 07:13:27'),
(14, 'Perfumes', '2020-04-14 09:43:55', '2020-04-14 09:43:55'),
(16, 'Glasses', '2020-04-14 10:24:30', '2020-04-14 10:24:30'),
(17, 'Belts', '2020-04-14 11:05:47', '2020-04-14 11:05:47');

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
(5, '2020_04_13_110102_create_categories_table', 1),
(6, '2020_04_13_110115_create_products_table', 1),
(7, '2014_10_12_100000_create_password_resets_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `in_stock` tinyint(1) NOT NULL,
  `rating` double(8,2) NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `quantity`, `in_stock`, `rating`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'MacBook Pro (13-inch, 8GB RAM, 128GB Storage)', 'Quad-core 8th-Generation Intel Core i5 Processor, Brilliant Retina Display with True Tone technology', 2000.00, 40, 1, 5.00, 2, '2020-04-13 11:19:02', '2020-04-13 11:19:02'),
(4, 'IPhone 11', 'Stunning 13.3-inch Retina display with True Tone technology, Backlit Magic Keyboard and Touch ID', 1100.00, 700, 1, 4.50, 7, '2020-04-14 04:37:03', '2020-04-14 04:37:03'),
(5, 'Samsung S10', 'Best phone with best camera', 1100.00, 700, 0, 4.50, 7, '2020-04-14 05:00:28', '2020-04-14 05:53:43'),
(12, 'Samsung S9', 'Best phone with best camera', 800.00, 300, 1, 4.50, 8, '2020-04-14 06:06:04', '2020-04-14 13:04:23'),
(13, 'Samsung S8', 'Best phone with best camera', 700.00, 300, 1, 4.50, 7, '2020-04-14 06:26:55', '2020-04-14 06:26:55'),
(14, 'Samsung S7', 'Best phone with best camera', 600.00, 120, 0, 3.50, 7, '2020-04-14 06:28:10', '2020-04-14 07:37:21'),
(15, 'Samsung S5', 'Best phone with best camera', 300.00, 400, 1, 2.50, 7, '2020-04-14 09:07:40', '2020-04-14 09:07:40'),
(16, 'Samsung S4', 'Best phone with best camera', 300.00, 400, 1, 2.50, 7, '2020-04-14 11:49:14', '2020-04-14 11:49:14'),
(18, 'Samsung S4', 'Best phone with best camera', 300.00, 400, 1, 2.50, 7, '2020-04-14 12:23:43', '2020-04-14 12:23:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
