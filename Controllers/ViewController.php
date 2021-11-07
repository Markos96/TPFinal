<?php
namespace Controllers;

use Models\Alert as Alert;
use Models\User as User;
use Models\Session as Session;

class ViewController
{

    static $header = VIEWS_PATH . 'header.php';
    static $footer = VIEWS_PATH . 'footer.php';

    static function showView(Alert $alert = null, $view, $list = array(), $model = null)
    {
        require_once self::$header;
        $user = null;
        $enterprises = $list;
        $alertPass = $alert;
        $jobs = $list;

        if (Session::isActive()) {
            if ($view !== 'login'){
                $user = Session::getCurrentUser();
                require_once VIEWS_PATH . 'navbar.php';
            }

/*             switch ($view) {
                case "enterprises":
                    $enterprises = $list;
                    break;
                case "form-enterprise":
                    $enterprise = $model;
                    break;
                case "perfil":
                    $alertPass = $alert;
                    break;
                case "jobs":

                    break;
            }  */

            require_once VIEWS_PATH . $view . '.php';

        } else require_once VIEWS_PATH . 'login.php';

        require_once self::$footer;
    }
}
