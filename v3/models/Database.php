<?php

/**
 * Appel à la bdd
 *
 * @author Amaïa
 * @version: 0.0.1
 *
 * Date: 29/10/2016
 *
 */

class Database{

    private static $dbUser = "root";
    private static $dbPass = "";
    private static $dbUrl = "mysql:host=localhost;dbname=helloworldgame";
    private static $pdo = false;

    public static function getPDO(){

      if(self::$pdo === false){
            try {
                $extraParams = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
                self::$pdo = new PDO(self::$dbUrl, self::$dbUser, self::$dbPass, $extraParams);
            } catch (PDOException $e) {
                die("La connexion a échouée" . $e->getLine());
            }
      }
        return self::$pdo;
    }
}
