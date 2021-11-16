<?php

namespace Controllers;

use Controllers\ViewController;
use DAO\CareerDAO;
use DAO\EnterpriseDAO;
use DAO\JobOfferDAO;
use DAO\JobPositionDAO;
use DAO\UserDAO;
use Exception;
use Models\Alert;
use Models\Enterprise;
use Models\Session;
use Models\JobOffer;

class EnterpriseController
{

  private $enterpriseDAO;
  private $jobOfferDAO;
  private $careerDAO;
  private $jobPositionDAO;
  private $userDAO;

  public function __construct()
  {
    $this->enterpriseDAO = new EnterpriseDAO();
    $this->jobOfferDAO = new JobOfferDAO();
    $this->careerDAO = new CareerDAO();
    $this->jobPositionDAO = new JobPositionDAO();
    $this->userDAO = new UserDAO();
  }

  public function index(Alert $alert = null)
  {
    $enterprises = array();
    try {
      $enterprises = $this->enterpriseDAO->getAllActives();
      ViewController::showView(null, 'enterprises', $enterprises);
    } catch (Exception $ex) {
      $alert->setType("danger");
      $alert->setMessage($ex->getMessage());
      ViewController::showView($alert, 'enterprises', $enterprises);
    }
  }

  public function inactives(Alert $alert = null) {
    $enterprises = array();
    try {
      $enterprises = $this->enterpriseDAO->getAllInactives();
      ViewController::showView(null, 'enterprises', $enterprises);

    } catch (Exception $ex)  {
      $alert->setType("danger");
      $alert->setMessage($ex->getMessage());
      ViewController::showView($alert, 'enterprises', $enterprises);
    }
  }

  public function create()
  {
    ViewController::showView(null, 'form-enterprise', null, null);
  }

  public function update($id)
  {
    $alert = new Alert();
    try {

      $enterprise = $this->enterpriseDAO->getById($id);
      if ($enterprise->getIdUser()) {
        $enterprise->setIdUser($this->userDAO->getById($enterprise->getIdUser()));
      }
      ViewController::showView(null, 'form-enterprise', null, $enterprise);
    } catch (Exception $ex) {
      $alert->setType("danger");
      $alert->setMessage($ex->getMessage());
      $this->index($alert);
    }
  }

  public function delete($id)
  {
    $this->enterpriseDAO->delete($this->enterpriseDAO->getById((int)$id));
    ViewController::showView(null, 'enterprises', $this->enterpriseDAO->getAllActives());
  }

  public function description($id)
  {
  
    // agregar validaciones para que los datos no vallan vacios a la base de datos

    $alert = new Alert();
    try {
      $enterprise = $this->enterpriseDAO->getById($id);
      if ($enterprise)
        ViewController::showView(null, 'only-enterprise', null, $enterprise);
    } catch (Exception $ex) {
      $alert->setType("danger");
      $alert->setMessage($ex->getMessage());
    }
  }

  public function add($id, $name, $cuit, $description, $active)
  {
    $alert = new Alert();
    $enterprise = new Enterprise();
    try {
      $this->verifyEmptyField($name);
      $this->verifyEmptyField($cuit);
      $this->verifyEmptyField($description);

      if($this->enterpriseDAO->getByCuit($cuit))
        throw new Exception(ENTERPRISE_EXIST);

      $enterprise->setName($name);
      $enterprise->setCuit($cuit);
      $enterprise->setDescription($description);
      $enterprise->setActive($active != "" ? $active : true);

      $alert->setType("success");

      if ($id == null) {
        $alert->setMessage(ENTERPRISE_CREATE);
        $this->enterpriseDAO->save($enterprise);
      } else {
        $alert->setMessage(ENTERPRISE_UPDATE);
        $enterprise->setId($id);
        $this->enterpriseDAO->update($enterprise);
      }

      ViewController::showView($alert, 'form-enterprise');
    } catch (Exception $ex) {

      $this->alert->setType("danger");
      $this->alert->setMessage($ex->getMessage("Error al crear la empresa."));
    } 
  }

  public function getInfo()
  {
    $alert = new Alert();
    $user = Session::getCurrentUser();
    try {
      Session::setCurrentInfoUser($this->enterpriseDAO->getInfo($user->getId()));
      $this->relocationPrincipalPage();
    } catch (Exception $ex) {
      $alert->setType("danger");
      $alert->setMessage($ex->getMessage());
      ViewController::showView($alert, 'login');
    }
  }

  public function jobs($id)
  {
    $alert = new Alert();
    $jobs = array();
    try {
      $jobs = $this->jobOfferDAO->getJobsByEnterpriseId($id);
      foreach ($jobs as $job) {

        $job->setEnterprise($this->enterpriseDAO->getById($id));

        //$job->setEnterprise(Session::getCurrentInfoUser());
        $job->setEnterprise($this->enterpriseDAO->getById($job->getEnterprise()));
        $job->setCareer($this->careerDAO->getById($job->getCareer()));
        $job->setJobPosition($this->jobPositionDAO->getById($job->getJobPosition()));
      }
      ViewController::showView(null, 'jobs', $jobs);
    } catch (Exception $ex) {
      $alert->setType("danger");
      $alert->setMessage($ex->getMessage());
      ViewController::showView($alert, 'principal_page');
    }
  }

  public function job_delete($id)
  {
    $alert = new Alert();
    try {
      $job = $this->jobOfferDAO->getById($id);
      echo '<pre>';
      var_dump($job);
      if ($this->jobOfferDAO->delete($job)) {
        $job->setActive(!($job->getActive()));

        $this->jobOfferDAO->delete($job);
        ViewController::showView($alert, 'only-job', null, $job);
      }
    } catch (Exception $ex) {
      $alert->setType("danger");
      $alert->setMessage($ex->getMessage());
      var_dump($alert);
    }
  }

  // **************************** VALIDACIONES ****************************

  private function verifyEmptyField($field) {
    try {
      if(trim($field) == "")
        throw new Exception(EMPTY_FIELD);
    } catch (Exception $ex) {
      throw $ex;
    }
  }

  private function relocationPrincipalPage()
  {
    header("Location: " . FRONT_ROOT . "user/principal_page");
  }

  private function relocationEnterprise()
  {
    header("Location: " . FRONT_ROOT . "enterprise");
  }
}
