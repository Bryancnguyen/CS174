<?php
namespace cs174\hw3\controllers;
require_once('./src/views/helpers/page_view_helper.php');

class PageController {
    private $viewHelper;
    public function invoke() {
      $this->viewHelper = new \cs174\hw3\views\helpers\pageViewHelper();
      if (isset($_GET['a'])) {
        $action = $_GET['a'];
        switch($action)
        {
        default:
          $this->viewHelper->display('/../homePage.php');
        }
      }
      else {
          $this->viewHelper->display('/../homePage.php');  
      }
      }
}
