-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Agu 2023 pada 09.24
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
(2, 'Data Science', 'competition_images/BwW9ImFXT4UdxTZWC3Yo9GDWVVdCptpEssL0x6mk.jpg', '2023-08-08 06:32:22', '2023-08-08 06:32:22'),
(3, 'UI/UX', 'competition_images/0LNnG2g3dbYbMUuCwM9kbIQ8itFDJoaCI0oxQEAT.png', '2023-08-08 06:35:04', '2023-08-08 06:35:04'),
(4, 'Internet Of Things', 'competition_images/p21Sj5sJJH1BzMhEAAcucoNXAjd8v3A3sxNtf38Y.png', '2023-08-08 06:35:50', '2023-08-08 06:35:50'),
(5, 'Cybersecurity', 'competition_images/qNISfKm1KmJMvkX3umFAJ1QRVcxEit6Z9TtSvtsQ.png', '2023-08-08 06:36:09', '2023-08-08 06:36:09');

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
(64, '2014_10_12_000000_create_users_table', 1),
(65, '2014_10_12_100000_create_password_resets_table', 1),
(66, '2019_08_19_000000_create_failed_jobs_table', 1),
(67, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(68, '2023_07_26_070943_create_competitions_table', 1),
(69, '2023_07_26_090346_create_tournaments_table', 1),
(70, '2023_07_27_024440_create_news_table', 1),
(71, '2023_08_01_080415_create_teams_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `news`
--

CREATE TABLE `news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `content` longtext NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `news`
--

INSERT INTO `news` (`id`, `title`, `date`, `content`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Perusahaan Teknologi Terkemuka Meluncurkan Smartphone Inovatif dengan Teknologi Layar Fleksibel', '2023-08-07', 'Hari ini, perusahaan teknologi global terkemuka mengumumkan peluncuran smartphone terbaru mereka yang dilengkapi dengan teknologi layar fleksibel yang revolusioner. Smartphone ini dirancang untuk memberikan pengalaman pengguna yang unik dengan kemampuan fleksibilitas yang belum pernah ada sebelumnya.\r\n\r\nLayar fleksibel pada perangkat ini memungkinkan pengguna untuk melengkungkan atau melipat layar sesuai keinginan, memberikan lebih banyak opsi dalam hal ukuran layar dan penggunaan. Ini juga membuka peluang baru dalam desain antarmuka pengguna (UI) yang dapat beradaptasi dengan perubahan bentuk layar.\r\n\r\nSelain itu, smartphone ini dilengkapi dengan prosesor terbaru yang menawarkan kinerja yang sangat cepat, serta kamera dengan teknologi canggih untuk menghasilkan gambar yang tajam dan jernih. Baterai tahan lama dan kemampuan konektivitas 5G membuat perangkat ini cocok untuk produktivitas dan hiburan yang tak terbatas.\r\n\r\n\"Dengan peluncuran smartphone ini, kami berusaha untuk menghadirkan inovasi yang sesungguhnya kepada pengguna kami,\" kata CEO perusahaan. \"Teknologi layar fleksibel ini adalah langkah maju yang akan membuka pintu untuk pengalaman pengguna yang baru dan menarik.\"\r\n\r\nSmartphone dengan teknologi layar fleksibel ini diharapkan akan tersedia di pasar mulai bulan depan, dan telah menarik perhatian banyak penggemar teknologi yang menantikan kehadiran perangkat yang berbeda dari yang lain.', 'news_images/MaGF2dpDohuEmuYpJt7Fc755f4LJTM7lHoi1wYK2.jpg', '2023-08-08 08:01:06', '2023-08-08 08:01:06');

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

-- --------------------------------------------------------

--
-- Struktur dari tabel `teams`
--

CREATE TABLE `teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tournament_id` int(11) NOT NULL,
  `team` varchar(255) NOT NULL,
  `member` longtext NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `teams`
--

INSERT INTO `teams` (`id`, `tournament_id`, `team`, `member`, `image`, `created_at`, `updated_at`) VALUES
(3, 1, 'huha', 'iiii\r\niii\r\niiii', 'team_images/0gRWHC1ORRVflZ67R5CcF3XwIXf8flokj8tR8CYO.jpg', '2023-08-09 01:16:51', '2023-08-09 01:16:51'),
(4, 7, 'maku', 'haha,\r\nhihi,\r\nhuhu,\r\nhehe', 'team_images/T5b7oumABJBdE1FsW0X2sNVXDnn3AkyyYZfZXuYc.jpg', '2023-08-11 05:05:54', '2023-08-11 05:05:54'),
(5, 7, 'b-one', 'nana, nana, nana, nana, nana', 'team_images/zlwPVjZSw91TOMM3yRGqiSwZi9XWtChSEFLuQgGm.jpg', '2023-08-11 05:07:37', '2023-08-11 05:07:37'),
(6, 7, 'kaka', 'lala, lala, lala, lala, lala, lala', 'team_images/2SueGhiDI2olXm4SkujIEo4uKavPwAtu50tNJBAz.jpg', '2023-08-11 05:08:19', '2023-08-11 05:08:19'),
(7, 7, 'tes', 'tes', 'team_images/o7NPSVFAIj6Gd9w3WZzlTa93XdOleAHD6nXVH66R.png', '2023-08-22 01:23:45', '2023-08-22 01:23:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tournaments`
--

CREATE TABLE `tournaments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `competition_id` int(11) NOT NULL,
  `tournament` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `location` longtext NOT NULL,
  `participants` longtext NOT NULL,
  `challenges` longtext NOT NULL,
  `prizes` longtext NOT NULL,
  `contact` varchar(255) NOT NULL,
  `registration_fee` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tournaments`
--

INSERT INTO `tournaments` (`id`, `competition_id`, `tournament`, `date`, `location`, `participants`, `challenges`, `prizes`, `contact`, `registration_fee`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, 'Virtual Code Fest 2023', '2023-10-15', 'CodeVerse Metaverse', 'Maksimal Tim: 50 tim\r\nJumlah Peserta: 3-5 anggota per tim (total 150-250 peserta)', 'Kompetisi pemrograman intensif dalam lingkungan virtual', 'Total hadiah senilai $75.000 dalam bentuk kripto, perangkat keras IT, dan peluang magang di perusahaan teknologi terkemuka', 'info@virtualcodefest.com', '$20 per peserta', 'tournament_images/5yRQWqrJRq0ovT5CT4Qjc5SlFOowcqamMjtI12ud.png', '2023-08-08 06:43:21', '2023-08-08 06:43:21'),
(2, 1, 'AI World Simulation Tournament', '2024-01-10', 'SynthAI Metaverse', 'Maksimal Tim: 20 tim\r\nJumlah Peserta: 2-4 anggota per tim (total 40-80 peserta)', 'Kompetisi pengembangan dan pengujian model kecerdasan buatan dalam simulasi dunia virtual', 'Total hadiah senilai $60.000 dalam bentuk mata uang kripto, perangkat keras AI, dan peluang penelitian di laboratorium AI terkemuka', 'contact@aiworldsimulation.com', '$25 per peserta', 'tournament_images/Kh6f9BHvZ5k5VtOPfQ1j5wCYBbfsINZmCcLZOxQO.jpg', '2023-08-08 06:46:07', '2023-08-08 06:46:07'),
(3, 1, 'DataQuest AI Challenge', '2023-10-08', 'DataVerse Hub', 'Maksimal Tim: 30 tim\r\nJumlah Peserta: 2-4 anggota per tim (total 60-120 peserta)', 'Kontes analisis data dan implementasi kecerdasan buatan dalam simulasi dunia virtual', 'Hadiah total senilai $50.000 dalam bentuk mata uang kripto dan kesempatan magang di perusahaan AI terkemuka', 'support@dataquestaichallenge.com', 'Gratis', 'tournament_images/wN8WGWJgNEA4LMkFBsRNKKVswI2jTogiREbbSSpo.jpg', '2023-08-08 07:00:18', '2023-08-08 07:00:18'),
(4, 2, 'DataFusion Analytics Challenge', '2023-10-10', 'DataSphere Metaverse', 'Maksimal Tim: 50 tim\r\nJumlah Peserta: 2-4 anggota per tim (total 100-200 peserta)', 'Analisis data lintas sumber untuk mengidentifikasi pola dan tren yang relevan dalam dataset kompleks', 'Total hadiah senilai $60.000 dalam bentuk kripto dan peluang kerja di perusahaan', 'info@datafusionchallenge.com', 'Gratis', 'tournament_images/oYHTcpQDA4zuiqvJ2at3N22LY0eZUUV96sjEE1Gh.jpg', '2023-08-08 07:13:05', '2023-08-08 07:13:05'),
(5, 2, 'AI-Driven Insights Hackathon', '2023-09-21', 'AIverse Innovation Hub', 'Maksimal Tim: 40 tim\r\nJumlah Peserta: 3-5 anggota per tim (total 120-200 peserta)', 'Pengembangan model kecerdasan buatan untuk menghasilkan wawasan berharga dari dataset bisnis yang kompleks', 'Hadiah total senilai $75.000 dalam bentuk kripto dan kesempatan menghadiri konferensi AI terkemuka', 'support@aidrivenhackathon.com', '$25 per peserta', 'tournament_images/cBg84raFZfoAYNv9A5dASd9soAbkaKKT0LR9sLGA.jpg', '2023-08-08 07:22:51', '2023-08-08 07:22:51'),
(6, 2, 'Datathon for Social Impact', '2023-09-06', 'ImpactVerse Virtual Community', 'Maksimal Tim: 25 tim\r\nJumlah Peserta: 2-3 anggota per tim (total 50-75 peserta)', 'Analisis data untuk memberikan solusi kreatif terhadap masalah sosial tertentu, seperti kesehatan masyarakat atau lingkungan', 'Total hadiah senilai $40.000 dalam bentuk kripto dan dukungan untuk menerapkan solusi dalam dunia nyata', 'info@datathonforsocialimpact.com', 'Gratis', 'tournament_images/VUXZm87guUPoLgXvt5pnWiCmtAz2tYiJNDy0w5OW.jpg', '2023-08-08 07:25:51', '2023-08-08 07:25:51'),
(7, 3, 'DesignVerse UI/UX Challenge', '2023-08-31', 'DesignHub Metaverse', 'Maksimal Tim: 40 tim\r\nJumlah Peserta: 1-2 anggota per tim (total 40-80 peserta)', 'Mendesain antarmuka pengguna (UI) dan pengalaman pengguna (UX) yang inovatif untuk aplikasi mobilitas berbasis teknologi terkini', 'Total hadiah senilai $50.000 dalam bentuk kripto dan kesempatan magang di perusahaan desain terkemuka', 'info@designversechallenge.com', '$20 per peserta', 'tournament_images/SlE4rjaAlS0s29JNx0xsYlBWbXxGsWnTT1YRQumG.jpg', '2023-08-08 07:28:56', '2023-08-08 07:28:56'),
(8, 4, 'IoT Innovation Hackathon', '2023-11-09', 'TechConnect Metaverse', 'Maksimal Tim: 35 tim\r\nJumlah Peserta: 2-5 anggota per tim (total 70-175 peserta)', 'Pengembangan solusi inovatif berbasis Internet of Things (IoT) untuk masalah lingkungan dan keberlanjutan', 'Total hadiah senilai $55.000 dalam bentuk kripto dan dukungan untuk mengembangkan prototipe menjadi produk nyata', 'info@iotinnovationhackathon.com', '$30 per peserta', 'tournament_images/RZGyW7l7VxlqDlFRadaUf1M53rxpVZLi9PT5v7Jg.jpg', '2023-08-08 07:45:23', '2023-08-08 07:45:23'),
(9, 5, 'CyberSec Defender Challenge', '2023-10-17', 'SecureNet Arena Metaverse', 'Maksimal Tim: 25 tim\r\nJumlah Peserta: 1-3 anggota per tim (total 25-75 peserta)', 'Simulasi serangan dan pertahanan keamanan siber di jaringan virtual, termasuk identifikasi kerentanan, analisis malware, dan tanggapan cepat terhadap insiden', 'Total hadiah senilai $40.000 dalam bentuk kripto dan sertifikasi keamanan siber premium', 'info@cybersecdefenderchallenge.com', '$20 per peserta', 'tournament_images/nfgZ4FzxLINLkGZksznHA5BkzSZbhYoCi8mvYB8C.png', '2023-08-08 07:52:55', '2023-08-08 07:52:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT untuk tabel `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tournaments`
--
ALTER TABLE `tournaments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
