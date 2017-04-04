<?php
namespace cs174\hw3\controllers;
require_once('./src/views/helpers/page_view_helper.php');
require_once('./src/models/Model.php');

class PageController {
    private $viewHelper;
    private $model;
    public function invoke() {
      $this->viewHelper = new \cs174\hw3\views\helpers\pageViewHelper();
      $this->model = new \cs174\hw3\models\Model();
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
