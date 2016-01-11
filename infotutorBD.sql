-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-01-2016 a las 03:37:15
-- Versión del servidor: 5.6.26
-- Versión de PHP: 5.5.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `infotutor`
--
CREATE DATABASE IF NOT EXISTS `infotutor` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `infotutor`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contenido`
--

CREATE TABLE IF NOT EXISTS `contenido` (
  `IdContenido` int(11) NOT NULL,
  `IdTema` int(11) NOT NULL,
  `Contenido` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuestionario`
--

CREATE TABLE IF NOT EXISTS `cuestionario` (
  `IdCuestionario` int(11) NOT NULL,
  `IdPractica` int(11) NOT NULL,
  `IdPrueba` int(11) NOT NULL,
  `Tipo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE IF NOT EXISTS `curso` (
  `Sigla` varchar(50) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Descripcion` varchar(100) NOT NULL,
  `Nivel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursosregistrados`
--

CREATE TABLE IF NOT EXISTS `cursosregistrados` (
  `idUsuario` int(11) NOT NULL,
  `Sigla` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE IF NOT EXISTS `estudiante` (
  `IdUsuario` int(11) NOT NULL,
  `Nivel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `practica`
--

CREATE TABLE IF NOT EXISTS `practica` (
  `IdPractica` int(11) NOT NULL,
  `IdUsuario` int(11) NOT NULL,
  `RespuestasCorrectas` int(11) NOT NULL,
  `RespuestasIncorrectas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `practicausuario`
--

CREATE TABLE IF NOT EXISTS `practicausuario` (
  `IdPractica` int(11) NOT NULL,
  `IdUsuario` int(11) NOT NULL,
  `Fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pregunta`
--

CREATE TABLE IF NOT EXISTS `pregunta` (
  `IdCuestionario` int(11) NOT NULL,
  `IdTema` int(11) NOT NULL,
  `Contenido` varchar(500) NOT NULL,
  `Respuesta` varchar(500) NOT NULL,
  `Valor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prueba`
--

CREATE TABLE IF NOT EXISTS `prueba` (
  `IdPrueba` int(11) NOT NULL,
  `IdUsuario` int(11) NOT NULL,
  `Calificacion` decimal(10,0) NOT NULL,
  `PuntosTotales` int(11) NOT NULL,
  `PuntosObtenidos` int(11) NOT NULL,
  `RespuestasCorrectas` int(11) NOT NULL,
  `RespuestasIncorrectas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pruebausuario`
--

CREATE TABLE IF NOT EXISTS `pruebausuario` (
  `IdPrueba` int(11) NOT NULL,
  `IdUsuario` int(11) NOT NULL,
  `Fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recomendacion`
--

CREATE TABLE IF NOT EXISTS `recomendacion` (
  `IdRecomendacion` int(11) NOT NULL,
  `IdPrueba` int(11) NOT NULL,
  `Descripcion` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tema`
--

CREATE TABLE IF NOT EXISTS `tema` (
  `Sigla` varchar(50) NOT NULL,
  `IdTema` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `idUsuario` int(11) NOT NULL,
  `Nombre` varchar(50) DEFAULT NULL,
  `Apellidos` varchar(100) DEFAULT NULL,
  `Correo` varchar(50) DEFAULT NULL,
  `Usuario` varchar(20) DEFAULT NULL,
  `Contrasena` varchar(20) DEFAULT NULL,
  `Tipo` varchar(20) DEFAULT NULL,
  `Sexo` char(2) DEFAULT NULL,
  `Edad` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `contenido`
--
ALTER TABLE `contenido`
  ADD PRIMARY KEY (`IdContenido`,`IdTema`),
  ADD KEY `IdTema` (`IdTema`);

--
-- Indices de la tabla `cuestionario`
--
ALTER TABLE `cuestionario`
  ADD PRIMARY KEY (`IdCuestionario`,`IdPractica`,`IdPrueba`),
  ADD KEY `IdPrueba` (`IdPrueba`),
  ADD KEY `IdPractica` (`IdPractica`);

--
-- Indices de la tabla `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`Sigla`,`idUsuario`),
  ADD UNIQUE KEY `Nombre` (`Nombre`),
  ADD UNIQUE KEY `Sigla` (`Sigla`),
  ADD UNIQUE KEY `idUsuario` (`idUsuario`);

--
-- Indices de la tabla `cursosregistrados`
--
ALTER TABLE `cursosregistrados`
  ADD PRIMARY KEY (`idUsuario`,`Sigla`),
  ADD UNIQUE KEY `idUsuario` (`idUsuario`),
  ADD UNIQUE KEY `Sigla` (`Sigla`);

--
-- Indices de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD PRIMARY KEY (`IdUsuario`),
  ADD UNIQUE KEY `IdUsuario` (`IdUsuario`);

--
-- Indices de la tabla `practica`
--
ALTER TABLE `practica`
  ADD PRIMARY KEY (`IdPractica`,`IdUsuario`),
  ADD UNIQUE KEY `IdPractica` (`IdPractica`),
  ADD UNIQUE KEY `IdUsuario` (`IdUsuario`);

--
-- Indices de la tabla `practicausuario`
--
ALTER TABLE `practicausuario`
  ADD PRIMARY KEY (`IdPractica`,`IdUsuario`),
  ADD KEY `IdUsuario` (`IdUsuario`);

--
-- Indices de la tabla `pregunta`
--
ALTER TABLE `pregunta`
  ADD PRIMARY KEY (`IdCuestionario`,`IdTema`),
  ADD UNIQUE KEY `Contenido` (`Contenido`),
  ADD UNIQUE KEY `IdPregunta` (`IdCuestionario`),
  ADD UNIQUE KEY `IdTema` (`IdTema`);

--
-- Indices de la tabla `prueba`
--
ALTER TABLE `prueba`
  ADD PRIMARY KEY (`IdPrueba`,`IdUsuario`),
  ADD UNIQUE KEY `IdPrueba` (`IdPrueba`),
  ADD UNIQUE KEY `IdUsuario` (`IdUsuario`);

--
-- Indices de la tabla `pruebausuario`
--
ALTER TABLE `pruebausuario`
  ADD PRIMARY KEY (`IdPrueba`,`IdUsuario`),
  ADD KEY `IdUsuario` (`IdUsuario`);

--
-- Indices de la tabla `recomendacion`
--
ALTER TABLE `recomendacion`
  ADD PRIMARY KEY (`IdRecomendacion`,`IdPrueba`),
  ADD UNIQUE KEY `IdRecomendacion` (`IdRecomendacion`),
  ADD UNIQUE KEY `IdPrueba` (`IdPrueba`);

--
-- Indices de la tabla `tema`
--
ALTER TABLE `tema`
  ADD PRIMARY KEY (`Sigla`,`IdTema`),
  ADD UNIQUE KEY `IdTema` (`IdTema`),
  ADD UNIQUE KEY `Sigla` (`Sigla`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`),
  ADD UNIQUE KEY `idUsuario` (`idUsuario`),
  ADD UNIQUE KEY `Nombre` (`Nombre`),
  ADD UNIQUE KEY `Usuario` (`Usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `contenido`
--
ALTER TABLE `contenido`
  MODIFY `IdContenido` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `prueba`
--
ALTER TABLE `prueba`
  MODIFY `IdPrueba` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `contenido`
--
ALTER TABLE `contenido`
  ADD CONSTRAINT `contenido_ibfk_1` FOREIGN KEY (`IdTema`) REFERENCES `tema` (`IdTema`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cuestionario`
--
ALTER TABLE `cuestionario`
  ADD CONSTRAINT `cuestionario_ibfk_1` FOREIGN KEY (`IdPrueba`) REFERENCES `prueba` (`IdPrueba`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cuestionario_ibfk_2` FOREIGN KEY (`IdPractica`) REFERENCES `practica` (`IdPractica`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `curso`
--
ALTER TABLE `curso`
  ADD CONSTRAINT `curso_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cursosregistrados`
--
ALTER TABLE `cursosregistrados`
  ADD CONSTRAINT `cursosregistrados_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `estudiante` (`IdUsuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cursosregistrados_ibfk_2` FOREIGN KEY (`Sigla`) REFERENCES `curso` (`Sigla`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD CONSTRAINT `estudiante_ibfk_1` FOREIGN KEY (`IdUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `practicausuario`
--
ALTER TABLE `practicausuario`
  ADD CONSTRAINT `practicausuario_ibfk_1` FOREIGN KEY (`IdUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `practicausuario_ibfk_2` FOREIGN KEY (`IdPractica`) REFERENCES `practica` (`IdPractica`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pregunta`
--
ALTER TABLE `pregunta`
  ADD CONSTRAINT `pregunta_ibfk_1` FOREIGN KEY (`IdTema`) REFERENCES `tema` (`IdTema`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pregunta_ibfk_2` FOREIGN KEY (`IdCuestionario`) REFERENCES `cuestionario` (`IdCuestionario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pruebausuario`
--
ALTER TABLE `pruebausuario`
  ADD CONSTRAINT `pruebausuario_ibfk_1` FOREIGN KEY (`IdUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pruebausuario_ibfk_2` FOREIGN KEY (`IdPrueba`) REFERENCES `prueba` (`IdPrueba`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `recomendacion`
--
ALTER TABLE `recomendacion`
  ADD CONSTRAINT `recomendacion_ibfk_1` FOREIGN KEY (`IdPrueba`) REFERENCES `prueba` (`IdPrueba`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tema`
--
ALTER TABLE `tema`
  ADD CONSTRAINT `tema_ibfk_1` FOREIGN KEY (`Sigla`) REFERENCES `curso` (`Sigla`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
