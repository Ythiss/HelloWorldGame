<?php
/**
 * Created by PhpStorm.
 * User: Amaïa
 * Date: 10/10/2016
 * Time: 10:35
 */
 session_start();
require __DIR__.'/../config/init.php';

Errors::checkIsNotConnect();

User::destroyAccount();

User::deconnection();
