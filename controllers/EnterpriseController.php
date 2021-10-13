<?php

namespace Controllers;

use Models\Enterprise as Enterprise;
use DAO\EnterpriseDAO as EnterpriseDAO;
use Models\Student as Student;

class EnterpriseController
{

  private $EnterpriseDAO;
  private $listEnterprises = array();
  private $pagination = array();

  public $eId = "";
  public $eName = "";
  public $eDescription = "";

  public function __construct()
  {
    $this->EnterpriseDAO = new EnterpriseDAO;
  }

  public function add($id, $firstName, $description)
  {
    $empresa = new Enterprise();
    $empresa->setFirstName($firstName);
    $empresa->setDescription($description);
    $empresa->setIsActive(true);

    if ($id == null) {
      $id = strval(time());
      $empresa->setId($id);
      $this->EnterpriseDAO->add($empresa);
    } else {
      $empresa->setId($id); 
      $this->EnterpriseDAO->update($empresa);
    }
    //$this->index();
    header("Location:" . FRONT_ROOT . "enterprise");
  }

  public function create($id = "", $name = "", $description = "")
  {
    $this->eId = $id;
    $this->eName = $name;
    $this->eDescription = $description;

    $this->showCreateEnterprise();
  }

  public function index($page = 0, $name = "")
  {

    if ($page != 0) $page -= 1;

    //if($this->listEnterprises == null) 
    $this->listEnterprises = $this->EnterpriseDAO->pagination($name);

    if ($this->listEnterprises != null)
      $this->pagination = $this->listEnterprises[$page];

    $this->showEnterprises();
  }

  public function delete($id) {
    $this->EnterpriseDAO->deleteEnterprise($id);
    header("Location:" . FRONT_ROOT . "enterprise");
  }

  public function getEnterprise ($id = "") {
    $e = $this->EnterpriseDAO->getById(strval($id));
    $this->showOnlyEnterprise($e);
  }

  public function showEnterprises()
  {
    require_once VIEWS_PATH . 'navbar.php';
    require_once VIEWS_PATH . 'enterprises.php';
  }

  public function showAddEnterprise()
  {
    require_once VIEWS_PATH . 'add-enterprises.php';
  }

  public function showCreateEnterprise()
  {
    require_once VIEWS_PATH . 'navbar.php';
    require_once VIEWS_PATH . 'create-enterprise.php';
  }

  public function showOnlyEnterprise($empresa = "") {
    require_once VIEWS_PATH . 'only-enterprise.php';
  }

  public function getDAO()
  {
    return $this->EnterpriseDAO;
  }
}
