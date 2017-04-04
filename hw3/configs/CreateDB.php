<?php

namespace cs174\hw3\init;

require_once("Config.php");
require_once("/../models/Category.php");
require_once("/../models/Note.php");
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
"INSERT INTO `cs174hw3`.`categories` (`name`, `idparents`) VALUES ('index', -1)",
"CREATE TABLE IF NOT EXISTS `cs174hw3`.`notes` 
(id INT NOT NULL AUTO_INCREMENT, `title` VARCHAR(45) NOT NULL, `content` LONGTEXT NOT NULL, `idcategory` INT NOT NULL, `date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP, PRIMARY KEY (`id`)) ENGINE = InnoDB"
];

foreach($preps as $prep){
	print("Executing: $prep ;\n");
	$result = \mysqli_query($mysqli,$prep);
	print("Result: $result \n");
}
$mysqli->close();

// the code below tests the models
$second_cat = new \cs174\hw3\models\Category("For Sale", "index");
$first_sub_cat = new \cs174\hw3\models\Category("Fire Sale", "For Sale");
$second_sub_cat = new \cs174\hw3\models\Category("Ice Sale", "For Sale");
$sub_cats = $second_cat->getSubs();
print("Subcats for 'For Sale':\n");
foreach($sub_cats as $sub_cat) {
	print($sub_cat->title . "\n");
}

// $first_note = new \cs174\hw3\models\Note("First Index Note", "First index note content.", "index");
// $first_cat_note = new \cs174\hw3\models\Note("First Index Note", "First category note content.", "For Sale");
// $index_cat = new \cs174\hw3\models\Category("index");
// $index_notes = $index_cat->getNotes();
// print("Notes for 'index':\n");
// foreach($index_notes as $note) {
// 	print($note->title . "\n");
// }