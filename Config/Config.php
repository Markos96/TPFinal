<?php namespace Config;
  require_once 'Config/Generic_Messages.php';

  define('ROOT', dirname(__DIR__) . '/');

  define('fileName', dirname(__DIR__)."/Data/enterprise.json");

  define('FRONT_ROOT', "/TPFinal/");
  define('VIEWS_PATH', 'views/');

  define('CSS_PATH', FRONT_ROOT.VIEWS_PATH.'css/');
  define('JS_PATH', FRONT_ROOT.VIEWS_PATH.'js/');
  define('IMG_PATH', FRONT_ROOT.VIEWS_PATH.'img/');

  define("DB_HOST", "b74wzacb9gt37kied2us-mysql.services.clever-cloud.com");
  define("DB_NAME", "b74wzacb9gt37kied2us");
  define("DB_USER", "ucqytsygexu3supd");
  define("DB_PASS", "Z4m9rIpgCCkNkOAsONBv");

  // CONSTANTES PERMISOS
  define("ADMIN", 1);
  define("STUDENT", 2);
  define("ENTERPRISE", 3);


  ?>
  