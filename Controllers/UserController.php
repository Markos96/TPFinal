<?php

namespace Controllers;

use Models\User;
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
        ViewController::showView($alert, 'login');
    }

    public function principal_page()
    {
        ViewController::showView(null, 'principalPage');
    }

/*     public function add($id, $email, $password, $active = true, $rol = STUDENT)
    {
        $alert = new Alert();
        try {
            $user = new User($email, $password);

            if (!$this->userDao->getInfo($user))
                throw new Exception("El usuario ya existe");

            $user->setId($id);
            $user->setActive($active);
            $user->setRol($rol);
            $alert->setType("success");

            if ($id != "") {
                $user->setId($id);
                $alert->setMessage("Carrera modificada");
                ViewController::showView($alert, 'user-form', $this->userDao->update($user));
            } else {
                $alert->setMessage("Usuario agregado");
                $user->setPassword(password_hash($user->getPassword(), PASSWORD_DEFAULT));
                $this->userDao->save($user);
                ViewController::showView($alert, 'user-form', $this->userDao->getAll() /*$this->careerDAO->save($career));
            }
        } catch (Exception $ex) {
            $alert->setType("danger");
            $alert->setMessage($ex->getMessage());
            ViewController::showView($alert, 'user-form');
        }
    } */

    public function add($id = null, $email, $password, $active, $rol = STUDENT)
    {
        $alert = new Alert();
        try {
            $user = new User($email, $password);

            if (!$this->userDao->getInfo($user))
                throw new Exception("El usuario ya existe");

            $user->setId($id);
            $user->setActive(($active) ? $active : true);
            $user->setRol($rol);
            $alert->setType("success");

            if ($id) {
                $user->setId($id);
                $alert->setMessage("Carrera modificada");
                ViewController::showView($alert, 'user-form', $this->userDao->update($user));
            } else {
                $alert->setMessage("Usuario agregado");
                $user->setPassword(password_hash($user->getPassword(), PASSWORD_DEFAULT));
                $this->userDao->save($user);
                ViewController::showView($alert, 'user-form', $this->userDao->getAll() /*$this->careerDAO->save($career)*/);
            }
        } catch (Exception $ex) {
            $alert->setType("danger");
            $alert->setMessage($ex->getMessage());
            ViewController::showView($alert, 'user-form');
        }
    }
    public function login($email = "", $password = "")
    {
        $alert = new Alert();

        try {
            $this->verifyEmail($email);
            $this->verifyPassword($password);

            $user = new User($email, $password);
            $user = $this->userDao->getByEmail($email);

            if (!$user->getActive()) {
                throw new Exception("El usuario esta dado de baja contacte con un administrador");
            }
            if (!password_verify($password, $user->getPassword())) {
                throw new Exception("Usuario y/o password incorrecto");
            }

            Session::setCurrentUser($user);
            $this->getInfo();
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

    public function description($id)
    {
        $alert = new Alert();
        try {
            $user = $this->userDao->getById($id);

            if ($user) {
                ViewController::showView(null, 'perfil', null, $user);
            }
        } catch (Exception $ex) {
            $alert->setType("danger");
            $alert->setMessage($ex->getMessage());
            ViewController::showView($alert, 'users', $this->userDao->getAll());
        }
    }

    public function changepassword($passwordact, $passwordnew, $passwordrep)
    {
        $alert = new Alert();
        $user = Session::getCurrentUser();
        try {
            $this->verifyEmptyField($passwordact);

            if (!password_verify($passwordact, $user->getPassword()))
                throw new Exception("Tu password no coincide con el actual");

            $this->verifyEmptyField($passwordnew);
            $this->verifyEmptyField($passwordrep);

            if ($passwordnew !== $passwordrep)
                throw new Exception("Las contraseñas no coinciden");


            $user->setPassword(password_hash($passwordnew, PASSWORD_DEFAULT));

            $this->userDao->update($user);

            Session::setCurrentUser($user);
            $alert->setType("success");
            $alert->setMessage("Password cambiado correctamente");
        } catch (Exception $ex) {
            $alert->setType("danger");
            $alert->setMessage($ex->getMessage());
        } finally {
            $this->perfil($alert);
        }
    }

    public function create()
    {
        ViewController::showView(null, 'user-form');
    }

    public function all()
    {
        ViewController::showView(null, 'users', $this->userDao->getAll());
    }

    public function update($id)
    {
        $alert = new Alert();
        try {
            $user = $this->userDao->getById($id);
            if ($user) {
                ViewController::showView(null, 'user-form', null, $user);
            } else throw new Exception("Error al seleccionar la carrera");
        } catch (Exception $ex) {
            $alert->setType("danger");
            $alert->setMessage($ex->getMessage());
            ViewController::showView($alert, 'users', $this->userDao->getAll());
        }
    }

    public function delete($id)
    {
        $alert = new Alert();
        try {
            $user = $this->userDao->getById($id);
            if ($user) {
                $alert->setType("success");
                if ($user->getActive()) {
                    $alert->setMessage("El usuario se dio de baja");
                } else {
                    $alert->setMessage("El usuario se dio de alta");
                }
                $user->setActive(!($user->getActive()));
                if ($this->userDao->delete($user)) {
                    ViewController::showView($alert, 'users', $this->userDao->getAll());
                }
            } else throw new Exception("El registro que quiere eliminar no existe");
        } catch (Exception $ex) {
            $alert->setType("danger");
            $alert->setMessage($ex->getMessage());
            ViewController::showView($alert, 'users', $this->userDao->getAll());
        }
    }

    private function getInfo()
    {
        $user = Session::getCurrentUser();

        switch ($user->getRol()) {
            case ADMIN:
                header("Location: " . FRONT_ROOT . "admin/getInfo");
                break;
            case STUDENT:
                header("Location: " . FRONT_ROOT . "student/getInfo");
                break;
            case ENTERPRISE:
                header("Location: " . FRONT_ROOT . "enterprise/getInfo");
                break;
        }
    }

    // ****************************** VALIDACIONES ****************************** 

    private function verifyEmail($email)
    {

        try {
            if (trim($email) === "") {
                throw new Exception(EMPTY_FIELD);
            } else if (!preg_match("/^(([^<>()\[\]\\.,;:\s@”]+(\.[^<>()\[\]\\.,;:\s@”]+)*)|(“.+”))@((\[[0–9]{1,3}\.[0–9]{1,3}\.[0–9]{1,3}\.[0–9]{1,3}])|(([a-zA-Z\-0–9]+\.)+[a-zA-Z]{2,}))$/", $email)) {
                throw new Exception("Ingrese un email valido");
            }
        } catch (Exception $ex) {
            throw $ex;
        }
        return true;
    }

    private function verifyPassword($password)
    {
        try {

            if (trim($password) === "") {
                throw new Exception("El campo password no puede quedar vacio");
            }
        } catch (Exception $ex) {
            throw $ex;
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
