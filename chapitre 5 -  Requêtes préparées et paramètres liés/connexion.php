<?php

$host = "localhost";
$dbname = "testpdo";
$username = "root";
$password = "Tarik7gamer";

try {

$pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8",$username,$password);

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

echo "Connected";

} catch(PDOException $e) {

echo "Error : " . $e->getMessage();

}