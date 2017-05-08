<?php

echo 'GAME';

$loader = new Twig_Loader_Filesystem(PATH_VIEWS.'home');
$twig = new Twig_Environment($loader);
// $template = $twig->load(PATH_VIEWS.'home/home.tpl');
echo $twig->render('game.tpl', array('name' => 'Fabien'));
