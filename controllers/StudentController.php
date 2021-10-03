<?php namespace Controllers;

  use DAO\StudentDAO as StudentDAO;

  class StudentController {

    private $studentDao;
    private $errors = '';
    private $student;

    public function __construct()
    {
      $this->studentDao = new StudentDAO(); 
    }

    public function login($email){
      if ($this->emailIsValid($email)) {

        if(!$this->student) 
          $this->student = $this->studentDao->getByEmail($email);

        if($this->student) {
          $_SESSION['loggedUser'] = $this->student;
          $this->showPrincipalPage();
        } else {
          $this->errors = 'Usuario incorrecto, verifique su email';
          $this->showHomePage();
        }

      }  
      else {
        $this->showHomePage();
      }

      
    }

    public function showPrincipalPage() {
      require_once VIEWS_PATH . 'principalPage.php';
    }

    private function showHomePage() {
      require_once VIEWS_PATH . 'home.php';
    }

    private function emailIsValid ($email) {
      if(trim($email) === '') {
        $this->errors = 'El campo no puede quedar vacio';
        return false; 
      } else if(!filter_var($email, FILTER_SANITIZE_EMAIL)) {
        $this->errors = 'Ingrese un email valido';
        return false;
      }

      return true;
    }
  }