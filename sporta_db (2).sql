-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 04, 2022 at 06:34 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sporta_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nama_admin` varchar(225) NOT NULL,
  `no_hp` varchar(100) NOT NULL,
  `id_user` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `nama_admin`, `no_hp`, `id_user`, `created_at`, `updated_at`) VALUES
(1, 'admin', '085555555555', 19, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `detail_jadwal`
--

CREATE TABLE `detail_jadwal` (
  `id` int(11) NOT NULL,
  `id_jam` int(11) NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_jadwal`
--

INSERT INTO `detail_jadwal` (`id`, `id_jam`, `id_jadwal`, `created_at`, `updated_at`) VALUES
(55, 2, 53, '2022-07-18 04:37:23', '2022-07-18 04:37:23'),
(56, 3, 53, '2022-07-18 04:37:23', '2022-07-18 04:37:23'),
(57, 5, 54, '2022-07-18 08:34:33', '2022-07-18 08:34:33'),
(58, 6, 54, '2022-07-18 08:34:33', '2022-07-18 08:34:33'),
(59, 14, 55, '2022-07-18 08:48:17', '2022-07-18 08:48:17'),
(60, 10, 56, '2022-07-25 03:44:53', '2022-07-25 03:44:53'),
(61, 11, 56, '2022-07-25 03:44:53', '2022-07-25 03:44:53');

-- --------------------------------------------------------

--
-- Table structure for table `detail_jadwal_member`
--

CREATE TABLE `detail_jadwal_member` (
  `id` int(11) NOT NULL,
  `id_jam` int(11) NOT NULL,
  `id_jadwal_member` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_jadwal_member`
--

INSERT INTO `detail_jadwal_member` (`id`, `id_jam`, `id_jadwal_member`, `created_at`, `updated_at`) VALUES
(2, 4, 2, '2022-07-12 08:56:11', '2022-07-12 08:56:11'),
(3, 5, 2, '2022-07-12 08:56:11', '2022-07-12 08:56:11'),
(4, 6, 2, '2022-07-12 08:56:11', '2022-07-12 08:56:11');

-- --------------------------------------------------------

--
-- Table structure for table `detail_lapangan`
--

CREATE TABLE `detail_lapangan` (
  `id` int(11) NOT NULL,
  `indeks` int(11) NOT NULL,
  `image` varchar(225) NOT NULL,
  `id_lapangan` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_lapangan`
--

INSERT INTO `detail_lapangan` (`id`, `indeks`, `image`, `id_lapangan`, `created_at`, `updated_at`) VALUES
(13, 1, 'JasaIn logo.png', 2, '2022-08-04 04:25:48', '2022-08-04 04:25:48'),
(14, 1, 'aroma kopi.png', 3, '2022-08-04 04:32:19', '2022-08-04 04:32:19'),
(15, 2, 'aroma kopi 2.png', 3, '2022-08-04 04:32:40', '2022-08-04 04:32:40');

-- --------------------------------------------------------

--
-- Table structure for table `harga`
--

CREATE TABLE `harga` (
  `id` int(11) NOT NULL,
  `nominal` int(11) NOT NULL,
  `jenis` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id` int(11) NOT NULL,
  `id_lapangan` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `durasi` int(11) NOT NULL,
  `nama_tim` varchar(225) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_pemesanan` int(11) NOT NULL,
  `status_jadwal` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id`, `id_lapangan`, `tanggal`, `durasi`, `nama_tim`, `id_pelanggan`, `id_pemesanan`, `status_jadwal`, `created_at`, `updated_at`) VALUES
(53, 2, '2022-07-18', 2, 'Garuda', 15, 49, 3, '2022-07-18 04:37:23', '2022-07-18 04:41:34'),
(54, 3, '2022-07-18', 2, 'uytutu', 15, 50, 3, '2022-07-18 08:34:33', '2022-07-18 08:37:42'),
(55, 3, '2022-07-19', 1, 'teamlo', 15, 51, 1, '2022-07-18 08:48:16', '2022-07-18 08:48:16'),
(56, 2, '2022-07-25', 2, 'uytutu', 15, 52, 3, '2022-07-25 03:44:53', '2022-07-25 03:45:47');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_member`
--

CREATE TABLE `jadwal_member` (
  `id` int(11) NOT NULL,
  `id_member` int(11) NOT NULL,
  `id_lapangan` int(11) NOT NULL,
  `durasi` int(11) NOT NULL,
  `hari` varchar(50) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jadwal_member`
--

INSERT INTO `jadwal_member` (`id`, `id_member`, `id_lapangan`, `durasi`, `hari`, `created_at`, `updated_at`) VALUES
(2, 1, 2, 3, 'Tuesday', '2022-07-12 08:56:11', '2022-07-12 08:56:11');

-- --------------------------------------------------------

--
-- Table structure for table `jam`
--

CREATE TABLE `jam` (
  `id` int(11) NOT NULL,
  `jam` time NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jam`
--

INSERT INTO `jam` (`id`, `jam`, `created_at`, `updated_at`) VALUES
(1, '08:00:00', NULL, NULL),
(2, '09:00:00', NULL, NULL),
(3, '10:00:00', NULL, NULL),
(4, '11:00:00', NULL, NULL),
(5, '12:00:00', NULL, NULL),
(6, '13:00:00', NULL, NULL),
(7, '14:00:00', NULL, NULL),
(8, '15:00:00', NULL, NULL),
(9, '16:00:00', NULL, NULL),
(10, '17:00:00', NULL, NULL),
(11, '18:00:00', NULL, NULL),
(12, '19:00:00', NULL, NULL),
(13, '20:00:00', NULL, NULL),
(14, '21:00:00', NULL, NULL),
(15, '22:00:00', NULL, NULL),
(16, '23:00:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `konten`
--

CREATE TABLE `konten` (
  `id` int(11) NOT NULL,
  `foto_konten` varchar(225) DEFAULT NULL,
  `indeks_konten` int(11) DEFAULT NULL,
  `foto_pengumuman` varchar(225) DEFAULT NULL,
  `indeks_pengumuman` int(11) DEFAULT NULL,
  `isi_pengumuman` varchar(225) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `konten`
--

INSERT INTO `konten` (`id`, `foto_konten`, `indeks_konten`, `foto_pengumuman`, `indeks_pengumuman`, `isi_pengumuman`, `created_at`, `updated_at`) VALUES
(5, 'JasaIn logo.png', 1, NULL, NULL, NULL, '2022-07-21 08:37:18', '2022-07-21 08:38:01'),
(8, 'JasaIn logo3.png', 2, NULL, NULL, NULL, '2022-07-21 08:42:01', '2022-07-21 08:42:01');

-- --------------------------------------------------------

--
-- Table structure for table `lapangan`
--

CREATE TABLE `lapangan` (
  `id` int(11) NOT NULL,
  `nama_lapangan` varchar(100) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lapangan`
--

INSERT INTO `lapangan` (`id`, `nama_lapangan`, `deskripsi`, `created_at`, `updated_at`) VALUES
(2, 'lap 1', 'Deskripsi Lapangan 1', '2022-06-25 04:03:24', '2022-08-04 04:23:51'),
(3, 'lap 2', 'ini lapangan 2', '2022-06-25 04:04:43', '2022-08-04 04:24:39');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `nama_tim` varchar(100) NOT NULL,
  `ketua_tim` varchar(225) NOT NULL,
  `no_hp` varchar(50) NOT NULL,
  `logo_tim` varchar(225) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `nama_tim`, `ketua_tim`, `no_hp`, `logo_tim`, `created_at`, `updated_at`) VALUES
(1, 'sena', 'joko', '085556665557', 'aroma kopi 2.png', '2022-07-06 07:44:33', '2022-07-06 07:44:33');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` int(11) NOT NULL,
  `nama_pelanggan` varchar(225) NOT NULL,
  `no_hp` varchar(100) NOT NULL,
  `id_user` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `nama_pelanggan`, `no_hp`, `id_user`, `created_at`, `updated_at`) VALUES
(15, 'andy', '082234234234', 20, '2022-06-25 01:31:55', '2022-06-25 01:31:55'),
(16, 'andyfebri', '085334770518', 21, '2022-07-20 23:04:11', '2022-07-20 23:04:11');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int(11) NOT NULL,
  `metode_pembayaran` varchar(50) NOT NULL,
  `bukti_pembayaran` varchar(225) DEFAULT NULL,
  `status_pembayaran` int(11) NOT NULL,
  `bank` varchar(50) DEFAULT NULL,
  `wallet` varchar(50) DEFAULT NULL,
  `id_pemesanan` int(11) NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `metode_pembayaran`, `bukti_pembayaran`, `status_pembayaran`, `bank`, `wallet`, `id_pemesanan`, `id_jadwal`, `created_at`, `updated_at`) VALUES
(15, 'Wallet', 'JasaIn logo2.jpg', 1, NULL, 'OVO', 49, 53, '2022-07-18 04:39:56', '2022-07-18 04:41:34'),
(16, 'Transfer', 'aroma kopi.png', 1, 'BRI', NULL, 50, 54, '2022-07-18 08:35:57', '2022-07-18 08:37:42'),
(17, 'Wallet', 'aroma kopi.jpg', 1, NULL, 'OVO', 52, 56, '2022-07-25 03:45:18', '2022-07-25 03:45:47');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id` int(11) NOT NULL,
  `tanggal_pesan` date NOT NULL,
  `catatan` text DEFAULT NULL,
  `jenis_pembayaran` varchar(50) NOT NULL,
  `nominal_pembayaran` int(11) NOT NULL,
  `nominal_dp` int(11) DEFAULT NULL,
  `id_user_pelanggan` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id`, `tanggal_pesan`, `catatan`, `jenis_pembayaran`, `nominal_pembayaran`, `nominal_dp`, `id_user_pelanggan`, `status`, `created_at`, `updated_at`) VALUES
(49, '2022-07-18', 'isi catatan', 'Pembayaran Penuh', 180000, NULL, 20, 3, '2022-07-18 04:37:23', '2022-07-18 04:41:34'),
(50, '2022-07-18', 'n', 'DP', 180000, 30000, 20, 3, '2022-07-18 08:34:33', '2022-07-18 08:37:42'),
(51, '2022-07-18', 's', 'DP', 110000, 20000, 20, 1, '2022-07-18 08:48:16', '2022-07-18 08:48:16'),
(52, '2022-07-25', 'adad', 'Pembayaran Penuh', 180000, NULL, 20, 3, '2022-07-25 03:44:53', '2022-07-25 03:45:47');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `role` varchar(50) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `role`, `created_at`, `updated_at`) VALUES
(19, 'admin@gmail.com', '$2y$10$ctkV3L6qs4cMOnU6eeP1Pu7rcuJacnI361XoJyyjnn9eydsESo3Gu', 'admin', '2022-06-25 00:57:27', '2022-06-25 00:57:27'),
(20, 'andyfebri999@gmail.com', '$2y$10$ctkV3L6qs4cMOnU6eeP1Pu7rcuJacnI361XoJyyjnn9eydsESo3Gu', 'pelanggan', '2022-06-25 01:31:55', '2022-06-25 01:31:55'),
(21, 'andyfebri742@gmail.com', '$2y$10$0xWUz3UYrKLdCY1PGtOC3uRoxIVwULDf/23kwmzG6DlddXkLh21bi', 'pelanggan', '2022-07-20 23:04:11', '2022-07-20 23:04:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_jadwal`
--
ALTER TABLE `detail_jadwal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_jadwal_member`
--
ALTER TABLE `detail_jadwal_member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_lapangan`
--
ALTER TABLE `detail_lapangan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `harga`
--
ALTER TABLE `harga`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadwal_member`
--
ALTER TABLE `jadwal_member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jam`
--
ALTER TABLE `jam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `konten`
--
ALTER TABLE `konten`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lapangan`
--
ALTER TABLE `lapangan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `detail_jadwal`
--
ALTER TABLE `detail_jadwal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `detail_jadwal_member`
--
ALTER TABLE `detail_jadwal_member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `detail_lapangan`
--
ALTER TABLE `detail_lapangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `harga`
--
ALTER TABLE `harga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `jadwal_member`
--
ALTER TABLE `jadwal_member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jam`
--
ALTER TABLE `jam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `konten`
--
ALTER TABLE `konten`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `lapangan`
--
ALTER TABLE `lapangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
