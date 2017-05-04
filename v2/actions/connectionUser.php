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
 $checkUsernamePsw = User::getSessionId($_POST['username'], $_POST['psw']);

    if (!$checkUsernamePsw) {
        echo 'Mauvais identifiant ou mot de passe !';
    } else {
        session_start();
        //Debug::printDebug($checkUsernamePsw);die;
        $_SESSION['id'] = $checkUsernamePsw['0'];

        header('Location: '. URL_SITE . '/actions/account.php');
    }
}
