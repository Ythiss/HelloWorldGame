<?php
/**
 * Created by PhpStorm.
 * User: Amaïa
 * Date: 03/10/2016
 * Time: 10:32
 */
session_start();


    include 'Database.php';
    require_once 'header.php';
    require_once 'menu.php';

    $bdd = new Database();

    $pdo = $bdd->getPDO();


    $prep = $pdo->prepare('SELECT J.id, J.username, S.`playerScore` FROM `scores` S, joueurs J WHERE S.playerID = J.id ORDER BY S.playerScore DESC;');
    $prep->execute();


    ?>
    <div class="container">
        <div class="row">
            <div class="row flex-items-xs-middle">
                <div class="col-xs">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Username</th>
                            <th>Score</th>
                        </tr>
                        </thead>
                        <?php
                        $i = 1;
                        while (($infos = $prep->fetch()) !== false) { ?>
                            <tbody>
                            <tr>
                                <th><?php echo $i++; ?></th>
                                <td><?= $infos['username']; ?></td>
                                <td><?= $infos['playerScore']; ?></td>
                            </tr>
                            </tbody>
                            <?php
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php

    require_once 'footer.php';


?>
