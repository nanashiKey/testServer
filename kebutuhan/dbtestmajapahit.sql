-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 16, 2020 at 08:18 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbtestmajapahit`
--

-- --------------------------------------------------------

--
-- Table structure for table `barangs`
--

CREATE TABLE `barangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `namabarang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hargabarang` double(8,2) NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `barangs`
--

INSERT INTO `barangs` (`id`, `namabarang`, `hargabarang`, `stock`) VALUES
(1, 'Baju Koko', 300000.00, 10),
(3, 'Mobile Suit Gundam', 123000.00, 4),
(4, 'gelas kopi', 250000.00, 3),
(5, 'buku bacaan', 12500.00, 65),
(6, 'buku bacaan', 25000.00, 15),
(7, 'Test', 12500.00, 2);

-- --------------------------------------------------------

--
-- Table structure for table `hadiahs`
--

CREATE TABLE `hadiahs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `namahadiah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `point` int(11) NOT NULL,
  `banyakitem` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hadiahs`
--

INSERT INTO `hadiahs` (`id`, `namahadiah`, `point`, `banyakitem`) VALUES
(1, 'Sepeda Gunung', 200, 100),
(2, 'Mobil Mewah', 10000, 1),
(3, 'Mobil Baru', 10000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2020_09_11_022748_create_users_table', 1),
(2, '2020_09_11_022821_create_barangs_table', 1),
(3, '2020_09_11_022844_create_transaksi_table', 1),
(4, '2020_09_11_022910_create_hadiah_table', 1),
(5, '2020_09_11_022925_create_redeemed_table', 1),
(6, '2020_09_12_145539_create_redeemeds_table', 2),
(7, '2020_09_12_145600_create_hadiahs_table', 2),
(8, '2020_09_12_145631_create_transaksis_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `redeemeds`
--

CREATE TABLE `redeemeds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hadiahid` int(11) NOT NULL,
  `usrid` int(11) NOT NULL,
  `redeemed` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `redeemeds`
--

INSERT INTO `redeemeds` (`id`, `hadiahid`, `usrid`, `redeemed`) VALUES
(1, 1, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `transaksis`
--

CREATE TABLE `transaksis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `itemid` int(11) NOT NULL,
  `usrid` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaksis`
--

INSERT INTO `transaksis` (`id`, `itemid`, `usrid`, `status`) VALUES
(1, 1, 1, 1),
(2, 1, 2, 1),
(3, 1, 2, 1),
(4, 1, 2, 1),
(5, 1, 2, 1),
(6, 1, 2, 1),
(7, 1, 2, 1),
(8, 2, 2, 1),
(9, 2, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `point` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `point`) VALUES
(1, 'adminTest', 'admin@test.com', 'eyJpdiI6IkRyTXJsRkYzMTR3eW8ySU5wUzV5N0E9PSIsInZhbHVlIjoiUE9Cc2MzN084djhld2d6QzZKMUJvdWdLMTdaY1NpM2tBSDFuQS9ybDZFOD0iLCJtYWMiOiJlMGJmMGY1NjU0OTY2MDc4YWE3OWYwMzFmMzU2NzgxMGQ0Y2JkOGJhZTEwMmNjZTkxZmFkNWFkMWQ3NDBhYWQ1In0=', 5),
(2, 'irfan', 'irfan@test.com', 'eyJpdiI6IlNpOW5GNks4by9ORmpGbVdtaDR4aEE9PSIsInZhbHVlIjoiQTI1dFNJVnZDU1JXTE5YNUpOZ0RjbWhVSm5GMjZSdVlWTTdYKzVMUDllaz0iLCJtYWMiOiI2NjA1MmYzNWM4YWZiMWNiMDhhZmE4Njc5ZWQwMDNjM2MxZWFlY2IwMTM4NGY1NDM4NmEzZmQxMWZhNmE0NGZlIn0=', 40),
(3, 'nkomics', 'nkomics@test.com', 'eyJpdiI6InBaL0JjWUgxdHZIUE96RE1FSGpVamc9PSIsInZhbHVlIjoicVRYK2RBdXFHMmVqRW9TdkZLM2w1K2xUSTVsSnFYeGlMV0x2d1k2UVBkdz0iLCJtYWMiOiI5OGQxMjYyN2Q0MGRkMGY2MTdiNTRhZDU4YzA0NTU4NWRlYjlkZDEzZGQxZjZkMDMyYWI2MWY5NjRiZTdmMTZjIn0=', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barangs`
--
ALTER TABLE `barangs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hadiahs`
--
ALTER TABLE `hadiahs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `redeemeds`
--
ALTER TABLE `redeemeds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksis`
--
ALTER TABLE `transaksis`
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
-- AUTO_INCREMENT for table `barangs`
--
ALTER TABLE `barangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `hadiahs`
--
ALTER TABLE `hadiahs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `redeemeds`
--
ALTER TABLE `redeemeds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transaksis`
--
ALTER TABLE `transaksis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
