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


-------------------tabel of product info--------------------------
CREATE TABLE shoes (
  shoe_id INT PRIMARY KEY,
  shoe_name VARCHAR(255) NOT NULL,
  shoe_type VARCHAR(50) NOT NULL,
  shoe_image VARCHAR(255) NOT NULL,
  shoe_size VARCHAR(10) NOT NULL,
  shoe_price DECIMAL(10, 2) NOT NULL
);

INSERT INTO shoes (shoe_id, shoe_name, shoe_type, shoe_image, shoe_size, shoe_price) 
VALUES (1, 'Nike Air Max', 'Running', 'https://example.com/images/nike-air-max.jpg', 'US 10', 129.99);

--------------------------------table of contact us--------------------
CREATE TABLE messages (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL,
  subject VARCHAR(255) NOT NULL,
  message TEXT NOT NULL
);