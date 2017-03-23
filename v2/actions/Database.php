<?php

/**
 * Created by PhpStorm.
 * User: Amaïa
 * Date: 29/10/2016
 * Time: 15:36
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