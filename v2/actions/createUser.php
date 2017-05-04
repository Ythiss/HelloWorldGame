<?php
/**
 * Created by PhpStorm.
 * User: Amaïa
 * Date: 29/10/2016
 * Time: 21:13
 */

 require __DIR__.'/../config/init.php';

 $pdo = Database::getPDO();


if(!empty($_POST['username']) && !empty($_POST['psw']) && !empty($_POST['email'])){
    $prep = $pdo->prepare("CALL checkUsername(?)");
    $prep->execute(array($_POST['username']));
    $check = $prep->fetch();
    $prep->closeCursor();

    if(!count($check)['0']){
        if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            echo "Cette adresse email est considérée comme valide.";
        }
        $prep = $pdo->prepare("CALL createUser(?, ?, ?)");
        $prep->execute(array($_POST['username'], $_POST['psw'], $_POST['email']));
        $prep->closeCursor();

        $prep = $pdo->prepare('SELECT id FROM joueurs WHERE username = ? AND psw = ?');
        $prep->execute(array($_POST['username'], $_POST['psw']));
        $checkUsernamePsw = $prep->fetch();
        $prep->closeCursor();
        if (!$checkUsernamePsw) {
            echo 'Mauvais identifiant ou mot de passe !';
        } else {
            session_start();
            $_SESSION['id'] = $checkUsernamePsw['id'];

            header("Location:". URL_ACTIONS."account.php");
        }
    }
    else{
        echo 'Ce pseudo existe deja ! :/ <br>'.PHP_EOL;
        echo '<a href="'. URL_ACTIONS.'"game.php#signUp"><button type="button" class="btn btn-default">Revenir en arrière</button></a>';
    }
}
else {
    echo 'Erreur : Des champs ne sont pas renseignés !<br>'. PHP_EOL;
    echo "La requête a échoué... :( <br>" . PHP_EOL;
    echo '<a href="'. URL_ACTIONS.'"game.php#signUp"><button type="button" class="btn btn-default">Revenir en arrière</button></a>';
}
