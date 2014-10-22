# ************************************************************
# Sequel Pro SQL dump
# Versi�n 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.6.19)
# Base de datos: btec
# Tiempo de Generaci�n: 2014-10-22 08:58:44 p.m. +0000
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
  `nombre` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `cupo` int(11) NOT NULL,
  `libres` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `talleres` WRITE;
/*!40000 ALTER TABLE `talleres` DISABLE KEYS */;

INSERT INTO `talleres` (`id`, `dia`, `opc`, `nombre`, `cupo`, `libres`)
VALUES
	(1,1,0,'Taller de Liderazgo',30,30),
	(2,1,0,'Plática de Programas Internacionales',30,30),
	(3,1,0,'Plática de Asuntos Estudiantiles',30,29),
	(4,1,0,'Feria de Carreras',30,30),
	(5,1,0,'Tour por el Campus',30,30),
	(6,2,0,'Taller de Licenciatura en Administración y Estrate',30,30),
	(7,2,0,'Taller de Licenciatura en Contaduría Pública y Fin',30,30),
	(8,2,0,'Taller de Licenciatura en Administración Financier',30,30),
	(9,2,0,'Taller de Licenciatura en Mercadotecnia',30,30),
	(10,2,0,'Taller de Licenciatura en Negocios Internacionales',30,30),
	(11,2,0,'Taller de Licenciatura en Psicología Organizaciona',30,30),
	(12,2,0,'Taller de Licenciatura en Creación de Empresas',30,30),
	(13,2,0,'Taller de Licenciatura en Economía',30,30),
	(14,2,0,'Taller de Licenciatura en Derecho',30,30),
	(15,2,0,'Taller de Licenciatura en Derecho y Finanzas',30,30),
	(16,2,0,'Taller de Licenciatura en Letras Hispánicas',30,30),
	(17,2,0,'Taller de Licenciatura en Relaciones Internacional',30,30),
	(18,2,0,'Taller de Licenciatura en Ciencias de la Comunicac',30,30),
	(19,2,0,'Taller de Ingeniería en Producción Musical',30,30),
	(20,2,0,'Taller de Licenciatura en Publicidad y Comunicació',30,30),
	(21,2,0,'Taller de Arquitectura',30,30),
	(22,2,0,'Taller de Licenciatura en Diseño Industrial',30,30),
	(23,2,0,'Taller de Licenciatura en Animación y Arte Digital',30,30),
	(24,2,0,'Taller de Ingeniería Civil',30,30),
	(25,2,0,'Taller de Ingeniería Industrial y de Sistemas',30,30),
	(26,2,0,'Taller de Ingeniería Mecánico Administrador',30,30),
	(27,2,0,'Taller de Ingeniería Mecánico Electricista',30,30),
	(28,2,0,'Taller de Ingeniería Química Administrador',30,30),
	(29,2,0,'Taller de Ingeniería Química en Procesos Sustentab',30,30),
	(30,2,0,'Taller de Ingeniería en Desarrollo Sustentable',30,30),
	(31,2,0,'Taller de Ingeniería en Diseño Automotriz',30,30),
	(32,2,0,'Taller de Ingeniería en Mecatrónica',30,30),
	(33,2,0,'Taller de Ingeniería Física Industrial',30,30),
	(34,2,0,'Taller de Ingeniería en Tecnologías Computacionale',30,30),
	(35,2,0,'Taller de Ingeniería en Sistemas Digitales y Robót',30,30),
	(36,2,0,'Taller de Ingeniería en Negocios y Tecnologías de ',30,30),
	(37,2,0,'Taller de Ingeniería en Innovación y Desarrollo',30,30),
	(38,2,0,'Taller de Médico Cirujano',30,30),
	(39,2,0,'Taller de Ingeniería en Nanotecnología y Ciencias ',30,30),
	(40,2,0,'Taller de Ingeniería en Biotecnología',30,30),
	(41,2,0,'Taller de Ingeniería en Industrias Alimentarias',30,30),
	(42,2,0,'Taller de Ingeniería Biomédica',30,30),
	(43,2,0,'Taller de Licenciatura en Nutrición y Bienestar In',30,30),
	(44,2,0,'Taller de Médico Cirujano Odontólogo',30,30),
	(45,2,0,'Taller de Licenciatura en Psicología Clínica y de ',30,30),
	(46,1,1,'Plática \"No tengo idea\"',30,30),
	(47,1,1,'Feria de Carreras',30,30),
	(48,1,1,'Tour por el campus',30,30);

/*!40000 ALTER TABLE `talleres` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
