-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2023 at 05:28 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

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
-- Table structure for table `competitions`
--

CREATE TABLE `competitions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `competition` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `competitions`
--

INSERT INTO `competitions` (`id`, `competition`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Metaverse', 'competition_images/6BcbXokqMWzqFbRRCXgTylX7WVWbfdM8LG3qdsaB.png', '2023-09-06 21:45:22', '2023-09-06 21:45:22'),
(2, 'UI/UX', 'competition_images/dsPfY8Q1cgVGaxJS1NR2pWSDQNqkfUbGjWhndacW.png', '2023-09-06 21:46:01', '2023-09-06 21:46:01'),
(3, 'Data Science', 'competition_images/DZ1hjxByF2GsKdDH2ISBBlJESRGwyx7rZVmohWqp.jpg', '2023-09-06 21:46:40', '2023-09-06 21:46:40'),
(4, 'Cyber Security', 'competition_images/9y3Nf80FgGUmc63It1S2YEov8ITutFExbs6vo1V3.png', '2023-09-06 21:46:56', '2023-09-06 21:46:56'),
(5, 'Internet Of Things', 'competition_images/imqbBe3j4LFQhO0fk4KYdNqm7Sm0EapJJeZZREZj.png', '2023-09-06 21:47:19', '2023-09-06 21:47:19');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
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
(5, '2023_07_26_070943_create_competitions_table', 1),
(6, '2023_07_26_090346_create_tournaments_table', 1),
(7, '2023_07_27_024440_create_news_table', 1),
(8, '2023_08_01_080415_create_teams_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `news`
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

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `user_id`, `title`, `date`, `content`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, 'Peluncuran Smartphone Terbaru XYZ: Inovasi Terkini di Dunia Teknologi', '2023-09-13', 'Jakarta, 13 September 2023 - Hari ini, perusahaan teknologi terkemuka, XYZ Electronics, secara resmi meluncurkan smartphone terbaru mereka, yaitu XYZ ProMax. Peluncuran ini menjadi perhatian utama dalam dunia teknologi, mengingat berbagai inovasi terkini yang ditawarkan oleh perangkat ini.\r\n\r\nDengan layar OLED 6,7 inci yang tajam dan canggih, XYZ ProMax menawarkan pengalaman visual yang memukau. Prosesor terbaru dari XYZ, yang disebut XYZ A12, diklaim menjadi yang tercepat di kelasnya, membuat multitasking dan pemrosesan grafis menjadi lebih lancar daripada sebelumnya.\r\n\r\nSalah satu fitur unggulan yang disematkan dalam smartphone ini adalah sistem kamera ganda dengan teknologi canggih AI yang mampu mengenali objek secara otomatis dan menghasilkan foto dan video berkualitas tinggi. XYZ ProMax juga dilengkapi dengan baterai tahan lama, mendukung pengisian cepat, dan sistem keamanan biometrik yang canggih.\r\n\r\nCEO XYZ Electronics, John Smith, mengatakan, \"Kami sangat bangga dengan kemajuan teknologi terbaru yang kami bawa ke pasar melalui XYZ ProMax. Kami percaya bahwa perangkat ini akan mengubah cara orang berinteraksi dengan teknologi di sekitar mereka.\"\r\n\r\nDalam peluncuran ini, XYZ Electronics juga mengumumkan kemitraan dengan penyedia layanan jaringan terkemuka untuk memberikan paket eksklusif kepada pelanggan yang membeli XYZ ProMax. Pelanggan akan mendapatkan akses ke kecepatan internet 5G tercepat dan berbagai layanan eksklusif lainnya.\r\n\r\nXYZ ProMax akan tersedia dalam beberapa varian warna dan kapasitas penyimpanan, dengan harga mulai dari $999. Perangkat ini akan mulai dipasarkan secara resmi mulai tanggal 20 September 2023, dan para konsumen sudah dapat melakukan pre-order mulai dari hari ini.\r\n\r\nDengan peluncuran ini, XYZ Electronics kembali memperkuat posisinya sebagai salah satu pemimpin dalam industri teknologi, dan XYZ ProMax diharapkan akan menjadi pilihan utama bagi mereka yang mencari smartphone dengan kinerja dan inovasi terdepan.', 'news_images/uMY2CptIfsDOG9aygeVJVCkmiEfWXa8YBsdO9ClX.jpg', '2023-09-12 19:36:04', '2023-09-12 19:36:04'),
(2, 1, 'Peretasan Besar-Besaran Mengguncang Dunia Perbankan: Miliaran Data Nasabah Terancam', '2023-05-25', 'New York, 25 Mei 2023 - Dunia perbankan dikejutkan oleh peretasan besar-besaran yang mengancam keamanan miliaran data nasabah di seluruh dunia. Serangan siber ini terjadi pada tanggal 23 Mei, ketika sekelompok peretas berhasil meretas beberapa sistem perbankan terbesar di dunia.\r\n\r\nPara peretas, yang belum diidentifikasi, telah mengakses data pribadi dan keuangan sekitar 2 miliar nasabah dari berbagai lembaga keuangan global. Data yang dicuri termasuk nomor kartu kredit, informasi akun bank, dan informasi pribadi lainnya.\r\n\r\nKejadian ini mengingatkan dunia akan pentingnya perlindungan data dan keamanan siber. Lembaga-lembaga keuangan dan pemerintah di seluruh dunia sekarang bekerja sama untuk melacak pelaku peretasan dan mengamankan data nasabah yang terancam.\r\n\r\nCEO sebuah bank terkemuka mengatakan, \"Ini adalah pukulan besar bagi industri perbankan dan menyoroti betapa pentingnya investasi dalam keamanan siber. Kami akan bekerja keras untuk memulihkan data nasabah dan mengambil langkah-langkah tambahan untuk melindungi informasi pelanggan kami di masa depan.\"', 'news_images/Nkdbq2ET5LBhKxrBFHw9LVIW05RU6Y9DmQZGWswI.jpg', '2023-09-12 19:39:33', '2023-09-12 19:39:33'),
(3, 1, 'Perkembangan Terbaru dalam Dunia Kecerdasan Buatan: Robot \'AlphaBot\' Mampu Belajar Secara Mandiri', '2023-08-10', 'Silicon Valley, 10 Agustus 2023 - Perusahaan teknologi terkemuka, AI Innovations, baru-baru ini mengumumkan terobosan besar dalam pengembangan kecerdasan buatan (AI). Mereka telah berhasil menciptakan robot cerdas yang dikenal sebagai \"AlphaBot\" yang memiliki kemampuan untuk belajar secara mandiri dari pengalaman.\r\n\r\nAlphaBot dilengkapi dengan sistem kecerdasan buatan yang canggih, yang memungkinkannya untuk memahami lingkungannya, berinteraksi dengan objek dan orang, serta mengejar tujuan tertentu. Yang membuatnya istimewa adalah kemampuannya untuk mengambil keputusan dan memodifikasi perilaku berdasarkan pengalaman sebelumnya.\r\n\r\nCEO AI Innovations, Sarah Johnson, mengatakan, \"AlphaBot adalah hasil kerja keras tim kami dalam menggabungkan pemahaman mendalam tentang kecerdasan buatan dengan teknologi robotik. Kami melihat potensi besar dalam penggunaan AlphaBot dalam berbagai bidang, mulai dari perawatan kesehatan hingga manufaktur.\"\r\n\r\nPara ahli teknologi berharap bahwa perkembangan seperti AlphaBot akan membawa revolusi dalam otomatisasi dan penggunaan kecerdasan buatan dalam industri masa depan. Meskipun masih dalam tahap pengembangan awal, AlphaBot telah menciptakan buzz besar dalam komunitas teknologi global.', 'news_images/GfCLdVIJSIGU7YxtaqEF0S2v3OIGpO8kpYqHYBnM.jpg', '2023-09-12 19:41:48', '2023-09-12 19:41:48');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
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
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(14, 'App\\Models\\User', 15, 'user login', '2fa93bcac75d8710a2f2bd512bbb2a0a68862143d66721f261e91c42725885bd', '[\"*\"]', '2023-09-07 09:11:09', NULL, '2023-09-07 08:14:17', '2023-09-07 09:11:09'),
(15, 'App\\Models\\User', 2, 'user login', 'c4945f7afd5ead153830ccb9a3e2d07e2a9985a154cd67804d5f4e2e4c01d49f', '[\"*\"]', NULL, NULL, '2023-09-07 09:14:14', '2023-09-07 09:14:14'),
(16, 'App\\Models\\User', 2, 'user login', '9feab04113590fdee10f46877f002ed80dee95c0eed1b8a5660dfecb75b4d6f2', '[\"*\"]', '2023-09-08 08:28:20', NULL, '2023-09-08 07:53:28', '2023-09-08 08:28:20'),
(17, 'App\\Models\\User', 2, 'user login', '4f56a4de6b675e643dbb8932d9c29a51b8f0a99d7f73f9079a7be61c7be6da19', '[\"*\"]', '2023-09-08 08:01:49', NULL, '2023-09-08 08:00:30', '2023-09-08 08:01:49');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
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
-- Table structure for table `tournaments`
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
-- Dumping data for table `tournaments`
--

INSERT INTO `tournaments` (`id`, `user_id`, `competition_id`, `tournament`, `date`, `location`, `participants`, `challenges`, `prizes`, `contact`, `registration_fee`, `info_team`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Meta Indonesia', '2023-09-22', 'cibinong city mall', 'maks 40 tim 1 tim terdiri 4 orang', 'gratis', 'juara 1 mendaparkan sertifikat dan uang tunai 500 rb.\r\njuara 2 mendaparkan sertifikat dan uang tunai 300 rb.\r\njuara 3 mendapatkan sertifikat dan uang tunai 50rb', '@metaverseindonesia', 'gratis', '0', 'tournament_images/bbAF1mQh7zr5yFN7oIymUG8o2sxVwXk9VZ1bAYpk.jpg', '2023-09-07 08:06:23', '2023-09-12 19:44:57'),
(2, 1, 2, 'Indonesia Creative', '2023-09-16', 'botani square', '100 peserta', '10ribu per orang', 'juara 1 sertifikat + Rp.500.000\r\njuara 2 sertifikat + Rp.250.000\r\njuara 3 sertifikat + Rp.75.000\r\njuara 4 sertifikat', '@indonesiamaju', '10ribu per orang', '0', 'tournament_images/K3DONpJ7rAXGyqcW6YeDngdmvMTmTFtbjvHEKSpR.jpg', '2023-09-12 20:20:19', '2023-09-12 20:20:19'),
(3, 1, 3, 'Indonesia Cerdas', '2023-09-19', 'bogor square', '20 tim, 1 tim berisikan 3 orang', 'Rp.12.000 per tim', 'juara 1 sertifikat + Rp.1.000.000\r\njuara 2 sertifikat + Rp.500.000', '@indonesiacerdas', 'Rp.12.000 per tim', '1', 'tournament_images/QknZPOUrdWMp0Q4DuJYldNndlYdZPsnGdh4fOzKP.jpg', '2023-09-12 20:22:43', '2023-09-12 20:27:59'),
(4, 1, 4, 'Gesiah Cyber', '2023-09-17', 'btm mall', '25 peserta', 'gratis', 'juara 1 sertifikat + beasiswa\r\njuara 2 sertifikat', '@ges1ah', 'Gratis', '0', 'tournament_images/nWczOFnauqMJy69eQV9bcQaP1Adsbfvar0U9FPJJ.jpg', '2023-09-12 20:24:17', '2023-09-12 20:24:17'),
(5, 1, 5, '+62 Pasti bisa', '2023-11-15', 'pondok indah mall', '120 peserta', 'gratis', 'juara 1 sampai juara 3 sertifikat dan beasiswa kuliah di kampus idaman', '@62pastibisa', 'Gratis', '0', 'tournament_images/gbjeU9Sg2oyaXu1tDpjomNDcJ9oIpOz8yGb71gGA.jpg', '2023-09-12 20:27:00', '2023-09-12 20:27:29');

-- --------------------------------------------------------

--
-- Table structure for table `users`
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
-- Dumping data for table `users`
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
-- Indexes for table `competitions`
--
ALTER TABLE `competitions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tournaments`
--
ALTER TABLE `tournaments`
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
-- AUTO_INCREMENT for table `competitions`
--
ALTER TABLE `competitions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tournaments`
--
ALTER TABLE `tournaments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
