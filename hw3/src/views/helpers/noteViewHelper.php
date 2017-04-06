<?php
namespace cs174\hw3\views\helpers;
require_once ('./src/views/layout/webLayout.php');

abstract class noteViewHelper
{
    public $layout;
    public function __construct($layout)
    {
        $layoutName = "\cs174\hw3\\views\layout\\" .$layout;
        $this->layout = new $layoutName($layout);
    }
    public final function display($note)
    {
        $this->layout->renderHeader($note);
        $this->render($note);
        $this->layout->renderFooter($note);
    }
    public abstract function render($note);
}
