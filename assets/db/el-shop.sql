-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2021 at 10:27 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `el-shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id_category` int(11) NOT NULL,
  `category` varchar(64) NOT NULL,
  `desc_category` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id_category`, `category`, `desc_category`) VALUES
(1, 'Kategori 1', 'Deskripsi Kategori 1'),
(2, 'Kategori 2', 'Deskripsi Kategori 2'),
(3, 'Kategori 3', 'Deskripsi Kategori 3'),
(4, 'Lainnya', 'Deskripsi Lainnya'),
(5, 'Kategori 4', 'Deskripsi Kategori 4');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id_product` varchar(64) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'product.jpg',
  `stock` int(11) NOT NULL,
  `price` double NOT NULL,
  `desc_product` text NOT NULL,
  `is_active` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id_product`, `category_id`, `name`, `image`, `stock`, `price`, `desc_product`, `is_active`) VALUES
('60d4c4bf1de75', 1, 'Produk 1', '60d4c4bf1de75.png', 100, 100000, 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Id soluta sapiente ad cupiditate eos vel doloribus modi tenetur qui rerum.', '1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` varchar(64) NOT NULL,
  `full_name` varchar(64) NOT NULL,
  `username` varchar(16) NOT NULL,
  `email` varchar(64) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(128) NOT NULL,
  `role` enum('admin','kurir','member','') NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `last_login` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `full_name`, `username`, `email`, `password`, `image`, `role`, `is_active`, `date_created`, `last_login`) VALUES
('60d53d3f1bad9', 'Kurir', 'kurir', 'kurir@el-shop.com', '$2y$10$f4Rb.RC8gcfKYOdU5wa2IOMn54QnNl2ndCSOvjFDEXMEB.tHTvqD6', 'default.jpg', 'kurir', 1, '2021-06-25 02:29:24', '2021-06-25 02:29:34'),
('60d53e86832cf', 'Administrator', 'admin', 'admin@el-shop.com', '$2y$10$SzbSB7KoyQvkKw.R5wkrVegGKOTybri5dG/FzqBoQvhpRD8omRnZa', 'default.jpg', 'admin', 1, '2021-06-25 02:29:28', '2021-06-25 02:29:31'),
('60d5494f78642', 'Member', 'member', 'member@el-shop.com', '$2y$10$KPod.1cLPZE9iatmKp/KqedGwHqFEGKQtRXI2Seyoe28Dp1CMtSre', 'default.jpg', 'member', 1, '2021-06-25 03:11:11', '2021-06-25 03:11:11'),
('60d54cc06f459', 'Member', 'member1', 'member1@el-shop.com', '$2y$10$Tm6V4hBsJXux8GpY8iXDWeZZObmnb3388AhLaERU9PZdyByDOypea', 'default.jpg', 'member', 0, '2021-06-25 03:25:52', '2021-06-25 03:25:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_category`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_product`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
