-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2021 at 05:43 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecomphp`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `category_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Wiley Heller', 'in-optio-enim-assumenda-rerum-sequi-quae', 0, 1, '2020-02-04 12:32:27', '2020-02-04 12:32:27'),
(2, 'Prof. Georgianna Cummerata Sr.', 'aut-nemo-aliquam-dolore-id-minima', 0, 1, '2020-02-04 12:32:27', '2020-02-04 12:32:27'),
(3, 'Ari Heaney', 'voluptatem-doloribus-soluta-enim-corporis-sit', 0, 1, '2020-02-04 12:32:27', '2020-02-04 12:32:27'),
(4, 'Rosamond Fay', 'ullam-saepe-tempore-blanditiis-quasi-exercitationem-consequatur-itaque', 0, 1, '2020-02-04 12:32:28', '2020-02-04 12:32:28'),
(5, 'Prof. Victoria Yost', 'et-laudantium-quam-similique-doloremque-facilis', 0, 1, '2020-02-04 12:32:28', '2020-02-04 12:32:28'),
(6, 'Prof. Coby Lakin III', 'ipsam-repellat-distinctio-excepturi-necessitatibus-ut-rerum-voluptatibus', 0, 1, '2020-02-04 12:32:28', '2020-02-04 12:32:28'),
(7, 'Karlie Grant I', 'dolorem-corporis-quidem-fuga-voluptate-aut-impedit-officia', 0, 1, '2020-02-04 12:32:28', '2020-02-04 12:32:28'),
(8, 'Misael Cummings', 'Misael-Cummings', 0, 1, '2020-02-04 12:32:28', '2020-05-21 22:23:28'),
(12, 'Science Of Stupid', 'science-of-stupid', 0, 1, '2020-05-21 23:47:52', '2020-05-21 23:47:52');

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
-- Table structure for table `featured_products`
--

CREATE TABLE `featured_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `featured_products`
--

INSERT INTO `featured_products` (`id`, `product_id`, `created_at`) VALUES
(10, 2, '2020-05-21 21:35:20'),
(11, 10, '2020-05-21 22:01:16'),
(12, 8, '2020-06-10 06:03:46');

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
(17, '2014_10_12_000000_create_users_table', 1),
(18, '2014_10_12_100000_create_password_resets_table', 1),
(19, '2019_08_19_000000_create_failed_jobs_table', 1),
(20, '2020_01_29_120903_create_categories_table', 1),
(21, '2020_01_30_072738_create_products_table', 1),
(22, '2020_01_30_090650_create_product_images_table', 1),
(23, '2020_02_02_073501_create_orders_table', 1),
(24, '2020_02_02_075023_create_order_items_table', 1),
(25, '2020_05_09_073959_create_featured_products_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_phone` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtotal` double(8,2) NOT NULL,
  `delivery_charge` double(8,2) NOT NULL,
  `total_price` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `user_name`, `user_phone`, `user_email`, `address`, `subtotal`, `delivery_charge`, `total_price`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Abdul Mabud', '01930854808', 'abdulmabudm@gmail.com', '26/9 Sher Shah Suri Road, Mohammadpur', 4534.43, 34.45, 545.40, '2020-02-04 12:07:54', '2020-02-04 12:07:54'),
(2, NULL, 'Abdul Mabud', '01930854808', 'abdulmabudm@gmail.com', '26/9 Sher Shah Suri Road, Mohammadpur', 1424.00, 50.00, 1474.00, '2020-02-04 12:18:02', '2020-02-04 12:18:02'),
(3, NULL, 'Abdul Mabud', '01930854808', 'abdulmabudm@gmail.com', '26/9 Sher Shah Suri Road, Mohammadpur', 1837.00, 50.00, 1887.00, '2020-02-04 12:38:38', '2020-02-04 12:38:38'),
(4, NULL, 'Abdul Mabud', '01930854808', 'abdulmabudm@gmail.com', '26/9 Sher Shah Suri Road, Mohammadpur', 1837.00, 50.00, 1887.00, '2020-02-04 12:39:55', '2020-02-04 12:39:55'),
(5, NULL, 'Abdul Mabud', '01930854808', 'abdulmabudm@gmail.com', '26/9 Sher Shah Suri Road, Mohammadpur', 3173.00, 50.00, 3223.00, '2020-02-04 12:40:43', '2020-02-04 12:40:43'),
(6, NULL, 'Abdul Mabud', '01930854808', 'abdulmabudm@gmail.com', '26/9 Sher Shah Suri Road, Mohammadpur', 3173.00, 50.00, 3223.00, '2020-02-04 12:42:12', '2020-02-04 12:42:12'),
(7, NULL, 'Abdul Mabud', '01930854808', 'abdulmabudm@gmail.com', '26/9 Sher Shah Suri Road, Mohammadpur', 1733.00, 50.00, 1783.00, '2020-05-08 21:54:46', '2020-05-08 21:54:46'),
(8, NULL, 'Abdul Mabud', '01930854808', 'abdulmabudm@gmail.com', '26/9 Sher Shah Suri Road, Mohammadpur', 4141.00, 50.00, 4191.00, '2020-05-11 11:35:27', '2020-05-11 11:35:27'),
(9, NULL, 'esd', '455', '', 'xcfg', 2392.00, 50.00, 2442.00, NULL, NULL),
(10, NULL, 'Abdul Mabud', '01930854808', 'abdulmabudm@gmail.com', '26/9 Sher Shah Suri Road, Mohammadpur', 2392.00, 50.00, 2442.00, NULL, NULL),
(11, NULL, 'Abdul Mabud', '01930854808', 'abdulmabudm@gmail.com', '26/9 Sher Shah Suri Road, Mohammadpur', 2392.00, 50.00, 2442.00, NULL, NULL),
(12, NULL, 'Abdul Mabud', '01930854808', 'abdulmabudm@gmail.com', '26/9 Sher Shah Suri Road, Mohammadpur', 2392.00, 50.00, 2442.00, NULL, NULL),
(13, NULL, 'Abdul Mabud', '01930854808', 'abdulmabudm@gmail.com', '26/9 Sher Shah Suri Road, Mohammadpur', 2392.00, 50.00, 2442.00, NULL, NULL),
(14, NULL, 'Abdul Mabud', '01930854808', 'abdulmabudm@gmail.com', '26/9 Sher Shah Suri Road, Mohammadpur', 2392.00, 50.00, 2442.00, NULL, NULL),
(15, NULL, 'Abdul Mabud', '01930854808', 'abdulmabudm@gmail.com', '26/9 Sher Shah Suri Road, Mohammadpur', 2392.00, 50.00, 2442.00, NULL, NULL),
(16, NULL, 'Abdul Mabud', '01930854808', 'abdulmabudm@gmail.com', '26/9 Sher Shah Suri Road, Mohammadpur', 2392.00, 50.00, 2442.00, NULL, NULL),
(17, NULL, 'Abdul Mabud', '01930854808', 'abdulmabudm@gmail.com', '26/9 Sher Shah Suri Road, Mohammadpur', 2392.00, 50.00, 2442.00, NULL, NULL),
(18, NULL, 'Abdul Mabud', '01930854808', 'abdulmabudm@gmail.com', '26/9 Sher Shah Suri Road, Mohammadpur', 2392.00, 50.00, 2442.00, NULL, NULL),
(19, NULL, 'Abdul Mabud', '01930854808', 'abdulmabudm@gmail.com', '26/9 Sher Shah Suri Road, Mohammadpur', 2392.00, 50.00, 2442.00, NULL, NULL),
(20, NULL, 'Abdul Mabud', '01930854808', 'abdulmabudm@gmail.com', '26/9 Sher Shah Suri Road, Mohammadpur', 2392.00, 50.00, 2442.00, NULL, NULL),
(21, NULL, 'Abdul Mabud', '01930854808', 'abdulmabudm@gmail.com', '26/9 Sher Shah Suri Road, Mohammadpur', 773.00, 50.00, 823.00, NULL, NULL),
(22, NULL, 'Abdul Mabud', '01930854808', 'abdulmabudm@gmail.com', '26/9 Sher Shah Suri Road, Mohammadpur', 773.00, 50.00, 823.00, NULL, NULL),
(23, NULL, 'Abdul Mabud', '01930854808', 'abdulmabudm@gmail.com', '26/9 Sher Shah Suri Road, Mohammadpur', 951.00, 50.00, 1001.00, NULL, NULL),
(24, NULL, 'Abdul Mabud', '01930854808', 'abdulmabudm@gmail.com', '26/9 Sher Shah Suri Road, Mohammadpur', 773.00, 50.00, 823.00, NULL, NULL),
(25, NULL, 'Abdul Mabud', '01930854808', 'abdulmabudm@gmail.com', '26/9 Sher Shah Suri Road, Mohammadpur', 1186.00, 50.00, 1236.00, '2020-06-08 08:33:11', NULL),
(26, NULL, 'Abdul Mabud', '01930854808', 'abdulmabudm@gmail.com', '26/9 Sher Shah Suri Road, Mohammadpur', 4051.00, 50.00, 4101.00, '2020-06-08 09:00:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_price` double(8,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_name`, `unit_price`, `quantity`, `created_at`, `updated_at`) VALUES
(2, 3, 'Prof. Cale Cremin', 413.00, 1, '2020-02-04 12:38:38', '2020-02-04 12:38:38'),
(3, 4, 'Mrs. Elouise Hodkiewicz II', 712.00, 2, '2020-02-04 12:39:55', '2020-02-04 12:39:55'),
(4, 4, 'Prof. Cale Cremin', 413.00, 1, '2020-02-04 12:39:56', '2020-02-04 12:39:56'),
(5, 5, 'Mrs. Elouise Hodkiewicz II', 712.00, 2, '2020-02-04 12:40:43', '2020-02-04 12:40:43'),
(6, 5, 'Prof. Cale Cremin', 413.00, 1, '2020-02-04 12:40:43', '2020-02-04 12:40:43'),
(7, 5, 'Merritt Boyer', 668.00, 2, '2020-02-04 12:40:43', '2020-02-04 12:40:43'),
(8, 6, 'Mrs. Elouise Hodkiewicz II', 712.00, 2, '2020-02-04 12:42:12', '2020-02-04 12:42:12'),
(9, 6, 'Prof. Cale Cremin', 413.00, 1, '2020-02-04 12:42:12', '2020-02-04 12:42:12'),
(10, 6, 'Merritt Boyer', 668.00, 2, '2020-02-04 12:42:12', '2020-02-04 12:42:12'),
(11, 7, 'Ms. Tabitha Emmerich DDS', 951.00, 1, '2020-05-08 21:54:46', '2020-05-08 21:54:46'),
(12, 7, 'Merritt Boyer', 668.00, 1, '2020-05-08 21:54:46', '2020-05-08 21:54:46'),
(13, 7, 'Ansel Reilly', 57.00, 2, '2020-05-08 21:54:46', '2020-05-08 21:54:46'),
(14, 8, 'Prof. Cale Cremin', 413.00, 1, '2020-05-11 11:35:27', '2020-05-11 11:35:27'),
(15, 8, 'Merritt Boyer', 668.00, 3, '2020-05-11 11:35:27', '2020-05-11 11:35:27'),
(16, 8, 'Dr. Kayla Fisher PhD', 773.00, 1, '2020-05-11 11:35:27', '2020-05-11 11:35:27'),
(17, 8, 'Ms. Tabitha Emmerich DDS', 951.00, 1, '2020-05-11 11:35:27', '2020-05-11 11:35:27'),
(18, 17, 'Dr. Kayla Fisher PhD', 1.00, 773, NULL, NULL),
(19, 17, 'Ms. Tabitha Emmerich DDS', 1.00, 951, NULL, NULL),
(20, 17, 'Merritt Boyer', 1.00, 668, NULL, NULL),
(21, 18, 'Dr. Kayla Fisher PhD', 773.00, 1, NULL, NULL),
(22, 18, 'Ms. Tabitha Emmerich DDS', 951.00, 1, NULL, NULL),
(23, 18, 'Merritt Boyer', 668.00, 1, NULL, NULL),
(24, 19, 'Dr. Kayla Fisher PhD', 773.00, 1, NULL, NULL),
(25, 19, 'Ms. Tabitha Emmerich DDS', 951.00, 1, NULL, NULL),
(26, 19, 'Merritt Boyer', 668.00, 1, NULL, NULL),
(27, 20, 'Dr. Kayla Fisher PhD', 773.00, 1, NULL, NULL),
(28, 20, 'Ms. Tabitha Emmerich DDS', 951.00, 1, NULL, NULL),
(29, 20, 'Merritt Boyer', 668.00, 1, NULL, NULL),
(30, 21, 'Dr. Kayla Fisher PhD', 773.00, 1, NULL, NULL),
(31, 22, 'Dr. Kayla Fisher PhD', 773.00, 1, NULL, NULL),
(32, 23, 'Ms. Tabitha Emmerich DDS', 951.00, 1, NULL, NULL),
(33, 24, 'Dr. Kayla Fisher PhD', 773.00, 1, NULL, NULL),
(34, 25, 'Prof. Cale Cremin', 413.00, 1, NULL, NULL),
(35, 25, 'Dr. Kayla Fisher PhD', 773.00, 1, NULL, NULL),
(36, 26, 'Prof. Cale Cremin', 413.00, 3, NULL, NULL),
(37, 26, 'Karen Von', 703.00, 4, NULL, NULL);

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
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `regular_price` double(8,2) NOT NULL,
  `sale_price` double(8,2) NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `regular_price`, `sale_price`, `category_id`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Prof. Cale Cremin', 365.00, 413.00, 4, 1, '2020-02-04 12:32:30', '2020-02-04 12:32:30'),
(3, 'Dr. Kayla Fisher PhD', 876.00, 773.00, 3, 1, '2020-02-04 12:32:30', '2020-02-04 12:32:30'),
(4, 'Ms. Tabitha Emmerich DDS', 325.00, 951.00, 1, 1, '2020-02-04 12:32:31', '2020-02-04 12:32:31'),
(5, 'Merritt Boyer', 402.00, 668.00, 1, 1, '2020-02-04 12:32:31', '2020-02-04 12:32:31'),
(6, 'Karen Von', 310.00, 703.00, 1, 1, '2020-02-04 12:32:31', '2020-02-04 12:32:31'),
(7, 'Ansel Reilly', 879.00, 57.00, 1, 1, '2020-02-04 12:32:31', '2020-02-04 12:32:31'),
(8, 'Jermaine Nicolas', 594.00, 279.00, 1, 1, '2020-02-04 12:32:31', '2020-02-04 12:32:31'),
(9, 'Dr. Raymond Wuckert I', 238.00, 926.00, 12, 1, '2020-02-04 12:32:31', '2020-05-22 00:06:54'),
(10, 'Cory Kassulke', 890.00, 604.00, 12, 1, '2020-02-04 12:32:31', '2020-02-04 12:32:31'),
(11, 'Ms. Harmony Mann', 641.00, 700.00, 12, 1, '2020-02-04 12:32:31', '2020-05-22 00:32:40'),
(15, 'New Product u', 300.00, 290.00, 6, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail_image` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `meta_key` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_value` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remarks` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `meta_key`, `meta_value`, `remarks`, `created_at`, `updated_at`) VALUES
(8, 'Delivery Charge', '35', 'null', '2020-07-21 11:53:07', '2020-07-21 20:01:42'),
(20, 'slider_image', '1595402064.jpg', 'Homepage Slider Image', '2020-07-22 01:14:25', '2020-07-22 01:14:25'),
(21, 'slider_image', '1595402070.jpg', 'Homepage Slider Image', '2020-07-22 01:14:31', '2020-07-22 01:14:31'),
(22, 'slider_image', '1595402077.jpg', 'Homepage Slider Image', '2020-07-22 01:14:38', '2020-07-22 01:14:38');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
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
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `featured_products`
--
ALTER TABLE `featured_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `featured_products_product_id_foreign` (`product_id`);

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
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`);

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
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_images_product_id_foreign` (`product_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `featured_products`
--
ALTER TABLE `featured_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `featured_products`
--
ALTER TABLE `featured_products`
  ADD CONSTRAINT `featured_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
