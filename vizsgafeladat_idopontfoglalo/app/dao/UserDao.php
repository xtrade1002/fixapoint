<?php
namespace app\dao;
use app\_utils\Database as Db;

/**A UserDao (Data Access Object) egy olyan osztály, amely az adatbázis műveletekért felelős a felhasználói adatok kezelésében. 
 *  UserDao osztály célja, hogy elválassza az alkalmazás üzleti logikáját az adatbázis műveletektől, így a kód olvashatóbb és karbantarthatóbb legyen.
 *  Az adatbázis műveletek, például a lekérdezések, beillesztések, frissítések és törlések mind ebben az osztályban valósulnak meg.

A UserDao osztály általában az alábbi műveleteket végzi el:

Lekérdezés (Read): Felhasználói adatok lekérdezése az adatbázisból (például összes felhasználó lekérdezése, egy adott felhasználó lekérdezése azonosító alapján).
Mentés (Create): Új felhasználói adat beszúrása az adatbázisba.
Frissítés (Update): Meglévő felhasználói adat módosítása az adatbázisban.
Törlés (Delete): Felhasználói adat törlése az adatbázisból.
Egyéb műveletek: Speciális lekérdezések és műveletek, mint például felhasználó keresése e-mail alapján, bejelentkezés ellenőrzése, stb.
Az UserDao osztály implementálja az ICrudDao interfészt, amely biztosítja, hogy az összes CRUD művelet megvalósuljon. */


class UserDao implements ICrudDao {

    public function getAll() {
        $dbObj = new Db();
        $connection = $dbObj->getConnection();
        $sql = "SELECT * FROM users ORDER BY id";
        $statement = $connection->prepare($sql);
        $statement->setFetchMode(\PDO::FETCH_OBJ);
        $statement->execute();
        return $statement->fetchAll();
    }

    public function save($user): void {
        $dbObj = new Db();
        $connection = $dbObj->getConnection();
        $sql = "INSERT INTO users (name, email, password, is_admin) VALUES (:name, :email, :password, :is_admin)";
        $statement = $connection->prepare($sql);
        $hashedPassword = password_hash($user->password, PASSWORD_DEFAULT);
    
        $statement->bindParam(':name', $user->name);
        $statement->bindParam(':email', $user->email);
        $statement->bindParam(':password', $hashedPassword);
        $statement->bindParam(':is_admin', $user->is_admin);
        $statement->execute();
    }
    

    public function getById(int $id) {
        $dbObj = new Db();
        $connection = $dbObj->getConnection();
        $sql = "SELECT * FROM users WHERE id = :id";
        $statement = $connection->prepare($sql);
        $statement->bindParam(':id', $id);
        $statement->setFetchMode(\PDO::FETCH_OBJ);
        $statement->execute();
        return $statement->fetch();
    }

    public function update($user): void  {
        $dbObj = new Db();
        $connection = $dbObj->getConnection();
        $sql = "UPDATE users SET name = :name, email = :email, password = :password, is_admin = :is_admin WHERE id = :id";
        $statement = $connection->prepare($sql);
        $hashedPassword = password_hash($user->password, PASSWORD_DEFAULT);
    
        $statement->bindParam(':name', $user->name);
        $statement->bindParam(':email', $user->email);
        $statement->bindParam(':password', $hashedPassword);
        $statement->bindParam(':id', $user->id); 
        $statement->execute();
    }
    

    public function delete($user): void {
        $dbObj = new Db();
        $connection = $dbObj->getConnection();
        $sql = "DELETE FROM users WHERE id = :id";
        $statement = $connection->prepare($sql);
        $statement->bindParam(':id', $user->id); 
        $statement->execute();
    }
    

    public function findByEmail($email) {
        $dbObj = new Db();
        $connection = $dbObj->getConnection();
        $sql = "SELECT * FROM users WHERE email = :email";
        $statement = $connection->prepare($sql);
        $statement->bindParam(':email', $email);
        $statement->setFetchMode(\PDO::FETCH_OBJ);
        $statement->execute();
        return $statement->fetch();
    }


    public function register($user): void {
        $dbObj = new Db();
        $connection = $dbObj->getConnection();
        $sql = "INSERT INTO users (name, email, password) VALUES (:name, :email, :password)";
        $statement = $connection->prepare($sql);
        $hashedPassword = password_hash($user->password, PASSWORD_DEFAULT);
    
        $statement->bindParam(':name', $user->name);
        $statement->bindParam(':email', $user->email);
        $statement->bindParam(':password', $hashedPassword);
        $statement->execute();
    }
    
    

    public function login($email, $password) {
        $dbObj = new Db();
        $connection = $dbObj->getConnection();
        $sql = "SELECT * FROM users WHERE email = :email";
        $statement = $connection->prepare($sql);
        $statement->bindParam(':email', $email);
        $statement->setFetchMode(\PDO::FETCH_OBJ);
        $statement->execute();
        $user = $statement->fetch();
        if ($user && password_verify($password, $user->password)) {
            return $user;
        } else {
            return false;
        }
    }

    public function checkLogin($email, $password) {
        return $this->login($email, $password);
    }
    

    public function isAdmin($id) {
        $dbObj = new Db();
        $connection = $dbObj->getConnection();
        $sql = "SELECT is_admin FROM users WHERE id = :id";
        $statement = $connection->prepare($sql);
        $statement->bindParam(':id', $id);
        $statement->setFetchMode(\PDO::FETCH_OBJ);
        $statement->execute();
        $result = $statement->fetch();
        return $result && $result->is_admin;
    }
}

?>