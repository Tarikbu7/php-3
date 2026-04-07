<?php
require "connexion.php";

$stmt = $pdo->prepare("DELETE FROM users WHERE id = :id");

$stmt->execute([
    "id" => 4
   
]);


$stmt->execute([
    "id" => 5
]);

echo $stmt->rowCount() . " utilisateur supprimé";
?>