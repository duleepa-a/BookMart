<?php

if($_SERVER['SERVER_NAME'] == 'localhost'){
    define('DBNAME','bookMart');
    define('DBHOST','localhost');
    define('DBUSER','root');
    define('DBPASS','');
    
    define('ROOT','http://localhost/BookMart/public');
    define('STRIPE_SECRET_KEY','sk_test_51QwNzUFwD7Ut7Vs9FPBW5K38e9dwzqBJs8FvydvTKar0oCVaHKBiogjJxJsUdvs39C5WuDU05Xk8wuWE42pCgaRg002dFEvGvW');
}
else{
    define('ROOT','https://www.BookMart.lk');
}

define ('APP_NAME',"My website");
define('APP_DESC',"MY WEBISTESDS");

define('DEBUG', true);