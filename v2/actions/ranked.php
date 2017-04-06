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

 require __DIR__.'/../config/init.php';
 session_start();

 require PATH_TEMPLATE . 'header.php';
 require PATH_TEMPLATE . 'menu.php';

 $user = new User;

 if(!empty($_SESSION['id'])){
     $userConnected = $user->getPlayerInfos();

 }else{
   $userConnected = array(
     'id' => ''
   );
 }
 Debug::printDebug($userConnected);
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
                            <?php $i = 1;

                            $infos = $user->playersRankedScoreTable();
                             Debug::printDebug($infos);
                              foreach ($infos as $info) {
                                if ($userConnected['id'] == $info['id']){
                                  $bold = ' <b>(moi)</b>';
                                }else{
                                  $bold = '';
                                }
                            ?>
                            <tr>
                      				<td><?= $i++ ?></td>
                      				<td><?= $info['username'] . $bold; ?></td>
                      				<td><?= $info['playerScore']; ?></td>
                      			</tr>
                              <?php
                            }

                                //var_dump($user);
                              ?>
                          </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php
  require PATH_TEMPLATE . 'footer.php';
?>
