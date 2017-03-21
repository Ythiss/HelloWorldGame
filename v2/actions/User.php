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
	public function getPlayerInfos($pdo){
	    $req = $pdo->prepare("SELECT id, username, psw, email FROM joueurs WHERE id = ?");
	    $req->execute(array($_SESSION['id']));
	    $infos = $req->fetchAll();
			foreach ($infos as $info) {
				?>
				<tr>
						<td><u>Pseudo</u> : <?php echo $info['username'];?></td>
				</tr>
				<tr>
						<td><u>Score</u> : <?php echo $info['playerScore'];?></td>
				</tr>
				<?php
			}
	    $req->closeCursor();
	}

	public function getUsername(){
		
	}

// Classement des joueurs
	public function playersRankedScoreTable($pdo){
		$req = $pdo->prepare('SELECT J.id, J.username, S.`playerScore` FROM `scores` S, joueurs J WHERE S.playerID = J.id ORDER BY S.playerScore DESC;');
  	$req->execute();
		$infos = $req->fetchAll();
		$i = 1;
		foreach ($infos as $info) {
			?>
			<tr>
				<td><?php echo $i++ ?></td>
				<td><?= $info['username']; ?></td>
				<td><?= $info['playerScore']; ?></td>
			</tr>
			<?php
		}
		$req->closeCursor();
	}
}
