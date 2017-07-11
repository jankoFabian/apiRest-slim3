<?php 

namespace App\Lib;

/**
* Class response
*/
class Response
{
	public $result  	= null;
	public $response  	=false;
	public $message		='Ocurrio un Error!';
	public $errors		=[];

	public function SetResponse($response, $m = ''){
		$this->response = $response;
		$this->message = $m;

		if(!$response && $m = '') $this->response ='Ocurrio un Error inesperado';

		return $this;
	}
}


 ?>