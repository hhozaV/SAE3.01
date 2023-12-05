-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema eduquiz
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema eduquiz
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `eduquiz` DEFAULT CHARACTER SET utf8 ;
USE `eduquiz` ;

-- -----------------------------------------------------
-- Table `eduquiz`.`Categories`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `eduquiz`.`Categories` (
  `idCategories` INT NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(45) NULL,
  PRIMARY KEY (`idCategories`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `eduquiz`.`Questions`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `eduquiz`.`Questions` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `question` LONGTEXT NULL,
  `description` VARCHAR(100) NULL,
  `multiple_correct_answers` TINYINT NULL,
  `difficulty` VARCHAR(45) NULL,
  `answer` LONGTEXT NULL,
  `idCategories` INT NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_Questions_Categories1`
    FOREIGN KEY (`idCategories`)
    REFERENCES `eduquiz`.`Categories` (`idCategories`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_Questions_Categories1_idx` ON `eduquiz`.`Questions` (`idCategories` ASC) VISIBLE;


-- -----------------------------------------------------
-- Table `eduquiz`.`Utilisateurs`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `eduquiz`.`Utilisateurs` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `pseudo` VARCHAR(50) NULL,
  `email` VARCHAR(50) NULL,
  `mdp` VARCHAR(50) NULL,
  `nom` VARCHAR(45) NULL,
  `prenom` VARCHAR(45) NULL,
  `dateNaissance` DATE NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `eduquiz`.`Answers`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `eduquiz`.`Answers` (
  `answer` TINYINT NULL,
  `Questions_id` INT NOT NULL,
  `Utilisateurs_id` INT NOT NULL,
  PRIMARY KEY (`Questions_id`, `Utilisateurs_id`),
  CONSTRAINT `fk_Answers_Questions`
    FOREIGN KEY (`Questions_id`)
    REFERENCES `eduquiz`.`Questions` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Answers_Utilisateurs1`
    FOREIGN KEY (`Utilisateurs_id`)
    REFERENCES `eduquiz`.`Utilisateurs` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_Answers_Utilisateurs1_idx` ON `eduquiz`.`Answers` (`Utilisateurs_id` ASC) VISIBLE;


-- -----------------------------------------------------
-- Table `eduquiz`.`MotsCles`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `eduquiz`.`MotsCles` (
  `idMotsCles` INT NOT NULL,
  `idCategories` INT NOT NULL,
  `mot` VARCHAR(45) NULL,
  PRIMARY KEY (`idMotsCles`),
  CONSTRAINT `fk_MotsCles_Categories1`
    FOREIGN KEY (`idCategories`)
    REFERENCES `eduquiz`.`Categories` (`idCategories`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `eduquiz`.`Lecon`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `eduquiz`.`Lecon` (
  `lien` VARCHAR(45) NULL,
  `idMotsCles` INT NOT NULL,
  `idLecon` INT NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`idLecon`),
  CONSTRAINT `fk_Lecon_MotsCles1`
    FOREIGN KEY (`idMotsCles`)
    REFERENCES `eduquiz`.`MotsCles` (`idMotsCles`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `eduquiz`.`Avis`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `eduquiz`.`Avis` (
  `Utilisateurs_id` INT NOT NULL,
  `Lecon_id` INT NOT NULL,
  `note` INT NULL,
  PRIMARY KEY (`Utilisateurs_id`, `Lecon_id`),
  CONSTRAINT `fk_Avis_Utilisateurs1`
    FOREIGN KEY (`Utilisateurs_id`)
    REFERENCES `eduquiz`.`Utilisateurs` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Avis_Lecon1`
    FOREIGN KEY (`Lecon_id`)
    REFERENCES `eduquiz`.`Lecon` (`idLecon`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_Avis_Lecon1_idx` ON `eduquiz`.`Avis` (`Lecon_id` ASC) VISIBLE;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
