<?php
/**
 * Created by PhpStorm.
 * User: Amaïa
 * Date: 29/09/2016
 * Time: 22:47
 */
session_start();

require_once 'header.php';
require_once 'menu.php';



if(empty($_SESSION)){?>
    <div class="container">
        <div class="row">
            <div class="row flex-items-xs-middle">
                <div class="col-xs">
                    <p>Vous n'avez pas le droit d'accèder à cette page ! ;)</p><br>
                    <a href="home.php"><button class="btn btn-primary">Revenir en arrière</button></a>
                </div>
            </div>
        </div>
    </div>

    <?php
}else {
    include 'Database.php';
    $bdd = new Database();

    $pdo = $bdd->getPDO();

    if(!empty($_POST)){
        $pseudo = $_POST['username'];
        $mdp = $_POST['psw'];
        $mail = $_POST['email'];
    }


    $reqJoueur = $pdo->prepare("SELECT id, username, psw, email FROM joueurs WHERE id = ?");
    $reqJoueur->execute(array($_SESSION['id']));
    $infos = $reqJoueur->fetch();
    $reqJoueur->closeCursor();
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
                <a href="deleteUser.php"><button type="button" class="btn btn-primary">Supprimmer mon compte</button></a>
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