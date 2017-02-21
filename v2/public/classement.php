<?php
/**
 * Created by PhpStorm.
 * User: Amaïa
 * Date: 09/10/2016
 * Time: 21:27
 */
include 'Database.php';

$bdd = new Database();

$pdo = $bdd->getPDO();

session_start();

$req = $pdo->query("SELECT * FROM scores");
//$req->execute(array($_SESSION['id']));

while($donnees = $req->fetch())
{
    echo $donnees['playerID'];
    echo $donnees['playerScore'];
}

$req->closeCursor();




?>