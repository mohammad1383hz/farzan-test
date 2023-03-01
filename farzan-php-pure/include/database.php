<?php



define("DSN", "mysql:host=localhost;dbname=farzan;charset=utf8");
define("DB_USER" , "root");
define("DB_PASS" , "");

$db = new PDO(DSN, DB_USER, DB_PASS);