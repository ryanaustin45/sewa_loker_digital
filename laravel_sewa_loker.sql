-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2025 at 07:01 AM
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
-- Database: `laravel_sewa_loker`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lokers`
--

CREATE TABLE `lokers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_loker` varchar(255) NOT NULL,
  `lokasi` varchar(255) DEFAULT NULL,
  `harga_per_hari` decimal(10,2) NOT NULL,
  `status` enum('tersedia','disewa','nonaktif') NOT NULL DEFAULT 'tersedia',
  `ukuran` enum('besar','kecil') NOT NULL DEFAULT 'besar',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lokers`
--

INSERT INTO `lokers` (`id`, `kode_loker`, `lokasi`, `harga_per_hari`, `status`, `ukuran`, `created_at`, `updated_at`) VALUES
(1, '119', 'loker 24 bandung', 15000.00, 'disewa', 'kecil', '2025-10-19 20:24:52', '2025-10-19 21:27:55'),
(2, '120', 'bandung', 25000.00, 'tersedia', 'kecil', '2025-10-19 21:28:44', '2025-10-19 21:28:44'),
(3, '121', '25 bandung', 25000.00, 'disewa', 'besar', '2025-10-19 21:29:23', '2025-10-19 21:30:37'),
(4, 'DoqzzikBgM', 'jQSjWkVdC3', 100000.00, 'tersedia', 'kecil', '2025-10-19 21:53:21', '2025-10-19 21:53:21'),
(5, 'QOUmGktj7e', 'RRmaPMwiHx', 100000.00, 'tersedia', 'kecil', '2025-10-19 21:53:21', '2025-10-19 21:53:21'),
(6, 'kNOlGazB37', '2Mu5VX3A08', 100000.00, 'tersedia', 'kecil', '2025-10-19 21:53:21', '2025-10-19 21:53:21'),
(7, 'KLLAxu7o27', 'DpMDhXvAwu', 100000.00, 'tersedia', 'kecil', '2025-10-19 21:53:21', '2025-10-19 21:53:21'),
(8, 'Hh6T12IqFM', 'BRe1iDTCNW', 100000.00, 'tersedia', 'kecil', '2025-10-19 21:53:21', '2025-10-19 21:53:21'),
(9, 'YTsukIihP7', 'PQiKS8Jq93', 100000.00, 'tersedia', 'kecil', '2025-10-19 21:53:21', '2025-10-19 21:53:21'),
(10, 'SVAm1ofOZ2', 'hHyossxmvb', 100000.00, 'tersedia', 'kecil', '2025-10-19 21:53:21', '2025-10-19 21:53:21'),
(11, 'EinPpSUaDa', 'lJXhAxPvjF', 100000.00, 'tersedia', 'kecil', '2025-10-19 21:53:21', '2025-10-19 21:53:21'),
(12, 'nlMIiFMK4x', 'g0iE2i36Yg', 100000.00, 'tersedia', 'kecil', '2025-10-19 21:53:21', '2025-10-19 21:53:21'),
(13, 'D7TMvQXPlx', 'yygyFifTP2', 100000.00, 'tersedia', 'kecil', '2025-10-19 21:53:21', '2025-10-19 21:53:21'),
(14, 'xZER2xJN3J', '1HBLrMtTnx', 100000.00, 'tersedia', 'kecil', '2025-10-19 21:53:21', '2025-10-19 21:53:21'),
(15, 'gM0IpIXF7t', '1YARyDspLY', 100000.00, 'tersedia', 'kecil', '2025-10-19 21:53:21', '2025-10-19 21:53:21'),
(16, 'nJxmAP7FDo', '7D23GnlsVJ', 100000.00, 'tersedia', 'kecil', '2025-10-19 21:53:21', '2025-10-19 21:53:21'),
(17, 'BTUGuXLJs9', 'FUgqMq9A4Q', 100000.00, 'tersedia', 'kecil', '2025-10-19 21:53:21', '2025-10-19 21:53:21'),
(18, 'fGslxIDDm0', 'gjxEC1Q75r', 100000.00, 'tersedia', 'kecil', '2025-10-19 21:53:21', '2025-10-19 21:53:21'),
(19, '90ZSbIdCBa', 'gRgTtNWCO5', 100000.00, 'tersedia', 'kecil', '2025-10-19 21:53:21', '2025-10-19 21:53:21'),
(20, '0mjqkHKVNF', 'VETVD7qqB8', 100000.00, 'tersedia', 'kecil', '2025-10-19 21:53:21', '2025-10-19 21:53:21'),
(21, 'FKj4XYkKQI', 'l5lNEvUYYn', 100000.00, 'tersedia', 'kecil', '2025-10-19 21:53:21', '2025-10-19 21:53:21'),
(22, '2nM6UVRwDR', 'TpVXNQWVgS', 100000.00, 'tersedia', 'kecil', '2025-10-19 21:53:21', '2025-10-19 21:53:21'),
(23, 'Pb7d3utcjE', 'J7BL3LRqjQ', 100000.00, 'tersedia', 'kecil', '2025-10-19 21:53:21', '2025-10-19 21:53:21');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_10_20_011424_create_lokers_table', 2),
(5, '2025_10_20_011601_create_sewa_lokers_table', 2),
(6, '2025_10_20_011745_create_pembayarans_table', 2),
(7, '2025_10_20_025544_add_kombinasi_password_keterangan_to_sewa_lokers_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pembayarans`
--

CREATE TABLE `pembayarans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sewa_loker_id` bigint(20) UNSIGNED NOT NULL,
  `tanggal_bayar` date DEFAULT NULL,
  `total_bayar` decimal(10,2) NOT NULL DEFAULT 0.00,
  `metode_bayar` enum('cash','transfer','qris') DEFAULT NULL,
  `status` enum('belum_bayar','lunas','kurang') NOT NULL DEFAULT 'belum_bayar',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('GKYaGqR8yqv3jnLkj6pYRugmkrxLu8gH4fOjum2n', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiUU1FeGltSGpleXZjb1NRYzAweGlRZE5hSXFVbEpQUHpLQWFCMmZKeCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2tlcnMiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1760934976),
('oYSduj81XZ20Kl8OvnGFi4hFvTAn4gJXI77M6zgv', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiSE9Nb085dG5STlJJTTNvbXdLS2VHNmZRUmw4eEJHWUhJRW0yMUpoWCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9zZXdhIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6Mjt9', 1760935003);

-- --------------------------------------------------------

--
-- Table structure for table `sewa_lokers`
--

CREATE TABLE `sewa_lokers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `loker_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_akhir` date DEFAULT NULL,
  `harga_per_hari` decimal(10,2) NOT NULL,
  `harga_per_hari_denda` decimal(10,2) NOT NULL,
  `total_harga` decimal(10,2) NOT NULL DEFAULT 0.00,
  `status_sewa` enum('aktif','selesai','dibatalkan') NOT NULL DEFAULT 'aktif',
  `kombinasi_password` varchar(20) DEFAULT NULL,
  `keterangan_loker` varchar(255) NOT NULL DEFAULT 'belum dibuka',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sewa_lokers`
--

INSERT INTO `sewa_lokers` (`id`, `loker_id`, `user_id`, `tanggal_mulai`, `tanggal_akhir`, `harga_per_hari`, `harga_per_hari_denda`, `total_harga`, `status_sewa`, `kombinasi_password`, `keterangan_loker`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '2025-10-20', '2025-10-20', 15000.00, 18000.00, 0.00, 'selesai', '1232131', 'sudah dibuka', '2025-10-19 20:28:54', '2025-10-19 21:02:03'),
(2, 1, 2, '2025-10-20', '2025-10-20', 15000.00, 18000.00, 15000.00, 'selesai', 'NaJHE4B2rGAF', 'sudah dibuka', '2025-10-19 21:02:14', '2025-10-19 21:27:42'),
(3, 1, 2, '2025-10-20', NULL, 15000.00, 18000.00, 0.00, 'aktif', '9fRu5dC9Dnbh', 'sudah dibuka', '2025-10-19 21:27:55', '2025-10-19 21:32:48'),
(4, 3, 2, '2025-10-17', NULL, 25000.00, 30000.00, 0.00, 'aktif', 'ZgPjj8iu8wMQ', 'belum dibuka', '2025-10-19 21:30:37', '2025-10-19 21:30:37');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `no_hp` varchar(20) DEFAULT NULL,
  `NIK` varchar(255) DEFAULT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user',
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `no_hp`, `NIK`, `role`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, NULL, NULL, 'admin', '$2y$12$fS4HUb9rPEoy9626KlgmF.R5/95dkA2A6zsI7xhE.WgRrm0iUsl1K', NULL, '2025-10-19 20:20:24', '2025-10-19 20:20:24'),
(2, 'user', 'user@gmail.com', NULL, '0821641646546', '145456456546', 'user', '$2y$12$7gB8UQ17XJCl9sdfJjq17.NDJiZf6s86cb6kFLedgrjcuIC7yeAki', NULL, '2025-10-19 20:21:07', '2025-10-19 20:27:18'),
(3, 'user2', 'user2@gmail.com', NULL, NULL, NULL, 'user', '$2y$12$PvYWceuL0DD72Mo88UyMte1z54XaUBU7VS9iGoqJ.E.k1gLTjLdkO', NULL, '2025-10-19 21:34:45', '2025-10-19 21:34:45'),
(4, 'Test User', 'test@example.com', '2025-10-19 21:47:04', NULL, NULL, 'user', '$2y$12$5Qa6PsoOhjHDYIt9S.KLmumCHIw1SlHCOzFP6E2ZNwk.1/T1s1y22', 'Y0MB2t12ej', '2025-10-19 21:47:04', '2025-10-19 21:47:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lokers`
--
ALTER TABLE `lokers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `lokers_kode_loker_unique` (`kode_loker`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pembayarans`
--
ALTER TABLE `pembayarans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pembayarans_sewa_loker_id_foreign` (`sewa_loker_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `sewa_lokers`
--
ALTER TABLE `sewa_lokers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sewa_lokers_loker_id_foreign` (`loker_id`),
  ADD KEY `sewa_lokers_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_nik_unique` (`NIK`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lokers`
--
ALTER TABLE `lokers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pembayarans`
--
ALTER TABLE `pembayarans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sewa_lokers`
--
ALTER TABLE `sewa_lokers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pembayarans`
--
ALTER TABLE `pembayarans`
  ADD CONSTRAINT `pembayarans_sewa_loker_id_foreign` FOREIGN KEY (`sewa_loker_id`) REFERENCES `sewa_lokers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sewa_lokers`
--
ALTER TABLE `sewa_lokers`
  ADD CONSTRAINT `sewa_lokers_loker_id_foreign` FOREIGN KEY (`loker_id`) REFERENCES `lokers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sewa_lokers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
