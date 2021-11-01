<?php namespace Models;

use Models\User as User;

trait Admin extends User {

    protected $id;
    protected $description;
    protected $position;

    public function __construct($description, $position)
    {
       $this->description = $description; 
       $this->position = $position;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getPosition()
    {
        return $this->position;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function setPosition($position)
    {
        $this->position = $position;
    }
}

?>

