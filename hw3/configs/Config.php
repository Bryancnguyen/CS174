<?php 

namespace cs174\hw3\configs;

define('DS', DIRECTORY_SEPARATOR);

defined("CONFIGS_PATH")
    or define("CONFIGS_PATH", realpath(__FILE__)));

defined("MODELS_PATH")
    or define("MODELS_PATH", realpath(__DIR__) .DS. '..' .DS. 'models'));

defined("CONTROLLERS_PATH")
    or define("CONTROLLERS_PATH", realpath(__DIR__) .DS. '..' .DS. 'controllers'));

defined("VIEWS_PATH")
    or define("VIEWS_PATH", realpath(__DIR__) .DS. '..' .DS. 'views'));

spl_autoload_register(function ($class) {
    $prefixes = [
    // place sub-namespaces at top
    'cs174\\hw3\\controllers\\' => CONTROLLERS_PATH, 
    'cs174\\hw3\\models\\' => MODELS_PATH, 
    'cs174\\hw3\\views\\' => VIEWS_PATH,
    'cs174\\hw3\\configs\\' => CONFIGS_PATH
    ];
    //match prefix or GTFO
    $check_dirs = "";
    foreach($prefixes as $prefix => $check_path){
    	$len = strlen($prefix);
	    if (strncmp($prefix, $class, $len) !== 0) {
	        $check_dirs = $check_path;
	        break;
	    }
    }
    if($check_dirs == ""){
    	return; //could not match prefix
    }
    // relative class name
    $relative_class = substr($class, $len);
    $class_name = DS. str_replace('\\', DS, $relative_class) .'.php';
    $file = $dir . $class_name;
    if (file_exists($file)) {
        require $file;
        break;
    }
});

defined("DB_USR")
    or define("DB_USR", "user");
defined("DB_PWD")
    or define("DB_PWD", "password");
defined("DB_NME")
    or define("DB_NME", "db_name");