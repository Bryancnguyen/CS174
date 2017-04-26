<?php

namespace cs174\hw4\views;
// require_once './src/views/helpers/readPageHelper.php';
use \cs174\hw4\views\helpers as H;

class readSheetPage extends H\readPageHelper {
    private $arr;
    function render($data)
    {
        $arr = [];
        foreach($data->codes as $code)
        {
            array_push($arr, $code->hash_code);
        }
        $sheetData = $data->data;
        ?>
        <script type="text/javascript">
          var jsonString=<?php echo json_encode($sheetData); ?>;
          var model= <?php echo json_encode($data->name); ?>;
        </script>
        <body onload="loadReadSheet(jsonString, model)">
          <div class="websheets-body">
         <form>
        <h1><a class="websheet-link" href='./index.php'>Web Sheets:</a></br><?=$data->name?></h1>
        <div class="url-wrapper">
        <label class="input-labels" for="file-url">File Url:</label>
        <input type="text" name="file-url" class="file-url" value="<?=$arr[2]?>"/>
        </div>
        <div id="web-sheet-data">
        </div>
        </form>
        </div>
        </body>
    <?php
    }
}
