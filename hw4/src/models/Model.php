<?php

namespace cs174\hw4\models;
// require_once('C:/xampp/htdocs/hw4/src/configs/Config.php');
use \cs174\hw4\configs as C;

class Model {

	public $db_usr;
	public $db_pwd;
	public $db_prt;

    // \cs174\hw3\configs\DB_USR == C\DB_USR ?

	public function __construct()
    {
        $C = new C\Config();
        $this->db_usr = $C->DB_USR;
        $this->db_pwd = $C->DB_PWD;
        $this->db_prt = $C->DB_PRT;
    }

    public function connect(){
    	return new \mysqli("127.0.0.1:" . $this->db_prt, $this->db_usr, $this->db_pwd);
    }
    public function connectTo($db){
    	return new \mysqli("127.0.0.1:" . $this->db_prt, $this->db_usr, $this->db_pwd, $db);
    }
}
