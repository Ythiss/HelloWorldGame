<?php
/**
 * Gestion des erreurs
 *
 * @author Amaïa
 * @version 0.0.1
 *
 * Date: 09/10/2016
 *
 */
session_start();
require __DIR__.'/../config/init.php';

Errors::checkIsNotConnect();
Debug::printDebug($_POST);

    $user = User::getPlayerInfos($_SESSION['id']);
    if(isset($_POST['newpseudo']) AND !empty($_POST['newpseudo']) AND $_POST['newpseudo'] != $user['username']) {
        $newpseudo = htmlspecialchars($_POST['newpseudo']);
        $insertpseudo = $pdo->prepare("UPDATE joueurs SET username = ? WHERE id = ?");
        $insertpseudo->execute(array($newpseudo, $_SESSION['id']));
        header('Location: ../public/account.php?id='.$_SESSION['id']);
    }
    if(isset($_POST['newmail']) AND !empty($_POST['newmail']) AND $_POST['newmail'] != $user['email']) {
        $newmail = htmlspecialchars($_POST['newmail']);
        if (filter_var($newmail, FILTER_VALIDATE_EMAIL)) {
            $insertmail = $pdo->prepare("UPDATE joueurs SET email = ? WHERE id = ?");
            $insertmail->execute(array($newmail, $_SESSION['id']));
            header('Location: ../public/account.php?id='.$_SESSION['id']);
        }else{
            echo 'Cet email a un format non adapté.';
        }

    }
    if(isset($_POST['newmdp1']) AND !empty($_POST['newmdp1']) AND isset($_POST['newmdp2']) AND !empty($_POST['newmdp2'])) {
        $mdp1 = $_POST['newmdp1'];
        $mdp2 = $_POST['newmdp2'];
        if($mdp1 == $mdp2) {
            $insertmdp = $pdo->prepare("UPDATE joueurs SET psw = ? WHERE id = ?");
            $insertmdp->execute(array($mdp1, $_SESSION['id']));
            header('Location: ../public/account.php?id='.$_SESSION['id']);
        } else {
            $msg = "Vos deux mdp ne correspondent pas !";
        }
    }
