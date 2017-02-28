<?php echo "File: $filename"; ?>
<p class="filetext">
  <?= file_get_contents($filename);?>
</p>
