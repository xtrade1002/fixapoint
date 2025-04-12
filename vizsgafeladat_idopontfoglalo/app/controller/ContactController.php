<?php
namespace app\controller;

use app\dao\ContactDao;
use app\model\Contact;
use app\_utils\Database;

class ContactController {
    private $dao;
    private $pdo;

    public function __construct() {
        $db = new Database(); // ez a saját Database osztályod
        $this->pdo = $db->getConnection(); // lekérjük a PDO kapcsolatot
        $this->dao = new ContactDao($this->pdo); // DAO-t példányosítjuk ezzel
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
        

        // Email küldés
        /*
        $to = "admin@yourdomain.com"; // IDE jön az admin email címe
        $headers = "From: $email" . "\r\n" .
                   "Reply-To: $email" . "\r\n" .
                   "Content-Type: text/plain; charset=UTF-8";

        mail($to, "Kapcsolatfelvétel: $subject", $message, $headers);

        require '../app/views/contact/contact.php';
        */
    }
}
