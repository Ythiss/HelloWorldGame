<?php
/**
 * Created by PhpStorm.
 * User: Amaïa
 * Date: 29/10/2016
 * Time: 23:27
 */
include 'Database.php';

$bdd = new Database();

$pdo = $bdd->getPDO();

if (empty($_POST['username']) || empty($_POST['psw'])){
    echo 'Erreur : Des champs ne sont pas renseignés !<br>'. PHP_EOL;
}
else{
    $prep = $pdo->prepare('SELECT id FROM joueurs WHERE username = ? AND psw = ?');
    $prep->execute(array($_POST['username'], $_POST['psw']));
    $checkUsernamePsw = $prep->fetch();
    $prep->closeCursor();
    if (!$checkUsernamePsw) {
        echo 'Mauvais identifiant ou mot de passe !';
    } else {
        session_start();
        $_SESSION['id'] = $checkUsernamePsw['id'];

        header("Location: ../public/account.php");
    }
}