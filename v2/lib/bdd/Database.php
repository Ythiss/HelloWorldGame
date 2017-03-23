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

    private $dbUser = "root";
    private $dbPass = "";
    private $dbUrl = "mysql:host=localhost;dbname=helloworldgame";
    private $pdo;

    public function __construct(){
        try {
            $extraParams = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
            $this->pdo = new PDO($this->dbUrl, $this->dbUser, $this->dbPass, $extraParams);
        } catch (PDOException $e) {
            die("La connexion a échouée" . $e->getLine());
        }
    }

    public function getPDO(){
        return $this->pdo;
    }
}
