<?php
/**
 * Created by PhpStorm.
 * User: Amaïa
 * Date: 06/10/2016
 * Time: 00:21
 */
include 'Database.php';

$bdd = new Database();

$pdo = $bdd->getPDO();

$pseudo = $_POST['username'];
$mdp = $_POST['psw'];
$mail = $_POST['email'];
$id = $_SESSION['id'];


//$req = $pdo->query("UPDATE joueurs SET username = '$pseudo', psw = '$mdp', email = '$mail' WHERE id=13;");
//$req->execute(array($_SESSION['id']));
//$req->closeCursor();

//header("Location: ../public/account.php");