<?php namespace DAO;

use Models\Enterprise as Enterprise;
use DAO\Interfaces\IEnterpriseDAO as IEnterpriseDAO;
use DAO\Connection as Connection;
use \Exception as Exception;

class EnterpriseDAO implements IEnterpriseDAO
{


  private $conexion;
  private $tableName = "enterprises";

  private $enterpriseList = array();

  public function getAll()
  {}

  public function save($enterprise)
  {}

  public function update($enterprise)
  {}

  public function delete($enterprise) 
  {}

  public function getInfo($enterprise)
  {}

/*   public function add(Enterprise $enterprise)
  {

    $this->enterpriseList = Connection::getDataJson();

    array_push($this->enterpriseList, $enterprise);

    $this->Save();
  }

  public function AddDb(Enterprise $enterprise)
  {
    try {
      $query = "INSERT INTO " . $this->tableName . " (name, description,isActive) VALUES (:name, :description,:isActive);";


      $parameters["name"] = $enterprise->getFirstName();
      $parameters["description"] = $enterprise->getDescription();
      $parameters["isActive"] = $enterprise->getIsActive();

      $this->conexion = Connection::GetInstance();

      $this->conexion->ExecuteNonQuery($query, $parameters);
    } catch (Exception $ex) {
      throw $ex;
    }
  }

  public function GetAll()
  {


    try {
      $enterpriseList = array();

      $query = "SELECT * FROM " . $this->tableName;

      $this->conexion = Connection::GetInstance();

      $resultado = $this->conexion->Execute($query);
      //echo '<pre>'; 
      foreach ($resultado as $row) {
        $en= new Enterprise();
        $en->setId($row["id"]);
        $en->setFirstName($row["name"]);
        $en->setDescription($row["descripcion"]);
        $en->setIsActive($row["isActive"]);

        array_push($enterpriseList, $en);
      }

      return $enterpriseList;
    } catch (Exception $ex) {
      throw $ex;
    }
  }

  public function Save()
  {

    $arrayToEncode = array();

    foreach ($this->enterpriseList as $enterprise) {
      $newArray["id"] = $enterprise->getId();
      $newArray["firstName"] = $enterprise->getFirstName();
      $newArray["description"] = $enterprise->getDescription();
      $newArray["isActive"] = $enterprise->getIsActive();

      array_push($arrayToEncode, $newArray);

      $jsonContent = json_encode($arrayToEncode, JSON_PRETTY_PRINT);

      file_put_contents(fileName, $jsonContent);
    }
  }

  public function deleteEnterprise($id)
  {
    //$this->enterpriseList = $this->GetAll();

    $query = "UPDATE $this->tableName SET isActive = '0' WHERE id=:id";

    $parameters['id'] = $id;

    try {
      $this->conexion = Connection::GetInstance();
      $result = $this->conexion->ExecuteNonQuery($query, $parameters);
    } catch (\PDOException $exception) {
      throw $exception;
    }
  }

  public function altaEnterprise($id)
  {
    $query = "UPDATE $this->tableName SET isActive = '1' WHERE id=:id";

    $parameters['id'] = $id;

    try {
      $this->conexion = Connection::GetInstance();
      $result = $this->conexion->ExecuteNonQuery($query, $parameters);
    } catch (\PDOException $exception) {
      throw $exception;
    }
  }

  public function updateEnterprise( $enterprise )
  {
    
    $query = "UPDATE enterprises SET name = :name, descripcion = :descripcion, isActive = :isActive WHERE id = :id";

    $parameters["name"] = $enterprise->getFirstName();
    $parameters["descripcion"] = $enterprise->getDescription();
    $parameters["isActive"] = $enterprise->getIsActive();
    $parameters["id"] = $enterprise->getId();

    try{

      $this->conexion = Connection::GetInstance();

      $result = $this->conexion->ExecuteNonQuery($query, $parameters);

    } catch (Exception $ex) {
      throw $ex;
    }

  } */

/*   public function getById($id)
  {
    //$this->enterpriseList = $this->GetAll();
    foreach ($this->enterpriseList as $enterprise => $value) {
      if ($value->getId() == $id) {
        return $value;
      }
    }
  }

  public function getByIdDB ($id) 
  {
    try{
      $query = "SELECT * FROM " . $this->tableName . " WHERE id = :id";
      $parameters["id"] = $id;
      $this->conexion = Connection::GetInstance();
      $resultSet = $this->conexion->Execute($query, $parameters);
      if($resultSet) {
        $enterprise = new Enterprise();
        $enterprise->setId($resultSet[0]["id"]);
        $enterprise->setFirstName($resultSet[0]["name"]);
        $enterprise->setDescription($resultSet[0]["descripcion"]);
        $enterprise->setIsActive($resultSet[0]["isActive"]);
        return $enterprise;
      }
      return null;
    } catch (Exception $ex) {
      throw $ex;
    }
  } */
}
