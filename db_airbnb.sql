-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2020 at 06:23 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_airbnb`
--

-- --------------------------------------------------------

--
-- Table structure for table `ciudad`
--

CREATE TABLE `ciudad` (
  `id_ciudad` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ciudad`
--

INSERT INTO `ciudad` (`id_ciudad`, `nombre`) VALUES
(2, 'Azul'),
(24, 'Tandil'),
(25, 'Chascomus'),
(28, 'Buenos Aires');

-- --------------------------------------------------------

--
-- Table structure for table `comentario`
--

CREATE TABLE `comentario` (
  `id_comentario` int(11) NOT NULL,
  `texto` varchar(255) NOT NULL,
  `puntaje` tinyint(4) NOT NULL,
  `id_usuario_fk` int(11) NOT NULL,
  `id_depto_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comentario`
--

INSERT INTO `comentario` (`id_comentario`, `texto`, `puntaje`, `id_usuario_fk`, `id_depto_fk`) VALUES
(6, 'y otro mas', 0, 2, 13),
(9, 'Otro comnent jajajajaj', 0, 2, 13),
(33, 'hfgbdvsaSVF B', 3, 2, 8),
(34, 'holi', 5, 2, 8),
(35, 'otro comment', 2, 2, 8),
(36, 'holi', 1, 2, 8),
(37, '', 2, 2, 8),
(38, 'ferd', 2, 2, 8),
(39, 'fbvdsfa', 2, 2, 8),
(49, 'esto es un comentario!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!', 4, 2, 12),
(50, 'fdghbnvbcsd   k k kj j olkm,', 3, 2, 12),
(53, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Obcaecati perspiciatis vitae tempore aperiam, numquam provident modi facere repudiandae blanditiis fugiat a optio quas minima laboriosam ipsam nisi, culpa aspernatur excepturi?', 2, 2, 9),
(66, 'un coment mas', 3, 11, 9),
(78, 'aANKJSDFNAD', 3, 2, 9),
(80, 'asdf', 3, 2, 9);

-- --------------------------------------------------------

--
-- Table structure for table `departamento`
--

CREATE TABLE `departamento` (
  `id_departamento` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `precio` int(11) NOT NULL,
  `id_ciudad_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `departamento`
--

INSERT INTO `departamento` (`id_departamento`, `nombre`, `direccion`, `precio`, `id_ciudad_fk`) VALUES
(8, 'Depto Serrano', 'Colon 1300', 18000, 24),
(9, 'Depto del calvario', 'España 800', 8000, 24),
(10, 'Depto Naranja', 'chacabuco 800', 16000, 2),
(12, 'Depto Centrico', 'Santa fe 2300', 24000, 28),
(13, 'Depto Belgrano', 'Juncal 1800', 22000, 28);

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `clave` varchar(255) NOT NULL,
  `rol` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `email`, `clave`, `rol`) VALUES
(2, 'admin@admin', '$2y$12$Nhvr7CwY8fH.IF4AS9lWh.vKgPq2u8EbgYEgzSO4qpNRqNY7fFKHC', 0),
(3, 'magali', '$2y$10$Pzv4mefUTo2bS4jUNnCA/OFvPyd0t7JiDmR0imN28wOD6XVr.FTtG', 0),
(7, 'azuquita', '$2y$10$7Nrs7NNxBB3BMU0Jx.2cguoWFwfrNucFQ/JjET1dP4MY8WoCEDk8u', 1),
(11, 'lucho@usuario', '$2y$10$dkFbk1EXcfpRZRzr3R60tuB5bQN6Dc9GVdtYqOeHthhTK6J.ZXVra', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ciudad`
--
ALTER TABLE `ciudad`
  ADD PRIMARY KEY (`id_ciudad`);

--
-- Indexes for table `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`id_comentario`),
  ADD KEY `id_depto_fk` (`id_depto_fk`),
  ADD KEY `id_usuario_fk` (`id_usuario_fk`);

--
-- Indexes for table `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`id_departamento`),
  ADD KEY `id_ciudad` (`id_ciudad_fk`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ciudad`
--
ALTER TABLE `ciudad`
  MODIFY `id_ciudad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `comentario`
--
ALTER TABLE `comentario`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `departamento`
--
ALTER TABLE `departamento`
  MODIFY `id_departamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `comentario_ibfk_1` FOREIGN KEY (`id_depto_fk`) REFERENCES `departamento` (`id_departamento`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comentario_ibfk_2` FOREIGN KEY (`id_usuario_fk`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `departamento`
--
ALTER TABLE `departamento`
  ADD CONSTRAINT `departamento_ibfk_1` FOREIGN KEY (`id_ciudad_fk`) REFERENCES `ciudad` (`id_ciudad`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
