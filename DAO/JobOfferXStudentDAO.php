<?php namespace DAO;

use DAO\Connection;
use Exception;
use Models\UserXOffer;

class jobOfferXStudentDAO {

    private $connection = null;
    private $table = "userxoffer";

    public function getById($id){
        $query = "SELECT * FROM " . $this->table;
    }

    public function save($idUser, $idOffer) {
        $query = "INSERT INTO " . $this->table . " (idUser, idOffer, active) VALUES (:idUser, :idOffer, 1)";
        $parameters["idUser"] = $idUser;
        $parameters["idOffer"] = $idOffer;
        try {
            $this->connection = Connection::GetInstance();
            return $this->connection->ExecuteNonQuery($query, $parameters);
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function postulations_user ($idUser ) {
        //$query = "SELECT * FROM " . $this->table . " right outer join jobOffer on " . $this->table . ".idOffer = jobOffer.idJobOffer where " . $this->table . ".idUser = :id";
        $query = "SELECT * FROM " . $this->table . " WHERE idUser = :idUser";

        //$query = "SELECT * FROM " . $this->table . " right outer join User on admin.idUser = User.idUser where admin.idUser = :id";
        $parameters["idUser"] = $idUser;
        $userxoffers = array();
        try {
            $this->connection = Connection::GetInstance();
            $resultSet = $this->connection->Execute($query, $parameters);

            if ($resultSet) {
                foreach($resultSet as $uXoffer) {
                    $uoFF = new UserXOffer($uXoffer["idUser"], $uXoffer["idOffer"], $uXoffer["active"]);
                    array_push($userxoffers, $uoFF);
                }
            }

            return $userxoffers;
        } catch (Exception $ex) {
            throw $ex;
        }
    }

/*     public function delete($id) {
        $query = "UPDATE " . $this->table . " SET active"
    }

    public function getOfferByIdWithOffer($id) {
        $query = "SELECT * FROM " . $this->table . " WHERE idOffer = :id";
        $parameters["id"] = $id;
        $userxoffer = null;
        try {
            $this->connection = Connection::GetInstance();
            $resultSet = $this->connection->Execute($query, $parameters);
            if($resulSet){
                $userxoffer = new UserXOffer($resultSet[0]["idUser"], $resultSet[0]["idOffer"], $resultSet[0]["active"]);
            }
        } catch (Exception $ex) {
            throw $ex;
        }
    } */
}