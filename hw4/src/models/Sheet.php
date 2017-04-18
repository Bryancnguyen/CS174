<?php

namespace cs174\hw4\models;

require_once("C:/xampp/htdocs/hw4/src/models/Model.php");

class Sheet extends Model{

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
        $this->getAndSetFields();
    }

    public function __construct2($name, $data){ //new sheet
        $this->name = $name;
        $this->data = $data;
        $this->persist();
        $mysqli = parent::connectTo("cs174hw4");
        if ($mysqli->connect_errno) {
            print("Failed to connect to MySQL: (" . $mysqli->connect_errno . ") ". $mysqli->connect_error ."\n");
        }
        $this->id = $this->getID($mysqli, $this->name);
        if($this->id > 0){
            $this->valid = true;
            $this->makeCodes($this->id);
        }
        else{
            $this->valid = false;
        }
    }

    /**
    *  Saves the Sheet object to the database during instantiation.
    */
    private function persist(){
        $sql = "INSERT INTO sheet (`name`, `data`) VALUES ('". $this->name ."', '" . $this->data . "')";
        $mysqli = parent::connectTo("cs174hw4");
        if ($mysqli->connect_errno) {
            print("Failed to connect to MySQL: (" . $mysqli->connect_errno . ") ". $mysqli->connect_error ."\n");
        }
        $result = \mysqli_query($mysqli,$sql);
        print($sql . "\n");
        print("Res:". $result . "\n");
        $mysqli->close();
    }

    private function getAndSetFields(){
        $mysqli = parent::connectTo("cs174hw4");
        if ($mysqli->connect_errno) {
            print("Failed to connect to MySQL: (" . $mysqli->connect_errno . ") ". $mysqli->connect_error ."\n");
        }
        $this->id = $this->getID($mysqli, $this->name);
        print("Existing Sheet being Queried: ". $this->name ."\n");
        if($this->id < 0){
            $this->valid = false;
        }
        else {
            $this->valid = true;
            $this->data = $this->getData($mysqli, $this->name);
            $this->codes = $this->getCodes($mysqli, $this->id);
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
            foreach(range(0, $result->num_rows) as $num){
                if($row = $result->fetch_assoc()){
                    $hash_id = $row["id"];
                    $hash = $row["hash"];
                    $type = $row["type"];
                    $codes[] =  new Sheet_Code($hash_id, $id, $hash, $type);
                    // print("Code: $id .\n");
                }
            }
            $result->free();
        }
        return $codes;
    }

    private function makeCodes($id){
        $codes[] = new Sheet_Code($id, substr(md5($id . "read"), 0, 8), "read");
        $codes[] = new Sheet_Code($id, substr(md5($id . "edit"), 0, 8), "edit");
        $codes[] = new Sheet_Code($id, substr(md5($id . "file"), 0, 8), "file");
        return $codes;
    }
}
