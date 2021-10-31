<?php

namespace Controllers;

use Models\User as User;
use DAO\UserDAO as UserDAO;
use \Exception as Exception;
use Models\Alert as Alert;
use Models\Session as Session;

class UserController
{

    private $userDao;

    public function __construct()
    {
        $this->userDao = new UserDAO();
    }

    public function index(Alert $alert = null)
    {

        if (Session::isActive()) {
            $this->home();
        } else {
            $this->showLogin($alert);
        }
    }

    public function login($email, $password)
    {
        $alert = new Alert();

        try {
            if ($this->verifyEmail($email) && $this->verifyPassword($password)) {
                $user = new User($email, $password,1);
                $user = $this->userDao->getByEmail($user);
                Session::setCurrentUser($user);
                $this->loginSuccess();
            }
        } catch (Exception $ex) {
            $alert->setType("danger");
            $alert->setMessage($ex->getMessage());
            $this->index($alert);
        }
    }

    public function logout () {
        Session::closeSession();
        $this->showLogin();
    }

    private function verifyEmail($email)
    {

        $alert = new Alert();

        try {
            if (trim($email) === "") {
                throw new Exception("El campo email no puede quedar vacio");
            } else if (!preg_match("/^(([^<>()\[\]\\.,;:\s@”]+(\.[^<>()\[\]\\.,;:\s@”]+)*)|(“.+”))@((\[[0–9]{1,3}\.[0–9]{1,3}\.[0–9]{1,3}\.[0–9]{1,3}])|(([a-zA-Z\-0–9]+\.)+[a-zA-Z]{2,}))$/", $email)) {
                throw new Exception("Ingrese un email valido");
            }
        } catch (Exception $ex) {
            $alert->setType("danger");
            $alert->setMessage($ex->getMessage());
            $this->index($alert);
        }
        return true;
    }

    private function verifyPassword($password)
    {
        $alert = new Alert();

        try {

            if (trim($password) === "") {
                throw new Exception("El campo password no puede quedar vacio");
            }
        } catch (Exception $ex) {
            $alert->setType("danger");
            $alert->setMessage($ex->getMessage());
            $this->index($alert);
        }

        return true;
    }


    // ****************************** VIEWS ****************************** 

    public function showLogin(Alert $alert = null)
    {
        require_once VIEWS_PATH . 'home.php';
    }

    public function home()
    {
        header("Location: " . FRONT_ROOT . 'student');
    }

    public function loginSuccess() {
        header("Location: " . FRONT_ROOT . "student");
    }
}
