<?php
session_start();
define('host', 'localhost');
define('user', 'root');
define('pass', '');
define('db', 'php_test');
try {
    $connect = new PDO("mysql:host=" . host . "; db=" . db, user, pass);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e) {
    echo $e->getMessage();
}
?>