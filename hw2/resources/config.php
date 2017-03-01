<?php
require_once("./resources/library/templateFunctions.php");
$config = array(
    "paths" => array(
        "resources" => "./resources",
        "images" => array(
            "content" => $_SERVER["DOCUMENT_ROOT"] . "./img/content",
            "layout" => $_SERVER["DOCUMENT_ROOT"] . "./img/layout"
        )
    )
);

defined("LIBRARY_PATH")
    or define("LIBRARY_PATH", realpath(dirname(__FILE__) . '/library'));

defined("TEMPLATES_PATH")
    or define("TEMPLATES_PATH", realpath(dirname(__FILE__) . '/templates'));
?>
