-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2021 at 07:41 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `sort_order` tinyint(4) NOT NULL DEFAULT 1,
  `name` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `sort_order`, `name`, `slug`, `is_active`, `created_at`, `updated_at`) VALUES
(1, NULL, 1, 'Consumables', 'consumables', 1, '2021-04-22 11:23:16', '2021-04-22 11:23:16'),
(2, NULL, 1, 'Needles', 'needles', 1, '2021-04-22 11:23:16', '2021-04-22 11:23:16'),
(3, 2, 1, 'Round Liner', 'needles-round-liner', 1, '2021-04-22 11:24:11', '2021-04-22 11:24:11'),
(4, 2, 1, 'Flat', 'needles-flat', 1, '2021-04-22 11:24:11', '2021-04-22 11:24:11'),
(5, 2, 1, 'Magnum M1', 'needles-magnum-m1', 1, '2021-04-22 11:25:03', '2021-04-22 11:25:03'),
(6, 2, 1, 'Shader', 'needles-shaders', 1, '2021-04-22 11:25:03', '2021-04-22 11:25:03'),
(7, NULL, 1, 'Inks', 'inks', 1, '2021-04-22 11:25:27', '2021-04-22 11:25:27'),
(8, 7, 1, 'Kuro Sumi', 'inks-kuro-sumi', 1, '2021-04-22 11:25:58', '2021-04-22 11:25:58'),
(9, NULL, 1, 'Grips And Tips', 'grips-and-tips', 1, '2021-07-01 04:54:58', '2021-07-01 04:54:58'),
(10, 9, 1, 'Disposable Tips', 'disposable-tip', 1, '2021-07-01 04:55:23', '2021-07-01 04:55:23');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(20) NOT NULL,
  `name` varchar(200) NOT NULL,
  `desacription` text NOT NULL,
  `slug` varchar(200) NOT NULL,
  `keywords` varchar(200) DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `unit_id` int(10) UNSIGNED NOT NULL,
  `cost` int(11) NOT NULL,
  `is_service` tinyint(1) NOT NULL,
  `is_feature` tinyint(1) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `code`, `name`, `desacription`, `slug`, `keywords`, `category_id`, `unit_id`, `cost`, `is_service`, `is_feature`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'FTT-003', '3R', 'Disposable Sterilized Tip White 50mm 3R', '3r', '3r', 10, 2, 2250, 0, 0, 1, '2021-07-01 04:54:26', '2021-07-01 05:17:25');

-- --------------------------------------------------------

--
-- Table structure for table `product_options`
--

CREATE TABLE `product_options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(200) NOT NULL,
  `unit_id` int(11) UNSIGNED NOT NULL,
  `price` int(11) NOT NULL,
  `special` int(11) DEFAULT NULL,
  `special_start` timestamp NULL DEFAULT NULL,
  `special_end` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_options`
--

INSERT INTO `product_options` (`id`, `product_id`, `name`, `unit_id`, `price`, `special`, `special_start`, `special_end`, `created_at`, `updated_at`) VALUES
(1, 1, 'Box', 2, 7000, NULL, NULL, NULL, '2021-07-01 04:57:20', '2021-07-01 04:57:20'),
(2, 1, 'Each', 1, 200, NULL, NULL, NULL, '2021-07-01 04:57:20', '2021-07-01 04:57:20');

-- --------------------------------------------------------

--
-- Table structure for table `product_units`
--

CREATE TABLE `product_units` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `value` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_units`
--

INSERT INTO `product_units` (`id`, `name`, `value`, `created_at`, `updated_at`) VALUES
(1, 'Each', 1, '2021-07-01 04:55:56', '2021-07-01 05:18:15'),
(2, 'Box(50)', 50, '2021-07-01 04:55:56', '2021-07-01 05:18:19'),
(3, 'Box', 1, '2021-07-01 05:18:57', '2021-07-01 05:18:57'),
(4, 'Box(20)', 20, '2021-07-01 05:18:57', '2021-07-01 05:18:57');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(200) NOT NULL,
  `business_address` text DEFAULT NULL,
  `bank_details` text DEFAULT NULL,
  `contact_person` varchar(150) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `website` varchar(150) DEFAULT NULL,
  `mobile` varchar(100) DEFAULT NULL,
  `telephone` varchar(100) DEFAULT NULL,
  `account_number` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `business_address`, `bank_details`, `contact_person`, `email`, `website`, `mobile`, `telephone`, `account_number`, `created_at`, `updated_at`) VALUES
(1, 'Focus Tattoo Supply Co.Ltd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-01 05:29:44', '2021-07-01 05:29:44');

-- --------------------------------------------------------

--
-- Table structure for table `supplier_products`
--

CREATE TABLE `supplier_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `supplier_id` int(10) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(150) NOT NULL,
  `name` varchar(150) NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `currency` char(3) NOT NULL,
  `price` int(11) NOT NULL,
  `unit_id` int(11) UNSIGNED NOT NULL,
  `min_order_quantity` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier_products`
--

INSERT INTO `supplier_products` (`id`, `supplier_id`, `product_id`, `code`, `name`, `category_id`, `currency`, `price`, `unit_id`, `min_order_quantity`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'FTT-003', '3R', 10, 'USD', 90, 2, 10, '2021-07-01 05:37:59', '2021-07-01 05:37:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `category_slug` (`slug`),
  ADD KEY `category_parent` (`parent_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_slug` (`slug`),
  ADD KEY `product_category` (`category_id`),
  ADD KEY `unit_product` (`unit_id`);

--
-- Indexes for table `product_options`
--
ALTER TABLE `product_options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_unit` (`unit_id`),
  ADD KEY `product` (`product_id`);

--
-- Indexes for table `product_units`
--
ALTER TABLE `product_units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier_products`
--
ALTER TABLE `supplier_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `supplier_supplier` (`supplier_id`),
  ADD KEY `supplier_products` (`product_id`),
  ADD KEY `supplier_category` (`category_id`),
  ADD KEY `supplier_unit` (`unit_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product_options`
--
ALTER TABLE `product_options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product_units`
--
ALTER TABLE `product_units`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `supplier_products`
--
ALTER TABLE `supplier_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `category_parent` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `product_category` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `unit_product` FOREIGN KEY (`unit_id`) REFERENCES `product_units` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_options`
--
ALTER TABLE `product_options`
  ADD CONSTRAINT `product` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_unit` FOREIGN KEY (`unit_id`) REFERENCES `product_units` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `supplier_products`
--
ALTER TABLE `supplier_products`
  ADD CONSTRAINT `supplier_category` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `supplier_products` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `supplier_supplier` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `supplier_unit` FOREIGN KEY (`unit_id`) REFERENCES `product_units` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
