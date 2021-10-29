<?php namespace Config;

  class Request {

    private $controller = 'Student';
    private $method = 'index';
    private $parameters = array();

    public function __construct() {
      $url = filter_input(INPUT_GET, 'url', FILTER_SANITIZE_URL);
      $urlArray = explode('/', $url);
      $urlArray = array_filter($urlArray);

      if(!empty($urlArray)) $this->controller = ucwords(array_shift($urlArray));
      // shift saca el primer elemento del arreglo y coloca en mayuscula la primera letra del String;

      if(!empty($urlArray)) $this->method = array_shift($urlArray);
      // sacamos el primer elemento del arreglo y seteamos method;

      $methodRequest = $this->methodRequest();

      if($methodRequest == 'GET') {
        unset($_GET['url']);

        if(!empty($_GET)) {
          foreach ($_GET as $key => $value) {
            array_push($this->parameters, $value);
          }
        } else $this->parameters = $urlArray;

      } elseif ($_POST) $this->parameters = $_POST;

      if($_FILES) {
        unset($this->parameters['button']);

        foreach ($_FILES as $file) {
          array_push($this->parameters, $file);
        }
      }
    }

    private function methodRequest()
    {
      return $_SERVER['REQUEST_METHOD'];
    }

    public function getController()
    {
      return $this->controller;
    }

    public function getMethod() {
      return $this->method;
    }

    public function getParameters()
    {
      return $this->parameters;
    }
  }