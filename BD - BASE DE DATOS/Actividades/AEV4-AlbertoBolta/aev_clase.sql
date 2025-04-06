-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3307
-- Tiempo de generación: 01-04-2025 a las 18:41:39
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
-- Base de datos: `aev_clases`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `DNI` varchar(9) NOT NULL,
  `Nombre` varchar(15) DEFAULT NULL,
  `Apellidos` varchar(20) DEFAULT NULL,
  `Poblacion` varchar(20) DEFAULT 'Valencia',
  `Telefono` varchar(9) DEFAULT NULL,
  `Fecha_nacimiento` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`DNI`, `Nombre`, `Apellidos`, `Poblacion`, `Telefono`, `Fecha_nacimiento`) VALUES
('10655544P', 'JOSE', 'MARTÍNEZ GARCÍA', 'ALAQUAS', '616555444', '1990-06-15'),
('20655544P', 'MARÍA', 'GONZÁLEZ GARCÍA', 'TORRENT', '626555444', '1996-09-09'),
('30655544P', 'MARC', 'SAEZ GONZÁLEZ', 'TORRENT', '636555444', '1998-02-08'),
('40655544P', 'MARTA', 'FERRER MARTÍNEZ', 'VALENCIA', '646555444', '1993-04-04'),
('50655544P', 'FRANCISCO', 'CASAS GARCÍA', 'PATERNA', '656555444', '1980-03-21'),
('60655544A', 'MARTÍN', 'CAMARA GONZÁLEZ', 'XIRIVELLA', '666555447', '2003-02-15'),
('60655544D', 'MARÍA', 'CID GARCÍA', 'TORRENT', '666555442', '2001-11-10'),
('60655544F', 'RODRIGO', 'GONZÁLEZ CAMARA', 'XIRIVELLA', '686555445', '1990-12-15'),
('60655544N', 'RODRIGO', 'FERRER CID', 'TORRENT', '666555449', '1968-03-15'),
('60655544P', 'MARÍA', 'FERRER GARCÍA', 'VALENCIA', '666555444', '2000-02-15'),
('60655544Q', 'MARCOS', 'FERRER SAEZ', 'VALENCIA', '676555444', '1967-06-22'),
('60655544R', 'CATALINA', 'MARTÍN COLON', 'PATERNA', '666555441', '2000-02-12'),
('60655544U', 'CARMEN', 'SANZ CASAS', 'PATERNA', '666555448', '2001-02-13'),
('60655544V', 'MARCOS', 'FERRER SANZ', 'VALENCIA', '676555443', '2001-02-15'),
('70655544P', 'RAUL', 'GONZÁLEZ GARCÍA', 'VALENCIA', '686555444', '1964-07-25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos2000`
--

CREATE TABLE `alumnos2000` (
  `DNI` varchar(9) NOT NULL,
  `Nombre` varchar(15) DEFAULT NULL,
  `Apellidos` varchar(20) DEFAULT NULL,
  `Poblacion` varchar(20) DEFAULT 'Valencia',
  `Telefono` varchar(9) DEFAULT NULL,
  `Fecha_nacimiento` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `alumnos2000`
--

INSERT INTO `alumnos2000` (`DNI`, `Nombre`, `Apellidos`, `Poblacion`, `Telefono`, `Fecha_nacimiento`) VALUES
('10655544P', 'JOSE', 'MARTÍNEZ GARCÍA', 'ALAQUAS', '616555444', '1990-06-15'),
('40655544P', 'MARTA', 'FERRER MARTÍNEZ', 'VALENCIA', '646555444', '1993-04-04'),
('50655544P', 'FRANCISCO', 'CASAS GARCÍA', 'PATERNA', '656555444', '1980-03-21'),
('60655544F', 'RODRIGO', 'GONZÁLEZ CAMARA', 'XIRIVELLA', '686555445', '1990-12-15'),
('60655544N', 'RODRIGO', 'FERRER CID', 'TORRENT', '666555449', '1968-03-15'),
('60655544Q', 'MARCOS', 'FERRER SAEZ', 'VALENCIA', '676555444', '1967-06-22'),
('60655544X', 'JOSE', 'CASAS MARTÍN', 'PATERNA', '696555446', '1998-02-15'),
('70655544P', 'RAUL', 'GONZÁLEZ GARCÍA', 'VALENCIA', '686555444', '1964-07-25'),
('80655544P', 'JOSE', 'CASAS MARTÍN', 'PATERNA', '696555444', '1960-02-15'),
('90655544P', 'MARIO', 'FERRER GONZÁLEZ', 'ALAQUAS', '666555440', '1985-05-02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE `curso` (
  `Codigo` int(4) NOT NULL,
  `Tipo` varchar(15) DEFAULT NULL,
  `Nombre` varchar(30) DEFAULT NULL,
  `Horas` int(3) DEFAULT NULL,
  `DNI_Profesor` varchar(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `curso`
--

INSERT INTO `curso` (`Codigo`, `Tipo`, `Nombre`, `Horas`, `DNI_Profesor`) VALUES
(1, 'INFORMÁTICA', 'PROGRAMACIÓN C++', 550, '11655544P'),
(2, 'INFORMÁTICA', 'PROGRAMACIÓN PHP', 660, '12655544P'),
(3, 'INFORMÁTICA', 'PROGRAMACIÓN JAVA', 440, '11655544P'),
(4, 'INFORMÁTICA', 'APLICACIONES OFIMÁTICAS', 385, '12655544P'),
(5, 'MARKETING', 'COMERCIO INTERNACIONAL', 200, '13655544P'),
(6, 'MARKETING', 'ECONOMÍA', 300, '15655544P'),
(7, 'MARKETING', 'RRHH', 550, '15655544P'),
(8, 'MECÁNICA', 'FORMULA 1', 605, '11655544P'),
(9, 'MECÁNICA', 'CIRCUITOS', 770, '14655544P'),
(10, 'LOGÍSTICA', 'TRANSPORTES', 660, '17655544P'),
(11, 'LOGÍSTICA', 'COMERCIO INTERNACIONAL', 100, '16655544P');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `juveniles`
--

CREATE TABLE `juveniles` (
  `DNI` varchar(9) NOT NULL,
  `Nombre` varchar(15) DEFAULT NULL,
  `Apellidos` varchar(20) DEFAULT NULL,
  `Poblacion` varchar(20) DEFAULT 'Valencia',
  `Telefono` varchar(9) DEFAULT NULL,
  `Fecha_nacimiento` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `juveniles`
--

INSERT INTO `juveniles` (`DNI`, `Nombre`, `Apellidos`, `Poblacion`, `Telefono`, `Fecha_nacimiento`) VALUES
('00655544P', 'MARÍA', 'FERRER GARCÍA', 'VALENCIA', '606555444', '2003-10-11'),
('60655544A', 'MARTÍN', 'CAMARA GONZÁLEZ', 'XIRIVELLA', '666555447', '2003-02-15'),
('60655544D', 'MARÍA', 'CID GARCÍA', 'TORRENT', '666555442', '2001-11-10'),
('60655544P', 'MARÍA', 'FERRER GARCÍA', 'VALENCIA', '666555444', '2000-02-15'),
('60655544R', 'CATALINA', 'MARTÍN COLON', 'PATERNA', '666555441', '2000-02-12'),
('60655544U', 'CARMEN', 'SANZ CASAS', 'PATERNA', '666555448', '2001-02-13'),
('60655544V', 'MARCOS', 'FERRER SANZ', 'VALENCIA', '676555443', '2001-02-15'),
('40655544P', 'MARTA', 'FERRER MARTÍNEZ', 'VALENCIA', '646555444', '1993-04-04'),
('60655544Q', 'MARCOS', 'FERRER SAEZ', 'VALENCIA', '676555444', '1967-06-22'),
('70655544P', 'RAUL', 'GONZÁLEZ GARCÍA', 'VALENCIA', '686555444', '1964-07-25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `matricula`
--

CREATE TABLE `matricula` (
  `Cod_matric` int(4) NOT NULL,
  `DNI_alumno` varchar(9) DEFAULT NULL,
  `Cod_curso` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `matricula`
--

INSERT INTO `matricula` (`Cod_matric`, `DNI_alumno`, `Cod_curso`) VALUES
(1, '40655544P', 2),
(2, '50655544P', 11),
(3, '60655544P', 10),
(4, '60655544P', 2),
(5, '60655544P', 4),
(6, '10655544P', 3),
(7, '60655544P', 2),
(8, '60655544P', 10),
(9, '60655544P', 8),
(10, '60655544P', 8),
(11, '10655544P', 8),
(15, '50655544P', 11),
(16, '60655544F', 10),
(17, '60655544D', 3),
(18, '60655544U', 9),
(19, '60655544Q', 3),
(23, '20655544P', 4),
(24, '30655544P', 4),
(25, '70655544P', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesores`
--

CREATE TABLE `profesores` (
  `DNI` varchar(9) NOT NULL,
  `Nombre` varchar(15) DEFAULT NULL,
  `Apellidos` varchar(20) DEFAULT NULL,
  `Poblacion` varchar(20) DEFAULT 'Valencia',
  `Edad` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `profesores`
--

INSERT INTO `profesores` (`DNI`, `Nombre`, `Apellidos`, `Poblacion`, `Edad`) VALUES
('10655544P', 'RAQUEL', 'FERNÁNDEZ REVUELTA', 'VALENCIA', 46),
('11655544P', 'NURIA', 'MARTÍNEZ SAEZ', 'ALDAIA', 50),
('12655544P', 'JOSE', 'CUENCA MÁS', 'VALENCIA', 56),
('13655544P', 'FRANCISCO', 'ROJO SAEZ', 'TORRENT', 43),
('14655544P', 'CARLOS', 'TORO CASAS', 'Catarroja', 29),
('15655544P', 'DAVID', 'LEÓN RODRÍGUEZ', 'Catarroja', 35),
('16655544P', 'DAVID', 'GARCÍA FERRER', 'ALDAIA', 38),
('17655544P', 'FERNANDO', 'FERRER CÁMARA', 'TORRENT', 42),
('18655544P', 'MARTA', 'AMARILLO RUIZ', 'PAIPORTA', 59),
('19655544P', 'MIGUEL', 'SANZ LÓPEZ', 'TORRENT', 60);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`DNI`);

--
-- Indices de la tabla `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`Codigo`),
  ADD KEY `FK_Profesor_Curso` (`DNI_Profesor`);

--
-- Indices de la tabla `matricula`
--
ALTER TABLE `matricula`
  ADD PRIMARY KEY (`Cod_matric`),
  ADD KEY `DNI_alumno` (`DNI_alumno`),
  ADD KEY `Cod_curso` (`Cod_curso`);

--
-- Indices de la tabla `profesores`
--
ALTER TABLE `profesores`
  ADD PRIMARY KEY (`DNI`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `curso`
--
ALTER TABLE `curso`
  MODIFY `Codigo` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `matricula`
--
ALTER TABLE `matricula`
  MODIFY `Cod_matric` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `curso`
--
ALTER TABLE `curso`
  ADD CONSTRAINT `FK_Profesor_Curso` FOREIGN KEY (`DNI_Profesor`) REFERENCES `profesores` (`DNI`) ON DELETE CASCADE;

--
-- Filtros para la tabla `matricula`
--
ALTER TABLE `matricula`
  ADD CONSTRAINT `matricula_ibfk_1` FOREIGN KEY (`DNI_alumno`) REFERENCES `alumnos` (`DNI`) ON DELETE CASCADE,
  ADD CONSTRAINT `matricula_ibfk_2` FOREIGN KEY (`Cod_curso`) REFERENCES `curso` (`Codigo`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
