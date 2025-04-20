<?php
namespace app\controller;

use app\_utils\Database;
use app\model\User;
use PDO;
use PDOException;

class RegisterController
{
    public function register()
    {
        $errors = [];
        $success = null; 

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $fullName = trim($_POST['fullName'] ?? '');
            $companyName = trim($_POST['companyName'] ?? '');
            $phone = trim($_POST['phone'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $password = trim($_POST['password'] ?? '');
            $password_confirm = trim($_POST['password2'] ?? '');
            $coupon = trim($_POST['coupon'] ?? '');
            $newsletter = isset($_POST['newsletter']) ? 1 : 0;
            $terms = isset($_POST['terms']) ? 1 : 0;

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = "Érvénytelen e-mail cím.";
            }

            if (strlen($password) < 5) {
                $errors[] = "A jelszónak legalább 5 karakter hosszúnak kell lennie.";
            }

            if ($password !== $password_confirm) {
                $errors[] = "A jelszavak nem egyeznek.";
            }

            if (!$terms) {
                $errors[] = "El kell fogadni a felhasználási feltételeket.";
            }

            if (empty($errors)) {
                try {
                    $db = new Database();
                    $pdo = $db->getConnection();
 
                      $stmt = $pdo->prepare("SELECT id FROM users WHERE email = :email");
                    $stmt->execute(['email' => $email]);
                    if ($stmt->fetch()) {
                        $errors[] = "Ez az e-mail cím már regisztrálva van.";
                     } else {
                        $user = new User($pdo);
                        $user->fullName = $fullName;
                        $user->companyName = $companyName;
                        $user->phone = $phone;
                        $user->email = $email;
                        $user->password = password_hash($password, PASSWORD_DEFAULT);
                        $user->coupon = $coupon;
                        $user->newsletter = $newsletter;
                          $user->terms = $terms;

                        if ($user->save()) {
                            $success = "Sikeres regisztráció!";
                        } else {
                            $errors[] = "Hiba történt a regisztráció során.";
                        }

                    }

                } catch (PDOException $e) {
                    $errors[] = "Adatbázis hiba: " . $e->getMessage();
                }
            }
        }

        include __DIR__ . '/../view/auth/register.php';
    }
}
?>
