-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-04-2015 a las 07:56:45
-- Versión del servidor: 5.6.16
-- Versión de PHP: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `restaurante`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `tipo`) VALUES
(3, 'Carnes'),
(4, 'Aves'),
(5, 'Pescados'),
(6, 'Vegetarianos'),
(7, 'Sopas'),
(8, 'Asiatica'),
(9, 'Oriental'),
(10, 'Mediterranea');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE IF NOT EXISTS `comentario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comentario` varchar(255) DEFAULT NULL,
  `calificacion` int(11) DEFAULT NULL,
  `usuario_id` int(11) NOT NULL,
  `restaurante_id` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_comentario_usuario1_idx` (`usuario_id`),
  KEY `fk_comentario_restaurante1_idx` (`restaurante_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `comentario`
--

INSERT INTO `comentario` (`id`, `comentario`, `calificacion`, `usuario_id`, `restaurante_id`, `fecha`) VALUES
(1, 'asdasdads', 5, 3, 14, '0000-00-00 00:00:00'),
(3, 'kjdh sjdhkjhs skhd ', 3, 4, 14, '0000-00-00 00:00:00'),
(4, 'kjhlkjhlkj', 5, 3, 14, '0000-00-00 00:00:00'),
(8, 'perros, excelente', 4, 3, 14, '2015-03-31 11:07:07'),
(9, 'perro', 3, 5, 14, '2015-03-31 12:08:51'),
(10, 'apesta a culo', 5, 5, 14, '2015-03-31 12:14:49'),
(11, 'dilcioooo', 4, 4, 14, '2015-03-31 12:18:09'),
(12, 'lsdlkasdÃ±lk slkdlksj skdmlks ckns', 2, 3, 14, '2015-04-16 01:49:16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `fecha_registro` datetime NOT NULL,
  `plato_id` int(11) NOT NULL,
  `restaurante_id` int(11) NOT NULL,
  PRIMARY KEY (`plato_id`,`restaurante_id`),
  KEY `fk_menu_restaurante1_idx` (`restaurante_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `multimedia`
--

CREATE TABLE IF NOT EXISTS `multimedia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ruta` varchar(255) NOT NULL,
  `fecha` datetime NOT NULL,
  `restaurante_id` int(11) DEFAULT NULL,
  `plato_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_multimedia_restaurante1_idx` (`restaurante_id`),
  KEY `fk_multimedia_plato1_idx` (`plato_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Volcado de datos para la tabla `multimedia`
--

INSERT INTO `multimedia` (`id`, `ruta`, `fecha`, `restaurante_id`, `plato_id`) VALUES
(21, 'Restaurante_14.jpg', '2015-02-20 15:24:13', 14, NULL),
(25, 'Restaurante_14_Plato_8.jpg', '2015-02-20 15:41:55', 14, 8),
(26, 'Restaurante_14_Plato_9.jpg', '2015-02-20 16:02:09', 14, 9),
(27, 'Restaurante_14_Plato_10.jpg', '2015-02-20 16:27:06', 14, 10),
(28, 'Restaurante_14_Plato_11.JPG', '2015-04-17 01:17:50', 14, 11),
(29, 'Restaurante_14_Plato_12.JPG', '2015-04-17 01:39:43', 14, 12),
(30, 'Restaurante_14_Plato_13.JPG', '2015-04-17 01:41:23', 14, 13),
(31, 'Restaurante_14_Plato_15.png', '2015-04-17 01:56:41', 14, 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plato`
--

CREATE TABLE IF NOT EXISTS `plato` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Volcado de datos para la tabla `plato`
--

INSERT INTO `plato` (`id`, `nombre`, `descripcion`) VALUES
(5, 'lassaÃ±a', 'lassaÃ±a'),
(6, 'pasta carbonara', 'a la parrilla'),
(7, 'pescado frito', 'el mejor pescado'),
(8, 'pollo', 'pollo'),
(9, 'carnes', 'carnes'),
(10, 'carne molida', 'jhj'),
(11, 'plato de prueba', 'platode prueba1'),
(12, 'platoPrueba 3', 'plato de prueba 3'),
(13, 'plato de prueba 4', 'plato de prueba 4'),
(14, 'plato 5', 'plato 5'),
(15, 'prueba 7', 'prueba 7');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE IF NOT EXISTS `reserva` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `fecha_reserva` datetime NOT NULL,
  `cantidad` int(11) NOT NULL,
  `restaurante_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `codigo` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_reserva_restaurante1_idx` (`restaurante_id`),
  KEY `fk_reserva_usuario1_idx` (`usuario_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Volcado de datos para la tabla `reserva`
--

INSERT INTO `reserva` (`id`, `nombre`, `fecha_reserva`, `cantidad`, `restaurante_id`, `usuario_id`, `status`, `codigo`) VALUES
(26, 'jorge', '2015-04-17 14:00:00', 5, 14, 3, 1, 'R14U3R28222'),
(27, 'jorge', '2015-04-18 02:00:00', 8, 14, 3, 1, 'R14U3C1903'),
(28, 'jorge', '2015-04-22 02:30:00', 5, 14, 3, 1, 'R14U3C11388'),
(29, 'jorge', '2015-04-22 07:00:00', 3, 14, 3, 1, 'R14U3C26885'),
(30, 'jorge', '2015-04-28 17:30:00', 10, 14, 3, 1, 'R14U3C1183'),
(31, 'jorge', '2015-04-29 01:30:00', 6, 14, 3, 1, 'R14U3C6636');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `restaurante`
--

CREATE TABLE IF NOT EXISTS `restaurante` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `descripcion` varchar(45) NOT NULL,
  `usuario` varchar(45) NOT NULL,
  `contrasena` varchar(45) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `email` varchar(45) NOT NULL,
  `pagina_web` varchar(45) DEFAULT NULL,
  `capacidad` int(11) DEFAULT NULL,
  `fecha_registro` datetime DEFAULT NULL,
  `categoria_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_restaurante_categoria_idx` (`categoria_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Volcado de datos para la tabla `restaurante`
--

INSERT INTO `restaurante` (`id`, `nombre`, `descripcion`, `usuario`, `contrasena`, `direccion`, `telefono`, `email`, `pagina_web`, `capacidad`, `fecha_registro`, `categoria_id`) VALUES
(14, 'Il Cortile', 'restaurante', 'ilcortile', 'ilcortile', 'san cristobal', '02765555787', 'ilcortile@gmail.com', '', 100, '2015-02-20 15:24:13', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `username` varchar(16) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(32) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `username`, `email`, `password`, `direccion`, `telefono`) VALUES
(3, 'jorge', 'jorge', 'jorge@gmail.com', 'jorge', 'jkhsdkjhsk', '5465465'),
(4, 'wilfor Marquez', 'wilfor', 'wilfor@gmail.com', 'wilfor', 'san cristobal', '12345678912'),
(5, 'jose', 'jose', 'jose@gmail.com', 'jose', 'la ermita', '02763424084');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `fk_comentario_restaurante1` FOREIGN KEY (`restaurante_id`) REFERENCES `restaurante` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_comentario_usuario1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `fk_menu_plato1` FOREIGN KEY (`plato_id`) REFERENCES `plato` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_menu_restaurante1` FOREIGN KEY (`restaurante_id`) REFERENCES `restaurante` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `multimedia`
--
ALTER TABLE `multimedia`
  ADD CONSTRAINT `fk_multimedia_plato1` FOREIGN KEY (`plato_id`) REFERENCES `plato` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_multimedia_restaurante1` FOREIGN KEY (`restaurante_id`) REFERENCES `restaurante` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `fk_reserva_restaurante1` FOREIGN KEY (`restaurante_id`) REFERENCES `restaurante` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_reserva_usuario1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `restaurante`
--
ALTER TABLE `restaurante`
  ADD CONSTRAINT `fk_restaurante_categoria` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
