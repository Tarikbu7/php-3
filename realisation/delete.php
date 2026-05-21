<?php
require_once 'Article.php';
if (isset($_GET['id'])) {
    $articleObj = new Article();
    $articleObj->delete($_GET['id']);
}
header("Location: index.php");
exit();