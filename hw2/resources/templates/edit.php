<!-- Homepage content -->
<div class="edit-form">
	<h1>Edit: <?php echo $file?></h1>
</div>

<form id="edit-page" method="get" action="./index.php">
	<input type="hidden" name="a" value="save">
	<button class="cancelButton" type="submit" value ="Return">Cancel</button>
	<textarea>
     <?php
     if(file_exists($file))
     {
     echo file_get_contents($file);
     }
     ?>
   </textarea>
</form>
