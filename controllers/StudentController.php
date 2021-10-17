<?php

namespace Controllers;

use DAO\StudentDAO as StudentDAO;
use Models\Session as Session;

class StudentController
{

  private $studentDao;

  public function __construct()
  {
    $this->studentDao = new StudentDAO();
  }

  public function index( $error = "" ) {
    if ( Session::isActive() ) {
      $this->home();
    } else {
      $this->showLogin( $error );
    }
  }

  public function login($email)
  {
    $error = $this->emailIsValid($email);

    if (!isset($error)) {
      $student = $this->studentDao->getByEmail($email);

      if ( $student ) {
        Session::setCurrentUser( $student );
        header( 'Location:' . FRONT_ROOT . 'student/home' );
      } else {
        $error = 'Usuario incorrecto, verifique su email';
        $this->index($error);
      }
    } else $this->index($error);
  }

  public function logout() {
    Session::closeSession();
    $this->relocationHome();
  }

  public function showNavbar( $student ) {
    require_once VIEWS_PATH . 'navbar.php';
  }

  public function showPrincipalPage()
  {
    require_once VIEWS_PATH . 'principalPage.php';
  }

  public function showLogin($error = "")
  {
    require_once VIEWS_PATH . 'home.php';
  }

  public function showPersonalProfile( $student ) {
    require_once VIEWS_PATH . 'perfil.php';
  }

  public function home() {
    $this->showNavbar( Session::getCurrentUser() );
    $this->showPrincipalPage();
  }

  public function perfil() {
    $this->showNavbar( Session::getCurrentUser() );
    $this->showPersonalProfile( Session::getCurrentUser() );
  }

  private function relocationHome () {
    header("Location: " . FRONT_ROOT);
  }

  private function emailIsValid( $email ) {

    if (trim($email) === "") {
      return 'El campo no puede quedar vacio';
    } else if(!preg_match("/^(([^<>()\[\]\\.,;:\s@”]+(\.[^<>()\[\]\\.,;:\s@”]+)*)|(“.+”))@((\[[0–9]{1,3}\.[0–9]{1,3}\.[0–9]{1,3}\.[0–9]{1,3}])|(([a-zA-Z\-0–9]+\.)+[a-zA-Z]{2,}))$/", $email)) {
      return "Ingrese un email valido";
    }

  }
}
