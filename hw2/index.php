<?php

if (isset($_GET['a']) && isset($_GET['file'])){
	$action = $_GET['a'];
	$file = $_GET['file'];
	//echo "Our action is " . $action;
	if($action == "edit"){
		editFile($file);
	}
	if($action == 'read'){
		displayFile($file);
	}
	if($action == 'confirm'){
		confirmDelete($file);
	}
}
else{
	displayIndex();
}

function getFiles(){
	return glob("*.txt");
}

function displayIndex(){
	?>
	<html>
		<head>
		<title>My PHP Text Editor</title>
		</head>
		<body>
		<form id="readForm" action="/index.php?a=read&file=<?= $filename ?>" method="get">
		</form>
		<?php 
		$myfiles = getFiles();
		foreach ($myfiles as $txtFile) { 
			?> 
			<button class="readButton" type="text" name="a" form="readForm" value="Submit">Read</button>
			<button class="delButton" type="text" name="a" form="readForm" value="Submit">Delete</button>
			<?php
			echo $txtFile . "/index.php?a=read&file=" . $txtFile
		}
		?>
		</body>
	</html>
	<?php
}

function displayFile($filename){
	?>
	<html>
		<head>
		<title>My PHP Text Editor</title>
		</head>
		<body>
			<p>
				<?= file_get_contents($filename);?>
			</p>
		</body>
	</html>
	<?php
}

function confirmDelete($filename){
	?>
	<html>
		<head>
			<title>My PHP Text Editor</title>
		</head>
		<body>
			<p>Are you sure you'd like to delete the following file:<b><?= $filename ?></b></p>
			<!-- Add form to delete the file. -->
			<form id="deleteForm" action="/index.php?a=delete&file=<?= $filename ?>" method="get">
			</form>
			<button class="delButton" type="submit" form="deleteForm" value="Submit">Delete</button>
		</body>
	</html>
	<?php
}
function editFile($filename){
	?>
	<html>
		<head>
		<title>My PHP Text Editor</title>
		</head>
		<body>
			<textarea>
				<?= file_get_contents($filename);?>
			</textarea>
		</body>
	</html>
	<?php
}

