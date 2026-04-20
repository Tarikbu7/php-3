<?php
// ajout_utilisateur_secure.php

require 'connexion.php';

// ==================== ÉTAPE 1 : Validation des entrées ====================
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nom = htmlspecialchars(trim($_POST['nom'] ?? ''), ENT_QUOTES, 'UTF-8');
    
    $email = filter_var($_POST['email'] ?? '', FILTER_VALIDATE_EMAIL);

    if (empty($nom)) {
        die("Le nom est obligatoire !");
    }

    if (!$email) {
        die("Email invalide !");
    }

    // Optionnel : limiter la taille du nom
    if (strlen($nom) > 100) {
        die("Le nom est trop long !");
    }

    // ==================== ÉTAPE 2 : Insertion sécurisée avec requête préparée ====================
    try {
        $stmt = $pdo->prepare("INSERT INTO Utilisateur (nom, email) VALUES (:nom, :email)");
        
        $stmt->execute([
            ':nom'  => $nom,
            ':email'=> $email
        ]);

        echo "<p style='color:green;'>✅ Utilisateur ajouté avec succès !</p>";

    } 
    // ==================== ÉTAPE 3 : Gestion propre des erreurs ====================
    catch (PDOException $e) {
        // On enregistre l'erreur réelle dans un fichier (jamais affiché à l'utilisateur)
        file_put_contents('logs/errors.log', 
            date('Y-m-d H:i:s') . " - " . $e->getMessage() . PHP_EOL, 
            FILE_APPEND
        );

        // Message générique pour l'utilisateur
        echo "<p style='color:red;'>❌ Une erreur est survenue. Contactez l'administrateur.</p>";
    }
} 
else {
    // Affichage du formulaire si on accède en GET
    ?>
    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Ajout Utilisateur Sécurisé</title>
    </head>
    <body>
        <h2>Ajouter un utilisateur</h2>
        <form method="POST">
            <label>Nom :</label><br>
            <input type="text" name="nom" required><br><br>
            
            <label>Email :</label><br>
            <input type="email" name="email" required><br><br>
            
            <button type="submit">Ajouter</button>
        </form>
    </body>
    </html>
    <?php
}
?>