-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-02-2022 a las 18:18:05
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
(1, 'León', 'Tolstoi', '1828-08-28', '1910-11-20', 'Yásnaya Poliana', 'Lev Nikoláievich Tolstói, fue un novelista ruso, considerado uno de los escritores más importantes de la literatura mundial. Sus dos obras más famosas, Guerra y paz y Ana Karénina, están consideradas como la cúspide del realismo ruso, junto a obras de Fiódor Dostoyevski.​ Recibió múltiples nominaciones para el Premio Nobel de Literatura todos los años de 1902 a 1906 y nominaciones para el Premio Nobel de la Paz en 1901, 1902 y 1910; el hecho de que nunca ganó es una gran controversia del premio Nobel', '1.jpg', '2021-12-17 12:47:05', '2022-02-26 12:35:55'),
(2, 'Mark', 'Twain', '1835-11-30', '1910-04-21', 'Florida', 'Samuel Langhorne Clemens, más conocido por su seudónimo Mark Twain, fue un escritor, orador y humorista estadounidense. Escribió obras de gran éxito y fama mundial como El príncipe y el mendigo o Un yanqui en la corte del Rey Arturo, pero es conocido sobre todo por su novela Las aventuras de Tom Sawyer y su secuela Las aventuras de Huckleberry Finn.', 'mark-twain.jpeg', '2022-01-10 09:34:42', '2022-02-27 12:32:09'),
(3, 'Edgar', 'Allan Poe', '1809-01-19', '1849-10-07', 'Boston', 'Edgar Allan Poe fue un escritor, poeta, crítico y periodista romántico​​ estadounidense, generalmente reconocido como uno de los maestros universales del relato corto, del cual fue uno de los primeros practicantes en su país', 'Edgar_Allan_Poe_portrait_B.jpg', '2022-02-08 12:59:30', '2022-02-27 12:30:45'),
(4, 'Laura', 'Gallego', '1977-10-11', '0000-00-00', 'Cuart de Poblet', 'Laura Gallego García es una autora española de literatura infantil y juvenil especializada en temática fantástica. Ha estudiado Filología Hispánica en la Universidad de Valencia. En el año 2005 ya había escrito un total de 3 libros, siendo ya una referente en lecturas juveniles', '23034208_1__225x225.jpg', '2022-02-27 12:19:33', '2022-02-27 12:28:27'),
(6, 'Miguel', 'de Cervantes', '1547-09-29', '1616-04-22', 'Madrid', 'Miguel de Cervantes Saavedra fue un novelista, poeta, dramaturgo y soldado español.\r\n\r\nEs ampliamente considerado una de las máximas figuras de la literatura española. Fue el autor de El ingenioso hidalgo don Quijote de la Mancha, novela conocida habitualmente como El Quijote, que lo llevó a ser mundialmente conocido y a la cual muchos críticos han descrito como la primera novela moderna, así como una de las mejores obras de la literatura universal, cuya cantidad de ediciones y traducciones solo es superada por la Biblia.', 'miguel-de-cervantes.jpg', '2022-02-27 12:33:58', '2022-02-27 12:33:58');

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
(5, 'Alfaguara', '2021-12-14 13:09:09', '2021-12-15 10:27:01'),
(13, 'kakap', '2022-02-27 16:27:01', '2022-02-27 16:27:05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `codigo` int(11) NOT NULL,
  `portada` text NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `id_autor` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `id_editorial` int(11) NOT NULL,
  `disponible` tinyint(4) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp(),
  `fecha_modificacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`codigo`, `portada`, `titulo`, `id_autor`, `id_categoria`, `id_editorial`, `disponible`, `fecha_creacion`, `fecha_modificacion`) VALUES
(12, '1.jpg', 'Guerra y paz', 1, 2, 1, 0, '2022-02-21 12:27:55', '2022-02-27 12:51:13'),
(13, '2.jpg', 'Las aventuras de Huckleberry Finn', 2, 1, 2, 0, '2022-02-21 12:55:36', '2022-02-27 12:51:26'),
(14, '9df474be58bc976866e6e12312130d13.jpg', 'El gato negro', 3, 4, 3, 1, '2022-02-27 12:50:21', '2022-02-27 12:50:21'),
(15, '51-pDnvHxCL.jpg', 'Memorias de Idhún. La Resistencia', 4, 1, 5, 1, '2022-02-27 12:53:32', '2022-02-27 12:53:32'),
(16, 'Don-Quijote-de-la-Mancha-M-de-Cervantes-i6n625799.jpg', 'Don Quijote de la Mancha', 6, 3, 4, 1, '2022-02-27 12:56:17', '2022-02-27 12:56:17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamos`
--

CREATE TABLE `prestamos` (
  `id` int(11) NOT NULL,
  `libro_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `fecha_prestamo` date NOT NULL,
  `fecha_devolucion` date NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp(),
  `fecha_modificacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `prestamos`
--

INSERT INTO `prestamos` (`id`, `libro_id`, `usuario_id`, `fecha_prestamo`, `fecha_devolucion`, `fecha_creacion`, `fecha_modificacion`) VALUES
(2, 12, 5, '2022-02-18', '2022-03-05', '2022-02-26 21:40:33', '2022-02-27 13:44:20'),
(3, 13, 5, '2022-02-11', '2022-02-25', '2022-02-27 13:37:43', '2022-02-27 13:38:36');

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

--
-- Volcado de datos para la tabla `sanciones`
--

INSERT INTO `sanciones` (`id`, `id_usuario`, `fecha_inicio`, `fecha_fin`, `motivo`, `fecha_creacion`, `fecha_modificacion`) VALUES
(2, 5, '2022-02-25', '2022-03-01', 'Retraso entrega libro por razones injustificadas', '2022-02-26 15:28:21', '2022-02-27 13:46:47');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `avatar` text DEFAULT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellidos` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `tipo` enum('Bibliotecario','Alumnado','Profesorado') NOT NULL,
  `activo` tinyint(4) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp(),
  `fecha_modificacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `avatar`, `nombre`, `apellidos`, `email`, `password`, `tipo`, `activo`, `fecha_creacion`, `fecha_modificacion`) VALUES
(1, 'avatars-000767629630-fpfqtl-t500x500.jpg', 'Jerónimo Omar', 'Falcón Dávila', 'jeronimo@example.com', '$2y$04$CZbydq1WNorWo7uA5wL/ru.P5eklwIDueIRbZN.Rav1YtHlZ5kaxu', 'Bibliotecario', 1, '2022-02-07 11:15:39', '2022-02-26 17:35:43'),
(5, '', 'Peter', 'Parker', 'spiderman@nowayhome.com', '$2y$04$olN7EZdpaEnbfxkMc53IZuB1kvNCxuWZYC45/u99Jo4MgtgRlXq5e', 'Alumnado', 1, '2022-02-24 21:44:46', '2022-02-24 21:44:46'),
(8, '694943_00_1.jpg', 'Bruno', 'Rodriguez', 'brunorodriguez@email.com', '$2y$04$H79txL.maBXIKxJ47Ae9vO21bn6l0ys8nXf3FmJSYozsd/BLqNSfK', 'Profesorado', 0, '2022-02-26 18:42:52', '2022-02-26 17:48:14');

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
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `id_autor` (`id_autor`),
  ADD KEY `libros_ibfk_2` (`id_categoria`),
  ADD KEY `id_editorial` (`id_editorial`);

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
  MODIFY `id_autor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `editorial`
--
ALTER TABLE `editorial`
  MODIFY `id_editorial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `libros`
--
ALTER TABLE `libros`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `prestamos`
--
ALTER TABLE `prestamos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `sanciones`
--
ALTER TABLE `sanciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `libros`
--
ALTER TABLE `libros`
  ADD CONSTRAINT `libros_ibfk_1` FOREIGN KEY (`id_autor`) REFERENCES `autores` (`id_autor`) ON UPDATE CASCADE,
  ADD CONSTRAINT `libros_ibfk_2` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`) ON UPDATE CASCADE,
  ADD CONSTRAINT `libros_ibfk_3` FOREIGN KEY (`id_editorial`) REFERENCES `editorial` (`id_editorial`) ON UPDATE CASCADE;

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
