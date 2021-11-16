<?php namespace Models;

class UserXOffer {

    private $idUser;
    private $idOffer;
    private $active;

    public function __construct($idUser, $idOffer, $active) 
    {
        $this->idUser = $idUser;
        $this->idOffer = $idOffer;
        $this->active = $active; 
    }

    public function getIdUser () {
        return $this->idUser;
    }

    public function getIdOffer () {
        return $this->idOffer;
    }

    public function getActive () {
        return $this->active;
    }

    public function setIdUser($idUser) {
        $this->idUser = $idUser;
    }

    public function setIdOffer ($idOffer) {
        $this->idOffer = $idOffer;
    }

    public function setActive ($active) {
        $this->active = $active;
    }
}