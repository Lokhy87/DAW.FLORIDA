-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3307
-- Tiempo de generación: 28-03-2025 a las 18:40:33
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
  `NIF` varchar(9) DEFAULT NULL,
  `Fecha_Compra` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `coches`
--

INSERT INTO `coches` (`MATRICULA`, `MODELO`, `MARCA`, `NIF`, `Fecha_Compra`) VALUES
('0114AAA', 'YARIS', 'TOYOTA', '10655544P', '2016-02-18'),
('1012AAB', 'YARIS', 'TOYOTA', '60655544V', '2015-02-05'),
('1012AAC', 'CLIO', 'RENAULT', '40655544P', '2012-02-08'),
('1012AAD', 'YARIS', 'TOYOTA', '60655544V', '2020-02-11'),
('1013AAA', 'FOCUS', 'FORD', '50655544P', '2014-02-13'),
('1112AAA', 'FOCUS', 'FORD', '40655544P', '2018-01-03'),
('1113AAA', 'FOCUS', 'FORD', '50655544P', '2018-01-05'),
('1114AAA', 'COROLLA', 'TOYOTA', '10655544P', '2018-01-06'),
('1115AAA', 'CLIO', 'RENAULT', '20655544P', '2019-01-10'),
('1116AAA', 'FOCUS', 'FORD', '60655544R', '2019-01-15'),
('1117AAA', 'YARIS', 'TOYOTA', '40655544P', '2017-01-16'),
('1118AAA', 'FOCUS', 'FORD', '60655544R', '2017-01-19'),
('1119AAA', 'FIESTA', 'FORD', '40655544P', '2018-01-28'),
('2115AAA', 'CAPTUR', 'RENAULT', '60655544N', '2014-02-20'),
('3116AAA', 'FIESTA', 'FORD', '60655544R', '2012-02-25'),
('4117AAA', 'COROLLA', 'TOYOTA', '60655544F', '2011-03-02'),
('5118AAA', 'FOCUS', 'FORD', '60655544R', '2020-03-06'),
('6119AAA', 'FIESTA', 'FORD', '40655544P', '2020-03-08'),
('7112AAB', 'COROLLA', 'TOYOTA', '60655544F', '2019-03-10'),
('8112AAC', 'CAPTUR', 'RENAULT', '60655544N', '2019-03-10'),
('9112AAD', 'YARIS', 'TOYOTA', '60655544N', '2019-03-15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `infantil`
--

CREATE TABLE `infantil` (
  `NIF` varchar(9) NOT NULL,
  `NOMBRE` varchar(15) DEFAULT NULL,
  `EDAD` int(3) DEFAULT NULL,
  `POBLACION` varchar(15) DEFAULT 'VALENCIA',
  `MOVIL` varchar(9) DEFAULT NULL,
  `APELLIDOS` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `infantil`
--

INSERT INTO `infantil` (`NIF`, `NOMBRE`, `EDAD`, `POBLACION`, `MOVIL`, `APELLIDOS`) VALUES
('00655544P', 'MARÍA', 25, 'VALENCIA', '606555444', 'FERRER GARCÍA'),
('20655544P', 'MARÍA', 19, 'TORRENT', '626555444', 'GONZÁLEZ GARCÍA'),
('60655544P', 'MARÍA', 25, 'VALENCIA', '666555444', 'FERRER GARCÍA'),
('60655544Q', 'MARCOS', 26, 'VALENCIA', '676555444', 'FERRER SAEZ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `juveniles`
--

CREATE TABLE `juveniles` (
  `NIF` varchar(9) NOT NULL,
  `NOMBRE` varchar(15) DEFAULT NULL,
  `EDAD` int(3) DEFAULT NULL,
  `POBLACION` varchar(15) DEFAULT 'VALENCIA',
  `MOVIL` varchar(9) DEFAULT NULL,
  `APELLIDOS` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `juveniles`
--

INSERT INTO `juveniles` (`NIF`, `NOMBRE`, `EDAD`, `POBLACION`, `MOVIL`, `APELLIDOS`) VALUES
('60655544R', 'CATALINA', 29, 'PATERNA', '666555441', 'MARTÍN COLON'),
('60655544U', 'CARMEN', 29, 'PATERNA', '666555448', 'SANZ CASAS'),
('00655544P', 'MARÍA', 25, 'VALENCIA', '606555444', 'FERRER GARCÍA'),
('20655544P', 'MARÍA', 19, 'TORRENT', '626555444', 'GONZÁLEZ GARCÍA'),
('60655544P', 'MARÍA', 25, 'VALENCIA', '666555444', 'FERRER GARCÍA'),
('60655544Q', 'MARCOS', 26, 'VALENCIA', '676555444', 'FERRER SAEZ');

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
-- Volcado de datos para la tabla `propietarios`
--

INSERT INTO `propietarios` (`NIF`, `NOMBRE`, `EDAD`, `POBLACION`, `MOVIL`, `APELLIDOS`) VALUES
('00655544P', 'MARÍA', 25, 'VALENCIA', '606555444', 'FERRER GARCÍA'),
('10655544P', 'JOSE', 35, 'PAIPORTA', '616555444', 'MARTÍNEZ GARCÍA'),
('20655544P', 'MARÍA', 19, 'ALDAIA', '626555444', 'GONZÁLEZ GARCÍA'),
('30655544P', 'MARC', 58, 'TORRENT', '636555444', 'SAEZ GONZÁLEZ'),
('40655544P', 'MARTA', 60, 'ALDAIA', '646555444', 'FERRER MARTÍNEZ'),
('50655544P', 'FRANCISCO', 38, 'PAIPORTA', '656555444', 'CASAS GARCÍA'),
('60655544A', 'MARTÍN', 71, 'XIRIVELLA', '666555447', 'CAMARA GONZÁLEZ'),
('60655544D', 'MARÍA', 33, 'TORRENT', '666555442', 'CID GARCÍA'),
('60655544F', 'RODRIGO', 52, 'XIRIVELLA', '686555445', 'GONZÁLEZ CAMARA'),
('60655544N', 'RODRIGO', 38, 'PAIPORTA', '666555449', 'FERRER CID'),
('60655544P', 'MARÍA', 25, 'VALENCIA', '666555444', 'FERRER GARCÍA'),
('60655544Q', 'MARCOS', 26, 'VALENCIA', '676555444', 'FERRER SAEZ'),
('60655544R', 'CATALINA', 29, 'ALDAIA', '666555441', 'MARTÍN COLON'),
('60655544U', 'CARMEN', 29, 'PATERNA', '666555448', 'SANZ CASAS'),
('60655544V', 'MARCOS', 56, 'VALENCIA', '676555443', 'FERRER SANZ'),
('60655544X', 'JOSE', 37, 'PAIPORTA', '696555446', 'CASAS MARTÍN'),
('70655544P', 'RAUL', 32, 'VALENCIA', '686555444', 'GONZÁLEZ GARCÍA'),
('80655544P', 'JOSE', 47, 'PAIPORTA', '696555444', 'CASAS MARTÍN'),
('90655544P', 'MARIO', 70, 'ALAQUAS', '666555440', 'FERRER GONZÁLEZ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reparaciones`
--

CREATE TABLE `reparaciones` (
  `Cod_Reparaciones` int(5) NOT NULL,
  `Matrícula` varchar(7) DEFAULT NULL,
  `Fecha_Reparacion` date DEFAULT NULL,
  `Presupuesto` decimal(5,2) DEFAULT NULL,
  `Cod_Taller` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `reparaciones`
--

INSERT INTO `reparaciones` (`Cod_Reparaciones`, `Matrícula`, `Fecha_Reparacion`, `Presupuesto`, `Cod_Taller`) VALUES
(1, '0114AAA', '2021-02-15', 153.63, 2),
(2, '1113AAA', '2021-02-05', 53.63, 2),
(4, '1118AAA', '2021-02-10', 153.63, 3),
(6, '8112AAC', '2021-01-15', 99.63, 2),
(8, '1116AAA', '2021-01-18', 153.83, 2),
(10, '1112AAA', '2021-01-22', 628.77, 2),
(11, '1119AAA', '2021-03-22', 283.63, 3),
(12, '9112AAD', '2021-01-05', 588.27, 2),
(18, '1113AAA', '2021-03-18', 768.45, 2),
(20, '8112AAC', '2021-04-22', 547.77, 2),
(21, '1113AAA', '2021-04-22', 183.63, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `repsuperiores`
--

CREATE TABLE `repsuperiores` (
  `MATRICULA` varchar(7) NOT NULL,
  `MARCA` varchar(20) DEFAULT NULL,
  `MODELO` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `repsuperiores`
--

INSERT INTO `repsuperiores` (`MATRICULA`, `MARCA`, `MODELO`) VALUES
('1112AAA', 'FORD', 'FOCUS'),
('9112AAD', 'TOYOTA', 'YARIS'),
('1113AAA', 'FORD', 'FOCUS'),
('8112AAC', 'RENAULT', 'CAPTUR');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `talleres`
--

CREATE TABLE `talleres` (
  `Cod_Taller` int(5) NOT NULL,
  `Población` varchar(15) DEFAULT 'Valencia',
  `Dirección` varchar(35) DEFAULT NULL,
  `Teléfono` varchar(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `talleres`
--

INSERT INTO `talleres` (`Cod_Taller`, `Población`, `Dirección`, `Teléfono`) VALUES
(1, 'Valencia', 'COLON 3', '629669669'),
(2, 'PATERNA', 'BLASCO IBAÑEZ 25', '699669669'),
(3, 'TORRENT', 'SORIA 3', '689669669'),
(4, 'Valencia', 'ALCOI 58', '679669669'),
(5, 'Valencia', 'MAYOR 3', '669669669'),
(6, 'Valencia', 'CID 23', '659669669');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `toyotaantiguos`
--

CREATE TABLE `toyotaantiguos` (
  `MATRICULA` varchar(7) NOT NULL,
  `MODELO` varchar(20) DEFAULT NULL,
  `MARCA` varchar(20) DEFAULT NULL,
  `NIF` varchar(9) DEFAULT NULL,
  `Fecha_Compra` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `toyotaantiguos`
--

INSERT INTO `toyotaantiguos` (`MATRICULA`, `MODELO`, `MARCA`, `NIF`, `Fecha_Compra`) VALUES
('1114AAA', 'COROLLA', 'TOYOTA', '10655544P', '2018-01-06'),
('1117AAA', 'YARIS', 'TOYOTA', '40655544P', '2017-01-16'),
('4117AAA', 'COROLLA', 'TOYOTA', '60655544F', '2011-03-02');

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
-- Indices de la tabla `propietarios`
--
ALTER TABLE `propietarios`
  ADD PRIMARY KEY (`NIF`);

--
-- Indices de la tabla `reparaciones`
--
ALTER TABLE `reparaciones`
  ADD PRIMARY KEY (`Cod_Reparaciones`),
  ADD KEY `fk_reparaciones_coches` (`Matrícula`),
  ADD KEY `fk_reparaciones_talleres` (`Cod_Taller`);

--
-- Indices de la tabla `talleres`
--
ALTER TABLE `talleres`
  ADD PRIMARY KEY (`Cod_Taller`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `reparaciones`
--
ALTER TABLE `reparaciones`
  MODIFY `Cod_Reparaciones` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `talleres`
--
ALTER TABLE `talleres`
  MODIFY `Cod_Taller` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `coches`
--
ALTER TABLE `coches`
  ADD CONSTRAINT `FK_PROPIETARIO` FOREIGN KEY (`NIF`) REFERENCES `propietarios` (`NIF`) ON DELETE CASCADE;

--
-- Filtros para la tabla `reparaciones`
--
ALTER TABLE `reparaciones`
  ADD CONSTRAINT `fk_reparaciones_coches` FOREIGN KEY (`Matrícula`) REFERENCES `coches` (`MATRICULA`),
  ADD CONSTRAINT `fk_reparaciones_talleres` FOREIGN KEY (`Cod_Taller`) REFERENCES `talleres` (`Cod_Taller`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
