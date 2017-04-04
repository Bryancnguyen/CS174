<?php
namespace cs174\hw3\views\helpers;

class pageViewHelper {
     private $data=array();
     public function assign($key,$value){
     $this->data[$key]=$value;
    }
    public function display($htmlPage){
        extract($this->data);        
        include_once dirname(__FILE__) . $htmlPage;
    }
}
?>
