<?php namespace DAO;

	use Models\Career as Career;
	use DAO\IEnterprise as IEnterprise;
	use DAO\Connection as Connection;

	class CareerDAO implements IEnterprise{


    private $conexion;
    private $tableName = "career";

		private $careerList = array();

		public function add(Career $career){

			$this->careerList = Connection::getDataJson(); 

			array_push($this->careerList,$career);

			$this->Save();

		}

		public function GetAll(){

			//return Connection::getDataJson();
			
       try
            {
                $careerList = array();

                $query = "SELECT * FROM ".$this->tableName;

                $this->connection = Connection::GetInstance();

                $resultado = $this->connection->Execute($query);
                
                foreach ($resultado as $row)
                {                
                    $career = new Enterprise();
                    $career->setId($row["idCareer"]);
                    $career->setFirstName($row["name"]);
                    
                    array_push($careerList, $career);
                }

                return $careerList;
            }
            catch(Exception $ex)
            {
                throw $ex;
            }

		}

	}

?>