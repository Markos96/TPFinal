<?php namespace DAO;

use Models\Enterprise as Enterprise;
use DAO\Interfaces\IEnterpriseDAO as IEnterpriseDAO;
use DAO\Connection as Connection;
use \Exception as Exception;

class EnterpriseDAO implements IEnterpriseDAO
{


  private $connection = null;
  private $table = "enterprises";

  public function getById($id)
  {
    $query = "SELECT * FROM " . $this->table . " WHERE id = :id";
    $parameters["id"] = $id;
    $enterprise = null;    
    try {
      $this->connection = Connection::GetInstance();
      $resultSet = ($this->connection->Execute($query, $parameters))[0]; 

      if($resultSet) {
        $enterprise =  new Enterprise();
        $enterprise->setId($id);
        $enterprise->setName($resultSet["name"]);
        $enterprise->setDescription($resultSet["descripcion"]);
        $enterprise->setActive($resultSet["isActive"]);
      }
      return $enterprise;
    } catch(Exception $ex) {
      throw $ex;
    }
  }

  public function getAll()
  {
    $query = "SELECT * FROM " . $this->table;
    $enterprises = array();

    try {
      $this->connection = Connection::GetInstance();
      $resultSet = $this->connection->Execute($query);

      foreach ($resultSet as $row) {
        $enterprise = new Enterprise();
        $enterprise->setId($row["id"]);
        $enterprise->setName($row["name"]);
        $enterprise->setDescription($row["descripcion"]);
        $enterprise->setActive($row["isActive"]);
        array_push($enterprises, $enterprise);
      }

      return $enterprises;
    } catch (Exception $ex) {
      throw $ex;
    }
  }

  public function getAllActives()
  {
    $query = "SELECT * FROM " . $this->table . " WHERE isActive = :isActive";
    $parameters["isActive"] = true;
    $enterprises = array();

    try {
      $this->connection = Connection::GetInstance();
      $resultSet = $this->connection->Execute($query, $parameters);

      foreach ($resultSet as $row) {
        $enterprise = new Enterprise();
        $enterprise->setId($row["id"]);
        $enterprise->setName($row["name"]);
        $enterprise->setDescription($row["descripcion"]);
        $enterprise->setActive($row["isActive"]);
        array_push($enterprises, $enterprise);
      }

      return $enterprises;
    } catch (Exception $ex) {
      throw $ex;
    }
  }

  public function getAllInactives()
  {
    $query = "SELECT * FROM " . $this->table . " WHERE isActive = :isActive";
    $parameters["isActive"] = false;
    $enterprises = array();

    try {
      $this->connection = Connection::GetInstance();
      $resultSet = $this->connection->Execute($query, $parameters);

      foreach ($resultSet as $row) {
        $enterprise = new Enterprise();
        $enterprise->setId($row["id"]);
        $enterprise->setName($row["name"]);
        $enterprise->setDescription($row["descripcion"]);
        $enterprise->setActive($row["isActive"]);
        array_push($enterprises, $enterprise);
      }

      return $enterprises;
    } catch (Exception $ex) {
      throw $ex;
    }
  }

  public function save($enterprise)
  {
    $query = "INSERT INTO " . $this->table . " (name, descripcion, isActive) VALUES (:name, :descripcion, :isActive)";
    $parameters["name"] = $enterprise->getName();
    $parameters["descripcion"] = $enterprise->getDescription();
    $parameters["isActive"] = $enterprise->getActive();

    try {
      $this->connection = Connection::GetInstance();
      $this->connection->ExecuteNonQuery($query, $parameters);
    } catch( Exception $ex) {
      throw $ex;
    }
  }

  public function update($enterprise)
  {
    $query = "UPDATE " . $this->table . " SET name = :name, descripcion = :descripcion, isActive = :isActive WHERE id = :id";

    $parameters["name"] = $enterprise->getName();
    $parameters["descripcion"] = $enterprise->getDescription();
    $parameters["isActive"] = $enterprise->getActive();
    $parameters["id"] = $enterprise->getId();

    try {

      $this->connection = Connection::GetInstance();
      $this->connection->ExecuteNonQuery($query, $parameters);

    } catch (Exception $ex) {
      throw $ex;
    }
  }

  public function delete($enterprise) 
  {
    $query = "UPDATE " . $this->table . " SET isActive = :isActive WHERE id = :id";
    $parameters["isActive"] = ($enterprise->getActive()) ? 0 : 1;
    $parameters["id"] = $enterprise->getId();

    try {

      $this->connection = Connection::GetInstance();
      $this->connection->ExecuteNonQuery($query, $parameters);

    } catch (Exception $ex) {
      throw $ex;
    }
  }

  public function getInfo($id)
  {
    $query = "SELECT * FROM " . $this->table . " right outer join User on " . $this->table . ".id_user = User.idUser where " . $this->table . ".id_user = :id";
    $parameters["id"] = $id;
    $enterprise = null;
    try {
      $this->connection = Connection::GetInstance();
      $resultSet = $this->connection->Execute($query, $parameters);
      if($resultSet) {
        $enterprise = new Enterprise();
        $enterprise->setId($resultSet[0]["id"]);
        $enterprise->setName($resultSet[0]["name"]);
        $enterprise->setDescription($resultSet[0]["descripcion"]);
        $enterprise->setActive($resultSet[0]["isActive"]);
        $enterprise->setCuit($resultSet[0]["cuit"]);
      }
    } catch (Exception $ex) {
      throw $ex;
    }

    return $enterprise;
  }

}
