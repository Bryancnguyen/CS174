<?php
namespace cs174\hw3\views\helpers;

class pageViewHelper {
    public function display($htmlPage){
        include_once dirname(__FILE__) . $htmlPage;
    }
}
?>
