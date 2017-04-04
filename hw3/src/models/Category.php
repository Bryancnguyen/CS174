<?php

// build category model

namespace cs174\hw3\models;
use cs174\hw3\configs as C;

include('./src/models/Model.php');

class Category extends Model{

  public $id;
	public $title;
	public $parent;
  private $categories;

	public function __construct(){
    $this->categories[] = array("category" => "1");
    $this->categories[] = array("category" => "2");
    	// parent::__construct();
      //   $this->title = $title;
      //   if($parent != "") {
      //       $this->parent = $parent;
      //       $this->persist();
      //   }
    }

  public function getAllCategories() {
          return $this->categories;
  }


    /**
    *  Saves the Category object to the database during instantiation.
    */
    private function persist(){
        // assign root id
        // insert into table
        $prep = "INSERT INTO `cs174hw3`.`categories`
        (`name`, `idparent`)
        VALUES
        ('". $this->parent . "', " . $this->getID($this->parent) . ")";
    }

    /**
    *  Retrieves the ID of the category title.
    */
    private function getID($title){
        if($title == "root"){
            return -1;
        }
        else {
            $mysqli = parent::connect();
            $prep = "SELECT idcategories FROM `cs174hw3`.`categories` WHERE name='$title'";
            $stmt =  $mysqli->stmt_init();
            if($stmt->prepare($prep)) {
                $stmt->execute();
                $stmt->bind_result($res);
                $stmt->fetch();
                $stmt->close();
            }
            $mysqli->close();
            if($res)
                return $res;
            else
                return null;
        }
    }

    /**
    *
    *
    */
    private function assignRootID(){
        $parent = $this->getID($this->parent);
        if($parentID > 0) { // sub category, so assign parent's rootid
            return $this->getRootID($this->parent);
        }
        else {
            return $this->getMaxRootID() + 1;
        }
    }

    /**
    *
    *
    */
    private function getRootID($title){
        // fetch rootid from db
        $mysqli = parent::connect();
        $prep = "SELECT idroot FROM `cs174hw3`.`categories` WHERE name='$title'";
        $stmt =  $mysqli->stmt_init();
        if($stmt->prepare($prep)) {
            $stmt->execute();
            $stmt->bind_result($res);
            $stmt->fetch();
            $stmt->close();
        }
        $mysqli->close();
        if($res)
            return $res;
        else
            return -1;
    }

    /**
    *
    *
    */
    private function getMaxRootID(){
        // fetch rootid from db
        $mysqli = parent::connect();
        $prep = "SELECT MAX(idroot) FROM `cs174hw3`.`categories`";
        $stmt =  $mysqli->stmt_init();
        if($stmt->prepare($prep)) {
            $stmt->execute();
            $stmt->bind_result($res);
            $stmt->fetch();
            $stmt->close();
        }
        $mysqli->close();
        if($res)
            return $res;
        else
            return -1;
    }

    /**
    *  Returns the parent Category object of this object, or null if it doesn't exist.
    *
    */
    private function getParentCategory(){
        // fetch rootid from db
    }


    /**
    *  Retrieves the Sub-categories of the category from the database.
    */
    public function getHierarchy(){
        $rootid = $this->getRootID();
        $mysqli = parent::connect();
        $prep = "SELECT * FROM `cs174hw3`.`categories` WHERE idroot=$rootid";
        $stmt =  $mysqli->stmt_init();
        if($stmt->prepare($prep)) {
            $stmt->execute();
            $stmt->bind_result($res);
            $stmt->fetch();
            $stmt->close();
        }
        $mysqli->close();
        if($res)
            return $res;
        else
            return -1;
    }


    /**
    *  Retrieves the Sub-categories of the category from the database.
    */
    public function getSubs(){
        $myid = $this->getRootID();
        $mysqli = parent::connect();
        $prep = "SELECT * FROM `cs174hw3`.`categories` WHERE idparent=$myid";
        $stmt =  $mysqli->stmt_init();
        if($stmt->prepare($prep)) {
            $stmt->execute();
            $stmt->bind_result($res);
            $stmt->fetch();
            $stmt->close();
        }
        $mysqli->close();
        if($res)
            return $res;
        else
            return -1;
    }

    /**
    *  Retrieves the Notes of the category from the database.
    */
    public function getNotes(){
        $myid = $this->getRootID();
        $mysqli = parent::connect();
        $prep = "SELECT * FROM `cs174hw3`.`notes` WHERE idcategory=$myid";
        $result = mysqli_query($mysqli,$prep);

        // Associative array
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        //printf ("%s (%s)\n",$row["Lastname"],$row["Age"]);

        $stmt =  $mysqli->stmt_init();
        if($stmt->prepare($prep)) {
            $stmt->execute();
            $stmt->bind_result($res);
            $stmt->fetch();
            $stmt->close();
        }
        $mysqli->close();
        if($res)
            return $res;
        else
            return -1;
    }

    /**
    *  Adds the Sub-category to the category.
    */
    public function addSub($title){
    	// construct Category with this->title (the constructor will persist the category automatically)
        C\Category($title, $this->name);
    }
}
