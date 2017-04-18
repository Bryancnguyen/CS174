<?php

namespace cs174\hw4\models;

require_once("Model.php");

class Category extends Model{

    public $valid;
    public $id;
	public $name; 
    public $data; //JSON encoded data
    public $codes;

	public function __construct(){
    	parent::__construct();
        $a = func_get_args(); 
        $i = func_num_args(); 
        if (method_exists($this,$f='__construct'.$i)) { 
            call_user_func_array(array($this,$f),$a); 
        } 
    }

    public function __construct1($name){ //existing sheet
        $this->name = $name;
    }

    public function __construct2($name, $data){ //new sheet
        $this->name = $name;
        $this->data = $data;
        persist();
        $this->id = getID();
    }

    /**
    *  Saves the Sheet object to the database during instantiation.
    */
    private function persist(){
        $sql = "INSERT INTO sheet (`name`, `data`) VALUES ('". $this->name ."', " . $this->data . ")";
        $mysqli = parent::connectTo("cs174hw4");
        if ($mysqli->connect_errno) {
            print("Failed to connect to MySQL: (" . $mysqli->connect_errno . ") ". $mysqli->connect_error ."\n");
        }
        $result = \mysqli_query($mysqli,$sql);
        // print($result . "\n");
        $mysqli->close();
    }

    private function getAndSetFields(){
        $mysqli = parent::connectTo("cs174hw4");
        if ($mysqli->connect_errno) {
            print("Failed to connect to MySQL: (" . $mysqli->connect_errno . ") ". $mysqli->connect_error ."\n");
        }
        $this->id = getID($mysqli, $this->name);
        if($this->id < 0){
            $this->valid = false;
        }
        else {
            $this->data = getData($mysqli, $this->name);
            $this->codes = getCodes($mysqli, $this->id);
        }
        
        $mysqli->close();
    }

    /**
    *  Retrieves the ID of the category title.
    */
    private function getID($mysqli, $name){
        $sql = "SELECT id FROM `sheet` WHERE name='$name'";
        $id = -1;
        if($result = $mysqli->query($sql) ) {
            $row = $result->fetch_assoc();
            $id = $row["id"];
            // print("ID: $id .\n");
            $result->free();
        }
        return $id;
    }

    /**
    *  Retrieves the ID of the category title.
    */
    private function getData($mysqli, $name){
        $sql = "SELECT data FROM `sheet` WHERE name='$name'";
        $data = -1;
        if($result = $mysqli->query($sql) ) {
            $row = $result->fetch_assoc();
            $data = $row["data"];
            // print("Data: $data .\n");
            $result->free();
        }
        return $data;
    }

    /**
    *  Retrieves the hash codes for the sheet with the given ID.
    */
    private function getCodes($mysqli, $id){
        $sql = "SELECT * FROM `sheet_code` WHERE sheet_id='$id'";
        $codes = [];
        if($result = $mysqli->query($sql) ) {
            while($row = $result->fetch_assoc()){
                $type = $row["type"];
                $hash = $row["hash"];
                $codes[] =  new \cs174\hw4\models\Sheet_Code();

                // print("Code: $id .\n");
                $result->free();
            }
            
        }
        return $codes;
    }

    private function makeCodes($id){
        $codes = [];
        $codes["read"] = md5($id . "read");
        $codes["edit"] = md5($id . "edit");
        $codes["file"] = md5($id . "file");
        return $codes;
    }

    private function storeCodes($codes){
        
    }
}
