<?php
namespace cs174\hw3\views;
require_once('./src/views/helpers/noteViewHelper.php');

class noteView extends \cs174\hw3\views\helpers\noteViewHelper{
  //Change the input parameters such that we can output the name of the note and the contents
  function render($note){

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
      <p>
        <?php
            echo $note->title;
            echo $note->content;
          ?>
      </p>
      <?php
    }
    ?>

<?php
  }
}
?>
