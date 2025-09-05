-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3307
-- Tiempo de generación: 17-03-2025 a las 17:28:54
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tiendaropa`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
  `CodigoCompra` int(11) NOT NULL,
  `CodigoArticulo` int(6) DEFAULT NULL,
  `DNIcliente` varchar(9) DEFAULT NULL,
  `Cantidad` int(11) DEFAULT NULL,
  `Fecha_compra` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `compra`
--

INSERT INTO `compra` (`CodigoCompra`, `CodigoArticulo`, `DNIcliente`, `Cantidad`, `Fecha_compra`) VALUES
(1, 1, '12345678A', 2, '2021-03-01 00:00:00'),
(2, 2, '92345678A', 5, '2021-03-01 00:00:00'),
(4, 2, '12345678A', 3, '2021-04-01 00:00:00'),
(7, 3, '12345678A', 1, '2021-08-01 00:00:00'),
(9, 1, '32345678A', 1, '2021-10-01 00:00:00'),
(10, 1, '62345678A', 4, '2021-10-01 00:00:00'),
(12, 5, '12345678A', 1, '0000-00-00 00:00:00'),
(17, 2, '62345678A', 2, '2021-11-02 00:00:00'),
(20, 1, '32345678A', 1, '0000-00-00 00:00:00'),
(25, 2, '92345678A', 1, '0000-00-00 00:00:00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`CodigoCompra`),
  ADD KEY `CodigoArticulo` (`CodigoArticulo`),
  ADD KEY `DNIcliente` (`DNIcliente`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `compra_ibfk_1` FOREIGN KEY (`CodigoArticulo`) REFERENCES `articulos` (`CodigoArticulo`) ON DELETE CASCADE,
  ADD CONSTRAINT `compra_ibfk_2` FOREIGN KEY (`DNIcliente`) REFERENCES `clientes` (`NIF`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
