<?php
session_start();

$host = $_ENV['MYSQLHOST'] ?? 'localhost';
$username = $_ENV['MYSQLUSER'] ?? 'root';
$password = $_ENV['MYSQLPASSWORD'] ?? '';
$dbname = $_ENV['MYSQLDATABASE'] ?? 'php_test';
$port = $_ENV['MYSQLPORT'] ?? '3306';

try {
    $dsn = "mysql:host=$host;port=$port;dbname=$dbname";
    $connect = new PDO($dsn, $username, $password);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
