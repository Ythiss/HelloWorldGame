<?php
/**
 * Classe User
 *
 * --Changelog
 * version 1.0.0 (29/10/2016) Amaïa
 * - Création de la classe
 *
 * @author Amaïa
 * @version 1.0.0
 */

class User{
	public $username;
	public $psw;
	public $email;
	public $pdo;

// Récupère les infos du joueur
	public function getPlayerInfos(){
		  $pdo = Database::getPDO();
	    $req = $pdo->prepare("SELECT id, username, psw, email FROM joueurs WHERE id = 1");
	    $req->execute(array($_SESSION['id']));
	    $infos = $req->fetch();
			$req->closeCursor();
			//var_dump($infos);
			return $infos;
	}

	public function getPlayerUsername(){
		  $pdo = Database::getPDO();
	    $req = $pdo->prepare("SELECT username FROM joueurs WHERE id = ?");
	    $req->execute(array($_SESSION['id']));
	    $username = $req->fetch();
			$req->closeCursor();
			//var_dump($infos);
			return $username;
	}

	public function getScore(){
		  $pdo = Database::getPDO();
	    $req = $pdo->prepare("SELECT `playerID`,`playerScore`,`dateScore` FROM scores WHERE id = 1");
	    $req->execute(array($_SESSION['id']));
	    $scores = $req->fetchAll();
			$req->closeCursor();
			//var_dump($infos);
			return $scores;
	}


public function getSessionId($username,$psw){
	$pdo = Database::getPDO();
	$prep = $pdo->prepare('SELECT id FROM joueurs WHERE username = ? AND psw = ?');
	$prep->execute(array($username, $psw));
	$checkUsernamePsw = $prep->fetch();
	$prep->closeCursor();
	return $checkUsernamePsw;
}

// Classement des joueurs
	public function playersRankedScoreTable(){
		$pdo = Database::getPDO();
		$req = $pdo->prepare('SELECT J.id, J.username, S.`playerScore` FROM `scores` S, joueurs J WHERE S.playerID = J.id ORDER BY S.playerScore DESC;');
  	$req->execute();
		$infos = $req->fetchAll();
		$req->closeCursor();
		return $infos;
	}

	static function deconnection(){
		// Suppression des variables de session et de la session
		$_SESSION = array();
		session_destroy();
		unset($_SESSION);
		header("Location: " . URL_ACTIONS ."home.php");
	}

	static function destroyAccount(){
		$pdo = Database::getPDO();
		$prep = $pdo->prepare('DELETE FROM joueurs WHERE id = ?');
		$prep->execute(array($_SESSION['id']));
	}
}
