-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2025 at 01:31 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `flipkart`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_product_update`
--

CREATE TABLE `admin_product_update` (
  `id` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `productPrice` int(255) NOT NULL,
  `productCategory` enum('Electronics','Fashion','Home & Kitchen','Books','Other') NOT NULL,
  `productDescription` varchar(255) NOT NULL,
  `productquantity` int(255) NOT NULL,
  `productImage` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_product_update`
--

INSERT INTO `admin_product_update` (`id`, `productName`, `productPrice`, `productCategory`, `productDescription`, `productquantity`, `productImage`) VALUES
(33, 'SamsungPhone', 29999, 'Electronics', 'SamsungPhone', 25, '20240722050006-_(1)9.jpg'),
(34, 'I Phone', 28999, 'Electronics', 'Iphone11Pro Max', 15, '1903__product__Mobiles__apple-mobile-iphone-13-blue-128gb-13.png'),
(35, 'Smart Watch', 2999, 'Electronics', 'Watch Boat ', 20, '41tv+epPc0L2.jpg'),
(36, 'Bag-Woodland', 2999, 'Electronics', 'Bag Woodland ', 20, 'images_(1)2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user_database_table`
--

CREATE TABLE `user_database_table` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(25) NOT NULL,
  `role` enum('user','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_database_table`
--

INSERT INTO `user_database_table` (`id`, `name`, `email`, `password`, `role`) VALUES
(1, 'AshokKumar', 'ashokkumar@gmail.com', '$2y$10$gpQZXKiz7jBkskLqyj', 'user'),
(115, 'Admin', 'admin@gmail.com', '$2y$10$3QeKZkLwZHZ2YH1YV7', 'admin'),
(116, 'aakash', 'aakash@gmail.com', '$2y$10$Yn5xQmJJei6lVbs4e9', 'user'),
(117, 'arun', 'arun@gmail.com', '$2y$10$rsz.sJ01hqeLekwIAK', 'user'),
(118, 'hari', 'hari@gmail.com', '$2y$10$z7yOiWVMzWC8nGdTjT', 'user'),
(119, 'new', 'new@gmail.com', '$2y$10$juWS.Oo6lRaESomXGZ', 'user'),
(120, 'arunkumar', 'arun13@gmail.com', '$2y$10$SByOXO117KKCYbTDnJ', 'user'),
(122, 'adminnew', 'adminnew@gmail.com', '12345', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_product_update`
--
ALTER TABLE `admin_product_update`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_database_table`
--
ALTER TABLE `user_database_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_product_update`
--
ALTER TABLE `admin_product_update`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `user_database_table`
--
ALTER TABLE `user_database_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
