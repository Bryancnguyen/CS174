<!-- Homepage content -->
<form class="createform" action="./index.php" method="get">
  <input type="hidden" name="a" value="create">
  <input placeholder="Text File Name" class="form-control" type="text" name="file">
  <button class="createButton" type="Submit" >Create A New File</button>
</form>
<h2>My Files</h2>
<table>
<tr><th>Filename</th><th colspan="2">Action</th></tr>
<?php
foreach ($myfiles as $txtFile) {
  ?>
   <tr>
    <td>
      <form class="indexform" action="./index.php" method="get">
        <input type="hidden" name="file" value="<?= $txtFile ?>">
        <input type="hidden" name="a" value="read">
        <button class="file-button" type="submit" value="<?= $txtFile ?>"><?= $txtFile ?></button>
      </form>
    </td>
    <td>
      <form class="indexform" action="./index.php" method="get">
        <input type="hidden" name="file" value="<?= $txtFile ?>">
        <input type="hidden" name="a" value="edit">
        <button class="editButton" type="submit" value="edit">Edit</button>
      </form>
    </td>
    <td>
      <form class="indexform" action="./index.php" method="get">
        <input type="hidden" name="file" value="<?= $txtFile ?>">
        <input type="hidden" name="a" value="confirm">
        <button class="deleteButton" type="Submit" value="confirm">Delete</button>
      </form>
    </td>
   </tr>
  <?php
}
?>

</table>
