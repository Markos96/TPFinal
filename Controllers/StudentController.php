<?php

namespace Controllers;

use DAO\StudentDAO;
use Exception;
use Models\Alert;
use Models\Session;
use Models\User;

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
      Session::setCurrentInfoUser($this->studentDao->getInfo($user));
      var_dump(Session::getCurrentInfoUser());
      $this->relocationPrincipalPage();
    } catch(Exception $ex) {
      $alert->setType("danger");
      $alert->setMessage($ex->getMessage());
      ViewController::showView($alert, 'login');
    }
  }

  private function relocationPrincipalPage()
  {
    header("Location: " . FRONT_ROOT . "user/principal_page");
  }
}
