<?php

namespace Controllers;

use DAO\StudentDAO as StudentDAO;
use Exception;
use Models\Alert as Alert;
use Models\Session as Session;

class StudentController
{

  private $studentDao;

  public function __construct()
  {
    $this->studentDao = new StudentDAO();
  }

  public function getInfo() {
    $alert = new Alert();
    $user = Session::getCurrentUser();
    try {
      Session::setCurrentUser($this->studentDao->getInfo($user));
      $this->relocationPrincipalPage();
    } catch(Exception $ex) {
      $alert->setType("danger");
      $alert->setMessage($ex->getMessage());
    }
  }

  private function relocationPrincipalPage()
  {
    header("Location: " . FRONT_ROOT . "user");
  }
}
