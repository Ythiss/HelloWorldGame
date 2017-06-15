<?php
require PATH_LIB.'User.php';

Errors::checkIsNotConnect();

User::destroyAccount();

User::deconnection();
