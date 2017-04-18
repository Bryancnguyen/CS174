<?php
namespace cs174\hw4\views\layout;
require_once ('layout.php');

class WebLayout extends Layout {

public function renderHeader($data)
    {
        ?>
        <!DOCTYPE html>
        <html>
        <head>
          <title>Web Sheets</title>
          <meta charset="UTF-8"/>
          <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
          <link rel="stylesheet" type="text/css" href="./src/css/style.css"/>
          <link href="https://fonts.googleapis.com/css?family=Josefin+Sans|Lobster" rel="stylesheet">
        </head>
        <body>
          <div class="websheets-body">
        <?php
    }

    public function renderFooter($data)
    {
        ?>
       </div>
      </body>
      </html>
        <?php
    }
}


?>
