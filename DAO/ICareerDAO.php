<?php namespace DAO;
	
	use Models\Career as Career;

	interface ICareerDAO{

		public function add(Career $career);

		public function GetAll();


	}




?>
