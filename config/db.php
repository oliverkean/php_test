<?php
session_start();

$host = 'mysql.railway.internal';
$username = 'root';
$password = 'IrwkVnyMhGDtiBJGulkPZMtPwUrzRwtz';
$dbname ='railway';
$port = '3306';

try {
    $dsn = "mysql:host=$host;port=$port;dbname=$dbname";
    $connect = new PDO($dsn, $username, $password);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
