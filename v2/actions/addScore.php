<?php
/**
 * Created by PhpStorm.
 * User: Amaïa
 * Date: 09/10/2016
 * Time: 22:04
 */

 require __DIR__.'/../config/init.php';

 $pdo = Database::getPDO();

$date = date("Y-m-d H:i:s");

session_start();

$prep = $pdo->prepare('INSERT INTO scores(playerID, playerScore, dateScore) VALUES(?, ?, ?)');
$prep->execute(array($_SESSION['id'], $_POST['score'], $date));


echo $_SESSION['id'];
echo $_POST['score'];

header('Location: '. URL_SITE . '/actions/account.php?id='.$_SESSION['id']);
