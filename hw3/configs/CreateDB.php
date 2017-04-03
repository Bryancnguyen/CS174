<?php
require_once("./resources/config.php");
// change these settings to be from Config.php
// sql connection
$mysqli = new mysqli("localhost", "my_user", "my_password", "my_db"); 
$stmt =  $mysqli->stmt_init();
// prepared sql statements
$preps = [
"CREATE SCHEMA IF NOT EXISTS `cs174hw3` DEFAULT CHARACTER SET utf8 ;
USE `cs174hw3`",
"CREATE TABLE IF NOT EXISTS `cs174hw3`.`categories` (
  `name` VARCHAR(45) NOT NULL,
  `idparent` INT NOT NULL,
  `idcategories` INT NOT NULL,
  PRIMARY KEY (`idcategories`))
ENGINE = InnoDB",
"CREATE TABLE IF NOT EXISTS `cs174hw3`.`notes` (
  `idnotes` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `content` LONGTEXT NOT NULL,
  `idcategory` INT NULL,
  `date` DATE NOT NULL DEFAULT CURRENT_DATE,
  PRIMARY KEY (`idnotes`),
  INDEX `fk_notes_categories_idx` (`idcategory` ASC),
  CONSTRAINT `fk_notes_categories`
    FOREIGN KEY (`idcategory`)
    REFERENCES `cs174hw3`.`categories` (`idcategories`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB"
];

foreach($preps as $prep){
	print("Executing: $prep .\n");
	if ($stmt->prepare($prep)) {
	$stmt->execute();
	$stmt->bind_result($res);
	$stmt->fetch();
	print("Result: $res .\n")
    $stmt->close();
	}
}
$mysqli->close();