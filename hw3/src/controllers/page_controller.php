<?php
namespace cs174\hw3\controllers;
require_once('./src/views/helpers/page_view_helper.php');
require_once('./src/models/Category.php');

class PageController {
    private $viewHelper;
    private $categoriesModel;
    public function render() {
      $this->viewHelper = new \cs174\hw3\views\helpers\pageViewHelper();
      $this->categoriesModel = new \cs174\hw3\models\Category();
      $this->viewHelper->assign('categories', $this->categoriesModel->getAllCategories());
      print($categories);
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
