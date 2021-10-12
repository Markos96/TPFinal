<?php

namespace Controllers;

use DAO\StudentDAO as StudentDAO;

class StudentController
{

  private $studentDao;

  public function __construct()
  {
    $this->studentDao = new StudentDAO();
  }

  public function index($error = "") {
    if(isset($_SESSION['loggedUser'])){
      require_once VIEWS_PATH . 'navbar.php';
      $this->showPrincipalPage();
    }
    else
      $this->showLogin($error);
  }

  public function login($email)
  {
    $error = $this->emailIsValid($email);
    if (!isset($error)) {
      $student = $this->studentDao->getByEmail($email);

      if($student) {
        $_SESSION['loggedUser'] = $student;
        $_SESSION["last_login_timestamp"] = time();
        header('Location:' . FRONT_ROOT);
      } else {
        $error = 'Usuario incorrecto, verifique su email';
        $this->index($error);
      }
    } else $this->index($error);
  }

  public function logout()
  {
    session_unset();
    session_destroy();
    header('Location:' . FRONT_ROOT);
  }

  public function showPrincipalPage()
  {
    require_once VIEWS_PATH . 'principalPage.php';
  }

  public function showLogin($error = "")
  {
    require_once VIEWS_PATH . 'home.php';
  }

  public function cuenta() {
    require_once VIEWS_PATH . 'perfil.php';
  }

  private function emailIsValid($email)
  {

    if (trim($email) === "") {
      return 'El campo no puede quedar vacio';
    } else if(!preg_match("/^(([^<>()\[\]\\.,;:\s@”]+(\.[^<>()\[\]\\.,;:\s@”]+)*)|(“.+”))@((\[[0–9]{1,3}\.[0–9]{1,3}\.[0–9]{1,3}\.[0–9]{1,3}])|(([a-zA-Z\-0–9]+\.)+[a-zA-Z]{2,}))$/", $email)) {
      return "Ingrese un email valido";
    }

  }
}
