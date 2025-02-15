-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-02-2024 a las 12:05:43
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ap10`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulo`
--

CREATE TABLE `modulo` (
  `Código` int(3) NOT NULL,
  `Nombre` varchar(20) NOT NULL,
  `Num_créditos` int(3) NOT NULL,
  `Especialidad` varchar(20) NOT NULL,
  `dni_profesor` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `modulo`
--

INSERT INTO `modulo` (`Código`, `Nombre`, `Num_créditos`, `Especialidad`, `dni_profesor`) VALUES
(1, 'JAVA', 200, 'Informática', '00225522C'),
(2, 'Diseño Gráfico', 500, 'Diseño', '10225522C'),
(3, 'Lenguaje de Marcas', 350, 'Informática', '02221100P'),
(4, 'WORD', 500, 'Informática', '04441100P'),
(5, 'Bases de Datos', 700, 'Informática', '3321100P'),
(6, 'Dirección de empresa', 360, 'Empresas', '55521100P'),
(7, 'JAVA', 200, 'Informática', '11111100P'),
(8, 'BASES DE DATOS', 500, 'Informática', '11111100P');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesor`
--

CREATE TABLE `profesor` (
  `DNI` varchar(9) NOT NULL,
  `NOMBRE` varchar(30) NOT NULL,
  `Teléfono` int(9) NOT NULL,
  `Sueldo` decimal(7,2) NOT NULL,
  `Población` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `profesor`
--

INSERT INTO `profesor` (`DNI`, `NOMBRE`, `Teléfono`, `Sueldo`, `Población`) VALUES
('00225522C', 'jose LOPEZ', 666333333, '1820.96', 'Valencia'),
('01111100P', 'Carlos Perez', 666333333, '1503.60', 'Alaquas'),
('01221100P', 'Sara Perez', 666333333, '3503.60', 'Valencia'),
('02221100P', 'Miguel García', 666333333, '503.60', 'Valencia'),
('04441100P', 'Carla Martínez', 666333333, '2503.60', 'Catarroja'),
('10225522C', 'jose LOPEZ', 666333333, '3820.96', 'Catarroja'),
('11111100P', 'Pepe Perez', 666333333, '3820.96', 'Alaquas'),
('11225522C', 'CARLOS LOPEZ', 666333333, '820.96', 'Alaquas'),
('3321100P', 'Marta Perez', 666333333, '1503.60', 'Alaquàs'),
('55521100P', 'Miriam Perez', 666333333, '2203.60', 'Xirivella');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `modulo`
--
ALTER TABLE `modulo`
  ADD PRIMARY KEY (`Código`),
  ADD KEY `dni_profesor` (`dni_profesor`);

--
-- Indices de la tabla `profesor`
--
ALTER TABLE `profesor`
  ADD PRIMARY KEY (`DNI`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `modulo`
--
ALTER TABLE `modulo`
  MODIFY `Código` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `modulo`
--
ALTER TABLE `modulo`
  ADD CONSTRAINT `modulo_ibfk_1` FOREIGN KEY (`dni_profesor`) REFERENCES `profesor` (`DNI`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
