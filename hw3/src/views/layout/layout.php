<?php
namespace cs174\hw3\views\layout;

abstract class Layout
{
    public $view;
    public function __construct($view)
    //notice type hinting allowed for objects
    {
        $this->view = $view;
    }
    public abstract function renderHeader($data);
    public abstract function renderFooter($data);
}
