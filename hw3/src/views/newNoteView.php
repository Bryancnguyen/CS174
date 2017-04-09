<?php
namespace cs174\hw3\views;
require_once('./src/views/helpers/newNoteViewHelper.php');

class newNoteView extends \cs174\hw3\views\helpers\newNoteViewHelper{

  function render($category){
    ?>
    <h1><a href="./index.php">Note-A-List/</a>
      <a href="./index.php?category=<?=$category?>"><?php if(isset($_GET['parent']) && $_GET['parent'] != '' && $_GET['parent'] !='index') {
        echo '../';
      ?><?=$_GET['parent']?></a> <?php
      echo '/';
      }
     ?>
      <a href="./index.php?category=<?=$_SESSION['selected_category']?>&parent=<?=$category?>"> <?php if(isset($category) && $category != '') {
        echo $_GET['newlist'];
      }
      ?>
      </a>
    </h1>
    <form action="./index.php?category=<?=$category?>" id="newNoteForm" method="post">
    <h2> New Note </h2>
    <div class="new-note">
    <div class="title">
    <label for="text">Title: </label>
    <input name="title-text" type="title-text" id="title-text">
    <input type="submit" value="Save">
    </div>
    <textarea class="text-area" name="description" form="newNoteForm" placeholder="Enter text here..."></textarea>
    </div>
    </form>
    <?php
  }

}
