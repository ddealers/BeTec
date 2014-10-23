# Volcado de tabla usuario_carrera
# ------------------------------------------------------------

DROP TABLE IF EXISTS `usuario_carrera`;

CREATE TABLE `usuario_carrera` (
  `id_usuario` int(11) NOT NULL,
  `id_carrera` int(11) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;



# Volcado de tabla usuario_taller
# ------------------------------------------------------------

DROP TABLE IF EXISTS `usuario_taller`;

CREATE TABLE `usuario_taller` (
  `id_usuario` int(11) NOT NULL,
  `id_taller` int(11) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;



# Volcado de tabla usuarios
# ------------------------------------------------------------

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `genero` tinyint(1) NOT NULL COMMENT '0 = masculino, 1 = femenino',
  `nombre` varchar(200) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `cumpleaños` date NOT NULL,
  `correo` varchar(200) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `telefono` varchar(15) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `celular` varchar(15) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `id_estado` int(11) NOT NULL,
  `id_ciudad` int(11) NOT NULL,
  `id_prepa` int(11) NOT NULL,
  `graduacion` varchar(10) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `hospedaje` tinyint(1) NOT NULL COMMENT '0 = false, 1 = true',
  `acompana` tinyint(1) NOT NULL COMMENT '0 = false, 1 = true',
  `id_medio` int(11) NOT NULL,
  `documentos` char(1) CHARACTER SET utf8 DEFAULT '0',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `otra_prepa` varchar(150) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;



# Volcado de tabla usuarios_documentos
# ------------------------------------------------------------

DROP TABLE IF EXISTS `usuarios_documentos`;

CREATE TABLE `usuarios_documentos` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `url_pago` varchar(100) DEFAULT '#',
  `url_permiso` varchar(100) DEFAULT '#',
  `tipo_foraneo` char(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Volcado de tabla usuarios_info
# ------------------------------------------------------------

DROP TABLE IF EXISTS `usuarios_info`;

CREATE TABLE `usuarios_info` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `moneterrey` tinyint(1) DEFAULT '0',
  `campus` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;