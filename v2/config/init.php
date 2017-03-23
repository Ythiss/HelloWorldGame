<?php
function __autoload($class_name) {
    include '../lib/' . $class_name . '.php';
}

define ('URL_SITE', 'http://localhost/helloworldgame/v2');
define ('URL_CSS', URL_SITE . '/public/css');
define ('URL_IMG', URL_SITE . '/public/img');
define ('PATH_SITE', $_SERVER['DOCUMENT_ROOT'] . 'helloworldgame/v2/');
define ('PATH_LIB', PATH_SITE . 'lib/');
define ('PATH_CONFIG', PATH_SITE . 'config/');
// echo PATH_SITE;
// print_r($_SERVER);
