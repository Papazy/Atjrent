-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Jan 2025 pada 13.02
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `atjrent`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barangs`
--

CREATE TABLE `barangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga` int(11) NOT NULL,
  `stok_barang` int(11) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `merk` varchar(255) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `is_jual` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `barangs`
--

INSERT INTO `barangs` (`id`, `nama`, `deskripsi`, `harga`, `stok_barang`, `image_url`, `merk`, `kategori`, `is_jual`, `created_at`, `updated_at`) VALUES
(5, 'Tenda Ukuran 4 Orang', 'free 2 matras', 80000, 30, 'MB0VczVkv7C2toeWhHX6P6N868yX0k0QxdUgT72YXwljQe4P37mtGjmb7YVeVlE7uQWVbj5lEYKBEWw7DVxsA4DKKfm9WGyMKRjm.jpeg', 'Eiger', 'Alat Tidur', 'Sewa', '2024-12-17 07:05:01', '2024-12-17 07:05:01'),
(6, 'Tas Carrier', 'tidak ada', 50000, 5, 'CFlJ4uprs7KXfnVHAPHKOQ4uceoUQZrJoQev989fbrDrAErHR5MHKoWVh1lJX4qbcDO3iwYTaRPVPyYcOqqdgTrFNEXQpVmk4ftx.jpeg', 'Eiger', 'Alat Daki', 'Sewa', '2024-12-17 07:19:43', '2024-12-17 07:19:43'),
(7, 'Nesting', 'Alat Masak', 50000, 10, 'JZ2xrVmciAJVAEuCgCuqCr4z0b65hpgXypxFzTVvDhr7LFzu5Cx9pTCHZNbYcoOrmXp93E9zzMMbjvabLKkj2UnLpxtXsQpLnWR0.jpeg', '-', 'Alat Memasak', 'Sewa', '2024-12-17 07:21:22', '2024-12-17 07:21:22'),
(8, 'Tenda 10 Orang', 'barang bagus mulus', 100000, 1, 'CXDZ4p5IGPFp1zVb1zOkDppQN8TQ0LJipHvSX6H3DxsWZEc8ERv3UcgSs1N7vWndMMdL6rOVo5Gxr1cHjALZOt8tu0vZzZ0sV5GW.jpg', 'Eiger', 'Alat Tidur', 'jual', '2024-12-17 07:22:14', '2024-12-17 07:22:14'),
(9, 'Tenda 4 orang', 'ukuran 4 x 4 meter', 100000, 20, '88fJeMyir9iwvt9VXsiKW9Ya33YeNNwN09XnLEYUIccqIPcKjhY9XzK9ldOsuPNd7rECMOPH8lLM3mOpHo1ArOQ66WGNF571tCDd.jpg', 'avtech', 'Alat Tidur', 'Sewa', '2024-12-17 20:45:28', '2024-12-17 20:45:28'),
(10, 'tenda 50 orang', 'ukuran 50 x 50 meter', 2000000, 3, 'dbmy8VEDrDW28nn5dR7QyWX0wFYvUg70yM0zlX1KyS3b7fMFFc79tBQ1eHlXT5JpU7JmTzFm0jetaqoDWsHnaPvEeJZD3hDUxtZA.jpeg', 'La', 'Alat Tidur', 'Sewa', '2024-12-17 20:46:18', '2025-01-04 03:35:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detailkeranjangsewa`
--

CREATE TABLE `detailkeranjangsewa` (
  `id_keranjang` bigint(20) UNSIGNED NOT NULL,
  `nama_keranjang` varchar(255) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `tujuan_sewa` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Struktur dari tabel `jobs`
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
-- Struktur dari tabel `job_batches`
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
-- Struktur dari tabel `juals`
--

CREATE TABLE `juals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `barangs_id` int(10) UNSIGNED NOT NULL,
  `users_id` int(10) UNSIGNED NOT NULL,
  `harga_total` int(11) NOT NULL,
  `stok_barang` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `lokasi_pengambilan` varchar(255) DEFAULT NULL,
  `ongkir` int(11) NOT NULL DEFAULT 0,
  `snap_token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `juals`
--

INSERT INTO `juals` (`id`, `barangs_id`, `users_id`, `harga_total`, `stok_barang`, `status`, `lokasi_pengambilan`, `ongkir`, `snap_token`, `created_at`, `updated_at`) VALUES
(6, 8, 5, 200000, 2, 'terbayar', 'langsa', 35428, '9675a268-542e-475d-814d-89f0e8222925', '2025-01-04 02:19:58', '2025-01-04 02:20:12'),
(7, 8, 5, 300000, 3, 'pending', NULL, 0, 'tes', '2025-01-04 03:25:26', '2025-01-04 03:25:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kabupatens`
--

CREATE TABLE `kabupatens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `menus`
--

INSERT INTO `menus` (`id`, `name`, `icon`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'fa-cog', '2024-12-10 07:06:19', '2024-12-10 07:06:19'),
(2, 'Master Data', 'fa-cog', '2024-12-10 07:11:04', '2024-12-10 07:11:04'),
(3, 'Transaksi', 'fa-cog', '2024-12-10 10:14:22', '2024-12-10 10:14:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu_subs`
--

CREATE TABLE `menu_subs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `menus_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `menu_subs`
--

INSERT INTO `menu_subs` (`id`, `menus_id`, `name`, `url`, `created_at`, `updated_at`) VALUES
(1, 1, 'Role', '/admin/role', '2024-12-10 07:06:19', '2024-12-10 07:06:19'),
(2, 1, 'Menu & Sub Menu', '/admin/menu', '2024-12-10 07:06:19', '2024-12-10 07:06:19'),
(3, 1, 'Admin User', '/admin/user', '2024-12-10 07:06:19', '2024-12-10 07:06:19'),
(4, 2, 'Barang', '/master/barang', '2024-12-10 07:13:11', '2024-12-10 07:13:11'),
(5, 3, 'Jual', 'transaksi/jual', '2024-12-10 10:15:13', '2024-12-10 10:15:13'),
(6, 3, 'Sewa', 'transaksi/sewa', '2024-12-10 10:15:50', '2024-12-10 10:15:50');

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
(5, '0001_01_01_000000_create_users_table', 1),
(6, '0001_01_01_000001_create_cache_table', 1),
(7, '0001_01_01_000002_create_jobs_table', 1),
(15, '2024_12_07_044127_create_barangs_table', 2),
(16, '2024_12_07_053659_create_rents_table', 3),
(28, '2024_12_15_212144_create_rent_details_table', 4),
(29, '2024_12_20_225905_create_juals_table', 4),
(30, '2024_12_23_041151_create_kabupatens_table', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rents`
--

CREATE TABLE `rents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `users_id` int(10) UNSIGNED NOT NULL,
  `nama_keranjang` varchar(255) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `tujuan_sewa` text NOT NULL,
  `harga_total` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `lokasi_pengambilan` varchar(255) DEFAULT NULL,
  `ongkir` int(11) NOT NULL DEFAULT 0,
  `snap_token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `rents`
--

INSERT INTO `rents` (`id`, `users_id`, `nama_keranjang`, `tanggal_mulai`, `tanggal_selesai`, `tujuan_sewa`, `harga_total`, `status`, `lokasi_pengambilan`, `ongkir`, `snap_token`, `created_at`, `updated_at`, `image_url`) VALUES
(10, 1, 'camp', '2024-12-26', '2024-12-28', 'qawsderd', 0, 'pen', NULL, 0, NULL, '2024-12-23 05:25:44', '2024-12-23 05:25:44', NULL),
(11, 1, 'camp1', '2024-12-25', '2024-12-25', '1234567', 0, 'pending', NULL, 0, NULL, '2024-12-23 06:09:10', '2024-12-23 06:09:10', NULL),
(12, 1, 'camp', '2024-12-19', '2024-12-26', '1234567', 0, 'pending', NULL, 0, NULL, '2024-12-23 06:31:17', '2024-12-30 10:24:16', NULL),
(13, 5, 'tes', '2024-12-26', '2024-12-27', 'berangkat', 0, 'pending', NULL, 0, 'eb0f3b90-f86d-47dd-b9fe-950dd766fe84', '2024-12-25 12:13:01', '2024-12-30 10:29:00', 'IM74V2gCAooBr7BGzhrN6MbPEg44inCRZBKGr0f99dVohkMtnkQeYzACQsUcw4Qbi21hQXWM2AVQ8QfkUXCvO4EKOqdsSDecqij2.png'),
(14, 5, 'Ke Seulawah', '2024-12-27', '2024-12-30', 'jalan jalan', 0, 'dikembalikan', NULL, 0, 'fcd3930a-a2f0-48fc-a316-d6cd4a750ba5', '2024-12-27 07:29:23', '2024-12-30 10:34:15', 'gXygQQNvH8C4Z2ssx7PQOGmUIKyGotfTJ0irzvvo4S2c71eayBvWHMAGaAJnY3W8Z0HlZaRVf255yur75T7KKunvRzo8WE38749s.png'),
(15, 6, 'tes', '2024-12-26', '2025-01-01', '123', 0, 'pending', NULL, 0, NULL, '2024-12-29 15:50:10', '2024-12-29 15:50:10', NULL),
(16, 5, 'Ke Takengon', '2025-01-03', '2025-01-06', 'jalan jalan', 2350000, 'pending', NULL, 0, NULL, '2025-01-02 09:37:16', '2025-01-02 10:10:03', NULL),
(17, 5, 'tes lama', '2025-01-02', '2025-01-04', 'tes lama', 0, 'pending', NULL, 0, NULL, '2025-01-02 10:25:56', '2025-01-02 10:25:56', NULL),
(18, 5, 'Ke Burni Telong', '2025-01-12', '2025-01-15', 'Pergi', 100000, 'terbayar', 'krueng gekuh', 31340, '54756a9e-7e2b-4c86-aad4-04a7ec0b3b1e', '2025-01-03 09:47:52', '2025-01-04 01:58:21', '61vGLuJWhTtx7ooYv94y82I8Kz1uCJwpLG1R5naY4XmKN9XRr5l1GkZMjB3dqV0kjZxvv1Ns5KLSOoJWjncfMFpuaYydt1f0XEKX.png'),
(19, 5, 'tes salah', '2025-01-12', '2025-01-15', 'tes salah stok', 4000000, 'terbayar', 'Basecamp Atjeh Camping', 0, '1ccec8a1-dcd8-4358-a63e-b9d094f1810a', '2025-01-04 03:19:02', '2025-01-04 03:35:21', 'SbrBv6uu5vjVdZ8fzJPTZxM0puU97ZLb1a6eD3Fz1xZ815kJ8fMGaC1wP1iEMkXvRJww0kRXsxnizlgqJJMF1TrSbIAE1qbScuce.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rent_details`
--

CREATE TABLE `rent_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rents_id` int(10) UNSIGNED NOT NULL,
  `barangs_id` int(10) UNSIGNED NOT NULL,
  `stok_barang` smallint(6) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `rent_details`
--

INSERT INTO `rent_details` (`id`, `rents_id`, `barangs_id`, `stok_barang`, `created_at`, `updated_at`) VALUES
(1, 12, 10, 1, '2024-12-23 06:39:58', '2024-12-23 06:39:58'),
(2, 12, 9, 1, '2024-12-23 07:08:28', '2024-12-23 07:08:28'),
(7, 13, 7, 2, '2024-12-27 06:01:16', '2024-12-27 06:01:16'),
(8, 14, 9, 1, '2024-12-27 07:29:31', '2024-12-27 07:29:31'),
(9, 14, 6, 1, '2024-12-27 07:40:04', '2024-12-27 07:40:04'),
(10, 15, 10, 2, '2024-12-29 15:50:15', '2024-12-29 15:50:15'),
(11, 14, 10, 1, '2024-12-30 06:36:23', '2024-12-30 06:36:23'),
(12, 16, 10, 1, '2025-01-02 09:37:27', '2025-01-02 09:37:27'),
(13, 16, 9, 1, '2025-01-02 10:03:36', '2025-01-02 10:03:36'),
(14, 16, 7, 5, '2025-01-02 10:05:35', '2025-01-02 10:05:35'),
(16, 18, 9, 1, '2025-01-03 09:48:01', '2025-01-03 09:48:01'),
(18, 19, 10, 2, '2025-01-04 03:32:28', '2025-01-04 03:32:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', '2024-12-10 07:06:19', '2024-12-10 07:06:19'),
(2, 'User', '2024-12-10 07:06:19', '2024-12-10 07:06:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
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
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('XgL8O9Q30UN7tI21zHdn5Je5HGRKZ6orjrq6x5r1', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiR3RoVklYQXJYMU5JM1hCYlpzaWo5bVN5ajdRWTBHMUNTUlFzVDZ6VSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9sb2dpbiI7fX0=', 1735991289);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `roles_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `role_verified_is` smallint(6) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `roles_id`, `name`, `email`, `no_hp`, `alamat`, `role_verified_is`, `password`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'Administrator', 'administrator@gmail.com', '', '', 1, '$2y$12$0SjhUxnL1oiuEm8W6bkzMOdr3NFTG6nfjTzeQgSRVN2iPI5auhBIW', NULL, NULL, '2024-12-10 07:06:19', '2024-12-10 07:06:19'),
(2, 2, 'M. FADHLAN', 'mfadhlan1721@gmail.com', '', '', NULL, '$2y$12$d/RK9fvKcLgxf3bZMTIs9OqfORTfDpnpiOiHn1JRElKN3ZnPNoQpK', NULL, NULL, '2024-12-15 12:22:04', '2024-12-15 12:22:04'),
(4, 1, 'tes', 'tes@gmail.com', '', '', NULL, '$2y$12$YcxpvuGYtraVzvOFRnfH4O/rvJB.X1eTST87AP5TB2O3wMJLiBrMK', NULL, NULL, '2024-12-24 04:42:45', '2024-12-24 04:42:45'),
(5, 2, 'Fajry Ariansyah', 'fajryjobs@gmail.com', '24', 'DUSUN BLANG, Pasi Jambu, Kaway Xvi', NULL, '$2y$12$G3tuu4C34hE6YaqTp7rjNuafBM3khnEOwp0zaaKZHSOK.V/wRJnUG', NULL, NULL, '2024-12-25 11:14:38', '2025-01-03 09:13:26'),
(6, 2, 'Fajry', 'fajryhalteks@gmail.com', '081234567', 'DUSUN BLANG, Pasi Jambu, Kaway Xv', NULL, '$2y$12$PPPBG.24MABkXH7TjA89UePUNE5W3xZUA3jW9PdvEfkMc8U61EuiW', NULL, NULL, '2024-12-29 13:00:00', '2024-12-29 15:00:34'),
(7, 1, 'tes2', 'tes2@gmail.com', '0821', 'a', NULL, '$2y$12$8kEXGfDAvYY7/B.wAUR1z.6MfdEC/IUlyb.0nEF6lyWAjuVnx9kKC', NULL, NULL, '2025-01-04 05:00:50', '2025-01-04 05:00:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role_menus`
--

CREATE TABLE `user_role_menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `roles_id` bigint(20) UNSIGNED NOT NULL,
  `menus_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `user_role_menus`
--

INSERT INTO `user_role_menus` (`id`, `roles_id`, `menus_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2024-12-10 07:06:19', '2024-12-10 07:06:19'),
(2, 1, 2, '2024-12-10 07:11:16', '2024-12-10 07:11:16'),
(3, 1, 3, '2024-12-10 10:14:32', '2024-12-10 10:14:32');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barangs`
--
ALTER TABLE `barangs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `detailkeranjangsewa`
--
ALTER TABLE `detailkeranjangsewa`
  ADD PRIMARY KEY (`id_keranjang`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `juals`
--
ALTER TABLE `juals`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kabupatens`
--
ALTER TABLE `kabupatens`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `menu_subs`
--
ALTER TABLE `menu_subs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_subs_menus_id_foreign` (`menus_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `rents`
--
ALTER TABLE `rents`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `rent_details`
--
ALTER TABLE `rent_details`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_roles_id_foreign` (`roles_id`);

--
-- Indeks untuk tabel `user_role_menus`
--
ALTER TABLE `user_role_menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_role_menus_roles_id_foreign` (`roles_id`),
  ADD KEY `user_role_menus_menus_id_foreign` (`menus_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barangs`
--
ALTER TABLE `barangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `detailkeranjangsewa`
--
ALTER TABLE `detailkeranjangsewa`
  MODIFY `id_keranjang` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `juals`
--
ALTER TABLE `juals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `kabupatens`
--
ALTER TABLE `kabupatens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `menu_subs`
--
ALTER TABLE `menu_subs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `rents`
--
ALTER TABLE `rents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `rent_details`
--
ALTER TABLE `rent_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `user_role_menus`
--
ALTER TABLE `user_role_menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `menu_subs`
--
ALTER TABLE `menu_subs`
  ADD CONSTRAINT `menu_subs_menus_id_foreign` FOREIGN KEY (`menus_id`) REFERENCES `menus` (`id`);

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_roles_id_foreign` FOREIGN KEY (`roles_id`) REFERENCES `roles` (`id`);

--
-- Ketidakleluasaan untuk tabel `user_role_menus`
--
ALTER TABLE `user_role_menus`
  ADD CONSTRAINT `user_role_menus_menus_id_foreign` FOREIGN KEY (`menus_id`) REFERENCES `menus` (`id`),
  ADD CONSTRAINT `user_role_menus_roles_id_foreign` FOREIGN KEY (`roles_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
