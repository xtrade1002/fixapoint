<?php
namespace app\controller;

use app\model\ContactDao;    
use app\model\Contact;
use app\_utils\Database;

class ContactController {
    private $dao;
    private $pdo;

    public function __construct() {
        $database = new Database();
        $this->pdo = $database->getConnection();
        $this->dao = new ContactDao($this->pdo); 
    }

    public function showForm() {
        require_once __DIR__ . '/../view/main/contact.php';
    }

    public function send() {
        $name = $_POST['name'] ?? '';
        $email = $_POST['email'] ?? '';
        $phone = $_POST['phone'] ?? '';
        $subject = $_POST['subject'] ?? '';
        $message = $_POST['message'] ?? '';

        if (empty($name) || empty($email) || empty($message)) {
            $error = "Kérlek, tölts ki minden kötelező mezőt!";
            require_once __DIR__ . '/../view/main/contact.php';

            return;
        }

        $contact = new Contact($this->pdo, $name, $email, $phone,  $subject, $message);
        $success = $this->dao->save($name, $email, $phone, $subject, $message); 

        if ($success) {
            $successMessage = "Üzenetedet sikeresen elküldtük!";
            require_once __DIR__ . '/../view/main/contact.php';
        } else {
            $error = "Hiba történt az üzenet mentésekor.";
            require_once __DIR__ . '/../view/main/contact.php';
        }
        
    }
}
