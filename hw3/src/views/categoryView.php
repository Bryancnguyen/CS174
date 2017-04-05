<?php
namespace cs174\hw3\views;

class categoryView{

  function render($listArray, $noteArray, $categoryName, $parentName){
    ?>
    <!DOCTYPE html>
    <html>
    <head>
      <title>Note-A-List</title>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
      <?php
      if ($parentName != "") {
        ?>
        <form action="./index.php" method="get">
          <input type="hidden" name="title" value="<?= $parentName ?>"/>
          <input type="hidden" name="action" value="DisplayList"/>
          <button type="submit" value="Note-A-List/<?= $parentName?>"></button>
        </form>
        <?php
      }
      else{
        ?>
        <h1 style="font-size:20pt;"><a href=".">Note-A-List</a></h1>
        <?php
      }
      ?>
      <div class="container">
        <div class="row">
          <ul>
            <?php
            echo '<h2 style="margin-bottom:1px;padding-bottom:1px;">Lists</h2>';
            echo '<ul>';
            echo '<li>'?>
              <form action="./index.php" method="get">
                <input type="hidden" name="title" value="<?= $categoryName ?>"/>
                <input type="hidden" name="action" value="newCategory"/>
                <button type="submit" value="[New List]"></button>
              </form>
              <?php'</li>';
              foreach($listArray as $listObject){
                echo '<li>'?>
                  <form action="./index.php" method="get">
                    <input type="hidden" name="title" value="<?= $listObject->title ?>"/>
                    <input type="hidden" name="action" value="DisplayList"/>
                    <button type="submit" value="<?= $listObject->title?>"></button>
                  </form>
                  <?php'</li>';
                }

                echo '</ul>';
                echo '<h2 style="margin-bottom:1px;padding-bottom:1px;">Notes</h2>';

                echo '<ul>';
                echo '<li>'?>
                  <form action="./index.php" method="get">
                    <input type="hidden" name="title" value="<?= $categoryName ?>"/>
                    <input type="hidden" name="action" value="NewNote"/>
                    <button type="submit" value="[New Note]"></button>
                  </form>
                  <?php'</li>';
                  foreach($noteArray as $noteObject){
                    echo '<li>'?>
                      <form action="./index.php" method="get">
                        <input type="hidden" name="title" value="<?= $noteObject->title ?>"/>
                        <input type="hidden" name="action" value="DisplayNote"/>
                        <button type="submit" value="<?= $noteObject->title?>"></button>
                      </form>
                      <?php'</li>';
                    }

                    echo '</ul>';
                    ?>
                  </ul>
                </div><!--end row-->
              </div>

            </body>
            </html>
            <?php
          }

        }
