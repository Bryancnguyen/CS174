<?php
namespace cs174\hw3\views;
require_once('./src/views/helpers/noteViewHelper.php');

class noteView extends \cs174\hw3\views\helpers\noteViewHelper{
  //Change the input parameters such that we can output the name of the note and the contents
  function render($note, $parent){
      ?>
      <h1><a href="./index.php">Note-A-List/</a>
        <a href="./index.php?category=<?=$parent?>"><?php if(isset($parent) && $parent != '' && $parent !='index') {
          echo '../';
        }
        ?><?=$parent?></a>
        <a href="./index.php?category=<?=$_SESSION['selected_category']?>&parent=<?=$parent?>"> <?php if(isset($parent) && $parent != '') {
          echo '/';
          echo $_SESSION['selected_category'];
        }
        ?>
        </a>
      </h1>        <?php
              ?>
            <h1>Note: <?=$note->title?></h1>
            <p class="note-content">
              <?=$note->content?>
            </p>
      <?php
    }
  }
