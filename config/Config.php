<?php namespace Config;

  define('ROOT', dirname(__DIR__) . '/');

  define('fileName', dirname(__DIR__)."/Data/enterprise.json");

  define('FRONT_ROOT', "/TPFinal/");
  define('VIEWS_PATH', 'views/');

  define('CSS_PATH', FRONT_ROOT.VIEWS_PATH.'css/');
  define('JS_PATH', FRONT_ROOT.VIEWS_PATH.'js/');
  define('IMG_PATH', FRONT_ROOT.VIEWS_PATH.'img/');

  define("DB_HOST", "localhost");
  define("DB_NAME", "UTN");
  define("DB_USER", "root");
  define("DB_PASS", "");
  ?>
  