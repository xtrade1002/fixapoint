<?php
namespace app\dao;

use PDO;

class ContactDao {
    private $pdo;
    private $name;
    private $email;
    private $phone;
    private $subject;
    private $message;

    public function __construct($pdo, $name, $email, $phone, $subject, $message) {
        $this->pdo = $pdo;
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->subject = $subject;
        $this->message = $message;
    }

        public function save($name, $email, $phone, $subject, $message): bool {
        $sql = "INSERT INTO messages (name, email, phone, subject, message) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$name, $email, $phone, $subject, $message]);
    }
    
}
