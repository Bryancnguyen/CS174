<?php
namespace cs174\hw4\controllers;

require_once('./src/views/landingPage.php');
require_once('./src/views/editSheetPage.php');
require_once('./src/views/readSheetPage.php');

use \cs174\hw4\views as V;

class PageController {
    private $data;
    function render() {
    $data = '';
    $this->landingView = new V\landingPage('WebLayout');
    $this->landingView->display($data);
    }
}
