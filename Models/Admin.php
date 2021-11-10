<?php

namespace Models;

class Admin extends Person
{

    protected $id;
    protected $description;
    protected $position;

    public function __construct($name, $lastname, $dni, $gender, $birthdate, $phonenumber, $description, $position)
    {
		parent::__construct($name, $lastname, $dni, $gender, $birthdate, $phonenumber);
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
