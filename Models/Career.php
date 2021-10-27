<?php namespace Models;

class Career{


	private $idCareer;
	private $name;


	public function getId() { 
		return $this->idCareer; 
	} 

	public function setId($idCareer) 
	{ 
		$this->idCareer = $idCareer; 
	} 

	public function getName() { 
		return $this->name; 
	} 

  public function setName() {
    return $this->name;
  }



}