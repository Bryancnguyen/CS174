<?php

namespace cs174\hw4\init;

require_once("Config.php");
$mysqli = new \mysqli( "127.0.0.1:".\cs174\hw4\configs\DB_PRT, \cs174\hw4\configs\DB_USR, \cs174\hw4\configs\DB_PWD); // configs namespace
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
// prepared sql statements
$preps = [
"CREATE DATABASE IF NOT EXISTS `cs174hw4`",
"USE `cs174hw4`",
"CREATE TABLE IF NOT EXISTS `cs174hw4`.`sheet`
(id INT NOT NULL AUTO_INCREMENT, `name` VARCHAR(45) NOT NULL, `data` JSON NOT NULL, PRIMARY KEY (`id`)) ENGINE = InnoDB",
"CREATE TABLE IF NOT EXISTS `cs174hw4`.`sheet_code`
(id INT NOT NULL AUTO_INCREMENT, sheet_id INT NOT NULL, `hash` VARCHAR(8) NOT NULL, `type` VARCHAR(4) NOT NULL, PRIMARY KEY (`id`)) ENGINE = InnoDB"
];

foreach($preps as $prep){
	print("Executing: $prep ;\n");
	$result = \mysqli_query($mysqli,$prep);
	print("Result: $result \n");
}
$mysqli->close();
