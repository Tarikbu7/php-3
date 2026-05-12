<?php
require 'Database.php';
require 'User.php';

// Connexion
$database = new Database();
$db = $database->getConnection();

// Créer un utilisateur
$user = new user($db);
$user->nom = "goku";
$user->email = "goku@test.com";
$user->age = 20;
$user->create();

// Lire les utilisateurs
$liste = $user->read();
foreach ($liste as $u) {
    echo $u['nom'] . " - " . $u['email'] . "<br>";
}
