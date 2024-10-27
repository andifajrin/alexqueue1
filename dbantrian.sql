-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Oct 27, 2024 at 07:09 AM
-- Server version: 5.7.39
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
-- Table structure for table `calls`
--

CREATE TABLE `calls` (
  `id` int(11) NOT NULL,
  `queue_id` int(11) NOT NULL,
  `status` enum('waiting','called','already_called') NOT NULL DEFAULT 'waiting',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `called_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `calls`
--

INSERT INTO `calls` (`id`, `queue_id`, `status`, `created_at`, `called_at`) VALUES
(3, 1, 'already_called', '2024-10-27 13:33:59', '2024-10-27 13:34:16'),
(4, 2, 'already_called', '2024-10-27 13:36:29', '2024-10-27 13:46:55'),
(5, 2, 'already_called', '2024-10-27 13:37:53', '2024-10-27 13:46:55'),
(6, 2, 'already_called', '2024-10-27 13:41:54', '2024-10-27 13:46:55'),
(7, 2, 'already_called', '2024-10-27 13:42:54', '2024-10-27 13:46:55'),
(8, 2, 'already_called', '2024-10-27 13:43:18', '2024-10-27 13:46:55'),
(9, 2, 'already_called', '2024-10-27 13:44:49', '2024-10-27 13:46:55'),
(10, 2, 'already_called', '2024-10-27 13:45:13', '2024-10-27 13:46:55'),
(11, 2, 'already_called', '2024-10-27 13:45:45', '2024-10-27 13:46:55'),
(12, 2, 'already_called', '2024-10-27 13:45:57', '2024-10-27 13:46:55'),
(13, 2, 'already_called', '2024-10-27 13:46:05', '2024-10-27 13:46:55'),
(14, 2, 'already_called', '2024-10-27 13:46:23', '2024-10-27 13:46:55'),
(15, 2, 'already_called', '2024-10-27 13:46:47', '2024-10-27 13:46:55'),
(16, 2, 'already_called', '2024-10-27 13:46:55', '2024-10-27 13:46:55'),
(17, 3, 'already_called', '2024-10-27 13:47:03', '2024-10-27 13:47:25'),
(18, 3, 'already_called', '2024-10-27 13:47:23', '2024-10-27 13:47:25');

-- --------------------------------------------------------

--
-- Table structure for table `counter`
--

CREATE TABLE `counter` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `current_queue` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `counter`
--

INSERT INTO `counter` (`id`, `name`, `current_queue`) VALUES
(7, 'Loket 1', 2),
(8, 'Loket 2', 1),
(9, 'Loket 3', 0);

-- --------------------------------------------------------

--
-- Table structure for table `queue`
--

CREATE TABLE `queue` (
  `id` int(11) NOT NULL,
  `queue_code` char(1) DEFAULT NULL,
  `queue_number` int(11) DEFAULT NULL,
  `status` enum('waiting','called') DEFAULT 'waiting',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `called_at` timestamp NULL DEFAULT NULL,
  `counter_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `queue`
--

INSERT INTO `queue` (`id`, `queue_code`, `queue_number`, `status`, `created_at`, `called_at`, `counter_id`) VALUES
(1, 'A', 1, 'called', '2024-10-27 05:33:59', '2024-10-27 05:34:16', 7),
(2, 'A', 2, 'called', '2024-10-27 05:36:29', '2024-10-27 05:36:31', 7),
(3, 'B', 1, 'called', '2024-10-27 05:47:03', '2024-10-27 05:47:11', 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `calls`
--
ALTER TABLE `calls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `counter`
--
ALTER TABLE `counter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `queue`
--
ALTER TABLE `queue`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_at` (`created_at`,`called_at`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `calls`
--
ALTER TABLE `calls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `counter`
--
ALTER TABLE `counter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `queue`
--
ALTER TABLE `queue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
