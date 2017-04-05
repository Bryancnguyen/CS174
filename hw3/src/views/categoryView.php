<?php
namespace cs174\hw3\views;

class categoryView{

  function render($listArray, $noteArray){
    ?>
    <!DOCTYPE html>
    <html>
    <head>
      <title>Craiglist</title>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
      <h1 style="font-size:20pt;"><a href=".">Note-A-List</a></h1>
      <div class="container">
        <div class="row">
          <ul>
            <?php
            echo '<h2 style="margin-bottom:1px;padding-bottom:1px;">Lists</h2>';
            echo '<ul>';
            foreach($listArray as $listObject){
              echo '<li>'.$listObject.'</li>';
            }

            echo '</ul>';
            echo '<h2 style="margin-bottom:1px;padding-bottom:1px;">Notes</h2>';

            echo '<ul>';
            foreach($noteArray as $noteObject){
              echo '<li>'.$noteObject.'</li>';
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
