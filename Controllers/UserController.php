<?php namespace Controllers;

use Models\User as User;
use DAO\UserDAO as UserDAO;
use \Exception as Exception;
use Models\Alert as Alert;
use Models\Session as Session;

use Controllers\ViewController as ViewController;

class UserController
{

    private $userDao;

    public function __construct()
    {
        $this->userDao = new UserDAO();
    }

    public function index(Alert $alert = null)
    {
        if ($alert == null) {
            ViewController::showView(null, 'principalPage');
        } else {
            ViewController::showView($alert, 'login');
        }
    }

    public function login($email = "", $password = "")
    {
        $alert = new Alert();

        try {
            if ($this->verifyEmail($email) && $this->verifyPassword($password)) {
                $user = new User($email, $password);
                $user = $this->userDao->getInfo($user);
                Session::setCurrentUser($user);
                $this->getInfo($user);
            }
        } catch (Exception $ex) {
            $alert->setType("danger");
            $alert->setMessage($ex->getMessage());
            ViewController::showView($alert, 'login');
        }
    }

    public function logout()
    {
        Session::closeSession();
        ViewController::showView(null, 'login');
    }

    public function perfil(Alert $alertPass = null)
    {
        ViewController::showView($alertPass, 'perfil');
    }

    public function changepassword($passwordact, $passwordnew, $passwordrep)
    {
        $alert = new Alert();

        try {

            if ($this->verifyEmptyField($passwordact) && $this->verifyEmptyField($passwordnew) && $this->verifyEmptyField($passwordrep)) {
                $user = Session::getCurrentUser();

                if(!password_verify($passwordact, $user->getPassword())) 
                    throw new Exception("Contraseña incorrecta");

                if($passwordnew != $passwordrep)
                    throw new Exception("Las contraseñas no coinciden");

                $user->setPassword(password_hash($passwordnew, PASSWORD_DEFAULT));

                if($this->userDao->update($user)){
                    Session::setCurrentUser($user);
                    $alert->setType("success");
                    $alert->setMessage("Password cambiado correctamente");
                }
            }

        } catch (Exception $ex) {
            $alert->setType("danger");
            $alert->setMessage($ex->getMessage());
        } finally {
            $this->perfil($alert);
        }
    }

    public function all()
    {
        if (Session::isActive()) {
        } else {
            $this->index();
        }
    }

    private function getInfo($user) {
        switch ($user->getRol()) {
            case ADMIN:
                header("Location: " . FRONT_ROOT . "admin/getInfo");
                break;
            case STUDENT:
                header("Location: " . FRONT_ROOT . "student/getInfo");
                break;
            case ENTERPRISE:
                break;
            default:
                # code...
                break;
        }
    }

    // ****************************** VALIDACIONES ****************************** 

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

    private function verifyEmptyField($field, $message = "")
    {
        try {
            if (trim($field) === "") {
                throw new Exception("Campo " . $message . " obligatorio");
            }
            return true;
        } catch (Exception $ex) {
            throw $ex;
        }
    }

}
