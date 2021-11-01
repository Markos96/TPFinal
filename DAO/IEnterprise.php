<?php namespace DAO;
	
	use Models\Enterprise as Enterprise;

	interface IEnterprise{

		//public function add(Enterprise $enterprise);

		public function GetAll();

		public function Save();

		public function getById($id);

		public function AddDb(Enterprise $enterprise);

		public function deleteEnterprise($id);

		public function altaEnterprise($id);

		public function updateEnterprise($id);

	}




?>