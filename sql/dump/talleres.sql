-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 21-10-2014 a las 23:10:04
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
-- Estructura de tabla para la tabla `talleres`
--

DROP TABLE IF EXISTS `talleres`;
CREATE TABLE IF NOT EXISTS `talleres` (
`id` int(11) NOT NULL,
  `dia` int(11) NOT NULL,
  `nombre` varchar(150) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `cupo` int(11) NOT NULL,
  `libres` int(5) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

--
-- Truncar tablas antes de insertar `talleres`
--

TRUNCATE TABLE `talleres`;
--
-- Volcado de datos para la tabla `talleres`
--

INSERT INTO `talleres` (`id`, `dia`, `nombre`, `cupo`, `libres`) VALUES
(1, 1, 'Taller de Liderazgo', 30, 30),
(2, 1, 'Plática de Programas Internacionales', 30, 30),
(3, 1, 'Plática de Asuntos Estudiantiles', 30, 30),
(4, 1, 'Feria de Carreras', 30, 30),
(5, 1, 'Tour por el Campus', 30, 30),
(6, 2, 'Taller de Administración y Estrategia de Negocios (LAE)', 40, 40),
(7, 2, 'Taller de Contaduría Pública y Finanzas (LCPF)', 40, 40),
(8, 2, 'Taller de  Administración Financiera (LAF)', 40, 40),
(9, 2, 'Taller de Mercadotecnia (LEM)', 40, 40),
(10, 2, 'Taller de Negocios Internacionales (LIN)', 40, 40),
(11, 2, 'Taller de Psicología Organizacional (LPO)', 40, 40),
(12, 2, 'Taller de Creación y Desarrollo de Empresas (LCDE)', 40, 40),
(13, 2, 'Taller de Economía (LEC)', 40, 40),
(14, 2, 'Taller de Derecho (LED)', 40, 40),
(15, 2, 'Taller de Derecho y Finanzas (LDF)', 40, 40),
(16, 2, 'Taller de Letras Hispánicas (LLE)', 40, 40),
(17, 2, 'Taller de Relaciones Internacionales (LRI)', 40, 40),
(18, 2, 'Taller de Ciencias de la Comunicación y Medios Digitales (LCMD)', 40, 40),
(19, 2, 'Taller de Producción Musical (IMI)', 40, 40),
(20, 2, 'Taller de Publicidad y Comunicación de Mercados (LPM)', 40, 40),
(21, 2, 'Taller de Arquitectura (ARQ)', 30, 30),
(22, 2, 'Taller de Diseño Industrial (LDI)', 15, 15),
(23, 2, 'Taller de Animación y Arte Digital (LAD)', 20, 20),
(24, 2, 'Taller de Ingeniería Civil (IC)', 35, 35),
(25, 2, 'Taller de Ingeniería Industrial y de Sistemas (IIS)', 35, 35),
(26, 2, 'Taller de Mecánico Administrador (IMA)', 35, 35),
(27, 2, 'Taller de Mecánico Electricista (IME)', 35, 35),
(28, 2, 'Taller de Químico Administrador (IQA)', 35, 35),
(29, 2, 'Taller de Químico en Procesos Sustentables (IQP)', 35, 35),
(30, 2, 'Taller de Desarrollo Sustentable (IDS)', 35, 35),
(31, 2, 'Taller de Diseño Automotriz (IDA)', 35, 35),
(32, 2, 'Taller de Mecatrónica (IMT)', 35, 35),
(33, 2, 'Taller de Físico Industrial (IFI)', 35, 35),
(34, 2, 'Taller de Tecnologías Computacionales (ITC)', 35, 35),
(35, 2, 'Taller de Sistemas Digitales y Robótica (ISD)', 35, 35),
(36, 2, 'Taller de Negocios y Tecnologías de Información (INT)', 35, 35),
(37, 2, 'Taller de Innovación y Desarrollo (IID)', 35, 35),
(38, 2, 'Taller de Médico Cirujano (MC)', 30, 30),
(39, 2, 'Taller de Nanotecnología y Ciencias Químicas (INCQ)', 20, 20),
(40, 2, 'Taller de Biotecnología (IBT)', 40, 40),
(41, 2, 'Taller de Industrias Alimentarias (IIA)', 20, 20),
(42, 2, 'Taller Biomédico (IMD)', 20, 20),
(43, 2, 'Taller de Nutrición y Bienestar Integral (LNB)', 20, 20),
(44, 2, 'Taller de Médico Cirujano Odontólogo (MO)', 30, 30),
(45, 2, 'Taller de Psicología Clínica y de la Salud (LPS)', 30, 30);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `talleres`
--
ALTER TABLE `talleres`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `talleres`
--
ALTER TABLE `talleres`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=46;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
