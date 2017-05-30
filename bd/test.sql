-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2017 at 07:57 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `test`;

-- --------------------------------------------------------

--
-- Table structure for table `cake_d_c_users_phinxlog`
--

CREATE TABLE `cake_d_c_users_phinxlog` (
  `version` bigint(20) NOT NULL,
  `migration_name` varchar(100) DEFAULT NULL,
  `start_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `end_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `breakpoint` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cake_d_c_users_phinxlog`
--

INSERT INTO `cake_d_c_users_phinxlog` (`version`, `migration_name`, `start_time`, `end_time`, `breakpoint`) VALUES
(20150513201111, 'Initial', '2017-05-25 02:34:21', '2017-05-25 02:34:21', 0),
(20161031101316, 'AddSecretToUsers', '2017-05-25 02:34:21', '2017-05-25 02:34:21', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ingredientes`
--

CREATE TABLE `ingredientes` (
  `id` int(255) NOT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ingredientes`
--

INSERT INTO `ingredientes` (`id`, `nombre`) VALUES
(1, 'Jamon'),
(2, 'Queso'),
(3, 'Tapa de Tarta'),
(4, 'Tapa de Empanada'),
(5, 'Chocolate'),
(6, 'Vainilla'),
(7, 'Frutilla'),
(8, 'Harina'),
(9, 'Ingrediente Secreto'),
(10, 'Dulce de Leche'),
(11, 'Cacao'),
(12, 'Mix de Frutas'),
(13, 'Pan'),
(14, 'Salame');

-- --------------------------------------------------------

--
-- Table structure for table `ingredientes_recetas`
--

CREATE TABLE `ingredientes_recetas` (
  `id` int(255) NOT NULL,
  `ingrediente_id` int(255) NOT NULL,
  `receta_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ingredientes_recetas`
--

INSERT INTO `ingredientes_recetas` (`id`, `ingrediente_id`, `receta_id`) VALUES
(22, 1, 9),
(23, 2, 9),
(24, 3, 9),
(25, 1, 10),
(26, 2, 10),
(27, 4, 10),
(28, 5, 11),
(29, 6, 11),
(30, 7, 11),
(31, 8, 11),
(32, 9, 11),
(33, 10, 11),
(34, 12, 11),
(35, 1, 12),
(36, 2, 12),
(37, 13, 12),
(38, 9, 13),
(39, 13, 13),
(40, 2, 14),
(41, 13, 14),
(42, 14, 14),
(43, 1, 15),
(44, 13, 15),
(45, 2, 16),
(46, 13, 16),
(47, 13, 17),
(48, 14, 17);

-- --------------------------------------------------------

--
-- Table structure for table `recetas`
--

CREATE TABLE `recetas` (
  `id` int(255) NOT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `recetas`
--

INSERT INTO `recetas` (`id`, `nombre`) VALUES
(9, 'Tarta de Jamon y Queso'),
(10, 'Empanada de Jamon y Queso'),
(11, 'Receta Secreta'),
(12, 'Sandwich de Jamon y Queso'),
(13, 'Sandwich Potente'),
(14, 'Sandwich de Salame y Queso'),
(15, 'Sandwich de Jamon'),
(16, 'Sandwich de Queso'),
(17, 'Sandwich de Salame');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` char(36) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `activation_date` datetime DEFAULT NULL,
  `tos_date` datetime DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `is_superuser` tinyint(1) NOT NULL DEFAULT '0',
  `role` varchar(255) DEFAULT 'user',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `first_name`, `last_name`, `activation_date`, `tos_date`, `active`, `is_superuser`, `role`, `created`, `modified`) VALUES
('ddb03483-2822-482e-b215-8b6899804687', 'Cocinero_Master', 'cocinobien@hotmail.com', '$2y$10$KqpE0WawoN.Tv48djPqIS.SX5P3wHJQUWYhJy2CpLMLUniIk3flyK', 'Cristian', 'Ferro', '2017-05-25 00:17:18', NULL, 1, 0, 'cocinero', '2017-05-25 00:17:18', '2017-05-25 00:17:18'),
('e52f7bb2-50b6-48b8-90d8-237fd0995b1e', 'Rodrigo_Lopez', 'Rodrigo_Lopez@gmail.com', '$2y$10$pHwWzk4LfI1ax1ffdbVd1uwRrVLBgNm1bzCUS01V2gPkID0iknThK', 'Rodrigo', 'Lopez', '2017-05-24 23:39:32', '2017-05-24 23:39:32', 1, 0, 'usuario', '2017-05-24 23:39:32', '2017-05-24 23:39:32'),
('054da53f-411f-496a-a396-38ca8473cb7e', 'nerfCodeBlocks', '', '$2y$10$5ySCbK9S2tumYWImccNTge4HHJS83X86QfOr7RH4X/vLwYueYFzZ.', 'look', 'behind you', '2017-05-25 01:57:15', NULL, 1, 0, 'usuario', '2017-05-25 01:57:15', '2017-05-25 01:57:15'),
('32352603-3cda-4bf2-80c2-24f4649b0b50', 'holadonpepito', '', '$2y$10$DOABUMA2vU7Kw0DN17GXne8dZ0fv0H3xzCDqyOX5rp8Ry2ONHAYCW', 'pepito', 'jose', '2017-05-25 01:58:49', NULL, 1, 0, 'usuario', '2017-05-25 01:58:49', '2017-05-25 01:58:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cake_d_c_users_phinxlog`
--
ALTER TABLE `cake_d_c_users_phinxlog`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `ingredientes`
--
ALTER TABLE `ingredientes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ingredientes_recetas`
--
ALTER TABLE `ingredientes_recetas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ingrediente_id` (`ingrediente_id`),
  ADD KEY `receta_id` (`receta_id`);

--
-- Indexes for table `recetas`
--
ALTER TABLE `recetas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ingredientes`
--
ALTER TABLE `ingredientes`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `ingredientes_recetas`
--
ALTER TABLE `ingredientes_recetas`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `recetas`
--
ALTER TABLE `recetas`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `ingredientes_recetas`
--
ALTER TABLE `ingredientes_recetas`
  ADD CONSTRAINT `ingredientes_recetas_ibfk_1` FOREIGN KEY (`ingrediente_id`) REFERENCES `ingredientes` (`id`),
  ADD CONSTRAINT `ingredientes_recetas_ibfk_2` FOREIGN KEY (`receta_id`) REFERENCES `recetas` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
