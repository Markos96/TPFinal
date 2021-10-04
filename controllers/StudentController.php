<?php

namespace Controllers;

use DAO\StudentDAO as StudentDAO;

class StudentController
{

  private $studentDao;
  private $errors = '';

  public function __construct()
  {
    $this->studentDao = new StudentDAO();
  }

  public function index() {
    if(isset($_SESSION['loggedUser']))
      $this->showPrincipalPage();
    else
      $this->showLogin();
  }

  public function login($email)
  {
    if ($this->emailIsValid($email)) {
      $student = $this->studentDao->getByEmail($email);

      if($student) {
        $_SESSION['loggedUser'] = $student;
        //header('Location:/tpfinal/student/index');
        header('Location:' . FRONT_ROOT);
      } else {
        $this->errors = 'Usuario incorrecto, verifique su email';
        $this->index();
      }
    } else $this->index();
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

  public function showLogin()
  {
    require_once VIEWS_PATH . 'home.php';
  }

  public function cuenta() {
    require_once VIEWS_PATH . 'perfil.php';
  }

  private function emailIsValid($email)
  {
    if (trim($email) === '') {
      $this->errors = 'El campo no puede quedar vacio';
      return false;
    } else if (!filter_var($email, FILTER_SANITIZE_EMAIL)) {
      $this->errors = 'Ingrese un email valido';
      return false;
    }

    return true;
  }
}
