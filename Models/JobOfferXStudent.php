<?php namespace Models;

class JobOfferXStudent {

    private $idUser;
    private $idOffer;

    public function __construct($idUser, $idOffer)
    {
        $this->idUser = $idUser;
        $this->idOffer = $idOffer; 
    }

    public function getIdUser () {
        return $this->idUser;
    }

    public function getIdOffer() {
        return $this->idOffer;
    }

    public function setIdUser($idUser) {
        $this->idUser = $idUser;
    }

    public function setIdOffer($idOffer) {
        $this->idOffer = $idOffer;
    }
}