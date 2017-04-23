<?php

namespace cs174\hw4\views;
// require_once './src/views/helpers/landingPageHelper.php';
use \cs174\hw4\views\helpers as H;

class landingPage extends H\landingPageHelper {
    function render($data)
    {
        echo $data;
        ?>
        <body>
          <div class="websheets-body">
        <form action="" method="POST" onsubmit="checkIfEmpty()">
        <h1><a class="websheet-link" href='./index.php'>Web Sheets</a></h1>
        <div class="name-code-wrapper">
        <input id="name-code-field" name="userInput" type="text" class="name-code-field" placeholder="New Sheet Name or Code"/>
        <input type="submit" name="button" class="go-button" value="Go" />
        </div>
        </form>
        </div>
        </body>
    <?php
    }
}
