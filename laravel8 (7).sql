-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 31, 2022 at 11:23 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel8`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_07_06_143844_create_pesanan_table', 1),
(6, '2022_07_09_132215_create_profil_table', 1),
(7, '2022_07_14_100229_create_benang_table', 1),
(8, '2022_07_15_180042_create_pembayaran_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_benang`
--

CREATE TABLE `tbl_benang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_benang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_benang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_benang` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_benang`
--

INSERT INTO `tbl_benang` (`id`, `kode_benang`, `nama_benang`, `harga_benang`, `created_at`, `updated_at`) VALUES
(1, 'PS-80', 'POLYSTER 180', 60000, '2022-08-14 11:28:07', '2022-08-14 11:28:07'),
(2, 'PS-751', 'POLYESTER 75/36/IM', 76000, '2022-08-14 11:29:38', '2022-08-14 11:30:14'),
(3, 'PS-90', 'POLYSTER 200', 80000, '2022-08-14 11:30:34', '2022-08-14 11:30:34');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_detailbayar`
--

CREATE TABLE `tbl_detailbayar` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pesanan_id` bigint(20) UNSIGNED NOT NULL,
  `tgl_bayar` date DEFAULT NULL,
  `cara_bayar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_bayar` bigint(20) NOT NULL,
  `bank` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `buktibayar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_detailbayar`
--

INSERT INTO `tbl_detailbayar` (`id`, `pesanan_id`, `tgl_bayar`, `cara_bayar`, `jumlah_bayar`, `bank`, `keterangan`, `buktibayar`, `created_at`, `updated_at`) VALUES
(1, 1, '2022-08-22', 'Transfer', 1000000, 'BNI', NULL, 'kuitansi_147040_1.jpg', '2022-08-22 04:01:22', '2022-08-22 15:16:08'),
(2, 1, '2022-08-21', 'Transfer', 3000000, 'Mandiri', NULL, 'kuitansi_147040_2.jpg', '2022-08-22 05:59:10', '2022-08-22 15:22:55'),
(3, 1, '2022-08-24', 'Cek', 8000000, 'BRI', NULL, 'kuitansi_147040_3.jpg', '2022-08-22 06:05:19', '2022-08-22 15:23:14'),
(4, 2, '2022-08-15', 'Transfer', 19000000, 'BRI', NULL, NULL, '2022-08-22 15:05:36', '2022-08-22 15:05:36'),
(5, 8, '2022-09-04', 'Tunai', 15200000, NULL, NULL, 'kuitansi_316772_5.jpg', '2022-08-31 09:22:01', '2022-08-31 09:22:25');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mesin`
--

CREATE TABLE `tbl_mesin` (
  `id` bigint(20) NOT NULL,
  `kode_mesin` varchar(255) DEFAULT NULL,
  `merek_mesin` varchar(255) DEFAULT NULL,
  `kecepatan` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_mesin`
--

INSERT INTO `tbl_mesin` (`id`, `kode_mesin`, `merek_mesin`, `kecepatan`, `status`, `created_at`, `updated_at`) VALUES
(1, 'ABB-01', 'ABB', '90', 'aktif', NULL, NULL),
(2, 'SIE-01', 'Siemens', '95', 'aktif', NULL, NULL),
(5, 'HEI-01', 'Heildelberger', '100', 'aktif', '2022-08-26 07:54:04', '2022-08-26 19:47:10'),
(6, 'BMW-01', 'BMW', '110', 'aktif', '2022-08-26 07:59:40', '2022-08-26 19:47:21'),
(7, 'VOL-01', 'Volvo', '115', 'aktif', '2022-08-26 19:54:03', '2022-08-26 19:54:14'),
(8, 'HON-01', 'Honda', '115', 'nonaktif', NULL, '2022-08-29 11:23:51'),
(9, 'F234', 'F5', '90', 'aktif', '2022-08-31 16:21:18', '2022-08-31 16:21:18');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mesin_trx`
--

CREATE TABLE `tbl_mesin_trx` (
  `id` bigint(20) NOT NULL,
  `produksi_id` bigint(20) DEFAULT NULL,
  `mesin_id` int(11) DEFAULT NULL,
  `tgl_mulai` date DEFAULT NULL,
  `tgl_selesai` date DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_mesin_trx`
--

INSERT INTO `tbl_mesin_trx` (`id`, `produksi_id`, `mesin_id`, `tgl_mulai`, `tgl_selesai`, `status`, `created_at`, `updated_at`) VALUES
(46, NULL, 6, '2022-08-29', '2022-09-29', 'Pemeliharaan', NULL, NULL),
(56, 6, 1, '2022-09-04', '2022-09-20', 'Produksi', '2022-08-31 13:50:50', '2022-08-31 13:50:50'),
(57, 6, 2, '2022-09-04', '2022-09-20', 'Produksi', '2022-08-31 13:50:50', '2022-08-31 13:50:50'),
(59, 7, 7, '2022-09-02', '2022-09-29', 'Selesai', '2022-08-31 13:54:33', '2022-08-31 13:55:02'),
(61, 9, 5, '2022-08-31', '2022-09-02', 'Selesai', '2022-08-31 16:08:19', '2022-08-31 16:08:24');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pesanan`
--

CREATE TABLE `tbl_pesanan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_pesanan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pelanggan_id` bigint(20) UNSIGNED NOT NULL,
  `benang_id` bigint(20) UNSIGNED NOT NULL,
  `berat_bahan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_mulai` date DEFAULT NULL,
  `tanggal_selesai` date NOT NULL,
  `harga_awal` bigint(20) NOT NULL,
  `harga_final` bigint(20) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_pesanan`
--

INSERT INTO `tbl_pesanan` (`id`, `kode_pesanan`, `pelanggan_id`, `benang_id`, `berat_bahan`, `tanggal_mulai`, `tanggal_selesai`, `harga_awal`, `harga_final`, `status`, `created_at`, `updated_at`) VALUES
(5, '318231', 1, 1, '2500', '2022-09-04', '2022-09-21', 250000000, NULL, 'Proses', '2022-08-31 06:43:51', '2022-08-31 06:48:12'),
(6, '318266', 3, 2, '3000', '2022-09-06', '2022-09-24', 380000000, 319200000, 'Selesai', '2022-08-31 06:44:26', '2022-08-31 06:55:02'),
(7, '318314', 4, 3, '2100', '2022-08-31', '2022-09-22', 280000000, NULL, 'Siap', '2022-08-31 06:45:14', '2022-08-31 06:45:14'),
(8, '316772', 1, 2, '100', '2022-08-31', '2022-09-02', 12666667, 15200000, 'Closed', '2022-08-31 09:06:12', '2022-08-31 09:08:24');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_produksi`
--

CREATE TABLE `tbl_produksi` (
  `id` bigint(20) NOT NULL,
  `kode_pesanan` varchar(20) DEFAULT NULL,
  `tgl_masuk_benang` date DEFAULT NULL,
  `jumlah_benang` varchar(255) DEFAULT NULL,
  `tgl_mulai` date DEFAULT NULL,
  `tgl_selesai` date DEFAULT NULL,
  `jumlah_produk` varchar(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_produksi`
--

INSERT INTO `tbl_produksi` (`id`, `kode_pesanan`, `tgl_masuk_benang`, `jumlah_benang`, `tgl_mulai`, `tgl_selesai`, `jumlah_produk`, `created_at`, `updated_at`) VALUES
(6, '318231', '2022-09-02', '2560', '2022-09-04', '2022-09-20', NULL, NULL, '2022-08-31 06:50:50'),
(7, '318266', '2022-09-01', '2900', '2022-09-02', '2022-09-29', '4200', NULL, '2022-08-31 06:54:33'),
(8, '318314', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, '316772', '2022-08-31', '100', '2022-08-31', '2022-09-02', '200', NULL, '2022-08-31 09:08:19');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_profil`
--

CREATE TABLE `tbl_profil` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_perusahaan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_kontak` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_profil`
--

INSERT INTO `tbl_profil` (`id`, `nama_perusahaan`, `nama_kontak`, `alamat2`, `no_hp`, `created_at`, `updated_at`) VALUES
(1, 'PT. Laksana Persada', 'Yudhi Aziz', 'Jl. M.H. Thamrin No. 9 Jakarta Pusat', '08127777771', '2022-08-14 11:32:25', '2022-08-14 11:32:25'),
(3, 'PT. Angkasa Textil', 'Rudi Didit', 'Jl. Wibawa Mukti Margonda, Depok', '08123464748', '2022-08-14 11:34:20', '2022-08-17 14:56:28'),
(4, 'PT. Sawah Lunto', 'William Rudi', 'Jl. Mangga Dua Kota, Jakarta Pusat', '07876655443', '2022-08-14 11:35:23', '2022-08-17 14:56:37');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` bigint(20) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `realname` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `realname`, `password`, `role`, `created_at`, `updated_at`) VALUES
(1, 'abaz', 'Fachri Renaldy', '8fa14cdd754f91cc6554c9e71929cce7', 'admin', NULL, NULL),
(2, 'aa', 'Yudhi', '8fa14cdd754f91cc6554c9e71929cce7', 'produksi', '2022-08-17 23:34:06', '2022-08-17 23:34:06'),
(3, 'c', 'ccc', '8fa14cdd754f91cc6554c9e71929cce7', 'manajemen', '2022-08-17 23:41:19', '2022-08-17 23:41:19'),
(4, 'd', 'd', '8fa14cdd754f91cc6554c9e71929cce7', 'keuangan', '2022-08-17 23:43:20', '2022-08-17 23:43:20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`) USING BTREE;

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`) USING BTREE;

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`) USING BTREE,
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`) USING BTREE;

--
-- Indexes for table `tbl_benang`
--
ALTER TABLE `tbl_benang`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `tbl_detailbayar`
--
ALTER TABLE `tbl_detailbayar`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `tbl_mesin`
--
ALTER TABLE `tbl_mesin`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `kode_mesin` (`kode_mesin`) USING BTREE;

--
-- Indexes for table `tbl_mesin_trx`
--
ALTER TABLE `tbl_mesin_trx`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `tbl_pesanan`
--
ALTER TABLE `tbl_pesanan`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `tbl_pesanan_kode_pesanan_unique` (`kode_pesanan`) USING BTREE;

--
-- Indexes for table `tbl_produksi`
--
ALTER TABLE `tbl_produksi`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `pesanan_id` (`kode_pesanan`) USING BTREE;

--
-- Indexes for table `tbl_profil`
--
ALTER TABLE `tbl_profil`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `username` (`username`) USING BTREE;

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_benang`
--
ALTER TABLE `tbl_benang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_detailbayar`
--
ALTER TABLE `tbl_detailbayar`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_mesin`
--
ALTER TABLE `tbl_mesin`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_mesin_trx`
--
ALTER TABLE `tbl_mesin_trx`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `tbl_pesanan`
--
ALTER TABLE `tbl_pesanan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_produksi`
--
ALTER TABLE `tbl_produksi`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_profil`
--
ALTER TABLE `tbl_profil`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
