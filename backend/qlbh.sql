-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2022 at 03:30 AM
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
-- Database: `qlbh`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `password` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `fullname`, `password`) VALUES
(1, 'admin', 'Hà Thanh Hoàng', '$2y$10$QcNFGdRDvdUFNvDOF7hjEet3Y5/xYb92bpmsP5gWNFIpU5CCQZrcm'),
(2, 'admin2', 'Doãn Thị Ngọc Anh', '$2y$10$oEqeKSq8WG5vr4TYv5T18.aL5y4Q6JOZ5ckbo.8a3sR6o71f9K77e');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_img` varchar(255) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `price` varchar(20) NOT NULL,
  `size` varchar(20) NOT NULL,
  `color` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_img`, `brand`, `price`, `size`, `color`, `created_at`, `updated_at`) VALUES
(1, 'Nike Dunk Low', '1642738332-Nike-Dunk-Low', 'Adidas', '750000', '40', 'Vàng', '2022-01-18 16:59:24', '2022-01-20 21:12:12'),
(2, 'Nike Cell Exsis WNS', '1642738521-Nike-Cell-Exsis-WNS', 'Nike', '295000', '42', 'Xanh lam', '2022-01-20 09:18:49', '2022-01-20 21:15:53'),
(3, 'Climacool Vento Shoes Mid SS21-GY40', '1642738438-Climacool-Vento-Shoes-Mid-SS21-GY40', 'Adidas', '380000', '42', 'Đỏ', '2022-01-20 10:10:11', '2022-01-20 21:15:59'),
(4, 'Giày chạy bộ nam Hàn Quốc', '1642738454-Giay-chay-bo-nam-Han-Quoc', 'Converse', '15900000', '41', 'Đen', '2022-01-20 10:11:21', '2022-01-20 21:16:07'),
(5, 'Giày Thể Thao Prowin Nữ', '1642738531-Giay-The-Thao-Prowin-Nu', 'Adidas', '150000', '38', 'Vàng', '2022-01-21 09:50:47', '2022-01-20 21:16:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
