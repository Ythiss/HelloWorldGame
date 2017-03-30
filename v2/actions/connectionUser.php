<?php
/**
 * Created by PhpStorm.
 * User: Amaïa
 * Date: 29/10/2016
 * Time: 23:27
 */
 require __DIR__.'/../config/init.php';


if (empty($_POST['username']) || empty($_POST['psw'])){
    echo 'Erreur : Des champs ne sont pas renseignés !<br>'. PHP_EOL;
}
else{
$user = new User();
 $checkUsernamePsw = $user->getSessionId($_POST['username'], $_POST['psw']);

    if (!$checkUsernamePsw) {
        echo 'Mauvais identifiant ou mot de passe !';
    } else {
        session_start();
        $_SESSION['id'] = $checkUsernamePsw['id'];

        header("Location: ../actions/account.php");
    }
}
