<?php namespace Controllers;

	use Models\Enterprise as Enterprise;
	use DAO\EnterpriseDAO as EnterpriseDAO;

	class EnterpriseController{

		private $EnterpriseDAO;

		public function __construct()
		{
			$this->EnterpriseDAO = new EnterpriseDAO;
		}

		public function add($id,$firstName){

			$empresa = new Enterprise();
			$empresa->setId($id);
			$empresa->setFirstName($firstName);
			$this->EnterpriseDAO->add($empresa);

			var_dump($empresa);

		}

		public function getAll(){

			$empresas = $this->EnterpriseDAO->GetAll();
			var_dump($empresas);
		}

	}



?>