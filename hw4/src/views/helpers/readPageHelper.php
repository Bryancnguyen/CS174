<?php
namespace cs174\hw4\views\helpers;
require_once ('./src/views/layout/webLayout.php');

abstract class readPageHelper
{
    public $layout;
    public function __construct($layout)
    {
        $layoutName = "\cs174\hw4\\views\layout\\" .$layout;
        $this->layout = new $layoutName($layout);
    }
    public final function display($data)
    {
        $this->layout->renderHeader($data);
        $this->render($data);
        $this->layout->renderFooter($data);
    }
    public abstract function render($data);
}
