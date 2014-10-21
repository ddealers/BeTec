-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 21-10-2014 a las 23:09:47
-- Versión del servidor: 5.6.20
-- Versión de PHP: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `betec_2014`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medios`
--

DROP TABLE IF EXISTS `medios`;
CREATE TABLE IF NOT EXISTS `medios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Truncar tablas antes de insertar `medios`
--

TRUNCATE TABLE `medios`;
--
-- Volcado de datos para la tabla `medios`
--

INSERT INTO `medios` (`id`, `nombre`) VALUES
(1, 'Por Facebook'),
(2, 'Por correo electr&oacute;nico'),
(3, 'Por p&aacute;gina del Tec'),
(4, 'Por tel&eacute;fono'),
(5, 'Por un amigo');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
