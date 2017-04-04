<?php

namespace cs174\hw3\models;

require_once("Model.php");

class Note extends Model{

    public $id;
	public $title;
	public $content;
	public $category;

	public function __construct($title, $content="", $category="")
    {
    	parent::__construct();
        $this->title = $title;
        if($content != "" && $category != "") {
            $this->content = $content;
            $this->category = $category;
            $this->persist();
        }
        else {
            $this->content = $this->getContent();
            $this->category = $this->getCategory();
        }
        $this->id = $this->getID();
    }

    /**
    *  Saves the Note object to the database during instantiation. 
    */
    private function persist(){
        $mycat = new \cs174\hw3\models\Category($this->category);
        $mycat_id = $mycat->id;
        $sql = "INSERT INTO `notes` (`title`,`content`,`idcategory`) VALUES ('". $this->title ."', '". $this->content ."', ". $this->category .")";
        $mysqli = parent::connectTo("cs174hw3");
        if ($mysqli->connect_errno) {
            print("Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error ."\n");
        }
        $result = \mysqli_query($mysqli,$sql);
        print($result . "\n");
        $mysqli->close();
    }

    /**
    *  Retrives the ID of the Note.
    */
    private function getID() {
        $sql = "SELECT id FROM `notes` WHERE title='". $this->title ."'";
        $mysqli = parent::connectTo("cs174hw3");
        if ($mysqli->connect_errno) {
            print("Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error ."\n");
        }
        $id = -1;
        if($result = $mysqli->query($sql) ) {
            $row = $result->fetch_assoc();
            $id = $row["id"];
            print("ID: $id .\n");
            $result->free();
        }
        $mysqli->close();
        return $id;
    }

    /**
    *
    */
    private function getContent() {
        $sql = "SELECT content FROM `notes` WHERE title='". $this->title ."'";
        $mysqli = parent::connectTo("cs174hw3");
        if ($mysqli->connect_errno) {
            print("Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error ."\n");
        }
        $content = "";
        if($result = $mysqli->query($sql) ) {
            $row = $result->fetch_assoc();
            $content = $row["content"];
            print("Content: $content .\n");
            $result->free();
        }
        $mysqli->close();
        return $content;
    }

    /**
    *
    */
    private function getCategory() {
        $sql = "SELECT idcategory FROM `notes` WHERE title='". $this->title ."'";
        $mysqli = parent::connectTo("cs174hw3");
        if ($mysqli->connect_errno) {
            print("Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error ."\n");
        }
        $cat = "";
        if($result = $mysqli->query($sql) ) {
            $row = $result->fetch_assoc();
            $cat = $row["idcategory"];
            print("Category: $cat .\n");
            $result->free();
        }
        $mysqli->close();
        return $content;
    }
}