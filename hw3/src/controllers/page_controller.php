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
      $this->categoriesModel = new \cs174\hw3\models\Category('index'); //get base index
      $notes = $this->categoriesModel->getNotes(); //get all note in that category
      $rootcategory = $this->categoriesModel->getSubs(); //get all sub categories
      $_SESSION['selected_category'] = $_GET['category']; //show category page
      $_SESSION['selected_notes'] = $_GET['notes']; //show note page
      $_SESSION['newlist'] = $_GET['newlist']; //direct to new list page
      $_SESSION['newnote'] = $_GET['newnote']; //direct to new note page
      $newCategory = $_POST['text']; //new category name for new list
      $parent = ''; // set parent as blank in case of landing page
      $newTitle = $_POST['title-text']; //new title for new note;
      $newContent = $_POST['description']; //new content for new note
      if(isset($_SESSION['selected_category']) || isset($_SESSION['selected_notes'])) //Only goes in if set
      {
        if(isset($newCategory)) { //handles creating the actual category for new list page
          $this->categoriesModel = new \cs174\hw3\models\Category($newCategory, $_SESSION['selected_category']);
        }
        if(isset($newTitle) && isset($newContent)) {
          $this->noteModel = new \cs174\hw3\models\Note($newTitle, $newContent, $_SESSION['selected_category']);
        }
      if (isset($_SESSION['selected_category'])) { //handles selected category
        $action = $_SESSION['selected_category'];
        $this->categoriesModel = new \cs174\hw3\models\Category($action);
        $parent = $this->categoriesModel->parent;
        $rootcategory = $this->categoriesModel->getSubs();
        $notes = $this->categoriesModel->getNotes();
        $this->categoryView = new \cs174\hw3\views\categoryView('WebLayout');
        $this->categoryView->display($rootcategory, $notes, $parent);
      }
      if (isset($_SESSION['selected_notes'])) { //handles selected note
        $action = $_SESSION['selected_notes'];
        $noteModel = new \cs174\hw3\models\Note($action);
        $rootcategory = $this->categoriesModel->getSubs();
        // $rootcategory = $this->noteModel->getSubs();
        // $notes = $this->categoriesModel->getNotes();
        $this->categoryView = new \cs174\hw3\views\noteView('WebLayout');
        $this->categoryView->display($noteModel, $parent);
      }
    }
    else if(isset($_SESSION['newlist'])) //handles new listing
    {
      if(empty($_SESSION['newlist'])){
        $_SESSION['newlist'] = 'index';
      }
      //create new list by passing in parent and then parent
      $category = $_SESSION['newlist'];
      $this->newListView = new \cs174\hw3\views\newListView('WebLayout');
      $this->newListView->display($category);
    }
    else if(isset($_SESSION['newnote'])) //handles new note
    {
      if(empty($_SESSION['newnote'])){
        $_SESSION['newnote'] = 'index';
      }
      $category = $_SESSION['newnote'];
      $this->newNoteView = new \cs174\hw3\views\newNoteView('WebLayout');
      $this->newNoteView->display($category);
    }
      else { // handles landing page
        $this->categoryView = new \cs174\hw3\views\categoryView('WebLayout');
        $this->categoryView->display($rootcategory, $notes, $parent);
      }
  }
}
