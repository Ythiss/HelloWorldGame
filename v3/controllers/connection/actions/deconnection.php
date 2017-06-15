<?php

//use lib\User;

 $checkUsernamePsw = User::getSessionId($_POST['username'], $_POST['psw']);
