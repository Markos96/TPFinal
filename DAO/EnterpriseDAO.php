<?php namespace DAO;


	use Models\Enterprise as Enterprise;
	use DAO\IEnterprise as IEnterprise;
	use DAO\ConnectionAPI as ConnectionAPI;

	class EnterpriseDAO implements IEnterprise{

		private $enterpriseList = array();

		public function add(Enterprise $enterprise){

			$this->enterpriseList = ConnectionAPI::getDataJson(); 

			array_push($this->enterpriseList,$enterprise);

			$this->Save();

		}


		public function GetAll(){

			return ConnectionAPI::getDataJson();
			
		}


		public function Save(){

			$arrayToEncode = array();

			foreach($this->enterpriseList as $enterprise)
			{
				$newArray["id"] = $enterprise ->getId();
				$newArray["firstName"] = $enterprise -> getFirstName();
				$newArray["description"] = $enterprise -> getDescription();

				array_push($arrayToEncode, $newArray);

				$jsonContent = json_encode($arrayToEncode, JSON_PRETTY_PRINT);
            
            file_put_contents(fileName, $jsonContent);
			}

		}

		public function GetByID(){
			echo "Aca buscaremos la empresa por ID";
		}



	}



?>