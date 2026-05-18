<?php
require_once 'Article.php';
$articleObj = new Article();
$articles = $articleObj->getAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Article List</title>
    <link rel="stylesheet" href="style.css">
</head>

<body class="container">
    <h1>Article Explorer</h1>
    <a href="create.php" class="btn">Add New Article</a>

    <?php foreach ($articles as $art): ?>
        <div class="article-card">
            <h3><?= htmlspecialchars($art['title']) ?></h3>
            <p><?= nl2br(htmlspecialchars($art['content'])) ?></p>
        </div>
    <?php endforeach; ?>
</body>
</html>