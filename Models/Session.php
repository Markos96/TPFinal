<?php namespace Models;

class Session {

  static $userSessionName = "LoggedUser";
  static $sessionTime     = "Time";
  static $userInfo = "userInfo";

  public static function start() {
    session_start();
  }

  public static function setCurrentUser( $user ) {
    self::setTimeSession();
    $_SESSION[self::$userSessionName] = $user;
  }

  public static function getCurrentUser() {
    return $_SESSION[self::$userSessionName];
  }

  public static function setCurrentInfoUser($infoUser){
    self::setTimeSession();
    $_SESSION[self::$userInfo] = $infoUser;
  }

  public static function getCurrentInfoUser() {
    return $_SESSION[self::$userInfo];
  }

  public static function setTimeSession() {
    $_SESSION[self::$sessionTime] = time();
  }

  public static function getTimeSession() {
    return ( time() - $_SESSION[self::$sessionTime] );
  }

  public static function closeSession() {
    if( isset($_SESSION[self::$userSessionName])) {
      session_unset();
      session_destroy();
    }
  }

  public static function timeOn() {
    return (( time() - $_SESSION[self::$sessionTime]) < 1800);
  }

  public static function isActive() {
    if ( isset( $_SESSION[self::$sessionTime] ) && self::timeOn() ) {
      self::setTimeSession();
      return true;
    }

    self::closeSession();
    return false;

  }

  public function isExist() {
    return isset( $_SESSION[self::$userSessionName] );
  }

}