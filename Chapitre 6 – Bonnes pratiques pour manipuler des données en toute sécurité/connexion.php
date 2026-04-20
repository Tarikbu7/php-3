<?php
// connexion.php

$host = 'localhost';
$dbname = 'school';     // ← change avec le nom de ta base
$username = 'root';             // ou ton utilisateur
$password = 'Tarik7gamer';                 // sur XAMPP souvent vide, sur MAMP c'est "root"

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données.");
}
?>