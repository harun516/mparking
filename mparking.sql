-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Okt 2023 pada 09.14
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `kode_parkir` varchar(20) NOT NULL,
  `checkout_by` varchar(100) DEFAULT NULL,
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
(4, '65223a743d06e', 'Tono', '2023-10-08 05:20:17', '2023-10-08 05:20:17'),
(5, '651d97841b81c', 'Fony', '2023-10-11 08:45:44', '2023-10-11 08:45:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
-- Struktur dari tabel `inbounds`
--

CREATE TABLE `inbounds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `barcode` varchar(100) NOT NULL,
  `checkout_id` int(11) NOT NULL,
  `pengantaran_id` varchar(50) NOT NULL,
  `kode_parkir` varchar(20) NOT NULL,
  `driver_nama` varchar(100) NOT NULL,
  `driver_ktp` varchar(20) NOT NULL,
  `driver_vaksin` varchar(20) NOT NULL,
  `no_referensi` varchar(20) NOT NULL,
  `sim` varchar(15) NOT NULL,
  `stnk` varchar(15) NOT NULL,
  `kir` varchar(15) NOT NULL,
  `tidak_bersih` varchar(15) NOT NULL,
  `bocor` varchar(15) NOT NULL,
  `bau` varchar(15) NOT NULL,
  `status` varchar(30) NOT NULL,
  `note` varchar(100) NOT NULL,
  `gate` int(11) DEFAULT NULL,
  `gr_code` varchar(50) DEFAULT NULL,
  `waktu_start_unloading` timestamp NULL DEFAULT NULL,
  `waktu_finish_unloading` timestamp NULL DEFAULT NULL,
  `waktu_finish_document` timestamp NULL DEFAULT NULL,
  `waktu_keluar` timestamp NULL DEFAULT NULL,
  `register_by` varchar(100) NOT NULL,
  `checker_by` varchar(100) DEFAULT NULL,
  `document_by` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `inbounds`
--

INSERT INTO `inbounds` (`id`, `barcode`, `checkout_id`, `pengantaran_id`, `kode_parkir`, `driver_nama`, `driver_ktp`, `driver_vaksin`, `no_referensi`, `sim`, `stnk`, `kir`, `tidak_bersih`, `bocor`, `bau`, `status`, `note`, `gate`, `gr_code`, `waktu_start_unloading`, `waktu_finish_unloading`, `waktu_finish_document`, `waktu_keluar`, `register_by`, `checker_by`, `document_by`, `created_at`, `updated_at`) VALUES
(20, '1696252900749-249', 1, 'PGN-5', '651d976a6398e', 'Teri', '123456', '123456', '123456', 'ya', 'ya', 'ya', 'tidak', 'tidak', 'tidak', 'Start Unloading - Inbound', 'Ok Ajalah', 5, NULL, '2023-10-05 13:25:00', NULL, NULL, NULL, 'Deni', 'Ryan', NULL, '2023-10-04 16:48:42', '2023-10-05 13:25:00'),
(21, '1695578721531-799', 1, 'PGN-3', '651ec2002e30c', 'Koni', '123456', '123456', '123456', 'ya', 'ya', 'tidak', 'tidak', 'tidak', 'tidak', 'Registrasi Mobil - Inbound', 'Okei', NULL, NULL, NULL, NULL, NULL, NULL, 'Yeni', NULL, NULL, '2023-10-05 14:02:40', '2023-10-05 14:02:40'),
(22, '1696741828115-875', 2, 'PGN-2', '65223a743d06e', 'Yeni', '123456', '123456', '123456', 'ya', 'ya', 'ya', 'tidak', 'tidak', 'tidak', 'Checkout - Inbound', 'Okeh', 7, '56789', '2023-10-08 05:19:01', '2023-10-08 05:19:27', '2023-10-08 05:19:53', '2023-10-08 05:20:17', 'Yono', 'Tery', 'Doni', '2023-10-08 05:13:24', '2023-10-08 05:20:17'),
(23, 'test', 1, 'PGN-4', '652613f21425a', 'koni', '123456', '123456', '123456', 'ya', 'ya', 'tidak', 'tidak', 'tidak', 'tidak', 'Registrasi Mobil - Inbound', 'ok', NULL, NULL, NULL, NULL, NULL, NULL, 'keni', NULL, NULL, '2023-10-11 03:18:10', '2023-10-11 03:18:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kendaraans`
--

CREATE TABLE `kendaraans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kendaraan_id` varchar(20) NOT NULL,
  `barcode` varchar(100) DEFAULT NULL,
  `transporter_id` varchar(50) NOT NULL,
  `mobil_id` varchar(50) NOT NULL,
  `no_pol` varchar(20) NOT NULL,
  `tahun_produksi` varchar(5) NOT NULL,
  `nomor_stnk` varchar(30) NOT NULL,
  `nomor_kir` varchar(30) NOT NULL,
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
(6, 'KNDR-5', '1696741828115-875', 'TPR-3', 'MBL-3', 'B 1245 FTR', '2021', '123456', '123456', '2023-10-08 05:11:29', '2023-10-08 05:11:29'),
(7, 'KNDR-6', '1697117000741-670', 'TPR-4', 'MBL-2', 'B 2587 FTR', '2025', '2134568', '123456', '2023-10-12 13:23:53', '2023-10-12 13:23:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
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
  `mobil_id` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tonase` varchar(20) NOT NULL,
  `kubikasi` varchar(20) NOT NULL,
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
  `barcode` varchar(100) NOT NULL,
  `checkout_id` int(11) NOT NULL,
  `kode_parkir` varchar(20) NOT NULL,
  `driver_nama` varchar(100) NOT NULL,
  `driver_ktp` varchar(20) NOT NULL,
  `driver_vaksin` varchar(20) NOT NULL,
  `no_referensi` varchar(25) NOT NULL,
  `sim` varchar(15) NOT NULL,
  `stnk` varchar(15) NOT NULL,
  `kir` varchar(15) NOT NULL,
  `tidak_bersih` varchar(15) NOT NULL,
  `bocor` varchar(15) NOT NULL,
  `bau` varchar(15) NOT NULL,
  `status` varchar(50) NOT NULL,
  `note` varchar(100) NOT NULL,
  `gate` int(11) DEFAULT NULL,
  `bundle_id` int(11) DEFAULT NULL,
  `no_do` int(11) DEFAULT NULL,
  `waktu_start_document` timestamp NULL DEFAULT NULL,
  `waktu_start_picking` timestamp NULL DEFAULT NULL,
  `waktu_start_loading` timestamp NULL DEFAULT NULL,
  `waktu_finish_loading` timestamp NULL DEFAULT NULL,
  `waktu_document_finish` timestamp NULL DEFAULT NULL,
  `waktu_keluar` timestamp NULL DEFAULT NULL,
  `picking_by` varchar(255) DEFAULT NULL,
  `register_by` varchar(100) NOT NULL,
  `loading_by` varchar(100) DEFAULT NULL,
  `document_by` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `outbounds`
--

INSERT INTO `outbounds` (`id`, `barcode`, `checkout_id`, `kode_parkir`, `driver_nama`, `driver_ktp`, `driver_vaksin`, `no_referensi`, `sim`, `stnk`, `kir`, `tidak_bersih`, `bocor`, `bau`, `status`, `note`, `gate`, `bundle_id`, `no_do`, `waktu_start_document`, `waktu_start_picking`, `waktu_start_loading`, `waktu_finish_loading`, `waktu_document_finish`, `waktu_keluar`, `picking_by`, `register_by`, `loading_by`, `document_by`, `created_at`, `updated_at`) VALUES
(3, '1696252900749-249', 2, '651d97841b81c', 'Kani', '123456', '123456', '123456', 'ya', 'ya', 'ya', 'tidak', 'tidak', 'tidak', 'Checkout - Outbound', 'Dududu', 12, 25, 123456, '2023-10-11 08:44:01', '2023-10-11 08:45:09', '2023-10-11 08:44:19', '2023-10-11 08:44:39', '2023-10-11 08:45:25', '2023-10-11 08:45:44', 'Doni', 'Jeni', 'Teri', 'Yono', '2023-10-04 16:49:08', '2023-10-11 08:45:44'),
(4, 'test', 1, '6527ee097b15f', 'yrt', '123', '123', '123', 'ya', 'ya', 'tidak', 'tidak', 'tidak', 'tidak', 'Start Document - Outbound', 'ok', NULL, 123, 123, '2023-10-12 13:04:40', NULL, NULL, NULL, NULL, NULL, NULL, '123', NULL, NULL, '2023-10-12 13:00:57', '2023-10-12 13:04:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengantarans`
--

CREATE TABLE `pengantarans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pengantaran_id` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
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
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(10) UNSIGNED NOT NULL,
  `dbase` varchar(255) NOT NULL DEFAULT '',
  `user` varchar(255) NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `query` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) NOT NULL,
  `col_name` varchar(64) NOT NULL,
  `col_type` varchar(64) NOT NULL,
  `col_length` text DEFAULT NULL,
  `col_collation` varchar(64) NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) DEFAULT '',
  `col_default` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `column_name` varchar(64) NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `transformation` varchar(255) NOT NULL DEFAULT '',
  `transformation_options` varchar(255) NOT NULL DEFAULT '',
  `input_transformation` varchar(255) NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) NOT NULL,
  `settings_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL,
  `export_type` varchar(10) NOT NULL,
  `template_name` varchar(64) NOT NULL,
  `template_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) NOT NULL,
  `tables` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL DEFAULT '',
  `db` varchar(64) NOT NULL DEFAULT '',
  `table` varchar(64) NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp(),
  `sqlquery` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) NOT NULL,
  `item_name` varchar(64) NOT NULL,
  `item_type` varchar(64) NOT NULL,
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) NOT NULL,
  `tables` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) NOT NULL DEFAULT '',
  `master_table` varchar(64) NOT NULL DEFAULT '',
  `master_field` varchar(64) NOT NULL DEFAULT '',
  `foreign_db` varchar(64) NOT NULL DEFAULT '',
  `foreign_table` varchar(64) NOT NULL DEFAULT '',
  `foreign_field` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL DEFAULT '',
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `search_name` varchar(64) NOT NULL DEFAULT '',
  `search_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT 0,
  `x` float UNSIGNED NOT NULL DEFAULT 0,
  `y` float UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `display_field` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) NOT NULL,
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  `prefs` text NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text NOT NULL,
  `schema_sql` text DEFAULT NULL,
  `data_sql` longtext DEFAULT NULL,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `config_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) NOT NULL,
  `tab` varchar(64) NOT NULL,
  `allowed` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) NOT NULL,
  `usergroup` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
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
  `transporter_id` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `transporters`
--

INSERT INTO `transporters` (`id`, `transporter_id`, `nama`, `alamat`, `no_telp`, `created_at`, `updated_at`) VALUES
(1, 'TPR-1', 'GOLDEN MANDIRI TRANSINDO', 'Cikarang', '02145788', '2023-09-22 20:31:53', '2023-09-24 03:56:40'),
(2, 'TPR-2', 'SURYA PELANGI NUSANTARA', 'Jatimulya', '021457898', '2023-09-22 20:32:12', '2023-09-22 20:32:12'),
(3, 'TPR-3', 'MITRA ANDALAN TRANSINDO', 'Kranji', '021568978', '2023-09-22 20:32:40', '2023-09-22 20:32:40'),
(6, 'TPR-4', 'Bang Jali Rety', 'Kranji Timur Utama', '0215687898', '2023-10-12 13:19:01', '2023-10-12 13:24:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` varchar(20) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
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
-- Indeks untuk tabel `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Indeks untuk tabel `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Indeks untuk tabel `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Indeks untuk tabel `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Indeks untuk tabel `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Indeks untuk tabel `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Indeks untuk tabel `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Indeks untuk tabel `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Indeks untuk tabel `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Indeks untuk tabel `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Indeks untuk tabel `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Indeks untuk tabel `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Indeks untuk tabel `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Indeks untuk tabel `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

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
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `inbounds`
--
ALTER TABLE `inbounds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `kendaraans`
--
ALTER TABLE `kendaraans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
-- AUTO_INCREMENT untuk tabel `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `transporters`
--
ALTER TABLE `transporters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
