<?php
namespace cs174\hw3\views;

class newNoteView{

  function render($someVariable){
    ?>
    <!DOCTYPE html>

    <html>
    <head>
    <title>New Note Page</title>
    <head>

    <h1 style="font-size:20pt;"><a href="./index.php">Note-A-List/</a><a href="./<?=$someVariable?>">
      <?=$someVariable?></a></h1>
    <form action="Insert Action here" id = "newNoteForm">
    <h2> New Note </h2>
    Title: <input type="text">
    <input type="submit" value="Save">
    </form>
    <textarea name="description" form="newNoteForm">Enter text here...</textarea>


    </html>
    <?php
  }

}
