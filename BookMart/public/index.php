<?php

session_start();

require "../app/core/init.php";

require_once '../app/includes/PHPMailer.php';
require_once '../app/includes/SMTP.php';
require_once '../app/includes/Exception.php';


DEBUG ?  ini_set('display_errors',1) : ini_set('display_errors',0);

$app = new App;
$app->loadController();
