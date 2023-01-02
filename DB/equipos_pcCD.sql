-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 02-01-2023 a las 02:35:02
-- Versión del servidor: 5.7.36
-- Versión de PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `equipos_pc`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

DROP TABLE IF EXISTS `departamento`;
CREATE TABLE IF NOT EXISTS `departamento` (
  `id_departamento` int(11) NOT NULL AUTO_INCREMENT,
  `nombreD` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_departamento`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`id_departamento`, `nombreD`) VALUES
(1, 'TI'),
(2, 'TELECOM'),
(3, 'RH');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo`
--

DROP TABLE IF EXISTS `equipo`;
CREATE TABLE IF NOT EXISTS `equipo` (
  `st` varchar(15) NOT NULL,
  `nombre_pc` varchar(100) DEFAULT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `accesorios` varchar(100) DEFAULT NULL,
  `tipo_equipo` varchar(15) DEFAULT NULL,
  `precio_venta` double DEFAULT NULL,
  `precio_adquisicion` double DEFAULT NULL,
  `id_marca` int(11) DEFAULT NULL,
  `modelo` varchar(50) DEFAULT NULL,
  `estado` varchar(50) NOT NULL,
  PRIMARY KEY (`st`),
  KEY `fk_id_marca` (`id_marca`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `equipo`
--

INSERT INTO `equipo` (`st`, `nombre_pc`, `descripcion`, `accesorios`, `tipo_equipo`, `precio_venta`, `precio_adquisicion`, `id_marca`, `modelo`, `estado`) VALUES
('22PTL4', 'MacBook', 'Laptop apple', 'Cargador y candado MOCHILA', 'Laptop', 2000, 18000, 1, 'MacBook pro ', 'Disponible'),
('22SDF34', 'Latitude', 'Laptop dell', 'nada', 'laptop', 5000, 25000, 2, 'Latitude 5480', 'Ocupado'),
('aaaaa', 'Latitude', 'hhmfm', 'Cargador y candado', 'Laptop', 2000, 18000, 2, 'Latitude 5480', 'Disponible'),
('DDEE2332', 'ddd', 'dddd', 'ddd', 'laptop', 5000, 25000, 1, 'Latitude 5480', 'Disponible');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

DROP TABLE IF EXISTS `marca`;
CREATE TABLE IF NOT EXISTS `marca` (
  `id_marca` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_marca` varchar(20) DEFAULT NULL,
  `id_modelo` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_marca`),
  KEY `fk_id_modelo` (`id_modelo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`id_marca`, `nombre_marca`, `id_modelo`) VALUES
(1, 'Apple', 2),
(2, 'Dell', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modelo`
--

DROP TABLE IF EXISTS `modelo`;
CREATE TABLE IF NOT EXISTS `modelo` (
  `id_modelo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_modelo` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_modelo`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `modelo`
--

INSERT INTO `modelo` (`id_modelo`, `nombre_modelo`) VALUES
(1, 'Latitude 5480'),
(2, 'MacBook pro ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puesto`
--

DROP TABLE IF EXISTS `puesto`;
CREATE TABLE IF NOT EXISTS `puesto` (
  `id_puesto` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_puesto`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `puesto`
--

INSERT INTO `puesto` (`id_puesto`, `nombre`) VALUES
(1, 'Jefe'),
(2, 'Lider'),
(3, 'Sr.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `renovacion`
--

DROP TABLE IF EXISTS `renovacion`;
CREATE TABLE IF NOT EXISTS `renovacion` (
  `id_renovacion` int(11) NOT NULL AUTO_INCREMENT,
  `descipcion_renovacion` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_renovacion`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `renovacion`
--

INSERT INTO `renovacion` (`id_renovacion`, `descipcion_renovacion`) VALUES
(1, 'Nuevo'),
(2, 'Perdida'),
(3, 'Descompostura'),
(4, 'Prestamo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

DROP TABLE IF EXISTS `rol`;
CREATE TABLE IF NOT EXISTS `rol` (
  `id_rol` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_rol` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id_rol`, `nombre_rol`) VALUES
(3, 'Administrador'),
(4, 'Sub-Administrador'),
(6, 'Mortal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ticket_compra`
--

DROP TABLE IF EXISTS `ticket_compra`;
CREATE TABLE IF NOT EXISTS `ticket_compra` (
  `id_compra` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `no_empleado` int(11) DEFAULT NULL,
  `st` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id_compra`),
  KEY `fk_no_empleado2` (`no_empleado`),
  KEY `fk_sd2` (`st`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ticket_compra`
--

INSERT INTO `ticket_compra` (`id_compra`, `fecha`, `descripcion`, `no_empleado`, `st`) VALUES
(4, '2022-12-07', 'Cargador', 10, '22PTL4'),
(5, '2022-12-29', 'Cargador, Mochila, Candado', 10, '22PTL4'),
(6, '2022-12-29', 'Cargador', 111111, 'DDEE2332');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ticket_pc`
--

DROP TABLE IF EXISTS `ticket_pc`;
CREATE TABLE IF NOT EXISTS `ticket_pc` (
  `id_ticket` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `contrasena_admin` varchar(100) DEFAULT NULL,
  `contrasena_system` varchar(100) DEFAULT NULL,
  `contrasena_disco` varchar(100) DEFAULT NULL,
  `contrasena_Wiadmin` varchar(100) DEFAULT NULL,
  `no_empleado` int(11) DEFAULT NULL,
  `st` varchar(15) DEFAULT NULL,
  `id_renovacion` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_ticket`),
  UNIQUE KEY `st` (`st`),
  KEY `fk_no_empleado` (`no_empleado`),
  KEY `fk_sd` (`st`),
  KEY `fk_id_renovacion` (`id_renovacion`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ticket_pc`
--

INSERT INTO `ticket_pc` (`id_ticket`, `fecha`, `descripcion`, `contrasena_admin`, `contrasena_system`, `contrasena_disco`, `contrasena_Wiadmin`, `no_empleado`, `st`, `id_renovacion`) VALUES
(6, '2022-12-29', 'hhmfm', 'rk5tSPJmjw', '6G9HS1pCzu', 'By2ehqntrN', 'n1ClZVEdzY', 883388, '22SDF34', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `un`
--

DROP TABLE IF EXISTS `un`;
CREATE TABLE IF NOT EXISTS `un` (
  `id_un` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_un`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `un`
--

INSERT INTO `un` (`id_un`, `nombre`) VALUES
(1, 'Corporativo'),
(2, 'Noroeste'),
(3, 'Sureste');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `no_empleado` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `usuario_red` varchar(10) DEFAULT NULL,
  `no_celular` int(11) DEFAULT NULL,
  `id_puesto` int(11) DEFAULT NULL,
  `id_un` int(11) DEFAULT NULL,
  `id_departamento` int(11) DEFAULT NULL,
  PRIMARY KEY (`no_empleado`),
  KEY `fk_id_puestoU` (`id_puesto`),
  KEY `fk_id_unU` (`id_un`),
  KEY `fk_id_depa` (`id_departamento`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`no_empleado`, `nombre`, `correo`, `usuario_red`, `no_celular`, `id_puesto`, `id_un`, `id_departamento`) VALUES
(10, 'Jorge Adrian Garcia Martinez', 'adrian19_97@oulook.com', 'GMJA', 123, 1, 1, 1),
(90, 'Dieguito', 'lll@oulook.commmm', 'YYY0', 5777, 1, 1, 2),
(111111, 'PEPE', 'PEPE@HOTMAIL.COM', 'AAA', 123, 1, 1, 3),
(883388, 'LEEEEE', 'LALALA@LALA.COMMMM', '123456', 1234678, 1, 1, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuariopri`
--

DROP TABLE IF EXISTS `usuariopri`;
CREATE TABLE IF NOT EXISTS `usuariopri` (
  `id_usuariopri` int(11) NOT NULL AUTO_INCREMENT,
  `correo` varchar(100) DEFAULT NULL,
  `pass` varchar(32) DEFAULT NULL,
  `token` varchar(16) DEFAULT NULL,
  PRIMARY KEY (`id_usuariopri`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuariopri`
--

INSERT INTO `usuariopri` (`id_usuariopri`, `correo`, `pass`, `token`) VALUES
(40, 'adrian19_97@oulook.com', 'c4ca4238a0b923820dcc509a6f75849b', NULL),
(42, 'lll@oulook.commmm', 'f688ae26e9cfa3ba6235477831d5122e', NULL),
(43, 'LALALA@LALA.COMMMM', '202cb962ac59075b964b07152d234b70', NULL),
(44, 'PEPE@HOTMAIL.COM', 'c4ca4238a0b923820dcc509a6f75849b', NULL),
(45, 'adrian19_97@oulook.com', 'b59c67bf196a4758191e42f76670ceba', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuariopri_rol`
--

DROP TABLE IF EXISTS `usuariopri_rol`;
CREATE TABLE IF NOT EXISTS `usuariopri_rol` (
  `id_rol` int(11) NOT NULL,
  `id_usuariopri` int(11) NOT NULL,
  PRIMARY KEY (`id_rol`,`id_usuariopri`),
  KEY `fk_us` (`id_usuariopri`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuariopri_rol`
--

INSERT INTO `usuariopri_rol` (`id_rol`, `id_usuariopri`) VALUES
(3, 40),
(6, 42),
(3, 43),
(6, 44);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `equipo`
--
ALTER TABLE `equipo`
  ADD CONSTRAINT `fk_id_marca` FOREIGN KEY (`id_marca`) REFERENCES `marca` (`id_marca`);

--
-- Filtros para la tabla `marca`
--
ALTER TABLE `marca`
  ADD CONSTRAINT `fk_id_modelo` FOREIGN KEY (`id_modelo`) REFERENCES `modelo` (`id_modelo`);

--
-- Filtros para la tabla `ticket_compra`
--
ALTER TABLE `ticket_compra`
  ADD CONSTRAINT `fk_no_empleado2` FOREIGN KEY (`no_empleado`) REFERENCES `usuario` (`no_empleado`),
  ADD CONSTRAINT `fk_sd2` FOREIGN KEY (`st`) REFERENCES `equipo` (`st`);

--
-- Filtros para la tabla `ticket_pc`
--
ALTER TABLE `ticket_pc`
  ADD CONSTRAINT `fk_id_renovacion` FOREIGN KEY (`id_renovacion`) REFERENCES `renovacion` (`id_renovacion`),
  ADD CONSTRAINT `fk_no_empleado` FOREIGN KEY (`no_empleado`) REFERENCES `usuario` (`no_empleado`),
  ADD CONSTRAINT `fk_sd` FOREIGN KEY (`st`) REFERENCES `equipo` (`st`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_id_depa` FOREIGN KEY (`id_departamento`) REFERENCES `departamento` (`id_departamento`),
  ADD CONSTRAINT `fk_id_puestoU` FOREIGN KEY (`id_puesto`) REFERENCES `puesto` (`id_puesto`),
  ADD CONSTRAINT `fk_id_unU` FOREIGN KEY (`id_un`) REFERENCES `un` (`id_un`);

--
-- Filtros para la tabla `usuariopri_rol`
--
ALTER TABLE `usuariopri_rol`
  ADD CONSTRAINT `fk_rol` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`),
  ADD CONSTRAINT `fk_us` FOREIGN KEY (`id_usuariopri`) REFERENCES `usuariopri` (`id_usuariopri`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
