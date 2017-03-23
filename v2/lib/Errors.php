<?php
/**
 * Gestion des erreurs
 *
 * @author Amaïa
 * @version 0.0.1
 *
 * Date: 29/10/2016
 *
 */



class Errors{

	public static function checkIsNotConnect(){
		if(empty($_SESSION)){

			//header('Location: ' . URL_SITE . '/actions/home.php?msg=errorNotConnected');
			?>
		    <!-- <div class="container">
		        <div class="row">
		            <div class="row flex-items-xs-middle">
		                <div class="col-xs">
		                    <p>Vous n'avez pas le droit d'accèder à cette page ! ;)</p><br>
		                    <a href="home.php"><button class="btn btn-primary">Revenir en arrière</button></a>
		                </div>
		            </div>
		        </div>
		    </div> -->
		    <?php
		}
	}
}
