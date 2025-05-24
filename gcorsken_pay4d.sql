-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 10 Agu 2023 pada 13.59
-- Versi server: 10.6.14-MariaDB-cll-lve
-- Versi PHP: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gcorsken_pay4d`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `accordions`
--

CREATE TABLE `accordions` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `alt_text` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `statuspromosi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin_activity`
--

CREATE TABLE `admin_activity` (
  `id` int(11) NOT NULL,
  `admin_username` varchar(50) NOT NULL,
  `activity_type` enum('Edit_Saldo','Hapus_Pengguna') NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `activity_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin_activity_log`
--

CREATE TABLE `admin_activity_log` (
  `id` int(11) NOT NULL,
  `admin_username` varchar(255) NOT NULL,
  `activity_type` varchar(50) NOT NULL,
  `login_time` text DEFAULT NULL,
  `logout_time` text DEFAULT NULL,
  `device` varchar(255) DEFAULT NULL,
  `ip_address` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin_activity_log`
--

INSERT INTO `admin_activity_log` (`id`, `admin_username`, `activity_type`, `login_time`, `logout_time`, `device`, `ip_address`) VALUES
(228, 'dekils', 'login', '30 Jul 2023 18:51:41', NULL, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', '125.164.16.181'),
(229, 'endoo023', 'logout', NULL, '30 Jul 2023 18:52:00', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', '125.164.20.83'),
(230, 'dekils', 'login', '30 Jul 2023 18:52:10', NULL, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', '125.164.20.83'),
(231, 'dekils', 'login', '30 Jul 2023 18:56:32', NULL, 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.85 Safari/537.36', '103.105.25.0'),
(232, 'dekils', 'login', '30 Jul 2023 19:02:47', NULL, 'Mozilla/5.0 (Linux; Android 11; M2007J20CG) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.85 Mobile Safari/537.36', '103.105.25.0'),
(233, 'dekils', 'login', '30 Jul 2023 19:04:21', NULL, 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Mobile Safari/537.36', '180.242.68.104'),
(234, 'dekils', 'login', '30 Jul 2023 19:04:57', NULL, 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Mobile Safari/537.36', '180.242.68.104'),
(235, 'dekils', 'login', '30 Jul 2023 19:05:27', NULL, 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Mobile Safari/537.36', '180.242.68.104'),
(236, 'dekils', 'login', '30 Jul 2023 19:05:42', NULL, 'Mozilla/5.0 (Linux; Android 11; M2007J20CG) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.85 Mobile Safari/537.36', '114.142.175.40'),
(237, 'dekils', 'login', '30 Jul 2023 19:08:10', NULL, 'Mozilla/5.0 (Linux; Android 11; M2007J20CG) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.85 Mobile Safari/537.36', '114.142.175.40'),
(238, 'dekils', 'login', '30 Jul 2023 19:09:04', NULL, 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Mobile Safari/537.36', '180.242.68.104'),
(239, 'dekils', 'login', '30 Jul 2023 19:09:18', NULL, 'Mozilla/5.0 (Linux; Android 11; M2007J20CG) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.85 Mobile Safari/537.36', '114.142.175.40'),
(240, 'dekils', 'login', '30 Jul 2023 19:09:35', NULL, 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.85 Safari/537.36', '114.142.175.40'),
(241, 'dekils', 'logout', NULL, '30 Jul 2023 19:35:23', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.85 Safari/537.36', '114.142.175.40'),
(242, 'Dekils', 'login', '30 Jul 2023 20:08:41', NULL, 'Mozilla/5.0 (Linux; Android 11; Infinix X6812B) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.98 Mobile Safari/537.36', '182.0.169.104'),
(243, 'Dekils', 'login', '30 Jul 2023 20:22:20', NULL, 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36', '180.252.255.187'),
(244, 'Dekils', 'login', '30 Jul 2023 20:26:03', NULL, 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36', '180.252.255.187'),
(245, 'Dekils', 'login', '30 Jul 2023 20:26:33', NULL, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', '103.18.232.97'),
(246, 'Dekils', 'login', '30 Jul 2023 20:29:39', NULL, 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36', '180.252.255.187'),
(247, 'Dekils', 'login', '30 Jul 2023 20:32:40', NULL, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', '103.18.232.97'),
(248, 'Dekils', 'login', '30 Jul 2023 20:55:52', NULL, 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Mobile Safari/537.36', '103.18.232.97'),
(249, 'Yoyokganteng', 'logout', NULL, '30 Jul 2023 20:59:44', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Mobile Safari/537.36', '103.18.232.97'),
(250, 'Dekils', 'login', '30 Jul 2023 20:59:46', NULL, 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Mobile Safari/537.36', '103.18.232.97'),
(251, 'Dekils', 'login', '30 Jul 2023 20:59:47', NULL, 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Mobile Safari/537.36', '103.18.232.97'),
(252, 'Dekils', 'login', '30 Jul 2023 20:59:50', NULL, 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Mobile Safari/537.36', '103.18.232.97'),
(253, 'Dekils', 'login', '30 Jul 2023 21:13:09', NULL, 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36', '180.252.255.187'),
(254, 'Dekils', 'login', '30 Jul 2023 21:13:25', NULL, 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Mobile Safari/537.36', '103.18.232.97'),
(255, 'Dekils', 'login', '30 Jul 2023 21:13:26', NULL, 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Mobile Safari/537.36', '103.18.232.97'),
(256, 'Dekils', 'login', '30 Jul 2023 21:13:47', NULL, 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36', '180.252.255.187'),
(257, 'Dekils', 'login', '30 Jul 2023 21:14:07', NULL, 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Mobile Safari/537.36', '103.18.232.97'),
(258, 'Dekils', 'login', '30 Jul 2023 21:14:07', NULL, 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Mobile Safari/537.36', '103.18.232.97'),
(259, 'Dekils', 'login', '30 Jul 2023 21:14:27', NULL, 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36', '180.252.255.187'),
(260, 'Dekils', 'login', '30 Jul 2023 21:29:02', NULL, 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36', '139.0.68.9'),
(261, 'Dekils', 'login', '30 Jul 2023 21:29:05', NULL, 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36', '139.0.68.9'),
(262, 'Dekils', 'login', '30 Jul 2023 21:29:06', NULL, 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36', '139.0.68.9'),
(263, 'Dekils', 'login', '30 Jul 2023 21:52:10', NULL, 'Mozilla/5.0 (iPhone; CPU iPhone OS 16_1_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.1 Mobile/15E148 Safari/604.1', '180.254.73.68'),
(264, 'Prat1337x', 'logout', NULL, '30 Jul 2023 21:52:18', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36', '180.252.255.187'),
(265, 'Dekils', 'login', '30 Jul 2023 21:52:26', NULL, 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36', '180.252.255.187'),
(266, 'Dekils', 'login', '30 Jul 2023 21:52:49', NULL, 'Mozilla/5.0 (iPhone; CPU iPhone OS 16_1_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.1 Mobile/15E148 Safari/604.1', '180.254.73.68'),
(267, 'Dekils', 'login', '30 Jul 2023 21:53:23', NULL, 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36', '180.252.255.187'),
(268, 'Dekils', 'login', '30 Jul 2023 21:55:49', NULL, 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36', '180.252.255.187'),
(269, 'Sambo303', 'logout', NULL, '30 Jul 2023 22:13:19', 'Mozilla/5.0 (Linux; Android 12; vivo 1920; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/87.0.4280.141 Mobile Safari/537.36 VivoBrowser/10.5.0.0', '116.206.28.22'),
(270, 'Sambo303', 'logout', NULL, '30 Jul 2023 22:13:31', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36', '116.206.28.22'),
(271, 'Dekils', 'login', '30 Jul 2023 22:14:08', NULL, 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36', '116.206.28.22'),
(272, 'Prat1337x', 'logout', NULL, '30 Jul 2023 22:19:40', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36', '180.252.255.187'),
(273, 'Dekils', 'login', '30 Jul 2023 22:19:47', NULL, 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36', '180.252.255.187'),
(274, 'Dekils', 'login', '30 Jul 2023 22:28:52', NULL, 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36', '180.252.255.187'),
(275, 'Dekils', 'login', '30 Jul 2023 22:55:38', NULL, 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36', '180.252.255.187'),
(276, 'Dekils', 'login', '30 Jul 2023 23:02:42', NULL, 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36', '180.252.255.187'),
(277, 'dekils', 'login', '31 Jul 2023 06:45:06', NULL, 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.85 Safari/537.36', '114.142.175.58'),
(278, 'dekils', 'login', '31 Jul 2023 10:11:54', NULL, 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.85 Safari/537.36', '114.142.175.58'),
(279, 'Dekils', 'login', '31 Jul 2023 13:19:21', NULL, 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36', '180.252.255.187'),
(280, 'dekils', 'login', '31 Jul 2023 17:20:58', NULL, 'Mozilla/5.0 (Linux; Android 11; M2007J20CG) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.85 Mobile Safari/537.36', '114.142.175.35'),
(281, 'dekils', 'login', '31 Jul 2023 17:21:09', NULL, 'Mozilla/5.0 (Linux; Android 11; M2007J20CG) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.85 Mobile Safari/537.36', '114.142.175.35'),
(282, 'dekils', 'login', '31 Jul 2023 17:21:20', NULL, 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.85 Safari/537.36', '114.142.175.35'),
(283, 'dekils', 'login', '31 Jul 2023 17:21:31', NULL, 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.85 Safari/537.36', '114.142.175.35'),
(284, 'dekils', 'login', '31 Jul 2023 17:21:41', NULL, 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.85 Safari/537.36', '114.142.175.35'),
(285, 'dekils', 'login', '31 Jul 2023 17:22:16', NULL, 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.85 Safari/537.36', '114.142.175.35'),
(286, 'dekils', 'login', '31 Jul 2023 17:22:33', NULL, 'Mozilla/5.0 (Linux; Android 11; M2007J20CG) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.85 Mobile Safari/537.36', '114.142.175.35'),
(287, 'dekils', 'login', '31 Jul 2023 17:23:45', NULL, 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.85 Safari/537.36', '114.142.175.35'),
(288, 'dekils', 'login', '31 Jul 2023 17:24:02', NULL, 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.85 Safari/537.36', '114.142.175.35'),
(289, 'dekils', 'login', '31 Jul 2023 17:24:12', NULL, 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.85 Safari/537.36', '114.142.175.35'),
(290, 'dekils', 'login', '31 Jul 2023 17:25:29', NULL, 'Mozilla/5.0 (Linux; Android 11; M2007J20CG) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.85 Mobile Safari/537.36', '114.142.175.35'),
(291, 'dekils', 'login', '31 Jul 2023 17:26:38', NULL, 'Mozilla/5.0 (Linux; Android 11; M2007J20CG) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.85 Mobile Safari/537.36', '114.142.175.35'),
(292, 'dekils', 'login', '31 Jul 2023 17:26:46', NULL, 'Mozilla/5.0 (Linux; Android 11; M2007J20CG) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.85 Mobile Safari/537.36', '114.142.175.35'),
(293, 'dekils', 'login', '31 Jul 2023 17:27:37', NULL, 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.85 Safari/537.36', '114.142.175.35'),
(294, 'dekils', 'login', '31 Jul 2023 17:27:52', NULL, 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.85 Safari/537.36', '114.142.175.35'),
(295, 'dekils', 'login', '31 Jul 2023 17:28:01', NULL, 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.85 Safari/537.36', '114.142.175.35'),
(296, 'dekils', 'login', '31 Jul 2023 17:28:47', NULL, 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.85 Safari/537.36', '114.142.175.35'),
(297, 'dekils', 'login', '31 Jul 2023 17:29:52', NULL, 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.85 Safari/537.36', '114.142.175.35'),
(298, 'dekils', 'login', '31 Jul 2023 17:29:53', NULL, 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.85 Safari/537.36', '114.142.175.35'),
(299, 'dekils', 'login', '31 Jul 2023 17:36:03', NULL, 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.85 Safari/537.36', '114.142.175.35'),
(300, 'dekils', 'login', '31 Jul 2023 18:28:09', NULL, 'Mozilla/5.0 (Linux; Android 11; M2007J20CG) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.85 Mobile Safari/537.36', '114.142.175.35'),
(301, 'Dekils', 'login', '31 Jul 2023 19:18:41', NULL, 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36', '180.214.232.5'),
(302, 'Dekils', 'login', '31 Jul 2023 20:02:13', NULL, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', '81.198.216.121'),
(303, 'dekils', 'login', '31 Jul 2023 22:31:34', NULL, 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Mobile Safari/537.36', '114.79.3.218'),
(304, 'dekils', 'login', '31 Jul 2023 22:31:36', NULL, 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Mobile Safari/537.36', '114.79.3.218'),
(305, 'dekils', 'login', '31 Jul 2023 22:31:38', NULL, 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Mobile Safari/537.36', '114.79.3.218'),
(306, 'dekils', 'login', '01 Aug 2023 07:15:06', NULL, 'Mozilla/5.0 (Linux; Android 11; M2007J20CG) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.85 Mobile Safari/537.36', '114.142.175.49'),
(307, 'dekils', 'login', '01 Aug 2023 09:57:08', NULL, 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.85 Safari/537.36', '140.213.122.145'),
(308, 'dekils', 'login', '01 Aug 2023 11:56:56', NULL, 'Mozilla/5.0 (Linux; Android 11; M2007J20CG) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.85 Mobile Safari/537.36', '140.213.122.24'),
(309, 'dekils', 'login', '01 Aug 2023 14:14:53', NULL, 'Mozilla/5.0 (Linux; Android 11; M2007J20CG) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.85 Mobile Safari/537.36', '140.213.122.24'),
(310, 'Dekils', 'login', '01 Aug 2023 14:57:40', NULL, 'Mozilla/5.0 (iPhone; CPU iPhone OS 16_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.3 Mobile/15E148 Safari/604.1', '182.2.140.104'),
(311, 'Dekils', 'login', '01 Aug 2023 14:57:43', NULL, 'Mozilla/5.0 (iPhone; CPU iPhone OS 16_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.3 Mobile/15E148 Safari/604.1', '182.2.140.104'),
(312, 'dekils', 'login', '01 Aug 2023 17:33:10', NULL, 'Mozilla/5.0 (Linux; Android 11; M2007J20CG) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.85 Mobile Safari/537.36', '140.213.122.24'),
(313, 'dekils', 'login', '02 Aug 2023 05:49:03', NULL, 'Mozilla/5.0 (Linux; Android 11; M2007J20CG) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.85 Mobile Safari/537.36', '103.105.25.25'),
(314, 'ulanncantik99', 'logout', NULL, '02 Aug 2023 06:07:43', 'Mozilla/5.0 (Linux; Android 11; M2007J20CG) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.85 Mobile Safari/537.36', '103.105.25.25'),
(315, 'dekils', 'login', '02 Aug 2023 06:07:51', NULL, 'Mozilla/5.0 (Linux; Android 11; M2007J20CG) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.85 Mobile Safari/537.36', '103.105.25.25'),
(316, 'dekils', 'login', '02 Aug 2023 06:26:11', NULL, 'Mozilla/5.0 (Linux; Android 11; M2007J20CG) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.85 Mobile Safari/537.36', '103.105.25.25'),
(317, 'dekils', 'login', '02 Aug 2023 07:12:09', NULL, 'Mozilla/5.0 (Linux; Android 11; M2007J20CG) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.85 Mobile Safari/537.36', '114.142.175.63'),
(318, 'dekils', 'login', '03 Aug 2023 02:37:37', NULL, 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Mobile Safari/537.36', '125.164.22.97'),
(319, 'dekils', 'login', '03 Aug 2023 06:59:21', NULL, 'Mozilla/5.0 (Linux; Android 11; M2007J20CG) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.85 Mobile Safari/537.36', '114.142.175.48'),
(320, 'dekils', 'login', '03 Aug 2023 08:31:12', NULL, 'Mozilla/5.0 (Linux; Android 11; M2007J20CG) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.85 Mobile Safari/537.36', '114.142.175.39'),
(321, 'dekils', 'login', '03 Aug 2023 08:32:43', NULL, 'Mozilla/5.0 (Linux; Android 11; M2007J20CG) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.85 Mobile Safari/537.36', '114.142.175.39'),
(322, 'dekils', 'login', '03 Aug 2023 10:37:50', NULL, 'Mozilla/5.0 (Linux; Android 11; M2007J20CG) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.85 Mobile Safari/537.36', '114.142.175.52'),
(323, 'dekils', 'login', '03 Aug 2023 11:22:35', NULL, 'Mozilla/5.0 (Linux; Android 11; M2007J20CG) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.85 Mobile Safari/537.36', '114.142.175.52'),
(324, 'dekils', 'login', '03 Aug 2023 12:15:16', NULL, 'Mozilla/5.0 (Linux; Android 11; M2007J20CG) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.85 Mobile Safari/537.36', '114.142.175.52'),
(325, 'dekils', 'login', '03 Aug 2023 15:46:18', NULL, 'Mozilla/5.0 (Linux; Android 11; M2007J20CG) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.85 Mobile Safari/537.36', '114.142.175.41'),
(326, 'dekils', 'login', '03 Aug 2023 15:57:19', NULL, 'Mozilla/5.0 (Linux; Android 11; M2007J20CG) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.85 Mobile Safari/537.36', '114.142.175.41'),
(327, 'dekils', 'login', '03 Aug 2023 18:17:35', NULL, 'Mozilla/5.0 (Linux; Android 11; M2007J20CG) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.85 Mobile Safari/537.36', '114.142.175.60'),
(328, 'dekils', 'login', '03 Aug 2023 20:10:50', NULL, 'Mozilla/5.0 (Linux; Android 11; M2007J20CG) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.85 Mobile Safari/537.36', '114.142.175.61'),
(329, 'dekils', 'login', '03 Aug 2023 21:19:32', NULL, 'Mozilla/5.0 (Linux; Android 11; M2007J20CG) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.85 Mobile Safari/537.36', '114.142.175.61'),
(330, 'dekils', 'login', '03 Aug 2023 23:34:29', NULL, 'Mozilla/5.0 (Linux; Android 11; M2007J20CG) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.85 Mobile Safari/537.36', '104.28.217.187'),
(331, 'dekils', 'login', '04 Aug 2023 08:19:32', NULL, 'Mozilla/5.0 (Linux; Android 11; M2007J20CG) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.85 Mobile Safari/537.36', '114.142.175.46'),
(332, 'dekils', 'login', '04 Aug 2023 09:07:06', NULL, 'Mozilla/5.0 (Linux; Android 11; M2007J20CG) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.85 Mobile Safari/537.36', '114.142.175.52'),
(333, 'dekils', 'login', '04 Aug 2023 10:31:08', NULL, 'Mozilla/5.0 (Linux; Android 11; M2007J20CG) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.85 Mobile Safari/537.36', '114.142.175.52'),
(334, 'dekils', 'login', '04 Aug 2023 11:23:12', NULL, 'Mozilla/5.0 (Linux; Android 11; M2007J20CG) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.85 Mobile Safari/537.36', '103.105.25.15'),
(335, 'dekils', 'login', '04 Aug 2023 16:12:35', NULL, 'Mozilla/5.0 (Linux; Android 11; M2007J20CG) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.85 Mobile Safari/537.36', '114.142.175.34'),
(336, 'dekils', 'login', '04 Aug 2023 16:12:54', NULL, 'Mozilla/5.0 (Linux; Android 11; M2007J20CG) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.85 Mobile Safari/537.36', '114.142.175.34'),
(337, 'dekils', 'login', '04 Aug 2023 16:14:52', NULL, 'Mozilla/5.0 (Linux; Android 11; M2007J20CG) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.85 Mobile Safari/537.36', '114.142.175.34'),
(338, 'dekils', 'login', '05 Aug 2023 09:37:25', NULL, 'Mozilla/5.0 (Linux; Android 11; M2007J20CG) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.85 Mobile Safari/537.36', '103.105.25.13'),
(339, 'Endoo123', 'logout', NULL, '06 Aug 2023 03:30:55', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Mobile Safari/537.36', '116.206.15.15'),
(340, 'dekils', 'login', '06 Aug 2023 03:31:06', NULL, 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Mobile Safari/537.36', '116.206.15.15'),
(341, 'dekils', 'login', '06 Aug 2023 09:22:05', NULL, 'Mozilla/5.0 (Linux; Android 11; M2007J20CG) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.85 Mobile Safari/537.36', '114.142.175.53'),
(342, 'dekils', 'login', '06 Aug 2023 22:20:16', NULL, 'Mozilla/5.0 (Linux; Android 11; M2007J20CG) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.85 Mobile Safari/537.36', '114.142.175.34'),
(343, 'dekils', 'login', '07 Aug 2023 07:53:49', NULL, 'Mozilla/5.0 (Linux; Android 11; M2007J20CG) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.85 Mobile Safari/537.36', '140.213.122.209'),
(344, 'dekils', 'login', '07 Aug 2023 08:44:28', NULL, 'Mozilla/5.0 (Linux; Android 11; M2007J20CG) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.85 Mobile Safari/537.36', '103.105.25.10'),
(345, 'dekils', 'login', '07 Aug 2023 19:57:14', NULL, 'Mozilla/5.0 (Linux; Android 11; M2007J20CG) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.85 Mobile Safari/537.36', '114.142.175.43'),
(346, 'dekils', 'login', '08 Aug 2023 20:19:53', NULL, 'Mozilla/5.0 (Linux; Android 11; M2007J20CG) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.85 Mobile Safari/537.36', '103.105.25.16'),
(347, 'dekils', 'login', '09 Aug 2023 11:17:01', NULL, 'Mozilla/5.0 (Linux; Android 11; M2007J20CG) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.85 Mobile Safari/537.36', '114.142.175.56'),
(348, 'dekils', 'login', '09 Aug 2023 11:27:46', NULL, 'Mozilla/5.0 (Linux; Android 11; M2007J20CG) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.85 Mobile Safari/537.36', '114.142.175.56'),
(349, 'dekils', 'login', '09 Aug 2023 16:54:26', NULL, 'Mozilla/5.0 (Linux; Android 11; M2007J20CG) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.85 Mobile Safari/537.36', '103.105.25.4'),
(350, 'dekils', 'login', '09 Aug 2023 16:54:37', NULL, 'Mozilla/5.0 (Linux; Android 11; M2007J20CG) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.85 Mobile Safari/537.36', '103.105.25.4'),
(351, 'dekils', 'login', '09 Aug 2023 16:55:38', NULL, 'Mozilla/5.0 (Linux; Android 11; M2007J20CG) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.85 Mobile Safari/537.36', '103.105.25.4'),
(352, 'dekils', 'login', '09 Aug 2023 16:55:47', NULL, 'Mozilla/5.0 (Linux; Android 11; M2007J20CG) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.85 Mobile Safari/537.36', '103.105.25.4'),
(353, 'dekils', 'login', '09 Aug 2023 16:55:58', NULL, 'Mozilla/5.0 (Linux; Android 11; M2007J20CG) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.85 Mobile Safari/537.36', '103.105.25.4'),
(354, 'dekils', 'login', '09 Aug 2023 17:10:23', NULL, 'Mozilla/5.0 (Linux; Android 11; M2007J20CG) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.85 Mobile Safari/537.36', '103.105.25.4'),
(355, 'dekils', 'login', '09 Aug 2023 19:21:04', NULL, 'Mozilla/5.0 (Linux; Android 11; M2007J20CG) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.85 Mobile Safari/537.36', '103.105.25.29'),
(356, 'dekils', 'login', '09 Aug 2023 21:29:00', NULL, 'Mozilla/5.0 (Linux; Android 11; M2007J20CG) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.85 Mobile Safari/537.36', '114.142.175.33'),
(357, 'perjaka88', 'logout', NULL, '09 Aug 2023 21:59:38', 'Mozilla/5.0 (Linux; Android 11; M2007J20CG) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.85 Mobile Safari/537.36', '114.142.175.33'),
(358, 'dekils', 'login', '09 Aug 2023 21:59:41', NULL, 'Mozilla/5.0 (Linux; Android 11; M2007J20CG) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.85 Mobile Safari/537.36', '114.142.175.33'),
(359, 'perjaka88', 'logout', NULL, '09 Aug 2023 22:04:43', 'Mozilla/5.0 (Linux; Android 11; M2007J20CG) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.85 Mobile Safari/537.36', '114.142.175.33'),
(360, 'dekils', 'login', '09 Aug 2023 22:04:46', NULL, 'Mozilla/5.0 (Linux; Android 11; M2007J20CG) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.85 Mobile Safari/537.36', '114.142.175.33'),
(361, 'perjaka88', 'logout', NULL, '09 Aug 2023 22:05:37', 'Mozilla/5.0 (Linux; Android 11; M2007J20CG) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.85 Mobile Safari/537.36', '114.142.175.33'),
(362, 'dekils', 'login', '09 Aug 2023 22:05:40', NULL, 'Mozilla/5.0 (Linux; Android 11; M2007J20CG) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.85 Mobile Safari/537.36', '114.142.175.33'),
(363, 'perjaka88', 'logout', NULL, '09 Aug 2023 22:06:40', 'Mozilla/5.0 (Linux; Android 11; M2007J20CG) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.85 Mobile Safari/537.36', '114.142.175.33'),
(364, 'dekils', 'login', '09 Aug 2023 22:06:43', NULL, 'Mozilla/5.0 (Linux; Android 11; M2007J20CG) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.85 Mobile Safari/537.36', '114.142.175.33'),
(365, 'perjaka88', 'logout', NULL, '09 Aug 2023 22:15:12', 'Mozilla/5.0 (Linux; Android 11; M2007J20CG) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.85 Mobile Safari/537.36', '114.142.175.45'),
(366, 'dekils', 'login', '09 Aug 2023 22:15:15', NULL, 'Mozilla/5.0 (Linux; Android 11; M2007J20CG) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.85 Mobile Safari/537.36', '114.142.175.45'),
(367, 'dekils', 'login', '09 Aug 2023 23:13:19', NULL, 'Mozilla/5.0 (Linux; Android 11; M2007J20CG) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.85 Mobile Safari/537.36', '114.142.175.45'),
(368, 'dekils', 'login', '09 Aug 2023 23:53:58', NULL, 'Mozilla/5.0 (Linux; Android 11; M2007J20CG) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.85 Mobile Safari/537.36', '114.142.175.45'),
(369, 'dekils', 'login', '10 Aug 2023 11:14:23', NULL, 'Mozilla/5.0 (Linux; Android 11; M2007J20CG) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.85 Mobile Safari/537.36', '114.142.175.36'),
(370, 'manobrako', 'logout', NULL, '10 Aug 2023 11:51:33', 'Mozilla/5.0 (Linux; Android 11; M2007J20CG) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.85 Mobile Safari/537.36', '114.142.175.36'),
(371, 'dekils', 'login', '10 Aug 2023 11:51:36', NULL, 'Mozilla/5.0 (Linux; Android 11; M2007J20CG) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.85 Mobile Safari/537.36', '114.142.175.36'),
(372, 'manobrako', 'logout', NULL, '10 Aug 2023 11:52:45', 'Mozilla/5.0 (Linux; Android 11; M2007J20CG) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.85 Mobile Safari/537.36', '114.142.175.36'),
(373, 'dekils', 'login', '10 Aug 2023 11:52:47', NULL, 'Mozilla/5.0 (Linux; Android 11; M2007J20CG) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.85 Mobile Safari/537.36', '114.142.175.36'),
(374, 'manobrako', 'logout', NULL, '10 Aug 2023 12:14:26', 'Mozilla/5.0 (Linux; Android 11; M2007J20CG) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.85 Mobile Safari/537.36', '114.142.175.42'),
(375, 'dekils', 'login', '10 Aug 2023 12:14:29', NULL, 'Mozilla/5.0 (Linux; Android 11; M2007J20CG) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.85 Mobile Safari/537.36', '114.142.175.42'),
(376, 'manobrako', 'logout', NULL, '10 Aug 2023 12:16:17', 'Mozilla/5.0 (Linux; Android 11; M2007J20CG) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.85 Mobile Safari/537.36', '114.142.175.42'),
(377, 'dekils', 'login', '10 Aug 2023 12:16:20', NULL, 'Mozilla/5.0 (Linux; Android 11; M2007J20CG) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.85 Mobile Safari/537.36', '114.142.175.42'),
(378, 'dekils', 'login', '10 Aug 2023 12:51:09', NULL, 'Mozilla/5.0 (Linux; Android 11; M2007J20CG) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.85 Mobile Safari/537.36', '114.142.175.42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `balance_change_log`
--

CREATE TABLE `balance_change_log` (
  `id` int(11) NOT NULL,
  `username_pengguna` varchar(55) NOT NULL,
  `admin_username` varchar(255) NOT NULL,
  `old_balance` decimal(10,2) NOT NULL,
  `new_balance` decimal(10,2) NOT NULL,
  `change_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `balance_change_log`
--

INSERT INTO `balance_change_log` (`id`, `username_pengguna`, `admin_username`, `old_balance`, `new_balance`, `change_date`) VALUES
(102, 'Sambo303', 'dekils', 0.00, 100.00, '2023-07-30 15:20:14'),
(103, 'Wageg11', 'dekils', 100000.00, 100000.00, '2023-07-30 15:56:21'),
(104, 'Anndee', 'dekils', 100000.00, 100000.00, '2023-07-30 15:59:47'),
(105, 'Borju88', 'dekils', 50000.00, 100000.00, '2023-07-31 03:15:21'),
(106, 'Kopi168Jp5Jta', 'dekils', 0.00, 100000.00, '2023-07-31 10:37:12'),
(107, 'Adelia11', 'dekils', 150000.00, 300000.00, '2023-07-31 10:52:37'),
(108, 'Kuyabalap', 'dekils', 50000.00, 100000.00, '2023-07-31 11:30:10'),
(109, 'jadijp123', 'dekils', 0.00, 200000.00, '2023-08-01 04:58:10'),
(110, 'ulanncantik99', 'dekils', 0.00, 2680000.00, '2023-08-01 23:08:52'),
(111, 'Recehanah66', 'dekils', 0.00, 100000.00, '2023-08-03 03:38:14'),
(112, 'Yola09', 'dekils', 100000.00, 0.00, '2023-08-03 05:17:44'),
(113, 'Degel88', 'dekils', 0.00, 100000.00, '2023-08-03 08:57:51'),
(114, 'Yola09', 'dekils', 50000.00, 100000.00, '2023-08-03 11:21:56'),
(115, 'alberth', 'dekils', 98000.00, 196000.00, '2023-08-03 14:44:26'),
(116, 'detik14', 'dekils', 0.00, 200000.00, '2023-08-03 16:34:54'),
(117, 'gasjp99', 'dekils', 50000.00, 100000.00, '2023-08-04 03:44:12'),
(118, 'Jpkampang', 'dekils', 50000.00, 100000.00, '2023-08-04 09:15:22'),
(119, 'Milkyway168', 'dekils', 50000.00, 100000.00, '2023-08-05 02:38:04'),
(120, 'Endoo123', 'dekils', 10000.00, 100000.00, '2023-08-05 20:32:04'),
(121, 'Bangjun', 'dekils', 0.00, 100000.00, '2023-08-08 13:21:06'),
(122, 'perjaka88', 'dekils', 100000.00, 200000.00, '2023-08-09 14:29:35'),
(123, 'perjaka88', 'dekils', 200000.00, 2368000.00, '2023-08-09 15:00:25'),
(124, 'perjaka88', 'dekils', 0.00, 2368000.00, '2023-08-09 15:06:02'),
(125, 'Kadal11', 'dekils', 2368000.00, 0.00, '2023-08-09 15:19:58'),
(126, 'Agusrahayu', 'dekils', 0.00, 100000.00, '2023-08-09 16:16:26'),
(127, 'Bandit662', 'dekils', 50000.00, 100000.00, '2023-08-09 16:54:33'),
(128, 'manobrako', 'dekils', 300000.00, 1830000.00, '2023-08-10 05:15:21'),
(129, 'papahgila88', 'dekils', 58000.00, 116000.00, '2023-08-10 05:52:18'),
(130, 'Nadila', 'dekils', 50000.00, 100000.00, '2023-08-10 06:09:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bank_options`
--

CREATE TABLE `bank_options` (
  `id` int(11) NOT NULL,
  `value` varchar(50) NOT NULL,
  `att` varchar(50) DEFAULT NULL,
  `rek` varchar(50) DEFAULT NULL,
  `label` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `bank_options`
--

INSERT INTO `bank_options` (`id`, `value`, `att`, `rek`, `label`) VALUES
(48, 'REKENING', '0', 'KLIK DISINI', ''),
(50, 'BCA', '00', 'HUBUNGI LIVECHAT', ''),
(51, 'BRI', '514901013767533', 'NURLAILA', ''),
(52, 'GOPAY', '085810407418', 'ANISA BAHRUDIN', ''),
(53, 'LINKAJA', '085950702500', 'ADI RIYANTO', ''),
(54, 'OVO', '085811168256', 'FERDIANSYAH', ''),
(56, 'NEOBANK', '5859458199740821', 'RENALDI RAHIM', ''),
(57, 'DANA', '083871065675', 'SULFIKAR', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `banners`
--

CREATE TABLE `banners` (
  `id` int(11) NOT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `alt_text` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `banners`
--

INSERT INTO `banners` (`id`, `image_path`, `alt_text`) VALUES
(72, '../banner/20230809_175907.jpg', 'BONUS NEWMEMBER 100% TO X7');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bannersdesktop`
--

CREATE TABLE `bannersdesktop` (
  `id` int(11) NOT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `alt_text` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `bannersdesktop`
--

INSERT INTO `bannersdesktop` (`id`, `image_path`, `alt_text`) VALUES
(28, '../bannerdesktop/Safeimagekit-resized-img.jpg', 'OWNER');

-- --------------------------------------------------------

--
-- Struktur dari tabel `configuration`
--

CREATE TABLE `configuration` (
  `id` int(11) NOT NULL,
  `key_name` varchar(255) NOT NULL,
  `value` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `deleted_users`
--

CREATE TABLE `deleted_users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `level` varchar(50) NOT NULL,
  `deleted_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `admin_username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `deposits`
--

CREATE TABLE `deposits` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `submit_date` varchar(55) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `bank_name` varchar(10) DEFAULT NULL,
  `acc_no` varchar(55) DEFAULT NULL,
  `fullname` varchar(55) DEFAULT NULL,
  `destination` text DEFAULT NULL,
  `status` enum('Pending','Approved','Rejected') DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `activity_type` varchar(255) NOT NULL DEFAULT 'Deposit',
  `activity_details` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `deposits`
--

INSERT INTO `deposits` (`id`, `user_id`, `amount`, `submit_date`, `username`, `bank_name`, `acc_no`, `fullname`, `destination`, `status`, `created_at`, `updated_at`, `activity_type`, `activity_details`) VALUES
(343, 35, 10000.00, '2023-07-30', 'dekils', 'BCA', '1234567890', 'LOLI', 'ovo', 'Approved', '2023-07-30 14:05:16', '2023-07-30 14:05:16', 'Deposit', NULL),
(344, 35, 1000000.00, '2023-07-30', 'dekils', 'BCA', '1234567890', 'LOLI', 'ovo', 'Rejected', '2023-07-30 14:07:49', '2023-07-30 14:07:49', 'Deposit', NULL),
(345, 35, 1000000.00, '2023-07-30', 'dekils', 'BCA', '1234567890', 'LOLI', 'ovo', 'Approved', '2023-07-30 14:09:10', '2023-07-30 14:09:10', 'Deposit', NULL),
(346, 165, 100000.00, '2023-07-30', 'Sayangmamah', 'DANA', '087871259269', 'Suryanah', 'BCA', 'Approved', '2023-07-30 15:28:34', '2023-07-30 15:28:34', 'Deposit', NULL),
(347, 168, 100000.00, '2023-07-30', 'Wageg11', 'DANA', '085893696502', 'MOCHAMMAD SADHAT ARDANI', 'BCA', 'Approved', '2023-07-30 15:54:58', '2023-07-30 15:54:58', 'Deposit', NULL),
(348, 167, 100000.00, '2023-07-30', 'Anndee', 'BCA', '7610964065', 'Andhi Rimantiasto', 'BCA', 'Approved', '2023-07-30 15:59:06', '2023-07-30 15:59:06', 'Deposit', NULL),
(349, 35, 100000.00, '2023-07-31', 'dekils', 'BCA', '1234567890', 'LOLI', 'NEOBANK', 'Approved', '2023-07-30 23:52:24', '2023-07-30 23:52:24', 'Deposit', NULL),
(350, 170, 50000.00, '2023-07-31', 'Borju88', 'DANA', '087898046836', 'Ai Nuraeni', 'DANA', 'Approved', '2023-07-31 03:13:31', '2023-07-31 03:13:31', 'Deposit', NULL),
(351, 162, 50000.00, '2023-07-31', 'Prat1337x', 'BCA', '2950063098', 'Abdul hadi', 'NEOBANK', 'Approved', '2023-07-31 06:18:48', '2023-07-31 06:18:48', 'Deposit', NULL),
(352, 172, 50000.00, '2023-07-31', 'Kopi168Jp5Jta', 'DANA', '081528448286', 'Djamila', 'DANA', 'Rejected', '2023-07-31 10:20:30', '2023-07-31 10:20:30', 'Deposit', NULL),
(353, 169, 150000.00, '2023-07-31', 'Adelia11', 'DANA', '081395914850', 'Ramlan', 'NEOBANK', 'Approved', '2023-07-31 10:47:31', '2023-07-31 10:47:31', 'Deposit', NULL),
(354, 173, 50000.00, '2023-07-31', 'Kuyabalap', 'DANA', '085314918928', 'Jaja sudrajat', 'DANA', 'Approved', '2023-07-31 11:24:33', '2023-07-31 11:24:33', 'Deposit', NULL),
(355, 175, 100000.00, '2023-08-01', 'jadijp123', 'DANA', '085609230010', 'SUSANTI', 'DANA', 'Rejected', '2023-08-01 04:53:34', '2023-08-01 04:53:34', 'Deposit', NULL),
(356, 179, 50000.00, '2023-08-01', 'Fakip77', 'DANA', '082182352844', 'Mahliadi', 'DANA', 'Rejected', '2023-08-01 10:32:03', '2023-08-01 10:32:03', 'Deposit', NULL),
(357, 181, 500000.00, '2023-08-01', 'Markas38', 'DANA', '0858363737838', 'Rizki Maulana ', 'DANA', 'Rejected', '2023-08-01 14:57:09', '2023-08-01 14:57:09', 'Deposit', NULL),
(358, 182, 2834000.00, '2023-08-02', 'ulanncantik99', 'DANA', '0822628363823', 'WULANDARI ', 'DANA', 'Approved', '2023-08-01 23:25:55', '2023-08-01 23:25:55', 'Deposit', NULL),
(359, 188, 50000.00, '2023-08-03', 'Recehanah66', 'DANA', '085754432536', 'Rian Gumilar jaya', 'DANA', 'Rejected', '2023-08-03 03:33:34', '2023-08-03 03:33:34', 'Deposit', NULL),
(360, 190, 50000.00, '2023-08-03', 'Degel88', 'DANA', '085600439896', 'Hendra rahwanto', 'DANA', 'Rejected', '2023-08-03 07:57:34', '2023-08-03 07:57:34', 'Deposit', NULL),
(361, 189, 50000.00, '2023-08-03', 'Yola09', 'DANA', '085871179241', 'Yolanda rahman', 'DANA', 'Approved', '2023-08-03 11:18:07', '2023-08-03 11:18:07', 'Deposit', NULL),
(362, 195, 50000.00, '2023-08-03', 'Sempak4d', 'BCA', '7820414025', 'Maman saputra', 'BCA', 'Rejected', '2023-08-03 11:55:45', '2023-08-03 11:55:45', 'Deposit', NULL),
(363, 198, 25000.00, '2023-08-03', 'Fahmijp', 'DANA', '085714994431', 'Ari wibowo', 'DANA', 'Rejected', '2023-08-03 13:03:27', '2023-08-03 13:03:27', 'Deposit', NULL),
(364, 198, 25000.00, '2023-08-03', 'Fahmijp', 'DANA', '085714994431', 'Ari wibowo', 'DANA', 'Rejected', '2023-08-03 13:12:54', '2023-08-03 13:12:54', 'Deposit', NULL),
(365, 198, 50000.00, '2023-08-03', 'Fahmijp', 'DANA', '085714994431', 'Ari wibowo', 'DANA', 'Approved', '2023-08-03 13:15:08', '2023-08-03 13:15:08', 'Deposit', NULL),
(366, 202, 98000.00, '2023-08-03', 'alberth', 'BRI', '361901024038534', 'juniati rosalina hun', 'BRI', 'Approved', '2023-08-03 14:38:06', '2023-08-03 14:38:06', 'Deposit', NULL),
(367, 204, 100000.00, '2023-08-03', 'detik14', 'DANA', '082144844432', 'iwanto', 'DANA', 'Rejected', '2023-08-03 16:31:49', '2023-08-03 16:31:49', 'Deposit', NULL),
(368, 206, 50000.00, '2023-08-04', 'gasjp99', 'DANA', '085841121259', 'suprianto', 'DANA', 'Approved', '2023-08-04 03:39:38', '2023-08-04 03:39:38', 'Deposit', NULL),
(369, 211, 50000.00, '2023-08-04', 'Jpkampang', 'DANA', '0895420975680', 'Andri kurniawan', 'DANA', 'Approved', '2023-08-04 09:11:23', '2023-08-04 09:11:23', 'Deposit', NULL),
(370, 215, 50000.00, '2023-08-05', 'Milkyway168', 'BCA', '8135410612', 'Hendrizal', 'BCA', 'Approved', '2023-08-05 02:36:50', '2023-08-05 02:36:50', 'Deposit', NULL),
(371, 159, 10000.00, '2023-08-06', 'Endoo123', 'Permata', '08988891332', 'Kepilu', 'DANA', 'Approved', '2023-08-05 20:30:46', '2023-08-05 20:30:46', 'Deposit', NULL),
(372, 220, 50000.00, '2023-08-06', 'Uwong168', 'BCA', '5850329801', 'Zainal muttaqin', 'DANA', 'Approved', '2023-08-06 15:12:03', '2023-08-06 15:12:03', 'Deposit', NULL),
(373, 220, 50000.00, '2023-08-06', 'Uwong168', 'BCA', '5850329801', 'Zainal muttaqin', 'NEOBANK', 'Rejected', '2023-08-06 15:24:20', '2023-08-06 15:24:20', 'Deposit', NULL),
(374, 221, 50000.00, '2023-08-07', 'Ruly78', 'DANA', '085782587455', 'Ruly Amarulloh', 'DANA', 'Approved', '2023-08-06 21:00:48', '2023-08-06 21:00:48', 'Deposit', NULL),
(375, 221, 50000.00, '2023-08-07', 'Ruly78', 'DANA', '085782587455', 'Ruly Amarulloh', 'DANA', 'Rejected', '2023-08-07 03:10:16', '2023-08-07 03:10:16', 'Deposit', NULL),
(376, 224, 50000.00, '2023-08-08', 'Bangjun', 'DANA', '081273660466', 'Junani', 'DANA', 'Rejected', '2023-08-08 13:18:01', '2023-08-08 13:18:01', 'Deposit', NULL),
(377, 228, 40000.00, '2023-08-09', 'Jakatbatara', 'DANA', '085255500570', 'Sumardi', 'DANA', 'Rejected', '2023-08-09 12:11:23', '2023-08-09 12:11:23', 'Deposit', NULL),
(378, 228, 50000.00, '2023-08-09', 'Jakatbatara', 'DANA', '085255500570', 'Sumardi', 'DANA', 'Approved', '2023-08-09 12:47:57', '2023-08-09 12:47:57', 'Deposit', NULL),
(379, 229, 100000.00, '2023-08-09', 'perjaka88', 'DANA', '082363839292', 'ANIS SORAYA', 'DANA', 'Approved', '2023-08-09 14:28:47', '2023-08-09 14:28:47', 'Deposit', NULL),
(380, 235, 20000.00, '2023-08-09', 'Agusrahayu', 'DANA', '081255439817', 'Suriani', 'DANA', 'Rejected', '2023-08-09 16:08:02', '2023-08-09 16:08:02', 'Deposit', NULL),
(381, 235, 50000.00, '2023-08-09', 'Agusrahayu', 'DANA', '081255439817', 'Suriani', 'DANA', 'Rejected', '2023-08-09 16:22:01', '2023-08-09 16:22:01', 'Deposit', NULL),
(382, 237, 50000.00, '2023-08-09', 'Bandit662', 'DANA', '081317047500', 'Nurdian nurdin', 'DANA', 'Approved', '2023-08-09 16:44:59', '2023-08-09 16:44:59', 'Deposit', NULL),
(383, 240, 750000.00, '2023-08-10', 'Manuel90', 'GOPAY', '081617823364', 'Riyan ', 'GOPAY', 'Rejected', '2023-08-09 17:19:50', '2023-08-09 17:19:50', 'Deposit', NULL),
(384, 240, 750000.00, '2023-08-10', 'Manuel90', 'GOPAY', '081617823364', 'Riyan ', 'REKENING', 'Rejected', '2023-08-09 17:21:43', '2023-08-09 17:21:43', 'Deposit', NULL),
(385, 241, 100000.00, '2023-08-10', 'Lasita99', 'BCA', '8907030258', 'Liza arsita', 'BCA', 'Rejected', '2023-08-09 19:00:57', '2023-08-09 19:00:57', 'Deposit', NULL),
(386, 243, 150000.00, '2023-08-10', 'manobrako', 'DANA', '082362829491', 'RISMAN ABIGAIL', 'DANA', 'Approved', '2023-08-10 04:51:28', '2023-08-10 04:51:28', 'Deposit', NULL),
(387, 243, 150000.00, '2023-08-10', 'manobrako', 'DANA', '082362829491', 'RISMAN ABIGAIL', 'REKENING', 'Approved', '2023-08-10 04:52:39', '2023-08-10 04:52:39', 'Deposit', NULL),
(388, 244, 58000.00, '2023-08-10', 'papahgila88', 'LinkAja', '085641825018', 'hanifatul afifah', 'LINKAJA', 'Approved', '2023-08-10 05:50:52', '2023-08-10 05:50:52', 'Deposit', NULL),
(389, 245, 50000.00, '2023-08-10', 'Nadila', 'DANA', '085346365100', 'Nadila', 'REKENING', 'Approved', '2023-08-10 06:08:36', '2023-08-10 06:08:36', 'Deposit', NULL);

--
-- Trigger `deposits`
--
DELIMITER $$
CREATE TRIGGER `after_deposit_approved` AFTER UPDATE ON `deposits` FOR EACH ROW BEGIN
    IF NEW.status = 'Approved' THEN
        UPDATE users
        SET balance = balance + NEW.amount
        WHERE id = NEW.user_id;
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `deposits_history`
--

CREATE TABLE `deposits_history` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `destination` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL,
  `status` enum('Pending','Approved') NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `deposit_approved`
--

CREATE TABLE `deposit_approved` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `destination` varchar(255) NOT NULL,
  `amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `deposit_progress`
--

CREATE TABLE `deposit_progress` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `destination` varchar(255) NOT NULL,
  `amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_logins`
--

CREATE TABLE `failed_logins` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `count` int(11) NOT NULL DEFAULT 0,
  `last_failed_login_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `login_history`
--

CREATE TABLE `login_history` (
  `id` int(12) NOT NULL,
  `user_id` int(12) NOT NULL,
  `username` varchar(50) NOT NULL,
  `last_login_ip` varchar(45) NOT NULL,
  `login_time` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `maintenance_settings`
--

CREATE TABLE `maintenance_settings` (
  `id` int(11) NOT NULL,
  `maintenance_mode` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `saldo_edit_history`
--

CREATE TABLE `saldo_edit_history` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `old_balance` decimal(10,2) NOT NULL,
  `new_balance` decimal(10,2) NOT NULL,
  `edited_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `edited_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `username` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `transaction_type` enum('deposit','withdraw') NOT NULL,
  `transaction_time` datetime NOT NULL,
  `status` enum('approved','pending','rejected') NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(55) NOT NULL,
  `telp_no` varchar(55) NOT NULL,
  `bank_name` varchar(10) NOT NULL,
  `fullname` varchar(55) NOT NULL,
  `acc_no` varchar(55) NOT NULL,
  `level` enum('admin','user','superadmin','') NOT NULL DEFAULT 'user',
  `status` varchar(10) NOT NULL DEFAULT 'Aktif',
  `last_login` text DEFAULT NULL,
  `last_ip` text DEFAULT NULL,
  `device` text DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `token` varchar(255) DEFAULT NULL,
  `balance` decimal(10,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `telp_no`, `bank_name`, `fullname`, `acc_no`, `level`, `status`, `last_login`, `last_ip`, `device`, `updated_at`, `token`, `balance`) VALUES
(35, 'dekils', '$2y$10$KtOrizxRWVgUffaXwFNpC.oRvhZ7Ne45Wej7wexlnOoQD8KiwBfDS', 'loli@gmail.com', '1234567890', 'BCA', 'LOLI', '1234567890', 'superadmin', 'Aktif', '10 Aug 2023 12:51:09', '114.142.175.42', '', '2023-07-24 06:51:22', 'f72067ad155ef99e3b34c8524e2cf724a12751dc9ccb010b312e3b725612d3b7', 2200000.00),
(154, 'dekils2', '$2y$10$9.f7WGTE3NIS6RSGFRrWA.E/nn0tbo/ffygVnNASmDq.8JLKeEQBO', 'kudawdawnbenen@gmail.com', '512512125152', 'Mandiri', 'dwaawddawawd', '15512251512', 'admin', 'Aktif', '29 Jul 2023 08:36:59', '36.71.83.222', NULL, '2023-07-29 00:32:15', '8b1a5de8c589479c3a4199beacfaebec9b8bce7d6aa5ff18c34936e8199418c2', 3000000.00),
(155, 'pay4ddemo', '$2y$10$zpD4XsqQzFgrpSPxhzN4u.K./.B1SMWu3NR72FJ3zTUmBbLE0mbYC', 'pay4d-demo@gmail.com', '123456789', 'BCA', 'DIMAS WAHYU SAPUTRA', '123456789', 'admin', 'Aktif', '29 Jul 2023 10:44:59', '114.4.213.233', NULL, '2023-07-29 00:40:27', '5e105353cd7110ca147c1144bd16b5166159fba71fffe0a76e5ff619e74ac703', 0.00),
(156, 'admin123', '$2y$10$7iofSaqgprfX358XABc26.R3fIL8W3A1hf2soePzIygZcpsBIu7CC', 'bbayek947@gmail.com', '0875446464', 'BCA', 'Bela Saputri ', '6290381709', 'user', 'Aktif', '29 Jul 2023 11:40:08', '114.4.213.233', NULL, '2023-07-29 01:37:13', '801feeaa17ef60d4baf5be3d0b3301a484fde1a31feb506aa488a9fd0d804ebb', 100000.00),
(157, 'admin1', '$2y$10$kI/lI61B6S0IO12w/GQcIO/XGTrRQZDtXAcCCvMwNUOI5Lk3PMDWq', 'onefireff789@gmail.com', '08579494642', 'BCA', 'Tuty', '6290381767', 'user', 'Aktif', '29 Jul 2023 11:44:18', '114.4.213.233', NULL, '2023-07-29 04:40:50', '958cb58a49bad9aa4ca4611227eb0d84b59dfd28c77c4e8c69e653bfbb6d9861', 1000000.00),
(158, 'memek123', '$2y$10$SJ56xMpScUeJEoWClhrU.e8GfBwodG8k7QdGhvzT0GdiAGcAedRhq', 'efendicaem20@gmail.com', '08579494646', 'BCA', 'Neneek', '6290381768', 'user', 'Aktif', '29 Jul 2023 11:45:10', '114.4.213.233', NULL, '2023-07-29 04:45:05', '23ca3896392db5e898c66edd3fa3878fd29828e317c2c4d99a4634304ab7220b', 0.00),
(159, 'Endoo123', '$2y$10$yEhjDOrs0rSNkcz4/UPqPeKmBVUOduAYFuwB8xHaE/COj8uiM0zTy', 'andritoseven07@gmail.com', '08956483335', 'Permata', 'Kepilu', '08988891332', 'user', 'Aktif', '06 Aug 2023 03:32:31', '116.206.15.15', NULL, '2023-07-29 04:47:59', '01f5f8d8e7f81438e13df1421702843e49a7b10c863e1b8013dfbe91e70a5fcb', 100000.00),
(160, 'Hasan09', '$2y$10$mvH5bZ1NnCDDGKPgll2h1eRGeEvsHppDxhFxa/dXB1Uax9Tndd4MW', 'hasam09@gmail.com', '085643494645', 'DANA', 'Hasan', '0837374747474', 'user', 'Aktif', '29 Jul 2023 11:50:08', '114.4.83.6', NULL, '2023-07-29 04:50:03', '9802060bb2159d8296e1b01dcad08f25cafdb16d0a67f2af4c4c8be03ff2dd4c', 0.00),
(161, 'Yoyokganteng', '$2y$10$JWJimx8ztDE.KAzisqX7S.jDWjxtYFU/9DwG81dLoFwCc2Bhvwtrm', 'ahmadarya2223@gmail.com', '085600564700', 'OVO', 'm. arya sukma Wijaya', '085600564700', 'user', 'Aktif', '30 Jul 2023 20:58:22', '103.18.232.97', NULL, '2023-07-30 13:58:15', '439cf9a4ac4820ec9d8e6471a81c66a3d9484d2ab7f9ea459f3bfec7fa4a6714', 0.00),
(162, 'Prat1337x', '$2y$10$eGiPK3scaVL.QdhzFxEY4OtEO1hwhqmlVWkTEraikH2.7eVFl9Fae', 'abdulhadi776@aol.com', '08233664545', 'BCA', 'Abdul hadi', '2950063098', 'user', 'Aktif', '31 Jul 2023 13:20:16', '180.252.255.187', NULL, '2023-07-30 14:17:02', '3c2238faace4963128e30869d85a47e5a23fe55ce77c4c8991d0f00402150e9f', 50000.00),
(163, 'GABEONE', '$2y$10$w5jOq.x3OHH7T7jROwUDduduzEnqOmgZZjkEll8hddTPGOCEc5ukm', 'ridwanpanggaban@gmail.com', '081318447922', 'DANA', 'Muhamad ridwan panggabean', '+62 813-9961-1097', 'user', 'Aktif', '30 Jul 2023 21:31:09', '114.124.205.96', NULL, '2023-07-30 14:30:56', '7b05150c5f69001e313bdf40c9e5ea24e1dc76cd77f943506e8029e0ff201084', 0.00),
(164, 'Sambo303', '$2y$10$OVkXryFcvNcXqSMZ.z1JA.tuEzmvmSFDqDrZEmPPFXzPGWe9b6Qhi', 'nvirda0@gmail.com', '0895603222823', 'DANA', 'Ade ahzabawahdah', '0895603222823', 'user', 'Aktif', '31 Jul 2023 19:10:48', '180.214.232.5', NULL, '2023-07-30 15:05:27', 'a17c038ed28e8ecb76850b03e967f7ee5714a5da511594b7d0ae8207bb176f97', 100.00),
(165, 'Sayangmamah', '$2y$10$1gxVYy2yZRLO5YHCJhq66uFf9El7NDJrHiS1.KdWkp./RWRE75jPO', 'Asep@gmail.com', '087784169827', 'DANA', 'Suryanah', '087871259269', 'user', 'Aktif', '31 Jul 2023 07:47:16', '112.215.226.12', NULL, '2023-07-30 15:24:09', '49ffad03f471ca940bd1ae8f035221668123458c0acd853d247407b05d66a5e5', 100000.00),
(166, 'Udel168mil', '$2y$10$0DXmuQpeSAxzZ1/I4Y.ctuStHk7EIcCxFZgJ7OFm49Ytu/le1QNvm', 'udel14.technopower@gmail.com', '085389756916', 'BNI', 'Udy Masudy ', '0884329992', 'user', 'Aktif', '30 Jul 2023 22:37:45', '114.10.68.60', NULL, '2023-07-30 15:37:37', '181bdc4dee3be56bef51cea57eef643cd3ede7674dfc0fc15fa96597ce73defc', 0.00),
(167, 'Anndee', '$2y$10$lO/sb3Bb/halAtno4FMaledIn8klTzERYL6WMAZJfNCSaec3ZEode', 'andirimantiasto@gmail.com', '087771333332', 'BCA', 'Andhi Rimantiasto', '7610964065', 'user', 'Aktif', '30 Jul 2023 22:52:39', '66.96.225.103', NULL, '2023-07-30 15:52:06', '32666267b6aa3652538cd28e0312ab3b52d6d0b7d4ae9b6c62b16c5d5b852aff', 100000.00),
(168, 'Wageg11', '$2y$10$9G1Sw0HFVsudbhSjCQrObOaSxWlthPMk91VVoUOsipJsofdQPthJi', 'Wageg11@gmail.com', '081295071924', 'DANA', 'MOCHAMMAD SADHAT ARDANI', '085893696502', 'user', 'Aktif', '30 Jul 2023 22:53:02', '140.213.136.108', NULL, '2023-07-30 15:52:58', 'd3b6620b82b486b8b8907c41e72fae52548b5170a3a4275596a0100d87f70232', 100000.00),
(169, 'Adelia11', '$2y$10$eFwndQUefcSkd78ucIwmZONqLR/7kAj4m5l1uDJhWVxJchu6h1OhS', 'Siska900@gmail.com', '081395914850', 'DANA', 'Ramlan', '081395914850', 'user', 'Aktif', '31 Jul 2023 22:20:06', '114.122.104.72', NULL, '2023-07-31 02:37:07', '7190adb98d207b79416f3f79f3e0cc066ee172adada0aece657365a9ee45179d', 400000.00),
(170, 'Borju88', '$2y$10$0RaucvwyXqh7JJ0/2iuvsulp71mIyxGWE3qMnB62Og2uOnW.EO0Sq', 'padangn343@gmail.com', '087898046836', 'DANA', 'Ai Nuraeni', '087898046836', 'user', 'Aktif', '02 Aug 2023 09:42:56', '140.213.142.180', NULL, '2023-07-31 02:38:04', 'f9132163439c049488c20d55aa361f3b04c436e49ea35c8ed75080140229f39c', 100000.00),
(171, 'rpkesuma', '$2y$10$3tmpC2J/mB2pXGI7r3KyIOABsfeen.G39qJjAGq/YrPSUM9jLWm6e', 'rizkyperdana3599@gmail.com', '085213971586', 'DANA', 'RIZKY PERDANA KESUMA', '082211659515', 'user', 'Aktif', NULL, NULL, NULL, '2023-07-31 02:54:14', NULL, 0.00),
(172, 'Kopi168Jp5Jta', '$2y$10$hcaZ6Gz16XSwproL/12OE.5WEY35lmJLC2FBHp0Nc18TdYDwahMau', 'yoyogokil08@gmail.com', '082138540583', 'DANA', 'Djamila', '081528448286', 'user', 'Aktif', '31 Jul 2023 23:11:54', '140.213.67.72', NULL, '2023-07-31 09:31:25', '818b8f35f1747cccf66c5cac794468331e796092dd44305dcc997a5563fc0061', 100000.00),
(173, 'Kuyabalap', '$2y$10$uu9LUHwWm1MktwP9eQIuzeoHcyXONBE1oCH4GatWNr0vs5p9mJ/5W', 'Kuyajajasudrajat@gmail.com', '085314918928', 'DANA', 'Jaja sudrajat', '085314918928', 'user', 'Aktif', '31 Jul 2023 20:59:03', '114.122.74.74', NULL, '2023-07-31 11:23:00', '09619b1d8e60fd61f43a0d011c6b7acc89387b3025d1063373850964c69abc6e', 0.00),
(174, 'Vascal71', '$2y$10$BuVz6IXkXRaceUp7GH0iteGvJzhhragSLc1mfRv/qImKT.D2RgLMW', 'Anew@gmail.com', '0859131432914', 'DANA', 'ADITYA AGID NUGROHO', '0859131432914', 'user', 'Aktif', '01 Aug 2023 00:01:06', '203.190.115.190', NULL, '2023-07-31 17:00:57', '95433a7b4d6a59a41beb611a7cac3639cae1a5955f7148d63cd3f42ebd9bb9d3', 0.00),
(175, 'jadijp123', '$2y$10$y77AqptNGE8CPL/z1Mhsju2Th4NNaYyIM2XZ0UqIbZy198xkUBG4m', 'lebongjk@gmakl.com', '085609230010', 'DANA', 'SUSANTI', '085609230010', 'user', 'Aktif', '01 Aug 2023 12:12:17', '120.188.39.251', NULL, '2023-08-01 04:44:45', '5515556a46e4f52be80b004a51f402b3f1370e8d9796546abc66e7a669100ef8', 200000.00),
(176, 'Ridfiq11', '$2y$10$G.WgPzoJ8VvkiPOXOcKKNeo8CGjwUYsl1Z9noXF42lkvBcCOVRC.i', 'Ridfiq11@gmail.com', '087956535', 'BCA', 'Fiqri hasan ridwan', '2280246711', 'user', 'Aktif', '01 Aug 2023 20:06:36', '120.188.64.230', NULL, '2023-08-01 06:07:30', 'f6cc5ee704c5bf0b2d8c9cebbaaa45c7fb53bd13c39eac039bc5d900df0363fa', 0.00),
(177, 'Petrix77', '$2y$10$czHd4UXNc6OTaZaHVt9L3.Gqa9eXVuuVTw8Pn6b7fWXmM7Y2.ml6q', 'Maperta04@gmail.com', '083173375803', 'DANA', 'Yosef apriyansa', '085213929349', 'user', 'Aktif', '01 Aug 2023 16:06:42', '182.1.229.68', NULL, '2023-08-01 09:06:39', 'e68dc75717ea88078587c2aa2a14286637de0612f304f4567955b46708f23605', 0.00),
(178, 'Vheee1212', '$2y$10$/kSn5N4TDRgXfxalPebrm.8Ef5Z2SDwPXS8Pla0I9Gl8KsCUqkLWO', 'Wevhe.vhi122@gmail.com', '085648479022', 'DANA', 'Evi wijayanti', '085648479022', 'user', 'Aktif', '01 Aug 2023 16:44:52', '103.169.39.142', NULL, '2023-08-01 09:44:48', '8206b2d90441d43d1de54e7581652b6c74fbd45fae0a8ee50f423de9c2e8c0fb', 0.00),
(179, 'Fakip77', '$2y$10$xMWXWKGpH69JIq5ZlhRrlOX5D7Vb6IIZGNjNkoSMFv249XGYus/iG', 'ututdeltasj87@gmail.com', '082182352844', 'DANA', 'Mahliadi', '082182352844', 'user', 'Aktif', '03 Aug 2023 08:59:24', '202.67.32.20', NULL, '2023-08-01 10:17:48', '9f5ea3fb7f39c64d3b1484e5292cb154a7783b809caf96a27692b45c3200524f', 0.00),
(180, 'Haya64', '$2y$10$BhFWQyIIa0/g2zjh.JecrulUFgl2/dB8dwFige8taR6wlec9thCTG', 'JAjajaajwj@gmail.com', '082182772844', 'DANA', 'GAgah', '082182772844', 'user', 'Aktif', '01 Aug 2023 17:36:18', '202.67.32.10', NULL, '2023-08-01 10:36:13', '3d900f9ef11f3dae791c2490ddb6cdf682f2a8d5e265fbd45157b24fe83b06b4', 0.00),
(181, 'Markas38', '$2y$10$xOdutkR.cNkZkLW/YHSGvutPJC5NViVK2vPmYx32n1mvX/1llfJQO', 'rizkimaulana101nn204@gmail.com', '085864646464', 'DANA', 'Rizki Maulana ', '0858363737838', 'user', 'Aktif', '01 Aug 2023 22:40:34', '120.188.93.21', NULL, '2023-08-01 14:39:42', '027dfb4f5267efc331dd3dc1824236518e53538e5a8f43fe45ffaf78f707d5dd', 0.00),
(182, 'ulanncantik99', '$2y$10$PrzK8xHA.sOlnjMs7qfT4eRZVexQY2gThihvmgwz/0GDQb7gI2Y26', 'pandawaslot99@gmail.com', '0822667946454', 'DANA', 'WULANDARI ', '0822628363823', 'user', 'Aktif', '10 Aug 2023 11:47:54', '114.142.175.36', NULL, '2023-08-01 23:07:08', '75077f247ba4111a957cf996ae26015279af61423cb142730654600d68a87bb9', 2834000.00),
(183, 'optimiswd99', '$2y$10$gaDW9FbJFAuDC6SFzpF6MOzRhzwB3jaLgd1QtmXtgA6fzzlFLfzeK', 'bebaswd@gmail.com', '08312404244', 'DANA', 'krisna aji saputra', '083147239056', 'user', 'Aktif', '02 Aug 2023 10:25:01', '140.213.164.228', NULL, '2023-08-02 03:24:57', '7eb117b69087fbf4c8a7bfa22ed3bb7543f402720601bf2f3109ddac7c452d00', 0.00),
(184, 'Gantar', '$2y$10$tM0gXUtR/6F3dLEXMa4KDOwHDtRuDxlDz.WG5QNXgK2yF26XYc6Ja', 'gilabaedong@gmail.com', '087847472130', 'DANA', 'Neni anggraeni', '083850901555', 'user', 'Aktif', '03 Aug 2023 08:19:47', '180.252.18.183', NULL, '2023-08-03 01:19:34', '2d19daa3596ebab9ee2972311c52bf7d9dd5afdbfd75bf269ef47eb5ba7c40fa', 0.00),
(185, 'Milky22', '$2y$10$uZ7P8RgCKizHsKhwdgLO9.dv8j7SDcAXBNP5lDEIhbbsTd62Yq39O', 'arioyudanto6909@gmail.com', '085893999495', 'DANA', 'Ario yudanto', '085893999495', 'user', 'Aktif', '03 Aug 2023 08:29:30', '120.188.37.4', NULL, '2023-08-03 01:29:24', 'c3a4b5a6d59e2d186d7a8e2b0aaaf3a56cd85a3a0601fc39b819488018ac4b30', 0.00),
(186, 'Brewok12345', '$2y$10$8NNi5UKZsN0QLaHkyDyzteCmYXblycKXCVlmq5q3UKf3to4QCgg0.', 'okebmkk@gmail.com', '081398265673', 'DANA', 'Hudin pridianto ', '081398265673', 'user', 'Aktif', '03 Aug 2023 11:51:28', '114.124.146.149', NULL, '2023-08-03 01:56:32', '6d76c6abe79711095257b776543378b6dc6420408447694231b8bf96f24a413b', 0.00),
(187, 'Bomber12', '$2y$10$yDfiYkyFTBJbpZxNrgBkLuMn2iUC.2RNUUxCdTAn1xRvqlnEiSuu.', 'juliankurniawan129@gmail.com', '08817750591', 'BCA', 'Juliana', '2780651787', 'user', 'Aktif', '03 Aug 2023 09:26:24', '114.79.54.9', NULL, '2023-08-03 02:26:19', '9f4fc3622ca41ac069e592a87daf18570dc2f9704215a44ea960aefe58600962', 0.00),
(188, 'Recehanah66', '$2y$10$hSag0PbbOUJGTQTqLi4UF.P1JtmOS0xXzvEzC.WxxTjRstcYdCdt2', 'Hdkkwjaaj@gmqil.com', '085754432536', 'DANA', 'Rian Gumilar jaya', '085754432536', 'user', 'Aktif', '03 Aug 2023 10:51:10', '140.213.66.143', NULL, '2023-08-03 03:31:26', '5ecca904300ebb1428e7b3c69162d4490503e1a7de3a36be5b39cb5f9f6c524b', 0.00),
(189, 'Yola09', '$2y$10$3i7oiwGqiZqLF7CENxEO6.Ywi55IoyDmV11ZD5Z8jP24EhNJm7Z2q', 'Anjingedan67@gmail.com', '085871179240', 'DANA', 'Yolanda rahman', '085871179241', 'user', 'Aktif', '09 Aug 2023 23:34:16', '116.206.15.17', NULL, '2023-08-03 04:08:46', '0ee5c51d8d40148b7b62d656f6e039db00da5845e9af458b33faac349bdb73de', 100000.00),
(190, 'Degel88', '$2y$10$ge7zIeGeBb8Dh5.ZsWs0ze/sfFMBmDWVaDIWSs4pw0ShBDR07JVzu', 'hendramame2@gmail.com', '085600439896', 'DANA', 'Hendra rahwanto', '085600439896', 'user', 'Aktif', '04 Aug 2023 09:20:10', '114.10.4.34', NULL, '2023-08-03 07:53:54', '1c5be99cc43c7119ec4d6d0e8684e167be96e8b167d652988cb02924bfd597d0', 100000.00),
(191, 'Fadril', '$2y$10$u6V/JMjhEct0bHI2C0DaTukdftFI.lKudBK0cpu7drWbp2lcA6IWe', 'fadiloding07@gmail.com', '085772618603', 'DANA', 'MUHAMAD FADRIL ALAMSYAH', '08561868337', 'user', 'Aktif', '03 Aug 2023 17:44:32', '114.4.212.142', NULL, '2023-08-03 10:21:36', '983b84b782ccd53a2683930dea344725c6448fe5df7bbcb3514441bf1202296a', 0.00),
(192, 'herdianvip', '$2y$10$huA61AIWyXyT1guiRns7R.cX8TeCaI8o5v9qtEtFJIaIj5XAG8VCq', 'herdiang@gmail.com', '64649488797', 'DANA', 'Lambang Herdian w ', '087830737724', 'user', 'Aktif', '03 Aug 2023 20:05:58', '36.73.33.148', NULL, '2023-08-03 10:31:35', '7a3d1bd599169a43cb957f58d34549f8e51118745b889b0926e024286b7d543e', 0.00),
(193, 'Omboy123', '$2y$10$qGYDqXrkcTjNUTzcSGSecOI.qPNflcTBi9D4RhNVvwO7QLbblLcGa', 'Ares8888@gmail.com', '083124758690', 'BRI', 'Lilis maryati', '368301006996535', 'user', 'Aktif', '03 Aug 2023 21:23:49', '116.206.14.16', NULL, '2023-08-03 11:15:19', '0c26b16bd214175a5e8fa5e6816c65fd3ed0264bb0b0e8ad9c91cfdc99d6ab2f', 0.00),
(194, 'Bondol88', '$2y$10$aAfC4ywfLLJGsfAH16cUz.DRV6w2fADat1ITnXT30A5vIS.Wgwrx2', 'Siti6666@gmail.com', '085124369587', 'DANA', 'Wardi', '081224450753', 'user', 'Aktif', '03 Aug 2023 18:17:59', '116.206.14.16', NULL, '2023-08-03 11:17:53', '570b155a46cb51c93918eb6c2370cbe47665b686d50a25b8540b4e82cef28812', 0.00),
(195, 'Sempak4d', '$2y$10$0f5HyTNiyaSz/4mZqPbmhu3fXp0yxqWvT9/6swCjJpANX29qCEKLW', 'mamansaputra1101@gmail.com', '085719276564', 'BCA', 'Maman saputra', '7820414025', 'user', 'Aktif', '03 Aug 2023 23:05:37', '120.188.67.249', NULL, '2023-08-03 11:46:36', '392cc4835b244fbb5c65d3d3a714c14ef81438ba86d3b2bb94b20a885ec531b6', 0.00),
(196, 'Sopyanjp', '$2y$10$M8isYm9EDj1AyqwL1euYd.KQ6Uy8EEdHRDKQsCBABKwQnLvK2JKhq', 'Sopyanjp@gmail.com', '082118632088', 'DANA', 'Sopyan', '082118632088', 'user', 'Aktif', '03 Aug 2023 18:53:15', '114.4.212.142', NULL, '2023-08-03 11:53:11', 'f2ddfb53c571e37190a9abad814bbc0702f39dee2ee558250aa68068b429f11a', 0.00),
(197, 'Supongge31', '$2y$10$XmkaOA5m2njLtJud7gfA/OSqBaKRL34JYU1afFatwT1gJYzU3am.6', 'Sepong86@gmail.com', '+62 812-3707-1424', 'BCA', 'Aditya prasetya utama', '3570547924', 'user', 'Aktif', '03 Aug 2023 19:05:06', '121.121.166.20', NULL, '2023-08-03 12:04:58', '8d2b75f692b697ef1c1697c3237a23d5e418457f7c6e75256b1ca54366c9c074', 0.00),
(198, 'Fahmijp', '$2y$10$fT3gzeLu6NvvJEHjy9w81Osg3JfgCm6GfuWNQNDQN2iHqKbGg5Qje', 'Fahmi@gmail.com', '085714994431', 'DANA', 'Ari wibowo', '085714994431', 'user', 'Aktif', '05 Aug 2023 17:12:15', '140.213.164.62', NULL, '2023-08-03 12:11:58', '6d2ac031af3e714c4897848ec9fa9bdd3f9ff5bd8eb4bee0f966c94ddae0f18e', 118000.00),
(199, 'Wijang77', '$2y$10$daHmGDtOjlstlvkQG1MyPOLIKUrghOCQIuOUfiXgtmg8Cot.KstF2', 'wijangprasetya5@gmail.com', '081333779151', 'BCA', 'Dody Wijang prastyo', '2650517655', 'user', 'Aktif', '03 Aug 2023 19:18:54', '182.1.90.210', NULL, '2023-08-03 12:18:48', 'f4e5ade426acd38f1bcb5212accdfa3e13736d0a5179fb3a5a17117f66916b1c', 0.00),
(200, 'Ais0702', '$2y$10$1rN8itpU7BOyNNm/bTj6o.pXPna61Rn957UIIATOBTLyes6gQNjW.', 'didikarif04@gmail.com', '085609580967', 'OVO', 'Didi arif', '085609580967', 'user', 'Aktif', '03 Aug 2023 20:31:39', '36.76.232.127', NULL, '2023-08-03 13:31:34', '9947d3e72db2a7bc3070775667e61992e0eaa33532e678d4634fab75b88631e2', 0.00),
(201, 'Tuti86', '$2y$10$Z5XlpV.tcwuqoaknu8T74uTFAooz5USUDlrRt9W2jwyxHFfigX5ju', 'kimungkz7@gmail.com', '089649913187', 'Mandiri', 'Tuti Burhanudi ', '1300023269736', 'user', 'Aktif', '06 Aug 2023 20:14:11', '180.244.139.144', NULL, '2023-08-03 14:16:47', 'ad88b3616f6cbc33e3228944128d0ef7c5c304103ef974d76a2ecf4000e99763', 0.00),
(202, 'alberth', '$2y$10$j/BC0ZDDA60Q2OhNyK3YiegOvxSQb81Pb3XnNcGQp9Ogqhj0ulZwa', 'peacedidok83@gmail.com', '082146880031', 'BRI', 'juniati rosalina hun', '361901024038534', 'user', 'Aktif', '03 Aug 2023 21:30:13', '182.3.200.73', NULL, '2023-08-03 14:30:09', '8b31b9a892b581a9c29c097c378fd519365fc6e307ee28788697a9ce4e5c3b78', 128000.00),
(203, 'Srijp66', '$2y$10$/cA2VWDhZr1m71QfglpvVeP3OoQUuqnQhYm0/IcXSeVAkyS.ohQ5W', 'bobonsantosogilo@gmail.com', '085794645484', 'BRI', 'Sri purwanti', '685301001358502', 'user', 'Aktif', '03 Aug 2023 22:51:28', '114.4.212.142', NULL, '2023-08-03 15:51:23', '59e0fe5d263268b2a9a1cb225efda29b934468724984f5c394019c85c2f66515', 0.00),
(204, 'detik14', '$2y$10$GHBLy1hcE1uP.leLFuUCtu3MXRrBZ./QGJOdjfNz88T03zuTROyWW', 'iwatsaputra157@gmail.com', '082144844432', 'DANA', 'iwanto', '082144844432', 'user', 'Aktif', '04 Aug 2023 08:14:57', '120.188.67.77', NULL, '2023-08-03 16:24:45', 'c61e38be55ae759632d4baad53ca7fdda638a2167f04e79cc52f9ce0f7085f18', 100000.00),
(205, 'Jonggol44', '$2y$10$yMIMNW.hIZMfcx.IBVqh.eH5D59Cf5xkpKLci0vQI05WGzD9enxDO', 'sahrul@gamil.com', '089649751222', 'BCA', 'ARYADI ', '5280468543', 'user', 'Aktif', '04 Aug 2023 00:22:28', '180.252.254.171', NULL, '2023-08-03 17:22:19', 'cd741bd5b25716b98d23bd263505456aa87fef0b0b14faec559917dab0341b34', 100000.00),
(206, 'gasjp99', '$2y$10$bD/xqsXuktepf1WgCwsS9uXjezTPN7RDE/M/fMkK8f6/5DSwi.IJW', 'suprianto180490@gmail.com', '085841121259', 'DANA', 'suprianto', '085841121259', 'user', 'Aktif', '06 Aug 2023 14:25:06', '114.4.215.130', NULL, '2023-08-04 03:38:06', '69ec7921933a9bd8f7d03d014d0449ef11f55ce48fd34d8713bb8d10dca0a6ba', 100000.00),
(207, 'Amasaepudin', '$2y$10$bEKngabaTAqJQyHsNptFGeACK5v7KoWx1YjgU6W1RsVaYUZeo0QPa', 'titamulayani@gmail.com', '085692295701', 'DANA', 'Tita Mulyani', '083806882209', 'user', 'Aktif', NULL, NULL, NULL, '2023-08-04 04:05:55', NULL, 0.00),
(208, 'Atepdindin', '$2y$10$DmMLNpMP9XiYC.7w0eW2LulcKAU0jXdTFr/yBTOoVm409F7AqvvB2', 'Atepdindin833@gmail.com', '085861548226', 'LinkAja', 'Atep dindin', '085861548226', 'user', 'Aktif', '04 Aug 2023 11:06:58', '114.5.209.210', NULL, '2023-08-04 04:06:54', 'd7b4b2be55b6d44f0e6282f8a062478e0c63dd96fb547d650f74b44d43a6fa4d', 0.00),
(209, 'Harisbudiawan', '$2y$10$pMqsIgLXVpoJwadHzEIVzenLV6zPQQMClDybvLhaZlfStaunJtpju', 'budiawanharis8@gmail.com', '083869814240', 'DANA', 'Haris', '083869814240', 'user', 'Aktif', NULL, NULL, NULL, '2023-08-04 04:28:42', NULL, 0.00),
(210, 'Allinxs777', '$2y$10$TlJ4hsl7S1cyzN0QRB.Cme.WNtDugpmj/oguShKfw7QhVBmL1u8cO', 'iam777@gmail.com', '08575225544', 'DANA', 'Ilham iskandar ', '085703012762', 'user', 'Aktif', '05 Aug 2023 02:49:43', '114.5.251.34', NULL, '2023-08-04 05:27:48', '9ba9f171689810e3e824373356a84418ecde7aa187bfd17b16f9024a6b4c2b9c', 0.00),
(211, 'Jpkampang', '$2y$10$SzkKLeJiSJNJAnfjsRfAzO24CtnCk7IUz8t2BVw49Xacntkdh6S0m', 'aryadizazg@gmail.com', '0895420975680', 'DANA', 'Andri kurniawan', '0895420975680', 'user', 'Aktif', '07 Aug 2023 06:44:19', '202.67.42.24', NULL, '2023-08-04 09:07:01', '698146e208b9ec81be24ba35d0b48c86f96d4b3e1aa60ee0fad98d36233aa636', 100000.00),
(212, 'Sayangku888', '$2y$10$q22pxlwjTGFftsTlJv/aIew7VXEhEemToSRVQkEwgla//cJqB1F7K', 'Inipapap116@gmail.com', '083102127258', 'DANA', 'Anggi Prayogi', '083195554904', 'user', 'Aktif', '04 Aug 2023 20:46:54', '140.213.102.198', NULL, '2023-08-04 13:46:48', 'dcd9b8a3f67ab07602964c8f26dd0a6fcf4b01c77f35fda7b3756840bca80bf4', 0.00),
(213, 'Joker168', '$2y$10$knH7FdmcBZiwIDb52jdDye9vQV3a/Q1IwPUeX89h//0rTo6kieeiO', 'Bungtomo33@gmail.com', '083819890504', 'DANA', 'SAIDI', '083853720441', 'user', 'Aktif', '04 Aug 2023 21:00:04', '120.188.32.243', NULL, '2023-08-04 13:59:54', '0e1da8bd7db4a2d21d7eb4f44cc0fc911019ee2e3123ebc81a5df0cd741b8726', 0.00),
(214, 'Asdfghjkl', '$2y$10$IE7XInZuXWI5byM2rIl9j.lqL8a21jDw/ot7Z6gjneYYT60G.dudG', 'hattjarr@netnot.site', '08956321057', 'DANA', 'ASD', '085714711286', 'user', 'Aktif', '04 Aug 2023 23:37:02', '180.254.73.254', NULL, '2023-08-04 16:36:54', '00dc21827d26ded3a311b4c7b4a34cc9fe1cafacd4ec708894183812549eb193', 0.00),
(215, 'Milkyway168', '$2y$10$EZ0/KGTpUa6QDe52MTwcXO.Wgtf2ZTemrRL1r28esNBYB.YU4sAo2', 'hendri.zall1409@gmail.com', '085271718423', 'BCA', 'Hendrizal', '8135410612', 'user', 'Aktif', '05 Aug 2023 09:30:01', '182.1.7.253', NULL, '2023-08-05 02:29:51', 'cdb1e67dab3eaf4eacc8e80047b4643d6b0fb20bc82680281cec4acce640859e', 100000.00),
(216, 'Kargo20', '$2y$10$yYRmf8SjngKbVwJiPd3VSuLeRs1Ck/DboiROzCvlURbyQ5uFBPbjC', 'Myceble1705@gmail.com', '083108325861', 'DANA', 'Taopik permana wijaya', '083108325861', 'user', 'Aktif', '05 Aug 2023 10:27:27', '110.137.194.172', NULL, '2023-08-05 03:27:22', '26ead8bba802ef68b248f96378aebbe7c62f2420d2f37154c004751319dee68c', 0.00),
(217, 'Jendolhoki90', '$2y$10$wkqYsIAvIpbPZqgzTv6xu.rLmVeZqhG4Vzvj0iJ8MsPT7SLWrnsGS', 'doljendol72@gmail.com', '081586886467', 'BCA', 'Dicky Saputra', '8831725338', 'user', 'Aktif', '06 Aug 2023 13:40:40', '114.10.119.210', NULL, '2023-08-06 06:40:36', 'dfe1eb4ba827cd663517a413ca7ebc85f4d90643ec538e61f040cd71f341d2a8', 0.00),
(218, 'juragn', '$2y$10$MD7m6zs/8tyDH2YTqw.Lwe51teyJ3vuStI0Zn9f8p49vIq9Oy..7K', 'masjopret18@gmail.com', '085635123478', 'PANIN', 'hgksnsvxu', '0856743829384', 'user', 'Aktif', '06 Aug 2023 14:27:51', '114.4.215.130', NULL, '2023-08-06 07:27:47', '060f41ddd8a6a95b9392bb4d1ddd5e3d51c4b0058e9720abc1d85b7590697ee3', 0.00),
(219, 'Lionelisak2', '$2y$10$KapL3Sr/RhnFasX9S9dl.OYB4MQ9yjqR5hYn71TjRLozT1jH84KdK', 'samrestahya@gmail.com', '085254433442', 'BCA', 'sami delon tahya', '0661710671', 'user', 'Aktif', '07 Aug 2023 12:23:53', '182.4.5.218', NULL, '2023-08-06 11:38:28', '3ce77684c781cf3a1a5141ade2338cdcfc41642459784ca9db3f327cb1dc5b36', 0.00),
(220, 'Uwong168', '$2y$10$keqNXAxi7kVxSaj7iZbaW.LUnU6rGOsqBtD6IjhFmgjT5TiRroByq', 'akinbokies09@gmail.com', '085888695802', 'BCA', 'Zainal muttaqin', '5850329801', 'user', 'Aktif', '06 Aug 2023 23:08:43', '120.188.5.206', NULL, '2023-08-06 15:11:22', '846d1c944acb18a1f0940bbfe21f834b67d9ee47adf2eb0be42cf68905649595', 50000.00),
(221, 'Ruly78', '$2y$10$cod3xatvovO.YCKzUPJRgeScMZ/93I/jqlvQ867fJRYxP/ekgnAwC', 'Yukichishady@gmail.com', '085782587455', 'DANA', 'Ruly Amarulloh', '085782587455', 'user', 'Aktif', '10 Aug 2023 10:10:21', '114.5.208.153', NULL, '2023-08-06 20:56:26', '624cd880652ffa22f995ed1a2be71f183bcb2b44c6d42c66577e23156400ca99', 50000.00),
(222, 'takalsamlong', '$2y$10$guPliW.7no/6owGzBknSPel7KZKCN2iMjMPpzqTGJDIZcBdbKXGt6', 'yoga808yy@gmail.com', '087721359631', 'OVO', 'LILIS', '085820243378', 'user', 'Aktif', '07 Aug 2023 20:30:24', '114.5.102.25', NULL, '2023-08-07 13:30:20', '24bf9820af31935e589ad0cd5bcf171a94360e5a1cf40a852d19e5aed68adc41', 0.00),
(223, 'Iksan666', '$2y$10$ckaRYcHy4obJa6r/Bt40Ne40dr/bbBw0GhV.0rZrUISgiPM4i31bK', 'Iksankecap@gmail.com', '081336639802', 'BCA', 'Rochmad choirul iksan', '6670628203', 'user', 'Aktif', '07 Aug 2023 20:58:14', '180.251.111.206', NULL, '2023-08-07 13:58:06', '41f3d08bffcbffb212f94838e5e846db79f6a4c980a8da7142192be8fcc4449b', 0.00),
(224, 'Bangjun', '$2y$10$ECNHyC.RiIRLjOvo6wqSn.f.zQbgrGDzY1nT3bTWh7/YEeKtCA/Ae', 'bangjun141@gmail.com', '081273660466', 'DANA', 'Junani', '081273660466', 'user', 'Aktif', '08 Aug 2023 20:27:31', '182.1.230.65', NULL, '2023-08-08 13:03:04', '770ff5512399c928fc9141d0666cbee868f2ee833cc0fd91ea1791f5f1c75235', 100000.00),
(225, 'Yusuframadan', '$2y$10$a36RAKsU2h2qaQNKvaMFAuhMfY6EUm6bukz4UBX2fevzgID.RZany', 'yusuframadan949@gmail.com', '082142490159', 'DANA', 'Muhammad Yusuf Ramadan ', '082142490159', 'user', 'Aktif', '08 Aug 2023 23:18:39', '180.251.144.24', NULL, '2023-08-08 16:18:23', '5fd72687e5b20a648acbcd917d932cdbe9f435a395266c19ca0215308386039c', 0.00),
(226, 'shin22', '$2y$10$uCOIyyYngTGNYYm1UpmNDegA1xhKCdA8V7946lyunH3e8wi1Urg52', 'dshintya421@gmail.com', '081545585735', 'DANA', 'shintya dewi', '085822424323', 'user', 'Aktif', '08 Aug 2023 23:44:15', '180.242.215.74', NULL, '2023-08-08 16:44:08', '2ebd6ea9698eeeeed286cfbb0d20f284994fe535ce48031d7929281b1c1226ee', 0.00),
(227, 'penipuawam', '$2y$10$3jBOHVN4Nf3Yt7Y8ciiHfeboYyox87e4Bvm2uiqFNu3PRX/ZiXdDO', 'penipuawam', '848499494979', 'Permata', 'penipuawam', '20929383838', 'user', 'Aktif', '09 Aug 2023 06:15:06', '110.136.54.145', NULL, '2023-08-08 23:15:01', '7aadd825d773e12141e6c786cb197e0598d86514a6761a119ce6497a445d4ef6', 0.00),
(228, 'Jakatbatara', '$2y$10$I1K9DEQ56nRuqjfYJjBbvu39cA4kWkIaVCX.uxUeDGMYN0jz09g5u', 'sumardi@gmail.com', '085255500570', 'DANA', 'Sumardi', '085255500570', 'user', 'Aktif', '10 Aug 2023 06:41:29', '182.2.103.10', NULL, '2023-08-09 12:04:37', 'b12085dc878c1d8021535f89f48aa6d59e29b5c53ff640e9868a51059cd1d371', 50000.00),
(229, 'perjaka88', '$2y$10$P3nML/zZa00cJFsyyKsxmO5fcC6MCR5lMiH4AQ3sIy17kDeeurem2', 'kodoagaiao@gmail.com', '822431976799', 'DANA', 'ANIS SORAYA', '082363839292', 'user', 'Aktif', '09 Aug 2023 22:07:13', '114.142.175.33', NULL, '2023-08-09 14:28:09', '7d0591e1537061ca651c6ebb8dff077f83e7b777d40b6e1d7e5a5aa78f89d809', 0.00),
(230, 'Kadal11', '$2y$10$xc051IeC.Z1TxN5MbZLnBOuh7PwNAd/ptb8MEYqGXTVqpP9egw/Mu', 'ahmadfaris99@gmail.com', '089677552580', 'DANA', 'M APRIL BANGUN', '089675875490', 'user', 'Aktif', '10 Aug 2023 12:36:55', '140.213.15.119', NULL, '2023-08-09 15:03:04', '6c19ed20284dc8daca66f9da61df3e7df5d71c17caba5280eab89e46e8cae76d', 0.00),
(231, 'Ayamayam', '$2y$10$p5AHmI5YQCQVlD4e5GYhneq3pRs1WVxRCgUQguAUmDOqaMTqwcba6', 'Aping1997jkt@gmail.com', '089675785490', 'DANA', 'M April bangun', '089675785490', 'user', 'Aktif', '09 Aug 2023 23:49:04', '112.215.235.105', NULL, '2023-08-09 15:12:22', '8d1836066784454407fe81e3f326b631d5a852f87a339f5fe838d20712508647', 0.00),
(232, 'kopi38', '$2y$10$htrRmt4bmd830K/1jh/Tq.BfFXIvH/XxC4MpiTgRqECxbUZo0GR4S', 'kepo01072@gmail.com', '882006395315', 'Mandiri', 'RIKI DWI IRAWAN', '1330016254658', 'user', 'Aktif', '09 Aug 2023 22:24:07', '103.40.122.129', NULL, '2023-08-09 15:22:58', '399058ddd467ff1be288618f17f71f3141ab4384adcdbce2ccbdc84ddb6e8825', 0.00),
(233, 'Ari122H', '$2y$10$iNoRlvm5bdMD3pqj5WoAf.Ka.1LGEDOLLPQeOLAJhWD6RuG4mbD2e', 'Ari1122H@gmail.com', '0895337141122', 'DANA', 'Ari', '0895337141122', 'user', 'Aktif', '09 Aug 2023 22:25:42', '180.214.233.85', NULL, '2023-08-09 15:24:13', '679048a9b4de61726d5488e9539359055231180663d079ba5dc5e7e78e68b786', 0.00),
(234, 'Aldinata', '$2y$10$Cki4P.35Yp2lV0.ol/dT5ekh0umHS/.ukHqXAdhPLbnn/f1xO2yY6', 'aldinataayoga@gmail.com', '083847599795', 'Mandiri', 'Aldi nata ayoga Hariyanto', '1140025024889', 'user', 'Aktif', '09 Aug 2023 22:42:48', '182.3.100.193', NULL, '2023-08-09 15:42:45', '6d0f10118022b1ec974fc9bf580e1217e774f1289ce0102d7261b2b0e746bcbb', 0.00),
(235, 'Agusrahayu', '$2y$10$/PQCU..RCO0VJQheK2OChu0yNdhge1n6nLq7iV02omhWWa6NtErQS', 'suriani77@gemail.com', '081351630067', 'DANA', 'Suriani', '081255439817', 'user', 'Aktif', '10 Aug 2023 01:25:41', '36.78.203.66', NULL, '2023-08-09 15:49:59', '5d0ff8f8221caf4b78216c6513db5f4fd009d2a110e83b9510165c059964ddf4', 100000.00),
(236, 'Dawam123', '$2y$10$/0zg.WhxHMMVVgEUtj/QY.cw9luFMwiYdu9FkJnI0Bka0GhYGHIpu', 'ekoedisaputro5@gmail.com', '085878571264', 'GOPAY', 'Eko Edi Saputro', '085878571264', 'user', 'Aktif', '09 Aug 2023 23:16:41', '114.10.127.177', NULL, '2023-08-09 16:16:36', '2f3f8f621222d76740a2d81ebe9825f58df9b4db06de148e2583b533fee78eec', 0.00),
(237, 'Bandit662', '$2y$10$YuGp5zHKYMJQYbB6zAu.huFXJWN2rMPSd20DtfHDhOwJzq35FDFg.', 'Nurdian84866@gmail.com', '081253008520', 'DANA', 'Nurdian nurdin', '081317047500', 'user', 'Aktif', '09 Aug 2023 23:58:03', '116.206.8.63', NULL, '2023-08-09 16:42:16', 'cc7b7bd60f20faedeedad37cb4db2fe4852735e58ac2e179c92569ff244cb5db', 100000.00),
(238, 'Beruang25', '$2y$10$iplHQpc/7WwEYOsAMswC.OXxf4Sc9Tk4eubTef2LHJ3Gr6H9tU0mO', 'Agung.santoso@gmail.com', '089610927866', 'DANA', 'Agussanto ', '089537484993', 'user', 'Aktif', '10 Aug 2023 07:54:08', '182.2.143.37', NULL, '2023-08-09 16:49:35', 'a6a81a0d6d089e1b567fa4bb1388b8d5580225ce06d7cc5d236a3583d7656bb4', 0.00),
(239, 'Pangeran77', '$2y$10$AJeS6rc5PhFnIe4ZpTSh4.sIY.XB4jc92dztsg0JfF2BqIU7mc8ju', 'samsam.erlangga@yahoo.com', '08772092089', 'BRI', 'Rumiyanto ', '012201150973509', 'user', 'Aktif', '10 Aug 2023 02:35:29', '140.213.21.154', NULL, '2023-08-09 16:52:24', '638934e44bf7c8c462c4001a1cccbb4682328d67d10056f0aab0215b1a2af62e', 0.00),
(240, 'Manuel90', '$2y$10$c33uSTBjVtvb29T.7ZqhdetyGsC0GMS2Hrgn5TCNGLYfyty57UU3m', 'sangubasi636@gmail.com', '081289229405', 'GOPAY', 'Riyan ', '081617823364', 'user', 'Aktif', '10 Aug 2023 00:18:44', '120.188.35.229', NULL, '2023-08-09 17:18:39', 'ac3874cd8f6a54501814f8e9f12136d262add97acfbc7ab7a6350ee7827fc420', 0.00),
(241, 'Lasita99', '$2y$10$X4r0Ya3M14M/dBponql0Mu2V.WkHmnbo.G0rteb/LNcAEBzKLplG6', 'Lasita76@gmail.com', '085716792031', 'BCA', 'Liza arsita', '8907030258', 'user', 'Aktif', '10 Aug 2023 02:00:22', '103.126.173.201', NULL, '2023-08-09 19:00:16', '5692a28d16ba487e48bcbb39c16020e5d0dabd288a9ed97ebd6730e6505ae2b2', 0.00),
(242, 'Badboy89', '$2y$10$yflCXLnyPlBaqx9xrEVL5.SJpwLPIa4jfz.p/70BnKoXzIcIYBtHW', 'Badboy89@gmail.com', '081253082166', 'DANA', 'Muhamadrafli', '081253082166', 'user', 'Aktif', '10 Aug 2023 09:05:41', '182.3.134.9', NULL, '2023-08-10 02:05:36', 'b1b7d7a45c58b98128d875ba99829aa95879998e82cfcd5836ce2980061b16ef', 0.00),
(243, 'manobrako', '$2y$10$OoJZbP3kP5u3FBZMD3C3BOdJhfLXGyMVS20pfrQogUkDbQZbbBsfi', 'kodoagaiaohdj@gmail.com', '082234949456', 'DANA', 'RISMAN ABIGAIL', '082362829491', 'user', 'Aktif', '10 Aug 2023 12:17:02', '114.142.175.42', NULL, '2023-08-10 04:50:31', '12529a1db4f5b0af881244001e18ae06c4fbee9ceae2563dc4ea3179b53788eb', 0.00),
(244, 'papahgila88', '$2y$10$uEqlLDcs/HfrE/vLzNH10u.jddIsXSy857X1z1pHxnYTjG9oDA/uW', 'andrean09@gmail.com', '085641825018', 'LinkAja', 'hanifatul afifah', '085641825018', 'user', 'Aktif', '10 Aug 2023 13:06:06', '114.79.21.213', NULL, '2023-08-10 05:46:28', 'd36964ac66b18e62c41d20f04d45f49be01f1cf18ef875fbff7e985a27f87f3d', 116000.00),
(245, 'Nadila', '$2y$10$FV130sMMo2AL8n2R13pTz.5fgDVTS/zKPNOriVXTz.sjUfDYmwcg.', 'juanda523888@gmail.com', '085346365100', 'DANA', 'Nadila', '085346365100', 'user', 'Aktif', '10 Aug 2023 13:06:05', '58.147.187.50', NULL, '2023-08-10 06:06:02', '818f70519324f0f5a4dfc686693ccf7386ffee016efd33444c0687b395ba884a', 100000.00);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_activity`
--

CREATE TABLE `user_activity` (
  `id` int(11) NOT NULL,
  `admin_username` varchar(50) NOT NULL,
  `activity_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `activity_type` varchar(50) NOT NULL,
  `activity_details` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_balance`
--

CREATE TABLE `user_balance` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `balance` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `withdraws`
--

CREATE TABLE `withdraws` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `status` varchar(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `admin_action` enum('Rejected','Approved') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `withdraws`
--

INSERT INTO `withdraws` (`id`, `username`, `amount`, `status`, `created_at`, `updated_at`, `admin_action`) VALUES
(143, 'dekils', 10000.00, 'Approved', '2023-07-30 14:10:39', '2023-07-30 14:11:16', NULL),
(144, 'Borju88', 100000.00, 'Rejected', '2023-07-31 03:25:19', '2023-07-31 03:27:35', NULL),
(145, 'Kuyabalap', 100000.00, 'Rejected', '2023-07-31 12:50:01', '2023-07-31 12:51:04', NULL),
(146, 'Adelia11', 300000.00, 'Rejected', '2023-07-31 12:50:21', '2023-07-31 12:53:12', NULL),
(147, 'Kuyabalap', 50000.00, 'Rejected', '2023-07-31 12:53:26', '2023-07-31 12:54:28', NULL),
(148, 'Adelia11', 50000.00, 'Rejected', '2023-07-31 12:54:55', '2023-07-31 12:55:58', NULL),
(149, 'Kuyabalap', 350000.00, 'Rejected', '2023-07-31 12:55:40', '2023-07-31 12:56:56', NULL),
(150, 'Adelia11', 50000.00, 'Rejected', '2023-07-31 12:56:54', '2023-07-31 12:57:55', NULL),
(151, 'Adelia11', 400000.00, 'Rejected', '2023-07-31 12:58:58', '2023-07-31 13:00:34', NULL),
(152, 'Adelia11', 400000.00, 'Rejected', '2023-07-31 13:59:56', '2023-07-31 14:06:56', NULL),
(153, 'Adelia11', 150000.00, 'Rejected', '2023-07-31 14:07:43', '2023-07-31 14:08:50', NULL),
(154, 'Adelia11', 400000.00, 'Rejected', '2023-07-31 15:20:29', '2023-07-31 15:22:30', NULL),
(155, 'Adelia11', 200000.00, 'Rejected', '2023-07-31 15:22:51', '2023-07-31 15:23:55', NULL),
(156, 'Adelia11', 150000.00, 'Rejected', '2023-07-31 15:24:40', '2023-07-31 15:37:46', NULL),
(157, 'ulanncantik99', 2680000.00, 'Approved', '2023-08-01 23:10:50', '2023-08-01 23:11:31', NULL),
(158, 'Recehanah66', 100000.00, 'Rejected', '2023-08-03 03:52:23', '2023-08-03 04:08:55', NULL),
(159, 'Degel88', 100000.00, 'Rejected', '2023-08-03 09:05:55', '2023-08-03 09:07:07', NULL),
(160, 'Fahmijp', 50000.00, 'Rejected', '2023-08-03 13:30:31', '2023-08-03 13:31:33', NULL),
(161, 'Fahmijp', 50000.00, 'Rejected', '2023-08-03 13:49:03', '2023-08-03 13:50:12', NULL),
(162, 'alberth', 68000.00, 'Rejected', '2023-08-03 14:55:47', '2023-08-03 14:58:47', NULL),
(163, 'Fahmijp', 118000.00, 'Rejected', '2023-08-03 15:00:19', '2023-08-03 15:01:29', NULL),
(164, 'Fahmijp', 100000.00, 'Rejected', '2023-08-03 15:19:34', '2023-08-03 15:20:49', NULL),
(165, 'detik14', 200000.00, 'Rejected', '2023-08-03 16:44:43', '2023-08-03 16:48:00', NULL),
(166, 'detik14', 100000.00, 'Rejected', '2023-08-03 17:06:49', '2023-08-03 17:22:32', NULL),
(167, 'Fahmijp', 100000.00, 'Rejected', '2023-08-04 00:15:30', '2023-08-04 00:16:32', NULL),
(168, 'Jpkampang', 100000.00, 'Rejected', '2023-08-04 09:21:30', '2023-08-04 09:22:41', NULL),
(169, 'Fahmijp', 100000.00, 'Rejected', '2023-08-04 14:24:29', '2023-08-04 14:25:56', NULL),
(170, 'Milkyway168', 10000.00, 'Rejected', '2023-08-05 02:47:39', '2023-08-05 02:48:52', NULL),
(171, 'Milkyway168', 100000.00, 'Rejected', '2023-08-05 02:49:14', '2023-08-05 02:50:23', NULL),
(172, 'Uwong168', 50000.00, 'Rejected', '2023-08-06 15:33:08', '2023-08-06 15:34:42', NULL),
(173, 'Uwong168', 50000.00, 'Rejected', '2023-08-06 15:36:34', '2023-08-06 15:37:48', NULL),
(174, 'Uwong168', 50000.00, 'Rejected', '2023-08-06 15:38:42', '2023-08-06 15:39:51', NULL),
(175, 'Bangjun', 100000.00, 'Rejected', '2023-08-08 13:28:26', '2023-08-08 13:29:29', NULL),
(176, 'Jakatbatara', 50000.00, 'Rejected', '2023-08-09 12:57:54', '2023-08-09 12:59:24', NULL),
(177, 'perjaka88', 2368000.00, 'Rejected', '2023-08-09 15:01:28', '2023-08-09 15:03:15', NULL),
(178, 'perjaka88', 2368000.00, 'Approved', '2023-08-09 15:06:34', '2023-08-09 15:07:01', NULL),
(179, 'Bandit662', 50000.00, 'Rejected', '2023-08-09 16:58:26', '2023-08-09 17:00:59', NULL),
(180, 'manobrako', 1830000.00, 'Approved', '2023-08-10 05:16:02', '2023-08-10 05:16:39', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `accordions`
--
ALTER TABLE `accordions`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `admin_activity`
--
ALTER TABLE `admin_activity`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `admin_activity_log`
--
ALTER TABLE `admin_activity_log`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `balance_change_log`
--
ALTER TABLE `balance_change_log`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `bank_options`
--
ALTER TABLE `bank_options`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `bannersdesktop`
--
ALTER TABLE `bannersdesktop`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `configuration`
--
ALTER TABLE `configuration`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `deleted_users`
--
ALTER TABLE `deleted_users`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `deposits`
--
ALTER TABLE `deposits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `deposits_history`
--
ALTER TABLE `deposits_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `deposit_approved`
--
ALTER TABLE `deposit_approved`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `deposit_progress`
--
ALTER TABLE `deposit_progress`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_logins`
--
ALTER TABLE `failed_logins`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `login_history`
--
ALTER TABLE `login_history`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `maintenance_settings`
--
ALTER TABLE `maintenance_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `saldo_edit_history`
--
ALTER TABLE `saldo_edit_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `edited_by` (`edited_by`);

--
-- Indeks untuk tabel `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`username`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_activity`
--
ALTER TABLE `user_activity`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_balance`
--
ALTER TABLE `user_balance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `withdraws`
--
ALTER TABLE `withdraws`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `accordions`
--
ALTER TABLE `accordions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT untuk tabel `admin_activity`
--
ALTER TABLE `admin_activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `admin_activity_log`
--
ALTER TABLE `admin_activity_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=379;

--
-- AUTO_INCREMENT untuk tabel `balance_change_log`
--
ALTER TABLE `balance_change_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT untuk tabel `bank_options`
--
ALTER TABLE `bank_options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT untuk tabel `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT untuk tabel `bannersdesktop`
--
ALTER TABLE `bannersdesktop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `configuration`
--
ALTER TABLE `configuration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `deleted_users`
--
ALTER TABLE `deleted_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `deposits`
--
ALTER TABLE `deposits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=390;

--
-- AUTO_INCREMENT untuk tabel `deposits_history`
--
ALTER TABLE `deposits_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `deposit_approved`
--
ALTER TABLE `deposit_approved`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `deposit_progress`
--
ALTER TABLE `deposit_progress`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `failed_logins`
--
ALTER TABLE `failed_logins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `login_history`
--
ALTER TABLE `login_history`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=172;

--
-- AUTO_INCREMENT untuk tabel `maintenance_settings`
--
ALTER TABLE `maintenance_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `saldo_edit_history`
--
ALTER TABLE `saldo_edit_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=246;

--
-- AUTO_INCREMENT untuk tabel `user_activity`
--
ALTER TABLE `user_activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT untuk tabel `user_balance`
--
ALTER TABLE `user_balance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `withdraws`
--
ALTER TABLE `withdraws`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=181;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `deposits_history`
--
ALTER TABLE `deposits_history`
  ADD CONSTRAINT `deposits_history_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `user_balance`
--
ALTER TABLE `user_balance`
  ADD CONSTRAINT `user_balance_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
