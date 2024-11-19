-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-11-2024 a las 23:23:21
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
  `fechaNacimiento` date NOT NULL,
  `direccion` char(255) DEFAULT NULL,
  `fechaInscripcion` date NOT NULL,
  `id_PlanEntrenamiento` int(11) UNSIGNED DEFAULT NULL,
  `id_EstadoMembresia` tinyint(1) UNSIGNED NOT NULL DEFAULT 1,
  `id_Usuario` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_Cliente`, `fechaNacimiento`, `direccion`, `fechaInscripcion`, `id_PlanEntrenamiento`, `id_EstadoMembresia`, `id_Usuario`) VALUES
(5, '1993-07-01', 'Dire123', '2024-11-16', NULL, 1, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidades`
--

CREATE TABLE `especialidades` (
  `Id_Especialidad` int(11) UNSIGNED NOT NULL,
  `especialidad` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `especialidades`
--

INSERT INTO `especialidades` (`Id_Especialidad`, `especialidad`) VALUES
(1, 'Musculación básica'),
(2, 'Musculación intermedia'),
(3, 'Musculación avanzada'),
(4, 'Cardio básico'),
(5, 'Cardio intermedio'),
(6, 'Cardio avanzado'),
(7, 'Yoga básico'),
(8, 'Yoga intermedio'),
(9, 'Yoga avanzado'),
(10, 'Gimnasia Postural'),
(11, 'Pilates básico'),
(12, 'Pilates intermedio'),
(13, 'Pilates avanzado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidades_profesores`
--

CREATE TABLE `especialidades_profesores` (
  `id_Profesor` int(11) UNSIGNED NOT NULL,
  `id_Especialidad` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `especialidades_profesores`
--

INSERT INTO `especialidades_profesores` (`id_Profesor`, `id_Especialidad`) VALUES
(3, 1),
(3, 2),
(3, 3);

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
  `id_Profesor` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `plan_entrenamiento`
--

INSERT INTO `plan_entrenamiento` (`id_PlanEntrenamiento`, `nombrePlan`, `descripcion`, `duracion`, `cantSesionesSemanales`, `id_Profesor`) VALUES
(1, 'Plan 1', 'Enfocar trabajo en piernas y espalda', 40, 2, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesores`
--

CREATE TABLE `profesores` (
  `id_Profesor` int(11) UNSIGNED NOT NULL,
  `fechaContratacion` date NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `id_Usuario` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `profesores`
--

INSERT INTO `profesores` (`id_Profesor`, `fechaContratacion`, `estado`, `id_Usuario`) VALUES
(3, '1990-11-15', 1, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_Usuario` int(11) UNSIGNED NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  `dni` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `telefono` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tipo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_Usuario`, `usuario`, `contrasena`, `dni`, `nombre`, `apellido`, `telefono`, `email`, `tipo`) VALUES
(3, 'usuario1@gmail.com', 'sadafgsf', 11111111, 'Nombre 1', 'Apellido 1', 345999999, 'usuario1@gmail.com', 'Profesor'),
(4, 'usuario2@gmail.com', 'hfdhfghfhgfh', 22222222, 'nombre 2', 'apellido 2', 345999999, 'usuario2@gmail.com', 'Cliente');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_Cliente`),
  ADD KEY `id_Usuario` (`id_Usuario`),
  ADD KEY `id_PlanEntrenamiento` (`id_PlanEntrenamiento`,`id_EstadoMembresia`);

--
-- Indices de la tabla `especialidades`
--
ALTER TABLE `especialidades`
  ADD PRIMARY KEY (`Id_Especialidad`);

--
-- Indices de la tabla `especialidades_profesores`
--
ALTER TABLE `especialidades_profesores`
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
  MODIFY `id_Cliente` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `especialidades`
--
ALTER TABLE `especialidades`
  MODIFY `Id_Especialidad` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `id_Pago` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `plan_entrenamiento`
--
ALTER TABLE `plan_entrenamiento`
  MODIFY `id_PlanEntrenamiento` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `profesores`
--
ALTER TABLE `profesores`
  MODIFY `id_Profesor` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_Usuario` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `clientes_ibfk_3` FOREIGN KEY (`id_Usuario`) REFERENCES `usuarios` (`id_Usuario`),
  ADD CONSTRAINT `clientes_ibfk_4` FOREIGN KEY (`id_PlanEntrenamiento`) REFERENCES `plan_entrenamiento` (`id_PlanEntrenamiento`);

--
-- Filtros para la tabla `especialidades_profesores`
--
ALTER TABLE `especialidades_profesores`
  ADD CONSTRAINT `especialidades_profesores_ibfk_1` FOREIGN KEY (`id_Especialidad`) REFERENCES `especialidades` (`Id_Especialidad`),
  ADD CONSTRAINT `especialidades_profesores_ibfk_2` FOREIGN KEY (`id_Profesor`) REFERENCES `profesores` (`id_Profesor`);

--
-- Filtros para la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD CONSTRAINT `pagos_ibfk_1` FOREIGN KEY (`id_Cliente`) REFERENCES `clientes` (`id_Cliente`);

--
-- Filtros para la tabla `plan_entrenamiento`
--
ALTER TABLE `plan_entrenamiento`
  ADD CONSTRAINT `plan_entrenamiento_ibfk_1` FOREIGN KEY (`id_Profesor`) REFERENCES `profesores` (`id_Profesor`);

--
-- Filtros para la tabla `profesores`
--
ALTER TABLE `profesores`
  ADD CONSTRAINT `profesores_ibfk_1` FOREIGN KEY (`id_Usuario`) REFERENCES `usuarios` (`id_Usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
