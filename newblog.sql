-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2019 at 11:58 AM
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
-- Database: `newblog`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(199) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_11_07_050626_creates_tbl_admin_table', 1),
(2, '2019_11_09_063643_create_tbl_category_table', 2),
(3, '2019_11_12_054131_create_manufacture_table', 3),
(4, '2019_11_12_075835_create_tbl_product_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(10) UNSIGNED NOT NULL,
  `admin_email` varchar(199) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_password` varchar(199) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_name` varchar(199) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_phone` varchar(199) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_email`, `admin_password`, `admin_name`, `admin_phone`, `created_at`, `updated_at`) VALUES
(1, 'farhana@gmail.com', '1234', 'farhana', '01703325369', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(199) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_description` varchar(199) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publication_status` int(2) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`, `category_description`, `publication_status`, `created_at`, `updated_at`) VALUES
(2, 'women', 'dfvdfghrfyjjmtgjk', 1, NULL, NULL),
(3, 'men', 'this is men site<br>', 1, NULL, NULL),
(4, 'hello', 'hellofdas<br>', 1, NULL, NULL),
(5, 'dgdfhrftghjry', 'dfvdfghrfyjjmtgjkgfr', 1, NULL, NULL),
(6, 'dgdfhrftghjry', 'dfvdfghrfyjjmtgjk', 1, NULL, NULL),
(7, 'dgdfhrftghjry', 'dfvdfghrfyjjmtgjk', 1, NULL, NULL),
(8, 'dgdfhrftghjry', 'dfvdfghrfyjjmtgjk', 1, NULL, NULL),
(9, 'dgdfhrftghjry', 'dfvdfghrfyjjmtgjk', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_manufacture`
--

CREATE TABLE `tbl_manufacture` (
  `manufacture_id` int(10) UNSIGNED NOT NULL,
  `manufacture_name` varchar(199) COLLATE utf8mb4_unicode_ci NOT NULL,
  `manufacture_description` varchar(199) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publication_status` int(2) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_manufacture`
--

INSERT INTO `tbl_manufacture` (`manufacture_id`, `manufacture_name`, `manufacture_description`, `publication_status`, `created_at`, `updated_at`) VALUES
(1, 'loreal', 'fewf', 1, NULL, NULL),
(2, 'tfgdsfgl.ji.jklknn ,', 'etgsdgm .j<br>', 0, NULL, NULL),
(3, 'thfthdxgbdfbdszfbdf', 'bdfbdfhbdbdfn', 1, NULL, NULL),
(4, 'dtbhdghdsthdthd', 'ghdfhbdzrhg', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `product_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `manufacture_id` int(11) NOT NULL,
  `product_short_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_long_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` double(8,2) NOT NULL,
  `product_image` varchar(199) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_size` varchar(199) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_color` varchar(199) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publication_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `product_name`, `category_id`, `manufacture_id`, `product_short_description`, `product_long_description`, `product_price`, `product_image`, `product_size`, `product_color`, `publication_status`, `created_at`, `updated_at`) VALUES
(4, 'dress', 2, 1, 'dress<br>', 'dress', 1230.00, 'image/1466011834.jpg', '34', 'blue', 1, NULL, NULL),
(5, 'dress', 2, 1, 'dress', 'dress', 1234.00, 'image/171146707.jpg', '34', 'sky blue', 1, NULL, NULL),
(6, 'dress', 2, 1, 'dress', 'dress', 1234.00, 'image/1812871918.jpg', '34', 'black', 1, NULL, NULL),
(8, 'dress', 2, 1, 'dress', 'dress', 1234.00, 'image/866715372.jpg', '34', 'black', 1, NULL, NULL),
(9, 'dress', 2, 1, 'dress', 'dress', 1234.00, 'image/699266567.jpg', '34', 'off white', 1, NULL, NULL),
(10, 'dress', 2, 1, 'dress<br>', 'dress', 1234.00, 'image/2003959786.jpg', '34', 'royal blue', 1, NULL, NULL),
(11, 'dress', 2, 1, 'dress', 'dress', 1234.00, 'image/1847562861.jpg', '34', 'olive green', 1, NULL, NULL),
(12, 'dress', 2, 1, 'dress', 'dress', 1234.00, 'image/485670953.jpg', '34', 'black', 1, NULL, NULL),
(14, 'dress', 2, 1, 'dress', 'dress', 1234.00, 'image/1732538676.jpg', '45', 'fg', 1, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_manufacture`
--
ALTER TABLE `tbl_manufacture`
  ADD PRIMARY KEY (`manufacture_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_manufacture`
--
ALTER TABLE `tbl_manufacture`
  MODIFY `manufacture_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
