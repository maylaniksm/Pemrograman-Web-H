-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2024 at 01:45 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `praktikum4`
--

-- --------------------------------------------------------

--
-- Table structure for table `mobil`
--

CREATE TABLE `mobil` (
  `id` int(11) NOT NULL,
  `merek` varchar(200) NOT NULL,
  `nomor_polisi` varchar(100) NOT NULL,
  `warna` varchar(100) NOT NULL,
  `transmisi` varchar(100) NOT NULL,
  `kapasitas` int(10) NOT NULL,
  `harga` varchar(200) NOT NULL,
  `image_url` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mobil`
--

INSERT INTO `mobil` (`id`, `merek`, `nomor_polisi`, `warna`, `transmisi`, `kapasitas`, `harga`, `image_url`) VALUES
(1, 'Coba edit', 'A5284GH', 'Oranye', 'Matic', 6, '600000', 'https://images.seva.id/color_gallery/Daihatsu_Sigra_%23ff8000.jpg'),
(2, 'Avanza', 'U9859OP', 'Putih', 'Matic', 6, '700000', 'https://auto2000.co.id/berita-dan-tips/_next/image?url=https%3A%2F%2Fastradigitaldigiroomuat.blob.core.windows.net%2Fstorage-uat-001%2Fmobil-mpv-adalah.jpg&w=1200&q=75'),
(11, 'Miyuki', '0938', 'Black mamba', 'Manukal', 5, '7000000', 'https://www.otoinfo.id/wp-content/uploads/2023/12/Keunggulan-Mobil-Sejuta-Umat-Toyota-All-New-Avanza-2023.jpg'),
(14, 'Mazda CX-3', 'FH 7858 H', 'Merah', 'Matic', 3, '900000', 'https://mazdacars.id/wp-content/uploads/2024/03/e14d3e7c-2fa5-40fe-be34-493acbf5a858.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `id_mobil` int(11) NOT NULL,
  `status` varchar(100) NOT NULL,
  `tarif` varchar(100) DEFAULT NULL,
  `sewa_masuk` date DEFAULT NULL,
  `sewa_keluar` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `nama`, `id_mobil`, `status`, `tarif`, `sewa_masuk`, `sewa_keluar`) VALUES
(6, 'azza', 1, 'selesai', '600000', '2024-11-20', '2024-11-21'),
(7, 'sonia dwi r', 11, 'selesai', '7000000', '2024-11-20', '2024-11-21'),
(8, 'Agung', 2, 'proses', '50000', '2024-11-14', '2024-11-22'),
(9, 'Baihaqi', 1, 'proses', '800000', '2024-11-20', '2024-11-22'),
(11, 'upikkk satu', 2, 'selesai', '1400000', '2024-11-20', '2024-11-22'),
(17, 'Mayla', 14, 'proses', '1800000', '2024-11-21', '2024-11-23');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `nomor_hp` varchar(100) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `nomor_hp`, `username`, `password`) VALUES
(1, 'john doe', '081235', 'johndoe', 'sRxAG7mEDwrUI'),
(2, 'admin', '2903854', 'admin', 'sRxAG7mEDwrUI');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mobil`
--
ALTER TABLE `mobil`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mobil`
--
ALTER TABLE `mobil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
