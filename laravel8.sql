/*
 Navicat Premium Data Transfer

 Source Server         : mysql_xampp
 Source Server Type    : MySQL
 Source Server Version : 100417
 Source Host           : localhost:3306
 Source Schema         : laravel8

 Target Server Type    : MySQL
 Target Server Version : 100417
 File Encoding         : 65001

 Date: 10/08/2022 18:48:47
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `failed_jobs_uuid_unique`(`uuid`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (3, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (4, '2019_12_14_000001_create_personal_access_tokens_table', 1);
INSERT INTO `migrations` VALUES (5, '2022_07_06_143844_create_pesanan_table', 1);
INSERT INTO `migrations` VALUES (6, '2022_07_09_132215_create_profil_table', 1);
INSERT INTO `migrations` VALUES (7, '2022_07_14_100229_create_benang_table', 1);
INSERT INTO `migrations` VALUES (8, '2022_07_15_180042_create_pembayaran_table', 1);

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for personal_access_tokens
-- ----------------------------
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `last_used_at` timestamp(0) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `personal_access_tokens_token_unique`(`token`) USING BTREE,
  INDEX `personal_access_tokens_tokenable_type_tokenable_id_index`(`tokenable_type`, `tokenable_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tbl_benang
-- ----------------------------
DROP TABLE IF EXISTS `tbl_benang`;
CREATE TABLE `tbl_benang`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `kode_benang` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_benang` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_benang` bigint(20) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_benang
-- ----------------------------
INSERT INTO `tbl_benang` VALUES (1, 'PF-75', 'POLYFIN 75/35 SI', 10500, '2022-07-15 19:36:34', '2022-07-15 19:36:34');
INSERT INTO `tbl_benang` VALUES (3, 'PF-150', 'POLYFIN 150/48', 11500, '2022-07-15 19:36:34', '2022-07-15 19:36:34');
INSERT INTO `tbl_benang` VALUES (4, 'PS-75', 'POLYESTER 75/36/IM', 12000, '2022-07-15 19:36:34', '2022-07-15 19:36:34');

-- ----------------------------
-- Table structure for tbl_detailbayar
-- ----------------------------
DROP TABLE IF EXISTS `tbl_detailbayar`;
CREATE TABLE `tbl_detailbayar`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `pesanan_id` bigint(20) UNSIGNED NOT NULL,
  `tgl_bayar` date NULL DEFAULT NULL,
  `cara_bayar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_bayar` bigint(20) NOT NULL,
  `bank` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `keterangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_detailbayar
-- ----------------------------
INSERT INTO `tbl_detailbayar` VALUES (2, 4, '2022-07-04', 'Transfer', 1000000, 'Mandiri', NULL, '2022-07-21 15:00:37', '2022-07-21 15:00:37');
INSERT INTO `tbl_detailbayar` VALUES (3, 4, '2022-07-20', 'Tunai', 470000, NULL, 'via Yudhi', '2022-07-21 15:01:06', '2022-07-21 15:01:06');
INSERT INTO `tbl_detailbayar` VALUES (4, 5, '2022-07-29', 'Transfer', 1000000, 'BRI', NULL, '2022-07-22 05:54:18', '2022-07-22 05:54:18');
INSERT INTO `tbl_detailbayar` VALUES (5, 5, '2022-08-01', 'Cek', 1000000, 'BSI', NULL, '2022-07-22 05:54:40', '2022-07-22 05:54:40');
INSERT INTO `tbl_detailbayar` VALUES (6, 5, '2022-08-02', 'Tunai', 760000, NULL, NULL, '2022-07-22 05:55:01', '2022-07-22 05:55:01');
INSERT INTO `tbl_detailbayar` VALUES (7, 6, '2022-08-01', 'Transfer', 1500000, 'BRI', NULL, '2022-07-22 13:43:14', '2022-07-22 13:43:14');
INSERT INTO `tbl_detailbayar` VALUES (8, 6, '2022-08-02', 'Cek', 1000000, 'BNI', NULL, '2022-07-22 13:43:38', '2022-07-22 13:43:38');
INSERT INTO `tbl_detailbayar` VALUES (9, 6, '2022-06-29', 'Tunai', 835000, NULL, NULL, '2022-07-22 13:43:57', '2022-07-22 13:43:57');

-- ----------------------------
-- Table structure for tbl_pesanan
-- ----------------------------
DROP TABLE IF EXISTS `tbl_pesanan`;
CREATE TABLE `tbl_pesanan`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `kode_pesanan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pelanggan_id` bigint(20) UNSIGNED NOT NULL,
  `benang_id` bigint(20) UNSIGNED NOT NULL,
  `berat_bahan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_mulai` date NULL DEFAULT NULL,
  `tanggal_selesai` date NOT NULL,
  `harga_awal` bigint(20) NOT NULL,
  `harga_final` bigint(20) NULL DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `tbl_pesanan_kode_pesanan_unique`(`kode_pesanan`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_pesanan
-- ----------------------------
INSERT INTO `tbl_pesanan` VALUES (4, '218909', 3, 1, '150', '2022-05-01', '2021-06-01', 2625000, 1470000, 'Closed', '2022-07-21 14:35:09', '2022-07-21 18:53:01');
INSERT INTO `tbl_pesanan` VALUES (5, '222956', 4, 4, '200', '2022-06-26', '2022-08-06', 4000000, 2760000, 'Closed', '2022-07-22 05:35:56', '2022-07-22 05:38:43');
INSERT INTO `tbl_pesanan` VALUES (6, '220992', 1, 3, '100', '2022-07-01', '2022-08-06', 1916667, 3335000, 'Closed', '2022-07-22 13:23:12', '2022-07-22 13:41:27');

-- ----------------------------
-- Table structure for tbl_produksi
-- ----------------------------
DROP TABLE IF EXISTS `tbl_produksi`;
CREATE TABLE `tbl_produksi`  (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `kode_pesanan` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tgl_masuk_benang` date NULL DEFAULT NULL,
  `jumlah_benang` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tgl_mulai` date NULL DEFAULT NULL,
  `tgl_selesai` date NULL DEFAULT NULL,
  `jumlah_produk` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `pesanan_id`(`kode_pesanan`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_produksi
-- ----------------------------
INSERT INTO `tbl_produksi` VALUES (4, '218909', '2022-05-05', '160', '2022-05-07', '2022-06-09', '140', NULL, '2022-07-21 14:36:47');
INSERT INTO `tbl_produksi` VALUES (5, '222956', '2022-05-03', '210', '2022-05-05', '2022-07-29', '230', NULL, '2022-07-22 05:38:31');
INSERT INTO `tbl_produksi` VALUES (6, '220992', '2022-07-02', '200', '2022-07-04', '2022-08-06', '290', NULL, '2022-07-22 13:41:18');

-- ----------------------------
-- Table structure for tbl_profil
-- ----------------------------
DROP TABLE IF EXISTS `tbl_profil`;
CREATE TABLE `tbl_profil`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_perusahaan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_kontak` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `no_hp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_profil
-- ----------------------------
INSERT INTO `tbl_profil` VALUES (1, 'PT. Gonjang Ganjing', 'Fachri', 'Jl. M.H. Thamrin No. 9 Jakarta Pusat', '02175791272', '2022-07-15 19:39:12', '2022-07-21 18:00:35');
INSERT INTO `tbl_profil` VALUES (3, 'PT. Laksana Persada', 'Agus', 'Jl. Margonda Depok', '08133311223', '2022-07-19 21:20:21', '2022-07-19 21:20:21');
INSERT INTO `tbl_profil` VALUES (4, 'PT. Sawah Lunto', 'Bedil', 'Jl. Martadinata No 22 Kota Bogor', '08122233112', '2022-07-19 21:20:47', '2022-07-19 21:20:47');

-- ----------------------------
-- Table structure for tbl_user
-- ----------------------------
DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE `tbl_user`  (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `realname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `role` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `username`(`username`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_user
-- ----------------------------
INSERT INTO `tbl_user` VALUES (1, 'fachri', 'fachri', '8fa14cdd754f91cc6554c9e71929cce7', 'keuangan', '2022-07-17 17:55:12', '2022-07-20 15:43:11');
INSERT INTO `tbl_user` VALUES (10, 'abaz', 'Abd. Aziz', '8fa14cdd754f91cc6554c9e71929cce7', 'admin', '2022-07-18 11:25:22', '2022-07-20 15:43:23');
INSERT INTO `tbl_user` VALUES (12, 'ghiyats', 'm. ghiyats', '8fa14cdd754f91cc6554c9e71929cce7', 'penjualan', '2022-07-19 09:19:43', '2022-07-19 09:19:43');
INSERT INTO `tbl_user` VALUES (13, 'ziyan', 'z. nafisa', '8fa14cdd754f91cc6554c9e71929cce7', 'produksi', '2022-07-19 14:13:24', '2022-07-19 14:13:24');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp(0) NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

SET FOREIGN_KEY_CHECKS = 1;
