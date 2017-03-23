<?php
/**
 * Created by PhpStorm.
 * User: Amaïa
 * Date: 03/10/2016
 * Time: 02:16
 */
include 'connectionUser.php';

session_start();

// Suppression des variables de session et de la session
$_SESSION = array();
session_destroy();
unset($_SESSION);
header("Location: ../public/home.php");

setcookie('resterco'); //écrasement du cookie par un cookie vide
unset($_COOKIE['resterco']); //destruction de la valeur en local ce qui évite de l'employer plus tard