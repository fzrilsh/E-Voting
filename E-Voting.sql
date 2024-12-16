-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Dec 16, 2024 at 05:28 AM
-- Server version: 8.0.35
-- PHP Version: 8.2.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `E-Voting`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('356a192b7913b04c54574d18c28d46e6395428ab', 'i:1;', 1734314279),
('356a192b7913b04c54574d18c28d46e6395428ab:timer', 'i:1734314279;', 1734314279);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE `candidates` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `serial_number_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`id`, `name`, `photo`, `serial_number_id`, `created_at`, `updated_at`) VALUES
(1, 'Prabowo', 'candidates/Prabowo.png', 2, '2024-12-16 01:53:42', '2024-12-16 01:57:58'),
(2, 'Gibran', 'candidates/Gibran.png', 2, '2024-12-16 01:53:59', '2024-12-16 01:58:04'),
(3, 'Anis', 'candidates/Anis.png', 1, '2024-12-16 01:54:08', '2024-12-16 01:58:09'),
(4, 'Muhaimin', 'candidates/Muhaimin.png', 1, '2024-12-16 01:54:18', '2024-12-16 01:58:13');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_12_10_015230_create_personal_access_tokens_table', 1),
(5, '2024_12_10_015714_create_profiles_table', 1),
(6, '2024_12_10_021308_create_serial_numbers_table', 1),
(7, '2024_12_10_021310_create_candidates_table', 1),
(8, '2024_12_10_022652_create_vote_schedules_table', 1),
(9, '2024_12_10_022654_create_visions_table', 1),
(10, '2024_12_10_022657_create_missions_table', 1),
(11, '2024_12_10_033127_create_votings_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `missions`
--

CREATE TABLE `missions` (
  `id` bigint UNSIGNED NOT NULL,
  `serial_number_id` bigint UNSIGNED NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `missions`
--

INSERT INTO `missions` (`id`, `serial_number_id`, `text`) VALUES
(1, 1, 'Memastikan Ketersediaan Kebutuhan Pokok dan Biaya Hidup Murah melalui Kemandirian Pangan, Ketahanan Energi, dan Kedaulatan Air.\nMengentaskan Kemiskinan dengan Memperluas Kesempatan Berusaha dan Menciptakan Lapangan Kerja, Mewujudkan Upah Berkeadilan, Menjamin Kemajuan Ekonomi Berbasis Kemandirian dan Pemerataan, serta Mendukung Korporasi Indonesia Berhasil di Negeri Sendiri dan Bertumbuh di Kancah Global.\nMewujudkan Keadilan Ekologis Berkelanjutan untuk Generasi Mendatang. Membangun Kota dan Desa Berbasis Kawasan yang Manusiawi, Berkeadilan dan Saling Memajukan.\nMewujudkan Manusia Indonesia yang Sehat, Cerdas, Produktif, Berakhlak, serta Berbudaya.\nMewujudkan Keluarga Indonesia yang Sejahtera dan Bahagia sebagai Akar Kekuatan Bangsa.\nMemperkuat Sistem Pertahanan dan Keamanan Negara, serta Meningkatkan Peran dan Kepemimpinan Indonesia dalam Kancah Politik Global untuk Mewujudkan Kepentingan Nasional dan Perdamaian Dunia. Memulihkan Kualitas Demokrasi, Menegakkan Hukum dan HAM, Memberantas Korupsi Tanpa Tebang Pilih, serta Menyelenggarakan Pemerintahan yang Berpihak pada Rakyat.'),
(2, 2, 'Memperkokoh ideologi Pancasila, demokrasi, dan hak asasi manusia (HAM).\nMemantapkan sistem pertahanan keamanan negara dan mendorong kemandirian bangsa melalui swasembada pangan, energi, air, ekonomi kreatif, ekonomi hijau, dan ekonomi biru.\nMeningkatkan lapangan kerja yang berkualitas, mendorong kewirausahaan, mengembangkan industri kreatif, dan melanjutkan pengembangan infrastruktur.\nMemperkuat pembangunan sumber daya manusia (SDM), sains, teknologi, pendidikan, kesehatan, prestasi olahraga, kesetaraan gender, serta penguatan peran perempuan, pemuda, dan penyandang disabilitas.\nMelanjutkan hilirisasi dan industrialisasi untuk meningkatkan nilai tambah di dalam negeri.\nMembangun dari desa dan dari bawah untuk pemerataan ekonomi dan pemberantasan kemiskinan.\nMemperkuat reformasi politik, hukum, dan birokrasi, serta memperkuat pencegahan dan pemberantasan korupsi dan narkoba.\nMemperkuat penyelarasan kehidupan yang harmonis dengan lingkungan, alam, dan budaya, serta peningkatan toleransi antarumat beragama untuk mencapai masyarakat yang adil dan makmur');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
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
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` bigint UNSIGNED NOT NULL,
  `profile_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_id` bigint UNSIGNED NOT NULL,
  `role` enum('user','admin') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `profile_type`, `profile_id`, `role`) VALUES
(1, 'App\\Models\\User', 1, 'admin'),
(22, 'App\\Models\\User', 22, 'user'),
(23, 'App\\Models\\User', 23, 'user'),
(24, 'App\\Models\\User', 24, 'user'),
(25, 'App\\Models\\User', 25, 'user'),
(26, 'App\\Models\\User', 26, 'user'),
(27, 'App\\Models\\User', 27, 'user'),
(28, 'App\\Models\\User', 28, 'user'),
(29, 'App\\Models\\User', 29, 'user'),
(30, 'App\\Models\\User', 30, 'user'),
(31, 'App\\Models\\User', 31, 'user'),
(32, 'App\\Models\\User', 32, 'user'),
(33, 'App\\Models\\User', 33, 'user'),
(34, 'App\\Models\\User', 34, 'user'),
(35, 'App\\Models\\User', 35, 'user'),
(36, 'App\\Models\\User', 36, 'user'),
(37, 'App\\Models\\User', 37, 'user'),
(38, 'App\\Models\\User', 38, 'user'),
(39, 'App\\Models\\User', 39, 'user'),
(40, 'App\\Models\\User', 40, 'user'),
(41, 'App\\Models\\User', 41, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `serial_numbers`
--

CREATE TABLE `serial_numbers` (
  `id` bigint UNSIGNED NOT NULL,
  `text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `serial_number` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `serial_numbers`
--

INSERT INTO `serial_numbers` (`id`, `text`, `photo`, `serial_number`) VALUES
(1, 'AMIN', 'serial_numbers/AMIN.png', 1),
(2, 'PRAGIB', 'serial_numbers/PRAGIB.png', 2);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('GsnBrxX4Fy4sAkEa5zdZJgKEMsoFdaju1muYRr6a', NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.1.1 Safari/605.1.15', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiRlNkcVc5dWRUc3YzdGdRRHNFZFF0RDF4Y2F3N2UzZTVlWWRsbDNoOSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MzoidXJsIjthOjE6e3M6ODoiaW50ZW5kZWQiO3M6MjY6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC92b3RlIjt9fQ==', 1734326873);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `nim` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nickname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth_date` date DEFAULT NULL,
  `gender` enum('M','F') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nim`, `name`, `nickname`, `password`, `birth_date`, `gender`, `created_at`, `updated_at`) VALUES
(1, '1111111111', 'E-Voting Admin', 'admin', '$2y$12$NGOf2qLq6yltFG7pchsQQ.3ufrSttHn6p2DEi2BHRKBy1X85./Bvm', NULL, NULL, '2024-12-16 01:50:40', '2024-12-16 01:50:40'),
(22, '3615016755', 'John Halvorson', 'mazie.wilderman', '$2y$12$kxHWEIL9bCOZ6V.fPDGMm.YgoILFy5ROGg1eqv9nOZFrnBhnX9Fwu', '1992-09-16', 'M', '2024-12-16 02:21:23', '2024-12-16 02:21:23'),
(23, '3284425574', 'Prof. Bobby Price DVM', 'chagenes', '$2y$12$1NWQu99Bmu7RD23wue7Fz.RZ8vQk3YBhOihh1oZZ/rYhxDAAsy6W.', '1976-12-25', 'M', '2024-12-16 02:21:23', '2024-12-16 02:21:23'),
(24, '5328971904', 'Prof. Levi Christiansen', 'koelpin.elvis', '$2y$12$mRcELcpH6VCsfCTr4sJPK.NVveJanBkI.KvlhCJzMH.qKp0/0v31W', '2004-08-17', 'M', '2024-12-16 02:21:23', '2024-12-16 02:21:23'),
(25, '8114260768', 'Corrine Strosin', 'schaefer.janelle', '$2y$12$07nCrkZoymhsKapKu4JdZuePq.F9fyiEbACHhhYWlEImIMHTpJa2m', '1974-11-30', 'F', '2024-12-16 02:21:23', '2024-12-16 02:21:23'),
(26, '6909605805', 'Alayna Rohan', 'cruickshank.una', '$2y$12$7Z1Wg4pS5hsgPwjLk.WBO..CSkW5CMeJgiusJjzwTtf6enpx5LYJ6', '2001-06-19', 'M', '2024-12-16 02:21:23', '2024-12-16 02:21:23'),
(27, '0583399036', 'Meagan Conn', 'connor27', '$2y$12$r2l049gr8xD4yUDoTB2BDe05tdlize8InonaTogucJqP6eqCAPbn2', '2000-08-04', 'F', '2024-12-16 02:21:23', '2024-12-16 02:21:23'),
(28, '1120542695', 'Cristina Baumbach', 'littel.elenor', '$2y$12$s7NIYwXo49gOqdccZ5wmeu54oR4mCqWV/jRP19Q9ZNjTXg2HHBvVy', '1997-08-31', 'F', '2024-12-16 02:21:23', '2024-12-16 02:21:23'),
(29, '1395269068', 'Lori Jacobi', 'rau.raquel', '$2y$12$4KV7E/eRgzimaDZvsWvfY.o6CbfdWl687Qn.QWSe/oAMAJzWNS4ya', '2001-01-14', 'M', '2024-12-16 02:21:23', '2024-12-16 02:21:23'),
(30, '2680240229', 'Dr. Jimmie Cronin', 'gene27', '$2y$12$Ify7cOSTQ5XrjJ/QTB.pTONq5vq1ybah90YjMErcBlehReSa/yVGi', '1999-12-13', 'F', '2024-12-16 02:21:23', '2024-12-16 02:21:23'),
(31, '3721032599', 'Sophia Spencer', 'irwin02', '$2y$12$lOio.950FuZqKcxdegxU.Oa0JyqS5M8WQIZSfnQTvNu38NpC9Yq72', '1994-06-08', 'F', '2024-12-16 02:21:23', '2024-12-16 02:21:23'),
(32, '8000280473', 'Torey Williamson Jr.', 'everardo.altenwerth', '$2y$12$tlh0q8uvaNG77rGgNvbvhe8kIm0JTxb1ZKNNtOeGB8a1n80siYDX6', '2001-08-13', 'M', '2024-12-16 02:21:23', '2024-12-16 02:21:23'),
(33, '8124436137', 'Vilma Buckridge', 'kattie.mitchell', '$2y$12$4FVj0n5cGT/D4bmOKNe5cO2wGrhxV3IwY/psFj176Id/w49pz7J1S', '2001-11-12', 'M', '2024-12-16 02:21:23', '2024-12-16 02:21:23'),
(34, '4982180809', 'Mrs. Emmanuelle Corwin', 'blick.rebeka', '$2y$12$Idp18JMQGbvnJR.TtHNeJugRkX05mCJCKCrWcVTClVRfVc7KuqEgm', '2004-12-27', 'F', '2024-12-16 02:21:23', '2024-12-16 02:21:23'),
(35, '2445282922', 'Prof. Emmanuel Franecki DVM', 'hills.jada', '$2y$12$NB428dCyJjO2BmX7K027ke5IwZ/kWIoECWftVlTumdVX0EKSFHGMe', '1992-09-16', 'F', '2024-12-16 02:21:23', '2024-12-16 02:21:23'),
(36, '1980332862', 'Mr. Murphy DuBuque V', 'meta67', '$2y$12$bHEd85s6Gban6oL21XTSLeyRq0ROIJQxmem3MhCzVBuhC6eocunEe', '2004-11-26', 'M', '2024-12-16 02:21:23', '2024-12-16 02:21:23'),
(37, '4475113638', 'Adelia Prohaska Sr.', 'uharris', '$2y$12$HLa0.nbmZ0kkOdNa8A3HLuT10JTHkcxfX69lD1I1PIkxAIjRoljuu', '1992-01-30', 'M', '2024-12-16 02:21:23', '2024-12-16 02:21:23'),
(38, '7714114637', 'Corbin Langworth', 'vkautzer', '$2y$12$KJ/wiMQ6QMVvDzBlBhvMVeJsyq27eHNrkD0/tGYduEdzBKLteozLC', '1981-02-03', 'F', '2024-12-16 02:21:23', '2024-12-16 02:21:23'),
(39, '5011608017', 'Nellie Cole', 'rossie25', '$2y$12$xhlKKX0DrgAY8UDWNU7UfOar8l7LW4/hsoIhaeBJV5Kh791.8VKVq', '1970-08-07', 'F', '2024-12-16 02:21:23', '2024-12-16 02:21:23'),
(40, '2389615431', 'Prof. Roxanne Torp IV', 'greg.wehner', '$2y$12$Drw5RmJ.lAQ445s2dBz5L.3YBQdamdQQAHi6S1Klme3.PrOrjL.o6', '1988-05-08', 'F', '2024-12-16 02:21:23', '2024-12-16 02:21:23'),
(41, '4385596231', 'Mr. Hardy Grant', 'bergnaum.giovanna', '$2y$12$9sGx15b/4cqibrgNBCoWI.48w8whS4EQIRKQlHfYVPa1EiughqcNe', '2003-05-05', 'F', '2024-12-16 02:21:23', '2024-12-16 02:21:23');

-- --------------------------------------------------------

--
-- Table structure for table `visions`
--

CREATE TABLE `visions` (
  `id` bigint UNSIGNED NOT NULL,
  `serial_number_id` bigint UNSIGNED NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `visions`
--

INSERT INTO `visions` (`id`, `serial_number_id`, `text`) VALUES
(1, 1, 'Indonesia Adil Makmur untuk Semua'),
(2, 2, 'Bersama Indonesia Maju Menuju Indonesia Emas 2045');

-- --------------------------------------------------------

--
-- Table structure for table `vote_schedules`
--

CREATE TABLE `vote_schedules` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `candidates_ids` json NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vote_schedules`
--

INSERT INTO `vote_schedules` (`id`, `title`, `description`, `candidates_ids`, `start`, `end`, `deleted_at`) VALUES
(1, 'Presiden Telkom Maju', 'Pemilihan Umum Presiden Telkom Maju', '[\"1\", \"2\"]', '2024-12-15 00:00:00', '2024-12-26 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `votings`
--

CREATE TABLE `votings` (
  `id` bigint UNSIGNED NOT NULL,
  `vote_schedule_id` bigint UNSIGNED NOT NULL,
  `serial_number_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `votings`
--

INSERT INTO `votings` (`id`, `vote_schedule_id`, `serial_number_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 22, '2024-12-16 03:07:25', '2024-12-16 03:07:25'),
(2, 1, 1, 25, '2024-12-16 03:14:40', '2024-12-16 03:14:40'),
(3, 1, 2, 29, '2024-12-16 03:15:39', '2024-12-16 03:15:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `candidates`
--
ALTER TABLE `candidates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `candidates_serial_number_id_foreign` (`serial_number_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `missions`
--
ALTER TABLE `missions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `missions_serial_number_id_foreign` (`serial_number_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profiles_profile_type_profile_id_index` (`profile_type`,`profile_id`),
  ADD KEY `profiles_profile_id_foreign` (`profile_id`);

--
-- Indexes for table `serial_numbers`
--
ALTER TABLE `serial_numbers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visions`
--
ALTER TABLE `visions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `visions_serial_number_id_foreign` (`serial_number_id`);

--
-- Indexes for table `vote_schedules`
--
ALTER TABLE `vote_schedules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `votings`
--
ALTER TABLE `votings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `votings_vote_schedule_id_foreign` (`vote_schedule_id`),
  ADD KEY `votings_serial_number_id_foreign` (`serial_number_id`),
  ADD KEY `votings_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `candidates`
--
ALTER TABLE `candidates`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `missions`
--
ALTER TABLE `missions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `serial_numbers`
--
ALTER TABLE `serial_numbers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `visions`
--
ALTER TABLE `visions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vote_schedules`
--
ALTER TABLE `vote_schedules`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `votings`
--
ALTER TABLE `votings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `candidates`
--
ALTER TABLE `candidates`
  ADD CONSTRAINT `candidates_serial_number_id_foreign` FOREIGN KEY (`serial_number_id`) REFERENCES `serial_numbers` (`id`);

--
-- Constraints for table `missions`
--
ALTER TABLE `missions`
  ADD CONSTRAINT `missions_serial_number_id_foreign` FOREIGN KEY (`serial_number_id`) REFERENCES `serial_numbers` (`id`);

--
-- Constraints for table `profiles`
--
ALTER TABLE `profiles`
  ADD CONSTRAINT `profiles_profile_id_foreign` FOREIGN KEY (`profile_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `visions`
--
ALTER TABLE `visions`
  ADD CONSTRAINT `visions_serial_number_id_foreign` FOREIGN KEY (`serial_number_id`) REFERENCES `serial_numbers` (`id`);

--
-- Constraints for table `votings`
--
ALTER TABLE `votings`
  ADD CONSTRAINT `votings_serial_number_id_foreign` FOREIGN KEY (`serial_number_id`) REFERENCES `serial_numbers` (`id`),
  ADD CONSTRAINT `votings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `votings_vote_schedule_id_foreign` FOREIGN KEY (`vote_schedule_id`) REFERENCES `vote_schedules` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
