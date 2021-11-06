<?php namespace DAO\Interfaces;
	
	use Models\Student as Student;
	use DAO\Connection as Connection;

	interface IStudentDAO extends BaseInterfaceDAO{

		function getCareerName($id);
	}
?>