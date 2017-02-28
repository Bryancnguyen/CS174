<!-- Homepage content -->
<div class="edit-form">
	<h1>Edit: <?php echo $file?></h1>
</div>

<form method="link" action="index.php">
	<input type="submit" value ="Return">
</form>

 <textarea>
    <?php
    if(file_exists($file))
    {
    echo file_get_contents($file);
    }
    ?>

  </textarea>
