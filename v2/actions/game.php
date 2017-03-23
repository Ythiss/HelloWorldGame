<?php
/**
 * Created by PhpStorm.
 * User: Amaïa
 * Date: 29/09/2016
 * Time: 19:09
 */

session_start();


include_once '../actions/bdd/Database.php';
include_once '../actions/User.php';
require_once 'header.php';
require_once 'menu.php';

$bdd = new Database();

$pdo = $bdd->getPDO();
var_dump($pdo);
if(!empty($_SESSION['id'])){
    $user = new User;
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
                        <?php $user->getPlayerInfos($pdo);?>
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
