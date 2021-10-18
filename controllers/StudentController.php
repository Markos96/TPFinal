<?php

namespace Controllers;

use DAO\StudentDAO as StudentDAO;
use Models\Session as Session;
use Models\Alert as Alert;
use Exception;


class StudentController
{

  private $studentDao;

  public function __construct()
  {
    $this->studentDao = new StudentDAO();
  }

  public function index(Alert $alert=null)
      
      {

   // $alert = new Alert("", "");

    try{

    if ( Session::isActive() ) {
      $this->home();
    }
    }catch(Exception $ex){ 
      
      $alert->setType("danger");
      $alert->setMessage($ex->getMessage());
        
    }finally{
      $this->showLogin($alert);
    }

  }

  public function login($email)
  {

    $alert = new Alert("", "");

    try{

    $validarEmail = $this->emailIsValid($email);



    if (!isset($validarEmail)) {
      $student = $this->studentDao->getByEmail($email);

      if ( $student ) {
        Session::setCurrentUser( $student );
        header( 'Location:' . FRONT_ROOT . 'student/home' );

      }
    }
  }catch(Exception $ex){
     // $this->index($ex);
  }
     
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

  public function showLogin(Alert $alert = null)
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

  private function emailIsValid($email) {

    $alert = new Alert("","");

    try{
    if (trim($email) === "") {
     // $alert = new Alert("danger","Hola");
      //$alert->setType();
      //$alert->setMessage();

      throw new Exception("El campo no puede quedar vacio");
     // return 'El campo no puede quedar vacio';
    } else if(!preg_match("/^(([^<>()\[\]\\.,;:\s@”]+(\.[^<>()\[\]\\.,;:\s@”]+)*)|(“.+”))@((\[[0–9]{1,3}\.[0–9]{1,3}\.[0–9]{1,3}\.[0–9]{1,3}])|(([a-zA-Z\-0–9]+\.)+[a-zA-Z]{2,}))$/", $email)) {
      //throw new Exception("Chau");
      throw new Exception("Ingrese un email valido"); 
     // return "Ingrese un email valido";
    }
    }catch(Exception $ex){
      $alert->setType("danger");
      $alert->setMessage($ex->getMessage());
       $this->index($alert);
    }

  }
}
