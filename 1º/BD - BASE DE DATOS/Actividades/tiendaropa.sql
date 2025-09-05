-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3307
-- Tiempo de generación: 13-04-2025 a las 18:49:51
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
-- Estructura de tabla para la tabla `articulos`
--

CREATE TABLE `articulos` (
  `CodigoArticulo` int(6) NOT NULL,
  `Tipo` varchar(20) DEFAULT NULL,
  `Marca` varchar(20) DEFAULT NULL,
  `Color` varchar(10) DEFAULT NULL,
  `Talla` varchar(2) DEFAULT NULL,
  `Precio` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `articulos`
--

INSERT INTO `articulos` (`CodigoArticulo`, `Tipo`, `Marca`, `Color`, `Talla`, `Precio`) VALUES
(1, 'Pantalón', 'Levi’s', 'Azul', 'L', 62.69),
(2, 'Pantalón', 'Levi’s', 'Azul', 'M', 62.69),
(3, 'Pantalón', 'Levi’s', 'Azul', 'XL', 62.69),
(4, 'Pantalón', 'Levi’s', 'Negro', 'L', 65.54),
(5, 'Pantalón', 'Levi’s', 'Negro', 'XL', 65.54);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `NIF` varchar(9) NOT NULL,
  `Nombre` varchar(15) DEFAULT NULL,
  `Apellidos` varchar(30) DEFAULT NULL,
  `Edad` int(3) DEFAULT NULL,
  `Poblacion` varchar(15) DEFAULT 'Valencia',
  `Movil` varchar(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`NIF`, `Nombre`, `Apellidos`, `Edad`, `Poblacion`, `Movil`) VALUES
('02345678A', 'Sofía', 'González García', 26, 'Paterna', '612345670'),
('12345678A', 'Marta', 'González Rojo', 30, 'Valencia', '612345679'),
('22345678A', 'Carla', 'Rojo García', 35, 'Catarroja', '612345678'),
('32345678A', 'José', 'Martínez Alonso', 28, 'Valencia', '612345677'),
('42345678A', 'Cristian', 'Revuelta García', 29, 'Valencia', '612345676'),
('52345678A', 'Adrián', 'Alonso González', 62, 'Catarroja', '612345675'),
('62345678A', 'Carlos', 'Sevilla Sáez', 56, 'Paterna', '612345674'),
('72345678A', 'Paco', 'Jiménez Ferrero', 30, 'Picanya', '612345673'),
('82345678A', 'José', 'Herrero Rojo', 36, 'Catarroja', '612345672'),
('92345678A', 'María', 'Delgado García', 53, 'Valencia', '612345671');

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comprasenero`
--

CREATE TABLE `comprasenero` (
  `CodigoCompra` int(11) NOT NULL,
  `CodigoArticulo` int(6) DEFAULT NULL,
  `Cantidad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partesdearriba`
--

CREATE TABLE `partesdearriba` (
  `CodigoArticulo` int(6) NOT NULL,
  `Tipo` varchar(20) DEFAULT NULL,
  `Marca` varchar(20) DEFAULT NULL,
  `Color` varchar(10) DEFAULT NULL,
  `Talla` varchar(2) DEFAULT NULL,
  `Precio` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `partesdearriba`
--

INSERT INTO `partesdearriba` (`CodigoArticulo`, `Tipo`, `Marca`, `Color`, `Talla`, `Precio`) VALUES
(6, 'Camiseta', 'Nike', 'Roja', 'L', 25.99),
(7, 'Camiseta', 'Nike', 'Roja', 'S', 25.99),
(8, 'Camiseta', 'Nike', 'Blanca', 'L', 27.99),
(9, 'Camiseta', 'Nike', 'Blanca', 'M', 27.99),
(10, 'Camiseta', 'Adidas', 'Gris', 'XL', 29.99),
(11, 'Camiseta', 'Adidas', 'Amarilla', 'M', 29.99),
(12, 'Camiseta', 'Adidas', 'Amarilla', 'L', 29.99),
(13, 'Sudadera', 'Nike', 'Azul claro', 'L', 45.99),
(14, 'Sudadera', 'Nike', 'Azul claro', 'XL', 45.99),
(15, 'Sudadera', 'Adidas', 'Verde', 'L', 42.99),
(16, 'Sudadera', 'Adidas', 'Verde', 'XL', 42.99),
(17, 'Sudadera', 'Adidas', 'Gris', 'L', 42.99),
(18, 'Sudadera', 'Adidas', 'Verde', 'M', 42.99),
(1, 'Pantalón', 'Levi’s', 'Azul', 'L', 62.69),
(2, 'Pantalón', 'Levi’s', 'Azul', 'M', 62.69),
(3, 'Pantalón', 'Levi’s', 'Azul', 'XL', 62.69),
(4, 'Pantalón', 'Levi’s', 'Negro', 'L', 65.54),
(5, 'Pantalón', 'Levi’s', 'Negro', 'XL', 65.54);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD PRIMARY KEY (`CodigoArticulo`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`NIF`);

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
