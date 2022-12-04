-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2022 at 03:05 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `starbucks`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id_akun` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('user','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id_akun`, `nama`, `email`, `username`, `password`, `level`) VALUES
(3, 'Nufiq', 'nurulfiqriistiqamah@gmail.com', 'Nufiq', '$2y$10$QnqywClROEKnvci/JBO0QuYIqXUXM9FEuiiCf74XzrUTzUgqG3Y0u', 'admin'),
(4, 'wenny', 'wenny@gmail.com', 'wenny', '$2y$10$QnqywClROEKnvci/JBO0QuYIqXUXM9FEuiiCf74XzrUTzUgqG3Y0u', 'user'),
(6, 'Dani', 'dani@gmail.com', 'Dani', '$2y$10$f/7xl5p4JFGIcGbZZEeUhOSWsd1NiIIUgIXQn5hnqfzDd0Wq5M./.', 'user'),
(7, 'nada', 'sefelinnadaparapak@gmail.com', 'nada', '$2y$10$dDTlqjQKBu2doi7etiNhMe93ELD6iWtrVYljUyFZakYSvg7ZAfJ42', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id_detail_transaksi` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id_detail_transaksi`, `id_transaksi`, `id_menu`, `jumlah`) VALUES
(13, 18, 25, 1),
(14, 18, 27, 1),
(15, 19, 25, 1),
(16, 19, 26, 1),
(17, 20, 25, 1);

-- --------------------------------------------------------

--
-- Table structure for table `header_transaksi`
--

CREATE TABLE `header_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_akun` int(11) NOT NULL,
  `tanggal_transaksi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `header_transaksi`
--

INSERT INTO `header_transaksi` (`id_transaksi`, `id_akun`, `tanggal_transaksi`) VALUES
(18, 4, '2022-11-14'),
(19, 7, '2022-11-28'),
(20, 7, '2022-11-28');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(64) NOT NULL,
  `nama_menu` varchar(64) NOT NULL,
  `tall` int(64) NOT NULL,
  `grande` int(64) NOT NULL,
  `venti` int(64) NOT NULL,
  `gambar` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `nama_menu`, `tall`, `grande`, `venti`, `gambar`) VALUES
(25, 'Brown Sugar Oatmilk ISE', 61000, 66000, 68000, 'Brown Sugar Oatmilk ISE.jpg'),
(26, 'Chocolate Malt Oatmilk ISE', 61000, 66000, 68000, 'Chocolate Malt Oatmilk ISE.jpg'),
(27, 'Pumpkin Spice Latte', 61000, 66000, 68000, 'Pumpkin Spice Latte.jpg'),
(28, 'Pumpkin Spice Frappuccino', 61000, 66000, 68000, 'Pumpkin Spice Frappuccino.jpg'),
(29, 'Brown Sugar Cocoa Oatmilk Coffee Frappuccino', 61000, 66000, 68000, 'Brown Sugar Cocoa Oatmilk Coffee Frappuccino.jpg'),
(30, 'Pumpkin Cream Cold Brew', 61000, 66000, 68000, 'Pumpkin Cream Cold Brew.jpg'),
(35, '1 Iced Green Tea Latte + 1 Iced Signature Chocolate', 120000, 160000, 180000, '1 Iced Green Tea Latte + 1 Iced Signature Chocolate.png'),
(38, 'Gingerbread Frappuccino', 61000, 88000, 95000, 'Gingerbread Frappuccino.png'),
(41, '2 Java Chip Frappuccino', 116000, 130000, 138000, '2 Java Chip Frappuccino.png'),
(42, 'Red Velvet Oatmilk Cream Frappuccino', 63000, 75000, 88000, 'Red Velvet Oatmilk Cream Frappuccino.png'),
(44, 'Gingerbread Latte', 61000, 78000, 85000, 'Gingerbread Latte.jpg'),
(46, '1L Bottled Beverage', 70000, 85000, 90000, '1L Bottled Beverage.jpg'),
(47, 'New! Starbucks 3 x 250 ml', 100000, 120000, 125000, 'New! Starbucks 3 x 250 ml.jpg'),
(49, '2 Caramel Macchiato', 120000, 125000, 130000, '2 Caramel Macchiato.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id_detail_transaksi`),
  ADD KEY `transaksi` (`id_transaksi`),
  ADD KEY `menu` (`id_menu`);

--
-- Indexes for table `header_transaksi`
--
ALTER TABLE `header_transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `akun` (`id_akun`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id_akun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id_detail_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `header_transaksi`
--
ALTER TABLE `header_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD CONSTRAINT `menu` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transaksi` FOREIGN KEY (`id_transaksi`) REFERENCES `header_transaksi` (`id_transaksi`) ON DELETE CASCADE;

--
-- Constraints for table `header_transaksi`
--
ALTER TABLE `header_transaksi`
  ADD CONSTRAINT `akun` FOREIGN KEY (`id_akun`) REFERENCES `akun` (`id_akun`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
