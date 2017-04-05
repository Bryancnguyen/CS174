<?php
namespace cs174\hw3\views;

class newListView{

  function render($someVariable, $parentName){

    ?>
    <!DOCTYPE html>
    <html>
    <head>
      <title>New List Page</title>
    </head>

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
        <form action="./index.php">
          <h1> New List </h1>
          <input type="text" value="Enter a new list name">
          <input type="submit" value="Add">
        </form>

        </html>
        <?php
      }

    }
