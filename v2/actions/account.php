<?php
/**
 * Compte du joueur
 *
 * @author Amaïa
 * @version: 0.0.1
 *
 * Date: 29/09/2016
 *
 */
require '../config/init.php';
require PATH_CONFIG . 'Secure.php';
session_start();

require 'header.php';
require 'menu.php';


if(!empty($_SESSION)){
    include_once '../actions/bdd/Database.php';
    $bdd = new Database();

    $pdo = $bdd->getPDO($pdo);

    if(!empty($_POST)){
        $pseudo = $_POST['username'];
        $mdp = $_POST['psw'];
        $mail = $_POST['email'];

        $user = new User;
        $user->getPlayerInfos();
    }
    ?>

    <div class="container">
        <div class="row flex-items-xs-middle">
            <div class="col-xs">
                <h1>Bienvenue sur votre compte <?= $infos['username'] ?>!</h1>
                <h3><u>Vos informations personnelles</u> :</h3>
                <table class="table">
                    <tr>
                        <td><u>Pseudo</u></td>
                        <td><?= $infos['username'] ?></td>
                    </tr>
                    <tr>
                        <td><u>Mot de passe</u></td>
                        <td><?= $infos['psw'] ?></td>
                    </tr>
                    <tr>
                        <td><u>Email</u></td>
                        <td><?= $infos['email'] ?></td>
                    </tr>
                </table>
                <a href="modificationInfos.php"><button type="button" class="btn btn-link">Modifier mes informations</button></a>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row flex-items-xs-middle">
            <div class="col-xs-6">
                <h2>Ajouter mon score</h2>
                <form action="addScore.php" method="post" class="form-horizontal">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Score</label>
                        <div class="col-sm-4">
                            <input type="number" class="form-control" name="score" placeholder="Score">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-5 col-xs-offset-3">
                            <button type="submit" class="btn btn-success">Enregistrer</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </form>
                <br><br>
                <a href="deleteUser.php"><button type="button" class="btn btn-primary">Supprimer mon compte</button></a>
            </div>
            <div class="col-xs-6">
                <h2>Historique de scores</h2>
                <?php
                $req = $pdo->prepare("SELECT playerScore, dateScore FROM joueurs AS J INNER JOIN scores AS S ON J.id = S.playerID WHERE S.playerID = ? ORDER BY S.dateScore DESC;");
                $req->execute(array($_SESSION['id']));
                ?>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Date</th>
                        <th>Score</th>
                    </tr>
                    </thead>
                    <?php
                        foreach($historique = $req->fetchAll() as $value) {
                    ?>
                    <tbody>
                    <tr>
                        <td><?= $value['dateScore'];?></td>
                        <td><?= $value['playerScore'];?></td>
                    </tr>
                    </tbody>
                    <?php
                            $req->closeCursor();
                        }
                    ?>
                </table>
            </div>
        </div>
    </div>
    <?php
    }

require_once 'footer.php';
