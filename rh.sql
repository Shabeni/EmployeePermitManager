-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 13, 2023 at 05:05 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rh`
--

-- --------------------------------------------------------

--
-- Table structure for table `autorisations`
--

CREATE TABLE `autorisations` (
  `id` int(11) NOT NULL,
  `date_demande` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `alach` text NOT NULL,
  `date_debut` datetime NOT NULL,
  `date_fin` datetime NOT NULL,
  `description` text NOT NULL,
  `etat` varchar(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `autorisations`
--

INSERT INTO `autorisations` (`id`, `date_demande`, `alach`, `date_debut`, `date_fin`, `description`, `etat`, `user_id`, `type_id`) VALUES
(2, '2023-05-15 15:28:08', '', '2023-05-15 01:18:09', '2023-05-17 00:18:10', 'abdcd', 'Rejetée', 3, 3),
(3, '2023-05-18 10:27:48', '', '2023-05-17 09:55:43', '2023-05-17 09:55:43', 'afddfd', 'Approuvée', 3, 3),
(8, '2023-05-19 09:38:26', 'okk', '2023-05-19 11:33:09', '2023-05-19 11:33:09', 'jjjh', 'Approuvée', 3, 3),
(10, '2023-05-28 09:37:52', 'ok', '2023-05-27 18:27:00', '2023-05-27 18:27:00', '', 'Approuvée', 12, 2),
(11, '2023-05-28 14:38:51', 'ok', '2023-05-28 11:40:49', '2023-05-28 11:40:49', '', 'Approuvée', 21, 2),
(12, '2023-05-30 17:47:47', '', '2023-05-28 12:23:24', '2023-05-28 12:23:24', '', 'Approuvée', 21, 2),
(14, '2023-05-31 18:11:14', 'mrigel', '2023-05-28 17:02:00', '2023-05-28 13:06:00', 'cxx', 'Rejetée', 21, 3),
(15, '2023-05-31 18:14:08', 'mrigel', '2023-05-28 17:46:00', '2023-05-28 19:39:00', 'lp', 'Approuvée', 21, 3),
(17, '2023-06-01 10:33:42', 'okm1', '2023-05-13 21:20:00', '2023-05-06 19:20:00', 'dsq', 'Approuvée', 21, 3),
(19, '2023-05-31 17:50:11', 'okm1', '2023-05-31 21:48:00', '2023-05-31 18:51:00', 'xx', 'Rejetée', 21, 3),
(20, '2023-05-31 20:12:11', 'mrigel', '2023-05-12 19:27:00', '2023-05-12 23:27:00', 'wa', 'Approuvée', 13, 4),
(24, '2023-06-06 16:13:30', '', '2023-06-06 20:13:00', '2023-06-25 16:17:00', 'dsd', 'en attente', 21, 1),
(25, '2023-06-06 16:14:43', '', '2023-06-06 16:17:00', '2023-06-14 16:14:00', 'pla', 'en attente', 21, 4),
(26, '2023-06-06 18:05:54', '', '2023-07-02 18:05:00', '2023-06-16 18:06:00', 'm', 'en attente', 21, 3),
(27, '2023-06-06 18:45:06', '', '2023-06-06 21:45:00', '2023-06-01 18:45:00', 'd', 'en attente', 13, 1);

-- --------------------------------------------------------

--
-- Table structure for table `departements`
--

CREATE TABLE `departements` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `actif` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `departements`
--

INSERT INTO `departements` (`id`, `nom`, `actif`) VALUES
(1, 'financier', 0),
(3, 'RH', 1),
(5, 'Juridique', 1);

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `id` int(11) NOT NULL,
  `intitule` varchar(15) NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `intitule`, `active`) VALUES
(1, '1 Heure', 0),
(2, '2 Heures', 1),
(3, '3 Heures', 0),
(4, 'Demi-journée', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` varchar(10) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `matricule` varchar(10) NOT NULL,
  `actif` tinyint(4) NOT NULL DEFAULT 1,
  `departement_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nom`, `email`, `role`, `pwd`, `matricule`, `actif`, `departement_id`) VALUES
(3, 'ninoo', 'jjjj@hotmail.c', 'afp1220kd', '', 'afp12', 1, 1),
(11, 'de', 'abdelhak_chabeni@outlook.com', 'admin', '202cb962ac59075b964b07152d234b70', 'admin', 1, 1),
(12, 'nioom', 'jjjj@hotmail.fr', 'admin', '202cb962ac59075b964b07152d234b70', 'T02542f', 1, 5),
(13, 'ninood', 'jjjj@hotmail.frff', 'user', '202cb962ac59075b964b07152d234b70', 'T02542', 1, 3),
(21, 'didi', 'achabeni76@gmail.com', 'user', '202cb962ac59075b964b07152d234b70', 'T02542d', 1, 1),
(22, 'linn', 'bibo@hotmail.fr', 'admin', 'c6f057b86584942e415435ffb1fa93d4', 'afp122d', 1, 5),
(24, 'ok', 'ok@hotmail.com', 'user', '9996535e07258a7bbfd8b132435c5962', '1235', 1, 1),
(26, 'a', 'c@hotmail.fr', 'user', '202cb962ac59075b964b07152d234b70', 'afp122', 1, 1),
(28, 'abcc', 'ca@hotmail.fr', 'admin', '202cb962ac59075b964b07152d234b70', 'afp122d', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `autorisations`
--
ALTER TABLE `autorisations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`,`type_id`),
  ADD KEY `type_id` (`type_id`);

--
-- Indexes for table `departements`
--
ALTER TABLE `departements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `departement_id` (`departement_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `autorisations`
--
ALTER TABLE `autorisations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `departements`
--
ALTER TABLE `departements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `autorisations`
--
ALTER TABLE `autorisations`
  ADD CONSTRAINT `autorisations_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `autorisations_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`departement_id`) REFERENCES `departements` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
