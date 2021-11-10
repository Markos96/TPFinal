<?php

namespace DAO;

use DAO\Interfaces\IStudentDAO as IStudentDAO;
use Models\Student as Student;
use \Exception as Exception;
use DAO\Connection as Connection;
use Models\User;

class StudentDAO implements IStudentDAO
{

  private $connection = null;
  private $tableName = "students";

  public function getById($id)
  {
    
  }


  public function getInfo($user)
  {
    $students = Connection::getDataApi("Student");
    try {

      foreach ($students as $key => $student) {
        if ($student["email"] == $user->getEmail()) {
          $user->setStudentId($student["studentId"]);
          $user->setCareer($this->getCareerName($student["careerId"]));
          $user->setFileNumber($student["fileNumber"]);
          $user->setName($student["firstName"]);
          $user->setLastname($student["lastName"]);
          $user->setDni($student["dni"]);
          $user->setGender($student["gender"]);
          $user->setBirthdate($student["birthDate"]);
          $user->setPhonenumber($student["phoneNumber"]);
          return $user;
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
