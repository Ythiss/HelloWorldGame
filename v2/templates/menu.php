<?php
/**
 * Gestion des erreurs
 *
 * @author Amaïa
 * @version 0.0.1
 *
 * Date: 29/09/2016
 *
 */

?>

<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="home.php">Hello World! Game</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="home.php">Home</a></li>
                <li><a href="game.php">Jouer</a></li>
                <li><a href="ranked.php">Classement</a></li>
                <?php if (!empty($_SESSION)) : echo'<li><a href="account.php">Mon compte</a></li>'; endif;?>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php if (empty($_SESSION)) : echo'<li><a href="#signIn" data-toggle="modal" data-target="#signIn">Connexion</a></li>'; endif;?>
                <?php if (empty($_SESSION)) : echo'<li><a href="#signUp" data-toggle="modal" data-target="#signUp">Inscription</a></li>'; endif;?>
                <?php if (!empty($_SESSION)) : echo'<li><a href="#signOut" data-toggle="modal" data-target="#signOut">Se déconnecter</a></li>'; endif;?>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>

<div id="signIn" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Connexion</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="post" action="<?php echo URL_SITE?>/actions/connectionUser.php">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Username</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="username" placeholder="Username">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" name="psw" d="inputPassword3" placeholder="Password">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox"> Remember me
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-default">Sign in</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>

<!--INSCRIPTION-->

<div id="signUp" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Inscription</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="post" action="createUser.php">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Username</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="username" placeholder="Username">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="inputPassword3" name="psw" placeholder="Password">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="inputEmail3" name="email" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox"> Remember me
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-default">Sign Up</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>

<div id="signOut" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" name="signOut" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Déconnexion</h4>
            </div>
            <div class="modal-body">
                <p>Vous allez être déconnecter ! À bientôt ! :)</p>
                <form method="post" action="disconnectUser.php">
                    <button type="submit"class="btn btn-default">Déconnexion</button>
                </form>
            </div>
        </div>

    </div>
</div>
