<?php namespace Controllers;

use Controllers\ViewController;
use DAO\CareerDAO;
use DAO\EnterpriseDAO;
use DAO\JobOfferDAO;
use DAO\JobPositionDAO;
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

  public function __construct()
  {
    $this->enterpriseDAO = new EnterpriseDAO();
    $this->jobOfferDAO = new JobOfferDAO();
    $this->careerDAO = new CareerDAO();
    $this->jobPositionDAO = new JobPositionDAO();
  }

  public function index()
  {
    ViewController::showView(null, 'enterprises', $this->enterpriseDAO->getAllActives());
  }

  public function create() {
    ViewController::showView(null, 'form-enterprise', null, null);
  }

  public function update($id) {
    ViewController::showView(null, 'form-enterprise', null, $this->enterpriseDAO->getById($id));
  }

  public function delete($id) {
    $this->enterpriseDAO->delete($this->enterpriseDAO->getById((int)$id));
    ViewController::showView(null, 'enterprises', $this->enterpriseDAO->getAllActives());
  }

  public function description($id) {
    $alert = new Alert();
    try {
      $enterprise = $this->enterpriseDAO->getById($id);
      if($enterprise)
        ViewController::showView(null, 'only-enterprise', null, $enterprise);
    } catch (Exception $ex) {
      $alert->setType("danger");
      $alert->setMessage($ex->getMessage());
    }
  }

  public function add($id, $firstName, $description, $active)
  {

    // agregar validaciones para que los datos no vallan vacios a la base de datos
    $enterprise = new Enterprise();
    $enterprise->setName($firstName);
    $enterprise->setDescription($description);
    $enterprise->setActive( $active != "" ? $active : true);

    try {

      if ($id == null) {
        // Agregar una validacion si la empresa existe por cuil puede ser.
        $this->enterpriseDAO->save($enterprise);
      } else {
        $enterprise->setId($id);
        $this->enterpriseDAO->update( $enterprise );
      }
    } catch (Exception $ex) {

      $this->alert->setType("danger");
      $this->alert->setMessage($ex->getMessage("Error al crear la empresa."));
    } finally {
      $this->relocationEnterprise();
    }
  }

  public function getInfo() {
    $alert = new Alert();
    $user = Session::getCurrentUser();
    try {
      Session::setCurrentInfoUser($this->enterpriseDAO->getInfo($user->getId()));
      $this->relocationPrincipalPage();
    } catch(Exception $ex) {
      $alert->setType("danger");
      $alert->setMessage($ex->getMessage());
      ViewController::showView($alert, 'login');
    }
  }

  public function jobs($id){
    $alert = new Alert();
    $jobs = array();
    try {
      $jobs = $this->jobOfferDAO->getJobsByEnterpriseId($id);
      foreach ($jobs as $job) {
        $job->setEnterprise(Session::getCurrentInfoUser());
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

  public function job_delete($id){
    $alert = new Alert();
    try {
      $job = $this->jobOfferDAO->getById($id);
      echo '<pre>';
      var_dump($job);
      if($this->jobOfferDAO->delete($job)){
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

  private function relocationPrincipalPage()
  {
    header("Location: " . FRONT_ROOT . "user/principal_page");
  }

  private function relocationEnterprise()
  {
    header("Location: " . FRONT_ROOT . "enterprise");
  }
}
