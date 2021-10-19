<?php

namespace Controllers;

use DAO\EnterpriseDAO as EnterpriseDAO;
use Models\Enterprise as Enterprise;
use Models\Session as Session;
use Models\Alert as Alert;

class EnterpriseController
{

  private $EnterpriseDAO;
  private $alert;

  public $eId = "";
  public $eName = "";
  public $eDescription = "";

  public function __construct()
  {
    $this->EnterpriseDAO = new EnterpriseDAO();
    $this->alert = new Alert();
  }

  public function index() {

    if ( Session::isActive() ) {
      $this->showIndex();
    } else {
      $this->relocationHome();
    }
  }

  public function description( $id = "" ) {
    if ( Session::isActive() ) {
      $this->showOnlyEnterprise( $id );
    } else {
      $this->relocationHome();
    }
  }

  public function add( $id, $firstName, $description ) {

    // falta validacion de datos.....
    $this->alert->setType("");
    $this->alert->setMessage("");

    $enterprise = new Enterprise();
    $enterprise->setFirstName( $firstName );
    $enterprise->setDescription( $description );
    $enterprise->setIsActive( true );

    try{

    if ( $id == null ) {
      $enterprise->setId( strval( time() ) );
      $this->EnterpriseDAO->add( $enterprise );
    } else {
      $enterprise->setId( $id );
      $this->EnterpriseDAO->update( $enterprise );
    }
    $this->alert->setType("success");
    $this->alert->setMessage("Empresa creada exitosamente.");
  }catch(Exception $ex){

    $alert->setType("danger");
    $alert->setMessage($ex->getMessage("Error al crear la empresa."));

  }finally{
    $this->relocationEnterprise();
    //$this->index($alert);
    }
   // header( "Location:" . FRONT_ROOT . "enterprise" );
  }

  public function create() {

    if ( Session::isActive() ) {

      $this->showCreateEnterprise();
    } else {
      $this->relocationHome();
    }

  }

  public function update( $id = "" ) {
    if ( Session::isActive() ) {
      $this->showUpdateEnterprise( $this->EnterpriseDAO->getById( $id ) );
    } else {
      $this->relocationHome();
    }

  }

  public function delete( $id = "" ) {
    if ( Session::isActive() ) {
      $this->EnterpriseDAO->deleteEnterprise( $id );
      $this->relocationEnterprise();
    } else {
      $this->relocationHome();
    }

  }

  public function showNavbar( $student = "" ) {
    require_once VIEWS_PATH . 'navbar.php';
  }

  public function showEnterprises( $student = "", $enterprises = "") {
    require_once VIEWS_PATH . 'enterprises.php';
  }

  public function showFormEnterprise( $enterprise = "" ) {
    require_once VIEWS_PATH . 'form-enterprise.php';
  }

  public function showAddEnterprise() {
    require_once VIEWS_PATH . 'add-enterprises.php';
  }

  public function showMoreInfo( $enterprise = "" ) {
    require_once VIEWS_PATH . 'only-enterprise.php';
  }

  public function showIndex() {
    $this->showNavbar( Session::getCurrentUser() );
    $this->showEnterprises( Session::getCurrentUser(), $this->EnterpriseDAO->GetAll());
  }

  public function showOnlyEnterprise( $id = "" ) {
    $this->showNavbar( Session::getCurrentUser() );
    $this->showMoreInfo( $this->EnterpriseDAO->getById( $id ) );
  }

  public function showCreateEnterprise() {
    $this->showNavbar( Session::getCurrentUser() );
    $this->showFormEnterprise( null );
  }

  public function showUpdateEnterprise( $enterprise = "" ) {
    $this->showNavbar( Session::getCurrentUser() );
    $this->showFormEnterprise( $enterprise );
  }

  public function getDAO()
  {
    return $this->EnterpriseDAO;
  }

  private function relocationHome() {
    header( "Location:" . FRONT_ROOT );
  }

  private function relocationEnterprise() {
    header( "Location: " . FRONT_ROOT . "enterprise" );
  }
}
