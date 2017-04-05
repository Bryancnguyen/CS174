<?php
namespace cs174\hw3\controllers;

session_start();

require_once('./src/views/helpers/page_view_helper.php');
require_once('./src/models/Category.php');
require_once('./src/views/categoryView.php');
require_once('./src/views/newListView.php');
require_once('./src/views/newNoteView.php');
require_once('./src/models/Note.php');

class PageController {
    private $viewHelper;
    private $categoriesModel;
    public function render() {
      $this->viewHelper = new \cs174\hw3\views\helpers\pageViewHelper();
      $this->categoriesModel = new \cs174\hw3\models\Category('index');
      // $this->notesModel = new \cs174\hw3\models\Note('index','content','index');
      $notes = $this->categoriesModel->getNotes();
      $rootcategory = $this->categoriesModel->getSubs();
      $_SESSION['selected_category'] = $_GET['category'];
      $_SESSION['selected_notes'] = $_GET['notes'];
      print  $_SESSION['selected_category'];
      print $_SESSION['selected_notes'];
      if (isset($_SESSION['selected_category'])) {
        $action = $_SESSION['selected_category'];
        $this->categoriesModel = new \cs174\hw3\models\Category($action);
        $rootcategory = $this->categoriesModel->getSubs();
        $notes = $this->categoriesModel->getNotes();
        $this->categoryView = new \cs174\hw3\views\categoryView();
        $this->categoryView->render($rootcategory, $notes);
      }
      else {

        // $this->newNoteView = new \cs174\hw3\views\newNoteView();
        // $this->newNoteView->render('Rich');
        // $this->newListView = new \cs174\hw3\views\newListView();
        // $this->newListView->render('Rich');
        $this->categoryView = new \cs174\hw3\views\categoryView();
        $this->categoryView->render($rootcategory, $notes);

        // $a = [1,2,3];
        $b = [1,2,3];
        // $this->categoryView->render($a, $b);
      }
  }
}
