<?php 

namespace cs174\hw4\views;
require_once './src/views/helpers/readPageHelper.php';
use \cs174\hw4\views\helpers as H;

class readSheetPage extends H\readPageHelper {
    function render($data)
    {
        ?>
         <form>
        <h1><a class="websheet-link" href='./index.php'>Web Sheets:</a></br>Your Spreadsheet Name</h1>
        <div class="url-wrapper">
        <label class="input-labels" for="file-url">File Url:</label>
        <input type="text" name="file-url" class="file-url" />
        </div>
        <table>
            <tr><th>&nbsp;</th><th>A</th><th>B</th><th>C</th></tr>
            <tr><th>1</th><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
            <tr><th>2</th><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
            <tr><th>3</th><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
            <tr><th>4</th><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
        </table>
        </form>
    <?php
    }
}