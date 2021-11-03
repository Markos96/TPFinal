<?php namespace Controllers;

use Models\Alert as Alert;
use Exception as Exception;
use Models\Session as Session;

class JobController {

    private $jobDAO;

    public function __construct()
    {
        
    }

    public function index (Alert $alert = null) {
        if( Session::isActive() ) {
            $this->showAllJobs();
        } else {
            $this->relocationUser();
        }
    }

    public function form() {
        $this->showFormCreateOrupdate();
    }


    /* ************************* VISTAS **************************/

    public function showNavbar($user) {
        require_once VIEWS_PATH . 'navbar.php';
    }

    public function showPrincipalPage() {
        require_once VIEWS_PATH . 'jobs.php';
    }

    public function showAllJobs() {
        $this->showNavbar( Session::getCurrentUser() );
        $this->showPrincipalPage();
    }

    public function showForm() {
        require_once VIEWS_PATH . 'form-job.php';
    }

    public function relocationUser() {
        header( "Location: " . FRONT_ROOT . "user" );
    }

    public function showFormCreateOrupdate() {
        $this->showNavbar(Session::getCurrentUser());
        $this->showForm();
    }
}
