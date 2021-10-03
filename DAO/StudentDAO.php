<?php namespace DAO;

  use DAO\IStudentDAO as IStudentDAO;
  use Models\Student as Student;

	class StudentDAO implements IStudentDAO{

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