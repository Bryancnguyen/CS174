<?php echo "<h2>Read: $file</h2>"; echo "<br><br>" ?>
<div class="read-wrapper">
	<p class="filetext">
	<?php
		$retdir = getcwd();
      	chdir('text_files');
      	echo file_get_contents($file);
      	chdir($retdir);
		?>
	</p>
</div>
<div class="return-button">
<a href="./index.php">Return</a>
</div>
