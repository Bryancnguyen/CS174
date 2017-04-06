<?php
namespace cs174\hw3\views\helpers;
require_once ('./src/views/layout/webLayout.php');

abstract class categoryViewHelper
{
    public $layout;
    public function __construct($layout)
    {
        $layoutName = "\cs174\hw3\\views\layout\\" .$layout;
        $this->layout = new $layoutName($layout);
    }
    public final function display($listArray = [], $noteArray =[])
    {
        $this->layout->renderHeader($listArray, $noteArray);
        $this->render($listArray, $noteArray);
        $this->layout->renderFooter($listArray, $noteArray);
    }
    public abstract function render($listArray = [], $noteArray =[]);
}
