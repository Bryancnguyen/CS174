<?php
namespace cs174\hw3\views;

class newNoteView{

  function render($someVariable, $parentName){
    ?>
    <!DOCTYPE html>

    <html>
    <head>
    <title>New Note Page</title>
    <head>

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
