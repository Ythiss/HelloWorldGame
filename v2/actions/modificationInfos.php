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

include_once '../actions/Errors.php';

$check = new Errors();
$check->checkIsNotConnect();

if(!empty($_SESSION)){

include 'Database.php';

$bdd = new Database();

$pdo = $bdd->getPDO();

session_start();

if(isset($_SESSION['id'])) {
    $requser = $pdo->prepare("SELECT * FROM joueurs WHERE id = ?");
    $requser->execute(array($_SESSION['id']));
    $user = $requser->fetch();
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
    ?>
    <?php
    require_once 'header.php';
    require_once 'menu.php';

    ?>
        <div class="container">
            <div class="row flex-items-xs-middle">
                <h2>Edition de mon profil</h2>
                <div class="col-xs-10">
                    <form method="POST" action="" class="form-horizontal" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Pseudo :</label>
                            <div class="col-sm-8">
                                <input type="text" name="newpseudo" placeholder="Pseudo" class="form-control" value="<?php echo $user['username']; ?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-4 control-label">Mail :</label>
                            <div class="col-sm-8">
                                <input type="text" name="newmail" placeholder="Mail" class="form-control" value="<?php echo $user['email']; ?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-4 control-label">Mot de passe :</label>
                            <div class="col-sm-8">
                                <input type="password" name="newmdp1" class="form-control" placeholder="Mot de passe"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-4 control-label">Confirmation - mot de passe :</label>
                            <div class="col-sm-8">
                             <input type="password" name="newmdp2" class="form-control" placeholder="Confirmation du mot de passe" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-6 col-sm-6">
                                <button type="submit" class="btn btn-primary" ">Mettre à jour mon profil !</button>
                            </div>
                        </div>
                    </form>
                    <?php if(isset($msg)) { echo $msg; } ?>
                </div>
            </div>
        </div>
<?php
    require_once 'footer.php';
}
else{
    echo 'Erreur !<br>'. PHP_EOL;
    echo '<a href="../public/account.php"><button type="button" class="btn btn-default">Revenir en arrière</button></a>';
}
}