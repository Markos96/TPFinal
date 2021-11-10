<?php

namespace Controllers;

use DAO\AdminDAO;
use Exception;
use Models\Session as Session;
use Models\Alert as Alert;
use Controllers\ViewController as ViewController;

class AdminController
{

    private $adminDAO;

    public function __construct()
    {
        $this->adminDAO = new AdminDAO();
    }

    public function getInfo()
    {
        $alert = new Alert();
        $user = Session::getCurrentUser();
        try {
            $admin = $this->adminDAO->getById($user->getId());
            Session::setCurrentInfoUser($admin);
          /*   echo '<pre>';
            var_dump(Session::getCurrentUser());
            echo '<br><br><br>';
            var_dump(Session::getCurrentInfoUser()); */
            $this->relocationAdmin();
        } catch (Exception $ex) {
            $alert->setType("danger");
            $alert->setMessage($ex->getMessage());
            ViewController::showView($alert, 'login');
        }
    }

    private function relocationAdmin() {
        header("Location: " . FRONT_ROOT . "user/principal_page");
    }
}
