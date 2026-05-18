<?php
class Article {
    private $pdo;

    public function __construct() {
        // Replace with your database credentials
        $host = 'localhost';
        $db   = 'blog_db';
        $user = 'root';
        $pass = '';
        
        $this->pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    }

    // Fetch all articles
    public function getAll() {
        $stmt = $this->pdo->query("SELECT * FROM articles ORDER BY id DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Add a new article
    public function create($title, $content) {
        $stmt = $this->pdo->prepare("INSERT INTO articles (title, content) VALUES (?, ?)");
        return $stmt->execute([$title, $content]);
    }
}
?>