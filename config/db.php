<?php
session_start();

$host = 'mysql://root:IrwkVnyMhGDtiBJGulkPZMtPwUrzRwtz@tramway.proxy.rlwy.net:15948/railway';
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
