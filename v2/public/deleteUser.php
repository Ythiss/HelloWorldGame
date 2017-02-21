<?php
/**
 * Created by PhpStorm.
 * User: Amaïa
 * Date: 10/10/2016
 * Time: 10:35
 */

include 'Database.php';

$bdd = new Database();

$pdo = $bdd->getPDO();

session_start();

$prep = $pdo->prepare('DELETE FROM joueurs WHERE id = ?');
$prep->execute(array($_SESSION['id']));

$_SESSION = array();
session_destroy();
unset($_SESSION);
header("Location: ../public/home.php");