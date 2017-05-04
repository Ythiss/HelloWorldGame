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
	private $username;
	private $psw;
	private $email;
	private $id;
	private $pdo;


public function __construct($id){
	$infos = $this->getPlayerInfos($id);
	$this->username = $infos['username'];
	$this->psw = $infos['psw'];
	$this->email = $infos['email'];
	$this->id = $id;
}

public function getUsername(){
	return $this->username;
}

public function getPsw(){
	return $this->psw;
}

public function getEmail(){
	return $this->email;
}

static function getSessionId($username,$psw){
	$pdo = Database::getPDO();
	$prep = $pdo->prepare('SELECT id FROM joueurs WHERE username = ? AND psw = ?');
	$prep->execute(array($username, $psw));
	$checkUsernamePsw = $prep->fetch();
	$prep->closeCursor();
	return $checkUsernamePsw;
}

// Récupère les infos du joueur
	static function getPlayerInfos($id){
		  $pdo = Database::getPDO();
	    $req = $pdo->prepare("SELECT username, psw, email FROM joueurs WHERE id = ?");
	    $req->execute(array($id));
	    $infos = $req->fetch();
			$req->closeCursor();
			return $infos;
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



// Historique des scores du joueur
		static function playerHistoric(){
		$pdo = Database::getPDO();
		$req = $pdo->prepare("SELECT playerScore, dateScore FROM joueurs AS J INNER JOIN scores AS S ON J.id = S.playerID WHERE S.playerID = ? ORDER BY S.dateScore DESC;");
		$req->execute(array($_SESSION['id']));
		$infos = $req->fetchAll();
		//var_dump($infos);
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
