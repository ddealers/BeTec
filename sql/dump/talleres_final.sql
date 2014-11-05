# ************************************************************
# Sequel Pro SQL dump
# Versi�n 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.6.21)
# Base de datos: btec
# Tiempo de Generaci�n: 2014-10-30 9:00:46 p.m. +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Volcado de tabla talleres
# ------------------------------------------------------------

DROP TABLE IF EXISTS `talleres`;

CREATE TABLE `talleres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dia` int(11) NOT NULL,
  `opc` int(5) DEFAULT '0',
  `nombre` varchar(150) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `cupo` int(11) NOT NULL,
  `libres` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `talleres` WRITE;
/*!40000 ALTER TABLE `talleres` DISABLE KEYS */;

INSERT INTO `talleres` (`id`, `dia`, `opc`, `nombre`, `cupo`, `libres`)
VALUES
	(49,1,0,'Plática de Asuntos Estudiantiles',10000,0),
	(48,1,0,'Feria de Carreras',10000,0),
	(47,1,0,'Tour por el Campus',10000,0),
	(4,1,1,'Feria de Carreras',30,30),
	(5,1,1,'Tour por el Campus',30,30),
	(6,2,0,'Taller de Administración y Estrategia de Negocios (LAE)',30,20),
	(7,2,0,'Taller de Contaduría Pública y Finanzas (LCPF)',36,31),
	(8,2,0,'Taller de  Administración Financiera (LAF)',40,27),
	(9,2,0,'Taller de Mercadotecnia (LEM)',32,28),
	(10,2,0,'Taller de Negocios Internacionales (LIN)',40,35),
	(11,2,0,'Taller de Psicología Organizacional (LPO)',40,38),
	(12,2,0,'Taller de Creación y Desarrollo de Empresas (LCDE)',40,37),
	(13,2,0,'Taller de Economía (LEC)',40,38),
	(14,2,0,'Taller de Derecho (LED)',20,19),
	(15,2,0,'Taller de Derecho y Finanzas (LDF)',20,18),
	(16,2,0,'Taller de Letras Hispánicas (LLE)',30,30),
	(17,2,0,'Taller de Relaciones Internacionales (LRI)',40,38),
	(18,2,0,'Taller de Ciencias de la Comunicación y Medios Digitales (LCMD)',20,18),
	(19,2,0,'Taller de Producción Musical (IMI)',40,39),
	(20,2,0,'Taller de Publicidad y Comunicación de Mercados (LPM)',40,40),
	(21,2,0,'Taller de Arquitectura (ARQ)',30,29),
	(22,2,0,'Taller de Diseño Industrial (LDI)',15,15),
	(23,2,0,'Taller de Animación y Arte Digital (LAD)',20,19),
	(24,2,0,'Taller de Ingeniería Civil (IC)',35,33),
	(25,2,0,'Taller de Ingeniería Industrial y de Sistemas (IIS)',35,35),
	(26,2,0,'Taller de Mecánico Administrador (IMA)',35,35),
	(27,2,0,'Taller de Mecánico Electricista (IME)',35,35),
	(28,2,0,'Taller de Químico Administrador (IQA)',35,35),
	(29,2,0,'Taller de Químico en Procesos Sustentables (IQP)',35,35),
	(30,2,0,'Taller de Desarrollo Sustentable (IDS)',35,34),
	(31,2,0,'Taller de Diseño Automotriz (IDA)',35,35),
	(32,2,0,'Taller de Mecatrónica (IMT)',35,35),
	(33,2,0,'Taller de Físico Industrial (IFI)',35,34),
	(34,2,0,'Taller de Tecnologías Computacionales (ITC)',35,34),
	(35,2,0,'Taller de Sistemas Digitales y Robótica (ISD)',35,35),
	(36,2,0,'Taller de Negocios y Tecnologías de Información (INT)',35,35),
	(37,2,0,'Taller de Innovación y Desarrollo (IID)',35,34),
	(38,2,0,'Taller de Médico Cirujano (MC)',30,28),
	(39,2,0,'Taller de Nanotecnología y Ciencias Químicas (INCQ)',20,20),
	(40,2,0,'Taller de Biotecnología (IBT)',40,39),
	(41,2,0,'Taller de Industrias Alimentarias (IIA)',20,20),
	(42,2,0,'Taller Biomédico (IMD)',20,18),
	(43,2,0,'Taller de Nutrición y Bienestar Integral (LNB)',20,20),
	(44,2,0,'Taller de Médico Cirujano Odontólogo (MO)',30,30),
	(45,2,0,'Taller de Psicología Clínica y de la Salud (LPS)',30,28),
	(46,1,1,'Plática \"No tengo idea\"',30,30),
	(50,1,0,'Plática de Programas Internacionales',10000,0),
	(51,1,0,'Taller de Liderazgo',1000,0),
	(52,2,0,'Taller de Administración Financiera (LAF)',35,35),
	(53,2,0,'Taller de Producción Musical Digital (IMI)',24,24);

/*!40000 ALTER TABLE `talleres` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
