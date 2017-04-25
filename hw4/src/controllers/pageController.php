<?php
namespace cs174\hw4\controllers;

// require_once('./src/views/landingPage.php');
// require_once('./src/views/editSheetPage.php');
// require_once('./src/views/readSheetPage.php');

use \cs174\hw4\views as V;
use \cs174\hw4\models as M;

class PageController {
  private $data;
  private $sheetCode;
  private $landingView;

    function render() {

      if(isset($_GET['c'])){
        if($_GET['c'] == "api" && isset($_GET['model'])){
          $api = new ApiController($_GET['model']);
        }
        else{
          print("c not api || model not set");
        }
      }
      else {
        print("c not set");
      }

      $code = "";
      if(isset($_GET['arg1'])){
        $code = $_GET['arg1'];
      }

    if($code){ //If they entered the hashcode in the browser
      $sheetCode = new M\Sheet_Code($code);

      if($sheetCode->valid){ //Check if the hashcode actually corresponds to a sheet
        if($sheetCode->code_type == "edit")
        {
          $sheetName = $sheetCode->sheet_name; //Get the name of the sheet which corresponds to the sheet_data
          $dataToPass = new M\Sheet($sheetName); //create a sheet object to pass to view
          $this->editSheetView = new V\editSheetPage('WebLayout');//Create the view
          $this->editSheetView->display($dataToPass);//Pass the data to View
        }
        else if($sheetCode->code_type == "read")
        {
          $sheetName = $sheetCode->sheet_name; //Get the name of the sheet which corresponds to the sheet_data
          $dataToPass = new M\Sheet($sheetName); //create a sheet object to pass to view
          $this->readView = new V\readSheetPage('WebLayout');//Create the view
          $this->readView->display($dataToPass);//Pass the data to View
        }
        else
        {
          $sheetName = $sheetCode->sheet_name; //Get the name of the sheet which corresponds to the sheet_data
          $sheet = new M\Sheet($sheetName); //create a sheet object to pass to view
          $sheet->XML();
        }

      }

      else{
        $data = '';
        $this->landingView = new V\landingPage('WebLayout');//Create the view
        $this->landingView->display($data);//Pass the data to View
      }
    }


    else if(isset($_POST['userInput'])) //Check if the user actually put any input
    {
      $inputString = filter_var($_POST['userInput'], FILTER_SANITIZE_STRING); // Get the users input in a string


      $sheet = new M\Sheet($inputString); //Create a sheet with the users input name
      $sheetCode = new M\Sheet_Code($inputString); //create a sheet_code with users input.. may or may not exist

      if($sheet->valid){ //If this sheet is already in the database
        echo 'existing sheet name';
        $this->editSheetView = new V\editSheetPage('WebLayout');//Create the view
        $this->editSheetView->display($sheet);//Pass the data to View
      }
      else if($sheetCode->valid){
        if($sheetCode->code_type == "edit")
        {
          $sheetName = $sheetCode->sheet_name; //Get the name of the sheet which corresponds to the sheet_data
          $dataToPass = new M\Sheet($sheetName); //create a sheet object to pass to view
          $this->editSheetView = new V\editSheetPage('WebLayout');//Create the view
          $this->editSheetView->display($dataToPass);//Pass the data to View
        }
        else if($sheetCode->code_type == "read")
        {
          $sheetName = $sheetCode->sheet_name; //Get the name of the sheet which corresponds to the sheet_data
          $dataToPass = new M\Sheet($sheetName); //create a sheet object to pass to view
          $this->readView = new V\readSheetPage('WebLayout');//Create the view
          $this->readView->display($dataToPass);//Pass the data to View
        }
        else //file view
        {
          $sheetName = $sheetCode->sheet_name; //Get the name of the sheet which corresponds to the sheet_data
          $sheet = new M\Sheet($sheetName); //create a sheet object to pass to view
          $sheet->XML();
        }
      }

      else{
        echo 'creating new sheet';
        $arr = array(array("Tom", 5), array("Sally", 6));
        $jsonString = json_encode($arr);
        $sheet_to_pass = new M\Sheet($inputString, $jsonString);
        $dataToPass = new M\Sheet($inputString);
        $this->editSheetView = new V\editSheetPage('WebLayout');//Create the view
        $this->editSheetView->display($dataToPass);//Pass the data to View
      }
    }
    else{ //There was no user input pass an em
      $data = '';
      $this->landingView = new V\landingPage('WebLayout');//Create the view
      $this->landingView->display($data);//Pass the data to View
    }
    // $this->landingView = new V\landingPage('WebLayout');
    // $this->landingView->display($data);
    // // $this->editSheetView = new V\editSheetPage('WebLayout');
    // // $this->editSheetView->display($data);
    // // $this->readSheetView = new V\readSheetPage('WebLayout');
    // // $this->readSheetView->display($data);
    }
}
