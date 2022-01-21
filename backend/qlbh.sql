-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 21, 2022 lúc 05:17 AM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `qlbh`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admins`
--

CREATE TABLE `admins` (
  `id` int(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$QcNFGdRDvdUFNvDOF7hjEet3Y5/xYb92bpmsP5gWNFIpU5CCQZrcm'),
(2, 'admin2', '$2y$10$oEqeKSq8WG5vr4TYv5T18.aL5y4Q6JOZ5ckbo.8a3sR6o71f9K77e');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
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
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_img`, `brand`, `price`, `size`, `color`, `created_at`, `updated_at`) VALUES
(1, 'Nike Dunk Low', '1642738332-Nike-Dunk-Low', 'Adidas', '750000', '40', 'Vàng', '2022-01-18 16:59:24', '2022-01-21 04:12:12'),
(2, 'Nike Cell Exsis WNS', '1642738521-Nike-Cell-Exsis-WNS', 'Nike', '295000', '42', 'Xanh lam', '2022-01-20 09:18:49', '2022-01-21 04:15:53'),
(3, 'Climacool Vento Shoes Mid SS21-GY40', '1642738438-Climacool-Vento-Shoes-Mid-SS21-GY40', 'Adidas', '380000', '42', 'Đỏ', '2022-01-20 10:10:11', '2022-01-21 04:15:59'),
(4, 'Giày chạy bộ nam Hàn Quốc', '1642738454-Giay-chay-bo-nam-Han-Quoc', 'Converse', '15900000', '41', 'Đen', '2022-01-20 10:11:21', '2022-01-21 04:16:07'),
(5, 'Giày Thể Thao Prowin Nữ', '1642738531-Giay-The-Thao-Prowin-Nu', 'Adidas', '150000', '38', 'Vàng', '2022-01-21 09:50:47', '2022-01-21 04:16:14');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
