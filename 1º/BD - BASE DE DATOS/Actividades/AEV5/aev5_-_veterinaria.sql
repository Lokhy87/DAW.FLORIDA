-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3307
-- Tiempo de generación: 03-05-2025 a las 11:19:32
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
-- Base de datos: `aev5 - veterinaria`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `actualizar_precio_tratamiento` (IN `cod` INT, IN `nuevo_precio` DECIMAL(5,2))   BEGIN
  UPDATE tratamientos
  SET Precio = nuevo_precio
  WHERE Cod_Tratamiento = cod;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `almacen_consul_perro` ()   BEGIN
	SELECT DISTINCT c.* 
    FROM clientes c
    JOIN mascotas m ON c.Dni = m.Dni_Cliente
    WHERE m.Raza = 'Perro';
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `calcular_descuento_tratamiento` (IN `cod` INT)   BEGIN
  DECLARE precio_original DECIMAL(5,2);
  DECLARE precio_descuento DECIMAL(5,2);
  DECLARE descuento DECIMAL(3,2) DEFAULT 0.10;

  -- Obtener el precio original del tratamiento
  SELECT Precio INTO precio_original
  FROM tratamientos
  WHERE Cod_Tratamiento = cod;

  -- Calcular el nuevo precio con descuento
  SET precio_descuento = precio_original * (1 - descuento);

  -- Mostrar resultados
  SELECT 
    precio_original AS 'Precio original',
    precio_descuento AS 'Precio con 10% de descuento';
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `clientes_menores30` ()   BEGIN
	SELECT * FROM clientes
    WHERE Edad < 30;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `mascotas_antes_enero2021` ()   BEGIN
	SELECT DISTINCT m.*
    FROM mascotas m
    JOIN consultas c ON m.Codigo = c.Cod_Mascota
    WHERE c.Fecha < '2021-01-01';
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `Dni` varchar(9) NOT NULL,
  `Nombre` varchar(50) DEFAULT NULL,
  `Apellidos` varchar(50) DEFAULT NULL,
  `Población` varchar(20) NOT NULL,
  `Teléfono` varchar(9) NOT NULL,
  `Edad` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`Dni`, `Nombre`, `Apellidos`, `Población`, `Teléfono`, `Edad`) VALUES
('12345432W', 'Rafa', 'Soriano Martínez', 'Valencia', '656569853', 50),
('12345433W', 'Samuel', 'Martinez', 'Catarroja', '966569853', 30),
('12345643D', 'Cris', 'Ferrer', 'Alaquas', '656229853', 48),
('12546987S', 'Francisco', 'García Martínez', 'Alaquas', '966569852', 68),
('15546987P', 'Carlos', 'Soria Cruz', 'Picanya', '', 80),
('21485631F', 'Soledad', 'García Delgado', 'Valencia', '652569853', 45),
('23456754D', 'Jose', 'Calvo', 'Torrent', '', 65),
('25685631F', 'Mónica', 'Morales Delgado', 'Torrent', '611569852', 35),
('34567823D', 'Amparo', 'Canos', 'Catarroja', '698885985', 56),
('34567898D', 'Carlos', 'Perez', 'Valencia', '', 56),
('35685631F', 'Carmen', 'Aguas Santos', 'Alaquas', '698885922', 37),
('62685631F', 'José', 'Casa Santos', 'Alaquas', '', 24),
('66546987S', 'Martín', 'García Martínez', 'Torrent', '696969852', 38),
('98546987S', 'Carlos', 'Cámara Cruz', 'Picanya', '622569852', 25);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consultas`
--

CREATE TABLE `consultas` (
  `ID_Consulta` int(4) NOT NULL,
  `Cod_Mascota` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `Cod_Tratamiento` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `consultas`
--

INSERT INTO `consultas` (`ID_Consulta`, `Cod_Mascota`, `Fecha`, `Cod_Tratamiento`) VALUES
(1, 18, '2021-01-03', 3),
(2, 6, '2020-11-05', 9),
(3, 15, '2020-10-03', 4),
(4, 11, '2020-11-05', 8),
(5, 15, '2021-01-04', 3),
(6, 14, '2021-01-05', 6),
(7, 7, '2021-01-12', 6),
(8, 12, '2020-09-05', 8),
(9, 4, '2020-01-03', 9),
(10, 16, '2021-01-05', 6),
(11, 17, '2020-01-03', 6),
(12, 14, '2020-09-05', 5),
(13, 18, '2021-01-12', 5),
(14, 1, '2020-11-05', 1),
(15, 18, '2021-01-12', 1),
(16, 8, '2021-10-25', 9),
(17, 7, '2020-01-03', 6),
(18, 5, '2021-10-25', 2),
(19, 10, '2021-01-03', 2),
(20, 14, '2020-09-05', 2),
(21, 9, '2021-01-12', 4),
(22, 13, '2020-11-05', 8);

--
-- Disparadores `consultas`
--
DELIMITER $$
CREATE TRIGGER `actualizar_cantidad_tratam` AFTER INSERT ON `consultas` FOR EACH ROW BEGIN
	UPDATE tratamientos
    SET Cantidad = Cantidad - 1
    WHERE Cod_tratamiento = NEW.Cod_tratamiento;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gestion`
--

CREATE TABLE `gestion` (
  `Cod_registro` int(4) NOT NULL,
  `Cod_tratamiento` int(4) DEFAULT NULL,
  `Descripcion_ant` varchar(25) DEFAULT NULL,
  `Descripcion_nuevo` varchar(25) DEFAULT NULL,
  `Fecha_registro` datetime DEFAULT NULL,
  `Precio_ant` decimal(5,2) DEFAULT NULL,
  `Precio_nuevo` decimal(5,2) DEFAULT NULL,
  `Cantidad_ant` int(11) DEFAULT NULL,
  `Cantidad_nueva` int(11) DEFAULT NULL,
  `Accion` varchar(20) DEFAULT NULL,
  `Usuario` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mascotas`
--

CREATE TABLE `mascotas` (
  `Codigo` int(11) NOT NULL,
  `Nombre` varchar(50) DEFAULT NULL,
  `Raza` varchar(50) DEFAULT NULL,
  `Dni_Cliente` varchar(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `mascotas`
--

INSERT INTO `mascotas` (`Codigo`, `Nombre`, `Raza`, `Dni_Cliente`) VALUES
(1, 'Sparky', 'Hamster', '12345432W'),
(2, 'Sam', 'Gato', '34567823D'),
(3, 'Kinder', 'Gato', '23456754D'),
(4, 'Charly', 'perro', '12345643D'),
(5, 'Pepe', 'Cobaya', '12345432W'),
(6, 'Yasi', 'Cobaya', '12345432W'),
(7, 'Dona', 'Perro', '12345433W'),
(8, 'Pepito', 'Gato', '66546987S'),
(9, 'Hulk', 'Perro', '15546987P'),
(10, 'Chiqui', 'Hamster', '34567898D'),
(11, 'Toby', 'Perro', '35685631F'),
(12, 'Mickey', 'Perro', '66546987S'),
(13, 'Luna', 'Perro', '23456754D'),
(14, 'Picapica', 'Cobaya', '12345432W'),
(15, 'Batman', 'Gato', '98546987S'),
(16, 'Spiderman', 'Hamster', '98546987S'),
(17, 'Grunch', 'Perro', '62685631F'),
(18, 'Aquaman', 'Gato', '66546987S');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tratamientos`
--

CREATE TABLE `tratamientos` (
  `Cod_Tratamiento` int(4) NOT NULL,
  `Descripción` varchar(25) NOT NULL,
  `Precio` decimal(5,2) NOT NULL,
  `Cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tratamientos`
--

INSERT INTO `tratamientos` (`Cod_Tratamiento`, `Descripción`, `Precio`, `Cantidad`) VALUES
(1, 'Revisión anual', 75.00, 2),
(2, 'Vacuna', 60.00, 1),
(3, 'Operación castrado', 200.00, 5),
(4, 'Operación invasiva', 300.00, 3),
(5, 'Herida', 40.99, 2),
(6, 'Peluquería', 24.99, 4),
(7, 'Tratamiento Cáncer', 360.00, 2),
(8, 'Ecografía', 99.99, 1),
(9, 'Placa', 150.00, 10);

--
-- Disparadores `tratamientos`
--
DELIMITER $$
CREATE TRIGGER `Tratam_gestion` AFTER INSERT ON `tratamientos` FOR EACH ROW BEGIN
	INSERT INTO gestion (Cod_tratamiento, Descripcion_nuevo, Fecha_registro, Precio_nuevo, Cantidad_nueva, Accion, Usuario)
	VALUES (NEW.Cod_tratamiento, NEW.Descripción, NOW(), NEW.Precio, NEW.Cantidad, 'NUEV', CURRENT_USER());
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `eliminar_tratam` AFTER DELETE ON `tratamientos` FOR EACH ROW BEGIN
	INSERT INTO gestion (Cod_tratamiento, Descripcion_ant, Fecha_registro, Precio_ant, Cantidad_ant, Accion, Usuario)
    VALUES (OLD.Cod_tratamiento, OLD.Descripción, NOW(), OLD.Precio, OLD.Cantidad, 'ELIMINACION', USER());
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `limitar_precio_tratamiento` BEFORE UPDATE ON `tratamientos` FOR EACH ROW BEGIN
  IF NEW.Precio < 20 THEN
    SET NEW.Precio = 20;
  ELSEIF NEW.Precio > 500 THEN
    SET NEW.Precio = 500;
  END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `modf_tratam_gestion` AFTER UPDATE ON `tratamientos` FOR EACH ROW BEGIN
  INSERT INTO gestion (Cod_tratamiento, Descripcion_ant, Descripcion_nuevo, Fecha_registro, Precio_ant, Precio_nuevo, Cantidad_ant, Cantidad_nueva, Accion, Usuario)
  VALUES (OLD.Cod_tratamiento, OLD.Descripción, NEW.Descripción, NOW(), OLD.Precio, NEW.Precio, OLD.Cantidad, NEW.Cantidad, 'MODIFICACION', USER());
END
$$
DELIMITER ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`Dni`);

--
-- Indices de la tabla `consultas`
--
ALTER TABLE `consultas`
  ADD PRIMARY KEY (`ID_Consulta`),
  ADD KEY `Cod_Mascota` (`Cod_Mascota`),
  ADD KEY `Cod_Tratamiento` (`Cod_Tratamiento`);

--
-- Indices de la tabla `gestion`
--
ALTER TABLE `gestion`
  ADD PRIMARY KEY (`Cod_registro`);

--
-- Indices de la tabla `mascotas`
--
ALTER TABLE `mascotas`
  ADD PRIMARY KEY (`Codigo`),
  ADD KEY `mascotas_ibfk_1` (`Dni_Cliente`);

--
-- Indices de la tabla `tratamientos`
--
ALTER TABLE `tratamientos`
  ADD PRIMARY KEY (`Cod_Tratamiento`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `consultas`
--
ALTER TABLE `consultas`
  MODIFY `ID_Consulta` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `gestion`
--
ALTER TABLE `gestion`
  MODIFY `Cod_registro` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `mascotas`
--
ALTER TABLE `mascotas`
  MODIFY `Codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `tratamientos`
--
ALTER TABLE `tratamientos`
  MODIFY `Cod_Tratamiento` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `consultas`
--
ALTER TABLE `consultas`
  ADD CONSTRAINT `consultas_ibfk_1` FOREIGN KEY (`Cod_Mascota`) REFERENCES `mascotas` (`Codigo`),
  ADD CONSTRAINT `consultas_ibfk_2` FOREIGN KEY (`Cod_Tratamiento`) REFERENCES `tratamientos` (`Cod_Tratamiento`);

--
-- Filtros para la tabla `mascotas`
--
ALTER TABLE `mascotas`
  ADD CONSTRAINT `mascotas_ibfk_1` FOREIGN KEY (`Dni_Cliente`) REFERENCES `clientes` (`Dni`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
