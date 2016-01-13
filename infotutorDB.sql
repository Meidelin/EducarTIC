-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-01-2016 a las 20:31:50
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
  `IdCuestionario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE IF NOT EXISTS `curso` (
  `Sigla` varchar(50) NOT NULL,
  `IdUsuario` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Descripcion` varchar(100) NOT NULL,
  `Nivel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursosregistrados`
--

CREATE TABLE IF NOT EXISTS `cursosregistrados` (
  `Sigla` varchar(50) NOT NULL,
  `idUsuario` int(11) NOT NULL
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
-- Estructura de tabla para la tabla `foro`
--

CREATE TABLE IF NOT EXISTS `foro` (
  `IdForo` int(11) NOT NULL,
  `IdTema` int(11) NOT NULL,
  `FechaCreacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `practica`
--

CREATE TABLE IF NOT EXISTS `practica` (
  `IdPractica` int(11) NOT NULL,
  `IdCuestionario` int(11) NOT NULL,
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
  `IdPregunta` int(11) NOT NULL,
  `IdTema` int(11) NOT NULL,
  `Contenido` varchar(500) NOT NULL,
  `Respuesta` varchar(500) NOT NULL,
  `Valor` int(11) NOT NULL,
  `Tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntaforo`
--

CREATE TABLE IF NOT EXISTS `preguntaforo` (
  `IdPreguntaForo` int(11) NOT NULL,
  `IdForo` int(11) NOT NULL,
  `IdUsuario` int(11) NOT NULL,
  `Titulo` varchar(100) NOT NULL,
  `Pregunta` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntascuestionario`
--

CREATE TABLE IF NOT EXISTS `preguntascuestionario` (
  `IdCuestionario` int(11) NOT NULL,
  `IdPregunta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntasusuario`
--

CREATE TABLE IF NOT EXISTS `preguntasusuario` (
  `IdPreguntaUsuario` int(11) NOT NULL,
  `IdUsuario` int(11) NOT NULL,
  `IdTema` int(11) NOT NULL,
  `Contenido` varchar(500) NOT NULL,
  `Respuestas` varchar(10000) NOT NULL,
  `Tipo` varchar(100) NOT NULL,
  `Estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prueba`
--

CREATE TABLE IF NOT EXISTS `prueba` (
  `IdPrueba` int(11) NOT NULL,
  `IdCuestionario` int(11) NOT NULL,
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
  `Fecha` datetime NOT NULL
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
-- Estructura de tabla para la tabla `respuestaforo`
--

CREATE TABLE IF NOT EXISTS `respuestaforo` (
  `IdRespuestaForo` int(11) NOT NULL,
  `IdPreguntaForo` int(11) NOT NULL,
  `IdUsuario` int(11) NOT NULL,
  `Respuesta` varchar(10000) NOT NULL,
  `Calificacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuestaincorrecta`
--

CREATE TABLE IF NOT EXISTS `respuestaincorrecta` (
  `IdRespuestaIncorrecta` int(11) NOT NULL,
  `IdPrueba` int(11) NOT NULL,
  `Respuesta` varchar(10000) NOT NULL
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
  `Tipo` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `contenido`
--
ALTER TABLE `contenido`
  ADD PRIMARY KEY (`IdContenido`,`IdTema`),
  ADD UNIQUE KEY `IdContenido` (`IdContenido`),
  ADD UNIQUE KEY `IdContenido_2` (`IdContenido`),
  ADD KEY `IdTema` (`IdTema`);

--
-- Indices de la tabla `cuestionario`
--
ALTER TABLE `cuestionario`
  ADD PRIMARY KEY (`IdCuestionario`),
  ADD UNIQUE KEY `IdPrueba` (`IdCuestionario`);

--
-- Indices de la tabla `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`Sigla`,`IdUsuario`),
  ADD UNIQUE KEY `Nombre` (`Nombre`),
  ADD UNIQUE KEY `Sigla` (`Sigla`),
  ADD KEY `IdUsuario` (`IdUsuario`);

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
-- Indices de la tabla `foro`
--
ALTER TABLE `foro`
  ADD PRIMARY KEY (`IdForo`,`IdTema`),
  ADD UNIQUE KEY `IdForo` (`IdForo`),
  ADD KEY `IdTema` (`IdTema`);

--
-- Indices de la tabla `practica`
--
ALTER TABLE `practica`
  ADD PRIMARY KEY (`IdPractica`,`IdCuestionario`),
  ADD UNIQUE KEY `IdPractica` (`IdPractica`),
  ADD KEY `IdCuestionario` (`IdCuestionario`);

--
-- Indices de la tabla `practicausuario`
--
ALTER TABLE `practicausuario`
  ADD PRIMARY KEY (`IdPractica`,`IdUsuario`),
  ADD UNIQUE KEY `IdPractica` (`IdPractica`,`IdUsuario`),
  ADD KEY `IdUsuario` (`IdUsuario`);

--
-- Indices de la tabla `pregunta`
--
ALTER TABLE `pregunta`
  ADD PRIMARY KEY (`IdPregunta`,`IdTema`),
  ADD UNIQUE KEY `Contenido` (`Contenido`),
  ADD UNIQUE KEY `IdPregunta` (`IdPregunta`),
  ADD KEY `IdTema` (`IdTema`);

--
-- Indices de la tabla `preguntaforo`
--
ALTER TABLE `preguntaforo`
  ADD PRIMARY KEY (`IdPreguntaForo`,`IdForo`,`IdUsuario`),
  ADD UNIQUE KEY `IdPreguntaForo` (`IdPreguntaForo`),
  ADD KEY `IdForo` (`IdForo`);

--
-- Indices de la tabla `preguntascuestionario`
--
ALTER TABLE `preguntascuestionario`
  ADD PRIMARY KEY (`IdCuestionario`,`IdPregunta`),
  ADD KEY `IdPregunta` (`IdPregunta`);

--
-- Indices de la tabla `preguntasusuario`
--
ALTER TABLE `preguntasusuario`
  ADD PRIMARY KEY (`IdPreguntaUsuario`,`IdUsuario`,`IdTema`),
  ADD UNIQUE KEY `IdPreguntaUsuario` (`IdPreguntaUsuario`),
  ADD KEY `IdTema` (`IdTema`),
  ADD KEY `IdUsuario` (`IdUsuario`);

--
-- Indices de la tabla `prueba`
--
ALTER TABLE `prueba`
  ADD PRIMARY KEY (`IdPrueba`,`IdCuestionario`),
  ADD UNIQUE KEY `IdPrueba` (`IdPrueba`),
  ADD KEY `IdCuestionario` (`IdCuestionario`);

--
-- Indices de la tabla `pruebausuario`
--
ALTER TABLE `pruebausuario`
  ADD PRIMARY KEY (`IdPrueba`,`IdUsuario`),
  ADD UNIQUE KEY `IdPrueba` (`IdPrueba`,`IdUsuario`),
  ADD KEY `IdUsuario` (`IdUsuario`);

--
-- Indices de la tabla `recomendacion`
--
ALTER TABLE `recomendacion`
  ADD PRIMARY KEY (`IdRecomendacion`,`IdPrueba`),
  ADD UNIQUE KEY `IdRecomendacion` (`IdRecomendacion`),
  ADD UNIQUE KEY `IdPrueba` (`IdPrueba`);

--
-- Indices de la tabla `respuestaforo`
--
ALTER TABLE `respuestaforo`
  ADD PRIMARY KEY (`IdRespuestaForo`,`IdPreguntaForo`,`IdUsuario`),
  ADD UNIQUE KEY `IdRespuestaForo` (`IdRespuestaForo`),
  ADD KEY `IdPreguntaForo` (`IdPreguntaForo`);

--
-- Indices de la tabla `respuestaincorrecta`
--
ALTER TABLE `respuestaincorrecta`
  ADD PRIMARY KEY (`IdRespuestaIncorrecta`,`IdPrueba`),
  ADD UNIQUE KEY `IdRespuestaIncorrecta` (`IdRespuestaIncorrecta`),
  ADD KEY `IdPrueba` (`IdPrueba`);

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
-- AUTO_INCREMENT de la tabla `cuestionario`
--
ALTER TABLE `cuestionario`
  MODIFY `IdCuestionario` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `foro`
--
ALTER TABLE `foro`
  MODIFY `IdForo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `practica`
--
ALTER TABLE `practica`
  MODIFY `IdPractica` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `pregunta`
--
ALTER TABLE `pregunta`
  MODIFY `IdPregunta` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `preguntaforo`
--
ALTER TABLE `preguntaforo`
  MODIFY `IdPreguntaForo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `preguntasusuario`
--
ALTER TABLE `preguntasusuario`
  MODIFY `IdPreguntaUsuario` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `prueba`
--
ALTER TABLE `prueba`
  MODIFY `IdPrueba` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `respuestaforo`
--
ALTER TABLE `respuestaforo`
  MODIFY `IdRespuestaForo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `respuestaincorrecta`
--
ALTER TABLE `respuestaincorrecta`
  MODIFY `IdRespuestaIncorrecta` int(11) NOT NULL AUTO_INCREMENT;
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
-- Filtros para la tabla `curso`
--
ALTER TABLE `curso`
  ADD CONSTRAINT `curso_ibfk_1` FOREIGN KEY (`IdUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Filtros para la tabla `foro`
--
ALTER TABLE `foro`
  ADD CONSTRAINT `foro_ibfk_1` FOREIGN KEY (`IdTema`) REFERENCES `tema` (`IdTema`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `practica`
--
ALTER TABLE `practica`
  ADD CONSTRAINT `practica_ibfk_1` FOREIGN KEY (`IdCuestionario`) REFERENCES `cuestionario` (`IdCuestionario`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `pregunta_ibfk_1` FOREIGN KEY (`IdTema`) REFERENCES `tema` (`IdTema`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `preguntaforo`
--
ALTER TABLE `preguntaforo`
  ADD CONSTRAINT `preguntaforo_ibfk_1` FOREIGN KEY (`IdForo`) REFERENCES `foro` (`IdForo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `preguntascuestionario`
--
ALTER TABLE `preguntascuestionario`
  ADD CONSTRAINT `preguntascuestionario_ibfk_1` FOREIGN KEY (`IdCuestionario`) REFERENCES `cuestionario` (`IdCuestionario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `preguntascuestionario_ibfk_2` FOREIGN KEY (`IdPregunta`) REFERENCES `pregunta` (`IdPregunta`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `preguntasusuario`
--
ALTER TABLE `preguntasusuario`
  ADD CONSTRAINT `preguntasusuario_ibfk_1` FOREIGN KEY (`IdTema`) REFERENCES `tema` (`IdTema`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `preguntasusuario_ibfk_2` FOREIGN KEY (`IdUsuario`) REFERENCES `cursosregistrados` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `prueba`
--
ALTER TABLE `prueba`
  ADD CONSTRAINT `prueba_ibfk_2` FOREIGN KEY (`IdCuestionario`) REFERENCES `cuestionario` (`IdCuestionario`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Filtros para la tabla `respuestaforo`
--
ALTER TABLE `respuestaforo`
  ADD CONSTRAINT `respuestaforo_ibfk_1` FOREIGN KEY (`IdPreguntaForo`) REFERENCES `preguntaforo` (`IdPreguntaForo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `respuestaincorrecta`
--
ALTER TABLE `respuestaincorrecta`
  ADD CONSTRAINT `respuestaincorrecta_ibfk_1` FOREIGN KEY (`IdPrueba`) REFERENCES `prueba` (`IdPrueba`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tema`
--
ALTER TABLE `tema`
  ADD CONSTRAINT `tema_ibfk_1` FOREIGN KEY (`Sigla`) REFERENCES `curso` (`Sigla`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
