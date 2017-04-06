<?php
namespace cs174\hw3\views;
require_once('./src/views/helpers/categoryViewHelper.php');

class categoryView extends \cs174\hw3\views\helpers\categoryViewHelper{

  function render($listArray =[], $noteArray =[]){
    ?>
      <h1><a href="./index.php">Note-A-List</a></h1>
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
                  <a href="./index.php?category=<?= $listObject->title?>"><?= $listObject->title?></a>
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
