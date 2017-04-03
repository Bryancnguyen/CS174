<?php

// build category model

namespace cs174\hw3\models;

use cs174\hw3\configs as C;

class Category extends Model{

	public $title;
	public $parent;

	public function __construct($title, $parent = "root"){
    	parent::__construct();
        $this->title = $title;
        $this->parent = $parent;
        $this->persist();
    }

    /**
    *  Saves the Category object to the database during instantiation. 
    */
    private function persist(){

    }

    /**
    *  Retrieves the ID of the category.
    */
    private function getID(){

    }

    /**
    *  Retrieves the Sub-categories of the category from the database. 
    */
    public function getSubs(){

    }

    /**
    *  Retrieves the Notes of the category from the database. 
    */
    public function getNotes(){

    }

    /**
    *  Adds the Sub-category to the category. 
    */
    public function addSub($title){
    	// construct Category with this->title
    }
}