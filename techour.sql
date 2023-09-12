-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Sep 2023 pada 04.47
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
-- Database: `techour`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `competitions`
--

CREATE TABLE `competitions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `competition` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `competitions`
--

INSERT INTO `competitions` (`id`, `competition`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Metaverse', 'competition_images/6BcbXokqMWzqFbRRCXgTylX7WVWbfdM8LG3qdsaB.png', '2023-09-06 21:45:22', '2023-09-06 21:45:22'),
(2, 'UI/UX', 'competition_images/dsPfY8Q1cgVGaxJS1NR2pWSDQNqkfUbGjWhndacW.png', '2023-09-06 21:46:01', '2023-09-06 21:46:01'),
(3, 'Data Science', 'competition_images/DZ1hjxByF2GsKdDH2ISBBlJESRGwyx7rZVmohWqp.jpg', '2023-09-06 21:46:40', '2023-09-06 21:46:40'),
(4, 'Cyber Security', 'competition_images/9y3Nf80FgGUmc63It1S2YEov8ITutFExbs6vo1V3.png', '2023-09-06 21:46:56', '2023-09-06 21:46:56'),
(5, 'Internet Of Things', 'competition_images/imqbBe3j4LFQhO0fk4KYdNqm7Sm0EapJJeZZREZj.png', '2023-09-06 21:47:19', '2023-09-06 21:47:19');

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
(5, '2023_07_26_070943_create_competitions_table', 1),
(6, '2023_07_26_090346_create_tournaments_table', 1),
(7, '2023_07_27_024440_create_news_table', 1),
(8, '2023_08_01_080415_create_teams_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `news`
--

CREATE TABLE `news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `content` longtext NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(14, 'App\\Models\\User', 15, 'user login', '2fa93bcac75d8710a2f2bd512bbb2a0a68862143d66721f261e91c42725885bd', '[\"*\"]', '2023-09-07 09:11:09', NULL, '2023-09-07 08:14:17', '2023-09-07 09:11:09'),
(15, 'App\\Models\\User', 2, 'user login', 'c4945f7afd5ead153830ccb9a3e2d07e2a9985a154cd67804d5f4e2e4c01d49f', '[\"*\"]', NULL, NULL, '2023-09-07 09:14:14', '2023-09-07 09:14:14'),
(16, 'App\\Models\\User', 2, 'user login', '9feab04113590fdee10f46877f002ed80dee95c0eed1b8a5660dfecb75b4d6f2', '[\"*\"]', '2023-09-08 08:28:20', NULL, '2023-09-08 07:53:28', '2023-09-08 08:28:20'),
(17, 'App\\Models\\User', 2, 'user login', '4f56a4de6b675e643dbb8932d9c29a51b8f0a99d7f73f9079a7be61c7be6da19', '[\"*\"]', '2023-09-08 08:01:49', NULL, '2023-09-08 08:00:30', '2023-09-08 08:01:49');

-- --------------------------------------------------------

--
-- Struktur dari tabel `teams`
--

CREATE TABLE `teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `tournament_id` int(11) NOT NULL,
  `team` varchar(255) NOT NULL,
  `member` longtext NOT NULL,
  `contact` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tournaments`
--

CREATE TABLE `tournaments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `competition_id` int(11) NOT NULL,
  `tournament` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `location` longtext NOT NULL,
  `participants` longtext NOT NULL,
  `challenges` longtext NOT NULL,
  `prizes` longtext NOT NULL,
  `contact` varchar(255) NOT NULL,
  `registration_fee` varchar(255) NOT NULL,
  `info_team` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tournaments`
--

INSERT INTO `tournaments` (`id`, `user_id`, `competition_id`, `tournament`, `date`, `location`, `participants`, `challenges`, `prizes`, `contact`, `registration_fee`, `info_team`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'tes', '2023-09-19', 'l lk l', 'asdad', 'lkmklm', 'mmo', 'mmm', 'mmkni', '0', 'tournament_images/A5YON9u4mZKPSMXu5JaTsQ6Sejfn044z3zfBIsIn.png', '2023-09-07 08:06:23', '2023-09-07 08:06:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `hp` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `limit` int(11) NOT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `last_logout` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `hp`, `email_verified_at`, `password`, `role`, `limit`, `last_login`, `last_logout`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'techour@gmail.com', '089684914092', NULL, '$2y$10$UEn8UyiK1fBXlGMbqtxzK.9vYvhb5uX7yExnITrgoW7f0H3RCvSca', 'admin', 0, '2023-09-12 02:40:43', '2023-09-07 06:36:20', NULL, '2023-09-06 19:26:16', '2023-09-12 02:40:43'),
(2, 'Raihan Tsabit', 'raihan@gmail.com', '089684914092', NULL, '$2y$10$UJB2yKb8EUx1P7OoKFG3gu4hNBYi.DHu7wW56Xni8Xrs1XJ26Jt6e', 'user', 1, '2023-09-08 08:00:29', '2023-09-07 09:14:04', NULL, '2023-09-06 19:41:21', '2023-09-08 08:00:29'),
(3, 'Arif Hidayatulloh', 'arif@gmail.com', '089684914092', NULL, '$2y$10$wjZbqb0vQchRjqa5ie/WqumqTIaz71oWlC7Db1JT5tW03agC1vQky', 'user', 1, NULL, NULL, NULL, '2023-09-07 07:00:39', '2023-09-07 07:00:39'),
(15, 'Regita Embun', 'embun@gmail.com', '089684914092', NULL, '$2y$10$bNHs0p4da8O.URGUqk5wc.Zbw4/718VatfjSZJi.ly5K.T33EK2PS', 'user', 1, '2023-09-07 08:14:17', NULL, NULL, '2023-09-07 07:27:22', '2023-09-07 08:14:17');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `competitions`
--
ALTER TABLE `competitions`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tournaments`
--
ALTER TABLE `tournaments`
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
-- AUTO_INCREMENT untuk tabel `competitions`
--
ALTER TABLE `competitions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tournaments`
--
ALTER TABLE `tournaments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
