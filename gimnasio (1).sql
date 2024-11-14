-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-11-2024 a las 21:58:59
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
-- Base de datos: `gimnasio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `dni` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `telefono` int(30) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `direccion` varchar(50) NOT NULL,
  `fecha_inscripcion` date DEFAULT NULL,
  `id_plan` int(11) NOT NULL,
  `estado` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `dni`, `nombre`, `apellido`, `telefono`, `mail`, `fecha_nacimiento`, `direccion`, `fecha_inscripcion`, `id_plan`, `estado`) VALUES
(1, 43413482, 'Juan', 'Aparicio', 345412621, 'pedro@pedot', '2024-11-04', 'dsfsdf', '2024-11-08', 1, 'activo'),
(2, 43418489, 'Lucas', 'Amarillo', 34534534, 'pedro@ped', '2024-11-06', 'dsfsdf', '2024-11-06', 2, 'activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrenadores`
--

CREATE TABLE `entrenadores` (
  `id_entrenador` int(11) NOT NULL,
  `dni` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `telefono` int(11) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `especialidad` int(11) NOT NULL,
  `fecha_contratacion` date NOT NULL,
  `estado` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `entrenadores`
--

INSERT INTO `entrenadores` (`id_entrenador`, `dni`, `nombre`, `apellido`, `telefono`, `mail`, `especialidad`, `fecha_contratacion`, `estado`) VALUES
(1, 23423423, 'Juan andres', 'Echejoyen', 35345345, 'Juan@juan', 1, '2024-11-07', 'activo'),
(2, 34534544, 'pablo', 'pabo', 34534533, 'pablo@pablo', 2, '2024-11-04', 'activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidades`
--

CREATE TABLE `especialidades` (
  `id_especialidad` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `especialidades`
--

INSERT INTO `especialidades` (`id_especialidad`, `nombre`) VALUES
(1, 'Yoga'),
(2, 'pilates');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `id_pago` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `monto_pagado` decimal(10,2) NOT NULL,
  `metodo_pago` varchar(50) NOT NULL,
  `id_plan` int(11) NOT NULL,
  `estado_pago` varchar(20) NOT NULL,
  `fecha_pago` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `pagos`
--

INSERT INTO `pagos` (`id_pago`, `id_cliente`, `monto_pagado`, `metodo_pago`, `id_plan`, `estado_pago`, `fecha_pago`) VALUES
(1, 1, 3456.00, 'sfsdfds', 2, 'A pagar', '2024-11-13'),
(2, 1, 234324.00, 'asdasd', 1, 'Pagado', '2024-05-04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plan_entrenamiento`
--

CREATE TABLE `plan_entrenamiento` (
  `id_plan` int(11) NOT NULL,
  `codigo` int(11) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `duracion_semanas` int(11) NOT NULL,
  `cantidadsesiones_semana` int(11) NOT NULL,
  `id_entrenador` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `plan_entrenamiento`
--

INSERT INTO `plan_entrenamiento` (`id_plan`, `codigo`, `descripcion`, `duracion_semanas`, `cantidadsesiones_semana`, `id_entrenador`, `nombre`) VALUES
(1, 433, 'sdfsdf', 4, 3, 1, 'yoga'),
(2, 54645, '345345sdfsd', 4, 3, 2, 'Pilates');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `contra` varchar(250) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `username`, `contra`, `nombre`, `apellido`) VALUES
(2, 'juan', '$2y$10$yF3VFNNNjEmRaWPHgV.V3OsRQs356OfuOdUD.hfWr3bYeFT6D0PWC', 'Juan ', 'Aparicio'),
(4, 'gabi', '$2y$10$qGfFnmN8zgpoS63RMl.K8uW2ubHBjq1Xi8yXq8idAb/9X/kDejEmu', 'gabriel', 'gill');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `entrenadores`
--
ALTER TABLE `entrenadores`
  ADD PRIMARY KEY (`id_entrenador`);

--
-- Indices de la tabla `especialidades`
--
ALTER TABLE `especialidades`
  ADD PRIMARY KEY (`id_especialidad`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`id_pago`);

--
-- Indices de la tabla `plan_entrenamiento`
--
ALTER TABLE `plan_entrenamiento`
  ADD PRIMARY KEY (`id_plan`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `entrenadores`
--
ALTER TABLE `entrenadores`
  MODIFY `id_entrenador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `especialidades`
--
ALTER TABLE `especialidades`
  MODIFY `id_especialidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `id_pago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `plan_entrenamiento`
--
ALTER TABLE `plan_entrenamiento`
  MODIFY `id_plan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
