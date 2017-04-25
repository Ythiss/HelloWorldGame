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

 session_start();
require __DIR__.'/../config/init.php';

require PATH_TEMPLATE . 'header.php';
require PATH_TEMPLATE . 'menu.php';

Errors::checkIsNotConnect();

$pdo = $infos = '';

    $bdd = new Database();
    $pdo = $bdd->getPDO($pdo);
?>

    <div class="container">
        <div class="row flex-items-xs-middle">
            <div class="col-xs">
                <h1>Bienvenue sur votre compte !</h1>

                <h3><u>Vos informations personnelles</u> :</h3>
                <table class="table">
                  <?php
                  $infosPlayer = User::getPlayerInfos();
                  foreach ($infosPlayer as $infoPlayer) {
                  ?>
                    <tr>
                        <td><u>Pseudo</u></td>
                        <td><?= $infoPlayer['username']; ?></td>
                    </tr>
                    <tr>
                        <td><u>Mot de passe</u></td>
                        <td><?= $infoPlayer['psw']; ?></td>
                    </tr>
                    <tr>
                        <td><u>Email</u></td>
                        <td><?= $infoPlayer['email']; ?></td>
                    </tr>
                    <?php
                  }
                ?>
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
                $infosScores = User::playerHistoric();
                ?>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Date</th>
                        <th>Score</th>
                    </tr>
                    </thead>
                    <?php
                        foreach($infosScores as $value) {
                    ?>
                    <tbody>
                    <tr>
                        <td><?= $value['dateScore'];?></td>
                        <td><?= $value['playerScore'];?></td>
                    </tr>
                    </tbody>
                    <?php
                        }
                    ?>
                </table>
            </div>
        </div>
    </div>
    <?php


require_once PATH_TEMPLATE . 'footer.php';
