<?php

//use lib\User;

 $checkUsernamePsw = lib\User::getSessionId($_POST['username'], $_POST['psw']);
