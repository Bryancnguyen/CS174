<?php
namespace cs174\hw4\controllers;

use \cs174\hw4\views as V;
use \cs174\hw4\models as M;

class ApiController {

	public function __construct($model) {
		$this->updateModel($model);
	}

	private function updateModel($model){
		$contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';
		if(strcasecmp($contentType, 'application/json') == 0){
			$content = trim(file_get_contents("php://input"));
			$decoded = json_decode($content, true);
		    if(is_array($decoded)){
		    	$sheet = new M\Sheet($model);
				$this->respond($sheet->update($content));
			}
			else{
				print("Wrong json encoding: $content");
			}
			
		}
		else{
			print("Wrong encoding header.");
		}
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