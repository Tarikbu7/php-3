<?php
require_once 'Article.php';
$articleObj = new Article();
$articles = $articleObj->getAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Article Explorer</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="container">
    <div class="container">
        <h1>Article Explorer</h1>
        <div style="text-align: center; margin-bottom: 20px;">
            <a href="create.php" class="btn">Add New Article</a>
        </div>

        <?php foreach ($articles as $art): ?>
            <div class="article-card">
                <h3><?= htmlspecialchars($art['title']) ?></h3>
                <p><?= nl2br(htmlspecialchars($art['content'])) ?></p>
                <div class="form-actions" style="margin-top: 15px;">
                    <a href="edit.php?id=<?= $art['id'] ?>" class="btn-cancel" style="color: var(--primary-blue);">Edit</a>
                    <a href="delete.php?id=<?= $art['id'] ?>" class="btn-cancel" style="color: #ef4444;" onclick="return confirm('Delete this article?')">Delete</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>