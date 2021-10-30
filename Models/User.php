<?php namespace Models;

class User {
    private $idUser;
    private $email;
    private $password;
    private $rol;

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
}


?>