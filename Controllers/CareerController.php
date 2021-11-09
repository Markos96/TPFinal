<?php

namespace Controllers;

use DAO\CareerDAO;
use Exception;
use Models\Alert;
use Controllers\ViewController;
use Models\Career;

class CareerController
{

    private $careerDAO;

    public function __construct()
    {
        $this->careerDAO = new CareerDAO();
    }

    public function index()
    {
        $alert = new Alert();
        try {
            ViewController::showView(null, 'careers', $this->careerDAO->getAll());
        } catch (Exception $ex) {
            $alert->setType("danger");
            $alert->setMessage($ex->getMessage());
            ViewController::showView($alert, 'careers');
        }
    }

    public function create()
    {
        ViewController::showView(null, 'career-form');
    }

    public function update($id)
    {
        $alert = new Alert();
        try {
            $career = $this->careerDAO->getById($id);
            if ($career) {
                ViewController::showView(null, 'career-form', null, $career);
            } else throw new Exception("Error al seleccionar la carrera");
        } catch (Exception $ex) {
            $alert->setType("danger");
            $alert->setMessage($ex->getMessage());
            ViewController::showView($alert, 'careers', $this->careerDAO->getAll());
        }
    }

    public function delete($id)
    {
        $alert = new Alert();
        try {
            $career = $this->careerDAO->getById($id);
            if($career) {
                $alert->setType("success");
                if($career->getActive()) {
                    $alert->setMessage("La carrera se dio de baja");
                } else {
                    $alert->setMessage("La carrera se dio de alta");
                }
                $career->setActive(!($career->getActive()));
                if($this->careerDAO->delete($career)){
                    ViewController::showView($alert, 'careers', $this->careerDAO->getAll());
                }
            } else throw new Exception("El registro que quiere eliminar no existe");
        } catch (Exception $ex) {
            $alert->setType("danger");
            $alert->setMessage($ex->getMessage());
            ViewController::showView($alert, 'careers', $this->careerDAO->getAll());
        }
    }

    public function add($id, $name, $active)
    {
        $alert = new Alert();
        try {

            if ($this->verifyEmptyField($name)) {
                $career = new Career($name, (($active) ? $active : true));
                $alert->setType("success");
                if ($this->careerDAO->getInfo($career)) {
                    echo $id;
                    if ($id) {
                        $career->setId((int)$id);
                        $alert->setMessage("Carrera modificada");
                        ViewController::showView($alert, 'career-form', $this->careerDAO->update($career));
                    } else {
                        $alert->setMessage("Carrera agregada");
                    ViewController::showView($alert, 'career-form' /*$this->careerDAO->save($career)*/);
                    }
                } else throw new Exception("La carrera que quiere agregar ya existe");
            }
        } catch (Exception $ex) {
            $alert->setType("danger");
            $alert->setMessage($ex->getMessage());
        } finally {
            ViewController::showView($alert, 'career-form');
        }
    }

    //****************************** VALIDACIONES ******************************

    private function verifyEmptyField($field)
    {
        try {
            if (trim($field) == null)
                throw new Exception("El campo es obligatorio");

            return true;
        } catch (Exception $ex) {
            throw $ex;
        }
    }
}
