-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-02-2022 a las 13:28:07
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.10

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
(1, 'León', 'Tolstoi', '1828-08-28', '1910-11-20', 'Yásnaya Poliana', 'Lev Nikoláievich Tolstói, fue un novelista ruso, considerado uno de los escritores más importantes de la literatura mundial. Sus dos obras más famosas, Guerra y paz y Ana Karénina, están consideradas como la cúspide del realismo ruso, junto a obras de Fiódor Dostoyevski.​ Recibió múltiples nominaciones para el Premio Nobel de Literatura todos los años de 1902 a 1906 y nominaciones para el Premio Nobel de la Paz en 1901, 1902 y 1910; el hecho de que nunca ganó es una gran controversia del premio Nobel', 'imagenes/1.jpg', '2021-12-17 12:47:05', '2022-01-10 09:17:51'),
(2, 'Mark', 'Twain', '1835-11-30', '1910-04-21', 'Florida', 'Samuel Langhorne Clemens, más conocido por su seudónimo Mark Twain, fue un escritor, orador y humorista estadounidense. Escribió obras de gran éxito y fama mundial como El príncipe y el mendigo o Un yanqui en la corte del Rey Arturo, pero es conocido sobre todo por su novela Las aventuras de Tom Sawyer y su secuela Las aventuras de Huckleberry Finn.', 'imagenes/2.jpg', '2022-01-10 09:34:42', '2022-01-10 09:34:42'),
(3, 'Edgar', 'Allan Poe', '1809-01-19', '1849-10-07', 'Boston', 'Edgar Allan Poe fue un escritor, poeta, crítico y periodista romántico​​ estadounidense, generalmente reconocido como uno de los maestros universales del relato corto, del cual fue uno de los primeros practicantes en su país', '/imagenes/3.jpg', '2022-02-08 12:59:30', '2022-02-08 12:59:30');

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
(25, 'Novela negra', '2022-02-09 11:26:54', '2022-02-09 11:26:54');

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
  `portada` text NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `autor` varchar(255) NOT NULL,
  `disponible` tinyint(4) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp(),
  `fecha_modificacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`codigo`, `portada`, `titulo`, `autor`, `disponible`, `fecha_creacion`, `fecha_modificacion`) VALUES
(1, '1.jpg', 'La Guerra y la Paz', 'León Tolstoi', 1, '2022-01-09 21:54:51', '2022-02-10 12:03:00'),
(2, '2.jpg', 'Las Aventuras de Huckleberry Finn', 'Mark Twain', 0, '2022-01-09 21:54:51', '2022-02-10 12:06:34'),
(3, '3.jpg', 'Hamlet', 'William Shakespeare', 1, '2022-01-09 21:54:51', '2022-02-10 12:10:28'),
(4, '4.jpg', 'En busca del tiempo perdido', 'Marcel Proust', 0, '2022-01-09 21:54:51', '2022-02-10 12:10:28'),
(5, '5.jpg', 'Don Quijote de la Mancha', 'Miguel de Cervantes', 1, '2022-01-09 21:54:51', '2022-02-10 12:10:28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamos`
--

CREATE TABLE `prestamos` (
  `id` int(11) NOT NULL,
  `libro_id` int(80) NOT NULL,
  `usuario_id` int(80) NOT NULL,
  `fecha_prestamo` date NOT NULL,
  `fecha_devolucion` date NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp(),
  `fecha_modificacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sanciones`
--

CREATE TABLE `sanciones` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `motivo` text NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp(),
  `fecha_modificacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `tipo` enum('Bibliotecario','Alumnado','Profesorado') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `first_name`, `last_name`, `email`, `password`, `created_at`, `updated_at`, `tipo`) VALUES
(1, 'Jerónimo Omar', 'Falcón Dávila', 'jeronimo@example.com', '$2y$04$XELx6wylEPnr1ly4XpvD2eT0qJh2ANRWXB60Fe1YY6AagJsZCabYO', '2022-02-07 11:15:39', '2022-02-07 11:15:39', 'Bibliotecario');

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
-- Indices de la tabla `prestamos`
--
ALTER TABLE `prestamos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `libro_id` (`libro_id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indices de la tabla `sanciones`
--
ALTER TABLE `sanciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `autores`
--
ALTER TABLE `autores`
  MODIFY `id_autor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

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

--
-- AUTO_INCREMENT de la tabla `prestamos`
--
ALTER TABLE `prestamos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sanciones`
--
ALTER TABLE `sanciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `prestamos`
--
ALTER TABLE `prestamos`
  ADD CONSTRAINT `prestamos_ibfk_1` FOREIGN KEY (`libro_id`) REFERENCES `libros` (`codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `prestamos_ibfk_2` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `sanciones`
--
ALTER TABLE `sanciones`
  ADD CONSTRAINT `sanciones_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
