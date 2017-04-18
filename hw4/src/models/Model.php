<?php

namespace cs174\hw4\models;
require_once('C:/xampp/htdocs/hw4/src/configs/Config.php');
use cs174\hw4\configs as C;

class Model {

	public $db_usr;
	public $db_pwd;
	public $db_prt;

    // \cs174\hw3\configs\DB_USR == C\DB_USR ?

	public function __construct($db_usr =C\DB_USR, $db_pwd =C\DB_PWD, $db_prt = C\DB_PRT)
    {
        $this->db_usr = $db_usr;
        $this->db_pwd = $db_pwd;
        $this->db_prt = $db_prt;
    }

    public function connect(){
    	return new \mysqli("127.0.0.1:" . $this->db_prt, $this->db_usr, $this->db_pwd);
    }
    public function connectTo($db){
    	return new \mysqli("127.0.0.1:" . $this->db_prt, $this->db_usr, $this->db_pwd, $db);
    }
}
