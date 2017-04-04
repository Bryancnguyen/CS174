

<?php
//namespace cs174\hw3\views;

class newListView{

  function render($someVariable){

    ?>
    <!DOCTYPE html>
    <html>
    <head>
      <title>New List Page</title>
      <head>

        <h1 style="font-size:20pt;">Note-A-List/PHP THAT WILL DISPLAY SPECIFIC SUBLIST</h1>
        <form action="Insert Action here">
          <h1> New List </h1>
          <input type="text" value="Enter a new list name">
          <input type="submit" value="Add">
        </form>

        </html>
        <?php
      }

    }
    $a = [1,2,3];
    $newListViewVar = new newListView();
    $newListViewVar->render($a);
