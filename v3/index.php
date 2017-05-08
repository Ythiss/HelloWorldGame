<?php
require 'init.php';
$req = $_SERVER['REQUEST_URI'];
//print_r($_SERVER);

        // this is our pseudo-router ... we don't have a set of classes that interpret requests so we just rely on the plain old super globals

$req  = str_replace('/HelloWorldGame/v3/', '', $_SERVER['REDIRECT_URL']);

$module = $action = '';
$control = explode('/', $req);
//print_r($control);

// Gestion des sous modules
if (isset($control[0]) === true) {
    $module = $control[0];
}

if (empty($control[1]) === false) {
    $action = $control[1];
}else{
  $action = 'default';
}
switch ($module) {
    default:
    case (''):
    case ('home'):
      require PATH_CONTROLLERS . '/home/actions/'.$action.'.php';
        break;
    case ('game'):
      require PATH_CONTROLLERS . '/game/actions/'.$action.'.php';
        break;
}
