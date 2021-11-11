<?php namespace DAO;

use Exception;

class jobOfferXStudentDAO {

    private $connection;
    private $table = "userxoffer";

    public function getById($id){}

    public function save($jobOfferXStudent) {
        $query = "INSERT INTO " . $this->table . " (idUser, idOffer) values (:idUser, :idOffer)";
        $parameters["idUser"] = $jobOfferXStudent->getIdUser();
        $parameters["idOffer"] = $jobOfferXStudent->getIdOffer();
        try {
            $this->connection = Connection::GetInstance();
            return $this->connection->ExecuteNonQuery($query, $parameters);
        } catch (Exception $ex) {
            throw $ex;
        }
    }
}