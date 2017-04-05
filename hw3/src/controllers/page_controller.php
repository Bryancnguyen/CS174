<?php
namespace cs174\hw3\controllers;

require_once('./src/views/helpers/page_view_helper.php');
require_once('./src/models/Category.php');
require_once('./src/views/categoryView.php');
require_once('./src/views/newListView.php');
require_once('./src/views/newNoteView.php');

class PageController {
    private $viewHelper;
    private $categoriesModel;
    public function render() {
      $this->viewHelper = new \cs174\hw3\views\helpers\pageViewHelper();
      $this->categoriesModel = new \cs174\hw3\models\Category('index');
      $someshit = $this->categoriesModel->getSubs();
      print ($someshit->title);
      // $this->viewHelper->assign('categories', $this->categoriesModel->getAllCategories());
      print($categories);
      if (isset($_GET['a'])) {
        $action = $_GET['a'];
        switch($action)
        {
        case 'newlist':
          $newListView = new \cs174\hw3\views\newListView();
          break;
        case 'newNote':
          $newNoteView = new \cs174\hw3\views\newNoteView();
          break;
        default:
          $categoryView = new \cs174\hw3\views\categoryView();
          $a = [1,2,3];
          $b = [1,2,3];
          $this->categoryView->render($a, $b);
        }
      }
      else {

        // $this->newNoteView = new \cs174\hw3\views\newNoteView();
        // $this->newNoteView->render('Rich');
        // $this->newListView = new \cs174\hw3\views\newListView();
        // $this->newListView->render('Rich');
        // $this->categoryView = new \cs174\hw3\views\categoryView();
        // $a = [1,2,3];
        // $b = [1,2,3];
        // $this->categoryView->render($a, $b);
      }
  }
}
