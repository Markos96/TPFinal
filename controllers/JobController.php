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

    public function relocationUser() {
        header( "Location: " . FRONT_ROOT . "user" );
    }
}
