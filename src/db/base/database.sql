-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-12-2024 a las 13:08:41
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
-- Base de datos: `carteleria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cartel`
--

CREATE TABLE `cartel` (
  `id` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `imagen` longblob NOT NULL,
  `fecha` date NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fecha`
--

CREATE TABLE `fecha` (
  `id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `fecha`
--

INSERT INTO `fecha` (`id`, `fecha`, `descripcion`) VALUES
(1, '2024-12-05', 'Presentación de candidaturas'),
(2, '2025-04-21', 'Cierre de candidaturas e inicio de periodo de votación'),
(3, '2025-05-20', 'Cierre de votación y resultados'),
(4, '2024-12-29', 'Entrega de premios');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `participacion`
--

CREATE TABLE `participacion` (
  `id_usuario` varchar(20) NOT NULL,
  `id_cartel` int(11) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `cial` varchar(20) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `curso` varchar(100) NOT NULL,
  `pin` varchar(4) NOT NULL,
  `isAdmin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`cial`, `nombre`, `curso`, `pin`, `isAdmin`) VALUES
('B03A22104F', 'Kenobi, Obi-Wan', '2ºCFGS INF', '3090', 1),
('B03A22109F', 'Mufasa, King', '1ºCFGM INF', '3382', 0),
('B03A22111F', 'Skywalker, Luke', '2ºCFGS INF', '1300', 0),
('B03A22114F', 'Vader, Anakin', '2ºCFGS INF', '6820', 0),
('B03A22192F', 'Parker, Peter', '1ºCFGM INF', '5760', 0),
('B03A22215F', 'Baggins, Frodo', '1ºCFGM INF', '2865', 0),
('B03A22239F', 'Romanoff, Natasha', '2ºCFGS INF', '7711', 0),
('B03A22247F', 'Palpatine, Sheev', '1ºCFGM INF', '7419', 0),
('B03A22267F', 'Jasmine, Princess', '2ºCFGS INF', '4615', 0),
('B03A22321F', 'Saruman, The White', '1ºCFGM INF', '6913', 0),
('B03A22330F', 'Hagrid, Rubeus', '2ºCFGS INF', '3521', 0),
('B03A22442F', 'Snape, Severus', '1ºCFGM INF', '3019', 0),
('B03A22458F', 'Boromir, Captain', '2ºCFGS INF', '4744', 0),
('B03A22475F', 'Weasley, Ron', '2ºCFGS INF', '4395', 0),
('B03A22487F', 'Belle, Princess', '1ºCFGM INF', '7975', 0),
('B03A22488F', 'Aragorn, Elessar', '2ºCFGS INF', '2967', 0),
('B03A22489F', 'Dumbledore, Albus', '1ºCFGM INF', '6965', 0),
('B03A22502F', 'Solo, Han', '2ºCFGS INF', '2001', 1),
('B03A22503F', 'Granger, Hermione', '1ºCFGM INF', '7147', 0),
('B03A22528F', 'Anna, Princess', '2ºCFGS INF', '3929', 0),
('B03A22594F', 'Voldemort, Lord', '2ºCFGS INF', '6223', 0),
('B03A22601F', 'Rogers, Steve', '1ºCFGM INF', '4274', 0),
('B03A22689F', 'Ariel, Mermaid', '1ºCFGM INF', '4909', 0),
('B03A22734F', 'Yoda, Grand Master', '2ºCFGS INF', '8041', 0),
('B03A22765F', 'Gandalf, The Grey', '1ºCFGM INF', '2210', 1),
('B03A22793F', 'Thanos, Titan', '2ºCFGS INF', '7313', 0),
('B03A22802F', 'Malfoy, Draco', '2ºCFGS INF', '4837', 0),
('B03A22860F', 'Tano, Ahsoka', '1ºCFGM INF', '2915', 0),
('B03A22894F', 'Legolas, Greenleaf', '1ºCFGM INF', '2367', 0),
('B03A22910F', 'Thor, Odinson', '1ºCFGM INF', '9619', 0),
('cial', 'nombre', 'curso', 'pin', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `votacion`
--

CREATE TABLE `votacion` (
  `id_usuario` varchar(20) NOT NULL,
  `id_cartel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cartel`
--
ALTER TABLE `cartel`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `fecha`
--
ALTER TABLE `fecha`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `participacion`
--
ALTER TABLE `participacion`
  ADD PRIMARY KEY (`id_usuario`,`id_cartel`),
  ADD KEY `fk_participacion_cartel` (`id_cartel`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`cial`);

--
-- Indices de la tabla `votacion`
--
ALTER TABLE `votacion`
  ADD PRIMARY KEY (`id_usuario`,`id_cartel`) USING BTREE,
  ADD KEY `fk_votacion_cartel` (`id_cartel`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cartel`
--
ALTER TABLE `cartel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `fecha`
--
ALTER TABLE `fecha`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `participacion`
--
ALTER TABLE `participacion`
  ADD CONSTRAINT `fk_participacion_cartel` FOREIGN KEY (`id_cartel`) REFERENCES `cartel` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_participacion_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`cial`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `votacion`
--
ALTER TABLE `votacion`
  ADD CONSTRAINT `fk_votacion_cartel` FOREIGN KEY (`id_cartel`) REFERENCES `cartel` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_votacion_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`cial`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
