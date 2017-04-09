<?php
namespace cs174\hw3\views;
require_once('./src/views/helpers/newListViewHelper.php');

class newListView extends \cs174\hw3\views\helpers\newListViewHelper {

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

        <form action="./index.php?category=<?=$category?>" method="post">
          <h1> New List </h1>
          <div class="new-list">
          <input name='text' type="text" placeholder="Enter a new list name">
          <button class="addButton" type="submit" name='a'>Add</button>
        </div>
        </form>
        <?php
      }

    }
