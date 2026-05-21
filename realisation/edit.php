<?php
require_once 'Article.php';
$articleObj = new Article();
$id = $_GET['id'] ?? null;
$article = $articleObj->getOne($id);

if (!$article) { header("Location: index.php"); exit(); }

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $articleObj->update($id, $_POST['title'], $_POST['content']);
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <title>Edit Article</title>
</head>
<body class="container">
    <div class="container">
        <h1>Edit Article</h1>
        <form method="POST">
            <input type="text" name="title" value="<?= htmlspecialchars($article['title']) ?>" required>
            <textarea name="content" required><?= htmlspecialchars($article['content']) ?></textarea>
            <div class="form-actions">
                <button type="submit" class="btn">Update Article</button>
                <a href="index.php" class="btn-cancel">Cancel</a>
            </div>
        </form>
    </div>
</body>
</html>