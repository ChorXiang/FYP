-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2023 at 03:14 PM
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
-- Database: `shoesshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userno` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `ph` varchar(20) NOT NULL,
  `summary` text NOT NULL,
  `password` int(20) NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userno` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-------------------tabel of product info--------------------------
CREATE TABLE shoes (
  shoe_id INT PRIMARY KEY,
  shoe_name VARCHAR(255) NOT NULL,
  shoe_type VARCHAR(50) NOT NULL,
  shoe_brand VARCHAR(50) NOT NULL,
  category ENUM('male', 'female') NOT NULL,
  shoe_image VARCHAR(255) NOT NULL,
  shoe_size VARCHAR(10) NOT NULL,
  shoe_price DECIMAL(10, 2) NOT NULL
);

INSERT INTO shoes (shoe_id, shoe_name, shoe_type, shoe_brand, category, shoe_image, shoe_size, shoe_price) VALUES
  (1, 'Nike Air Max 90', 'Running Shoes', 'Nike', 'male', 'https://example.com/nike-air-max-90.jpg', '10', 129.99),
  (2, 'Adidas Ultraboost', 'Running Shoes', 'Adidas', 'female', 'https://example.com/adidas-ultraboost.jpg', '8.5', 149.99),
  (3, 'Converse Chuck Taylor All Star', 'Casual Shoes', 'Converse', 'male', 'https://example.com/converse-chuck-taylor.jpg', '9.5', 59.99),
  (4, 'Puma Suede Classic', 'Sneakers', 'Puma', 'female', 'https://example.com/puma-suede-classic.jpg', '7', 79.99);


--------------------------------table of contact us--------------------
CREATE TABLE messages (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL,
  subject VARCHAR(255) NOT NULL,
  message TEXT NOT NULL
);
