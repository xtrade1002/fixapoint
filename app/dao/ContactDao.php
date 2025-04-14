<?php
namespace app\dao;

use PDO;

class ContactDao {
    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

        public function save($name, $email, $phone, $subject, $message): bool {
        $sql = "INSERT INTO messages (name, email, phone, subject, message) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$name, $email, $phone, $subject, $message]);
    }
    
}
