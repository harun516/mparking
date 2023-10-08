-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Okt 2023 pada 07.26
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mparking`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `checkouts`
--

CREATE TABLE `checkouts` (
  `id` bigint(20) NOT NULL,
  `kode_parkir` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `checkout_by` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `checkouts`
--

INSERT INTO `checkouts` (`id`, `kode_parkir`, `checkout_by`, `created_at`, `updated_at`) VALUES
(1, '651826b9e4612', 'Tery', '2023-09-30 23:24:11', '2023-09-30 23:24:11'),
(2, '65182a63c5652', 'Tery', '2023-09-30 23:26:53', '2023-09-30 23:26:53'),
(3, '65169d07435b7', 'Yeni', '2023-10-02 21:42:22', '2023-10-02 21:42:22'),
(4, '65223a743d06e', 'Tono', '2023-10-08 05:20:17', '2023-10-08 05:20:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `inbounds`
--

CREATE TABLE `inbounds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `barcode` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `checkout_id` int(11) NOT NULL,
  `pengantaran_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_parkir` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `driver_nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `driver_ktp` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `driver_vaksin` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_referensi` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sim` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stnk` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kir` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tidak_bersih` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bocor` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bau` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gate` int(11) DEFAULT NULL,
  `gr_code` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `waktu_start_unloading` timestamp NULL DEFAULT NULL,
  `waktu_finish_unloading` timestamp NULL DEFAULT NULL,
  `waktu_finish_document` timestamp NULL DEFAULT NULL,
  `waktu_keluar` timestamp NULL DEFAULT NULL,
  `register_by` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `checker_by` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `document_by` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `inbounds`
--

INSERT INTO `inbounds` (`id`, `barcode`, `checkout_id`, `pengantaran_id`, `kode_parkir`, `driver_nama`, `driver_ktp`, `driver_vaksin`, `no_referensi`, `sim`, `stnk`, `kir`, `tidak_bersih`, `bocor`, `bau`, `status`, `note`, `gate`, `gr_code`, `waktu_start_unloading`, `waktu_finish_unloading`, `waktu_finish_document`, `waktu_keluar`, `register_by`, `checker_by`, `document_by`, `created_at`, `updated_at`) VALUES
(20, '1696252900749-249', 1, 'PGN-5', '651d976a6398e', 'Teri', '123456', '123456', '123456', 'ya', 'ya', 'ya', 'tidak', 'tidak', 'tidak', 'Start Unloading - Inbound', 'Ok Ajalah', 5, NULL, '2023-10-05 13:25:00', NULL, NULL, NULL, 'Deni', 'Ryan', NULL, '2023-10-04 16:48:42', '2023-10-05 13:25:00'),
(21, '1695578721531-799', 1, 'PGN-3', '651ec2002e30c', 'Koni', '123456', '123456', '123456', 'ya', 'ya', 'tidak', 'tidak', 'tidak', 'tidak', 'Registrasi Mobil - Inbound', 'Okei', NULL, NULL, NULL, NULL, NULL, NULL, 'Yeni', NULL, NULL, '2023-10-05 14:02:40', '2023-10-05 14:02:40'),
(22, '1696741828115-875', 2, 'PGN-2', '65223a743d06e', 'Yeni', '123456', '123456', '123456', 'ya', 'ya', 'ya', 'tidak', 'tidak', 'tidak', 'Checkout - Inbound', 'Okeh', 7, '56789', '2023-10-08 05:19:01', '2023-10-08 05:19:27', '2023-10-08 05:19:53', '2023-10-08 05:20:17', 'Yono', 'Tery', 'Doni', '2023-10-08 05:13:24', '2023-10-08 05:20:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kendaraans`
--

CREATE TABLE `kendaraans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kendaraan_id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `barcode` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transporter_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobil_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_pol` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_produksi` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_stnk` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_kir` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kendaraans`
--

INSERT INTO `kendaraans` (`id`, `kendaraan_id`, `barcode`, `transporter_id`, `mobil_id`, `no_pol`, `tahun_produksi`, `nomor_stnk`, `nomor_kir`, `created_at`, `updated_at`) VALUES
(1, 'KNDR-3', 'test', 'TPR-1', 'MBL-1', 'test', '2021', 'test', 'test', NULL, '2023-10-01 00:25:38'),
(3, 'KNDR-1', '1695578721531-799', 'TPR-2', 'MBL-3', 'B 3788 FOR', '2022', '12345678', '12345678', '2023-09-24 11:05:55', '2023-09-24 11:05:55'),
(4, 'KNDR-2', '1696075931521-23', 'TPR-2', 'MBL-2', 'B 2587 HFG', '2022', '12456798', '45678978', '2023-09-30 05:12:50', '2023-10-01 00:25:28'),
(5, 'KNDR-4', '1696252900749-249', 'TPR-3', 'MBL-2', 'B 6590 KRY', '2001', '1234567', '8689558', '2023-10-02 06:23:32', '2023-10-02 06:23:32'),
(6, 'KNDR-5', '1696741828115-875', 'TPR-3', 'MBL-3', 'B 1245 FTR', '2021', '123456', '123456', '2023-10-08 05:11:29', '2023-10-08 05:11:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_09_20_193858_kendaraan', 1),
(6, '2023_09_20_195408_transporter', 1),
(7, '2023_09_20_195447_mobil', 1),
(8, '2023_09_20_200132_inbound', 2),
(9, '2023_09_20_200152_outbound', 3),
(10, '2023_09_20_205438_checkout', 3),
(13, '2023_09_20_210052_role', 4),
(14, '2023_09_21_014906_pengantarans', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mobils`
--

CREATE TABLE `mobils` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mobil_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tonase` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kubikasi` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `mobils`
--

INSERT INTO `mobils` (`id`, `mobil_id`, `nama`, `tonase`, `kubikasi`, `created_at`, `updated_at`) VALUES
(1, 'MBL-1', 'TRONTON', '55000', '55', '2023-09-22 20:02:22', '2023-09-23 23:53:50'),
(2, 'MBL-2', 'WINGBOX', '20000', '50', '2023-09-22 20:02:45', '2023-09-22 20:02:45'),
(5, 'MBL-4', 'TRONTON', '55000', '55', '2023-09-23 23:56:32', '2023-09-23 23:56:32'),
(6, 'MBL-3', 'VOLVO', '70000', '70', '2023-09-24 00:04:00', '2023-09-24 00:04:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `outbounds`
--

CREATE TABLE `outbounds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `barcode` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `checkout_id` int(11) NOT NULL,
  `kode_parkir` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `driver_nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `driver_ktp` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `driver_vaksin` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_referensi` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sim` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stnk` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kir` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tidak_bersih` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bocor` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bau` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gate` int(11) DEFAULT NULL,
  `bundle_id` int(11) DEFAULT NULL,
  `no_do` int(11) DEFAULT NULL,
  `waktu_start_document` timestamp NULL DEFAULT NULL,
  `waktu_start_picking` timestamp NULL DEFAULT NULL,
  `waktu_start_loading` timestamp NULL DEFAULT NULL,
  `waktu_finish_loading` timestamp NULL DEFAULT NULL,
  `waktu_document_finish` timestamp NULL DEFAULT NULL,
  `waktu_keluar` timestamp NULL DEFAULT NULL,
  `picking_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `register_by` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `loading_by` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `document_by` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `outbounds`
--

INSERT INTO `outbounds` (`id`, `barcode`, `checkout_id`, `kode_parkir`, `driver_nama`, `driver_ktp`, `driver_vaksin`, `no_referensi`, `sim`, `stnk`, `kir`, `tidak_bersih`, `bocor`, `bau`, `status`, `note`, `gate`, `bundle_id`, `no_do`, `waktu_start_document`, `waktu_start_picking`, `waktu_start_loading`, `waktu_finish_loading`, `waktu_document_finish`, `waktu_keluar`, `picking_by`, `register_by`, `loading_by`, `document_by`, `created_at`, `updated_at`) VALUES
(3, '1696252900749-249', 1, '651d97841b81c', 'Kani', '123456', '123456', '123456', 'ya', 'ya', 'ya', 'tidak', 'tidak', 'tidak', 'Registrasi Mobil - Outbound', 'Dududu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jeni', NULL, NULL, '2023-10-04 16:49:08', '2023-10-04 16:49:08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengantarans`
--

CREATE TABLE `pengantarans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pengantaran_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pengantarans`
--

INSERT INTO `pengantarans` (`id`, `pengantaran_id`, `nama`, `alamat`, `no_telp`, `created_at`, `updated_at`) VALUES
(1, 'PGN-1', 'Plant HI', 'Harapan Indah', '081256897845', '2023-09-22 20:11:55', '2023-09-24 00:37:48'),
(2, 'PGN-2', 'Plant MI', 'Harapan Indah', '081256897845', '2023-09-22 20:20:16', '2023-09-22 20:20:16'),
(3, 'PGN-3', 'Retur', 'Harapan indah', '021546578', '2023-09-22 20:20:41', '2023-09-22 20:20:41'),
(4, 'PGN-4', 'SEI Ciawi', 'Ciawi', '087845126598', '2023-09-22 20:21:07', '2023-09-22 20:21:07'),
(5, 'PGN-5', 'SEI Cikarang', 'Cikarang', '021457898', '2023-09-22 20:21:29', '2023-09-22 20:21:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `role_id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'RL-1', 'Admin', '2023-09-22 17:55:57', '2023-09-23 23:47:57'),
(3, 'RL-2', 'Logistik', '2023-09-22 19:51:05', '2023-09-22 19:51:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transporters`
--

CREATE TABLE `transporters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transporter_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `transporters`
--

INSERT INTO `transporters` (`id`, `transporter_id`, `nama`, `alamat`, `no_telp`, `created_at`, `updated_at`) VALUES
(1, 'TPR-1', 'GOLDEN MANDIRI TRANSINDO', 'Cikarang', '02145788', '2023-09-22 20:31:53', '2023-09-24 03:56:40'),
(2, 'TPR-2', 'SURYA PELANGI NUSANTARA', 'Jatimulya', '021457898', '2023-09-22 20:32:12', '2023-09-22 20:32:12'),
(3, 'TPR-3', 'MITRA ANDALAN TRANSINDO', 'Kranji', '021568978', '2023-09-22 20:32:40', '2023-09-22 20:32:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `role_id`, `nama`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(10, 'RL-1', 'superadmin', 'superadmin@mp.com', NULL, '$2y$10$dP/qVXfnZy.YNmQuPhVK4u5McfrNfyCijBez1jEpnY3vf0Of7mXMu', NULL, '2023-10-07 09:10:34', '2023-10-08 05:22:51'),
(11, 'RL-2', 'logistik', 'admin@mp.com', NULL, '$2y$10$z8mO0t55wPnHbwjO073T8eKDRWP4BnHa2TrOtnxGorMvBvkmaOnbS', NULL, '2023-10-07 10:42:32', '2023-10-08 05:25:33');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `checkouts`
--
ALTER TABLE `checkouts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `inbounds`
--
ALTER TABLE `inbounds`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kendaraans`
--
ALTER TABLE `kendaraans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mobils`
--
ALTER TABLE `mobils`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `outbounds`
--
ALTER TABLE `outbounds`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `pengantarans`
--
ALTER TABLE `pengantarans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transporters`
--
ALTER TABLE `transporters`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `checkouts`
--
ALTER TABLE `checkouts`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `inbounds`
--
ALTER TABLE `inbounds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `kendaraans`
--
ALTER TABLE `kendaraans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `mobils`
--
ALTER TABLE `mobils`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `outbounds`
--
ALTER TABLE `outbounds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pengantarans`
--
ALTER TABLE `pengantarans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `transporters`
--
ALTER TABLE `transporters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
