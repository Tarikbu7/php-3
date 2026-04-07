<?php
    require "connexion.php";
    try {
    $stmt = $pdo->prepare("INSERT INTO userss (name, email) VALUES (:name, :email)");

    $stmt->execute([
        "name" => "goten",
        "email" => "goten@test.com"
    ]);

    echo $stmt->rowCount() . " user added";
} catch  (PDOException $e) {

    file_put_contents('erreurs.log', $e->getMessage() . "\n", FILE_APPEND);
    echo "totaly wrong.";
}
    ?>
