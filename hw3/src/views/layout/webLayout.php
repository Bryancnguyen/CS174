<?php
namespace cs174\hw3\views\layout;
require_once ('layout.php');

class WebLayout extends Layout {

public function renderHeader($data)
    {
        ?>
        <!DOCTYPE html>
        <html>
        <head>
          <title>Note-A-List</title>
          <meta charset="UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <link rel="stylesheet" type="text/css" href="./src/styles/style.css"/>
        </head>
        <body>
          <div class="craigslist-body">
        <?php
    }

    public function renderFooter($data)
    {
        ?>
       </div>
       </div>
      </div>
      </body>
      </html>
        <?php
    }
}


?>
