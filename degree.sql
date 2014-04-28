SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `degree` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `degree` ;

-- -----------------------------------------------------
-- Table `degree`.`participant`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `degree`.`participant` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `fname` VARCHAR(45) NULL ,
  `lname` VARCHAR(45) NULL ,
  `token` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `degree`.`device`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `degree`.`device` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NULL ,
  `type` ENUM('phone','tablet') NULL ,
  `xres` INT NULL ,
  `yres` INT NULL ,
  `diagonal` FLOAT NULL ,
  `os` VARCHAR(45) NULL ,
  `version` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `degree`.`session`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `degree`.`session` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `participant_id` INT NOT NULL ,
  `device_id` INT NOT NULL ,
  `date` DATE NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_session_participant_idx` (`participant_id` ASC) ,
  INDEX `fk_session_device1_idx` (`device_id` ASC) ,
  CONSTRAINT `fk_session_participant`
    FOREIGN KEY (`participant_id` )
    REFERENCES `degree`.`participant` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_session_device1`
    FOREIGN KEY (`device_id` )
    REFERENCES `degree`.`device` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `degree`.`text`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `degree`.`text` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NULL ,
  `description` TINYTEXT NULL ,
  `body` TEXT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `degree`.`stage`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `degree`.`stage` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `status` ENUM('started','in progress','bailed','finished') NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `degree`.`reading`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `degree`.`reading` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `text_id` INT NOT NULL ,
  `stage_id` INT NOT NULL ,
  `start` TIME NULL ,
  `end` TIME NULL ,
  `presentation` ENUM('crawl','paragraph') NULL ,
  `angle` FLOAT NULL ,
  `speed` TINYINT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_reading_text1_idx` (`text_id` ASC) ,
  INDEX `fk_reading_stage1_idx` (`stage_id` ASC) ,
  CONSTRAINT `fk_reading_text1`
    FOREIGN KEY (`text_id` )
    REFERENCES `degree`.`text` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_reading_stage1`
    FOREIGN KEY (`stage_id` )
    REFERENCES `degree`.`stage` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `degree`.`user`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `degree`.`user` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `uname` VARCHAR(45) NOT NULL ,
  `pword` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `degree`.`session_stage`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `degree`.`session_stage` (
  `session_id` INT NULL ,
  `stage_id` INT NULL ,
  PRIMARY KEY (`stage_id`, `session_id`) ,
  INDEX `fk_session_stage_stage1_idx` (`stage_id` ASC) ,
  INDEX `fk_session_stage_session1_idx` (`session_id` ASC) ,
  CONSTRAINT `fk_session_stage_session1`
    FOREIGN KEY (`session_id` )
    REFERENCES `degree`.`session` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_session_stage_stage1`
    FOREIGN KEY (`stage_id` )
    REFERENCES `degree`.`stage` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `degree`.`metric`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `degree`.`metric` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `reading_id` INT NOT NULL ,
  `type` ENUM('distance','errors') NULL ,
  `value` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_metric_reading1_idx` (`reading_id` ASC) ,
  CONSTRAINT `fk_metric_reading1`
    FOREIGN KEY (`reading_id` )
    REFERENCES `degree`.`reading` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

USE `degree` ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
