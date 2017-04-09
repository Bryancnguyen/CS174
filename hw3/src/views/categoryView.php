<?php
namespace cs174\hw3\views;
require_once('./src/views/helpers/categoryViewHelper.php');

class categoryView extends \cs174\hw3\views\helpers\categoryViewHelper{

  function render($listArray =[], $noteArray =[], $parent){
    ?>
      <h1><a href="./index.php">Note-A-List/</a>
        <a href="./index.php?category=<?=$parent?>"><?php if(isset($parent)) {
          echo '../';
        }
        ?><?=$parent?></a>
        <a href="./index.php?category=<?=$_SESSION['selected_category']?>&parent=<?=$parent?>"> <?php if(isset($parent)) {
          echo '/';
        }
        ?>
        <?=$_SESSION['selected_category']?></a>
      </h1>
      <div class="container">
        <div class="lists">
            <?php
            echo '<h2>Lists</h2>';
            echo '<ul>';
            echo '<li>'?>
              <a href="./index.php?newList">[New List]</a>
              <?php echo '</li>';
              foreach($listArray as $listObject){
                echo '<li>'?>
                  <a href="./index.php?category=<?= $listObject->title?>&parent=<?= $listObject->parent?>"><?= $listObject->title?></a>
                  <?php echo '</li>';
                }
                echo '</ul>';
                ?>
                </div><!--end row-->
              <div class="notes">
                <?php
                echo '<h2>Notes</h2>';

                echo '<ul>';
                echo '<li>'?>
                  <a href="./index.php?newNote">[New Note]</a>
                  <?php echo '</li>';
                  foreach($noteArray as $noteObject){
                    echo '<li>'?>
                      <a href="./index.php?notes=<?= $noteObject->title?>"><?= $noteObject->title?></a>
                      <?php echo '</li>';
                    }

                    echo '</ul>';
                    ?>
            <?php
          }

        }
