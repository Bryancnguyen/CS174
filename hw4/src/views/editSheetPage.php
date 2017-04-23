<?php

namespace cs174\hw4\views;
// require_once './src/views/helpers/editPageHelper.php';
use \cs174\hw4\views\helpers as H;

class editSheetPage extends H\editPageHelper {
    private $arr;
    function render($data)
    {
        $arr = [];
        foreach($data->codes as $code)
        {
            array_push($arr, $code->hash_code);
        }
        ?>
        <body onload="loadEditSheet()">
        <form method="POST">
          <div class="websheets-body">
        <h1><a class="websheet-link" href='./index.php'>Web Sheets:</a></br><?=$data->name?></h1>
        <div class="url-wrapper">
        <label class="input-labels" for="edit-url">Edit Url:</label>

        <input type="text" name="edit-url" class="edit-url" value="?arg1=<?=$arr[1]?>"/>
        <label class="input-labels" for="read-url">Read Url:</label>
        <input type="text" name="read-url" class="read-url" value="?arg1=<?=$arr[0]?>"/>

        <label class="input-labels" for="file-url">File Url:</label>
        <input type="text" name="file-url" class="file-url" value="?arg1=<?=$arr[2]?>"/>
        </div>
        <div id="web-sheet-data">
        </div>
        </form>
        </div>
        </body>
<?php
    }
}
