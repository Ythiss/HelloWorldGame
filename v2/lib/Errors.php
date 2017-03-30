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

		}
	}
}
