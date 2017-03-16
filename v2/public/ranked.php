<?php
/**
 * Classement des joueurs
 *
 * @author Amaïa
 * @version: 0.0.1
 *
 * Date: 03/10/2016
 *
 */

session_start();

require_once 'header.php';
require_once 'menu.php';

include_once '../actions/bdd/Database.php';

$bdd = new Database();

$pdo = $bdd->getPDO();

include_once '../actions/User.php';

$user = new User();
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
                          <tbody>
                              <?php
                                $user->playersRankedScoreTable($pdo);
                              ?>
                          </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php
    require_once 'footer.php';
?>
