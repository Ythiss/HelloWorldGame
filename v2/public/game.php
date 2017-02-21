<?php
/**
 * Created by PhpStorm.
 * User: Amaïa
 * Date: 29/09/2016
 * Time: 19:09
 */

session_start();


include 'Database.php';
require_once 'header.php';
require_once 'menu.php';

$bdd = new Database();

$pdo = $bdd->getPDO();
if(!empty($_SESSION['id'])){
    $prep = $pdo->prepare('SELECT J.id, J.username, S.`playerScore` FROM `scores` S, joueurs J WHERE S.playerID = J.id AND J.id = ? ORDER BY S.dateScore DESC;');
    $prep->execute(array($_SESSION['id']));
    $infos = $prep->fetch();
    $prep->closeCursor();
}

?>


<div class="container">
    <div class="row">
        <div class="row flex-items-xs-middle">
            <div class="col-xs-3">
                <h1>Puzzle !</h1>
                <?php if (!empty($_SESSION['id'])): ?>
                <div id="playerInfos">
                    <table class="table table-condensed">Informations joueur :
                        <tr>
                            <td><u>Pseudo</u> : <?php echo $infos['username'];?></td>
                        </tr>
                        <tr>
                            <td><u>Score</u> : <?php echo $infos['playerScore'];?></td>
                        </tr>
                    </table>
                </div>
            <?php  endif;?>
            </div>
            <div class="col-xs-9">
                    <canvas id="game"></canvas>
            </div>
        </div>
    </div>
</div>
<?php

require_once 'footer.php';

?>

