<?php

function displayFile($filename){
	?>
	<html>
		<head>
		<title>My PHP Text Editor</title>
		</head>
		<body>
			<?php echo "File: $filename"; ?>
			<p class="filetext">
				<?= file_get_contents($filename);?>
			</p>
		</body>
	</html>
	<?php
}


function displayIndex(){
	?>
	<html>
		<head>
			<title>My PHP Text Editor</title>
		</head>
		<body>
			<h1>Simple Text Editor</h1>
			<form class="createform" action="/index.php" method="get">
	 			<input type="hidden" name="file" value="<?= $filename ?>">
	 			<input type="hidden" name="a" value="create">
	 			<button class="createButton" type="Submit">Create A New File</button>
	 		</form>
			<h2>My Files</h2>
			<table>
			<tr><th>Filename</th><th colspan="2">Action</th></tr>
			<?php 
			$myfiles = getFiles();
			foreach ($myfiles as $txtFile) { 
				?>
				 <tr>
				 	<td><?= $txtFile ?></td>
				 	<td>
				 		<form class="indexform" action="/testing/index.php" method="get">
				 			<input type="hidden" name="file" value="<?= $txtFile ?>">
				 			<input type="hidden" name="a" value="read">
				 			<button class="readButton" type="Submit" value="read">Read</button>
				 		</form>
				 	</td>
				 	<td>
				 		<form class="indexform" action="/index.php" method="get">
				 			<input type="hidden" name="file" value="<?= $txtFile ?>">
				 			<input type="hidden" name="a" value="delete">
				 			<button class="deleteButton" type="Submit" value="delete">Delete</button>
				 		</form>
				 	</td>
				 </tr>
				<?php
			}
			?>
			</table>
		</body>
	</html>
	<?php
}


if (isset($_GET['a']) && isset($_GET['file'])){
	$action = $_GET['a'];
	$file = $_GET['file'];
	//echo "Our action is " . $action;
	// if($action == "edit"){
	// 	editFile($file);
	// }
	if($action == 'read'){
		displayFile($file);
	}
	// if($action == 'confirm'){
	// 	confirmDelete($file);
	// }
}
else{
	displayIndex();
}

function getFiles(){
	return glob("*.txt");
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

