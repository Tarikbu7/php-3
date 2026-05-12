<?php
class User {
    private $conn;
    private $table = "user_writer";

    public $id;
    public $nom;
    public $email;
    public $age;

    public function __construct($db) {
        $this->conn = $db;
    }

    // CREATE
  public function create() {
    $sql = "INSERT INTO {$this->table} (nom, email, age) VALUES (:nom, :email, :age)";
    $stmt = $this->conn->prepare($sql);
    return $stmt->execute([
        'nom' => $this->nom,
        'email' => $this->email,
        'age' => $this->age
    ]);
}
    // READ
    public function read() {
        $sql = "SELECT * FROM {$this->table}";
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // UPDATE
    public function update() {
        $sql = "UPDATE {$this->table} SET nom=:nom, email=:email WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute(['nom' => $this->nom, 'email' => $this->email, 'id' => $this->id]);
    }

    // DELETE
    public function delete() {
        $sql = "DELETE FROM {$this->table} WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute(['id' => $this->id]);
    }
}
