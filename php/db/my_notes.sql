-- Esta linea de código se usa para relacionar tablas con sql
-- ALTER TABLE list_notes ADD FOREIGN KEY(idUser) REFERENCES list_notes(idUser) ON DELETE CASCADE ON UPDATE CASCADE


-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 15-10-2023 a las 04:26:24
-- Versión del servidor: 8.0.30
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `my_notes`
--
CREATE DATABASE `my_notes`;
USE `my_notes`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `list_notes`
--

CREATE TABLE `list_notes` (
  `idNote` int NOT NULL,
  `idUser` int NOT NULL,
  `titleNote` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  `descriptionNote` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  `dateNote` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  `createNote` varchar(250) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `list_users`
--

CREATE TABLE `list_users` (
  `idUser` int NOT NULL,
  `nameUser` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  `mailUser` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  `passwordUser` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  `createUser` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `list_notes`
--
ALTER TABLE `list_notes`
  ADD PRIMARY KEY (`idNote`),
  ADD KEY `idUser` (`idUser`);

--
-- Indices de la tabla `list_users`
--
ALTER TABLE `list_users`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `list_notes`
--
ALTER TABLE `list_notes`
  MODIFY `idNote` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `list_users`
--
ALTER TABLE `list_users`
  MODIFY `idUser` int NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `list_notes`
--
ALTER TABLE `list_notes`
  ADD CONSTRAINT `list_notes_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `list_users` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
