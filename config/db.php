<?php
session_start();
$host = $_ENV['MYSQLHOST'] ?? 'localhost';
$username = $_ENV['MYSQLHOST'] ?? 'root';
$password = $_ENV['MYSQLHOST'] ?? '';
$dbname = $_ENV['MYSQLHOST'] ?? 'php_test';
$port = $_ENV['MYSQLHOST'] ?? '3306';

try {
    $connect = new PDO("mysql:host=" . host . "; db=" . db, user, pass);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e) {
    echo $e->getMessage();
}
?>