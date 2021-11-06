<?php namespace Models;


   class Enterprise{

	private $id;
	private $firstName;
	private $description;
    private $isActive;

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

  public function getIsActive() {
    return $this->isActive;
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

  public function setIsActive($active) {
    $this->isActive = $active;
  }
}

?>