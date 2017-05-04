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
$user = new User($_SESSION['id']);
$user2 = new User(13);
Debug::printDebug($user);
$infosPlayer = User::getPlayerInfos($_SESSION['id']);
$infosScores = User::playerHistoric();

//Debug::printDebug($_SESSION['id']);
//Debug::printDebug($infosPlayer);
?>

    <div class="container">
        <div class="row flex-items-xs-middle">
            <div class="col-xs">
                <h1>Bienvenue sur votre compte !</h1>

                <h3><u>Vos informations personnelles</u> :</h3>
                <table class="table">
                    <tr>
                        <td><u>Pseudo</u></td>
                        <td><?= $user->getUsername(); ?></td>
                    </tr>
                    <tr>
                        <td><u>Mot de passe</u></td>
                        <td><?= $user->getPsw(); ?></td>
                    </tr>
                    <tr>
                        <td><u>Email</u></td>
                        <td><?= $user->getEmail(); ?></td>
                    </tr>
                </table>
                <a href="#updateInfos" data-toggle="modal" data-target="#updateInfos"><button type="button" class="btn btn-link">Modifier mes informations</button></a>
            </div>
        </div>
    </div>

    <!-- Modal modification informations-->
    <div id="updateInfos" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Modifier mes informations</h4>
                </div>
                <div class="modal-body">
                  <form method="POST" action="<?php echo URL_SITE?>/actions/modificationInfos.php" class="form-horizontal" enctype="multipart/form-data">
                      <div class="form-group">
                          <label class="col-sm-4 control-label">Pseudo :</label>
                          <div class="col-sm-8">
                              <input type="text" name="newpseudo" placeholder="Pseudo" class="form-control" value="<?php echo $infosPlayer['username']; ?>" />
                          </div>
                      </div>
                      <div class="form-group">
                          <label for="inputEmail3" class="col-sm-4 control-label">Mail :</label>
                          <div class="col-sm-8">
                              <input type="text" name="newmail" placeholder="Mail" class="form-control" value="<?php echo $infosPlayer['email']; ?>" />
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
                          <div class="col-xs-5 col-xs-offset-3">
                              <button type="submit" class="btn btn-success">Enregistrer</button>
                              <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                          </div>
                      </div>
                  </form>
                </div>
            </div>
        </div>
    </div>

<!-- FIN - Modal modification informations-->

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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script>

    $(document).ready(function(){

        $("#submit").click(function(){

            $.post(
                'connexion.php', // Un script PHP que l'on va créer juste après
                {
                    login : $("#username").val(),  // Nous récupérons la valeur de nos input que l'on fait passer à connexion.php
                    password : $("#password").val()
                },

                function(data){

                    if(data == 'Success'){
                         // Le membre est connecté. Ajoutons lui un message dans la page HTML.

                         $("#resultat").html("<p>Vous avez été connecté avec succès !</p>");
                    }
                    else{
                         // Le membre n'a pas été connecté. (data vaut ici "failed")

                         $("#resultat").html("<p>Erreur lors de la connexion...</p>");
                    }

                },

                'text'
             );

        });

    });

    </script>
    <?php


require_once PATH_TEMPLATE . 'footer.php';
