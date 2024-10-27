-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2024 at 04:36 AM
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
-- Database: `dbantrian`
--

-- --------------------------------------------------------

--
-- Table structure for table `counter`
--

CREATE TABLE `counter` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `current_queue` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `counter`
--

INSERT INTO `counter` (`id`, `name`, `current_queue`) VALUES
(7, 'Loket 1', 30),
(8, 'Loket 2', 17),
(9, 'Loket 3', 8);

-- --------------------------------------------------------

--
-- Table structure for table `queue`
--

CREATE TABLE `queue` (
  `id` int(11) NOT NULL,
  `queue_code` char(1) DEFAULT NULL,
  `queue_number` int(11) DEFAULT NULL,
  `status` enum('waiting','called') DEFAULT 'waiting',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `called_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `queue`
--

INSERT INTO `queue` (`id`, `queue_code`, `queue_number`, `status`, `created_at`, `called_at`) VALUES
(1, 'A', 1, 'called', '2024-10-26 17:10:53', '2024-10-26 17:14:35'),
(2, 'A', 2, 'called', '2024-10-26 17:15:12', '2024-10-26 17:15:21'),
(3, 'B', 1, 'called', '2024-10-26 17:15:38', '2024-10-26 17:16:18'),
(4, 'C', 1, 'called', '2024-10-26 17:15:58', '2024-10-26 17:16:34'),
(5, 'C', 2, 'called', '2024-10-26 17:16:47', '2024-10-26 17:16:50'),
(6, 'B', 2, 'called', '2024-10-26 17:16:57', '2024-10-26 17:17:04'),
(7, 'A', 3, 'called', '2024-10-26 17:21:44', '2024-10-26 17:21:51'),
(8, 'C', 3, 'called', '2024-10-26 17:22:01', '2024-10-26 17:22:04'),
(9, 'A', 4, 'called', '2024-10-26 17:25:51', '2024-10-26 17:25:56'),
(10, 'B', 3, 'called', '2024-10-26 17:26:00', '2024-10-26 17:26:08'),
(11, 'B', 4, 'called', '2024-10-26 17:29:31', '2024-10-26 17:29:40'),
(12, 'A', 5, 'called', '2024-10-26 17:29:58', '2024-10-26 17:30:05'),
(13, 'A', 6, 'called', '2024-10-26 17:31:27', '2024-10-26 17:33:31'),
(14, 'A', 7, 'called', '2024-10-26 17:31:48', '2024-10-26 17:44:23'),
(15, 'A', 8, 'called', '2024-10-26 17:33:21', '2024-10-26 17:44:38'),
(16, 'B', 5, 'called', '2024-10-26 17:33:40', '2024-10-26 17:33:50'),
(17, 'A', 9, 'called', '2024-10-26 17:44:15', '2024-10-26 17:45:01'),
(18, 'B', 6, 'called', '2024-10-26 17:44:56', '2024-10-26 18:52:28'),
(19, 'A', 10, 'called', '2024-10-26 17:47:52', '2024-10-26 18:04:26'),
(20, 'A', 11, 'called', '2024-10-26 17:52:25', '2024-10-26 18:05:30'),
(21, 'A', 12, 'called', '2024-10-26 17:57:19', '2024-10-26 18:07:22'),
(22, 'A', 13, 'called', '2024-10-26 18:01:08', '2024-10-26 18:07:23'),
(23, 'B', 7, 'called', '2024-10-26 18:07:34', '2024-10-26 19:03:04'),
(24, 'A', 14, 'called', '2024-10-26 18:07:54', '2024-10-26 18:07:57'),
(25, 'A', 15, 'called', '2024-10-26 18:22:17', '2024-10-26 18:22:26'),
(26, 'A', 16, 'called', '2024-10-26 18:22:56', '2024-10-26 18:23:00'),
(27, 'A', 17, 'called', '2024-10-26 18:26:49', '2024-10-26 18:51:57'),
(28, 'C', 4, 'called', '2024-10-26 18:43:44', '2024-10-26 19:24:53'),
(29, 'A', 18, 'called', '2024-10-26 18:45:37', '2024-10-26 19:03:22'),
(30, 'A', 19, 'called', '2024-10-26 18:51:41', '2024-10-26 19:03:53'),
(31, 'B', 8, 'called', '2024-10-26 18:52:16', '2024-10-26 19:03:13'),
(32, 'A', 20, 'called', '2024-10-26 19:03:17', '2024-10-26 19:05:23'),
(33, 'A', 21, 'called', '2024-10-26 19:05:18', '2024-10-26 19:05:41'),
(34, 'B', 9, 'called', '2024-10-26 19:06:25', '2024-10-26 19:06:31'),
(35, 'A', 22, 'called', '2024-10-26 19:06:52', '2024-10-26 19:06:56'),
(36, 'A', 23, 'called', '2024-10-26 19:07:06', '2024-10-26 19:07:11'),
(37, 'A', 24, 'called', '2024-10-26 19:09:19', '2024-10-26 19:09:24'),
(38, 'A', 25, 'called', '2024-10-26 19:09:38', '2024-10-26 19:09:40'),
(39, 'A', 26, 'called', '2024-10-26 19:19:56', '2024-10-26 19:20:01'),
(40, 'A', 27, 'called', '2024-10-26 19:20:17', '2024-10-26 19:20:20'),
(41, 'A', 28, 'called', '2024-10-26 19:23:32', '2024-10-26 19:23:45'),
(42, 'B', 10, 'called', '2024-10-26 19:24:12', '2024-10-26 19:24:22'),
(43, 'C', 5, 'called', '2024-10-26 19:24:46', '2024-10-26 19:25:18'),
(44, 'A', 29, 'called', '2024-10-26 19:25:41', '2024-10-26 19:25:46'),
(45, 'A', 30, 'called', '2024-10-26 19:26:09', '2024-10-26 19:26:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `counter`
--
ALTER TABLE `counter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `queue`
--
ALTER TABLE `queue`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `counter`
--
ALTER TABLE `counter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `queue`
--
ALTER TABLE `queue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
