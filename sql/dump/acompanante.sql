CREATE TABLE `usuario_follow` (
  `id_follow` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) DEFAULT NULL,
  `parentestco` int(11) DEFAULT NULL,
  `acompanante` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_follow`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;