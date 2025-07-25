-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2025 at 10:36 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_parkiran`
--

-- --------------------------------------------------------

--
-- Table structure for table `juru_parkir`
--

CREATE TABLE `juru_parkir` (
  `id` int(11) UNSIGNED NOT NULL,
  `nama` varchar(100) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `juru_parkir`
--

INSERT INTO `juru_parkir` (`id`, `nama`, `no_hp`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 'user', '08129812381', 'Jl.Arifin', '2025-07-25 19:13:52', '2025-07-25 19:13:52');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2025-07-25-101854', 'App\\Database\\Migrations\\CreateSetoran', 'default', 'App', 1753439283, 1),
(2, '2025-07-25-101929', 'App\\Database\\Migrations\\Createjuruparkir', 'default', 'App', 1753439283, 1),
(3, '2025-07-25-101938', 'App\\Database\\Migrations\\Createpetugas', 'default', 'App', 1753439283, 1);

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id`, `username`, `password`, `nama_lengkap`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$10$9Tys8HpBORuW0qWGdR0vXuDMcrM./nLN7YQxRGItqY0JXi4V3Zqd.', 'zulkhairil', '2025-07-25 19:12:48', '2025-07-25 19:12:48');

-- --------------------------------------------------------

--
-- Table structure for table `setoran_parkir`
--

CREATE TABLE `setoran_parkir` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_petugas` int(11) UNSIGNED NOT NULL,
  `tanggal_setoran` date NOT NULL,
  `jumlah_setoran` decimal(10,2) NOT NULL,
  `target` int(11) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `setoran_parkir`
--

INSERT INTO `setoran_parkir` (`id`, `id_petugas`, `tanggal_setoran`, `jumlah_setoran`, `target`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 1, '2025-07-26', 250.00, 300, 'kurang 50.000\r\n', '2025-07-25 19:14:32', '2025-07-25 19:14:32'),
(2, 1, '2025-07-25', 350.00, 300, 'berlebih', '2025-07-25 20:35:15', '2025-07-25 20:35:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `juru_parkir`
--
ALTER TABLE `juru_parkir`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `setoran_parkir`
--
ALTER TABLE `setoran_parkir`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `juru_parkir`
--
ALTER TABLE `juru_parkir`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `setoran_parkir`
--
ALTER TABLE `setoran_parkir`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
