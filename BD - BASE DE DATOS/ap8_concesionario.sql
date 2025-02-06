-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-01-2022 a las 11:50:27
-- Versión del servidor: 10.4.16-MariaDB
-- Versión de PHP: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ap8_concesionario`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `coches`
--

CREATE TABLE `coches` (
  `Matrícula` varchar(7) NOT NULL,
  `Modelo` varchar(20) NOT NULL,
  `Marca` varchar(20) NOT NULL,
  `Cilindrada` int(5) NOT NULL,
  `Fecha_compra` date NOT NULL,
  `Precio` int(11) NOT NULL,
  `NIF_propietario` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `coches`
--

INSERT INTO `coches` (`Matrícula`, `Modelo`, `Marca`, `Cilindrada`, `Fecha_compra`, `Precio`, `NIF_propietario`) VALUES
('1234ABC', 'FOCUS', 'FORD', 150, '2020-10-13', 25997, '02345455Y'),
('1235ABC', 'YARIS', 'TOYOTA', 100, '2020-12-13', 14368, '14345455Y'),
('1598ZZY', 'AURIS', 'TOYOTA', 100, '2021-01-16', 14368, '72345455Y'),
('1854KKO', 'FOCUS', 'FORD', 150, '2020-09-15', 26987, '22345455Y'),
('2222DFE', 'FIESTA', 'FORD', 75, '2021-01-16', 14368, '52345455Y'),
('2222DFK', 'FIESTA', 'FORD', 100, '2021-01-12', 14368, '15345455Y'),
('2598ZZY', 'IBIZA', 'SEAT', 90, '2020-02-13', 15003, '22345455Y'),
('3398HYT', 'CLIO', 'RENAULT', 90, '2020-12-13', 12909, '82345455Y'),
('6598GYT', 'GOLF', 'VOLKSWAGEN', 120, '2019-05-15', 22997, '62345455Y'),
('6598HYT', 'LEON', 'SEAT', 100, '2020-10-13', 18000, '13345455Y'),
('6634ABC', 'KANGOO', 'RENAULT', 100, '2019-05-15', 14368, '15345455Y'),
('8585ERF', 'YARIS', 'TOYOTA', 100, '2020-10-13', 14368, '22345455Y'),
('8585ERO', 'CLIO', 'RENAULT', 100, '2020-02-13', 14368, '02345455Y'),
('9864KKL', 'YARIS', 'TOYOTA', 90, '2021-01-18', 15000, '92345455Y');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `propietario`
--

CREATE TABLE `propietario` (
  `NIF` varchar(9) NOT NULL,
  `Nombre` varchar(30) NOT NULL,
  `Edad` int(3) NOT NULL,
  `Población` varchar(20) NOT NULL,
  `Móvil` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `propietario`
--

INSERT INTO `propietario` (`NIF`, `Nombre`, `Edad`, `Población`, `Móvil`) VALUES
('02345455Y', 'Sara Soler', 65, 'Valencia', 666999859),
('11345455Y', 'Martín Más', 37, 'Catarroja', 666999859),
('12345455Y', 'Miguel Chacón', 35, 'Alaquas', 666999859),
('13345455Y', 'Ana Gómez', 39, 'Aldaia', 666999859),
('14345455Y', 'Luz Miguel', 44, 'Aldaia', 666999859),
('15345455Y', 'Carmen Casas', 45, 'Alaquas', 666999859),
('22345455Y', 'Carla Ruíz', 55, 'Alaquas', 666999859),
('32345455Y', 'Marta Sanz', 63, 'Torrent', 666999859),
('42345455Y', 'Paco Herrero', 35, 'Catarroja', 666999859),
('52345455Y', 'José Fernández', 45, 'Alaquas', 666999859),
('62345455Y', 'Carlos Sevilla', 34, 'Valencia', 666999859),
('72345455Y', 'David Valencia', 19, 'Torrent', 666999859),
('82345455Y', 'Alejandra Martínez', 22, 'Valencia', 666999859),
('892345455', 'Jose García', 32, 'Torrent', 666999859),
('92345455Y', 'José Murcia', 24, 'Aldaia', 666999859),
('99345455Y', 'Cristian Jiménez', 25, 'Valencia', 666999859);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `coches`
--
ALTER TABLE `coches`
  ADD PRIMARY KEY (`Matrícula`),
  ADD KEY `rel1` (`NIF_propietario`);

--
-- Indices de la tabla `propietario`
--
ALTER TABLE `propietario`
  ADD PRIMARY KEY (`NIF`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `coches`
--
ALTER TABLE `coches`
  ADD CONSTRAINT `rel1` FOREIGN KEY (`NIF_propietario`) REFERENCES `propietario` (`NIF`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
