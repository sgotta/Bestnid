-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-07-2015 a las 03:20:24
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `bestnid`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `nombre` varchar(45) CHARACTER SET utf8 NOT NULL,
  `apellido` varchar(45) CHARACTER SET utf8 NOT NULL,
  `nombre_usuario` varchar(45) CHARACTER SET utf8 NOT NULL,
  `password` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `mail` varchar(45) CHARACTER SET utf8 NOT NULL,
  `tel` varchar(45) CHARACTER SET utf8 NOT NULL,
  `calle` varchar(45) CHARACTER SET utf8 NOT NULL,
  `nro` int(11) NOT NULL,
  `piso` int(11) DEFAULT NULL,
  `depto` varchar(15) CHARACTER SET utf8 DEFAULT NULL,
  `ciudad` varchar(45) CHARACTER SET utf8 NOT NULL,
  `provincia` varchar(45) CHARACTER SET utf8 NOT NULL,
  `pais` varchar(45) CHARACTER SET utf8 NOT NULL,
  `admin` tinyint(4) NOT NULL DEFAULT '0',
  `activo` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`nombre`, `apellido`, `nombre_usuario`, `password`, `mail`, `tel`, `calle`, `nro`, `piso`, `depto`, `ciudad`, `provincia`, `pais`, `admin`, `activo`) VALUES
('b', 'b', 'b', '12345678', 'b@b.com', '11111111', '1', 1, 0, '', 'Buenos Aires', 'Buenos Aires', 'Argentina', 0, 1),
('carolina', 'romano', 'caritoromano', 'strategus', 'carolina@gmail.com', 'nicolas', 'nic', 0, 0, 'nic', 'Pehuajo', 'nic', 'nic', 0, 1),
('Nico', 'Ferella', 'nferella', '123456', 'nico.ferella@gmail.com', '2216425153', 'Calle 16', 456, 0, '', 'La Plata', 'Buenos Aires', 'Argentina', 0, 1),
('nico', 'ferella', 'nferella2', 'strategus', 'nicofere@gmail.com', '3434234', '213', 2132, 0, 'a', 'La Plata', 'Buenos Aires', 'Argentina', 0, 1),
('Nicolas', 'Ferella', 'nferella22', 'strategus', 'nicoferella@live.com.ar', '6425153', '36', 1217, 0, '', 'La Plata', 'Buenos Aires', 'Argentina', 0, 1),
('Nicolas', 'Ferella', 'nicoferella', 'strategus', 'nicofe@', '312123', '213', 123, 0, 'a', 'Buenos Aires', 'bsas', 'arg', 0, 1),
('pepe', 'pepe', 'pepe', '1111111111111', '3311@44', '2133444', '444', 44, 0, '', 'Bragado', 'Buenos Aires', 'Argentina', 0, 1),
('Sebastian', 'Rodriguez', 'seba', '12345678', 'seba@pepe.pep', '12345678', '123', 123, 1, '1', 'La Plata', 'Argentina', 'Argentina', 0, 1),
('Simon', 'Gotta', 'sgotta', '123456', 'simon.gotta@outlook.com', '2213048133', 'Calle 58', 874, 1, 'E', 'Bragado', 'Buenos Aires', 'Argentina', 0, 1),
('SimÃ³n', 'Gotta', 'simon.gotta', 'strategus', 'simon.gotta@gmail.com', '2213048133', '58', 874, 1, 'E', 'La Plata', 'Buenos Aires', 'Argentina', 0, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
 ADD PRIMARY KEY (`nombre_usuario`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
