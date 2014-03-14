SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `simplestore` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `simplestore` ;

-- -----------------------------------------------------
-- Table `simplestore`.`category`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `simplestore`.`category` ;

CREATE TABLE IF NOT EXISTS `simplestore`.`category` (
  `category_id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NOT NULL,
  `active` TINYINT UNSIGNED NOT NULL DEFAULT 1,
  `slug` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`category_id`),
  UNIQUE INDEX `slug_UNIQUE` (`slug` ASC));


-- -----------------------------------------------------
-- Table `simplestore`.`product`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `simplestore`.`product` ;

CREATE TABLE IF NOT EXISTS `simplestore`.`product` (
  `product_id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `description` MEDIUMTEXT NULL,
  `price` FLOAT UNSIGNED NOT NULL,
  `imageURL` VARCHAR(36) NULL,
  `active` TINYINT UNSIGNED NOT NULL DEFAULT 1,
  PRIMARY KEY (`product_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `simplestore`.`category_product`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `simplestore`.`category_product` ;

CREATE TABLE IF NOT EXISTS `simplestore`.`category_product` (
  `category_id` INT UNSIGNED NOT NULL,
  `product_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`category_id`, `product_id`),
  INDEX `product_id_idx` (`product_id` ASC),
  CONSTRAINT `category_product_category_id_fk`
    FOREIGN KEY (`category_id`)
    REFERENCES `simplestore`.`category` (`category_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `category_product_product_id_fk`
    FOREIGN KEY (`product_id`)
    REFERENCES `simplestore`.`product` (`product_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `simplestore`.`order`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `simplestore`.`order` ;

CREATE TABLE IF NOT EXISTS `simplestore`.`order` (
  `order_id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(50) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `phone` VARCHAR(20) NOT NULL,
  `street_address` VARCHAR(300) NOT NULL,
  `city` VARCHAR(20) NOT NULL,
  `state` VARCHAR(20) NOT NULL,
  `country` VARCHAR(20) NOT NULL,
  `postalcode` VARCHAR(15) NOT NULL,
  `obs` VARCHAR(350) NULL,
  `total_order_itens` SMALLINT UNSIGNED NOT NULL,
  `total_price` FLOAT UNSIGNED NOT NULL,
  PRIMARY KEY (`order_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `simplestore`.`order_item`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `simplestore`.`order_item` ;

CREATE TABLE IF NOT EXISTS `simplestore`.`order_item` (
  `order_item_id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_id` INT UNSIGNED NOT NULL,
  `product_id` INT UNSIGNED NOT NULL,
  `name` VARCHAR(255) NOT NULL,
  `price` FLOAT UNSIGNED NOT NULL,
  `quantity` SMALLINT UNSIGNED NOT NULL,
  PRIMARY KEY (`order_item_id`),
  INDEX `order_id_idx` (`order_id` ASC),
  INDEX `product_id_idx` (`product_id` ASC),
  CONSTRAINT `order_item_order_id_fk`
    FOREIGN KEY (`order_id`)
    REFERENCES `simplestore`.`order` (`order_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `order_item_product_id_fk`
    FOREIGN KEY (`product_id`)
    REFERENCES `simplestore`.`product` (`product_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
