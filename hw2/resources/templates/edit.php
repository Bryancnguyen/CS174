<!-- Edit page content -->
<div class="edit-form">
	<h1>Edit: <?php echo $file?></h1>
</div>

<a href="./index.php">Return</a>
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
   <input type="Submit" value="Submit">
</form>
