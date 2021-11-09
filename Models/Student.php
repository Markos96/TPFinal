<?php namespace Models;

use Models\Person as Person;

	abstract class Student extends Person{

		private $studentId;
		private $careerId; 
		private $fileNumber;
		private $postulado;

		public function __construct($careerId,$fileNumber,$postulado, $name, $lastname, $dni, $gender, $birthdate, $phonenumber){

			$this->careerId = $careerId;
			$this->fileNumber = $fileNumber;
			$this->postulado = $postulado;
			// atributos de  || Person || 
			parent::__construct($name, $lastname, $dni, $gender, $birthdate, $phonenumber);
		}

		public function setId($studentId) 
		{ 
		$this->studentId = $studentId; 
		} 

		public function getId() 
		{ 
		return $this->studentId; 
		} 

		public function setCareer($careerId) 
		{ 
		$this->careerId = $careerId; 
		} 

		public function getCareer() 
		{ 
		return $this->careerId; 
		} 

		public function setFileNumber($fileNumber) 
		{ 
		$this->fileNumber = $fileNumber; 
		} 

		public function getFileNumber() 
		{ 
		return $this->fileNumber; 
		} 
 
		public function getPostulado()
		{
				return $this->postulado;
		}

		public function setPostulado($postulado)
		{
				$this->postulado = $postulado;

				return $this;
		}
}
