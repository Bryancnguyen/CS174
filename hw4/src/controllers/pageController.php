<?php
namespace cs174\hw4\controllers;

// require_once('./src/views/landingPage.php');
// require_once('./src/views/editSheetPage.php');
// require_once('./src/views/readSheetPage.php');

use \cs174\hw4\views as V;

class PageController {
    private $data;
    function render() {
    $data = ''; //Create An Instance of the data model

    //Check if the posted value from landingPage.php is already in the data model, if it is pass that object to viewHelper

    //If it is not then create that object and pass it to the view.


    // $this->landingView = new V\landingPage('WebLayout');
    // $this->landingView->display($data);
    // // $this->editSheetView = new V\editSheetPage('WebLayout');
    // // $this->editSheetView->display($data);
    // // $this->readSheetView = new V\readSheetPage('WebLayout');
    // // $this->readSheetView->display($data);
    }
}
