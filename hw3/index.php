<?php

include('./src/controllers/page_controller.php');
include('./src/configs/Config.php');
$page_controller = new cs174\hw3\controllers\PageController();
$page_controller->invoke();
