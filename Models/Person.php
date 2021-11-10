<?php namespace Models;

abstract class Person {

    protected $name;
    protected $lastname;
    protected $dni;
    protected $gender;
    protected $birthdate;
    protected $phonenumber;

    public function __construct($name = "", $lastname = "", $dni = "", $gender = "", $birthdate = null, $phonenumber = "")
    {
        $this->name = $name; 
        $this->lastname = $lastname;
        $this->dni = $dni;
        $this->gender = $gender;
        $this->birthdate = $birthdate;
        $this->phonenumber = $phonenumber;
    }

    public function getName ()
    {
        return $this->name;
    }

    public function getLastname()
    {
        return $this->lastname;
    }

    public function getDni()
    {
        return $this->dni;
    }

    public function getGender()
    {
        return $this->gender;
    }

    public function getBirthdate()
    {
        return $this->birthdate;
    }

    public function getPhonenumber()
    {
        return $this->phonenumber;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setLastname($lastname) 
    {
        $this->lastname = $lastname;
    }

    public function setDni($dni)
    {
        $this->dni = $dni;
    }

    public function setGender($gender)
    {
        $this->gender = $gender;
    }

    public function setBirthdate($birthdate)
    {
        $this->birthdate = $birthdate;
    }

    public function setPhonenumber($phonenumber)
    {
        $this->phonenumber = $phonenumber;
    }
}

?>