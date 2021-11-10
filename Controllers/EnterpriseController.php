<?php namespace Controllers;

use Controllers\ViewController as ViewController;
use DAO\EnterpriseDAO as EnterpriseDAO;
use Exception;
use Models\Alert as Alert;
use Models\Enterprise as Enterprise;

class EnterpriseController
{

  private $enterpriseDAO;

  public function __construct()
  {
    $this->enterpriseDAO = new EnterpriseDAO();
    $this->alert         = new Alert();
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

  private function relocationEnterprise()
  {
    header("Location: " . FRONT_ROOT . "enterprise");
  }
}
