<<<<<<< HEAD

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
=======
<!-- Edit page content -->
<div class="edit-form">
	<h1>Edit: <?php echo $file?></h1>
</div>

<form id="edit-page" method="get" action="./index.php">
	<input type="hidden" name="a" value="save">
    <input type="hidden" name="file" value="<?= $file ?>">
	<textarea name="mytextarea">
    <?php
    $retdir = getcwd();
    chdir('text_files');
    if(file_exists($file)) {
        echo file_get_contents($file);
    }
    chdir($retdir);
    ?>
   </textarea>
	 <div class="edit-buttons">
	 <button class="submit" type="Submit" value="Submit">Submit</button>
	 <a href="./index.php">Return</a>
	 </div>
>>>>>>> 46b92109f01d4dbaa4f669799b855be74e647022
</form>
