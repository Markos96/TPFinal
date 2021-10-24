<?php namespace DAO;

  use DAO\IStudentDAO as IStudentDAO;
  use Models\Student as Student;
  use \Exception as Exception;
  use DAO\Connection as Connection;

	class StudentDAO implements IStudentDAO{

    private $conexion;
    private $tableName = "students";


    public function Add(Student $student){

      try
        {

           $query = "INSERT INTO ".$this->tableName." (studentId, careerId, firstName, lastName, dni, fileNumber, gender, birthDate, email, phoneNumber, active, rol) VALUES (:studentId, :careerId, :firstName, :lastName, :dni, :fileNumber, :gender, :birthDate, :email, :phoneNumber, :active, :rol);";
                
                $parameters["studentId"] = $student->getId();
                $parameters["careerId"] = $student->getCareer();
                $parameters["firstName"] = $student->getFirstName();
                $parameters["lastName"] = $student->getLastName();
                $parameters["dni"] = $student->getDni();
                $parameters["fileNumber"] = $student->getFileNumber();
                $parameters["gender"] = $student->getGender();
                $parameters["birthDate"] = $student->getBirthDate();
                $parameters["email"] = $student->getEmail();
                $parameters["phoneNumber"] = $student->getPhoneNumber();
                $parameters["active"] = $student->getActive();
                $parameters["rol"] = $student->getRol();

                $this->conexion = Connection::GetInstance();

                $this->conexion->ExecuteNonQuery($query, $parameters);
        }

         catch(Exception $ex)
            {
                throw $ex;
            }

    }

     public function GetAll()
        {
            try
            {
                $studentList = array();

                $query = "SELECT * FROM ".$this->tableName;

                $this->connection = Connection::GetInstance();

                $resultado = $this->connection->Execute($query);
                
                foreach ($resultado as $row)
                {                
                    $student = new Student();
                    $student->setId($row["studentId"]);
                    $student->setCareer($row["careerId"]);
                    $student->setFirstName($row["firstName"]);
                    $student->setLastName($row["lastName"]);
                    $student->setDni($row["dni"]);
                    $student->setFileNumber($row["fileNumber"]);
                    $student->setGender($row["gender"]);
                    $student->setBirthDate($row["birthDate"]);
                    $student->setEmail($row["email"]);
                    $student->setPhoneNumber($row["phoneNumber"]);
                    $student->setActive($row["active"]);
                    $student->setRol($row["rol"]);

                    array_push($studentList, $student);
                }

                return $studentList;
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }




    public function getByEmail($email)
    {
      $students = Connection::getDataApi('Student');

      foreach ($students as $key => $student) {
        if($student['email'] == $email) {
          $st = new Student($this->getCareerName($student['careerId']),$student['firstName'], $student['lastName'], $student['dni'], $student['fileNumber'], $student['gender'], $student['birthDate'], $student['email'], $student['phoneNumber'], $student['active'], $student['careerId'] % 2 == 0 ? 'ROLE_ADMIN' : 'ROLE_STUDENT');

          $st->setId($student['studentId']);

          return $st;
        }
      }

      return false;
    }

    private function getCareerName($id) {
      $careers = Connection::getDataApi('Career');

      foreach ($careers as $key => $career) {
        if($career['careerId'] == $id) return $career['description'];
      }
    }
		
	}


?>