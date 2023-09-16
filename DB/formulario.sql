-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 16-09-2023 a las 00:58:17
-- Versión del servidor: 8.0.31
-- Versión de PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `formulario`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `Nombre` text NOT NULL,
  `correo` text NOT NULL,
  `pass` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`id`, `Nombre`, `correo`, `pass`) VALUES
(1, 'Andres', 'full-y@hotmail.com', 12345678);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `nombre` text NOT NULL,
  `message` text NOT NULL,
  `iddepto` int DEFAULT NULL,
  `idemp` int DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `iddepto` (`iddepto`),
  KEY `idemp` (`idemp`)
) ENGINE=InnoDB AUTO_INCREMENT=125 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `contact`
--

INSERT INTO `contact` (`id`, `email`, `nombre`, `message`, `iddepto`, `idemp`, `date`) VALUES
(112, 'andres.ceron@lineadatascan.com', 'andres.ceron@lineadatascan.com', 'Karen\' \'1122334455', 2, 1234567899, '2023-09-14 14:32:34'),
(114, 'andres.ceron@lineadatascan.com', 'andres.ceron@lineadatascan.com', 'Bryan\' \'1122334477', 2, 1122334477, '2023-09-14 14:37:04'),
(115, 'andres.ceron@lineadatascan.com', 'andres.ceron@lineadatascan.com', 'Rubiela\' \'1648902347', 1, 1648902347, '2023-09-14 14:38:00'),
(116, 'andres.ceron@lineadatascan.com', 'andres.ceron@lineadatascan.com', 'Rubiela Petro 1648902347', 1, 1648902347, '2023-09-14 14:40:18'),
(117, 'andres.ceron@lineadatascan.com', 'andres.ceron@lineadatascan.com', 'Luna Gaviria', 1, 1564827638, '2023-09-14 14:46:06'),
(118, 'andres.ceron@lineadatascan.com', 'andres.ceron@lineadatascan.com', 'Luna Gaviria', 1, 1564827638, '2023-09-14 14:49:01'),
(119, 'andres.ceron@lineadatascan.com', 'andres.ceron@lineadatascan.com', 'Luna Gaviria', 1, 1564827638, '2023-09-14 14:50:45'),
(120, 'andres.ceron@lineadatascan.com', 'andres.ceron@lineadatascan.com', 'Bryan Popo', 2, 1122334477, '2023-09-14 14:57:27'),
(121, 'andres.ceron@lineadatascan.com', 'Andres', 'si es asi', 1, 1648902347, '2023-09-14 16:33:34'),
(122, 'andres.ceron@lineadatascan.com', 'Andres', 'mensaje', 2, 1123456111, '2023-09-14 18:15:01'),
(123, 'andres.ceron@lineadatascan.com', 'Andres', 'ms', 3, 1119873456, '2023-09-14 18:46:24'),
(124, 'andres.ceron@lineadatascan.com', 'rrrr', 're', 2, 1123456111, '2023-09-15 17:34:22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamentos`
--

DROP TABLE IF EXISTS `departamentos`;
CREATE TABLE IF NOT EXISTS `departamentos` (
  `iddepto` int NOT NULL AUTO_INCREMENT,
  `nombreDepto` varchar(50) NOT NULL,
  PRIMARY KEY (`iddepto`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `departamentos`
--

INSERT INTO `departamentos` (`iddepto`, `nombreDepto`) VALUES
(1, 'Atencion al cliente'),
(2, 'Soporte tecnico'),
(3, 'Facturacion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

DROP TABLE IF EXISTS `empleados`;
CREATE TABLE IF NOT EXISTS `empleados` (
  `idemp` int NOT NULL,
  `nombre` varchar(23) NOT NULL,
  `apellido` varchar(23) NOT NULL,
  `departamento` int NOT NULL,
  PRIMARY KEY (`idemp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`idemp`, `nombre`, `apellido`, `departamento`) VALUES
(1110987611, 'Jorge', 'Nieto', 3),
(1112341234, 'Catalina', 'Ortiz', 3),
(1112377234, 'Hellen', 'Duque', 3),
(1118877551, 'Fredy', 'Torres', 3),
(1119873456, 'Walter', 'Gaviria', 3),
(1121156111, 'Daniela', 'lara', 2),
(1122334455, 'Karen', 'Gaviria', 2),
(1122334477, 'Bryan', 'Popo', 2),
(1123456111, 'Julio', 'Duque', 2),
(1145678999, 'Sara', 'serna', 1),
(1234567899, 'Andres', 'serna', 2),
(1435278123, 'Sergio', 'Duque', 1),
(1564827638, 'Luna', 'Gaviria', 1),
(1648902347, 'Rubiela', 'Petro', 1);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `contact_ibfk_1` FOREIGN KEY (`iddepto`) REFERENCES `departamentos` (`iddepto`),
  ADD CONSTRAINT `contact_ibfk_2` FOREIGN KEY (`idemp`) REFERENCES `empleados` (`idemp`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
