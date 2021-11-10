<?php
namespace Controllers;

use Models\Alert;
use Models\Session;

class ViewController
{

    static $header = VIEWS_PATH . 'header.php';
    static $footer = VIEWS_PATH . 'footer.php';

    static function showView(Alert $alert = null, $view, $list = array(), $model = null)
    {
        require_once self::$header;
        //$user = $model;
        $users = $list;
        $enterprises = $list;
        $alertPass = $alert;
        $jobs = $list;
        $careers = $list;
        $career = $model;
        $job = $model;

        if (Session::isActive()) {
            if ($view !== 'login'){
                $user = Session::getCurrentUser();
                $info = Session::getCurrentInfoUser();
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
