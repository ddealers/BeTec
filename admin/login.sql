# ************************************************************
# Sequel Pro SQL dump
# Versión 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.6.21)
# Base de datos: btec
# Tiempo de Generación: 2014-11-04 12:33:25 a.m. +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Volcado de tabla admin_login
# ------------------------------------------------------------

DROP TABLE IF EXISTS `admin_login`;

CREATE TABLE `admin_login` (
  `id_login` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `s_login_user` varchar(100) NOT NULL DEFAULT '',
  `s_login_clave` varchar(250) NOT NULL DEFAULT '',
  `s_login_email` varchar(250) DEFAULT '',
  PRIMARY KEY (`id_login`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `admin_login` WRITE;
/*!40000 ALTER TABLE `admin_login` DISABLE KEYS */;

#INSERT INTO `admin_login` (`id_login`, `s_login_user`, `s_login_clave`, `s_login_email`)
#VALUES
#	(1,'jok3r','olamundo','jkurtsme@gmail.com');

/*!40000 ALTER TABLE `admin_login` ENABLE KEYS */;
UNLOCK TABLES;

ALTER TABLE `usuarios` CHANGE `cumpleaños` `cumpleanos` DATE NOT NULL;

/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
