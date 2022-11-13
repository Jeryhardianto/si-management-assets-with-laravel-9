-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 12, 2022 at 07:18 AM
-- Server version: 5.7.33
-- PHP Version: 8.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `si-asset-pdam-db`
--

-- --------------------------------------------------------

--
-- Table structure for table `assets`
--

CREATE TABLE `assets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `satuan_id` bigint(20) UNSIGNED DEFAULT NULL,
  `golongan_id` bigint(20) UNSIGNED DEFAULT NULL,
  `kategori_id` bigint(20) UNSIGNED DEFAULT NULL,
  `kode_asset` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lokasi` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uraian` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `harga` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jumlah` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `masa` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kondisi` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assets`
--

INSERT INTO `assets` (`id`, `satuan_id`, `golongan_id`, `kategori_id`, `kode_asset`, `lokasi`, `uraian`, `harga`, `jumlah`, `masa`, `gambar`, `kondisi`, `created_at`, `updated_at`) VALUES
(2, 1, 1, 1, '2', 'Yogkarta', 'Lemari Logistik', '700000000', '2', '2', 'upload/VVPgcJpjdk5MnhkhYWB1KiWburNbWJPkCUsfODl7.jpg', 'Baik', '2022-11-12 05:09:28', '2022-11-12 05:09:28');

-- --------------------------------------------------------

--
-- Table structure for table `detail_pinjaman`
--

CREATE TABLE `detail_pinjaman` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_transaksi` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kode_asset` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_asset` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jumlah` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_pinjaman`
--

INSERT INTO `detail_pinjaman` (`id`, `id_transaksi`, `kode_asset`, `id_asset`, `jumlah`, `keterangan`, `created_at`, `updated_at`) VALUES
(2, 'P-1668234250', 'PDAM-00002', '2', '2', NULL, '2022-11-12 05:24:10', '2022-11-12 05:24:10');

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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `golongan`
--

CREATE TABLE `golongan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_golongan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `golongan`
--

INSERT INTO `golongan` (`id`, `nama_golongan`, `created_at`, `updated_at`) VALUES
(1, 'BB2', '2022-11-12 05:08:49', '2022-11-12 05:08:49');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama_kategori`, `created_at`, `updated_at`) VALUES
(1, 'Meubelir Kantor', '2022-11-12 05:08:43', '2022-11-12 05:08:43');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_10_14_151454_create_permission_tables', 1),
(6, '2022_10_18_092545_assets', 1),
(7, '2022_10_18_094202_satuan', 1),
(8, '2022_10_18_094215_golongan', 1),
(9, '2022_10_18_094228_kategori', 1),
(10, '2022_11_09_085357_pinjam', 1),
(11, '2022_11_09_092552_detail_pinjam', 1),
(12, '2022_11_11_092314_pengembalian', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(3, 'App\\Models\\User', 2),
(2, 'App\\Models\\User', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengembalian`
--

CREATE TABLE `pengembalian` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_transaksi` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_penerima` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_peminjam` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_pengembalian` datetime DEFAULT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengembalian`
--

INSERT INTO `pengembalian` (`id`, `id_transaksi`, `id_penerima`, `id_peminjam`, `tanggal_pengembalian`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'P-1668234250', '3', '2', '2022-11-12 13:47:24', 'Okee semua', '2022-11-12 05:47:24', '2022-11-12 05:47:24');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'asset_show', 'web', '2022-11-12 05:04:40', '2022-11-12 05:04:40'),
(2, 'asset_create', 'web', '2022-11-12 05:04:40', '2022-11-12 05:04:40'),
(3, 'asset_update', 'web', '2022-11-12 05:04:40', '2022-11-12 05:04:40'),
(4, 'asset_detail', 'web', '2022-11-12 05:04:40', '2022-11-12 05:04:40'),
(5, 'asset_delete', 'web', '2022-11-12 05:04:40', '2022-11-12 05:04:40'),
(6, 'category_show', 'web', '2022-11-12 05:04:40', '2022-11-12 05:04:40'),
(7, 'category_create', 'web', '2022-11-12 05:04:40', '2022-11-12 05:04:40'),
(8, 'category_update', 'web', '2022-11-12 05:04:40', '2022-11-12 05:04:40'),
(9, 'category_delete', 'web', '2022-11-12 05:04:40', '2022-11-12 05:04:40'),
(10, 'golongan_show', 'web', '2022-11-12 05:04:40', '2022-11-12 05:04:40'),
(11, 'golongan_create', 'web', '2022-11-12 05:04:40', '2022-11-12 05:04:40'),
(12, 'golongan_update', 'web', '2022-11-12 05:04:40', '2022-11-12 05:04:40'),
(13, 'golongan_delete', 'web', '2022-11-12 05:04:40', '2022-11-12 05:04:40'),
(14, 'satuan_show', 'web', '2022-11-12 05:04:40', '2022-11-12 05:04:40'),
(15, 'satuan_create', 'web', '2022-11-12 05:04:40', '2022-11-12 05:04:40'),
(16, 'satuan_update', 'web', '2022-11-12 05:04:40', '2022-11-12 05:04:40'),
(17, 'satuan_delete', 'web', '2022-11-12 05:04:40', '2022-11-12 05:04:40'),
(18, 'laporan_show', 'web', '2022-11-12 05:04:40', '2022-11-12 05:04:40'),
(19, 'laporan_pinjam', 'web', '2022-11-12 05:04:40', '2022-11-12 05:04:40'),
(20, 'laporan_kembali', 'web', '2022-11-12 05:04:40', '2022-11-12 05:04:40'),
(21, 'pinjam_show', 'web', '2022-11-12 05:04:40', '2022-11-12 05:04:40'),
(22, 'pinjam_create', 'web', '2022-11-12 05:04:40', '2022-11-12 05:04:40'),
(23, 'pinjam_update', 'web', '2022-11-12 05:04:40', '2022-11-12 05:04:40'),
(24, 'pinjam_delete', 'web', '2022-11-12 05:04:40', '2022-11-12 05:04:40'),
(25, 'kembali_show', 'web', '2022-11-12 05:04:40', '2022-11-12 05:04:40'),
(26, 'kembali_create', 'web', '2022-11-12 05:04:40', '2022-11-12 05:04:40'),
(27, 'kembali_update', 'web', '2022-11-12 05:04:40', '2022-11-12 05:04:40'),
(28, 'kembali_delete', 'web', '2022-11-12 05:04:40', '2022-11-12 05:04:40'),
(29, 'role_show', 'web', '2022-11-12 05:04:40', '2022-11-12 05:04:40'),
(30, 'role_create', 'web', '2022-11-12 05:04:40', '2022-11-12 05:04:40'),
(31, 'role_update', 'web', '2022-11-12 05:04:40', '2022-11-12 05:04:40'),
(32, 'role_detail', 'web', '2022-11-12 05:04:40', '2022-11-12 05:04:40'),
(33, 'role_delete', 'web', '2022-11-12 05:04:40', '2022-11-12 05:04:40'),
(34, 'user_show', 'web', '2022-11-12 05:04:40', '2022-11-12 05:04:40'),
(35, 'user_create', 'web', '2022-11-12 05:04:40', '2022-11-12 05:04:40'),
(36, 'user_update', 'web', '2022-11-12 05:04:40', '2022-11-12 05:04:40'),
(37, 'user_detail', 'web', '2022-11-12 05:04:40', '2022-11-12 05:04:40'),
(38, 'user_delete', 'web', '2022-11-12 05:04:40', '2022-11-12 05:04:40'),
(39, 'pinjam_detail', 'web', '2022-11-12 05:04:40', '2022-11-12 05:04:40'),
(40, 'kembali_detail', 'web', '2022-11-12 05:04:40', '2022-11-12 05:04:40');

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
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pinjaman`
--

CREATE TABLE `pinjaman` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_transaksi` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_peminjam` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_petugas` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_pengajuan` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_peminjaman` datetime DEFAULT NULL,
  `tanggal_pengembalian` datetime DEFAULT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pinjaman`
--

INSERT INTO `pinjaman` (`id`, `id_transaksi`, `id_peminjam`, `id_petugas`, `tanggal_pengajuan`, `tanggal_peminjaman`, `tanggal_pengembalian`, `no_hp`, `status`, `keterangan`, `created_at`, `updated_at`) VALUES
(2, 'P-1668234250', '2', '3', '2022-11-12 13:24:10', '2022-11-12 13:45:55', '2022-11-25 00:00:00', '086756767567', '5', NULL, '2022-11-12 05:24:10', '2022-11-12 05:47:24');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'SuperAdmin', 'web', '2022-11-12 05:04:40', '2022-11-12 05:04:40'),
(2, 'Admin', 'web', '2022-11-12 05:04:40', '2022-11-12 05:04:40'),
(3, 'Pinjam', 'web', '2022-11-12 05:10:14', '2022-11-12 05:10:14');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(1, 2),
(2, 2),
(3, 2),
(4, 2),
(5, 2),
(6, 2),
(7, 2),
(8, 2),
(9, 2),
(10, 2),
(11, 2),
(12, 2),
(13, 2),
(14, 2),
(15, 2),
(16, 2),
(17, 2),
(18, 2),
(19, 2),
(20, 2),
(21, 2),
(22, 2),
(23, 2),
(24, 2),
(25, 2),
(26, 2),
(27, 2),
(28, 2),
(34, 2),
(35, 2),
(36, 2),
(37, 2),
(38, 2),
(39, 2),
(40, 2),
(21, 3),
(22, 3),
(23, 3),
(24, 3),
(25, 3),
(39, 3);

-- --------------------------------------------------------

--
-- Table structure for table `satuan`
--

CREATE TABLE `satuan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_satuan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `satuan`
--

INSERT INTO `satuan` (`id`, `nama_satuan`, `created_at`, `updated_at`) VALUES
(1, 'unit', '2022-11-12 05:08:55', '2022-11-12 05:08:55');

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
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'SuperAdmin', 'superadmin@example.com', '2022-11-12 05:04:40', '$2y$10$0jjCjw6NncQHymPOt2lS1us0TZxiYOfyeqcGrAnfDvRGkVi.bzC6W', '5TPKWX3LUrLZr4srlbTLiM7ts9qXUlUYV3vzwBEhxNtjpuceKQIBo32n2qNx', '2022-11-12 05:04:40', '2022-11-12 05:04:40'),
(2, 'Si Pinjam', 'pinjam@gmail.com', NULL, '$2y$10$bu1O8TKwU7c5dQvFFw00qOudrsP5eKGoM78CdXu20dYsddvDJefsG', NULL, '2022-11-12 05:10:52', '2022-11-12 05:10:52'),
(3, 'admin', 'admin1@gmail.com', NULL, '$2y$10$jsx9akemYCe0xsFTx7bMTu3cjq04t8t1jZ0SJlPGv5XGsLtl9NaZ6', NULL, '2022-11-12 05:12:23', '2022-11-12 05:12:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assets`
--
ALTER TABLE `assets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_pinjaman`
--
ALTER TABLE `detail_pinjaman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `golongan`
--
ALTER TABLE `golongan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `pinjaman`
--
ALTER TABLE `pinjaman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `assets`
--
ALTER TABLE `assets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `detail_pinjaman`
--
ALTER TABLE `detail_pinjaman`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `golongan`
--
ALTER TABLE `golongan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pengembalian`
--
ALTER TABLE `pengembalian`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pinjaman`
--
ALTER TABLE `pinjaman`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `satuan`
--
ALTER TABLE `satuan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
