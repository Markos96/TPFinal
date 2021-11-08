<?php
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

  require 'Config/Autoload.php';
  require 'Config/Config.php';

  use Config\Autoload;
  use Config\Router;
  use Config\Request;
  use Models\Session;

  Autoload::Start();

  Session::start();

  Router::Route(new Request());