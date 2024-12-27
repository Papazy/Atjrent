-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Des 2024 pada 14.09
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
(10, 'tenda 50 orang', 'ukuran 50 x 50 meter', 2000000, 5, 'dbmy8VEDrDW28nn5dR7QyWX0wFYvUg70yM0zlX1KyS3b7fMFFc79tBQ1eHlXT5JpU7JmTzFm0jetaqoDWsHnaPvEeJZD3hDUxtZA.jpeg', 'La', 'Alat Tidur', 'Sewa', '2024-12-17 20:46:18', '2024-12-17 20:46:18');

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
  `snap_token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `juals`
--

INSERT INTO `juals` (`id`, `barangs_id`, `users_id`, `harga_total`, `stok_barang`, `status`, `snap_token`, `created_at`, `updated_at`) VALUES
(1, 8, 2, 100000, 1, 'dibayar', 'tes', '2024-12-24 14:04:43', NULL);

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
(3, 'Transaksi', 'fa-cog', '2024-12-10 10:14:22', '2024-12-10 10:14:22'),
(4, 'keranjang', 'fa-cog', '2024-12-13 04:27:24', '2024-12-13 04:27:24'),
(5, 'list Harga', 'fa-cog', '2024-12-22 21:27:08', '2024-12-22 21:27:08');

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
(6, 3, 'Sewa', 'transaksi/sewa', '2024-12-10 10:15:50', '2024-12-10 10:15:50'),
(9, 4, 'Detail Keranjang Sewa', 'keranjang/detailkeranjangsewa', '2024-12-13 04:29:01', '2024-12-13 04:29:01'),
(10, 5, 'kabupaten', 'listharga/kabupaten', '2024-12-22 21:27:48', '2024-12-22 21:28:01');

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
  `snap_token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `rents`
--

INSERT INTO `rents` (`id`, `users_id`, `nama_keranjang`, `tanggal_mulai`, `tanggal_selesai`, `tujuan_sewa`, `harga_total`, `status`, `snap_token`, `created_at`, `updated_at`) VALUES
(10, 1, 'camp', '2024-12-26', '2024-12-28', 'qawsderd', 0, 'pen', NULL, '2024-12-23 05:25:44', '2024-12-23 05:25:44'),
(11, 1, 'camp1', '2024-12-25', '2024-12-25', '1234567', 0, 'pending', NULL, '2024-12-23 06:09:10', '2024-12-23 06:09:10'),
(12, 1, 'camp', '2024-12-19', '2024-12-26', '1234567', 0, 'pending', NULL, '2024-12-23 06:31:17', '2024-12-23 06:31:17'),
(13, 5, 'tes', '2024-12-26', '2024-12-27', 'berangkat', 0, 'pending', NULL, '2024-12-25 12:13:01', '2024-12-25 12:13:01');

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
(7, 13, 7, 2, '2024-12-27 06:01:16', '2024-12-27 06:01:16');

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
('bPl0biQBbUUSN3u1f9zyU8EuRewWo4oDTiyiIXvt', 5, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoieVdSVlJwakpWNHBzTVBhT2Y5VXVLRFhpZno2ZFY1UDdIWll0NGt5TSI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjI2OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvc2FsZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjU7fQ==', 1735304553),
('IYwNoWRaJAm5HnDxRlpOdczePmLlFuMzssxccOuI', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoic2JkMllyajBYbEdtTm1CUVRGV2ZGUHRBVWhSYnhXRk1yR2VuWTRiSyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1735303024);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `roles_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `kota` varchar(255) NOT NULL,
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

INSERT INTO `users` (`id`, `roles_id`, `name`, `email`, `kota`, `alamat`, `role_verified_is`, `password`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'Administrator', 'administrator@gmail.com', '', '', 1, '$2y$12$0SjhUxnL1oiuEm8W6bkzMOdr3NFTG6nfjTzeQgSRVN2iPI5auhBIW', NULL, NULL, '2024-12-10 07:06:19', '2024-12-10 07:06:19'),
(2, 2, 'M. FADHLAN', 'mfadhlan1721@gmail.com', '', '', NULL, '$2y$12$d/RK9fvKcLgxf3bZMTIs9OqfORTfDpnpiOiHn1JRElKN3ZnPNoQpK', NULL, NULL, '2024-12-15 12:22:04', '2024-12-15 12:22:04'),
(4, 1, 'tes', 'tes@gmail.com', '', '', NULL, '$2y$12$YcxpvuGYtraVzvOFRnfH4O/rvJB.X1eTST87AP5TB2O3wMJLiBrMK', NULL, NULL, '2024-12-24 04:42:45', '2024-12-24 04:42:45'),
(5, 2, 'Fajry Ariansyah', 'fajryjobs@gmail.com', 'beureneun', 'DUSUN BLANG, Pasi Jambu, Kaway Xvi', NULL, '$2y$12$Z4pBXhLjJ6zM4sJt3TGMiON7uRWV4JoH0EVV92MixBkHeS4XQVkxW', NULL, NULL, '2024-12-25 11:14:38', '2024-12-25 11:14:38');

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
(3, 1, 3, '2024-12-10 10:14:32', '2024-12-10 10:14:32'),
(4, 1, 4, '2024-12-13 04:27:37', '2024-12-13 04:27:37'),
(5, 1, 5, '2024-12-22 21:27:17', '2024-12-22 21:27:17');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `rent_details`
--
ALTER TABLE `rent_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
