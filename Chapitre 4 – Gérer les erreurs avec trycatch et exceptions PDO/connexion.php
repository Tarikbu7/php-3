<?php

$host = "localhost";
$dbname = "garbage";
$username = "root";
$password = "Tarik7gamer";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Connexion réussie <br>";

} catch(PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}

?>

