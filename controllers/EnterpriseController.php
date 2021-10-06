<?php namespace Controllers;

	use Models\Enterprise as Enterprise;
	use DAO\EnterpriseDAO as EnterpriseDAO;

	class EnterpriseController{

		private $EnterpriseDAO;
		private $listEnterprises = array();

		public function __construct()
		{
			$this->EnterpriseDAO = new EnterpriseDAO;
		}

		public function add($id,$firstName,$description){

			$empresa = new Enterprise();
			$empresa->setId($id);
			$empresa->setFirstName($firstName);
			$empresa->setDescription($description);
			$this->EnterpriseDAO->add($empresa);

			$this->getAll();

		}

		public function getAll(){

			$this->listEnterprises = $this->EnterpriseDAO->GetAll();
			
			$this->showEnterprises();
		}

		public function showEnterprises(){
			require_once VIEWS_PATH . 'enterprises.php';
		}

		public function showAddEnterprise(){
			require_once VIEWS_PATH . 'add-enterprises.php';
		}

	}



?>