<?php
    require_once("./resources/config.php");
    require_once(LIBRARY_PATH . "/templateFunctions.php");
    if (isset($_GET['a']) && isset($_GET['file'])){
    	$action = $_GET['a'];
    	$file = $_GET['file'];
    	//echo "Our action is " . $action;
      switch($action)
      {
        case "edit": {
          editView("edit.php", $file);
          break;
        }
        case "read":{
          readView("read.php", $file);
          break;
        }
        case "confirm": {
          confirmView("confirm.php", $file);
          break;
        }
        case "create": {
          if(ctype_alnum($file))
          {
            $file = $file . ".txt";
            create($file);
            editView("edit.php", $file);
          }
          else {
            $myfiles = getFiles();
            landingView("home.php", $myfiles);
          }
          break;
        }
        case "save": {
          if (isset($_GET['mytextarea']))
          {
            writeToFile($file, $_GET['mytextarea']);
          } 
          $myfiles = getFiles();
          landingView("home.php", $myfiles);
          break;
        }
        case "delete": {
          deleteFile($file);
        }
        default: {
          $myfiles = getFiles();
          landingView("home.php", $myfiles);
        }
      }
    }
    else {
      $myfiles = getFiles();
      landingView("home.php", $myfiles);
    }
?>
