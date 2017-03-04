
<?php

if(isset($_POST['myTextArea'])){

$textFieldValue = fopen($file,"w+");  
fwrite($textFieldValue, $_POST['myTextArea']);
fclose($textFieldValue);
}

?>

<form action="<?=$PHP_SELF?>" method="POST">
<textarea name="myTextArea">
<?php
echo file_get_contents($file);
?>
</textarea>
<input type="submit" name="button" value="Update File">
</form>

<form action="index.php">
    <input type="submit" value="Return Home">
</form>
