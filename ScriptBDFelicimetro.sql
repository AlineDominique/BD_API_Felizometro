-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`Perguntas`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`Perguntas` ;

CREATE TABLE IF NOT EXISTS `mydb`.`Perguntas` (
  `idPerguntas` INT NOT NULL,
  `Pergunta` VARCHAR(500) NULL,
  PRIMARY KEY (`idPerguntas`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Resposta`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`Resposta` ;

CREATE TABLE IF NOT EXISTS `mydb`.`Resposta` (
  `idHistorico` INT NOT NULL,
  `idPergunta` INT NULL,
  `Data` DATETIME NULL,
  `respPositivo` INT NULL,
  `respNegativo` INT NULL,
  `respNeutro` INT NULL,
  `Perguntas_idPerguntas` INT NOT NULL,
  PRIMARY KEY (`idHistorico`),
  CONSTRAINT `fk_Historico_Perguntas`
    FOREIGN KEY (`Perguntas_idPerguntas`)
    REFERENCES `mydb`.`Perguntas` (`idPerguntas`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_Historico_Perguntas_idx` ON `mydb`.`Resposta` (`Perguntas_idPerguntas` ASC);


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
