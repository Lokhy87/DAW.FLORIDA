-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3307
-- Tiempo de generación: 10-03-2025 a las 16:49:14
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
-- Base de datos: `concesionario`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `coches`
--

CREATE TABLE `coches` (
  `MATRICULA` varchar(7) NOT NULL,
  `MODELO` varchar(20) DEFAULT NULL,
  `MARCA` varchar(20) DEFAULT NULL,
  `CILINDRADA` smallint(6) DEFAULT NULL,
  `NIF` varchar(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `CODIGO_COMPRA` int(4) NOT NULL,
  `MATRICULA_COCHE` varchar(7) DEFAULT NULL,
  `PRECIO` decimal(5,2) DEFAULT NULL,
  `FECHA_COMPRA` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `propietarios`
--

CREATE TABLE `propietarios` (
  `NIF` varchar(9) NOT NULL,
  `NOMBRE` varchar(15) DEFAULT NULL,
  `EDAD` int(3) DEFAULT NULL,
  `POBLACION` varchar(15) DEFAULT 'VALENCIA',
  `MOVIL` varchar(9) DEFAULT NULL,
  `APELLIDOS` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `coches`
--
ALTER TABLE `coches`
  ADD PRIMARY KEY (`MATRICULA`),
  ADD KEY `FK_PROPIETARIO` (`NIF`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`CODIGO_COMPRA`),
  ADD KEY `REL2` (`MATRICULA_COCHE`);

--
-- Indices de la tabla `propietarios`
--
ALTER TABLE `propietarios`
  ADD PRIMARY KEY (`NIF`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `CODIGO_COMPRA` int(4) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `coches`
--
ALTER TABLE `coches`
  ADD CONSTRAINT `FK_PROPIETARIO` FOREIGN KEY (`NIF`) REFERENCES `propietarios` (`NIF`) ON DELETE CASCADE;

--
-- Filtros para la tabla `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `REL2` FOREIGN KEY (`MATRICULA_COCHE`) REFERENCES `coches` (`MATRICULA`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
