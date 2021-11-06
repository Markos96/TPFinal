<?php

namespace Controllers;

use Controllers\ViewController as ViewController;
use DAO\EnterpriseDAO as EnterpriseDAO;
use Exception;
use Models\Alert as Alert;
use Models\Enterprise as Enterprise;
use Models\Session as Session;

class EnterpriseController
{

  private $enterpriseDAO;
  public $alert;

  public $eId          = "";
  public $eName        = "";
  public $eDescription = "";

  public function __construct()
  {
    $this->enterpriseDAO = new EnterpriseDAO();
    $this->alert         = new Alert();
  }

  public function index()
  {
    ViewController::showView(null, 'enterprises', $this->enterpriseDAO->GetAll());
  }

  public function create() {
    ViewController::showView(null, 'form-enterprise', null, null);
  }

  public function update($id) {
    ViewController::showView(null, 'form-enterprise', null, $this->enterpriseDAO->getByIdDB($id));
  }

  public function description($id = "")
  {
    if (Session::isActive()) {
      $this->showOnlyEnterprise($id);
    } else {
      $this->relocationHome();
    }
  }

  public function add($id, $firstName, $description, $active)
  {

    $enterprise = new Enterprise();
    $enterprise->setFirstName($firstName);
    $enterprise->setDescription($description);
    $enterprise->setIsActive( $active != "" ? $active : true);

    try {

      if ($id == null) {
        
        $this->EnterpriseDAO->AddDb($enterprise);
      } else {
        $enterprise->setId($id);
        $this->EnterpriseDAO->updateEnterprise( $enterprise );

      }
    } catch (Exception $ex) {

      $this->alert->setType("danger");
      $this->alert->setMessage($ex->getMessage("Error al crear la empresa."));
    } finally {
      $this->relocationEnterprise();
    }
  }


  /*public function update( $id = "" ) {
    if ( Session::isActive() ) {
      $this->showUpdateEnterprise( $this->EnterpriseDAO->getById( $id ) );
    } else {
      $this->relocationHome();
    }

  }*/

  public function delete($id = "")
  {
    if (Session::isActive()) {
      $this->EnterpriseDAO->deleteEnterprise($id);
      $this->relocationEnterprise();
    } else {
      $this->relocationHome();
    }
  }

  public function alta($id = "")
  {
    if (Session::isActive()) {
      $this->EnterpriseDAO->altaEnterprise($id);
      $this->relocationEnterprise();
    } else {
      $this->relocationHome();
    }
  }


  public function deleteDB($id = "")
  {
    if (Session::isActive()) {
      $this->EnterpriseDAO->deleteEnterprise($id);
      $this->relocationEnterprise();
    } else {
      $this->relocationHome();
    }
  }

  public function showNavbar($user = "")
  {
    require_once VIEWS_PATH . 'navbar.php';
  }

  public function showEnterprises($user, $enterprises = "")
  {
    require_once VIEWS_PATH . 'enterprises.php';
  }

  public function showFormEnterprise($enterprise = "")
  {
    require_once VIEWS_PATH . 'form-enterprise.php';
  }

  public function showAddEnterprise()
  {
    require_once VIEWS_PATH . 'add-enterprises.php';
  }

  public function showMoreInfo($enterprise = "")
  {
    require_once VIEWS_PATH . 'only-enterprise.php';
  }

  public function showIndex()
  {
    $this->showNavbar(Session::getCurrentUser());
    $this->showEnterprises(Session::getCurrentUser(), $this->EnterpriseDAO->GetAll());
  }

  public function showOnlyEnterprise($id = "")
  {
    $this->showNavbar(Session::getCurrentUser());
    $this->showMoreInfo($this->EnterpriseDAO->getByIdDB($id));
  }

  public function showCreateEnterprise()
  {
    $this->showNavbar(Session::getCurrentUser());
    $this->showFormEnterprise(null);
  }

  public function showUpdateEnterprise($enterprise = "")
  {
    $this->showNavbar(Session::getCurrentUser());
    $this->showFormEnterprise($enterprise);
  }

  private function relocationHome()
  {
    header("Location:" . FRONT_ROOT);
  }

  private function relocationEnterprise()
  {
    header("Location: " . FRONT_ROOT . "enterprise");
  }
}
