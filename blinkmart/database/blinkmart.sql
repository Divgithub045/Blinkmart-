-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2024 at 07:00 PM
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
-- Database: `blinkmart`
--
CREATE DATABASE IF NOT EXISTS `blinkmart` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `blinkmart`;

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

DROP TABLE IF EXISTS `brands`;
CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `brand_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(1, 'cadbury'),
(2, 'Britania'),
(3, 'Maggi'),
(4, 'McDonalds'),
(5, 'Fresh2home'),
(6, 'Haldirams'),
(7, 'myntra'),
(9, 'parle'),
(10, 'Doraemon Store'),
(11, 'Campus'),
(12, 'ShinChan'),
(13, 'Yippie'),
(14, 'Tops'),
(15, 'Ferrero Rocher'),
(16, 'KitKat');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE `cart` (
  `Username` varchar(20) NOT NULL,
  `Product_id` int(11) NOT NULL,
  `Address` varchar(60) NOT NULL,
  `Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`Username`, `Product_id`, `Address`, `Quantity`) VALUES
('Arman_NNB', 8, 'shivshakti pg', 4),
('Arman_NNB', 11, 'shivshakti pg', 2),
('serdiv', 12, 'sln', 1),
('aditya', 11, 'azamgarh', 1),
('aditya', 3, 'azamgarh', 1),
('sdsdsd', 27, 'girital', 1),
('sdsdsd', 19, 'girital', 2),
('sdsdsd', 1, 'girital', 1),
('sdsdsd', 36, 'girital', 2),
('sdsdsd', 7, 'girital', 1),
('sdsdsd', 12, 'girital', 1),
('sdsdsd', 24, 'girital', 1),
('sdsdsd', 25, 'girital', 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_title`) VALUES
(1, 'Biscuits'),
(7, 'Fresh Fruits'),
(8, 'Fresh Veggies'),
(9, 'Namkeens'),
(10, 'dresses women'),
(11, 'Chocolates'),
(12, 'Breads'),
(13, 'Noodles'),
(14, 'Condiments'),
(15, 'Gadgets'),
(16, 'shoes'),
(17, 'Burger'),
(18, 'Toys');

-- --------------------------------------------------------

--
-- Table structure for table `orderitems`
--

DROP TABLE IF EXISTS `orderitems`;
CREATE TABLE `orderitems` (
  `Order_id` int(11) NOT NULL,
  `Product_id` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orderitems`
--

INSERT INTO `orderitems` (`Order_id`, `Product_id`, `Quantity`, `Price`) VALUES
(1, 7, 2, 80),
(1, 10, 2, 10),
(1, 11, 1, 20),
(1, 3, 1, 50),
(2, 7, 2, 80),
(2, 10, 2, 10),
(2, 11, 1, 20),
(2, 3, 1, 50),
(3, 7, 2, 80),
(3, 10, 2, 10),
(3, 11, 1, 20),
(3, 3, 1, 50),
(4, 8, 1, 300),
(5, 1, 1, 40),
(5, 3, 1, 50),
(6, 3, 2, 50),
(6, 8, 1, 300),
(6, 6, 1, 150),
(7, 8, 1, 300),
(8, 4, 1, 750),
(8, 3, 1, 50),
(8, 6, 1, 150),
(9, 12, 1, 14),
(9, 6, 1, 150),
(9, 11, 1, 20),
(10, 11, 1, 20),
(10, 1, 1, 40),
(11, 6, 2, 150),
(11, 9, 1, 10),
(12, 10, 2, 10),
(12, 14, 1, 100),
(12, 4, 1, 750),
(13, 15, 1, 500),
(13, 3, 1, 50),
(14, 32, 1, 500),
(15, 15, 1, 500),
(15, 36, 1, 50),
(16, 1, 2, 40),
(16, 29, 1, 500);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `Order_id` int(11) NOT NULL,
  `user_name` varchar(11) NOT NULL,
  `order_date` date NOT NULL DEFAULT current_timestamp(),
  `Total Price` int(11) NOT NULL,
  `Status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`Order_id`, `user_name`, `order_date`, `Total Price`, `Status`) VALUES
(13, 'sdsdsd', '2024-11-26', 550, 'Pending'),
(14, 'sdsdsd', '2024-11-27', 500, 'Pending'),
(15, 'sdsdsd', '2024-11-27', 550, 'Pending'),
(16, 'sdsdsd', '2024-11-29', 580, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(100) NOT NULL,
  `product_description` varchar(254) NOT NULL,
  `product_keywords` varchar(254) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `image_1` varchar(255) NOT NULL,
  `image_2` varchar(255) NOT NULL,
  `image_3` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_description`, `product_keywords`, `category_id`, `brand_id`, `image_1`, `image_2`, `image_3`, `price`, `date`, `status`) VALUES
(1, 'Tomato', 'ahaa tamatar bade mazedarrr waah tamatar bade mazedarrrr', 'tamatar', 8, 5, 'istockphoto-466175630-612x612.jpg', 'istockphoto-466175630-612x612.jpg', 'istockphoto-466175630-612x612.jpg', 40, '2024-10-24 11:30:41', ''),
(3, 'Guava', 'Somu favourite guava', 'amrood', 7, 5, 'asset_19_600x.jpg', '', '', 50, '2024-10-24 12:27:45', ''),
(4, 'Yellow Frock', 'yellow frock', 'yellow dress woman ', 10, 7, 'yellow_frock.jpg', '', '', 750, '2024-10-24 12:44:22', ''),
(5, 'Orange Juice', 'Orange juice is a refreshing, tangy-sweet drink made from fresh oranges', 'orange juice', 7, 5, 'Orange-Juice-2-of-2.jpeg', '', '', 70, '2024-10-24 12:51:46', ''),
(6, 'Cadbury Dairy Milk Silk Chocolate', 'Cadbury Dairy Milk Silk is all about regaling in the richness and creaminess of chocolate', 'Cadbury Dairy Milk Silk Chocolate', 11, 1, 'cadbury_dairymilk_silk.jpeg', '', '', 150, '2024-10-29 14:16:37', ''),
(7, 'Cadbury Dairy Milk', 'Kuch achha ho jaaye, kuch meetha ho jaaye with Cadbury Dairy Milk', 'Cadbury Dairy Milk,Chocolates', 11, 1, 'Cadbury dairy milk.jpg', '', '', 80, '2024-10-29 14:12:15', ''),
(8, 'Cadbury Dairy Milk Celebration', 'This pack contains Almonds, Cashews & Raisins enrobed in rich chocolate', 'Cadbury Dairy Milk Silk Chocolate Celebration pack gift pack', 11, 1, 'celebration_chocolate.jpg', '', '', 300, '2024-10-29 14:16:08', ''),
(9, 'Britania Good Day Cashew Biscuits', 'Good Day Cashew Cookies are filled with goodness in every crunchy bite.', 'Good Day,Britania,Biscuits', 1, 2, 'Britania_goodday.jpeg', '', '', 9.5, '2024-10-29 14:23:03', ''),
(10, 'Britanina Treat', 'Treat Orange Cream Biscuits are packed with delicious cream to make them a treat for kids.', 'Britanina Treat Orange Flavor Biscuits kids biscuits ', 1, 2, 'Britania_treat_orange.jpeg', '', '', 10, '2024-11-05 09:10:49', ''),
(11, '50-50 sweet and salty', 'Net Quantity	76 gram\r\nBrand	Britannia', 'Biscuit,Fifty,salty Biscuit', 1, 2, 'Britania 50-50.jpeg', '', '', 20, '2024-10-29 14:41:34', ''),
(12, 'Maggi', '140 gm Instant 2 min Noodle', 'Maggi, Noodles', 13, 3, 'maggi.jpg', '', '', 13.5, '2024-11-05 09:05:49', ''),
(15, 'Memory Bread', 'Memory Bread ', 'Memory Bread ', 15, 10, 'memory_bread.jpg', '', '', 500, '2024-11-25 15:53:40', ''),
(16, 'Bamboo Copter', 'Bamboo', 'Bamboo Copter, Helicopter', 15, 10, 'bamboo_copter.jpg', '', '', 1500, '2024-11-25 15:57:43', ''),
(17, 'AnyWhere Door', 'AnyWhere Door', 'Doraemons Anywhere Door', 15, 10, 'anywhere_door.png', '', '', 2500, '2024-11-25 15:58:40', ''),
(18, 'hoodie', 'printed cotton seatshirts', 'jacket', 10, 7, 'hoodie.jpg', '', '', 500, '2024-11-26 09:10:11', ''),
(19, 'Heels', 'Stiletto Party Wear Heels', 'Heels', 10, 7, 'heels.jpg', '', '', 1500, '2024-11-26 09:16:08', ''),
(20, 'Shoes', 'Move with swag', 'shoes', 16, 11, 'shoes.jpg', '', '', 2000, '2024-11-26 09:22:26', ''),
(21, 'Shoes', 'Premium designer shoes', 'shoes', 16, 11, 'shoes1.jpg', '', '', 1500, '2024-11-26 09:25:55', ''),
(22, 'salt', 'salt 500g', 'namak', 14, 9, '65210efbb3d88c25ae191716-njoy-iodized-salt-packets-0-5g-1200-ct.jpg', '', '', 50, '2024-11-26 03:42:05', ''),
(23, 'Aloo Bhujia', 'Amitji loves Bikaji', 'namkeen', 9, 6, 'images.jpg', '', '', 150, '2024-11-26 03:49:20', ''),
(24, 'Choco Pie', 'Mouth melting pie', 'cake', 12, 2, 'choco.jpg', '', '', 100, '2024-11-26 09:33:43', ''),
(25, 'Waffy', 'Choco Wafer Rolls ', 'rolls', 11, 1, 'wafer.jpg', '', '', 150, '2024-11-26 09:36:57', ''),
(26, 'Burger', 'Combo Meals at 100', 'burger', 17, 4, 'burger.jpg', '', '', 99, '2024-11-26 09:42:08', ''),
(27, 'ParleG', 'G for Genius, Glucose biscuit', 'biscuit', 1, 9, 'parle.jpg', '', '', 40, '2024-11-26 09:46:40', ''),
(29, 'ChocoChips', 'ActionKamen Free gift Card', 'shinchan', 11, 12, 'shincham.jpg', '', '', 500, '2024-11-26 09:53:40', ''),
(30, 'Tops Noodles', 'Enjoy the delicious Noodles', 'noodles', 13, 14, 'tops-plain-noodles.jpg', '', '', 56, '2024-11-26 12:14:41', ''),
(31, 'Yippie', 'Long, Non Sticky YiPPie !!', 'yippie', 13, 13, 'yippie.jpg', '', '', 10, '2024-11-26 12:19:02', ''),
(32, 'Ferrero Rocher', 'Discover the authentic taste!!', 'ferrero', 11, 15, 'ferrero.jpg', '', '', 500, '2024-11-26 12:27:55', ''),
(33, 'Kitkat ', 'Have a break,Have a Kitkat', 'kitkat', 11, 16, 'kitkat.jpg', '', '', 50, '2024-11-26 12:32:31', ''),
(34, 'Britannia Cake', 'Soft, fluffy,flavoursome,yum', 'cake', 12, 2, 'cake.jpg', '', '', 20, '2024-11-26 12:38:55', ''),
(35, 'Capsicum', 'Shinchan ki favourite ShimlaMirch', 'shimla mirch', 8, 5, 'fresh-capsicum.jpg', '', '', 20, '2024-11-26 12:41:08', ''),
(36, 'Mango', 'Juicy,fleshy,delicious', 'aam', 7, 5, 'aam.jpg', '', '', 50, '2024-11-26 12:43:53', ''),
(37, 'Dora Cake', 'Dora Dora!!', 'cake', 12, 10, 'doraemon.jpg', '', '', 100, '2024-11-29 19:01:44', ''),
(38, 'Action Kamen', 'Action beam....Hahaha', 'shinchan', 18, 12, 'action.jpg', '', '', 1000, '2024-11-29 11:52:34', ''),
(39, 'Shinchan Giant Noodles', 'Aaj khayenge Giant noodles', 'giant', 13, 12, 'noodles1.jpg', '', '', 150, '2024-11-29 11:57:02', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `user_name` varchar(20) NOT NULL,
  `password` varchar(10) NOT NULL,
  `address` varchar(120) NOT NULL,
  `role` varchar(7) NOT NULL DEFAULT 'User'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_name`, `password`, `address`, `role`) VALUES
('aditya', 'aditya', 'azamgarh', 'User'),
('admin_arman', 'hello@123', '', 'Admin'),
('admin_div', 'hello@123', 'null', 'Admin'),
('admin_somu', 'hello@123', '', 'Admin'),
('admin_tanya', 'hello@123', '', 'Admin'),
('arman gupta', 't1t2', 'satna', 'User'),
('Arman_NNB', 'arman@nnb', 'shivshakti pg', 'User'),
('divnnb', '100124', 'shivshakti pg', 'User'),
('feverdream', '12345', 'sultanpur', 'User'),
('mradul ', 'hello@123', 'ShivShakti Sultanpur sector 128', 'User'),
('sdsdsd', 'sd', 'girital', 'User'),
('serdiv', 'sds', 'sln', 'User'),
('Somu', '101124sds', 'JIIT BACK GATE SECTOR 62', 'User'),
('test', 'test123', 'P500', 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`Order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `Order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
