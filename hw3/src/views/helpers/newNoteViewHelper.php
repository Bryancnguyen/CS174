<?php
namespace cs174\hw3\views\helpers;
require_once ('./src/views/layout/webLayout.php');

abstract class newNoteViewHelper
{
    public $layout;
    public function __construct($layout)
    {
        $layoutName = "\cs174\hw3\\views\layout\\" .$layout;
        $this->layout = new $layoutName($layout);
    }
    public final function display($category)
    {
        $this->layout->renderHeader($category);
        $this->render($category);
        $this->layout->renderFooter($category);
    }
    public abstract function render($category);
}
