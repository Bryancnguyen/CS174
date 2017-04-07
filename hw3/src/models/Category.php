<?php

namespace cs174\hw3\models;

require_once("Model.php");

class Category extends Model{

    public $id;
	public $title;
	public $parent;
    public $hasMultipleParents;

	public function __construct($title, $parent=""){
    	parent::__construct();
        $this->title = $title;
        $this->parent = $parent;
        if($parent != "") {
            $this->persist();
        }
        else { // $parent == ""
            $this->parent = $this->getParent($title);
        }
        $this->id = $this->getID($title);
        $this->hasMultipleParents = $this->hasMultipleParentCategories();
    }

    /**
    *  Saves the Category object to the database during instantiation.
    */
    private function persist(){
        $sql = "INSERT INTO categories (`name`, `idparents`) VALUES ('". $this->title ."', " . $this->getID($this->parent) . ")";
        $mysqli = parent::connectTo("cs174hw3");
        if ($mysqli->connect_errno) {
            print("Failed to connect to MySQL: (" . $mysqli->connect_errno . ") ". $mysqli->connect_error ."\n");
        }
        $result = \mysqli_query($mysqli,$sql);
        // print($result . "\n");
        $mysqli->close();
    }

    /**
    *  Retrieves the ID of the category title.
    */
    private function getID($title){
        if($title == "index"){
            return 1;
        }
        else {
            $mysqli = parent::connectTo("cs174hw3");
            if ($mysqli->connect_errno) {
                print("Failed to connect to MySQL: (" . $mysqli->connect_errno . ") ". $mysqli->connect_error ."\n");
            }
            $sql = "SELECT id FROM `categories` WHERE name='$title'";
            $id = -1;
            if($result = $mysqli->query($sql) ) {
                $row = $result->fetch_assoc();
                $id = $row["id"];
                // print("ID: $id .\n");
                $result->free();
            }
            $mysqli->close();
            return $id;
        }
    }

    /**
    *  Retrieves the ID of the category title.
    */
    private function getParent($title){
        if($title == "index"){
            return "";
        }
        else {
            $mysqli = parent::connectTo("cs174hw3");
            if ($mysqli->connect_errno) {
                print("Failed to connect to MySQL: (" . $mysqli->connect_errno . ") ". $mysqli->connect_error ."\n");
            }
            $sql = "SELECT name FROM `categories` WHERE id=(SELECT idparents FROM `categories` WHERE name='$title')";
            $name = -1;
            if($result = $mysqli->query($sql) ) {
                $row = $result->fetch_assoc();
                $name = $row["name"];
                // print("ID: $id .\n");
                $result->free();
            }
            $mysqli->close();
            return $name;
            // $sql = "SELECT idparents FROM `categories` WHERE name='$title'";
            // $id = -1;
            // if($result = $mysqli->query($sql) ) {
            //     $row = $result->fetch_assoc();
            //     $id = $row["idparents"];
            //     // print("ID: $id .\n");
            //     $result->free();
            // }
            // $sql = "SELECT name FROM `categories` WHERE id=$id";
            // $name = "";
            // if($result = $mysqli->query($sql) ) {
            //     $row = $result->fetch_assoc();
            //     $name = $row["name"];
            //     // print("ID: $id .\n");
            //     $result->free();
            // }
            // $mysqli->close();
            // return $id;
        }
    }

    /**
    *
    */
    private function hasMultipleParentCategories(){
        if($this->parent == "" || $this->parent == "index"){
            return False;
        }
        return True;
    }

    /**
    *  Retrieves the Sub-categories of the category from the database.
    */
    public function getSubs(){
        $myid = $this->getID($this->title);
        $mysqli = parent::connectTo("cs174hw3");
        if ($mysqli->connect_errno) {
            print("Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error ."\n");
        }
        $sql = "SELECT * FROM `categories` WHERE idparents=$myid";
        $arr = [];
        if($result = $mysqli->query($sql) ) {
            while($row = $result->fetch_assoc()) {
                $cat = new Category($row["name"]);
                // printf("Name: %s\n", $cat->title);
                $arr[] = $cat;
            }
            $result->free();
        }
        else
            print("Failed to query subcats.\n");
        $mysqli->close();
        return $arr;
    }

    /**
    *  Retrieves the Notes of the category from the database.
    */
    public function getNotes(){
        $myid = $this->getID($this->title);
        $mysqli = parent::connectTo("cs174hw3");
        if ($mysqli->connect_errno) {
            print("Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error ."\n");
        }
        $sql = "SELECT * FROM `cs174hw3`.`notes` WHERE idcategory=$myid";
        $arr = [];
        if($result = $mysqli->query($sql) ) {
            while($row = $result->fetch_assoc()) {
                $note = new Note($row["title"], $row["content"]);
                // printf("Title: %s, Content: %s, Category: %s \n", $note->title, $note->content, $note->category);
                $arr[] = $note;
            }
            $result->free();
        }
        $mysqli->close();
        return $arr;
    }

    /**
    *  Adds the Sub-category to the category.
    */
    public function addSub($title){
    	// construct Category with this->title (the constructor will persist the category automatically)
        new Category($title, $this->name);
    }
}
