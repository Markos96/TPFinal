<?php namespace Models;

class User {

    private $id;
    private $email;
    private $password;
    private $rol;
    private $active;
    

    public function __construct($email, $password) 
    {
        $this->email = $email;
        $this->password = $password;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getId(){
        return $this->id;
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

    public function getActive() {
        return $this->active;
    }

    public function setActive($active){
        $this->active = $active;
    }
}
