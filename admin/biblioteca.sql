-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-01-2022 a las 22:59:09
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.0.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `biblioteca`
--
CREATE DATABASE IF NOT EXISTS `biblioteca` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `biblioteca`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autores`
--

CREATE TABLE `autores` (
  `id_autor` int(11) NOT NULL,
  `nombre` varchar(80) NOT NULL,
  `apellidos` varchar(80) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `fecha_fallecimiento` date DEFAULT NULL,
  `lugar_nacimiento` varchar(80) NOT NULL,
  `biografia` text NOT NULL,
  `foto` text NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp(),
  `fecha_modificacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `autores`
--

INSERT INTO `autores` (`id_autor`, `nombre`, `apellidos`, `fecha_nacimiento`, `fecha_fallecimiento`, `lugar_nacimiento`, `biografia`, `foto`, `fecha_creacion`, `fecha_modificacion`) VALUES
(1, 'León', 'Tolstoi', '1828-08-28', '1910-11-20', 'Yásnaya Poliana', 'Lev Nikoláievich Tolstói, fue un novelista ruso, considerado uno de los escritores más importantes de la literatura mundial. Sus dos obras más famosas, Guerra y paz y Ana Karénina, están consideradas como la cúspide del realismo ruso, junto a obras de Fiódor Dostoyevski.​ Recibió múltiples nominaciones para el Premio Nobel de Literatura todos los años de 1902 a 1906 y nominaciones para el Premio Nobel de la Paz en 1901, 1902 y 1910; el hecho de que nunca ganó es una gran controversia del premio Nobel', 'https://upload.wikimedia.org/wikipedia/commons/thumb/c/c6/L.N.Tolstoy_Prokudin-Gorsky.jpg/220px-L.N.Tolstoy_Prokudin-Gorsky.jpg', '2021-12-17 12:47:05', '2022-01-09 21:48:05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL,
  `nombre` varchar(80) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp(),
  `fecha_modificacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `nombre`, `fecha_creacion`, `fecha_modificacion`) VALUES
(1, 'Juvenil', '2021-12-03 12:30:00', '2021-12-03 12:54:01'),
(2, 'Acción', '2021-12-03 12:30:00', '2021-12-03 12:30:33'),
(3, 'Aventuras', '2021-12-03 12:30:00', '2021-12-03 12:30:38'),
(4, 'Terror', '2021-12-03 12:30:00', '2021-12-03 12:30:41'),
(24, 'Novela negra', '2021-12-15 10:36:10', '2021-12-15 10:36:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `editorial`
--

CREATE TABLE `editorial` (
  `id_editorial` int(11) NOT NULL,
  `nombre` varchar(80) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp(),
  `fecha_modificacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `editorial`
--

INSERT INTO `editorial` (`id_editorial`, `nombre`, `fecha_creacion`, `fecha_modificacion`) VALUES
(1, 'Santillana', '2021-12-14 13:09:09', '2021-12-14 13:09:09'),
(2, 'Planeta', '2021-12-14 13:09:09', '2021-12-14 13:09:09'),
(3, 'Anaya', '2021-12-14 13:09:09', '2021-12-14 13:09:09'),
(4, 'RBA', '2021-12-14 13:09:09', '2021-12-14 13:09:09'),
(5, 'Alfaguara', '2021-12-14 13:09:09', '2021-12-15 10:27:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `codigo` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `autor` varchar(255) NOT NULL,
  `disponible` tinyint(4) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp(),
  `fecha_modificacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`codigo`, `titulo`, `autor`, `disponible`, `fecha_creacion`, `fecha_modificacion`) VALUES
(1, 'La Guerra y la Paz', 'León Tolstoi', 1, '2022-01-09 21:54:51', '2022-01-09 21:54:51'),
(2, 'Las Aventuras de Huckleberry Finn', 'Mark Twain', 0, '2022-01-09 21:54:51', '2022-01-09 21:54:51'),
(3, 'Hamlet', 'William Shakespeare', 1, '2022-01-09 21:54:51', '2022-01-09 21:54:51'),
(4, 'En busca del tiempo perdido', 'Marcel Proust', 0, '2022-01-09 21:54:51', '2022-01-09 21:54:51'),
(5, 'Don Quijote de la Mancha', 'Miguel de Cervantes', 1, '2022-01-09 21:54:51', '2022-01-09 21:54:51');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `autores`
--
ALTER TABLE `autores`
  ADD PRIMARY KEY (`id_autor`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `editorial`
--
ALTER TABLE `editorial`
  ADD PRIMARY KEY (`id_editorial`);

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`codigo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `autores`
--
ALTER TABLE `autores`
  MODIFY `id_autor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `editorial`
--
ALTER TABLE `editorial`
  MODIFY `id_editorial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `libros`
--
ALTER TABLE `libros`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
