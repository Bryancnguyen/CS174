<?php
namespace cs174\hw3\controllers;

session_start();

require_once('./src/views/helpers/page_view_helper.php');
require_once('./src/models/Category.php');
require_once('./src/views/categoryView.php');
require_once('./src/views/newListView.php');
require_once('./src/views/newNoteView.php');
require_once('./src/views/noteView.php');
require_once('./src/models/Note.php');
require_once('./src/views/layout/webLayout.php');

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
      $_SESSION['newlist'] = $_GET['newlist'];
      $newCategory = $_POST['text'];
      $parent = '';
      // print  $_SESSION['selected_category'];
      // print $_SESSION['selected_notes'];
      if(isset($_SESSION['selected_category']) || isset($_SESSION['selected_notes']))
      {
        if(isset($newCategory)) {
          $this->categoriesModel = new \cs174\hw3\models\Category($newCategory, $_SESSION['selected_category']);
        }
      if (isset($_SESSION['selected_category'])) {
        $action = $_SESSION['selected_category'];
        $this->categoriesModel = new \cs174\hw3\models\Category($action);
        $parent = $this->categoriesModel->parent;
        $rootcategory = $this->categoriesModel->getSubs();
        $notes = $this->categoriesModel->getNotes();
        $this->categoryView = new \cs174\hw3\views\categoryView('WebLayout');
        $this->categoryView->display($rootcategory, $notes, $parent);
      }
      if (isset($_SESSION['selected_notes'])) {
        $action = $_SESSION['selected_notes'];
        $noteModel = new \cs174\hw3\models\Note($action);
        $rootcategory = $this->categoriesModel->getSubs();
        // $rootcategory = $this->noteModel->getSubs();
        // $notes = $this->categoriesModel->getNotes();
        $this->categoryView = new \cs174\hw3\views\noteView('WebLayout');
        $this->categoryView->display($noteModel, $parent);
      }
    }
    else if(isset($_SESSION['newlist']))
    {
      if(empty($_SESSION['newlist'])){
        $_SESSION['newlist'] = 'index';
      }
      //create new list by passing in parent and then parent
      $category = $_SESSION['newlist'];
      $this->newListView = new \cs174\hw3\views\newListView('WebLayout');
      $this->newListView->display($category);
    }
      else {

        // $this->newNoteView = new \cs174\hw3\views\newNoteView();
        // $this->newNoteView->render('Rich');
        // $this->newListView = new \cs174\hw3\views\newListView();
        // $this->newListView->render('Rich');
        $this->categoryView = new \cs174\hw3\views\categoryView('WebLayout');
        $this->categoryView->display($rootcategory, $notes, $parent);
      }
  }
}
