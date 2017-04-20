<?php

namespace cs174\hw4\init;

use \cs174\hw4\configs as C;

// require_once("C:/xampp/htdocs/hw4/src/configs/Config.php");
// require_once("C:/xampp/htdocs/hw4/src/models/Sheet.php");
// require_once("C:/xampp/htdocs/hw4/src/models/Sheet_Code.php");

$mysqli = new \mysqli( "127.0.0.1:".C\DB_PRT, C\DB_USR, C\DB_PWD); // configs namespace
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
// prepared sql statements
$preps = [
"CREATE DATABASE IF NOT EXISTS `cs174hw4`",
"USE `cs174hw4`",
"CREATE TABLE IF NOT EXISTS `cs174hw4`.`sheet`
(id INT NOT NULL AUTO_INCREMENT, `name` VARCHAR(255) NOT NULL, `data` LONGTEXT NOT NULL, PRIMARY KEY (`id`)) ENGINE = InnoDB",
"CREATE TABLE IF NOT EXISTS `cs174hw4`.`sheet_code`
(id INT NOT NULL AUTO_INCREMENT, sheet_id INT NOT NULL, `hash` VARCHAR(8) NOT NULL, `type` VARCHAR(4) NOT NULL, PRIMARY KEY (`id`)) ENGINE = InnoDB"
];

foreach($preps as $prep){
	print("$prep ;\n");
	$result = \mysqli_query($mysqli,$prep);
	print("Res: $result \n");
}
$mysqli->close();

$sheet_one = new \cs174\hw4\models\Sheet("sheet_one", '{[ ["Tom", "Sally"] ]}');
//sheet_one is now saved to the db. 

//Let's make another reference to sheet_one:
$another_ref_to_sheet_one = new \cs174\hw4\models\Sheet("sheet_one");

//If it's a valid sheet name, let's print the sheet's stuff:
if($another_ref_to_sheet_one->valid){
	print("Sheet: ". $another_ref_to_sheet_one->name ."\n");
	print("ID: ". $another_ref_to_sheet_one->id ."\n");
	print("Data: ". $another_ref_to_sheet_one->data ."\n");
	print("Codes: \n");
	foreach ($another_ref_to_sheet_one->codes as $code) {
		print("id: ". $code->id ."\n");
		print("sheet_id: ". $code->sheet_id ."\n"); // sheet id that code accesses
		print("hash_code: ". $code->hash_code ."\n"); // md5 hash used to access file in mode type
		print("code_type: ". $code->code_type ."\n"); // "read" || "edit" || "file"
	}
}
else
	print("Looks like that wasn't a valid DB object.");