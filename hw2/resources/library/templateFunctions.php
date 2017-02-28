<?php
    require_once(realpath(dirname(__FILE__) . "/../config.php"));

    function getFiles(){
      return glob("*.txt");
    }

    function landingView($contentFile, $variables = array())
    {
      if (count($variables) > 0) {
          foreach ($variables as $key => $value) {
              if (strlen($key) > 0) {
                ${$key} = $value;
              }
          }
      }
        require_once(TEMPLATES_PATH . "/header.php");
        echo "<div id=\"container\">\n"
           . "\t<div id=\"content\">\n";
        require_once(TEMPLATES_PATH . "/" . $contentFile);
        echo "\t</div>\n";
        echo "</div>\n";
        require_once(TEMPLATES_PATH . "/footer.php");
    }

    function editView($contentFile, $file)
    {
        require_once(TEMPLATES_PATH . "/header.php");
        echo "<div id=\"container\">\n"
           . "\t<div id=\"content\">\n";
        require_once(TEMPLATES_PATH . "/" . $contentFile);
        echo "\t</div>\n";
        echo "</div>\n";
        require_once(TEMPLATES_PATH . "/footer.php");
    }

    function readView($contentFile, $file)
    {
      require_once(TEMPLATES_PATH . "/header.php");
      echo "<div id=\"container\">\n"
         . "\t<div id=\"content\">\n";
      require_once(TEMPLATES_PATH . "/" . $contentFile);
      echo "\t</div>\n";
      echo "</div>\n";
      require_once(TEMPLATES_PATH . "/footer.php");
    }
    function confirmView($contentFile, $file)
    {
      require_once(TEMPLATES_PATH . "/header.php");
      echo "<div id=\"container\">\n"
         . "\t<div id=\"content\">\n";
      require_once(TEMPLATES_PATH . "/" . $contentFile);
      echo "\t</div>\n";
      echo "</div>\n";
      require_once(TEMPLATES_PATH . "/footer.php");
    }
    function create($file){
      $filetxt = $file . '.txt';
      fopen($filetxt, "w");
    }
    
?>
