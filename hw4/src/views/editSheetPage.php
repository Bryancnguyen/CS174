<?php 

namespace cs174\hw4\views;
require_once './src/views/helpers/editPageHelper.php';
use \cs174\hw4\views\helpers as H;

class editSheetPage extends H\editPageHelper {
    function render($data)
    {
        ?>
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
        <table>
            <tr><th>&nbsp;</th><th>A<button>+</button></th><th>B</th><th>C</th></tr>
            <tr><th><button>-</button>1<button>+</button></th><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
            <tr><th><button>-</button>2<button>+</button></th><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
            <tr><th><button>-</button>3<button>+</button></th><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
            <tr><th><button>-</button>4<button>+</button></th><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
        </table>
        </form>
<?php
    }
}