-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: sql104.byetcluster.com
-- Tiempo de generación: 06-04-2024 a las 10:26:09
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `if0_36318307_incidencias`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_tarea`
--

CREATE TABLE `detalle_tarea` (
  `ideta` int(11) NOT NULL,
  `idtarea` int(11) NOT NULL,
  `idmen` int(11) NOT NULL,
  `respueta` text NOT NULL,
  `fere` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalle_tarea`
--

INSERT INTO `detalle_tarea` (`ideta`, `idtarea`, `idmen`, `respueta`, `fere`) VALUES
(7, 5, 6, 'gfjhft', '2024-04-04 08:28:49'),
(8, 4, 6, 'fhjyruiyrik', '2024-04-04 08:29:02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `miembros`
--

CREATE TABLE `miembros` (
  `idmen` int(11) NOT NULL,
  `nomenb` varchar(35) NOT NULL,
  `apmenb` varchar(35) NOT NULL,
  `sexo` char(1) NOT NULL,
  `celu` char(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `correo` varchar(35) NOT NULL,
  `contra` varchar(255) NOT NULL,
  `rol` char(1) NOT NULL,
  `state` char(1) NOT NULL,
  `fere` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `miembros`
--

INSERT INTO `miembros` (`idmen`, `nomenb`, `apmenb`, `sexo`, `celu`, `username`, `correo`, `contra`, `rol`, `state`, `fere`) VALUES
(5, 'rosa', 'sora', '2', '041234853', 'dfsfew', 'dsgerwsfg@gmail.com', 'e3ceb5881a0a1fdaad01296d7554868d', '2', '1', '2024-04-04 01:55:55'),
(6, 'Celenia', 'Rondiel', '2', '041287456', 'Celi', 'cewlilu@gmail.com', '1a100d2c0dab19c4430e7d73762b3423', '2', '1', '2024-04-06 05:12:39'),
(7, 'Juan', 'Perez', '1', '042645741', 'Juan', 'jaunpr@gmail.com', '73882ab1fa529d7273da0db6b49cc4f3', '2', '1', '2024-04-06 05:14:02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarea`
--

CREATE TABLE `tarea` (
  `idtarea` int(11) NOT NULL,
  `nomcl` varchar(25) DEFAULT NULL,
  `apecl` varchar(35) DEFAULT NULL,
  `nomcas` text DEFAULT NULL,
  `sitio` text DEFAULT NULL,
  `state` char(1) DEFAULT NULL,
  `dia` date NOT NULL,
  `celu` char(11) DEFAULT NULL,
  `fere` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tarea`
--

INSERT INTO `tarea` (`idtarea`, `nomcl`, `apecl`, `nomcas`, `sitio`, `state`, `dia`, `celu`, `fere`) VALUES
(0, 'María del Carmen', ' López García', ' Problema con el acceso a los registros de personal.', 'Recursos Humanos', '0', '2024-04-03', '041277043', '2024-04-06 05:27:02'),
(2, 'Laura Isabel', 'Sánchez Pérez', 'Problema en la visualización de datos de ventas y análisis de mercado.', 'Ventas y Marketing', '0', '2024-04-03', '999867564', '2024-04-06 05:26:24'),
(3, 'Carlos Alberto', 'Romero Lopez', 'mi impresora ink tank 312 no funciona', 'Finanzas y Contabilidad', '0', '2024-04-03', '997656543', '2024-04-06 06:10:31'),
(4, 'José Antonio', 'Urbina Perez', ' Problema en la visualización de rutas de envío y entrega.', 'Logística y Transporte', '1', '2024-04-03', '998676656', '2024-04-04 08:29:02'),
(5, 'Paula Andrea', 'Hernández Jiménez', 'Problema en la actualización de horas de trabajo en un proyecto.', 'Gestión de Proyectos', '1', '2024-04-03', '99656433', '2024-04-06 05:23:52'),
(6, 'María Castillo', 'López Charin', 'falta de acceso a herramienta de análisis de redes sociales', 'Marketing', '0', '2024-04-03', '998765453', '2024-04-06 06:11:14'),
(7, 'Marco', 'polo', 'Problema de internet', 'ventas', '0', '2024-04-17', '04127704370', '2024-04-06 05:51:19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `nombre` varchar(35) NOT NULL,
  `correo` varchar(35) NOT NULL,
  `contra` varchar(255) NOT NULL,
  `rol` char(1) NOT NULL,
  `state` char(1) NOT NULL,
  `fere` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `username`, `nombre`, `correo`, `contra`, `rol`, `state`, `fere`) VALUES
(1, 'admin01', 'Administrador1', 'admin01@gmail.com', 'e3ceb5881a0a1fdaad01296d7554868d', '1', '1', '2024-04-04 02:21:11');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `detalle_tarea`
--
ALTER TABLE `detalle_tarea`
  ADD PRIMARY KEY (`ideta`),
  ADD KEY `idtarea` (`idtarea`),
  ADD KEY `idmen` (`idmen`);

--
-- Indices de la tabla `miembros`
--
ALTER TABLE `miembros`
  ADD PRIMARY KEY (`idmen`);

--
-- Indices de la tabla `tarea`
--
ALTER TABLE `tarea`
  ADD PRIMARY KEY (`idtarea`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `detalle_tarea`
--
ALTER TABLE `detalle_tarea`
  MODIFY `ideta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `miembros`
--
ALTER TABLE `miembros`
  MODIFY `idmen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tarea`
--
ALTER TABLE `tarea`
  MODIFY `idtarea` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_tarea`
--
ALTER TABLE `detalle_tarea`
  ADD CONSTRAINT `detalle_tarea_ibfk_1` FOREIGN KEY (`idtarea`) REFERENCES `tarea` (`idtarea`),
  ADD CONSTRAINT `detalle_tarea_ibfk_2` FOREIGN KEY (`idmen`) REFERENCES `miembros` (`idmen`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
