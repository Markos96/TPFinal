<?php
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

  require 'config/Autoload.php';
  require 'config/Config.php';

  use Config\Autoload as Autoload;
  use Config\Router as Router;
  use Config\Request as Request;
  use Models\Session as Session;

  Autoload::Start();

  //session_start();
  Session::start();

  require_once(VIEWS_PATH . 'header.php');

  Router::Route(new Request());

  require_once(VIEWS_PATH . 'footer.php');