<?php namespace Models;

use Models\Student as Student;

use Models\Admin as Admin;

class User extends Student{

    
    protected $idUser;
    protected $email;
    protected $password;
    protected $rol;
    protected $isActive;
    protected $idInfo;

    public function __construct($email, $password,$rol) 
    {
        $this->email = $email;
        $this->password = $password;
        $this->active = true;
        $this->rol = 1;

        $this->password = $password; 
    }

    public function getId() {
        return $this->idUser;
    }

    public function setId($id) {
        $this->idUser = $id;
    }

     public function setEmail($email) {
        $this->email = $email;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function getRol() {
        return $this->rol;
    }

    public function setRol($rol){
        $this->rol = $rol;
    } 

    public function getIdInfo() {
        return $this->idInfo;
    }

    public function setIdInfo($idInfo) {
        $this->idInfo = $idInfo;
    }

    public function getActive() {
        return $this->active;
    }

    public function setIsActive($isActive){
        $this->isActive = $isActive;
    }
}
