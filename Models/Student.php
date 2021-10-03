<?php namespace Models;

	class Student{

		private $studentId;
		private $careerId;
		private $firstName;
		private $lastName;
		private $dni;
		private $fileNumber;
		private $gender;
		private $birthDate;
		private $email;
		private $phoneNumber;
		private $active;
		private $rol;

		public function __construct($careerId,$firstName,$lastName,$dni,$fileNumber,$gender,$birthDate,$email,$phoneNumber,$active,$rol){

			$this->careerId = $careerId;
			$this->firstName = $firstName;
			$this->lastName = $lastName;
			$this->dni = $dni;
			$this->fileNumber = $fileNumber;
			$this->gender = $gender;
			$this->birthDate = $birthDate;
			$this->email = $email;
			$this->phoneNumber = $phoneNumber;
			$this->active = $active;
			$this->rol = $rol;

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

		public function setFirstName($firstName) 
		{ 
		$this->firstName = $firstName; 
		} 

		public function getFirstName() 
		{ 
		return $this->firstName; 
		} 

		public function setLastName($lastName) 
		{ 
		$this->lastName = $lastName; 
		} 

		public function getLastName() 
		{ 
		return $this->lastName; 
		} 

		public function setDni($dni) 
		{ 
		$this->dni = $dni; 
		} 

		public function getDni() 
		{ 
		return $this->dni; 
		} 

		public function setFileNumber($fileNumber) 
		{ 
		$this->fileNumber = $fileNumber; 
		} 

		public function getFileNumber() 
		{ 
		return $this->fileNumber; 
		} 

		public function setGender($gender) 
		{ 
		$this->gender = $gender; 
		} 

		public function getGender() 
		{ 
		return $this->gender; 
		} 

		public function setBirthDate($birthDate) 
		{ 
		$this->birthDate = $birthDate; 
		} 

		public function getBirthDate() 
		{ 
		return $this->birthDate; 
		} 

		public function setEmail($email) 
		{ 
		$this->email = $email; 
		} 

		public function getEmail() 
		{ 
		return $this->email; 
		} 

		public function setPhoneNumber($phoneNumber) 
		{ 
		$this->phoneNumber = $phoneNumber; 
		} 

		public function getPhoneNumber() 
		{ 
		return $this->phoneNumber; 
		} 

		public function setActive($active) 
		{ 
		$this->active = $active; 
		} 

		public function getActive() 
		{ 
		return $this->active; 
		} 

		public function setRol($rol) 
		{ 
		$this->rol = $rol; 
		} 

		public function getRol(){
			return $this->rol;
		}


}
