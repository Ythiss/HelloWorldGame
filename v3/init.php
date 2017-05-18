<?php
// function __autoload($class_name) {
//     include '../lib/' . $class_name . '.php';
// }
// Activation mode debug
//Debug::active();

define ('URL_SITE', 'http://localhost/HelloWorldGame/v3');
define ('URL_CSS', URL_SITE . '/assets/css');
define ('URL_IMG', URL_SITE . '/assets/img');
define ('URL_ACTIONS', '../actions/');

define ('PATH_SITE', __DIR__ . '/');
define ('PATH_LIB', PATH_SITE . 'lib/');
define ('PATH_CONFIG', PATH_SITE . 'config/');
define ('PATH_TEMPLATE', PATH_SITE . 'views/templates/');

define ('PATH_CONTROLLERS', PATH_SITE . 'controllers/');
define ('PATH_VIEWS', PATH_SITE . 'views/');
define ('PATH_MODELS', PATH_SITE . 'models/');

require_once 'vendor/autoload.php';

require PATH_MODELS.'Database.php';
