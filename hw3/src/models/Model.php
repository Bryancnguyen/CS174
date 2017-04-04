<?php

namespace cs174\hw3\models;
use cs174\hw3\configs as C;
include('./src/configs/Config.php');

class Model {

	public $db_usr;
	public $db_pwd;
	public $db_nme;
	public function __construct($db_usr =C\DB_USR, $db_pwd =C\DB_PWD, $db_nme = C\DB_NME)
    {
        $this->db_usr = $db_usr;
        $this->db_pwd = $db_pwd;
        $this->db_nme = $db_nme;
    }

    public function connect(){
    	return new mysqli("localhost", $this->db_usr, $this->db_pwd, $this->db_nme);
    }
}
