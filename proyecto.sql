-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-11-2021 a las 21:25:29
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE `alumno` (
  `id` int(10) NOT NULL,
  `nombres` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `apellidos` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `grado` int(10) NOT NULL,
  `telefono` int(20) NOT NULL,
  `correo` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `colegiatura` int(10) NOT NULL,
  `contrasena` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`id`, `nombres`, `apellidos`, `grado`, `telefono`, `correo`, `colegiatura`, `contrasena`) VALUES
(7, 'Marcela Yoselin', 'Ortiz', 4, 0, '', 7500, 'apestas'),
(8, 'aranza', 'a', 0, 0, '', 7500, '564651'),
(9, 'brayan', 'Romo', 0, 0, '', 7500, '789'),
(11, 'Ulises', 'Perez', 0, 0, '', 6300, '88888'),
(12, 'aaaaa', 'aaaaa', 0, 0, '', 6280, 'aaaa'),
(13, 'luis angel', 'Romo Padilla', 2, 2147483647, 'luisangelromopadilla@gmail.com', 7500, '87459');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maestro`
--

CREATE TABLE `maestro` (
  `id` int(5) NOT NULL,
  `nombre` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `apellidos` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `materia` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `contrasena` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `maestro`
--

INSERT INTO `maestro` (`id`, `nombre`, `apellidos`, `materia`, `contrasena`) VALUES
(4, 'Miguel', 'Ortiz', 'Programacion Web', 'WebEsLoMaximo'),
(5, 'david', 'refugio', 'Ecuaciones Diferenciales', 'fqnjoqeknro'),
(6, 'Eduardo ', 'esparza', 'Base de Datos', '564651'),
(7, 'arturo', 'gonzalez', 'Circuitos Electricos', 'redes11111'),
(8, 'Juana', 'Yolanda', 'Etica Profesional', 'apestas'),
(9, 'Guido', 'aguilar', 'Redes', 'cableCoaxial'),
(20, 'Pepe', 'Ruiz', 'Etica Profesional', '85236'),
(21, 'Gonzalo', 'Padilla', 'Programacion Web', '5555'),
(23, 'root', 'root', 'root', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia`
--

CREATE TABLE `materia` (
  `id_alumno` int(10) NOT NULL,
  `clase` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `calificacion` int(10) NOT NULL,
  `faltas` int(10) NOT NULL,
  `id_maestro` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `materia`
--

INSERT INTO `materia` (`id_alumno`, `clase`, `calificacion`, `faltas`, `id_maestro`) VALUES
(7, 'Programacion Web', 10, 10, 4),
(7, 'Ecuaciones Diferenciales', 0, 0, 5),
(7, 'Circuitos Electricos', 0, 5, 6),
(8, 'Programacion Web', 5, 5, 6),
(8, 'Ecuaciones Diferenciales', 0, 0, 5),
(8, 'Base de Datos', 5, 5, 4),
(9, 'Ecuaciones Diferenciales', 0, 0, 5),
(9, 'Redes', 0, 0, 5),
(9, 'Etica Profesional', 0, 5, 6),
(11, 'Circuitos Electricos', 10, 5, 21),
(11, 'Ecuaciones Diferenciales', 5, 5, 4),
(11, 'Etica Profesional', 7, 16, 20),
(12, 'Programacion Web', 0, 0, 7),
(12, 'Base de Datos', 0, 0, 6),
(12, 'Ecuaciones Diferenciales', 7, 16, 20),
(13, 'Base de Datos', 10, 10, 5),
(13, 'Ecuaciones Diferenciales', 10, 5, 8),
(13, 'Ecuaciones Diferenciales', 5, 5, 4);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `maestro`
--
ALTER TABLE `maestro`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumno`
--
ALTER TABLE `alumno`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `maestro`
--
ALTER TABLE `maestro`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
