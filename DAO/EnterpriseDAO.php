<?php namespace DAO;


	use Models\Enterprise as Enterprise;
	use DAO\IEnterprise as IEnterprise;
	use DAO\ConnectionAPI as ConnectionAPI;

	class EnterpriseDAO implements IEnterprise{

		private $enterpriseList = array();
		private $fileName;

		public function __construct(){
			$this->fileName = dirname(__DIR__)."Data/enterprise.json";
		}

		public function Add(Enterprise $enterprise){

			$this->getDataJson();

			array_push($this->enterpriseList,$enterprise);

			$this->Save();

		}


		public function GetAll(){

			ConnectionAPI::getDataJson();
			
			return $this->enterpriseList;
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
            
            file_put_contents($this->fileName, $jsonContent);
			}


		}

		public function GetByID(){
			echo "Aca buscaremos la empresa por ID";
		}



	}



?>