<?php

namespace cs174\hw3\models;
require_once('./src/configs/Config.php');
use cs174\hw3\configs as C;

class Model {

	public $db_usr;
	public $db_pwd;
	public $db_prt;

	public function __construct($db_usr =\cs174\hw3\configs\DB_USR, $db_pwd =\cs174\hw3\configs\DB_PWD, $db_prt = \cs174\hw3\configs\DB_PRT)
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
