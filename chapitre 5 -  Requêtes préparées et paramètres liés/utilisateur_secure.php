<?php

require "connexion.php";

$stmt = $pdo->prepare("INSERT INTO utilisateur (nom,email) VALUES (:nom,:email)");

$stmt->execute([
    "nom" => "Goku",
    "email" => "goku@test.com"
]);

echo "User added";

?>