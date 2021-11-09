<?php namespace DAO;

use DAO\Interfaces\ICareerDAO;
use Exception;
use Models\Career;

class CareerDAO implements ICareerDAO
{
    private $connection;
    private $table = "career";

    public function getById($id) 
    {
        $query = "SELECT * FROM " . $this->table . " WHERE idCareer = :idCareer";
        $parameters["idCareer"] = $id;
        $career = null;
        try {
            $this->connection = Connection::GetInstance();
            $resultSet = $this->connection->Execute($query, $parameters);

            if($resultSet) {
                $career = new Career($resultSet[0]["name"], $resultSet[0]["active"]);
                $career->setId($resultSet[0]["idCareer"]);
            }
            return $career;
        } catch (Exception $ex) {
            throw $ex;
        }
    } 

    public function getAll()
    {
        $query = "SELECT * FROM " . $this->table;
        $careers = array();
        try {
            $this->connection = Connection::GetInstance();
            $resultSet = $this->connection->Execute($query);

            if ($resultSet) {
                foreach ($resultSet as $row) {
                    $career = new Career($row["name"], $row["active"]);
                    $career->setId($row["idCareer"]);
                    array_push($careers, $career);
                }
            }
            return $careers;
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function getInfo($career) 
    {
        $query = "SELECT * FROM " . $this->table . " WHERE LOWER(name) = LOWER(:name)";
        $parameters["name"] = $career->getName();
        try {
            $this->connection = Connection::GetInstance();
            $resultSet = $this->connection->Execute($query, $parameters);
            if($resultSet) {
                return false;
            }
            return true;
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function save($career)
    {
        $query = "INSERT INTO " . $this->table . " (name, active) VALUES (:name, :active)";
        $parameters["name"] = $career->getName();
        $parameters["active"] = $career->getActive();
        try {
            $this->connection = Connection::GetInstance();
            return $this->connection->ExecuteNonQuery($query, $parameters);
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function update($career)
    {
        $query = "UPDATE " . $this->table . " SET name = :name WHERE idCareer = :idCareer";
        $parameters["name"] = $career->getName();
        $parameters["idCareer"] = $career->getId();
        try {
            $this->connection = Connection::GetInstance();
            return $this->connection->ExecuteNonQuery($query, $parameters);
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function delete($career)
    {
        $query = "UPDATE " . $this->table . " SET active = :active WHERE idCareer = :idCareer";
        $parameters["active"] = ($career->getActive()) ? 1 : 0;
        $parameters["idCareer"] = $career->getId();
        try {
            $this->connection = Connection::GetInstance();
            return $this->connection->ExecuteNonQuery($query, $parameters);
        } catch (Exception $ex) {
            throw $ex;
        }
    }

}
