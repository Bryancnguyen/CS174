<?php
namespace cs174\hw4\controllers;

// require_once('./src/views/landingPage.php');
// require_once('./src/views/editSheetPage.php');
// require_once('./src/views/readSheetPage.php');

use \cs174\hw4\views as V;

class PageController {
    private $data;
    private $landingView;
    function render() {

    if(isset($_POST['userInput'])) //Check if the user actually put any input
    {
      $inputString = filter_var($_POST['userInput'], FILTER_SANITIZE_STRING); // Get the users input in a string
      $this->data = new \cs174\hw4\models\Sheet($inputString); //Create a sheet with the users input name

      if($data->valid){ //If this sheet is already in the database
        $this->editSheetView = new V\editSheetPage('WebLayout');//Create the view
        $this->editSheetView->display($data);//Pass the data to View
      }
      else{
        $sheet_to_pass = new \cs174\hw4\models\Sheet("sheet_one", '{[ ["Tom", "Sally"] ]}');
        $this->editSheetView = new V\editSheetPage('WebLayout');//Create the view
        $this->editSheetView->display($data);//Pass the data to View
      }
    }
    else{
      $data = '';
      $this->editSheetView = new V\editSheetPage('WebLayout');//Create the view
      $this->editSheetView->display($data);//Pass the data to View
    }


    // $this->landingView = new V\landingPage('WebLayout');
    // $this->landingView->display($data);
    // // $this->editSheetView = new V\editSheetPage('WebLayout');
    // // $this->editSheetView->display($data);
    // // $this->readSheetView = new V\readSheetPage('WebLayout');
    // // $this->readSheetView->display($data);
    }
}
