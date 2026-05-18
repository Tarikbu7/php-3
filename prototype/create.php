<?php
require_once 'Article.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];

    if (!empty($title) && !empty($content)) {
        $articleObj = new Article();
        $articleObj->create($title, $content);
        
        // Redirect back to home
        header("Location: index.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create Article</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="container">
    <h1>Create Art</h1>
    <form method="POST">
        <input type="text" name="title" placeholder="Enter a catchy title..." required>
        <textarea name="content" placeholder="Write your content here..." required></textarea>
        <button type="submit" class="btn">Publish Article</button>
        <a href="index.php" style="margin-left: 10px; color: var(--text-muted);">Cancel</a>
    </form>
</body>
</html>