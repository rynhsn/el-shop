-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2021 at 08:01 AM
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
(1, 'Kategori 1', 'kategori-1', 1, '2021-06-26 23:00:13'),
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
  `phone` varchar(15) DEFAULT NULL,
  `address` varchar(256) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `logo` varchar(64) DEFAULT NULL,
  `icon` varchar(64) DEFAULT NULL,
  `payment_account` varchar(64) DEFAULT NULL,
  `update_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `id_image` varchar(64) NOT NULL,
  `product_id` varchar(64) NOT NULL,
  `image_title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `is_active` enum('1','0') NOT NULL,
  `product_slug` int(11) NOT NULL,
  `keywords` text DEFAULT NULL,
  `weight` float DEFAULT NULL,
  `size` varchar(255) DEFAULT NULL,
  `update_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id_product`, `category_id`, `name`, `image`, `stock`, `price`, `desc_product`, `is_active`, `product_slug`, `keywords`, `weight`, `size`, `update_at`) VALUES
('60d4c4bf1de75', 1, 'Produk 1', '60d4c4bf1de75.png', 100, 100000, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi porro ad ex impedit inventore facilis et alias? Nihil rerum doloremque voluptatibus! Facilis quidem ullam quas illo officiis molestiae culpa, consequatur ipsum possimus. Reprehenderit beatae quas dolor dolorem saepe numquam temporibus magnam veniam ex quos vel aspernatur, similique tempore non ratione maiores natus. Cupiditate voluptates, in, iste nihil neque libero dolore autem voluptatibus molestiae porro sequi fugiat modi odit. Porro quam, eos, assumenda eaque unde nisi tempora reiciendis magnam saepe natus fugiat, dolorum suscipit voluptate fugit laudantium cum quidem autem explicabo atque. Doloribus doloremque libero fugiat sint magni autem veniam consequuntur.', '1', 0, '', 0, '', '2021-06-26 22:23:04'),
('60d7397822372', 1, 'Produk 2', '60d7397822372.jpg', 50, 20000, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi porro ad ex impedit inventore facilis et alias? Nihil rerum doloremque voluptatibus! Facilis quidem ullam quas illo officiis molestiae culpa, consequatur ipsum possimus. Reprehenderit beatae quas dolor dolorem saepe numquam temporibus magnam veniam ex quos vel aspernatur, similique tempore non ratione maiores natus. Cupiditate voluptates, in, iste nihil neque libero dolore autem voluptatibus molestiae porro sequi fugiat modi odit. Porro quam, eos, assumenda eaque unde nisi tempora reiciendis magnam saepe natus fugiat, dolorum suscipit voluptate fugit laudantium cum quidem autem explicabo atque. Doloribus doloremque libero fugiat sint magni autem veniam consequuntur.', '1', 0, '', 0, '', '2021-06-26 22:23:04'),
('60d79a127e7b5', 1, 'Produk 3', '60d79a127e7b5.png', 12, 50000, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Id, esse vitae? Esse impedit praesentium nemo. Ratione, inventore molestiae veniam nihil commodi fuga ut consequuntur beatae aspernatur sunt numquam perspiciatis sed mollitia, adipisci a modi asperiores maiores quis perferendis maxime consectetur corporis, expedita amet qui. Veniam labore reiciendis odio eius tenetur in excepturi nobis dicta sequi accusamus voluptates tempore, sint atque libero, quasi ea. Perspiciatis dolorem quas excepturi, quam commodi dicta provident quisquam eius assumenda voluptatum officiis et vero deserunt sint reprehenderit eum? Quod hic veniam eaque veritatis, odit omnis aliquam fugit ipsum, quia possimus placeat aut quis at porro ad?', '1', 0, '', 0, '', '2021-06-26 22:23:04'),
('60d79a2f7323b', 1, 'Produk 4', '60d79a2f7323b.jpg', 25, 120000, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Id, esse vitae? Esse impedit praesentium nemo. Ratione, inventore molestiae veniam nihil commodi fuga ut consequuntur beatae aspernatur sunt numquam perspiciatis sed mollitia, adipisci a modi asperiores maiores quis perferendis maxime consectetur corporis, expedita amet qui. Veniam labore reiciendis odio eius tenetur in excepturi nobis dicta sequi accusamus voluptates tempore, sint atque libero, quasi ea. Perspiciatis dolorem quas excepturi, quam commodi dicta provident quisquam eius assumenda voluptatum officiis et vero deserunt sint reprehenderit eum? Quod hic veniam eaque veritatis, odit omnis aliquam fugit ipsum, quia possimus placeat aut quis at porro ad?', '1', 0, '', 0, '', '2021-06-26 22:23:04'),
('60d79a40cea89', 1, 'Produk 5', '60d79a40cea89.png', 23, 23000, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Id, esse vitae? Esse impedit praesentium nemo. Ratione, inventore molestiae veniam nihil commodi fuga ut consequuntur beatae aspernatur sunt numquam perspiciatis sed mollitia, adipisci a modi asperiores maiores quis perferendis maxime consectetur corporis, expedita amet qui. Veniam labore reiciendis odio eius tenetur in excepturi nobis dicta sequi accusamus voluptates tempore, sint atque libero, quasi ea. Perspiciatis dolorem quas excepturi, quam commodi dicta provident quisquam eius assumenda voluptatum officiis et vero deserunt sint reprehenderit eum? Quod hic veniam eaque veritatis, odit omnis aliquam fugit ipsum, quia possimus placeat aut quis at porro ad?', '1', 0, '', 0, '', '2021-06-26 22:23:04');

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
('60d53e86832cf', 'Administrator', 'admin', 'admin@el-shop.com', '$2y$10$8441g3jVVcmvuhk7XaSdJuXRoA7b/88syBqbty7BGMOQgF7cGdrsq', 'user.jpg', 'admin', 1, '2021-06-25 02:29:28', '2021-06-26 22:18:08', '2021-06-26 22:24:23', 'Laki-laki', '2021-06-02', 'Curug', 'Serang', 'Banten', '42715', 'Jl. Raya Pandeglang, KM. 02, Kec. Serang, Kota Serang', '081521234568'),
('60d5494f78642', 'Member', 'member', 'member@el-shop.com', '$2y$10$J6gi9dXyb/xjEwhc0wvZJOnpu32EsWUQwj4wJHhhOwSD1b3x.CjNu', 'user.jpg', 'member', 1, '2021-06-25 03:11:11', '2021-06-25 03:11:11', '2021-06-26 22:24:23', 'Laki-laki', '1999-01-01', 'Serang', 'Serang', 'Banten', '42781', 'Jl. Raya Pandeglang, KM. 7, Kec. Serang, Kota Serang', '081258964568'),
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
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id_image`);

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
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
