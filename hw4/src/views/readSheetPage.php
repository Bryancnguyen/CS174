<?php 

namespace cs174\hw4\views;
require_once './src/views/helpers/readPageHelper.php';
use \cs174\hw4\views\helpers as H;

class readSheetPage extends H\readPageHelper {
    function render($data)
    {
        ?>
        <body onload="loadReadSheet()">
          <div class="websheets-body">
         <form>
        <h1><a class="websheet-link" href='./index.php'>Web Sheets:</a></br>Your Spreadsheet Name</h1>
        <div class="url-wrapper">
        <label class="input-labels" for="file-url">File Url:</label>
        <input type="text" name="file-url" class="file-url" />
        </div>
        <div id="web-sheet-data">
        </div>
        </form>
        </div>
        </body>
    <?php
    }
}