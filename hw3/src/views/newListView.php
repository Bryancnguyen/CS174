<?php
namespace cs174\hw3\views;

class newListView{

  function render($someVariable){

    ?>
    <!DOCTYPE html>
    <html>
    <head>
      <title>New List Page</title>
      <head>

        <h1 style="font-size:20pt;"><a href="./index.php">Note-A-List/</a><a href="./<?=$someVariable?>">
          <?=$someVariable?></a></h1>
        <form action="./index.php">
          <h1> New List </h1>
          <input type="text" value="Enter a new list name">
          <input type="submit" value="Add">
        </form>

        </html>
        <?php
      }

    }
