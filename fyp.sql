-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2023 at 09:45 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fyp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `status` varchar(20) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_email`, `admin_password`, `status`, `admin_name`, `image`) VALUES
(1, '1@gmail.com', '123', 'active', 'qqw      ', 'management.png');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `user_interface_rating` int(11) NOT NULL,
  `shipping_rating` int(11) NOT NULL,
  `customer_service_rating` int(11) NOT NULL,
  `product_quality_rating` int(11) NOT NULL,
  `message` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_id`, `email`, `user_interface_rating`, `shipping_rating`, `customer_service_rating`, `product_quality_rating`, `message`, `created_at`) VALUES
(24, 'muphysly@gmail.com', 5, 5, 5, 5, 'test', '2023-03-27 14:51:06'),
(40, 'dasd@gmail.com', 2, 1, 2, 2, 'Hi ', '2023-05-18 08:12:49'),
(41, 'dasd@gmail.com', 1, 1, 1, 1, 'dsa', '2023-05-18 08:16:31'),
(42, 'dasd@gmail.com', 1, 1, 1, 1, 'dsa', '2023-05-18 08:16:43');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `her_id` int(11) NOT NULL,
  `order_num` int(11) NOT NULL,
  `her_shoesname` varchar(50) NOT NULL,
  `her_size` varchar(10) NOT NULL,
  `her_quantity` int(11) NOT NULL,
  `her_price` int(11) NOT NULL,
  `her_email` varchar(30) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_status` varchar(20) NOT NULL DEFAULT 'Pending',
  `her_date` date NOT NULL,
  `shoe_image` varchar(255) NOT NULL,
  `his_name` varchar(50) NOT NULL,
  `his_email` varchar(50) NOT NULL,
  `his_pn` varchar(30) NOT NULL,
  `his_address` varchar(80) NOT NULL,
  `his_state` varchar(20) NOT NULL,
  `his_code` varchar(30) NOT NULL,
  `his_cardnum` varchar(30) NOT NULL,
  `his_cardname` varchar(30) NOT NULL,
  `his_cardmonth` varchar(3) NOT NULL,
  `his_cardyear` varchar(3) NOT NULL,
  `his_securecode` varchar(5) NOT NULL,
  `total` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`her_id`, `order_num`, `her_shoesname`, `her_size`, `her_quantity`, `her_price`, `her_email`, `user_id`, `order_status`, `her_date`, `shoe_image`, `his_name`, `his_email`, `his_pn`, `his_address`, `his_state`, `his_code`, `his_cardnum`, `his_cardname`, `his_cardmonth`, `his_cardyear`, `his_securecode`, `total`) VALUES
(23, 77, 'Nike Air Max 90', '8', 3, 130, 'dasd@gmail.com', 2, 'Delivering', '2023-05-18', 'nike_air_max_90.png', 'a', 'dasd@gmail.com', '0123456789', '12, Jalan haha, Taman haha ,Semabok', 'melaka', '11111', '1111111111111111', 'test', '12', '54', '541', 0),
(31, 16, 'Air Jordan', '8.5', 1, 420, 'dasd@gmail.com', 2, 'Pending', '2023-05-24', 'jordan.png', 'a', 'dasd@gmail.com', '0123456789', '12, Jalan haha, Taman haha ,Semabok', 'melaka', '11111', '1111111111111111', 'test', '11', '43', '123', 840),
(32, 16, 'Air Jordan', '9', 1, 420, 'dasd@gmail.com', 2, 'Pending', '2023-05-24', 'jordan.png', 'a', 'dasd@gmail.com', '0123456789', '12, Jalan haha, Taman haha ,Semabok', 'melaka', '11111', '1111111111111111', 'test', '11', '43', '123', 840);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `subject`, `message`) VALUES
(1, 'testing', 'test@gmail.com', 'no', 'no'),
(2, 'key', 'test@gmail.com', 'key', 'key'),
(4, 'a', 'dasd@gmail.com', 'after', 'after'),
(9, 'a', 'dasd@gmail.com', 'Tan', 'Tan');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_ID` int(30) NOT NULL,
  `shoesname` varchar(30) NOT NULL,
  `price` int(30) NOT NULL,
  `quantity` int(30) NOT NULL,
  `shoessize` varchar(10) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pro_id` varchar(11) NOT NULL,
  `stock` int(50) NOT NULL,
  `shoe_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_ID`, `shoesname`, `price`, `quantity`, `shoessize`, `user_id`, `pro_id`, `stock`, `shoe_image`) VALUES
(278, 'Adidas Ultraboost', 150, 1, '7', 2, '2', 0, 'adidas.png'),
(279, 'Taylor All Star', 60, 1, '7', 2, '3', 1, 'convers.png');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `his_id` int(11) NOT NULL,
  `his_name` varchar(50) NOT NULL,
  `his_email` varchar(30) NOT NULL,
  `his_pn` varchar(30) NOT NULL,
  `his_address` varchar(80) NOT NULL,
  `his_state` varchar(20) NOT NULL,
  `his_code` varchar(20) NOT NULL,
  `his_cardnum` varchar(30) NOT NULL,
  `his_cardname` varchar(30) NOT NULL,
  `his_cardmonth` varchar(10) NOT NULL,
  `his_cardyear` varchar(10) NOT NULL,
  `his_securecode` varchar(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `her_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`his_id`, `his_name`, `his_email`, `his_pn`, `his_address`, `his_state`, `his_code`, `his_cardnum`, `his_cardname`, `his_cardmonth`, `his_cardyear`, `his_securecode`, `user_id`, `her_id`) VALUES
(47, 'a', 'dasd@gmail.com', '0123456789', '12, Jalan haha, Taman haha ,Semabok', 'melaka', '11111', '1111111111111111', 'test', '12', '32', '123', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `shoes`
--

CREATE TABLE `shoes` (
  `shoe_id` int(11) NOT NULL,
  `shoe_name` varchar(255) NOT NULL,
  `shoe_type` varchar(50) NOT NULL,
  `shoe_brand` varchar(50) NOT NULL,
  `category` enum('man','women') NOT NULL,
  `shoe_image` varchar(255) NOT NULL,
  `shoe_price` decimal(10,2) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shoes`
--

INSERT INTO `shoes` (`shoe_id`, `shoe_name`, `shoe_type`, `shoe_brand`, `category`, `shoe_image`, `shoe_price`, `status`) VALUES
(1, 'Nike Air Max 90', 'Casual Shoes', 'Nike', 'man', 'nike_air_max_90.png', '129.99', 'active'),
(2, 'Adidas Ultraboost', 'Running Shoes', 'Adidas', 'women', 'adidas.png', '149.99', 'active'),
(3, 'Taylor All Star', 'Running Shoes', 'Converse', 'man', 'convers.png', '59.99', 'active'),
(4, 'Puma Suede Classic', 'Sneakers', 'Puma', 'man', 'puma.png', '79.99', 'active'),
(6, 'Air Jordan', 'lifestyle', 'Nike', 'women', 'jordan.png', '420.00', 'active'),
(7, 'test', 'Running Shoes', 'Nike', 'man', 'test.jpeg', '111.00', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `shoe_id` int(11) NOT NULL,
  `size_7` int(11) NOT NULL DEFAULT 0,
  `size_7_5` int(11) NOT NULL DEFAULT 0,
  `size_8` int(11) NOT NULL DEFAULT 0,
  `size_8_5` int(11) NOT NULL DEFAULT 0,
  `size_9` int(11) NOT NULL DEFAULT 0,
  `size_9_5` int(11) NOT NULL DEFAULT 0,
  `size_10` int(11) NOT NULL DEFAULT 0,
  `size_10_5` int(11) NOT NULL DEFAULT 0,
  `size_11` int(11) NOT NULL DEFAULT 0,
  `size_11_5` int(11) NOT NULL DEFAULT 0,
  `size_12` int(11) NOT NULL DEFAULT 0,
  `size_12_5` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`shoe_id`, `size_7`, `size_7_5`, `size_8`, `size_8_5`, `size_9`, `size_9_5`, `size_10`, `size_10_5`, `size_11`, `size_11_5`, `size_12`, `size_12_5`) VALUES
(1, 0, 1, 0, 1, 1, 1, 1, 1, 1, 0, 1, 1),
(2, 0, 1, 1, 1, 0, 1, 0, 1, 1, 0, 0, 1),
(3, 1, 1, 1, 0, 1, 1, 1, 1, 1, 1, 1, 0),
(4, 1, 1, 1, 1, 1, 1, 1, 1, 0, 1, 1, 1),
(5, 1, 1, 1, 0, 1, 1, 1, 1, 1, 1, 0, 5),
(6, 0, 0, 0, 0, 0, 1, 1, 1, 1, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(100) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `contact_no` varchar(14) NOT NULL,
  `email_address` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `userpassword` varchar(30) NOT NULL,
  `confirm_password` varchar(30) NOT NULL,
  `image` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `full_name`, `contact_no`, `email_address`, `username`, `userpassword`, `confirm_password`, `image`, `status`) VALUES
(1, 'abccccc', '0123456789', '123@gmail.com', 'elwin', '123', ' 123', 'love.png', 'inactive'),
(2, 'abccccc', '0123456789', '456@gmail.com', '123', '234', '234', 'profile.jpg', 'active'),
(21, 'a', '0123456789', 'bba712412@gmail.com', 'test', 'Aqwerty1@', 'Aqwerty1@', 'profile.jpg', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `wish_id` int(11) NOT NULL,
  `shoesname` varchar(30) NOT NULL,
  `price` int(30) NOT NULL,
  `size` varchar(30) NOT NULL,
  `stock` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `shoe_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`her_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_ID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`his_id`);

--
-- Indexes for table `shoes`
--
ALTER TABLE `shoes`
  ADD PRIMARY KEY (`shoe_id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`shoe_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`wish_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `her_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_ID` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=280;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `his_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `shoes`
--
ALTER TABLE `shoes`
  MODIFY `shoe_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `wish_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
