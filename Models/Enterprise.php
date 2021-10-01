<?php namespace Models;


   class Enterprise{

	private $id;
	private $firstName;
	private $description;

	public function getId() { 
		return $this->id; 
	} 

	public function setId($id) 
	{ 
		$this->id = $id; 
	} 

	public function getFirstName() { 
		return $this->firstName; 
	} 

	public function setFirstName($firstName) 
	{ 
		$this->firstName = $firstName; 
	} 

	public function getDescription() { 
		return $this->description; 
	} 

	public function setDescription($description) 
	{ 
		$this->description = $description; 
	} 


}

?>