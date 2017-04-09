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
    public final function display($note, $parent)
    {
        $this->layout->renderHeader($note, $parent);
        $this->render($note, $parent);
        $this->layout->renderFooter($note, $parent);
    }
    public abstract function render($note, $parent);
}
