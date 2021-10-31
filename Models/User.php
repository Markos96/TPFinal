<?php namespace Models;

use Models\Student as Student;

class User extends Student{

    use Admin;
    protected $idUser;
    protected $email;
    protected $password;
    protected $rol;
    protected $isActive;
    protected $idInfo;

    public function __construct($email, $password) 
    {
        $this->email = $email;
        $this->password = $password; 
    }

    public function getId() {
        return $this->idUser;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getRol() {
        return $this->rol;
    }

    public function active() {
        return $this->isActive;
    }

    public function getIdInfo() {
        return $this->idInfo;
    }

    public function setId($id) {
        $this->idUser = $id;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function setRol($rol) {
        $this->rol = $rol;
    }

    public function setIsActive($isActive){
        $this->isActive = $isActive;
    }
}


?>