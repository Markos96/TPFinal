<?php namespace DAO;


	use Models\Enterprise as Enterprise;
	use DAO\IEnterprise as IEnterprise;
	use DAO\Connection as Connection;

	class EnterpriseDAO implements IEnterprise{

		private $enterpriseList = array();

		public function add(Enterprise $enterprise){

			$this->enterpriseList = Connection::getDataJson(); 

			array_push($this->enterpriseList,$enterprise);

			$this->Save();

		}


		public function GetAll(){

			return Connection::getDataJson();
			
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
          break;
        }
      }
    }

    public function delete($empresa) {

    }

		public function GetByID(){
			echo "Aca buscaremos la empresa por ID";
		}



	}



?>