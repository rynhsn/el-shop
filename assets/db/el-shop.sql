-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2021 at 12:28 PM
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
-- Table structure for table `alamat_pengiriman`
--

CREATE TABLE `alamat_pengiriman` (
  `id_alamat` varchar(64) NOT NULL,
  `user_id` varchar(64) NOT NULL,
  `label` varchar(12) NOT NULL,
  `nama_penerima` varchar(64) NOT NULL,
  `no_hp_penerima` varchar(15) NOT NULL,
  `kecamatan` varchar(32) NOT NULL,
  `kab_kota` varchar(32) NOT NULL,
  `prov` varchar(32) NOT NULL,
  `kode_pos` int(5) NOT NULL,
  `alamat_lengkap` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id_berita` varchar(64) NOT NULL,
  `user_id` varchar(64) NOT NULL,
  `category_blog` varchar(20) NOT NULL,
  `blog_title` varchar(64) NOT NULL,
  `blog_slug` varchar(256) NOT NULL,
  `keywords` text DEFAULT NULL,
  `blog_status` varchar(32) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(64) NOT NULL,
  `date_created` datetime NOT NULL,
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id_category` int(11) NOT NULL,
  `category` varchar(64) NOT NULL,
  `category_slug` varchar(255) NOT NULL,
  `sort` int(11) NOT NULL,
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id_category`, `category`, `category_slug`, `sort`, `update_at`) VALUES
(1, 'Kategori 1', 'kategori-1', 1, '2021-06-27 18:04:37'),
(2, 'Kategori 2', 'kategori-2', 2, '2021-06-26 23:00:15'),
(3, 'Kategori 3', 'kategori-3', 3, '2021-06-26 23:00:19'),
(4, 'Kategori 6', 'kategori-6', 6, '2021-06-26 23:23:23'),
(5, 'Kategori 4', 'kategori-4', 4, '2021-06-26 23:00:28'),
(9, 'Kategori 5', 'kategori-5', 5, '2021-06-26 23:17:31');

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

CREATE TABLE `checkout` (
  `id_trx` varchar(64) NOT NULL,
  `user_id` varchar(64) NOT NULL,
  `alamat_id` varchar(64) NOT NULL,
  `tgl_trx` date NOT NULL,
  `total` double NOT NULL,
  `status_bayar` varchar(32) NOT NULL,
  `rekening_pembayaran` varchar(255) DEFAULT NULL,
  `rekening_pelanggan` varchar(255) DEFAULT NULL,
  `bukti_bayar` varchar(255) DEFAULT NULL,
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `checkout_detail`
--

CREATE TABLE `checkout_detail` (
  `id_detail_trx` varchar(64) NOT NULL,
  `trx_id` varchar(64) NOT NULL,
  `product_id` varchar(64) NOT NULL,
  `qty` int(11) NOT NULL,
  `sub_total` double NOT NULL,
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE `config` (
  `id_config` varchar(64) NOT NULL,
  `site_name` varchar(64) NOT NULL,
  `tagline` varchar(128) DEFAULT NULL,
  `email` varchar(64) DEFAULT NULL,
  `website` varchar(64) DEFAULT NULL,
  `keywords` text DEFAULT NULL,
  `metatext` text DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` varchar(256) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `logo` varchar(64) DEFAULT NULL,
  `icon` varchar(64) DEFAULT NULL,
  `payment_account` varchar(64) DEFAULT NULL,
  `update_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`id_config`, `site_name`, `tagline`, `email`, `website`, `keywords`, `metatext`, `phone`, `address`, `description`, `logo`, `icon`, `payment_account`, `update_at`) VALUES
('1', 'Engine Lubricant', 'SOUTH EAST ASIA’S (SEA) TOTAL SOLUTIONS LUBRICANTS PARTNER', 'marketing@npmgroup.co.id', 'npmgroup.com', 'Engine Lubricant, Oil Machine', 'engine-lubricant', '+6221 (290 -72880)', 'Krakatau Industrial Estate Cilegon (KIEC)\r\nJl. Eropa II Kav. D/3-1, D/3-4, B/3-1\r\nCilegon, Banten 42443 – Indonesia', 'Engine Lubricant, Nusaraya Putra Mandiri', 'logo.png', 'icon.png', '614 234 125', '2021-06-28 10:34:02');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id_product` varchar(64) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `product_slug` varchar(255) NOT NULL,
  `keywords` text DEFAULT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'product.jpg',
  `stock` int(11) NOT NULL,
  `price` double NOT NULL,
  `desc_product` text NOT NULL,
  `is_active` enum('1','0') NOT NULL,
  `weight` varchar(64) DEFAULT NULL,
  `size` varchar(255) DEFAULT NULL,
  `date_created` datetime NOT NULL,
  `update_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id_product`, `category_id`, `name`, `product_slug`, `keywords`, `image`, `stock`, `price`, `desc_product`, `is_active`, `weight`, `size`, `date_created`, `update_at`) VALUES
('PRO001', 1, 'Produk 1', 'produk-1', 'Tag 1, Tag 2, Tag 3', 'PRO001.jpg', 150, 25000000, 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Corrupti unde aliquam eligendi non, labore error tempora sequi, quidem itaque expedita maiores, nihil veniam odit? Libero nisi iste similique quidem quasi rerum repellendus, totam temporibus sit quod corporis ex magni ipsa aspernatur tempore deleniti dignissimos expedita velit ratione ipsam? Repudiandae ducimus autem consequuntur amet aut dolorum inventore voluptate magni quidem repellat alias blanditiis, temporibus eius enim ut accusamus omnis corrupti accusantium minima veniam laborum voluptatum! Quos, consequuntur consectetur incidunt laudantium, est deleniti, iste sint ipsam quas dolor distinctio cupiditate ad excepturi recusandae. Perspiciatis qui animi quidem labore, veniam aperiam id quod.', '1', '', '', '2021-06-28 08:02:05', '2021-06-28 06:02:05'),
('PRO002', 1, 'Produk 2', 'produk-2', 'sdf', 'PRO002.jpg', 12, 50000, 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Corrupti unde aliquam eligendi non, labore error tempora sequi, quidem itaque expedita maiores, nihil veniam odit? Libero nisi iste similique quidem quasi rerum repellendus, totam temporibus sit quod corporis ex magni ipsa aspernatur tempore deleniti dignissimos expedita velit ratione ipsam? Repudiandae ducimus autem consequuntur amet aut dolorum inventore voluptate magni quidem repellat alias blanditiis, temporibus eius enim ut accusamus omnis corrupti accusantium minima veniam laborum voluptatum! Quos, consequuntur consectetur incidunt laudantium, est deleniti, iste sint ipsam quas dolor distinctio cupiditate ad excepturi recusandae. Perspiciatis qui animi quidem labore, veniam aperiam id quod.', '1', '12 kg', '50x50 cm', '2021-06-28 10:48:04', '2021-06-28 08:48:04'),
('PRO003', 1, 'Produk 3', 'produk-3', '', 'PRO003.jpg', 50, 15000, 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Corrupti unde aliquam eligendi non, labore error tempora sequi, quidem itaque expedita maiores, nihil veniam odit? Libero nisi iste similique quidem quasi rerum repellendus, totam temporibus sit quod corporis ex magni ipsa aspernatur tempore deleniti dignissimos expedita velit ratione ipsam? Repudiandae ducimus autem consequuntur amet aut dolorum inventore voluptate magni quidem repellat alias blanditiis, temporibus eius enim ut accusamus omnis corrupti accusantium minima veniam laborum voluptatum! Quos, consequuntur consectetur incidunt laudantium, est deleniti, iste sint ipsam quas dolor distinctio cupiditate ad excepturi recusandae. Perspiciatis qui animi quidem labore, veniam aperiam id quod.', '1', '', '', '2021-06-28 14:15:16', '2021-06-28 12:15:16'),
('PRO004', 1, 'Produk 4', 'produk-4', 'Keywords', 'PRO004.jpg', 21, 120000, 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Corrupti unde aliquam eligendi non, labore error tempora sequi, quidem itaque expedita maiores, nihil veniam odit? Libero nisi iste similique quidem quasi rerum repellendus, totam temporibus sit quod corporis ex magni ipsa aspernatur tempore deleniti dignissimos expedita velit ratione ipsam? Repudiandae ducimus autem consequuntur amet aut dolorum inventore voluptate magni quidem repellat alias blanditiis, temporibus eius enim ut accusamus omnis corrupti accusantium minima veniam laborum voluptatum! Quos, consequuntur consectetur incidunt laudantium, est deleniti, iste sint ipsam quas dolor distinctio cupiditate ad excepturi recusandae. Perspiciatis qui animi quidem labore, veniam aperiam id quod.', '1', '', '', '2021-06-28 12:09:46', '2021-06-28 10:09:46'),
('PRO005', 1, 'Produk 5', 'produk-5', '', 'PRO005.jpg', 25, 3000000, 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Corrupti unde aliquam eligendi non, labore error tempora sequi, quidem itaque expedita maiores, nihil veniam odit? Libero nisi iste similique quidem quasi rerum repellendus, totam temporibus sit quod corporis ex magni ipsa aspernatur tempore deleniti dignissimos expedita velit ratione ipsam? Repudiandae ducimus autem consequuntur amet aut dolorum inventore voluptate magni quidem repellat alias blanditiis, temporibus eius enim ut accusamus omnis corrupti accusantium minima veniam laborum voluptatum! Quos, consequuntur consectetur incidunt laudantium, est deleniti, iste sint ipsam quas dolor distinctio cupiditate ad excepturi recusandae. Perspiciatis qui animi quidem labore, veniam aperiam id quod.', '1', '20 g', '50x50 cm', '2021-06-28 14:20:21', '2021-06-28 12:20:21'),
('PRO006', 2, 'Product 6', 'kategori-6', '', 'PRO006.jpg', 600, 2540000, 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Corrupti unde aliquam eligendi non, labore error tempora sequi, quidem itaque expedita maiores, nihil veniam odit? Libero nisi iste similique quidem quasi rerum repellendus, totam temporibus sit quod corporis ex magni ipsa aspernatur tempore deleniti dignissimos expedita velit ratione ipsam? Repudiandae ducimus autem consequuntur amet aut dolorum inventore voluptate magni quidem repellat alias blanditiis, temporibus eius enim ut accusamus omnis corrupti accusantium minima veniam laborum voluptatum! Quos, consequuntur consectetur incidunt laudantium, est deleniti, iste sint ipsam quas dolor distinctio cupiditate ad excepturi recusandae. Perspiciatis qui animi quidem labore, veniam aperiam id quod.', '1', '50 g', '', '2021-06-28 14:21:40', '2021-06-28 12:21:40'),
('PRO007', 2, 'Produk 7', 'produk-7', '', 'PRO007.jpg', 250, 2500000, 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Corrupti unde aliquam eligendi non, labore error tempora sequi, quidem itaque expedita maiores, nihil veniam odit? Libero nisi iste similique quidem quasi rerum repellendus, totam temporibus sit quod corporis ex magni ipsa aspernatur tempore deleniti dignissimos expedita velit ratione ipsam? Repudiandae ducimus autem consequuntur amet aut dolorum inventore voluptate magni quidem repellat alias blanditiis, temporibus eius enim ut accusamus omnis corrupti accusantium minima veniam laborum voluptatum! Quos, consequuntur consectetur incidunt laudantium, est deleniti, iste sint ipsam quas dolor distinctio cupiditate ad excepturi recusandae. Perspiciatis qui animi quidem labore, veniam aperiam id quod.', '1', '60 g', '2x2 m', '2021-06-28 14:23:01', '2021-06-28 12:23:01'),
('PRO008', 3, 'Produk 8', 'produk-8', '', 'PRO008.jpg', 500, 12500000, 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Corrupti unde aliquam eligendi non, labore error tempora sequi, quidem itaque expedita maiores, nihil veniam odit? Libero nisi iste similique quidem quasi rerum repellendus, totam temporibus sit quod corporis ex magni ipsa aspernatur tempore deleniti dignissimos expedita velit ratione ipsam? Repudiandae ducimus autem consequuntur amet aut dolorum inventore voluptate magni quidem repellat alias blanditiis, temporibus eius enim ut accusamus omnis corrupti accusantium minima veniam laborum voluptatum! Quos, consequuntur consectetur incidunt laudantium, est deleniti, iste sint ipsam quas dolor distinctio cupiditate ad excepturi recusandae. Perspiciatis qui animi quidem labore, veniam aperiam id quod.', '1', '', '20x20 cm', '2021-06-28 14:23:42', '2021-06-28 12:23:42');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id_image` varchar(64) NOT NULL,
  `product_id` varchar(64) NOT NULL,
  `image_title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id_image`, `product_id`, `image_title`, `image`, `update_at`) VALUES
('60d9942818430', 'PRO002', 'Gambar 1', '60d9942818430.jpg', '2021-06-29 18:07:32'),
('60d99b09e9177', 'PRO002', 'Gambar 2', '60d99b09e9177.jpg', '2021-06-29 18:07:29'),
('60d99b163b1d7', 'PRO002', 'Gambar 1', '60d99b163b1d7.jpg', '2021-06-28 09:49:10'),
('60d99b1ab013a', 'PRO002', 'Gambar 2', '60d99b1ab013a.jpg', '2021-06-28 09:49:14');

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
  `image` varchar(128) NOT NULL DEFAULT 'user.jpg',
  `role` enum('admin','kurir','member','') NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `last_login` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `jk` enum('Laki-laki','Perempuan','','') DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `kecamatan` varchar(32) DEFAULT NULL,
  `kab_kota` varchar(32) DEFAULT NULL,
  `prov` varchar(32) DEFAULT NULL,
  `kode_pos` varchar(5) DEFAULT NULL,
  `alamat_lengkap` varchar(128) DEFAULT NULL,
  `no_hp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `full_name`, `username`, `email`, `password`, `image`, `role`, `is_active`, `date_created`, `last_login`, `update_at`, `jk`, `tgl_lahir`, `kecamatan`, `kab_kota`, `prov`, `kode_pos`, `alamat_lengkap`, `no_hp`) VALUES
('60d53d3f1bad9', 'Kurir', 'kurir', 'kurir@el-shop.com', '$2y$10$HXi.4fzOAtNmMdNWdAkrVuxRrMbQ7A4HMSoYSRVwMaRsZvZryYuBC', 'user.jpg', 'kurir', 1, '2021-06-25 02:29:24', '2021-06-25 02:29:34', '2021-06-26 22:24:23', 'Laki-laki', '2000-12-05', 'Serang', 'Serang', 'Banten', '41724', 'Jl. Raya Pandeglang, KM. 7, Kec. Serang, Kota Serang', '081525464568'),
('60d53e86832cf', 'Administrator', 'admin', 'admin@el-shop.com', '$2y$10$8441g3jVVcmvuhk7XaSdJuXRoA7b/88syBqbty7BGMOQgF7cGdrsq', 'user.jpg', 'admin', 1, '2021-06-25 02:29:28', '2021-06-30 10:23:35', '2021-06-30 10:23:35', 'Laki-laki', '2021-06-02', 'Curug', 'Serang', 'Banten', '42715', 'Jl. Raya Pandeglang, KM. 02, Kec. Serang, Kota Serang', '081521234568'),
('60d5494f78642', 'Member', 'member', 'member@el-shop.com', '$2y$10$J6gi9dXyb/xjEwhc0wvZJOnpu32EsWUQwj4wJHhhOwSD1b3x.CjNu', 'user.jpg', 'member', 1, '2021-06-25 03:11:11', '2021-06-30 10:18:05', '2021-06-30 10:18:05', 'Laki-laki', '1999-01-01', 'Serang', 'Serang', 'Banten', '42781', 'Jl. Raya Pandeglang, KM. 7, Kec. Serang, Kota Serang', '081258964568'),
('60d54cc06f459', 'Member', 'member1', 'member1@el-shop.com', '$2y$10$J6gi9dXyb/xjEwhc0wvZJOnpu32EsWUQwj4wJHhhOwSD1b3x.CjNu', 'user.jpg', 'member', 0, '2021-06-25 03:25:52', '2021-06-25 03:25:52', '2021-06-26 22:24:23', 'Perempuan', '2000-12-12', 'Curug', 'Serang', 'Banten', '41725', 'Jl. Raya Pandeglang, KM. 02, Kec. Serang, Kota Serang', '081456982574');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alamat_pengiriman`
--
ALTER TABLE `alamat_pengiriman`
  ADD PRIMARY KEY (`id_alamat`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_category`);

--
-- Indexes for table `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id_config`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_product`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id_image`);

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
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
