-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 03-03-2021 a las 01:19:18
-- Versión del servidor: 10.4.13-MariaDB
-- Versión de PHP: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `trabajo_grado`
--
CREATE DATABASE IF NOT EXISTS `trabajo_grado` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `trabajo_grado`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maquina`
--

DROP TABLE IF EXISTS `maquina`;
CREATE TABLE IF NOT EXISTS `maquina` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `NombreMaquina` varchar(300) NOT NULL DEFAULT 'maquina',
  `IP` varchar(20) NOT NULL DEFAULT '192.168.1.2',
  `EstadoMaquina` tinyint(1) NOT NULL DEFAULT 0,
  `EstadoMotor` tinyint(1) NOT NULL DEFAULT 0,
  `Velocidad` float NOT NULL DEFAULT 0,
  `CantidadMl` float NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `maquina`
--

INSERT INTO `maquina` (`NombreMaquina`, `IP`, `EstadoMaquina`, `EstadoMotor`, `Velocidad`, `CantidadMl`) VALUES
('maquina', '192.168.1.2', 1, 0, 2, 750);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registros`
--

DROP TABLE IF EXISTS `registros`;
CREATE TABLE IF NOT EXISTS `registros` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `FechaHora` timestamp NOT NULL DEFAULT current_timestamp(),
  `Velocidad` float NOT NULL DEFAULT 0,
  `CantidadMl` float NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `registros` (`FechaHora`, `Velocidad`, `CantidadMl`) VALUES
(now(), '2', 750),
(now(), '2', 750),
(now(), '2', 750),
(now(), '2', 750);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
