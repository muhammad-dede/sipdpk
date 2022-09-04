-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 04 Sep 2022 pada 15.18
-- Versi server: 5.7.33
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sipdpk`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dpa`
--

CREATE TABLE `dpa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_rc` bigint(20) UNSIGNED DEFAULT NULL,
  `id_stnk` bigint(20) UNSIGNED DEFAULT NULL,
  `tgl_dpa` timestamp NULL DEFAULT NULL,
  `id_rak` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `dpa`
--

INSERT INTO `dpa` (`id`, `id_rc`, `id_stnk`, `tgl_dpa`, `id_rak`) VALUES
(1, 1, 1, '2022-09-04 14:38:19', 1);

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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `lokasi`
--

CREATE TABLE `lokasi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` char(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `lokasi`
--

INSERT INTO `lokasi` (`id`, `kode`, `nama`) VALUES
(1, 'A', 'KANTOR SAMSAT'),
(2, 'B', 'BKD');

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
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2022_08_28_223527_create_permission_tables', 1),
(7, '2022_08_30_111256_create_samsat_table', 1),
(8, '2022_08_30_111318_create_stnk_table', 1),
(9, '2022_08_31_110042_create_lokasi_table', 1),
(10, '2022_08_31_110116_create_rak_table', 1),
(11, '2022_08_31_111147_create_rc_table', 1),
(12, '2022_08_31_112353_create_dpa_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2),
(3, 'App\\Models\\User', 3),
(4, 'App\\Models\\User', 4),
(5, 'App\\Models\\User', 5);

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
-- Struktur dari tabel `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rak`
--

CREATE TABLE `rak` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` char(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no` char(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `box` char(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `baris` char(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_lokasi` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `rak`
--

INSERT INTO `rak` (`id`, `kode`, `no`, `box`, `baris`, `id_lokasi`) VALUES
(1, 'A111', '1', '1', '1', 1),
(2, 'B222', '2', '2', '2', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rc`
--

CREATE TABLE `rc` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_stnk` bigint(20) UNSIGNED DEFAULT NULL,
  `tgl_akhir_pkb` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `rc`
--

INSERT INTO `rc` (`id`, `id_stnk`, `tgl_akhir_pkb`) VALUES
(1, 1, '2022-10-29 17:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2022-09-04 14:23:14', '2022-09-04 14:23:14'),
(2, 'kasir samsat', 'web', '2022-09-04 14:23:14', '2022-09-04 14:23:14'),
(3, 'kepala samsat', 'web', '2022-09-04 14:23:14', '2022-09-04 14:23:14'),
(4, 'pptk', 'web', '2022-09-04 14:23:14', '2022-09-04 14:23:14'),
(5, 'kepala dinas', 'web', '2022-09-04 14:23:14', '2022-09-04 14:23:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `samsat`
--

CREATE TABLE `samsat` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uptd_gerai` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wilayah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `samsat`
--

INSERT INTO `samsat` (`id`, `uptd_gerai`, `wilayah`, `alamat`) VALUES
(1, 'GERAI SAMSAT RAMAYANA', 'KOTA SERANG', 'ALAMAT'),
(2, 'GERAI SAMSAT KEPANDEAN', 'KOTA SERANG', 'ALAMAT');

-- --------------------------------------------------------

--
-- Struktur dari tabel `stnk`
--

CREATE TABLE `stnk` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nopol` char(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci,
  `tgl_awal_pkb` timestamp NULL DEFAULT NULL,
  `id_samsat` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `stnk`
--

INSERT INTO `stnk` (`id`, `nopol`, `nama`, `alamat`, `tgl_awal_pkb`, `id_samsat`) VALUES
(1, 'A123BJ', 'DEDE', 'ALAMAT', '2022-08-11 17:00:00', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `uuid`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '1024e7ea-0c7e-47d9-907c-b11af0429e5b', 'Admin', 'admin@gmail.com', '2022-09-04 14:23:14', '$2y$10$c4BtPL0T8Q7j6jh3EMHrn.60s1qw3Py1sCOt//n5QiMt.sPrzq6ia', NULL, NULL, NULL, '2022-09-04 14:23:14', '2022-09-04 14:23:14'),
(2, '9194a05e-b0d1-4367-b9d0-6dbe4e72807a', 'Kasir Samsat', 'kasirsamsat@gmail.com', NULL, '$2y$10$8CAaCYsMxrdLdLHUDia0EubU3joXAUjbrVY4VqeC4pvDm9IxsXiVa', NULL, NULL, '2h8JUCTzJJ13gZtnGxTVz7xTLdMM5XnbNIB0GrvPpN0mATJKBEBxjOeh3XTx', '2022-09-04 14:24:30', '2022-09-04 14:24:30'),
(3, '48a49169-a6fa-488c-9d78-1eb57fbf949f', 'Kepala Samsat', 'kepalasamsat@gmail.com', NULL, '$2y$10$7Vx30ckTkTKRngRbAi8hjOke1ZfPPzqTTLmNqX61nXINEt65u8Cw2', NULL, NULL, NULL, '2022-09-04 14:25:02', '2022-09-04 14:25:02'),
(4, '5b893222-45f3-42f9-89f9-fcbddf84c16a', 'PPTK', 'pptk@gmail.com', NULL, '$2y$10$05fEJFtszuGbIJoWQMKcM.tQR8Yd3Ui23Fersm4tIz9pbUtZFsQHu', NULL, NULL, NULL, '2022-09-04 14:25:39', '2022-09-04 14:25:39'),
(5, '3f76a139-d8b6-454b-8bcd-d378127c6292', 'Kepala Dinas', 'kepaladinas@gmail.com', NULL, '$2y$10$nrNNRFDJZGf4f6AAn.OZDurW3mgyqKf5gAF9zBWM2JCL4n6DUCWYm', NULL, NULL, NULL, '2022-09-04 14:26:05', '2022-09-04 14:26:05');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dpa`
--
ALTER TABLE `dpa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dpa_id_rc_foreign` (`id_rc`),
  ADD KEY `dpa_id_stnk_foreign` (`id_stnk`),
  ADD KEY `dpa_id_rak_foreign` (`id_rak`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indeks untuk tabel `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `rak`
--
ALTER TABLE `rak`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rak_id_lokasi_foreign` (`id_lokasi`);

--
-- Indeks untuk tabel `rc`
--
ALTER TABLE `rc`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rc_id_stnk_foreign` (`id_stnk`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indeks untuk tabel `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indeks untuk tabel `samsat`
--
ALTER TABLE `samsat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `stnk`
--
ALTER TABLE `stnk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stnk_id_samsat_foreign` (`id_samsat`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_uuid_unique` (`uuid`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `dpa`
--
ALTER TABLE `dpa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `lokasi`
--
ALTER TABLE `lokasi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `rak`
--
ALTER TABLE `rak`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `rc`
--
ALTER TABLE `rc`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `samsat`
--
ALTER TABLE `samsat`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `stnk`
--
ALTER TABLE `stnk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `dpa`
--
ALTER TABLE `dpa`
  ADD CONSTRAINT `dpa_id_rak_foreign` FOREIGN KEY (`id_rak`) REFERENCES `rak` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dpa_id_rc_foreign` FOREIGN KEY (`id_rc`) REFERENCES `rc` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dpa_id_stnk_foreign` FOREIGN KEY (`id_stnk`) REFERENCES `stnk` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `rak`
--
ALTER TABLE `rak`
  ADD CONSTRAINT `rak_id_lokasi_foreign` FOREIGN KEY (`id_lokasi`) REFERENCES `lokasi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `rc`
--
ALTER TABLE `rc`
  ADD CONSTRAINT `rc_id_stnk_foreign` FOREIGN KEY (`id_stnk`) REFERENCES `stnk` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `stnk`
--
ALTER TABLE `stnk`
  ADD CONSTRAINT `stnk_id_samsat_foreign` FOREIGN KEY (`id_samsat`) REFERENCES `samsat` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
