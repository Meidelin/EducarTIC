-- MySQL Script generated by MySQL Workbench
-- 01/25/16 14:42:57
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema lenggrupo4
-- -----------------------------------------------------
-- 
-- 

-- -----------------------------------------------------
-- Schema lenggrupo4
--
-- 
-- 
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `lenggrupo4` DEFAULT CHARACTER SET utf8 ;
USE `lenggrupo4` ;

-- -----------------------------------------------------
-- Table `lenggrupo4`.`curso`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lenggrupo4`.`curso` (
  `Sigla` VARCHAR(6) NOT NULL,
  `Nombre` VARCHAR(50) NOT NULL,
  `Descripcion` VARCHAR(100) NOT NULL,
  `NivelCurso` INT(11) NOT NULL,
  PRIMARY KEY (`Sigla`),
  UNIQUE INDEX `Nombre_UNIQUE` (`Nombre` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `lenggrupo4`.`tema`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lenggrupo4`.`tema` (
  `siglaCursoT` VARCHAR(6) NOT NULL,
  `IdTema` INT(11) NOT NULL AUTO_INCREMENT,
  `NombreT` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`IdTema`),
  INDEX `SiglaCursoT` (`siglaCursoT` ASC),
  CONSTRAINT `SiglaCursoT`
    FOREIGN KEY (`siglaCursoT`)
    REFERENCES `lenggrupo4`.`curso` (`Sigla`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `lenggrupo4`.`contenido`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lenggrupo4`.`contenido` (
  `IdContenido` INT(11) NOT NULL AUTO_INCREMENT,
  `IdTemaC` INT(11) NOT NULL,
  `ContenidoT` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`IdContenido`),
  INDEX `FK_idTema` (`IdTemaC` ASC),
  CONSTRAINT `FK_idTema`
    FOREIGN KEY (`IdTemaC`)
    REFERENCES `lenggrupo4`.`tema` (`IdTema`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `lenggrupo4`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lenggrupo4`.`usuario` (
  `IdUsuario` INT(11) NOT NULL AUTO_INCREMENT,
  `Nombre` VARCHAR(50) NULL DEFAULT NULL,
  `Apellidos` VARCHAR(100) NULL DEFAULT NULL,
  `Correo` VARCHAR(50) NULL DEFAULT NULL,
  `Usuario` VARCHAR(20) NULL DEFAULT NULL,
  `Contrasena` VARCHAR(20) NULL DEFAULT NULL,
  `Tipo` VARCHAR(20) NULL DEFAULT NULL,
  `Nivel` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`IdUsuario`),
  UNIQUE INDEX `Usuario` (`Usuario` ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `lenggrupo4`.`foro`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lenggrupo4`.`foro` (
  `IdForo` INT(11) NOT NULL AUTO_INCREMENT,
  `IdTemaF` INT(11) NOT NULL,
  `FechaCreacion` DATE NOT NULL,
  `titulo` VARCHAR(45) NOT NULL,
  `EnunciadoForo` VARCHAR(500) NOT NULL,
  `IdUsuarioF` INT(11) NOT NULL,
  PRIMARY KEY (`IdForo`),
  INDEX `idUsuario_idx` (`IdUsuarioF` ASC),
  INDEX `IdTemaF_idx` (`IdTemaF` ASC),
  CONSTRAINT `IdTemaF`
    FOREIGN KEY (`IdTemaF`)
    REFERENCES `lenggrupo4`.`tema` (`IdTema`),
  CONSTRAINT `IdUsuarioF`
    FOREIGN KEY (`IdUsuarioF`)
    REFERENCES `lenggrupo4`.`usuario` (`IdUsuario`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `lenggrupo4`.`matricula`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lenggrupo4`.`matricula` (
  `siglaCursoM` VARCHAR(6) NOT NULL,
  `idUsuarioM` INT(11) NOT NULL,
  PRIMARY KEY (`siglaCursoM`, `idUsuarioM`),
  INDEX `sigla_idx` (`siglaCursoM` ASC),
  INDEX `idUsuarioM` (`idUsuarioM` ASC),
  CONSTRAINT `idUsuarioM`
    FOREIGN KEY (`idUsuarioM`)
    REFERENCES `lenggrupo4`.`usuario` (`IdUsuario`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `siglaCursoM`
    FOREIGN KEY (`siglaCursoM`)
    REFERENCES `lenggrupo4`.`curso` (`Sigla`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `lenggrupo4`.`pregunta`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lenggrupo4`.`pregunta` (
  `IdPregunta` INT(11) NOT NULL AUTO_INCREMENT,
  `IdTemaP` INT(11) NOT NULL,
  `Enunciado` VARCHAR(500) NOT NULL,
  `Respuesta` VARCHAR(500) NOT NULL,
  `Valor` INT(11) NOT NULL,
  `Tipo` INT(11) NOT NULL,
  PRIMARY KEY (`IdPregunta`),
  INDEX `IdTemaP` (`IdTemaP` ASC),
  UNIQUE INDEX `Enunciado_UNIQUE` (`Enunciado` ASC),
  CONSTRAINT `pregunta_ibfk_1` FOREIGN KEY (`IdTemaP`) REFERENCES `lenggrupo4`.`tema` (`IdTema`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 6
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `lenggrupo4`.`preguntascuestionario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lenggrupo4`.`preguntascuestionario` (
  `IdCuestionario` INT(11) NOT NULL AUTO_INCREMENT,
  `IdPregunta` INT(11) NOT NULL,
  PRIMARY KEY (`IdCuestionario`, `IdPregunta`),
  INDEX `IdPregunta` (`IdPregunta` ASC),
  CONSTRAINT `preguntascuestionario_ibfk_2`
    FOREIGN KEY (`IdPregunta`)
    REFERENCES `lenggrupo4`.`pregunta` (`IdPregunta`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `lenggrupo4`.`practica`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lenggrupo4`.`practica` (
  `IdPractica` INT(11) NOT NULL,
  `RespuestasCorrectas` INT(11) NOT NULL,
  `RespuestasIncorrectas` INT(11) NOT NULL,
  PRIMARY KEY (`IdPractica`),
  CONSTRAINT `IdCuestionario`
    FOREIGN KEY (`IdPractica`)
    REFERENCES `lenggrupo4`.`preguntascuestionario` (`IdCuestionario`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `lenggrupo4`.`practicausuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lenggrupo4`.`practicausuario` (
  `IdPracticaU` INT(11) NOT NULL,
  `IdUsuarioPra` INT(11) NOT NULL,
  `Fecha` DATE NOT NULL,
  `SiglaCursoPrac` VARCHAR(6) NOT NULL,
  PRIMARY KEY (`IdPracticaU`, `IdUsuarioPra`),
  UNIQUE INDEX `IdPracticaU` (`IdPracticaU` ASC, `IdUsuarioPra` ASC),
  INDEX `IdUsuarioPra` (`IdUsuarioPra` ASC),
  INDEX `SiglaCursoPrac_idx` (`SiglaCursoPrac` ASC),
  CONSTRAINT `practicausuario_ibfk_1`
    FOREIGN KEY (`IdUsuarioPra`)
    REFERENCES `lenggrupo4`.`usuario` (`IdUsuario`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `practicausuario_ibfk_2`
    FOREIGN KEY (`IdPracticaU`)
    REFERENCES `lenggrupo4`.`practica` (`IdPractica`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `SiglaCursoPrac`
    FOREIGN KEY (`SiglaCursoPrac`)
    REFERENCES `lenggrupo4`.`curso` (`Sigla`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `lenggrupo4`.`preguntasusuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lenggrupo4`.`preguntasusuario` (
  `IdPreguntaUsuario` INT(11) NOT NULL AUTO_INCREMENT,
  `IdUsuarioPre` INT(11) NOT NULL,
  `IdTemaPre` INT(11) NOT NULL,
  `Contenido` VARCHAR(500) NOT NULL,
  `Respuestas` VARCHAR(10000) NOT NULL,
  `Tipo` VARCHAR(100) NOT NULL,
  `Estado` TINYINT(1) NOT NULL,
  PRIMARY KEY (`IdPreguntaUsuario`),
  INDEX `preguntasusuario_ibfk_1` (`IdTemaPre` ASC),
  INDEX `preguntasusuario_ibfk_2` (`IdUsuarioPre` ASC),
  CONSTRAINT `preguntasusuario_ibfk_1`
    FOREIGN KEY (`IdTemaPre`)
    REFERENCES `lenggrupo4`.`tema` (`IdTema`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `preguntasusuario_ibfk_2`
    FOREIGN KEY (`IdUsuarioPre`)
    REFERENCES `lenggrupo4`.`matricula` (`idUsuarioM`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `lenggrupo4`.`prueba`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lenggrupo4`.`prueba` (
  `IdPrueba` INT(11) NOT NULL,
  `Calificacion` DECIMAL(4,0) NOT NULL,
  `PuntosTotales` INT(11) NOT NULL,
  `PuntosObtenidos` INT(11) NOT NULL,
  `RespuestasCorrectas` INT(11) NOT NULL,
  `RespuestasIncorrectas` INT(11) NOT NULL,
  PRIMARY KEY (`IdPrueba`),
  CONSTRAINT `IdPrueba`
    FOREIGN KEY (`IdPrueba`)
    REFERENCES `lenggrupo4`.`preguntascuestionario` (`IdCuestionario`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `lenggrupo4`.`pruebausuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lenggrupo4`.`pruebausuario` (
  `IdPruebaU` INT(11) NOT NULL,
  `IdUsuarioPru` INT(11) NOT NULL,
  `Fecha` DATE NOT NULL,
  `SiglaCursoPru` VARCHAR(6) NOT NULL,
  PRIMARY KEY (`IdPruebaU`, `IdUsuarioPru`),
  UNIQUE INDEX `IdPruebaU` (`IdPruebaU` ASC, `IdUsuarioPru` ASC),
  INDEX `IdUsuarioPru` (`IdUsuarioPru` ASC),
  INDEX `SiglaCursoPru_idx` (`SiglaCursoPru` ASC),
  CONSTRAINT `pruebausuario_ibfk_1`
    FOREIGN KEY (`IdUsuarioPru`)
    REFERENCES `lenggrupo4`.`usuario` (`IdUsuario`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `pruebausuario_ibfk_2`
    FOREIGN KEY (`IdPruebaU`)
    REFERENCES `lenggrupo4`.`prueba` (`IdPrueba`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `SiglaCursoPru`
    FOREIGN KEY (`SiglaCursoPru`)
    REFERENCES `lenggrupo4`.`curso` (`Sigla`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `lenggrupo4`.`recomendacion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lenggrupo4`.`recomendacion` (
  `IdRecomendacion` INT(11) NOT NULL AUTO_INCREMENT,
  `IdPruebaRec` INT(11) NOT NULL,
  `Descripcion` VARCHAR(1000) NOT NULL,
  PRIMARY KEY (`IdRecomendacion`, `IdPruebaRec`),
  INDEX `recomendacion_ibfk_1` (`IdPruebaRec` ASC),
  CONSTRAINT `recomendacion_ibfk_1`
    FOREIGN KEY (`IdPruebaRec`)
    REFERENCES `lenggrupo4`.`prueba` (`IdPrueba`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `lenggrupo4`.`respuestaforo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lenggrupo4`.`respuestaforo` (
  `IdRespuestaForo` INT(11) NOT NULL AUTO_INCREMENT,
  `IdForoR` INT(11) NOT NULL,
  `Respuesta` VARCHAR(500) NOT NULL,
  `Calificacion` INT(11) NOT NULL,
  `IdUsuarioR` INT(11) NOT NULL,
  PRIMARY KEY (`IdRespuestaForo`, `IdForoR`),
  INDEX `IdForo_idx` (`IdForoR` ASC),
  INDEX `idUsuario_idx` (`IdUsuarioR` ASC),
  CONSTRAINT `IdForoR`
    FOREIGN KEY (`IdForoR`)
    REFERENCES `lenggrupo4`.`foro` (`IdForo`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `IdUsuarioR`
    FOREIGN KEY (`IdUsuarioR`)
    REFERENCES `lenggrupo4`.`usuario` (`IdUsuario`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `lenggrupo4`.`respuestaincorrecta`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lenggrupo4`.`respuestaincorrecta` (
  `IdRespuestaIncorrecta` INT(11) NOT NULL AUTO_INCREMENT,
  `IdPreguntaRI` INT(11) NOT NULL,
  `Respuesta` VARCHAR(500) NOT NULL,
  `IdCuestionarioRI` INT(11) NOT NULL,
  PRIMARY KEY (`IdRespuestaIncorrecta`, `IdPreguntaRI`, `IdCuestionarioRI`),
  INDEX `IdCuestionario_idx` (`IdCuestionarioRI` ASC),
  INDEX `IdPreguntaRI` (`IdPreguntaRI` ASC),
  CONSTRAINT `IdCuestionarioRI`
    FOREIGN KEY (`IdCuestionarioRI`)
    REFERENCES `lenggrupo4`.`preguntascuestionario` (`IdCuestionario`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `IdPreguntaRI`
    FOREIGN KEY (`IdPreguntaRI`)
    REFERENCES `lenggrupo4`.`preguntascuestionario` (`IdPregunta`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `lenggrupo4`.`TemasVistos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lenggrupo4`.`TemasVistos` (
  `idTemasVisto` INT NOT NULL,
  `idUsuarioTV` INT NOT NULL,
  `siglaCursoV` VARCHAR(6) NOT NULL,
  PRIMARY KEY (`idTemasVisto`, `idUsuarioTV`, `siglaCursoV`),
  INDEX `idUsuarioTV_idx` (`idUsuarioTV` ASC),
  INDEX `siglaCursoV_idx` (`siglaCursoV` ASC),
  CONSTRAINT `idTemasVisto`
    FOREIGN KEY (`idTemasVisto`)
    REFERENCES `lenggrupo4`.`tema` (`IdTema`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `idUsuarioTV`
    FOREIGN KEY (`idUsuarioTV`)
    REFERENCES `lenggrupo4`.`usuario` (`IdUsuario`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `siglaCursoV`
    FOREIGN KEY (`siglaCursoV`)
    REFERENCES `lenggrupo4`.`curso` (`Sigla`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
