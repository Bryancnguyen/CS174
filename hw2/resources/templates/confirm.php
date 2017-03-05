<div class="delete-content">
<p>Are you sure you'd like to delete the following file:</p>
<div class="delete-file">
<b><?= $file ?></b>

</div>
<!-- Add form to delete the file. -->
<form id="deleteForm" action="./index.php" method="get">
  <input type="hidden" name="file" value="<?= $file ?>">
  <div class="deleteFormButtons">
  <button class="delButton" type="submit" name='a' value="delete">Confirm</button>
  <button><a class="cancelButton" href="./index.php">Cancel</a></button>
  </div>
  <!--<button class="cancelButton" type="submit" value="cancel">Cancel</button>-->
</form>
</div>
