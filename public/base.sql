-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema evaluacion-parcial-1
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema evaluacion-parcial-1
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `evaluacion-parcial-1` DEFAULT CHARACTER SET utf8 ;
USE `evaluacion-parcial-1` ;

-- -----------------------------------------------------
-- Table `evaluacion-parcial-1`.`Eventos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `evaluacion-parcial-1`.`Eventos` (
  `idEventos` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(100) NOT NULL,
  `fecha` DATETIME NOT NULL,
  `ubicacion` TEXT NULL COMMENT 'Campo para almacenar la ubicacion donde se realizara del evento',
  `descripcion` TEXT NOT NULL COMMENT 'Campo para almacenar la descripcion del evento',
  PRIMARY KEY (`idEventos`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `evaluacion-parcial-1`.`Participantes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `evaluacion-parcial-1`.`Participantes` (
  `idParticipantes` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(50) NOT NULL,
  `apellido` VARCHAR(50) NOT NULL,
  `email` VARCHAR(150) NULL,
  `telefono` VARCHAR(17) NOT NULL,
  PRIMARY KEY (`idParticipantes`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;