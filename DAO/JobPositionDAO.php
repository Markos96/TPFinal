<?php namespace DAO;

use DAO\Interfaces\IJobPositionDAO;
use Models\JobPosition;
use Exception;

class JobPositionDAO implements IJobPositionDAO {

    private $connection;
    private $table = "jobPosition";

    public function getById($id) {
        $query = "SELECT * FROM " . $this->table . " WHERE idJobPosition = :idJobPosition";
        $parameters["idJobPosition"] = $id;
        $jobPosition = null;
        try {
            $this->connection = Connection::GetInstance();
            $resultSet = $this->connection->Execute($query, $parameters);

            if($resultSet) {
                $jobPosition = new JobPosition();
                $jobPosition->setId($resultSet[0]["idJobPosition"]);
                $jobPosition->setCareer($resultSet[0]["idcareer"]);
                $jobPosition->setDescription($resultSet[0]["description"]);
            }

        } catch (Exception $ex) {
            throw $ex;
        }
        return $jobPosition;
    }

    public function getAll(){
        $query = "SELECT * FROM " . $this->table;
        $jobPositions = array();
        try{
            $this->connection = Connection::GetInstance();
            $resultSet = $this->connection->Execute($query);

            if($resultSet) {
                foreach ($resultSet as $row) {
                    $jobPos = new JobPosition();
                    $jobPos->setId($row["idJobPosition"]);
                    $jobPos->setCareer($row["idcareer"]);
                    $jobPos->setDescription($row["description"]);
                    array_push($jobPositions, $jobPos);
                }
            }

        } catch (Exception $ex ) {
            throw $ex;
        }
        return $jobPositions;
    }

    public function save($model) {

    }

    public function update($model) {


    }

    public function delete($model) {

    }

    public function getInfo($model) {

    }
}