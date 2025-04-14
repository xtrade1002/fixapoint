<?php
namespace app\model;

use PDO;
use PDOException;

class User {
    public $id;
    public $fullName;
    public $companyName;
    public $phone;
    public $email;
    public $password;
    public $coupon;
    public $newsletter;
    public $terms;
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function save(): bool {
        $sql = "INSERT INTO users (fullName, companyName, phone, email, password, coupon, newsletter, terms)
                VALUES (:fullName, :companyName, :phone, :email, :password, :coupon, :newsletter, :terms)";
        
        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([
            'fullName'    => $this->fullName,
            'companyName' => $this->companyName,
            'phone'       => $this->phone,
            'email'       => $this->email,
            'password'    => $this->password,
            'coupon'      => $this->coupon,
            'newsletter'  => $this->newsletter,
            'terms'       => $this->terms
        ]);
    }

    public function getId(): ?int {
        return $this->id;
    }

    public function getName(): ?string {
        return $this->fullName;
    }

    public function getEmail(): ?string {
        return $this->email;
    }

    public function getPassword(): ?string {
        return $this->password;
    }


    public function register(): array {
        try {
            $stmt = $this->pdo->prepare("SELECT id FROM users WHERE email = ?");
            $stmt->execute([$this->email]);

            if ($stmt->fetch()) {
                return ['success' => false, 'message' => 'Ez az e-mail cím már foglalt.'];
            }

            $hashedPassword = password_hash($this->password, PASSWORD_DEFAULT);

            $stmt = $this->pdo->prepare("INSERT INTO users 
                (fullName, companyName, phone, email, password, coupon, newsletter, terms) VALUES (:fullName, :companyName, :phone, :email, :password, :coupon, :newsletter, :terms)");

            $stmt->execute([
                'fullName' => $this->fullName,
                'companyName' => $this->companyName,
                'phone' => $this->phone,
                'email' => $this->email,
                'password' => $hashedPassword,
                'coupon' => $this->coupon,
                'newsletter' => $this->newsletter,
                'terms' => $this->terms,
            ]);

            return ['success' => true, 'message' => 'Sikeres regisztráció!'];

        } catch (PDOException $e) {
            return ['success' => false, 'message' => 'Adatbázis hiba: ' . $e->getMessage()];
        }
    }

    public function findByEmail(string $email): ?self {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, self::class, [$this->pdo]);
        return $stmt->fetch() ?: null;
    }

    public function verifyPassword(string $password): bool {
        return password_verify($password, $this->password);
    }
}


?>
