-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 08-12-2022 a las 22:35:33
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modelo`
--

DROP TABLE IF EXISTS `modelo`;
CREATE TABLE IF NOT EXISTS `modelo` (
  `id_modelo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_modelo` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_modelo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puesto`
--

DROP TABLE IF EXISTS `puesto`;
CREATE TABLE IF NOT EXISTS `puesto` (
  `id_puesto` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_puesto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `renovacion`
--

DROP TABLE IF EXISTS `renovacion`;
CREATE TABLE IF NOT EXISTS `renovacion` (
  `id_renovacion` int(11) NOT NULL AUTO_INCREMENT,
  `descipcion_renovacion` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_renovacion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

DROP TABLE IF EXISTS `rol`;
CREATE TABLE IF NOT EXISTS `rol` (
  `id_rol` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_rol` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `un`
--

DROP TABLE IF EXISTS `un`;
CREATE TABLE IF NOT EXISTS `un` (
  `id_un` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_un`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
