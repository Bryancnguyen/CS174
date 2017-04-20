<?php 

namespace cs174\hw4\views;
require_once './src/views/helpers/editPageHelper.php';
use \cs174\hw4\views\helpers as H;

class editSheetPage extends H\editPageHelper {
    function render($data)
    {
        ?>
        <body onload="loadEditSheet()">
          <div class="websheets-body">
        <form>
        <h1><a class="websheet-link" href='./index.php'>Web Sheets:</a></br>Your Spreadsheet Name</h1>
        <div class="url-wrapper">
        <label class="input-labels" for="edit-url">Edit Url:</label>
        <input type="text" name="edit-url" class="edit-url" />
        <label class="input-labels" for="read-url">Read Url:</label>
        <input type="text" name="read-url" class="read-url" />
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
