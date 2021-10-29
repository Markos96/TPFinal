<?php
  namespace Config;

  class Autoload {
    public static function Start() {
      spl_autoload_register(function ($class){
        include_once ucwords(str_replace('\\', '/', ROOT.$class) . '.php');
      });
    }
  }