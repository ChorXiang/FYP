-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2023 at 05:36 PM
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
-- Database: `dwp_1coin_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`, `image`) VALUES
('admin', 'admin', 'management.png'),
('hern', 'hern', 'management.png');

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

CREATE TABLE `checkout` (
  `checkid` int(11) NOT NULL,
  `Name` varchar(60) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Phonenumber` varchar(11) NOT NULL,
  `payment_method` varchar(20) NOT NULL COMMENT '1=Tng,2=card,3=cash',
  `total` int(11) NOT NULL,
  `table_number` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `checkout`
--

INSERT INTO `checkout` (`checkid`, `Name`, `Email`, `Phonenumber`, `payment_method`, `total`, `table_number`) VALUES
(19, 'Ali', 'dehui@gmail.com', '182027784', '1', 1275, '1');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `name`, `contact`, `email`, `comment`) VALUES
(125, 'TENG DE HUI', '0182027784', 'teng2507@gmail.com', 'The sandwich is nice.'),
(126, 'TENG DE HUI', '0182027784', 'teng2507@gmail.com', 'Hey have a nice day');

-- --------------------------------------------------------

--
-- Table structure for table `foodmenu`
--

CREATE TABLE `foodmenu` (
  `Food_ID` int(50) NOT NULL,
  `Food_Name` varchar(50) NOT NULL,
  `Food_Cat` varchar(50) NOT NULL,
  `Food_Price` int(50) NOT NULL,
  `Ref_ID` int(50) NOT NULL,
  `images_path` varchar(200) NOT NULL,
  `options` varchar(10) NOT NULL DEFAULT 'ENABLE',
  `stock` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `foodmenu`
--

INSERT INTO `foodmenu` (`Food_ID`, `Food_Name`, `Food_Cat`, `Food_Price`, `Ref_ID`, `images_path`, `options`, `stock`) VALUES
(1, 'Chicken Slice', 'Sandwich', 20, 1, 'images/RPLC-all-sandwiches-slicedchicken-MY-594x334.jpg', 'ENABLE', 'DISABLE'),
(2, 'Chicken Teriyaki', 'Sandwich', 15, 2, 'images/RPLC-all-sandwiches-chicken-teriyaki-PH-594x334.jpg', 'ENABLE', '0'),
(3, 'Italian B.M.T.™', 'Sandwich', 25, 3, 'images/RPLC-all-sandwiches-italian-bmt-PH-594x334.jpg', 'ENABLE', '0'),
(4, 'Meatball Marinara', 'Sandwich', 5, 4, 'images/RPLC-all-sandwiches-meatball-marinara-PH-594x334.jpg', 'ENABLE', '0'),
(5, 'Roasted Chicken', 'Sandwich', 12, 5, 'images/RPLC-all-sandwiches-roasted-chicken-PH-594x334.jpg', 'ENABLE', '0'),
(6, 'Roast Beef', 'Sandwich', 8, 6, 'images/RPLC-all-sandwiches-roast-beef-MY-594x334.jpg', 'ENABLE', '0'),
(7, 'Spicy Italian', 'Sandwich', 7, 7, 'images/RPLC-all-sandwiches-spicy-italian-MY-594x334.jpg', 'ENABLE', '0'),
(8, 'Steak & Cheese', 'Sandwich', 30, 8, 'images/RPLC-all-sandwiches-steakandcheese-MY-594x334.jpg', 'ENABLE', '0'),
(9, 'Subway Club™', 'Sandwich', 25, 9, 'images/RPLC-all-sandwiches-subway-club-MY-594x334.jpg', 'ENABLE', '0'),
(10, 'Subway Melt™', 'Sandwich', 27, 10, 'images/RPLC-all-sandwiches-subway-melt-PH-594x334.jpg', 'ENABLE', '0'),
(11, 'Tuna', 'Sandwich', 5, 11, 'images/RPLC-all-sandwiches-tuna-PH-594x334.jpg', 'ENABLE', '0'),
(12, 'Seafood & Crab', 'Sandwich', 35, 12, 'images/RPLC-all-sandwiches-seafood-sensation-MY-594x334.jpg', 'ENABLE', '0'),
(13, 'Turkey Breast', 'Sandwich', 20, 13, 'images/RPLC-all-sandwiches-turkey-MY-594x334.jpg', 'ENABLE', '0'),
(14, 'Turkey Breast & Chicken Slice', 'Sandwich', 10, 14, 'images/RPLC-all-sandwiches-sliced-chicken-ham-PH-594x334.jpg', 'ENABLE', '0'),
(15, 'Veggie Delite™', 'Sandwich', 8, 15, 'images/RPLC-all-sandwiches-veggie-delite-PH-594x334.jpg', 'ENABLE', '0'),
(35, 'Turkey Breast', 'Sandwich', 20, 0, 'images/RPLC-all-sandwiches-slicedchicken-MY-594x334.jpg', 'ENABLE', '10');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_ID` int(30) NOT NULL,
  `Food_ID` int(30) NOT NULL,
  `foodname` varchar(30) NOT NULL,
  `price` int(30) NOT NULL,
  `quantity` int(30) NOT NULL,
  `username` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_ID`, `Food_ID`, `foodname`, `price`, `quantity`, `username`) VALUES
(32, 0, 'Chicken Teriyaki', 15, 10, ''),
(33, 0, 'Italian B.M.T.™', 25, 25, ''),
(34, 0, 'Chicken Teriyaki', 15, 20, ''),
(35, 0, 'Chicken Slice', 20, 10, '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `No` int(100) NOT NULL,
  `Name` varchar(40) NOT NULL,
  `Date` date NOT NULL,
  `Role` varchar(40) NOT NULL,
  `Status` varchar(40) NOT NULL,
  `Email` varchar(40) NOT NULL COMMENT 'Email@gmail.com',
  `PhoneNumber` varchar(12) NOT NULL COMMENT '012-3456789',
  `Summary` text NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`No`, `Name`, `Date`, `Role`, `Status`, `Email`, `PhoneNumber`, `Summary`, `Password`, `Image`) VALUES
(2, 'Lili', '2015-01-21', 'VIP', 'Active', 'Lili@gmail.com', '0155024948', 'hello', '', 'profile.jpg'),
(18, 'Teng', '0000-00-00', 'VIP', 'Inactive', '12112017613@gmail.com', '', '', '254', 'leyang.jpg'),
(20, 'TENG DE HUI', '2003-02-14', 'Customer', 'Active', 'dehui7051@gmail.com', '182027784', 'Hi ', '123', 'profile.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `itemname` varchar(100) NOT NULL,
  `itemimage` varchar(100) NOT NULL,
  `itemprice` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `itemname`, `itemimage`, `itemprice`) VALUES
(23, 'Chicken Teriyaki', 'images/RPLC-all-sandwiches-chicken-teriyaki-PH-594x334.jpg', 15),
(24, 'Roasted Chicken', 'images/RPLC-all-sandwiches-roasted-chicken-PH-594x334.jpg', 12),
(25, 'Chicken Teriyaki', 'images/RPLC-all-sandwiches-chicken-teriyaki-PH-594x334.jpg', 15);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `checkout`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`checkid`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `foodmenu`
--
ALTER TABLE `foodmenu`
  ADD PRIMARY KEY (`Food_ID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`No`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `checkout`
--
ALTER TABLE `checkout`
  MODIFY `checkid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `foodmenu`
--
ALTER TABLE `foodmenu`
  MODIFY `Food_ID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_ID` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `No` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
