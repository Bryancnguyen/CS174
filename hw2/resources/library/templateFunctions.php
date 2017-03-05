<?php
    require_once(realpath(dirname(__FILE__) . "/../config.php"));

    function getFiles(){
      $retdir = getcwd();
      chdir('text_files');
      $ret = glob("*.txt");
      chdir($retdir);
      return $ret;
    }

    function landingView($contentFile, $myfiles)
    {
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
      $retdir = getcwd();
      chdir('text_files');
      $filersc = fopen($file, "w");
      fclose($filersc);
      chdir($retdir);
    }

    function writeToFile($file, $content){
      $retdir = getcwd();
      chdir('text_files');
      $writefile = fopen($file, "w");
      fwrite($writefile, $content);
      fclose($writefile);
      chdir($retdir);
    }
    function deleteFile($file) {
      $retdir = getcwd();
      chdir('text_files');
      unlink($file);
      chdir($retdir);
      
    }
?>
