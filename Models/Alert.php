<?php namespace Models; 

class Alert{

	private $type;
	private $message;


	public function __construct($type,$message){
		$this->type = $type;
		$this->message = $message;
	}

	public function getType(){
		return $this->type;
	}

	public function setType($type){
		$this->type = $type;
		return $this;
	}

	public function getMessage(){
		return $this->message;
	}

	public function setMeggase($message){
		$this->message = $message;
		return $this;
	}


}


?>