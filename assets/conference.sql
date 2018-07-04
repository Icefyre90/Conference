-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema conference
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema conference
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `conference` DEFAULT CHARACTER SET utf8 ;
USE `conference` ;

-- -----------------------------------------------------
-- Table `conference`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `conference`.`user` (
  `iduser` INT NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(45) NOT NULL,
  `password` VARCHAR(12) NOT NULL,
  `first_name` VARCHAR(45) NOT NULL,
  `last_name` VARCHAR(45) NOT NULL,
  `phone_number` VARCHAR(45) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `organisation` VARCHAR(255) NOT NULL,
  `date_of_birth` DATE NOT NULL,
  `coordinator` INT NOT NULL,
  PRIMARY KEY (`iduser`),
  UNIQUE INDEX `username_UNIQUE` (`username` ASC),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `conference`.`field`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `conference`.`field` (
  `idfield` INT NOT NULL AUTO_INCREMENT,
  `name_field` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idfield`),
  UNIQUE INDEX `name_field_UNIQUE` (`name_field` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `conference`.`project`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `conference`.`project` (
  `idproject` INT NOT NULL AUTO_INCREMENT,
  `project_name` VARCHAR(255) NOT NULL,
  `keywords` VARCHAR(255) NOT NULL,
  `section_pro` VARCHAR(45) NOT NULL,
  `apstract` VARCHAR(1000) NOT NULL,
  `field_idfield` INT NOT NULL,
  PRIMARY KEY (`idproject`),
  INDEX `fk_project_field1_idx` (`field_idfield` ASC),
  CONSTRAINT `fk_project_field1`
    FOREIGN KEY (`field_idfield`)
    REFERENCES `conference`.`field` (`idfield`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `conference`.`conference`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `conference`.`conference` (
  `idconference` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(45) NOT NULL,
  `place` VARCHAR(45) NOT NULL,
  `begin` DATETIME NOT NULL,
  `end` DATETIME NOT NULL,
  PRIMARY KEY (`idconference`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `conference`.`reviewer`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `conference`.`reviewer` (
  `idreviewer` INT NOT NULL AUTO_INCREMENT,
  `user_iduser` INT NOT NULL,
  `conference_idconference` INT NOT NULL,
  PRIMARY KEY (`idreviewer`),
  INDEX `fk_reviewer_user1_idx` (`user_iduser` ASC),
  INDEX `fk_reviewer_conference1_idx` (`conference_idconference` ASC),
  CONSTRAINT `fk_reviewer_user1`
    FOREIGN KEY (`user_iduser`)
    REFERENCES `conference`.`user` (`iduser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_reviewer_conference1`
    FOREIGN KEY (`conference_idconference`)
    REFERENCES `conference`.`conference` (`idconference`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `conference`.`review`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `conference`.`review` (
  `idreview` INT NOT NULL AUTO_INCREMENT,
  `rating` INT NOT NULL,
  `comment` VARCHAR(500) NOT NULL,
  `date_for_review` DATETIME NOT NULL,
  `reviewer_idreviewer` INT NOT NULL,
  `project_idproject` INT NOT NULL,
  PRIMARY KEY (`idreview`),
  INDEX `fk_review_reviewer1_idx` (`reviewer_idreviewer` ASC),
  INDEX `fk_review_project1_idx` (`project_idproject` ASC),
  CONSTRAINT `fk_review_reviewer1`
    FOREIGN KEY (`reviewer_idreviewer`)
    REFERENCES `conference`.`reviewer` (`idreviewer`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_review_project1`
    FOREIGN KEY (`project_idproject`)
    REFERENCES `conference`.`project` (`idproject`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `conference`.`conference_has_field`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `conference`.`conference_has_field` (
  `field_idfield` INT NOT NULL,
  `conference_idconference` INT NOT NULL,
  `id_conference_has_field` INT NOT NULL AUTO_INCREMENT,
  INDEX `fk_conference_has_field_field1_idx` (`field_idfield` ASC),
  INDEX `fk_conference_has_field_conference1_idx` (`conference_idconference` ASC),
  PRIMARY KEY (`id_conference_has_field`),
  CONSTRAINT `fk_conference_has_field_field1`
    FOREIGN KEY (`field_idfield`)
    REFERENCES `conference`.`field` (`idfield`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_conference_has_field_conference1`
    FOREIGN KEY (`conference_idconference`)
    REFERENCES `conference`.`conference` (`idconference`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `conference`.`autor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `conference`.`autor` (
  `user_iduser` INT NOT NULL,
  `project_idproject` INT NOT NULL,
  INDEX `fk_autor_user1_idx` (`user_iduser` ASC),
  INDEX `fk_autor_project1_idx` (`project_idproject` ASC),
  CONSTRAINT `fk_autor_user1`
    FOREIGN KEY (`user_iduser`)
    REFERENCES `conference`.`user` (`iduser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_autor_project1`
    FOREIGN KEY (`project_idproject`)
    REFERENCES `conference`.`project` (`idproject`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `conference`.`competence`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `conference`.`competence` (
  `idcompetence` INT NOT NULL,
  `competence_level` INT NULL,
  `reviewer_idreviewer` INT NOT NULL,
  `conference_has_field_id_conference_has_field` INT NOT NULL,
  PRIMARY KEY (`idcompetence`),
  INDEX `fk_competence_reviewer1_idx` (`reviewer_idreviewer` ASC),
  INDEX `fk_competence_conference_has_field1_idx` (`conference_has_field_id_conference_has_field` ASC),
  CONSTRAINT `fk_competence_reviewer1`
    FOREIGN KEY (`reviewer_idreviewer`)
    REFERENCES `conference`.`reviewer` (`idreviewer`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_competence_conference_has_field1`
    FOREIGN KEY (`conference_has_field_id_conference_has_field`)
    REFERENCES `conference`.`conference_has_field` (`id_conference_has_field`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `conference`.`project_file`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `conference`.`project_file` (
  `idproject_file` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL,
  `time` TIMESTAMP NULL,
  `project_idproject` INT NOT NULL,
  PRIMARY KEY (`idproject_file`),
  INDEX `fk_project_file_project1_idx` (`project_idproject` ASC),
  CONSTRAINT `fk_project_file_project1`
    FOREIGN KEY (`project_idproject`)
    REFERENCES `conference`.`project` (`idproject`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `conference`.`user_has_conference`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `conference`.`user_has_conference` (
  `iduser_has_conference` INT NOT NULL AUTO_INCREMENT,
  `user_iduser` INT NOT NULL,
  `conference_idconference` INT NOT NULL,
  PRIMARY KEY (`iduser_has_conference`),
  INDEX `fk_user_has_conference_user1_idx` (`user_iduser` ASC),
  INDEX `fk_user_has_conference_conference1_idx` (`conference_idconference` ASC),
  CONSTRAINT `fk_user_has_conference_user1`
    FOREIGN KEY (`user_iduser`)
    REFERENCES `conference`.`user` (`iduser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_has_conference_conference1`
    FOREIGN KEY (`conference_idconference`)
    REFERENCES `conference`.`conference` (`idconference`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
