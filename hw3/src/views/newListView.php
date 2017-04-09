<?php
namespace cs174\hw3\views;
require_once('./src/views/helpers/newListViewHelper.php');

class newListView extends \cs174\hw3\views\helpers\newListViewHelper {

  function render($parent){

    ?>
    <!DOCTYPE html>
    <html>
    <head>
      <title>New List Page</title>
    </head>

    <h1><a href="./index.php">Note-A-List/</a>
      <a href="./index.php?category=<?=$parent?>"><?php if(isset($parent) && $parent != '') {
        echo '../';
      }
      ?><?=$parent?></a>
      <a href="./index.php?category=<?=$_SESSION['selected_category']?>&parent=<?=$parent?>"> <?php if(isset($parent) && $parent != '') {
        echo '/';
        echo $_SESSION['selected_category'];
      }
      ?>
      </a>
    </h1>

        <form action="./index.php?category=<?=$parent?>" method="post">
          <h1> New List </h1>
          <div class="new-list">
          <input name='text' type="text" placeholder="Enter a new list name">
          <button class="addButton" type="submit" name='a'>Add</button>
        </div>
        </form>

        </html>
        <?php
      }

    }
