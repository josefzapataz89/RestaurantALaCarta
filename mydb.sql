-- phpMyAdmin SQL Dump
-- version 2.11.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 06-11-2012 a las 19:40:34
-- Versión del servidor: 5.0.41
-- Versión de PHP: 5.2.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Base de datos: `mydb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `baremo`
--

CREATE TABLE IF NOT EXISTS `baremo` (
  `idbaremo` int(11) NOT NULL,
  `descripcion` varchar(45) NOT NULL,
  PRIMARY KEY  (`idbaremo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `baremo`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificacion`
--

CREATE TABLE IF NOT EXISTS `calificacion` (
  `idcalificacion` int(11) NOT NULL auto_increment,
  `puntos` int(11) NOT NULL,
  `baremo_idbaremo` int(11) NOT NULL,
  `restaurante_emailrestaurante` varchar(45) NOT NULL,
  PRIMARY KEY  (`idcalificacion`),
  KEY `fk_calificacion_baremo1` (`baremo_idbaremo`),
  KEY `fk_calificacion_restaurante1` (`restaurante_emailrestaurante`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `calificacion`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE IF NOT EXISTS `comentario` (
  `idcomentario` int(11) NOT NULL auto_increment,
  `contenido` varchar(300) NOT NULL,
  `plato_restaurante_plato_idplato` int(11) NOT NULL,
  `plato_restaurante_restaurante_emailrestaurante` varchar(45) NOT NULL,
  `usuario_emailusuario` varchar(45) NOT NULL,
  PRIMARY KEY  (`idcomentario`,`plato_restaurante_plato_idplato`,`plato_restaurante_restaurante_emailrestaurante`,`usuario_emailusuario`),
  KEY `fk_comentario_plato_restaurante1` (`plato_restaurante_plato_idplato`,`plato_restaurante_restaurante_emailrestaurante`),
  KEY `fk_comentario_usuario1` (`usuario_emailusuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `comentario`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `foto_plato`
--

CREATE TABLE IF NOT EXISTS `foto_plato` (
  `idfoto_plato` int(11) NOT NULL auto_increment,
  `foto` varchar(45) NOT NULL,
  `plato_restaurante_plato_idplato` int(11) NOT NULL,
  `plato_restaurante_restaurante_emailrestaurante` varchar(45) NOT NULL,
  PRIMARY KEY  (`idfoto_plato`),
  UNIQUE KEY `idfoto_plato_UNIQUE` (`idfoto_plato`),
  UNIQUE KEY `foto_UNIQUE` (`foto`),
  KEY `fk_foto_plato_plato_restaurante1` (`plato_restaurante_plato_idplato`,`plato_restaurante_restaurante_emailrestaurante`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `foto_plato`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `foto_r`
--

CREATE TABLE IF NOT EXISTS `foto_r` (
  `idfoto_r` int(11) NOT NULL auto_increment,
  `foto` varchar(100) NOT NULL,
  `restaurante_emailrestaurante` varchar(45) NOT NULL,
  PRIMARY KEY  (`idfoto_r`),
  UNIQUE KEY `idfoto_r_UNIQUE` (`idfoto_r`),
  UNIQUE KEY `foto_UNIQUE` (`foto`),
  KEY `fk_foto_r_restaurante1` (`restaurante_emailrestaurante`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `foto_r`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `galeria`
--

CREATE TABLE IF NOT EXISTS `galeria` (
  `id` int(255) NOT NULL auto_increment,
  `titulo` text NOT NULL,
  `total_votes` int(255) NOT NULL,
  `total_value` int(11) NOT NULL,
  `used_ips` longtext NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcar la base de datos para la tabla `galeria`
--

INSERT INTO `galeria` (`id`, `titulo`, `total_votes`, `total_value`, `used_ips`) VALUES
(1, 'Título', 1, 4, 'a:1:{i:0;s:9:"127.0.0.1";}');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plato`
--

CREATE TABLE IF NOT EXISTS `plato` (
  `idplato` int(11) NOT NULL auto_increment,
  `nombre` varchar(100) NOT NULL,
  PRIMARY KEY  (`idplato`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `plato`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plato_restaurante`
--

CREATE TABLE IF NOT EXISTS `plato_restaurante` (
  `plato_idplato` int(11) NOT NULL,
  `restaurante_emailrestaurante` varchar(45) NOT NULL,
  PRIMARY KEY  (`plato_idplato`,`restaurante_emailrestaurante`),
  KEY `fk_plato_restaurante_restaurante1` (`restaurante_emailrestaurante`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `plato_restaurante`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rating`
--

CREATE TABLE IF NOT EXISTS `rating` (
  `id` varchar(11) NOT NULL,
  `total_votes` int(11) NOT NULL,
  `total_value` int(11) NOT NULL,
  `used_ips` longtext NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `rating`
--

INSERT INTO `rating` (`id`, `total_votes`, `total_value`, `used_ips`) VALUES
('', 0, 0, ''),
('1', 1, 3, 'a:1:{i:0;s:9:"127.0.0.1";}'),
('2', 1, 3, 'a:1:{i:0;s:9:"127.0.0.1";}'),
('3', 1, 3, 'a:1:{i:0;s:9:"127.0.0.1";}'),
('4', 1, 3, 'a:1:{i:0;s:9:"127.0.0.1";}'),
('5', 1, 3, 'a:1:{i:0;s:9:"127.0.0.1";}'),
('6', 1, 1, 'a:1:{i:0;s:9:"127.0.0.1";}');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `restaurante`
--

CREATE TABLE IF NOT EXISTS `restaurante` (
  `emailrestaurante` varchar(45) NOT NULL,
  `descripcion` varchar(1000) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `contraseña` varchar(45) NOT NULL,
  `ubicacion` varchar(200) NOT NULL,
  `telefono` int(11) default NULL,
  `fecha_registro` date NOT NULL,
  `foto_perfil` varchar(200) NOT NULL,
  `usuario_emailusuario` varchar(45) NOT NULL,
  `tipo_especialidad_id_especialidad` int(11) NOT NULL,
  UNIQUE KEY `emailrestaurante_UNIQUE` (`emailrestaurante`),
  KEY `fk_restaurante_usuario` (`usuario_emailusuario`),
  KEY `fk_restaurante_tipo_especialidad1` (`tipo_especialidad_id_especialidad`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `restaurante`
--

INSERT INTO `restaurante` (`emailrestaurante`, `descripcion`, `nombre`, `contraseña`, `ubicacion`, `telefono`, `fecha_registro`, `foto_perfil`, `usuario_emailusuario`, `tipo_especialidad_id_especialidad`) VALUES
('1@1', '1', 'houlihans', '', 'altos de gallardin parte baja', 16789, '2012-11-15', 'houlihans.png', '1@1', 1),
('a@il cortile', 'awdasdasdf', 'Il Cortile Ristorante', '123', 'por alla por alla por alla por alla', 3432154, '2012-11-07', 'il cortile.png', 'jean_carlos@1', 5),
('a@raklett', 'efasdfasd', 'Raklett', '123', 'donde donde donde donde donde', 1114235, '2012-11-06', 'raklett.png', 'y@1', 2),
('a@vicenzos', 'awdasd', 'vicenzos', '12345', 'aja ja ja ja ja ja ja ja ja', 123456, '2012-11-06', 'vicenzos.png', '1@1', 5),
('an@an', 'bbbbbbbbbbbbbbbbbbbb', 'ANDRES RST', '', 'sssssssssssssssssssssssssssqqbbbb', 3333333, '2012-11-15', 'vicenzos.png', 'an@an', 4),
('c13@a', 'asdasdasdasdasd', 'Calle Trece', '1234', 'puerto rico', 3554178, '2012-11-07', 'c13.jpg', '1@1', 7),
('jean@2', 'efasdfasd', 'nan king', '', 'del mirador pa arriba', 123123, '2012-11-06', 'nan king.png', 'jean@2', 2),
('y@1', '1', 'Rincon del churrasco', '', 'pirineos2 arriba abajo derecha', 1114235, '2012-11-21', 'rincon.png', 'y@1', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE IF NOT EXISTS `rol` (
  `idrol` int(11) NOT NULL auto_increment,
  `descripcion` varchar(30) NOT NULL,
  PRIMARY KEY  (`idrol`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcar la base de datos para la tabla `rol`
--

INSERT INTO `rol` (`idrol`, `descripcion`) VALUES
(1, 'persona'),
(2, 'restaurant');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_especialidad`
--

CREATE TABLE IF NOT EXISTS `tipo_especialidad` (
  `id_especialidad` int(11) NOT NULL auto_increment,
  `descripcion` varchar(45) NOT NULL,
  PRIMARY KEY  (`id_especialidad`),
  UNIQUE KEY `descripcion_UNIQUE` (`descripcion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcar la base de datos para la tabla `tipo_especialidad`
--

INSERT INTO `tipo_especialidad` (`id_especialidad`, `descripcion`) VALUES
(1, 'Aves'),
(2, 'Carnes'),
(3, 'Ensaladas'),
(4, 'Pastas'),
(5, 'Pescados'),
(6, 'Postres'),
(7, 'Sopas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `emailusuario` varchar(45) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `contra` varchar(45) NOT NULL,
  `rol_idrol` int(11) NOT NULL,
  UNIQUE KEY `emailusuario` (`emailusuario`),
  KEY `fk_usuario_rol1` (`rol_idrol`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`emailusuario`, `nombre`, `contra`, `rol_idrol`) VALUES
('1@1', 'marian', '123', 2),
('1@22', 'ww', '11', 2),
('2@w', '22', '123', 2),
('a@raklett', 'Raklett', '1234', 2),
('an@an', 'ANDRES', '1111', 2),
('jean@2', 'jean', '1234', 2),
('jean_carlos@1', 'jean carlos', '1234', 1),
('y@1', 'yyyy', '123', 2);

--
-- Filtros para las tablas descargadas (dump)
--

--
-- Filtros para la tabla `calificacion`
--
ALTER TABLE `calificacion`
  ADD CONSTRAINT `fk_calificacion_baremo1` FOREIGN KEY (`baremo_idbaremo`) REFERENCES `baremo` (`idbaremo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_calificacion_restaurante1` FOREIGN KEY (`restaurante_emailrestaurante`) REFERENCES `restaurante` (`emailrestaurante`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `fk_comentario_plato_restaurante1` FOREIGN KEY (`plato_restaurante_plato_idplato`, `plato_restaurante_restaurante_emailrestaurante`) REFERENCES `plato_restaurante` (`plato_idplato`, `restaurante_emailrestaurante`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_comentario_usuario1` FOREIGN KEY (`usuario_emailusuario`) REFERENCES `usuario` (`emailusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `foto_plato`
--
ALTER TABLE `foto_plato`
  ADD CONSTRAINT `fk_foto_plato_plato_restaurante1` FOREIGN KEY (`plato_restaurante_plato_idplato`, `plato_restaurante_restaurante_emailrestaurante`) REFERENCES `plato_restaurante` (`plato_idplato`, `restaurante_emailrestaurante`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `foto_r`
--
ALTER TABLE `foto_r`
  ADD CONSTRAINT `fk_foto_r_restaurante1` FOREIGN KEY (`restaurante_emailrestaurante`) REFERENCES `restaurante` (`emailrestaurante`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `plato_restaurante`
--
ALTER TABLE `plato_restaurante`
  ADD CONSTRAINT `fk_plato_restaurante_plato1` FOREIGN KEY (`plato_idplato`) REFERENCES `plato` (`idplato`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_plato_restaurante_restaurante1` FOREIGN KEY (`restaurante_emailrestaurante`) REFERENCES `restaurante` (`emailrestaurante`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `restaurante`
--
ALTER TABLE `restaurante`
  ADD CONSTRAINT `fk_restaurante_tipo_especialidad1` FOREIGN KEY (`tipo_especialidad_id_especialidad`) REFERENCES `tipo_especialidad` (`id_especialidad`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_restaurante_usuario` FOREIGN KEY (`usuario_emailusuario`) REFERENCES `usuario` (`emailusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario_rol1` FOREIGN KEY (`rol_idrol`) REFERENCES `rol` (`idrol`) ON DELETE NO ACTION ON UPDATE NO ACTION;
