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

 Date: 17/08/2022 22:49:25
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
INSERT INTO `tbl_benang` VALUES (1, 'PS-80', 'POLYSTER 180', 60000, '2022-08-14 18:28:07', '2022-08-14 18:28:07');
INSERT INTO `tbl_benang` VALUES (2, 'PS-751', 'POLYESTER 75/36/IM', 76000, '2022-08-14 18:29:38', '2022-08-14 18:30:14');
INSERT INTO `tbl_benang` VALUES (3, 'PS-90', 'POLYSTER 200', 80000, '2022-08-14 18:30:34', '2022-08-14 18:30:34');

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
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

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
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_pesanan
-- ----------------------------
INSERT INTO `tbl_pesanan` VALUES (1, '147040', 1, 1, '120', '2022-01-01', '2022-02-01', 12000000, NULL, 'Siap', '2022-08-14 18:37:20', '2022-08-14 18:37:20');
INSERT INTO `tbl_pesanan` VALUES (2, '178228', 3, 2, '150', '2022-02-01', '2022-04-01', 19000000, NULL, 'Siap', '2022-08-17 21:57:08', '2022-08-17 21:57:08');
INSERT INTO `tbl_pesanan` VALUES (3, '178266', 4, 3, '250', '2022-02-01', '2022-05-01', 33333333, NULL, 'Siap', '2022-08-17 21:57:46', '2022-08-17 21:57:46');
INSERT INTO `tbl_pesanan` VALUES (4, '178300', 1, 2, '300', '2022-04-01', '2022-07-01', 38000000, NULL, 'Siap', '2022-08-17 21:58:20', '2022-08-17 21:58:20');

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
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_produksi
-- ----------------------------
INSERT INTO `tbl_produksi` VALUES (2, '147040', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `tbl_produksi` VALUES (3, '178228', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `tbl_produksi` VALUES (4, '178266', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `tbl_produksi` VALUES (5, '178300', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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
INSERT INTO `tbl_profil` VALUES (1, 'PT. Laksana Persada', 'Yudhi Aziz', 'Jl. M.H. Thamrin No. 9 Jakarta Pusat', '08127777771', '2022-08-14 18:32:25', '2022-08-14 18:32:25');
INSERT INTO `tbl_profil` VALUES (3, 'PT. Angkasa Textil', 'Rudi Didit', 'Jl. Wibawa Mukti Margonda, Depok', '08123464748', '2022-08-14 18:34:20', '2022-08-17 21:56:28');
INSERT INTO `tbl_profil` VALUES (4, 'PT. Sawah Lunto', 'William Rudi', 'Jl. Mangga Dua Kota, Jakarta Pusat', '07876655443', '2022-08-14 18:35:23', '2022-08-17 21:56:37');

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
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_user
-- ----------------------------
INSERT INTO `tbl_user` VALUES (1, 'abaz', 'Fachri Renaldy', '8fa14cdd754f91cc6554c9e71929cce7', 'admin', NULL, NULL);

SET FOREIGN_KEY_CHECKS = 1;
