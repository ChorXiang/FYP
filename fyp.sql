-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2023 at 05:15 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_id`, `email`, `user_interface_rating`, `shipping_rating`, `customer_service_rating`, `product_quality_rating`, `message`, `created_at`) VALUES
(24, 'muphysly@gmail.com', 5, 5, 5, 5, 'test', '2023-03-27 14:51:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2023 at 06:57 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

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
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(100) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `contact_no` varchar(14) NOT NULL,
  `email_address` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `userpassword` varchar(30) NOT NULL,
  `confirm_password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `full_name`, `contact_no`, `email_address`, `username`, `userpassword`, `confirm_password`) VALUES
(1, 'abc', '0000000000', 'elwinwong@gmail.com', 'elwin', '123', ' 123'),
(2, 'elwin', '123456', 'elwinwong6@gmail.com', 'Elwinwong03', '123', ' 123'),
(4, 'abc', '0000000000', 'elwinwong6@gmail.com', 'elwin', '12345', '12345');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


---------------------------------------------------------------- Latest Database 4/4/2023 by CX ---------------------------------------------------------------- 
-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2023 at 06:20 AM
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
  `a_id` int(100) NOT NULL,
  `admin_id` int(100) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`a_id`, `admin_id`, `admin_password`) VALUES
(1, 1211201078, '12345]');

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
(24, 'muphysly@gmail.com', 5, 5, 5, 5, 'test', '2023-03-27 14:51:06');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `her_id` int(11) NOT NULL,
  `her_shoesname` varchar(50) NOT NULL,
  `her_size` varchar(10) NOT NULL,
  `her_quantity` int(11) NOT NULL,
  `her_price` int(11) NOT NULL,
  `her_email` varchar(30) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_status` varchar(20) NOT NULL DEFAULT 'Pending',
  `her_date` date NOT NULL,
  `shoe_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`her_id`, `her_shoesname`, `her_size`, `her_quantity`, `her_price`, `her_email`, `user_id`, `order_status`, `her_date`, `shoe_image`) VALUES
(0, 'Adidas Ultraboost', '8.5', 2, 150, 'dasd@gmail.com', 2, 'Pending', '2023-04-06', 'adidas.png');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `subject`, `message`, `user_id`) VALUES
(1, 'testing', 'test@gmail.com', 'no', 'no', 0),
(2, 'key', 'test@gmail.com', 'key', 'key', 0);

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
  `pro_id` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `shoe_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`his_id`, `his_name`, `his_email`, `his_pn`, `his_address`, `his_state`, `his_code`, `his_cardnum`, `his_cardname`, `his_cardmonth`, `his_cardyear`, `his_securecode`, `user_id`) VALUES
(1, 'a', 'dasd@gmail.com', '0123456789', '12', 'melaka', '1111', '1111 1111 1111 1111', 'test', '11', '22', '333', 2),
(17, 'a', 'dasd@gmail.com', '0123456789', '12, jalan semabok 1/1, taman semabok sek 1', 'melaka', '75450', '', '', '', '', '', 2),
(37, 'a', 'dasd@gmail.com', '0123456789', '12, Jalan haha, Taman haha ,Semabok', 'melaka', '11111', '2222333344445555', 'test', '23', '55', '123', 2),
(40, 'a', 'dasd@gmail.com', '0123456789', '12, Jalan haha, Taman haha ,Semabok', 'melaka', '11111', '1111222244445555', 'asd', '12', '54', '322', 2),
(41, 'a', 'dasd@gmail.com', '0123456789', '12, Jalan haha, Taman haha ,Semabok', 'melaka', '11111', '1111222255558888', 'asd', '45', '55', '125', 2),
(42, 'a', 'dasd@gmail.com', '0123456789', '12, Jalan haha, Taman haha ,Semabok', 'melaka', '11111', '1111222233335555', 'a', '45', '54', '125', 2),
(43, 'a', 'dasd@gmail.com', '0123456789', '12, Jalan haha, Taman haha ,Semabok', 'melaka', '11111', '5555444477778888', 'asd', '12', '23', '545', 2),
(44, 'a', 'dasd@gmail.com', '0123456789', '12, Jalan haha, Taman haha ,Semabok', 'melaka', '11111', '5555555555555555', 'sda', '12', '32', '132', 2),
(45, 'a', 'dasd@gmail.com', '0123456789', '12, Jalan haha, Taman haha ,Semabok', 'melaka', '11111', '5555555555555555', 'dasd', '12', '23', '123', 2),
(46, 'a', 'dasd@gmail.com', '0123456789', '12, Jalan haha, Taman haha ,Semabok', 'melaka', '11111', '1111222244445555', 'test', '45', '54', '223', 2);

-- --------------------------------------------------------

--
-- Table structure for table `shoes`
--

CREATE TABLE `shoes` (
  `shoe_id` int(11) NOT NULL,
  `shoe_name` varchar(255) NOT NULL,
  `shoe_type` varchar(50) NOT NULL,
  `shoe_brand` varchar(50) NOT NULL,
  `category` enum('male','female') NOT NULL,
  `shoe_image` varchar(255) NOT NULL,
  `shoe_size` varchar(10) NOT NULL,
  `shoe_price` decimal(10,2) NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shoes`
--

INSERT INTO `shoes` (`shoe_id`, `shoe_name`, `shoe_type`, `shoe_brand`, `category`, `shoe_image`, `shoe_size`, `shoe_price`, `stock`) VALUES
(1, 'Nike Air Max 90', 'Running Shoes', 'Nike', 'male', 'nike_air_max_90.png', '10', '129.99', 2),
(2, 'Adidas Ultraboost', 'Running Shoes', 'Adidas', 'female', 'adidas.png', '8.5', '149.99', -1),
(3, 'Converse Chuck Taylor All Star', 'Casual Shoes', 'Converse', 'male', 'convers.png', '9.5', '59.99', 2),
(4, 'Puma Suede Classic', 'Sneakers', 'Puma', 'female', 'puma.png', '7', '79.99', 4),
(5, 'dunk low panda', 'lifestyle', 'nike', 'male', '', '11.5', '489.00', 0),
(6, 'Air Jordan', 'lifestyle', 'nike', 'male', '', '10.5', '420.00', 3);

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
(1, 'abccccc', '0123456789', '123@gmail.com', 'elwin', '123', ' 123', 'management.png', 'active'),
(2, 'abccccc', '0123456789', '456@gmail.com', '123', '234', '234', 'profile.jpg', 'active');

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
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`wish_id`, `shoesname`, `price`, `size`, `stock`, `pro_id`, `user_id`, `shoe_image`) VALUES
(23, 'Adidas Ultraboost', 150, '8.5', 0, 2, 2, 'adidas.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`);

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
