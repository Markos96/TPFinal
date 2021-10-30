<?php namespace DAO;


	use Models\Enterprise as Enterprise;
	use DAO\IEnterprise as IEnterprise;
	use DAO\Connection as Connection;
  use \Exception as Exception;

	class EnterpriseDAO implements IEnterprise{


    private $conexion;
    private $tableName = "enterprises";

		private $enterpriseList = array();

		public function add(Enterprise $enterprise){

			$this->enterpriseList = Connection::getDataJson(); 

			array_push($this->enterpriseList,$enterprise);

			$this->Save();

		}

    public function AddDb(Enterprise $enterprise)
        {
            try
            {
                $query = "INSERT INTO ".$this->tableName." (name, description,isActive) VALUES (:firstname, :description,:isActive);";
                
                
                $parameters["firstName"] = $enterprise->getFirstName();
                $parameters["description"] = $enterprise->getDescription();
                $parameters["isActive"] = $enterprise->getIsActive();

                $this->conexion = Connection::GetInstance();

                $this->conexion->ExecuteNonQuery($query, $parameters);
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

		public function GetAll(){

			//return Connection::getDataJson();
			
       try
            {
                $enterpriseList = array();

                $query = "SELECT * FROM ".$this->tableName;

                $this->conexion = Connection::GetInstance();

                $resultado = $this->conexion->Execute($query);
                
                foreach ($resultado as $row)
                {                
                    $enterprise = new Enterprise();
                    $enterprise->setId($row["id"]);
                    $enterprise->setFirstName($row["name"]);
                    $enterprise->setDescription($row["description"]);
                    $enterprise->setIsActive($row["isActive"]);

                    array_push($enterpriseList, $enterprise);
                }

                return $enterpriseList;
            }
            catch(Exception $ex)
            {
                throw $ex;
            }

		}

    public function pagination($name) {
      $num_per_page = 5;
      $pagination = array();
      $empresas = $this->GetAll();
      $i = 0;
      $j = 0;

      foreach ($empresas as $key => $value) {

        if($name == "")
          $pagination[$i][$j] = $value;
        else {
          if(str_contains($value->getFirstName(), $name))
            $pagination[$i][$j] = $value;
        }

        if(isset($pagination[$i]) && count($pagination[$i]) == $num_per_page){
          $i++;
          $j = 0;
        } else $j++;
      } 

      return $pagination;
    }

		public function Save(){

			$arrayToEncode = array();

			foreach($this->enterpriseList as $enterprise)
			{
				$newArray["id"] = $enterprise ->getId();
				$newArray["firstName"] = $enterprise -> getFirstName();
				$newArray["description"] = $enterprise -> getDescription();
        $newArray["isActive"] = $enterprise -> getIsActive();

				array_push($arrayToEncode, $newArray);

				$jsonContent = json_encode($arrayToEncode, JSON_PRETTY_PRINT);
            
            file_put_contents(fileName, $jsonContent);
			}

		}

    public function update($empresa) {
      $this->enterpriseList = $this->GetAll();

      foreach ($this->enterpriseList as $enterprise => $value) {
        if($value->getId() == $empresa->getId()) {
          $this->enterpriseList[$enterprise] = $empresa;
          $this->Save();
          return;
        }
      }
      return false;
    }

   /* public function deleteEnterprise($id) {
      $this->enterpriseList = $this->GetAll();

      foreach ($this->enterpriseList as $enterprise => $value) {
        if($value->getId() == $id){
          $value->setIsActive(!$value->getIsActive());
          return $this->update($value);
        }
      }
    } */

    public function deleteEnterprise($id) {
      $this->enterpriseList = $this->GetAll();

      foreach ($this->enterpriseList as $enterprise => $value) {
        if($value->getId() == $id){
          
          $query = "DELETE * FROM ".$this->tableName . "WHERE (id==id)";
          //$value->setIsActive(!$value->getIsActive());

          return $this->update($value);
        }
      }
    }

		public function getById($id){
      $this->enterpriseList = $this->GetAll();
      foreach ($this->enterpriseList as $enterprise => $value) {
        if($value->getId() == $id) {
          return $value;
        }
      }
		}



	}



?>