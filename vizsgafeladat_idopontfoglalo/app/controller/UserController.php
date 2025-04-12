<?php
namespace app\controller;

/**A UserController.php egy vezérlő osztály, amely az MVC (Model-View-Controller) architektúrában a "Controller" szerepet tölti be. ,
 * A vezérlő osztály célja az, hogy kezelje a felhasználói kéréseket, és a megfelelő műveleteket hajtsa végre a modellek és nézetek segítségével. 
 * 
 * A UserController.php osztály felelős a felhasználókkal kapcsolatos műveletek kezeléséért:
        * a felhasználók regisztrációjáért
        * bejelentkezéséért,
        * frissítéséért
        * törléséért.

A UserController.php osztály általában a következő feladatokat látja el:
        Regisztráció (Register): Új felhasználó regisztrálása.
        Bejelentkezés (Login): Felhasználó bejelentkeztetése.
        Felhasználói adatok lekérdezése: Felhasználói adatok lekérdezése az adatbázisból (például összes felhasználó lekérdezése, egy adott felhasználó lekérdezése azonosító alapján).
        Felhasználói adatok frissítése: Meglévő felhasználó adatainak frissítése.
        Felhasználó törlése (Delete): Felhasználó törlése az adatbázisból.
        Adminisztrátori jogosultság ellenőrzése: Ellenőrzése, hogy egy felhasználó adminisztrátor-e. */


use app\model\UserDao;
use app\model\User;



class UserController {
    private $userDao;

    public function __construct() {
        $this->userDao = new UserDao();
    }

    public function getAllUsers() {
        return $this->userDao->getAll();
    }

    public function registerUser($name, $email, $password) {
        $user = new User();
        $user->name = $name;
        $user->email = $email;
        $user->password = $password;
    
        return $this->userDao->register($user);
    }
    

    public function loginUser($email, $password) {
        return $this->userDao->login($email, $password);
    }

    public function getUserById($id) {
        return $this->userDao->getById($id);
    }

    public function checkIfAdmin($id) {
        return $this->userDao->isAdmin($id);
    }

    public function update($id, $name, $email, $password) {
        $user = new User();
        $user->id = $id;
        $user->name = $name;
        $user->email = $email;
        $user->password = $password;
        $this->userDao->update($id, $name, $email, $password);
    }
    

    public function delete($id) {
        $this->userDao->delete($id);
    }

    public function findUserByEmail($email) {
        return $this->userDao->findByEmail($email);
    }

    public function checkUserLogin($email, $password) {
        return $this->userDao->checkLogin($email, $password);
    }
}
?>