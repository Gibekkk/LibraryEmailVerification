-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2024 at 08:11 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.3.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_library`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `penerbit` varchar(255) NOT NULL,
  `penulis` varchar(255) NOT NULL,
  `tahun_terbit` int(11) NOT NULL,
  `isbn` varchar(255) NOT NULL,
  `isEbook` tinyint(1) NOT NULL,
  `ebookLink` varchar(255) DEFAULT NULL,
  `isBorrowed` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `judul`, `penerbit`, `penulis`, `tahun_terbit`, `isbn`, `isEbook`, `ebookLink`, `isBorrowed`, `created_at`, `updated_at`) VALUES
(1, 'Libero est deleniti modi repudiandae tempore doloremque.', 'CV Mangunsong', 'Makara Siregar', 2023, '9797530793755', 0, NULL, 1, '2024-11-15 11:10:42', '2024-11-15 11:10:42'),
(2, 'Est tempora dolorem atque temporibus.', 'Fa Wijaya', 'Gamblang Simbolon', 2022, '9797338300995', 0, NULL, 1, '2024-11-15 11:10:42', '2024-11-15 11:10:42'),
(3, 'Excepturi sed et mollitia qui aliquid earum eius.', 'PT Hassanah Zulaika', 'Malik Galang Uwais', 2003, '9792553344298', 0, NULL, 0, '2024-11-15 11:10:42', '2024-11-15 11:10:42'),
(4, 'Id ipsa unde voluptate enim.', 'Yayasan Kurniawan Padmasari (Persero) Tbk', 'Bakijan Dongoran S.Ked', 1986, '9784103656265', 0, NULL, 0, '2024-11-15 11:10:42', '2024-11-15 11:10:42'),
(5, 'Nihil vel impedit exercitationem quasi.', 'PJ Wijaya Tbk', 'Jaeman Pranowo M.M.', 2001, '9793582447561', 0, NULL, 0, '2024-11-15 11:10:42', '2024-11-15 11:10:42'),
(6, 'Corporis fugiat soluta assumenda quod.', 'UD Pangestu Tbk', 'Jarwi Jatmiko Hakim', 2010, '9789034118356', 1, 'https://www.lailasari.or.id/velit-consequatur-sint-architecto-sit-laborum', 0, '2024-11-15 11:10:42', '2024-11-15 11:10:42'),
(7, 'Aut repellat magni voluptas corporis assumenda officia.', 'UD Budiyanto Pratama (Persero) Tbk', 'Ratna Suryatmi S.H.', 2001, '9796852455938', 0, NULL, 0, '2024-11-15 11:10:42', '2024-11-15 11:10:42'),
(8, 'Minima quisquam consequatur maxime harum similique minus.', 'CV Puspasari', 'Tirtayasa Marpaung', 2004, '9780964270930', 1, 'http://wahyudin.name/voluptatem-unde-quis-exercitationem-aliquam-sunt-id', 0, '2024-11-15 11:10:42', '2024-11-15 11:10:42'),
(9, 'Non qui ullam rerum veniam eligendi.', 'PT Megantara Farida Tbk', 'Kunthara Setiawan', 1992, '9798581519042', 1, 'http://www.fujiati.web.id/amet-eum-porro-fugiat-cupiditate-distinctio', 0, '2024-11-15 11:10:42', '2024-11-15 11:10:42'),
(10, 'Necessitatibus nulla sit numquam rem beatae.', 'PD Fujiati (Persero) Tbk', 'Yessi Riyanti', 2015, '9786770007579', 1, 'http://rahmawati.or.id/', 0, '2024-11-15 11:10:42', '2024-11-15 11:10:42');

-- --------------------------------------------------------

--
-- Table structure for table `book_request`
--

CREATE TABLE `book_request` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `librarianID` bigint(20) UNSIGNED NOT NULL,
  `bookID` bigint(20) UNSIGNED DEFAULT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `penerbit` varchar(255) DEFAULT NULL,
  `penulis` varchar(255) DEFAULT NULL,
  `tahun_terbit` int(11) DEFAULT NULL,
  `isbn` varchar(255) DEFAULT NULL,
  `isEbook` tinyint(1) DEFAULT NULL,
  `ebookLink` varchar(255) DEFAULT NULL,
  `isBorrowed` tinyint(1) DEFAULT NULL,
  `requestType` enum('create','update','delete') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cds`
--

CREATE TABLE `cds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `artist` varchar(255) NOT NULL,
  `publisher` varchar(255) NOT NULL,
  `release_year` year(4) NOT NULL,
  `genre` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cds`
--

INSERT INTO `cds` (`id`, `title`, `artist`, `publisher`, `release_year`, `genre`, `created_at`, `updated_at`) VALUES
(1, 'Quia eius aut.', 'Art Weissnat', 'Leannon, Keebler and Marquardt', '1990', 'temporibus', '2024-11-15 11:10:42', '2024-11-15 11:10:42'),
(2, 'Laboriosam suscipit hic sed.', 'Emmalee Daugherty', 'Fritsch Inc', '1971', 'et', '2024-11-15 11:10:42', '2024-11-15 11:10:42'),
(3, 'Vel id fuga in.', 'Randall Abshire', 'Cormier, Yost and Greenfelder', '1980', 'dolor', '2024-11-15 11:10:42', '2024-11-15 11:10:42'),
(4, 'Recusandae est sit.', 'Terrell Nolan', 'Lemke-Dibbert', '1984', 'architecto', '2024-11-15 11:10:42', '2024-11-15 11:10:42'),
(5, 'Maxime cum maiores eligendi.', 'Abigail Koss', 'Lebsack Group', '1978', 'exercitationem', '2024-11-15 11:10:42', '2024-11-15 11:10:42'),
(6, 'Et adipisci qui ut.', 'Mr. Lloyd Hills', 'Ratke and Sons', '1982', 'et', '2024-11-15 11:10:42', '2024-11-15 11:10:42'),
(7, 'Voluptatibus soluta unde voluptas.', 'Prof. Michele Oberbrunner', 'Runolfsson Inc', '1978', 'nam', '2024-11-15 11:10:42', '2024-11-15 11:10:42'),
(8, 'Dolorem sequi voluptatem corrupti.', 'Mrs. Lia Anderson', 'Kemmer-Ruecker', '2024', 'quas', '2024-11-15 11:10:42', '2024-11-15 11:10:42'),
(9, 'Qui voluptatibus non voluptas.', 'Dr. Keenan Hermiston Sr.', 'Langworth, D\'Amore and Gleichner', '2021', 'dicta', '2024-11-15 11:10:42', '2024-11-15 11:10:42'),
(10, 'Pariatur reprehenderit.', 'Reanna Turner IV', 'Thompson-Hermiston', '1976', 'sed', '2024-11-15 11:10:42', '2024-11-15 11:10:42');

-- --------------------------------------------------------

--
-- Table structure for table `cds_request`
--

CREATE TABLE `cds_request` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `librarianID` bigint(20) UNSIGNED NOT NULL,
  `cdID` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `artist` varchar(255) NOT NULL,
  `publisher` varchar(255) DEFAULT NULL,
  `release_year` year(4) DEFAULT NULL,
  `genre` varchar(255) DEFAULT NULL,
  `requestType` enum('create','update','delete') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `final_year_projects`
--

CREATE TABLE `final_year_projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `supervisor` varchar(255) NOT NULL,
  `submission_year` year(4) NOT NULL,
  `abstract` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `final_year_projects`
--

INSERT INTO `final_year_projects` (`id`, `title`, `student_name`, `supervisor`, `submission_year`, `abstract`, `created_at`, `updated_at`) VALUES
(1, 'Voluptatem est cum qui.', 'Prof. Bradly Gerlach PhD', 'Rodrigo Kutch', '2000', 'Neque suscipit et esse atque voluptates esse omnis. Sed quia et est et omnis ut. Eos unde illum rem est. Voluptatum necessitatibus dolorem nostrum.', '2024-11-15 11:10:42', '2024-11-15 11:10:42'),
(2, 'Nulla dolores dolorum temporibus.', 'Kathlyn Heathcote', 'Torey Rau', '1991', 'Quae totam laboriosam autem et deserunt et fuga perspiciatis. Qui impedit laboriosam sit vero. Cumque ut qui non et delectus.', '2024-11-15 11:10:42', '2024-11-15 11:10:42'),
(3, 'Et commodi et quis qui.', 'Agustin Medhurst', 'Mrs. Trinity Welch', '1984', 'Ut consectetur blanditiis ut eius consequuntur aut. Sit reprehenderit ut qui ut accusamus totam esse. Et sit ex at assumenda quibusdam. Incidunt tempora expedita accusamus distinctio maiores sit iusto.', '2024-11-15 11:10:42', '2024-11-15 11:10:42'),
(4, 'Et debitis at reprehenderit placeat quisquam.', 'Kendall Abernathy Sr.', 'Euna Macejkovic', '2004', 'Perspiciatis dolore ut qui. Magni est ratione quos voluptas consequatur ducimus sit. Pariatur eos et enim ut.', '2024-11-15 11:10:42', '2024-11-15 11:10:42'),
(5, 'Iusto voluptatem dolor consequatur.', 'Lizzie Roob', 'Herminio Ratke', '1985', 'Qui aliquid totam voluptatem sit voluptatibus provident. Quos officiis qui sint at et minima est. Accusamus molestiae harum ut non. Aliquam ut delectus esse hic rem. Ut dolore quae omnis qui aliquid sit id.', '2024-11-15 11:10:42', '2024-11-15 11:10:42'),
(6, 'Sed illo amet praesentium est nostrum similique.', 'Keaton Daniel', 'Solon Ryan V', '1984', 'Esse sunt et nesciunt qui quidem non aspernatur. Quibusdam numquam rerum voluptatibus nostrum. Harum eum soluta necessitatibus. Officiis voluptatem ut occaecati voluptatem.', '2024-11-15 11:10:42', '2024-11-15 11:10:42'),
(7, 'Sed aliquam delectus est dolorum magni voluptate.', 'Kieran Franecki', 'Blanche Walker', '2010', 'Accusamus blanditiis animi tempore et reiciendis aut. Facere odit non neque cum. Non aut occaecati sapiente voluptatem vero ut fugiat.', '2024-11-15 11:10:42', '2024-11-15 11:10:42'),
(8, 'Eius quam enim repellendus culpa assumenda.', 'Dr. Jo Christiansen', 'Jamaal Stanton', '1990', 'Aut labore hic eveniet ab. Et nulla eaque ducimus nobis.', '2024-11-15 11:10:42', '2024-11-15 11:10:42'),
(9, 'Deserunt alias dolorum perspiciatis.', 'Vladimir Cole', 'Travon Hermiston', '1996', 'Est velit et voluptas. In nobis aliquid exercitationem voluptatem facere placeat. Nihil est esse vero sed cumque culpa. Magni est nobis quia quaerat temporibus libero.', '2024-11-15 11:10:42', '2024-11-15 11:10:42'),
(10, 'Necessitatibus eius aspernatur atque vitae.', 'Meagan O\'Keefe', 'Jamarcus Zieme', '1978', 'Quis aut quod nostrum provident necessitatibus. Repellat deleniti omnis commodi autem aliquam aut dolorum. Molestias repellat provident enim aut hic. Veniam ea qui sed commodi eum hic at.', '2024-11-15 11:10:42', '2024-11-15 11:10:42');

-- --------------------------------------------------------

--
-- Table structure for table `fyp_request`
--

CREATE TABLE `fyp_request` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `librarianID` bigint(20) UNSIGNED NOT NULL,
  `fypID` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `student_name` varchar(255) DEFAULT NULL,
  `supervisor` varchar(255) DEFAULT NULL,
  `submission_year` year(4) DEFAULT NULL,
  `abstract` text DEFAULT NULL,
  `requestType` enum('create','update','delete') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `journals`
--

CREATE TABLE `journals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `penerbit` varchar(255) NOT NULL,
  `penulis` varchar(255) NOT NULL,
  `tahun_terbit` int(11) NOT NULL,
  `isbn` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `journals`
--

INSERT INTO `journals` (`id`, `judul`, `penerbit`, `penulis`, `tahun_terbit`, `isbn`, `created_at`, `updated_at`) VALUES
(1, 'Et recusandae voluptatem enim occaecati cumque.', 'CV Purnawati Mansur Tbk', 'Vega Simbolon M.Ak', 1982, '9789793586243', '2024-11-15 11:10:42', '2024-11-15 11:10:42'),
(2, 'Et aut non magni.', 'PJ Prasetya', 'Mahesa Santoso M.TI.', 1980, '9799889492358', '2024-11-15 11:10:42', '2024-11-15 11:10:42'),
(3, 'Voluptas dolor quis reiciendis blanditiis.', 'PJ Yolanda (Persero) Tbk', 'Kurnia Nainggolan', 1993, '9798562674715', '2024-11-15 11:10:42', '2024-11-15 11:10:42'),
(4, 'Consequuntur ea dolore repellendus magnam qui.', 'PT Handayani', 'Harimurti Wijaya', 2011, '9789819263196', '2024-11-15 11:10:42', '2024-11-15 11:10:42'),
(5, 'Earum unde sit et et voluptatem sunt.', 'Perum Nainggolan Tbk', 'Winda Mulyani', 2016, '9793949777980', '2024-11-15 11:10:42', '2024-11-15 11:10:42'),
(6, 'Adipisci suscipit est sint nisi.', 'PT Mustofa Prakasa', 'Clara Uyainah M.Farm', 2018, '9795614903601', '2024-11-15 11:10:42', '2024-11-15 11:10:42'),
(7, 'Molestias illo veniam placeat est quis tempore eligendi.', 'Yayasan Jailani', 'Mitra Cawisadi Latupono S.H.', 1971, '9782165743411', '2024-11-15 11:10:42', '2024-11-15 11:10:42'),
(8, 'Corporis quas quasi beatae commodi vel aut ipsam.', 'PJ Adriansyah', 'Cinta Uyainah S.IP', 1985, '9797493124528', '2024-11-15 11:10:42', '2024-11-15 11:10:42'),
(9, 'Dolore et dolores quae.', 'Yayasan Sihombing Hakim (Persero) Tbk', 'Tami Andriani S.Farm', 1971, '9780041149142', '2024-11-15 11:10:42', '2024-11-15 11:10:42'),
(10, 'Accusamus non ut doloribus et.', 'Yayasan Zulaika Purnawati', 'Jarwadi Simanjuntak M.M.', 1991, '9787668961034', '2024-11-15 11:10:42', '2024-11-15 11:10:42');

-- --------------------------------------------------------

--
-- Table structure for table `journal_request`
--

CREATE TABLE `journal_request` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `librarianID` bigint(20) UNSIGNED NOT NULL,
  `journalID` bigint(20) UNSIGNED DEFAULT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `penerbit` varchar(255) DEFAULT NULL,
  `penulis` varchar(255) DEFAULT NULL,
  `tahun_terbit` int(11) DEFAULT NULL,
  `isbn` varchar(255) DEFAULT NULL,
  `requestType` enum('create','update','delete') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '2024_11_15_103502_books', 1),
(4, '2024_11_15_124422_journals', 1),
(5, '2024_11_15_124534_cds', 1),
(6, '2024_11_15_124553_newspapers', 1),
(7, '2024_11_15_124610_fyps', 1),
(8, '2024_11_15_164455_book_request', 1),
(9, '2024_11_15_164507_journal_request', 1),
(10, '2024_11_15_164512_c_d_request', 1),
(11, '2024_11_15_164520_newspaper_request', 1),
(12, '2024_11_15_164527_fyp_request', 1);

-- --------------------------------------------------------

--
-- Table structure for table `newspapers`
--

CREATE TABLE `newspapers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `publication_date` date NOT NULL,
  `publisher` enum('Kompas','Tribun Timur','Fajar') NOT NULL,
  `language` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `newspapers`
--

INSERT INTO `newspapers` (`id`, `name`, `publication_date`, `publisher`, `language`, `created_at`, `updated_at`) VALUES
(1, 'Kling, Hand and Raynor', '2002-10-02', 'Fajar', 'th', '1986-07-11 19:49:04', '1986-07-11 19:49:04'),
(2, 'Kling, Lynch and Lakin', '1970-03-17', 'Fajar', 'bh', '2014-03-16 07:53:35', '2014-03-16 07:53:35'),
(3, 'Nienow, Pfeffer and Barrows', '1989-12-14', 'Fajar', 'ch', '1994-10-13 00:27:03', '1994-10-13 00:27:03'),
(4, 'Wyman-Kreiger', '1999-01-12', 'Kompas', 'ka', '1974-01-30 02:46:35', '1974-01-30 02:46:35'),
(5, 'Barrows-Mertz', '2012-10-14', 'Kompas', 'cr', '2012-12-19 10:59:59', '2012-12-19 10:59:59'),
(6, 'Walter PLC', '1997-03-05', 'Kompas', 'vo', '2016-12-18 16:39:50', '2016-12-18 16:39:50'),
(7, 'Roob, Skiles and McGlynn', '2002-01-19', 'Fajar', 'rw', '1987-07-14 02:42:54', '1987-07-14 02:42:54'),
(8, 'Prohaska, Leannon and Hoeger', '2022-07-30', 'Tribun Timur', 'rn', '2009-06-10 05:27:56', '2009-06-10 05:27:56'),
(9, 'Armstrong, Krajcik and Williamson', '1970-02-04', 'Tribun Timur', 'lt', '2015-08-12 09:40:20', '2015-08-12 09:40:20'),
(10, 'Bruen-Graham', '1990-09-16', 'Tribun Timur', 'st', '1990-10-16 19:27:27', '1990-10-16 19:27:27');

-- --------------------------------------------------------

--
-- Table structure for table `newspaper_request`
--

CREATE TABLE `newspaper_request` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `librarianID` bigint(20) UNSIGNED NOT NULL,
  `newspaperID` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `publication_date` date DEFAULT NULL,
  `publisher` enum('Kompas','Tribun Timur','Fajar') DEFAULT NULL,
  `language` varchar(255) DEFAULT NULL,
  `requestType` enum('create','update','delete') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `username` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `level` enum('librarian','admin') NOT NULL,
  `isDeleted` tinyint(1) NOT NULL DEFAULT 0,
  `last_update` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `remember_token`, `level`, `isDeleted`, `last_update`, `created_at`, `updated_at`) VALUES
(1, 'Test Admin', 'admin', '$2y$12$.ljYh6bcSD5Df0rnJTJQnuMJdwIoGLHK1DJbRZwEW2tGg/15NvlCq', 'W5Mm5sMrmp', 'admin', 0, '2024-11-15', '2024-11-15 11:10:42', '2024-11-15 11:10:42'),
(2, 'Test Librarian', 'librarian', '$2y$12$.ljYh6bcSD5Df0rnJTJQnuMJdwIoGLHK1DJbRZwEW2tGg/15NvlCq', 'XDqNWeOxqW', 'librarian', 0, '2024-11-15', '2024-11-15 11:10:42', '2024-11-15 11:10:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `books_isbn_unique` (`isbn`);

--
-- Indexes for table `book_request`
--
ALTER TABLE `book_request`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `book_request_isbn_unique` (`isbn`),
  ADD KEY `book_request_librarianid_index` (`librarianID`);

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
-- Indexes for table `cds`
--
ALTER TABLE `cds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cds_request`
--
ALTER TABLE `cds_request`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cds_request_librarianid_index` (`librarianID`);

--
-- Indexes for table `final_year_projects`
--
ALTER TABLE `final_year_projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fyp_request`
--
ALTER TABLE `fyp_request`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fyp_request_librarianid_index` (`librarianID`);

--
-- Indexes for table `journals`
--
ALTER TABLE `journals`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `journals_isbn_unique` (`isbn`);

--
-- Indexes for table `journal_request`
--
ALTER TABLE `journal_request`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `journal_request_isbn_unique` (`isbn`),
  ADD KEY `journal_request_librarianid_index` (`librarianID`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newspapers`
--
ALTER TABLE `newspapers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newspaper_request`
--
ALTER TABLE `newspaper_request`
  ADD PRIMARY KEY (`id`),
  ADD KEY `newspaper_request_librarianid_index` (`librarianID`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`username`);

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `book_request`
--
ALTER TABLE `book_request`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cds`
--
ALTER TABLE `cds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `cds_request`
--
ALTER TABLE `cds_request`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `final_year_projects`
--
ALTER TABLE `final_year_projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `fyp_request`
--
ALTER TABLE `fyp_request`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `journals`
--
ALTER TABLE `journals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `journal_request`
--
ALTER TABLE `journal_request`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `newspapers`
--
ALTER TABLE `newspapers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `newspaper_request`
--
ALTER TABLE `newspaper_request`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book_request`
--
ALTER TABLE `book_request`
  ADD CONSTRAINT `book_request_librarianid_foreign` FOREIGN KEY (`librarianID`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cds_request`
--
ALTER TABLE `cds_request`
  ADD CONSTRAINT `cds_request_librarianid_foreign` FOREIGN KEY (`librarianID`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `fyp_request`
--
ALTER TABLE `fyp_request`
  ADD CONSTRAINT `fyp_request_librarianid_foreign` FOREIGN KEY (`librarianID`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `journal_request`
--
ALTER TABLE `journal_request`
  ADD CONSTRAINT `journal_request_librarianid_foreign` FOREIGN KEY (`librarianID`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `newspaper_request`
--
ALTER TABLE `newspaper_request`
  ADD CONSTRAINT `newspaper_request_librarianid_foreign` FOREIGN KEY (`librarianID`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
