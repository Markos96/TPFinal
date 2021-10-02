<?php namespace DAO;
	
	use Models\Enterprise as Enterprise;

	class IEnterprise{

		public function Add(Enterprise $enterprise);

		public function GetAll();

		public function Save();

		public function GetByID();



	}




?>