-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 03-06-2023 a las 07:23:54
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `P9Final`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `referencia`
--

CREATE TABLE `referencia` (
  `referencia` int(11) NOT NULL,
  `Transitorios` int(11) NOT NULL,
  `Variaciones de corta duración` int(11) NOT NULL,
  `Variaciones de larga duración` int(11) NOT NULL,
  `Variaciones de frecuencia` int(11) NOT NULL,
  `Distorsión en la forma de onda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `referencia`
--

INSERT INTO `referencia` (`referencia`, `Transitorios`, `Variaciones de corta duración`, `Variaciones de larga duración`, `Variaciones de frecuencia`, `Distorsión en la forma de onda`) VALUES
(1, 2, 4, 3, 0, 1),
(2, 1, 4, 0, 2, 4),
(3, 2, 5, 2, 5, 2),
(4, 2, 3, 2, 4, 2),
(5, 2, 5, 2, 5, 0),
(6, 2, 3, 2, 4, 2),
(7, 2, 5, 2, 5, 0),
(8, 0, 5, 1, 5, 2),
(9, 5, 2, 4, 5, 2),
(10, 5, 6, 1, 3, 1),
(11, 2, 2, 2, 1, 0),
(12, 0, 0, 0, 0, 0),
(13, 0, 0, 0, 0, 0),
(14, 0, 0, 0, 0, 0),
(15, 0, 0, 0, 0, 0),
(16, 0, 0, 0, 0, 0),
(17, 0, 0, 0, 0, 0),
(18, 0, 0, 0, 0, 0),
(19, 0, 0, 0, 0, 0),
(20, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Usuarios`
--

CREATE TABLE `Usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `ap_paterno` varchar(40) NOT NULL,
  `ap_materno` varchar(40) DEFAULT NULL,
  `correo` varchar(40) NOT NULL,
  `referencia` int(3) NOT NULL,
  `contrasena` varchar(32) NOT NULL,
  `tipo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `Usuarios`
--

INSERT INTO `Usuarios` (`id`, `nombre`, `ap_paterno`, `ap_materno`, `correo`, `referencia`, `contrasena`, `tipo`) VALUES
(1, 'Berenice', 'Arzate', 'Rueda', 'arzate2323@gmail.com', 1, '99d7e4fca2b1ea46cf1e550a2ddbf0ea', 1),
(3, 'Lupita', 'Arzate', 'Carmona', 'lupita@gmail.com', 10, '263bce650e68ab4e23f28263760b9fa5', NULL),
(5, 'Alba', 'Meza', 'Flores', 'flores@gmail.com', 5, '56c3d4e5cd0a03675c5dad8827f8c8a9', NULL),
(6, ' Ali', 'Molina', 'Medina', 'Jonatan@gmail.com', 7, 'b9c0965091fadb8469c4b14294bf7a07', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `referencia`
--
ALTER TABLE `referencia`
  ADD PRIMARY KEY (`referencia`);

--
-- Indices de la tabla `Usuarios`
--
ALTER TABLE `Usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `referencia` (`referencia`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Usuarios`
--
ALTER TABLE `Usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `Usuarios`
--
ALTER TABLE `Usuarios`
  ADD CONSTRAINT `Usuarios_ibfk_1` FOREIGN KEY (`referencia`) REFERENCES `referencia` (`referencia`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
