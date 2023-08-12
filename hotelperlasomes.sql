-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2023 at 06:54 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotelperlasomes`
--

-- --------------------------------------------------------

--
-- Table structure for table `associationfacility`
--

CREATE TABLE `associationfacility` (
  `id_Association` int(11) NOT NULL,
  `id_Room` int(11) NOT NULL,
  `id_Facility` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `associationfacility`
--

INSERT INTO `associationfacility` (`id_Association`, `id_Room`, `id_Facility`) VALUES
(5, 2, 5),
(10, 3, 3),
(11, 4, 3),
(13, 4, 5),
(19, 1, 3),
(20, 1, 4),
(22, 1, 8),
(23, 1, 5),
(24, 1, 11),
(25, 1, 10),
(26, 2, 4),
(27, 2, 3),
(28, 2, 8),
(29, 2, 10),
(30, 2, 11),
(31, 2, 12),
(32, 3, 4),
(33, 3, 5),
(34, 3, 8),
(35, 3, 10),
(36, 3, 11),
(37, 3, 12),
(38, 4, 11),
(39, 4, 10),
(40, 4, 8),
(41, 1, 13),
(42, 2, 13),
(43, 3, 13),
(44, 4, 13),
(45, 9, 3),
(46, 9, 5),
(47, 9, 8),
(48, 9, 10),
(49, 9, 11),
(51, 9, 13),
(52, 8, 3),
(54, 8, 5),
(55, 8, 8),
(56, 8, 10),
(57, 8, 11),
(58, 8, 12),
(59, 8, 13),
(60, 10, 3),
(61, 10, 5),
(62, 10, 8),
(63, 10, 10),
(64, 10, 11),
(65, 10, 12),
(66, 10, 13),
(67, 11, 3),
(68, 11, 5),
(69, 11, 8),
(70, 11, 10),
(71, 11, 11),
(72, 11, 12),
(73, 11, 13),
(74, 12, 3),
(75, 12, 5),
(76, 12, 8),
(77, 12, 10),
(78, 12, 11),
(79, 12, 12),
(80, 12, 13);

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id_Reservation` int(11) NOT NULL,
  `fullName` varchar(20) DEFAULT NULL,
  `checkIn` datetime NOT NULL,
  `checkOut` datetime NOT NULL,
  `status` varchar(20) NOT NULL,
  `roomsBooked` int(11) DEFAULT NULL,
  `numberAdults` int(11) DEFAULT NULL,
  `numberChildren` int(11) DEFAULT NULL,
  `id_Room` int(11) NOT NULL,
  `id_User` int(11) NOT NULL,
  `id_Payment` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id_Reservation`, `fullName`, `checkIn`, `checkOut`, `status`, `roomsBooked`, `numberAdults`, `numberChildren`, `id_Room`, `id_User`, `id_Payment`, `created_at`, `updated_at`, `deleted_at`) VALUES
(26, 'Sorina Treitel', '2023-06-30 00:00:00', '2023-07-01 00:00:00', 'confirmed', 203, 1, 2, 2, 1, 26, '2023-06-29 12:44:54', '2023-06-29 12:44:54', NULL),
(27, 'Sorina Treitel', '2023-07-01 00:00:00', '2023-07-29 00:00:00', 'confirmed', 202, 1, 1, 4, 1, 27, '2023-06-30 05:11:33', '2023-06-30 05:11:33', NULL),
(28, 'Sorina Treitel', '2023-07-27 00:00:00', '2023-07-28 00:00:00', 'confirmed', 204, 2, 3, 3, 1, 36, '2023-06-30 05:24:46', '2023-06-30 05:24:46', NULL),
(29, 'Sorina Treitel', '2023-06-30 00:00:00', '2023-07-31 00:00:00', 'confirmed', 304, 1, 2, 11, 1, 37, '2023-06-30 06:03:54', '2023-06-30 06:03:54', NULL),
(30, 'Sorina Treitel', '2023-06-30 00:00:00', '2023-07-01 00:00:00', 'confirmed', 203, 1, 2, 2, 1, 38, '2023-06-30 06:11:49', '2023-06-30 06:11:49', NULL),
(31, 'Sorina Treitel', '2023-07-08 00:00:00', '2023-09-09 00:00:00', 'confirmed', 203, 1, 2, 2, 1, 39, '2023-06-30 06:17:49', '2023-06-30 06:17:49', NULL),
(32, 'Sorina Treitel', '2023-07-01 00:00:00', '2023-07-02 00:00:00', 'confirmed', 302, 1, 1, 9, 1, 40, '2023-06-30 12:01:19', '2023-06-30 12:01:19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `facility`
--

CREATE TABLE `facility` (
  `id_Facility` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `facility`
--

INSERT INTO `facility` (`id_Facility`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 'Minibar', NULL, '2023-06-14 13:04:13', NULL),
(4, 'Balcon', NULL, NULL, NULL),
(5, 'Televizor', '2023-06-14 13:00:40', '2023-06-14 13:00:40', NULL),
(8, 'Aer Condiționat', '2023-06-19 19:04:10', '2023-06-19 19:04:25', NULL),
(10, 'Camera pentru nefumători', '2023-06-29 13:00:03', '2023-06-29 13:00:03', NULL),
(11, 'Parcare gratuită', '2023-06-29 13:01:38', '2023-06-29 13:01:38', NULL),
(12, 'Camera de familie', '2023-06-29 13:02:42', '2023-06-29 13:02:42', NULL),
(13, 'WiFi gratuit inclus', '2023-06-29 13:07:27', '2023-06-29 13:07:27', NULL);

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
-- Table structure for table `historyprice`
--

CREATE TABLE `historyprice` (
  `id_HistoryPrice` int(11) NOT NULL,
  `dateStart` date DEFAULT NULL,
  `dateEnd` date DEFAULT NULL,
  `price` float DEFAULT NULL,
  `id_RoomType` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `historyprice`
--

INSERT INTO `historyprice` (`id_HistoryPrice`, `dateStart`, `dateEnd`, `price`, `id_RoomType`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4, '2023-12-17', '2024-01-14', 400, 2, '2023-06-12 23:19:04', '2023-06-30 05:35:17', NULL),
(6, '2024-04-28', '2024-05-11', 400, 2, '2023-06-19 18:56:53', '2023-06-30 05:36:42', NULL),
(7, '2023-12-17', '2024-01-13', 200, 1, '2023-06-30 05:37:55', '2023-06-30 05:37:55', NULL),
(8, '2023-12-17', '2024-01-13', 500, 3, '2023-06-30 05:38:27', '2023-06-30 05:38:27', NULL),
(9, '2023-12-17', '2024-01-13', 700, 4, '2023-06-30 05:38:53', '2023-06-30 05:38:53', NULL),
(10, '2024-04-28', '2024-05-11', 700, 4, '2023-06-30 05:41:14', '2023-06-30 05:41:14', NULL),
(11, '2024-04-28', '2023-05-13', 200, 1, NULL, NULL, NULL),
(12, '2024-04-28', '2024-05-13', 500, 3, NULL, NULL, NULL);

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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1);

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
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id_Payment` int(11) NOT NULL,
  `typePayment` varchar(20) DEFAULT NULL,
  `dateOfPay` date DEFAULT NULL,
  `ammount` int(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id_Payment`, `typePayment`, `dateOfPay`, `ammount`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'cash', '2023-06-15', 0, '2023-06-15 05:32:52', '2023-06-15 05:32:52', NULL),
(2, 'cash', '2023-06-15', 0, '2023-06-15 20:18:43', '2023-06-15 20:18:43', NULL),
(3, 'cash', '2023-06-15', 0, '2023-06-15 20:18:45', '2023-06-15 20:18:45', NULL),
(4, 'cash', '2023-06-15', 0, '2023-06-15 20:18:49', '2023-06-15 20:18:49', NULL),
(5, 'cash', '2023-06-15', 0, '2023-06-15 20:23:50', '2023-06-15 20:23:50', NULL),
(6, 'cash', '2023-06-16', 0, '2023-06-15 21:37:59', '2023-06-15 21:37:59', NULL),
(7, 'card', '2023-06-16', 0, '2023-06-16 08:38:03', '2023-06-16 08:38:03', NULL),
(8, 'card', '2023-06-16', 0, '2023-06-16 08:57:38', '2023-06-16 08:57:38', NULL),
(9, 'card', '2023-06-16', 0, '2023-06-16 13:01:01', '2023-06-16 13:01:01', NULL),
(10, 'cash', '2023-06-16', 0, '2023-06-16 13:02:33', '2023-06-16 13:02:33', NULL),
(11, 'cash', '2023-06-16', 0, '2023-06-16 14:15:00', '2023-06-16 14:15:00', NULL),
(12, 'cash', '2023-06-17', 600, '2023-06-17 13:01:25', '2023-06-17 13:01:25', NULL),
(13, 'cash', '2023-06-18', 400, '2023-06-17 21:30:06', '2023-06-17 21:30:06', NULL),
(14, 'cash', '2023-06-18', 250, '2023-06-17 21:34:07', '2023-06-17 21:34:07', NULL),
(15, 'cash', '2023-06-18', 250, '2023-06-17 21:36:53', '2023-06-17 21:36:53', NULL),
(16, 'card', '2023-06-18', 400, '2023-06-17 21:40:24', '2023-06-17 21:40:24', NULL),
(17, 'cash', '2023-06-18', 250, '2023-06-18 03:06:15', '2023-06-18 03:06:15', NULL),
(18, 'cash', '2023-06-18', 200, '2023-06-18 03:08:35', '2023-06-18 03:08:35', NULL),
(19, 'cash', '2023-06-18', 400, '2023-06-18 03:09:42', '2023-06-18 03:09:42', NULL),
(20, 'card', '2023-06-18', 400, '2023-06-18 10:06:04', '2023-06-18 10:06:04', NULL),
(21, 'cash', '2023-06-18', 600, '2023-06-18 10:28:26', '2023-06-18 10:28:26', NULL),
(22, 'cash', '2023-06-18', 600, '2023-06-18 14:00:53', '2023-06-18 14:00:53', NULL),
(23, 'cash', '2023-06-18', 250, '2023-06-18 15:21:09', '2023-06-18 15:21:09', NULL),
(24, 'card', '2023-06-19', 400, '2023-06-19 11:32:12', '2023-06-19 11:32:12', NULL),
(25, 'cash', '2023-06-19', 900, '2023-06-19 13:43:48', '2023-06-19 13:43:48', NULL),
(26, 'cash', '2023-06-29', 400, '2023-06-29 12:44:54', '2023-06-29 12:44:54', NULL),
(27, 'card', '2023-06-30', 7000, '2023-06-30 05:11:33', '2023-06-30 05:11:33', NULL),
(28, 'card', '2023-06-30', 200, '2023-06-30 05:14:37', '2023-06-30 05:14:37', NULL),
(29, 'cash', '2023-06-30', 200, '2023-06-30 05:15:06', '2023-06-30 05:15:06', NULL),
(30, 'card', '2023-06-30', 200, '2023-06-30 05:15:51', '2023-06-30 05:15:51', NULL),
(31, 'card', '2023-06-30', 400, '2023-06-30 05:17:02', '2023-06-30 05:17:02', NULL),
(32, 'card', '2023-06-30', 400, '2023-06-30 05:17:44', '2023-06-30 05:17:44', NULL),
(33, 'cash', '2023-06-30', 400, '2023-06-30 05:18:10', '2023-06-30 05:18:10', NULL),
(34, 'card', '2023-06-30', 400, '2023-06-30 05:18:57', '2023-06-30 05:18:57', NULL),
(35, 'card', '2023-06-30', 400, '2023-06-30 05:22:08', '2023-06-30 05:22:08', NULL),
(36, 'cash', '2023-06-30', 600, '2023-06-30 05:24:45', '2023-06-30 05:24:45', NULL),
(37, 'card', '2023-06-30', 12400, '2023-06-30 06:03:54', '2023-06-30 06:03:54', NULL),
(38, 'cash', '2023-06-30', 400, '2023-06-30 06:11:49', '2023-06-30 06:11:49', NULL),
(39, 'cash', '2023-06-30', 12800, '2023-06-30 06:17:49', '2023-06-30 06:17:49', NULL),
(40, 'card', '2023-06-30', 250, '2023-06-30 12:01:19', '2023-06-30 12:01:19', NULL);

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

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `id_Room` int(11) NOT NULL,
  `roomNumber` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `image` varchar(100) NOT NULL,
  `id_RoomType` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`id_Room`, `roomNumber`, `status`, `image`, `id_RoomType`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 201, 'vizibil', 'r1.jpg', 1, NULL, NULL, NULL),
(2, 203, 'vizibil', 'r2.jpg', 3, NULL, '2023-06-09 01:00:19', NULL),
(3, 204, 'vizibil', 'r3.jpg', 4, NULL, '2023-06-09 01:00:29', NULL),
(4, 202, 'vizibil', 'r4.jpg', 2, NULL, '2023-06-11 22:16:31', NULL),
(5, 1, 'visible', 'test.jpg', 4, '2023-06-16 12:38:49', '2023-06-16 13:03:27', '2023-06-16 13:03:27'),
(6, 205, 'visible', 'r6-apartament.jpg', 4, '2023-06-30 05:27:33', '2023-06-30 05:27:33', NULL),
(7, 207, 'visible', 'r10-triple.jpg', 3, '2023-06-30 05:27:52', '2023-06-30 05:27:52', NULL),
(8, 301, 'vizibil', 'r9-triple.jpg', 3, '2023-06-30 05:28:24', '2023-06-30 05:55:04', NULL),
(9, 302, 'vizibil', 'r5.jpg', 2, '2023-06-30 05:29:01', '2023-06-30 05:54:46', NULL),
(10, 303, 'vizibil', 'r12-ap.jpg', 4, '2023-06-30 05:29:37', '2023-06-30 05:55:43', NULL),
(11, 304, 'vizibil', 'r8-triple.jpg', 3, '2023-06-30 05:30:39', '2023-06-30 05:56:06', NULL),
(12, 305, 'vizibil', 'single.jpg', 1, '2023-06-30 05:33:05', '2023-06-30 05:56:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id_Testimonial` int(11) NOT NULL,
  `id_User` int(11) NOT NULL,
  `content` varchar(500) NOT NULL,
  `rating` int(5) NOT NULL,
  `id_RoomType` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id_Testimonial`, `id_User`, `content`, `rating`, `id_RoomType`, `created_at`, `updated_at`, `deleted_at`) VALUES
(11, 1, 'O cameră superbă, priveliște minunată', 3, 1, '2023-06-19 19:46:03', '2023-06-19 19:46:03', NULL),
(12, 1, 'Super spatioasa, curatenie', 5, 3, '2023-06-30 13:50:53', '2023-06-30 13:50:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `typeroom`
--

CREATE TABLE `typeroom` (
  `id_RoomType` int(11) NOT NULL,
  `type` varchar(100) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `capacity` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `typeroom`
--

INSERT INTO `typeroom` (`id_RoomType`, `type`, `description`, `price`, `capacity`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Camera Single', 'Camera single oferită în cadrul hotelului nostru este un spațiu confortabil și intim, perfect pentru oaspeții care călătoresc singuri. Aceasta este amenajată cu atenție pentru a vă oferi o experiență plăcută și relaxantă', 150, 1, NULL, '2023-06-30 05:30:06', NULL),
(2, 'Camera Double', 'Într-o cameră double veți găsi de obicei un pat matrimonial sau două paturi separate, în funcție de preferințele și configurarea camerei', 250, 2, NULL, '2023-06-11 22:22:41', NULL),
(3, 'Camera Triple', 'Este amenajată astfel încât să ofere suficient spațiu pentru fiecare oaspete să se simtă confortabil și relaxat. Camerele triple sunt ideale pentru familii sau grupuri de prieteni care călătoresc împreună și doresc să împartă același spațiu de cazare.', 400, 3, NULL, '2023-06-11 22:47:52', NULL),
(4, 'Apartament', ' Este potrivit pentru oaspeții care doresc să se simtă ca acasă, indiferent dacă sunt în călătorie sau au nevoie de o locuință temporară.', 600, 5, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `useraccount`
--

CREATE TABLE `useraccount` (
  `id_User` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phoneNumber` varchar(15) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `userType` varchar(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `profile` varchar(30) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `useraccount`
--

INSERT INTO `useraccount` (`id_User`, `username`, `email`, `phoneNumber`, `password`, `userType`, `name`, `profile`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'soso', 'sorinatreitel2001@gmail.com', '0735403250', '$2y$10$gCtsXVTzAY7UwCxcUVQm1.qc1cTyjCdmTmrdRsgHmJcSyWhNGXYLO', 'admin', 'Sorina Treitel', 'profile.png', NULL, '2023-06-18 09:56:05', '2023-06-18 10:04:49'),
(9, 'denisss', 'denis@yahoo.ro', '0748024111', '$2y$10$f7q2YJIZugyJj3GRMSTjeOAUz1HxFjrdIm5/TNBFMSgN1mPyXZNL.', 'client', 'Stefan Denis', 'profile.png', NULL, '2023-06-29 13:36:22', '2023-06-29 13:36:22'),
(10, 'gabrielaa', 'timis@yahoo.com', '0748024123', '$2y$10$X/gx9lQE.FyNG86bYXVvd.qmdulXyIZWDXXzkZ.wo3bUTrPEFYquy', 'client', 'Timis Gabriela', 'profile.png', NULL, '2023-06-29 16:25:10', '2023-06-29 16:25:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `associationfacility`
--
ALTER TABLE `associationfacility`
  ADD PRIMARY KEY (`id_Association`),
  ADD KEY `id_Room` (`id_Room`),
  ADD KEY `id_Facility` (`id_Facility`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id_Reservation`),
  ADD KEY `id_Room` (`id_Room`),
  ADD KEY `id_User` (`id_User`),
  ADD KEY `id_Payment` (`id_Payment`);

--
-- Indexes for table `facility`
--
ALTER TABLE `facility`
  ADD PRIMARY KEY (`id_Facility`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `historyprice`
--
ALTER TABLE `historyprice`
  ADD PRIMARY KEY (`id_HistoryPrice`),
  ADD KEY `fk_RoomType` (`id_RoomType`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id_Payment`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id_Room`),
  ADD KEY `id_RoomType` (`id_RoomType`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id_Testimonial`),
  ADD KEY `id_User` (`id_User`);

--
-- Indexes for table `typeroom`
--
ALTER TABLE `typeroom`
  ADD PRIMARY KEY (`id_RoomType`);

--
-- Indexes for table `useraccount`
--
ALTER TABLE `useraccount`
  ADD PRIMARY KEY (`id_User`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `associationfacility`
--
ALTER TABLE `associationfacility`
  MODIFY `id_Association` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id_Reservation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `facility`
--
ALTER TABLE `facility`
  MODIFY `id_Facility` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `historyprice`
--
ALTER TABLE `historyprice`
  MODIFY `id_HistoryPrice` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id_Payment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `id_Room` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id_Testimonial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `typeroom`
--
ALTER TABLE `typeroom`
  MODIFY `id_RoomType` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `useraccount`
--
ALTER TABLE `useraccount`
  MODIFY `id_User` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `associationfacility`
--
ALTER TABLE `associationfacility`
  ADD CONSTRAINT `associationfacility_ibfk_1` FOREIGN KEY (`id_Room`) REFERENCES `room` (`id_Room`),
  ADD CONSTRAINT `associationfacility_ibfk_2` FOREIGN KEY (`id_Facility`) REFERENCES `facility` (`id_Facility`);

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`id_Room`) REFERENCES `room` (`id_Room`),
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`id_User`) REFERENCES `useraccount` (`id_User`),
  ADD CONSTRAINT `booking_ibfk_3` FOREIGN KEY (`id_Payment`) REFERENCES `payment` (`id_Payment`);

--
-- Constraints for table `historyprice`
--
ALTER TABLE `historyprice`
  ADD CONSTRAINT `fk_RoomType` FOREIGN KEY (`id_RoomType`) REFERENCES `typeroom` (`id_RoomType`);

--
-- Constraints for table `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `room_ibfk_1` FOREIGN KEY (`id_RoomType`) REFERENCES `typeroom` (`id_RoomType`);

--
-- Constraints for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD CONSTRAINT `rank` FOREIGN KEY (`id_User`) REFERENCES `useraccount` (`id_User`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
