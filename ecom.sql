-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 05, 2018 at 09:05 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecom`
--

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
(1, '2018_05_05_134903_create_tbl_admin_table', 1),
(2, '2014_10_12_000000_create_users_table', 2),
(3, '2014_10_12_100000_create_password_resets_table', 2),
(4, '2018_05_10_152313_create_tbl_category_table', 3),
(5, '2018_05_17_181902_create_brands_table', 4),
(6, '2018_05_17_182816_create_tbl_brands_table', 5),
(7, '2018_05_17_194628_create_tbl_products_table', 6),
(8, '2018_05_17_195725_create_tbl_products_table', 7),
(9, '2018_06_04_142913_create_tbl_item_table', 8),
(10, '2018_06_05_205104_create_tbl_slider_table', 9),
(11, '2018_07_11_093939_create_tbl_customer_table', 10),
(12, '2018_07_12_152519_test', 11),
(13, '2018_07_17_042222_create_tbl_shipping_table', 12),
(14, '2018_08_30_175615_create_tbl_orders_table', 13),
(15, '2018_08_30_194031_create_tbl_order_table', 14),
(16, '2018_08_31_045704_create_tbl_order_item_table', 15),
(17, '2018_08_31_113815_create_orders_table', 16),
(18, '2018_08_31_113946_create_order_items_table', 16),
(19, '2018_09_02_132514_create_users_table', 17),
(20, '2018_09_02_190925_create_tbl_blog_table', 18);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_no` int(11) NOT NULL,
  `payment_method` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `customer_name`, `total_amount`, `district`, `shipping_address`, `contact_no`, `payment_method`, `created_at`, `updated_at`) VALUES
(13, 39, 'Nur', '2,640.00', 'Dhaka', 'Mirpur', 1616161444, 'bkash', '2018-09-03 13:16:45', '2018-09-03 13:16:45');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_name` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `product_size` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `product_name`, `brand_name`, `qty`, `product_size`, `product_price`, `created_at`, `updated_at`) VALUES
(15, 13, 50, 'Bluetooth Headphone', 'Beatbox', 1, '0', '2300', '2018-09-03 13:16:45', '2018-09-03 13:16:45'),
(16, 13, 20, 'Harry Potter T shirt 2', 'Harry Potter Shop', 1, 'L', '340', '2018-09-03 13:16:45', '2018-09-03 13:16:45');

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
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(10) UNSIGNED NOT NULL,
  `admin_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`, `admin_phone`, `created_at`, `updated_at`) VALUES
(1, 'rahat', 'rahat@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '017171717171', NULL, NULL),
(2, 'nur', 'nur@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '01672626262', NULL, NULL),
(3, 'onik', 'onik@gmail.com', '11112222', '01616161616', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_blog`
--

CREATE TABLE `tbl_blog` (
  `blog_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_img` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blogger_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activation_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_blog`
--

INSERT INTO `tbl_blog` (`blog_id`, `title`, `body`, `blog_img`, `blogger_name`, `activation_status`, `created_at`, `updated_at`) VALUES
(4, 'What is Lorem Ipsum?', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'imdQstU9BA.jpg', 'Ontik Mahmud', 1, '2018-09-03 05:25:46', NULL),
(5, 'Why do we use it?', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'xsWntbCDVL.jpg', 'Trevor Noah', 1, '2018-09-03 05:26:24', NULL),
(6, 'Where does it come from?', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', 'qjITjD9GgR.jpg', 'Bruce Banner', 1, '2018-09-03 05:27:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brand_id` int(10) UNSIGNED NOT NULL,
  `brand_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_des` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activation_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_brand`
--

INSERT INTO `tbl_brand` (`brand_id`, `brand_name`, `brand_des`, `activation_status`, `created_at`, `updated_at`) VALUES
(2, 'Nike', 'Nike sports', 0, NULL, NULL),
(3, 'Lotto', 'Lotto', 0, NULL, NULL),
(4, 'Apex', 'Apex Footwear', 0, NULL, NULL),
(6, 'Rich Man', 'Rich Man', 1, NULL, NULL),
(7, 'Aarong', 'Aarong', 0, NULL, NULL),
(8, 'La Reve', 'La Reve', 1, NULL, NULL),
(9, 'Belmonte', 'Belmonte', 0, NULL, NULL),
(10, 'Armani', 'Armani', 0, NULL, NULL),
(11, 'Cat\'s Eye', 'Cat\'s Eye', 1, NULL, NULL),
(12, 'Ecstacy', 'Ecstacy', 1, NULL, NULL),
(13, 'Infinity', 'Infinity', 1, NULL, NULL),
(14, 'Valour', 'T shirt Brand', 1, NULL, NULL),
(15, 'Viscose', 'T shirt Brand', 1, NULL, NULL),
(16, 'Grumpy Fish', 'T shirt Brand', 1, NULL, NULL),
(17, 'Harry Potter Shop', 'T shirt Brand', 1, NULL, NULL),
(20, 'Sailor', 'International Clothing Brand', 1, NULL, NULL),
(22, 'Magnum', 'International Clothing Brand', 0, NULL, NULL),
(23, 'Montana', 'Backpack and Purse brand', 1, NULL, NULL),
(24, 'Hailey', 'Bag and purse brand', 1, NULL, NULL),
(26, 'Princess', 'International Women clothing brand', 1, NULL, NULL),
(27, 'JBL', 'Electronics Brand', 1, NULL, NULL),
(30, 'Beatbox', 'International Accessories Brand', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_des` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activation_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`, `category_des`, `activation_status`, `created_at`, `updated_at`) VALUES
(24, 'Men', 'Men\'s products', 1, NULL, NULL),
(25, 'Women', 'Women', 1, NULL, NULL),
(35, 'Gadgets', 'Phone and Tablets', 1, NULL, NULL),
(36, 'Acceccories', 'Computing and Gaming', 1, NULL, NULL),
(37, 'Kids', 'Baby,Kids,Toys', 0, NULL, NULL),
(38, 'Gifts', 'Gift Item', 0, NULL, NULL),
(39, 'Books', 'Self improvement Books', 0, NULL, NULL),
(40, 'Beauty And Health', 'Beauty And Health', 0, '2018-09-01 10:56:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `customer_id` int(10) UNSIGNED NOT NULL,
  `customer_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`customer_id`, `customer_name`, `customer_email`, `customer_phone`, `customer_address`, `customer_password`, `created_at`, `updated_at`) VALUES
(38, 'Nur', 'nur@gmail.com', '01626260626', 'Mirpur', 'e10adc3949ba59abbe56e057f20f883e', '2018-09-03 13:08:58', NULL),
(39, 'Rahat', 'rahat@gmail.com', '01524242422', 'Shahjahanpur,Dhaka', 'e10adc3949ba59abbe56e057f20f883e', '2018-09-03 13:09:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_item`
--

CREATE TABLE `tbl_item` (
  `item_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) NOT NULL,
  `item_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_des` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activation_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_item`
--

INSERT INTO `tbl_item` (`item_id`, `category_id`, `item_name`, `item_des`, `activation_status`, `created_at`, `updated_at`) VALUES
(1, 24, 'Shirt', 'Cotton Shirt', 1, NULL, NULL),
(2, 24, 'T shirt', 'Half Sleeve T shirt', 1, NULL, NULL),
(5, 24, 'Panjabi', 'Cotton Panjabi', 1, NULL, NULL),
(6, 27, 'World Cup Jersey', 'World Cup Football 2018 Jersey', 1, NULL, NULL),
(7, 25, 'Hand Bag', 'Hand Bag', 1, NULL, NULL),
(9, 30, 'Mouse', 'Bluetooth Mouse', 1, NULL, NULL),
(11, 27, 'Football', 'Football', 1, NULL, NULL),
(12, 30, 'Bluetooth Headset', 'Bluetooth Headset', 1, NULL, NULL),
(13, 32, 'Fidget Spinner', 'Fidget Spinner', 1, NULL, NULL),
(14, 32, 'Kid\'s T shirt', 'Kid\'s T shirt', 1, NULL, NULL),
(15, 35, 'Smartphone', 'Smartphone', 0, NULL, NULL),
(17, 36, 'Bluetooth Headset', 'Bluetooth Headset', 1, NULL, NULL),
(18, 36, 'Bluetooth Speaker', 'Wireless Bluetooth Speaker', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) NOT NULL,
  `item_id` int(11) NOT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_des` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_img` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` int(191) NOT NULL,
  `product_size` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_size2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_size3` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_size4` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activation_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `category_id`, `item_id`, `brand_id`, `product_name`, `product_des`, `product_img`, `product_price`, `product_size`, `product_size2`, `product_size3`, `product_size4`, `activation_status`, `created_at`, `updated_at`) VALUES
(19, 24, 2, 17, 'Harry Potter T shirt', 'Premium Quality T shirt', 'aqyOz8rN88.jpg', 350, 'S', 'M', 'L', 'XL', 1, '2018-09-01 10:46:26', NULL),
(20, 24, 2, 17, 'Harry Potter T shirt 2', 'Premium Quality T shirt', '42eTt8Xy6n.jpg', 340, 'S', 'M', 'L', 'XL', 1, '2018-09-01 10:46:26', NULL),
(22, 24, 2, 14, 'Deadpool T shirt', 'Premium Quality T shirt', 'BM8wVKcybQ.jpg', 350, 'M', 'L', 'XL', NULL, 1, '2018-09-01 10:46:26', NULL),
(23, 24, 2, 14, 'Avengers T shirt', 'Premium Quality T shirt', 'hXQzEWv8rG.jpg', 350, 'M', 'L', 'XL', NULL, 1, '2018-09-01 10:46:26', NULL),
(24, 24, 2, 17, 'Harry Potter  T shirt 3', 'Premium Quality T shirt', 'DD52By6rJj.jpg', 350, 'S', 'M', 'L', 'XL', 1, '2018-09-01 10:46:26', NULL),
(25, 24, 2, 16, 'Bangladesh T shirt', 'Premium Quality T shirt', 'w0s7V0ctpl.jpg', 350, 'S', 'M', 'L', 'XL', 1, '2018-09-01 10:46:30', NULL),
(26, 24, 2, 16, 'Dhaka Metro T shirt', 'Premium Quality T shirt', 'z4514ucTVe.jpg', 350, 'M', 'L', 'XL', 'XXL', 1, '2018-09-01 10:46:40', NULL),
(27, 24, 2, 16, 'Professor Sonku T shirt', 'Premium Quality T shirt', 'kLNkYb1OM9.jpg', 350, 'M', 'L', 'XL', 'XXL', 0, '2018-09-01 10:46:43', NULL),
(28, 24, 2, 16, 'Masud Rana T shirt', 'Premium Quality T shirt', 'tHNBFttwQH.jpg', 350, 'M', 'L', 'XL', 'XXL', 0, '2018-09-01 10:46:44', NULL),
(29, 24, 2, 16, 'Tin Goyenda T shirt', 'Premium Quality T shirt', 'vwJxxI1zpK.jpg', 350, 'M', 'L', 'XL', NULL, 0, '2018-09-01 10:46:49', NULL),
(30, 24, 2, 16, 'Dhaka T shirt', 'Premium Quality T shirt', '0xedkzWSY0.jpg', 350, 'M', 'L', 'XL', NULL, 1, '2018-09-01 10:46:50', NULL),
(32, 24, 2, 15, 'Harry Potter  T shirt 4', 'Premium Quality T shirt', '3fUaa0p8n3.jpg', 350, 'L', 'XL', 'XXL', NULL, 1, '2018-09-01 10:46:51', NULL),
(33, 24, 1, 15, 'Full Sleeve Cotton shirt', '100% cotton Full sleeve shirt', '1MuoWmbkZ4.jpg', 700, 'M', 'L', 'XL', NULL, 1, '2018-09-01 10:46:52', NULL),
(34, 24, 1, 6, 'Casual Full Sleeve Shirt', 'Casual Full Sleeve Shirt', 'sYlE58kUiL.jpg', 1200, 'L', 'XL', 'XXL', NULL, 1, '2018-09-01 10:46:53', NULL),
(35, 24, 1, 8, 'Casual Full Sleeve Shirt', 'Casual Full Sleeve Shirt', 'cFFyKhvEh5.jpg', 1400, 'M', 'L', 'XL', NULL, 1, '2018-09-01 10:46:54', NULL),
(36, 24, 1, 13, 'Casual Full Sleeve Shirt', 'Casual Full Sleeve Shirt', 'ajib8WloBR.jpg', 2100, 'S', 'M', 'L', 'XL', 1, '2018-09-01 10:46:55', NULL),
(37, 24, 1, 11, 'Casual Full Sleeve Shirt', 'Casual Full Sleeve Shirt', 'LSiZvVRWCx.jpg', 1400, 'S', 'M', 'L', 'XL', 1, '2018-09-01 10:46:56', NULL),
(38, 24, 1, 6, 'Casual Full Sleeve Shirt', 'Casual Full Sleeve Shirt', 'd7vGvKvmaB.jpg', 1300, 'S', 'M', 'L', 'XL', 1, '2018-09-01 10:46:58', NULL),
(39, 24, 1, 11, 'Casual Full Sleeve Shirt', 'Casual Full Sleeve Shirt', 'RdCmvOcDFV.jpg', 1500, 'S', 'M', 'L', 'XL', 1, '2018-09-01 10:46:58', NULL),
(40, 24, 1, 13, 'Casual Full Sleeve Shirt', 'Casual Full Sleeve Shirt', 'qRMKzQsZkI.jpg', 1500, 'M', 'L', 'XL', NULL, 1, '2018-09-01 10:46:26', NULL),
(41, 24, 1, 12, 'Casual Full Sleeve Shirt', 'Casual Full Sleeve Shirt', 'jgg2Q6ahkC.jpg', 1600, 'M', 'L', 'XL', NULL, 1, '2018-09-01 10:46:26', NULL),
(42, 24, 1, 11, 'Casual Full Sleeve Shirt', 'Casual Full Sleeve Shirt', 'C1OURuSmyE.jpg', 1400, 'M', 'L', 'XL', NULL, 1, '2018-09-01 10:46:26', NULL),
(43, 24, 1, 12, 'Casual Full Sleeve Shirt', 'Casual Full Sleeve Shirt', 'UGEEeCXYzL.jpg', 1300, 'M', 'L', 'XL', 'XXL', 1, '2018-09-01 10:46:26', NULL),
(44, 24, 18, 27, 'Bluetooth Speaker 141', 'Wireless Bluetooth Speaker', 'jCLBf6cudv.jpg', 2500, '0', NULL, NULL, NULL, 1, '2018-09-01 10:46:26', NULL),
(45, 36, 18, 27, 'Bluetooth Speaker 336', 'Wireless Bluetooth Speaker', 'yW38s204T2.jpeg', 2300, '0', NULL, NULL, NULL, 1, '2018-09-01 10:46:26', NULL),
(46, 25, 7, 24, 'Ladies Bag fg44', 'Export quality hand bag', 'jnPPCWIFer.jpg', 700, '0', NULL, NULL, NULL, 1, NULL, NULL),
(47, 25, 7, 23, 'Ladies Bag fg55', 'Export Quality Ladies Bag', '4IPZLdAtjQ.jpg', 1200, '0', NULL, NULL, NULL, 1, NULL, NULL),
(48, 25, 7, 26, 'Ladies Bag fgdd55', 'Export Quality Ladies Bag', 'PUHZuANLgq.jpg', 1500, '0', NULL, NULL, NULL, 1, NULL, NULL),
(49, 25, 7, 24, 'Ladies Bag fg3434', 'Export Quality Ladies Bag', 'hpvO7qHaLw.jpg', 2000, '0', NULL, NULL, NULL, 1, NULL, NULL),
(50, 36, 17, 30, 'Bluetooth Headphone', 'International Accessories Brand', 'Uk15jK4PRo.jpg', 3000, '0', NULL, NULL, NULL, 1, NULL, NULL),
(51, 24, 5, 6, 'Eid Panjabi f22e', 'Cotton Panjabi', 'K7xVt99YaA.jpg', 1200, 'M', NULL, NULL, NULL, 1, NULL, NULL),
(57, 24, 1, 6, 'Sky Blue Full Sleeve Shirt', 'High Quality Cotton shirt', '8cVoYslTSZ.jpeg', 1500, 'M', 'L', 'XL', NULL, 1, '2018-08-31 14:08:06', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slider`
--

CREATE TABLE `tbl_slider` (
  `slider_id` int(10) UNSIGNED NOT NULL,
  `slider_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activation_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_blog`
--
ALTER TABLE `tbl_blog`
  ADD PRIMARY KEY (`blog_id`);

--
-- Indexes for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`customer_id`),
  ADD UNIQUE KEY `customer_email` (`customer_email`);

--
-- Indexes for table `tbl_item`
--
ALTER TABLE `tbl_item`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_blog`
--
ALTER TABLE `tbl_blog`
  MODIFY `blog_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brand_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `customer_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tbl_item`
--
ALTER TABLE `tbl_item`
  MODIFY `item_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  MODIFY `slider_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
