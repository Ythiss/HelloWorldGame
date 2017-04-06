<?php
/**
 * Created by PhpStorm.
 * User: Amaïa
 * Date: 03/10/2016
 * Time: 02:16
 */
include 'connectionUser.php';

session_start();

User::deconnection();

//setcookie('resterco'); //écrasement du cookie par un cookie vide
//unset($_COOKIE['resterco']); //destruction de la valeur en local ce qui évite de l'employer plus tard
