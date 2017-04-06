<?php

class Debug{
  private static $debug = false;

  static function active(){
    self::$debug = true;
  }

  static function printDebug($var){
    if (self::$debug == true){
      var_dump($var);
    }
  }
}
