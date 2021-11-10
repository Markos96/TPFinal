<?php namespace DAO;

use Exception;
use DAO\Interfaces\IJobOfferDAO;
use Models\JobOffer;

class JobOfferDAO implements IJobOfferDAO
{

    private $connection = null;
    private $table = "jobOffer";

    public function __construct()
    {
    }

    public function getById($id)
    {
        $query = "SELECT * FROM " . $this->table . " WHERE idJobOffer = :idJobOffer";
        $parameters["idJobOffer"] = $id;
        $jobOffer = null;
        try {
            $this->connection = Connection::GetInstance();
            $resultSet = $this->connection->Execute($query, $parameters);
            if ($resultSet) {
                $jobOffer = new JobOffer();
                $jobOffer->setId($resultSet[0]["idJobOffer"]);
                $jobOffer->setEnterprise($resultSet[0]["id_enterprise"]);
                $jobOffer->setJobPosition($resultSet[0]["idJobPosition"]);
                $jobOffer->setActive($resultSet[0]["estado"]);
                $jobOffer->setCareer($resultSet[0]["id_career"]);
                $jobOffer->setDescription($resultSet[0]["descripcion"]);
                $jobOffer->setDate($resultSet[0]["fecha"]);
            }
        } catch(Exception $ex) {
            throw $ex;
        }

        return $jobOffer;
    }

    public function getAll()
    {
        $query = "SELECT * FROM " . $this->table;
        $jobOffers = array();
        try {
            $this->connection = Connection::GetInstance();
            $resultSet = $this->connection->Execute($query);

/*             echo '<pre>';
            var_dump($resultSet); */
            if ($resultSet) {
                foreach ($resultSet as $row) {
                    $jobOffer = new JobOffer();
                    $jobOffer->setId($row["idJobOffer"]);
                    $jobOffer->setEnterprise($row["id_enterprise"]);
                    $jobOffer->setStudent($row["id_student"]);
                    $jobOffer->setJobPosition($row["idJobPosition"]);
                    $jobOffer->setActive($row["estado"]);
                    $jobOffer->setCareer($row["id_career"]);
                    $jobOffer->setDescription($row["descripcion"]);
                    $jobOffer->setDate($row["fecha"]);
                    array_push($jobOffers, $jobOffer);
                }
            }

            return $jobOffers;
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function getInfo($jobOffer)
    {
    }

    public function save($jobOffer)
    {
    }

    public function update($jobOffer)
    {
    }

    public function delete($jobOffer)
    {
    }
}
