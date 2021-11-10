<?php

namespace DAO;

use DAO\Interfaces\IStudentDAO;
use Models\Student;
use Exception;
use DAO\Connection;
use Models\User;

class StudentDAO implements IStudentDAO
{

  private $connection = null;
  private $tableName = "student";

  public function getById($id)
  {
    $query = "SELECT * FROM " . $this->tableName . " right outer join User on student.idUser = User.idUser where student.idUser = :id";
    $parameters["id"] = $id;
    $student = null;
    try {
      $this->connection = Connection::GetInstance();
      $resultSet = $this->connection->Execute($query, $parameters);
      if($resultSet) {
        $student = new Student();
        $student->setPostulado($resultSet[0]["postulado"]);
      }
    } catch (Exception $ex) {
      throw $ex;
    }
    return $student;
  }


  public function getInfo($user)
  {
    $students = Connection::getDataApi("Student");
    $st = null;
    try {

      foreach ($students as $key => $student) {
        if ($student["email"] == $user->getEmail()) {
          //echo '<pre>';
          //var_dump($student);
          $st = new Student();
          $st->setStudentId($student["studentId"]);
          $st->setCareer($this->getCareerName($student["careerId"]));
          $st->setFileNumber($student["fileNumber"]);
          $st->setName($student["firstName"]);
          $st->setLastname($student["lastName"]);
          $st->setDni($student["dni"]);
          $st->setGender($student["gender"]);
          $st->setBirthdate($student["birthDate"]);
          $st->setPhonenumber($student["phoneNumber"]);

          $st->setPostulado($this->getById($st->getStudentId()));

          return $st; 
        }
      }
    } catch (Exception $ex) {
      throw $ex;
    }
  }

  public function getCareerName($id)
  {
    $careers = Connection::getDataApi('Career');

    foreach ($careers as $key => $career) {
      if ($career['careerId'] == $id) return $career['description'];
    }
  }

  public function getAll() 
  {}
  
  public function save($student)
  {}
  
  public function update($student)
  {}

  public function delete($student)
  {}
}
