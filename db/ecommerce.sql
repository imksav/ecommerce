-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2021 at 07:37 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `id` int(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `username`, `password`, `role`) VALUES
(1, 'imksav', 'imksav', 'superadmin'),
(2, 'admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(20) NOT NULL,
  `product_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_quantity` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `product_id`, `user_id`, `product_name`, `product_quantity`, `size`, `price`, `image`, `status`) VALUES
(354, 52, 2, 'test1', '10', 'Extra Large', '18750', 'product_image/gp5.jpg', 'ordered'),
(355, 52, 2, 'test1', '10', 'Extra Large', '18750', 'product_image/gp5.jpg', 'ordered'),
(356, 53, 2, 'test2', '10', 'Extra Large', '33840', 'product_image/gp6.jpg', 'ordered'),
(359, 52, 2, 'test1', '10', 'Extra Large', '18750', 'product_image/gp5.jpg', 'ordered'),
(360, 52, 2, 'test1', '10', 'Extra Large', '18750', 'product_image/gp5.jpg', 'ordered'),
(361, 52, 2, 'test1', '10', 'Extra Large', '18750', 'product_image/gp5.jpg', 'ordered'),
(362, 52, 2, 'test1', '1', 'Extra Large', '1875', 'product_image/gp5.jpg', 'ordered'),
(363, 53, 2, 'test2', '1', 'Extra Large', '3384', 'product_image/gp6.jpg', 'ordered'),
(364, 58, 2, 'Baby2', '1', 'Extra Large', '2508.8', 'product_image/gp9.jpg', 'ordered'),
(365, 53, 2, 'test2', '10', 'Extra Large', '33840', 'product_image/gp6.jpg', 'ordered'),
(366, 52, 2, 'test1', '-5', 'Extra Large', '-9375', 'product_image/gp5.jpg', 'ordered'),
(367, 62, 2, 'tesmen3', '1', 'Extra Large', '4100', 'product_image/welcome-right.png', 'ordered'),
(370, 52, 2, 'test1', '10', 'Extra Large', '18750', 'product_image/gp5.jpg', 'ordered');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(255) NOT NULL,
  `product_category` varchar(255) NOT NULL,
  `product_brand` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_featured` varchar(255) NOT NULL,
  `product_quantity` varchar(255) NOT NULL,
  `marked_price` varchar(255) NOT NULL,
  `discount_percent` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `created_date` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_category`, `product_brand`, `product_name`, `product_description`, `product_featured`, `product_quantity`, `marked_price`, `discount_percent`, `file_path`, `created_date`) VALUES
(52, 'men', 'test1', 'test1', 'test1', 'Yes', '932', '2500', '25', 'product_image/gp5.jpg', '2021-09-06 17:32:09.666183'),
(53, 'women', 'test2', 'test2', 'test2', 'No', '664', '3600', '664', 'product_image/psbsLogo.png', '2021-09-06 17:35:02.348647'),
(55, 'women', 'Honkong', 'Saari', 'Honkong saari with priyanka chopra', 'No', '599', '45000', '599', 'product_image/logo.png', '2021-09-06 17:35:33.490516'),
(56, 'women', 'priyanka', 'One Piece', 'One piece red', 'No', '200', '2500', '2', 'product_image/butterfly.png', '2021-09-06 17:35:56.311197'),
(57, 'child', 'baby', 'Baby1', 'Baby1', 'No', '36', '2450', '2', 'product_image/gp11.jpg', '2021-09-05 12:37:25.233984'),
(58, 'child', 'baby', 'Baby2', 'Baby2', 'Yes', '367', '2560', '2', 'product_image/gp9.jpg', '2021-09-06 12:27:29.775089'),
(59, 'child', 'Baby', 'Baby3', 'Baby3', 'No', '20', '2600', '2', 'product_image/user.png', '2021-09-05 16:06:38.832044'),
(61, 'men', 'testmen2', 'testmen2', 'testmen2', 'No', '60', '2633', '0', 'product_image/welcome-left.png', '2021-09-05 15:10:15.708053'),
(62, 'men', 'testmen', 'tesmen3', 'testmen3', 'No', '40', '4100', '0', 'product_image/welcome-right.png', '2021-09-06 17:01:00.334007');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `created_date` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `phone`, `address`, `created_date`) VALUES
(2, 'imksav', 'dcf11f368aef6a5562f67af0002f30f4', 'imksav@gmail.com', '9869260495', 'Basundhara Dol', '2021-08-14 09:15:06.831717'),
(4, 'ksav.pc', '6df20e8f9c101ff294ff82161ee5a5a3', 'ksav.pc@gmail.com', '9823872337', 'New Baneshwor', '2021-08-14 10:09:14.523460'),
(5, 'admin', '0e7517141fb53f21ee439b355b5a1d0a', 'admin@admin.com', '9869260495', 'Deep World', '2021-08-14 11:32:02.767144'),
(13, 'test', '098f6bcd4621d373cade4e832627b4f6', 'test@test.com', 'test', 'test', '2021-08-15 15:03:09.065034'),
(14, 'test2', 'ad0234829205b9033196ba818f7a872b', 'test@gmail.com', '09856958965', 'dhdh acsdh', '2021-09-01 14:55:18.322884'),
(15, 'test3', '8ad8757baa8564dc136c1e07507f4a98', 'test3@gmail.com', '9823872337', 'Basundhara Chowk', '2021-09-06 17:33:26.815166');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=371;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
