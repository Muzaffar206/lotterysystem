-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2024 at 08:39 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lottery`
--

-- --------------------------------------------------------

--
-- Table structure for table `lottery_results`
--

CREATE TABLE `lottery_results` (
  `id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `scheme` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lottery_results`
--

INSERT INTO `lottery_results` (`id`, `file_name`, `file_path`, `created_at`, `scheme`) VALUES
(1, 'selected_beneficiaries_20240616_183908.csv', 'uploads/selected_beneficiaries_20240616_183908.csv', '2024-06-16 16:39:08', ''),
(2, 'selected_beneficiaries_20240616_184122.csv', 'uploads/selected_beneficiaries_20240616_184122.csv', '2024-06-16 16:41:22', ''),
(3, 'selected_beneficiaries_20240616_184310.csv', 'uploads/selected_beneficiaries_20240616_184310.csv', '2024-06-16 16:43:10', ''),
(4, 'selected_beneficiaries_20240616_184344.csv', 'uploads/selected_beneficiaries_20240616_184344.csv', '2024-06-16 16:43:44', ''),
(5, 'selected_beneficiaries_20240616_185654.csv', 'uploads/selected_beneficiaries_20240616_185654.csv', '2024-06-16 16:56:54', ''),
(6, 'selected_beneficiaries_20240616_190112.csv', 'uploads/selected_beneficiaries_20240616_190112.csv', '2024-06-16 17:01:12', ''),
(7, 'selected_beneficiaries_20240616_191525.csv', 'uploads/selected_beneficiaries_20240616_191525.csv', '2024-06-16 17:15:25', ''),
(8, 'selected_beneficiaries_20240616_192016.csv', 'uploads/selected_beneficiaries_20240616_192016.csv', '2024-06-16 17:20:16', ''),
(9, 'selected_beneficiaries_20240616_192033.csv', 'uploads/selected_beneficiaries_20240616_192033.csv', '2024-06-16 17:20:33', ''),
(10, 'selected_beneficiaries_20240616_192244.csv', 'uploads/selected_beneficiaries_20240616_192244.csv', '2024-06-16 17:22:44', ''),
(11, 'selected_beneficiaries_20240616_193633.csv', 'uploads/selected_beneficiaries_20240616_193633.csv', '2024-06-16 17:36:33', ''),
(12, 'selected_beneficiaries_20240616_194325.csv', 'uploads/selected_beneficiaries_20240616_194325.csv', '2024-06-16 17:43:25', 'Education');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `reset_token` varchar(255) DEFAULT NULL,
  `reset_token_expiry` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `created_at`, `reset_token`, `reset_token_expiry`) VALUES
(10, 'muzaffar', '$2y$10$gJvhxIv/Ali9WZqf5p1wXe3Ni8lfbs3ThNQYof2TNEwFPCI/GnlCC', 'muzaffar@gmail.com', '2024-06-13 08:54:33', '8ea454f0b53f265cc26d62b3567cafe7', '2024-06-13 11:54:52'),
(11, 'admin', '$2y$10$04ZVbkSr86qhOHanurct2uO4Vxn.9WlEuZq8.7DSqVgOgvsRnMupu', 'admin@gmail.com', '2024-06-16 10:45:59', NULL, NULL),
(12, 'alfu', '$2y$10$MAerydL15xWGd7rFf5ol.eyaPgHssMjPv2zj.UgjbeSQzrGQADVJG', 'alfu@mail.com', '2024-06-17 12:14:44', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lottery_results`
--
ALTER TABLE `lottery_results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lottery_results`
--
ALTER TABLE `lottery_results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
