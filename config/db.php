<?php
session_start();

$host = 'sql111.infinityfree.com';
$username = 'if0_39387616 ';
$password = 'Yt1tqONgGKp';
$dbname ='if0_39387616_php_test';
$port = '3306';

try {
    $dsn = "mysql:host=$host;port=$port;dbname=$dbname";
    $connect = new PDO($dsn, $username, $password);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
