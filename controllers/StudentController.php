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

  public function index(Alert $alert = null)
  {

    if (Session::isActive()) {
      $this->home(Session::getCurrentUser());
    } else {
      $this->showLogin($alert);
    }
  }

  public function showNavbar($user)
  {
    require_once VIEWS_PATH . 'navbar.php';
  }

  public function showPrincipalPage($user)
  {
    require_once VIEWS_PATH . 'principalPage.php';
  }

  public function showLogin(Alert $alert = null)
  {
    require_once VIEWS_PATH . 'home.php';
  }

  public function showPersonalProfile($student)
  {
    require_once VIEWS_PATH . 'perfil.php';
  }

  public function home($user)
  {
    $this->showNavbar($user);
    $this->showPrincipalPage($user);
  }

  public function perfil()
  {
    if (Session::isActive()) {
      $this->showNavbar(Session::getCurrentUser());
      $this->showPersonalProfile(Session::getCurrentUser());
    } else
      $this->index();
  }

  private function relocationHome()
  {
    header("Location: " . FRONT_ROOT);
  }
}
