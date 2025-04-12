<?php
namespace app\controller;

use app\model\User;
use PDO;

class LoginController {
    private PDO $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
        if(session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    // ✅ Bejelentkezési folyamat
    public function login(string $email, string $password): array {
        $userModel = new User($this->pdo);
        $user = $userModel->findByEmail($email);

        if (isset($_SESSION['email'])) {
            echo $_SESSION['email'];
        } else {
            echo "Nincs email megadva a sessionben.";
        }
        

        if ($user && $user->verifyPassword($password)) {
            $_SESSION['user_id'] = $user->id;
            $_SESSION['fullName'] = $user->fullName;
            
            // ✅ Átirányítás a dashboard oldalra sikeres bejelentkezés után
            header("Location: /vizsgafeladat_idopontfoglalo/app/view/auth/dashboard/index.php");
            exit();

            return ['success' => true, 'message' => 'Sikeres bejelentkezés!'];
        }

        return ['success' => false, 'message' => 'Hibás email cím vagy jelszó!'];
    }

    // ✅ Ellenőrzi, hogy a felhasználó be van-e jelentkezve
    public static function isLoggedIn(): bool {
        session_start();
        return isset($_SESSION['user_id']);
    }

    // ✅ Kijelentkezés folyamata
    public function logout(): void {
        session_start();
        session_unset();
        session_destroy();
        header('Location: index.php'); // átirányítás bejelentkező oldalra
        exit();
    }
}
