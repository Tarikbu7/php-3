<?php
require_once 'Article.php';

// Only process if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);

    // Basic validation
    if (!empty($title) && !empty($content)) {
        $articleObj = new Article();
        $articleObj->create($title, $content);
        
        // Redirect to the list view
        header("Location: index.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Article</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="container">
    <div class="container">
        <h1>Create Story</h1>
        
        <form method="POST">
            <input type="text" name="title" placeholder="Enter a catchy title..." required autofocus>
            
            <textarea name="content" placeholder="Write your content here..." required></textarea>
            
            <div class="form-actions">
                <button type="submit" class="btn">Publish Article</button>
                <a href="index.php" class="btn-cancel">Cancel</a>
            </div>
        </form>
    </div>
</body>
</html>