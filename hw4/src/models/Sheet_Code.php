<?php

namespace cs174\hw4\models;

require_once("Model.php");

class Sheet_Code extends Model{

    public $valid;
    public $id;
    public $sheet_id;
    public $hash_code; 
    public $code_type;

    public function __construct(){
        parent::__construct();
        $a = func_get_args(); 
        $i = func_num_args(); 
        if (method_exists($this,$f='__construct'.$i)) { 
            call_user_func_array(array($this,$f),$a); 
        } 
    }

    public function __construct1($hash_code){ //existing sheet
        $this->hash_code = $hash_code;
    }

    public function __construct3($sheet_id, $hash_code, $code_type){ //new sheet
        $this->sheet_id = $sheet_id;
        $this->hash_code = $hash_code;
        $this->code_type = $code_type;
        persist();
        $this->id = getID();
    }

    public function __construct4($id, $sheet_id, $hash_code, $code_type){
        $this->id = $id;
        $this->sheet_id = $sheet_id;
        $this->hash_code = $hash_code;
        $this->code_type = $code_type;
    }

    /**
    *  Saves the Sheet object to the database during instantiation.
    */
    private function persist(){
        $sql = "INSERT INTO sheet_code (`sheet_id`, `hash`, `type`) VALUES (". $this->sheet_id .", '". $this->hash_code ."', '". $this->code_type ."')";
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
        $this->id = getID($mysqli, $this->hash_code);
        if($this->id < 0){
            $this->valid = false;
        }
        else {
            $this->code_type = getType($mysqli, $this->id);
        }
        
        $mysqli->close();
    }

    /**
    *  Retrieves the ID of the category title.
    */
    private function getID($mysqli, $hash_code){
        $sql = "SELECT id FROM `sheet_code` WHERE hash=$hash_code";
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
    private function getType($mysqli, $id){
        $sql = "SELECT type FROM `sheet_code` WHERE id=$id";
        $data = -1;
        if($result = $mysqli->query($sql) ) {
            $row = $result->fetch_assoc();
            $data = $row["data"];
            // print("Data: $data .\n");
            $result->free();
        }
        return $data;
    }
}
