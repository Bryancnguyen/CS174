

<?php

function render($categories, $notes){

  echo '<h1 style="font-size:20pt;"><a href=".">Note-A-List</a></h1>';
  echo '<h2 style="margin-bottom:1px;padding-bottom:1px;">Lists</h2>';
  echo '<ul>';
  foreach($categories as $cat){
    echo '<li>'.$cat.'</li>';
  }

  echo '</ul>';
  echo '<h2 style="margin-bottom:1px;padding-bottom:1px;">Notes</h2>';

  echo '<ul>';
  foreach($notes as $note){
    echo '<li>'.$note.'</li>';
  }

  echo '</ul>';

}

$a = [1,2,3,4];
$b = [2,3,4,5];
render($a, $b);
?>
