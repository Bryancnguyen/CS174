<?php
namespace cs174\hw4\controllers;

use \cs174\hw4\views as V;
use \cs174\hw4\models as M;

class ApiController {

	public function __construct($model, $data) {
		$this->updateModel($model, $data);
	}

	private function updateModel($model, $data){
		$sheet = new M\Sheet($model);
		$this->respond($sheet->update($data));
	}

	private function respond($status){
		if($status){ //success
			http_response_code(200);
		}
		else{
			http_response_code(500);
		}
		exit;
	}
}