-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-11-2024 a las 01:20:33
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gym`
--
CREATE DATABASE IF NOT EXISTS `gym` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `gym`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_Cliente` int(10) UNSIGNED NOT NULL,
  `dni` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `fechaNacimiento` date NOT NULL,
  `direccion` char(255) DEFAULT NULL,
  `telefono` int(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `fechaInscripcion` date NOT NULL,
  `id_PlanEntrenamiento` int(11) UNSIGNED NOT NULL,
  `id_EstadoMembresia` tinyint(1) UNSIGNED NOT NULL DEFAULT 1,
  `id_Usuario` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidades`
--

CREATE TABLE `especialidades` (
  `Id_Especialidad` int(11) UNSIGNED NOT NULL,
  `especialidad` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidades_entrenadores`
--

CREATE TABLE `especialidades_entrenadores` (
  `id_Profesor` int(11) UNSIGNED NOT NULL,
  `id_Especialidad` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `id_Pago` int(11) UNSIGNED NOT NULL,
  `id_Cliente` int(11) UNSIGNED NOT NULL,
  `fechaPago` date NOT NULL,
  `montoPago` decimal(10,0) NOT NULL,
  `metodoPago` int(11) NOT NULL,
  `estadoPago` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plan_entrenamiento`
--

CREATE TABLE `plan_entrenamiento` (
  `id_PlanEntrenamiento` int(11) UNSIGNED NOT NULL,
  `nombrePlan` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `duracion` int(11) UNSIGNED NOT NULL,
  `cantSesionesSemanales` int(11) UNSIGNED NOT NULL,
  `id_Profesor` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesores`
--

CREATE TABLE `profesores` (
  `id_Profesor` int(11) UNSIGNED NOT NULL,
  `dni` int(11) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `telefono` int(11) UNSIGNED DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `fechaContratacion` date NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `id_Usuario` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_Usuario` int(11) UNSIGNED NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `contrasena` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_Cliente`),
  ADD UNIQUE KEY `dni` (`dni`),
  ADD KEY `id_Usuario` (`id_Usuario`),
  ADD KEY `id_PlanEntrenamiento` (`id_PlanEntrenamiento`,`id_EstadoMembresia`);

--
-- Indices de la tabla `especialidades`
--
ALTER TABLE `especialidades`
  ADD PRIMARY KEY (`Id_Especialidad`);

--
-- Indices de la tabla `especialidades_entrenadores`
--
ALTER TABLE `especialidades_entrenadores`
  ADD KEY `id_Entrenador` (`id_Profesor`,`id_Especialidad`),
  ADD KEY `id_Especialidad` (`id_Especialidad`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`id_Pago`),
  ADD KEY `id_Cliente` (`id_Cliente`);

--
-- Indices de la tabla `plan_entrenamiento`
--
ALTER TABLE `plan_entrenamiento`
  ADD PRIMARY KEY (`id_PlanEntrenamiento`),
  ADD KEY `id_Entrenador` (`id_Profesor`);

--
-- Indices de la tabla `profesores`
--
ALTER TABLE `profesores`
  ADD PRIMARY KEY (`id_Profesor`),
  ADD UNIQUE KEY `dni` (`dni`),
  ADD UNIQUE KEY `dni_2` (`dni`),
  ADD KEY `id_Usuario` (`id_Usuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_Usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_Cliente` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `especialidades`
--
ALTER TABLE `especialidades`
  MODIFY `Id_Especialidad` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `id_Pago` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `plan_entrenamiento`
--
ALTER TABLE `plan_entrenamiento`
  MODIFY `id_PlanEntrenamiento` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `profesores`
--
ALTER TABLE `profesores`
  MODIFY `id_Profesor` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_Usuario` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `clientes_ibfk_1` FOREIGN KEY (`id_Cliente`) REFERENCES `pagos` (`id_Cliente`),
  ADD CONSTRAINT `clientes_ibfk_2` FOREIGN KEY (`id_PlanEntrenamiento`) REFERENCES `plan_entrenamiento` (`id_PlanEntrenamiento`);

--
-- Filtros para la tabla `especialidades_entrenadores`
--
ALTER TABLE `especialidades_entrenadores`
  ADD CONSTRAINT `especialidades_entrenadores_ibfk_1` FOREIGN KEY (`id_Especialidad`) REFERENCES `especialidades` (`Id_Especialidad`);

--
-- Filtros para la tabla `plan_entrenamiento`
--
ALTER TABLE `plan_entrenamiento`
  ADD CONSTRAINT `plan_entrenamiento_ibfk_1` FOREIGN KEY (`id_Profesor`) REFERENCES `profesores` (`id_Profesor`);

--
-- Filtros para la tabla `profesores`
--
ALTER TABLE `profesores`
  ADD CONSTRAINT `profesores_ibfk_1` FOREIGN KEY (`id_Usuario`) REFERENCES `usuarios` (`id_Usuario`),
  ADD CONSTRAINT `profesores_ibfk_2` FOREIGN KEY (`id_Profesor`) REFERENCES `especialidades_entrenadores` (`id_Profesor`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_Usuario`) REFERENCES `clientes` (`id_Usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
