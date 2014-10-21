-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 21-10-2014 a las 23:09:29
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
-- Estructura de tabla para la tabla `estados`
--

DROP TABLE IF EXISTS `estados`;
CREATE TABLE IF NOT EXISTS `estados` (
  `id` int(11) NOT NULL,
  `clave` varchar(2) CHARACTER SET utf8 NOT NULL,
  `nombre` varchar(45) CHARACTER SET utf8 NOT NULL,
  `abrev` varchar(16) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Tabla de Estados de la República Mexicana';

--
-- Truncar tablas antes de insertar `estados`
--

TRUNCATE TABLE `estados`;
--
-- Volcado de datos para la tabla `estados`
--

INSERT INTO `estados` (`id`, `clave`, `nombre`, `abrev`) VALUES
(1, '01', 'Aguascalientes', 'Ags.'),
(2, '02', 'Baja California', 'BC'),
(3, '03', 'Baja California Sur', 'BCS'),
(4, '04', 'Campeche', 'Camp.'),
(5, '05', 'Coahuila de Zaragoza', 'Coah.'),
(6, '06', 'Colima', 'Col.'),
(7, '07', 'Chiapas', 'Chis.'),
(8, '08', 'Chihuahua', 'Chih.'),
(9, '09', 'Distrito Federal', 'DF'),
(10, '10', 'Durango', 'Dgo.'),
(11, '11', 'Guanajuato', 'Gto.'),
(12, '12', 'Guerrero', 'Gro.'),
(13, '13', 'Hidalgo', 'Hgo.'),
(14, '14', 'Jalisco', 'Jal.'),
(15, '15', 'M&eacute;xico', 'Mex.'),
(16, '16', 'Michoac&aacute;n de Ocampo', 'Mich.'),
(17, '17', 'Morelos', 'Mor.'),
(18, '18', 'Nayarit', 'Nay.'),
(19, '19', 'Nuevo Le&oacute;n', 'NL'),
(20, '20', 'Oaxaca', 'Oax.'),
(21, '21', 'Puebla', 'Pue.'),
(22, '22', 'Quer&eacute;taro', 'Qro.'),
(23, '23', 'Quintana Roo', 'Q. Roo'),
(24, '24', 'San Luis Potos&iacute;', 'SLP'),
(25, '25', 'Sinaloa', 'Sin.'),
(26, '26', 'Sonora', 'Son.'),
(27, '27', 'Tabasco', 'Tab.'),
(28, '28', 'Tamaulipas', 'Tamps.'),
(29, '29', 'Tlaxcala', 'Tlax.'),
(30, '30', 'Veracruz de Ignacio de la Llave', 'Ver.'),
(31, '31', 'Yucat&aacute;n', 'Yuc.'),
(32, '32', 'Zacatecas', 'Zac.');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
