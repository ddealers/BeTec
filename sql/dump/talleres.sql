-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 12-11-2014 a las 04:49:50
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
  `opc` int(5) DEFAULT '0',
  `nombre` varchar(150) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `cupo` int(11) NOT NULL,
  `libres` int(5) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=56 ;

--
-- Volcado de datos para la tabla `talleres`
--

INSERT INTO `talleres` (`id`, `dia`, `opc`, `nombre`, `cupo`, `libres`) VALUES
(1, 1, 0, 'Taller de Liderazgo', 250, 0),
(2, 1, 0, 'Plática de Programas Internacionales', 100, 0),
(3, 1, 0, 'Plática de Asuntos Estudiantiles', 240, 0),
(4, 1, 1, 'Feria de Carreras', 1000, 0),
(5, 1, 1, 'Tour por el Campus', 1000, 0),
(6, 2, 0, 'Taller de Administración y Estrategia de Negocios (LAE)', 30, 0),
(7, 2, 0, 'Taller de Contaduría Pública y Finanzas (LCPF)', 36, 0),
(8, 2, 0, 'Taller de  Administración Financiera (LAF)', 35, 0),
(9, 2, 0, 'Taller de Mercadotecnia (LEM)', 32, 0),
(10, 2, 0, 'Taller de Negocios Internacionales (LIN)', 40, 0),
(11, 2, 0, 'Taller de Psicología Organizacional (LPO)', 25, 0),
(12, 2, 0, 'Taller de Creación y Desarrollo de Empresas (LCDE)', 30, 0),
(13, 2, 0, 'Taller de Economía (LEC)', 40, 0),
(14, 2, 0, 'Taller de Derecho (LED)', 20, 0),
(15, 2, 0, 'Taller de Derecho y Finanzas (LDF)', 20, 0),
(16, 2, 0, 'Taller de Letras Hispánicas (LLE)', 30, 0),
(17, 2, 0, 'Taller de Relaciones Internacionales (LRI)', 25, 0),
(18, 2, 0, 'Taller de Ciencias de la Comunicación y Medios Digitales (LCMD)', 20, 0),
(19, 2, 0, 'Taller de Producción Musical Digital (IMI)', 24, 0),
(20, 2, 0, 'Taller de Publicidad y Comunicación de Mercados (LPM)', 40, 0),
(21, 2, 0, 'Taller de Arquitectura (ARQ)', 30, 0),
(22, 2, 0, 'Taller de Diseño Industrial (LDI)', 15, 0),
(23, 2, 0, 'Taller de Animación y Arte Digital (LAD)', 20, 0),
(24, 2, 0, 'Taller de Ingeniería Civil (IC)', 35, 0),
(25, 2, 0, 'Taller de Ingeniería Industrial y de Sistemas (IIS)', 35, 0),
(26, 2, 0, 'Taller de Mecánico Administrador (IMA)', 35, 0),
(27, 2, 0, 'Taller de Mecánico Electricista (IME)', 35, 0),
(28, 2, 0, 'Taller de Químico Administrador (IQA)', 35, 0),
(29, 2, 0, 'Taller de Químico en Procesos Sustentables (IQP)', 35, 0),
(30, 2, 0, 'Taller de Desarrollo Sustentable (IDS)', 35, 0),
(31, 2, 0, 'Taller de Diseño Automotriz (IDA)', 35, 0),
(32, 2, 0, 'Taller de Mecatrónica (IMT)', 35, 0),
(33, 2, 0, 'Taller de Físico Industrial (IFI)', 35, 0),
(34, 2, 0, 'Taller de Tecnologías Computacionales (ITC)', 35, 0),
(35, 2, 0, 'Taller de Sistemas Digitales y Robótica (ISD)', 35, 0),
(36, 2, 0, 'Taller de Negocios y Tecnologías de Información (INT)', 35, 0),
(37, 2, 0, 'Taller de Innovación y Desarrollo (IID)', 35, 0),
(38, 2, 0, 'Taller de Médico Cirujano (MC)', 30, 0),
(39, 2, 0, 'Taller de Nanotecnología y Ciencias Químicas (INCQ)', 20, 0),
(40, 2, 0, 'Taller de Biotecnología (IBT)', 40, 0),
(41, 2, 0, 'Taller de Industrias Alimentarias (IIA)', 20, 0),
(42, 2, 0, 'Taller Biomédico (IMD)', 20, 0),
(43, 2, 0, 'Taller de Nutrición y Bienestar Integral (LNB)', 20, 0),
(44, 2, 0, 'Taller de Médico Cirujano Odontólogo (MO)', 30, 0),
(45, 2, 0, 'Taller de Psicología Clínica y de la Salud (LPS)', 30, 0),
(46, 1, 1, 'Plática "No tengo idea"', 240, 0),
(50, 0, 0, 'Plática de Programas Internacionales', 10, 0),
(51, 0, 0, 'Taller de Liderazgo', 10, 0),
(52, 0, 0, 'Taller de Administración Financiera (LAF)', 10, 0),
(53, 0, 0, 'Taller de Producción Musical Digital (IMI)', 10, 0),
(54, 2, 0, 'Taller de Logística Internacional (LNN)', 20, 0),
(55, 2, 0, 'Taller de Agronomía (IA)', 30, 0);

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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=56;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
