

<?php

if(isset($_POST['myTextArea'])){

$textFieldValue = fopen($file,"w+");  
fwrite($textFieldValue, $_POST['myTextArea']);
fclose($textFieldValue);
}

?>
<div>
<form action="index.php" style="float: left">
	<button type="submit" class="editButton">Return</button>
</form>
<form action="<?=$PHP_SELF?>" method="POST">
	<button type="submit" name="button" class="editButton">Save</button>
<textarea name="myTextArea">
<?php
echo file_get_contents($file);
?>
</textarea>

</form>
</div>

