<?php

//build note model

namespace cs174\hw3\models;

use cs174\hw3\configs as C;

class Note extends Model{

	public $title;
	public $content;
	public $category;

	public function __construct($title, $content, $category)
    {
    	parent::__construct();
        $this->title = $title;
        $this->content = $content;
        $this->category = $category;
        $this->persist();
    }

    /**
    *  Saves the Note object to the database during instantiation. 
    */
    private function persist(){
        
    }

    /**
    *  Retrives the ID of the Note.
    */
    private function getID(){

    }
}