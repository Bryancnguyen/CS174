<?php

namespace cs174\hw3\init;

require_once("Config.php");
$mysqli = new \mysqli("127.0.0.1:" . \cs174\hw3\configs\DB_PRT, \cs174\hw3\configs\DB_USR, \cs174\hw3\configs\DB_PWD); // configs namespace
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
// prepared sql statements
$preps = [
"CREATE DATABASE IF NOT EXISTS `cs174hw3`",
"USE `cs174hw3`",
"CREATE TABLE IF NOT EXISTS `cs174hw3`.`categories` 
(id INT NOT NULL AUTO_INCREMENT, `name` VARCHAR(45) NOT NULL, `idparents` INT NOT NULL, PRIMARY KEY (`id`)) ENGINE = InnoDB",
"CREATE TABLE IF NOT EXISTS `cs174hw3`.`notes` 
(id INT NOT NULL AUTO_INCREMENT, `title` VARCHAR(45) NOT NULL, `content` LONGTEXT NOT NULL, `idcategory` INT NOT NULL, `date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP, PRIMARY KEY (`id`)) ENGINE = InnoDB"
];

foreach($preps as $prep){
	print("Executing: $prep .\n");
	$result = \mysqli_query($mysqli,$prep);
	print("Result: $result .\n");
    
}
$mysqli->close();